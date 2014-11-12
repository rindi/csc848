<?php
require '../models/listing_model.php';
require '../controllers/listings_controller.php';
if (!isset($_SESSION)) {
    session_start();
}

//dynamically need user id!?!?!?!?
$interested = 1;
if( isset($_SESSION['userid']) )
{
    $userid = $_SESSION['userid'];
}
//expressing interest
require_once "../controllers/interest_controller.php";
if (isset($_GET['interest']) && isset($_GET['userid'])) {
    $interest = new interest_controller();
    $interest->expressInterest($userid, $_GET['id']);
}else if( isset($_GET['interest']) )
{
    die("ADD FUNCTIONALITY TO CONTACT SELLER WITHOUT ID. EVERY SITE HAS IT.");
}

$listing_controller = new listings_controller();
$listing_model = $listing_controller->getListing($_GET['id']);
$images = $listing_controller->getImages($_GET['id']);
$image_1 = $images[0];

$addressgooglemaps = $listing_model->getAddress();
$citygooglemaps = $listing_model->getCity();
$zipgooglemaps = $listing_model->getZip();
$mapaddress = $addressgooglemaps . ', ' . $citygooglemaps . " " . $zipgooglemaps;
$enc = base64_decode('QUl6YVN5Q25DZHFkRDFiNm1yRDBpaUpZejRIZGZmMVhqXzlaRFkw') . '&q=';
$srcstart = 'src = "https://www.google.com/maps/embed/v1/place?key=';
$end = '"';
$mapstring = $srcstart . $enc . $mapaddress . $end;
?>
<?php include("navbar.php"); ?>

<script>
    $(document).ready(function(){
        $("#photos").click(function(){
            $("#mapitis").attr("class", "");
            $("#photositis").attr("class", "displaynone");
            $("#photos").attr("id", "seepht");
            
        });
        $("#seepht").click(function(){
            $("#mapitis").attr("class", "displaynone");
            $("#photositis").attr("class", "");
            $("#seepht").attr("id", "photos");
        });
    }); 
</script>
<style>
    .displaynone{
        display: none;
    }
</style>
<html>
    <div class="container">
        <div id="listing" class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="well">
                                    <div id="photositis" class="">
                                        <?php include("houses_carousel.php"); ?>
                                    </div>                                    
                                    
                                </div>
                                <div>
                                    <iframe
                                        width='340'
                                        height='250'
                                        frameborder='0' style='border:0'
                                        <?php echo $mapstring; ?>>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="well">
                            <h2>Contact realtor for this home</h2>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="thumbnail">
                                        <img src="./assets/images/demo.jpg" alt="...">
                                    </div>        
                                </div>
                                <div class="col-xs-8">
                                    <h4>Joe Schmack</h4>
                                    <p>Goodsell Banker Residential - San Antoniano - Sierra Costo</p>
                                    <span class="glyphicon glyphicon glyphicon-earphone"> (123)311-2331</span>
                                </div>
                                
                                <div class="col-xs-12" style="margin:5px">
                                    
                                </div>
                                
                                <?php if( isset($_SESSION['userid']) ):?>
                                <a href="listing_page.php?interest=<?php echo $interested ;?>&id=<?php echo $_GET['id'];?>&userid=<?php echo $userid;?>"
                                    class="btn btn-success col-sm-offset-8 col-sm-3" 
                                    value="Edit listing" type="button">Contact seller
                                </a>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <form class="">
                                            <div class="form-group">
                                                <label class="sr-only control-label"></label>
                                                <div class=""col-xs-12>
                                                    <input type="text" class="form-control" placeholder="Name">
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only control-label"></label>
                                                <div class=""col-xs-12>
                                                    <input type="email" class="form-control" placeholder="E-mail">
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only control-label"></label>
                                                <div class=""col-xs-12>
                                                    <input type="tel" class="form-control" placeholder="Phone number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only control-label"></label>
                                                <div class=""col-xs-12>
                                                    <textarea class="form-control">Hi, I am interested in <?php echo $listing_model->getAddress(); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success pull-right" value="Contact">
                                            </div>
                                        </form>
                                    </div>
                                    
                                <?php endif?>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php echo $mapaddress; ?>
                        <?php echo $listing_model->getAddress(); ?>
                        <?php echo $listing_model->getCity(); ?> 
                        <?php echo $listing_model->getPrice(); ?>
                        <?php echo $listing_model->getRooms(); ?> 
                        <?php echo $listing_model->getBathrooms(); ?>
                        <?php echo $listing_model->getDescription(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<!DOCTYPE html>
    <html>
    <head>
    <script>
    function initialize()
    {
      var mapProp = {
        center: new google.maps.LatLng(37.7118078,-122.4545622),
        zoom:11,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
      var marker=new google.maps.Marker({
      position:myCenter,
      icon:'/assets/logo/PrimeEstate_Logo_Search.png'
      });
    
    marker.setMap(map);
    }
    
    function loadScript()
    {
      var script = document.createElement("script");
      script.type = "text/javascript";
      script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false&callback=initialize";
      document.body.appendChild(script);
    }
    
    window.onload = loadScript;
    </script>
    </head>
    
    <body>
    <div id="googleMap" style="width:500px;height:500px;"></div>
    
    </body>
    </html>-->
    <!--
    <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Prime Estate</title>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
      var geocoder;
      var map;
      var address = <?php echo $mapaddress; ?>;
      function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-37.722, 122.478);
        var myOptions = {
          zoom: 8,
          center: latlng,
        mapTypeControl: true,
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
        navigationControl: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        if (geocoder) {
          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
              map.setCenter(results[0].geometry.location);
    
                var infowindow = new google.maps.InfoWindow(
                    { content: '<b>'+address+'</b>',
                      size: new google.maps.Size(150,50)
                    });
    
                var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map, 
                    title:address
                }); 
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });
    
              } else {
                alert("No results found");
              }
            } else {
              alert("Geocode was not successful for the following reason: " + status);
            }
          });
        }
      }
    </script>
    </head>
    <body style="margin:0px; padding:0px;" onload="initialize()">
     <div id="map_canvas" style="width:100%; height:100%">
    </body>
    </html>
    http://stackoverflow.com/questions/15925980/using-address-instead-of-longitude-and-latitude-with-google-maps-api-->
