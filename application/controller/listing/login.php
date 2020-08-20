<?php
include($_SERVER['DOCUMENT_ROOT'].'/models/GatorHub.php');
include($_SERVER['DOCUMENT_ROOT'].'/models/GatorUser.php');
include($_SERVER['DOCUMENT_ROOT'].'/controller/redirect.php');

// if user is not logged in, perform the login
if (!isset($_SESSION['sys_id'])) {
    login();
}
// if user is already logged in, redirect to index.php homepage
else {
    redirectTo('/views/index.php');
}



function login()
{
    $email = '';
    $password = '';

    // grab email and password from login form fields
    if (isset($_POST['email_login'])) {
        $email = $_POST['email_login'];
    }

    if (isset($_POST['password_login'])) {
        $password = $_POST['password_login'];
    }

    // query the user table for a record matching the form's email and password
    $login = new GatorUser();
    $login->addQuery('email', '=', $email);
    $login->query();

    // if login credentials matches the database record's email and hashed password, set session variables and log them in
    if ($login->next() && password_verify($password, $login->password)) {
        session_start();
        $_SESSION['sys_id'] = $login->sys_id;
        $_SESSION['active'] = $login->active;
        $_SESSION['admin'] = $login->admin;
        $_SESSION['first_name'] = $login->first_name;
        $_SESSION['last_name'] = $login->last_name;
        $_SESSION['username'] = $login->username;
        $_SESSION['email'] = $login->email;
        $_SESSION['major'] = $login->major;
        $_SESSION['age'] = $login->age;
        $_SESSION['gender'] = $login->gender;
        $_SESSION['visible'] = $login->visible;
        $_SESSION['description'] = $login->description;
        redirectTo('/views/index.php');
    }
    else {

        redirectTo('/views/include/restricted.php');
    }
}





?>

