<?php

if (isset($_POST['logout_btn'])) {
    session_start();
    unset($_SESSION['user_id']);
    session_destroy();
    echo $_SESSION['user_id'];
}

header('location:/online_shopping_system/login.php');
