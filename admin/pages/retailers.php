<?php
require_once('code/fncProductSql.php');
require_once('code/fncUserSql.php');
?>

    <div id="home">
        <section id="content" class="retailerWrapper">
            <div id="productMargin">
                <h1>Find Retailers</h1>
                <p id="contentDescription">Find a retailer to edit their information.</p>

                <?php
                echo "<h2>";
                include_once('code/doStateFeedback.php');
                echo "</h2>";

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
                ?>

                <div id="productWrapper">
                    <?php
                    if(empty($uri[1]) && empty($uri[2])) {
                        $result = getRetailers($objConnection);

                        while($row = $result->fetch_object()) {
                            echo "<a href='$http/retailer/$row->idUsers'>";
                            echo "<div>";
                            echo "<img src='$http/../images/website/$row->userLogo' id='userLogo' alt='$row->userAlt'>";
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
                            echo "<a href='$http/retailer/$row->idUsers'>";
                            echo "<div>";
                            echo "<img src='$http/../images/website/$row->userLogo' id='userLogo' alt='$row->userAlt'>";
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
        <div id="user">
            <?php
                echo "<div id='createUserBox'>";
                echo "<h2>Create Retailer</h2>";
                echo "<img src='$http/../images/website/placeholder.png' id='img' alt='placeholder image'>";
                echo "</div>";

                echo "<form action='$http/code/doCreateUser.php' method='post' enctype='multipart/form-data' id='createForm'>";
                echo "<label for='file' id='fileLabel'>Choose a new image</label>";
                echo "<input type='file' name='file' id='file' required>";
                echo "<label for='userName'>Store Name</label>";
                echo "<input type='text' name='userName' id='userName' placeholder='Store Name' required>";
                echo "<label for='userAddress'>Address</label>";
                echo "<input type='text' name='userAddress' id='userAddress' placeholder='Address' required>";
                echo "<label for='userPhone'>Phone Number</label>";
                echo "<input type='text' name='userPhone' id='userPhone' placeholder='Phone Number' required>";
                echo "<label for='zipcode'>Zipcode</label>";
                echo "<input type='text' name='zipcode' id='zipcode' placeholder='Zipcode' required>";
                echo "<label for='userPassword'>Password</label>";
                echo "<input type='password' name='userPassword' placeholder='Password' required>";
                echo "<textarea placeholder='Description' name='userDescription'></textarea>";
                echo "<input type='submit' name='submit' value='Create Retailer'>";
                ?>
            </form>
        </div>
    </div>
