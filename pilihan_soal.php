<?php 
// session_start();
include("header.php");
if(!in_array('siswa', $_SESSION['admin_akses'])){
    echo "kamu tidak punya akses disini";
    include("footer.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header class="header">
        <img src="./logo_kuis.png" alt="">
    </header>
    <section>
        <div class="atas">
            <div class="judul_kiri">
                <h1>Pilih Mata Pelajaran</h1>
                 <?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>
                <p>Silahkan pilih mata pelajaran 
                yang ingin anda menjawab 
                pertanyaan-pertanyaannya</p>
                <?php }?>
                <?php if(in_array("guru", $_SESSION['admin_akses'])) { ?>
                    <p>Silahkan pilih mata pelajaran 
                        yang ingin anda membuat 
                        pertanyaan-pertanyaannya</p>
                <?php }?>
            </div>
            <div class="logo">
            
            <div class="text-logo">
                <h1>Sekolah Tridharma Manado</h1>
                <h2>Good Spiritual, Good Character, Good Academic</h2>
            </div>
            <img class="logo_sekolah" src="./img/Logo_Sekolah" alt="">
        </div>
        </div>
        <style>
            .isi_pilih_soal{
                display : flex;
                justify-content: space-between;
                align-items:center;
                padding-right : 6%;
                
            }
            .jenis_soal {
                border:2px solid black;
                border-radius:10px;
                padding : 10px 30px;
                margin-top :30px;
                width:500px;
                background:white;
            }
            .jenis_soal h1 {
                font-size : 26px;
                color:black;
            }
            .jenis_soal p {
                font-size : 20px;
                color:black;
            }
            .tingkat_soal {
                display : flex;
                justify-content: space-between;
                align-items:center;
            }
            .mudah a, .normal a, .sulit a {
                background :#E1B20C;
                border:1px solid black;
                border-radius : 5px;
                padding : 2px 30px;
                color:black;
                font-size : 20px;
            }
            .mudah, .normal, .sulit{
                margin-top :30px;
            }
        </style>
        <div class="isi_pilih_soal">
            <img src="./img/tampil.png" alt="">
            <div class="soal">
                <div class="jenis_soal">
                    <h1>MATEMATIKA</h1>
                    <p>Pilih tingkat kesulitan</p>
                    <div class="tingkat_soal">
                        <div class="mudah">
                            <a href="soal.php">Mudah</a>
                        </div>
                        <div class="normal">
                            <a href="#">Normal</a>
                        </div>
                        <div class="sulit">
                            <a href="#">sulit</a>
                        </div>
                    </div>
                </div>
                <div class="jenis_soal">
                    <h1>Ilmu Pengetahuan Alam</h1>
                    <p>Pilih tingkat kesulitan</p>
                    <div class="tingkat_soal">
                        <div class="mudah">
                            <a href="#">Mudah</a>
                        </div>
                        <div class="normal">
                            <a href="#">Normal</a>
                        </div>
                        <div class="sulit">
                            <a href="#">sulit</a>
                        </div>
                    </div>
                </div>
                <div class="tombolsoal">
                    <a href="hal1.php">Kembali</a>
                    <?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>
                    <a href="">Leaderboard</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <style>
        /* tombol soal  */
        .tombolsoal{
            display:flex;
            justify-content:space-between;
            align-items:center;
            text-align:center;
            
            
            float:right;
            margin-top: 30px;
            width: 240px;
        }
        .tombolsoal a {
            background: #E1B20C;
            border-radius: 5px;
            padding:5px 10px;
            text-decoration : none;
            color: black;
            font-size: 20px;
        }

        section {
            min-height : 100vh;
            padding :10rem 2% 2px;
        }
        .atas {
            display: flex;
            justify-content:space-between;
            align-items:center;
        }
        .logo {
            /* margin-top:0; */
            text-align : right;
        }
        .judul_kiri h1 {
            font-size :36px;
        }
        .judul_kiri p {
            width :70%;
            font-size :20px;
            border-left : 2px solid white;
            padding: 0 5px; 
        }
        .header{
            padding:2rem 5%;
        }
    </style>
</body>
</html>