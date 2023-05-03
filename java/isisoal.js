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
  var waktu = 130; // 30 menit dalam detik
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
    // mengecek apakah jawaban yang dipilih sama dengan jawaban benar (dalam hal ini adalah 'd')
  }
   else if (jawabanBenar == 0 && jawabanTerpilih == 1) {
        jawabanTerpilih = 0;
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
    document.getElementById("timer").style.display = "none";
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
  
  // warnah
    var parentDiv = sender.parentNode.parentNode.parentNode; // Mendapatkan div yang mengandung radio button
    var ubahDiv = parentDiv.querySelector('.ubah'); // Mendapatkan element dengan class "ubah" dari div tersebut
    if (sender.checked) {
      ubahDiv.style.backgroundColor = 'green'; // Mengubah warna background menjadi hijau jika radio button terpilih
    } else {
      ubahDiv.style.backgroundColor = "#E1B20C"; // Menghapus warna background jika radio button tidak terpilih
    }
}