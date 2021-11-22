<?php


function signupUser($conn, $userEmail, $userPassword, $userRole)
{

    $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);

    $sqlSignup = "INSERT INTO users (user_email,user_password,user_role)
                  VALUES ('$userEmail', '$hashedPwd','$userRole')";

    $res = mysqli_query($conn, $sqlSignup);

    if ($res) {
        return true;
    } else {

        return false;
    }
}


function getUserId($conn, $userEmail)
{
    $sqlRead = "SELECT user_id
                FROM users
                WHERE user_email = '$userEmail'";

    $res = mysqli_query($conn, $sqlRead);

    $userId = '';
    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $userId = $row['user_id'];
        }
    }

    return $userId;
}


function signupSeller($conn, $sellerName, $sellerEmail, $userId)
{


    $sql = "select * from seller where seller_email = '$sellerEmail'";


    $res = mysqli_query($conn, $sql);

    if ($res->num_rows > 0) {

        echo "<script>
                  alert('use another email');
                  window.location.href='/online_shopping_system/signup.php';
                  </script>";
    } else {

        $sqlSignup = "INSERT INTO seller (seller_name,seller_email,seller_contact_number,seller_address,user_id)
        VALUES ( '$sellerName', '$sellerEmail',null,null,'$userId')";

        $res = mysqli_query($conn, $sqlSignup);

        if ($res) {
            echo "<script>
            alert('Signup successfully');
            window.location.href='/online_shopping_system/login.php';
            </script>";
        }
    }
}


function signUpCustomer($conn, $customerName, $userEmail, $userId)
{


    $sql = "select * from customer where customer_email = '$userEmail'";


    $res = mysqli_query($conn, $sql);

    if ($res->num_rows > 0) {

        echo "<script>
                  alert('use another email');
                  window.location.href='/online_shopping_system/signup.php';
                  </script>";
    } else {

        //customer_name 	customer_email 	customer_contact_number 	customer_adderess 	user_id
        $sqlSignup = "INSERT INTO customer (customer_name,customer_email,customer_contact_number,customer_adderess,user_id)
                        VALUES ('$customerName', '$userEmail',null,null,'$userId')";

        $res = mysqli_query($conn, $sqlSignup);

        if ($res) {
            echo "<script>
            alert('Signup successfully');
            window.location.href='/online_shopping_system/login.php';
            </script>";
        } else {

            echo "not ok";
        }
    }
}


function loginUser($conn, $userEmail, $userPassword)
{

    session_start();
    $sql = "SELECT user_id,user_email, user_password,user_role
            FROM users
            WHERE user_email='$userEmail'";

    $res = mysqli_query($conn, $sql);

    $userInfo = array('user_id' => ' ', 'user_email' => ' ', 'user_password' => ' ', 'user_role' => "");

    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $userInfo['user_id'] =  $row['user_id'];
            $userInfo['user_email'] = $row['user_email'];
            $userInfo['user_password'] = $row['user_password'];
            $userInfo['user_role'] = $row['user_role'];
        }

        $_SESSION["user_id"] = $userInfo['user_id'];
        $_SESSION['user_role'] =  $userInfo['user_role'];

        if ($userInfo['user_role'] === 'admin') {


            if ($userInfo['user_password'] == $userPassword && $userInfo['user_email'] == $userEmail) {

                header('location:/online_shopping_system/admin/admin_dashboard.php');
            } else {

                echo "Incorrect Admin Credentials";
            }
        } else {

            if (password_verify($userPassword, $userInfo['user_password']) && $userEmail === $userInfo['user_email']) {

                if ($userInfo['user_role'] === 'seller') {
                    header('location:/online_shopping_system/seller/seller_dashboard.php');
                } else if ($userInfo['user_role'] === 'customer') {

                    header('location:/online_shopping_system/main.php');
                }
            } else {

                echo "Incorrect Email / Password ";
            }
        }
    } else {

        echo "No user found";
    }
}


