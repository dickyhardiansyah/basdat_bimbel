<?php

require_once('core/init.php');
require_once('middlewares/login_middleware.php');
require_once('services/database.php');
require_once('repositories/pengajar_repository.php');

$menus = get_menu();
$results = find_all_pengajar();

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
                    <a   href="lihat_pelajaran.php"><i class=""></i> Pelajaran</a>
                  </li>
                </ul>              
            </div>            
        </nav>  

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <h2>Data Pengajar</h2>
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
                            <a href="registrasi_pengajar.php" class="btn btn-primary">Registras Pengajar
                            </a>                         
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>TanggalLahir</th>
                                            <th>No Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $pengajar) { ?>
                                        <tr>
                                            <th><?php echo $pengajar['nip']; ?></th>
                                            <th><?php echo $pengajar['nama_pengajar']; ?></th>
                                            <th><?php echo $pengajar['jenis_kelamin']; ?></th>
                                            <th><?php echo $pengajar['tanggal_lahir']; ?></th>
                                            <th><?php echo $pengajar['no_telepon']; ?></th>
                                            <th>
                                                <a href="ubah_pengajar.php?nip=<?php echo $pengajar['nip']; ?>" 
                                                    class="btn btn-data">Ubah
                                                </a>
                                                <a href="detail_pengajar.php?nip=<?php echo $pengajar['nip']; ?>" 
                                                    class="btn btn-data">Detail
                                                </a>
                                                <button class="btn btn-data" onclick="confirmDeletion('<?php echo $pengajar['nip']; ?>')">Hapus
                                                </button>
                                            </li>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </th>
                        </div>
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
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
        