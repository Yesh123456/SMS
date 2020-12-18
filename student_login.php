<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		body{
  			background-color: #3f8;
  		}
  		.container{
  			position: absolute;
  			top: 200px;
  			left: 400px;
  			width: 500px;
  			height: 300px;
  			background-color: yellow;
  		}
  		form label{
  			color: red; 
  		}
  	</style>
</head>
<body>

	<center>
		<div class="container">
		<br><br>
		<h3>Student LogIn Page</h3><br>
		<form action="" method="post">
			<label>Enter Email:</label><input type="text" name="email" required><br><br>
			<label>Enter Password:</label><input type="password" name="password" required><br><br>
			<input type="submit" name="submit" value="LogIn">
			<button><a href="student_signup.php" style="color: #000;">SignUp</a></button>
		</form><br>
		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from users where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['email'] == $_POST['email'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span>Wrong Email-id !!</span>
						<?php
					}
				}
			}
		?>
		</div>
	</center>
</body>
</html>