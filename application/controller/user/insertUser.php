<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/models/GatorUser.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/controller/redirect.php');

registerUser();

function registerUser() {
    $first_name = '';
    $last_name = '';
    $username = '';
    $email = '';
    $password = '';
    /*
    $recovery_book = '';
    $recovery_city = '';
    $recovery_name = '';
    $recovery_school = '';
    $age = null;
    $gender = null;
    $major = null;
    $description = null;
    $visible = false;
    */

    // Section 1 User Info
    if (isset($_POST['firstname_register'])) {
        $first_name = $_POST['firstname_register'];
    }

    if (isset($_POST['lastname_register'])) {
        $last_name = $_POST['lastname_register'];
    }

    if (isset($_POST['email_register']) && $_POST['email_register'] != '') {
       //$username = $_POST['email_register'];
        $email = $_POST['email_register'];
    }

    if (isset($_POST['password_register']) && $_POST['password_register'] != '') {
        $password = $_POST['password_register'];
    }


/*
    // Section 2 Recovery Questions
    if (isset($_POST['recovery_school_register'])) {
        $recovery_school = $_POST['recovery_school_register'];
    }

    if (isset($_POST['recovery_name_register'])) {
        $recovery_name = $_POST['recovery_name_register'];
    }

    if (isset($_POST['recovery_city_register'])) {
        $recovery_city = $_POST['recovery_city_register'];
    }

    if (isset($_POST['recovery_book_register'])) {
        $recovery_book = $_POST['recovery_book_register'];
    }



    // Roommate Finder section
    if (isset($_POST['visible_register']) && $_POST['visible_register'] == true) {
        $visible = true;

        if (isset($_POST['age_register'])) {
            $age = $_POST['age_register'];
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
    }
*/


    $user = new GatorUser();
    $user->initialize();
    $user->first_name = $first_name;
    $user->last_name = $last_name;
    $user->email = $email;
    $user->password = $password;
    /*
        $user->username = $username;

        $user->visible = $visible;
        $user->age = $age;
        $user->gender = $gender;
        $user->major = $major;
        $user->description = $description;

        $user->recovery_question_school = $recovery_school;
        $user->recovery_question_name = $recovery_name;
        $user->recovery_question_city = $recovery_city;
        $user->recovery_question_book = $recovery_book;
    */
    $result = $user->insert();
    GatorHub::console_log($result);
    if ($result) {
        session_start();
        $_SESSION['sys_id'] = $user->sys_id;
        $_SESSION['active'] = $user->active;
        $_SESSION['admin'] = $user->admin;
        $_SESSION['first_name'] = $user->first_name;
        $_SESSION['last_name'] = $user->last_name;
        //$_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['major'] = $user->major;
        $_SESSION['age'] = $user->age;
        $_SESSION['gender'] = $user->gender;
        $_SESSION['visible'] = $user->visible;
        $_SESSION['description'] = $user->description;
        redirectTo('/views/index.php');


    }
    else {
        redirectTo('/views/include/restricted.php');
    }
}









