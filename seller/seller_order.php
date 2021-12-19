<?php

session_start();
if (!isset($_SESSION['user_id'])) {

    header('location:/online_shopping_system/login.php');
}

include_once './seller_header.php';
include_once '../includes/dbh_inc.php';
include_once '../includes/function_inc.php';
$sellerInformation = getsellerInfo($conn, $_SESSION['user_id']);

$orderInfo = getAllOrdersOfSeller($conn, $sellerInformation['seller_id']);
?>

<div class="seller-all-order container">
    <br> <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">order_id</th>
                <th scope="col">order_date</th>
                <th scope="col">order_quantity</th>
                <th scope="col">order_price</th>
                <th scope="col">order_payment_method</th>
                <th scope="col">product_id</th>
                <th scope="col">order_status</th>
                <th scope="col">customer_id</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderInfo as $order) { ?>
                <tr>
                    <td><?php echo $order['order_id'] ?></td>
                    <td><?php echo $order['order_date'] ?></td>
                    <td><?php echo $order['order_quantity'] ?></td>
                    <td><?php echo $order['order_price'] ?></td>
                    <td><?php echo $order['order_payment_method'] ?></td>
                    <td><?php echo $order['product_id'] ?></td>
                    <td><?php echo $order['order_status'] ?></td>
                    <td><?php echo $order['customer_id'] ?></td>
                    <td>
                        <form action="/online_shopping_system/includes/seller_inc/seller_order_inc.php" method="POST">
                            <input type="text" hidden name="order_id" value="<?php echo $order['order_id'] ?>">
                            <input type="text" hidden name="seller_id" value="<?php echo $order['seller_id'] ?>">
                            <?php
                            if ($order['order_status'] == 'confirmed' || $order['order_status'] == 'canceled_by_seller') {
                            ?>
                                <input type="submit" name="confirm_order" class="btn disabled btn-primary btn-sm" value="Confirm">
                                <input type="submit" name="cancel_order" class="btn disabled btn-danger btn-sm " value="Cancel">
                            <?php } else { ?>
                                <input type="submit" name="confirm_order" class="btn btn-primary btn-sm" value="Confirm">
                                <input type="submit" name="cancel_order" class="btn  btn-danger btn-sm " value="Cancel">

                            <?php } ?>
                        </form>
                    </td>



                </tr>
            <?php } ?>

        </tbody>
    </table>

</div>