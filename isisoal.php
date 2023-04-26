<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
$koneksi=mysqli_connect("localhost","root","","latihan");  

$sql = "SELECT * FROM soal_guru ORDER BY RAND() LIMIT 15";
$result = mysqli_query($koneksi, $sql);

// menampilkan halaman pertama dengan tombol untuk memulai kuis
echo "
<div class='tayo'>
    <div>
    <h1>Kamu akan menjawab soal matematika tingkat mudah</h1>
    <h1>Apakah Kamu Siap Untuk Menjawab ? <br> Waktu keseluruhan yang anda miliki untuk menjawab adalah 30 menit <br>Terdapat 15 soal</h1>
    </div>
    
</div>
<div class ='btn-mulai'>
    <button onclick='mulaiKuis()'>Mulai kuis</button>
</div>

"; 

// membuat halaman baru untuk setiap soal
$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $pilihan = [
        "a" => $row["jawaban_1"],
        "b" => $row["jawaban_2"],
        "c" => $row["jawaban_3"],
        "d" => $row["jawaban_benar"]
    ];
    echo "<script>var jawabanBenar = '" . $pilihan['d'] . "';</script>";
    echo "</div>
    
<div class='waktu'>

<h1 id='timer'></h1>
</div>"; 
    
    shuffle($pilihan);
    echo "<div id='soal" . $no . "' style='display:none'>";
    echo "<div class='timer'>
          <h2>Pertanyaan Ke " . $no . " Dari 15</h2>
          
          <h2>type soal</h2>
          </div>";
    echo 
    "<div class='pertanyaan'>
        <p>" . $row["id_soal"] . "</p>
        
    </div>
    ";
   
    foreach ($pilihan as $key => $value) {
    
        echo 
        "<div class='pilihan'>
        <label>
            <div class ='cek'>
                <input type='radio' name='jawaban" . $no . "' value='d' id='cek''>" . $value . "<br>
            </div>
            
        </label>
        
        </div>"; 
        

    }
    
    
    

    echo "<br>";
    echo "<button onclick='kirimJawaban(" . $no . ")'>Kirim jawaban</button>";
    
    echo "</div>";
    $no++;
}
echo "<h1 id='benar'></h1>";


// menutup koneksi
mysqli_close($koneksi);
?> 
<style>
  .waktu {
    display : flex;
    justify-content: center;
    margin : auto;
    color : white;
  }
   .waktu h1{
    color : white;
  }
  .timer h2{
    color : white;
  }
  .timer {
    color : white;
    display :flex;
    justify-content: space-between;

  }
  .pertanyaan {
    margin-top : 10px;    
  }
  .pertanyaan p{
    color :white;
    font-size : 30px;
    text-align : center;
    height : 100px;
    border : 1px solid red;
  }
  .tayo {
    display : flex;
    justify-content : center;
    text-align :center;
    margin-top : 50px;
  }
  .tayo h1{
    
    color :white;
  }
  .btn-mulai {
    
    display : flex;
    justify-content : center;
    margin-top : 30px;
  }
  .btn-mulai button{
    color :black;
    background : yellow;
    margin-top : 20px;
    padding : 4px 20px;
    border-radius : 10px;
  }
 .pilihan input[type="radio"] {
  /* appearance: none;
  border: yellow;
  display : none; */
  }
  .btn-mulai.efek3 {
    display : none;
  }
  .tayo.efek2{
    display : none;
  }
  .pilihan {
    padding : 2px 20%;
  }
  .pilihan label {
    background : #E1B20C;
    margin-top:20px;
    padding : 10px 0px;
    display : flex;
    justify-content : center;
    border-radius : 10px;
    /* width: 20%; */
  }
  .pilihan label input{
    
    background : red;
    padding : 10px 0px;
    width : 50px;
    
  }
  .pilihan input[type="radio"]:checked{
    color : yellow;
    background: yellow;

  }
</style>
<script>

// var benar = 0;
var soalSaatIni = 1;
var jumlahSoal = 5;
var jawaban = [];
function mulaiKuis() {
  // menampilkan halaman pertama
  const header1 = document.querySelector('.tayo');
  document.getElementById("soal1").style.display = "block";
  header1.classList.add("efek2"); 
  const mulai = document.querySelector('.btn-mulai');
  document.getElementById("soal1").style.display = "block";
  mulai.classList.add("efek3"); 
  var waktu = 130; // 30 menit dalam detik
    var timer = setInterval(function() {
    var menit = Math.floor(waktu / 60);
    var detik = waktu % 60;

    // menambahkan nol pada angka satuan detik yang kurang dari 10
    if (detik < 10) {
      detik = "0" + detik;
    }

    document.getElementById("timer").innerHTML ="Timer :"+ menit + ":" + detik;

    waktu--;

    // menghentikan timer jika waktu habis
    if (waktu < 0) {
      clearInterval(timer);
      alert("Waktu habis!");
      window.location.href = "soal.php";
    }

    // menghentikan timer jika kuis sudah selesai
    if (soalSaatIni > jumlahSoal) {
      clearInterval(timer);
    }
  }, 1000);
  
}
var benar = 0;
function kirimJawaban(no) {
  
  // menyimpan jawaban yang telah dipilih oleh user ke dalam array
  var selected = document.querySelector('input[name="jawaban' + no + '"]:checked');
  var jawabanBenar = "d";
  var jawab = document.querySelector('input[name="jawaban' + no + '"][value="d"]:checked');



if (selected) {
    jawaban[no - 1] = selected.value; 
    if (jawab) {
        benar++;
        alert("benar " +benar);
    } 
    // mengecek apakah jawaban yang dipilih sama dengan jawaban benar (dalam hal ini adalah 'd')  
        
}


else {
    alert("Silakan pilih jawaban terlebih dahulu!");
    return;
}

// beralih ke halaman berikutnya atau menampilkan hasil jika sudah di halaman terakhir
if (no < jumlahSoal) {
    document.getElementById("soal" + no).style.display = "none";
    soalSaatIni++;
    document.getElementById("soal" + soalSaatIni).style.display = "block";
} else {
    document.getElementById("benar").innerHTML = "Benar : " + benar;
    // menampilkan pesan atau tampilan baru saat soal terakhir telah dijawab
    document.getElementById("soal" + no).style.display = "none";
    document.getElementById("selesai").style.display = "block"; // ganti "selesai" dengan ID elemen tampilan baru yang ingin ditampilkan
}
}



</script>