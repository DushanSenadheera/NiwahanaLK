<?php 
    session_start();
    session_destroy();
    unset($_SESSION['logAdminId']);
    unset($_SESSION['logAdminUserName']);
    header('location:index.php');