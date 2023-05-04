<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizme</title>
</head>
<body>
    <?php
    include("header_lain.php");
    if(in_array("guru", $_SESSION['admin_akses'])) { ?>
    
    <section>
        <h1 class="judul">Form Buat Soal</h1>
        <form action="" method="post">
        <div class="kotak">
            <div class="kolom">
                <h1>Soal</h1>
                <input type="text" name="id_soal" placeholder="Ketik Disini">
            </div>
            <div class="kolom">
                <h1>Jawaban 1</h1>
                <input type="text" name="jawaban_1" placeholder="Ketik Disini">
            </div>
            <div class="kolom">
                <h1>Jawaban 2</h1>
                <input type="text" name="jawaban_2" placeholder="Ketik Disini">
            </div>
            <div class="kolom">
                <h1>Jawaban 3</h1>
                <input type="text" name="jawaban_3" placeholder="Ketik Disini">
            </div>
            <div class="kolom">
                <h1>Jawaban benar</h1>
                <input type="text" name="jawaban_benar" placeholder="Ketik Disini">
            </div>
            <input class="simpan" type="submit" name="simpan" value="simpan">

        </div>
</form>
    </section>
    <section>
       
                <?php
// include "header_lain.php";
include "conn.php";
  if (isset($_POST['simpan'])) {
        mysqli_query($koneksi, "insert into mtk_normal set
        id_soal = '$_POST[id_soal]',
        jawaban_1 ='$_POST[jawaban_1]',
        jawaban_2 ='$_POST[jawaban_2]',
        jawaban_3 ='$_POST[jawaban_3]',
        jawaban_benar ='$_POST[jawaban_benar]'");
        // echo"berhasil";
    }

// include "tamp_soal.php";
?>
<!-- <h1>Daftar Soal</h1> -->
<form action="" method="post">
    <table border="1">
        <tr>
            <th>NO</th>
            <th>SOAL</th>
            <th>Jawaban 1</th>
            <th>Jawaban 2</th>
            <th>Jawaban 3</th>
            <th>Jawaban Benar</th>
            <th>Edit</th>
        </tr>
        <?php
        include "conn.php";
        $no = 1;
        $data = mysqli_query($koneksi, "select * from mtk_normal ");
        while ($tampil = mysqli_fetch_array($data)){
            echo "
            <tr>
                <td>$no</td>
                <td>$tampil[id_soal]</td>
                <td>$tampil[jawaban_1]</td>
                <td>$tampil[jawaban_2]</td>
                <td>$tampil[jawaban_3]</td>
                <td>$tampil[jawaban_benar]</td>
                <td><a href='?kode=$tampil[id_soal]'>Hapus</a></td>
            </tr>";
            $no++;
            

        }

        ?>

    </table>
</form>
<?php } ?>
<?php
if(isset($_GET['kode'])){
    mysqli_query($koneksi, "delete from mtk_nornal where id_soal='$_GET[kode]'");
    echo "<meta http-equiv=refresh content=2;URL='inputsoal.php'>";
}

?>
                
    </div>

    </form>
</section>
<?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>
        <section>
            
            <?php 
include("mtk_normal.php");
?>
        </section>
        <style>
            .ket {
                display:flex;
                justify-content:space-between;
            }
        </style>
    <?php } ?>
</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap');
    * {
        color : white;
        font-family: 'Baloo 2', cursive;
    }
    .kotak {
        display : inline-block;
        background : #888;
        padding : 10px 3%;
        width : 70%;
        
    }
    .kolom h1 {
        width : 30%;
        /* border-bottom : 1px solid black; */
        color : black;
        font-size : 24px;
    }
    .kolom {
        margin-top : 20px;
        display : flex;
        align-items : center;
        
    }
    .kolom input {
        font-size : 23px;
        padding :0 10px;
        color : black;
        background: transparent;
        border : none;
        /* height : 23px; */
        transition : 0.5s;
        border-bottom : 2px solid black;
        width : 70%;
       
    }
    .kolom input:hover{
        border-bottom : 2px solid white;
    }
    .judul {
        font-size : 30px;
    }
    section {
    min-height: 100vh;
    padding: 10rem 9% 2rem;
    background : #9A0000;  
    }
    ::placeholder {
    color: #444;
    transition : 0.5s;
    font-size : 20px;
    }
    input:focus {
    outline: none;
    }
    input:hover::placeholder {
    color: white ;
    }
    .simpan {
        margin-top : 20px;
        color : white;
        background : #E1B20C;
        padding : 3px 30px;
        border : none;
        border-radius: 10px;
        transition : 0.5s;
        font-size : 20px;
    }
    .simpan:hover {
        color : #844;
        background : #2ff50C;
    }

</style>
<!-- style untuk tampil Soal -->
<style>
    
</style>