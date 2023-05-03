const express = require('express');
const app = express();
const mysql = require("mysql");

app.use(express.urlencoded({ extended: true }));

// membuat koneksi ke basis data
const koneksi = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "latihan",
});

koneksi.connect((err) => {
  if (err) throw err;
  console.log("Terhubung ke basis data!");
});

// menangani permintaan POST dari pengguna
app.post("/simpan", (req, res) => {
  const soal = req.body.id_soal;
  const j1 = req.body.jawaban_1;
  const j2 = req.body.jawaban_2;
  const j3 = req.body.jawaban_3;
  const jb = req.body.jawaban_benar;

  // menyimpan data ke basis data
  const query = `INSERT INTO soal_guru (id_soal, jawaban_1, jawaban_2, jawaban_3, jawaban_benar) VALUES ('${soal}', '${j1}', '${j2}', '${j3}', '${jb}')`;
  koneksi.query(query, (err, result) => {
    if (err) throw err;
    console.log("Data berhasil disimpan!");
  });
});
