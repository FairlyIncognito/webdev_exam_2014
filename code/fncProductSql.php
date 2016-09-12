<?php
function getAllProducts($conn, $limit = 999) {
    $sql = "
            SELECT 
            idProducts,
            productImage,
            productThumbnail,
            productAlt,
            productName,
            productDescription,
            productDate,
            categories_id,
            categoryName,
            categoryImage,
            categoryAlt,
            gender_id
            
            FROM 
            fashion_online_products
            
            INNER JOIN
            fashion_online_categories
            ON 
            fashion_online_categories.idCategories = fashion_online_products.categories_id
            
            ORDER BY 
            productDate
            DESC
            
            LIMIT $limit
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}