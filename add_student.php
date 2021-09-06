<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		function validate() {  
        	var name = document.registration.name;  
        	var email = document.registration.email;  
        	if (name.value.length <= 0) {  
            	alert("Name is required");  
            	name.focus();  
            	return false;  
        	}  
        	if (email.value.length <= 0) {  
            	alert("Email is required");  
            	email.focus();  
            	return false;  
        	}  
        }
	    
	</script>
</head>
<body>
	<h1>Registration</h1>
	<form enctype="multipart/form-data" name="registration" method="POST" onsubmit="return validate()">
		<label>Name: </label> 
        <input type="text" name="name" title="Enter only Characters" maxlength="50" pattern="[A-Z a-z]{1,50}" required><br>

		<label>E-Mail: </label>
        <input type="email" title="For Ex: jaysavlani2@gmail.com" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="100" required><br>

        <label>Birth Date: </label> 
        <input type="date" name="date" required><br>

        <label>Subject: </label><br>
    	DBMS<input type="checkbox" name="subject[]" value="DBMS"><br>
    	OOPs<input type="checkbox" name="subject[]" value="OOPs"><br>
    	DSA<input type="checkbox" name="subject[]" value="DSA"><br>
    	PSP<input type="checkbox" name="subject[]" value="PSP"><br>
    	OS<input type="checkbox" name="subject[]" value="OS"><br>

    	<label>Upload Photo: </label>
        <input type="file" name="image" required><br>

		<input type="submit" name="b1" value="Submit">
		<input type="reset" value="Reset">
	</form>
</body>
</html>

<?php
	require 'connection.php';
	if(isset($_POST['b1']))
	{
		$name = $_POST['name'];
		$email= $_POST['email'];
		$date = $_POST['date'];
		$subject = $_POST['subject'];
		$num = sizeof($subject);
		$subject = implode(', ',$subject);

		$filename = $_FILES['image']['name'];
		$fsize = $_FILES["image"]["size"];

		$target_dir=dirname(__FILE__);
		$target_dir.= "/img/";
		$target_file = $target_dir.basename($filename);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		$ftype = array("jpg","jpeg","png");

		if(in_array($imageFileType,$ftype))
		{
			$query1= "INSERT INTO students (name,email,dob,subjects,profile_image) values ('".$name."','".$email."','".$date."','".$subject."','".$filename."')";
			$query2= "INSERT INTO student_subjects (name,subject,num_subject) values ('".$name."','".$subject."','".$num."')";
        	if(mysqli_query($conn,$query1))
			{
				if(mysqli_query($conn,$query2))
				{
					move_uploaded_file($_FILES['image']['tmp_name'], $target_dir.$filename);
				}
			}
			else
			{
				echo "Query Error";
			}
       	}
	}
?>