<?php 
require '../functions/functions.php';
// if (!$db)
// {
//   die("koneksi gagal". mysqli_connect_error());
// }else{
//   echo "koneksi berhasil";
// }

if($_SERVER["REQUEST_METHOD"] === "POST")
{

  if (isset($_POST["regis"]))
  {
    $validasi = register($_POST);

    if($validasi)
    {
      header("Location: ../index.php");
      exit;
    }else {
    echo "<script>alert
    ('ooops ! gagal kolom harus diisi atau tidak valid');
    </script>";
    }
  }
}

// $user = query("SELECT * FROM karyawan");

?>










<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran | Dasboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css" />
  </head>
  <body>
    <div class="form-wrapper">
      <div class="form-box">
        <h2 class="judul">Form pendaftaran karyawan</h2>
        <form action="" method="post">
          <div class="form-group">
            <!-- kotak 01 -->
            <label for="NamaDepan">Nama Depan</label>
            <input type="text" name="NamaDepan" id="NamaDepan" class="form-input" />
          </div>
          <div class="form-group">
            <label for="NamaBelakang">Nama Belakang</label>
            <input type="text" name="NamaBelakang" id="NamaBelakang" class="form-input" />
          </div>
          <div class="form-group">
            <label for="TanggalLahir">Tanggal Lahir</label>
            <input type="date" name="tgl" id="TanggalLahir" class="form-input" />
          </div>
          <div class="form-group">
            <label for="JenisKelamin">Jenis Kelamin</label>
            <input type="text" name="kelamin" id="jenisKelamin" class="form-input" />
            <!-- <select name="" id="JenisKelamin" class="form-input">
              <option value="laki">Laki - Laki</option>
              <option value="perempuan">Perempuan</option>
            </select> -->
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-input" />
          </div>
          <div class="form-group">
            <label for="NoTelp">Nomer Telphone</label>
            <input type="text" name="nomer" id="NoTelp" class="form-input" />
          </div>
          <div class="form-group">
            <label for="NoTelp">Password</label>
            <input type="text" name="password" id="NoTelp" class="form-input" />
          </div>
          <div class="form-group">
            <button type="submit" class="form-button" name="regis">Daftar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
  </html>
  





















  
