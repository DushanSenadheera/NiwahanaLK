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
                <a href="reportAd.php">
                    <li>Report Ad</li>
                </a>
                <a href="bannerMng.php">
                    <li>Banner Management</li>
                </a>
                <a href="adminLogout.php">
                    <li>Log Out</li>
                </a>
            </ul>
        </div>
        <div class="display">
            <div class="bannerMng">
                <form action="">
                    Name <input type="text" name="" id="">
                    <br>
                    Description <br>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <br>
                    Image <input type="file" name="" id="">
                    <br>

                    <button type="submit"><a href="">Upload</a></button>
                    <button type="submit"><a href="">Edit</a></button>
                    <button type="submit"><a href="">Delete</a></button>
                </form>
            </div>
        </div>

       


</body>

</html>