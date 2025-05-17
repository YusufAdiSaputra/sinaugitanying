<?php

// Mengambil data JSON dari request jika ada
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama']) && isset($_POST['score'])) {
    // Mengambil nama dan skor dari request
    $nama = $_POST['nama'];
    $score = $_POST['score'];

    // Koneksi ke database MySQL
    $servername = "localhost"; // Ganti dengan host database Anda
    $username = "yusufad2_ut_ujianku";        // Ganti dengan username database Anda
    $password = "ur3kmZqS7WYR6KzxFcgs";            // Ganti dengan password database Anda
    $dbname = "yusufad2_ut_ujianku";       // Ganti dengan nama database Anda

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

   

    // Query untuk memasukkan data ke tabel quiz
    $sql = "INSERT INTO quiz (nama, score) VALUES ('$nama', $score)";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data berhasil disimpan"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }

    // Mengambil data nama dan skor yang sudah disimpan
    $sql = "SELECT nama, score FROM quiz ORDER BY score DESC";
    $result = $conn->query($sql);

    // Menyimpan hasil ke dalam array untuk ditampilkan
    $leaderboard = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $leaderboard[] = $row;
        }
    }

    // Mengubah leaderboard menjadi JSON
    $conn->close();
    echo json_encode(["leaderboard" => $leaderboard]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis IQ Pengetahuan Umum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f5;
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
            color: #333;
        }

        .card {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background: #ffffff;
        }

        .card-header {
            background: linear-gradient(135deg, #3498db, #9b59b6);
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px;
        }

        #quiz-container {
            text-align: center;
            animation: fadeIn 1s ease;
            margin-top: 30px;
        }

        #answers button {
            margin: 10px 0;
            transition: transform 0.3s;
            border-radius: 5px;
            font-size: 18px;
        }

        #answers button:hover {
            transform: scale(1.1);
            background-color: #3498db;
            color: white;
        }

        #result-container {
            text-align: center;
            padding: 20px;
            animation: fadeIn 1s ease;
            background-color: #f5f6fa;
            border-radius: 10px;
        }

        .input-container {
            margin-top: 100px;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #name-input {
            width: 80%;
            max-width: 400px;
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px;
        }

        .music-btn {
            background-color: #e67e22;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .music-btn:hover {
            background-color: #d35400;
        }

        .youtube-video {
            position: absolute;
            width: 0;
            height: 0;
            overflow: hidden;
        }

        .music-container {
            position: absolute;
            bottom: 30px;
            right: 20px;
            z-index: 9999;
        }

        table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px 12px;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Selamat Datang di Kuis IQ</h3>
                        <p>Pilih jawaban yang tepat untuk setiap soal</p>
                    </div>
                    <div class="card-body">
                        <!-- Input Nama -->
                        <div id="name-container" class="input-container">
                            <h4>Masukkan Nama Anda</h4>
                            <input type="text" id="name-input" class="form-control" placeholder="Nama Anda" />
                            <button class="btn btn-primary mt-3" onclick="startQuiz()">Mulai Kuis</button>
                        </div>

                        <!-- Kuis -->
                        <div id="quiz-container" class="d-none">
                            <h4 id="question-number">Soal 1 dari 25</h4>
                            <p id="question-text">Loading...</p>
                            <div id="answers" class="d-flex flex-column">
                                <!-- Jawaban akan dimasukkan oleh JavaScript -->
                            </div>
                            <button id="next-btn" class="btn btn-primary mt-3 d-none"
                                onclick="nextQuestion()">Berikutnya</button>
                        </div>

                        <!-- Hasil Kuis -->
                        <div id="result-container" class="d-none">
                            <h3>Hasil Kuis</h3>
                            <p id="score-text"></p>
                            <p id="player-name"></p>
                            <button class="btn btn-success" onclick="saveScore()">Simpan Hasil</button>
                            <button class="btn btn-success" onclick="restartQuiz()">Mulai Lagi</button>
                        </div>

                        <!-- Daftar Peringkat -->
                        <div id="leaderboard-container">
                            <h3>Leaderboard</h3>
                            <div class="table-responsive">

                                <table id="#myTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Skor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
    // Koneksi ke database MySQL
    $servername = "localhost"; // Ganti dengan host database Anda
    $username = "yusufad2_ut_ujianku";        // Ganti dengan username database Anda
    $password = "ur3kmZqS7WYR6KzxFcgs";            // Ganti dengan password database Anda
    $dbname = "yusufad2_ut_ujianku";      // Ganti dengan nama database Anda

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    

    // Query untuk mengambil data dari tabel quiz, diurutkan berdasarkan score dari yang terbesar
    $a = mysqli_query($conn, "SELECT * FROM quiz ORDER BY score DESC");

    // Menampilkan data dalam tabel
    while ($h = mysqli_fetch_assoc($a)) {
    ?>
        <tr>
            <td><?= $h['nama'] ?></td>
            <td><?= $h['score'] ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Embedded YouTube Video -->
    <div class="youtube-video" id="youtube-video">
        <iframe id="youtube-player" width="0" height="0"
            src="https://www.youtube.com/embed/de1QDufKrPY?autoplay=1&loop=1&playlist=de1QDufKrPY" frameborder="0"
            allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>

    <!-- Music Control -->
    <div class="music-container">
        <button class="music-btn" id="music-btn" onclick="toggleMusic()">Play Music</button>
    </div>

    <script>
        const questions = [{
                question: "Apa ibu kota Indonesia?",
                answers: ["Jakarta", "Surabaya", "Bandung", "Medan"],
                correct: 0
            },
            { 
                question: "Apa ibu kota Indonesia?", 
                answers: ["Jakarta", "Surabaya", "Bandung", "Medan"], 
                correct: 0 
            },
            { 
                question: "Siapa penemu listrik?", 
                answers: ["Thomas Edison", "Nikola Tesla", "Albert Einstein", "Alexander Graham Bell"], 
                correct: 1 
            },
            { 
                question: "Berapakah jumlah provinsi di Indonesia?", 
                answers: ["34", "33", "36", "37"], 
                correct: 0 
            },
            { 
                question: "Apa bahasa resmi di Jepang?", 
                answers: ["Mandarin", "Jepang", "Korea", "Thailand"], 
                correct: 1 
            },
            { 
                question: "Siapa presiden pertama Amerika Serikat?", 
                answers: ["George Washington", "Abraham Lincoln", "Thomas Jefferson", "John Adams"], 
                correct: 0 
            },
            { 
                question: "Apa nama gunung tertinggi di Indonesia?", 
                answers: ["Gunung Merapi", "Gunung Semeru", "Gunung Carstensz", "Gunung Rinjani"], 
                correct: 2 
            },
            { 
                question: "Apa ibu kota Thailand?", 
                answers: ["Bangkok", "Jakarta", "Hanoi", "Manila"], 
                correct: 0 
            },
            { 
                question: "Siapa penulis buku 'Harry Potter'?", 
                answers: ["J.R.R. Tolkien", "George R.R. Martin", "J.K. Rowling", "Suzanne Collins"], 
                correct: 2 
            },
            { 
                question: "Berapakah panjang Sungai Amazon?", 
                answers: ["4.345 km", "6.400 km", "3.975 km", "2.910 km"], 
                correct: 0 
            },
            { 
                question: "Apa nama planet terbesar di tata surya?", 
                answers: ["Mars", "Venus", "Jupiter", "Saturnus"], 
                correct: 2 
            },
            { 
                question: "Di negara mana Piramida Giza berada?", 
                answers: ["Mesir", "Irak", "Yordania", "Arab Saudi"], 
                correct: 0 
            },
            { 
                question: "Berapakah jumlah benua di dunia?", 
                answers: ["5", "6", "7", "8"], 
                correct: 2 
            },
            { 
                question: "Siapa yang menulis novel 'Laskar Pelangi'?", 
                answers: ["Andrea Hirata", "Pramoedya Ananta Toer", "Budi Darma", "Habiburrahman El Shirazy"], 
                correct: 0 
            },
            { 
                question: "Apa nama samudra terbesar di dunia?", 
                answers: ["Samudra Atlantik", "Samudra Pasifik", "Samudra Hindia", "Samudra Arktik"], 
                correct: 1 
            },
            { 
                question: "Di kota manakah Menara Eiffel berada?", 
                answers: ["Berlin", "Paris", "Madrid", "London"], 
                correct: 1 
            },
            { 
                question: "Berapakah jumlah negara di dunia?", 
                answers: ["192", "195", "197", "200"], 
                correct: 1 
            },
            { 
                question: "Apa nama ibu kota Australia?", 
                answers: ["Melbourne", "Sydney", "Canberra", "Brisbane"], 
                correct: 2 
            },
            { 
                question: "Siapa yang menemukan telepon?", 
                answers: ["Alexander Graham Bell", "Thomas Edison", "Nikola Tesla", "Isaac Newton"], 
                correct: 0 
            },
            { 
                question: "Siapa yang menulis buku 'To Kill a Mockingbird'?", 
                answers: ["Harper Lee", "Mark Twain", "Ernest Hemingway", "F. Scott Fitzgerald"], 
                correct: 0 
            },
            { 
                question: "Berapakah jumlah planet di tata surya?", 
                answers: ["7", "8", "9", "10"], 
                correct: 1 
            },
            { 
                question: "Apa ibu kota Kanada?", 
                answers: ["Ottawa", "Vancouver", "Toronto", "Montreal"], 
                correct: 0 
            },
            { 
                question: "Siapa penemu teori relativitas?", 
                answers: ["Isaac Newton", "Nikola Tesla", "Albert Einstein", "Galileo Galilei"], 
                correct: 2 
            },
            { 
                question: "Berapakah jumlah huruf dalam alfabet Indonesia?", 
                answers: ["26", "28", "30", "24"], 
                correct: 0 
            },
            { 
                question: "Apa nama kerajaan tertua di Indonesia?", 
                answers: ["Majapahit", "Sriwijaya", "Mataram", "Singhasari"], 
                correct: 1 
            },
            { 
                question: "Apa nama negara dengan populasi terbanyak di dunia?", 
                answers: ["India", "Amerika Serikat", "Indonesia", "Tiongkok"], 
                correct: 3 
            },
            { 
                question: "Siapa penemu pesawat terbang?", 
                answers: ["Orville dan Wilbur Wright", "Leonardo da Vinci", "Thomas Edison", "Nikola Tesla"], 
                correct: 0 
            },
            { 
                question: "Apa warna bendera Jepang?", 
                answers: ["Merah dan Putih", "Putih dan Biru", "Merah dan Kuning", "Putih dan Hijau"], 
                correct: 0 
            }
            // Tambahkan 20 soal lainnya di sini
        ];

        let currentQuestion = 0;
        let score = 0;
        let playerName = "";

        // Start Quiz after getting the player's name
        function startQuiz() {
            playerName = document.getElementById("name-input").value;
            if (playerName === "") {
                alert("Nama harus diisi!");
                return;
            }
            document.getElementById("name-container").classList.add("d-none");
            document.getElementById("quiz-container").classList.remove("d-none");
            loadQuestion();
        }

        // Load the current question
        function loadQuestion() {
            if (currentQuestion < questions.length) {
                const question = questions[currentQuestion];
                document.getElementById("question-number").textContent =
                    `Soal ${currentQuestion + 1} dari ${questions.length}`;
                document.getElementById("question-text").textContent = question.question;
                const answersContainer = document.getElementById("answers");
                answersContainer.innerHTML = '';

                question.answers.forEach((answer, index) => {
                    const button = document.createElement("button");
                    button.classList.add("btn", "btn-outline-primary");
                    button.textContent = answer;
                    button.onclick = () => checkAnswer(index);
                    answersContainer.appendChild(button);
                });
                document.getElementById("next-btn").classList.add("d-none");
            } else {
                showResults();
            }
        }

        // Check the answer selected by the user
        function checkAnswer(selectedIndex) {
            const question = questions[currentQuestion];
            if (selectedIndex === question.correct) {
                score++;
            }
            currentQuestion++;
            document.getElementById("next-btn").classList.remove("d-none");
        }

        // Move to the next question
        function nextQuestion() {
            loadQuestion();
        }

        // Show results at the end
        function showResults() {
            document.getElementById("quiz-container").classList.add("d-none");
            const resultContainer = document.getElementById("result-container");
            resultContainer.classList.remove("d-none");
            document.getElementById("score-text").textContent = `Skor Anda: ${score} dari ${questions.length}`;
            document.getElementById("player-name").textContent = `Nama: ${playerName}`;
        }

        // Save score to the database
        function saveScore() {
            const playerName = document.getElementById("name-input").value; // Nama pemain
            const playerScore = score; // Skor pemain

            const data = {
                nama: playerName,
                score: playerScore
            };

            fetch('quiz.php', {
                    method: 'POST',
                    body: new URLSearchParams(data)
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // Tampilkan pesan dari server
                    updateLeaderboard(data.leaderboard);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        // Update leaderboard
        function updateLeaderboard(leaderboard) {
            const leaderboardList = document.getElementById("leaderboard-list");
            leaderboardList.innerHTML = '';
            leaderboard.forEach(player => {
                const row = document.createElement("tr");
                const nameCell = document.createElement("td");
                nameCell.textContent = player.nama;
                const scoreCell = document.createElement("td");
                scoreCell.textContent = player.score;
                row.appendChild(nameCell);
                row.appendChild(scoreCell);
                leaderboardList.appendChild(row);
            });
        }

        // Restart the quiz
        function restartQuiz() {
            score = 0;
            currentQuestion = 0;
            document.getElementById("result-container").classList.add("d-none");
            document.getElementById("quiz-container").classList.remove("d-none");
            loadQuestion();
        }

        // Toggle music play and pause
        function toggleMusic() {
            const youtubePlayer = document.getElementById("youtube-player");
            const button = document.getElementById("music-btn");

            if (youtubePlayer.src.includes("autoplay=1")) {
                youtubePlayer.src = youtubePlayer.src.replace("autoplay=1", "autoplay=0");
                button.textContent = "Play Music";
            } else {
                youtubePlayer.src = youtubePlayer.src.replace("autoplay=0", "autoplay=1");
                button.textContent = "Pause Music";
            }
        }
    </script>

    <script src="cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>

yusufad2_ut_ujianku
ur3kmZqS7WYR6KzxFcgs

yusufad2_ut_ujianku