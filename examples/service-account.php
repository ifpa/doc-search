<?php
/*
 * Copyright 2013 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
session_start();
include_once "templates/base.php";

/************************************************
  Make an API request authenticated with a service
  account.
 ************************************************/
require_once realpath(dirname(__FILE__) . '/../autoload.php');

/************************************************
  ATTENTION: Fill in these values! You can get
  them by creating a new Service Account in the
  API console. Be sure to store the key file
  somewhere you can get to it - though in real
  operations you'd want to make sure it wasn't
  accessible from the webserver!
  The name is the email address value provided
  as part of the service account (not your
  address!)
  Make sure the Books API is enabled on this
  account as well, or the call will fail.
 ************************************************/
$client_id = '1023222931494-co46lldi08somjekc8j5dp50i5f43l8u.apps.googleusercontent.com'; //Client ID
$service_account_name = '1023222931494-co46lldi08somjekc8j5dp50i5f43l8u@developer.gserviceaccount.com'; //Email Address
$key_file_location = 'key.p12'; //key.p12

echo pageHeader("Service Account Access");

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");

/************************************************
  If we have an access token, we can carry on.
  Otherwise, we'll get one with the help of an
  assertion credential. In other examples the list
  of scopes was managed by the Client, but here
  we have to list them manually. We also supply
  the service account
 ************************************************/

$key  = file_get_contents($key_file_location);
$cred = new Google_Auth_AssertionCredentials(
    $service_account_name,
    array(
        'https://www.googleapis.com/auth/drive'
    ),
    $key
);

$client->addScope('https://www.googleapis.com/auth/drive');
$client->setAssertionCredentials($cred);

if ($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
}

$service = new Google_Service_Drive($client);
$result = array();
$pageToken = NULL;

echo "<br>Available scopes: " . $service->availableScopes;

do {
    try {
        $parameters = array();
        if ($pageToken) {
            $parameters['pageToken'] = $pageToken;
        }

        $files = $service->files->listFiles($parameters);

        $result = array_merge($result, $files->getItems());

        $pageToken = $files->getNextPageToken();
    } catch (Exception $e) {
        echo "<br/>An error occurred: " . $e->getMessage();
        $pageToken = NULL;
    }
} while ($pageToken);

echo "<pre>";
print_r($result);
echo "</pre>";

echo "<br />Execution completed.";