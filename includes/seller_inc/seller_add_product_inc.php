<?php


if (isset($_POST['add_product']) && isset($_FILES['my_image']) && isset($_FILES['product_image_2'])) {
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
    $imgID1 = compressImage($_FILES['my_image'], $imgType);
    $imgID2 = compressImage($_FILES['product_image_2'], $imgType);

    $uploadDate =  date("Y/m/d");

    addSellerProduct($conn, $productName, $productUnitPrice, $productDescription, $productQuantity,  $uploadDate, $categoryId, $sellerInfo['seller_id'], $imgID1, $imgID2);


    // $img_name = $_FILES['my_image']['name'];
    // $img_size = $_FILES['my_image']['size'];
    // $tmp_name = $_FILES['my_image']['tmp_name'];
    // $error = $_FILES['my_image']['error'];

    // if ($error === 0) {
    //     if ($img_size > 125000) {
    //         $em = "Sorry, your file is too large.";
    //         header("Location: main.php?error=$em");
    //     } else {

    //         $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

    //         echo $img_ex;
    //         $img_ex_lc = strtolower($img_ex);
    //         echo $img_ex_lc;
    //         $allowed_exs = array("jpg", "jpeg", "png");
    //         if (in_array($img_ex_lc, $allowed_exs)) {

    //             $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    //             $img_upload_path = 'uploads/' . $new_img_name;
    //             move_uploaded_file($tmp_name, $img_upload_path);
    //         } else {

    //             echo "You cannot upload this type of file";
    //         }
    //     }
    // }


    // echo "<pre>";
    // print_r($_FILES['my_image']);
    // echo "</pre>";

    // $img_name = $_FILES['my_image']['name'];
    // $img_type = $_FILES['my_image']['type'];
    // $img_size = $_FILES['my_image']['size'];
    // $tmp_name = $_FILES['my_image']['tmp_name'];
    // $error = $_FILES['my_image']['error'];

    // if ($img_type == 'image/png') {

    //     $inputImg = imagecreatefrompng($tmp_name);
    //     echo "This is png";
    // }


    // if ($img_type == 'image/jpeg' || $img_type == 'image/jpg') {

    //     $inputImg = imagecreatefromjpeg($_FILES['my_image']['tmp_name']);

    //     echo "this is jpeg / jpg";
    // }


    // if (isset($inputImg)) {

    //     $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    //     $img_ex_lc = strtolower($img_ex);
    //     $allowed_exs = array("jpg", "jpeg", "png");
    //     if (in_array($img_ex_lc, $allowed_exs)) {

    //         $ouputImage = '../../uploads/' . uniqid('ID-') . '.jpg';

    //         echo $ouputImage;
    //         imagejpeg($inputImg, $ouputImage, 50);
    //     }
    // }
}
