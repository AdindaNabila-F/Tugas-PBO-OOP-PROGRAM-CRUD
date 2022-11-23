<?php
include 'server.php';
$id = '';
$nim = '';
$namamhs = '';
$jeniskelamin = '';
$alamat = '';
$email = '';
$prodi = '';

if (isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $query = "SELECT * FROM mahasiswa WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nim = $result['nim'];
    $namamhs = $result['namamhs'];
    $jeniskelamin = $result['jk'];
    $alamat = $result['alamat'];
    $email = $result['email'];
    $prodi = $result['prodi'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Tugas PBO CRUD OOP</title>
    <!--Style-->
    <style>
      .container {
        background-color: #eed5b7;
        margin: 40px auto;
        padding: 50px;
        box-sizing: border-box;
        position: relative;
      }
    </style>
</head>
<body>
      <div class="container">
        <h2 class="text-center">FORM INPUT DATA MAHASISWA</h2>
        <br>
        <form method="POST" action="proses.php" class="font-weight-bold">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            
            <!--Form NIM-->
            <div class="mb-3 row">
                <label for="Nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" id="Nim" placeholder="contoh: 21051214022" required value="<?php echo $nim; ?>">
                </div>
            </div>

            <!--Form Nama Mahasiswa-->
            <div class="mb-3 row">
                <label for="Namamhs" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="namamhs" class="form-control" id="Namamhs" placeholder="contoh: Adinda Nabila Firnanda" required value="<?php echo $namamhs; ?>">
                </div>
            </div>

            <!--Form Jenis Kelamin-->
            <div class="mb-3 row">
                <label for="Jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="jk" id="laki-laki" required value="L" <?php if($jeniskelamin=="L") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="jk" id="perempuan" required value="P" <?php if($jeniskelamin=="P") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>

            <!--Form Alamat-->
            <div class="mb-3 row">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text"  name="alamat" class="form-control" id="Alamat" placeholder="Contoh: JL Sampoerna no 44" required value="<?php echo $alamat; ?>">
                </div>
            </div>

            <!--Form Email-->
            <div class="mb-3 row">
                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="Email" placeholder="contoh: mahasiswa@mhs.unesa.ac.id" required value="<?php echo $email; ?>">
                </div>
            </div>

            <!--Form Prodi-->
            <div class="mb-3 row">
                <label for="Prodi" class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="prodi" id="PendidikanTeknologiInformasi" required value=" S1 PTI " <?php if($prodi==" S1 PTI ") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="PendidikanTeknologiInformasi">Pendidikan Teknologi Informasi</label>
                    </div>
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="prodi" id="TeknikInformatika" required value=" S1 TI " <?php if($jeniskelamin==" S1 TI ") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="TeknikInformatika">Teknik Informatika</label>
                    </div>
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="prodi" id="SistemInformasi" required value=" S1 SI " <?php if($jeniskelamin==" S1 SI ") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="SistemInformasi">Sistem Informasi</label>
                    </div>
                </div>
            </div>

            <!--Form Foto Mahasiswa-->
            <div class="mb-3 row">
                <label for="Foto" class="col-sm-2 col-form-label">Foto Mahasiswa</label>
                <div class="col-sm-10">
                  <input type="file" name="foto" class="form-label" id="Foto" required value="<?php echo $foto; ?>">
                </div>
            </div>
            
            <!--Tombol Button-->
            <div class ="col text-right" style="float: right;">
                <?php
                if (isset($_GET['edit']))
                {
                    ?>
                    <button type="submit" name="submit" value="edit" class="btn btn-success btn-sm">Simpan</button>
                    <?php
                }
                else
                {
                    ?>
                    <button type="submit" name="submit" value="add" class="btn btn-success btn-sm">Tambah</button>  
                    <?php
                }
                ?>
                <a href="index.php" type="button" class="btn btn-danger btn-sm">Batal</a>
            </div>
        </form>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>