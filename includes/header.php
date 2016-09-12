<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//echo "<pre>";
//var_dump($_SESSION);
//echo "</pre>";

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
        <title>Fashion Online</title>
    </head>
    <body>
        <main class="pageWrapper flex flexFlowColumnNoWrap flexAlignCenter">

            <header>
                <div id="topBar">
                    <ul>
                        <li><a href="<?php echo HTTP; ?>retailer">Find Retailer</a></li>
                        <li><a href="<?php echo HTTP; ?>news">News</a></li>
                        <li><a href="<?php echo HTTP; ?>contact">Contact</a></li>
                    </ul>

                    <form action="<?php echo HTTP; ?>code/doLogin.php" method="post">
                        <label for="userName">Sign In</label>
                        <input type="text" name="userName" id="userName" placeholder="Username" required>
                        <input type="password" name="userPassword" placeholder="Password" required>
                        <input type="submit" name="submit" value="Go">
                    </form>
                </div>

                <img src="<?php echo HTTP; ?>images/website/header_logo.png" alt="Fashion Online - Logo in Header">

                <div id="bottomBar">
                    <ul>
                        <li><a href="<?php echo HTTP; ?>">HOME</a></li>
                        <li><a href="<?php echo HTTP; ?>men">MEN</a></li>
                        <li><a href="<?php echo HTTP; ?>women">WOMEN</a></li>
                        <li><a href="<?php echo HTTP; ?>collections">COLLECTIONS</a></li>
                    </ul>

                    <form action="<?php echo HTTP; ?>search" method="post">
                        <input type="text" name="search" placeholder="search" required>
                        <input type="submit" name="submit" value="">
                    </form>
                </div>

            </header>