<div class="bg-light p-3" style="width: 200px; height: 100vh">
  <ul class="nav flex-column">

    <!-- Beranda -->
    <li class="nav-item <?= ($halaman === 'index') ? 'border border-5 rounded-5 bg-info-subtle' : '' ?>">
      <a class="nav-link" href="./index.php">Beranda</a>
    </li>
    <!-- akhir beranda -->

    <!-- Data Karyawan -->
    <li class="nav-item <?= ($halaman === 'data_karyawan') ? 'border border-5 rounded-5 bg-info-subtle' : '' ?>">
      <a class="nav-link" href="./data_karyawan.php">Data Karyawan</a>
    </li>
    <!-- akhir data karyawan -->

    <!-- Dropdown Absensi -->
    <li class="nav-item dropdown <?= in_array($halaman, ['DataHadir', 'DataIzin', 'riwayatHadir', 'riwayatIzin']) ? 'border border-5 rounded-5 bg-info-subtle' : '' ?>">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        Data Absensi
      </a>
      <ul class="dropdown-menu">
        <li>
          <a class="dropdown-item <?= ($halaman === 'DataHadir') ? 'active' : '' ?>" href="./DataHadir.php">Hadir</a>
        </li>
        <li>
          <a class="dropdown-item <?= ($halaman === 'DataIzin') ? 'active' : '' ?>" href="./DataIzin.php">Izin</a>
        </li>
        <li>
          <a class="dropdown-item <?= ($halaman === 'riwayatHadir') ? 'active' : '' ?>" href="./riwayatHadir.php">Riwayat Hadir</a>
        </li>
        <li>
          <a class="dropdown-item <?= ($halaman === 'riwayatIzin') ? 'active' : '' ?>" href="./riwayatIzin.php">Riwayat Izin</a>
        </li>
      </ul>
    </li>
<!-- akhir dropdown -->
  </ul>
</div>
