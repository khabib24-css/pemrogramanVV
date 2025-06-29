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

function Bizin()
{
    $namaFIle = $_FILES['bukti']['name'];
    $ukuranFile = $_FILES['bukti']['size'];
    $error = $_FILES['bukti']['error'];
    $tmpName = $_FILES['bukti']['tmp_name'];

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

    move_uploaded_file($tmpName,'../karyawan/img/bukti/'. $namaFIleBaru);
    return $namaFIleBaru;
}

function Pizin($perizinan)
{
    global $db;

    $id_karyawan = $_SESSION['user']['id_karyawan'] ?? null;
    if(!$id_karyawan) return false;

    $jenis_izin       = htmlspecialchars(trim($perizinan['jenis_izin'] ?? ''));
    $tanggal_mulai    = htmlspecialchars(trim($perizinan['tanggal_mulai'] ?? ''));
    $tanggal_berakhir = htmlspecialchars(trim($perizinan['tanggal_berakhir'] ?? ''));
    $jumlah_hari      = htmlspecialchars(trim($perizinan['jumlah_hari'] ?? ''));
    $alasan           = htmlspecialchars(trim($perizinan['alasan_izin'] ?? ''));


    $ambil = mysqli_query($db,"SELECT * FROM data_karyawan WHERE id_karyawan = '$id_karyawan'");
    $karyawan = mysqli_fetch_assoc($ambil);
    $nama = $karyawan['nama_lengkap'];
    $jabatan = $karyawan['jabatan'];

    $bukti = Bizin();
    if(!$bukti)
    {
        return false;
    }

    if (empty($jenis_izin) || empty($tanggal_mulai) || empty($tanggal_berakhir) || empty($jumlah_hari) || empty($alasan))
    {
        return false;
    }

    // proses insert
    mysqli_query($db,"INSERT INTO perizinan 
    (id_karyawan,nama_lengkap, jabatan, jenis_izin, tanggal_mulai, tanggal_berakhir, jumlah_hari, alasan_izin, bukti) values
    ('$id_karyawan','$nama', '$jabatan', '$jenis_izin', '$tanggal_mulai', '$tanggal_berakhir', '$jumlah_hari', '$alasan', '$bukti')");

     return mysqli_affected_rows($db);
    
}

function getToday()
{
    return date('2025-07-02');
}

function CekIzin($id_karyawan)
{
    global $db;
    // $tanggal = date('y-m-d');
    // //cek masa aktif uzun
    // $tanggal = date('2025-06-30');
    $tgl = getToday();

    $query = mysqli_query($db, "SELECT * FROM perizinan WHERE id_karyawan = '$id_karyawan'
    AND '$tgl' BETWEEN tanggal_mulai AND tanggal_berakhir AND status != 'Ditolak'");
    return mysqli_num_rows($query) > 0;
}


function CekAbsen($id_karyawan)
{
    global $db;
    // $today = date('y-m-d');
    $tgl = getToday();
    $query = mysqli_query($db, "SELECT * FROM absen WHERE id_karyawan = '$id_karyawan' AND tanggal = '$tgl'");
    return mysqli_num_rows($query) > 0;
}


function updatestatus($id_izin, $status)
{
    global $db;

    $query = mysqli_query($db, "UPDATE perizinan SET status = '$status' WHERE id_izin = '$id_izin'");

    return mysqli_affected_rows($db);
}

function hadir ($db, $data)
{
    $id_karyawan = $data['id_karyawan'];
    $tanggal = $data['tanggal'];
    $jam = $data['jam'];

    $cek = mysqli_query($db, "SELECT * FROM absen WHERE id_karyawan = '$id_karyawan' AND tanggal = '$tanggal'");

    if (mysqli_num_rows($cek) > 0)
    {
        return [
            'status' => false,
            'pesan' => 'Anda sudah absen'
        ];
    }


    $query = mysqli_query($db, "
    INSERT INTO absen (id_karyawan, tanggal, jam, keterangan)
    VALUES ('$id_karyawan', '$tanggal', '$jam', 'hadir')");

    if ($query) 
    {
        return [
            'status' => true,
            'pesan' => 'Absen berhasil'
        ];
    } else {
        return [
            'status' => false,
            'pesan' => 'error'
        ];
    }
}




?>