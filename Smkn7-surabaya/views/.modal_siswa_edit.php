
<div id="edit" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Siswa</h4>
			</div>
			<form id="form" enctype="multipart/form-data">
				<div class="modal-body" id="modal-edit">
					<div class="form-group">
						<label class="control-label" for="nm_siswa">Nama Siswa</label>
						<input type="hidden" name="id_nomor" id="id_nomor">
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
						<input type="email" name="email" class="form-control" id="email" required>
					</div>

					<div class="form-group">
						<label class="control-label" for="gbr_ijazah">File Ijazah</label>
						<option value="" disabled selected>Noted : Format file harus .pdf</option>
						<input type="file" name="gbr_ijazah" class="form-control" id="gbr_ijazah">
						<div style="padding-bottom:5px">
							<img src="" width="80px" id="pict_ijazah">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label" for="foto_skhun">File SKHUN</label>
						<option value="" disabled selected>Noted : Format file harus .pdf</option>
						<div style="padding-bottom:5px">
						<input type="file" name="foto_skhun" class="form-control" id="foto_skhun">
							<img src="" width="80px" id="pict_skhun">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="jurusan">Jurusan</label>
						<input type="text" name="jurusan_siswa" class="form-control" id="jurusan" required>
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
					<input type="submit" class="btn btn-success" name="edit" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).on("click", "#edit_siswa", function() {
	var idnomor = $(this).data('id');
	var nmsiswa = $(this).data('nama');
	var nonipd = $(this).data('nipd');
	var jeniskelamin = $(this).data('jenis');
	var nonisn = $(this).data('nisn');
	var tmptlahir = $(this).data('tempat');
	var tgllahir = $(this).data('tanggal');
	var nonik = $(this).data('nik');
	var agama = $(this).data('agama');
	var almtsiswa = $(this).data('almt');
	var hp = $(this).data('hp');
	var email = $(this).data('email');
	var gbrijazah = $(this).data('gbr');
	var gbrskhun = $(this).data('foto');
	var jurusansiswa = $(this).data('jurusan');
	var thnlulus = $(this).data('tahun');

	// Isi nilai ke dalam modal
	$("#modal-edit #id_nomor").val(idnomor);
	$("#modal-edit #nm_siswa").val(nmsiswa);
	$("#modal-edit #no_nipd").val(nonipd);
	$("#modal-edit #jenis_kelamin").val(jeniskelamin);
	$("#modal-edit #no_nipd").val(nonisn);
	$("#modal-edit #tmpt_lahir").val(tmptlahir);
	$("#modal-edit #tgl_lahir").val(tgllahir);
	$("#modal-edit #no_nik").val(nonik);
	$("#modal-edit #agama").val(agama);
	$("#modal-edit #almt_siswa").val(almtsiswa);
	$("#modal-edit #hp").val(hp);
	$("#modal-edit #email").val(email);
	$("#modal-edit #pict_ijazah").attr("scr", "assets/img/ijazah/"+gbr_ijazah);
	$("#modal-edit #pict_skhun").attr("scr", "assets/img/skhun/"+foto_skhun);
	$("#modal-edit #jurusan_siswa").val(jurusansiswa);
	$("#modal-edit #thn_lulus").val(thnlulus);
})

$(document).ready(function(e) {
	$("#form").on("submit", (function(e) {
		e.preventDefault();
		$.ajax({
			url : 'models/proses_edit_siswa.php',
			type : 'POST',
			data : new FormData(this),
			contentType : false,
			cache : false,
			processData : false,
			success : function(msg) {
				$('.table').html(msg);
				
			}
		});
	}));
})
</script>
