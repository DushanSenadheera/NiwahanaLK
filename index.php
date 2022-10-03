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
    <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>
    <div class="landing">
        <header>
            <nav>
                <i class="fas fa-home"></i>
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a class="nonActive" href="about.php">About Us</a></li>
                    <li><a class="nonActive" href="contact.php">Contact Us</a></li>
                </ul>
                <?php
                if ($logUserId == '') {
                ?>
                    <a href="LoginMain.php" class="nonActive">Sign In</a>
                    <button><a href="LoginMain.php">Post Your Ad</a></button>
                <?php
                } else {
                ?>
                    <a class="nonActive" href="edit_profle.php"><?php echo 'Welcome ' . $logUserFname  ?></a>
                    <a href="logout.php"><i class="fa fa-sign-out" style="font-size: 18px; padding:0; position:absolute; right: 12%;"></i></a>
                    <button><a href="ad.html">Post Your Ad</a></button>
                <?php
                }
                ?>


            </nav>
        </header>
        <h1>
            Find the <span>best home</span> <br>
            for your loved ones...
        </h1>
        <div class="search-box">
            <form action="search.php" method="POST" id="searchForm">
                <input type="search" placeholder="Search by city..." name="searchCity">
                <a href="javascript:{}" onclick="document.getElementById('searchForm').submit();"><i class="fas fa-search"></i></a>
            </form>
        </div>
        <div class="cards">
            <div class="card">
                Find your home with things you won't find anywhere else. Find the best home for your loved ones
            </div>
            <div class="card">
                Amazing opportunity to own a prime location properties for living. choose according to your likes
            </div>
            <div class="card">
                Great service for buyers and sellers through past years. No matter what path you take to sell your home, we can help you navigate a successful sale.
            </div>
        </div>
    </div>

    <?php

    $PriceMin = 0;
    $PriceMax = 0;
    $city = "";
    $area = "";
    $Bedroom = "";
    $Bathroom = "";
    $Story = "";

    if (isset($_POST['filter'])) {
        if ($_POST['PriceMin'] != "" && $_POST['PriceMax'] != "") {
            $PriceMin = $_POST['PriceMin'];
            $PriceMax = $_POST['PriceMax'];
            $priceSql = "AND `price` BETWEEN '" . $PriceMin . "' AND '" . $PriceMax . "' ";
        } else {
            $priceSql = '';
        }

        if ($_POST['city'] != "") {
            $city = $_POST['city'];
            $citySql = "AND `location` LIKE '" . $city . "'";
        } else {
            $citySql = '';
        }

        if ($_POST['area'] != "") {
            $area = $_POST['area'];
            $areaSql = "AND `area` = '" . $area . "'";
        } else {
            $areaSql = '';
        }

        if ($_POST['Bedroom'] != "") {
            $Bedroom = $_POST['Bedroom'];
            $beadroomSql = "AND `bedroom` = '" . $Bedroom . "'";
        } else {
            $beadroomSql = '';
        }

        if ($_POST['Bathroom'] != "") {
            $Bathroom = $_POST['Bathroom'];
            $BathroomSql = "AND `bathroom` = '" . $Bathroom . "'";
        } else {
            $BathroomSql = '';
        }

        if ($_POST['Story'] != "") {
            $Story = $_POST['Story'];
            $StorySql = "AND `story` = '" . $Story . "'";
        } else {
            $StorySql = '';
        }
        $sql1 = "SELECT * FROM `advertisement` WHERE `ad id` != '' $priceSql $citySql $areaSql $beadroomSql $BathroomSql $StorySql";
    } else {
        $sql1 = "SELECT * FROM `advertisement`";
    }

    ?>
    <div class="container">
        <div class="filter">
            <form action="index.php" method="POST">
                <h3>Sort By</h3>
               <table>
                   <tr>
                       <td><b>Price</b></td>
                   </tr>
                   <tr>
                       <td>Min</td>
                       <td><input type="number" name="PriceMin" placeholder="Min" min="0" ></td>
                   </tr>
                   <tr>
                       <td>Max</td>
                       <td><input type="number" name="PriceMax" placeholder="Max" min="0" ></td>
                   </tr>
                   <tr></tr>
                   <tr>
                       <td><b>Location</b></td>
                   </tr>
                   <tr>
                       <td>By City</td>
                       <td><input type="text" placeholder="City" name='city' value="<?php echo $city ?>"></td>
                   </tr>
                   <tr></tr>
                   <tr>
                       <td><b>Area</b></td>
                   </tr>
                   <tr>
                       <td>By Area</td>
                       <td><input type="number" name="area" placeholder="Area(Perch)" min="0" value="<?php echo $area ?>"></td>
                   </tr>
                   <tr></tr>
                   <tr>
                       <td><b>Features</b></td>
                   </tr>
                   <tr>
                       <td><i class="fas fa-bed"></i></td>
                       <td> <input type="number" name="Bedroom" placeholder="Bedrooms" min="0" value="<?php echo $Bedroom ?>"></td>
                   </tr>
                   <tr>
                       <td><i class="fas fa-bath"></i></td>
                       <td><input type="number" name="Bathroom" placeholder="Bathrooms" min="0" value="<?php echo $Bathroom ?>"></td>
                   </tr>
                   <tr>
                       <td><i class="fas fa-layer-group"></i></td>
                       <td><input type="number" name="Story" placeholder="Stories" min="0" value="<?php echo $Story ?>"></td>
                   </tr>
                   
               </table>
               <input class="btn-filter" type="submit" value="Filter" name="filter" id="filter">
            </form>
        </div>
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
        <div class="banner">
            <img src="images/banner.jpg">
        </div>
    </div>
    <div class="nextPrevious">
        <a href="#" class="previous">&laquo; Previous</a>
        <a href="#" class="next">Next &raquo;</a>
    </div>
    <div class="footer">
        <footer>
            <div class="row">
                <div class="col">
                    <img src="images/logo.png" class="logo">

                    <h2>Niwahana.lk</h2>
                    <p>Find Home For Your Loved Ones</p>
                </div>
                <div class="col">
                    <h3>Office <div class="underline"><span></span></div>
                    </h3>
                    <p>NSBM Gree University Town</p>
                    <p>Pitipana, Homagama,</p>
                    <p>Sri Lanka</p>
                    <p class="email-id">niwahana@gmail.com</p>
                    <h4>+94 xxxxxxxxx</h4>
                </div>
                <div class="col">
                    <h3>Links<div class="underline"><span></span></div>
                    </h3>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">Privacy policy</a></li>
                        <li><a href="">Terms & conditions</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3>Massege<div class="underline"><span></span></div>
                    </h3>
                    <form>
                        <i class="far fa-envelope"></i>
                        <input type="text" placeholder="  Enter your massege" required>
                        <button type="submit"><i class="fas fa-arrow-right"></i></button>
                    </form>

                    <div class="social-icons">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-whatsapp"></i>
                        <i class="fab fa-instagram"></i>

                    </div>
                </div>
            </div>
            <div class="cp">
                <hr>
                <p class="copyright">Niwahana.lk web project © 2022 - All Rights Reserved</p>
            </div>
        </footer>
    </div>
    <script>
        const openSingleItemHandler = (itemId) => {
            window.location.href = `ad-preview.php?itemId=${itemId}`;
        }
    </script>

</body>

</html>