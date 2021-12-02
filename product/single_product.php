<?php
include_once '../header.php';

// echo $_POST['id'];
// exit();
if (isset($_POST['go_to_product']) || isset($_POST['display-product'])) {

    include_once '../includes/dbh_inc.php';
    include_once '../includes/function_inc.php';

    $productInfo = getProductInfo($conn, $_POST['product_id']);

?>

    <div class="container product-description" style="height: 500px;">
        <div class="row">
            <div class="col">
                <div class="pic-image row">
                    <div class="col">
                        <img src="/online_shopping_system/img/product_img/<?= $productInfo['product_image_1'] ?>">
                    </div>
                    <div class="col">
                        <img src="/online_shopping_system/img/product_img/<?= $productInfo['product_image_2'] ?>">

                    </div>
                </div>
            </div>
            <div class="col">
                <h3><?php echo  $productInfo['product_name'] ?></h3>

                <h5>
                    <?php echo $productInfo['product_description'] ?>
                </h5>
            </div>
        </div>
    </div>

<?php
}
include_once '../footer.php';
?>