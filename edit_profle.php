<!DOCTYPE html>
<html lang="en">

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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niwahana";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql2 = "SELECT * FROM registration WHERE `user id` =  '$logUserId' ";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($con));
$row2 = mysqli_fetch_assoc($result2);

if (isset($_POST['apply'])) {
  $newMobile = $_POST['mobile'];
  $sql3 = "UPDATE registration SET mobile = '$newMobile' WHERE `user id` =  '$logUserId' ";
  $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($con));
  $_SESSION['mobile_update'] = 'Mobile Number Update Successfully';
  header('Location: edit_profle.php');
  die();
}
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  </style>
  <link rel="stylesheet" href="edit_profile.css" />
  <title>Edit profile</title>
</head>

<body>
  <form class="edit-profile" action="edit_profle.php" method="POST">
    <h1 style="color: rgb(245, 245, 245)">Profile</h1>
    <p>
      <?php
      if (isset($_SESSION['mobile_update'])) {
        echo $_SESSION['mobile_update'];
        unset($_SESSION['mobile_update']);
      }
      ?>
    </p>
    <img src="userpro.png" alt="user" width="100" height="100" /><br /><br />

    First Name
    <input disabled placeholder="xxxxxx" name="fname" id="fname" value="<?php echo $row2['fName'] ?>">
    <br><br>
    Last Name
    <input disabled placeholder="xxxxxx" name="lname" id="lname" value="<?php echo $row2['lname'] ?>">
    <br><br>
    E-mail <br>
    <input disabled type="email" name="email" id="email" value="<?php echo $row2['email'] ?>">
    <br><br>
    Mobile
    <input type="tel" value="<?php echo $row2['mobile'] ?>" placeholder="mobile number" name="mobile" id="mobile">
    <br><br>


    <a href=""><input type="submit" class="button" value="Apply" name="apply"></a>
    &nbsp;&nbsp;
    <a href=""><input type="submit" class="button2" value="Delete Account"></a>
    <br>
    <a href="Change_password.html"><input type="submit" class="button3" value="Change Password"></a>
    <br>
    <a href="adList.php"><input type="button" class="button3" value="View Add List"></a>
  </form>
</body>

</html>