<section id="slider">
    <h2>Other Products</h2>
    <p id="sliderDescription">Check our latest products in this section</p>

    <div id="sliderWrapper">
        <a href="#"><img src="<?php echo HTTP; ?>images/website/slider_arrow_left.png" alt="slider arrow left"></a>

        <?php
        require_once('code/fncProductSql.php');
        $result = getAllProductsRandom($objConnection, 5);

        while($row = $result->fetch_object()) {
            echo "<a href='$http/product/$row->idProducts'>";
            echo "<div>";
            echo "<img src='$http/images/products/$row->productThumbnail' alt='$row->productAlt'>";
            echo "<p>$row->productName</p>";
            echo "</div>";
            echo "</a>";
        }
        ?>

        <a href="#"><img src="<?php echo HTTP; ?>images/website/slider_arrow_right.png" alt="slider arrow right"></a>
    </div>
</section>