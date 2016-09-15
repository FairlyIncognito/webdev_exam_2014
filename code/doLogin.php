<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Check if submit was pressed
require_once "../includes/config.php";
if (isset($_POST['submit'])) {
    // Check if both username and password was set
    if (isset($_POST['userName']) && !empty($_POST['userName']) && isset($_POST['userPassword']) && !empty($_POST['userPassword'])) {
        require_once "../includes/dbConn.php";

        $userName = $objConnection->real_escape_string($_POST['userName']);
        $userPassword = $objConnection->real_escape_string($_POST['userPassword']);

        $sql = "
                SELECT 
                idUsers,
                userName, 
                userHashedPassword,
                userType_id,
                userType
                FROM 
                fashion_online_users
                
                INNER JOIN
                fashion_online_userType
                ON
                fashion_online_userType.idUserType = fashion_online_users.userType_id
                
                WHERE 
                userName = '$userName'
                ";
        $getUserResult = $objConnection->query($sql);

        if ($getUserResult) {

            $row = $getUserResult->fetch_object();

            if (password_verify($userPassword, $row->userHashedPassword)) {
                session_start();
                $idUsers = $row->idUsers;
                $userName = $row->userName;
                $userType = $row->userType_id;
                $_SESSION['login']['idUsers'] = $idUsers;
                $_SESSION['login']['userName'] = $userName;
                $_SESSION['login']['userType'] = $userType;

                if($userType == 2) {
                    header("LOCATION: $http/user");
                } elseif($userType == 1) {
                    header("LOCATION: $http/admin");
                } else {
                    session_start();
                    $_SESSION['state'] = 'databaseError';
                    header("LOCATION: $http");
                }

            } else {
                session_start();
                $_SESSION['state'] = 'wrongPassword';
                header("LOCATION: $http");
            }
        } else {
            session_start();
            $_SESSION['state'] = 'databaseError';
            header("LOCATION: $http");
        }

    } else {
        session_start();
        $_SESSION['state'] = 'missingField';
        header("LOCATION: $http");
    }

} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header("LOCATION: $http");
}