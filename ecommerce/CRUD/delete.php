<?php

include 'db_config.php'; 

if (isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))) {

    $id = trim($_GET["product_id"]);
    $query = mysqli_query($conn, "DELETE FROM product WHERE product_id = '$id'");

    header("location: index.php");

    mysqli_close($conn);
} else {
    header("location: delete.php");
    exit();
}

?>