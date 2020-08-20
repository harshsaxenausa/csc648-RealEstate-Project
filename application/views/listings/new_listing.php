
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
    <link rel="stylesheet" href="/bower_components/bootstrap-horizon/bootstrap-horizon.css">

    <!-- revised includes -->
    <link href="/assets/for_register/global.css" type="text/css" rel="stylesheet">
    <script src="/assets/for_register/jquery.min.js"></script>
    <script src="/assets/for_register/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/for_register/validate.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/controller/redirect.php');
requireLogin();
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-1 col-xs-2"></div>
        <div class="col-md-6 col-sm-10 col-xs-10">

            <!-- form start -->
            <form class="needs-validation" action="/controller/listing/listing_insert.php" enctype="multipart/form-data" method=POST>

                <!-- Title -->
                <br>
                <h2 style="text-align: center; color: black">Create A Listing</h2>
                <br>

                <p>Please fill out all the * mandatory fields before continuing</p><br><br>


                <!-- Street Address -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="address" class="formText">Street Address</label>
                        <input type="text" class="form-control" id="address" name="street_address_post"
                               placeholder="1600 Holloway Ave." pattern="[A-Za-z0-9.\s]+"
                               required minlength ="1" maxlength="40">
                    </div>
                </div>


                <!-- City, State, Zip Code -->
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="city" class="formText">City</label>
                        <input type="text" name="city_post" class="form-control" id="city" placeholder="San Francisco"
                               pattern="[A-Za-z]+" required minlength="1" maxlength="40">
                    </div>


                    <div class="form-group col-md-3">
                        <label for="selectState">State</label>
                        <select class="custom-select" name="state_post" id="state" required>
                            <option value="" selected="selected">Select a State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>



                    </div>

                    <!-- Zip Code -->
                    <div class="form-group col-md-3">
                        <label for="zip_code" class="formText">Zip</label>
                        <!-- limit 5 integers -->
                        <input type="number" maxlength="5" name="zip_code_post" class="form-control" id="zip_code"
                               placeholder="94132"
                               required="true"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        >
                    </div>
                </div>
                <br><br><br>


                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="floor_size" class="formText">Floor Size</label>
                        <input type="number" name="floor_size_post" class="form-control" id="floor_size" pattern="[0-9]+" required minlength="1" maxlength="3">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rooms" class="formText">Number of Rooms</label>
                        <input type="number" name="rooms_post" class="form-control" id="rooms" pattern="[0-9]+" required minlength="1" maxlength="3">
                    </div>
                </div>



                <!-- Price, Listing As, and Type of Property -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="price" class="formText">Price</label>
                        <input type="number" name="price_post" class="form-control" id="price" pattern="[0-9]+" required minlength="1" maxlength="15">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="payment_type" class="formText"> Listing As</label>
                        <select class="form-control" name="payment_type_post" id="payment_type">
                            <option value=""></option>
                            <option value="rent">For Rent</option>
                            <option value="buy">For Sale</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="property_type" class="formText"> Type of Property</label>
                        <select class="form-control" name="property_type_post" id="property_type">
                            <option value=""></option>
                            <option value="apartment">Apartment</option>
                            <option value="studio">Studio</option>
                            <option value="condominium">Condominium</option>
                            <option value="house">House</option>
                        </select>
                    </div>
                </div>


                <label><input type="checkbox" id="parking" name="parking_post" value="true"> Is Parking
                    Available?</label><br>
                <label><input type="checkbox" id="pets" name="pets_post" value="true"> Allow Pets?</label><br>
                <br><br><br>


                <!-- Title -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="title" class="formText">Give Your Listing A Name</label>
                        <input type="text" name="title_post" class="form-control" id="title">
                    </div>
                </div>


                <!-- Description -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description" class="formText">Describe The Home</label>
                        <textarea rows="4" name="description_post" class="form-control" id="description"></textarea>
                    </div>
                </div>
                <br><br>

                <label>Utilities Provided</label>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label><input type="checkbox" id="gas" name="gas_post" value="true"> Gas</label><br>

                        <label><input type="checkbox" id="electricity" name="electricity_post" value="true">
                            Electricity</label><br>

                        <label><input type="checkbox" id="water" name="water_post" value="true"> Water</label><br>
                    </div>

                    <div class="form-group col-md-3">
                        <label><input type="checkbox" id="cable" name="cable_post" value="true"> Cable</label><br>

                        <label><input type="checkbox" id="wifi" name="wifi_post" value="true"> Wifi</label><br>

                        <label><input type="checkbox" id="laundry" name="laundry_post" value="true"> Laundry</label><br>
                    </div>
                </div>
                <br><br>

                <!-- Upload Header Image -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="image" class="formText">Upload Header Image</label>
                       <input type="file" accept="image/*" class="form-control" id="image" name="image">
                    </div>
                </div>
                <br><br>

                <!-- Upload Addtl Image -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="addtl_images" class="formText">Upload Additional Images</label>
                        <input type="file" accept="image/*" class="form-control" id="addtl_images" name="addtl_images[]" multiple>
                    </div>
                </div>
                <br><br>


                <!-- I Am Not A Robot -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="g-recaptcha" data-sitekey="6LfSKrMZAAAAAJ6RCQ9t3bt0Zl1UBh31Hab5PYtr"></div>
                    </div>

                </div>
                <br><br>

                <!-- Submit Button -->
                <div class="submit">
                    <button type="submit" class="btn btn-dark btn-default" id="submit">Submit</button>
                </div>
                <br>


            </form>
            <!--  form end  -->
        </div>

    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/views/include/footer.php') ?>

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