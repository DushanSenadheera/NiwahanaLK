<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="change_password.css" />
  <title>Change password</title>
</head>

<body>
  <div class="change-password">
    <h1 style="color: rgb(245, 245, 245)">Change Password</h1>
    <img src="userpro.png" alt="user" width="100" height="100" /><br /><br />

    <form action="" method="post" name="change-psw">
      Old Password
      <input type="password" placeholder="Enter old-password" name="opsw" id="opsw">

      <br><br>
      New Passwodrd
      <input type="password" placeholder="Enter new-password" name="npsw" id="npsw">
      <br><br>
      Re-enter Passwodrd
      <input type="password" placeholder="Re-enter password" name="repsw" id="repsw">
      <br><br>

      <input type="submit" class="button" value="Change Password" />
    </form>
  </div>
</body>

</html>