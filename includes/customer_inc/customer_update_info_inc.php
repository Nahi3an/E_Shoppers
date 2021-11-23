<?php
if (isset($_POST['customer_update'])) {
    include_once '../dbh_inc.php';
    include_once '../function_inc.php';
    $customerId = $_POST['customer_id'];
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerContactNumber = $_POST['customer_contact_number'];
    $customerAddress = $_POST['customer_address'];

    customerInfoUpdate($conn, $customerId, $customerName, $customerEmail, $customerContactNumber, $customerAddress);

    echo $customerName;
}
