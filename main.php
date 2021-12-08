<?php

include_once './header.php';
include_once './includes/dbh_inc.php';
include_once './includes/function_inc.php';
$productInfo = getProductByAdmin($conn);
?>

<div class="product-card container mb-5 mt-5" id="product-card">
    <div class="row row-cols-1 row-cols-md-4 g-4 mt-5">
        <?php foreach ($productInfo as $product) {
            $id = $product['product_id']; ?>

            <div class="col">
                <div class="card h-100">
                    <img src="/online_shopping_system/img/product_img/<?= $product['product_image_1'] ?>" class="card-img-top">
                    <div class="card-body">
                        <form action="/online_shopping_system/product/single_product.php" method="POST">
                            <input type="text" hidden name="product_id" value="<?php echo $product['product_id']; ?>">
                            <button type="submit" name="display-product" style="background: white; border: none;">
                                <h5><?php echo  $product['product_name'] ?></h5>
                            </button>
                        </form>
                        <span class="card-text">Price : <?php echo $product['product_unit_price'] ?></span>
                        <span class="card-text">In Stock : <?php echo $product['product_quanity'] ?></span>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <form action="/online_shopping_system/cart.php" method="POST">
                                    <input type="hidden" class="Id" name="product_id" value="<?php echo $product['product_id'] ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $product['product_name'] ?>">
                                    <input type="hidden" class="mrp" name="product_unit_price" value="<?php echo $product['product_unit_price'] ?>">
                                    <input type="submit" class="btn btn-primary btn-sm" name="add_to_cart" value="Add to cart">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="/online_shopping_system/product/single_product.php" method="POST">
                                    <input type="text" hidden name="product_id" value="<?php echo $product['product_id']; ?>">
                                    <input type="submit" class="btn btn-danger btn-sm" name="buy_now" value="Buy Now">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        <?php } ?>

    </div>
</div>

<!-- <script>
    function vistProduct() {
        document.getElementById("display-form").submit();
    }
</script> -->


<?php

include_once './footer.php';
?>