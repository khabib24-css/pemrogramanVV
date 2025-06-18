<?php
session_start();
// print_r($_SESSION);
// die;
if (!isset($_SESSION['username']) || 
($_SESSION['jabatan'] !== 'karyawan') && $_SESSION['jabatan'] !== 'it')
{
  $_SESSION['error'] = "Silakan login terlebih dahulu!";
  header("location: ../index.php");
  exit;
}


// mengambil data dari session
$idkaryawan = $_SESSION['id_karyawan'];
$username = $_SESSION['username'];
$namalengkap = $_SESSION['nama_lengkap'];
$foto = $_SESSION['foto'];

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
        <h2>Selamat Datang <?= $username?></h2>
        <!-- data karyawan -->
        <form class="formulir bg-body-tertiary mt-4 pb-3">
          <div class="kartu-foto">
            <img src="<?= $foto ?>" alt="" class="wadahFoto">
          </div>
          <div class="pt-2 row mb-3 ms-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" value="<?= $idkaryawan?>" aria-label="disable input example" disabled />
            </div>
          </div>
          <div class="pt-2 row mb-3 ms-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" value="<?= $namalengkap ?>" aria-label="disable input example" disabled />
            </div>
          </div>
          <div class="pt-2 row mb- ms-2">
            <label for="" class="col-sm-2 col-form-label">WAKTU</label>
            <div class="col-sm-7">
              <input  class="form-control" type="text" id="live" aria-label="disable input example" disabled />
            </div>
          </div>
          <!-- tombol absen -->
          <button type="submit" class="btn btn-outline-success ms-3 mt-5">Absen</button>
        </form>
        <div class="container bg-body-tertiary mt-5 d-flex justify-content-center">
          <button type="button" class="btn btn-warning" ><a href="izin.html">klik tombol ini jika tidak masuk/absen </a></button>
        </div>
      </div>
    </div>
    <footer class="bg-secondary text-center p-3 text-white">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati debitis qui, dolores facere necessitatibus incidunt quibusdam quos, accusamus soluta, illo ea consequatur velit ad. Modi, qui a? Vel, iure dicta.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="js/hitungHari.js"></script>
  </body>
</html>
