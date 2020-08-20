<?php

logout();

// from https://www.php.net/session_destroy
function logout() {

    // Initialize the session
    session_start();

    // Unset all of the session variable
    $_SESSION = array();

    // Annihilate the session
    session_destroy();

    // redirect to index.php homepage
    echo "<script type='text/javascript'>window.top.location='/views/index.php';</script>"; exit;


}

