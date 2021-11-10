<?php

include_once './header.php';

?>

<div class="login-page container">
    <br>
    <br>
    <h3>LogIn</h3>

    <form action="/online_shopping_system/includes/login_inc.php" method="POST">
        <label>Enter Email:</label><br>
        <input type="text" name="user_email"><br> <br>
        <label>Enter Password:</label><br>
        <input type="password" name="user_password"> <br><br>
        <input type="submit" value="Login " name="login_btn" class="btn btn-info"><br>
    </form>
    <br>
    <h5>Don't have and account? <a href="./signup.php">Sign Up</a></h5>
</div>


<?php

include_once './footer.php';

?>