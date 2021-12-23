
<!DOCTYPE html>
<?php 
require_once "db_config.php";
?>
<html>
<head><br>
<title> Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container my-3">
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
			<div class="login_form">
 	<form action="login_process.php" method="POST">
  <div class="form-group">
<?php 
if(isset($_GET['loginerror'])) {
	$loginerror=$_GET['loginerror'];
}
 if(!empty($loginerror)){  echo '<p class="errmsg">Invalid login credentials,Try Again..</p>'; } ?>
	<p class="text-center text-danger">Please login or signup to continue </p>
    <label class="label_txt text-info">Username or Email </label>
    <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control" required="">
  </div>
  <div class="form-group">
    <label class="label_txt text-info">Password </label>
    <input type="password" name="passwords" class="form-control" required="">
  </div>
  <button type="submit" name="sublogin" class="btn btn-success btn-group-lg form_btn">Login</button>
</form>
<div class="my-3">
<p style="font-size: 14px;text-align: center;margin-top: 10px;"><a href="forgot-password.php" style="color: #00376b;">Forgot Password?</a> </p>
</div>  
    <p >Don't have an account? <a href="signup.php">Sign up</a> </p>
	
		</div>
		<div class="col-sm-4">
		</div>
		</div>
	</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>

