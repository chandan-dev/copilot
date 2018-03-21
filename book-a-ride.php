<?php

// if the session not yet started
if(empty($_SESSION)) {
    session_start();
}

$result = []; $source = ''; $destination = '';
if (isset($_POST) && !empty($_POST)) {
    include "client/Uber.php";
    include "uber-credential.php";

    $source = $_POST['start'];
    $destination = $_POST['end'];

    $sourceLatLong = getLatLong($source);
    $sourceLatitude = $sourceLatLong['latitude'];
    $sourceLongitude = $sourceLatLong['longitude'];

    $destLatLong = getLatLong($destination);
    $destLatitude = $destLatLong['latitude'];
    $destLongitude = $destLatLong['longitude'];

    function getLatLong($address) {
        if(!empty($address)) {
            //Formatted address
            $formattedAddr = str_replace(' ','+',$address);
            //Send request and receive json data by address
            $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false');
            $output = json_decode($geocodeFromAddr);
            //Get latitude and longitute from json data
            $data['latitude']  = $output->results[0]->geometry->location->lat;
            $data['longitude'] = $output->results[0]->geometry->location->lng;
            //Return latitude and longitude of the given address
            if(!empty($data)) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    $uber = new Uber();

    $uber->setClientId($client_id);
    $uber->setClientSecret($client_secret);
    $uber->setRedirectUri($redirect_uri);
    $uber->setScope('privileged');
    $uber->setAccessToken($accessToken);

    $products = $uber->request('products', $uber->getAccessToken(),
        [
            'latitude' => $sourceLatitude,
            'longitude' => $sourceLongitude
        ]);
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Book A Ride</title>
		<meta charset="utf-8">
		<meta name = "format-detection" content = "telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/TMForm.js"></script>
		<script>
			$(document).ready(function(){
				$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<!--[if lt IE 8]>
			<div style=' clear: both; text-align:center; position: relative;'>
				<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
					<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
				</a>
			</div>
		<![endif]-->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<link rel="stylesheet" media="screen" href="css/ie.css">
		<![endif]-->

        <style>
            #map {
                height: 400px;
                width: 700px;
            }
        </style>
	</head>
	<body class="" id="top">
		<div class="main">
<!--==============================header=================================-->
			<header>
				<div class="menu_block ">
					<div class="container_12">
						<div class="grid_12">
							<nav class="horizontal-nav full-width horizontalNav-notprocessed">
								<ul class="sf-menu">
									<li><a href="index.php">Home</a></li>
									<li><a href="about.php">About</a></li>
                                    <li><a href="services.php">Services</a></li>
									<li><a href="contact.php">Contacts</a></li>
									<li class="current"><a href="book-a-ride.php">Book A Ride</a></li>

                                    <?php

                                    if ($_SESSION['user_type'] == 1) {
                                        echo '<li><a href="passenger-profile.php">Profile</a></li>';
                                    }

                                    ?>

									<li><a href="logout.php">Logout</a></li>
								</ul>
							</nav>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="container_12">
					<div class="grid_12">
						<h1>
							<a href="">
								<img src="images/logo.png" alt="Your Happy Family">
							</a>
						</h1>
					</div>
				</div>
				<div class="clear"></div>
			</header>
<!--==============================Content=================================-->
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
                <div class="container_12">
                    <div class="grid_5">
                        <h3>Ride Now</h3>
                        <form id="bookingForm" class="form login-form" method="post"
                            action="book-a-ride.php">
                            <div class="fl1">
                                <div class="tmInput">
                                    <input name="start" placeHolder="From:" type="text"
                                           id="start" data-constraints="@NotEmpty @Required"
                                           onFocus="geolocate()" onkeyup="initAutocomplete('start');"
                                        value="<?php echo $source; ?>">
                                </div>
                            </div>
                            <div class="fl1">
                                <div class="tmInput mr0">
                                    <input name="end" placeHolder="To:" type="text"
                                           id="end" data-constraints="@NotEmpty @Required"
                                           onFocus="geolocate()" onkeyup="initAutocomplete('end');"
                                        value="<?php echo $destination; ?>">
                                </div>
                            </div>

                            <div class="btns">
                                <input type="submit" class="btn" value="Search">
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>

                    <div class="grid_5">
                        <div id="map"></div>
                    </div>
                    <div class="clear"></div>
                </div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="f_phone"><span>Call Us:</span> + 1800 559 6580</div>
					<div class="socials">
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						<div class="st1">
						<div class="brand">Tour<span class="color1">T</span>axi </div>
						&copy; 2014	| <a href="#">Privacy Policy</a> </div> Website designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>

            <script src="js/map-api.js"></script>

            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkoobqlXLVEnbR-Yl-nKah3DjCSz3RE74&&libraries=places&callback=initMap">
            </script>
        </footer>
	</body>
</html>