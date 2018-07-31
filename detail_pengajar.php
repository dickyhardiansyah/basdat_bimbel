<?php

require_once('core/init.php');
require_once('middlewares/login_middleware.php');
require_once('services/database.php');
require_once('repositories/pengajar_repository.php');

if (!isset($_GET["nip"])) {
    header("location: lihat_pengajar.php");
}

$menus = get_menu();
$pengajar = find_by_nip($_GET["nip"]);
$pelajaran = find_pelajaran_by_nip($_GET["nip"]);

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
                    <a   href="lihat_pengajar.php"><i class=""></i> Pelajar</a>
                  </li>
                </ul>              
            </div>            
        </nav>  

        <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h2>Detail Data Pengajar</h2>     
                    </center>                     
                 </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            
           <article>
                <div class="detail-group">
                    <p>NIP</p>
                    <p><?php echo $pengajar['nip']; ?></p>
                </div>
                
                <div class="detail-group">
                    <p>Nama Pengajar</p>
                    <p><?php echo $pengajar['nama']; ?></p>
                </div>

                <div class="detail-group">
                    <p>Tanggal Lahir</p>
                    <p><?php echo $pengajar['ttl']; ?></p>
                </div>

                <div class="detail-group">
                    <p>Jenip Kelamin</p>
                    <p><?php echo $pengajar['jk']; ?></p>
                </div>
                
                <div class="detail-group">
                    <p>No Telepon</p>
                    <p><?php echo $pengajar['notelp']; ?></p>
                </div>

                <div class="detail-group">
                    <p>Pelajaran</p>
                    <ol>
                        <?php foreach ($pelajaran as $row) { ?>
                            <?php $jurusan = $row['jurusan'] ? ' ' . $row['jurusan'] : ''; ?>
                            <li><?php echo $row['nama'] . ' - '. $row['pendidikan'] . $jurusan;?></li>
                        <?php } ?>
                    </ol>
                </div>

                <div class="detail-group">
                    <a class="btn accent-color" href="ubah_pengajar.php?nip=<?php echo $pengajar['nip']; ?>">Ubah</a>
                    <a style="margin-left: 8px;" class="btn accent-color" href="tambah_tugas.php?nip=<?php echo $pengajar['nip']; ?>">
                        Tambah Tugas
                    </a>
                    <button style="margin-left: 8px;" 
                        class="btn accent-color" 
                        onclick="confirmDeletion('<?php echo $pengajar['nip']; ?>')">
                        Hapus
                    </button>
                </div>
            </article>

            </div>
            </div>
        </div>
        </div>
    </div>
    <script src="assets/js/lihat_pengajar.js"></script>
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
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     
</body>
</html>    