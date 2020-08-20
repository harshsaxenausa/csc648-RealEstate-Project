<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
  <title>Bootstrap Theme</title>
</head>

<body>
<?php include 'header.php';?>


    <!-- Banner -->
    <section id="banner_abt">
            <div class="col-md-15">
                <div class="container">
                    <div class="container-lg">
                        <h2 class = "text-center">Search GatorHub!</h2>
                        <h6 class = "text-center">Connecting SFSU students and faculty to the best housing ....</h6>
                       

                    <!-- Search -->
                    <form method="POST" action="../result.php">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">

                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 m-1">
                            <input type="text" name="search" class="form-control search-slt" placeholder="e.g Pill Hill">
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 m-1">
                            <input type="text" name="min" class="form-control search-slt" placeholder="$ minimum">
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 m-1">
                            <input type="text" name="max" class="form-control search-slt" placeholder="$ maximum">
                        </div>

                        <!-- Property Type -->
                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 m-1">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="property_type">
                                <option>Property Type</option>
                                <option>Apartment</option>
                                <option>Studio</option>
                                <option>Condominium</option>
                                <option>House</option>
                            </select>
                        </div>

                         <!-- Payment Type -->
                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 m-1">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="payment_type">
                                <option>Payment Type</option>
                                <option>Rent</option>
                                <option>Buy</option>
                            </select>
                        </div>

                        <!-- Submit btn -->
                        <div class="col-lg-1 col-md-5 col-sm-5 p-0 m-1">
                            <input type="submit" class="btn btn-dark">
                        </div>
                    </div>
                </div>
            </div>
        </form>               
        </div>
        </div>
        </div>
    </section>

   <!-- Announcement -->
   <div class="container-fluid p-3">
    <div class="col-md-3">
          <div class="card text-center mt-5">
            <span class="border border-dark">
              <div class="header">        
                <h5 class="card-header">Filter By:</h5>
            </div>         
              <div class="card-body">                
                <div class="btn-group-vertical">                    
                    <a href="#" class="btn btn-primary btn-dark mt-3 bg-secondary">Price</a>
                    <a href="#" class="btn btn-primary btn-dark mt-3 bg-secondary">Distance</a>
                    <a href="#" class="btn btn-primary btn-dark mt-3 bg-secondary">Bedrooms</a> 
                </div>
                </span>                
              </div>
        </div>
      </div>
<!--     </div> -->
    
    <div class="container">
  <div class="row">
    <div class="col-sm">
       <div class="card py-4 mb-4">
        <img class="card-img-top" src="..." alt="listing_img">
        <div class="card-body col-md-5">
        <h5 class="card-title">Listing</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    </div>
    <div class="col-sm">
       <div class="card py-4 mb-4">
        <img class="card-img-top" src="..." alt="listing_img">
        <div class="card-body col-md-5">
        <h5 class="card-title">Listing</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    </div>
    <div class="col-sm">
       <div class="card py-4 mb-4">
        <img class="card-img-top" src="..." alt="listing_img">
        <div class="card-body col-md-5">
        <h5 class="card-title">Listing</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    </div>        
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-sm">
     <div class="card py-4 mb-4">
        <img class="card-img-top" src="..." alt="listing_img">
        <div class="card-body col-md-5">
        <h5 class="card-title">Listing</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    </div>
    <div class="col-sm">
           <div class="card py-4 mb-4">
        <img class="card-img-top" src="..." alt="listing_img">
        <div class="card-body col-md-5">
        <h5 class="card-title">Listing</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    </div>
    <div class="col-sm">
           <div class="card py-4 mb-4">
        <img class="card-img-top" src="..." alt="listing_img">
        <div class="card-body col-md-5">
        <h5 class="card-title">Listing</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    </div>
  </div>
</div>

<!-- See all -->
<div class="d-flex justify-content-center">
  <button class="btn btn-default"><a href="#" class="btn btn-primary btn-dark btn-lg p-2">See all</a></button>
</div>
            </div>
          </div>
        </div>
</div></div>
   <?php include 'footer.php';?>


  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    CKEDITOR.replace('editor1');
  </script>
</body>

</html>