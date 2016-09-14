<?php
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