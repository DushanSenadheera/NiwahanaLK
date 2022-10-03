<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Ad</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .report-sub-btn{
            color: white;
            background-color: #ee9b00;
            border: none;
            outline: none;
            padding: 4px;
            border-radius: 4px;
        }

        .image{
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(images/background.jpg);
            width: 100%;
            height: 100vh;
        }

        .report{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }

        form textarea{
            resize: none;
        }

        form input{
            padding: 4px;
        }


    </style>
</head>

<?php 
    $itemId = $_GET['itemId'];
?>
<body>
    <div class="image">
        <div class="report">
            <form action="reportDescSave.php" method="post">
                <input type="hidden" name="itemId" id="itemId" value="<?php echo $itemId ?>">
                <textarea name="reportDescription" cols="80" rows="20" placeholder="Report Description"></textarea>
                <br>
                <input class="report-sub-btn" type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>