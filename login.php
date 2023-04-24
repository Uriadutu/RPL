<?php
// kunci halaman login
 
session_start();
if (isset($_SESSION['admin_Username'])){
    header("location:hal1.php");
    
    // echo "kamu tidak punya akses disini";
    // header("location:hal2.php");
} 

include("koneksi.php");
$Username = "";
$Password = "";
$err = "";
if (isset($_POST['login'])) {
    $Username   = $_POST['Username'];
    $Password   = $_POST['Password'];
    if($Username == '' or $Password == ''){
        $err .= "<li>* Silakan Masukan Username Dan Pasword</li>";
    }
    if (empty($err)){
        $sql1 = "select * from admin where Username = '$Username'";
        $q1 = mysqli_query ($koneksi, $sql1);
        $r1 = mysqli_fetch_array ($q1);
        if ($r1['Password'] !=md5 ($Password)){
            $err = "<li>Akun tidak ditemukan</li>";
        }

    }
    if (empty($err)) { 
        $login_id = $r1['login_id'];
        $sql1 = "SELECT * FROM admin_akses WHERE login_id = '$login_id'";
        $q1 = mysqli_query($koneksi, $sql1);
        while ($r1 = mysqli_fetch_array($q1)){
            $akses[] = $r1['akses_id'];
        }
        if(empty($akses)){
            $err .= "<li>Kamu Tidak Mempunyai Akses Ke Halaman Admin</li>";

        }
    }
    if(empty($err)){
        $_SESSION['admin_Username'] = $Username;
        $_SESSION['admin_akses'] = $akses;
        header("location:hal1.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Logo_Sekolah" type="image/x-icon">
</head>
<body>
    <style>
        .header {
            padding: 2rem 5%;
        }
    </style>
    <header class="header">
        <img src="./logo_kuis.png" alt="">
    </header>
   <section class="awal">
        <div class="login">
            <div class="box" id="app">
                <div>
                    <div class="sekolah">>
                        <div>
                            <img class="sklh" src="./Logo_Sekolah" alt="">
                        </div>
                        <div class ="judul">
                            <h3>Sekolah Tridharma Manado</h3>
                            <p>Good Spiritual, Good Character, Good Academic</p>
                        </div>
                    </div>
                        <h1>Login</h1>
                    <?php
                    if($err){
                        echo "<ul>$err</ul>";
                    }
                    ?>
                </div>
                <div class="isi">
                    <form action="" method="post">
                    </br>
                        <input type="text" name="Username" id="user" value="<?php echo $Username ?>" class="input" placeholder="Username"/></br></br>
                        <input type="password" name="Password" id="pass" class="input" placeholder="Password"/></br>
                        <input type="submit" name="login" value="Masuk" class="input1"/>
                    </form>
                    <div class ="Garis">
                       <h2>Login dan mainkan QuizMe</h2> 
                    </div>

                </div>
            </div>
        </div>   
        
            <div class="judul1"> 
                <div class="judul1-2">
                    <h1>Halloo..!!!! Selamat datang di QuizMe</h1>
                    <p>QuizMe Merupakan Website Untuk Mengerjakan Soal-Soal Yang Diberikan Guru. 
                    Anda Juga Dapat Belajar Melalui Fitur-Fitur Yang Telah Tersediah Dalam Website ini. 
                </p>
                    <h3>Panduan Untuk Login Bagi Siswa</h3>
                    <p>- Masukan "murid" Sebagai Username</p>
                    <p>- Masukan "murid12345" Sebagai Password</p>
                    <br>
                    <h2>*Harap Diperhatikan Baik-Baik Agar Tidak Salah Saat Melakukan Login</h2>
                </div>
            </div>
           <style>
            .judul1-2 {
                width :500px;
            }
            .judul1 p {
                font-size : 15px;
                margin-top : 10px;
            }
            .judul1-2 h3, h2, h1 {
                padding-top :20px;
            }
            .judul1-2 h3{
                margin-top : 20px;
            }
            .judul1-2 h3,h1 {
                font-size :30px;
                border-bottom: 1px solid white;
            }
           </style>
        
   </section>

   
</body>
<!-- <script src="anim.js"></script> -->
</html>