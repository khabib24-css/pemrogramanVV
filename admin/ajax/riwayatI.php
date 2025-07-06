<?php
sleep(1);
require '../../functions/functions.php';

$keyword = $_GET["keyword"];
$query = " SELECT * FROM perizinan 
            WHERE 
            nama_lengkap LIKE '%$keyword%'
            OR
            tanggal_pengajuan LIKE '%$keyword%'
            ";

$Sizin = query($query);
?>




<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>jabatan</th>
        <th>jenis izin</th>
        <th>tanggal mulai</th>
        <th>tanggal berakhir</th>
        <th>jumlah hari</th>
        <th>alasan</th>
        <th>bukti</th>
        <th>status</th>
        <th>tanggal pengajuan</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($Sizin) > 0) : ?>
      <?php $i = 1 ?>
      <?php foreach ($Sizin as $data) : ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $data["nama_lengkap"] ?></td>
        <td><?= $data["jabatan"] ?></td>
        <td><?= $data["jenis_izin"] ?></td>
        <td><?= $data["tanggal_mulai"] ?></td>
        <td><?= $data["tanggal_berakhir"] ?></td>
        <td><?= $data["jumlah_hari"] ?></td>
        <td><?= $data["alasan_izin"] ?></td>
        <td> <?php if (!empty($data["bukti"])) :?>
                  <img src="../karyawan/img/bukti/<?=$data["bukti"] ?>" width="50" height="50" alt="">
                  <?php else :?>
                    Tidak Ada
                  <?php endif; ?>
                  </td>
        <td><?= $data["status"] ?></td>
        <td><?= $data["tanggal_pengajuan"] ?></td>
      </tr>
      <?php $i++ ?>
      <?php endforeach; ?>
      <?php else : ?>
        <tr>
        <td colspan="6" class="text-center">Tidak ada yang absen hari ini</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>