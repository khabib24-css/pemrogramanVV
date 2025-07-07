<?php
session_start();
require '../functions/functions.php';

$id_delete = $_GET["id"];

if (hapus($id_delete) > 0)
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
					alert('oooops data tidak berhasil dihapus');
					document.location.href = 'data_karyawan.php';
					</script>
			";
}













?>