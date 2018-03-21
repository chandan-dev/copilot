<?php

if(empty($_SESSION)) {
    session_start();
}

include "db.php";
require_once "Mail.php";

$userId = $_SESSION['user_id'];

$sql = 'SELECT sos_full_name, sos_mobile_number, sos_email, sos_relationship, first_name, last_name
        FROM passenger_profile WHERE user_id = "' . $userId . '"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sosName = $row['sos_full_name'];
        $sosMobileNo = $row['sos_mobile_number'];
        $sosEmail = $row['sos_email'];
        $passengerName = $row['first_name'] . ' ' . $row['last_name'];
        $relationship = '';

        switch ($row['sos_relationship']) {
            case 1:
                $relationship = 'Father';
                break;

            case 2:
                $relationship = 'Mother';
                break;

            case 3:
                $relationship = 'Brother';
                break;

            case 4:
                $relationship = 'Sister';
                break;

            case 5:
                $relationship = 'Husband';
                break;

            case 6:
                $relationship = 'Wife';
                break;

            case 7:
                $relationship = 'Relative';
        }
    }
}
$sosName = 'Chandan Palei';
$sosEmail = 'paleichandan50@gmail.com';

$from = "Co-Pilot <support@copilot.com>";
$to = "$sosName <$sosEmail>";

$subject = "Emergency Alert";
$body = "Hi,\n\n Your $relationship is in problem and needs you to contact.";

$host = "smtp.mailtrap.io";
$port = "2525";
$username = "31cf1190965337";
$password = "8387e73d281ff4";

$headers = array (
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp',
    array (
        'host' => $host,
        'port' => $port,
        'auth' => true,
        'username' => $username,
        'password' => $password
    )
);
$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
    echo("<p>" . $mail->getMessage() . "</p>");
} else {
    echo("<p>Message successfully sent!</p>");
}

exit;