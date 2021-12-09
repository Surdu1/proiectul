<?php
session_start();
session_destroy();
require_once 'config_login.php';
$google_client->revokeToken();
header('Location: index.php');
?>