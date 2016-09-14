<?php
require_once('code/fncProductSql.php');
require_once('code/fncUserSql.php');

$sideBanner1 = getBannerById($objConnection, 2);
$sideBanner2 = getBannerById($objConnection, 3);
$sideBanner3 = getBannerById($objConnection, 4);
?>

    <div id="home">
        <section id="content">
            <div id="productMargin">
                <h1>Find Retailer</h1>
                <p id="contentDescription">Find a retailer close to you.</p>

                <?php
                    echo "<form action='$http/code/doFindRetailer.php' method='post' id='findRetailerForm'>";

                    $zipResult = getRetailers($objConnection);
                    $cityResult = getRetailers($objConnection);

                    echo "<select name='zipcode'>";
                    echo "<option selected disabled>Pick Zipcode</option>";
                    while($row = $zipResult->fetch_object()) {
                        echo "<option value='$row->zip_id'>$row->zip_id</option>";
                    }
                    echo "</select>";

                    echo "<select name='cityname'>";
                    echo "<option selected disabled>Pick City</option>";
                    while($row = $cityResult->fetch_object()) {
                        echo "<option value='$row->cityName'>$row->cityName</option>";
                    }
                    echo "</select>";

                    echo "<input type='submit' name='submit' value='Search'>";

                    echo "</form>";

                    include_once('code/doStateFeedback.php');
                ?>

                <div id="productWrapper">
                    <?php
                    if(empty($uri[1]) && empty($uri[2])) {
                        $result = getRetailers($objConnection);

                        while($row = $result->fetch_object()) {
                            echo "<a href='$http/contact/$row->idUsers'>";
                            echo "<div>";
                            echo "<img src='$http/images/website/$row->userLogo' alt='$row->userAlt'>";
                            echo "<p>$row->userName</p>";
                            echo "<p>$row->zip_id $row->cityName</p>";
                            echo "<p>More ></p>";
                            echo "</div>";
                            echo "</a>";
                        }
                    } else {

                        if(is_numeric($uri[1])) {
                            $zipcode = $uri[1];
                        } else {
                            $cityname = '%'.$uri[1].'%';
                            $zipcode = NULL;
                        }

                        if(isset($uri[2]) && !empty($uri[2])) {
                            $cityname = '%'.$uri[2].'%';
                        }
                        elseif(!isset($cityname)) {
                            $cityname = NULL;
                        }

                        $result = getRetailersBySearch($objConnection, $zipcode, $cityname);

                        while($row = $result->fetch_object()) {
                            echo "<a href='$http/contact/$row->idUsers'>";
                            echo "<div>";
                            echo "<img src='$http/images/website/$row->userLogo' alt='$row->userAlt'>";
                            echo "<p>$row->userName</p>";
                            echo "<p>$row->zip_id $row->cityName</p>";
                            echo "<p>More ></p>";
                            echo "</div>";
                            echo "</a>";
                        }
                    }


                    ?>
                </div>
            </div>
        </section>

        <div id="campaignWrapper">
            <?php
            $sideBanner1 = $sideBanner1->fetch_object();
            echo "<a href='$http/collections/$sideBanner1->collections_id'><img src='$http/images/website/$sideBanner1->bannersImage' alt='$sideBanner1->bannersAlt'></a>";

            $sideBanner2 = $sideBanner2->fetch_object();
            echo "<a href='$http/collections/$sideBanner2->collections_id'><img src='$http/images/website/$sideBanner2->bannersImage' alt='$sideBanner2->bannersAlt'></a>";

            $sideBanner3 = $sideBanner3->fetch_object();
            echo "<a href='$http/collections/$sideBanner3->collections_id'><img src='$http/images/website/$sideBanner3->bannersImage' alt='$sideBanner3->bannersAlt'></a>";
            ?>

            <form action="<?php echo HTTP; ?>code/doNewsletter.php" method="post">
                <h2>SIGNUP TO OUR NEWSLETTER</h2>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <br>
                <input type="submit" name="submit" value="Signup">
            </form>
        </div>
    </div>

<?php require_once('includes/slider.php') ?>