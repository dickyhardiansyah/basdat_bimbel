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
                    <h2>Ubah Data Pengajar</h2>
                </center> 
            </div>
            <div class="row">
            <div class="col-md-12">

                <article>
                <form action="controllers/update_pengajar_controller.php" method="post" onsubmit="return validateForm()">
                    <input type="hidden" name="nip_lama" id="nip_lama" value="<?php echo $pengajar['nip'] ?>">
                    
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" 
                            name="nip" 
                            id="nip" 
                            placeholder="9983430001" 
                            maxlength="18" 
                            value="<?php echo $pengajar['nip'] ?>">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" 
                            name="nama" 
                            id="nama" 
                            placeholder="Indra Noah" 
                            value="<?php echo $pengajar['nama'] ?>">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="radio" 
                            name="jenis_kelamin" 
                            id="jenis_kelamin" 
                            value="Laki-laki" 
                            <?php echo $pengajar['jk'] === 'Laki-laki' ? 'checked' : '' ?>> Laki-laki
                        <input type="radio" 
                            name="jenis_kelamin" 
                            id="jenis_kelamin" 
                            value="Perempuan"
                            <?php echo $pengajar['jk'] === 'Perempuan' ? 'checked' : '' ?>> Perempuan
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" 
                            name="tanggal_lahir" 
                            id="tanggal_lahir" 
                            value="<?php echo $pengajar['ttl']?>">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="text" 
                            name="no_telepon" 
                            id="no_telepon" 
                            placeholder="085681480083"
                            value="<?php echo $pengajar['notelp']?>">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn accent-color" name="submit">
                    </div>
                </form>

                <?php if (isset($_SESSION['sukses']) && $_SESSION['sukses'] === 1) { ?>
                    <p class="success">Berhasil merubah pengajar</p>
                    <?php $_SESSION['sukses'] = 0; ?>
                <?php } ?>
            </article>

            </div>
            </div>
        </div>
        </div>
    </div>
    <script src="assets/js/registrasi_pengajar.js"></script>
    <script src="assets/js/registrasi_siswa.js"></script>
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