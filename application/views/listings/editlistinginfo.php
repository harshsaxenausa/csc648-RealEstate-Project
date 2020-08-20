<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020.  For Demonstration Only</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../../assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bower_components/bootstrap-horizon/bootstrap-horizon.css">
</head>
<body>
<?php include '../include/header.php';?>

<!-- Banner -->
<section id="banner_abt">
    <div class="col-md-15">
        <div class="container">
            <div class="container-lg">
                <h2 class = "text-center">Create/Edit/Delete Listing</h2>
            </div>
        </div>
    </div>
</section>

    <!-- Listing -->
<div>
    <?php
    if (isset($_GET['search_string'])) {
        ?>
        <a href="<?php echo URL . 'searchResults/index?back_search_string=' . $_GET['search_string']; ?>"
           class="btn btn-info btn-lg" role="button">Back To Search</a>
        <?php


    }



    ?>
    

    <div class="container" style="height: 80%; min-height: 400px;">
  <div class="row" style="width:100%; padding-top: 100px;">
    <div class="col-md-4">
     

     <div id="new-listing-btn" class="btn btn-dark btn-default"  data-toggle="modal" data-target="#propertyPhotos">New Listing</div>
    </div>

   
     <div class="col-md-4 ">
        Please Enter Listing Id :
        <input type="text" name="listing_id" id="listing_id_edit"><br/><br/>
      <div id="edit-listing-btn" class="btn btn-dark btn-default"  data-toggle="modal" data-target="#propertyPhotos">Edit Listing</div>
   
    </div>

    <div class="col-md-4 ">
         Please Enter Listing Id :
        <input type="text" name="listing_id" id="listing_id_delete"><br/><br/>
        <div id="delete-listing-btn" class="btn btn-dark btn-default">Delete Listing</div>
   
    </div>

 


    </div>
   
  </div>
</div>


    <!-- Listing -->




<!-- Modal -->
<div class="modal fade" id="propertyPhotos" tabindex="-1" role="dialog" aria-labelledby="propertyPhotoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   
<form class="form-horizontal"
name= "edit-aprt-form<?php echo $sys_id; ?>"
id=   "new-listing-form"
data-id="<?php echo $sys_id; ?>"
enctype="multipart/form-data"

 method=POST
>

<input type="hidden" name="sys_id" id="sys_id" value="<?php echo $sys_id; ?>">

<input type="hidden" name="active" id="active" value="<?php echo $sys_id; ?>">

<fieldset>

<!-- Text input-->
<div class="control-group">
<label class="control-label" for="Title">Title:</label>
<div class="controls">
<input id="title_insert"
name="title_insert"

class="form-control"
type="text"
placeholder="Title"
class="input-large"
>
</div>
</div>

<!-- Text input-->
<div class="control-group">
<label class="control-label" for="Name">Street Address:</label>
<div class="controls">
<input id=  "street_address_insert"
name="street_address_insert"

class="form-control"
type="text"
placeholder="161 LG Avenue"
class="input-large"
>
</div>
</div>


<div class="control-group">
<label class="control-label" for="Name">City:</label>
<div class="controls">
<input id=  "city_insert"
name="city_insert"

class="form-control"
type="text"
placeholder="California"
class="input-large"
>
</div>
</div>


<div class="control-group">
<label class="control-label" for="Name">State:</label>
<div class="controls">
<input id=  "state_insert"
name="state_insert"

class="form-control"
type="text"
placeholder="California"
class="input-large"
>
</div>
</div>


 <div class="form-group">
    <label for="payment_type_insert">Payment Type</label>
    <select class="form-control" id="payment_type_insert" name="payment_type_insert">
      <option value="rent">Rent</option>
      <option value="buy">Buy</option>
      
    </select>
  </div>


  <div class="form-group" >
    <label for="property_type_insert">Property Type</label>
    <select class="form-control" id="property_type_insert" name="property_type_insert">
      <option value="apartment">Apartment</option>
      <option value="studio">studio</option>
      <option value="condominium">condominium</option>
      <option value="house">house</option>
      
    </select>
  </div>

<!-- Text input-->
<div class="control-group">
<label class="control-label" for="Email">Contact email:</label>
<div class="controls">
<input id=  "Email"
name="Email"

