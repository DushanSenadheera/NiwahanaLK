<?php 
    session_start();
    session_destroy();
    unset($_SESSION['logUserId']);
    unset($_SESSION['logUserEmail']);
    unset($_SESSION['logUserLname']);
    unset($_SESSION['logUserFname']);
    header('location:index.php');
