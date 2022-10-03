<?php

$addId = $_GET['addId'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niwahana";

$conn = new mysqli($servername, $username, $password, $dbname);

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
    <link rel="stylesheet" href="adStyle.css">
    <title>Document</title>
</head>

<body>
    <div class="background">
        <div class="post-ad">
            <form action="adEdit.php" method="post" enctype="multipart/form-data">

                <?php
                $sql1 = "SELECT * FROM `advertisement` WHERE `ad id` = '$addId' ";
                $result1 = mysqli_query($conn, $sql1) or die($mysqli_error($conn));
                $row1 = mysqli_fetch_assoc($result1);
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
                <table>
                    <tr>
                        <input type="hidden" value="<?php echo $addId ?>" name="addId">
                        <td>Title<input type="text" value="<?php echo $title ?>" placeholder="Advertisement Title" name="title" style="width: 80%;"></td>
                    </tr>
                    <tr>
                        <td>Price<input type="text" value="<?php echo $price ?>" placeholder="Property Price" name="price"></td>
                    </tr>
                    <tr>
                        <td>City<input type="text" value="<?php echo $location ?>" placeholder="Property Location" name="location"></td>
                    </tr>
                    <tr>
                        <td>Mobile<input type="tel" value="<?php echo $row1['mobile'] ?>" placeholder="Mobile number" name="mobile"></td>
                    </tr>
                    <tr>
                        <td>Bathrooms<input type="number" value="<?php echo $bath ?>" name="bathroom" min="0" placeholder="No. of Bathrooms"></i></td>
                        <td>Bedrooms<input type="number" value="<?php echo $bed ?>" name="bedroom" min="0" placeholder="No. of Bedrooms"></i></td>
                    </tr>
                    <tr>
                        <td>Area(Perch)<input type="number" value="<?php echo $area ?>" name="area" min="0" placeholder="Area of the Property"></i></td>
                        <td>Stories<input type="number" value="<?php echo $story ?>" name="story" min="0" placeholder="No. of stories"></i></td>
                    </tr>
                    <tr>
                        <td>Description<textarea name="description" cols="60" rows="15" placeholder="Property Description"><?php echo $des ?></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox"> I Agree to the Terms & Conditions</td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Update Ad" style="background-color: #ee9b00; color: white; padding: 4px 8px;"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>