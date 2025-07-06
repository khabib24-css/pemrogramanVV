<?php
sleep(1);
require '../../functions/functions.php';

$keyword = $_GET["keyword"];
$query = " SELECT * FROM absen 
            WHERE 
            tanggal LIKE '%$keyword%'
            OR
            username LIKE '%$keyword%'
            ";

$Sabsen = query($query);
?>




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
        <td><?= $data["username"] ?></td>
        <td>
          <?php if (!empty($data["foto"])) : ?>
            <img src="../karyawan/img/<?= $data["foto"] ?>" width="50" height="50" alt="">
          <?php else : ?>
            Tidak Ada
          <?php endif; ?>
        </td>
        <td><?= $data["tanggal"] ?></td>
        <td><?= $data["jam"] ?></td>
        <td><?= $data["keterangan"] ?></td>
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