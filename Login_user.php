
<?php
	//Start session
	session_start();

	
$host = "localhost";
$db = "samatar_towers";
$user = "root";
$passwd = "";
$link = @mysql_connect($host,$user,$passwd);
if(!$link) {
	print "Could not connect to the MySQL Host<br><br>Message(s):<br>" . mysql_error()  . "<br>";
	exit ;
}

if(!@mysql_select_db($db)) {
	print "Could not connect to the MySQL Database<br><br>Message(s):<br>" . mysql_error()  . "<br>";
	exit ;
}


	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$username  = $_POST['username'];
	$password = md5($_POST['password']);
	$ao="Administrative Officer IV";
	
	//Create query
	$qry="select * from tenant_login where username = '".$username."' and password = '".$password."'";
	$result=mysql_query($qry);
	//while($row = mysql_fetch_array($result))
//  {
//  $level=$row['position'];
//  }
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = "TRUE";
			$_SESSION['USERNAME'] = $member['username'];
			$_SESSION['username'] = $member['username'];
			$_SESSION['type'] = $member['type'];
			$_SESSION['notice_id'] = $member['notice_id'];
			$_SESSION['status'] != $member['burned'];
			session_write_close();
			//if ($level="admin"){
				$endTime = date('Y.m.d');
			mysql_query("UPDATE passanger_login SET date=now(), attempt=attempt+1, last_logindatetime=now() where username = '".$_SESSION['username']."' ");

			header("location: home.php");
			exit();
		}else {
			//Login failed
			$endTime = date('H:i:s');
			mysql_query("UPDATE falied SET attempt=attempt+1, time='$endTime'");
			?>
            <script>alert('invalid login credentials!');
            window.location.href = "login.php";</script>
			<?php 
			exit();
		}
	}else {
		die("Query failed");
	}
?>

