<?php
function getRetailerInfoById($conn, $id) {
    $sql = "
            SELECT 
            idUsers,
            userLogo,
            userAlt,
            userAddress,
            userPhone,
            userName,
            userDescription,
            zip_id,
            cityName
            
            FROM 
            fashion_online_users
            
            INNER JOIN
            fashion_online_zip
            ON
            fashion_online_zip.zipcode = fashion_online_users.zip_id
            
            WHERE
            idUsers = $id
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getRetailers($conn) {
    $sql = "
            SELECT 
            idUsers,
            userLogo,
            userAlt,
            userAddress,
            userPhone,
            userName,
            userDescription,
            zip_id,
            cityName
            
            FROM 
            fashion_online_users
            
            INNER JOIN
            fashion_online_zip
            ON
            fashion_online_zip.zipcode = fashion_online_users.zip_id
            
            LIMIT 1, 18446744073709551615
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getRetailersBySearch($conn, $zipcode, $cityname) {
    $sql = "
            SELECT 
            idUsers,
            userLogo,
            userAlt,
            userAddress,
            userPhone,
            userName,
            userDescription,
            zip_id,
            cityName
            
            FROM 
            fashion_online_users
            
            INNER JOIN
            fashion_online_zip
            ON
            fashion_online_zip.zipcode = fashion_online_users.zip_id
            
            WHERE
            zip_id = '$zipcode' 
            OR 
            fashion_online_zip.cityName LIKE '$cityname'
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getUserId($conn, $nameUser) {
    $sql = "
            SELECT
            idUsers
            FROM
            fashion_online_users
            
            WHERE
            fashion_online_users.userName = '$nameUser'
            ";

    if ($resultGetUser = $conn->query($sql)) {
        $row = $resultGetUser->fetch_object();
        return $row->idUsers;
    } else {
        return FALSE;
    }
}

function registerUser($conn, $userAddress, $userPhone, $userName, $userHashedPassword, $userDescription, $zip_id) {
    $sql = "
            INSERT INTO
            fashion_online_users
            (
            userLogo,
            userAlt,
            userAddress,
            userPhone,
            userName,
            userHashedPassword,
            userDescription,
            userType_id,
            zip_id
            )
            VALUES
            (
            'placeholder.png',
            'placeholder image',
            '$userAddress',
            '$userPhone',
            '$userName',
            '$userHashedPassword',
            '$userDescription',
            1,
            '$zip_id'
            )
            ";

    // Insert new user to database
    if ($resultRegisterUser = $conn->query($sql)) {
        return $resultRegisterUser;

    } else {
    // Username field is unique in database.
        return FALSE;
    }
}