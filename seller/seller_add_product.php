<?php
include_once './seller_header.php';
include_once '../includes/dbh_inc.php';
include_once '../includes/function_inc.php';

$categories = allCategory($conn);

session_start();
// echo  $_SESSION["user_id"];

?>

<div class="seller-add-product container">

    <form action="/online_shopping_system/includes/seller_inc/seller_add_product_inc.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="user_id" hidden value="<?php echo $_SESSION["user_id"]; ?>">
        <div class="mb-3">
            <label class="form-label">Product Name</label> <br>
            <input type="text" name="product_name">
        </div>
        <div class="mb-3">
            <label class="form-label" name='product_quantity'>Product Quantity</label><br>
            <input type="text" name='product_quantity'>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Unit Price</label><br>
            <input type="text" name='product_unit_price'>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Description</label><br>
            <textarea name='product_description'></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Category</label><br>
            <select name="category_id">

                <?php
                foreach ($categories as $category) {
                    echo "Id: <option>" . $category['category_id'] . " - " . $category['category_name']  . "</option>";
                }

                ?>

            </select> <br>
        </div>
        <div class="mb-3">
            <input type="file" name="my_image" accept="image/png, image/jpg, image/jpeg" onchange='loadImage(event)' />
            <img width="400" height="400" class="img-thumbnail" alt="" id="product-image-1">
        </div>
        <div class="mb-3">
            <input type="file" name="product_image_2" accept="image/png, image/jpg, image/jpeg" onchange='loadImage(event)' />
            <img width="400" height="400" class="img-thumbnail" alt="" id="product-image-2">
        </div>
        <div class="mb-3">
            <input type="submit" value="Upload" class="btn btn-info" name="add_product"><br>
        </div>
    </form>
    <script>
        var loadImage = function(event) {

            if (event.target.name == 'my_image') {
                let image1 = document.getElementById('product-image-1');
                image1.src = URL.createObjectURL(event.target.files[0]);
            } else {
                let image2 = document.getElementById('product-image-2');
                image2.src = URL.createObjectURL(event.target.files[0]);

            }

        };
    </script>

</div>


<?php
include_once './seller_footer.php';
?>