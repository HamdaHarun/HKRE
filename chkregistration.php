
<?php
session_start();
include("config.php");
$name = $_POST['name'];
$email = $_POST['email'];
$contact =$_POST['contact'];
$address =$_POST['address'];
$nationality = $_POST['nationality'];
                           
//$username=$_POST['username'];
$username=$_POST['username'];
$password= md5($_POST['password']);
$rpassword= md5($_POST['rpassword']);

if($password == $rpassword)
{
 								  
	$insertloginQuery = "insert into tenant_login(username,password,last_logindatetime) 
	                                   values ('".$username."','".$password."',now())";
   
	$insertQuery = "insert into tenant(name,email,contact,address,username,nationality)
											values('".$name."','".$email."','".$contact."','".$address."','".$username."',
									               '".$nationality."')";
	
	$sql1 = "select username from tenant_login where username = '$username'";
    $result1 = mysql_query($sql1) or die ("Couldn't execute query.");										  
    
	$num1=mysql_num_rows($result1);
	
	if($num1 == 1)
	{   ?>
			<script>alert('Sorry username already exist ...');
            window.location.href = "register.php";</script>'
           
         
            
			<?php
		 
	}
	else
	{
		
		
		
		if((mysql_query($insertloginQuery)) && (mysql_query($insertQuery)))
		  {
			
		?>
			<script>alert('Registered Successfully');
            window.location.href = "login.php";</script>
           
         
            
			<?php	  
		   }
		else
		 {
			
		?>
			<script>alert('Not Registered!');
            window.location.href = "logininform.php";</script>
           
         
            
			<?php
		  }
       }
	 }   
else
 {
   echo "Error:Password missmatch";
  }
?>