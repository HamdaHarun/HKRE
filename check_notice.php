 <?php
              include "conn.php";
			       if(isset($_POST["submit"])){
                     $username = $_POST['username'];
                     
					 $message =  $_POST['message'];
					 $sent_by =  $_POST['sent_by'];
					 $sql = "SELECT ID FROM messaging where ID='5000000'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  //user already exists
  echo "<script type='text/javascript'>alert('Already used!');</script>";
   echo '<style>body{display:none;}</style>';
                     echo '<script>window.location.href = "pay.php";</script>';
}
else{
                     $sql= "INSERT INTO messaging(username,message,sent_by,date) VALUES ('$username','$message','$sent_by',Now())";
					 
					

                     mysqli_query($con, $sql);
                     echo "<script type='text/javascript'>alert('Message was successfull.');</script>";
                     echo '<style>body{display:none;}</style>';
                     echo '<script>window.location.href = "send_notice.php";</script>';

}
				   }
                    ?>
					
                    
                    