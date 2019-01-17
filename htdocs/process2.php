<?php
  $conn=mysqli_connect("localhost:3307","root","alstn2840");
  mysqli_select_db($conn,'opentutorials');

  $sql="SELECT author FROM topic WHERE title='".$_POST['del']."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);

  $sql="SELECT id FROM topic WHERE author=".$row['author'];
  $result=mysqli_query($conn,$sql);

  if($result->num_rows==1){
    $sql="DELETE FROM user WHERE id=".$row['author'];
    mysqli_query($conn,$sql);
  }

  $sql="DELETE FROM topic WHERE title='".$_POST['del']."'";
  mysqli_query($conn,$sql);
  header('Location: http://localhost:81/index.php');
 ?>
