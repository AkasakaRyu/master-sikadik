<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if($Level=="Master" OR $Level=="Pemilik") : ?>
	<div class="container" style="width: 50%">
		<section class="content-header">
			<h1><?= $Title ?></h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> <?= $Title ?></li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-lg-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<center>
								<h3 class="box-title">
									<i class="fa fa-database"></i> Backup/Restore
								</h3>
							</center>
						</div>
						<?= form_open_multipart('konfigurasi/restoredb') ?>
							<div class="box-body row">
								<div class="col-lg-12" style="margin-bottom: 2%">
									<input type="file" name="file" id="file" class="form-control" required>
								</div>
								<div class="col-lg-6">
									<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-upload"></i> Restore Data</button>
								</div>
								<div class="col-lg-6">
									<a href="<?= base_url('konfigurasi/backupdb') ?>" class="btn btn-block btn-danger"><i class="fa fa-download"></i> Backup Data</a>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<center>
								<h3 class="box-title">
									<i class="fa fa-user"></i> Profil Akun
								</h3>
							</center>
						</div>
						<form action="" method="POST" id="register" role="form">
							<div class="box-body row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="nm_user">Nama Lengkap</label>
										<?= form_input('nm_user',null,array(
																				'id' => 'nm_user',
																				'class' => 'form-control',
																				//'placeholder' => 'Username',
																				'required' => 'true'
																			));
										?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="login_user">Username</label>
										<?= form_input('login_user',null,array(
																				'id' => 'login_user',
																				'class' => 'form-control',
																				//'placeholder' => 'Username',
																				'required' => 'true',
																				'autocomplete' => 'nope'
																			));
										?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="pass_user">Password</label>
										<?= form_password('pass_user',null,array(
																				'id' => 'pass_user',
																				'class' => 'form-control',
																				//'placeholder' => 'Password',
																				'required' => 'true',
																				'autocomplete' => 'new-password'
																			));
										?>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<div class="col-lg-6">
									<button type="submit" id="submit" class="btn btn-block btn-primary">Simpan</button>
								</div>
								<div class="col-lg-6">
									<button type="button" id="chPwd" class="btn btn-block btn-warning" disabled="true">Ganti Pass</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<div id="chPwdInt" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Masukan password anda</h4>
					</div>
					<form action="" method="POST" id="verif" role="form">
						<div class="modal-body">
							<div class="form-group">
								<label for="verif_pass_user">Password Lama</label>
								<?= form_password('verif_pass_user',null,array(
																				'id' => 'verif_pass_user',
																				'class' => 'form-control',
																				//'placeholder' => 'Password',
																				'required' => 'true',
																				'autocomplete' => 'new-password'
																			));
								?>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			var id_user = 2;
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('konfigurasi/get_data/') ?>",
				dataType: 'json',
				data: {
						id_user : id_user
					},
				success: function(data) {
					$("#nm_user").val(data.nm_user);
					$("#login_user").val(data.login_user);
					$("#login_user").attr("disabled","true");
					$("#pass_user").attr("disabled","true");
					$("#chPwd").removeAttr("disabled");
					$("#delUsr").removeAttr("disabled");
				}
				/*complete: function(){
					$('#dtPasien').DataTable().ajax.reload();
					$(document).ajaxStart(function() { Pace.restart(); });
				}*/
			});
			$("#register").submit(function(e) {
				event.preventDefault();
				var id_user = 2;
				var nm_user = $("#nm_user").val();
				var pass_user = $("#pass_user").val();
				var login_user = $("#login_user").val();
				Pace.track(function(){
					jQuery.ajax({
						type: "POST",
						url: "<?= base_url('konfigurasi/tambah_user/') ?>",
						dataType: 'json',
						data: {
								id_user:id_user, 
								nm_user:nm_user,
								login_user:login_user, 
								pass_user:pass_user, 
							  },
						success: function() {
							var id_user = 2;
							jQuery.ajax({
								type: "POST",
								url: "<?= base_url('konfigurasi/get_data/') ?>",
								dataType: 'json',
								data: {
										id_user : id_user
									},
								success: function(data) {
									$("#nm_user").val(data.nm_user);
									$("#login_user").val(data.login_user);
									$("#pass_user").val("");
									$("#login_user").attr("disabled","true");
									$("#pass_user").attr("disabled","true");
									$("#chPwd").removeAttr("disabled");
									$("#delUsr").removeAttr("disabled");
								}
								/*complete: function(){
									$('#dtPasien').DataTable().ajax.reload();
									$(document).ajaxStart(function() { Pace.restart(); });
								}*/
							});
							$(document).ajaxStart(function() { Pace.restart(); });
						}
					});
				});
			})
			$("#verif").submit(function(e) {
			event.preventDefault();
				var id_user = 2;
				var nm_user = $("#nm_user").val();
				var verif_pass_user = $("#verif_pass_user").val();
				Pace.track(function(){
					jQuery.ajax({
						type: "POST",
						url: "<?= base_url('konfigurasi/verif_user/') ?>",
						dataType: 'json',
						data: {id_user:id_user, verif_pass_user:verif_pass_user},
						success: function(data) {
							if(data.status) {
								$("#login_user").removeAttr("disabled");
								$("#pass_user").removeAttr("disabled");
								$('#verif')[0].reset();
								$('#chPwdInt').modal('hide');
								$('#pass_user').focus();
								$("#editUsr").attr("id","chPwd");
								$("#nm_user").val(nm_user);
								$("label[for=pass_user]").text("Password Baru");
								$(document).ajaxStart(function() { Pace.restart(); });
							} else {
								alert('Peringatan! password lama anda tidak sesuai!');
							}
						}
					});
				});
			})
		});
		$(document).on('click','#chPwd',function() {
			var nm_user = $("#nm_user").val();
			$('#chPwdInt').modal('show');
			$("#chPwd").attr("disabled","true");
			$("#nama").text(nm_user);
		});
	</script>
<?php endif ?>