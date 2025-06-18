<?php
$db = mysqli_connect("localhost","root","root","tadika_mesra");

function query($query) {
    global $db;
    $lemari = mysqli_query($db,$query);
    $kotak = [];
    while ($list = mysqli_fetch_assoc($lemari))
    {
        $kotak[] = $list;
    }
    return $kotak;
}


// ===> register ==== tambah <===//
function register ($signup)
{
    global $db;
    $NamaKaryawan = strtolower(trim( stripslashes($signup["namalengkap"] ?? '')));
    $UserName = strtolower(trim( stripslashes($signup["username"] ?? '')));
    $Jabatan = strtolower(trim( $signup["jabatan"]?? ''));
    $Email = trim( $signup["email"] ?? '');
    $foto = upload();
    if(!$foto)
    {
        return false;
    }
    $Password = trim( $signup["password"] ?? '');
    $Konfirmasi = trim( $signup["konfirmasi"] ?? '');

    // debugging
    // echo "<pre>";
    // print_r([
    //     'namalengkap' => $NamaKaryawan,
    //     'username' => $UserName,
    //     'jabatan' => $Jabatan,
    //     'email' => $Email,
    //     'password' => $Password,
    //     'konfirmasi' => $Konfirmasi,
    // ]);
    // echo "</pre>";

    // Stop proses agar tidak lanjut insert
    // exit;

    if (empty($NamaKaryawan) || empty($UserName) || empty($Jabatan) || empty($Email) || empty($Password) || empty($Konfirmasi))
    {
        return 0;
    }
    
    mysqli_query($db, "INSERT INTO data_karyawan 
(nama_lengkap, username, jabatan, email, foto, password, konfirmasi_password) 
VALUES 
('$NamaKaryawan', '$UserName', '$Jabatan', '$Email','$foto', '$Password', '$Konfirmasi')");
    return mysqli_affected_rows($db);
}

// pengaturan img
function upload()
{
    $namaFIle = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // if ($error === 4)
    // {

    // }
    $typeGambarValid = ['jpg','jpeg','png'];
    $typeGambar = explode('.', $namaFIle);
    $typeGambar = strtolower(end($typeGambar));
    if(!in_array($typeGambar,$typeGambarValid))
    {
        echo "<script> alert('yang anda upload bukan gambar ')</script>";
		return false;
    }

    if ($ukuranFile > 1000000)
    {
        echo "<script> alert('ukuran terlalu BESAR')</script>";
		return false;
    }

    $namaFIleBaru = uniqid();
    $namaFIleBaru .= '.';
    $namaFIleBaru .= $typeGambar;

    move_uploaded_file($tmpName,'../karyawan/img/'. $namaFIleBaru);
    return $namaFIleBaru;
} 

?>