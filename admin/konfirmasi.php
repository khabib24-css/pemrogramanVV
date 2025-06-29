<?php
require '../functions/functions.php';


if (isset($_GET["id"]) && isset($_GET["aksi"]))
{
    $id = $_GET["id"];
    $aksi = $_GET["aksi"];

    if ($aksi == "setujui")
    {
        $status = "Disetujui";
        $pesan = "Izin Berhasil Disetujui";
    } elseif ($aksi == "tolak")
    {
        $status = "Ditolak";
        $pesan = "Izin Berhasil Ditolak";
    } else {
        header("Location: DataIzin.php");
    }

    $Ustatus = updatestatus($id,$status);

    if ($Ustatus > 0)
    {
        echo "<script> alert('$pesan')
        window.location.href = 'DataIzin.php'
        </script>";
    } else {
        echo "<script> alert('GAGAL')
        window.location.href = 'DataIzin.php'
        </script>";
    }
} else {
    header("Location: DataIzin.php");
    exit;
}




?>