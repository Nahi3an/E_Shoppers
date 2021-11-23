<?php
include_once '../header.php';
include_once '../includes/dbh_inc.php';
include_once '../includes/function_inc.php';
$customerInformation = getCustomerInfo($conn, $_SESSION['user_id']);

?>

<div class="customer-dashboard container">
    <h3>Customer Profile Information</h3>

    <form action="/online_shopping_system/includes/customer_inc/customer_update_info_inc.php" method="POST">
        <input type="text" name="customer_id" hidden value="<?php echo $customerInformation["customer_id"]; ?>">
        <div class="mb-3">
            <label class="form-label">Customer Name</label> <br>
            <input type="text" name="customer_name" value="<?php echo $customerInformation['customer_name']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Customer Email</label> <br>
            <input type="text" name="customer_email" value="<?php echo $customerInformation['customer_email']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Customer Contact Number</label> <br>
            <input type="text" name="customer_contact_number" value="<?php echo $customerInformation['customer_contact_number']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Customer Address</label> <br>
            <input type="text" name="customer_address" value="<?php echo $customerInformation['customer_adderess']; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="customer_update">Submit</button>
    </form>
    <!--<div class="container">
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                    <a href="/online_shopping_system/customer/customer_profile_edit.php"><h5 class="card-title">Edit Profile</h5></a>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                    <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Change Password</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                </div>
            </div>
        </div>-->
</div>









<?php
include_once '../footer.php';
?>