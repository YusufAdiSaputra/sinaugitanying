<?php
session_start();
include "../Assets/Layouts/Koneksi.php";



if (isset($_POST['Insert'])) {
    $Id_Makul = $_POST['Kategori_Matkul'];
    $Soal     = $_POST['Soal'];
    $Jawaban  = $_POST['Jawaban'];

    // Pastikan $Koneksi sudah diinisialisasi sebelumnya
    // Cek apakah data sudah ada
    $cekQuery = "SELECT COUNT(*) FROM soal WHERE kategori_matkul = ? AND soal = ? AND jawaban = ?";
    if ($stmtCek = $Koneksi->prepare($cekQuery)) {
        $stmtCek->bind_param("iss", $Id_Makul, $Soal, $Jawaban);
        $stmtCek->execute();
        $stmtCek->bind_result($count);
        $stmtCek->fetch();
        $stmtCek->close();

        if ($count > 0) {
            // Jika data sudah ada
            $_SESSION['Error'] = "Data sudah ada, tidak dapat ditambahkan.";
            header("Location: ../Views/Data");
            exit;
        } else {
            // Jika data belum ada, lakukan insert
            if ($stmt = $Koneksi->prepare("INSERT INTO soal (id, kategori_matkul, soal, jawaban) VALUES (?, ?, ?, ?)")) {
                // Bind parameter (0 untuk id otomatis, kemudian id_makul, soal, dan jawaban)
                $id = 0; // Id otomatis
                $stmt->bind_param("iiss", $id, $Id_Makul, $Soal, $Jawaban);

                // Jalankan query
                if ($stmt->execute()) {
                    // Redirect jika sukses
                    $_SESSION['Sukses'] = "Berhasil Tambah Data";
                    header("Location: ../Views/Data");
                } else {
                    echo "Error saat menyimpan data: " . $stmt->error;
                }

                // Tutup statement
                $stmt->close();
            } else {
                echo "Error dalam mempersiapkan query: " . $Koneksi->error;
            }
        }
    } else {
        echo "Error dalam mempersiapkan query cek: " . $Koneksi->error;
    }
}



if (isset($_POST['Tambah_Matkul'])) {
    $Matkul = $_POST['Nama_Matkul'];
    $Gass   =   mysqli_query($Koneksi,"INSERT INTO matkul VALUES(0,'$Matkul')");
    echo $_SESSION['Sukses'] = "Berhasil Tambah Data";
    header("location:../Views/Data");
}


?>

