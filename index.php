<?php include_once("includes/header.php"); ?>


    <?php
    // Kontroller om stien er korrekt
    if (isset($uri[0]) && $uri[0] == 'index.php') {
        header('Location: ./');
    }
    elseif (isset($uri[0]) && empty($uri[0]) && empty($uri[1])) {
        include_once("pages/home.php");
    }
    else {
        echo "ERROR 404: Forkert Sti";
    }
    ?>

<?php include_once("includes/footer.php"); ?>

