<?php
include_once "GatorHub.php";
include_once "GatorInterface.php";
include_once 'MapDistance.php';


class GatorListing extends GatorHub implements GatorInterface {

    // listing table columns
    public $active              = 0;        // TINYINT(1), default new records are active (1)
    public $street_address      = null;     // VARCHAR(45)
    public $city                = null;     // VARCHAR(45)
    public $state               = null;     // VARCHAR(45)
    public $zip_code            = null;     // VARCHAR(45)
    public $created             = null;     // VARCHAR(45)
    public $updated             = null;     // VARCHAR(45)
    public $expired             = null;     // VARCHAR(45)
    public $price               = null;     // INT
    public $payment_type        = null;     // ENUM('rent', 'buy')
    public $property_type       = null;     // ENUM('apartment', 'studio', 'condominium', 'house')
    public $utilities           = null;     // SET('gas', 'electricity', 'water', 'cable', 'wifi', 'laundry')
    public $parking             = null;     // TINYINT(1)
    public $image               = null;     // VARCHAR(45)
    public $title               = 'test';     // VARCHAR(512)
    public $description         = null;     // MEDIUMTEXT
    public $rooms               = null;     // INT
    public $floor_size          = null;     // INT
    public $pets                = null;     // TINYINT(1)
    public $view_count          = 0;        // INT, initially 0
    public $distance_to_sfsu    = null;     // INT
    public $user_id             = null;     // VARCHAR(32), foreign key to user table's primary key
    //public $sys_id;                       // VARCHAR(32), unique record identifier, set in parent class



    /**
     * Calls parent constructor in GatorHub.php top open a connect to the database server
     * Sets the columns that this class is able to query for
     * Sets initial query statements and $created
     */
    function __construct()
    {
        parent::__construct();

        $this->columns = array('sys_id', 'active', 'street_address', 'city', 'state', 'zip_code', 'created', 'updated', 'expired', 'price',
                                'payment_type', 'property_type', 'utilities', 'parking', 'image', 'title', 'description', 'rooms',
                                'floor_size', 'pets', 'view_count', 'distance_to_sfsu', 'user_id');

        $this->get_query = "SELECT * FROM listing WHERE sys_id = :sys_id";
        $this->delete_query = "DELETE FROM listing WHERE sys_id = :sys_id";
        $this->string_query = "SELECT * FROM listing WHERE";
        $this->string_query_default = "SELECT * FROM listing WHERE";

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
        $address_from = '1600 Holloway Ave, San Francisco, CA 94132';
        $address_to ="$this->street_address, $this->city, $this->state $this->zip_code";
        $this->distance_to_sfsu = getDistance($address_from, $address_to);
        echo $this->distance_to_sfsu;

        try {
            $this->stmt = $this->pdo->prepare("INSERT INTO listing (sys_id, active, street_address, city, state,
                                                                          zip_code, created, updated, expired, price, payment_type,
                                                                          property_type, utilities, parking, image, title, description,
                                                                          rooms, floor_size, pets, view_count, distance_to_sfsu, user_id)
                                                  VALUES (:sys_id, :active, :street_address, :city, :state,
                                                          :zip_code, :created, :updated, :expired, :price, :payment_type,
                                                          :property_type, :utilities, :parking, :image, :title, :description,
                                                          :rooms, :floor_size, :pets, :view_count, :distance_to_sfsu, :user_id)");

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
     * Update all columns of the current sys_id's record
     */
    function update() {

        if (!$this->valid_sys_id($this->sys_id)) {
            self::console_error('Invalid sys_id, update() not performed');
            return false;
        }

        try {
            $this->stmt = $this->pdo->prepare("UPDATE listing SET active = :active, street_address = :street_address,
                                                        city = :city, state = :state, zip_code = :zip_code, created = :created,
                                                        updated =:updated, expired = :expired, price = :price, payment_type = :payment_type,
                                                        property_type = :property_type, utilities = :utilities,
                                                        parking = :parking, image = :image, title = :title, description = :description, rooms = :rooms,
                                                        floor_size = :floor_size, pets = :pets, view_count = :view_count, distance_to_sfsu = :distance_to_sfsu, user_id = :user_id
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
        $this->stmt->bindParam(':street_address',$this->street_address, PDO::PARAM_STR);
        $this->stmt->bindParam(':city',$this->city, PDO::PARAM_STR);
        $this->stmt->bindParam(':state', $this->state, PDO::PARAM_STR);
        $this->stmt->bindParam(':zip_code',$this->zip_code, PDO::PARAM_INT);
        $this->stmt->bindParam(':created',$this->created, PDO::PARAM_STR);
        $this->stmt->bindParam(':updated',$this->updated, PDO::PARAM_STR);
        $this->stmt->bindParam(':expired',$this->expired, PDO::PARAM_STR);
        $this->stmt->bindParam(':price',$this->price, PDO::PARAM_INT);
        $this->stmt->bindParam(':payment_type',$this->payment_type, PDO::PARAM_STR);
        $this->stmt->bindParam(':property_type',$this->property_type, PDO::PARAM_STR);
        $this->stmt->bindParam(':utilities',$this->utilities, PDO::PARAM_STR);
        $this->stmt->bindParam(':parking',$this->parking, PDO::PARAM_INT);
        $this->stmt->bindParam(':image',$this->image, PDO::PARAM_STR);
        $this->stmt->bindParam(':title',$this->title, PDO::PARAM_STR);
        $this->stmt->bindParam(':description',$this->description, PDO::PARAM_STR);
        $this->stmt->bindParam(':rooms',$this->rooms, PDO::PARAM_INT);
        $this->stmt->bindParam(':floor_size',$this->floor_size, PDO::PARAM_INT);
        $this->stmt->bindParam(':pets',$this->pets, PDO::PARAM_BOOL);
        $this->stmt->bindParam(':view_count',$this->view_count, PDO::PARAM_INT);
        $this->stmt->bindParam(':distance_to_sfsu',$this->distance_to_sfsu, PDO::PARAM_STR);
        $this->stmt->bindParam(':user_id',$this->user_id, PDO::PARAM_STR);
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
        $this->street_address = $this->fetch_result[$this->fetch_index]['street_address'];
        $this->city = $this->fetch_result[$this->fetch_index]['city'];
        $this->state = $this->fetch_result[$this->fetch_index]['state'];
        $this->zip_code = $this->fetch_result[$this->fetch_index]['zip_code'];
        $this->created = $this->fetch_result[$this->fetch_index]['created'];
        $this->expired = $this->fetch_result[$this->fetch_index]['expired'];
        $this->price = $this->fetch_result[$this->fetch_index]['price'];
        $this->payment_type = $this->fetch_result[$this->fetch_index]['payment_type'];
        $this->property_type = $this->fetch_result[$this->fetch_index]['property_type'];
        $this->utilities = $this->fetch_result[$this->fetch_index]['utilities'];
        $this->parking = $this->fetch_result[$this->fetch_index]['parking'];
        $this->image = $this->fetch_result[$this->fetch_index]['image'];
        $this->title = $this->fetch_result[$this->fetch_index]['title'];
        $this->description = $this->fetch_result[$this->fetch_index]['description'];
        $this->rooms = $this->fetch_result[$this->fetch_index]['rooms'];
        $this->floor_size = $this->fetch_result[$this->fetch_index]['floor_size'];
        $this->pets = $this->fetch_result[$this->fetch_index]['pets'];

        $this->fetch_index++;

        return ($this->fetch_index < $this->fetch_row_count + 1); // +1 because arrays start at 0, might have logic issues
    }
}
