<?php

require_once('core/init.php');
require_once('middlewares/login_middleware.php');
require_once('services/database.php');
require_once('repositories/kelas_repository.php');

$menus = get_menu();

$result = find_all_kelas();

$kelasList = [];
while ($row = mysqli_fetch_assoc($result)) {
    array_push($kelasList, [
        "id" => $row["id_kelas"],
        "nama" => $row["nama_kelas"]
    ]);
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
                <center>
                    <h2>Registrasi Data Mahasiswa</h2>
                </center> 
            </div>
            <div class="row">
            <div class="col-md-12">

            <article style="padding:24px;">
                <form action="controllers/tambah_siswa_controller.php" method="post" onsubmit="return validateForm()">
        
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" id="nis" placeholder="9983430001" maxlength="10">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Budi Taher">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan"> Perempuan
                    </div>

                    <div class="form-group">
                        <label for="tingkat_pendidikan">Pendidikan</label>
                        <select name="tingkat_pendidikan" id="tingkat_pendidikan">
                            <option value="sma">SMA</option>
                            <option value="smp">SMP</option>
                            <option value="sd">SD</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="asal_sekolah">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" id="asal_sekolah" placeholder="SMAN 1 Bandung">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon" placeholder="085681480083">
                        <small class="hide">* Isi ini dulu yuk</small>
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas">
                            <?php foreach ($kelasList as $kelas) { ?>
                            <option value="<?php echo $kelas['id']; ?>">
                                <?php echo $kelas['nama']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn accent-color" name="submit">
                    </div>
                </form>

                <?php if (isset($_SESSION['sukses']) && $_SESSION['sukses'] === 1) { ?>
                    <p class="success">Berhasil menambahkan siswa baru</p>
                    <?php $_SESSION['sukses'] = 0; ?>
                <?php } ?>
            </article>
            </div>
            </div>
        </div>
        </div>
    </div>
    <script src="assets/js/lihat_siswa.js"></script>
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