<?php
ob_start();
require_once('config/+koneksi.php');
require_once('models/database.php');

$connection = new Database($host, $user, $pass, $database);
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Arsip Ijazah SMKN 7 Surabaya</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/dataTables/datatables.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  </head>
  

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Arsip Ijazah SMKN 7 Surabaya</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="?page=siswa"><i class="fa fa-users"></i> Siswa</a>
           <!--   <ul class="dropdown-menu"> -->
              <!--  <li><a href="?page=siswa">Data Siswa</a></li> -->
               <!-- <li><a href="?page=siswa_grafik">Grafik</a></li> -->
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> SMKN 7 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <script src="assets/js/jquery-1.10.2.js"></script>
      <div id="page-wrapper">

        <?php
        if(@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
          include "views/dashboard.php";
        } else if (@$_GET['page'] == 'siswa') {
          include "views/siswa.php";
        } else if (@$_GET['page'] == 'siswa_grafik') {
          include "views/siswa_grafik.php";
        }
        ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('#datatables').DataTable();
      });
    </script>
  
  <script>
  document.getElementById('searchButton').addEventListener('click', function() {
    var input = document.getElementById('searchYear').value.toLowerCase().trim();
    var rows = document.querySelectorAll('table tbody tr');

    rows.forEach(function(row) {
        var tahunLulusCell = row.querySelectorAll('td')[15]; // Indeks yang benar untuk kolom Tahun Lulus
        if (tahunLulusCell) {
            var tahunLulus = (tahunLulusCell.textContent || tahunLulusCell.innerText).trim();
            if (tahunLulus.toLowerCase().indexOf(input) > -1) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
});
</script>
  
  
  </body>
</html>