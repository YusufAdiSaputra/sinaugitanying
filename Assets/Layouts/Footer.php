<!-- ini link js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?= $UrlAssets ?>Assets/Bootstrap/css/bootstrap.js.js"></script>

<script src="<?= $UrlAssets ?>Assets/Data-Table/js/jquery-3.5.1.js"></script>
<script src="<?= $UrlAssets ?>Assets/Data-Table/js/jquery.dataTables.min.js"></script>
<script src="<?= $UrlAssets ?>Assets/Data-Table/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= $UrlAssets ?>Assets/Data-Table/js/jd.json"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
// Periksa apakah session 'Sukses' tersedia
if (isset($_SESSION['Sukses'])) {
    $pesan = $_SESSION['Sukses']; // Ambil pesan dari session
    // Hapus session setelah digunakan agar tidak terus tampil
    unset($_SESSION['Sukses']);
    echo "<script>
        Swal.fire({
            title: 'Berhasil',
            text: '{$pesan}',
            icon: 'success',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
    </script>";
}
?>

<?php
// Periksa apakah session 'Sukses' tersedia
if (isset($_SESSION['Error'])) {
    $pesan = $_SESSION['Error']; // Ambil pesan dari session
    // Hapus session setelah digunakan agar tidak terus tampil
    unset($_SESSION['Error']);
    echo "<script>
        Swal.fire({
            title: 'Error',
            text: '{$pesan}',
            icon: 'error',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
    </script>";
}
?>

<!-- data table -->
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });
</script>
</body>
</html>