<?php

// if the session not yet started
if(empty($_SESSION)) {
	session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name = "format-detection" content = "telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="booking/css/booking.css">
        <link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/camera.js"></script>
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="js/jquery.mobile.customized.min.js"></script>
		<!--<![endif]-->

        <script src="booking/js/booking.js"></script>

        <script>
            $(document).ready(function(){
                jQuery('#camera_wrap').camera({
                    loader: false,
                    pagination: false ,
                    minHeight: '444',
                    thumbnails: false,
                    height: '28.28125%',
                    caption: true,
                    navigation: true,
                    fx: 'mosaic'
                });
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
	</head>
	<body class="page1" id="top">
		<div class="main">
<!--==============================header=================================-->
			<header>
				<div class="menu_block ">
					<div class="container_12">
						<div class="grid_12">
							<nav class="horizontal-nav full-width horizontalNav-notprocessed">
								<ul class="sf-menu">
									<li class="current"><a href="index.php">Home</a></li>
									<li><a href="about.php">About</a></li>
                                    <li><a href="services.php">Services</a></li>
									<li><a href="contact.php">Contacts</a></li>
                                    <?php

                                    if(isset($_SESSION['user_id'])) {
                                        if ($_SESSION['user_type'] == 1) {
                                            echo '<li><a href="book-a-ride.php">Book A Ride</a></li>';
                                            echo '<li><a href="passenger-profile.php">Profile</a></li>';
                                        } else {
                                            echo '<li><a href="profile.php">Profile</a></li>';
                                        }
                                        echo '<li><a href="logout.php">Logout</a></li>';
                                    } else {
                                        ?>

                                        <li><a href="login.php">Sign In</a></li>
                                        <li><a href="regstn.php">Register</a></li>

                                        <?php
                                    }

                                    ?>
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
								<img src="images/logo.png" alt="Your Happy Family" class="responsive"
									style="width: 100%; height: auto;">
							</a>
						</h1>
					</div>
				</div>
				<div class="clear"></div>
			</header>
			<div class="slider_wrapper">
				<div id="camera_wrap" class="">
					<div data-src="images/slide1.jpg"></div>
					<div data-src="images/slide2.jpg"></div>
					<div data-src="images/slide3.jpg"></div>
				</div>
			</div>
			<div class="container_12">
				<div class="grid_4">
					<div class="banner">
						<div class="maxheight">
							<div class="banner_title">
								<img src="images/icon1.png" alt="">
								<div class="extra_wrapper">Fast&amp;
									<div class="color1">Secure</div>
								</div>
							</div>
							 we can reduce traffic congestion to make the ride faster & also provides safety measures to all passengers. 
							<a href="#" class="fa fa-share-square"></a>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<div class="maxheight">
							<div class="banner_title">
								<img src="images/icon2.png" alt="">
								<div class="extra_wrapper">Best
									<div class="color1">Prices</div>
								</div>
							</div>
							 We provide sharable mode so that maximum passenger can travel with affordable cost.
							<a href="#" class="fa fa-share-square"></a>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<div class="maxheight">
							<div class="banner_title">
								<img src="images/icon3.png" alt="">
							  <div class="extra_wrapper">Emergncy
									<div class="color1">Service</div>
								</div>
							</div>
							In any emergency we can make contact with police station ,hospital & guardians
							<a href="#" class="fa fa-share-square"></a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="c_phone">
				<div class="container_12">
					<div class="grid_12">
						<div class="fa fa-phone"></div>7978254858
						<span>BOOK NOW!</span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
<!--==============================Content=================================-->
			<div class="content"><div class="ic"></div>
				<div class="container_12">
					<div class="grid_6">
                        <a class="type"><img src="images/page1_img1.jpg" alt=""><span class="type_caption">Economy</span></a>
                        <a class="type"><img src="images/page1_img2.jpg" alt=""><span class="type_caption">Standard</span></a>
					</div>
					<div class="grid_6">
						<a class="type"><img src="images/page1_img3.jpg" alt=""><span class="type_caption">Lux</span></a>
						<a class="type">
                            <img src="images/page1_img4.jpg" alt=""
                                 style="height: 200px; width: 100%;">
                            <span class="type_caption">Bus</span>
                        </a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					
					<div class="socials">
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						<div class="st1">
						<div class="brand">Co-<span class="color1">P</span>ilot </div>
							<a href="#">Privacy Policy</a> </div><a> Website designed by copilot.com</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</footer>

        <script>
            $(function (){
                $('#bookingForm').bookingForm({
                    ownerEmail: '#'
                });
            })
            $(function() {
                $('#bookingForm input, #bookingForm textarea').placeholder();
            });
        </script>
	</body>
</html>