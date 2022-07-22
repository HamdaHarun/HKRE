 <?php
              include "conn.php";
			  if(isset($_POST["submit"]))
			  {
                  $username = $_POST['username'];
                   $message = $_POST["message"];
				    $sent_by= $_POST["sent_by"];
					 
                    $sql= "INSERT INTO messaging(username,message,sent_by,date) VALUES ('$username','$message','$sent_by',Now())";
				
                     mysqli_query($con, $sql);
                     echo "<script type='text/javascript'>alert('Message Sent was successfull.');</script>";
                     echo '<style>body{display:none;}</style>';
                     echo '<script>window.location.href = "send-sms.php";</script>';

}
				   
                    ?>
					
                    
                    