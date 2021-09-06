<?php
	require 'connection.php';
	$query = 'SELECT * FROM students';
	$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<h1>Student Details</h1>
	<div>
		<table border="2px">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email Address</th>
					<th>Date of Birth</th>
					<th>Subjects</th>
					<th>Profile Picture</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php
				while($rows = mysqli_fetch_array($result)){
			?>
			<tbody>
				<tr>
					<th><?php echo $rows['name'];?></th>
					<th><?php echo $rows['email'];?></th>
					<th><?php echo $rows['dob'];?></th>
					<th><?php echo $rows['subjects'];?></th>
					<th><img src="img/<?php echo $rows['profile_image']; ?>"></th>
					<th><a href="edit_student.php?id=<?php echo $rows['id'];?>">Edit</th>
					<th><a href="delete.php?id=<?php echo $rows['id'];?>">Delete</th>
				</tr>
			</tbody>
			<?php
				}
			?>
		</table>
	</div>
	<div>
		<input type="button" name="Add"	value="Add	Student"onclick="window.location.href='http://localhost/yudiz/add_student.php'">
	</div>
</body>
</html>
