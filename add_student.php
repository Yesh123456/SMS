<?php

	$link = mysqli_connect("localhost", "root", "", "sms");

	if($link === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$roll_no = mysqli_real_escape_string	($link, $_REQUEST['roll_no']);
	$name = mysqli_real_escape_string($link, $_REQUEST['name']);
	$father_name = mysqli_real_escape_string($link, $_REQUEST['father_name']);
	$class = mysqli_real_escape_string($link, $_REQUEST['class']);
	$mobile = mysqli_real_escape_string($link, $_REQUEST['mobile']);
	$email = mysqli_real_escape_string($link, $_REQUEST['email']);
	$password = mysqli_real_escape_string($link, $_REQUEST['password']);
	$quality = mysqli_real_escape_string($link, $_REQUEST['quality']);
	$filename = mysqli_real_escape_string($link, $_REQUEST['uploadfile']); 

	$query = " INSERT INTO students (roll_no,name,father_name,class,mobile,email,password,quality,filename) VALUES('$roll_no','$name','$father_name','$class','$mobile','$email','$password','$quality','$filename')";
	
	if(mysqli_query($link, $query)){
    	echo "Record added successfully.";
	} else{
    	echo "ERROR: Could not able to execute $query. " . mysqli_error($link);
	}
	mysqli_close($link);
?>
<!-- <script type="text/javascript">
	alert("Student added successfully.");
	window.location.href = "admin_dashboard.php";
</script> -->

