
<?php
session_start();
include("config.php");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$occupation = $_POST['occupation'];

$contact = $_POST['contact'];
$email =$_POST['email'];
$postal =$_POST['postal'];
$region = $_POST['region'];
                           
//$username=$_POST['username'];
$username=$_POST['username'];
$password= md5($_POST['password']);
$rpassword=md5($_POST['rpassword']);


  $tenant_id = $_POST['tenant_id'];
  $house_id = $_POST['house_id'];
  
 $price = $_POST['price'];

  $duration_month = $_POST['duration_month'];
  
  
  $terms = $_POST['terms'];
  
  $total_rent = $_POST['price'];
  $dur = $_POST['duration_month'];
  
   $total_rent = $dur * $price;
   $rent_per_term =$total_rent / $terms;

if($password == $rpassword)
{
 								  
	$insertloginQuery = "insert into contract(tenant_id,house_id,duration_month,total_rent,terms,rent_per_term,start_day) 
	                                   values ('".$tenant_id."','".$house_id."','".$duration_month."','".$total_rent."','".$terms."','".$rent_per_term."',now())";
   
	$insertQuery = "insert into tenant(fname,lname,occupation,contact,email,
	                                       	postal,region,username,password)
											values('".$fname."','".$lname."','".$occupation."',
									               '".$contact."','".$email."','".$postal."',
											      '".$region."','".$username."',
									               '".$password."')";
	
	$sql1 = "select email from tenant where email = '$email'";
    $result1 = mysql_query($sql1) or die ("Couldn't execute query.");										  
    
	$num1=mysql_num_rows($result1);
	
	if($num1 == 1)
	{   ?>
			<script>alert('Sorry username already exist ...');
            window.location.href = "index.php";</script>'
           
         
            
			<?php
		 
	}
	else
	{
		
		
		
		if((mysql_query($insertloginQuery)) && (mysql_query($insertQuery)))
		  {
			
		?>
			echo'<script>alert('Registered Successfully');
            window.location.href = "index.php";</script>'
           
         
            
			<?php	  
		   }
		else
		 {
			
		?>
			echo'<script>alert('Not Registered!');
            window.location.href = "index.php";</script>'
           
         
            
			<?php
		  }
       }
	 }   
else
 {
   echo "Error:Password missmatch";
  }
?>