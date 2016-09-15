<?php
require_once('../includes/config.php');
// Check if submit was pressed
if (isset($_POST['submit'])) {
    // Enable error reporting
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

    $idNews = $_POST['idNews'];

    if(
        // Check if any fields are empty
    !empty($_POST['newsTitle']) &&
    !empty($_POST['newsDate']) &&
    !empty($_POST['newsText']) &&
    !empty($_POST['idNews'])
    ) {

        require_once('../includes/dbConn.php');

        // mysqli real escape string removes invalid characters helps prevent sql injection
        $newsTitle = $objConnection->real_escape_string($_POST['newsTitle']);
        $newsDate = $objConnection->real_escape_string($_POST['newsDate']);
        $newsText = $objConnection->real_escape_string($_POST['newsText']);
        $idNews = $objConnection->real_escape_string($_POST['idNews']);


        $sql = "
                UPDATE 
                fashion_online_news
                
                SET 
                newsTitle = '$newsTitle',
                newsDate = '$newsDate',
                newsText = '$newsText'
                
                WHERE 
                idNews = '$idNews'
                ";

        if($result = $objConnection->query($sql)) {
            require_once('doUpdateNewsImage.php');
            uploadImageFile('../../images/news/', $_FILES['file'], $objConnection, $idNews);

        } else {
            session_start();
            $_SESSION['state'] = 'databaseError';
            header('location:'. $http . '/news/' . $idNews);
        }
    } else {
        session_start();
        $_SESSION['state'] = 'missingField';
        header('location:'. $http . '/news/' . $idNews);
    }

// If submit was not pressed
} else {
    session_start();
    $_SESSION['state'] = 'submitError';
    header('location:'. $http . '/news');
}