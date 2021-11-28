<?php

include_once './header.php';
include_once './includes/dbh_inc.php';
include_once './includes/function_inc.php';
$productInfo = getProductByAdmin($conn);
?>

<div class="product-card container mb-5" id="product-card">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($productInfo as $product) { ?>
            <div class="col">
                <div class="card h-100">
                    <img src="/online_shopping_system/img/product_img/<?= $product['product_image_1'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo  $product['product_name'] ?></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore necessitatibus doloribus harum, illo accusantium perferendis. Quis doloribus dolores iusto aspernatur perspiciatis repudiandae, ipsam fugit placeat non ut tenetur accusantium adipisci.</p>
                    </div>
                    <button class="btn btn-info">Add To Cart</button>
                    <button class="btn btn-danger">Buy Now</button>

                </div>
            </div>
        <?php } ?>



    </div>
</div>




<?php

include_once './footer.php';
?>