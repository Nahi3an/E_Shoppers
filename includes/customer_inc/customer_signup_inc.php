<?php

if (isset($_POST['customer_signup'])) {

    include_once '../dbh_inc.php';
    include_once '../function_inc.php';

    $customerName = $_POST['customer_name'];
    $userEmail = $_POST['user_email'];
    $userPassword = $_POST['user_password'];
    $userRole = 'customer';


    $signedUp = signupUser($conn, $userEmail, $userPassword, $userRole);

    if ($signedUp) {

        $userId = getUserId($conn, $userEmail);


        signUpCustomer($conn, $customerName, $userEmail, $userId);
    }
}
