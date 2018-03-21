<?php

include('db.php');
include('file-upload.php');

$successClass = '';

// if the session not yet started
if(empty($_SESSION)) {
    session_start();
}

$userId = $_SESSION['user_id'];
$firstName = '';
$lastName = '';
$email = '';
$mobileNumber = '';
$secondaryEmail = '';
$secondaryPhone = '';
$age = '';
$gender = '';
$aadharNo = '';
$aadharDocument = '';

$sosFullName = '';
$sosMobileNo = '';
$sosEmail = '';
$sosAadharDocument = '';
$sosRelationship = '';

$sql = 'SELECT * FROM passenger_profile WHERE user_id = ' . $userId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $email = $row['email'];
        $mobileNumber = $row['mobile_number'];
        $secondaryEmail = $row['secondary_email'];
        $secondaryPhone = $row['secondary_mobile_number'];
        $age = $row['age'];
        $gender = $row['gender'];
        $aadharNo = $row['aadhar_number'];
        $aadharDocument = $row['aadhar_document'];

        $sosFullName = $row['sos_full_name'];
        $sosMobileNo = $row['sos_mobile_number'];
        $sosEmail = $row['sos_email'];
        $sosAadharDocument = $row['sos_aadhar_document'];
        $sosRelationship = $row['sos_relationship'];
    }
}

if (!empty($_POST)) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['phone'];
    $secondaryEmail = $_POST['secondaryemail'];
    $secondaryPhone = $_POST['secondaryphone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $aadharNo = $_POST['aadharnumber'];
    $aadharDocument = fileUpload('aadhardocument');

    $sosFullName = $_POST['sosfullname'];
    $sosMobileNo = $_POST['sosmobilenumber'];
    $sosEmail = $_POST['sosemail'];
    $sosAadharDocument = fileUpload('sosaadhardocument');
    $sosRelationship = $_POST['relationship'];

    $sql = 'UPDATE passenger_profile SET email = "' . $email . '",  mobile_number = "' . $mobileNumber . '", first_name = "' . $firstName . '",
            last_name = "' . $lastName . '", secondary_email = "' . $secondaryEmail . '", secondary_mobile_number = "' . $secondaryPhone . '",
            age = "' . $age . '", gender = "' . $gender . '", aadhar_number = "' . $aadharNo . '",
            sos_full_name = "' . $sosFullName . '", sos_mobile_number = "' . $sosMobileNo . '", sos_email = "' . $sosEmail . '",
            sos_relationship = "' . $sosRelationship . '", aadhar_document = "' . $aadharDocument . '",
            sos_aadhar_document = "' . $sosAadharDocument . '" WHERE user_id = ' . $userId;

    if ($conn->query($sql) == TRUE) {
        $successClass = 'success';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Profile</title>
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
									<li><a href="about.php">About</a></li>
									<li><a href="services.php">Services</a></li>
									<li><a href="contact.php">Contacts</a></li>
									<?php

									if(isset($_SESSION['user_id'])) {
										if ($_SESSION['user_type'] == 1) {
											echo '<li><a href="book-a-ride.php">Book A Ride</a></li>';
											echo '<li class="current"><a href="passenger-profile.php">Profile</a></li>';
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
			<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div class="container_12">
					<h3>Profile Details</h3>

					<form id="register_form" class="login-form form <?php echo $successClass; ?>" method="post" action="passenger-profile.php"
                        enctype="multipart/form-data">
						<div class="success_wrapper">
							<div class="success-message">Profile data saved successfully.</div>
						</div>
						<label class="firstname">
							<input type="text" placeholder="First Name:" data-constraints="@Required"
                                name="firstname" value="<?php echo $firstName; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="lastname">
							<input type="text" placeholder="Last Name:" data-constraints="@Required"
                                name="lastname" value="<?php echo $lastName; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="email">
							<input type="text" placeholder="E-mail:" data-constraints="@Required"
                                name="email" value="<?php echo $email; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="phone">
							<input type="text" placeholder="Phone Number:" data-constraints="@Required"
                                name="phone" value="<?php echo $mobileNumber; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="secondary-email">
							<input type="text" placeholder="Secondary E-mail:" data-constraints="@Required"
                                name="secondaryemail" value="<?php echo $secondaryEmail; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="secondary-phone">
							<input type="text" placeholder="Secondary Phone Number:" data-constraints="@Required"
                                name="secondaryphone" value="<?php echo $secondaryPhone; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="age">
							<input type="text" placeholder="Age:" data-constraints="@Required"
								   name="age" value="<?php echo $age; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="gender">
                            <select style="width: 100%; height: 35px; margin-bottom: 7px;" name="gender">
                                <option value="0">Select gender</option>
                                <option value="1" <?php if ($gender == 1) echo 'selected'; ?>>Male</option>
                                <option value="2" <?php if ($gender == 2) echo 'selected'; ?>>Female</option>
                            </select>

							<input type="text" placeholder="Gender:" data-constraints="@Required"
								   name="gender" value="<?php echo $gender; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="aadhar-number">
                            <input type="text" placeholder="Aadhar No:" data-constraints="@Required"
                                   name="aadharnumber" value="<?php echo $aadharNo; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="aadhar-document">
							<input type="file" placeholder="Upload Document:" data-constraints="@Required"
								   name="aadhardocument" value="<?php echo $aadharDocument; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>

                        <div class="clear"></div>

						<h3>SOS Details</h3>

						<label class="sos-full-name">
							<input type="text" placeholder="SOS Full Name:" data-constraints="@Required"
                                name="sosfullname" value="<?php echo $sosFullName; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="sos-mobile-number">
							<input type="text" placeholder="SOS Mobile Number:" data-constraints="@Required"
                                name="sosmobilenumber" value="<?php echo $sosMobileNo; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="sos-email">
							<input type="text" placeholder="SOS Email:" data-constraints="@Required"
                                name="sosemail" value="<?php echo $sosEmail; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="sos-aadhar-document">
							<input type="file" placeholder="Upload Document:" data-constraints="@Required"
                                name="sosaadhardocument" value="<?php echo $sosAadharDocument; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="sos-relationship">
							<select style="width: 100%; height: 35px;" name="relationship">
								<option value="0">Select relationship with SOS</option>
								<option value="1" <?php if ($sosRelationship == 1) echo 'selected'; ?>>Father</option>
								<option value="2" <?php if ($sosRelationship == 2) echo 'selected'; ?>>Mother</option>
								<option value="3" <?php if ($sosRelationship == 3) echo 'selected'; ?>>Brother</option>
								<option value="4" <?php if ($sosRelationship == 4) echo 'selected'; ?>>Sister</option>
								<option value="5" <?php if ($sosRelationship == 5) echo 'selected'; ?>>Husband</option>
								<option value="6" <?php if ($sosRelationship == 6) echo 'selected'; ?>>Wife</option>
								<option value="7" <?php if ($sosRelationship == 7) echo 'selected'; ?>>Other</option>
							</select>
							<span class="empty-message">*This field is required.</span>
						</label>
						<div>
							<div class="clear"></div>
							<div class="btns">
                                <input type="submit" data-type="submit" class="btn" value="Save">
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