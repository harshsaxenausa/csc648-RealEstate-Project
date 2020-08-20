<?php

// enable error logging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/**
 * Parent class performs query building, sorting, chunking, and fetching
 * Child class performs insert, update, result parsing, and contains retrieved record's column values
 */
class GatorHub {

    // represents the connection between PHP and a database server, call close() to disconnect
    protected $pdo;

    // used to communicate with database server
    protected $stmt;

    // string query used to retrieve multiple records from the database
    protected $string_query;
    protected $string_query_default;

    // get query used to retrieve a specific record by sys_id, set in child constructor
    protected $get_query;

    // delete query used to delete a sys_id's record, set in child constructor
    protected $delete_query;

    // sort the query by column
    protected $order_query;
    protected $order_direction = array('ascending', 'descending', 'ASC', 'DESC');

    // specify the range of records to retrieve
    protected $limit_query;

    // supported SQL operators for querying
    protected $operators = array('=','!=', '<', '>', '<=', '>=', 'LIKE', 'STARTSWITH', 'ENDSWITH');

    // an array of columns allowed to query against, set in child class's constructor
    protected $columns;

    // denotes the last query condition added, either AND or OR
    protected $last_query;

    // unique record identifier consisting of a 32-length number, type string
    public $sys_id;



    protected $fetch_result;        // an array containing query results obtained with query()
    protected $fetch_index = 0;     // index of the $fetch_result array used for iteration with next()
    protected $fetch_row_count = 0; // number of records returned by a query



    /**
     * Open a connection to the database server
     * Child constructors will set $columns array with the appropriate
     */
    function __construct() {

        $host = 'localhost';
        $database = 'gatorhub';
        $user = 'root';
        $password = 'csc648';
        $charset = 'utf8';

        // see https://www.php.net/manual/en/pdo.setattribute.php for options
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,            // error reporting, throws exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // returns an array indexed by column name as returned in your result set
            PDO::ATTR_EMULATE_PREPARES => false,                    // enables or disables emulation of prepared statements
        ];

