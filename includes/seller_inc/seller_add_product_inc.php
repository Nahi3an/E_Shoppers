<?php


if (isset($_POST['add_product']) && isset($_FILES['product_image_1']) && isset($_FILES['product_image_2'])) {
    include_once '../dbh_inc.php';
    include_once  '../function_inc.php';

    $productName = $_POST['product_name'];
    $productUnitPrice = $_POST['product_unit_price'];
    $productDescription = $_POST['product_description'];
    $productQuantity = $_POST['product_quantity'];
    $categoryId = $_POST['category_id'];
    $userId = $_POST['user_id'];

    $sellerInfo = getSellerInfo($conn, $userId);

    $imgType = 'product';
    $imgID1 = compressImage($_FILES['product_image_1'], $imgType);
    $imgID2 = compressImage($_FILES['product_image_2'], $imgType);

    $uploadDate =  date("Y/m/d");
    addSellerProduct($conn, $productName, $productUnitPrice, $productDescription, $productQuantity,  $uploadDate, $categoryId, $sellerInfo['seller_id'], $imgID1, $imgID2);
}
