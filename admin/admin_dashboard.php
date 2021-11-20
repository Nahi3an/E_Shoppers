<?php

session_start();


if (!isset($_SESSION['user_id'])) {

  header('location:/online_shopping_system/login.php');
}

include_once './admin_header.php';

?>

<div class="admin-dashboard">

  <h1>
    Admin dashboard
  </h1>



</div>


<?php
include_once './admin_footer.php';
?>