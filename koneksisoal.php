<?php
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