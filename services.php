<?php

// if the session not yet started
if(empty($_SESSION)) {
	session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Services</title>
		<meta charset="utf-8">
		<meta name = "format-detection" content = "telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
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
                                    <li class="current"><a href="services.php">Services</a></li>
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
							<a href="index.html">
								<img src="images/logo.png" alt="Your Happy Family">
							</a>
						</h1>
					</div>
				</div>
				<div class="clear"></div>
			</header>
<!--==============================Content=================================-->
			<div class="content"><div class="ic"> </div>
				<div class="container_12">
					<div class="grid_12">
						<h3>Services Overview</h3>
					</div>
					<div class="grid_4">
						<div class="box">
							<div class="maxheight">
								<img src="images/page4_img1.jpg" alt="">
								<div class="text1 color2">
									<a href="#"> Co-Pilot Select</a>
								</div>
								 Co-Pilot Select is a subscription plan which provides extra facilities to the customers opting for it. Customers have to pay certain amount of money to buy the subscription. This package includes certain facilities like: Free access to lounges at some airports, Priority booking of cabs, Discounts on regular fares, etc.

								<br>
								<a href="#" class="btn">Read More</a>
							</div>
						</div>
					</div>
					 
					<div class="grid_4">
						<div class="box">
							<div class="maxheight">
								<img src="images/page4_img3.jpg" alt="">
								<div class="text1 color2">
									<a href="#">    Share your ride and save money </a>
								</div>
								
								Co-pilot route matches you with riders headed in the same direction. It's always the cheapest way to Co-Pilot. And sharing the ride adds only a few minutes to your trip.
								  
								  
								<br>  
								<a href="#" class="btn">Read More</a>
							</div>
						</div>
					</div>					 
					<div class="grid_4">
						<div class="box">
							<div class="maxheight">
								<img src="images/page4_img5.jpg" alt="">
								<div class="text1 color2">
									<a href="#"> Anywhere, anytime </a>
								</div>
								 Daily commute.Early morning flight. Late night drinks. Wherever you’re headed, count on Co-pilot for a ride ,no reservations required.
								<br>
								<a href="#" class="btn">Read More</a>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="box">
							<div class="maxheight">
								<img src="images/page4_img6.jpg" alt="">
								<div class="text1 color2">
									<a href="#">  Live free in Emergency </a>
								</div>
								  In case of any emergency just tap the home button when the App is on ,we will connect to your guardian,police station,hospital according to your choice.
								<br>
								<a href="#" class="btn">Read More</a>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="box">
							<div class="maxheight">
								<img src="images/page4_img7.jpg" alt="">
								<div class="text1 color2">
									<a href="#"> Track your Kid</a>
								</div>
								   Co-Pilot provide you the oppertunity to track your kid in your hand. You can also book a ticket and track to the public  and private bus
								<br>
								<a href="#" class="btn">Read More</a>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="box">
							<div class="maxheight">
								<img src="images/page4_img8.jpg" alt="">
								<div class="text1 color2">
									<a href="#">Low-cost to luxury   </a>
								</div>
								Economy cars at everyday prices are always available. When you just a need you can call  for a car or SUV.
								<br>
								<a href="#" class="btn">Read More</a>
							</div>
						</div>
					</div>
					 
					<div class="clear"></div>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
        <footer>
            <div class="container_12">
                <div class="grid_12">
                    <div class="f_phone"><span>Call Us:</span> 7978254858</div>
                    <div class="socials">
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-google-plus"></a>
                    </div>
                    <div class="copy">
                        <div class="st1">
                            <div class="brand">Co-<span class="color1">P</span>ilot </div>
                            <a href="#">Privacy Policy</a> </div> Website designed by copilot.com <a href="" rel="nofollow"></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </footer>
	</body>
</html>