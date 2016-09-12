<?php
include_once('../includes/config.php');
session_start();
unset($_SESSION['login']);
header('location:' . $http . '/loggedOut');