<?php
$conn=mysqli_connect("localhost:3307","root","alstn2840");
mysqli_select_db($conn,'opentutorials');
$sql="SELECT id FROM user WHERE name='".$_POST['author']."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if($result->num_rows==0){
  $sql = "INSERT INTO user (name, password) VALUES('".$_POST['author']."', '111111')";
  mysqli_query($conn, $sql);
  $sql="SELECT id FROM user WHERE name='".$_POST['author']."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
}
$sql="UPDATE topic SET author=".$row['id']." WHERE title="."'".$_POST['remake']."'";
mysqli_query($conn,$sql);

$sql="UPDATE topic SET description="."'".$_POST['description']."'"."WHERE title="."'".$_POST['remake']."'";
mysqli_query($conn,$sql);
$sql="UPDATE topic SET created=now() WHERE title="."'".$_POST['remake']."'";
mysqli_query($conn,$sql);
$sql="UPDATE topic SET title="."'".$_POST['title']."'"."WHERE title="."'".$_POST['remake']."'";
mysqli_query($conn,$sql);
header('Location: http://localhost:81/index.php');
 ?>
