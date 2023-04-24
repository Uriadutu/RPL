<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <style>
            .ket {
                display:flex;
                justify-content:space-between;
            }
            .box-soal {
                border:2px solid black;
                padding : 10px 20px;
                
                
                text-align : center;
                height :300px;
            }
            .box-soal h1 {
                /* width:100%; */
                font-size: 30px;
                color:white;
                /* text-align : center; */
            }
        </style>
        <?php
        $no=1;
        $soal_guru=mysqli_query($koneksi,"SELECT * FROM soal_guru ORDER BY soal ASC");
        while ($tampil_soal=mysqli_fetch_array($soal_guru)){
        ?>
         <script>
    let countdown = 10;

    // function untuk menghitung mundur
    function countDown() {
      if (countdown == 0) {
        document.getElementById("countdown").innerHTML = "Waktu telah habis!";
      } else {
        document.getElementById("countdown").innerHTML = countdown + " detik";
        countdown--;
        setTimeout(countDown, 1000);
      }
    }

    // memulai hitung mundur
    countDown();
  </script>
    <div class="ket">
        <h1>Pertanyaan Ke <td><?= $no++; ?></td> Dari 15</h1>
        <div class="waktu">
            <h1 id="countdown">Waktu 10</h1>
        </div>
        <h1>Tingkat Kesulitan</h1>
    </div>
    <div class="box-soal">
        <h1><?= $tampil_soal['id_soal'] ?></h1>
    </div>
    <div class="jawaban">
        <div class="jawab2-1">
            <a href=""><?= $tampil_soal['jawaban_1'] ?></a>
            <a href=""><?= $tampil_soal['jawaban_2'] ?></a>
        </div>
        <br>
        <div class="jawab2-1">
            <a href=""><?= $tampil_soal['jawaban_3'] ?></a>
            <a href=""><?= $tampil_soal['soal'] ?></a>
        </div>
    </div>
    <style>
        .jawaban {
            padding :20px 0;
        }
        .jawab2-1 {
            margin : auto;
            width : 100%;
            display:flex;
            justify-content:space-between;   
        }
        .jawab2-1 a {
            text-decoration : none;
            color : white;
            width : 500px;
            height: 90px;
            font-size : 26px;
            padding : 5px 10px;
            background : yellow;
            border-radius: 3px;
            text-align:center;
        }
    </style>
        <?php } ?>
    <Style>

    </Style>
</body>
</html>