class="form-control"
type= "text"
placeholder="bob@mail.sfsu.edu"
class="input-large"
>
</div>
</div>

<!-- Text input-->
<div class="control-group">
<label class="control-label" for="Number">Contact number:</label>
<div class="controls">
<input id="Number"
name="Number"
class="form-control"
type="text"
placeholder="(123) 456-7890"
class="input-large"
>
</div>
</div>

<!-- Bedrooms input-->
<div class="control-group">
<label class="control-label" for="Bedroom">*Bedrooms:</label>
<input id="rooms_insert"
name="rooms_insert"

class="form-control"
type="text"
placeholder=""
class="input-lg"
>
</div>


<div class="control-group">
<label class="control-label" for="Bedroom">*Floor Size:</label>
<input id="floor_size_insert"
name="floor_size_insert"

class="form-control"
type="text"
placeholder=""
class="input-lg"
>
</div>

<!-- Price input-->
<div class="control-group">
<label class="control-label" for="Price">*Price:</label>
<div class="controls">
<input id="price_insert"
name="price_insert"

class="form-control"
type="text"
placeholder="1000"
class="input-lg"
>
</div>
</div>


<!-- Zipcode input -->
<div class="control-group">
<label class="control-label" for="ZipCode">*Zip Code:</label>
<div class="controls">
<input id="zip_code_insert"
name="zip_code_insert"

class="form-control"
type="text"
placeholder="94132"
class="input-large"
>
</div>
</div>


<div class="control-group">
<label class="control-label" for="distance_to_sfsu_insert">Distance to SFSU:</label>
<div class="controls">
<input id="distance_to_sfsu_insert"
name="distance_to_sfsu_insert"

class="form-control"
type="text"
placeholder="10"
class="input-large"
>
</div>
</div>

<!-- Description input -->
<div class="control-group">
<label  class="control-label" for="desc">Description:</label>
<div class="controls">
<textarea class="form-control"
class="input-large"
rows="5"
id="description_insert"
name="description_insert"
></textarea>
</div>
</div>

<div class="checkbox" class="list-group-item">
<label>
<input type="checkbox"
value="true"
name="pets_insert"
id="pets_insert"

Pet Friendly
</label>
</div>

<div class="checkbox" class="list-group-item">
<label>
<input type="checkbox"
value="true"
name="parking_insert"

Parking Available
</label>
</div>

<div class="checkbox" class="list-group-item">
<label>
<input type="checkbox"
value="true"
name="Laundry"

Floor size
</label>
</div>


<h5> Utilites</h5>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="gas_insert" value="true" name="gas_insert">
  <label class="form-check-label" for="gas_insert">Gas</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="electricity_insert" value="true" name="electricity_insert">
  <label class="form-check-label" for="electricity_insert">Electricity</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="water_insert" value="true" name="water_insert">
  <label class="form-check-label" for="water_insert">Water</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="cable_insert" value="true" name="cable_insert">
  <label class="form-check-label" for="cable_insert">Cable</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="wifi_insert" value="true" name="wifi_insert">
  <label class="form-check-label" for="wifi_insert">Wifi</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="laundry_insert" value="true" name="laundry_insert">
  <label class="form-check-label" for="laundry_insert">Laundry</label>
</div>



<!-- Uploaded images  -->
<div class="control-group multiple-form-group" data-max=10>
<label>Upload Images (max 10):</label>


<div class="form-group input-group" style="padding-left: 15px; padding-right: 15px;">
<input type="hidden"
name="image_id[]"
value="<?php echo htmlspecialchars($images[$keys[$index]]->id, ENT_QUOTES, 'UTF-8'); ?>"
>
<input type="file"
accept="image/*"
name="images[]"
class="form-control"
>
<span class="input-group-btn">

</span>
</div>


<div class="form-group input-group" style="padding-left: 15px; padding-right: 15px;">
<input type="hidden" name="image_id[]" value="">
<input type="file" accept="image/*" name="images[]" class="form-control">
<span class="input-group-btn">
<button type="button" class="btn btn-success btn-add">+</button>
</span>
</div>


</div>

<br>
<div id="editInfoForm_errorloc"></div>

