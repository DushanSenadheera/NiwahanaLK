<?php

    session_start();

    $logUserId = "";
    $logUserEmail = "";
    $logUserLname = "";
    $logUserFname = "";

    if($_SESSION) {
        $logUserId = $_SESSION['logUserId'];
        $logUserEmail = $_SESSION['logUserEmail'];
        $logUserLname = $_SESSION['logUserLname'];
        $logUserFname = $_SESSION['logUserFname'];
    }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niwahana";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$addId=$_REQUEST['addId'];
$title=$_REQUEST['title'];
$price=$_REQUEST['price'];
$location=$_REQUEST['location'];
$mobile=$_REQUEST['mobile'];
$bathroom=$_REQUEST['bathroom'];
$bedroom=$_REQUEST['bedroom'];
$area=$_REQUEST['area'];
$story=$_REQUEST['story'];
$description=$_REQUEST['description'];

$sql = "UPDATE `advertisement` SET `title`='$title',`image`='',`price`='$price',`location`='$location',`mobile`='$mobile',`bathroom`='$bathroom',`bedroom`='$bedroom',`area`='$area',`story`='$story',`description`='$description',`user`='$logUserId' WHERE `ad id`='$addId'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$mainId = $addId;


if($result) {
  header("Location: adList.php");
  die();
}





$conn->close();
