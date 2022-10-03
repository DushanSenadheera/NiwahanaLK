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
    <style>
        .posted-ad {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  padding: 10px;
  background: white;
  border-radius: 6px;
}

.posted-ad img {
  width: 40%;
  height: 25%;
}

.house-img {
  display: flex;
}

.features {
  display: block;
  font-size: 14px;
  padding: 8px;
}

.features h4 {
  padding: 8px;
}

.features i {
  padding: 8px;
}

.features p {
  padding: 8px;
}

    </style>
</head>

<body>
    <div class="admin-home">
        <div class="menu">
            <ul>
                <li>
                    <h2>Admin Panel</h2>
                </li>
                <a href="reportAd.php">
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
                
                
                            $sql1 = "SELECT * FROM `report`";
                            $result1 = mysqli_query($conn, $sql1) or die($mysqli_error($conn));
                            while ($row1 = mysqli_fetch_array($result1)) {

                                $itemId = $row1['itemId'];

                                $sql2 = "SELECT * FROM `advertisement` WHERE `ad id` = '$itemId' ";
                                $result2 = mysqli_query($conn, $sql2) or die($mysqli_error($conn));
                                $row2 = mysqli_fetch_assoc($result2);

                                $title = $row2['title'];
                                $price = $row2['price'];
                                $img = $row2['image'];
                                $location = $row2['location'];
                                $bed = $row2['bedroom'];
                                $bath = $row2['bathroom'];
                                $area = $row2['area'];
                                $story = $row2['story'];
                                $des = $row2['description'];
                                $adId = $row2['ad id'];
                
                                $sql3 = "SELECT * FROM addimage WHERE `mainId` = '$adId' ";
                                $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                                $row3 = mysqli_fetch_assoc($result3);
                            ?>
                                <?php $adPreview = "ad-preview.php"; ?>
                                <br>
                                <div class="posted-ad">
                                    <h3><a href='javascript:void(0);' onclick="openSingleItemHandler('<?php echo $row2['ad id'] ?>')"><?php echo $title ?></a></h3>
                                    <div class="house-img">
                                        <img src="newUploadImage/<?php echo $row3['image'] ?>" alt="">
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

                                Reason <br>
                                <p><?php echo $row1['description'] ?></p>

                            <?php
                            }
                            ?>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        const openSingleItemHandler = (itemId) => {
            window.location.href = `ad-preview.php?itemId=${itemId}`;
        }
    </script>

</body>

</html>