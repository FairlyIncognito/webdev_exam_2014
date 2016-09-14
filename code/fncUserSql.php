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