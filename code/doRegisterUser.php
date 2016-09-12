<?php
// Check if submit was pressed
if (isset($_POST['submit'])) {
    // Enable error reporting
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

    require_once('../includes/config.php');
    require_once('../includes/dbConn.php');
    require_once('fncUserSql.php');

    $firstName = $objConnection->real_escape_string($_POST['firstName']);
    $lastName = $objConnection->real_escape_string($_POST['lastName']);
    $email = $objConnection->real_escape_string($_POST['email']);
    $userName = $objConnection->real_escape_string($_POST['userName']);
    $password = $objConnection->real_escape_string($_POST['password']);
    $userType = $objConnection->real_escape_string($_POST['userType']);

    // Check if a subscription was chosen
    if (isset($_POST['subType'])) {
        $subType = $objConnection->real_escape_string($_POST['subType']);
        // Hash password with Blowfish encryption
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Register user to database
        if (registerUser($objConnection, $firstName, $lastName, $email, $userName, $password, $userType)) {

            // Select user from database
            $users_id = getUser($objConnection, $userName, $email);

            // Set end date of subscription depending on subType
            if($subType == '1') {
                $end_date = date("Y-m-d", strtotime("+1 week"));
            }
            elseif($subType == '2') {
                $end_date = date("Y-m-d", strtotime("+1 month"));
            }
            elseif($subType == '3') {
                $end_date = date("Y-m-d", strtotime("+1 year"));
            }

            // Register subscription  to database
            if (registerSubscription($objConnection, $end_date, $users_id, $subType)) {
                session_start();
                $_SESSION['state'] = 'userCreated';
                header('location: http://micr08.wi2.sde.dk/test_eksamen/register');
            }
        }
    // If subscription was not chosen, check if userType 3 was
    } elseif($userType == '2') {
        // Hash password with Blowfish encryption
        $password = password_hash($password, PASSWORD_BCRYPT);
        // Register user to database
        if(registerUser($objConnection, $firstName, $lastName, $email, $userName, $password, $userType)) {
            session_start();
            $_SESSION['state'] = 'userCreated';
            header('location: http://micr08.wi2.sde.dk/test_eksamen/register');
        }
    // No subscription was picked and userType was not 3
    } else {
        session_start();
        $_SESSION['state'] = 'userPickSub';
        header('location: http://micr08.wi2.sde.dk/test_eksamen/register');
    }
// If submit was not pressed
} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header('location: http://micr08.wi2.sde.dk/test_eksamen/register/');
}