function getSellerInfo($conn, $userId)
{
    $sql = "SELECT seller_id, seller_name, seller_email, seller_contact_number,seller_address
            FROM seller
            WHERE user_id=$userId";

    $res = mysqli_query($conn, $sql);

    $sellerInfo = array('seller_id' => ' ', 'seller_name' => ' ', 'seller_email' => ' ', 'seller_contact_number' => ' ', 'seller_address' => ' ');

    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $sellerInfo['seller_id'] =  $row['seller_id'];
            $sellerInfo['seller_name'] =  $row['seller_name'];
            $sellerInfo['seller_email'] = $row['seller_email'];
            $sellerInfo['seller_contact_number'] = $row['seller_contact_number'];
            $sellerInfo['seller_address'] = $row['seller_address'];
        }
    }

    return  $sellerInfo;
}


function getProductOfSeller($conn)
{

    $sql = "SELECT id, supplier_id,supplier_name, supplier_address, supplier_contact_number
            FROM supplier
            ORDER BY supplier_id ASC";

    $res = mysqli_query($conn, $sql);
    $sellerProducts = array();

    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $sellerProduct = array('id' => $row['id'], 'supplier_id' => $row['supplier_id'], 'supplier_name' => $row['supplier_name'], 'supplier_address' => $row['supplier_address'], 'supplier_contact_number' => $row['supplier_contact_number']);
            array_push($sellerProducts, $sellerProduct);
        }
    }

    return  $sellerProducts;
}

function allCategory($conn)
{

    $sql = "SELECT category_id,category_name
            FROM category";

    $res = mysqli_query($conn, $sql);
    $categories = array();

    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $category = array('category_id' => $row['category_id'], 'category_name' => $row['category_name']);
            array_push($categories, $category);
        }
    }

    return  $categories;
}

function addSellerProduct($conn, $productName, $productUnitPrice, $productDescription, $productQuantity,  $uploadDate, $categoryId, $sellerId, $imgId1, $imgId2)
{

    // echo $imgId1 . " " . $imgId2;
    $categoryId = explode(" - ", $categoryId);
    $categoryId =  $categoryId[0];


    //product_id 	product_name 	product_unit_price 	product_description 	product_quanity 	upload_date 	category_id 	seller_id 	product_img_1 	product_img_2
    //product_id 	product_name 	product_unit_price 	product_description 	product_quanity 	upload_date 	category_id 	seller_id
    $sql = "INSERT INTO product(product_name,product_unit_price,product_description,product_quanity,upload_date,category_id,seller_id,	       product_img_1,product_img_2)
            VALUES ('$productName', '$productUnitPrice', '$productDescription', '$productQuantity',  '$uploadDate', '$categoryId', '$sellerId', '$imgId1 ',' $imgId2')";

    $res = mysqli_query($conn, $sql);

    if ($res) {

        header('location:/online_shopping_system/seller/seller_add_product.php');
    } else {

        echo "Error!";
    }
}

function compressImage($uploadImage, $imgType)
{

    // echo "<pre>";
    // print_r($uploadImage);
    // echo "</pre>";

    $img_name = $uploadImage['name'];
    $img_type = $uploadImage['type'];
    //$img_size = $uploadImage['size'];
    $tmp_name = $uploadImage['tmp_name'];
    $error = $uploadImage['error'];


    // ;
    if ($error == 0) {

        if ($img_type == 'image/png') {
            $inputImg = imagecreatefrompng($tmp_name);
        } else {

            $inputImg = imagecreatefromjpeg($tmp_name);
        }


        if (isset($inputImg)) {

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {


                if ($imgType == 'product') {

                    $imgId = uniqid('PIMG-') . '.jpg';
                    $outputImagePath = '../../img/product_img/' .  $imgId;
                }

                //echo $outputImagePath;

                imagejpeg($inputImg, $outputImagePath, 50);

                return $imgId;
            }
        }
    }
}
