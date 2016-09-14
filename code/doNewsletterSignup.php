<?php
require_once('../includes/config.php');
// Check if submit was pressed
if (isset($_POST['submit'])) {
    // Enable error reporting
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

    if(
        // Check if any fields are empty
        !empty($_POST['name']) &&
        !empty($_POST['email'])
    ) {

        require_once('../includes/dbConn.php');

        // mysqli real escape string removes invalid characters helps prevent sql injection
        $name = $objConnection->real_escape_string($_POST['name']);
        $email = $objConnection->real_escape_string($_POST['email']);

        $sql = "
                INSERT INTO
                fashion_online_newsletter
                (
                newsletterName,
                newsletterEmail
                )
                VALUES
                (
                '$name',
                '$email'
                )
                ";

        if($result = $objConnection->query($sql)) {
            session_start();
            $_SESSION['state'] = 'newsletterSuccess';
            header('location:'. $http);
        } else {
            session_start();
            $_SESSION['state'] = 'databaseError';
            header('location:'. $http);
        }
    } else {
        session_start();
        $_SESSION['state'] = 'missingField';
        header('location:'. $http);
    }

// If submit was not pressed
} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header('location:'. $http);
}