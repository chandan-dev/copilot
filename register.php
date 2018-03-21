<?php

// if the session not yet started
if(empty($_SESSION)) {
	session_start();
}

// if the user already logged in
if(isset($_SESSION['user_id'])) {
	if ($_SESSION['user_type'] == 1) {
		header('Location: book-a-ride.php');
	} else {
		header('Location: profile.php');
	}
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
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
							<li><a href="login.php">Sign In</a></li>
							<li class="current"><a href="register.php">Register</a></li>
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
			<h3>Sign Up</h3>

			<div class="grid_5">
				<h3>
                    Transport Provider
				</h3>
				<p>
					Find everything you need to track your success on the road.
				</p>
				<a href="driver-register.php" data-type="submit" class="btn">TRANSPORT PROVIDER SIGN UP</a>
			</div>

			<div class="grid_6 prefix_1">
				<h3>
					Passenger
				</h3>
				<p>
					Find everything you need to track your success on the road.
				</p>
				<a href="passenger-register.php" data-type="submit" class="btn">PASSENGER SIGN UP</a>
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