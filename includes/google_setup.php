<?php
require_once 'vendor/autoload.php';
$client_id = '302882991968-4efjojbdcnigsvt1qah8jk2of2nm0en8.apps.googleusercontent.com';
$client_secret = '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';

$redirectUri = 'http://localhost/login/google-callback.php';
$client = new Google_Client();
$client->setClientId($clientID);

$client->addScope("email");
$client->addScope("profile");
?>
