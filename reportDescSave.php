<?php 

    session_start();
    $logUserId = $_SESSION['logUserId'];
    $logUserEmail = $_SESSION['logUserEmail'];
    $logUserLname = $_SESSION['logUserLname'];
    $logUserFname = $_SESSION['logUserFname'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "niwahana";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $createToday = new DateTime('now', new DateTimeZone('Asia/Colombo'));
    $date= $createToday->format('Y-m-d');
    $time= $createToday->format('H:i:s');
    $datetime= $createToday->format('Y-m-d H:i:s');

    $reportDescription = $_POST['reportDescription'];
    $itemId = $_POST['itemId'];

    $sql1 = "INSERT INTO `report`(`description`, `itemId`,`user`, `date`, `time`) VALUES ('$reportDescription', '$itemId','$logUserId', '$date', '$time')";
    $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn)); 

    header("Location: ad-preview.php?itemId=".$itemId);
    die();

?>