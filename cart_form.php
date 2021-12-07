<?php
include_once './header.php';

?>

<html>
<title>
    Confirm Order
</title>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Order Confirmation Form</h3>
                <h4>Basic Information</h4>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Name</label> <br>
                        <input type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail</label> <br>
                        <input type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile Number</label> <br>
                        <input type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Delivery Address</label> <br>
                        <input type="text">
                    </div>
                    <h4>Payment Method</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Online Payment
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Cash on Delivery
                        </label>
                    </div>
                    <h4>Delivery Method</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Home Delivery
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Store Pickup
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm Order</button>
                </form>
            </div>

            <div class="col">

                <?php
                if (isset($_SESSION['show_cart']) && count($_SESSION['show_cart']) > 0) {
                ?>
                    <h4>Order Overview</h4>
                    <table class="table">
                        <thead>
                            <td>Product Name</td>
                            <td>Unit Price</td>
                            <td>Quantiy</td>
                            <td>Total</td>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                foreach ($_SESSION['show_cart'] as $key => $value) {
                                ?>
                                    <td><?php echo $value['product_name'] ?></td>
                                    <td><?php echo $value['product_unit_price'] ?></td>
                                    <td><?php echo $value['product_quanity'] ?></td>
                                    <td><?php echo $value['product_name'] ?></td>
                                <?php } ?>

                            </tr>
                        </tbody>

                    </table>
                <?php } ?>

            </div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                I agree to the terms and policy.
            </label>
        </div>

    </div>

</body>

</html>


<?php
include_once './footer.php';
?>