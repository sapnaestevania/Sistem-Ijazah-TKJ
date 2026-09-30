<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_siswa.php";
$connection = new Database($host, $user, $pass, $database);
$siswa = new Siswa($connection);

// Ambil data siswa berdasarkan ID
$id = @$_GET['id']; // Ambil ID dari parameter URL
$tampil = $siswa->tampil($id); // Mengambil data siswa berdasarkan ID

// Inisialisasi jalur file default sebagai kosong
$ijazah_path = '';
$skhun_path = '';

if ($data = $tampil->fetch_object()) {
    // Cek apakah file ijazah dan SKHUN ada
    if (!empty($data->gbr_ijazah)) {
        $ijazah_path = '../assets/img/ijazah/' . $data->gbr_ijazah;
    }
    if (!empty($data->foto_skhun)) {
        $skhun_path = '../assets/img/skhun/' . $data->foto_skhun;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Ijazah dan SKHUN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: lightblue;
        }
        .button {
            display: inline-block;
            padding: 30px 60px;
            font-size: 32px;
            color: yellow;
            background-color: darkblue;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<a href="javascript:void(0);" class="button" onclick="openFiles('<?php echo $ijazah_path; ?>', '<?php echo $skhun_path; ?>')">TAMPILKAN FILE IJAZAH & SKHUN</a>

<script>
function openFiles(ijazahPath, skhunPath) {
    if (ijazahPath && skhunPath) {
        // Buka satu tab baru
        var newWindow = window.open('', '_blank'); // Membuka tab baru

        // Mengatur konten dari tab baru
        newWindow.document.write(`
            <html>
                <head>
                    <title>IJAZAH & SKHUN</title>
                    <style>
                        body { font-family: Arial, sans-serif; }
                        h1 { text-align: center; }
                        img { display: block; margin: 20px auto; max-width: 80%; }
                        iframe { display: block; margin: 20px auto; width: 80%; height: 600px; border: none; }
                    </style>
                </head>
                <body>
                    <h1>IJAZAH & SKHUN SISWA</h1>
                    <h2>IJAZAH</h2>
                    <iframe src="${ijazahPath}" allowfullscreen></iframe>
                    <h2>SKHUN</h2>
                    <iframe src="${skhunPath}" allowfullscreen></iframe>
                </body>
            </html>
        `);
    } else {
        alert('File ijazah atau SKHUN tidak ditemukan.');
    }
}
</script>

</body>
</html>
