<?php
// error_reporting(0);
include('session.php');
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="refresh" content="180;url=logout.php">
    <!-- Bootstrap 3.3.5 -->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <!-- <script src="assets/js/jquery1.12.0.min.js"></script> -->
  	<script src="assets/js/bootstrap.min.js"></script>
	<title>
		E-vote System
	</title>
</head>
<body class="body-index">
	<header class="header-index">

		<h1 style="color: #ffffff;"><b>Pemilihan Ketua KMTNTF 2017</b></h1>
		<span class="text-header">
    Silahkan memilih salah satu calon dengan cara <strong>klik pada gambar</strong> calon
    </span>
	</header>
  <div class="gambar-calon">
  	<div class="col-md-6">
  		<button data-toggle="modal" data-target="#modal1"><img id="foto-calon" src="image/calon1.jpg" width="100%"></button>
  		<h1 class="nama align="center">1</h1>
      <h2 class="nama">M. Iqbal Habibi Kamal</h2>
  	</div>
  	<div class="col-md-6">
  		<button data-toggle="modal" data-target="#modal2"><img id="foto-calon" src="image/calon2.jpg" width="100%"></button>
  		<h1 class="nama align="center">2</h1>
      <h2 class="nama">Rifqi Arrahmansyah</h2>
  	</div>
  	<!-- <div class="col-md-4">
  		<button data-toggle="modal" data-target="#modal3"><img id="foto-calon" src="image/calon3.jpg" width="100%"></button>
  		<h1 align="center">3</h1>
      <h2 class="nama">Nama Calon</h2>
  	</div> -->
  </div>

  <div><img class="logo-kpu-index" src="image/LOGO fix.png"></div>
  
  <div class="modal fade" id="modal1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi pilihan</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin memilih calon nomor 1?</p>
        </div>
        <div class="modal-footer">
    	  <a href="vote.php?choice=1" class="btn btn-success btn-flat">Ya</a>
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal2" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi pilihan</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin memilih calon nomor 2?</p>
        </div>
        <div class="modal-footer">
    	  <a href="vote.php?choice=2" class="btn btn-success btn-flat">Ya</a>
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="modal fade" id="modal3" role="dialog"> -->
    <!-- <div class="modal-dialog"> -->
      <!-- Modal content-->
      <!-- <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi pilihan</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin memilih calon nomor 3?</p>
        </div>
        <div class="modal-footer">
    	  <a href="vote.php?choice=3" class="btn btn-success btn-flat">Ya</a>
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div> -->
        <script language="JavaScript">
        /* Disable mouse right-click on page*/
        document.addEventListener("contextmenu", function(e){
            e.preventDefault();
        }, false);
        </script>
	
</body>
</html>
