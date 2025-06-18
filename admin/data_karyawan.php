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
        <div class="d-flex justify-content-end">
          <button id="tombol_logout" class="btn btn-primary" type="submit" class="btn btn-primary" type="button">Log out</button>
        </div>
      </div>
    </nav>
    <!-- sidebar -->
    <div class="d-flex">
      <div class="bg-light p-3" style="width: 200px; height: 100vh">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../admin/index.html">Beranda</a>
          </li>
          <li class="nav-item border border-5 rounded-5 bg-info-subtle active">
            <a class="nav-link" href="#">Data Karyawan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Data Absensi</a>
          </li>
        </ul>
      </div>
      <!-- main -->
      <div class="p-4 flex-grow-1 bg-dark-subtle">
        <!-- table data karyawan -->
        <div class="container mt-4">
          <!-- baris "Data Karyawan" & searching" -->
          <div class="d-flex justify-content-between">
            <h2>Data Karyawan</h2>
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
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Tempat & Tanggal lahir</th>
                  <th>Jenis kelamin</th>
                  <th>Alamat</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Yanto</td>
                  <td>Yagyakarta / 19-09-1995</td>
                  <td>Laki=laki</td>
                  <td>Jl. Wonocolo Gg.05</td>
                  <td>Staff</td>
                  <td>Aktif</td>
                  <td>
                    <img src="../admin/img/yanto.jpg" class="img-thumbnail" width="50" height="50" alt="yanto" />
                  </td>
                  <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">delete</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Yanti</td>
                  <td>Yagyakarta / 19-09-1995</td>
                  <td>Laki=laki</td>
                  <td>Jl. Wonocolo Gg.05</td>
                  <td>Staff</td>
                  <td>inAktif</td>
                  <td>
                    <img src="../admin/img/yanti.jpg" class="img-thumbnail" width="50" height="50" alt="yanti" />
                  </td>
                  <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">delete</button>
                  </td>
                </tr>
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
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const tombol = document.getElementById("tombol_logout");

        tombol.addEventListener("click", function () {
          tombol.innerHTML = '<i class="bi bi-box-arrow-in-right"></i>';

          setTimeout(function () {
            window.location.href = "index.html";
          });
        });
      });
    </script>
  </body>
</html>
