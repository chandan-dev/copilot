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

$vehicleRegdNo = '';
$vehicleModel = '';
$vehicleColor = '';
$vehiclePhoto = '';

$driverName = '';
$driverMobile = '';
$driverEmail = '';
$driverAge = '';
$driverGender = '';
$drivingLicenseNo = '';
$drivingAadharNo = '';
$drivingLicense = '';
$driverAadhar = '';

$sql = 'SELECT * FROM transporter_profile WHERE user_id = ' . $userId;
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

        $vehicleRegdNo = $row['vehicle_reg_no'];
        $vehicleModel = $row['vehicle_model'];
        $vehicleColor = $row['vehicle_color'];
        $vehiclePhoto = fileUpload('vehicle_photo');

        $driverName = $row['driver_name'];
        $driverMobile = $row['driver_mobile'];
        $driverEmail = $row['driver_email'];
        $driverAge = $row['driver_age'];
        $driverGender = $row['driver_gender'];
        $drivingLicenseNo = $row['driving_license_no'];
        $drivingAadharNo = $row['driver_aadhar_no'];
        $drivingLicense = $row['driving_license_document'];
        $driverAadhar = $row['aadhar_document'];
    }
}

if (!empty($_POST)) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['phone'];
    $secondaryEmail = $_POST['secondaryemail'];
    $secondaryPhone = $_POST['secondaryphone'];

    $vehicleRegdNo = $_POST['vehicleregdno'];
    $vehicleModel = $_POST['vehiclemodel'];
    $vehicleColor = $_POST['vehiclecolor'];
    $vehiclePhoto = $_POST['vehiclephoto'];

    $driverName = $_POST['drivername'];
    $driverMobile = $_POST['drivermobile'];
    $driverEmail = $_POST['driveremail'];
    $driverAge = $_POST['driverage'];
    $driverGender = $_POST['drivergender'];
    $drivingLicenseNo = $_POST['drivinglicenseno'];
    $drivingAadharNo = $_POST['driveraadharno'];

    $drivingLicense = fileUpload('drivinglicense');
    $driverAadhar = fileUpload('driveraadhar');

    $sql = 'UPDATE transporter_profile SET email = "' . $email . '",  mobile_number = "' . $mobileNumber . '", first_name = "' . $firstName . '",
            last_name = "' . $lastName . '", secondary_email = "' . $secondaryEmail . '", secondary_mobile_number = "' . $secondaryPhone . '",
            vehicle_reg_no = "' . $vehicleRegdNo . '", vehicle_model = "' . $vehicleModel . '", vehicle_color = "' . $vehicleColor . '",
            vehicle_photo = "' . $vehiclePhoto . '", driver_name = "' . $driverName . '", driver_mobile = "' . $driverMobile . '",
            driver_email = "' . $driverEmail . '", driver_age = "' . $driverAge . '", driver_gender = "' . $driverGender . '",
            driving_license_no = "' . $drivingLicenseNo . '", driver_aadhar_no = "' . $drivingAadharNo . '",
            driving_license_document = "' . $drivingLicense . '", aadhar_document = "' . $driverAadhar . '" WHERE user_id = ' . $userId;

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
									<li class="current"><a href="profile.php">Profile</a></li>
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

					<form id="register_form" class="login-form form <?php echo $successClass; ?>" method="post" action="profile.php"
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

                        <div class="clear"></div>

						<h3>Vehicle Details</h3>

						<label class="vehicle-regd-no">
							<input type="text" placeholder="Regd Number:" data-constraints="@Required"
                                name="vehicleregdno" value="<?php echo $vehicleRegdNo; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="vehicle-model">
							<input type="text" placeholder="Model:" data-constraints="@Required"
                                name="vehiclemodel" value="<?php echo $vehicleModel; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="vehicle-color">
							<input type="text" placeholder="Color:" data-constraints="@Required"
                                name="vehiclecolor" value="<?php echo $vehicleColor; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
						<label class="vehicle-photo1">
							<input type="file" placeholder="Upload Photo:" data-constraints="@Required"
                                name="vehiclephoto" value="<?php echo $vehiclePhoto; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>

                        <div class="clear"></div>

                        <h3>Driver Details</h3>

						<label class="driver-name">
							<input type="text" placeholder="Driver Full Name:" data-constraints="@Required"
                                name="drivername" value="<?php echo $driverName; ?>" />
							<span class="empty-message">*This field is required.</span>
						</label>
                        <label class="driver-mobile">
                            <input type="text" placeholder="Driver Mobile:" data-constraints="@Required"
                                   name="drivermobile" value="<?php echo $driverMobile; ?>" />
                            <span class="empty-message">*This field is required.</span>
                        </label>
                        <label class="driver-email">
                            <input type="text" placeholder="Driver Email:"
                                   name="driveremail" value="<?php echo $driverEmail; ?>" />
                        </label>
                        <label class="driver-age">
                            <input type="text" placeholder="Driver Age:" data-constraints="@Required"
                                   name="driverage" value="<?php echo $driverAge; ?>" />
                            <span class="empty-message">*This field is required.</span>
                        </label>
                        <label class="driver-gender">
                            <select style="width: 100%; height: 35px; margin-bottom: 7px;" name="drivergender">
                                <option value="0">Select driver gender</option>
                                <option value="1" <?php if ($driverGender == 1) echo 'selected'; ?>>Male</option>
                                <option value="2" <?php if ($driverGender == 2) echo 'selected'; ?>>Female</option>
                            </select>
                        </label>
                        <label class="driving-license-no">
                            <input type="text" placeholder="Driving License No:" data-constraints="@Required"
                                   name="drivinglicenseno" value="<?php echo $drivingLicenseNo; ?>" />
                            <span class="empty-message">*This field is required.</span>
                        </label>
                        <label class="driver-aadhar-no">
                            <input type="text" placeholder="Driver Aadhar No:" data-constraints="@Required"
                                   name="driveraadharno" value="<?php echo $drivingAadharNo; ?>" />
                            <span class="empty-message">*This field is required.</span>
                        </label>
                        <label class="driving-license">
                            <input type="file" placeholder="Driving License Document:" data-constraints="@Required"
                                   name="drivinglicense" value="<?php echo $drivingLicense; ?>" />
                            <span class="empty-message">*This field is required.</span>
                        </label>
                        <label class="driver-aadhar">
                            <input type="file" placeholder="Driver Aadhar Document:" data-constraints="@Required"
                                   name="driveraadhar" value="<?php echo $driverAadhar; ?>" />
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