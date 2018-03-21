<?php

// if the session not yet started
if(empty($_SESSION)) {
	session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contacts</title>
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
									<li class="current"><a href="contact.php">Contacts</a></li>
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
<!--==============================Content=================================-->
			<div class="content"><div class="ic"> </div>
				<div class="container_12">
					<div class="grid_12">
						<h3>Find Us</h3>
						<div class="map">
							<figure>
								 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3737.753058024706!2d85.89343381449396!3d20.4753332863008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a19128185faaba9%3A0x11073d3baae0217!2sIMIT!5e0!3m2!1sen!2sin!4v1521268001871" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</figure>
						</div>
					</div>
					<div class="grid_5">
						<h3>Contact Info</h3>
						<div class="map">
							<div class="text1 color2">Co-Pilot also provides individual contact numbers for its customers with the help of which customers can contact from anywhere. Customers can find the contact numbers from the website of this company easily and dial to this company to book the cab anytime.
<br><br>Co-Pilot Customer Care Details: <br>
                  This company also provides customer care numbers for its customer care numbers using which they can call and solve their problems easily. The support team of this company work all the time and provide solutions for the customers.

 </div>
							<p>Don’t forget, 24/7 support is available for passanger support <span class="color1"><a href="" rel="nofollow"></a></span></p>
							<p>TOLL-FREE: 1800156256<span class="color1"><a href="" rel="nofollow"></a></span></p>
							<address>
								<dl>
									<dt>The Company Name Co-pilot pvt.ltd <br>
										 Cuttack,Odisha,753001<br>
										 1st floor IMIT,cuttack
									</dt>
									<dd><span>Mobile No.</span>7978254858 , 8658231166,7978615741 , 8249744031</dd>
									<dd><span>FAX:</span>+ 9692116658</dd>
									<dd>E-mail: support@copilot.com<a href="#" class="color1"> </a></dd>
								</dl>
							</address>
						</div>
					</div>
					<div class="grid_6 prefix_1">
						<h3>Contact Form</h3>
						<form id="form">
							<div class="success_wrapper">
								<div class="success-message">Contact form submitted</div>
							</div>
							<label class="name">
								<input type="text" placeholder="Name:" data-constraints="@Required @JustLetters" />
								<span class="empty-message">*This field is required.</span>
								<span class="error-message">*This is not a valid name.</span>
							</label>
							<label class="email">
								<input type="text" placeholder="E-mail:" data-constraints="@Required @Email" />
								<span class="empty-message">*This field is required.</span>
								<span class="error-message">*This is not a valid email.</span>
							</label>
							<label class="phone">
								<input type="text" placeholder="Phone:" data-constraints="@Required @JustNumbers"/>
								<span class="empty-message">*This field is required.</span>
								<span class="error-message">*This is not a valid phone.</span>
							</label>
							<label class="message">
								<textarea placeholder="Message:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
								<span class="empty-message">*This field is required.</span>
								<span class="error-message">*The message is too short.</span>
							</label>
							<div>
								<div class="clear"></div>
								<div class="btns">
									<a href="#" data-type="submit" class="btn">Send</a>
									<a href="#" data-type="reset" class="btn">Clear</a>
								</div>
							</div>
						</form>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="f_phone"><span>Call Us:</span>7978254858</div>
					<div class="socials">
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						<div class="st1">
						<div class="brand">Co-<span class="color1">P</span>ilot </div>
						<a href="#">Privacy Policy</a> </div> Website designed by copilot.com<a href="" rel="nofollow"></a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</footer>
	</body>
</html>