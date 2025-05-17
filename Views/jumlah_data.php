<?php
// get_jumlah_data.php

// Koneksi ke database
$Connect = mysqli_connect('localhost','root','','ut_ujian');

// Mendapatkan kategori_mapel dari request GET
$kategori_mapel = $_GET['kategori_mapel'];

// Query untuk menghitung jumlah data dengan kategori_mapel tertentu
$query = "SELECT COUNT(*) AS jumlah_data FROM soal WHERE kategori_mapel = '$kategori_mapel'";
$result = mysqli_query($Connect, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['jumlah_data']; // Mengembalikan jumlah data
} else {
    echo "0"; // Mengembalikan 0 jika terjadi kesalahan
}

// Menutup koneksi
mysqli_close($Connect);
?>
