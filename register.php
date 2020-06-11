<!DOCTYPE html>
<html lang="en">
<head>
<?php  include "database.php"; ?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

$username = $_POST['username'];
$phoneno = $_POST['phone_number'];
$password =$_POST['password'];

$username = mysqli_real_escape_string($connection,$username);
$phoneno = mysqli_real_escape_string($connection,$phoneno);
$password = mysqli_real_escape_string($connection,$password);
	
	  if (!empty($username) && !empty($phoneno) && !empty($password)) {
	$query1 = "insert into user (username,phone_number,password)";
	$query1 .= "values('{$username}','$phoneno','$password')";
	$result1=mysqli_query($connection,$query1);
	
		if(!$result1){
		die("Query Failed".mysqli_error($connection). ''.mysqli_errno($connection));

	}

		  header("Location:login.php");

}else
	  {
		$msg =  "Fields cannot be empty";
	  }
}
?>

	<title>CareerSpot</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/pt.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
			
				<form action="" method="POST">
					<span class="login100-form-title p-b-53">
						Sign Up
					</span>

					
					
					<div class="p-t-31 p-b-9">
					
						<span class="txt1">
							User Name
						</span>
                    </div>
                    
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Enter your username">
						<span class="focus-input100"></span>
					</div>
					
                    
					
					
					

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Phone number
						</span>

					
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="text" name="phone_number" placeholder="Enter phone number">
						<span class="focus-input100"></span>
					</div>


			

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

					
                    </div>
                    
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					




					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Sign Up
						</button>
					</div>
					

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Already registered?
						</span>

						<a href="login.php" class="txt2 bo1">
							Log in 
						</a>
					</div>
                </form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>