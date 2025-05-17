<?php
  include "../Assets/Layouts/Header.php";

  // Initialize variable for storing data
  $data = [];

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Kategori_Matkul'])) {
      $selectedMapel = $_POST['Kategori_Matkul'];
      $sql ="SELECT soal.*, matkul.nama_matkul 
            FROM soal 
            INNER JOIN matkul ON soal.kategori_matkul = matkul.id_matkul
            WHERE soal.kategori_matkul = ?
            ";
      $stmt = $Koneksi->prepare($sql);
      $stmt->bind_param("s", $selectedMapel);
      $stmt->execute();
      $result = $stmt->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $stmt->close();
  }

  
?>

<div class="container-fluid mt-2">
  <div class="row">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-body">
          <form action="" method="POST">
            <div class="mb-3">
              <div class="col-md-12 d-flex justify-content-end">
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                  data-bs-target="#exampleModal">+</button>

                <button type="button" class="btn btn-success " data-bs-toggle="modal"
                  data-bs-target="#tambahmatkul">Tambah Matkul</button>
              </div>



              <label for="exampleSelect" class="form-label">PILIH MAPEL</label>
              <select class="form-select" id="exampleSelect" name="Kategori_Matkul">
                <option selected>Open this select menu</option>
                <?php
                  $gass   = mysqli_query($Koneksi,"SELECT * FROM matkul");
                  while ($key = mysqli_fetch_assoc($gass)) {
                    
                ?>
                <option value="<?= $key['id_matkul']?>"><?= $key['nama_matkul']?></option>
                <?php } ?>

              </select>

              <button type="submit" class="btn btn-success btn-sm mt-2">Cari Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 mt-3">
      <div class="card shadow">

        <div class="card-body">
          <div class="table-responsive">

            <table id="example" class="table table-striped bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Soal</th>
                  <th>Jawaban</th>
                  <th>Kategori Mapel</th>
                </tr>
              </thead>

              <tbody>
                <?php if (!empty($data)) : ?>
                <?php foreach ($data as $index => $row) : ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlspecialchars($row['soal']) ?></td>
                  <td><?= htmlspecialchars($row['jawaban']) ?></td>
                  <td><?= htmlspecialchars($row['nama_matkul']) ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                  <td colspan="4" class="text-center">No data found</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Soal Dan Jawaban Cuy</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= $UrlAssets ?>Controller/Controller" method="POST">
          <div class="row">
            <div class="col-md-4">
              <label for=""><b>Soal</b></label>
              <input type="text" required class="form-control" name="Soal">
            </div>

            <div class="col-md-4">
              <label for=""><b>Jawaban</b></label>
              <input type="text" required class="form-control" name="Jawaban">
            </div>

            <div class="col-md-4">
              <label for="exampleSelect" class="form-label"><b>Kategori Mapel</b></label>
              <select class="form-select" id="exampleSelect" name="Kategori_Matkul">
                <option selected>Open this select menu</option>
                <?php
                  $gass   = mysqli_query($Koneksi,"SELECT * FROM matkul");
                  while ($key = mysqli_fetch_assoc($gass)) {
                    
                ?>
                <option value="<?= $key['id_matkul']?>"><?= $key['nama_matkul']?></option>
                <?php } ?>

              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="Insert">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal tambah matkul -->
<div class="modal fade" id="tambahmatkul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Matkul</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= $UrlAssets ?>Controller/Controller" method="POST">
          <div class="row">
            <div class="col-md-4">
              <label for=""><b>Nama Matkul</b></label>
              <input type="text" required class="form-control" name="Nama_Matkul" autofocus>
            </div>




          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="Tambah_Matkul">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
  include "../Assets/Layouts/Footer.php";
?>