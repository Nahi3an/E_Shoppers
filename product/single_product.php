<?php
include_once '../header.php';

// echo $_POST['id'];
// exit();
if (isset($_POST['go_to_product']) || isset($_POST['display-product'])) {

    include_once '../includes/dbh_inc.php';
    include_once '../includes/function_inc.php';

    $productInfo = getProductInfo($conn, $_POST['product_id']);

    // echo $productInfo['category_id'];
    $categoryInfo = getSingleCategory($conn, $productInfo['category_id']);
    $description = getSingleDescription($conn, $productInfo['product_id'], $productInfo['category_id']);
    // echo sizeof($categoryInfo['attributes']);

    // echo $productInfo['product_id'];


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
                <p>
                    <?php echo $productInfo['product_description'] ?>
                </p>
                <span>Price: <?php echo $productInfo['product_unit_price'] ?> BDT</span> <br>
                <a class="btn btn-danger btn-sm mt-2">Buy Now</a>
            </div>
        </div>

        <div id='description-table'>
            <dl class="row">
                <?php foreach ($categoryInfo['attributes'] as $key => $attribute) { ?>
                    <dt class="col-sm-3"><?php echo  $attribute; ?></dt>
                    <dd class="col-sm-9"><?php echo $description['attributeValues'][$key] ?></dd>
                <?php } ?>
            </dl>
        </div>
    </div>

<?php
}
include_once '../footer.php';
?>