<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_siswa.php";

$connection = new Database($host, $user, $pass, $database);
$siswa = new Siswa($connection);

$id_nomor = $_POST['id_nomor'];
$nm_siswa = $connection->conn->real_escape_string($_POST['nm_siswa']);
$no_nipd = $connection->conn->real_escape_string($_POST['no_nipd']);
$jenis_kelamin = $connection->conn->real_escape_string($_POST['jenis_kelamin']);
$no_nisn = $connection->conn->real_escape_string($_POST['no_nisn']);
$tmpt_lahir = $connection->conn->real_escape_string($_POST['tmpt_lahir']);
$tgl_lahir = $connection->conn->real_escape_string($_POST['tgl_lahir']);
$no_nik = $connection->conn->real_escape_string($_POST['no_nik']);
$agama = $connection->conn->real_escape_string($_POST['agama']);
$almt_siswa = $connection->conn->real_escape_string($_POST['almt_siswa']);
$hp = $connection->conn->real_escape_string($_POST['hp']);
$email = $connection->conn->real_escape_string($_POST['email']);
$jurusan_siswa = $connection->conn->real_escape_string($_POST['jurusan_siswa']);
$thn_lulus = $connection->conn->real_escape_string($_POST['thn_lulus']);

$pict_ijazah = $_FILES['gbr_ijazah']['name'];
$extensi = explode(".", $_FILES['gbr_ijazah']['name']);
$gbr_ijazah = $_FILES['gbr_ijazah']['name'];
$sumber_ijazah = $_FILES['gbr_ijazah']['tmp_name'];

if($pict_ijazah == '') {
	// Jika tidak ada gambar baru, update data tanpa mengubah gambar
	$siswa->edit("UPDATE tb_siswa SET nama_siswa= '$nm_siswa', No_nipd = '$no_nipd', jenis_kelamin = '$jenis_kelamin', No_nisn = '$no_nisn', tempat_lahir = '$tmpt_lahir', tanggal_lahir = '$tgl_lahir', No_nik = '$no_nik', agama = '$agama', alamat_siswa = '$almt_siswa', HP = '$hp', email = '$email', foto_skhun = '$foto_skhun', jurusan = '$jurusan_siswa', tahun_lulus = '$thn_lulus' WHERE id_nomor = '$id_nomor'");
	echo "<script>window.location='?page=siswa';</script>";
} else {
	$gbr_awal = $siswa->tampil($id_nomor)->fetch_object()->gbr_ijazah;
		unlink("../assets/img/ijazah/".$gbr_awal);
	
	$upload = move_uploaded_file($sumber_ijazah, "../assets/img/ijazah/".$gbr_ijazah);
	if($upload) {
	$siswa->edit("UPDATE tb_siswa SET nama_siswa= '$nm_siswa', No_nipd = '$no_nipd', jenis_kelamin = '$jenis_kelamin', No_nisn = '$no_nisn', tempat_lahir = '$tmpt_lahir', tanggal_lahir = '$tgl_lahir', No_nik = '$no_nik', agama = '$agama', alamat_siswa = '$almt_siswa', HP = '$hp', email = '$email', gbr_ijazah = '$gbr_ijazah', foto_skhun = '$foto_skhun', jurusan = '$jurusan_siswa', tahun_lulus = '$thn_lulus' WHERE id_nomor = '$id_nomor'");
		echo "<script>window.location='?page=siswa';</script>";
	} else {
		echo "<script>alert('Upload gambar gagal!')</script>";
	}
}   


$pict_skhun = $_FILES['foto_skhun']['name'];
$extensi = explode(".", $_FILES['foto_skhun']['name']);
$foto_skhun = $_FILES['foto_skhun']['name'];
$sumber_skhun = $_FILES['foto_skhun']['tmp_name'];

if($pict_skhun == '') {
	// Jika tidak ada gambar baru, update data tanpa mengubah gambar
	$siswa->edit("UPDATE tb_siswa SET nama_siswa= '$nm_siswa', No_nipd = '$no_nipd', jenis_kelamin = '$jenis_kelamin', No_nisn = '$no_nisn', tempat_lahir = '$tmpt_lahir', tanggal_lahir = '$tgl_lahir', No_nik = '$no_nik', agama = '$agama', alamat_siswa = '$almt_siswa', HP = '$hp', email = '$email', gbr_ijazah = '$gbr_ijazah', jurusan = '$jurusan_siswa', tahun_lulus = '$thn_lulus' WHERE id_nomor = '$id_nomor'");
	echo "<script>window.location='?page=siswa';</script>";
} else {
	$foto_awal = $siswa->tampil($id_nomor)->fetch_object()->foto_skhun;
		unlink("../assets/img/skhun/".$foto_awal);
	
	$upload = move_uploaded_file($sumber_skhun, "../assets/img/skhun/".$foto_skhun);
	if($upload) {
	$siswa->edit("UPDATE tb_siswa SET nama_siswa= '$nm_siswa', No_nipd = '$no_nipd', jenis_kelamin = '$jenis_kelamin', No_nisn = '$no_nisn', tempat_lahir = '$tmpt_lahir', tanggal_lahir = '$tgl_lahir', No_nik = '$no_nik', agama = '$agama', alamat_siswa = '$almt_siswa', HP = '$hp', email = '$email', gbr_ijazah = '$gbr_ijazah', foto_skhun = '$foto_skhun', jurusan = '$jurusan_siswa', tahun_lulus = '$thn_lulus' WHERE id_nomor = '$id_nomor'");
		echo "<script>window.location='?page=siswa';</script>";
	} else {
		echo "<script>alert('Upload gambar gagal!')</script>";
	}
}  

?>
