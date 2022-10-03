<?php 

    $addId = $_GET['addId'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "niwahana";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql2 = "DELETE FROM `advertisement` WHERE `ad id` = '$addId' ";
    $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));

    header('Location: adList.php');
    die();
