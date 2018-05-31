<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SIKADIS - <?= $Title ?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/daterangepicker.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-datepicker.min.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/css/alt/AdminLTE-select2.min.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/css/AdminLTE.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/css/skins/skin-purple.min.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/sweet-alert/sweetalert.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/pace/themes/purple/pace-theme-center-atom.css'); ?>">
		<style>
			.ui-autocomplete {
				max-height: 100px;
				overflow-y: auto;
				/* prevent horizontal scrollbar */
				overflow-x: hidden;
			}
			* html .ui-autocomplete {
				height: 100px;
			}
			.cover{
				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				height: 100%;
				z-index: 1999;
				background: #34495e;
			}
			/* .dataTables_wrapper { min-height: 300px; } */
			.scroll {
				position:fixed;
				right:20px;
				bottom:20px;
				background:#b2b2b2;
				background:rgba(178,178,178,0.7);
				padding:15px;
				border-radius: 5px;
				text-align: center;
				margin: 0 0 0 0;
				cursor:pointer;
				transition: 0.5s;
				-moz-transition: 0.5s;
				-webkit-transition: 0.5s;
				-o-transition: 0.5s; 		
			}
			.scroll .fa {
				font-size:30px;
				margin-top:-5px;
				margin-left:1px;
				transition: 0.5s;
				-moz-transition: 0.5s;
				-webkit-transition: 0.5s;
				-o-transition: 0.5s; 	
			}
		</style>
		<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
		<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
		<script src="<?= base_url('assets/jquery/jquery.slimscroll.min.js') ?>"></script>
		<script src="<?= base_url('assets/dist/js/fastclick.js') ?>"></script>
		<script src="<?= base_url('assets/AdminLTE/js/adminlte.min.js') ?>"></script>
		<script src="<?= base_url('assets/select2/select2.full.min.js') ?>"></script>
		<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
		<script src="<?= base_url('assets/sweet-alert/sweetalert.min.js') ?>"></script>
		<script src="<?= base_url('assets/pace/pace.min.js') ?>"></script>
		<script>
			Pace.on("done", function(){
				$(".cover").fadeOut(1000);
			});
		</script>
	</head>
	<body class="hold-transition skin-purple layout-top-nav">
		<a id="up" href="#down"></a>
		<div class="up"></div>
		<div class="wrapper">
			<div class="cover"></div>
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand"><b>SISTEM</b> REKAM MEDIS</a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
								<i class="fa fa-bars"></i>
							</button>
						</div>
						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="<?php if($Nav=='Dashboard') : echo 'active'; endif; ?>"><a href="<?= base_url('dashboard') ?>"><i class="fa fa-home"></i> Dashboard <span class="sr-only">(current)</span></a></li>
								<?php if($Level=="Master" OR $Level=="Pemilik") : ?>
									<li class="<?php if($Nav=='Laporan') : echo 'active'; endif; ?>"><a href="<?= base_url('laporan') ?>"><i class="fa fa-book"></i> Laporan <span class="sr-only">(current)</span></a></li>
									<li class="<?php if($Nav=='Konfigurasi') : echo 'active'; endif; ?>"><a href="<?= base_url('konfigurasi') ?>"><i class="fa fa-gears"></i> Konfigurasi <span class="sr-only">(current)</span></a></li>
								<?php endif ?>
							</ul>
						</div>
						<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
								<li class="dropdown user user-menu">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="<?= base_url('assets/AdminLTE/img/avatar5.png') ?>" class="user-image" alt="User Image">
										<span class="hidden-xs"><?= $Nama ?></span>
									</a>
									<ul class="dropdown-menu">
										<li class="user-header">
											<img src="<?= base_url('assets/AdminLTE/img/avatar5.png') ?>" class="img-circle" alt="User Image">
											<p>
												<?= $Nama ?> - <?= $Level; ?>
												<small>Member since <?= $this->session->userdata('created') ?></small>
											</p>
										</li>
										<li class="user-footer">
											<div class="pull-left">
												<a href="#" class="btn btn-default btn-flat">Profile</a>
											</div>
											<div class="pull-right">
												<a href="<?= base_url('dashboard/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			<div class="content-wrapper">
				<?php $this->load->view($Konten) ?>
			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					Page rendered in <strong>{elapsed_time}</strong> seconds.
				</div>
				<strong>Copyright &copy; <?php if(date('Y')!="2017") : echo "2017-".date('Y'); endif ?></strong> Coded by <a href="https://akasakapratama.web.id/">Gilang Pratama</a>. All rights reserved.
			</footer>
		</div>
		<script>
			$(document).ready(function () {
				$('.sidebar-menu').tree();
				$('#up, #down').on('click', function(e){
		    		e.preventDefault();
		    		var target= $(this).get(0).id == 'up' ? $('#down') : $('#up');
		    		$('html, body').stop().animate({
		       			scrollTop: target.offset().top
		    		}, 1000);
				});
			})
		</script>
	</body>
</html>