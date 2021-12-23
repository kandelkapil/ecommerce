<?php

function component($productName, $productPrice, $productImage, $productId){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                        
                         <img src=\"./image/$productImage\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productName</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <h5>
                                <small><s class=\"text-secondary\">$10000</s></small>
                                <span class=\"price\">$$productPrice</span>
                            </h5>
                            
                            <input type=\"number\" class=\"col-md-8 col-sm-6 py-2 my-2 \" name=\"quantity\" placeholder=\"Enter Quantity\">
                        
                            <button type=\"submit\" class=\"btn btn-outline-success\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productId'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productImage , $productName,$productPrice, $productId){
    $element = "
    
    <form action=\"cart.php?action=remove&product_id=$productId\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"./image/$productImage\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2 my-2\">$productName</h5>
                                
                                <h5 class=\"pt-2\">Rs $productPrice</h5>
                                
                                <button type=\"submit\" class=\"btn btn-danger mx-2 my-3\" name=\"remove\">Remove</button>
                            </div>
  
   
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"name=\"decrement\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\" name=\"item\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\" name=\"increment\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
    
    ";
    echo  $element;
}



// <small class=\"text-secondary\">Seller:...</small>
// <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button> 











