<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_siswa.php";
require 'vendor/autoload.php';

$connection = new Database($host, $user, $pass, $database);
$siswa = new Siswa($connection);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta charset="UTF-8">
    <title>Import Data Excel</title>
</head>
<style>
        /* Gaya umum untuk body */
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

        /* Gaya untuk header */
        h1 {
            color: darkblue;
            font-size: 2rem;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        /* Gaya untuk form */
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            align-items: center;
        }

        /* Gaya input file */
        input[type="file"] {
            margin-bottom: 20px;
            width: 100%;
            padding: 10px 0px;;
            border: 2px solid blue;
            border-radius: 5px;
            background-color: #f4f4f9;
            align-items: center;
        }

        /* Gaya untuk button */
        button {
            background-color: darkblue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Gaya untuk pesan sukses dan error */
        p {
            font-size: 1rem;
            margin-top: 20px;
        }

        p.success {
            color: #4CAF50;
        }

        p.error {
            color: #e74c3c;
        }
    </style>
<body>
    
    <h1>Import Data Siswa</h1>
    <form action="import_excel_siswa.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit" name="import">Import Excel</button>
    </form>

    <?php
    // Cek apakah file sudah diunggah
    if (isset($_POST['import'])) {
        $file_mimes = array(
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'text/csv',
            'text/plain'
        );

        // Cek apakah file yang diunggah adalah Excel atau CSV
        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);

            try {
                // Memilih reader yang sesuai berdasarkan ekstensi file
                if ($extension === 'xls') {
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xls');
                } elseif ($extension === 'xlsx') {
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
                } elseif ($extension === 'csv') {
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
                } else {
                    throw new Exception("Format file tidak didukung.");
                }

                $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // Loop untuk menyimpan data dari Excel/CSV ke database
                for ($i = 2; $i <= count($sheetData); $i++) {
                    // Pastikan ada data di setiap kolom yang diperlukan
                    if (!empty($sheetData[$i]['A'])) {
                        $nama = $sheetData[$i]['B'];
                        $nipd = $sheetData[$i]['C'];
                        $jk = $sheetData[$i]['D'];
                        $nisn = $sheetData[$i]['E'];
                        $tempat_lahir = $sheetData[$i]['F'];
                        $tanggal_lahir = $sheetData[$i]['G'];
                        $nik = $sheetData[$i]['H'];
                        $agama = $sheetData[$i]['I'];
                        $alamat = $sheetData[$i]['J'];
                        $hp = $sheetData[$i]['K'];
                        $email = $sheetData[$i]['L'];
                        $ijazah = $sheetData[$i]['M']; // Kolom Ijazah
                        $skhun = $sheetData[$i]['N']; // Kolom SKHUN, bergeser ke N
                        $jurusan = $sheetData[$i]['O']; // Kolom Jurusan
                        $tahun_lulus = $sheetData[$i]['P']; // Kolom Tahun Lulus

                        // Simpan data ke dalam database
                        $siswa->tambah(
                            $nama, $nipd, $jk, $nisn, $tempat_lahir, $tanggal_lahir, $nik, $agama, $alamat, $hp, $email, $ijazah, $skhun, $jurusan, $tahun_lulus
                        );
                    }
                }

                echo "<p>Data berhasil diimpor!</p>";
            } catch (Exception $e) {
                echo "<p>Terjadi kesalahan: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>File bukan Excel atau CSV!</p>";
        }
    }
    ?>
</body>
</html>
