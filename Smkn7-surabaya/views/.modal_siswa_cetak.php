
<div id="cetakpdf" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cetak PDF Data Siswa</h4>
			</div>
			<div class="modal-body">
				<form action="./report/cetak_siswa.php" method="post" target="_blank">
					<table>
						<tr>
							<td>
								<div class="form-group">Dari Tanggal</div>
							</td>
							<td align="center" width="5%">
								<div class="form-group">:</div>
							</td>
							<td>
								<div class="form-group">
									<input type="date" class="form-control" name="tgl_1" required>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">Sampai Tanggal</div>
							</td>
							<td align="center">
								<div class="form-group">:</div>
							</td>
							<td>
								<div class="form-group">
									<input type="date" class="form-control" name="tgl_" required>
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input type="submit" name="cetak_siswa" class="btn btn-primary btn-sm" value="Cetak">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="modal-footer">
				<a href="./report/cetak_siswa.php" target="_blank" class="btn btn-primary btn-sm">Cetak Semua Data</a>
			</div>
		</div>
	</div>
</div>