<?php
include 'server.php';
$query = "SELECT * FROM mahasiswa;";
$sql = mysqli_query($conn, $query);
$no = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Tugas PBO OOP PROGRAM CRUD PHP </title>

    <!--Style-->
    <style>
      .container-fluid {
        background-color: #f5e8e8;
        margin: 40px auto;
        padding: 15px;
        box-sizing: border-box;
        position: relative;
      }
      table thead {
        background-color: #9fc5e8;
      }
      .btn {
        margin: 2px;
      }
    </style>
</head>
<body>
    <div class="container-fluid">
      <h1 class="text-center">TUGAS PBO OOP PROGRAM CRUD PHP </h1>
      <br>

      <!-- Awal Card Tabel -->
      <div class="card-header bg-primary text-white mb-1 text-center">
        <b>Tabel Data Mahasiswa </b>
      </div>

      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">         
          <thead>
            <tr class="text-center">
              <th>No.</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>Prodi</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($result = mysqli_fetch_assoc($sql)) : ?>
            <tr>
              <td class="text-center"><?= $no++; ?>. </td>
              <td class="text-center"><?= $result['nim']; ?></td>
              <td><?= $result['namamhs']; ?></td>
              <td class="text-center"><?= $result['jk']; ?></td>
              <td><?= $result['alamat']; ?></td>
              <td><?= $result['email']; ?></td>
              <td class="text-center"><?= $result['prodi']; ?></td>
              <td class="text-center">
                <img src="img/<?= $result['foto']; ?>" style="width: 70px">
              </td>
              <td class="text-center">
                <a href="mengelola.php?edit=<?= $result['id']; ?>" type="button" class="btn btn-primary btn-sm">Edit</a>
                <a href="proses.php?hapus=<?= $result['id']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
              </td>
              <?php endwhile; ?>
            </tr>
          </tbody>
        </table>          
        <a href="mengelola.php" type="button" class="btn btn-success mb-4 text-right" style="float: right;">Tambah Data</a>
      <!-- Akhir Card Tabel -->
      
    </div>
<script src="js/bootstrap.min.js"></script>

</body>
</html>