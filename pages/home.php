<?php
require_once('code/fncProductSql.php');

echo "<h2>";
include_once('code/doStateFeedback.php');
echo "</h2>";

$topBanner = getBannerById($objConnection, 1);
$sideBanner1 = getBannerById($objConnection, 2);
$sideBanner2 = getBannerById($objConnection, 3);
$sideBanner3 = getBannerById($objConnection, 4);
?>

<div id="home">
    <section id="content">

        <?php
        $topBanner = $topBanner->fetch_object();
        echo "<a href='$http/collections/$topBanner->collections_id'><img src='$http/images/website/$topBanner->bannersImage' alt='$topBanner->bannersAlt'></a>";
        ?>

            <div id="homeMargin">
                <h1>Latest Arrivals</h1>
                <p id="contentDescription">Check out our latest products in this section</p>

                <div id="productWrapper">
                    <?php

                    $result = getAllProducts($objConnection, 6);

                    while($row = $result->fetch_object()) {
                        echo "<a href='$http/product/$row->idProducts'>";
                        echo "<div>";
                        echo "<img src='$http/images/products/$row->productThumbnail' alt='$row->productAlt'>";
                        echo "<p>$row->productName</p>";
                        echo "<p>More ></p>";
                        echo "</div>";
                        echo "</a>";
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

        <form action="<?php echo HTTP; ?>code/doNewsletterSignup.php" method="post">
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