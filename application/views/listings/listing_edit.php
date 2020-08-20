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
    <link rel="stylesheet" href="/views/assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bower_components/bootstrap-horizon/bootstrap-horizon.css">

    <!-- revised includes -->
    <link href="/assets/for_register/global.css" type="text/css" rel="stylesheet">
    <script src="/assets/for_register/jquery.min.js"></script>
    <script src="/assets/for_register/bootstrap.min.js"></script>
  <!--  <script type="text/javascript" src="/assets/for_register/validate.js"></script>-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php') ?>
<?php requireLogin(); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/controller/listing/listing_edit_onload.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/models/GatorImages.php') ?>
<!-- Banner -->
<section id="banner_abt">
    <div class="col-md-12">
        <div class="container">
            <div class="container-xl">
                <h3 class="text-center">Edit Your Listing</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-md-3 col-sm-1 col-xs-2"></div>
            <div class="col-md-6 col-sm-10 col-xs-10">

                <!-- form start -->
                <form class="needs-validation" action="/controller/listing/listing_update.php?sys_id=<?php echo $listing->sys_id ?>" method="POST" enctype="multipart/form-data">


                    <!-- Street Address -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="address" class="formText">Street Address</label>
                            <input type="text" class="form-control" id="address" name="street_address_post"
                                   placeholder="1600 Holloway Ave, San Francisco, CA 94132" maxlength="40"
                                   value="<?php echo $listing->street_address ?>" required="true" readonly>
                        </div>
                    </div>



                    <!-- City, State, Zip Code -->
                    <div class="row">
                        <!-- City -->
                        <div class="form-group col-md-6">
                            <label for="city" class="formText">City</label>
                            <input type="text" name="city_post" class="form-control" id="city"
                                   placeholder="San Francisco" value="<?php echo $listing->city ?>" required="true" readonly>
                        </div>

                        <!-- State -->
                        <div class="form-group col-md-3">
                            <label for="state" class="formText">State</label>
                            <input type="text" name="state_post" class="form-control" id="city"
                                   value="<?php echo $listing->state ?>" placeholder="California"
                                   required="true" readonly>

                        </div>

                        <!-- Zip Code -->
                        <div class="form-group col-md-3">
                            <label for="zip_code" class="formText">Zip</label>
                            <!-- limit 5 integers -->
                            <input type="number" maxlength="5" name="zip_code_post" class="form-control"
                                   id="zip_code" placeholder="94132" value="<?php echo $listing->zip_code ?>" readonly
                                   required="true"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            >
                        </div>
                    </div>
                    <br><br><br>




                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="floor_size" class="formText">Floor Size</label>
                            <input type="number" name="floor_size_post" class="form-control" id="floor_size"
                                   value="<?php echo $listing->floor_size ?>"
                                   maxlength="3">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rooms" class="formText">Number of Rooms</label>
                            <input type="number" name="rooms_post" class="form-control" id="rooms"
                                   value="<?php echo $listing->rooms ?>" maxlength="3">
                        </div>
                    </div>

                    <!-- Price, Listing As, and Type of Property -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="price" class="formText">Price</label>
                            <input type="number" name="price_post" class="form-control" id="price" value="<?php echo $listing->price ?>" maxlength="3">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="payment_type" class="formText"> Listing As</label>
                            <select class="form-control" name="payment_type_post" id="payment_type">
                                <option value=""></option>
                                <option <?php if ($listing->payment_type == 'rent') echo 'selected="selected"'; ?>
                                        value="rent">For Rent
                                </option>
                                <option <?php if ($listing->payment_type == 'buy') echo 'selected="selected"'; ?>
                                        value="buy">For Sale
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="property_type" class="formText"> Type of Property</label>
                            <select class="form-control" name="property_type_post" id="property_type">
                                <option value=""></option>
                                <option <?php if ($listing->property_type == 'apartment') echo 'selected="selected"' ?>
                                        value="apartment">Apartment
                                </option>
                                <option <?php if ($listing->property_type == 'studio') echo 'selected="selected"' ?>
                                        value="studio">Studio
                                </option>
                                <option <?php if ($listing->property_type == 'condominium') echo 'selected="selected"' ?>
                                        value="condominium">Condominium
                                </option>
                                <option <?php if ($listing->property_type == 'house') echo 'selected="selected"' ?>
                                        value="house">House
                                </option>
                            </select>
                        </div>
                    </div>




                    <label><input type="checkbox" id="parking"
                                  name="parking_post" <?php if ($listing->parking == true) echo 'checked' ?>> Is Parking
                        Available?</label>
                    <br>
                    <label><input type="checkbox" id="pets"
                                  name="pets_post" <?php if ($listing->pets == true) echo 'checked' ?>> Allow
                        Pets?</label><br>
                    <br><br><br>


                    <!-- Title -->
                    <div class=" row">
                        <div class="form-group col-md-12">
                            <label for="title" class="formText">Give Your Listing A Name</label>
                            <input type="text" name="title_post" class="form-control" id="title"
                                   value="<?php echo $listing->title ?>">
                        </div>
                    </div>


                    <!-- Description -->
                    <div class=" row">
                        <div class="form-group col-md-12">
                            <label for="description" class="formText">Describe The Home</label>
                            <textarea rows="4" name="description_post" class="form-control" id="description"><?php echo $listing->description ?></textarea>
                        </div>
                    </div>
                    <br><br>

                    <?php $listing->utilities = '1'.$listing->utilities // append a 1 at the front otherwise the first word can't be found using strpos()?>

                    <label>Utilities Provided</label>
                    <div class=" row">
                        <div class="form-group col-md-3">
                            <label><input type="checkbox" id="gas" name="gas_post" <?php if (strpos($listing->utilities, 'gas') == true) echo 'checked'; ?>> Gas</label><br>

                            <label><input type="checkbox" id="electricity" name="electricity_post" <?php if (strpos($listing->utilities, 'electricity')) echo 'checked'; ?>>
                                Electricity</label><br>

                            <label><input type="checkbox" id="water" name="water_post" <?php if (strpos($listing->utilities, 'water')) echo 'checked'; ?>>
                                Water</label><br>
                        </div>

                        <div class="form-group col-md-3">
                            <label><input type="checkbox" id="cable" name="cable_post" <?php if (strpos($listing->utilities, 'cable')) echo 'checked'; ?>>
                                Cable</label><br>

                            <label><input type="checkbox" id="wifi" name="wifi_post" <?php if (strpos($listing->utilities, 'wifi')) echo 'checked'; ?>>
                                Wifi</label><br>

                            <label><input type="checkbox" id="laundry" name="laundry_post" value="true" <?php if (strpos($listing->utilities, 'laundry')) echo 'checked'; ?>> Laundry</label><br>
                        </div>
                    </div>
                    <br><br>

                    <!-- Current Images/ delete -->
                    <label>Your Listing Images</label>
                <div class="row">
                    <div class="col-md-3">
                        <img src='/views/listing_images/<?php echo $listing->image; ?>' class="img-thumbnail">
                    </div>
                    <?php


                    $carousel_images = new GatorImages();
                    $carousel_images->addQuery('listing_id', '=', $listing->sys_id);
                    $carousel_images->query();
                    while ($carousel_images->next()) {
                        ?>
                        <div class="col-md-3 ">
                            <img class="img-thumbnail" src="/views/listing_images/<?php echo $carousel_images->path; ?>">
                        </div>
                        <?php
                    }
                    ?>
                </div>


                    <!-- Replace Current Header Image -->
                    <br>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="image" class="formText">Upload a New Header Image</label>
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
                            <div class="g-recaptcha"
                                 data-sitekey="6LfSKrMZAAAAAJ6RCQ9t3bt0Zl1UBh31Hab5PYtr"></div>
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