<?php
require_once('code/fncProductSql.php');

if($uri[1] == 'men') {
    $gender = 1;
    $title = getCategoryName($objConnection, $uri[2]);
}
elseif($uri[1] == 'women') {
    $gender = 2;
    $title = getCategoryName($objConnection, $uri[2]);
} else {
    echo "404: Site not found!";
    exit;
}

$sideBanner1 = getBannerById($objConnection, 2);
$sideBanner2 = getBannerById($objConnection, 3);
$sideBanner3 = getBannerById($objConnection, 4);
?>

<div id="home">
    <section id="content">
        <div id="productMargin">
            <h1><?php echo $title; ?></h1>
            <p id="contentDescription">Check our latest <?php echo $uri[1]; ?> stuff in this category.</p>

            <div id="productWrapper">
                <?php

                $result = getProductsByCategoryAndGender($objConnection, $uri[2], $gender);

                while($row = $result->fetch_object()) {
                    echo "<a href='$http/product/$row->idProducts'>";
                    echo "<div>";
                    echo "<img src='$http/images/products/$row->productImage' alt='$row->productAlt'>";
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