<?php
if (isset($_POST['confirm_order'])) {
    session_start();

    include_once '../dbh_inc.php';
    include_once '../function_inc.php';

    $customerId = $_POST['customer_id'];
    $paymentMethod = $_POST['payment_method'];


    $sellerIds = array();
    $count = 0;
    foreach ($_SESSION['show_cart'] as $info) {

        $orderDate =  date("Y/m/d");
        $orderQuantity = $info['product_quantity'];
        $orderPrice = $info['product_quantity'] * $info['product_unit_price'];
        $productId = $info['product_id'];
        $productInfo = getProductInfo($conn, $productId);
        $orderDone = addToOrderTable($conn, $orderDate, $orderQuantity, $orderPrice, $paymentMethod, $productId, $customerId, $productInfo['seller_id']);

        if ($orderDone) {
            $count++;
        }
    }

    if ($count == sizeof($_SESSION['show_cart'])) {

        echo "<script>
                  alert('Order has been placed');
                  window.location.href='/online_shopping_system/main.php';
                  </script>";

        $_SESSION['show_cart'] = array();
    }
} else if (isset($_POST['buy_now_order'])) {

    include_once '../dbh_inc.php';
    include_once '../function_inc.php';

    $customerId = $_POST['customer_id'];
    $paymentMethod = $_POST['payment_method'];
    $orderDate =  date("Y/m/d");
    $orderQuantity = $_POST['product_quantity'];
    $orderPrice =    $_POST['product_quantity'] * $_POST['product_unit_price'];
    $productId =     $_POST['product_id'];
    // echo  $customerId . " " . $paymentMethod . " " . $productId . " " .  $orderPrice;
    $productInfo = getProductInfo($conn, $productId);
    $orderDone = addToOrderTable($conn, $orderDate, $orderQuantity, $orderPrice, $paymentMethod, $productId, $customerId, $productInfo['seller_id']);

    if ($orderDone) {
        echo "<script>
        alert('Order has been placed');
        window.location.href='/online_shopping_system/main.php';
        </script>";
    }
}
