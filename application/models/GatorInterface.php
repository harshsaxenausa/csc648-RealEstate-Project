<?php

interface GatorInterface {

    /**
     * Calls parent constructor in GatorHub.php top open a connect to the database server
     * Sets the columns that this class is able to query for
     * Sets initial query statements
     */
    function __construct();



    /**
     * @return string      message indicating success or failure in inserting a new user record
     *
     * Requires valid 32-length sys_id already set to $sys_id
     * Must call initialize() beforehand to assign a sys_id
     * Inserts a record using columns from object's data members
     */
    function insert();



    /**
     * @return string   message indicating success or failure in updating the user record
     *
     * Requires a valid 32-length sys_id set to $sys_id that already exists on the user table
     * Must call get() to populate current object's data members with column data
     * Update all columns of the current sys_id's record
     */
    function update();



    /**
     * Binds all named placeholders with this class's column data members
     * Called in insert() and update()
     */
    function bindParam();



    /**
     * Cycle through the values returned from the database via query()
     * Keep calling next(), ideally in a loop, to access the next record
     *
     * @return boolean   returns true if more records are left to cycle through, else return false
     */
    function next();
}