<?php

require_once('core/init.php');
require_once('middlewares/login_middleware.php');
require_once('services/database.php');
require_once('repositories/kelas_repository.php');


if (!isset($_GET["id"])) {
    header("location: lihat_kelas.php");
}

$menus = get_menu();
$kelas = find_by_id($_GET['id']);
$jadwal = find_jadwal_by_id($_GET["id"]);

if ($kelas === []) {
    header("location: lihat_kelas.php");
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
                    <a   href="lihat_pelajaran.php"><i class=""></i> Pelajar</a>
                  </li>
                </ul>              
            </div>            
        </nav>  

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <h2>Lihat Jadwal</h2>
                    </center>                          
                </div>
            </div>
                 <!-- /. ROW  -->
            <th>   
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">                            
                            <a class="btn btn-primary" 
                                href="tambah_jadwal.php?id=<?php echo $kelas['id']; ?>">Tambah Jadwal
                            </a>                         
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Berakhir</th>
                                            <th>Nama Pelajaran</th>
                                            <th>Pengajar</th>
                                            <th>Pendidikan</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <?php if ($jadwal === []) { ?>
                                            <tr>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                            </tr>                  
                                        <?php } ?>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($jadwal as $elem) { ?>
                                        <tr>
                                            <th><?php echo $elem['hari']; ?></th>
                                            <th><?php echo $elem['jam_mulai']; ?></th>
                                            <th><?php echo $elem['jam_berakhir']; ?></th>
                                            <th><?php echo $elem['nama_pelajaran']; ?></th>
                                            <th><?php echo $elem['pengajar']; ?></th>
                                            <th><?php echo $elem['pendidikan']; ?></th>
                                            <th><?php echo $elem['jurusan']; ?></th>
                                            <th>
                                                <a href="ubah_jadwal.php?id=<?php echo $elem['id_jadwal']; ?>   &kelas=<?php echo $kelas['id']; ?>" class="btn btn-data">Ubah
                                                </a>
                                                <button class="btn btn-data" onclick="confirmDeletion('<?php echo $elem['id_jadwal']; ?>', '<?php echo $kelas['id']; ?>')">Hapus
                                                </button>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/lihat_jadwal.js"></script>
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
        