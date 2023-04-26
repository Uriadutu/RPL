var soalSaatIni = 1;
var jumlahSoal = 15;
var jawaban = [];

function mulaiKuis() {
  // menampilkan halaman pertama
  document.getElementById("soal1").style.display = "block";
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
    // melakukan penghitungan jumlah jawaban yang benar dan menampilkan halaman hasil kuis
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          window.location.href =
            "hasil-kuis.php?jumlah_benar=" + xhr.responseText;
        } else {
          console.log("Error: " + xhr.status);
        }
      }
    };
    xhr.open("POST", "proses-jawaban.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("jawaban=" + encodeURIComponent(JSON.stringify(jawaban)));
  }
}
