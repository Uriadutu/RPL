<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <script src="./java/isisoal.js"></script>

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
          
          <h2>type soal</h2>
          </div>";
    echo 
    "<div class='pertanyaan'>
        <p>" . $row["id_soal"] . "</p>
        
    </div>
    ";
   

foreach ($pilihan as $key => $value) {
    echo "<div class='pilihan'>";
    echo "<label class='ubah'>";
    echo "<div class='cek'>";
    if ($value['benar'] == 1) {
        echo "<input type='radio' name='jawaban" . $no . "' value='" . $key . "' id='cek' class='benar' onclick='cekDivClass(this)'>" . $value['opsi'] . "<br>";
    } else {
        echo "<input type='radio' name='jawaban" . $no . "' value='" . $key . "' id='cek' onclick='cekDivClass(this)'>" . $value['opsi'] . "<br>";
    }
    echo "</div>";
    echo "</label>";
    echo "</div>"; 
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
   .ubah {
    background : #E1B20C;
   }
  .pilihan label {
    /* background : #E1B20C; */
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
