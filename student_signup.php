<!DOCTYPE html>
<html>
<head>
	<title>Student Signup</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		body{
  			background-color: #3f8;
  		}
  		.container{
  			position: absolute;
  			top: 150px;
  			left: 400px;
  			width: 500px;
  			height: 400px;
  			background-color: yellow;
  		}
  		form label{
  			color: red; 
  			padding-right: 20px;
  		}
  	</style>
</head>
<body>
	<center>
		<div class="container">
		<br><br>
		<h3>Student Signup Page</h3><br>
		<form action="" method="post">
			<label>Enter Name:</label><input type="text" name="name" required><br><br>
			<label>Enter Email:</label><input type="text" name="email" required><br><br>
			<label id="pas">Enter Password:</label><input type="password" name="password" required><br><br>
			<label>Enter confirm-Password:</label><input type="password" name="cpassword" required><br><br>
			<button type="submit" name="submit">Signup</button>
			<!-- <input type="submit" name="submit" value="LogIn"> -->
		</form><br>
		</div>
		<?php 
	
		$showAlert = False; 
		$showError = False; 
		$exists= False; 
	
		if($_SERVER["REQUEST_METHOD"] == "POST") { 
	
		$connection = mysqli_connect("localhost","root","","sms");
		// $db = mysqli_select_db($connection,"sms");
	
		$name = $_POST["name"];
		$email = $_POST["email"]; 
		$password = $_POST["password"]; 
		$cpassword = $_POST["cpassword"]; 
			
	
		$sql = "Select * from users where email='$email'"; 
	
		$result = mysqli_query($connection, $sql); 
	
		$num = mysqli_num_rows($result); 
	
		if($num == 0) { 
			if(($password == $cpassword) && $exists==false) { 
				 
				$sql = "INSERT INTO users (name,email,password,cpassword) VALUES ('$name',$email','$password','$cpassword')"; 
	
				$result = mysqli_query($connection, $sql); 
	
				if ($result) { 
					$showAlert = true; 
				} 
			} 
		else { 
			$showError = "Passwords do not match"; 
			}	 
		}
	
		if($num>0) 
		{ 
			$exists="Student already registered"; 
		} 
	
		}//end if 
		
				if($showAlert) { 
				sleep(3);
				header("location: student_login.php");
			} 
			
			if($showError) { 
			
				echo ' <div class="alert alert-danger 
					alert-dismissible fade show" role="alert"> 
				<strong>Error!</strong> '. $showError.'
			
			<button type="button" class="close"
					data-dismiss="alert aria-label="Close"> 
					<span aria-hidden="true">×</span> 
			</button> 
			</div> '; 
		} 
				
			if($exists) { 
				echo ' <div class="alert alert-danger 
					alert-dismissible fade show" role="alert"> 
			
				<strong>Error!</strong> '. $exists.'
				<button type="button" class="close"
					data-dismiss="alert" aria-label="Close"> 
					<span aria-hidden="true">×</span> 
				</button> 
			</div> '; 
			} 

		?>
	</center>
<script type="text/javascript">                                       
	<script type="text/javascript">
	alert("Redirecting to Login Page");
	window.location.href = "student_login.php";
</script>
</script>
</body>
</html>