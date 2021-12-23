
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="checkout.css">
   <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php
session_start();
require_once ("./php/header.php");
require_once ("../CRUD/db_config.php");
?>
<!-- <div class="container d-lg-flex"> -->
    <div class="container-fluid col-md-8 fs-4">
        <!-- <div class="box-inner-2"> -->
            <div >
                <p class="fw-bold py-2">Payment Details</p>
                <p class="dis mb-3">Complete your purchase by providing your details</p>
            </div>
            <form action="">
                <div class="mb-3">
                    <p class="dis fw-bold mb-2">Email address</p> <input class="form-control" type="email" value="">
                </div>
                <!-- <div>
                    <p class="dis fw-bold mb-2">Card details</p>
                    <div class="d-flex align-items-center justify-content-between card-atm border rounded">
                        <div class="fab fa-cc-visa ps-3"></div> <input type="text" class="form-control" placeholder="Card Details">
                        <div class="d-flex w-50"> <input type="text" class="form-control px-0" placeholder="MM/YY"> <input type="password" maxlength=3 class="form-control px-0" placeholder="CVV"> </div>
                    </div> -->
                    <div class="my-3 cardname">
                        <p class="dis fw-bold mb-2">Name</p> <input class="form-control" type="text">
                        <p class="dis fw-bold mb-2">Address</p> <input class="form-control" type="text">
                        <p class="dis fw-bold mb-2">Phone Number</p> <input class="form-control" type="text">
                    </div>
                    <div class="address">
                        <p class="dis fw-bold mb-3 my-3">Billing address</p> <select class="form-select" aria-label="Default select example">
                            <option selected hidden>Kathmandu</option>
                            <option value="">Pokhara</option>
                            <option value="">Lalitpur</option>
                            <option value="">Bharatpur</option>
                            <option value="">Biratnagar</option>
                            <option value="">Birgunj</option>
                        </select>
                        <div class="d-flex"> <input class="form-control zip" type="text" placeholder="ZIP"> <input class="form-control state" type="text" placeholder="State"> </div>
                        <!-- <div class=" my-3">
                            <p class="dis fw-bold mb-2">VAT Number</p>
                            <div class="inputWithcheck"> <input class="form-control" type="text" value="GB012345B9"> <span class="fas fa-check"></span> </div>
                        </div> -->
                        <div class="d-flex flex-column dis my-3 py-2 fs-5">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p>Subtotal</p>
                                 <p><!--<span class="fas fa-dollar-sign"></span>-->33.00</p> 
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p>VAT<span>(13%)</span></p>
                                <p><!--<span class="fas fa-dollar-sign"></span>-->2.80</p> 
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p class="fw-bold">Total</p>
                                <p class="fw-bold"><!--<span class="fas fa-dollar-sign"></span>-->35.80</p> 
                            </div>
                            <div class="btn btn-primary mt-2 fs-4">CheckOut<!--<span class="fas fa-dollar-sign px-1"></span>--></div>
                        </div>
                    </div>
                </div>
            </form>
        <!-- </div> -->
    </div>
    
<!-- </div> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"/>
    
</body>
</html>