<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['state'])) {
    // If submit was not pressed
    if(isset($_SESSION['state']) && $_SESSION['state'] == 'submitError') {
        echo 'Brug venligst formularen!';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'wrongPassword') {
        echo 'Forkert adgangskode. Prøv igen.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'databaseError') {
        echo 'Database fejl.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'missingField') {
        echo 'Udfyld venligst alle felter.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'loginNotFound') {
        echo 'You are not logged in as a retailer.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'loggedOut') {
        echo 'You have been logged out.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'messageSuccess') {
        echo 'Your message was received.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'newsletterSuccess') {
        echo 'You have been signed up for our newsletter.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'updateSuccess') {
        echo 'Your information was updated.';
        unset($_SESSION['state']);
    }
}