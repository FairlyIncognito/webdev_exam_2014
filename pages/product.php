<?php
require_once('code/fncProductSql.php');
$result = getProductById($objConnection, $uri[1]);
$row = $result->fetch_object();
?>


<div id="product">
    <section id="content">
            <?php
            $productName = strtoupper($row->productName);

            // Collection box
            echo "<a href='$http/collections' id='campaignWrapper'>";
            echo "<div>";
            echo "<h2>$productName</h2>";
            echo "<p>Here you find all the details</p>";
            echo "</div>";
            echo "<div>";
            echo "<p>Collection</p>";
            echo "<h3>$row->collectionsName</h3>";
            echo "</div>";
            echo "</a>";

            // Product
            echo "<div id='contentWrapper'>";
            echo "<img src='$http/images/products/$row->productImage' alt='$row->productAlt'>";
            echo "<div>";
            echo "<h1>$productName</h1>";

            $category = ucfirst($row->gender) . "'s " . $row->categoryName;

            echo "<p>$category</p>";
            echo "<p id='contentDescription'>$row->productDescription</p>";
            echo "</div>";
            echo "</div>";


            ?>
        <!--Description / Reviews-->
        <script>
            $(document).ready(function(){
                $('#description').click(function(){
                    $('#description').css({'color': 'red', 'background': 'white', 'z-index': '1'});
                    $('#descriptionBox').css('display', 'block');
                    $('#reviewsBox').css('display', 'none');
                    $('#reviews').css({'color': 'black', 'z-index': '-2', 'background': '#c3c3c3'});
                });
                $('#reviews').click(function(){
                    $('#reviews').css({'color': 'red', 'background': 'white', 'z-index': '1'});
                    $('#descriptionBox').css('display', 'none');
                    $('#reviewsBox').css('display', 'block');
                    $('#description').css({'color': 'black', 'z-index': '-2', 'background': '#c3c3c3'});
                });
            });
        </script>

        <div id="tabbedBoxWrapper">
            <div>
                <button class="tabbedBoxButton" id="description">DESCRIPTION</button>
                <button class="tabbedBoxButton" id="reviews">REVIEWS</button>
            </div>

            <div class="tabbedBox" id="descriptionBox">
                <p><?php echo $row->productDescription; ?></p>
            </div>
            <div class="tabbedBox" id="reviewsBox">
                <p>reviews</p>
            </div>
        </div>
    </section>
</div>

<?php
//
require_once('includes/slider.php');
?>