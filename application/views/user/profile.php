<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">
    <link rel="stylesheet" href="/views/assets/style.css">
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php' ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/controller/user/profile_onload.php' ?>

<!-- Banner -->
<section id="banner_abt">
    <div class="col-md-12">
        <div class="container">
            <div class="container-lg">
                <h3 class="text-center">Gatorhub</h3>
            </div>
        </div>
    </div>
</section>


<!-- PROFILE -->
<section id="profile">

    <div class="container-fluid p-4 w-50 ">
        <div class="card-body p-3 mx-3">

            <form method="POST" action="/controller/user/profile_update.php">
                <h2 class="text-center">Manage Your Profile</h2>
                <br>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email_profile" value="<?php echo $user->email ?>"
                           placeholder="Email" readonly>
                </div>

                <!-- First Name -->
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" class="form-control" name="firstname_profile" style="font-weight: bold" value="<?php echo $user->first_name ?>">
                </div>

                <!-- Last Name -->
                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input type="text" class="form-control" name="lastname_profile" style="font-weight: bold" value="<?php echo $user->last_name ?>">
                </div>


                <!-- Username
                <div class="form-group">
                    <label for="address">User Name</label>
                    <input type="text" class="form-control" name="username_profile" placeholder="<?php //echo $user->username ?>>">
                </div>
                -->

                <!-- Password -->
                <div class="form-group">
                    <label for="address">Password</label>
                    <input type="text" class="form-control" name="password_profile"
                           placeholder="Change your password or leave it blank to skip">
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="address">Confirm Password</label>
                    <input type="text" class="form-control" name="password_confirm_profile"
                           placeholder="Change your password or leave it blank to skip">
                </div>

                <div>
                    <button class="btn btn-secondary btn-block-lg btn btn-dark text-right">Save</button>
                    <!--<a href="/views/user/profile.php" class="btn btn-secondary btn-block-lg btn btn-dark text-right">
                        Save</a>-->
            </form>
        </div>
    </div>
</section>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/include/footer.php' ?>


<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

</body>

</html>