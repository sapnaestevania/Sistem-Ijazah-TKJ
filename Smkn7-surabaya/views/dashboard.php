<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        html {
            background-image: url("9.png"); /* Pastikan nama file dan path sudah benar */
            background-size: cover; /* Gambar akan menutupi seluruh halaman */
            background-position: center; /* Gambar tetap di tengah */
            background-repeat: no-repeat; /* Tidak mengulang gambar */
            background-attachment: fixed; /* Gambar tidak bergeser saat di-scroll */
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: left;
            color: #333;
            background: rgba(255, 255, 255, 0.8); /* Transparansi latar konten */
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            background: rgba(255, 255, 255, 0.8); /* Transparansi konten */
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            width: 100%;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
        }

        small {
            font-size: 18px;
            color: #777;
        }

        ol.breadcrumb {
            background-color: transparent; /* Breadcrumb tanpa background */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Admin</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                Selamat datang di halaman dashboard "Arsip Ijazah"
            </div>
        </div>
    </div>
</body>
</html>
