 <?php
    include_once './header.php';
    ?>

 <div class="container" id="cart-display">
     <table>
         <thead>
             <tr>
                 <th>Product Name</th>
                 <th>Product Price</th>
                 <th>Product Quantity</th>
                 <th>Action</th>
                 <th>total</th>

             </tr>
         </thead>
         <tbody>
             <?php
                // $total = 0;

                if (isset($_SESSION['show_cart'])) {
                    foreach ($_SESSION['show_cart'] as $key => $value) {

                        // $total = $total + $value['product_mrp'];
                        echo "
                                    <tr>                             
                                        <td>$value[product_name]</td>
                                        <td><input type='hidden' value='$value[product_unit_price]' class='mrp'>$value[product_unit_price]</td>
                                        <td><input type='number'  class='quantity' name='to_change_quantity'  value='$value[product_quantity]' min='1' max='10'></td>                        
                                        <td> 
                                            <form action='/online_shopping_system/cart.php' method='POST'>
                                                <input type='hidden' name='product_name' value='$value[product_name]'>
                                                <input name='remove_from_cart' value='remove' class='btn btn-primary' type='submit'>
                                            </form>
                                         </td>
                                        <td>total</td>
                                    </tr>                         
                                ";
                    }
                }
                ?>
         </tbody>

     </table>
 </div>

 <?php
    include_once './footer.php';
    ?>