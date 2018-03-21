<?php

include('db.php');

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

if (!empty($_POST)) {
    $errMsg = '';
    $errClass = '';
	$email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'SELECT user_id FROM users WHERE user_type = 1 AND email = "' . $email . '" AND password = "' . $password . '"';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION['user_id'] = $row['user_id'];
			$_SESSION['user_type'] = 1;
            header('Location: book-a-ride.php');

            exit;
        }
    } else {
        $errMsg = 'The credential you entered is invalid.';
        $errClass = 'error';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Passenger Sign In</title>
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
									<li class="current"><a href="login.php">Sign In</a></li>
									<li><a href="register.php">Register</a></li>
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
					<h3>Passenger Sign In</h3>

					<form id="login_form" class="form <?php echo $errClass; ?> login-form" method="post" src="passenger-login.php">
                        <div class="success_wrapper">
                            <div class="success-message"><?php echo $errMsg; ?></div>
                        </div>

                        <label class="email">
							<input type="text" placeholder="E-mail or Mobile Number:" data-constraints="@Required"
                                name="email"/>
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid email or mobile number.</span>
						</label>
						<label class="password">
							<input type="password" placeholder="Password:" data-constraints="@Required @Length(min=8,max=20)"
                                name="password"/>
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid password.</span>
						</label>
						<div>
							<div class="clear"></div>
							<div class="btns">
								<input type="submit" data-type="submit" class="btn" value="Sign In">
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