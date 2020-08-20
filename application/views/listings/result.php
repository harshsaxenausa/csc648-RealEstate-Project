<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/assets/hoverZoom.css">
    <link rel="stylesheet" href="/assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/controller/listing/listing_search.php') ?>
</head>
<body>

<!-- Zip Code -->

<!-- Banner -->
<section id="banner_abt">
    <div class="col-lg-12 col-md-12">
        <div class="container">
            <div class="container-lg">
                <h2 class="text-center">GatorHub</h2>
                <h4 class="text-center">Search For Listings</h4>

                <!-- Search -->
                <form method="POST" action="/views/listings/result.php">
                    <div class="d-flex justify-content-center">
                        <!-- Zip Code -->

                        <div class="col-lg-12 justify-content-center">
                            <div class="row justify-content-md-center">

                                <div class="col-lg-10 col-md-3 col-sm-12">
                                    <input type="text" name="keyword_listing" class="form-control search-slt" maxlength="40"
                                           placeholder="Search by keyword">
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-5">
                                    <button type="submit" class="btn btn-dark">Search</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- </div> -->


                    <div class="collapse " id="additional_filter">
                        <form method="POST" action="/views/listings/result.php">
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="d-flex justify-content-center">

                                        <!-- Min Price and Max Price -->
                                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 m-1">
                                            <input type="number" name="price_min_listing"
                                                   class="form-control search-slt" maxlength="5" value="<?php echo $price_min ?>"
                                                   placeholder="Min Price" >
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 m-1">
                                            <input type="number" name="price_max_listing"
                                                   class="form-control search-slt" maxlength="5" value="<?php echo $price_max ?>"
                                                   placeholder="Max Price">
                                        </div>

                                        <!-- Type -->
                                        <div class="col-lg-3 col-md-3 col-sm-12 p-0 m-1">
                                            <input type="number" name="distance_to_sfsu_listing" class="form-control search-slt" value="<?php echo $distance_to_sfsu; ?>" placeholder="Distance to SFSU">
                                        </div>
                                        <!-- <div class="col-lg-1 col-md-5 col-sm-5 p-0 m-1"> -->
                                        <div class="col-lg-2 col-md-3 col-sm-12 p-0 m-1">
                                            <select class="form-control search-slt" id="property_type"
                                                    name="sort_listing">
                                                <option value="">Sort by</option>
                                                <option value="price-asc">Price Ascending</option>
                                                <option value="price-desc">Price Descending</option>
                                                <option value="rooms-asc">Rooms Ascending</option>
                                                <option value="rooms-desc">Rooms Descending</option>
                                                <option value="floor_size-asc">Floor Size Ascending</option>
                                                <option value="floor_size-desc">Floor Size Descending</option>
                                                <option value="popularity">Popularity</option>

                                            </select>
                                        </div>

                                                                            </div>

                                </div>

                            </div>
                        </form>
                    </div>




                </form>
            </div>
        </div>
    </div>
</section>





<script>
    document.getElementById("additional_filter").style.display = "block";

</script>


