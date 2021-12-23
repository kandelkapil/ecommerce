<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

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
        <div class="col-md-10">
          <div class="page-header clearfix">
            <h2 class="pull-left">Products</h2>
            <a href="create.php" class="btn btn-outline-success">Add New Product</a>
          </div>
          <?php
                    // Include config file
          require_once "db_config.php";

                    // select all users
          $data = "SELECT * FROM product";
          if($product = mysqli_query($conn, $data)){
            if(mysqli_num_rows($product) > 0){
              echo "<table class='table table-bordered table-striped'>
              <thead>
              <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Image</th>
                <th>Availability</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>";
              while($product_data = mysqli_fetch_array($product)) {
                echo "<tr>
                <td>" . $product_data['product_id'] . "</td>
                <td>" . $product_data['product_name'] . "</td>
                <td>" .'Rs '. $product_data['product_price'] . "</td>
                <td>" . $product_data['product_image'] . "</td>
                <td>" . $product_data['available'] . "</td>
                <td>
                <a href='read.php?product_id=". $product_data['product_id'] ."' title='View Product' data-toggle='tooltip'>View<span class='glyphicon glyphicon-eye-open'></span></a>
                <a href='update.php?product_id=". $product_data['product_id'] ."' title='Update Product' data-toggle='tooltip'>Update<span class='glyphicon glyphicon-pencil'></span></a>
                <a href='delete.php?product_id=". $product_data['product_id'] ."' title='Delete Product' data-toggle='tooltip'>Delete<span class='glyphicon glyphicon-trash'></span></a>
                </td>
                </tr>";
              }
              echo "</tbody>
              </table>";
              mysqli_free_result($product);
            } else{
              echo "<p class='lead'><em>No records found.</em></p>";
            }
          } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          }

                    // Close connection
          mysqli_close($conn);
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>