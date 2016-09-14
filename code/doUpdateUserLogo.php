<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit'])) {
    include_once('../includes/dbConn.php');
    include_once('../includes/config.php');

    function uploadImageFile($path, $file, $conn) {
        echo "<pre>";
        var_dump($file);
        echo "</pre>";

        $name = $file['name'];
        $mimetype = $file['type'];
        $tmp_file_name = $file['tmp_name'];
        $error = $file['error'];
        $size = $file['size'] / 2097152;  // bytes to MB

        // Allowed file types
        $allowed_mime_types = array(
            'image/jpeg',
            'image/pjpeg',
            'image/gif',
            'image/png',
            'image/bmp'
        );

        // Allowed max file size
        $allowed_max_file_size = 1.5;

        // Check if errors occur
        if($error != 0) {
            return 'An error has occurred!';
        }

        // Check if file type is allowed
        if(!in_array($mimetype, $allowed_mime_types)) {
            return 'Error: File type not allowed!';
        }

        // Check if file size is over the max allowed size
        if($size > $allowed_max_file_size) {
            return 'Error: File size is too large';
        }

        // Lower capital letters and convert invalid characters
        $new_filename = strtolower($name);
        // Replace nordic letters, spaces and commas
        $new_filename = str_replace(
            array("æ","ø","å"," ",","),
            array("ae","oe","aa","-","."),
            $new_filename
        );
        // Replace invalid characters
        $new_filename = preg_replace("/[^A-Z0-9._-]/i", "_", $new_filename);

        $i = 0;
        $parts = pathinfo($new_filename);
        // If files exist with the same name, loop until a unique file name has been made.
        while (file_exists($path . $new_filename)) {
            $i++;
            $new_filename = $parts['filename'] . '-' . $i . '.' . $parts['extension'];
        }

        session_start();
        $idUsers = $_SESSION['login']['idUsers'];

        $sql = "
                UPDATE 
                fashion_online_users
                
                SET 
                userLogo = '$new_filename',
                userAlt = '$new_filename'
                
                WHERE 
                idUsers = '$idUsers'
                ";

        $success = copy($tmp_file_name, $path . $new_filename);

        if($success) {
            $conn->query($sql);
            session_start();
            $_SESSION['state'] = 'updateSuccess';
            header('location:'. HTTP . 'user');
            return TRUE;
        }
        else {
            session_start();
            $_SESSION['state'] = 'databaseError';
            header('location:'. HTTP . 'user');
            return FALSE;
        }

    }

    echo uploadImageFile('../images/website/', $_FILES['file'], $objConnection);
}

?>