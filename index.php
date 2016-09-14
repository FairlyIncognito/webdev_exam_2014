<?php include_once("includes/header.php"); ?>


    <?php
    // Kontroller om stien er korrekt
    if (isset($uri[0]) && $uri[0] == 'index.php') {
        header('Location: ./');
    }
    elseif (isset($uri[0]) && empty($uri[0]) && empty($uri[1])) {
        include_once("pages/home.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'product' && isset($uri[1])) {
        include_once("pages/product.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'collections' && empty($uri[1])) {
        include_once("pages/collections.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'collections' && isset($uri[1])) {
        include_once("pages/collectionCategories.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'products' && isset($uri[1]) && empty($uri[2])) {
        include_once("pages/categories.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'products' && isset($uri[1]) && isset($uri[2])) {
        include_once("pages/products.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'contact') {
        include_once("pages/contact.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'retailer') {
        include_once("pages/retailer.php");
    }
    elseif (isset($uri[0]) && isset($uri[0]) && $uri[0] == 'search') {
        include_once("pages/search.php");
    }
    else {
        echo "ERROR 404: Forkert Sti";
    }
    ?>

<?php include_once("includes/footer.php"); ?>

