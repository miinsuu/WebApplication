<?php
function db_init($dhost,$duser,$dpw,$dname){
  $conn=mysqli_connect($dhost,$duser,$dpw);
  mysqli_select_db($conn,$dname);
  return $conn;
}
 ?>
