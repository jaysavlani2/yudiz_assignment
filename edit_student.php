<?php
	require 'connection.php';
	if(isset($_GET['id']))
	{
		$query = "SELECT * FROM students WHERE id=".$_GET['id'];
		$result = mysqli_query($conn,$query);
		$rows = mysqli_fetch_array($result); 
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Edit</h1>
	<form enctype="multipart/form-data" method="POST">
		<label>Name: </label> 
        <input value="<?php echo $rows['name'];?>" type="text" name="name" title="Enter only Characters" maxlength="20" pattern="[A-Z a-z]{1,20}" required><br>

		<label>E-Mail: </label>
        <input value="<?php echo $rows['email'];?>" type="email" title="For Ex: jaysavlani2@gmail.com" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="50" required><br>

        <label>Birth Date: </label> 
        <input value="<?php echo $rows['dob'];?>" type="date" name="date" required><br>

		<input type="submit" name="b1" value="Update">
	</form>
</body>
</html>
<?php
	if(isset($_POST['b1']))
	{
		$id=$_GET['id'];
		$name = $_POST['name'];
		$email= $_POST['email'];
		$date = $_POST['date'];

		$query1= "UPDATE students SET name='".$name."',email='".$email."',dob='".$date."' WHERE id='".$_GET['id']."'";
		$query2= "UPDATE student_subjects SET name='".$name."' WHERE id='".$_GET['id']."'";
        if(mysqli_query($conn,$query1))
		{
			if(mysqli_query($conn,$query2))
			{
				?>
				<script>
					window.location="listing.php";
				</script>
				<?php
			}
		}
		else
		{
			echo "Query Error";
		}
    }
	
?>
	