<?php
echo "<br> &nbsp;&nbsp; Found " . $listing->getRowCount() . " results";
// when less than 3 cards (listings) are retrieved, display them along with an empty card(s)
if ($listing->getRowCount() < 3) {
    echo '<div class="card-deck m-3">';

    // display the remaining 1 or 2 listings
    for ($i = 0; $i < (int)$listing->getRowCount(); $i++) {
        $listing->next();
        echo '<div class="card zoom">';
        echo "<a href='/views/listings/listinginfo.php?sys_id=$listing->sys_id'>";
        echo "<img class='card-img-top' src='/views/listing_images/$listing->image' onerror=this.src='/views/listing_images/white.jpg'>";
        echo '<div class="card-body">';
        echo "<h5 class='card-title'>$listing->title</h5>";
        echo "<p class='card-text' style='text-align: center'>$listing->description</p>";
        echo '</div>';
        echo '</a>';
        echo "<div class = btn btn-secondary>";
        echo "<a href='/views/listings/listinginfo.php?sys_id=$listing->sys_id' class='btn btn-secondary'>";
        echo "Contact Owner";
        echo "</a>";
        echo "</div>";
        echo '<div class="card-footer">';
        echo "<small class='text-muted'>$listing->created</small>";
        echo '<div class="float-right">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    // display an empty listing to make the row have 3 cards
    for ($i = 0; $i < (3 - $listing->getRowCount()); $i++) {
        echo '<div class="card zoom">';
        echo '<div class="card-body">';
        echo "<h5 class='card-title'></h5>";
        echo "<p class='card-text' style='text-align: center'></p>";
        echo '</div>';
        echo '</div>';
    }

    echo '</div>'; // matching card deck div
}


// when more than 3 cards (listings) are retrieved, display them all along with empty cards to finish the card row
if ($listing->getRowCount() >= 3) {
    // display the 3-listings row first
    for ($i = 0; $i < (int)($listing->getRowCount() / 3); $i++) {
        echo '<div class="card-deck m-3">';

        for ($j = 0; $j < 3; $j++) {
            $listing->next();
            echo '<div class="card zoom">';
            echo "<a href='/views/listings/listinginfo.php?sys_id=$listing->sys_id'>";
            echo "<img class='card-img-top' src='/views/listing_images/$listing->image' onerror=this.src='/views/listing_images/white.jpg'>";
            echo '<div class="card-body">';
            echo "<h5 class='card-title'>$listing->title</h5>";
            echo "<p class='card-text' style='text-align: center'>$listing->description</p>";
            echo '</div>';
            echo '</a>';
            echo "<div class = btn btn-secondary>";
            echo "<a href='/views/listings/listinginfo.php?sys_id=$listing->sys_id' class='btn btn-secondary'>";
            echo "Contact Owner";
            echo "</a>";
            echo "</div>";
            echo '<div class="card-footer">';
            echo "<small class='text-muted'>$listing->created</small>";
            echo '<div class="float-right">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>'; // matching card deck div
    }

    // for the last listing row that does not have 3 cards to display
    if ($listing->getRowCount() % 3 > 0) {
        echo '<div class="card-deck m-3">';
        // display the remaining 1 or 2 listings
        for ($i = 0; $i < (int)$listing->getRowCount() % 3; $i++) {
            $listing->next();
            echo '<div class="card zoom">';
            echo "<a href='/views/listings/listinginfo.php?sys_id=$listing->sys_id'>";
            echo "<img class='card-img-top' src='/views/listing_images/$listing->image' onerror=this.src='/views/listing_images/white.jpg'>";
            echo '<div class="card-body">';
            echo "<h5 class='card-title'>$listing->title</h5>";
            echo "<p class='card-text' style='text-align: center'>$listing->description</p>";
            echo '</div>';
            echo '</a>';
            echo "<div class = btn btn-secondary>";
            echo "<a href='/views/listings/listinginfo.php?sys_id=$listing->sys_id' class='btn btn-secondary'>";
            echo "Contact Owner";
            echo "</a>";
            echo "</div>";
            echo '<div class="card-footer">';
            echo "<small class='text-muted'>$listing->created</small>";
            echo '<div class="float-right">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        // display an empty listing to make the row have 3 cards
        for ($i = 0; $i < (3 - $listing->getRowCount() % 3); $i++) {
            echo '<div class="card zoom">';
            echo '<div class="card-body">';
            echo "<h5 class='card-title'></h5>";
            echo "<p class='card-text' style='text-align: center'></p>";
            echo '</div>';
            echo '</div>';
        }

        echo '</div>'; // matching card deck div
    }
}
?>

<!-- See all
<div >
  <button class="btn btn-default"><a href="#" >See all</a></button>
</div>
-->
<!--
<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="btn btn-default"><a class="btn btn-primary btn-dark btn-lg p-2" href="#">Previous</a></li>
            <li class="btn btn-default"><a class="btn btn-primary btn-dark btn-lg p-2" href="#">1</a></li>
            <li class="btn btn-default"><a class="btn btn-primary btn-dark btn-lg p-2" href="#">2</a></li>
            <li class="btn btn-default"><a class="btn btn-primary btn-dark btn-lg p-2" href="#">3</a></li>
            <li class="btn btn-default"><a class="btn btn-primary btn-dark btn-lg p-2" href="#">Next</a></li>
        </ul>
    </nav>
</div>

<br>
-->

<?php include($_SERVER['DOCUMENT_ROOT'] . '/views/include/footer.php') ?>
<!-- Script Tags -->
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
