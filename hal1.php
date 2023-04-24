<?php 
// session_start();
include("header.php");
if(!in_array('siswa', $_SESSION['admin_akses'])){
    echo "kamu tidak punya akses disini";
    include("footer.php");
    exit();
}

?>
 <section class="home" id="baranda">
        <div class="logo">
            <img class="logo_sekolah" src="./img/Logo_Sekolah" alt="">
            <div class="text-logo">
                <h1>Sekolah Tridharma Manado</h1>
                <h2>Good Spiritual, Good Character, Good Academic</h2>
            </div>
        </div>

        <div class="">
            <div class="tampilan">
                <div class="tampil">
                    <h1>Belajar 
                        mengembangkan kapasitas diri
                        dengan konsep baru</h1>
                    <?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>
                    <h2>Kami membantu Anda mempersiapkan diri untuk Asessmen Kompetensi Minimum</h2>
                    <?php } ?>
                    <?php if(in_array("guru", $_SESSION['admin_akses'])) { ?>
                    <h2>Buat soal untuk mempersiapkan murid menghadapi Asessmen Kompetensi Minimum</h2>
                    <?php } ?>
                    <?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>
                    <a class="btn" href="pilihan_soal.php">Mulai</a>
                    <?php } ?>
                    <?php if(in_array("guru", $_SESSION['admin_akses'])) { ?>
                        <a class="btn" href="pilihan_soal.php">Buat Soal</a>
                    <?php } ?>
                </div>
                <div>
                    <img src="./img/tampil.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>

    
    <!-- Fitur --> 
    <section class="fitur" id="fitur">
        <div class="fitur-judul">
            <h1>Fitur Belajar</h1> <br>
            <p>Rekomendasi belajar lebih lanjut untuk mempersiapkan dirimu menghadapi asessmen
            </p>
        </div>
        <div class="box-fitur">
            <div class="pembungkus">
                <div class="fitur-img">
                    <div>
                        <img src="./img/video.png" alt="">
                    </div>
                    <div class="judul-vt">
                        <h1>Video Pembelajaran</h1>
                        <p>Untuk mendapat pengetahuan lebih dalam, alangka baiknya untuk menonton video pembelajaran
                        </p>
                         <a href="#">Masuk</a>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="box-fitur">
            <div class="pembungkus">
                <div class="fitur-img">
                    <div>
                        <img src="./img/buku.png" alt="">
                    </div>
                    <div class="judul-vt">
                        <h1>Buku Online </h1>
                        <p>Untuk mendapat pengetahuan lebih dalam, alangka baiknya untuk Membaca Buku Pembelajaran Online
                        </p>
                         <a href="#">Masuk</a>
                    </div>
                </div>
               
            </div>
        </div>
        <style>
            .fitur-judul h1{
                font-size : 36px;
            }
            .fitur-judul p{
                font-size : 20px;
                border-left : 2px solid white ;
                margin-left : 6px;
                padding :0 10px;
            }
            
            .fitur-img {
                display : flex;
            }

            /* isi */
            .box-fitur {
                margin-top : 50px;
            }
            .judul-vt p {
                font-size : 15px;
            }
            .judul-vt h1 {
                font-size : 26px;
            }
            .judul-vt h1, p {
                margin-left : 30px;
            }
            .pembungkus {
                border : 2px solid white;  
                border-radius :5px; 
                padding: 20px 30px;
                width: 120vh;
            }
            .pembungkus a {
                text-decoration:none;
                color : white;
                font-size : 15px;
                background : #E1B20C;
                padding : 2px 6px;
                border-radius : 3px;
                float: right;
            }
        </style>
    </section>



    <!-- bantuan -->
    <section class="bantuan" id="bantuan">
    </section>
    <?php } ?>


    
    <!-- Tentang kami -->
    <div class="kami" id="tentangkami">
        <div class="info">
            <div class="quizme">
                <img src="logo_kuis.png" alt="">
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
            <div class="kontak">
                <h1>Kontak</h1>
                <input type="email" name="email" placeholder="Email"/></br></br>
                <input type="text" name="text" placeholder="Pesan"/></br> </br>
                <div class="kirim">
                    <a href="">Kirim</a>
                </div>
            </div>
        </div>
    </div>
<?php 
include("footer.php");
?>
<style>
    .kontak input {
        padding : 1px 4px;
        /* font-size :10px; */
    }
    .kontak h1, .alamat h1, .quizme img{
        margin-bottom :20px;
        /* text-align:center; */
    }
    .alamat1 img{
        width: 20px;
        aspect-ratio : 1/1;
    }
    .kirim a{
        background : #E1B20C;
        border-radius: 5px;
        padding : 5px 20px;
        text-align: center;
        text-decoration : none;
        color : white;
        font-size : 12px;
    }
    .kontak {
        display:inline-block;
    }
    
    .jdl {
        margin-top:20px;
    }
    .kami {
        border-top :1px solid black ;
        min-height: 30vh;
        padding: 2rem 9%;
    } 
    .info {
        display:flex;
        justify-content : space-between;
    }
    .quizme p {
        font-size:12px;
        width :300px;
    }
    .alamat1 {
        margin-top:10px;
        display:flex;
        align-items:center;
    }
    .alamat1 p {
        margin-left:12px;
        font-size : 12px;
    }
    /* bg */
    .kami {
        background : #830000; 
    }
</style>

<!-- Responsif -->

<style>

</style>
