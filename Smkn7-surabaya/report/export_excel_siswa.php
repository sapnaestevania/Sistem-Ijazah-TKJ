<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_siswa.php";
$connection = new Database($host, $user, $pass, $database);
$siswa = new Siswa($connection);

$fileName = "excel_siswa-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename=$fileName");
header("Content-Type: application/vnd.ms-excel");
?>
<table border="1px">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>NIPD</th>
		<th>JK</th>
		<th>NISN</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>NIK</th>
		<th>Agama</th>
		<th>Alamat</th>
		<th>HP</th>
		<th>E-mail</th>
		<th>Ijazah</th>
		<th>SKHUN</th>
		<th>Jurusan</th>
		<th>Tahun Lulus</th>
	</tr>
	<?php
	$no = 1;
	$tampil = $siswa->tampil();
	while ($data = $tampil->fetch_object()) {
		echo "<tr>";
		echo "<td align=center>".$no++."</td>";
		echo "<td>".$data->nama_siswa."</td>";
		echo "<td>".$data->No_nipd."</td>";
		echo "<td>".$data->jenis_kelamin."</td>";
		echo "<td>".$data->No_nisn."</td>";
		echo "<td>".$data->tempat_lahir."</td>";
		echo "<td>".$data->tanggal_lahir."</td>";

		// Untuk kolom NIK, format sebagai teks menggunakan tag style Excel (format teks)
		echo "<td style='mso-number-format:\\@;'>".$data->No_nik."</td>";

		echo "<td>".$data->agama."</td>";
		echo "<td>".$data->alamat_siswa."</td>";

		// Untuk kolom HP, format sebagai teks menggunakan tag style Excel (format teks)
		echo "<td style='mso-number-format:\\@;'>".$data->HP."</td>";

		echo "<td>".$data->email."</td>";
		echo "<td>".$data->gbr_ijazah."</td>";
		echo "<td>".$data->foto_skhun."</td>";
		echo "<td>".$data->jurusan."</td>";
		echo "<td>".$data->tahun_lulus."</td>";
		echo "</tr>";
	}
	?>
</table>
