<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Enable Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require config and database connection files
require_once "dbConn.php";
require_once "config.php";
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

        <!--Stylesheets-->
        <link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>css/default.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>css/flex.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo HTTP; ?>css/mainStyle.css"/>

        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <!--Tabbed boxes: async loads script while site parses, then executes script when done loading it-->
        <script src="<?php echo $http; ?>/js/productTabbedBox.js" async></script>
        <script src="<?php echo $http; ?>/js/userTabbedBox.js" async></script>
        <title>Fashion Online</title>
    </head>
    <body>
        <main class="pageWrapper flex flexFlowColumnNoWrap flexAlignCenter">

            <header>
                <div id="topBar">

                    <?php
                    if(isset($_SESSION['login']) && $_SESSION['login']['userType'] == '1') {
                        echo "<a href='$http/../code/doLogout.php'><button id='logoutButton'>Logout</button></a>";
                    } else {
                        session_start();
                        $_SESSION['state'] = 'loginNotFound';
                        header('location:' . $http . '../');
                    }
                ?>
                </div>
                <a href="<?php echo HTTP; ?>">
                    <img src="<?php echo HTTP; ?>../images/website/header_logo.png" alt="Fashion Online - Logo in Header">
                </a>

                <div id="bottomBar">
                    <ul>
                        <li><a href="<?php echo HTTP; ?>products">PRODUCTS</a></li>
                        <li><a href="<?php echo HTTP; ?>news">NEWS</a></li>
                        <li><a href="<?php echo HTTP; ?>retailers">RETAILERS</a></li>
                        <li><a href="<?php echo HTTP; ?>contact">CONTACT</a></li>
                        <li><a href="<?php echo HTTP; ?>messages">MESSAGES</a></li>
                    </ul>
                </div>

            </header>

            <div id="product">
                <section id="content">
                    <?php
                    // Collection box
                    echo "<a href='$http' id='campaignWrapper'>";
                    echo "<div>";
                    echo "<h2>ADMIN PANEL</h2>";
                    echo "<p>Here you can update your site</p>";
                    echo "</div>";
                    echo "<div>";
                    echo "</div>";
                    echo "</a>";
                    ?>
                </section>
            </div>