<?php
session_start();
include "conn.php";


function check($data){
  $data= trim($data);
  $data= htmlspecialchars($data);
  $data= stripslashes($data);
  $data = mysqli_real_escape_string($con, $data);
  return $data;
}


if(isset($_POST["login"])){
  $uname = $_POST['username'];
  $pword = md5($_POST['password']);
  //$rem = $_COOKIE['rememberme'];
  $sql1 = "SELECT * FROM user WHERE u_name = '$uname' AND pword = '$pword'";

  $query1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_assoc($query1);
  do {
    $role = $row1['role'];
    $row1 = mysqli_fetch_assoc($query1);
  } while ($row1);

  
  if (mysqli_num_rows($query1) == 1) {



    if($role == "Administrator"){
      $_SESSION['username'] = $uname;
      echo "<script type='text/javascript'>alert('Welcome $uname!');</script>";
      echo '<style>body{display:none;}</style>';
      echo '<script>window.location.href = "admin_home.php";</script>';

    }else {
			//Login failed
			$endTime = date('H:i:s');
			mysql_query("UPDATE falied SET attempt=attempt+1, time='$endTime'");
			?>
            <script>alert('invalid login credentials!');
            window.location.href = "login.php";</script>
			<?php 
  }
    if ($role == "Manager") {
      $_SESSION['username'] = $uname;
      echo "<script type='text/javascript'>alert('Welcome $uname!');</script>";
      echo '<style>body{display:none;}</style>';
      echo '<script>window.location.href = "manager_home.php";</script>';
    }
	else {
			//Login failed
			$endTime = date('H:i:s');
			mysql_query("UPDATE falied SET attempt=attempt+1, time='$endTime'");
			?>
            <script>alert('invalid login credentials!');
            window.location.href = "login.php";</script>
			<?php 
  }
	
  }
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

<body style="background-image: linear-gradient(#4e73df, white);">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="house.jpg" alt="Rental House" width="500" height="530" style="opacity:0.6;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b><b>HK REAL ESTATE RENTAL </b></b><br/><br/>ADMIN LOGIN</h1>
                  </div>
				  <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" value="<?php echo @$uname; ?>" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>

                    <input class="btn btn-primary btn-user btn-block" type="submit" name="login" value="Login">
                  </form>
                    <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
