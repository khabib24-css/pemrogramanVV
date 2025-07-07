<?php
session_start();
require '../functions/functions.php';


$id = $_GET["id"];

// query data berdasarkan id
$datauser = query("SELECT * FROM data_karyawan WHERE id_karyawan = $id")[0];

if (isset($_POST["edit"]))
{
    if (ubah($_POST) > 0)
    {
        echo "
				<script>
					alert('yuhuuu data berhasil diupdate');
					document.location.href = 'data_karyawan.php';
					</script>
			";
    }else{
        echo "
				<script>
					alert('oooops data tidak berhasil diupdate');
					document.location.href = 'data_karyawan.php';
					</script>
			";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-primary text-white">
            Edit Data Karyawan
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              
              <!-- id_karyawan hidden -->
              <input type="hidden" name="Bid_karyawan" value="<?= $datauser["id_karyawan"] ;?>">

              <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="Bnama_lengkap" value="<?= $datauser["nama_lengkap"] ;?>">
              </div>

              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="Busername" value="<?= $datauser["username"] ;?>">
              </div>

              <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-select" id="jabatan" name="Bjabatan" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <option value="it" <?= $datauser["jabatan"] == "it" ? "selected" : ""; ?>>IT</option>
                    <option value="manager" <?= $datauser["jabatan"] == "manager" ? "selected" : ""; ?>>Manager</option>
                </select>
                </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="Bemail" value="<?= $datauser["email"] ;?>">
              </div>

              <div class="mb-3">
                <label for="foto" class="form-label">Foto (jika ingin diganti)</label>
                <input type="hidden" name="fotoLama" value="<?= $datauser["foto"] ;?>">
                <input type="file" class="form-control" id="foto" name="Bfoto"> <br>
                <img src="../karyawan/img/<?= $datauser["foto"] ? $datauser["foto"] : 'default.png'; ?>" width="50"> <br>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="Bpassword" value="<?= $datauser["password"] ;?>">
              </div>

              <div class="mb-3">
                <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                <input type="text" class="form-control" id="konfirmasi_password" name="Bkonfirmasi_password" value="<?= $datauser["konfirmasi_password"] ;?>">
              </div>

              <button name="edit" type="edit" class="btn btn-primary" >edit</button>
              <a href="data_karyawan.php" class="btn btn-secondary">Batal</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>