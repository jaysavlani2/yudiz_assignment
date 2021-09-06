<?php
	require 'connection.php';
	if(isset($_GET['id']))
	{
		$query1 = "DELETE FROM students WHERE id=".$_GET['id'];
		$query2 = "DELETE FROM student_subjects WHERE id=".$_GET['id'];
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
	}
?>