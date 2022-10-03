<?php
session_start();

$logUserId = "";
$logUserEmail = "";
$logUserLname = "";
$logUserFname = "";

if ($_SESSION) {
    $logUserId = $_SESSION['logUserId'];
    $logUserEmail = $_SESSION['logUserEmail'];
    $logUserLname = $_SESSION['logUserLname'];
    $logUserFname = $_SESSION['logUserFname'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <link rel="stylesheet" href="adListStyle.css">
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "niwahana";

    $conn = new mysqli($servername, $username, $password, $dbname);


    $sql1 = "SELECT * FROM `advertisement` WHERE user = '$logUserId' ";
    $result1 = mysqli_query($conn, $sql1) or die($mysqli_error($conn));
    while ($row1 = mysqli_fetch_array($result1)) {
        $title = $row1['title'];
        $price = $row1['price'];
        $img = $row1['image'];
        $location = $row1['location'];
        $bed = $row1['bedroom'];
        $bath = $row1['bathroom'];
        $area = $row1['area'];
        $story = $row1['story'];
        $des = $row1['description'];
        $itemId = $row1['ad id'];

        $sql2 = "SELECT * FROM addimage WHERE `mainId` = '$itemId' ";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        $row2 = mysqli_fetch_assoc($result2);
    ?>
        <div class="posted-ad">
            <h3><a href='javascript:void(0);' onclick="openSingleItemHandler('<?php echo $row1['ad id'] ?>')"><?php echo $title ?></a></h3>
            <div class="house-img">
                <img src="newUploadImage/<?php echo $row2['image'] ?>" alt="">
                <div class="features">
                    <?php echo "<h4>LKR $price</h4>"; ?>
                    <i class="fas fa-map-marker-alt"></i> <?php echo $location ?>
                    <br>
                    <i class="fas fa-bed"></i> <?php echo $bed ?>
                    <i class="fas fa-bath"></i> <?php echo $bath ?>
                    <i class="fas fa-vector-square"></i> <?php echo $area ?>
                    <i class="fas fa-layer-group"></i> <?php echo $story ?>
                    <p><?php echo $des ?></p>
                </div>
            </div>
            <button  class="edit" type="button" id="delBtn" name="editBtn" onclick="editAddHanler('<?php echo $row1['ad id'] ?>')">Edit Ad</button>
            <button  class="del" type="button" id="delBtn" name="delBtn" onclick="deleteAddHanler('<?php echo $row1['ad id'] ?>')">Delete Ad</button>
        </div>

    <?php
    }
    ?>
</body>

<script>
    const editAddHanler = (addId) => {
        window.location.href = `addEdit.php?addId=${addId}`;
    }

    const deleteAddHanler = (addId) => {
        window.location.href = `deleteAdd.php?addId=${addId}`;
    }
</script>

</html>