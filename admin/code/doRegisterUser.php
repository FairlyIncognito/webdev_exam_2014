<?php
require_once('../includes/config.php');
// Check if submit was pressed
if (isset($_POST['submit'])) {
    // Enable error reporting
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

    if(
        // Check if any fields are empty
        !empty($_POST['userAddress']) &&
        !empty($_POST['userPhone']) &&
        !empty($_POST['userName']) &&
        !empty($_POST['userPassword']) &&
        !empty($_POST['userDescription']) &&
        !empty($_POST['zipcode'])
    ) {

        require_once('../includes/dbConn.php');
        require_once('fncUserSql.php');

        // mysqli real escape string removes invalid characters helps prevent sql injection
        $userAddress = $objConnection->real_escape_string($_POST['userAddress']);
        $userPhone = $objConnection->real_escape_string($_POST['userPhone']);
        $userName = $objConnection->real_escape_string($_POST['userName']);
        $userPassword = $objConnection->real_escape_string($_POST['userPassword']);
        $userDescription = $objConnection->real_escape_string($_POST['userDescription']);
        $zip_id = $objConnection->real_escape_string($_POST['zipcode']);

        // Hash password with Blowfish encryption
        $userHashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);
        // Register user to database
        if(
            registerUser(
            $objConnection,
            $userAddress,
            $userPhone,
            $userName,
            $userHashedPassword,
            $userDescription,
            $zip_id
            )
        ) {
            session_start();
            $_SESSION['state'] = 'userCreated';
            header('location:'. $http . '/admin');
        } else {
            session_start();
            $_SESSION['state'] = 'userExists';
            header('location:'. $http . '/admin');
        }
    } else {
        session_start();
        $_SESSION['state'] = 'missingField';
        header('location:'. $http . '/admin');
    }

// If submit was not pressed
} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header('location:'. $http . '/admin');
}