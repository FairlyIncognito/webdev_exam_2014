<?php
include_once('includes/dbConn.php');
include_once('includes/config.php');
// Get all categories in a list view
function getCategories($conn) {

    $sql = "
          SELECT 
          idCategories, 
          categoryName 
          
          FROM 
          test_eksamen_categories
          ";
    $result = $conn->query($sql);

    if($result->num_rows === 0) {
        return NULL;
    }

    $output = "";

    $output .= '<ul>';

    while($row = $result->fetch_object()) {
        $output .= '<li><a href="categories/'. strtolower($row->idCategories) .'">'. $row->categoryName;
        $output .= '</a></li>';
    }
    $output .= '</ul>';

    return $output;
}
?>