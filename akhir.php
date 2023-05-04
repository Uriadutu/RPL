<?php
session_start();

// Memuat nilai skor dari sesi sebelumnya
$benar = isset($_SESSION['benar']) ? $_SESSION['benar'] : 0;

// Menampilkan skor akhir pada halaman akhir
echo "Skor akhir Anda adalah: " . $benar;
?>