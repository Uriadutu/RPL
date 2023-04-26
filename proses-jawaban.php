<?php 
include ("koneksisoal.php");
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
    <h1 id="jawab"></h1>
	<?php 
		if (isset($_GET['jawaban'])) {
		    // mengambil jawaban dari URL parameter dan menyimpannya ke dalam array
		    $jawaban = json_decode($_GET['jawaban']);

		    // menghitung jumlah jawaban yang benar
		    $koneksi = mysqli_connect("localhost", "root", "", "latihan");
		    $sql = "SELECT * FROM soal_guru ORDER BY RAND() LIMIT 15";
		    $result = mysqli_query($koneksi, $sql);
		    $jumlahBenar = 0;
		    $no = 0;
		    while ($row = mysqli_fetch_assoc($result)) {
		        $jawabanBenar = $row["soal"];
		        if ($jawaban[$no] == $jawabanBenar) {
		            $jumlahBenar++;
		        }
		        $no++;
		    }
		    mysqli_close($koneksi);

		    echo "<h1>Hasil kuis</h1>";
			echo "<p>Jumlah jawaban benar: " . $jumlahBenar . "</p>";
			echo "<p>Jumlah jawaban salah: " . (15 - $jumlahBenar) . "</p>";
		}
       
	?>
    
    <script>

    </script>
</body>
</html>


