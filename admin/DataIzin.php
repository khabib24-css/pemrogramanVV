<?php
session_start();
require '../functions/functions.php';



$tanggal = date('y-m-d');
$Sizin = query("SELECT * FROM perizinan WHERE status = 'Menunggu' AND DATE(tanggal_pengajuan) = '$tanggal'" );






?>









<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Karyawan | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <nav class="navbar" style="background-color: #e3f2fd">
      <div class="container-fluid">
        <a class="navbar-brand ps-5">ADMIN</a>
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        <h1 class="mx-auto mb-0" style="font-size: 1.5rem">PT. TADIKA MESRA</h1>
        
      </div>
    </nav>
    <!-- sidebar -->
    <div class="d-flex">
      <div class="bg-light p-3" style="width: 200px; height: 100vh">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item inactive">
            <a class="nav-link" href="#">Data Karyawan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">Data Absensi
              <!-- <i class="bi bi-caret-down-fill ms-2"></i> -->
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarAbsensi" role="button">
              <li><a class="dropdown-item text-primary" href="#">Hadir</a></li>
              <li><a class="dropdown-item nav-item text-primary border border-5 rounded-5 bg-info-subtle active" href="#">Izin</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- main -->
      <div class="p-4 flex-grow-1 bg-dark-subtle">
        <!-- table data karyawan -->
        <div class="container mt-4">
          <!-- baris "Data Karyawan" & searching" -->
          <div class="d-flex justify-content-between">
            <h2>Data Pengajuan Izin </h2>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-primary" type="submit"><i class="bi bi-search-heart"></i></button>
            </form>
          </div>
          <!-- akhir "Data Karyawan" & searching"  -->
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Jenis Izin</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Berakhir</th>
                  <th>Jumlah Hari</th>
                  <th>Alasan</th>
                  <th>Bukti</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($Sizin) > 0) : ?>
                <?php $i = 1 ?>
                <?php foreach ($Sizin as $data) : ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?=$data["nama_lengkap"] ?></td>
                  <td><?=$data["jabatan"] ?></td>
                  <td><?=$data["jenis_izin"] ?></td>
                  <td><?=$data["tanggal_mulai"] ?></td>
                  <td><?=$data["tanggal_berakhir"] ?></td>
                  <td><?=$data["jumlah_hari"] ?></td>
                  <td><?=$data["alasan_izin"] ?></td>
                  <td> <?php if (!empty($data["bukti"])) :?>
                  <img src="../karyawan/img/bukti/<?=$data["bukti"] ?>" width="50" height="50" alt="">
                  <?php else :?>
                    Tidak Ada
                  <?php endif; ?>
                  </td>
                  <!--  -->
                  <td> <?= $data["status"] ?></td>
                  <td>
                    <a href="konfirmasi.php?id=<?= $data["id_izin"] ?>&aksi=setujui" class="btn btn-success btn-sm">Setuju</a>
                    <a href="konfirmasi.php?id=<?= $data["id_izin"] ?>&aksi=tolak" class="btn btn-danger btn-sm">Tolak</a>
                  </td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11" class="text-center">Tidak ada pengajuan izin hari ini</td>
                    </tr>
                    <?php endif; ?>
              </tbody>
            </table>
          </div>
          <nav class="mt-3 d-flex justify-center">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <footer class="bg-secondary text-center p-3 text-white">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati debitis qui, dolores facere necessitatibus incidunt quibusdam quos, accusamus soluta, illo ea consequatur velit ad. Modi, qui a? Vel, iure dicta.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  
  </body>
</html>