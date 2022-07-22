

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
                    <h1 class="h4 text-gray-900 mb-4"><b><b>HK REAL ESTATE RENTAL </b></b><br/><br/>TENANT LOGIN</h1>
                  </div>
				  <?php
							include('dbconn.php');
							$result = $db->prepare("SELECT * FROM falied");
							$result->execute();
							for($i=0; $row = $result->fetch(); $i++){
							$gcvgvc=$row['attempt'];
							$tttt=$row['time'];
							}
							$kjkjk=date('H:i:s');
								$time1 = strtotime($kjkjk);
								$time2 = strtotime($tttt);
								$diff = $time1 - $time2;
								if($diff>59){
									$mm=0;
									$sql = "UPDATE falied 
                    SET attempt=?";
                    $q = $db->prepare($sql);
                    $q->execute(array($mm));
								}
							if($gcvgvc<=2){
							?>
                  <form class="user" action="Login_user.php" method = "POST">
                    <div class="form-group">
                      <input type="text" required='required' class="form-control form-control-user" name="username" aria-describedby="emailHelp" value="<?php echo @$uname; ?>" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" required='required' class="form-control form-control-user" name="password" placeholder="Password">
                    </div>

                    <input class="btn btn-primary btn-user btn-block" type="submit" name="login" value="Login">
                  </form>
				  <?php
							}
							if($gcvgvc>=3){
							echo '<span style="color: #F00; font-weight: bold; padding-left: 40px;width: 420px;display: inline-block;">You Have Reach The Maximum Login Attempts, Pls. Try after 30mins, <a href="login.php">Refresh</a> the page to try again.<span>';
							}
							?>
                    <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
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
