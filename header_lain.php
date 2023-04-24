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
                <h1>Good Spiritual, Good Character, Good Academic</h1>
                <ul>
                    <li><a href="hal1.php" class="aktif">Menu awal</a></li>
                     <?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>
                    <li><a href="">Akhiri Kuis</a></li>
                    <?php }?>
                </ul>
                <!-- <a href="#baranda" class="aktif">BARANDA</a>
               
                <a href="#fitur">FITUR</a>
                <a href="#bantuan">BANTUAN</a>
                
                <a href="#tentangkami">TENTANG KAMI</a>
                <a class="btn1" href="logout.php" id="logout">Logout</a>   -->
            </nav>
    </div>
    
</body>
</html>