<?php
require_once "db_config.php";

if (isset($_GET["product_id"]) && !empty(trim($_GET["product_id"]))) {

    $id = trim($_GET["product_id"]);
    $query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id'");

    if ($read_data = mysqli_fetch_assoc($query)) {
        $productName = $read_data["product_name"];
        $productPrice = $read_data["product_price"];
        $productImage = $read_data["product_image"];
        $productAvailable = $read_data["available"];
    } else {
        header("location: create.php");
        exit();
    }

    mysqli_close($conn);
} else {
    header("location: create.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="page-header">
                        <h1> Product View</h1>
                    </div>
                    <div class="form-group">
                        <label>Product Name:</label>
                        <p class="form-control-static"><?php echo $productName ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product Price:</label>
                        <p class="form-control-static"><?php echo $productPrice ?></p>
                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <br>
                        
                        <img src="<?php echo 'image/'.$productImage ?>" alt="<?php echo $productName ?>">
                        <p class="form-control-static"><?php echo $productImage ?></p>
                    </div>
                    <div class="form-group">
                        <label>Availability:</label>
                        <p class="form-control-static"><?php echo $productAvailable ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-outline-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
