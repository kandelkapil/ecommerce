<?php
require_once "db_config.php";

$product_name = $product_price = $product_image = $available = "";
$product_name_error = $product_price_error = $product_image_error = $available_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = trim($_POST["product_name"]);
    if (empty($productName)) {
        $product_name_error = "Product Name is required.";
    } else {
        $productName = $productName;
    }

    $productPrice = trim($_POST["product_price"]);

    if (empty($productPrice)) {
        $product_price_error = "Product price is required.";
    } else {
        $productPrice = $productPrice;
    }

    $filename = $_FILES["product_image"]["name"];
    $tempname = $_FILES["product_image"]["tmp_name"];
    $folder = "image/".$filename;
    
     if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
   
    $productAvailable = trim($_POST["available"]);
    if (empty($productAvailable)) {
        $available_error = "Availability is required.";
    } else {
        $productAvailable = $productAvailable;
    }

    if (empty($product_name_error) && empty($product_price_error) && empty($available_error)) {
      $sql = "INSERT INTO `product` (`product_name`, `product_price`, `product_image`, `available`) VALUES ('$productName', '$productPrice', '$filename', '$productAvailable')";
        $result = mysqli_query($conn, $sql);
      if ($result) {
          
          header("location: index.php");

      } else {
         echo "Something went wrong. Please try again later.";
        
     }
 }


 mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style type="text/css">
        .wrapper {
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
                        <h2>Create Product</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group <?php echo (!empty($product_name_error)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="">
                            <span class="help-block"><?php echo $product_name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($product_price_error)) ? 'has-error' : ''; ?>">

                             <label>Product Price</label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">Rs</span>
                            <input type="number" name="product_price" class="form-control" value=''>
                            <span class="input-group-text">.00</span>
                            </div>

                            <!-- 
                            <input type="number" name="product_price" class="form-control" value=""> -->
                            <span class="help-block"><?php echo $product_price_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($product_image_error)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="file" name="product_image" class="form-control" value="">
                            <span class="help-block"><?php echo $product_image_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($available_error)) ? 'has-error' : ''; ?>">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="available" id="available" value="in stock">
                                    <label class="form-check-label" for="In Stock">
                                    In Stock
                                    </label>
                                 </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="available" id="available"  value='out of stock'checked>
                                <label class="form-check-label" for="Out of Stock">
                                Out of Stock
                                </label>
                            </div>
                                <span class="help-block"><?php echo $available_error;?></span>
                            </div>

                      <input type="submit" class="btn btn-outline-primary" value="Submit">
                      <a href="index.php" class="btn btn-outline-danger">Cancel</a>
                  </form>
              </div>
          </div>
      </div>
  </div>
</body>
</html>