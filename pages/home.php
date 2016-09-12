<div id="home">
    <section id="content">
            <img src="<?php echo HTTP; ?>images/website/campaign_top.png" alt="Summer collection - Helping you look cool">

            <div>
                <h1>Latest Arrivals</h1>
                <p id="contentDescription">Check out our latest products in this section</p>

                <div id="productWrapper">
                    <?php
                    require_once('code/fncProductSql.php');
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
        <img src="<?php echo HTTP; ?>images/website/campaign_winter_collection.png" alt="Get winter collection">
        <img src="<?php echo HTTP; ?>images/website/campaign_womens_discount.png" alt="Exclusive discount - womens wear">
        <img src="<?php echo HTTP; ?>images/website/campaign_ladies_discount.png" alt="Get exclusive discount on ladies wear">

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