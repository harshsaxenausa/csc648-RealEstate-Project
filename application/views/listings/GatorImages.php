<?php
include_once "GatorHub.php";
include_once "GatorInterface.php";


class GatorImages extends GatorHub implements GatorInterface {

    // user table columns
    public $sys_id;                      // 32 integer width unique identifier, set in constructor
    public $path;
    public $created;
    public $listing_id;



    /**
     * Calls parent constructor in GatorHub.php top open a connect to the database server
     * Sets the columns that this class is able to query for
     * Sets initial query statements and $created
     */
    function __construct()
    {
        parent::__construct();

        $this->columns = array('sys_id', 'path', 'created', 'listing_id');

        $this->get_query = "SELECT * FROM listing_images WHERE sys_id = :sys_id";
        $this->delete_query = "DELETE FROM listing_images WHERE sys_id = :sys_id";
        $this->string_query = "SELECT * FROM listing_images WHERE";
        $this->string_query_default = "SELECT * FROM listing_images WHERE";

        $this->created = $this->getCurrentTime();
    }



    /**
     * @return string      message indicating success or failure in inserting a new record
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
            $this->stmt = $this->pdo->prepare("INSERT INTO listing_images (sys_id, path, created, listing_id)
                                                  VALUES (:sys_id, :path, :created, :listing_id)");

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
     * Binds all named placeholders with this class's column data members
     * Called in insert() and update()
     */
    function bindParam() {

        $this->stmt->bindParam(':sys_id',$this->sys_id, PDO::PARAM_STR);
        $this->stmt->bindParam(':path',$this->path, PDO::PARAM_STR);
        $this->stmt->bindParam(':created',$this->created, PDO::PARAM_STR);
        $this->stmt->bindParam(':listing_id',$this->listing_id, PDO::PARAM_STR);

    }

    function update()
    {
        // TODO: Implement update() method.
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
        $this->path = $this->fetch_result[$this->fetch_index]['path'];
        $this->created = $this->fetch_result[$this->fetch_index]['created'];
        $this->listing_id = $this->fetch_result[$this->fetch_index]['listing_id'];


        $this->fetch_index++;

        return ($this->fetch_index < $this->fetch_row_count + 1); // +1 because arrays start at 0, might have logic issues
    }
}
//
//$image = new GatorImages();
//$filename = "cat.jpg";
////$user->get("68605761638822471485226684973355");
//echo $image->upload_file($filename);