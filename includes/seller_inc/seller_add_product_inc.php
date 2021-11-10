<?php


if (isset($_GET['add_product'])) {
    include_once '../dbh_inc.php';
    include_once  '../function_inc.php';

    $productName = $_GET['product_name'];
    $productUnitPrice = $_GET['product_unit_price'];
    $productDescription = $_GET['product_description'];
    $productQuantity = $_GET['product_quantity'];
    $categoryId = $_GET['category_id'];

    $userId = $_GET['user_id'];

    $sellerInfo = getSellerInfo($conn, $userId);
    $uploadDate =  date("Y/m/d");

    addSellerProduct($conn, $productName, $productUnitPrice, $productDescription, $productQuantity,  $uploadDate, $categoryId, $sellerInfo['seller_id']);
}
