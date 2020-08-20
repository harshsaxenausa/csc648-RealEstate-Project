<?php
include_once "../models/GatorHub.php";
include_once "../models/GatorListing.php";


// can remove session_start() once all pages use header.php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * To be ran onLoad after user clicks on a search result
 *
 * Retrieves record of a listing the user has clicked on in the search results. Increments the record's view_count
 */
$listing = displayDetailedListing();

function displayDetailedListing()
{
    $listing_id = '';

    // grab sys_id of listing id from the card
    if (isset($_POST['sys_id_listing'])) {
        $listing_id = $_POST['sys_id_listing'];
    }

   

    //echo "foundasdasdasdasdasd";
    // get the listing record
    $listing = new GatorListing();
    $listing->get($listing_id);
    $listing->view_count++;         // increase view_count by one
    $listing->update();
    echo json_encode($listing);
    return $listing;

}
