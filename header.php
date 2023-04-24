<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_Username'])){
    header("location:login.php");
    // header("location:hal2.php");
}
//print_r($_SESSION['admin_akses']);
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMe</title>
    <link rel="stylesheet" href="header.css">
    <link rel="shortcut icon" href="./img/logo_apk.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/86ba7a9c2c.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div id="app">
    <!-- <header class="header"> -->
            <nav>
                <input type="checkbox" id="check">
                <label for="check" class="btn3">
                <i class="fas fa-bars"></i>
                <!-- <img src="logo_kuis.png" alt=""> -->
                </label>
                <label class="logo">
                    <img src="./img/logo_kuis.png" alt="">
                </label>
                <ul>
                    <li><a href="#baranda" class="aktif">BERANDA</a></li>
                    <?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>
                    <li><a href="#fitur">FITUR</a></li>
                    <li><a href="#bantuan">BANTUAN</a></li>
                    <?php } ?>
                    <li><a href="#tentangkami">TENTANG KAMI</a></li>
                    <li><a class="btn1" href="logout.php" id="logout">Logout</a></li>
                </ul>
                <!-- <a href="#baranda" class="aktif">BARANDA</a>
               
                <a href="#fitur">FITUR</a>
                <a href="#bantuan">BANTUAN</a>
                
                <a href="#tentangkami">TENTANG KAMI</a>
                <a class="btn1" href="logout.php" id="logout">Logout</a>   -->
            </nav>
    </div>
    
    <script src="anim.js"></script>
    <!-- </header> -->