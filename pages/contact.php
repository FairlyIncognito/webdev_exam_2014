<div id="contact">
    <section id="content">

<?php
// Get contact for retailer
if(isset($uri[1])) {
    require_once('code/fncUserSql.php');
    $result = getRetailerInfoById($objConnection, $uri[1]);
    $row = $result->fetch_object();

    $userName = strtoupper($row->userName);
    $userAddress = strtoupper($row->userAddress);
    $cityName = strtoupper($row->cityName);

    // Top box
    echo "<a href='$http/collections' id='campaignWrapper'>";
    echo "<div>";
    echo "<h2>$userName</h2>";
    echo "<p>Info about retailer</p>";
    echo "</div>";
    echo "</a>";



    // User info
echo "<div id='contentWrapper'>";

    echo "<div id='infoWrapper'>";

    echo "<div id='userLogo'>";
    echo "<img src='$http/images/website/$row->userLogo' alt='$row->userAlt'>";
    echo "</div>";


    echo "<div id='retailerInfo'>";
    echo "<h1>RETAILER INFORMATIONS</h1>";

    echo "<div>";
    echo "<h2>ADDRESS:</h2> <p>$userAddress</p>";
    echo "</div>";

    echo "<div>";
    echo "<h2>ZIPCODE:</h2> <p>$row->zip_id $cityName</p>";
    echo "</div>";

    echo "<div>";
    echo "<h2>COUNTRY:</h2> <p>DENMARK</p>";
    echo "</div>";

    echo "<div>";
    echo "<h2>PHONE:</h2> <p>$row->userPhone</p>";
    echo "</div>";

    echo "<img src='$http/images/website/maps_placeholder.jpg' id='map' alt='google maps location'>";
    echo "</div>";


    echo "</div>";


    echo "<div id='descriptionBox'><p>$row->userDescription</p></div>";


    echo "</div>";
}

// Get contact for site admin
else {
    require_once('code/fncUserSql.php');
    $result = getRetailerInfoById($objConnection, 1);
    $row = $result->fetch_object();

    $userName = strtoupper($row->userName);
    $userAddress = strtoupper($row->userAddress);
    $cityName = strtoupper($row->cityName);

    // Top box
    echo "<a href='$http/collections' id='campaignWrapper'>";
    echo "<div>";
    echo "<h2>CONTACT US</h2>";
    echo "<p>Write us a message here</p>";
    echo "</div>";
    echo "</a>";

    // User info
    echo "<div id='contentWrapper'>";
    ?>

    <div id="infoWrapper">

    <form action="<?php echo HTTP; ?>code/doContact.php" method="post">
        <div>
            <input type="text" name="name" id="name" placeholder="NAME" required>
        </div>
        <div>
            <input type="email" name="email" id="email" placeholder="EMAIL" required>
        </div>
        <textarea name="text" placeholder="MESSAGE" required></textarea>
        <br>
        <input type="submit" name="submit" value="SEND US THE MESSAGE">
    </form>

    <?php

    echo "<div id='retailerInfo'>";
    echo "<h1>RETAILER INFORMATIONS</h1>";

    echo "<div>";
    echo "<h2>ADDRESS:</h2> <p>$userAddress</p>";
    echo "</div>";

    echo "<div>";
    echo "<h2>ZIPCODE:</h2> <p>$row->zip_id $cityName</p>";
    echo "</div>";

    echo "<div>";
    echo "<h2>COUNTRY:</h2> <p>DENMARK</p>";
    echo "</div>";

    echo "<div>";
    echo "<h2>PHONE:</h2> <p>$row->userPhone</p>";
    echo "</div>";

    echo "<img src='$http/images/website/maps_placeholder.jpg' id='map' alt='google maps location'>";
    echo "</div>";


    echo "</div>";


    echo "<div id='descriptionBox'><p>$row->userDescription</p></div>";


    echo "</div>";


}
?>

    </section>
</div>

<?php
//
require_once('includes/slider.php');
?>