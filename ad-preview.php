<?php
$itemId = $_GET['itemId'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niwahana";

$conn = new mysqli($servername, $username, $password, $dbname);
?>

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
    <link rel="stylesheet" href="ad-previewstyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Home</title>
    <style>

footer {
  width: 100%;
  position: relative;
  bottom: 0;
  background: #000;
  color: #ee9b00;
  padding: 16px;
  border-top-left-radius: 125px;
  font-size: 16px;
}

.row {
  width: 85%;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
  justify-content: space-between;
}

.col {
  flex-basis: 25%;
  padding: 10px;
}

.col:nth-child(2),
.col:nth-child(3) {
  flex-basis: 15%;
}

.logo {
  width: 150px;
  margin-bottom: 30px;
}

.col h3 {
  width: fit-content;
  margin-bottom: 40px;
  position: relative;
}

.email-id {
  width: fit-content;
  border-bottom: solid #ee9b00;
  margin: 20px 0;
}

.col ul li {
  list-style: none;
  margin-bottom: 12px;
}

.col ul li a {
  text-decoration: none;
  color: #ee9b00;
}

.col form {
  padding-bottom: 15px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid #ee9b00;
  margin-bottom: 50px;
}

.col form.far {
  font-size: 18px;
  margin-right: 10px;
}

.col form input {
  width: 100%;
  background: transparent;
  color: #ee9b00;
  border: 0;
  outline: none;
}

.col form button {
  background: transparent;
  border: 0;
  outline: none;
  cursor: pointer;
}

.col form button .fas {
  font-size: 16px;
  color: #ee9b00;
}

.social-icons .fab {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  text-align: center;
  line-height: 40px;
  font-size: 20px;
  color: #000;
  background: #ee9b00;
  margin-right: 15px;
  cursor: pointer;
}

.cp hr p {
  width: 90%;
  border: 0;
  border-bottom: 1px soild #ccc;
  margin: 20px auto;
}

.copyright {
  text-align: center;
}

.underline {
  width: 100%;
  height: 5px;
  background: #ee9b00;
  border-radius: 3px;
  position: absolute;
  top: 25px;
  left: 0;
  overflow: hidden;
}

.underline span {
  width: 15px;
  height: 100%;
  background: #fdff7a;
  border-radius: 3px;
  position: absolute;
  top: 0;
  left: 10px;
  animation: moving 2s linear infinite;
}

@keyframes moving {
  0% {
    left: -5px;
  }
  100% {
    left: 100px;
  }
}

@media (max-width: 700px) {
  footer {
    bottom: unset;
  }
  .col {
    flex-basis: 100%;
  }

  .col:nth-child(2),
  .col:nth-child(3) {
    flex-basis: 100%;
  }
}
        
        nav {
            display: flex;
        }

        nav ul {
            flex: 1;
        }

        nav ul li {
            display: inline-block;
            list-style: none;
            padding: 14px;
            font-size: 18px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
        }

        nav a {
            text-decoration: none;
            padding: 14px;
            font-size: 18px;
            color: white;
        }

        nav button {
            border-style: none;
            margin: 8px;
            border-radius: 6px;
            font-size: 18px;
            background-color: #ee9b00;
        }

        nav button a {
            color: white;
            text-align: justify;
        }

        nav i {
            padding: 14px;
            font-size: 30px;
            color: #ee9b00;
        }
    </style>
</head>

<body>
    <div class="landing">
        <header>
            <nav>
                <i class="fas fa-home"></i>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
                <?php
                if ($logUserId == '') {
                ?>
                    <a href="LoginMain.php">Sign In</a>
                    <button><a href="LoginMain.php">Post Your Ad</a></button>
                <?php
                } else {
                ?>
                    <a href="edit_profile.php"><?php echo 'Welcome ' . $logUserFname  ?></a>
                    <a href="logout.php"><i class="fa fa-sign-out" style="font-size: 22px; padding:0;"></i></a>
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
            <form action="">
                <input type="text" placeholder="Search by City or District">
                <a href=""><i class="fas fa-search"></i></a>
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
    <div class="container">

        <?php

        $sql1 = "SELECT * FROM advertisement WHERE `ad id` = '$itemId' ";
        $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        $row1 = mysqli_fetch_assoc($result1);



        ?>

        <div class="ads">
            <div class="posted-ad">
                <h3><?php echo $row1['title'] ?></h3>

                <div class="house-img">
                    <div class="w3-content" style="max-width:1200px">
                        <?php
                        $sql2 = "SELECT * FROM addimage WHERE `mainId` = '$itemId' ";
                        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                        $i = 1;
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                            if ($i == 2) {
                                $displayStatus = 'block';
                            } else {
                                $displayStatus = 'none';
                            }


                        ?>

                            <img class="mySlides" src="newUploadImage/<?php echo $row2['image'] ?>" style="width:100%;display:<?php echo $displayStatus ?>">


                        <?php
                            $i++;
                        }
                        ?>


                        <div class="w3-row-padding w3-section">
                            <?php

                            $sql2 = "SELECT * FROM addimage WHERE `mainId` = '$itemId' ";
                            $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                            $i = 1;
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>

                                <div class="w3-col s4">
                                    <img class="demo w3-opacity w3-hover-opacity-off" src="newUploadImage/<?php echo $row2['image'] ?>" style="width:100%;cursor:pointer" onclick="currentDiv('<?php echo $i ?>')">
                                </div>


                            <?php
                                $i++;
                            }
                            ?>

                        </div>
                    </div>
                    <?php 
                        if ($logUserId == '') {
                    ?>
                        <button><a href="LoginMain.php">Report Ad</a></button>
                    <?php
                        } else {
                    ?>
                        <button class="report-btn" onclick="reportAddhandler('<?php echo $itemId  ?>')">Report Ad</button>
                    <?php
                        }
                    ?>

                    <script>
                        const reportAddhandler = (itemId) => {
                            window.location.href = `reportDescription.php?itemId=${itemId}`;
                        }
                    </script>
                    
                    <div class="features">
                        <h4>LKR <?php echo $row1['price'] ?></h4>
                        <i class="fas fa-map-marker-alt"></i> <?php echo $row1['location'] ?>
                        <br>
                        <i class="fas fa-bed"></i> <?php echo $row1['bedroom'] ?>
                        <i class="fas fa-bath"></i> <?php echo $row1['bathroom'] ?>
                        <i class="fas fa-vector-square"></i> <?php echo $row1['area'] ?> Sqft
                        <i class="fas fa-layer-group"></i> <?php echo $row1['story'] ?> story
                        <i class="fas fa-phone-alt"></i> <?php echo $row1['mobile'] ?>
                        <p> <?php echo $row1['description'] ?> </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="banner">
            <img src="images/banner.jpg">
        </div>
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
        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " w3-opacity-off";
        }
    </script>



</body>

</html>