<?php
require_once('../includes/config.php');
// Check if submit was pressed
if (isset($_POST['submit'])) {
    // Enable error reporting
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

    if (
        // Check if any fields are empty
        !empty($_POST['newsTitle']) &&
        !empty($_POST['newsDate']) &&
        !empty($_POST['newsText'])
    ) {

        require_once('../includes/dbConn.php');

        // mysqli real escape string removes invalid characters helps prevent sql injection
        $newsTitle = $objConnection->real_escape_string($_POST['newsTitle']);
        $newsDate = $objConnection->real_escape_string($_POST['newsDate']);
        $newsText = $objConnection->real_escape_string($_POST['newsText']);

        $sql = "
                INSERT INTO 
                fashion_online_news 
                (
                newsTitle, 
                newsDate, 
                newsText
                )
                VALUES (
                '$newsTitle',
                '$newsDate',
                '$newsText'
                )
                ";

        if ($result = $objConnection->query($sql)) {
            require_once('fncProductSql.php');
            $idNews = getNewsId($objConnection, $newsTitle, $newsDate);
            require_once('doCreateNewsImage.php');
            uploadImageFile('../../images/news/', $_FILES['file'], $objConnection, $idNews);
        } else {
            session_start();
            $_SESSION['state'] = 'userExists';
            header('location:' . $http . '/news');
        }
    } else {
        session_start();
        $_SESSION['state'] = 'missingField';
        header('location:' . $http . '/news');
    }

// If submit was not pressed
} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header('location:' . $http . '/news');
}