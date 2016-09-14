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

function getAllProductsRandom($conn, $limit = 999) {
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
            rand()
            DESC
            
            LIMIT $limit
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getProductById($conn, $id) {
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
            gender_id,
            collectionsName,
            gender
            
            FROM 
            fashion_online_products
            
            INNER JOIN
            fashion_online_categories
            ON 
            fashion_online_categories.idCategories = fashion_online_products.categories_id
            
            INNER JOIN
            fashion_online_collections
            ON
            fashion_online_collections.idCollections = collections_id
            
            INNER JOIN
            fashion_online_gender
            ON
            fashion_online_gender.idGender = gender_id
            
            WHERE 
            idProducts = $id
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getProductsBySearch($conn, $search) {
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
            gender_id,
            collectionsName,
            gender
            
            FROM 
            fashion_online_products
            
            INNER JOIN
            fashion_online_categories
            ON 
            fashion_online_categories.idCategories = fashion_online_products.categories_id
            
            INNER JOIN
            fashion_online_collections
            ON
            fashion_online_collections.idCollections = collections_id
            
            INNER JOIN
            fashion_online_gender
            ON
            fashion_online_gender.idGender = gender_id
            
            WHERE 
            productName LIKE '$search'
            OR 
            categoryName LIKE '$search'
            OR 
            collectionsName LIKE '$search'
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getCategoriesByGender($conn, $genderId) {
    $sql = "
            SELECT 
            idCategories,
            categoryName,
            categoryImage,
            categoryAlt,
            gender_id
            
            FROM 
            fashion_online_categories
            
            WHERE
            gender_id = $genderId
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getProductsByCategoryAndGender($conn, $categoryId, $genderId) {
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
            
            WHERE 
            categories_id = $categoryId
            AND 
            gender_id = $genderId
            
            ORDER BY 
            productDate
            DESC
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getCategoryName($conn, $categoryId) {
    $sql = "
            SELECT 
            categoryName
            
            FROM 
            fashion_online_categories
            
            WHERE 
            idCategories = $categoryId
            ";
    if($result = $conn->query($sql)) {
        $row = $result->fetch_object();
        return $row->categoryName;
    } else {
        return FALSE;
    }
}

function getCollectionName($conn, $collectionId) {
    $sql = "
            SELECT 
            collectionsName
            
            FROM 
            fashion_online_collections
            
            WHERE 
            idCollections = $collectionId
            ";
    if($result = $conn->query($sql)) {
        $row = $result->fetch_object();
        return $row->collectionsName;
    } else {
        return FALSE;
    }
}

function getCategoriesByCollection($conn, $collectionId) {
    $sql = "
            SELECT 
            idCategories,
            categoryName,
            categoryImage,
            categoryAlt,
            gender_id,
            gender
            
            FROM 
            fashion_online_categories
            
            INNER JOIN
            fashion_online_categories_has_fashion_online_collections
            ON
            fashion_online_categories_has_fashion_online_collections.fasion_online_categories_idCategories = idCategories
            
            INNER JOIN
            fashion_online_gender
            ON
            fashion_online_gender.idGender = gender_id
            
            WHERE
            fasion_online_collections_idCollections = $collectionId
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getCollections($conn) {
    $sql = "
            SELECT
            idCollections,
            collectionsName,
            collectionsImage,
            collectionsAlt
            
            FROM
            fashion_online_collections
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}

function getBannerById($conn, $id) {
    $sql = "
            SELECT
            idBanners,
            bannersImage,
            bannersAlt,
            collections_id
        
            FROM
            fashion_online_banners
            
            INNER JOIN
            fashion_online_collections
            ON
            fashion_online_collections.idCollections = fashion_online_banners.collections_id
            
            WHERE 
            idBanners = $id
            ";
    if($result = $conn->query($sql)) {
        return $result;
    } else {
        return FALSE;
    }
}