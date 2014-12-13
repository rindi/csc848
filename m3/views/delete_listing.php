<?php
include("navbar.php");
require_once '../models/listing_model.php';
require_once '../controllers/listings_controller.php';
require_once '../controllers/users_controller.php';
require_once '../controllers/leads_controller.php';
require_once '../models/user_model.php';
require_once '../models/lead_model.php';


    
//Check to make sure that the realtor is the creator
if (isset($_GET['id']))
{
    $listingid = $_GET['id'];
    $list_controller = new listings_controller();
    $listing = $list_controller->getListing($listingid);

    if (isset($_SESSION["userid"]) && ($_SESSION["userid"]==($listing->getUserId())))
    {
        $list_controller->deleteListing($listingid);
    }
}


?>
<script type="text/javascript">

window.location = 'http://sfsuswe.com/~f14g03/index.php';
</script>