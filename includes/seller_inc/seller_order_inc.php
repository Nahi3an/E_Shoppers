<?php


include_once '../dbh_inc.php';
include_once '../function_inc.php';

$orderId = $_POST['order_id'];
$sellerId = $_POST['seller_id'];
if (isset($_POST['confirm_order'])) {
    $status = 'confirmed';
} else {

    $status = 'canceled_by_seller';
}

$changer  = 'seller';

changeOrderStatus($conn, $status, $orderId, $sellerId, $changer);
