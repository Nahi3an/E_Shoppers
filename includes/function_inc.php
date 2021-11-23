<?php


function signupUser($conn, $userEmail, $userPassword, $userRole)
{

    $sql = "SELECT user_id 
            FROM users
            WHERE user_email = '$userEmail'";

    $res = mysqli_query($conn, $sql);

    $rowcount = mysqli_num_rows($res);

    if ($rowcount  > 0) {

        echo "<script>
                  alert('use another email');
                  window.location.href='/online_shopping_system/signup.php';
                  </script>";
    } else {

        $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);

        $id =  generateId($conn, 'users');
        $userId =  'U#00' . $id;



        $sql = "INSERT INTO users (user_id,user_email,user_password,user_role)
                  VALUES ('$userId','$userEmail', '$hashedPwd','$userRole')";

        $res = mysqli_query($conn, $sql);

        if ($res) {
            //  echo "User Created";
            return  $userId;
        } else {

            echo "Error User";
            return false;
        }
    }
}


function generateId($conn, $tableName)
{


    $sql = "SELECT id
            FROM $tableName
            ORDER BY id ASC";

    $res = mysqli_query($conn, $sql);
    $ids = array();
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {

            // echo $row['id'];
            array_push($ids, $row['id']);
        }
    }



    if (empty($ids)) {
        $mainId =  '1';
    } else {

        $lastId = $ids[sizeof($ids) - 1];

        $mainId =  $lastId + 1;
    }


    return  $mainId;
}


//! FUcntion Not in use
function getUserId($conn, $userEmail)
{
    $sqlRead = "SELECT user_id
                FROM users
                WHERE user_email = '$userEmail'";

    $res = mysqli_query($conn, $sqlRead);

    $userId = '';


    return $userId;
}


function signupSeller($conn, $sellerName, $userId)
{


    $id = generateId($conn, 'seller');

    $sellerId = 'S#00' . $id;

    $sqlSignup = "INSERT INTO seller (seller_id,seller_name,seller_contact_number,seller_address,user_id)
                  VALUES ('$sellerId','$sellerName',null,null,'$userId')";

    $res = mysqli_query($conn, $sqlSignup);

    if ($res) {
        echo "<script>
            alert('Signup successfully');
            window.location.href='/online_shopping_system/login.php';
            </script>";
    } else {

        echo "Signup Error";
    }
}


function signupCustomer($conn, $customerName, $userId)
{

    $id = generateId($conn, 'customer');

    $customerId = 'C#00' . $id;

    $sqlSignup = "INSERT INTO customer (customer_id,customer_name,customer_contact_number,customer_address,user_id)
                        VALUES ('$customerId','$customerName',null,null,'$userId')";

    $res = mysqli_query($conn, $sqlSignup);

    if ($res) {
        echo "<script>
            alert('Signup successfully');
            window.location.href='/online_shopping_system/login.php';
            </script>";
    } else {

        echo "Customer Signup Error";
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
    $sql = "SELECT seller_id, seller_name,seller_contact_number,seller_address
            FROM seller
            WHERE user_id='$userId'";

    $res = mysqli_query($conn, $sql);

    $sellerInfo = array('seller_id' => '', 'seller_name' => '', 'seller_contact_number' => '', 'seller_address' => '', 'seller_email' => '');

    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $sellerInfo['seller_id'] =  $row['seller_id'];
            $sellerInfo['seller_name'] =  $row['seller_name'];
            $sellerInfo['seller_contact_number'] = $row['seller_contact_number'];
            $sellerInfo['seller_address'] = $row['seller_address'];
        }
    }

    $sql = "SELECT user_email
            FROM users 
            WHERE user_id='$userId'";

    $res = mysqli_query($conn, $sql);

    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $sellerInfo['seller_email'] = $row['user_email'];
        }
    }
    return  $sellerInfo;
}


function getProductOfSeller($conn, $sellerId)
{

    $sql = "SELECT seller_id,seller_name, seller_address, seller_contact_number
            FROM porduct
            ORDER BY seller_id";

    $res = mysqli_query($conn, $sql);
    $sellerProducts = array();

    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $sellerProduct = array('id' => $row['id'], 'seller_id' => $row['seller_id'], 'seller_name' => $row['seller_name'], 'seller_address' => $row['seller_address'], 'seller_contact_number' => $row['seller_contact_number']);
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


    $categoryId = explode(" - ", $categoryId);
    $categoryId =  $categoryId[0];

    $id = generateId($conn, 'product');

    $productId = 'PROD#00' . $id;

    $sql = "INSERT INTO 
            product(product_id,product_name,product_unit_price,product_description,product_quanity,
                    upload_date,product_image_1,product_image_2,category_id,seller_id)
            VALUES ('$productId','$productName','$productUnitPrice','$productDescription','$productQuantity',  
                    '$uploadDate','$imgId1','$imgId2','$categoryId', '$sellerId')";


    $res = mysqli_query($conn, $sql);

    if ($res) {

        header('location:/online_shopping_system/seller/seller_add_product.php');
    } else {

        echo "Error!";
    }
}

