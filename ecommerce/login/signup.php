<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "db_config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container my-5">
       
        <div class="row">

        <?php 
 if(isset($_POST['signup'])){
  extract($_POST);
  if(strlen($fname)<3){ // Minimum 
      $error[] = 'Please enter First Name using at least 3 characters .';
        }
if(strlen($fname)>20){  // Max 
      $error[] = 'First Name maximum length is 20 Characters';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
            $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
        }    
if(strlen($lname)<3){ // Minimum 
      $error[] = 'Please enter Last Name using at least 3 charaters .';
        }
if(strlen($lname)>20){  // Max 
      $error[] = 'Last Name maximum length is 20 Characters';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
            $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
              }    
      if(strlen($username)<3){ // Change Minimum Lenghth   
            $error[] = 'Please enter Username at least 3 charaters.';
        }
  if(strlen($username)>30){ // Change Max Length 
            $error[] = 'Username maximum length is 30 Characters';
        }
  if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
            $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and no digits at the start- Eg - ecommerce, testuser or ecommerce123';
        }  
if(strlen($email)>50){  // Max 
            $error[] = 'Email maximum length is 50 Characters';
        }
   if($passwordConfirm ==''){
            $error[] = 'Please confirm the password.';
        }
        if($passwords != $passwordConfirm){
            $error[] = 'Passwords do not match.';
        }
          if(strlen($passwords)<5){ // min 
            $error[] = 'The password is 6 characters long.';
        }
        
         if(strlen($passwords)>20){ // Max 
            $error[] = 'Password maximum length is 20 Characters';
        }
          $sql="select * from users where (username='$username' or email='$email');";

      $res=mysqli_query($conn,$sql);

   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

     if($username==$row['username'])
     {
           $error[] ='Username alredy Exists.';
          } 
       if($email==$row['email'])
       {
            $error[] ='Email alredy Exists.';
          } 
      }
         if(!isset($error)){ 
              $date=date('Y-m-d');
            $options = array("cost"=>4);
    $passwords = password_hash($passwords,PASSWORD_BCRYPT,$options);

            $sql1 = "INSERT INTO users (fname,lname,username,email,passwords,date) values('$fname','$lname','$username','$email','$passwords','$date');";        
           $result = mysqli_query($conn,$sql1);

           if($result){
     $done=2; 
    }
    else{
    
      $error[] ='Failed : Something went wrongg';
    }
 }
 } ?>

		 <div class="col-sm-4">

        <?php
        
        if(isset($error)){
          if(is_array($error)){
            foreach($error as $error){
              echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
            }
        }
          
        }
        ?>
        
		</div>
		<div class="col-sm-4">
      <?php if(isset($done)) 
      { ?>
    <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:#fff;">Login here... </a> </div>
      <?php } else { ?>
       <div class="signup_form">
		<form action="" method="POST">
  <div class="form-group">
  	
        <label class="label_txt text-info">First Name</label>
    <input type="text" class="form-control" name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="" autocomplete="off">
  </div>
  <div class="form-group">
    <label class="label_txt text-info">Last Name </label>
    <input type="text" class="form-control" name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="" autocomplete="off">
  </div>
 
<div class="form-group">
    <label class="label_txt text-info">Username </label>
    <input type="text" class="form-control" name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="" autocomplete="off">
  </div>

<div class="form-group">
    <label class="label_txt text-info">Email </label>
    <input type="email" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="" autocomplete="off">
  </div>
  <div class="form-group">
    <label class="label_txt text-info">Password </label>
    <input type="password" name="passwords" class="form-control" required="">
  </div>
   <div class="form-group">
    <label class="label_txt text-info">Confirm Password </label>
    <input type="password" name="passwordConfirm" class="form-control" required="">
  </div>
  <button type="submit" name="signup" class="btn btn-success btn-group-lg form_btn">Sign Up</button>
   <p class="text-center">Have an account?  <a href="login.php">Log in</a> </p>
</form>
<?php } ?> 
</div>
		</div>
		<div class="col-sm-4">
		</div>

	</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>