<?php

include_once "GatorHub.php";
include_once "GatorInterface.php";


class GatorMessage extends GatorHub implements GatorInterface
{

    // messaging table columns

    public $sender_id = null;     // VARCHAR(45)
    public $receiver_id = null;     // VARCHAR(45)
    public $content = null;     // MEDIUMTEXT
    public $created = null;     // time and date

    //public $sys_id;                       // VARCHAR(32), unique record identifier, set in parent class


    /**
     * Calls parent constructor in GatorHub.php top open a connect to the database server
     * Sets the columns that this class is able to query for
     * Sets initial query statements and $created
     */
    function __construct()
    {
        parent::__construct();

        $this->columns = array('sys_id', 'sender_id', 'receiver_id', 'content', 'created');

        $this->get_query = "SELECT * FROM message WHERE sys_id = :sys_id";
        $this->delete_query = "DELETE FROM message WHERE sys_id = :sys_id";
        $this->string_query = "SELECT * FROM message WHERE";
        $this->string_query_default = "SELECT * FROM message WHERE";

        $this->created = $this->getCurrentTime();
    }


    /**
     * @return string      message indicating success or failure in inserting a new record
     *
     * Requires valid 32-length sys_id already set to $sys_id
     * Must call initialize() to assign a sys_id
     * Inserts a record using columns from object's data members
     */
    function insert()
    {

        if (!$this->valid_sys_id($this->sys_id)) {
            self::console_error('Invalid sys_id, insert() not performed');
            return false;
        }

        try {
            $this->stmt = $this->pdo->prepare("INSERT INTO message (sys_id, sender_id, receiver_id, content, created)
                                                  VALUES (:sys_id, :sender_id, :receiver_id, :content, :created )");

            $this->bindParam();
            $this->stmt->execute();

            return true;
        } catch (PDOException $e) {
            self::console_error('Error Message: ' . $e->getMessage() . ' Error Code: ' . $e->getCode());
        }

        return false;
    }


    /**
     * @return string   message indicating success or failure in updating the record
     *
     * Requires a valid 32-length sys_id set to $sys_id that already exists on the table
     * Must call get() to populate current object's data members with column data
     * Update all columns of the current sys_id's record
     */
    function update()
    {

        if (!$this->valid_sys_id($this->sys_id)) {
            self::console_error('Invalid sys_id, update() not performed');
            return false;
        }

        try {
            $this->stmt = $this->pdo->prepare("UPDATE message SET sender_id = :sender_id, receiver_id = :receiver_id,
                                                        content = :content, created = :created
                                                        where sys_id = :sys_id");

            $this->bindParam();
            $this->stmt->execute();

            return true;
        } catch (PDOException $e) {
            self::console_error('Error Message: ' . $e->getMessage() . ' Error Code: ' . $e->getCode());
            return false;
        }
    }


    /**
     * Binds all named placeholders with this class's column data members
     * Called in insert() and update()
     */
    function bindParam()
    {

        $this->stmt->bindParam(':sys_id', $this->sys_id, PDO::PARAM_STR);
        $this->stmt->bindParam(':sender_id', $this->sender_id, PDO::PARAM_STR);
        $this->stmt->bindParam(':receiver_id', $this->receiver_id, PDO::PARAM_STR);
        $this->stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
        $this->stmt->bindParam(':created', $this->created, PDO::PARAM_STR);

    }


    /**
     * Cycle through the values returned from the database via query()
     * Keep calling next(), ideally in a loop, to access the next record
     *
     * @return boolean   returns true if more records are left to cycle through, else return false
     */
    function next()
    {

        if ($this->fetch_index >= $this->fetch_row_count) {
            return null;
        }

        $this->sys_id = $this->fetch_result[$this->fetch_index]['sys_id'];
        $this->sender_id = $this->fetch_result[$this->fetch_index]['sender_id'];
        $this->receiver_id = $this->fetch_result[$this->fetch_index]['receiver_id'];
        $this->content = $this->fetch_result[$this->fetch_index]['content'];
        $this->created = $this->fetch_result[$this->fetch_index]['created'];

        $this->fetch_index++;

        return ($this->fetch_index < $this->fetch_row_count + 1); // +1 because arrays start at 0, might have logic issues
    }
}

//$test = new GatorMessage();
//$test->initialize();
//$test->sender_id = "tania";
//$test->receiver_id="Morgan";
//$test->content = "hello";
//$test->insert();