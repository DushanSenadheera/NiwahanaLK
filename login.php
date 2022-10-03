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
$password=$_REQUEST['psw'];



$sql1 = "SELECT * FROM registration WHERE email LIKE '$mail' ";
$result1 = mysqli_query($conn,$sql1) or die(mysqli_error($con));
$rowcount = mysqli_num_rows($result1);

if($rowcount > 0) {

  $sql2 = "SELECT * FROM registration WHERE `email` LIKE '$mail' AND `password`LIKE'$password' ";
  $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($con));
  $rowcount2 = mysqli_num_rows($result2);

  if($rowcount2 > 0) {
    $row2 = mysqli_fetch_assoc($result2);
    $_SESSION['logUserId'] = $row2['user id'];
    $_SESSION['logUserEmail'] = $row2['email'];
    $_SESSION['logUserLname'] = $row2['lname'];
    $_SESSION['logUserFname'] = $row2['fName'];
    header("Location: index.php");
    die();
  } else {
    $_SESSION['fail'] = 'Password Wrong';
    header("Location: LoginMain.php");
    die();
  }

} else if($rowcount == 0) {
  $_SESSION['fail'] = 'Email Wrong';
  header("Location: LoginMain.php");
  die();
}



$conn->close();
