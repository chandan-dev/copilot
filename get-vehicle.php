<?php

include "client/Uber.php";
include "uber-credential.php";

$source = $_POST['start'];
$destination = $_POST['end'];

$sourceLatLong = getLatLong($source);
$sourceLatitude = $sourceLatLong['latitude'];
$sourceLongitude = $sourceLatLong['longitude'];

$destLatLong = getLatLong($destination);
$destLatitude = $destLatLong['latitude'];
$destLongitude = $destLatLong['longitude'];

function getLatLong($address) {
	if(!empty($address)) {
		//Formatted address
		$formattedAddr = str_replace(' ','+',$address);
		//Send request and receive json data by address
		$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false');
		$output = json_decode($geocodeFromAddr);
		//Get latitude and longitute from json data
		$data['latitude']  = $output->results[0]->geometry->location->lat;
		$data['longitude'] = $output->results[0]->geometry->location->lng;
		//Return latitude and longitude of the given address
		if(!empty($data)) {
			return $data;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

$uber = new Uber();

$uber->setClientId($client_id);
$uber->setClientSecret($client_secret);
$uber->setRedirectUri($redirect_uri);
$uber->setScope('privileged');
$uber->setAccessToken($accessToken);

$products = $uber->request('products', $uber->getAccessToken(),
	[
        'latitude' => $sourceLatitude,
		'longitude' => $sourceLongitude
	]);

$result = [];
foreach($products->products as $key => $product) {
    $result[] = json_encode($product);
}

print_r(json_encode($result));

//print_r($products);
?>