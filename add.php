 <?php
              include "conn.php";
			       if(isset($_POST["submit"])){
                     $house_no = $_POST['house_no'];
                     $house_floor = $_POST["house_floor"];
					 $house_desc = $_POST["house_desc"];
                     $rent_per_month =  $_POST['rent_per_month'];
                     $status =  "Empty";
                     $sql= "INSERT INTO houses(house_no,house_floor,house_desc,rent_per_month,status) VALUES ('$house_no','$house_floor','$house_desc','$rent_per_month','$status')";
                     mysqli_query($con, $sql);
                     echo "<script type='text/javascript'>alert('The house has been added successfully.');</script>";
                     echo '<style>body{display:none;}</style>';
                     echo '<script>window.location.href = "house_detail.php";</script>';

                 }
                    ?>
					
                    
                    