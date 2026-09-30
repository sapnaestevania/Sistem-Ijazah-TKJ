<?php
error_reporting(E_ALL); // Mengaktifkan pelaporan semua jenis error
ini_set('display_errors', 1);   // Menampilkan error di browser

include "models/m_siswa.php";
$siswa = new Siswa($connection);

if(@$_GET['act'] == '') {
?>
    <div class="row">
      <div class="col-lg-12">
        <h1>Siswa <small>Data Siswa</small></h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i></a></li>
          <li><a href="">Siswa</a></li>
          <li class="active">Data Siswa</li>
        </ol>
       
      </div>
    </div>
    <div class="row">
    <div class="col-lg-12 text-right" style="margin-bottom: 10px;">
        <input type="text" id="searchYear" placeholder="Cari Tahun Lulus">
        <button id="searchButton">Cari</button>
    </div>
</div>

    
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="datatables">
                    <thead>
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Nama</th>
                            <th style="text-align: center">NIPD</th>
                            <th style="text-align: center">Jenis Kelamin</th>
                            <th style="text-align: center">NISN</th>
                            <th style="text-align: center">Tempat Lahir</th>
                            <th style="text-align: center">Tanggal Lahir</th>
                            <th style="text-align: center">NIK</th>
                            <th style="text-align: center">Agama</th>
                            <th style="text-align: center">Alamat</th>
                            <th style="text-align: center">HP</th>
                            <th style="text-align: center">E-mail</th>
                            <th style="text-align: center">Ijazah</th>
                            <th style="text-align: center">SKHUN</th>
                            <th style="text-align: center">Jurusan</th>
                            <th style="text-align: center">Tahun Lulus</th>
                            <th style="text-align: center">Tanggal Publish</th>
                            <th style="text-align: center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $tampil = $siswa->tampil();
                        while($data =  $tampil->fetch_object()) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $no++."."; ?></td>
                            <td align="center"><?php echo $data->nama_siswa; ?></td>
                            <td align="center"><?php echo $data->No_nipd; ?></td>
                            <td align="center"><?php echo $data->jenis_kelamin; ?></td>
                            <td align="center"><?php echo $data->No_nisn; ?></td>
                            <td align="center"><?php echo $data->tempat_lahir; ?></td>
                            <td align="center"><?php echo $data->tanggal_lahir; ?></td>
                            <td align="center"><?php echo $data->No_nik; ?></td>
                            <td align="center"><?php echo $data->agama; ?></td>
                            <td align="center"><?php echo $data->alamat_siswa; ?></td>
                            <td align="center"><?php echo $data->HP; ?></td>
                            <td align="center"><?php echo $data->email; ?></td>
                            <td align="center">
                                <?php
                                // Ambil ekstensi file
                                $file_ext = pathinfo($data->gbr_ijazah, PATHINFO_EXTENSION);

                                // Tampilkan pratinjau berdasarkan tipe file
                                if ($file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'png') {
                                    // Jika gambar, tampilkan sebagai <img>
                                    echo '<img src="assets/img/ijazah/' . $data->gbr_ijazah . '" width="70px">';
                                } elseif ($file_ext == 'pdf') {
                                    // Jika PDF, tampilkan sebagai <embed> untuk pratinjau PDF
                                    echo '<embed src="assets/img/ijazah/' . $data->gbr_ijazah . '" type="application/pdf" width="70px" height="70px">';
                                } else {
                                    // Jika file lain, tampilkan ikon file
                                    echo '<a href="assets/img/ijazah/' . $data->gbr_ijazah . '" target="_blank"><i class="fa fa-file"></i> Lihat File</a>';
                                }
                                ?>
                            </td>

                            <td align="center">
                                <?php
                                // Ambil ekstensi file
                                $file_ext = pathinfo($data->foto_skhun, PATHINFO_EXTENSION);

                                // Tampilkan pratinjau berdasarkan tipe file
                                if ($file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'png') {
                                    // Jika gambar, tampilkan sebagai <img>
                                    echo '<img src="assets/img/skhun/' . $data->foto_skhun . '" width="70px">';
                                } elseif ($file_ext == 'pdf') {
                                    // Jika PDF, tampilkan sebagai <embed> untuk pratinjau PDF
                                    echo '<embed src="assets/img/skhun/' . $data->foto_skhun . '" type="application/pdf" width="70px" height="70px">';
                                } else {
                                    // Jika file lain, tampilkan ikon file
                                    echo '<a href="assets/img/skhun/' . $data->foto_skhun . '" target="_blank"><i class="fa fa-file"></i> Lihat File</a>';
                                }
                                ?>
                            </td>

                            <td align="center"><?php echo $data->jurusan; ?></td>
                            <td align="center"><?php echo $data->tahun_lulus; ?></td>
                            <td align="center"><?=date('d F Y', strtotime($data->tgl_publish)); ?></td>
                            <td align="center">
                                <a id="edit_siswa" data-toggle="modal" data-target="#edit" 
                                    data-id="<?php echo $data->id_nomor; ?>" 
                                    data-nama="<?php echo $data->nama_siswa; ?>" 
                                    data-nipd="<?php echo $data->No_nipd; ?>" 
                                    data-jenis="<?php echo $data->jenis_kelamin; ?>" 
                                    data-nisn="<?php echo $data->No_nisn; ?>" 
                                    data-tempat="<?php echo $data->tempat_lahir; ?>" 
                                    data-tanggal="<?php echo $data->tanggal_lahir; ?>" 
                                    data-nik="<?php echo $data->No_nik; ?>" 
                                    data-agama="<?php echo $data->agama; ?>" 
                                    data-almt="<?php echo $data->alamat_siswa; ?>" 
                                    data-hp="<?php echo $data->HP; ?>" 
                                    data-email="<?php echo $data->email; ?>" 
                                    data-gbr="<?php echo $data->gbr_ijazah; ?>" 
                                    data-foto="<?php echo $data->foto_skhun; ?>"
                                    data-jurusan="<?php echo $data->jurusan_siswa; ?>"
                                    data-thn="<?php echo $data->thn_lulus; ?>"
                                    <button class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</button></a>
                                        
                                <a href="?page=siswa&act=del&id=<?=$data->id_nomor; ?>" onclick="return confirm('Yakin akan menghapus data ini?')"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</button></a> 
                                <a href="./report/cetak_siswa.php?id=<?=$data->id_nomor; ?>" target="_blank"><button class="btn btn-default btn-xs"><i class="fa fa-print"></i> Cetak</button></a>
                            </td>
                        </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>

            <a class="btn btn-success" data-toggle="modal" data-target="#tambah" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Tambah Data</a> 
            <a class="btn btn-primary" href="./report/import_excel_siswa.php" target="_blank" style="margin-bottom: 5px;"><i class="fa fa-file"></i> Import Excel</a> 
            <a class="btn btn-warning" href="./report/export_excel_siswa.php" target="_blank" style="margin-bottom: 5px;"><i class="fa fa-print"></i> Export Excel</a> 
            
      

            <?php
            include ".modal_siswa_add.php";
            include ".modal_siswa_edit.php";
            include ".modal_siswa_cetak.php";
            ?>

        </div>
    </div>

<?php
} 
else if (@$_GET['act'] == 'del') {
    $gbr_awal = $siswa->tampil($_GET['id'])->fetch_object()->gbr_ijazah;
    unlink("assets/img/ijazah/".$gbr_awal);

    $foto_awal = $siswa->tampil($_GET['id'])->fetch_object()->foto_skhun;
    unlink("assets/img/skhun/".$foto_awal);

    $siswa->hapus($_GET['id']);
    header("location: ?page=siswa");

}



