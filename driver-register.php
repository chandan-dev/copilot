<?php

$successMsg = '';
$successClass = '';

// if the session not yet started
if(empty($_SESSION)) {
	session_start();
}

// if the form not yet submitted
if(isset($_SESSION['user_id'])) {
	header('Location: profile.php');
	exit;
}

if (!empty($_POST)) {
	include('db.php');

	$firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['phone'];
    $password = $_POST['password'];
    $userType = 2;

    $sql = 'INSERT INTO users (email, password, mobile_number, user_type)
            VALUES ("' . $email . '", "' . $password . '", "' . $mobileNumber . '", "' . $userType . '")';
    if ($conn->query($sql) == TRUE) {
        $userId = $conn->insert_id;
        $currentDate = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO transporter_profile (user_id, email, mobile_number, first_name, last_name, created_date)
            VALUES (' . $userId . ', "' . $email . '", "' . $mobileNumber . '", "' . $firstName . '", "' . $lastName . '", "' . $currentDate . '")';
        if ($conn->query($sql) == TRUE) {
            $successMsg = 'Registration is successful. <a href="driver-login.php">Click here</a> to Login.';
            $successClass = 'success';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Driver Sign Up</title>
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
					<h3>Driver Sign Up</h3>

					<form id="register_form" class="login-form form  <?php echo $successClass; ?>" method="post" src="driver-register.php">
                        <div class="success_wrapper">
                            <div class="success-message"><?php echo $successMsg; ?></div>
                        </div>
						<label class="firstname">
							<input type="text" placeholder="First Name:" data-constraints="@Required" name="firstname"/>
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="lastname">
							<input type="text" placeholder="Last Name:" data-constraints="@Required" name="lastname" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="email">
							<input type="text" placeholder="E-mail:" data-constraints="@Required" name="email" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="phone">
							<input type="text" placeholder="Phone Number:" data-constraints="@Required" name="phone" />
							<span class="empty-message">*This field is required.</span>
						</label>
                        <label class="password">
                            <input type="password" placeholder="Password:" data-constraints="@Required @Length(min=8,max=20)" name="password"/>
                            <span class="empty-message">*This field is required.</span>
                            <span class="error-message">*This is not a valid password.</span>
                        </label>
                        <label class="password">
                            <input type="password" placeholder="Retype Password:" data-constraints="@Required @Length(min=8,max=20)" name="retype-password"/>
                            <span class="empty-message">*This field is required.</span>
                            <span class="error-message">*This is not a valid password.</span>
                        </label>
						<div>
							<div class="clear"></div>
							<div class="btns">
								<input type="submit" data-type="submit" class="btn" value="Register">
							</div>
						</div>
					</form>

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
		</footer>
	</body>
</html>