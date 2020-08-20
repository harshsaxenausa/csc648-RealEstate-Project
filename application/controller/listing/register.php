<?php
include $_SERVER['DOCUMENT_ROOT'] . '/models/GatorHub.php' ;
include $_SERVER['DOCUMENT_ROOT'] . '/models/GatorUser.php' ;
register();


/**
 * Creates a new user object and sets its variables using register.php form fields
 * Inserts the new user object as a record on the user table
 */
function register() {

    $first_name = '';
    $last_name = '';
    $email = '';
    $password = '';
    $age = '';
    $visible = '';
    $gender = '';
    $major = '';
    $description = '';
    $recovery_question_school = '';
    $recovery_question_name = '';
    $recovery_question_city = '';
    $recovery_question_book = '';


    // set local variables using register page form fields
    if (isset($_POST['firstname_register'])) {
        $first_name = $_POST['firstname_register'];
    }

    if (isset($_POST['lastname_register'])) {
        $last_name = $_POST['lastname_register'];
    }

    if (isset($_POST['email_register'])) {
        $email = $_POST['email_register'];
    }

    if (isset($_POST['password_register'])) {
        $password = $_POST['password_register'];
    }
/* // !! commented out because we had no time to implement Roommate Finder
    if (isset($_POST['age_register'])) {
        $age = $_POST['age_register'];
    }

    if (isset($_POST['visible_register'])) {
        if ($_POST['visible_register'] == 'true') {
            $visible = 1;
        }
        else if($_POST['visible_register'] == 'false') {
            $visible = 0;
        }
        // default to invisible if something's wrong
        else {
            $visible = 0;
        }
    }

    if (isset($_POST['gender_register'])) {
        $gender = $_POST['gender_register'];
    }

    if (isset($_POST['major_register'])) {
        $major = $_POST['major_register'];
    }

    if (isset($_POST['description_register'])) {
        $description = $_POST['description_register'];
    }

    if (isset($_POST['recovery_question_school_register'])) {
        $recovery_question_school = $_POST['recovery_question_school_register'];
    }

    if (isset($_POST['recovery_question_name_register'])) {
        $recovery_question_name = $_POST['recovery_question_name_register'];
    }

    if (isset($_POST['recovery_question_city_register'])) {
        $recovery_question_city = $_POST['recovery_question_city_register'];
    }

    if (isset($_POST['recovery_question_book_register'])) {
        $recovery_question_book = $_POST['recovery_question_book_register'];
    }
*/

    $user = new GatorUser();
    $user->initialize();

    // start setting column values using register form fields
    $user->first_name = $first_name;
    $user->last_name = $last_name;
    $user->email = $email;
    $user->password = $password;
    /* // !! commented out because we had no time to implement Roommate Finder
    $user->age = $age;
    $user->visible = $visible;
    $user->gender = $gender;
    $user->major = $major;
    $user->description = $description;
    $user->recovery_question_school = $recovery_question_school;
    $user->recovery_question_name = $recovery_question_name;
    $user->recovery_question_city = $recovery_question_city;
    $user->recovery_question_book = $recovery_question_book;
    */
    $user->initialize();

    header("Location ../index.php_or_something");
}

?>
