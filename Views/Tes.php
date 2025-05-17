<?php
include "../Assets/Layouts/Header.php";
$Connect = mysqli_connect('localhost','root','','ut_ujian');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Data Continuous with AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>Insert Data Continuous with AJAX</h2>
    <button id="startButton">Mulai Kirim</button>
    <button id="stopButton" style="display:none;">Berhenti Kirim</button>
    <div id="status"></div>
    <div id="jumlahData"></div> <!-- Menampilkan jumlah data -->

    <script>
    $(document).ready(function() {
        var intervalId;

        // Fungsi untuk memperbarui jumlah data secara dinamis
        function updateJumlahData() {
            $.ajax({
                url: 'jumlah_data.php', // File PHP untuk mengambil jumlah data
                type: 'GET',
                data: {
                    kategori_mapel: 'Sistem Informasi'
                },
                success: function(response) {
                    $("#jumlahData").text('Jumlah data: ' + response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        $("#startButton").click(function() {
            intervalId = setInterval(function() {
                // Loop untuk mengirim 5 data dalam 1 detik
                for (var i = 0; i < 10; i++) {
                    $.ajax({
                        url: 'insert.php',
                        type: 'POST',
                        data: {
                            soal: 'Contoh Soal ' + i,
                            jawaban: 'Contoh Jawaban ' + i,
                            kategori_mapel: 'Sistem Informasi'
                        },
                        success: function(response) {
                            $("#status").append('<p>' + response + '</p>');
                            updateJumlahData(); // Memanggil fungsi untuk memperbarui jumlah data
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            }, 1); // Kirim 5 data setiap 1 detik

            $("#startButton").hide();
            $("#stopButton").show();
        });

        $("#stopButton").click(function() {
            clearInterval(intervalId);
            $("#startButton").show();
            $("#stopButton").hide();
        });

        // Panggil fungsi untuk memperbarui jumlah data saat halaman dimuat
        updateJumlahData();
    });
    </script>
</body>
</html>

<?php
include "../Assets/Layouts/Footer.php";
?>


