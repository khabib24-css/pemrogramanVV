<?php
session_start();
require '../functions/functions.php';


$halaman = 'DataHadir';
$tanggal = getToday();
$Sabsen = query("SELECT * FROM absen WHERE DATE(tanggal) = '$tanggal'" );






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
    <!-- <nav class="navbar" style="background-color: #e3f2fd">
      <div class="container-fluid">
        <a class="navbar-brand ps-5">ADMIN</a> -->
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        <!-- <h1 class="mx-auto mb-0" style="font-size: 1.5rem">PT. TADIKA MESRA</h1> -->
      <!-- </div>
    </nav> -->
    <?php include 'pilihan/navbar.php'; ?>
    <!-- sidebar -->
    <div class="d-flex">
      <?php include 'pilihan/sidebar.php'; ?>
      <!-- main -->
      <div class="p-4 flex-grow-1 bg-dark-subtle">
        <!-- table data karyawan -->
        <div class="container mt-4">
          <!-- baris "Data Karyawan" & searching" -->
          <div class="d-flex justify-content-between">
            <h2>Daftar Hadir </h2>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="text" autofocus placeholder="Search.." aria-label="Search" />
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
                  <th>foto</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($Sabsen) > 0) : ?>
                <?php $i = 1 ?>
                <?php foreach ($Sabsen as $data) : ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?=$data["username"] ?></td>
                  <td> <?php if (!empty($data["foto"])) :?>
                  <img src="../karyawan/img/<?=$data["foto"] ?>" width="50" height="50" alt="">
                  <td><?=$data["tanggal"] ?></td>
                  <td><?=$data["jam"] ?></td>
                  <td><?=$data["keterangan"] ?></td>
                  <?php else :?>
                    Tidak Ada
                  <?php endif; ?>
                  </td>
                  <!--  -->
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11" class="text-center">Tidak ada yang absen hari ini</td>
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