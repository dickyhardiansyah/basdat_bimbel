<?php

require_once('core/init.php'); 
require_once('middlewares/login_middleware.php');
require_once('services/database.php');
require_once('repositories/pelajaran_repository.php');

if (!isset($_GET["kode"])) {
    header("location: lihat_pelajaran.php");
}

$menus = get_menu();
$pelajaran = find_by_kode($_GET["kode"]);

if ($pelajaran === []) {
    header("location: lihat_pelajaran.php");
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
                    <h2>Ubah Pelajaran</h2>
                </center> 
            </div>
            <div class="row">
            <div class="col-md-12">

                <article>
                <form action="controllers/update_pelajaran_controller.php" method="post" onsubmit="return validateForm()">
                    <input type="hidden" name="kode_lama" id="kode_lama" value="<?php echo $pelajaran['kode']; ?>">        
                    <div class="form-group">
                        <label for="kode_pelajaran">Kode Pelajaran</label>
                        <input type="text" name="kode_pelajaran" id="kode_pelajaran" placeholder="SMA101" maxlength="6" value="<?php echo $pelajaran['kode']; ?>">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="nama_pelajaran">Nama Pelajaran</label>
                        <input type="text" name="nama_pelajaran" id="nama_pelajaran" placeholder="Matematika" value="<?php echo $pelajaran['nama']; ?>">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="tingkat_pendidikan">Pendidikan</label>
                        <select name="tingkat_pendidikan" id="tingkat_pendidikan" onchange="onPendidikanChanged(this.value)">
                            <option value="SMA" <?php echo $pelajaran["pendidikan"] === "SMA" ? "selected" : ""; ?>>SMA</option>
                            <option value="SMP" <?php echo $pelajaran["pendidikan"] === "SMP" ? "selected" : ""; ?>>SMP</option>
                            <option value="SD" <?php echo $pelajaran["pendidikan"] === "SD" ? "selected" : ""; ?>>SD</option>
                        </select>
                    </div>

                    <div class="form-group" id="jurusan">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" id="jurusan">
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                            <option value="Bahasa">Bahasa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn accent-color" name="submit">
                    </div>
                </form>

                <?php if (isset($_SESSION['sukses']) && $_SESSION['sukses'] === 1) { ?>
                    <p class="success">Berhasil merubah mata pelajaran</p>
                    <?php $_SESSION['sukses'] = 0; ?>
                <?php } ?>
            </article>

            </div>
            </div>
        </div>
        </div>
    </div>
    <script src="assets/js/tambah_pelajaran.js"></script>
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