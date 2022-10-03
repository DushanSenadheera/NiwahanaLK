<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niwahana";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$fName=$_REQUEST['fname'];
$lName=$_REQUEST['lname'];
$mail=$_REQUEST['emailText'];
$mobile=$_REQUEST['mobile'];
$password=$_REQUEST['psw'];

$sql = "INSERT INTO registration (fName, lname, email, mobile, password)
VALUES ('$fName', '$lName', '$mail', '$mobile', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location: LoginMain.php");
  die();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
