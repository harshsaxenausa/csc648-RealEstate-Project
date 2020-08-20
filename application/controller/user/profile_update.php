<?php
include $_SERVER['DOCUMENT_ROOT'] . '/models/GatorUser.php';
include($_SERVER['DOCUMENT_ROOT'] . '/controller/redirect.php');


// get access to $_SESSION['sys_id'] to identify the current logged on user
session_start();


/**
 * This file is to be ran onSubmit when the user clicks save in profile.php
 */
profileUpdate();

function profileUpdate() {

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


    // set local variables using profile page form fields
    if (isset($_POST['firstname_profile'])) {
        $first_name = $_POST['firstname_profile'];
    }

    if (isset($_POST['lastname_profile'])) {
        $last_name = $_POST['lastname_profile'];
    }


    if (isset($_POST['password_profile'])) {
        $password = $_POST['password_profile'];
    }

/*
    if (isset($_POST['age_profile'])) {
        $age = $_POST['age_profile'];
    }

    if (isset($_POST['visible_profile'])) {
        if ($_POST['visible_profile'] == 'true') {
            $visible = 1;
        }
        else if($_POST['visible_profile'] == 'false') {
            $visible = 0;
        }
        // default to invisible if something's wrong
        else {
            $visible = 0;
        }
    }

    if (isset($_POST['gender_profile'])) {
        $gender = $_POST['gender_profile'];
    }

    if (isset($_POST['major_profile'])) {
        $major = $_POST['major_profile'];
    }

    if (isset($_POST['description_profile'])) {
        $description = $_POST['description_profile'];
    }

    if (isset($_POST['recovery_question_school_profile'])) {
        $recovery_question_school = $_POST['recovery_question_school_profile'];
    }

    if (isset($_POST['recovery_question_name_register'])) {
        $recovery_question_name = $_POST['recovery_question_name_profile'];
    }

    if (isset($_POST['recovery_question_city_register'])) {
        $recovery_question_city = $_POST['recovery_question_city_profile'];
    }

    if (isset($_POST['recovery_question_book_register'])) {
        $recovery_question_book = $_POST['recovery_question_book_profile'];
    }
*/


    // get the current user's record
    $user = new GatorUser();
    $user->get($_SESSION['sys_id']);


    $user->first_name = $first_name;
    $user->last_name = $last_name;
    //$user->email = $email;        // not allowed to change email
    $user->password = $password;

    /* // not time to implement
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

    // perform update
    $user->update();

    // redirect to the profile page
    redirectTo('/views/user/profile.php');
}

?>
