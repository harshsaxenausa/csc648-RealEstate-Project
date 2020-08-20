<?php
include_once "GatorHub.php";
include_once "GatorInterface.php";


class GatorUser extends GatorHub implements GatorInterface
{

    // user table columns
    public $active = 1;                             // TINYINT(1), default new records are active (1)
    public $admin = null;
    public $first_name = null;                      // VARCHAR(45)
    public $last_name = null;                       // VARCHAR(45)
    public $created = null;                         // VARCHAR(45)
    public $username = null;                        // VARCHAR(12)
    public $password = null;                        // VARCHAR(20)
    public $email = null;                           // VARCHAR(45)
    public $picture = null;                         // VARCHAR(45)
    public $major = null;                           // VARCHAR(45)
    public $age = null;                             // INT
    public $gender = null;                          // ENUM('male', 'female', 'other')
    public $visible = null;                         // TINYINT(1)
    public $description = null;                     // VARCHAR(256)
    public $recovery_question_school = null;        // VARCHAR(256)
    public $recovery_question_name = null;          // VARCHAR(256)
    public $recovery_question_city = null;          // VARCHAR(256)
    public $recovery_question_book = null;          // VARCHAR(256)
    //public $sys_id;                               // VARCHAR(32), unique record identifier, set in parent class


    /**
     * Calls parent constructor in GatorHub.php top open a connect to the database server
     * Sets the columns that this class is able to query for
     * Sets initial query statements
     */
    function __construct()
    {
        parent::__construct();

        $this->columns = array('sys_id', 'active', 'admin', 'first_name', 'last_name', 'created', 'username', 'password', 'email',
            'picture', 'major', 'age', 'gender', 'visible', 'description', 'recovery_question_school',
            'recovery_question_name', 'recovery_question_city', 'recovery_question_book');

        $this->get_query = "SELECT * FROM user WHERE sys_id = :sys_id";
        $this->delete_query = "DELETE FROM user WHERE sys_id = :sys_id";
        $this->string_query = "SELECT * FROM user WHERE";
        $this->string_query_default = "SELECT * FROM user WHERE";
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
        // has the user's password before inserting the new record
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        if (!$this->valid_sys_id($this->sys_id)) {
            self::console_error('Invalid sys_id, insert() not performed');
            return false;
        }

        try {
            $this->stmt = $this->pdo->prepare("INSERT INTO user (sys_id, active, admin, first_name, last_name, created, 
                                                                         username, password, email, picture, major, age, gender, 
                                                                         visible, description, recovery_question_school,
                                                                         recovery_question_name, recovery_question_city, recovery_question_book)
                                                  VALUES (:sys_id, :active, :admin, :first_name, :last_name, :created, :username, :password, 
                                                          :email, :picture, :major, :age, :gender, :visible, :description, :recovery_question_school,
                                                          :recovery_question_name, :recovery_question_city, :recovery_question_book)");

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
        // has the user's password before updating the current record
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        if (!$this->valid_sys_id($this->sys_id)) {
            self::console_error('Invalid sys_id, update() not performed');
            return false;
        }

        try {
            $this->stmt = $this->pdo->prepare("UPDATE user SET active = :active, first_name = :first_name, admin = :admin,
                                                                  last_name = :last_name, created = :created, username = :username,
                                                                  password = :password, email = :email, picture =:picture, major = :major, age = :age, gender = :gender,
                                                                  visible = :visible, description = :description, recovery_question_school = :recovery_question_school,
                                                                  recovery_question_name = :recovery_question_name, recovery_question_city = :recovery_question_city,
                                                                  recovery_question_book = :recovery_question_book 
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
        $this->stmt->bindParam(':active', $this->active, PDO::PARAM_BOOL);
        $this->stmt->bindParam(':admin', $this->admin, PDO::PARAM_BOOL);
        $this->stmt->bindParam(':first_name', $this->first_name, PDO::PARAM_STR);
        $this->stmt->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
        $this->stmt->bindParam(':created', $this->created, PDO::PARAM_STR);
        $this->stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $this->stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        $this->stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $this->stmt->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $this->stmt->bindParam(':major', $this->major, PDO::PARAM_STR);
        $this->stmt->bindParam(':age', $this->age, PDO::PARAM_INT);
        $this->stmt->bindParam(':gender', $this->gender, PDO::PARAM_STR);
        $this->stmt->bindParam(':visible', $this->visible, PDO::PARAM_INT);
        $this->stmt->bindParam(':description', $this->description, PDO::PARAM_INT);
        $this->stmt->bindParam(':recovery_question_school', $this->recovery_question_school, PDO::PARAM_STR);
        $this->stmt->bindParam(':recovery_question_name', $this->recovery_question_name, PDO::PARAM_STR);
        $this->stmt->bindParam(':recovery_question_city', $this->recovery_question_city, PDO::PARAM_STR);
        $this->stmt->bindParam(':recovery_question_book', $this->recovery_question_book, PDO::PARAM_STR);

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
        $this->active = $this->fetch_result[$this->fetch_index]['active'];
        $this->admin = $this->fetch_result[$this->fetch_index]['admin'];
        $this->first_name = $this->fetch_result[$this->fetch_index]['first_name'];
        $this->last_name = $this->fetch_result[$this->fetch_index]['last_name'];
        $this->created = $this->fetch_result[$this->fetch_index]['created'];
        $this->username = $this->fetch_result[$this->fetch_index]['username'];
        $this->password = $this->fetch_result[$this->fetch_index]['password'];
        $this->email = $this->fetch_result[$this->fetch_index]['email'];
        $this->created = $this->fetch_result[$this->fetch_index]['created'];
        $this->major = $this->fetch_result[$this->fetch_index]['major'];
        $this->age = $this->fetch_result[$this->fetch_index]['age'];
        $this->gender = $this->fetch_result[$this->fetch_index]['gender'];
        $this->visible = $this->fetch_result[$this->fetch_index]['visible'];
        $this->description = $this->fetch_result[$this->fetch_index]['description'];
        $this->recovery_question_school = $this->fetch_result[$this->fetch_index]['recovery_question_school'];
        $this->recovery_question_name = $this->fetch_result[$this->fetch_index]['recovery_question_name'];
        $this->recovery_question_city = $this->fetch_result[$this->fetch_index]['recovery_question_city'];
        $this->recovery_question_book = $this->fetch_result[$this->fetch_index]['recovery_question_book'];

        $this->fetch_index++;

        return ($this->fetch_index < $this->fetch_row_count + 1); // +1 because arrays start at 0, might have logic issues

    }
}