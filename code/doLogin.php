<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Check if submit was pressed
if (isset($_POST['submit'])) {
    // Check if both username and password was set
    if (isset($_POST['nameUser']) && !empty($_POST['nameUser']) && isset($_POST['password']) && !empty($_POST['password'])) {

        require_once "../includes/config.php";
        require_once "../includes/dbConn.php";

        $nameUser = $objConnection->real_escape_string($_POST['nameUser']);
        $password = $objConnection->real_escape_string($_POST['password']);

        $sql = "
                SELECT 
                idUsers,
                nameUser, 
                hashedPassword,
                userType,
                email
                FROM 
                test_eksamen_users 
                
                INNER JOIN
                test_eksamen_userType
                ON
                test_eksamen_userType.idUserType = test_eksamen_users.userType_id
                
                WHERE 
                nameUser = '$nameUser'
                ";
        $getUserResult = $objConnection->query($sql);

        if ($getUserResult) {

            $row = $getUserResult->fetch_object();

            if (password_verify($password, $row->hashedPassword)) {

                // If usertype is user, check if subscription has expired
                if($row->userType_id == '3') {

                    $sqlSubCheck = "
                                    SELECT 
                                    idUsers, 
                                    userType_id, 
                                    end_date
                                    FROM 
                                    test_eksamen_users
                                    
                                    INNER JOIN
                                    test_eksamen_subscription
                                    ON
                                    test_eksamen_users.idUsers = test_eksamen_subscription.users_id
                                    
                                    WHERE
                                    idUsers = '$row->idUsers'
                                    ";
                    $getSubResult = $objConnection->query($sqlSubCheck);
                    $rowSubCheck = $getSubResult->fetch_object();

                    // Calculate days to end date
                    $date = strtotime($rowSubCheck->end_date);
                    $diff = $date-time();
                    $days = floor($diff/(60*60*24));

                    // If no days left, deny access
                    if($days <= 0) {
                        session_start();
                        $_SESSION['state'] = 'loginExpiredSub';
                        header("LOCATION: $http/login");
                        // Else, log in
                    } else {
                        session_start();
                        $nameUser = $row->nameUser;
                        $userType = $row->userType;
                        $email = $row->email;
                        $_SESSION['login']['nameUser'] = $nameUser;
                        $_SESSION['login']['userType'] = $userType;
                        $_SESSION['login']['email'] = $email;
                        header("LOCATION: $http");
                    }
                // If usertype is not user, log in
                } else {
                    session_start();
                    $nameUser = $row->nameUser;
                    $userType = $row->userType;
                    $email = $row->email;
                    $_SESSION['login']['nameUser'] = $nameUser;
                    $_SESSION['login']['userType'] = $userType;
                    $_SESSION['login']['email'] = $email;
                    header("LOCATION: $http");
                }
            } else {
                session_start();
                $_SESSION['state'] = 'loginWrongPassword';
                header("LOCATION: $http/login");
                echo "wrong password";
            }

        } else {
            session_start();
            $_SESSION['state'] = 'loginDatabaseError';
            header("LOCATION: $http/login");
        }

    } else {
        session_start();
        $_SESSION['state'] = 'loginMissingField';
        header("LOCATION: $http/login");
    }

} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header("LOCATION: $http/login");
}