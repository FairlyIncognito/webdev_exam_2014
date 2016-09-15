<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']['userType'] == '1') {
    include_once("includes/header.php");

    // Kontroller om stien er korrekt
    if (isset($uri[0]) && $uri[0] == 'index.php') {
        header('Location: ./');
    }
    elseif (isset($uri[0]) && empty($uri[0]) && empty($uri[1])) {
        include_once("pages/home.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'products') {
        include_once("pages/products.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'news') {
        include_once("pages/news.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'retailers') {
        include_once("pages/retailers.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'retailer' && isset($uri[1])) {
        include_once("pages/retailer.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'contact') {
        include_once("pages/contact.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'messages') {
        include_once("pages/messages.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'deleteUser' && isset($uri[1])) {
        include_once("code/doDeleteUser.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'deleteNews' && isset($uri[1])) {
        include_once("code/doDeleteNews.php");
    }
    else {
        echo "ERROR 404: Forkert Sti";
    }
    include_once("includes/footer.php");
} else {
    session_start();
    $_SESSION['state'] = 'loginNotFound';
    header('location:' . $http . '../');
}