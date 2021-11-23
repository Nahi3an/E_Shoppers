<?php
include_once './seller_header.php';
include_once '../includes/dbh_inc.php';
include_once '../includes/function_inc.php';


// getProductOfSeller($conn);

// 


?>

<div class="seller-all-product container">

    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product Category</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Upload Date</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                // foreach ($allProductInfo as $product) {

                //     echo "<tr>";

                //     echo  "<td>" . $product['product_id'] . "</td>";
                //     echo  "<td>" . $product['product_name'] . "</td>";
                //     echo  "<td>" . $product['unit_price'] . "</td>";
                //     echo  "<td>" . $product['supplier_name'] . "</td>";
                //     echo  "<td>" . $product['supplier_contact_number'] . "</td>";
                //     echo  "<td>" . $product['supplier_address'] . "</td>";
                //     echo  '<td><a class="btn  btn-sm btn-info" href="/ERP_System/products/update_product.php?main_product_id=' . $product['id'] . '&update_product_id=' . $product['product_id'] . '&update_product_name=' . $product['product_name'] . '&update_product_price=' . $product['unit_price'] . '">Update</a></td>';
                //     echo  '<td><a class="btn  btn-sm btn-danger" href="/ERP_System/includes/products_inc/delete_product_inc.php?delete_product_id=' . $product['product_id'] . '">Delete</a></td>';
                //     echo "</tr>";
                //     echo "</tr>";
                // }

                ?>

        </tbody>
    </table>

</div>


<?php
include_once './seller_footer.php';
?>