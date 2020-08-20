<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php';

// if user already logged in, redirect to index.php homepage
if (isset($_SESSION['sys_id'])) {
    redirectTo('/views/index.php');
}
?>


<!-- Banner -->
<section id="banner_abt">
    <div class="col-md-15">
        <div class="container">
            <div class="container-lg">
                <h2 class="text-center">Welcome to Gatorhub!</h2>
                <h6 class="text-center">Connecting SFSU students and faculty to the best housing ....</h6>

            </div>
        </div>
    </div>
</section>

<!-- Announcement -->
<div class="container-fluid p-5">
    <div class="card text-center">
        <h3>Login</h3>

        <div class="card-body">
            <h6 class="card-title">You must be logged in to access the requested page</h6>

            <form class="m-3" method=POST action="/controller/login.php">

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email_login" aria-describedby="emailHelp"
                           placeholder="Enter email">
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password_login"
                           placeholder="Enter Password">
                </div>

                <!-- Don't have an account? Sign up -->
                <div class="form-check">
                    <label id="emailHelp" class="form-text text-muted"><a href="/views/user/register.php">Dont have an
                            account? Sign up</a></label>
                    <br><br>
                    <button type="submit" class="btn btn-primary btn-dark">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/include/footer.php'; ?>
<!-- Script Tags -->
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
