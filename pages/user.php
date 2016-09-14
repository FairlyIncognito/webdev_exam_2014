<?php
if(isset($_SESSION['login']) && $_SESSION['login']['userType'] = 2) {
?>
<div id="product">
    <section id="content">
<?php
// Collection box
echo "<div class='userTopBox'>";
$userName = $_SESSION['login']['userName'];
echo "<h1>$userName</h1>";
echo "<p>Update the information about your store</p>";
echo "</div>";
?>
</section>
</div>

<div id="user">
    <?php
    require_once('code/fncUserSql.php');
    $result = getRetailerInfoById($objConnection, $_SESSION['login']['idUsers']);
    $row = $result->fetch_object();
    ?>
    <h2>Click a tab to update</h2>
    <h3><?php include_once('code/doStateFeedback.php') ?></h3>

    <div id="tabbedBoxWrapper">
        <div>
            <button class="tabbedBoxButton" id="logo">LOGO</button>
            <button class="tabbedBoxButton" id="information">INFORMATION</button>
            <button class="tabbedBoxButton" id="userDescription">DESCRIPTION</button>
        </div>

        <div class="tabbedBox" id="logoBox">
            <?php
            echo "<h2>Image/Logo</h2>";
            echo "<img src='$http/images/website/$row->userLogo' id='img' alt='$row->userAlt'>";

            echo "<form action='code/doUpdateUserLogo.php' method='post' enctype='multipart/form-data'>";
            echo "<label for='file' id='fileLabel'>Choose a new image</label>";
            echo "<input type='file' name='file' id='file'>";
            echo "<input type='submit' name='submit' value='Upload Image'>";
            echo "</form>";
            ?>
        </div>
        <div class="tabbedBox" id="informationBox">
            <?php
            echo "<h2>Information</h2>";
            echo "<form action='code/doUpdateUserInformation.php' method='post'>";
            echo "<label for='userName'>Store Name</label>";
            echo "<input type='text' name='userName' id='userName' value='$row->userName' placeholder='Store Name'>";
            echo "<label for='userAddress'>Address</label>";
            echo "<input type='text' name='userAddress' id='userAddress' value='$row->userAddress' placeholder='Address'>";
            echo "<label for='userPhone'>Phone Number</label>";
            echo "<input type='text' name='userPhone' id='userPhone' value='$row->userPhone' placeholder='Phone Number'>";
            echo "<label for='zipcode'>Zipcode</label>";
            echo "<input type='text' name='zipcode' id='zipcode' value='$row->zip_id' placeholder='Zipcode'>";
            echo "<input type='submit' name='submit' value='Update Information'>";
            echo "</form>";
            ?>
        </div>
        <div class="tabbedBox" id="userDescriptionBox">
            <?php
            echo "<h2>Description</h2>";
            echo "<form action='code/doUpdateUserDescription.php' method='post'>";
            echo "<textarea placeholder='Description' name='userDescription'>$row->userDescription</textarea>";
            echo "<input type='submit' name='submit' value='Update Description'>";
            echo "</form>";
            ?>
        </div>
    </div>

</div>
<?php
} else {
    session_start();
    $_SESSION['state'] = 'loginNotFound';
    header('location:' . $http);
}
?>