<button type="button" id="submit-new" class="btn btn-success pull-right">Create New</button>
<button type="button" id="submit-edit" style="display: none;" class="btn btn-success pull-right">Update</button>

</fieldset>
</form>



       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>





    <!--Footer--->

<?php include '../include/footer.php';?>
<!-- Script Tags -->
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


     
       <script type="text/javascript">


          function getFormDataAllRequired($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}


function prepare_data(data){

    data.zip_code_insert =parseInt(data.zip_code_insert);

    return data;
  }
  
    
    $(document).ready(function(){

    //    $("#new-listing-form").submit(function(e){
    //     e.preventDefault();
    // });

        //Submit 
        $("#submit-new").on("click",function(){


        new_listing_form= $("#new-listing-form")

       
         new_listing_data = getFormDataAllRequired(new_listing_form);
         console.log(new_listing_data);

         new_listing_data = prepare_data(new_listing_data);

         console.log(new_listing_data);


         json_data = JSON.stringify(new_listing_data);


        $.ajax({
          type: "POST",
          url: "../../controller/listing_insert.php",
          data: new_listing_data,
          success: function(data){
            console.log(data);
            $("#editInfoForm_errorloc").html("Your listing has been submitted");
          },
          dataType: 'application/json'
        });
     
        
        });





      $("#submit-edit").on("click",function(){


        new_listing_form= $("#new-listing-form")

       
         new_listing_data = getFormDataAllRequired(new_listing_form);
         console.log(new_listing_data);

        new_data = {};

         for ( property in new_listing_data) {

          new_prop = property.replace("insert","update");
           console.log(property,new_prop);
          new_data[new_prop] = new_listing_data[property];
         }
         if(new_listing_data["active"] == true)
         new_data["active_update"] = 1;
        else
          new_data["active_update"] = 0;
         console.log(new_data);
         json_data = JSON.stringify(new_listing_data);


        $.ajax({
          type: "POST",
          url: "../../controller/listing_update_onSubmit.php",
          data: new_data,
          success: function(data){
            console.log(data);
            alert("Your listing has been updated");
          },
          dataType: 'application/json'
        });
     
        
        });


        //edit 
        $("#edit-listing-btn").on("click",function(){



          sys_id = $("#listing_id_edit").val();

          if(sys_id.length == 0){
            alert("Please enter listing id");
             location.reload();
            return;
          }

          $("#submit-edit").show();
          $("#submit-new").hide()

        $.post("../../controller/getListing.php",
          {
            sys_id_listing: sys_id
           
          },
          function(apartmentData, status){
            console.log("Data: " + apartmentData + "\nStatus: " + status);
            console.log(JSON.parse(apartmentData));
            apartmentData = JSON.parse(apartmentData);

            // apartmentData = JSON.parse(data);
            // console.log(apartmentData);

            // // apartmentData.each(function(){

            // // })

            for (const property in apartmentData) {
              console.log(`${property}: ${apartmentData[property]}` , $("#" + property+"_insert").length,"#" + property+"_insert" );
              if($("#" + property+"_insert").length != 0) {
                  $("#" + property+"_insert").val(apartmentData[property]);
                }
            }

            $("#sys_id").val(apartmentData["sys_id"]);
            $("#active").val(apartmentData["active"]);
            // //update pets allowed
            // if(apartmentData["pets"]){
            //     $("#petsallowed" ).html("Allowed");
            // }
            // else{
            //      $("#petsallowed" ).html("Not Allowed");
            // }

            // //display images

            // $("#cover-image").css("background-image:url(../listing_images/"+apartmentData["image"]+")")
            

          });

      });

          //delete listing
   

          $("#delete-listing-btn").on("click",function(){

          
          sys_id = $("#listing_id_edit").val();

          if(sys_id.length == 0){
            alert("Please enter listing id");
            return;
          }
        $.post("../../controller/deleteListing.php",
          {
            sys_id: sys_id
           
          },
          function(apartmentData, status){
            console.log("Data: " + apartmentData + "\nStatus: " + status);
            if(apartmentData == 1){
              alert("Listing has been deleted");
            
            location.reload();
          }

          });
        

          })

        





     
      
});


</script>

</body>
</html>

