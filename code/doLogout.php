<?php
include_once('../includes/config.php');
session_start();
unset($_SESSION['login']);
$_SESSION['state'] = 'loggedOut';
header('location:' . $http);