        try {
            $connect = "mysql:host=$host;dbname=$database;charset=$charset";

            return $this->pdo = new PDO($connect, $user, $password, $options);
        } catch (PDOException $e) {
            self::console_error('Error Message: ' . $e->getMessage() . ' Error Code: ' . $e->getCode());
        }
    }



    /**
     * Assigns a sys_id to current object
     * Must call initialize() before insert() in order to have a valid sys_id
     */
    function initialize() {
        if (!$this->valid_sys_id($this->sys_id)) {
            $this->sys_id = $this->generate_sys_id(32);
        }
    }



    /**
     * @param    $length,   desired length
     * @return   string     generates a unique string identifier with a length of $length
     *
     * Not really 'unique' but the database will reject inserts if it ever generates an existing sys_id (almost never)
     */
    function generate_sys_id($length) {
        $result = '';

        for ($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }



    /**
     * @param  $sys_id,    sys_id of the user record intended for retrieval
     * @return string      message indicating success or failure of user record retrieval
     *
     * This method must be called before update() and/or delete()
     * Returns one user record matching the specified sys_id and assigns data to corresponding data members
     */
    function get($sys_id) {

        if (!$this->valid_sys_id($sys_id)) {
            self::console_error('Invalid sys_id, get() not performed');
            return false;
        }

        // prepare, bind parameter using sys_id, execute get query, assigns object data members with column data
        try {
            $this->stmt = $this->pdo->prepare($this->get_query);
            $this->stmt->bindParam(':sys_id', $sys_id, PDO::PARAM_INT);
            $this->stmt->execute();
            $this->stmt->setFetchMode(PDO::FETCH_INTO, $this);

            // set column data members equal to retrieved column data, reset to default value if nothing retrieved
            if (count($this->stmt->fetchALL()) == 0) {
                $this->reset();
                self::console_error('Record not found');
                return false;
            }
            // saves the number of records returned, used for getRowCount()
            $this->fetch_row_count = $this->stmt->rowCount();
            return true;
        }
        catch (PDOException $e) {
            self::console_error('Error Message: '.$e->getMessage().' Error Code: '.$e->getCode());
            return false;
        }
    }



    /**
     * @param   $column,     column to query against, will be checked if contained in $columns
     * @param   $condition,  the condition on which results will be filtered
     * @param   $value,      value on which results will be based on
     *
     * Build a multi-condition SELECT query. Currently does not use placeholders
     * Supported operators are labeled in $operators
     * Does not use prepared statements
     */
    function addQuery($column, $condition, $value) {

        // function guards to ensure valid query operators and columns are provided
        if (in_array($condition, $this->operators) == false) {
            self::console_error("Invalid query operator, $value will not be queried");
            return null;
        }

        if (in_array($column, $this->columns) == false) {
            self::console_error("Invalid query column, $value will not be queried");
            return null;
        }

        // escape single quotes, double quotes, black slash, and NUL
        $value = addslashes($value);

        // append to $string_query the new query
        if ($condition == 'LIKE') {
            $this->string_query .= " `$column` LIKE '%$value%' AND";
        }
        else if ($condition == 'STARTSWITH') {
            $this->string_query .= " `$column` LIKE '$value%' AND";
        }
        else if ($condition == 'ENDSWITH') {
            $this->string_query .= " `$column` LIKE '%$value' AND";
        }
        else {
            $this->string_query .= " `$column` $condition '$value' AND";
        }
    }


    /**
     * @param   $column,     column to query against, will be checked if contained in $columns
     * @param   $condition,  the condition on which results will be filtered
     * @param   $value,      value on which results will be based on
     *
     * Add an OR condition to the query. All queries after addQueryOR() are separate from the initial addQuery()
     * Supported operators are labeled in $operators
     * Does not use prepared statements
     */
    function addQueryOR($column, $condition, $value) {
        // function guards to ensure valid query operators and columns are provided
        if (in_array($condition, $this->operators) == false) {
            self::console_error("Invalid query operator, $value will not be queried");
            return null;
        }

        if (in_array($column, $this->columns) == false) {
            self::console_error("Invalid query column, $value will not be queried");
            return null;
        }

        // escape single quotes, double quotes, black slash, and NUL
        $value = addslashes($value);

        // remove the tailing " AND" addQuery() must be called before addQueryOr()
        $this->string_query = substr($this->string_query, 0, strlen($this->string_query) - 4);

        // append to $string_query ' OR' and the new query
        if ($condition == 'LIKE') {
            $this->string_query .= " OR `$column` $condition '%$value%' AND";
        }
        else if ($condition == 'STARTSWITH') {
            $this->string_query .= " OR `$column` $condition '$value%' AND";
        }
        else if ($condition == 'ENDSWITH') {
            $this->string_query .= " OR `$column` $condition '%$value' AND";
        }
        else {
            $this->string_query .= " OR `$column` $condition '$value' AND";
        }
    }



    /**
     * substr() is used in order to remove the extra ' AND' from addQuery()
     * Appends "ORDER BY" followed by "LIMIT" to the query if necessary before executing
     * Retrieves records matching the query, if no query has been provided, return the entire table
     */
    function query() {

        try {
            // if query() is called WITH addQuery(), remove the extra " AND"
            if ($this->string_query != $this->string_query_default) {
                $this->string_query = substr($this->string_query, 0, strlen($this->string_query) - 4);
            }
            // if query() is called without addQuery(), remove the extra " WHERE"
            else {
                $this->string_query = substr($this->string_query, 0, strlen($this->string_query) - 6);
            }

            // if orderBy() has been called, append ORDER BY to $string_query
            if ($this->order_query != '') {
                $this->string_query = $this->string_query.$this->order_query;
            }

            // if limit() has been called, append LIMIT to $string_query
            if ($this->limit_query != '') {
                $this->string_query = $this->string_query.$this->limit_query;
            }

            // prepare, execute, and fetch results, $fetch_result is an array of all results
            $this->stmt = $this->pdo->prepare($this->string_query);
            $this->stmt->execute();
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->fetch_result = $this->stmt->fetchAll();
            $this->fetch_row_count = $this->stmt->rowCount();
            return true;
        }
        catch (PDOException $e) {
            self::console_error('Error Message: '.$e->getMessage().' Error Code: '.$e->getCode());
            return false;
        }
    }



    /**
     * @param $column,      column to order by, will be checked if contained in $columns
     * @param $direction,   specify sort direction with ASC, ascending, or DESC, descending
     *
     * Appends a ORDER BY query to the end of $string_query, precedes LIMIT query if limit() is called
     */
    function orderBy($column, $direction) {

        // end method if $column is not part of supported columns
        if (in_array($column, $this->columns) == false) {
            self::console_error('Invalid query column, results will not be sorted');
            return false;
        }
        // end method if $direction is not ASC, DESC, ascending, or descending
        if (in_array($direction, $this->order_direction) == false) {
            self::console_error('Invalid sort direction, results will not be sorted');
            return false;
        }
        // example: appends " ORDER BY `$column` ASC" to the end of $string_query
        if ($direction == 'ascending' || $direction == 'ASC') {
            $this->order_query = " ORDER BY `$column` ASC";
            return true;
        }
        else if ($direction == 'descending' || $direction == 'DESC') {
            $this->order_query = " ORDER BY `$column` DESC";
            return true;
        }
    }



    /**
     * @param $start,   position to start returning records
     * @param $amount,  number of records to return starting from $start
     *
     * Appends a LIMIT query to the end of $string_query
     */
    function limit($start, $amount) {
        // end method if parameters are not integers
        if (gettype($start) != 'integer' || gettype($amount) != 'integer') {
            self::console_error('Invalid LIMIT parameters, results will not be chunked');
            return false;
        }
        // example: appends " LIMIT 0, 100" to the end of $string_query
        $this->limit_query = " LIMIT $start,$amount";
        return true;
    }



    /**
     * @return string   message indicating success or failure of deletion
     *
     * Must call get() to set sys_id and identify the user record slated for deletion
     * Delete the user record belonging to the current sys_id
     */
    function delete() {

        if (!$this->valid_sys_id($this->sys_id)) {
            return false;
        }

        // prepare, bind parameters, execute delete
        try {
            $this->stmt = $this->pdo->prepare($this->delete_query);
            $this->stmt->bindParam(":sys_id",$this->sys_id, PDO::PARAM_STR);
            $this->stmt->execute();

            return true;
        }
        catch (PDOException $e) {
            self::console_error('Error Message: '.$e->getMessage().' Error Code: '.$e->getCode());
            return false;
        }
    }



    // Force a disconnection, else the connection persists for the lifetime of this object
    function close() {
        $this->pdo = null;
    }



    // reset all public data members to default values
    function reset() {
        foreach ( get_class_vars(get_class($this)) as $name => $default )
            $this->$name = $default;
    }



    // get number of records currently held
    function getRowCount() {
        return $this->fetch_row_count;
    }



    // resets $string_query so a different query can be used within the same object
    function resetStringQuery() {
        $this->string_query = $this->string_query_default;
    }



    // resets $order_query
    function resetOrderQuery() {
        $this->order_query = "";
    }



    // resets $limit_query
    function resetLimitQuery() {
        $this->limit_query = "";
    }



    // display query in console for debugging purposes
    function showQuery() {
        //self::console_log('String query: '.substr($this->string_query, 0, strlen($this->string_query) - 4));
        self::console_log('String query: '.$this->string_query);
        self::console_log('Get query: '.$this->get_query);
        self::console_log('Order query: '.$this->order_query);
        self::console_log('Limit query: '.$this->limit_query);
    }



    /**
     *
     * @param $sys_id,  check if sys_id is valid
     *
     * @return boolean  returns true (1) if sys_id is valid, returns false ('') if invalid
     */
    function valid_sys_id($sys_id) {
        return $sys_id != '' && strlen($sys_id) == 32;
    }



    // returns current time in the format Month dd, yyyy hh:mm:ss AM/PM
    function getCurrentTime() {
        date_default_timezone_set('America/Los_Angeles');
        return date('F d, Y h:i:s A');
    }

    // returns current time in the format Month dd, yyyy hh:mm:ss AM/PM, external callable
    static function getTime() {
        date_default_timezone_set('America/Los_Angeles');
        return date('F d, Y h:i:s A');
    }



    /**
     * @param $data,    information to be displayed in browser console
     *
     * Mimics JavaScript's console.log() function. Call using GatorUser::console_log(). console_error() displays in red
     */
    static function console_log($data) {
        echo '<script>';
        echo 'console.log('.json_encode($data).')';
        echo '</script>';
    }

    static function console_error($data) {
        echo '<script>';
        echo 'console.error('.json_encode($data).')';
        echo '</script>';

    }
}