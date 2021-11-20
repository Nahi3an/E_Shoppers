<?php

session_start();


if (!isset($_SESSION['user_id'])) {

    header('location:/online_shopping_system/login.php');
}

include_once './seller_header.php';



?>

<div class="seller-dashboard">

    <h1>
        Seller Profile Information
    </h1>



</div>


<?php
include_once './seller_footer.php';
?>