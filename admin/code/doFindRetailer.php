<?php
require_once('../includes/config.php');
if(isset($_POST['submit'])) {
    if(!empty($_POST['zipcode']) || !empty($_POST['cityname'])) {
        require_once('../includes/dbConn.php');

        if(isset($_POST['zipcode']) && !empty($_POST['zipcode'])) {
            $zipcode = $objConnection->real_escape_string($_POST['zipcode']);
            $zipcode = $zipcode . '/';
        }

        if(isset($_POST['cityname']) && !empty($_POST['cityname'])) {
            $cityname = $objConnection->real_escape_string($_POST['cityname']);
            $cityname = $cityname . '/';
            $cityname = strtolower($cityname);
        }

        header('location:' . $http . '/retailers/' . $zipcode . $cityname);

    } else {
        header('location:' . $http . '/retailers');
    }
} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header('location:' . $http . '/retailers');
}