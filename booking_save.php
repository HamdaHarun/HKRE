	<?php
	include('auth.php');
 	include('dbcon.php');
	
		$id=$_POST['selector'];
 	$username  = $_POST['username'];
	$due_date  = $_POST['due_date'];

	if ($id == '' ){ 
	header("location: home.php");
	?>
	

	<?php }else{
	
	if(isset($_POST['submit'])){
		if(empty($_POST['selector']) || !isset($_POST['selector'])){
			die('Room required');
		}
		$query = "UPDATE tenant SET checkout = 1 WHERE username = '" .$_SESSION['username'] . "'";
		$res = mysql_query($query);	

	}
		$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysql_query("update houses set status='occupied', Occupied_room='1' where house_no = '$id[$i]'")or die(mysql_error());	
}
	mysql_query("insert into tbl_renting(username,date_rented,due_date) values ('$username',NOW(),'$due_date')")or die(mysql_error());
	$query = mysql_query("select * from tbl_renting order by renting_id DESC")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$renting_id  = $row['renting_id']; 
	

$N = count($id);
for($i=0; $i < $N; $i++)
{
	 mysql_query("insert renting_details (house_no,renting_id,rentingdetails_status) values('$id[$i]','$renting_id','pending')")or die(mysql_error());

}
?> 
<script>alert('Booking was Successful!')
            window.location.href = "home.php";</script>;
<?php


}  
?>
	
	

	
	