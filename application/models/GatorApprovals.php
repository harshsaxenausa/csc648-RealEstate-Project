<?php
include_once "GatorHub.php";
include_once "GatorInterface.php";


class GatorApprovals extends GatorHub implements GatorInterface {

    // approvals table columns
    public $active              = 1;            // TINYINT(1), default new records are active (1)
    public $approval_state      = 'requested';  // ENUM('requested', 'approved')
    public $created             = null;         // VARCHAR(45)
    public $user_id             = null;         // VARCHAR(32), foreign key referencing user table
    public $listing_id          = null;         // VARCHAR(32), foreign key referencing listing table
    public $approver_id         = null;         // VARCHAR(32)
    //public $sys_id;                             // VARCHAR(32), unique record identifier, set in parent class



    /**
     * Calls parent constructor in GatorHub.php top open a connect to the database server
     * Sets the columns that this class is able to query for
     * Sets initial query statements and $created
     */
    function __construct()
    {
        parent::__construct();

        $this->columns = array('sys_id', 'active', 'approval_state', 'created', 'user_id', 'listing_id', 'approver_id');
        // NOT SURE TO PERFORM QUERIES USING SYS_ID OR A FOREIGN KEY
        $this->get_query = "SELECT * FROM approvals WHERE sys_id = :sys_id";
        $this->delete_query = "DELETE FROM approvals WHERE sys_id = :sys_id";
        $this->string_query = "SELECT * FROM approvals WHERE";
        $this->string_query_default = "SELECT * FROM approvals WHERE";

        $this->created = $this->getCurrentTime();
    }



    /**
     * @return string      message indicating success or failure in inserting a new approval record
     *
     * Requires valid 32-length sys_id already set to $sys_id
     * Must call initialize() to assign a sys_id
     * Inserts a record using columns from object's data members
     */
    function insert() {

        if (!$this->valid_sys_id($this->sys_id)) {
            self::console_error('Invalid sys_id, insert() not performed');
            return false;
        }

        try {
            $this->stmt = $this->pdo->prepare("INSERT INTO approvals (sys_id, active, approval_state, created,
                                                                               user_id, listing_id, approver_id)
                                                  VALUES (:sys_id, :active, :approval_state, :created, :user_id, :listing_id, :approver_id)");

            $this->bindParam();
            $this->stmt->execute();

            return true;
        }
        catch (PDOException $e) {
            self::console_error('Error Message: '.$e->getMessage().' Error Code: '.$e->getCode());
        }

        return false;
    }



    /**
     * @return string   message indicating success or failure in updating the record
     *
     * Requires a valid 32-length sys_id set to $sys_id that already exists on the table
     * Must call get() to populate current object's data members with column data
     * Update all columns of the current sys_id's  record
     */
    function update() {

        if (!$this->valid_sys_id($this->sys_id)) {
            self::console_error('Invalid sys_id, update() not performed');
            return false;
        }

        try {
            $this->stmt = $this->pdo->prepare("UPDATE approvals SET active = :active, approval_state = :approval_state,
                                                        created = :created, user_id = :user_id, listing_id = :listing_id, approver_id = :approver_id 
                                                        where sys_id = :sys_id");

            $this->bindParam();
            $this->stmt->execute();

            return true;  // need to find a better return value
        }
        catch (PDOException $e) {
            self::console_error('Error Message: '.$e->getMessage().' Error Code: '.$e->getCode());
            return false;
        }
    }



    /**
     * Binds all named placeholders with this class's column data members
     * Called in insert() and update()
     */
    function bindParam() {

        $this->stmt->bindParam(':sys_id',$this->sys_id, PDO::PARAM_STR);
        $this->stmt->bindParam(':active',$this->active, PDO::PARAM_BOOL);
        $this->stmt->bindParam(':approval_state',$this->approval_state, PDO::PARAM_STR);
        $this->stmt->bindParam(':created',$this->created, PDO::PARAM_STR);
        $this->stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_STR);
        $this->stmt->bindParam(':listing_id',$this->listing_id, PDO::PARAM_STR);
        $this->stmt->bindParam(':approver_id',$this->approver_id, PDO::PARAM_STR);
    }



    /**
     * Cycle through the values returned from the database via query()
     * Keep calling next(), ideally in a loop, to access the next record
     *
     * @return boolean   returns true if more records are left to cycle through, else return false
     */
    function next() {

        if ($this->fetch_index >= $this->fetch_row_count) {
            return null;
        }

        $this->sys_id = $this->fetch_result[$this->fetch_index]['sys_id'];
        $this->active = $this->fetch_result[$this->fetch_index]['active'];
        $this->approval_state = $this->fetch_result[$this->fetch_index]['approval_state'];
        $this->created = $this->fetch_result[$this->fetch_index]['created'];
        $this->user_id = $this->fetch_result[$this->fetch_index]['user_id'];
        $this->listing_id = $this->fetch_result[$this->fetch_index]['listing_id'];
        $this->approver_id = $this->fetch_result[$this->fetch_index]['approver_id'];

        $this->fetch_index++;

        return ($this->fetch_index < $this->fetch_row_count + 1); // +1 because arrays start at 0, might have logic issues
    }
}