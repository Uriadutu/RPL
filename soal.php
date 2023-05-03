<?php
include("header_lain.php");

    $koneksi=mysqli_connect("localhost","root","","latihan");
    if (isset($_POST['simpan'])) {
        $soal=mysqli_real_escape_string($koneksi, $_POST['id_soal']);
        $jawaban_1=mysqli_real_escape_string($koneksi, $_POST['j1']);
        $jawaban_2=mysqli_real_escape_string($koneksi, $_POST['j2']);
        $jawaban_3=mysqli_real_escape_string($koneksi, $_POST['j3']);
        $jawaban_benar=mysqli_real_escape_string($koneksi, $_POST['jb']);
        $simpan=mysqli_query($koneksi,"INSERT INTO soal_guru VALUES ('$soal', '$jawaban_1','$jawaban_2', '$jawaban_3', '$jawaban_benar')");  
    }
// membuat koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(in_array("guru", $_SESSION['admin_akses'])) { ?>
   
    <section>
        <form action="" method="post">
             <h4>Form Input Soal</h4>
        <table>
        <tr>
            <td>
                Soal
            </td>            
            <td>
                <input type="text" placeholder="Soal" name="id_soal" required>
            </td>
        </tr>
        <tr>
            <td>
                 jawaban 1
            </td>
            <td>
                <input type="text" placeholder="jawaban 1" name="j1" required>
            </td>
        </tr>
        <tr>
            <td>
                jawaban 2
            </td>
            <td>
                <input type="text" placeholder="jawaban 2" name="j2" required>
            </td>
        </tr>
        <tr>
            <td>
                jawaban 3
            </td>
            <td>
                <input type="text" placeholder="jawaban 3" name="j3" required>
            </td>
        </tr>
        <tr>
            <td>
                Jawaban Benar
            </td>
            <td>
                <input type="text" placeholder="jawaban benar" name="jb" required>
            </td>
        </tr>
        <tr>
            <td class="tombol">
                <input type="submit" name="simpan" value="Simpan Data">
            </td>
        </tr>
    </table>
    <br>
    <div class="tabel">
        <table border="1" cellpadding="10" callspacing="0">
        <tr class="tabel1">
            <td>NO</td>
            <td>Soal</td>
            <td>Jawaban 1</td>
            <td>Jawaban 2</td>
            <td>Jawaban 3</td>
            <td>Jawaban Benar</td>
            <td>#</td>
        </tr>
        <?php
        $no=1;
        // $kode = mysqli_query($koneksi,"DELETE FROM soal_guru WHERE id_soal");
        $soal_guru=mysqli_query($koneksi,"SELECT * FROM soal_guru ORDER BY id_soal ASC"); 
        while ($tampil_soal=mysqli_fetch_array($soal_guru)){
        ?> 
        <tr>
            <td><?= $no++; ?>.</td>
            <td><?= $tampil_soal['id_soal'] ?></td>
            <td><?= $tampil_soal['jawaban_1'] ?></td>
            <td><?= $tampil_soal['jawaban_2'] ?></td>
            <td><?= $tampil_soal['jawaban_3'] ?></td>
            <td><?= $tampil_soal['jawaban_benar'] ?></td>
            <td><button onclick="deleteRow">Hapus</button></td>
        </tr>
        <?php } ?>
        </table>
    </div>
    

    
    </form>
    </section>
    <?php if(in_array("guru ", $_SESSION['admin_akses'])) { ?>
           
        <?php } ?>
    <?php }?>
    <style>
        *{
            margin:0;
            padding:0;
            color :black;
            font-size :20px;
        }
        section {
        min-height: 100vh;
        padding: 10rem 9% 2rem;  
        }
        body {
            /* padding : 10rem 3%;
            background: #9A0000; */

        }
        .tombol input{
            margin-top:10px;
            background:#E1B20C;
            text-align:center;
            padding : 3px 8px;
            border-radius : 10px;
        }
        .tombol {
            border:none;
        }
        h4 {
            font-size: 35px;    
            color : white;
        }
        .tabel1 {
            
        }
        
        table {
            padding : 10px 10px;
            background :white;
            border:2px solid black;
            margin-top : 20px;
        }
        table tr {
            padding : 10px 10px;
        }
        table tr td {
            border:1px solid black;
            padding : 3px 6px;
            text-align:left;
        }
        .tabel1 {
            padding 3px 5px;   
        }
    </style>
    <?php if(in_array("batas", $_SESSION['admin_akses'])) { ?>
        <section>
            
            <?php 
include("isisoal.php");
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
<script>
    function deleteRow(id_soal) {
    // Buat objek XMLHttpRequest
    var xhr = new XMLHttpRequest();
    
    // Set callback function
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    
    // Kirim AJAX request ke PHP script
    xhr.open("POST", "delete_row.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id);
}
</script>