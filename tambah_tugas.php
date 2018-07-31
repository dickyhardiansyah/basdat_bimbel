<?php

require_once('core/init.php'); 
require_once('middlewares/login_middleware.php');
require_once('services/database.php');
require_once('repositories/pengajar_repository.php');
require_once('repositories/pelajaran_repository.php');

if (!isset($_GET["nip"])) {
    header("location: lihat_pengajar.php");
}

$menus = get_menu();
$pengajar = find_by_nip($_GET["nip"]);
$pengajar_pelajaran = find_pelajaran_by_nip($_GET["nip"]);
$pelajaran = find_all_pelajaran();

$kode_mapel = [];
foreach ($pengajar_pelajaran as $elem) {
    array_push($kode_mapel, $elem['kode']);
}

if ($pengajar === []) {
    header("location: lihat_pengajar.php");
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Welcome admin</a> 
            </div>
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> Sistem Bimbingan  Belajar &nbsp; <a href="controllers/logout_controller.php" class="btn btn-danger square-btn-adjust">Logout</a> 
            </div>
        </nav> 
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                  <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                  </li>
                  <li>
                    <a class="active-menu"  href="index.php"><i class=""></i> Beranda</a>
                  </li>                    
                  <li >
                    <a  href="lihat_siswa.php"><i class=""></i>Siswa </a>
                  </li>
                  <li>
                    <a  href="lihat_pengajar.php"><i class=""></i> Pengajar </a>
                  </li>       
                  <li>
                    <a   href="lihat_kelas.php"><i class=""></i> Kelas</a>
                  </li> 
                  <li>
                    <a   href="lihat_pelajaran.php"><i class=""></i> Pelajaran</a>
                  </li>
                </ul>              
            </div>            
        </nav>  

        <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <center>
                    <h2>Tambah Tugas Pelajaran</h2>
                </center> 
            </div>
            <div class="row">
            <div class="col-md-12">

            <article>
                <form action="controllers/tambah_tugas_controller.php" method="post" onsubmit="return validateForm()">
                    <input type="hidden" name="nip" id="nip" value="<?php echo $pengajar['nip'] ?>">
                    
                    <div class="detail-group">
                        <p>Nama Pengajar</p>
                        <p><?php echo $pengajar['nama']; ?></p>
                    </div>

                    <div class="check-group">
                        <?php while ($row = mysqli_fetch_assoc($pelajaran)) {?>
                            <input type="checkbox" 
                                name="pengajar_pelajaran[]"
                                value="<?php echo $row['kode_mapel']; ?>"
                                <?php echo in_array($row['kode_mapel'], $kode_mapel) ? 'checked' : ''; ?>> 
                            <?php $jurusan = $row['tingkat_pendidikan'] === 'SMA' ? ' ' . $row['jurusan'] : ''; ?>
                            <p><?php echo $row['nama_pelajaran'] . ' - ' . $row['tingkat_pendidikan'] . $jurusan; ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn accent-color" name="submit">
                    </div>
                </form>
            </article>

            </div>
            </div>
        </div>
        </div>
    </div>
    <script src="assets/js/registrasi_pengajar.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script src="assets/js/custom.js"></script>
     
</body>
</html>