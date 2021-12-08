<?php
if (isset($_POST['confirm_order'])) {


    session_start();

    include_once '../dbh_inc.php';
    include_once '../function_inc.php';

    $customerId = $_POST['customer_id'];
    $paymentMethod = $_POST['payment_method'];


    $sellerIds = array();
    foreach ($_SESSION['show_cart'] as $info) {

        $productInfo = getProductInfo($conn,  $info['product_id']);
        array_push($sellerIds, $productInfo['seller_id']);
    }

    $orderSuccess = addToOrderTable($conn, $_SESSION['show_cart'], $paymentMethod, $customerId, $sellerIds);

    if ($orderSuccess) {

        $count = 0;
        foreach ($_SESSION['show_cart'] as $info) {

            $productId = $info['product_id'];
            $sql  = "SELECT product_quanity 
                     FROM product
                     WHERE product_id='$productId'";

            $res = mysqli_query($conn, $sql);

            if ($res->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($res)) {

                    $oldQuantity = $row['product_quanity'];
                }
            }


            $updatedQuantity  = (int)$oldQuantity - (int)$info['product_quantity'];


            $sql = "UPDATE product
                    SET  product_quanity = '$updatedQuantity'
                    WHERE product_id  = '$productId'";

            $res = mysqli_query($conn, $sql);

            if ($res) {

                $count++;
            } else {

                echo "Error";
                exit();
            }
        }


        if ($count == sizeof($_SESSION['show_cart'])) {

            echo "<script>
                  alert('Order has been placed');
                  window.location.href='/online_shopping_system/main.php';
                  </script>";

            $_SESSION['show_cart'] = array();
        }
    }
}
