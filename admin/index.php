
<?php
session_start();
require '../functions/functions.php';
// if ( !isset($_SESSION["login"]))
// {
//   header("location: ../index.php");
// };
$halaman = 'index';
if (!isset($_SESSION['user']) || 
($_SESSION['user']['jabatan'] !== 'manager')) {
  $_SESSION['error']= "Silakan login terlebih dahulu!";
  
  header("Location: ../index.php");
  exit;
}

$totalKaryawan = getTotalKarayawan();
$totalHadir = getTotalHadir();
$riwayatSekearang = getRiwayatHariIni();
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <!-- <nav class="navbar" style="background-color: #e3f2fd">
      <div class="container-fluid">
        <a class="navbar-brand ps-5">ADMIN</a> -->
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        <!-- <h1 class="mx-auto mb-0" style="font-size: 1.5rem">PT. TADIKA MESRA</h1>
        <a href="../logout.php" class="btn btn-outline-danger">Logout</a> -->
      <!-- </div>
    </nav> -->
    <?php include 'pilihan/navbar.php'; ?>
    <!-- sidebar -->
    <!-- <div class="d-flex">
      <div class="bg-light p-3" style="width: 200px; height: 100vh">
        <ul class="nav flex-column">
          <li class="border border-5 nav-item rounded-5 bg-info-subtle">
            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/data_karyawan.php">Data Karyawan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">Data Absensi
              <i class="bi bi-caret-down-fill ms-2"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarAbsensi" role="button">
              <li><a class="dropdown-item" href="DataHadir.php">Hadir</a></li>
              <li><a class="dropdown-item" href="DataIzin.php">Izin</a></li>
            </ul>
          </li>
        </ul>
      </div> -->
          <main class="d-flex flex-grow-1">
        <?php include 'pilihan/sidebar.php'; ?>

        <div class="p-4 flex-grow-1 bg-dark-subtle">
          <!-- main -->
          <h2>Dashboard</h2>

          <div class="row">
            <div class="col-md-3">
              <div class="card bg-primary text-white p-3">
                <h5>Total Karyawan</h5>
                <h2><?= $totalKaryawan ?></h2>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-success text-white p-3">
                <h5>Hari Ini Hadir</h5>
                <h2><?= $totalHadir ?></h2>
              </div>
            </div>
            ...
          </div>

          <hr>

          <h4>Riwayat Hari Ini</h4>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jam</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($riwayatSekearang) > 0) : ?>
                <?php $i = 1 ?>
                <?php foreach ($riwayatSekearang as $isi) : ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $isi['username'] ?></td>
                <td><?= $isi['jam']?></td>
                <td><?= $isi['keterangan'] ?></td>
              </tr>
              <?php $i++ ?>
              <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="11" class="text-center">Tidak ada yang absen hari ini</td>
                </tr>
                <?php endif;?>
            </tbody>
          </table>
        </div>
      </main>

      <footer class="bg-secondary text-center p-3 text-white">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati debitis qui, dolores facere necessitatibus incidunt quibusdam quos, accusamus soluta, illo ea consequatur velit ad. Modi, qui a? Vel, iure dicta.
      </footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>