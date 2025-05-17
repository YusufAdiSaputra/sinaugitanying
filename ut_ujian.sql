-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2024 at 01:00 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ut_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int NOT NULL,
  `nama_matkul` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`) VALUES
(7, 'Manajemen'),
(8, 'Pengantar Bisnis'),
(9, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int NOT NULL,
  `kategori_matkul` int NOT NULL,
  `soal` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `kategori_matkul`, `soal`, `jawaban`) VALUES
(59011, 7, 'Dalam pelaksanaan program tanggung jawab sosial perusahaan (CSR). Ada yang pro dan kontra terhadap aktifitas CSR. Apa alasan perusahaan kontra terhadap aktifitas CSR?', 'Keterlibatan dalam hal sosial, membuat bisnis mempunyai kekuasaan semakin besar'),
(59012, 7, 'Berikut ini yang termasuk lingkungan internal organisasi adalah', 'Stakeholder'),
(59013, 7, 'Peranan seorang manajer yang selalu aktif mencari informasi dan bermanfaat bagi organisasi adalah peranan manajer dalam proses', 'Monitor'),
(59014, 7, 'Berikut ini, mana jenis pengelompokan manajemen berdasarkan fungsi', 'Manajer umum'),
(59015, 7, 'Kejadian masa lalu yang tersimpan dalam memori otak dan dijadikan referensi dalam mengambil keputusan, dikenal dengan istilah', 'Availability'),
(59016, 7, 'Langkah pertama dalam pendekatan rasional dalam pengambilan keputusan adalah', 'Meneliti situasi'),
(59017, 7, 'Untuk kesuksesan penerapan Management By Objectif (MBO) dibutuhkan berbagai elemen. Elemen yang menjelaskan siapa yang harus tanggung jawab dalam penerapan MBO adalah', 'Tujuan individu'),
(59018, 7, 'Untuk menyeimbangkan elemen-elemen penting dalam organisasi dibutuhkan Balanced Scorecard (BSC). Berikut ini yang tidak termasuk perspektif BSC adalah', 'Peraturan pemerintah'),
(59019, 7, 'Proses perubahan organisasi akan dihadapkan pada dua tipe individu yang bertolak belakang terhadap terjadinya proses perubahan yaitu karakter driving & restraining. Salah satu ciri individu driving adalah', 'Kompetisi'),
(59020, 7, 'Tahap pertama proses sumber daya manusia (SDM) adalah', 'Perencanaan SDM'),
(59021, 7, 'Penerima wewenang diberikan kebebasan mengambil wewenang atau menolak wewenang. Hal ini merupakan teori wewenang berdasarkan sudut pandang', 'Penerima perintah.'),
(59022, 7, 'Berikut ini, contoh tipe organisasi berdasarkan fungsi yaitu', 'Bagian produksi'),
(59023, 7, 'Urutan hierarki tertinggi berdasarkan tangga kebutuhan menurut maslow adalah', 'Aktualisasi diri'),
(59024, 7, 'Halangan komunikasi efektif dari faktor lingkungan adalah', 'Informasi yang berlebihan'),
(59025, 7, 'Berdasarkan sumber kekuasaan, apa yang menyebabkan seorang karyawan mau menjalankan tugas karena digaji', 'Reward'),
(59026, 7, 'Likert mengelompokan gaya kepemimpinan dalam 4 sistem. Sistem ke berapa menurut Likert untuk gaya kepemimpinan Consultative?', '3'),
(59027, 7, 'Faktor yang bukan penolakan terhadap pengendaliaan adalah', 'Management by Objective (MBO)'),
(59028, 7, 'Berikut ini yang termasuk pada pengawasan kuantitatif adalah', 'Anggaran'),
(59029, 7, 'Pada aktifitas pengendalian, apa yang harus dilakukan bila prestasi tidak sesuai standar?', 'Mengevaluasi kembali standar prestasi dan pengukurannnya'),
(59030, 7, 'Supermarket dibuka di sebuah desa. UMKM bisa menjual produk di rak supermarket dan tidak perlu membayar uang sewa. Tipe kewirausahaan apa yang dilakukan oleh supermarket?', 'Kewirausahaan Sosial'),
(59031, 7, 'Menggunakan strategi pasar mana, jika wirausahawan berbisnis Mixue?', 'Waralaba'),
(59032, 7, 'Menurut konsep motivasi McClelland, jenis motivasi apa yang harus tinggi pada seorang wirasusahawan?', 'N-Ach'),
(59033, 7, 'Untuk kemajuan bisnis, UMKM melakukan kemitraan dengan perusahaan besar. UMKM diberi hak memasarkan produk di area tertentu. Jenis kemitraan tersebut adalah jenis kemitraan', 'Keagenan'),
(59034, 7, 'Dalam mengembangkan ide, UMKM menggunakan berbagai sumber ide. Intrepreunerial adalah sumber dari', 'Internal'),
(59035, 7, 'Berikut ini yang tidak termasuk karakteristik UMKM adalah', 'Pendapatan tinggi'),
(59036, 7, 'Aktifitas yang dilakukan pada proses manajemen pengorganisasian yaitu', 'Menentukan apa yang harus dikerjakan'),
(59037, 7, 'Memimpin rapat merupakan salah satu peranan spesifik manajer sebagai', 'Figurhead'),
(59038, 7, 'Berikut ini yang termasuk dalam teori pioner manajemen klasik adalah', 'Karyawan sebagai aset perusahaan'),
(59039, 7, 'Asep adalah seorang manajer IT (Information Technology). Asep diminta membuat mitigasi saat terjadi berbagai hal terkait resiko keamanan IT. Analisa pendekatan manajemen yang Asep pilih adalah', 'Pendekatan situasional'),
(59040, 7, 'Salah satu KPI (Key Performace Indikator) dari Anton seorang manajer logistik adalah menurunkan biaya penyimpanan barang di gudang. Dalam hal ini, Anton menjaga hubungan baik dengan', 'Pesaing'),
(59041, 7, 'Ali sales manajer meminta data penjualan dari setiap area sales supervisor. Dari pengolahan data tersebut Ali tahu antusiasme konsumen dan apa yang harus dilakukan area sales supervisor di area nya. Analisa strategi apa yang sedang Ali lakukan?', 'Memonitor lingkungan tidak langsung'),
(59042, 7, 'Wati menjual fashion online di marketplace. Saat upload baju yang akan dijual Wati memberikan informasi lengkap mulai dari warna, ukuran, bahan, foto, harga dan informasi penting lainnya. Etika yang sedang Wati aplikasikan merupakan tingkatan etika tingkatan', 'Masyarakat'),
(59043, 7, 'Berikut ini merupakan efek positif CSR, kecuali', 'Meningkatkan campur tangan pemerintah'),
(59044, 7, 'Perusahaan asal Amerika Serikat memiliki cabang di seluruh dunia dan CEO pusat Amerika adalah orang Korea. Termasuk dimensi globalisasi apa pada contoh tersebut?', 'Dimensi lokasi'),
(59045, 7, 'Seorang manajer membuat berbagai alternatif rencana jika kondisi krisis moneter, bencana, pandemi dan lainnya. Recana yang dibuat merupakan jenis perencanaan…', 'Situasional'),
(59046, 7, 'Berikut ini pernyataan yang tepat tentang MBO, kecuali', 'Review prestasi mendorong kreatifitas dan partisipasi tim'),
(59047, 7, 'Proses setelah pelaksanaan strategi pada perencanaan strategis adalah', 'Evaluasi dan pengendalian strategis'),
(59048, 7, 'Proses setelah pelaksanaan strategi pada perencanaan strategis adalah', 'Evaluasi dan pengendalian strategis'),
(59049, 7, 'Teknisi laboratorium pabrik air minum melakukan analisis pada bahan baku sebelum proses produksi dan produk jadi. Penentuan apakah bahan baku tersebut bisa digunakan dan produk jadi bisa dijual berdasarkan spesifikasi standar perusahaan dan pemerintah. Keputusan yang diambil oleh teknisi laboratorium dalam hal ini yaitu', 'Keputusan terprogram'),
(59050, 7, 'Tahap pertama pada pendekatan rasional dalam pengambilan keputusan yaitu', 'Meneliti situasi'),
(59051, 7, 'Selama dua hari terjadi masalah kerusakan pada mesin produksi, Asep pun berhasil merumuskan masalah kerusakan tersebut. Tahapan selanjutnya yang dilakukan Asep adalah ….. Hal ini berdasarkan Pendekatan.......', 'Pembuatan model, ilmiah'),
(59052, 7, 'Untuk menentukan jumlah penjualan di tahun 2024. Perusahaan menggunakan model peramalan: Penjualan (Y) = 50.000 + 1.37 x Anggaran Pemasaran (X1) + 1.5 x UMK (X2). Model peramalan apa yang digunakan perusahaan untuk menentukan jumlah penjualan tahun 2024?', 'A. Regresi'),
(59053, 7, 'PT. A merencanakan sertifikasi manajemen kualitas ISO 9001 pada tahun depan. Struktur organisasi yang cocok untuk proyek sertifikasi ISO 9001 adalah', 'Matrix'),
(59054, 7, 'Penerapan Tipe organisasi berdasarkan fungsional adalah', 'Manajer gudang, manajer produksi, manajer QA'),
(59055, 7, 'Wewenang datang dari atas merupakan wewenang berdasarkan pandangan', 'Lini'),
(59056, 7, 'Organisasi hollow ciri khas nya adalah proses', 'Outsource'),
(59057, 7, 'Berikut ini yang tidak termasuk dalam tahapan perencanaan Sumber Daya Manusia adalah', 'Mengevaluasi calon tenaga kerja'),
(59058, 7, 'Proses-proses di bawah ini yang termasuk dalam analisis kebutuhan pelatihan adalah', 'Evaluasi prestasi, Survei Sumber Daya Manusia, Analisis persyaratan kerja.'),
(59059, 7, 'Berikut ini yang termasuk pada kekuatan pendukung status quo adalah', 'Keterampilan yang dipunyai saat ini, Norma kelompok'),
(59060, 7, 'Perubahan desain organisasi, penataan kembali divisi termasuk pada perubahan', 'Struktur'),
(59061, 7, 'Rendi karyawan yang baru masuk di bagian akunting. Pada awal bekerja, Rendi merasakan tidak nyaman karena tidak diberikan instruksi kerja dan SOP yang jelas. Dalam hal ini, Rendi mengalami konflik', 'Ketidakjelasan peranan'),
(59062, 7, 'Ujang termotivasi bekerja dan berperilaku baik karena adanya imbalan berupa gaji/uang. Hal ini merupakan pendekatan motivasi berdasarkan teori motivasi...... Menurut.......', 'Pendekatan tradisional, Maslow'),
(59063, 7, 'Ari manajer produksi ketika dimintai pendapat, solusi dan lain sebagainya oleh direktur pabrik Ari hanya fokus terhadap bagian produksi tanpa memikirkan bagian lainnya. Dari hal tersebut hambatan jenis apa yang terjadi?', 'Selective Perceptual'),
(59064, 7, 'Menjaga konsistensi antara bahasa tubuh dan kata yang digunakan merupakan salah satu cara untuk meningkatkan efektifitas komunikasi dari', 'Karakteristik pengirim'),
(59065, 7, 'Ali dan Evi seringkali mengalami konflik dimana Ali manajer marketing fokus terhadap strategi promosi untuk pengingkatan penjualan, sementara Evi manajer audit dan ketaatan fokus terhadap pemenuhan terhadap peraturan pemerintah dan kebijakan perusahaan. Berdasarkan wacana di atas, tipe konflik yang terjadi adalah……dan penyebab konflik adalah......', 'ntergroup, perbedaan tujuan'),
(59066, 7, 'Seorang professor bidang kimia akan mengikuti saran dari tukang cat ketika memilih jenis cat yang cocok. Hal ini merupakan contoh kekuasaan dari kekuatan', 'Expert'),
(59067, 7, 'Untuk meningkatkan daya saing perusahaan dan keberhasilan mencapai visi, misi perusahaan maka dibutuhkan kepemimpinan level', 'Kelompok'),
(59068, 7, 'Berikut ini yang tidak termasuk perencanaan kepemimpinan strategis adalah', 'Membangun dan menjaga kelompok'),
(59069, 7, 'Marketing manajer menetapkan penjualan tahun 2024 tumbuh 15% dari tahun 2023. Hal ini merupakan desain pengendalian', 'Key performance area'),
(59070, 7, 'Membuat desain pengawasan yang efektif dengan memperhatikan benefit pengawasan dan biaya, merupakan faktor', 'Ekonomis'),
(59071, 7, 'Laporan keuangan yang menggambarkan aset di dalam laporan tersebut merupakan laporan', 'Neraca'),
(59072, 7, 'Berikut ini yang dapat meningkatkan efektifitas rantai nilai melalui perspektif organisasi kecuali', 'Peningkatan kompetensi'),
(59073, 7, 'Berikut ini pernyatan yang tepat tentang kualitas, kecuali', 'Titik awal penerapan manajemen kualitas total adalah partisipasi karyawan'),
(59074, 7, 'Semangat kerja yang masih segar merupakan keuntungan dari strategi', 'Membangun perusahaan baru'),
(59075, 7, 'Karakteristik dari kewirausahaan sosial adalah', 'Pendekatan ekonomi untuk mengatasi masalah sosial'),
(59076, 7, 'Samsung selalu berinovasi ketika Apple meluncurkan produk baru. Sumber inovasi pada contoh tersebut adalah', 'Pesaing'),
(59077, 7, 'Memproduksi sebagian komponen untuk membuat produk tertentu dengan spesifikasi yang ditetapkan perusahaan besar dikenal dengan', 'Subkontrak'),
(59078, 7, 'Rumus kesempatan pasar adalah', 'Potensi pasar – Pangsa yang sudah terlayani'),
(59079, 7, 'Teknologi penyimpan file bukan di komputer pribadi namun di server milik perusahaan atau perusahaan menyewa server ke pihak ke tiga sehingga file bisa diakses di mana saja ini merupakan contoh pendorong revolusi digital yaitu', 'Cloud'),
(59080, 7, 'Berikut ini yang merupakan usaha On Demand Services adalah', 'Traveloka'),
(59081, 7, 'Ketika kita sering search di google produk tertentu maka akan muncul produk-produk serupa yang mungkin kita perlukan di media sosial atau pun situs lainya. Hal ini merupakan karakteristik bisnis di era digital yaitu', 'Personalisasi tinggi'),
(59082, 7, 'Di bawah ini pernyataan yang benar tentang menciptakan nilai tambah dengan media sosial, kecuali', 'Youtube memiliki marketplaces.'),
(59083, 8, 'Berikut adalah alasan mengadakan perdagangan internasional yaitu ', 'persaingan'),
(59084, 9, 'Which one from the expression below is an abbreviation?', 'IMHO'),
(59085, 9, 'Which one from the expression below is a slang?', 'Swag'),
(59086, 9, 'Which one from the expression below is a cliché', 'You can’t judge a book by its cover'),
(59087, 9, 'Which one from the expression below is an informal English language', 'I’m sorry, but I can’t attend the meeting tomorrow'),
(59088, 9, 'Which one from the expression below is a formal English language', 'I don’t believe that the results are accurate'),
(59089, 9, 'The words below are the names of items you will find in an office, except', 'Lawnmower'),
(59090, 9, 'Which one from the sentences below has proper punctuation?', 'I need to buy eggs, milk, lettuce, and bread.'),
(59091, 9, 'Which one from the sentences below has proper capitalization?', 'George visited the Grand Canyon last week.'),
(59092, 9, 'Which one from the sentences below has the proper grammar?', 'Meetings are important for connecting colleagues, sharing ideas, and for fostering innovation and creativity'),
(59093, 9, 'The sentences below are examples of descriptive sentences, except', 'Everybody saw the accident.'),
(59094, 9, 'The options below are examples of common closings for emails written to an acquaintance, except', 'Best regards,'),
(59095, 9, 'Which one of the options below is an example of closing in an email?', 'I am pleased to introduce you to the new Customer Support Representative'),
(59096, 9, 'Which one of the options below is an example of expression that you will find in body email?', 'I’m deeply disappointed about the disrespectful treatment I received in your store.'),
(59097, 9, 'Which one of the options below is an example of opening in an email?', 'p'),
(59098, 9, 'Which one of the options below is an example of opening in an email?', 'I\'m writing to follow up on my previous email.'),
(59099, 9, 'Which one of the options below is an example of salutation?', 'Dear Sir or Madam'),
(59100, 9, 'The options below are parts of a report excep', 'Confirmation'),
(59101, 9, 'The options below are different kinds of business documents, except', 'Business card'),
(59102, 9, 'Which one of the options below is a part of a letter?', 'Salutation'),
(59103, 9, 'Which one of the options below is a part of an email?', 'Subject'),
(59104, 9, 'Which one of the options below is a part of a memo?', 'Name of sender and recipient'),
(59105, 9, 'Which one of the options below is an example of an expression of responding to a customer’s complaint?', 'I really apologize to hear that your experience with our company has not met your expectations.'),
(59106, 9, 'Which one of the options below is an example of an expression of responding to a request for a price list?', 'In response to your enquiry, please find attached to this email our price list.'),
(59107, 9, 'Which one of the options below is an example of expression of thanking?', 'I really appreciate you taking the time to write me a letter of reference for the job at Acme Retail.'),
(59108, 9, 'Which one of the options below is an example of expression of request for a catalogue?', 'I am very interested in seeing what vitamins and health products your company sells and therefore, please send me your current catalogue'),
(59109, 9, 'Which one of the options below is an example of expression of complaint?', 'This letter is to notify you about a problem I am having with the computer that I bought at your store on the 25th of January.'),
(59110, 9, 'Which one of the options below is not an essential part of a CV?', 'Hobbies and interests'),
(59111, 9, 'Which one of the options below is an example of a statement in a cover letter explaining about yourself?', 'I have been working in the food and beverage industry for the last 15 years.'),
(59112, 9, 'Which one of the options below is an example of a statement in a cover letter explaining where you found the job ads?', 'I am writing in reference to the job advertisement I recently saw on XYZ.com.'),
(59113, 9, 'Which one of the options below is an example expression of a statement in a cover letter explaining your interest in the position advertised?', 'It is with great pleasure that I submit my application for the waiter position at The Flagship Restaurant.'),
(59114, 9, 'Which one of the options below is an example of a statement in a cover letter thanking the recruitment officer?', 'Thank you for taking the time to read my resume and cover letter.'),
(59115, 9, 'Which one of the options below is an expression of refusing an offer in a negotiation?', 'I’m afraid we can’t agree on that.'),
(59116, 9, 'Which one of the options below is an expression of agreeing to a negotiation? I think your proposal is acceptable.', 'I think your proposal is acceptable.'),
(59117, 9, 'Which one of the options below is an expression of agreeing to an appointment?', 'That’s perfect. See you on Wednesday at 10.'),
(59118, 9, 'Which one of the options below is an expression of rescheduling an appointment?', 'Would it be possible to arrange another time later in the week?'),
(59119, 9, 'Which one of the options below is an expression of making an appointment?', 'When would be a good time to meet you?'),
(59120, 9, 'Which one from the expression below is a formal English language?', 'Essential measures should be undertaken at the earliest opportunity.'),
(59121, 9, 'Which one from the expression below is an informal English language?', 'Before Europeans discovered America, they didn\'t eat potatoes.'),
(59122, 9, 'Which one from the expression below is a cliché?', 'Last but not least'),
(59123, 9, 'Which one from the expression below is a cliché?', 'Last but not least'),
(59124, 9, 'Which one from the expression below is slang?', 'Dude'),
(59125, 9, 'Which one from the expression below is an abbreviation?', 'FYI'),
(59126, 9, 'Which one from the expression below is an abbreviation?', 'FYI'),
(59127, 9, 'The words below are the names of items you will find in an office, except…', 'Duvet'),
(59128, 9, 'Which one from the sentences below has proper punctuation?', 'You don\'t know me well, do you?'),
(59129, 9, 'Which one from the sentences below has proper capitalization?', 'He received a bachelor\'s degree from the University of Colorado.'),
(59130, 9, 'Which one from the sentences below has the proper grammar?', 'In the last ten years, increasing use of social media and online platforms have allowed companies to connect with customers in new ways'),
(59131, 9, 'The words below are the names of items you will find in an office, except', 'Duvet'),
(59132, 9, 'a', 'a'),
(59133, 9, 'a', 'v'),
(59134, 9, 'Which one from the sentences below has the proper grammar?', 'In the last ten years, increasing use of social media and online platforms have allowed companies to connect with customers in new ways.'),
(59135, 9, 'Which one from the sentences below is an example of a descriptive sentence?', 'His deep and soulful blue eyes were like the color of the ocean.'),
(59136, 9, 'Which one of the options below is an example of salutation?', 'To Whom It May Concern'),
(59137, 9, 'Which one of the expressions below can be found in the opening of an email?', 'I hope this email finds you well.'),
(59138, 9, 'Which one of the expressions below can be found in a body email?', 'I would also appreciate it if you could explain the current issues with the delivery system.'),
(59139, 9, 'Which one of the options below is an example of closing in an email?', 'I look forward to hearing from you.'),
(59140, 9, 'The options below are examples of common sign off for emails written to an acquaintance, except…', 'Cheers,'),
(59141, 9, 'Which one of the options below is a part of a memo?', 'Subject'),
(59142, 9, 'Which one of the options below is a part of an email?', 'Attachment'),
(59143, 9, 'Which one of the options below is a part of a letter?', 'Complimentary close'),
(59144, 9, 'The options below are different kinds of business documents, except', 'Dissertation'),
(59145, 9, 'The options below are parts of a report except…', 'Salutation'),
(59146, 9, 'Which one of the options below is an example of expression of request for a catalogue?', 'We would like you to send us a copy of your latest catalogue along with copies of descriptive leaflets that could be passed on to prospective customers.'),
(59147, 9, 'Which one of the options below is an example of an expression of responding to a request for a price list?', 'We are pleased to enclose the required information requested in the form of our pricelist meant to be passed on to customers.'),
(59148, 9, 'Which one of the options below is an example of an expression of responding to a customer’s complaint?', 'I have forwarded your complaint to our corporate customer experience team and we will do everything we can to make sure this doesn’t happen again.'),
(59149, 9, 'Which one of the options below is an expression that you will find in an opening of a thanking letter/email?', 'I would like to thank you for the invaluable support you provided to me during my recent career search.'),
(59150, 9, 'Which one of the options below is an expression that you will find in a body of a thanking letter/email?', 'I’m happy to report that I have just accepted a new position with XYZ Company.'),
(59151, 9, 'Which one of the options below is an expression that you will find in a closing of a thanking letter/email?', 'Again, thank you very much. I greatly appreciate your assistance with my job search.'),
(59152, 9, 'Which one of the options below is an example of a statement in a cover letter explaining about yourself?', 'I have excellent time-management skills, possess the ability to work any shift, am eager to learn and always strive to make everyone feel welcome and comfortable.'),
(59153, 9, 'Which one of the options below is an example of a statement in a cover letter explaining where you found the job ads?', 'I am delighted to have the opportunity to apply for the position of Administrative Specialist at your company that you advertised this week in the Daily Herald Tribune.'),
(59154, 9, 'Which one of the options below is an example expression of a statement in a cover letter explaining your interest in the position advertised?', 'The opportunity to potentially work for your company, which has been recognized as one of the largest manufacturing companies in the world, excites me as I continue to seek new challenges.'),
(59155, 9, 'Which one of the options below is an example of a statement in a cover letter thanking the recruitment officer?', 'Thank you for considering my application and I welcome the opportunity to discuss how my qualifications would be and your company’s continued success'),
(59156, 9, 'The options below are essential parts of a CV, except…', 'LinkedIn account'),
(59157, 9, 'Which one of the options below is an expression of making an appointment?', 'Would you like to meet me at your office tomorrow afternoon?'),
(59158, 9, 'Which one of the options below is an expression requesting an explanation?', 'Could you explain the first part please?'),
(59159, 9, 'Which one of the options below is an expression of agreeing to a negotiation?', 'I believe we can both agree that this solution is fair.'),
(59160, 9, 'Which one of the options below is an expression of refusing an offer in a negotiation?', 'I\'m afraid I had something different in mind.'),
(59161, 9, 'Which one of the options below is an example expression of breaking off a negotiation?', 'Unfortunately, it seems that we are unable to reach consensus here.'),
(59162, 9, 'Which one of the options below is an example expression of compromising in a negotiation?', 'We are ready to accept your offer; however, there would be one condition.'),
(59163, 9, 'Which expression below is commonly found in a summary?', 'To sum up');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59164;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
