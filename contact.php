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
    <link rel="stylesheet" href="contactStyle.css">
    <title>Document</title>
</head>

<body>
    <div class="cover">
        <header>
            <nav>
                <i class="fas fa-home"></i>
                <ul>
                    <li><a class="nonActive" href="index.php">Home</a></li>
                    <li><a class="nonActive" href="about.php">About Us</a></li>
                    <li><a class="active" href="contact.php">Contact Us</a></li>
                </ul>
                <?php
                if ($logUserId == '') {
                ?>
                    <a href="LoginMain.php">Sign In</a>
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
    </div>
    <div class="about">
        <div class="title">
            <h2>Contact Us</h2>
        </div>
        <div class="content">
            <ul>
                <li>+94xxxxxxxxx</li>
                <li>Selling your home
                    sellerinfo@niwahana.com
                    Seller</li>
                <li>Employee verification
                    verificationemployee@niwahana.com</li>
            </ul>
        </div>
    </div>
</body>

</html>