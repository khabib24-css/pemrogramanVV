<?php
session_start();
require '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['absen']))
{

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // die();

    $data = [
        'id_karyawan' => $_SESSION['user']['id_karyawan'],
        'tanggal' => $_POST['tanggal'],
        'jam' => $_POST['jam']
    ];

    $simpan = hadir($db,$data);

    if ($simpan['status']) {
    $_SESSION['success'] = $simpan['pesan'];
    } else {
    $_SESSION['error'] = $simpan['pesan'];
}
    header("Location: karyawan.php");
    exit;
}




?>