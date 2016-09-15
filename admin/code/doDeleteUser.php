<?php
require_once('../includes/config.php');

// Enable error reporting
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Check if any fields are empty
if(!empty($uri[2])) {

    require_once('../includes/dbConn.php');

    // mysqli real escape string removes invalid characters helps prevent sql injection
    $idUsers = $uri[2];

    $sql = "
            DELETE FROM
            fashion_online_users
            WHERE 
            idUsers = '$idUsers'
            ";

    if($result = $objConnection->query($sql)) {
        session_start();
        $_SESSION['state'] = 'deleteSuccess';
        header('location:'. $http . '/retailers');
    } else {
        session_start();
        $_SESSION['state'] = 'databaseError';
        header('location:'. $http . '/retailers');
    }
} else {
    session_start();
    $_SESSION['state'] = 'missingField';
    header('location:'. $http . '/retailers');
}