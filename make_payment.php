 <?php
              include "conn.php";
			       if(isset($_POST["submit"])){
                     $username = $_POST['username'];
                     $ref_no = $_POST["ref_no"];
					 $house_no = $_POST["house_no"];
					 $amount = $_POST["amount"];
                     $pay_from =  $_POST['pay_from'];
					 $pay_to =  $_POST['pay_to'];
					 $sql = "SELECT ref_no FROM payment where ref_no='".$ref_no."'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  //user already exists
  echo "<script type='text/javascript'>alert('Transaction code already used!');</script>";
   echo '<style>body{display:none;}</style>';
                     echo '<script>window.location.href = "pay.php";</script>';
}
else{
                     $sql= "INSERT INTO payment(username,house_no,ref_no,amount,pay_from,pay_to,date) VALUES ('$username','$house_no','$ref_no','$amount','$pay_from','$pay_to',Now())";
					 
					

                     mysqli_query($con, $sql);
                     echo "<script type='text/javascript'>alert('Payment was successfull.');</script>";
                     echo '<style>body{display:none;}</style>';
                     echo '<script>window.location.href = "pay.php";</script>';

}
				   }
                    ?>
					
                    
                    