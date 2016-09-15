<?php
require_once('../includes/config.php');
// Check if submit was pressed
if (isset($_POST['submit'])) {
    // Enable error reporting
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

    $idUsers = $_POST['idUsers'];

    if(
        // Check if any fields are empty
        !empty($_POST['userName']) &&
        !empty($_POST['userAddress']) &&
        !empty($_POST['userPhone']) &&
        !empty($_POST['zipcode'])
    ) {

        require_once('../includes/dbConn.php');

        // mysqli real escape string removes invalid characters helps prevent sql injection
        $userName = $objConnection->real_escape_string($_POST['userName']);
        $userAddress = $objConnection->real_escape_string($_POST['userAddress']);
        $userPhone = $objConnection->real_escape_string($_POST['userPhone']);
        $zipcode = $objConnection->real_escape_string($_POST['zipcode']);

        $sql = "
                UPDATE 
                fashion_online_users
                
                SET 
                userName = '$userName',
                userAddress = '$userAddress',
                userPhone = '$userPhone',
                zip_id = '$zipcode'
                
                WHERE 
                idUsers = '$idUsers'
                ";

        if($result = $objConnection->query($sql)) {
            session_start();
            $_SESSION['state'] = 'updateSuccess';
            header('location:'. $http . '/retailer/' . $idUsers);
        } else {
            session_start();
            $_SESSION['state'] = 'databaseError';
            header('location:'. $http . '/retailer/' . $idUsers);
        }
    } else {
        session_start();
        $_SESSION['state'] = 'missingField';
        header('location:'. $http . 'retailer/' . $idUsers);
    }

// If submit was not pressed
} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header('location:'. $http . '/retailers');
}