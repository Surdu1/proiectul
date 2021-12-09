<?php
require_once 'vendor/autoload.php';
$google_client = new Google_Client();

$google_client->setClientId('230722011315-199hifpl221fd2mfvlcj1r7bjij71f80.apps.googleusercontent.com');

$google_client->setClientSecret('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');

$google_client->setRedirectUri('http://localhost/login.php');


$google_client->addScope('email');

$google_client->addScope('profile');


?>