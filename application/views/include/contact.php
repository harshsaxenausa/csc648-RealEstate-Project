<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title> SFSU Software Engineering Project CSC 648-848, Summer 2020.  For Demonstration Only</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="assets/style.css">
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-horizon/bootstrap-horizon.css">
</head>
<body>
<?php include 'header.php';?>


    <!-- Banner -->
    <section id="banner_abt">
            <div class="col-md-15">
                <div class="container">
                    <div class="container-lg">
                        <h2 class = "text-center">Welcome to Gatorhub!</h2>
                        <h6 class = "text-center">Connecting SFSU students and faculty to the best housing ....</h6>
              
</div>
</div></div>
</section>

   <!-- Announcement -->
   <div class="container-fluid p-5">
    <div class="card text-center">
        <h3><div class="card-header">Contact us</div></h3>
        <div class="card-body">
            <h6 class="card-title">Your opinion matters. Let us know what you think by filling out this form.</h6>
            <!-- <p class="card-text"></p> -->
            <form class = "m-2">

            <div class="form-row">
                <div class="col">
                <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="Last name">
                </div>
            </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <textarea class="form-control col-md-12" name="description_register" id="description_register"
                                  placeholder="Comments/Questions/Concerns"
                                  rows="3"></textarea>

                <div class="custom-file mx-auto m-3 ">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <button type="submit" class="btn btn-primary btn-dark m-3">Submit</button>
            </form>
            
        </div>
    </div>
    </div


<?php include 'footer.php';?>
<!-- Script Tags -->
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
