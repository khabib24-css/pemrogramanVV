
<?php
session_start();



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
          <li class="border border-5 nav-item rounded-5 bg-info-subtle">
            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/data_karyawan.php">Data Karyawan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Data Absensi</a>
          </li>
        </ul>
      </div>
      <!-- main -->
      <div class="p-4 flex-grow-1 bg-dark-subtle">
        <h2>Halaman Admin</h2>
        <!-- data karyawan -->
        <form class="formulir bg-body-tertiary mt-4 pb-3">
          <div class="pt-2 row mb-3 ms-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" placeholder="07680" aria-label="disable input example" disabled />
            </div>
          </div>
          <div class="pt-2 row mb-3 ms-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" placeholder="Andhika" aria-label="disable input example" disabled />
            </div>
          </div>
          <div class="pt-2 row mb- ms-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">WAKTU</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" placeholder="wednesday,07-05-2025 10:19:20pm " aria-label="disable input example" disabled />
            </div>
          </div>
          <!-- tombol absen -->
          <button type="button" class="btn btn-outline-success ms-3 mt-5">Absen</button>
        </form>
        <div class="container bg-body-tertiary mt-5 d-flex justify-content-center">
          <button type="button" class="btn btn-warning">klik tombol ini jika tidak masuk/absen</button>
        </div>
      </div>
    </div>
    <footer class="bg-secondary text-center p-3 text-white">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati debitis qui, dolores facere necessitatibus incidunt quibusdam quos, accusamus soluta, illo ea consequatur velit ad. Modi, qui a? Vel, iure dicta.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>
