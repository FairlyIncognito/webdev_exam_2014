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
    // If user already exists
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'userExists') {
        echo 'Brugernavn og/eller email eksisterer allerede!';
        unset($_SESSION['state']);
    }
    // If user was successfully created
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'userCreated') {
        echo 'Bruger blev oprettet! Du kan nu logge ind.';
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
        echo 'Du er ikke logget ind.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'passwordEdited') {
        echo 'Din adgangskode blev ændret.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'userDeleted') {
        echo 'Din bruger blev slettet.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'categoryCreated') {
        echo 'Kategori blev oprettet!';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'categoryExists') {
        echo 'Kategori eksisterer allerede!';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'categoryEdited') {
        echo 'Kategorien blev ændret!';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'categoryDeleted') {
        echo 'Kategorien blev slettet!';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'updateSuccess') {
        echo 'Your information was updated.';
        unset($_SESSION['state']);
    }
    elseif(isset($_SESSION['state']) && $_SESSION['state'] == 'deleteSuccess') {
        echo 'Deleted successfully.';
        unset($_SESSION['state']);
    }
}