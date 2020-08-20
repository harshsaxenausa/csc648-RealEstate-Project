<?php

// checks if user has logged in (session_variable sys_id is valid)
function requireLogin() {
    if (!isset($_SESSION['sys_id'])) {
        echo "<script type='text/javascript'>window.top.location='/views/include/restricted.php'</script>"; exit;
    }
}



// redirects user to specified page, e.g redirectTo('/views/user/register.php') brings up user registration
function redirectTo($page) {
    echo "<script type='text/javascript'>window.top.location='$page'</script>"; exit;
}
?>