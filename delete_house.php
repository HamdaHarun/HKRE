<?php
	$conn=mysqli_connect("localhost","root","", "samatar_towers") or die(mysql_error());
?>
 <?php
		
		$house_no = $_GET['house_no'];
		
		mysqli_query($conn, "DELETE FROM houses WHERE house_no = '$house_no'") or die(mysqli_error());
						
		header("location: house_detail.php");	
		
		?>
		
