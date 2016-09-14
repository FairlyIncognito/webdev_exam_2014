<?php
require_once('code/fncProductSql.php');

$sideBanner1 = getBannerById($objConnection, 2);
$sideBanner2 = getBannerById($objConnection, 3);
$sideBanner3 = getBannerById($objConnection, 4);
?>

    <div id="home">
        <section id="content">
            <div id="productMargin">
                <h1>News</h1>
                <p id="contentDescription">See our latest news here</p>

                <?php
                include_once('code/doStateFeedback.php');
                ?>

                <div id="newsWrapper">
                    <?php
                        $result = getNews($objConnection);

                        if(mysqli_num_rows($result) <= 0) {
                            echo "<p>No match found.</p>";
                        } else {
                            while($row = $result->fetch_object()) {
                                echo "<div>";
                                echo "<img src='$http/images/news/$row->newsImage' alt='$row->newsAlt'>";
                                echo "<h2>$row->newsTitle</h2>";

                                $newsDate = date('d-m-Y', strtotime($row->newsDate));

                                echo "<p id='date'>$newsDate</p>";
                                echo "<p id='text'>$row->newsText</p>";
                                echo "</div>";
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