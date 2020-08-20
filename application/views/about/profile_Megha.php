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
  <link rel="stylesheet" href="css/style.css">
  <title>Bootstrap Theme</title>
</head>

<body>
<?php include 'header.php';?>

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-secondary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
            <i class="fas fa-user"></i> Edit Profile</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="index.html" class="btn btn-secondary btn-block">
            <i class="fas fa-arrow-left"></i> Back To Homepage
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-secondary btn-block">
            <i class="fas fa-lock"></i> Change Password
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-secondary btn-block">
            <i class="fas fa-trash"></i> Delete Account
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- PROFILE -->
  <section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" value="Jacob">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" value="test@test.com" placeholder="Enter your email">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" value="email" placeholder="Enter your Address">
                </div>
                <div class="form-group">
                  <label for="age">Age</label>
                  <input type="number" class="form-control" value="something" placeholder="Enter your age">
                </div>
                <div class="form-group">
                  <label for="sfsu">SFSU Affilation</label>
                  <input type="textarea" class="form-control" value="text" placeholder="Enter SFSU Affilation">
                </div>
                <div class="form-group">
                  <label for="text">Area of Study</label>
                  <input type="textarea" class="form-control" value="something" placeholder="Enter your Area of Study">
                </div>
                <div class="form-group">
                  <label for="text">Interests</label>
                  <input type="textarea" class="form-control" value="something" placeholder="Enter your Interests">
                </div>
                 <div class="form-group">
                  <label for="bio">Bio</label>
                  <textarea class="form-control" name="editor1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid unde at fugiat explicabo temporibus, tempora animi sunt iusto quod beatae optio veritatis velit natus odit error! Possimus esse quisquam quibusdam eveniet autem! Minus dolore quisquam nemo similique doloribus perspiciatis tempore.</textarea>
                </div>
                <div></div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
        	<div class="card">
          <h3>Your Image</h3>
          <img class="card-img-top" src="..." alt="Jacob_img">
          <!-- <img src="img/avatar.png" alt="" class="d-block img-fluid mb-3"> -->
          <button class="btn btn-secondary btn-block">Edit Image</button>
          <button class="btn btn-secondary btn-block">Delete Image</button>
        </div>
      </div>
    </div>
</div>
  </section>

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