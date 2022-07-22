<?php
session_start();
include "conn.php";
if(!$_SESSION['username']){
  echo '<script>window.location.href = "login.php";</script>';
  exit();
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HK Real Estate Rental Management System</title>
  <link rel="icon" href="rent.ico">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">

        <div class="sidebar-brand-text mx-3">HK REAL ESTATE RENTAL</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user fa-cog"></i>
          <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Details:</h6>
            <a class="collapse-item" href="u_personal.php">Personal Information</a>
            <a class="collapse-item" href="upay.php">Payment Information</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">




      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="u_change.php">
          <i class="fas fa-fw fa-exchange-alt"></i>
          <span>Change Password</span>
        </a>

      </li>

      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="incoming-messages.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Messages</span>
        </a>

      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="form_in.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tenant-In form</span>
        </a>

      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="pay.php">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Pay Here</span></a>
      </li>

      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php

                $uname = $_SESSION['username'];

                $query = "SELECT * FROM tenant WHERE username = '$uname' ";
                $result = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($result);
                do{
                  $name = $row['name'];
                  echo $row['name'];
                  $row = mysqli_fetch_assoc($result);
                }while ($row);

                ?></span>
                <img class="img-profile rounded-circle" src="user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800" align="center">Welcome!!</h1>
          <div class="span12">		
 
		<form method="post" action="booking_save.php">
<div class="span3">

               <?php include('dbcon.php');  $user_query=mysql_query("select * from tenant where username = '" . $_SESSION['username'] . "' ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['username'];  ?><?php }?>
											<div class="control-group">
				
				<div class="controls">
             
				<?php $result =  mysql_query("select * from tenant where username = '" . $_SESSION['username'] . "' ")or die(mysql_error()); 
				while ($row=mysql_fetch_array($result))
				      { ?>
               <input type="hidden" name="username" class="chzn-select" value="<?php echo $row['username']; ?>" placeholder="<?php echo $row['name']; ?>"> 
               <input type="hidden"   name="username" placeholder="<?php echo $row['name']; ?>" disabled>
				<?php } ?>
				</div>
			</div>
				<div class="control-group"> 
					
					<div class="controls">
					<input type="hidden"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="due_date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" value="<?php
$d=strtotime("10:30pm April 15 2014");
echo date("Y-m-d h:i:sa", $d);
?>" required/>
					</div>
				</div><br>
                
				<div class="control-group"> 
					<div class="controls">
                       <?php
					   
					   if(isset($_POST['submit'])){
	        	if(empty($_POST['books']) || !isset($_POST['books'])){
			   die('Hostel required');
		      }
		
		    $books_id = $_POST['books'];
		
		   $query = "UPDATE book SET Occupied_book = 1 WHERE id = $books_id";
		  $res = mysql_query($query);
		
		if($res){
			if(mysql_affected_rows() > 0){
				$query = "UPDATE tenant SET checkout = 1 WHERE username = '" . $_SESSION['username'] . "'";
				
				$res = mysql_query($query);
				
				if(mysql_affected_rows()){
					echo $msg = '<script type="text/javascript">
								alert ("You Have Succesfully Booked");
							</script>' ;;
				}
			}
		}
		else{
			die(mysql_error());
		}
	}
	
					     $query = "SELECT * FROM tenant WHERE username ='" . $_SESSION['username']."'";
	                 $res = mysql_query($query);
	                   if($res){
	                 	while($r = mysql_fetch_array($res)){
		              	$status = $r['checkout'];
	                  	}
	                     }
	                 else{
		            die(mysql_error());
	              }
                ?>
							
                                <button type="submit" name = "submit" <?php echo $status == 1 ? 'disabled' : '';?> class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Rent Now</button>
					</div>
				</div>
				</div><br>
				<div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" style="float:left" width="60%" cellspacing="0">
                  <thead>
                                    <tr>
                       
                                                                        
                                        <th>house_no</th>                                 
                                    
										<th>house_floor</th>
										<th>house_desc</th>
                                        <th>rent_per_month</th>
                                        <th>status</th> 
										<th>Select</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php  $user_query=mysql_query("select * from houses WHERE Occupied_room!='1' ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['house_no'];  
									?>
									<tr class="del<?php echo $id ?>">
									
									                              
                                    
                                    <td><?php echo $row['house_no']; ?></td>
									
                                    <td><?php echo $row['house_floor']; ?> </td> 
									 <td><?php echo $row['house_desc']; ?></td>
                                      <td><?php echo $row['rent_per_month']; ?></td>
                                      <td><?php echo $row['status']; ?></td> 
									
                                    <td width="20">
												<input id="uniform_on" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>" >
												
                                    </td>
									
                                    </tr>
									<?php  }  ?>
                                </tbody>
                            </table>
							
			    </form>
			</div>		
			</div>		


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; HK 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
