<?php

session_start();



require_once ("../CRUD/db_config.php");
require_once ("php/component.php");


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      print_r('clicked delete button');
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['product_id']){
              unset($_SESSION['cart'][$key]);
            //   echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>
              setTimeout(function() {window.location = 'cart.php'}, 1300);
              
              </script>";
          }
      }
  }
}


if (isset($_POST['increment'])){
    
     if ($_GET['action'] == 'increment'){
         print_r('clicked + icon');
     }

}
//     if ($_GET['action'] == 'remove'){ //Total number of items in cart
//     print_r($_SESSION['item']);
//     var_dump($_SESSION['item']);
//     die();
//     $product_id = $_REQUEST['product_id']; //Clicked product's id
//     $_SESSION['cart'][$product_id]++; //Increment in relevant index value by one
//     $cost_query = "SELECT * FROM product WHERE product_id = $product_id";
//     $result = mysqli_query($conn, $cost_query);//Calculate cost here and store it in session variable to use in your main page or where you are displaying your cart
//       while ($row = mysqli_fetch_assoc($result)){ 
//     foreach ($product_id as $id) {
//         var_dump($id);
//         die();
//     if ($id['product_price'] == $product_price &&
//             $id['product_name'] == $products[0]['product_name'] &&
//             $id['product_price'] == $product_price[0]['product_price'] 


//     //         $id['type'] == $type[0]['title']) {
//     //     $id['quant'] = $id['quant']++;
//     //     $isCreate = false;
//     // }
// }
//       }
// }




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
    require_once ('php/header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>You Selections:</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                       $sql = "SELECT * FROM product";

                       $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['product_id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['product_id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6> 
                    </div>
                    <div class="col-md-6">
                        <h6>Rs <?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>Rs  <?php
                            echo $total;
                            ?></h6>
                              
                    </div>                 
                </div>
                <?php 
                  
                   
                   echo "<button type=\"button\" class=\"btn btn-primary btn-lg btn-block my-3\"  onclick= \"window.location.href = '../login/login.php'\">
                   Proceed to Checkout
                   </button>";
                      ?>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>