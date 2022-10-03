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

$title=$_REQUEST['title'];
$price=$_REQUEST['price'];
$location=$_REQUEST['location'];
$mobile=$_REQUEST['mobile'];
$bathroom=$_REQUEST['bathroom'];
$bedroom=$_REQUEST['bedroom'];
$area=$_REQUEST['area'];
$story=$_REQUEST['story'];
$description=$_REQUEST['description'];

$sql = "INSERT INTO advertisement (title, image, price, location, mobile, bathroom, bedroom, area, story, description, user)
VALUES ('$title', '', '$price', '$location', '$mobile', '$bathroom', '$bedroom', '$area', '$story', '$description', '$logUserId')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$mainId = mysqli_insert_id($conn);

for($i = 0; $i < count($_FILES['file']['name']);$i++){
  $f_maxsize = 41943040;
  $f_ext_allowed = array("stl", "STL", "jpeg", "png", "gif");

  $f_name_2 = str_replace(" ","_", htmlspecialchars($_FILES["file"]['name'][$i]));
  $f_size  =  $_FILES["file"]['size'][$i];
  $f_tmp   =  $_FILES["file"]['tmp_name'][$i];
  $f_error =  $_FILES["file"]['error'][$i];
  $f_ext = pathinfo($f_name_2, PATHINFO_EXTENSION);

  

  move_uploaded_file($f_tmp, "newUploadImage/" . $_FILES["file"]['name'][$i]);
  $imageName =  $_FILES["file"]['name'][$i];

  $sql1 = "INSERT INTO `addimage`(`mainId`, `image`) VALUES ('$mainId', '$imageName')";
  $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));

}

if($result && $result1) {
  header("Location: index.php");
  die();
}





$conn->close();
