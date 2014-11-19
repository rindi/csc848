<?php
include("navbar.php");
require '../models/listing_model.php';
require '../controllers/listings_controller.php';
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['type'] != 2) {
    header('Location: http://sfsuswe.com/~f14g03/views/newlogin.php');
}

//echo $_SESSION['userid'];
if (isset($_POST['SubmitButton'])) {

    $input['address'] = $_POST['address'];
    $input['city'] = $_POST['city'];
    $input['zip'] = $_POST['zip'];
    $input['price'] = $_POST['price'];
    $input['rooms'] = $_POST['rooms'];
    $input['bathrooms'] = $_POST['bathrooms'];
    $input['description'] = $_POST['description'];
    $input['userid'] = $_SESSION['userid'];
    $house = new listing_model($input);

    $listing_controller = new listings_controller();
    $listing_controller->addListing($house);
    echo $input['address'] . ' added';

if(isset($_POST['backButton']))
{
    header('Location: http://sfsuswe.com/~f14g03/');
    
}

    header('Location: http://sfsuswe.com/~f14g03/views/upload.php');
}
?>
<<<<<<< .mine
<html>
 <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Prime Estate - add listing</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
<body>
 <div class="container-fluid">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">add listing</h3>
                </div>
                <div class<="panel-body">
                     <form class="form-horizontal" role="form" action="add_listing.php" method="post" >
                         
                  

                        <!-- Text input-->
                        <div class="form-group">
                            
                            <label class="col-sm-2 control-label" for="textinput">Price</label>
                            <div class="col-sm-10">
                                <input type="text" name ="price" placeholder="price">
                             
                            </div>
                        </div>
                          <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" placeholder="Address" >
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">City</label>
                            <div class="col-sm-10">
                                <input type="text" name ="city" placeholder="City" >
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Zip</label>
                            <div class="col-sm-10">
                                <input type="text" name ="zip" placeholder="Zip">              
                               
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Rooms</label>
                            <div class="col-sm-10">
                                <input type="text" name ="rooms" placeholder="Rooms">
                               
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Bathrooms</label>
                            <div class="col-sm-10">
                                <input type="text" name ="bathrooms" placeholder="bathrooms">
                                   
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Description</label>
                            <div class="col-sm-10">
                                <input type="textarea"  name = "info" placeholder="Description" >
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <button type="submit" name ="backButton" class="btn btn-default">BACK</button>
                                    <button type="submit" name = "SubmitButton"class="btn btn-primary">Add listing</button>
                                </div>
                            </div>
                        </div>
                </div>
                    </form>
                </div>
                

            </div>
        </div> 
    </div>  
    <!--</fieldset>-->
 </body>
  
                
</html>
=======
<div style="text-align:center" >
    <div class="container-fluid">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Step 1: Adding new listing</h2>
                </div>
                <div class="panel-body">
                    <!--    <h3>Adding new listing:</h3>-->
                    <!--<h3>Step 1</h3>-->
                    <form action="add_listing.php" method="post">
                        <!--<form action="add_listings.php" method="post">-->
                        <table style="text-align:center; margin: 0px auto">
                            <tr><td>Address*:</td><td><input type="text" name="address" placeholder="Address" required/></td>
                            <tr><td>City*:</td><td><input type="text" name="city" placeholder="City" required/></td>
                            <tr><td>Zip*:</td><td><input type="text" name="zip" placeholder="Zip" required/></td>
                            <tr><td>Price:</td><td><input type="number" name="price" placeholder="Price" min="0"/></td>
                            <tr><td>Rooms #:</td><td><input type="number" name="rooms" placeholder="Rooms" min="0"/></td>
                            <tr><td>Bathrooms #:</td><td><input type="number" name="bathrooms" placeholder="Bathrooms" min="0"/></td>
                            <tr><td>Description:</td><td><textarea type="textfield" name="description"></textarea></td>
                        </table>

                    <input type="submit" value="Add listing" name="SubmitButton"/>
                    </form>
                </div>
            </div> 
        </div>  
    </div>
>>>>>>> .r574
