<!-- !!!!!!!!!!BEFORE PROJECT SUBMISSION, MUST MOVE ALL SCRIPT AND/OR PHP CODE TO A SEPARATE FILE IN /CONTROLLER!!!!!!!-->
<!-- !!!!!!!!!!BEFORE PROJECT SUBMISSION, MUST MOVE ALL SCRIPT AND/OR PHP CODE TO A SEPARATE FILE IN /CONTROLLER!!!!!!!-->
<!-- !!!!!!!!!!BEFORE PROJECT SUBMISSION, MUST MOVE ALL SCRIPT AND/OR PHP CODE TO A SEPARATE FILE IN /CONTROLLER!!!!!!!-->
<!-- !!!!!!!!!!BEFORE PROJECT SUBMISSION, MUST MOVE ALL SCRIPT AND/OR PHP CODE TO A SEPARATE FILE IN /CONTROLLER!!!!!!!-->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- revised includes -->
    <link href="/assets/for_register/global.css" type="text/css" rel="stylesheet">
    <script src="/assets/for_register/jquery.min.js"></script>
    <script src="/assets/for_register/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/for_register/validate.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php' ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/models/GatorUser.php' ?>

<!-- Banner -->
<section id="banner_abt">
    <div class="col-md-12">
        <div class="container">
            <div class="container-xl">
                <h3 class="text-center">Register for GatorHub: Exclusive to SFSU</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-1 col-xs-2"></div>
            <div class="col-md-6 col-sm-10 col-xs-10">

                <!-- form start -->
                <form id ="form" class="needs-validation" action="/controller/user/insertUser.php" method=POST
                      oninput='//confirm_email.setCustomValidity(confirm_email.value != email.value ? "Email_id do not match." : "")'>

                    <!-- Title -->

                    <div class="m-4">
                        <h3 style="text-align:center">Step 1: Fill in info</h3>
                        <h6 style="text-align:center"><span style="color: red">*</span>Required</h6>
                    </div>

                    <!-- First Name and Last Name -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name" class="formText"><span style="color: red">*</span> First
                                Name</label>
                            <input type="text" name="firstname_register" class="form-control" id="first_name"
                                   maxlength="40"
                                   required="true" placeholder="First Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="last_name" class="formText"><span style="color: red">*</span> Last Name</label>
                            <input type="text" name="lastname_register" class="form-control" id="last_name"
                                   maxlength="40"
                                   required="true" placeholder="Last Name">
                        </div>
                    </div>

                    <!-- Email and Confirm Email -->
                    <div class="row" id="email">
                        <!-- Email -->
                        <div class="form-group col-md-6">
                            <label for="email"><span style="color: red">*</span> Email</label>
                            <div class="input-group mb-3">
                                <input type="text" name="email_register" class="form-control" id="email_register"
                                       required="true" maxlength="40"
                                       placeholder="Email" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">
                                <!--                                <div class="input-group-append">-->
                                <!--                                    <span class="input-group-text" id="basic-addon2">@mail.sfsu.edu</span>-->
                                <!--                                </div>-->
                            </div>
                        </div>

                        <!-- Confirm Email -->
                        <div class="form-group col-md-6" id="confirm_email">
                            <label for="confirm_email_register"><span style="color: red">*</span> Confirm Email</label>
                            <div class="input-group mb-3">
                                <input type="text" name="confirm_email" class="form-control" id="email_confirm_register"
                                       required="true" maxlength="40"
                                       placeholder="Email" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">
                                <!--                                <div class="input-group-append">-->
                                <!--                                    <span class="input-group-text" id="basic-addon2">@mail.sfsu.edu</span>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                    </div>


                    <!-- Password -->
                    <div class="row" id="password">
                        <div class="form-group col-md-6">
                            <label for="password" class="formText"><span style="color: red">*</span> Password</label>
                            <input type="password" id="password" name="password_register" class="form-control"
                                   id="password"
                                   maxlength="20"
                                   required="true" placeholder="Password">
                            <small id="passwordHelpInline" class="text-muted">
                                Must be 8-20 characters long. </small>
                        </div>

                        <div class="form-group col-md-6" id="confirm_password">
                            <label for="confirm_password" class="formText"><span style="color: red">*</span> Confirm
                                Password</label>
                            <input type="password" id="confirm_password" name="password_confirm_register"
                                   class="form-control" id="confirm_password"
                                   maxlength="20" required="true" placeholder="Password">
                            <small id="passwordHelpInline" class="text-muted">
                                Confirm your password</small>
                        </div>
                    </div>
                    <br><br>

                    <!--
                                        <script>
                                            // show or hide the optional roommate finder section
                                            function showRoommateFinder() {
                                                var checkbox = document.getElementById('show_roommate_finder').checked;
                                                var roommate_finder = document.getElementById('roommate_finder');
                                                if (checkbox == true) {
                                                    roommate_finder.style.display = "block";
                                                } else {
                                                    roommate_finder.style.display = "none";
                                                }
                    
                                            }
                                        </script>
                    -->
                    <!-- Checkbox To Show Roommate Finder -->
                    <!--                    <div class="checkbox">-->
                    <!--                        <label>-->
                    <!--                            <input type="checkbox" name="visible_register" onclick="showRoommateFinder()" value="true"-->
                    <!--                                   id="show_roommate_finder"> I-->
                    <!--                            would like to be part of Roommate Finder-->
                    <!--                        </label>-->
                    <!--                    </div>-->
                    <!--                    <br>-->
                    <!---->
                    <!--                    <div id="roommate_finder">-->
                    <!-- auto hide Roommate Finder on page load -->
                    <!--                        <script>document.getElementById('roommate_finder').style.display = "none";</script>-->
                    <!---->
                    <!-------------- Step 3: Roommate Finder profile -------------->
                    <!--                        <h4 style="text-align:center">Roommate Finder. Describe yourself and find potential-->
                    <!--                            roommates</h4>-->
                    <!--                        <br>-->
                    <!---->
                    <!-- Age and Gender -->
                    <!--                        <div class="row">-->
                    <!--                            <div class="form-group col-md-6">-->
                    <!--                                <label for="age" class="formText">Age</label>-->
                    <!--                                <input type="number" name="age_register" class="form-control" id="age" maxlength="3">-->
                    <!--                            </div>-->
                    <!---->
                    <!--                            <div class="form-group col-md-6">-->
                    <!--                                <label for="gender" class="formText">Gender</label>-->
                    <!--                                <select class="form-control" name="gender_register" id="gender">-->
                    <!--                                    <option></option>-->
                    <!--                                    <option value="male">Male</option>-->
                    <!--                                    <option value="female">Female</option>-->
                    <!--                                    <option value="other">Other</option>-->
                    <!--                                </select>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!---->
                    <!-- Major -->
                    <!--                        <div class="row">-->
                    <!--                            <div class="form-group col-md-12">-->
                    <!--                                <label for="major" class="formText">Major</label>-->
                    <!--                                <input type="text" class="form-control" id="major" name="major_register"-->
                    <!--                                       placeholder="Computer Science">-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!---->
                    <!-- Bio -->
                    <!--                        <div>-->
                    <!--                            <label for="description_register" class="formText">Biography</label>-->
                    <!--                            <textarea class="form-control col-md-12" name="description_register"-->
                    <!--                                      id="description_register"-->
                    <!--                                      placeholder="I enjoy programming and watch cat videos"-->
                    <!--                                      rows="3"></textarea>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <br><br><br>-->


                    <!--
                                        <h3 style="text-align:center">Step 2: Account Recovery Questions</h3>
                                        <h6 style="text-align:center">Please provide answers for each recovery question for use in account
                                            recovery</h6>
                    
                    
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="password" class="formText"><span style="color: red">*</span> What is the name of
                                                    your elementary school?</label>
                                                <input type="text" name="recovery_school_register" class="form-control" id="school"
                                                       maxlength="20"
                                                       required="true">
                                            </div>
                                        </div>
                    
                    
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="password" class="formText"><span style="color: red">*</span> What is your
                                                    mother's
                                                    maiden name?</label>
                                                <input type="text" name="recovery_name_register" class="form-control" id="name"
                                                       maxlength="20"
                                                       required="true">
                                            </div>
                                        </div>
                    
                    
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="password" class="formText"><span style="color: red">*</span> What city were you
                                                    born
                                                    in?</label>
                                                <input type="text" name="recovery_city_register" class="form-control" id="city"
                                                       maxlength="20"
                                                       required="true">
                                            </div>
                                        </div>
                    
                    
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="password" class="formText"><span style="color: red">*</span> What is your
                                                    favorite
                                                    book?</label>
                                                <input type="text" name="recovery_book_register" class="form-control" id="book"
                                                       maxlength="20"
                                                       required="true">
                                            </div>
                                        </div>
                                        <br><br><br><br>
                    -->

                    <!-- I Am Not A Robot -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="g-recaptcha" data-sitekey="6LfSKrMZAAAAAJ6RCQ9t3bt0Zl1UBh31Hab5PYtr"></div>
                        </div>

                    </div>


                    <!-- Agree -->
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="terms" required="true"> <span style="color: red">*</span> I
                            accept that is website is for demonstration
                            purposes
                        </label>
                    </div>
                    <br>


                    <!-- Submit Button -->
                    <div class="submit">
                        <button type="submit" class="btn btn-dark btn-default" id="submit">Submit</button>
                    </div>
                    <br>


                </form>
                <!--  form end  -->
            </div>
            <div class="col-md-3 col-sm-1 col-xs-2"></div>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/include/footer.php' ?>

<!-- Script Tags -->
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async
        defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<!-- white divider
<div class="row">
    <div class="form-group col-md-12">
        <hr>
    </div>
</div> --?