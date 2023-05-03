<?php
// session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_Username'])){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/footer.css">
</head>
<body>
    <div class="kami" id="">
        <div class="info">
            <div class="quizme">
                <img src="quiz.png" alt="">
                <p>QuizMe Merupakan Website Untuk Mengerjakan Soal-Soal Yang Diberikan Guru. 
                    Anda Juga Dapat Belajar Melalui Fitur-Fitur Yang Telah Tersediah Dalam Website ini.
                </p>
            </div>
            <div class="alamat">
                <h1>Alamat</h1>
                <div class="alamat1">
                    <div>
                        <img src="./img/locate.png" alt="">
                    </div>
                    <div>
                        <p>Dela Salle</p>
                    </div>
                </div>
                <div class="alamat1">
                    <div>
                        <img src="./img/telepon.png" alt="">                        
                    </div>
                    <div>
                        <p>08111111111</p>
                    </div>
                </div>
                <div class="alamat1">
                    <div>
                        <img src="./img/gmail.png" alt="">
                    </div>
                    <div>
                        <p>www.email@gmail.com</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="footer">
        <p>©2023 <span>Tridharma Manado</span></p>
    </div>
    
    <style>
        .footer p {
            font-size : 15px;
        }
        span {
            font-weight: bold;
        }
    </style>
</body>
</html>