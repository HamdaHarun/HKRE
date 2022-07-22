<?php
	$conn=mysqli_connect("localhost","root","", "samatar_towers") or die(mysql_error());
?>
 <?php
		
		$house_no = $_GET['house_no'];
		
		mysqli_query($conn, "UPDATE houses set Occupied_room='0', status='Empty' WHERE house_no = '$house_no'") or die(mysqli_error());
						
		header("location: house_detail.php");	
		
		?>
		