function compressImage($uploadImage, $imgType)
{



    $img_name = $uploadImage['name'];
    $img_type = $uploadImage['type'];
    //$img_size = $uploadImage['size'];
    $tmp_name = $uploadImage['tmp_name'];
    $error = $uploadImage['error'];


    if ($error == 0) {

        if ($img_type == 'image/png') {
            $inputImg = imagecreatefrompng($tmp_name);
        } else {
            $inputImg = imagecreatefromjpeg($tmp_name);
        }


        if (isset($inputImg)) {

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex); //png / jpg / jpeg
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {

                if ($imgType == 'product') {

                    $imgId = uniqid('PIMG-') . '.jpg';
                    $outputImagePath = '../../img/product_img/' .  $imgId;
                }


                imagejpeg($inputImg, $outputImagePath, 50);

                return $imgId;
            }
        }
    }
}

function getCustomerInfo($conn, $userId)
{

    $sql = "SELECT customer_id, customer_name, customer_contact_number,customer_address
            FROM customer 
            WHERE user_id='$userId'";

    $res = mysqli_query($conn, $sql);
    $customerInformation = '';
    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $customerInformation = array('customer_id' => $row['customer_id'], 'customer_name' => $row['customer_name'], 'customer_contact_number' => $row['customer_contact_number'], 'customer_address' => $row['customer_address'], 'customer_email' => '');
        }
    }


    $sql = "SELECT user_email
            FROM users 
            WHERE user_id='$userId'";

    $res = mysqli_query($conn, $sql);
    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $customerInformation['customer_email'] = $row['user_email'];
        }
    }


    return $customerInformation;
}

function customerInfoUpdate($conn, $customerId, $userId, $customerName, $customerEmail, $customerContactNumber, $customerAddress)
{
    $sql = "UPDATE customer
            SET customer_name = '$customerName', customer_contact_number= '$customerContactNumber', customer_address= '$customerAddress'
            WHERE customer_id = '$customerId'";

    $res1 = mysqli_query($conn, $sql);

    $sql = "UPDATE users
            SET user_email = '$customerEmail'
            WHERE user_id  = '$userId'";

    $res2 = mysqli_query($conn, $sql);
    if ($res1 && $res2) {
        echo "<script>
                  alert('Customer Information Update Succesful');
                  window.location.href='/online_shopping_system/customer/customer_dashboard.php';
                  </script>";
    } else {
        echo "<script>
                  alert('Customer Information Update Unsuccesful');
                  window.location.href='/online_shopping_system/customer/customer_dashboard.php';
                  </script>";
    }
}

function sellerInfoUpdate($conn, $sellerId, $userId, $sellerName, $sellerEmail, $sellerContactNumber, $sellerAddress)
{

    $sql = "UPDATE seller
            SET seller_name = '$sellerName', seller_contact_number= '$sellerContactNumber', seller_address= '$sellerAddress'
            WHERE seller_id = '$sellerId'";

    $res1 = mysqli_query($conn, $sql);

    $sql = "UPDATE users
            SET user_email = '$sellerEmail'
            WHERE user_id  = '$userId'";

    $res2 = mysqli_query($conn, $sql);
    if ($res1 && $res2) {
        echo "<script>
                  alert('Seller Information Update Succesful');
                  window.location.href='/online_shopping_system/seller/seller_dashboard.php';
                  </script>";
    } else {
        echo "<script>
                  alert('Seller Information Update Unsuccesful');
                  window.location.href='/online_shopping_system/seller/seller_dashboard.php';
                  </script>";
    }
}


function  addCategory($conn, $categoryName)
{

    $id = generateId($conn, 'category');

    $categoryId = "CAT#00" . $id;

    // echo $categoryId;

    // exit();
    $sql = "INSERT INTO category(category_id,category_name)
            VALUES('$categoryId','$categoryName')";
    $res = mysqli_query($conn, $sql);

    if ($res) {

        header('location:/online_shopping_system/admin/admin_category.php');
    } else {

        echo "Error!";
    }
}
