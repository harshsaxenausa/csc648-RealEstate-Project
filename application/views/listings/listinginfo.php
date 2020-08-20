<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../../assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bower_components/bootstrap-horizon/bootstrap-horizon.css">
</head>

<body>

<!-- Include -->
<?php include '../include/header.php';
include_once($_SERVER['DOCUMENT_ROOT'] . '/models/GatorImages.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/models/GatorListing.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/models/MapDistance.php');
// controller code
$listing = new GatorListing();
$listing->get($_GET['sys_id']);
?>
<!-- End Include -->


<!-- Banner with Title of Listing -->
<section id="banner_abt">
    <div class="col-md-12">
        <div class="container">
            <div class="container-lg">
                <br>
                <h2 class="text-center"><?php echo $listing->title ?></h2>
                <br>
            </div>
        </div>
    </div>
</section>
<!-- End Banner with Title of Listing -->


<!-- Listing Container-->
<div class="container">

    <!-- Row 1 -->
    <div class="row">

        <!-- Column 1 Listing Details -->
        <div class="col-md-6">

            <!--Listing Details -->

            <div id="listing-information" class="panel panel-primary">

                <ul class="list-group">
                    <li class="list-group-item">Address: <span
                                id="full_address"><?php echo $listing->street_address.', '.
                                $listing->city.', '.$listing->state.', '.$listing->zip_code ?></span></li>
                    <li class="list-group-item">Property Type: <span
                                id="property_type"><?php echo $listing->property_type ?></span></li>
                    <li class="list-group-item">Payment Type: <span
                                id="payment_type"><?php echo $listing->payment_type ?></span></li>
                    <li class="list-group-item">Description: <span
                                id="description"><?php echo $listing->description ?></span></li>
                    <li class="list-group-item">Price: $<span id="price"><?php echo $listing->price ?></span></li>
                    <li class="list-group-item">Number of Rooms: <span id="rooms"><?php echo $listing->rooms ?></span>
                    </li>
                    <li class="list-group-item">Utilities Included: <span
                                id="utilities"><?php echo $listing->utilities ?></span></li>
                    <li class="list-group-item">Pets: <span
                                id="petsallowed"><?php if ($listing->pets) echo "Yes"; else echo "No"; ?></span></li>
                    <li class="list-group-item">
                        Disstance to SFSU: <span id="distance"><?php echo $listing->distance_to_sfsu ?></span>
                    </li>



                    <li id="listing-contact" class="list-group-item">
                        <?php
                        if (isset($_SESSION['is_auth'])) {
                            ?>
                            <a id="contact-btn" class="btn btn-lg btn-info listing-btn" role="button"
                               data-id="<?php echo $listing->user_id; ?>" href="javascript:void(0)">Contact Landlord</a>
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="#" class="btn btn-dark btn-default" type="button" data-toggle="modal"
                               data-target="#sign-in-modal">
                                <i class="glyphicon glyphicon-envelope"></i><span>Contact Landlord</span>
                            </a>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
            <!--End Listing Details -->
        </div>
        <!-- End Column 1 Listing Details -->

        <!-- Column 2 Carousel -->
        <div class="col-md-6">

            <!--Carousel -->
            <div id="proprtyIndicators" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#proprtyIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#proprtyIndicators" data-slide-to="1"></li>
                    <li data-target="#proprtyIndicators" data-slide-to="2"></li>
                    <li data-target="#proprtyIndicators" data-slide-to="3"></li>
                </ol>

                <div class="carousel-inner" role="listbox" style="width: 100%; height: 300%;">
                    <?php
                    $listing = new GatorListing();
                    $listing->get($_GET['sys_id']);
                    ?>

                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/views/listing_images/<?php echo $listing->image; ?>">
                    </div>

                    <?php
                    $carousel_images = new GatorImages();
                    $carousel_images->addQuery('listing_id', '=', $_GET['sys_id']);
                    $carousel_images->query();
                    while ($carousel_images->next()) {
                        ?>

                        <div class="carousel-item ">
                            <img class="d-block w-100"
                                 src="/views/listing_images/<?php echo $carousel_images->path; ?>">
                        </div>

                        <?php
                    }
                    ?>
                </div>

                <a class="carousel-control-prev" href="#proprtyIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#proprtyIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
            <!--End Carousel -->
            <!--Display Google Maps -->
            <br>
            <div id="listing-map1" style="height: 100%; width: 100%"></div>

        </div>
        <!--End Column 2 Carousel -->

    </div>
    <!-- End Row 1 -->

</div>
<!-- End Listing Container-->


<!-- Google Maps Scripts -->
<script>

    function renderMap(street, city, state, zip) {
        // var street = "227 Denslowe Dr";
        // var city = "San Francisco";
        // var state = "CA";
        // var zip = "94132";
        var googleAddress = street.concat(" ", city, " ", state, " ", zip);

        var map;
        var geocoder;
        initMap();

        function initMap() {
            var bounds = new google.maps.LatLngBounds;
            var markersArray = [];

            var origin = googleAddress;
            var destination = '1600 Holloway Ave, San Francisco';

            var destinationIcon = 'https://chart.googleapis.com/chart?' +
                'chst=d_map_pin_letter&chld=D|FF0000|000000';
            var originIcon = 'https://chart.googleapis.com/chart?' +
                'chst=d_map_pin_letter&chld=O|FFFF00|000000';
            var map = new google.maps.Map(document.getElementById('listing-map1'), {
                center: {lat: 37.721178, lng: -122.476962},
                zoom: 10
            });

            var geocoder = new google.maps.Geocoder;

            var service = new google.maps.DistanceMatrixService;

            service.getDistanceMatrix({
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL,
                    avoidHighways: false,
                    avoidTolls: false
                },

                function (response, status) {

                    console.log(response);
                    if (status !== google.maps.DistanceMatrixStatus.OK) {
                        // alert('Error was: ' + status);
                    } else {
                        var originList = response.originAddresses;
                        var destinationList = response.destinationAddresses;
                        var outputDiv = document.getElementById('output');

                        deleteMarkers(markersArray);

                        var showGeocodedAddressOnMap = function (asDestination) {
                            var icon = asDestination ? destinationIcon : originIcon;
                            return function (results, status) {
                                if (status === google.maps.GeocoderStatus.OK) {
                                    map.fitBounds(bounds.extend(results[0].geometry.location));
                                    markersArray.push(new google.maps.Marker({
                                        map: map,
                                        position: results[0].geometry.location,
                                        icon: icon,
                                        zoom: 10
                                    }));
                                } else {
                                    // alert('Geocode was not successful due to: ' + status);
                                }
                            };
                        };

                        var results = response.rows[0].elements;
                        geocoder.geocode({'address': originList[0]},
                            showGeocodedAddressOnMap(false));
                        geocoder.geocode({'address': destinationList[0]},
                            showGeocodedAddressOnMap(true));
                        // outputDiv.innerHTML += results[0].distance.text
                        var str = (window.location + '').split("/");
                        var listingID = str[str.length - 1];

                        if (outputDiv.innerHTML === "Distance:  mi" ||
                            outputDiv.innerHTML === "Distance: 2.1 mi") {
                            $.ajax({
                                type: 'POST',
                                url: url + "/addresses/updatedistance/" + listingID,
                                data: {
                                    "distance": results[0].distance.text.split(" ")[0]
                                },
                                success: function (event) {
                                    outputDiv.innerHTML = '';
                                    outputDiv.innerHTML = "Distance: " + results[0].distance.text;
                                },
                                error: function (xhr, err, errThrown) {
                                    console.log("I failed");
                                    console.log(err);
                                    console.log(errThrown);
                                },
                            });
                        } else {
                            console.log("Not empty");
                        }
                    }
                });
        }

        function deleteMarkers(markersArray) {
            for (var i = 0; i < markersArray.length; i++) {
                markersArray[i].setMap(null);
            }
            markersArray = [];
        }

    }
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAspxm79KDz8BOV8Dtyy5qOi_uRVjgE0qw"
        async defer></script>

<!-- End Google Maps Scripts -->


<br>
<br>


<!-- Footer-
<?php //include '../include/footer.php'; ?> 

-->


<!-- Script Tags -->
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script type="text/javascript">


    $(document).ready(function () {


        var searchParams = new URLSearchParams(window.location.search)

        if (searchParams.has('sys_id')) {
            param = searchParams.get('sys_id');
            console.log(param);
            sys_id = param;

        } else
            sys_id = "05419721979656226821221716351816"


        $.post("../../controller/getListing.php",
            {
                sys_id_listing: sys_id

            },
            function (data, status) {
                console.log("Data: " + data + "\nStatus: " + status);

                apartmentData = JSON.parse(data);
                console.log(apartmentData);

                // apartmentData.each(function(){

                // })

                for (const property in apartmentData) {
                    console.log(`${property}: ${apartmentData[property]}`);
                    if ($("#" + property).length != 0) {
                        $("#" + property).html(apartmentData[property]);
                    }
                }
                //update pets allowed
                if (apartmentData["pets"]) {
                    $("#petsallowed").html("Allowed");
                } else {
                    $("#petsallowed").html("Not Allowed");
                }


                renderMap(apartmentData["street_address"], apartmentData["city"], apartmentData["state"], apartmentData["zip"]);
                //display images

                $("#cover-image").css("background-image:url(../listing_images/" + apartmentData["image"] + ")")


            });
    })

</script>

</body>
</html>

