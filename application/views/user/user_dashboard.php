<!--/**
* @author Tania Nemeth
* front end for user dashboard, will display listings "owned" by user when logged in
*/-->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="/assets/hoverZoom.css">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php' ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/models/GatorListing.php' ?>
    <?php requireLogin(); ?>
</head>
<body>

<!-- Banner -->
<section id="banner_abt">
    <div class="col-md-12 container">
        <div class="container-lg">
            <h2 class="text-center">User Dashboard | My Listings</h2>
        </div>
    </div>
</section>
<br>


<?php
// query for listings belonging to current user
$listing = new GatorListing();
$listing->addQuery('user_id', '=', $_SESSION['sys_id']);
$listing->query();

//when user has no listings it can prompt them to create one
if($listing->getRowCount() == 0){?>
    <p style = "color:black">

        You currently have 0 listings, click <a href="/views/listings/new_listing.php">here</a> to create one!
    </p>
<?php
}

// when less than 3 cards (listings) are retrieved, display them along with an empty card(s)
else if ($listing->getRowCount() < 3) {
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
        echo '<div class="card-footer">';
        echo "<small class='text-muted'>$listing->created</small>";
        echo '<div class="float-right">';
        echo "<a href='/views/listings/listing_edit.php?sys_id=$listing->sys_id'> Edit</a> <a href='/controller/listing/listing_delete.php?sys_id=$listing->sys_id'> Delete</a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    // display an empty listing to make the row have 3 cards
    for ($i = 0; $i < (int)(3 - $listing->getRowCount()); $i++) {
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
            echo '<div class="card-footer">';
            echo "<small class='text-muted'>$listing->created</small>";
            echo '<div class="float-right">';
            echo "<a href='/views/listings/listing_edit.php?sys_id=$listing->sys_id'> Edit</a> <a href='/controller/listing/listing_delete.php?sys_id=$listing->sys_id'> Delete</a>";
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
            echo '<div class="card-footer">';
            echo "<small class='text-muted'>$listing->created</small>";
            echo '<div class="float-right">';
            echo "<a href='/views/listings/listing_edit.php?sys_id=$listing->sys_id'> Edit</a> <a href='/controller/listing/listing_delete.php?sys_id=$listing->sys_id'> Delete</a>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        // display an empty listing to make the row have 3 cards
        for ($i = 0; $i < (int)(3 - $listing->getRowCount() % 3); $i++) {
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


<br>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/include/footer.php' ?>
<!-- Script Tags -->
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
