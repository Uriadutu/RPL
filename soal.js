var soalSaatIni = 1;
var jumlahSoal = 15;
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

function kirimJawaban(no) {
  // menyimpan jawaban yang telah dipilih oleh user ke dalam array
  var selected = document.querySelector(
    'input[name="jawaban' + no + '"]:checked'
  );
  if (selected) {
    jawaban[no - 1] = selected.value;
  } else {
    alert("Silakan pilih jawaban terlebih dahulu!");
    return;
  }

  // beralih ke halaman berikutnya atau menampilkan hasil jika sudah di halaman terakhir
  if (no < jumlahSoal) {
    document.getElementById("soal" + no).style.display = "none";
    soalSaatIni++;
    document.getElementById("soal" + soalSaatIni).style.display = "block";
  } else {
    window.location.href =
      "proses-jawaban.php?jawaban=" +
      encodeURIComponent(JSON.stringify(jawaban));
  }
}

function hitungJawabanBenar() {
  var jumlahBenar = 0;
  var jawabanBenar = ["soal"];
  for (var i = 0; i < jawaban.length; i++) {
    if (jawaban[i] == jawabanBenar[i]) {
      jumlahBenar++;
    }
  }
  return jumlahBenar;
}
