<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=, initial-scale=1.0" />
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
  <link rel="stylesheet" href="Login.css" />
  <title>Login</title>



  <script type="text/javascript">
    function validatelogin() {
      let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      let emailInput = document.getElementById(`emailText`).value;
      if (!emailInput.match(mailformat)) {
        alert("You have entered an invalid email address!");
        return false;
      }
    }
  </script>



</head>

<body>
  <div class="user-login">
    <h1>Login</h1>
    
      <?php
      if ($_SESSION) {
        echo $_SESSION['fail'];
        $_SESSION['fail'] = "";
      }
      ?>
  
    <br />
    <form action="login.php" method="post" name="loginform">
      <input type="text" placeholder="E-mail" name="email" /><br /><br />
      <input type="password" placeholder="Password" name="psw" id="psw"><br>
      <div class="Fpsw"><a href="#">Forgot password?</a><br /><br /></div>
      <input type="submit" class="button" value="Login" onclick="validatelogin()">
      <br>

      <p>Don't you have an account? <a href="Register.html">Register</a> from here</p>

    </form>
  </div>
</body>

</html>