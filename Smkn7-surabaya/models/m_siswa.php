<?php
class Siswa {

	private $mysqli;

	function __construct($conn) {
		$this->mysqli = $conn;
	}

	// Tampilkan semua data atau berdasarkan ID
	public function tampil($id = null) {
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tb_siswa";
		if($id != null) {
			$sql .= " WHERE id_nomor = '$id'";
		}
		$query = $db->query($sql) or die($db->error);
		return $query;
	}

	// Tampilkan data berdasarkan jurusan
	public function tampil_tgl($tgl1, $tgl2) {
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tb_siswa WHERE tgl_publish BETWEEN '$tgl1' AND '$tgl2'";
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}

	

	// Tambah data siswa
	public function tambah($nm_siswa, $no_nipd, $jenis_kelamin, $no_nisn, $tmpt_lahir, $tgl_lahir, $no_nik, $agama, $almt_siswa, $hp, $email, $gbr_ijazah, $foto_skhun, $jurusan_siswa, $tahun_lulus) {
		$db = $this->mysqli->conn;

		// Ubah format tanggal lahir jika diperlukan
		$tgl_lahir = date('Y-m-d', strtotime($tgl_lahir)); // Format menjadi YYYY-MM-DD

		$db->query("INSERT INTO tb_siswa VALUES ('', '$nm_siswa', '$no_nipd', '$jenis_kelamin', '$no_nisn', '$tmpt_lahir', '$tgl_lahir', '$no_nik', '$agama', '$almt_siswa', '$hp', '$email', '$gbr_ijazah', '$foto_skhun', '$jurusan_siswa', '$tahun_lulus', now())") or die($db->error);
	}

	// Edit data siswa
	public function edit($sql) {
		$db = $this->mysqli->conn;
		$db->query($sql) or die($db->error);
	}

	// Hapus data siswa berdasarkan ID
	public function hapus($id) {
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM tb_siswa WHERE id_nomor = '$id'") or die($db->error);
	}

	// Tutup koneksi database
	function __destruct() {
		$db = $this->mysqli->conn;
		$db->close();
	}
}
?>
