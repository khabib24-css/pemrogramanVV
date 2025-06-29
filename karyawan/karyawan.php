<?php
session_start();
// print_r($_SESSION);
// die;
require '../functions/functions.php';

if (!isset($_SESSION['user']) || 
($_SESSION['user']['jabatan'] !== 'karyawan') && $_SESSION['user']['jabatan'] !== 'it')
{
  $err= "Silakan login terlebih dahulu!";
  header("location: ../index.php");
  exit;
}

$id_karyawan = $_SESSION['user']['id_karyawan'];
$query = mysqli_query($db,"SELECT * FROM data_karyawan WHERE id_karyawan = '$id_karyawan'");
$karyawan = mysqli_fetch_assoc($query);

$izin = CekIzin($id_karyawan);
$absen = CekAbsen($id_karyawan);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Karyawan | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <nav class="navbar" style="background-color: #e3f2fd">
      <div class="container-fluid">
        <a class="navbar-brand ps-2">KARYAWAN</a>
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        <h1 class="mx-auto mb-0" style="font-size: 1.5rem">PT. TADIKA MESRA</h1>
        <a href="../logout.php" class="btn btn-outline-danger">Logout</a>
      </div>
    </nav>
    <!-- sidebar -->
    <div class="d-flex">
      <div class="bg-light p-3" style="width: 200px; height: 100vh">
        <ul class="nav flex-column">
          <li class="border border-5 nav-item rounded-5 bg-info-subtle">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
        </ul>
      </div>
      <!-- main -->
      <div class="p-4 flex-grow-1 bg-dark-subtle">
        <h2>Selamat Datang <?= $karyawan['username'];?></h2>
        <!-- data karyawan -->
        <form method="post" action="hadir.php" class="formulir bg-body-tertiary mt-4 pb-3">
          <div class="kartu-foto">
            <img src="img/<?= $karyawan['foto'] ?>" alt="" class="wadahFoto">
          </div>
          <div class="pt-2 row mb-3 ms-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" value="<?= $karyawan['id_karyawan']?>" aria-label="disable input example" disabled />
            </div>
          </div>
          <div class="pt-2 row mb-3 ms-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" value="<?= $karyawan['nama_lengkap'] ?>" aria-label="disable input example" disabled />
            </div>
          </div>
          <!-- live jam -->
          <div class="pt-2 row mb- ms-2">
            <label class="col-sm-2 col-form-label">WAKTU</label>
            <div class="col-sm-7">
              <input  class="form-control" type="text" id="live" aria-label="readonly input" readonly />
            </div>
            <input type="hidden" id="tanggal" name="tanggal">
            <input type="hidden" id="jam" name="jam">
          </div>
          <!-- tombol absen -->
          <button name="absen" type="submit" class="btn btn-outline-success ms-3 mt-5 " <?= ($izin || $absen) ? 'disabled':''?>>Absen</button>
          <?php if ($izin): ?> 
          <div class="alert alert-warning mt-3 ms-3" >
          Anda sedang dalam masa izin. Tombol absen dinonaktifkan.
            </div>
            <?php elseif ($absen): ?>
              <div class="alert alert-info mt-3 ms-3">
              Anda Sudah Absen Hari ini
              </div>
          <?php endif; ?>
        </form>
        <div class="container bg-body-tertiary mt-5 d-flex justify-content-center">
          <button type="button" class="btn btn-warning" <?= ($izin || $absen) ? 'disabled':''?> ><a href="izin.php">klik tombol ini jika tidak masuk/absen </a></button>
        </div>
      </div>
    </div>
    <footer class="bg-secondary text-center p-3 text-white">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati debitis qui, dolores facere necessitatibus incidunt quibusdam quos, accusamus soluta, illo ea consequatur velit ad. Modi, qui a? Vel, iure dicta.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="js/jam.js" defer></script>
  </body>
</html>

