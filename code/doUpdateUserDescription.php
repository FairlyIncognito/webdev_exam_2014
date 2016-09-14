<?php
require_once('../includes/config.php');
// Check if submit was pressed
if (isset($_POST['submit'])) {
    // Enable error reporting
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

    session_start();
    $idUsers = $_SESSION['login']['idUsers'];

    if(
        // Check if any fields are empty
        !empty($_POST['userDescription'])
    ) {

        require_once('../includes/dbConn.php');

        // mysqli real escape string removes invalid characters helps prevent sql injection
        $userDescription = $objConnection->real_escape_string($_POST['userDescription']);

        $sql = "
                UPDATE 
                fashion_online_users
                
                SET 
                userDescription = '$userDescription'
                
                WHERE 
                idUsers = '$idUsers'
                ";

        if($result = $objConnection->query($sql)) {
            session_start();
            $_SESSION['state'] = 'updateSuccess';
            header('location:'. $http . '/user');
        } else {
            session_start();
            $_SESSION['state'] = 'databaseError';
            header('location:'. $http . '/user');
        }
    } else {
        session_start();
        $_SESSION['state'] = 'missingField';
        header('location:'. $http . '/user');
    }

// If submit was not pressed
} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header('location:'. $http . '/user');
}