<?php
$con = @mysqli_connect("localhost", "root", "", "samatar_towers");
if(!$con){
  echo "Connection failed!".@mysqli_error($con);
}
?>
