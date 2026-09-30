<div id="tambah" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Data Siswa</h4>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label" for="nm_siswa">Nama Siswa</label>
						<input type="text" name="nm_siswa" class="form-control" id="nm_siswa" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="no_nipd">NIPD</label>
						<input type="text" name="no_nipd" class="form-control" id="no_nipd" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
									<option value="" disabled selected>-Pilih Jenis Kelamin-</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
								</select>
							</div>
					<div class="form-group">
						<label class="control-label" for="no_nisn">NISN</label>
						<input type="number" name="no_nisn" class="form-control" id="no_nisn" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="tmpt_lahir">Tempat Lahir</label>
						<input type="text" name="tmpt_lahir" class="form-control" id="tmpt_lahir" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
						<input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="no_nik">NIK</label>
						<input type="number" name="no_nik" class="form-control" id="no_nik" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="agama">Agama</label>
							<select name="agama" class="form-control" id="agama" required>
									<option value="" disabled selected>-Pilih Agama-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
							</div>
					<div class="form-group">
						<label class="control-label" for="almt_siswa">Alamat</label>
						<input type="text" name="almt_siswa" class="form-control" id="almt_siswa" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="hp">HP</label>
						<input type="number" name="hp" class="form-control" id="hp" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="email">Email</label>
						<input type="text" name="email" class="form-control" id="email" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="gbr_ijazah">Ijazah</label>
						<option value="" disabled selected>Noted : Format file harus .pdf</option>
						<input type="file" name="gbr_ijazah" class="form-control" id="gbr_ijazah" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="foto_skhun">SKHUN</label>
						<option value="" disabled selected>Noted : Format file harus .pdf</option>
						<input type="file" name="foto_skhun" class="form-control" id="foto_skhun" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="jurusan_siswa">Jurusan</label>
						<input type="text" name="jurusan_siswa" class="form-control" id="jurusan_siswa" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="thn_lulus">Tahun Lulus</label>
						<select name="thn_lulus" class="form-control" id="thn_lulus" required>
						<option value="" disabled selected>-Pilih Tahun Lulus-</option>
       				 <?php
       			 // Loop untuk menampilkan pilihan tahun (misalnya dari 1980 hingga tahun sekarang)
       			 $currentYear = date('Y'); // Tahun saat ini
       			 for ($year = $currentYear; $year >= 2000; $year--) {
          			  echo "<option value='$year'>$year</option>";
      				  }
       				 ?>
   				 </select>
					</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger">Reset</button>
					<input type="submit" class="btn btn-success" name="tambah" value="Simpan">
				</div>
			</div>
			</form>
			
			<?php
			if(@$_POST['tambah']) {
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
				$gbr_ijazah = $connection->conn->real_escape_string($_POST['gbr_ijazah']);
				$foto_skhun = $connection->conn->real_escape_string($_POST['foto_skhun']);
				$jurusan_siswa = $connection->conn->real_escape_string($_POST['jurusan_siswa']);
				$thn_lulus = $connection->conn->real_escape_string($_POST['thn_lulus']);

				// Proses upload ijazah
				$gbr_ijazah = $_FILES['gbr_ijazah']['name'];
				$sumber_ijazah = $_FILES['gbr_ijazah']['tmp_name'];
				$upload_ijazah = move_uploaded_file($sumber_ijazah, "assets/img/ijazah/" . $gbr_ijazah);
				
				// Proses upload SKHUN
				$foto_skhun = $_FILES['foto_skhun']['name'];
				$sumber_skhun = $_FILES['foto_skhun']['tmp_name'];
				$upload_skhun = move_uploaded_file($sumber_skhun, "assets/img/skhun/" . $foto_skhun);
			
				// Cek jika kedua file berhasil di-upload
				if ($upload_ijazah && $upload_skhun) {
					$siswa->tambah($nm_siswa, $no_nipd, $jenis_kelamin, $no_nisn, $tmpt_lahir, $tgl_lahir, $no_nik, $agama, $almt_siswa, $hp, $email, $gbr_ijazah, $foto_skhun, $jurusan_siswa, $thn_lulus);
					header("location: ?page=siswa");
				} else {
					echo "<script>alert('Upload gambar gagal!')</script>";
				}
			}
			?>
		</div>
	</div>
</div>