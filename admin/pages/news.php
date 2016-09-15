<?php
require_once('code/fncProductSql.php');
?>

<div id="home">
    <section id="content">
        <div id="productMargin">
            <h1>News</h1>
            <p id="contentDescription">Manage site news here</p>

            <?php
            echo "<h2>";
            include_once('code/doStateFeedback.php');
            echo "</h2>";

            if (isset($uri[1])) {
                $result = getNewsById($objConnection, $uri[1]);
                $row = $result->fetch_object();

                echo "<div id='user'>";

                echo "<img src='$http../../images/news/$row->newsImage' id='img' alt='$row->newsAlt'>";

                echo "<form action='$http/code/doUpdateNews.php' method='post' enctype='multipart/form-data'>";
                echo "<label for='file' id='fileLabel'>Choose a new image</label>";
                echo "<input type='file' name='file' id='file'>";

                echo "<label for='newsTitle'>News Title</label>";
                echo "<input type='text' name='newsTitle' placeholder='News Title' value='$row->newsTitle'>";

                echo "<label for='newsDate'>News Date</label>";
                echo "<input type='date' name='newsDate' placeholder='News Date' value='$row->newsDate'>";

                echo "<label for='newsText'>News Text</label>";
                echo "<textarea placeholder='News Text' name='newsText'>$row->newsText</textarea>";

                echo "<input type='hidden' name='idNews' value='$uri[1]'>";
                echo "<input type='submit' name='submit' value='Update News'>";
                echo "</form>";

                echo "<div>";

                } else {
                ?>
                <div id="newsWrapper">
                    <?php
                    $result = getNews($objConnection);

                    if (mysqli_num_rows($result) <= 0) {
                        echo "<p>No match found.</p>";
                    } else {

                        echo "<div id='user' class='newsBox'>";
                        echo "<h3>Create News</h3>";
                        echo "<img src='$http/../images/website/placeholder.png' id='img' alt='placeholder image'>";

                        echo "<form action='$http/code/doCreateNews.php' method='post' enctype='multipart/form-data'>";
                        echo "<label for='file' id='fileLabel'>Choose a new image</label>";
                        echo "<input type='file' name='file' id='file'>";

                        echo "<label for='newsTitle'>News Title</label>";
                        echo "<input type='text' name='newsTitle' placeholder='News Title'>";

                        echo "<label for='newsDate'>News Date</label>";
                        echo "<input type='date' name='newsDate' placeholder='News Date'>";

                        echo "<label for='newsText'>News Text</label>";
                        echo "<textarea placeholder='News Text' name='newsText'></textarea>";

                        echo "<input type='submit' name='submit' value='Create News' id='createNewsButton'>";
                        echo "</form>";
                        echo "</div>";

                        while ($row = $result->fetch_object()) {
                            echo "<div>";
                            echo "<a href='$http/news/$row->idNews'><button>Edit News</button></a>";
                            echo "<a href='$http/deleteNews/$row->idNews'><button class='confirm'>Delete News</button></a>";
                            echo "<img src='$http/../images/news/$row->newsImage' alt='$row->newsAlt'>";
                            echo "<h2>$row->newsTitle</h2>";

                            $newsDate = date('d-m-Y', strtotime($row->newsDate));

                            echo "<p id='date'>$newsDate</p>";
                            echo "<p id='text'>$row->newsText</p>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</div>