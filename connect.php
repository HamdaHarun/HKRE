<?php
$conn = @mysqli_connect("localhost", "root", "", "samatar_towers");
if(!$conn){
  echo "Connection failed!".@mysqli_error($conn);
}
?>
