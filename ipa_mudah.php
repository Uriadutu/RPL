<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizme</title>
</head>
<body>
  <script>
    // var benar = 0;
var soalSaatIni = 1;
var jumlahSoal = 5;
var jawaban = [];
function mulaiKuis() {
  // menampilkan halaman pertama
  const header1 = document.querySelector(".tayo");
  document.getElementById("soal1").style.display = "block";
  header1.classList.add("efek2");
  const mulai = document.querySelector(".btn-mulai");
  document.getElementById("soal1").style.display = "block";
  mulai.classList.add("efek3");
  var waktu = 6; // 30 menit dalam detik
  var timer = setInterval(function () {
    var menit = Math.floor(waktu / 60);
    var detik = waktu % 60;

    // menambahkan nol pada angka satuan detik yang kurang dari 10
    if (detik < 10) {
      detik = "0" + detik;
    }

    document.getElementById("timer").innerHTML =
      "Timer :" + menit + ":" + detik;

    waktu--;

    // menghentikan timer jika waktu habis
    if (waktu < 0) {
      clearInterval(timer);
      var popup = document.createElement("div2");
      popup.innerHTML = "Waktu Anda Telah Habis !";
      popup.style.position = "fixed";
      popup.style.top = "50%";
      popup.style.transition = "opacity 0.5s ease-in-out";
      popup.style.left = "50%";
      popup.style.transform = "translate(-50%, -50%)";
      popup.style.background = "rgba(200, 200, 200, .9)";
      popup.style.border = "1px solid black";
      popup.style.borderRadius = "10px";
      popup.style.padding = "20px";
      popup.style.color = "#443";
      popup.style.fontSize = "23px";

      document.body.appendChild(popup);
      setTimeout(function () {
        document.body.removeChild(popup);
        window.location.href = "i-ipa-mudah.php";
      }, 4000); // popup akan muncul selama 2 detik
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
  var selected = document.querySelector(
    'input[name="jawaban' + no + '"]:checked'
  );
  
//   var jawabanBenar = "d";
  var jawab = document.querySelector(
    'input[name="jawaban' + no + '"]:checked'
  );

  if (jawabanBenar==1) {
    jawaban[no - 1] = selected.value;
    if (jawab) {
        benar++;
         alert("benar" +benar);
        jawabanBenar = 0;
        jawabanTerpilih = 0;
    }
  }
   else if (jawabanBenar == 0 && jawabanTerpilih == 1) {
        jawabanTerpilih = 0;
   }
   var isPopupShown = false;

   if (!selected) {
     // mengecek apakah popup sudah ditampilkan sebelumnya
     if (!isPopupShown) {
       // menampilkan popup
       var popup = document.createElement("div");
       popup.innerHTML = "Silakan pilih jawaban terlebih dahulu!";
       popup.style.position = "fixed";
       popup.style.top = "50%";
       popup.style.left = "50%";
       popup.style.transform = "translate(-50%, -50%)";
       popup.style.background = "rgba(255, 255, 180, 0.9)";
       popup.style.border = "1px solid black";
       popup.style.color = "red";
       popup.style.borderRadius = "10px";
       popup.style.padding = "20px";
       popup.style.fontSize = "30px"; // menambahkan font size 18px
       document.body.appendChild(popup);
       isPopupShown = true;

       // menonaktifkan popup setelah beberapa saat
       setTimeout(function () {
         document.body.removeChild(popup);
         isPopupShown = false;
       }, 2000); // popup akan muncul selama 2 detik
     }

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
    document.getElementById("timer").style.display = "none";
    window.location.href = "akhir.php";
  }
}
let jawabanBenar = 0; // variabel untuk menyimpan jumlah jawaban yang benar
let jawabanTerpilih = 0;

function cekDivClass(sender) {
    jawabanTerpilih = 1;
  // Cek apakah elemen yang dipilih memiliki class "pilihan-benar"
  if (sender.classList.contains("benar")) {
    // Jika ya, tambahkan 1 ke variabel jawabanBenar
    jawabanBenar = 1;
    console.log(jawabanBenar);
  }
}
function skip(no) {
  // Menambahkan skor saat ini ke dalam variabel skor
  var skor = benar;

  // Menampilkan pesan atau tampilan baru yang ingin ditampilkan
  document.getElementById("benar").innerHTML = "Benar : " + skor; 
  document.getElementById("soal" + no).style.display = "none";
  document.getElementById("selesai").style.display = "block"; // ganti "selesai" dengan ID elemen tampilan baru yang ingin ditampilkan
  document.getElementById("timer").style.display = "none";
  window.location.href = "akhir.php";
}
  </script>

<?php 
$koneksi=mysqli_connect("localhost","root","","latihan");  

$sql = "SELECT * FROM ipa_mudah ORDER BY RAND() LIMIT 15";
$result = mysqli_query($koneksi, $sql);

// menampilkan halaman pertama dengan tombol untuk memulai kuis
echo "
<div class='tayo'>
    <div>
    <h1>Kamu akan menjawab soal Ilmu Pengetahuan Alam tingkat mudah</h1>
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
        "a" => [
            "opsi" => $row["jawaban_1"],
            "benar" => 0
                   ],
        "b" => [
            "opsi" => $row["jawaban_2"],
            "benar" => 0
                   ],
        "c" => [
            "opsi" => $row["jawaban_3"],
            "benar" => 0
                   ],
        "d" => [
            "opsi" => $row["jawaban_benar"],
            "benar" => 1
        ]
      ];
    // echo "<script>var jawabanBenar = '" . $pilihan['d'] . "';</script>";
    echo "</div>
    
<div class='waktu'>

<h1 id='timer'></h1>
</div>"; 
    
    shuffle($pilihan);
    echo "<div id='soal" . $no . "' style='display:none'>";
    echo "<div class='timer'>
          <h2>Pertanyaan Ke " . $no . " Dari 15</h2>
          
          <h2>Ipa Mudah</h2>
          </div>";
    echo 
    "<div class='pertanyaan'>
        <p>" . $row["id_soal"] . "</p>
        
    </div>
    ";
   
echo "<div class='pilihan-jajar'>";
foreach ($pilihan as $key => $value) {
    echo "<div class='pilihan'>";
    echo "<label class='ubah'>";
    echo "<div class='cek'>";
    
    
    if ($value['benar'] == 1) {
        echo "<input type='radio' name='jawaban" . $no . "' value='" . $key . "' id='cek' class='benar' onclick='cekDivClass(this)'>" . $value['opsi'] . "<br>";
    } else {
        echo "<input type='radio' name='jawaban" . $no . "' value='" . $key . "' id='cek' onclick='cekDivClass(this)'>" . $value['opsi'] . "<br>";
    };
    echo "</div>";
    echo "</label>";
    echo "</div>"; 
}
 echo "</div>";
    
    
    

    echo "<br>";
    echo "<div class='tombol'>";
    echo "<button onclick='kirimJawaban(" . $no . ")'>Kirim jawaban</button> <br>";
    echo "<button onclick='skip(" . $no . ")'>Skip</button>";
    echo "</div>";
    $no++;
}
echo "<div id='selesai'>";
echo "<h1 id='benar'></h1>";
echo "<div>";


// menutup koneksi
mysqli_close($koneksi);
?> 

<style>
  .selected {
  background-color: red;
  }
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
    /* min-width : 100vh; */
    margin-top : 50px;  
    /* padding : 0 40px;  */
    display : flex;
    justify-content : center;
  }
  .pertanyaan p{ 
    display : inline-block;
    color :white;
    width : 100vh;
    font-size : 30px;
    text-align : center;
    min-height : 100px;
    /* padding : 0 40px;  */
    border : 1px solid white;
    border-radius : 10px;
    background : rgba(255, 255, 255, 0.1);
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
  .pilihan-jajar {
    margin-top : 20px;
    display: flex;
    flex-wrap: wrap;
    /* margin : 0; */
  }
  .pilihan {
    
    width: 50%;
    box-sizing: border-box;
    /* padding: 10px; */
    padding : 2px 10%;
    text-align : left;
  }
   .ubah {
    background : #E1B20C; 
    transition : .5s;
     text-align : left;
   }
    .ubah:hover {
    background : rgba(230, 255, 25, 0.9); 
   }
   .cek {
    text-align : center;
   }
  .pilihan label {
    /* background : #E1B20C; */
    display : inline-block;
    margin-top:20px;
    padding : 10px 0px;
    display : flex;
    justify-content : center;
    border-radius : 10px;
    font-size : 20px;
   
    /* width: 20%; */
  }
  .pilihan label input{
    
    background : red;
    padding : 10px 4px;
    width : 50px;
   
    
  }
  .pilihan input[type="radio"]:checked{
    color : yellow;
    background: yellow;

  }
</style>


<!-- style untuk obsennya -->
<style>
  .a {
    background : black;
  }
  .tombol {
    display : flex;
    justify-content : space-between;
  }
  .tombol button{
    background : rgba(255, 255, 255, 0.1);;
    width : 200px;
    padding : 10px 0;
    color : white;
    margin-top : 30px;
    border : 1px solid white;
    border-radius : 10px;
    transition : 0.5s;

  }
  .tombol button:hover{
    background : rgba(11, 10, 25, 0.1);;
    width : 200px;
    padding : 10px 0;
    color : white;
    margin-top : 30px;
    border : 1px solid white;
    border-radius : 10px;
  }
</style>