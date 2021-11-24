<?php

include_once './header.php';
include_once './includes/dbh_inc.php';
include_once './includes/function_inc.php';
$productInfo = getProductByAdmin($conn);
?>


<main>

    <div class="banner mb-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/online_shopping_system/img/online_shopping_1.jpg" class="d-block w-100" alt="..." height="500">
                </div>
                <div class="carousel-item">
                    <img src="/online_shopping_system/img/online_shopping_2.jpg" class="d-block w-100" alt="..." height="500">
                </div>
                <div class="carousel-item">
                    <img src="/online_shopping_system/img/online_shopping_3.jpg" class="d-block w-100" alt="..." height="500">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="product-card container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($productInfo as $product) { ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="/online_shopping_system/img/product_img/<?= $product['product_image_1'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo  $product['product_name'] ?></h5>
                            <p class="card-text">Description...</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            <?php } ?>



        </div>

</main>




<?php

include_once './footer.php';
?>