<?php

// if the session not yet started
if(empty($_SESSION)) {
	session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>About</title>
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
				<div class="menu_block">
					<div class="container_12">
						<div class="grid_12">
							<nav class="horizontal-nav full-width horizontalNav-notprocessed">
								<ul class="sf-menu">
									<li><a href="index.php">Home</a></li>
									<li class="current"><a href="about.php">About</a></li>
									<li><a href="contact.php">Contacts</a></li>

                                    <?php

                                    if(isset($_SESSION['user_id'])) {
                                        if ($_SESSION['user_type'] == 1) {
                                            echo '<li><a href="book-a-ride.php">Book A Ride</a></li>';
                                        } else {
                                            echo '<li><a href="profile.php">Profile</a></li>';
                                        }
                                        echo '<li><a href="logout.php">Logout</a></li>';
                                    } else {
                                        ?>

                                        <li><a href="login.php">Login</a></li>
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
<!--==============================Content=================================-->
			<div class="content"><div class="ic"> </div>
				<div class="container_12">
					<div class="grid_7">
						<h3>A Few Words About Us</h3>
						<img src="images/page2_img1.jpg" alt="" class="img_inner fleft">
						<div class="extra_wrapper">
							<div class="text1 color2">
								<a href="#"> </a>
							</div> 
						</div>
						<div class="clear cl1"></div>
						<p>Co-pilot is Founded in 2018 by four friens Chandan ku.Palei,Ashok Behera,Deepak ku.jena and Nisith Chakrabarty, It is one of the world’s largest ride-sharing companies. CoPilot integrates city transportation for customers and driver-partners onto a mobile technology platform ensuring convenient, transparent, and quick service fulfilment. It is  focused on leveraging the best of technology and building innovative solutions ground-up, that are relevant at global scale.
						<br><br>We provide cab service  with different features i.e in shareable and non shareable mode and also provide the public bus ticketing system,tourist bus booking service etc.This app provides very good tracking system to all the vehicles and provides good safety measures to all the pasengers.
						<br><br>
						                 We will believe in the passengers satisfaction."Ride with us & enjoy with us."
					</div>
					<div class="grid_4 prefix_1">
						<h3>Why Choose Us</h3>
						<ul class="list li">
							<li class="list_count">1</li>
							<li class="extra_wrapper">
								<div class="text1 color2"><a href="#">Minimize Traffic Congestion</a></div>
								 We can reduce traffic congestion by providing shareable mode of vehicle during transportation.
							</li>
						</ul>						 
						<ul class="list li">
							<li class="list_count">2</li>
							<li class="extra_wrapper">
								<div class="text1 color2"><a href="#">For School Bus  </a></div>
								 We provides tracking system for school bus 
							</li>
						</ul>
						<ul class="list li">
							<li class="list_count">3</li>
							<li class="extra_wrapper">
								<div class="text1 color2"><a href="#">For private or public Bus  </a></div>
							   We provide booking system for passengers in private or public bus
							</li>
						</ul>
						<ul class="list li">
							<li class="list_count">4</li>
							<li class="extra_wrapper">
								<div class="text1 color2"><a href="#"> Finding Shortest Route</a></div>
								 By the help of google map, Here  first we have to fix Source and Destination so that, google map can find the shortest path among several paths.

							</li>
						</ul>
						<ul class="list li">
							<li class="list_count">5</li>
							<li class="extra_wrapper">
								<div class="text1 color2"><a href="#"> Safety measures for passengers</a></div>
								  We provide best safety measures for women ,student as well as for all passengers.
							</li>
						</ul>
						<ul class="list li">
							<li class="list_count">6</li>
							<li class="extra_wrapper">
								<div class="text1 color2"><a href="#">Emergency Service </a></div>
								 In  any emergency we can make  contact  with police station, hospital and parents / guardian.
							</li>
						</ul>
					</div>
					<div class="clear"></div>
					<div class="grid_12">
						<h3 class="h3__ind1">The duo behind Co-Pilot</h3>
					</div>
					<div class="grid_4">
						<blockquote class="bq1">
							<p><i> Nisith joiend in the group and handeled the back-end developement . </i></p>
							<div class="color2">Nisith Chakrabarty</div>
						</blockquote>
					</div>
					<div class="grid_4">
						<blockquote class="bq1">
							<p><i> Ashok is a student Of IMIT,cuttack .He started developing Co-Pilot with his three friends in 2018 </i></p>
							<div class="color2">Ashok Behera</div>
						</blockquote>
					</div>
					<div class="grid_4">
						<blockquote class="bq1">
							<p><i> Chandan & Deepak are the student of IMIT,cuttack.They joined with Ashok and startd developing with him.</i></p>
							<div class="color2">Chandan Palei & Deepak Jena</div>
						</blockquote>
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