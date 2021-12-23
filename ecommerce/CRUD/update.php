<?php

include "db_config.php"; 

$id = $_GET['product_id']; 

$query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id'");

$product_data = mysqli_fetch_array($query); 

if(isset($_POST['update']))
{
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $filename = $_FILES["product_image"]["name"];
    $tempname = $_FILES["product_image"]["tmp_name"];
    $folder = "image/".$filename;
    $productAvailable = $_POST['available'];

    if($filename != ""){
      $edit = "UPDATE product SET product_name='".$productName."', product_price='".$productPrice."', product_image='".$filename."', available='".$productAvailable."' WHERE product_id='".$id."'";
    }
    else {
      $edit = "UPDATE product SET product_name='".$productName."', product_price='".$productPrice."', available='".$productAvailable."' WHERE product_id='".$id."'";
    }

    if(mysqli_query($conn, $edit))
    { 
        header("location:index.php"); 
    }
    else
    {
        echo "Something went wrong. Please try again later.";
    } 
    if (move_uploaded_file($tempname, $folder))  {
        $image_error = "Image uploaded successfully";
    }else{
        $image_error = "Failed to upload image";
    }   

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upadte Product</title>
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
            <h2>Update Product</h2>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" name="product_name" class="form-control" value="<?php echo $product_data['product_name'] ?>">
          </div>

          <div class="form-group">
              <label>Product Price</label>
              <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" name="product_price" class="form-control" value="<?php echo $product_data['product_price'] ?>">
                            <span class="input-group-text">.00</span>
                            </div>
              </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="product_image" class="form-control" value="<?php echo $product_data['product_image'] ?>">
            </div>

            <div class="form-group">

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

                      <!-- <label for="available">Availability:</label>
                      <select id="available" name="available">
                        <option value="in stock">In Stock</option>
                        <option value="out of stock">Out of Stock</option>
                    </select> -->
        </div>

        <input type="submit" class="btn btn-outline-success" name="update" value="Submit">
        <a href="index.php" class="btn btn-outline-danger">Cancel</a>
    </form>
</div>
</div>
</div>
</div>
</body>
</html>