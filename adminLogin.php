

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminLoginStyle.css">
    <script src="https://kit.fontawesome.com/56016c02ef.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dongle&family=Poppins&display=swap');
    </style>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="login">
            <h2>Log In</h2>
            <form action="adminLog.php" method="post" name="login">
                <ul>
                    <li>
                        <i class="fas fa-user"></i>
                        <input type="email" placeholder="E-Mail" name="email">
                    </li>
                    <li>
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </li>
                    <li>
                        <input type="submit" value="Login" class="login-btn">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</body>

</html>