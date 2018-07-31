<?php

require_once('core/init.php');
//require_once('middlewares/login_middleware.php');

//$menus = get_menu();

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
                    <a   href="lihat_pengajar.php"><i class=""></i> Pelajar</a>
                  </li>
                </ul>              
            </div>            
        </nav>  

        <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <center>
                    <h1>GANESHA OPERATION BANDUNG</h1>
                    <h5>Jl. Purnawarman No.36 B (022)4218177</h5>
                </center>
                <p>Di tengah-tengah persaingan yang tajam dalam industri bimbingan belajar, pada tanggal 1 Mei 1984 Ganesha Operation didirikan di Kota Bandung. Seiring dengan perjalanan waktu, berkat keuletan dan konsistensinya dalam menjaga kualitas, kini Ganesha Operation telah tumbuh bagai remaja tambun dengan 788 outlet yang tersebar di 272 kota besar se Indonesia. Latar belakang pendirian lembaga ini adalah adanya mata rantai yang terputus dari link informasi Sekolah Menengah Atas (SMA) dengan dunia Perguruan Tinggi Negeri (PTN). Posisi inilah yang diisi oleh Ganesha Operation untuk berfungsi sebagai jembatan dunia SMA terhadap dunia PTN mengenai informasi jurusan PTN (prospek dan tingkat persaingannya), pemberian materi pelajaran yang sesuai dengan ruang lingkup bahan uji seleksi penerimaan mahasiswa baru dan pemberian metode-metode inovatif dan kreatif menyelesaikan soal-soal tes masuk PTN sehingga membantu para siswa lulusan SMA memenuhi keinginan mereka memasuki PTN
                </p> 
            </div>
            <div class="row">
            <div class="col-md-12">
            
            </div>
            </div>
        </div>
        </div>
    </div>  

    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
