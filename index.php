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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title>
		E-vote System
	</title>
</head>
<body style="background: #efefef;">
	<header style="background: #fff; padding: 5%; margin-bottom: 100px;">
		<h1 style="color: #3c8dbc;"><b>Pemilihan Ketua KMTF Periode 2016/2017</b></h1>
		<span>untuk memilih, silahkan meng-klik gambar calon di bawah ini</span>
	</header>
	<div class="col-md-4">
		<button data-toggle="modal" data-target="#modal1"><img src="Untitled.png" width="100%"></button>
		<h1 align="center">1</h1>
	</div>
	<div class="col-md-4">
		<button data-toggle="modal" data-target="#modal2"><img src="Untitled.png" width="100%"></button>
		<h1 align="center">2</h1>
	</div>
	<div class="col-md-4">
		<button data-toggle="modal" data-target="#modal3"><img src="Untitled.png" width="100%"></button>
		<h1 align="center">3</h1>
	</div>
  
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

  <div class="modal fade" id="modal3" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
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
  </div>

	
</body>
</html>
