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
      echo "
				<script>
					alert('yuhuuu data berhasil ditambahkan');
					document.location.href = '../index.php';
					</script>
			";
      // header("Location: ../index.php");
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
    <title>Pendaftaran | Karyawa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/stylee.css" />
  </head>
  <body>
    <div class="form-wrapper">
      <div class="form-box">
        <h2 class="judul">Form pendaftaran</h2>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <!-- kotak 01 -->
            <label for="NamaDepan">Nama Lengkap</label>
            <input name="namalengkap" type="text" id="NamaDepan" class="form-input" />
          </div>
          <div class="form-group">
            <label for="NamaBelakang">Username</label>
            <input name="username" type="text" id="NamaBelakang" class="form-input" />
          </div>
          <div class="form-group">
            <label for="TanggalLahir">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-select" required>
              <option value="">Pilih Jabatan</option>
              <option value="it">IT</option>
              <option value="manager">Manager</option>
              <option value="karyawan">Karyawan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input name="email" type="email" id="email" class="form-input" />
          </div>
          <div class="form-group">
            <label for="">Foto</label>
            <input name="gambar" type="file" id="gambar" class="form-input" />
          </div>
          <div class="form-group">
            <label for="email">Password</label>
            <input name="password" type="password" id="password" class="form-input" />
          </div>
          <div class="form-group">
            <label for="NoTelp">Konfirmasi Password</label>
            <input name="konfirmasi" type="password" id="password" class="form-input" />
          </div>
          <div class="form-group">
            <button name="regis" type="submit" class="form-button">Daftar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
