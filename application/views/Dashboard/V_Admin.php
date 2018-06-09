<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if($Level=="Master" OR $Level=="Pemilik") : ?>
	<section class="content-header">
		<h1><?= $Title ?></h1>
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> <?= $Title ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8">
				<div class="box box-primary">
					<div class="box-header with-border">
						<i class="fa fa-wheelchair"></i>
						<h3 class="box-title">List Pasien</h3>
					</div>
					<div class="box-body">
						<table id="dtPasien" class="table table-striped table-bordered">
							<thead>
								<th>No.</th>
								<th>Kode</th>
								<th>Nama Pasien</th>
								<th>Usia</th>
								<th>Lahir</th>
								<th>Alamat</th>
								<th>Gender</th>
								<th>Status</th>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<i class="fa fa-pencil"></i>
						<h3 class="box-title">Form Pasien</h3>
					</div>
					<form action="" method="POST" id="register" role="form">
						<div class="box-body row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="id_pasien">Kode Pasien</label>
									<?= form_input('id_pasien',null,array(
																			'id' => 'id_pasien',
																			'class' => 'form-control',
																			//'placeholder' => 'Nama Pasien',
																			//'required' => 'true',
																			'disabled' => 'true'
																		));
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="nm_pasien">Nama Pasien</label>
									<?= form_input('nm_pasien',null,array(
																			'id' => 'nm_pasien',
																			'class' => 'form-control',
																			//'placeholder' => 'Nama Pasien',
																			'required' => 'true'
																		));
									?>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label for="alamat_pasien">Alamat Pasien</label>
									<?= form_input('alamat_pasien',null,array(
																			'id' => 'alamat_pasien',
																			'class' => 'form-control',
																			//'placeholder' => 'Alamat',
																			//'required' => 'true'
																		));
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="usia_pasien">Usia Pasien</label>
									<?= form_input('usia_pasien',null,array(
																			'id' => 'usia_pasien',
																			'class' => 'form-control',
																			//'placeholder' => 'Usia Pasien',
																			//'required' => 'true'
																		));
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="tgl_lahir_pasien">Tanggal Lahir Pasien</label>
									<?= form_input('tgl_lahir_pasien',null,array(
																			'id' => 'tgl_lahir_pasien',
																			'class' => 'form-control',
																			//'placeholder' => 'Tanggal Lahir',
																			//'required' => 'true'
																			"data-inputmask" => "'alias': 'yyyy-mm-dd",
																			"data-mask" => "true"
																		));
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="jenis_kelamin_pasien">Jenis Kelamin</label>
									<select name="jenis_kelamin_pasien" class="form-control" id="jenis_kelamin_pasien" required>
										<option value="">== Pilih Jenis Kelamin ==</option>
										<option value="Pria">Laki - Laki</option>
										<option value="Wanita">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="tanggal_kunjungan_pasien">Tanggal Kunjungan</label>
									<?= form_input('tanggal_kunjungan_pasien',null,array(
																			'id' => 'tanggal_kunjungan_pasien',
																			'class' => 'form-control',
																			//'placeholder' => 'Tanggal Kunjungan',
																			'required' => 'true'
																		));
									?>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<span class="col-lg-6" style="padding-left:0">
								<button type="submit" class="btn btn-block btn-primary">Simpan</button>
							</span>
							<span class="col-lg-6" style="padding-right:0">
								<button type="button" id="Hapus" class="btn btn-block btn-danger" disabled="true">Hapus</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
						<table id="dtKunjungan" class="table table-responsive table-striped table-bordered">
							<thead>
								<th>No.</th>
								<th>Tanggal Kunjungan</th>
							</thead>
							<tbody></tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="<?= base_url('assets/jquery/jquery.inputmask.js') ?>"></script>
	<script src="<?= base_url('assets/jquery/jquery.inputmask.date.extensions.js') ?>"></script>
	<script src="<?= base_url('assets/jquery/jquery.inputmask.extensions.js') ?>"></script>
	<script>
		$(document).ready(function(){
			var dtPasien = $('#dtPasien').DataTable({
				"processing": true,
				"ajax": {
					"url": "<?= base_url('pasien/list_data_pasien') ?>",
					"type": "POST"
				},
				"autoWidth": false,
				"info": true,
				"ordering": true,
				"paging": true,
				"pageLength": 5,
				"lengthChange": true,
				"searching": true
			});
			var dtKunjungan = $('#dtKunjungan').DataTable({
				"processing": true,
				"ajax": {
					"url": "<?= base_url('pasien/list_data_kunjungan_pasien/null') ?>",
					"type": "POST"
				},
				"autoWidth": false,
				"info": true,
				"ordering": false,
				"paging": true,
				//"pageLength": 5,
				"lengthChange": true,
				"searching": true
			});
			$("#register").submit(function(e) {
			event.preventDefault();
				var id_pasien = $("#id_pasien").val();
				var nm_pasien = $("#nm_pasien").val();
				var usia_pasien = $("#usia_pasien").val();
				var tgl_lahir_pasien = $("#tgl_lahir_pasien").val();
				var alamat_pasien = $("#alamat_pasien").val();
				var jenis_kelamin_pasien = $('select[name=jenis_kelamin_pasien]').val()
				var tanggal_kunjungan_pasien = $("#tanggal_kunjungan_pasien").val();
				Pace.track(function(){
					jQuery.ajax({
						type: "POST",
						url: "<?= base_url('pasien/tambah_pasien/') ?>",
						dataType: 'json',
						data: {
								id_pasien : id_pasien,
								nm_pasien : nm_pasien, 
								usia_pasien : usia_pasien, 
								tgl_lahir_pasien : tgl_lahir_pasien, 
								alamat_pasien : alamat_pasien,
								jenis_kelamin_pasien : jenis_kelamin_pasien,
								tanggal_kunjungan_pasien : tanggal_kunjungan_pasien
							},
						success: function(data) {
							$('#dtPasien').DataTable().ajax.reload();
							$("#Hapus").attr("disabled","true");
							$("#id_pasien").attr("disabled","true");
							$("#tanggal_kunjungan_pasien").attr("required","true");
	        				$('#register')[0].reset();
	        				$('#nm_pasien').focus();
	        				$(document).ajaxStart(function() { Pace.restart(); });
						}
						/*complete: function(){
	        				$('#dtPasien').DataTable().ajax.reload();
	        				$(document).ajaxStart(function() { Pace.restart(); });
	      				}*/
					});
				});
			})
		});
		$(document).on('click','label',function() {
	  		var id_pasien = $(this).attr("pasien");
	  		Pace.track(function(){
				$('#dtKunjungan').DataTable().ajax.url('pasien/list_data_kunjungan_pasien/'+id_pasien).load();
			});
		});
		$(document).on('click','#getdata',function() {
	  		var id_pasien = $(this).attr("pasien");
	  		jQuery.ajax({
				type: "POST",
				url: "<?= base_url('pasien/get_data_pasien/') ?>",
				dataType: 'json',
				data: {
						id_pasien : id_pasien
					},
				success: function(data) {
					$("#id_pasien").val(data.id_pasien);
					$("#nm_pasien").val(data.nm_pasien);
					$("#alamat_pasien").val(data.alamat_pasien);
					$("#usia_pasien").val(data.usia_pasien);
					$("#tgl_lahir_pasien").val(data.tgl_lahir_pasien);
					$("#jenis_kelamin_pasien").val(data.jenis_kelamin_pasien).change();
					$("#Hapus").removeAttr("disabled");
					//$("#id_pasien").removeAttr("disabled");
					$("#tanggal_kunjungan_pasien").attr("disabled","true");
				}
				/*complete: function(){
    				$('#dtPasien').DataTable().ajax.reload();
    				$(document).ajaxStart(function() { Pace.restart(); });
  				}*/
			});
		});
		$(document).on('click','#Hapus',function() {
	  		var id_pasien = $("#id_pasien").val();
	  		jQuery.ajax({
				type: "POST",
				url: "<?= base_url('pasien/hapus_data_pasien/') ?>",
				dataType: 'json',
				data: {
						id_pasien : id_pasien
					},
				success: function(data) {
					$('#dtPasien').DataTable().ajax.reload();
					$("#Hapus").attr("disabled","true");
					$("#id_pasien").attr("disabled","true");
					$("#tanggal_kunjungan_pasien").attr("required","true");
    				$('#register')[0].reset();
    				$('#nm_pasien').focus();
    				$(document).ajaxStart(function() { Pace.restart(); });
				}
				/*complete: function(){
    				$('#dtPasien').DataTable().ajax.reload();
    				$(document).ajaxStart(function() { Pace.restart(); });
  				}*/
			});
		});
		$('#tgl_lahir_pasien').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
	    $('#tanggal_kunjungan_pasien').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
	</script>
<?php endif ?>