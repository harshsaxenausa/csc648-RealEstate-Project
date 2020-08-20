<?php
include $_SERVER['DOCUMENT_ROOT'] . '/models/GatorUser.php';



/**
 * This file is to be included at the top of profile.php, to be run onLoad
 *
 * How to use: assign values from $user object to form fields, e.g <input value= <?php echo $user->first_name?> >
 */
$user = loadProfile();

function loadProfile() {

    // get user record
    $user = new GatorUser();
    $user->get($_SESSION['sys_id']);

    return $user;
}
?>