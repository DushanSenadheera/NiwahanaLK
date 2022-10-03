<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <link rel="stylesheet" href="adminStyle.css">
    <title>Document</title>
</head>

<body>
    <div class="admin-home">
        <div class="menu">
            <ul>
                <li>
                    <h2>Admin Panel</h2>
                </li>
                <a href="reportAd2.php">
                    <li>Report Ad</li>
                </a>
                <a href="bannerMng.php">
                    <li>Banner Management</li>
                </a>
                <a href="">
                    <li>Log Out</li>
                </a>
            </ul>
        </div>
        <div class="display">
            <div class="report">
                <div class="reportedAd">
                    <div class="reportAddetails">

                        <div class="ads">

                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "niwahana";
                
                            $conn = new mysqli($servername, $username, $password, $dbname);
                
                
                
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
                                <?php $adPreview = "ad-preview.php"; ?>
                                <br>
                                <div class="posted-ad">
                                    <h3><a href='javascript:void(0);' onclick="openSingleItemHandler('<?php echo $row1['ad id'] ?>')"><?php echo $title ?></a></h3>
                                    <div class="house-img">
                                        <img src="newUploadImage/<?php echo $row2['image'] ?>" alt="">
                                        <div class="features">
                                            <?php echo "<h4> LKR $price</h4>"; ?>
                                            <i class="fas fa-map-marker-alt"></i> <?php echo $location ?>
                                            <br>
                                            <i class="fas fa-bed"></i> <?php echo $bed ?>
                                            <i class="fas fa-bath"></i> <?php echo $bath ?>
                                            <i class="fas fa-vector-square"></i> <?php echo $area ?>
                                            <i class="fas fa-layer-group"></i> <?php echo $story ?>
                                            <p><?php echo $des ?></p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                    Reason <br>
                    <p>ldaidw wdwijdad</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>