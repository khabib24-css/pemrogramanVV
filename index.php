<?php
session_start();
require './functions/functions.php';

if(isset($_POST["login"]))
{
  $nama = $_POST["username"];
  $password = $_POST["password"];
  $resault = mysqli_query($db,"SELECT * FROM data_karyawan WHERE username = '$nama'");

  if (mysqli_num_rows($resault) === 1) {
    $datauser = mysqli_fetch_assoc($resault);
    if($password === $datauser["password"])
    {

      $_SESSION['user'] = [
    'id_karyawan' => $datauser['id_karyawan'],
    'jabatan'     => $datauser['jabatan'],
    ];
      // $_SESSION['id_karyawan'] = $datauser['id_karyawan'];
      // $_SESSION['username'] = $datauser['username'];
      // $_SESSION['jabatan'] = $datauser['jabatan'];
      // $_SESSION['nama_lengkap'] = $datauser['nama_lengkap'];
      // $_SESSION['foto'] = $datauser['foto'];

      // variabel
      $tujuan_halaman = '';
      $pesan = '';
      // akhir variable

      if ($datauser['jabatan'] === 'manager')
      {
        $tujuan_halaman = './admin/index.php';
        $pesan = 'Selamat Datang Di Halaman Admin';
      } else if ($datauser['jabatan'] === 'karyawan' || $datauser['jabatan'] === 'it')
      {
        $tujuan_halaman = './karyawan/karyawan.php';
        $pesan = 'Selamat Datang Di Halaman Karyawan';
      } 


      // echo "<script>
      //     Swal.fire({
      //     icon : 'success',
      //     title : 'Login Berhasil',
      //     text : '$pesan',
      //     showConfirmButton : false,
      //     timer : 1500
      //     }).then(()=> {
      //       window.location.href = '$tujuan_halaman';
      //     });
      //      </script>";
      //      exit;
      echo "<script>
      alert('$pesan');
      window.location.href = '$tujuan_halaman';
      </script>";
      exit;
    }
  }
  // echo "<script>
  //         Swal.fire({
  //         icon : 'error',
  //         title : 'Gagal',
  //         text : 'Periksa Username atau Password',
  //         confirmButtonText : 'Coba Lagi'
  //         });
  //          </script>";
  $error = true;
}


?>









<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form class="form" method="post">
      <h2 class="login">LOGIN</h2>
      <?php 
  if (isset($_SESSION['error'])): ?>
    <p style="color: red; font-weight:bold;"><?= $_SESSION['error'] ?></p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

      <?php if (isset($error)):?>
        <p style="color:chocolate; font-style:italic">username / password salah</p>
        <?php endif; ?>
      <div class="kotak">
        <label for="" class="form-label">USERNAME</label>
        <input type="text" name="username" class="form-control" id="" placeholder="gunakan nama depan ketika daftar"/>
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="pass form-control" id="exampleInputPassword1" />
        <p>Belum punya akun ? <a href="./pendaftaran/pendaftaran2.php">Daftar disini</a></p>
      </div>
      <div class="tombol">
        <button type="submit" class="button" name="login">Log in</button>
      </div>
    </form>
  </body>
</html>
