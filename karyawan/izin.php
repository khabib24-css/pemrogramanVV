<?php
session_start();
require '../functions/functions.php';

if (!isset($_SESSION['user']) || 
($_SESSION['user']['jabatan'] !== 'karyawan') && $_SESSION['user']['jabatan'] !== 'it') 
{
  header('Location: ../index.php');
  exit;
}

$id_karyawan = $_SESSION['user']['id_karyawan'];
$query = mysqli_query($db, "SELECT * FROM data_karyawan WHERE id_karyawan = '$id_karyawan'");
$karyawan = mysqli_fetch_assoc($query);

$nama_karyawan = $karyawan['nama_lengkap'];
$jabatan       = $karyawan['jabatan'];


// debuggg
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo "<pre>";
//     print_r($_POST);
//     print_r($_FILES);
//     echo "</pre>";
//     exit;
// }




if (isset($_POST['izin']))
{
  if (Pizin($_POST))
  {
    echo "<script>alert('Izin berhasil diajukan'); window.location.href = 'karyawan.php';</script>";
  } else {
    echo "<script>alert('Gagal mengajukan izin. Pastikan semua data terisi.');</script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IZIN | karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style2.css" />
  </head>
  <body>
    <div class="container mt-5">
      <div class="card shadow p-4">
        <h2 class="mb-4">Form Izin Kerja</h2>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <!-- <div class="col-md-4">
              <label for="id_perizinan" class="form-label">ID Perizinan</label>
              <input type="text" name="id_perizinan" id="id_perizinan" class="form-control" />
            </div> -->
            <div class="col-md-4">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" id="nama" value= " <?= $nama_karyawan ?> " class="form-control"readonly/>
            </div>
            <div class="col-md-4">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" name="jabatan" id="jabatan" value= " <?= $jabatan ?> " class="form-control" readonly/>
            </div>

            <div class="col-md-4">
              <label for="jenis_izin" class="form-label">Jenis Izin</label>
              <select id="jenis_izin" name="jenis_izin" class="form-select" required>
                <option value="">-- Pilih Jenis Izin --</option>
                <option value="Sakit">Sakit</option>
                <option value="Cuti Tahunan">Cuti Tahunan</option>
                <option value="Cuti Khusus">Cuti Khusus</option>
                <option value="Izin Kepentingan Pribadi">Izin Kepentingan Pribadi</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
              <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" />
            </div>
            <div class="col-md-4">
              <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
              <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" />
            </div>

            <div class="col-md-4">
              <label for="jumlah_hari" class="form-label">Jumlah Hari</label>
              <input type="text" name="jumlah_hari" id="jumlah_hari" class="form-control" readonly />
            </div>
            <div class="col-md-8">
              <label for="alasan_izin" class="form-label">Alasan Izin</label>
              <textarea name="alasan_izin" id="alasan_izin" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-8">
              <label for="bukti" class="form-label">Upload Bukti (opsional)</label>
              <input type="file" id="bukti" name="bukti" class="form-control" accept="image/*" />
            </div>
          </div>
          <button name="izin" type="submit" class="btn btn-primary mt-4">Kirim Izin</button>
        </form>
      </div>
    </div>
    <script src="./js/hitungHari.js"></script>
  </body>
</html>
