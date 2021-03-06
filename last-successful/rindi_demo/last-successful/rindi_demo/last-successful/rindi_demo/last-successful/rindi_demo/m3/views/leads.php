<!DOCTYPE html>

<?php

/*
@(#)File:           Leads
@(#)Purpose:        House Sales Leads 
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

include 'navbar.php';
//$value=$_POST["searchvalue"];

//  this is the code from brain/check if logged in;
//    if( isset($_COOKIE['username']) )
//    {
//        $loggedin = true;
//        $loggedinas = $_COOKIE['username'];
//    }
//    else
//    {
//        $loggedin = false;
//    }
//    $value = $_POST["searchvalue"];
?>

<html>
    <style>
        h1{
         text-align: center; 
	 color: #12aca5;
	 font-weight: bold;
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <title>PrimeEstate - List of Leads</title>
    </head>
    <body style="padding-bottom: 40px;">
	<div class="container">
	<div class="panel panel-default" style="text-align:center">
	    <h1> Sales Leads </h1>
            <p>Customers who are interested in selling their home with PrimeEstate</p>
	</div>
        
        
        <?php
//        $value=$_POST["searchvalue"];
        require '../models/lead_model.php';
        require '../controllers/leads_controller.php';
           $lead_controller = new leads_controller();
        $leadSet = $lead_controller->getLeads();
        //pagination
        $offset = 10;
        if( isset($_GET['page'] ) )
        {
            $page = $_GET['page'];
            $start = $offset*($page-1);
        }
        else
        {
            $start = 0;
            $page = 1;
        }
        $end = $start + $offset;
        if ($end>count($leadSet))
        {
            $end = count($leadSet);
        }
        $max = round(count($leadSet)/$offset, 0, PHP_ROUND_HALF_DOWN);
        if($max==0)
            $max++;
	echo "<div class=\"alert alert-success\" style=\"text-align:center\"><STRONG>";
	echo "Total Number of Leads : ".count($leadSet);
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "Page ".$page." of ".$max;
        echo "</STRONG></div>";
        #echo $query;
        echo "<div class='results'>
        <table class='table table-striped table-bordered table-hover' style='width:100%'>
        <thead>
        <tr align='center'>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-mail</th>
        <th>Phone</th>
        <th>Date of Lead</th>
        </tr></thead>";

//        echo count($leadSet);
//        echo " leads!  Now Showing page ";
//        echo $page;
//        echo " of ";
//        $max = round(count($leadSet)/$offset, 0, PHP_ROUND_HALF_DOWN);
//        echo $max;
//        echo " TOTAL LEADS: ";
//        echo count($leadSet);

        for ($i = $start; $i<$end; $i++)
//        foreach((array)$leadSet as $leadData) 
            {
                $leadData = $leadSet[$i];
            echo "<tbody><tr>";
            echo "<td>" . $leadData->getFirstname() . "</td>";
            echo "<td>" . $leadData->getLastname() . "</td>";
            echo "<td><a href='mailto:" . $leadData->getEmail() . "'?Subject=Thank%20you%20for%20%20contacting%20Prime%20Estate>". $leadData->getEmail() . "</td>";
            echo "<td>" . $leadData->getPhone() . "</td>";
            echo "<td>" . $leadData->getContactDate() . "</td>";
            
//            $imgquery="SELECT path FROM images WHERE houseid='$houseval'";
//            $imgresult=$con->query($imgquery);
//            
//            while($imgrow = mysqli_fetch_array($imgresult)) {
//            echo "<a href = " . $imgrow['path'] . "><img src=" . $imgrow['path'] . " height='42' width='42' ></img></a>";}
//            echo "</td></tr>";
        }
        
        echo "</tbody></table></div>";
	echo "<nav style=\"text-align:center\"><ul class=\"pagination pagination-lg\">";
        if( $page > 1 && $page < $max )
            {
               $page = $page + 1;
               $last = $page - 2;
               echo "<li><a href='http://sfsuswe.com/~f14g03/views/leads.php?page=".$last."'>Previous</a></li>";
               echo "<li><a href='http://sfsuswe.com/~f14g03/views/leads.php?page=".$page."'>Next</a></li>";
            }
        else if( $page == 1 )
            {
               $page = $page + 1;
    //           echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Records</a>";
               echo "<li><a href='http://sfsuswe.com/~f14g03/views/leads.php?page=".$page."'>Next</a></li>";
            }
        else 
            {
               $last = $page - 1;
               echo "<li><a href='http://sfsuswe.com/~f14g03/views/leads.php?page=".$last."'>Previous</a></li>";
            }
//        if (!mysqli_query($con,$query)) {
//            die('Error: ' . mysqli_error($con));
//        }
	echo "</ul></nav>";
        ?>
	</div>
    </body>
</html>
