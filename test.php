<?php

include_once './includes/dbh_inc.php';

for ($i = 1; $i <= 30; $i++) {

    $att = 'att_val_' . $i;

    $sql = "ALTER TABLE description
            ADD $att varchar(255)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "ok" . $i . "<br>";
    } else {

        echo "not ok" . $i . "<br>";
    }
}
