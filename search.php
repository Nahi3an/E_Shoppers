<?php

include_once './includes/dbh_inc.php';

$output = '';
if (isset($_POST['query'])) {

    $search = $_POST['query'];
    $stmt = $conn->prepare("SELECT product_name FROM product 
                            WHERE product_name LIKE CONCAT('%',?,'%')");

    $stmt->bind_param("s", $search);

    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {

        $output = "";

        while ($row = $res->fetch_assoc()) {

            $output .= "   
            <li class='list-group-item'>" . $row['product_name'] . "</li>";
        }
        echo $output;
    } else {

        echo "<li class='list-group-item'>No Reult Found</li>";
    }
}
