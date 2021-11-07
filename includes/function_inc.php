<?php


function signupUser($conn, $userEmail, $userPassword, $userRole)
{

    $sqlSignup = "INSERT INTO users (user_email,user_password,user_role)
                    VALUES ('$userEmail', '$userPassword','$userRole')";



    $res = mysqli_query($conn, $sqlSignup);

    if ($res) {
        echo "user signup ok";
    } else {

        echo " user signup not ok";
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


    $sqlSignup = "INSERT INTO seller (seller_name,seller_email,seller_contact_number,seller_address,user_id)
                    VALUES ( '$sellerName', '$sellerEmail','','','$userId')";



    $res = mysqli_query($conn, $sqlSignup);

    if ($res) {
        echo "seller signup ok";
    } else {

        echo "seller signup not ok";
    }
}
