<?php

session_start();

require_once realpath(dirname(__FILE__) . '/../autoload.php');

$client_id = '1023222931494-co46lldi08somjekc8j5dp50i5f43l8u.apps.googleusercontent.com';
$service_account_name = '1023222931494-co46lldi08somjekc8j5dp50i5f43l8u@developer.gserviceaccount.com';
$key_file_location = 'key.p12';

$client = new Google_Client();

$client->setApplicationName("IFP_Document_Search");

$key = file_get_contents($key_file_location);

$cred = new Google_Auth_AssertionCredentials(
    $service_account_name,
    array('https://www.googleapis.com/auth/drive'),
    $key
);

$client->addScope('https://www.googleapis.com/auth/drive');
$client->setAssertionCredentials($cred);

if ($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
}

$service = new Google_Service_Drive($client);

?>