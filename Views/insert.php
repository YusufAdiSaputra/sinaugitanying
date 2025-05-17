<?php
// insert_data.php

// Koneksi ke database
$Connect = mysqli_connect('localhost','root','','ut_ujian');

// Mendapatkan data dari AJAX
$soal = $_POST['soal'];
$jawaban = $_POST['jawaban'];
$kategori_mapel = $_POST['kategori_mapel'];

// Query untuk insert data
$query = "INSERT INTO soal (soal, jawaban, kategori_mapel) VALUES ('$soal', '$jawaban', '$kategori_mapel')";
$result = mysqli_query($Connect, $query);

// Memeriksa hasil query
if ($result) {
    // Mendapatkan nomor urut terakhir yang di-generate oleh auto_increment
    // $last_id = mysqli_insert_id($Connect);
    // echo "Data berhasil disimpan. Nomor urut: " . $last_id;


} else {
    echo "Terjadi kesalahan: " . mysqli_error($Connect);
}

// Menutup koneksi
mysqli_close($Connect);
?>
