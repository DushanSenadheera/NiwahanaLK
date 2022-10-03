<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niwahana";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$mail=$_REQUEST['email'];
$password=$_REQUEST['password'];



$sql1 = "SELECT * FROM `admin` WHERE userName LIKE '$mail' ";
$result1 = mysqli_query($conn,$sql1) or die(mysqli_error($con));
$rowcount = mysqli_num_rows($result1);

if($rowcount > 0) {

  $sql2 = "SELECT * FROM `admin` WHERE `userName` LIKE '$mail' AND `password`LIKE'$password' ";
  $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($con));
  $rowcount2 = mysqli_num_rows($result2);

  if($rowcount2 > 0) {
    $row2 = mysqli_fetch_assoc($result2);
    $_SESSION['logAdminId'] = $row2['id'];
    $_SESSION['logAdminUserName'] = $row2['userName'];
    header("Location: admin.php");
    die();
  } else {
    $_SESSION['fail'] = 'Password Wrong';
    header("Location: adminLogin.php");
    die();
  }

} else if($rowcount == 0) {
  $_SESSION['fail'] = 'Email Wrong';
  header("Location: adminLogin.php");
  die();
}



$conn->close();
