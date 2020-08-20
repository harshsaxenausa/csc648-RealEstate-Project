<!--/**-->
<!--* @author Tania Nemeth-->
<!--* added drop down menu-->
<!--*/-->
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="/views/assets/dropdown_menu.css">

</head>
<body>


<div class="navbar-nav ml-auto">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>

        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </head>


    <body>


    <div class="dropdown" >
        <?php
        $first_initial = strtoupper(substr($_SESSION['first_name'], 0, 1));
        $last_initial = strtoupper(substr($_SESSION['last_name'], 0 , 1));
        printf('<button class="dropbtn">%s %s</button>',$first_initial, $last_initial);

        ?>


        <!-- <div class="btn-group">
      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
      </button> -->
      <div class="dropdown-content">
        <a class="dropdown-item" href="/views/listings/new_listing.php">New Listing</a>
        <a class="dropdown-item" href="/views/user/profile.php">Profile</a>
        <a class="dropdown-item" href="/views/user/user_dashboard.php">Dashboard</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/controller/logout.php">Logout</a>
      </div>
    </div>






    <script  src="js/index.js"></script>



    </body>

</html>
</div>


<script>
    function redirectTo() {

    }
</script>