<?php

include_once '../header.php';

?>

<div class="seller-signup">
    <br><br><br>
    <form action="/online_shopping_system/includes/seller_inc/seller_signup_inc.php" method="POST">
        <label>Enter Name:</label><br>
        <input type="text" name="seller_name"> <br>
        <label>Enter Email:</label><br>
        <input type="text" name="seller_email"><br>
        <label>Enter Password:</label><br>
        <input type="password" name="seller_password"> <br>
        <label>Confirm Password:</label><br>
        <input type="password" name="seller_password_confirm">
        <br>
        <input type="submit" value="Sign Up" name="seller_signup"><br>
    </form>
</div>


<?php

include_once '../footer.php';

?>