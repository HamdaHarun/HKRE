
<?php
session_start();
include "conn.php";
if(!$_SESSION['username']){
  echo '<script>window.location.href = "login.php";</script>';
  exit();
}
function check($data){
  $data= trim($data);
  $data= htmlspecialchars($data);
  $data= stripslashes($data);
  return $data;
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
           <i class="fas fa-fw fa-edit"></i>
           <span>Change Password</span>
         </a>

       </li>
       <hr class="sidebar-divider">

       <!-- Nav Item - Charts -->
       <li class="nav-item">
         <a class="nav-link" href="#">
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

                 $uname = @$_SESSION['username'];
                 $query = "SELECT * FROM tenant WHERE username = '$uname' ";
                 $result = mysqli_query($con, $query);
                 $row=mysqli_fetch_assoc($result);
                 do{
                   $name = $row['name'];
                   $id = $row['username'];
                   $full = $name;
                   echo $full;

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
           <h1 class="h3 mb-2 text-gray-800" align="center">TumaPesa Payment</h1>

           <div class="card shadow mb-4">
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                   <tbody>
                     <form action="make_payment.php" method = "POST">
					 <tr>
                       <td>
                         House No:
                       </td>
                       <td> <select class="custom-select" name="house_no" style="width:300px;" required>
                             <option value = "" disabled selected>Please choose...</option>
                           <?php
                    $query = "SELECT * FROM tenant WHERE username = '$uname' ";
                    $result1 = mysqli_query($con, $query);
                    $row=mysqli_fetch_assoc($result1);
                    do{
                      $id = $row['username'];
                      $row = mysqli_fetch_assoc($result1);
                    }while ($row);
					$uname = $_SESSION['username'];

                    $sql = "SELECT * FROM tbl_renting
					LEFT JOIN renting_details ON tbl_renting.renting_id=renting_details.renting_id
					LEFT JOIN tenant ON tbl_renting.username=tenant.username 
					LEFT JOIN payment ON tbl_renting.username=payment.username 
					LEFT JOIN houses ON renting_details.house_no=houses.house_no WHERE tenant.username = '$uname' ";
                   
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    do{
                      do {
                        $house_no = $row['house_no'];
						$rent_per_month = $row['rent_per_month'];
                        
						echo "<option value = '".$house_no."'>".$house_no."  (". $rent_per_month.")"."</option>";
                       
                        $row = mysqli_fetch_assoc($result);
                      } while ($row);
                      $row = mysqli_fetch_assoc($result);
                    }while ($row);
                     ?>
                           </select></td>
                     </tr>
                     <tr>
                       <td>
                         M-Pesa Transaction Number
                       </td>
                       <td><input type='text' class='form-control form-control-user' name='ref_no' maxlength="10" required></td>
                     </tr>
                     <tr>
                       <input type='hidden' class='form-control form-control-user' value="<?php echo  $id?>" name='username' value="255717812676" readonly>  
                    
                     <tr>
                       <td>
                         Amount:
                       </td>
                       <td><input type="number"  class='form-control form-control-user' name='amount' maxlength="10" required></td>
                     </tr>
                     <tr>
                       <td>
                         Payment From:
                       </td>
                       <td>
                         <select class="custom-select" name="pay_from" id="terms" style="width:300px;">
                         <option value = "January <?php echo date('Y'); ?>">January <?php echo date('Y'); ?></option>
                         <option value = "February <?php echo date('Y'); ?>">February <?php echo date('Y'); ?></option>
                         <option value = "March <?php echo date('Y'); ?>">March <?php echo date('Y'); ?></option>
                         <option value = "April <?php echo date('Y'); ?>">April <?php echo date('Y'); ?></option>
                         <option value = "May <?php echo date('Y'); ?>">May <?php echo date('Y'); ?></option>
                         <option value = "June <?php echo date('Y'); ?>">June <?php echo date('Y'); ?></option>
                         <option value = "July <?php echo date('Y'); ?>">July <?php echo date('Y'); ?></option>
                         <option value = "August <?php echo date('Y'); ?>">August <?php echo date('Y'); ?></option>
                         <option value = "September <?php echo date('Y'); ?>">September <?php echo date('Y'); ?></option>
                         <option value = "October <?php echo date('Y'); ?>">October <?php echo date('Y'); ?></option>
                         <option value = "November <?php echo date('Y'); ?>">November <?php echo date('Y'); ?></option>
                         <option value = "December <?php echo date('Y'); ?>">December <?php echo date('Y'); ?></option>
                         <option value = "January <?php echo date('Y')+1; ?>">January <?php echo date('Y')+1; ?></option>
                         <option value = "February <?php echo date('Y')+1; ?>">February <?php echo date('Y')+1; ?></option>
                         <option value = "March <?php echo date('Y')+1; ?>">March <?php echo date('Y')+1; ?></option>
                         <option value = "April <?php echo date('Y')+1; ?>">April <?php echo date('Y')+1; ?></option>
                         <option value = "May <?php echo date('Y')+1; ?>">May <?php echo date('Y')+1; ?></option>
                         <option value = "June <?php echo date('Y')+1; ?>">June <?php echo date('Y')+1; ?></option>
                         <option value = "July <?php echo date('Y')+1; ?>">July <?php echo date('Y')+1; ?></option>
                         <option value = "August <?php echo date('Y')+1; ?>">August <?php echo date('Y')+1; ?></option>
                         <option value = "September <?php echo date('Y')+1; ?>">September <?php echo date('Y')+1; ?></option>
                         <option value = "October <?php echo date('Y')+1; ?>">October <?php echo date('Y')+1; ?></option>
                         <option value = "November <?php echo date('Y')+1; ?>">November <?php echo date('Y')+1; ?></option>
                         <option value = "December <?php echo date('Y')+1; ?>">December <?php echo date('Y')+1; ?></option>
                         </select>
                       </td>
                     </tr>
                     <tr>
                       <td>
                         To:
                       </td>
                       <td>
                         <select class="custom-select" name="pay_to" id="terms" style="width:300px;">
                         <option value = "January <?php echo date('Y'); ?>">January <?php echo date('Y'); ?></option>
                         <option value = "February <?php echo date('Y'); ?>">February <?php echo date('Y'); ?></option>
                         <option value = "March <?php echo date('Y'); ?>">March <?php echo date('Y'); ?></option>
                         <option value = "April <?php echo date('Y'); ?>">April <?php echo date('Y'); ?></option>
                         <option value = "May <?php echo date('Y'); ?>">May <?php echo date('Y'); ?></option>
                         <option value = "June <?php echo date('Y'); ?>">June <?php echo date('Y'); ?></option>
                         <option value = "July <?php echo date('Y'); ?>">July <?php echo date('Y'); ?></option>
                         <option value = "August <?php echo date('Y'); ?>">August <?php echo date('Y'); ?></option>
                         <option value = "September <?php echo date('Y'); ?>">September <?php echo date('Y'); ?></option>
                         <option value = "October <?php echo date('Y'); ?>">October <?php echo date('Y'); ?></option>
                         <option value = "November <?php echo date('Y'); ?>">November <?php echo date('Y'); ?></option>
                         <option value = "December <?php echo date('Y'); ?>">December <?php echo date('Y'); ?></option>
                         <option value = "January <?php echo date('Y')+1; ?>">January <?php echo date('Y')+1; ?></option>
                         <option value = "February <?php echo date('Y')+1; ?>">February <?php echo date('Y')+1; ?></option>
                         <option value = "March <?php echo date('Y')+1; ?>">March <?php echo date('Y')+1; ?></option>
                         <option value = "April <?php echo date('Y')+1; ?>">April <?php echo date('Y')+1; ?></option>
                         <option value = "May <?php echo date('Y')+1; ?>">May <?php echo date('Y')+1; ?></option>
                         <option value = "June <?php echo date('Y')+1; ?>">June <?php echo date('Y')+1; ?></option>
                         <option value = "July <?php echo date('Y')+1; ?>">July <?php echo date('Y')+1; ?></option>
                         <option value = "August <?php echo date('Y')+1; ?>">August <?php echo date('Y')+1; ?></option>
                         <option value = "September <?php echo date('Y')+1; ?>">September <?php echo date('Y')+1; ?></option>
                         <option value = "October <?php echo date('Y')+1; ?>">October <?php echo date('Y')+1; ?></option>
                         <option value = "November <?php echo date('Y')+1; ?>">November <?php echo date('Y')+1; ?></option>
                         <option value = "December <?php echo date('Y')+1; ?>">December <?php echo date('Y')+1; ?></option>
                         </select>
                       </td>
                     </tr>
                     <tr>
                     <td></td>
                     <td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit' value='Pay'></td>
                     </form>
                     <tr>
                    </tbody>
                 </table>
               </div>
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
             <span>Copyright &copy; HK 2022</span>
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

   <script>
     if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
     }
   </script>

   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="js/sb-admin-2.min.js"></script>

 </body>

 </html>
