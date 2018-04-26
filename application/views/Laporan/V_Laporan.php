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
								<th>Nama</th>
								<th>Usia</th>
								<th>Lahir</th>
								<th>Alamat</th>
								<th>Gender</th>
								<th>Kunjungan</th>
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
						<h3 class="box-title">Form Filter Pasien</h3>
					</div>
					<!-- <form action="" method="POST" id="filter" role="form"> -->
						<div class="box-body row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="tgl_awal">Dari Tanggal</label>
									<?= form_input('tgl_awal',null,array(
																			'id' => 'tgl_awal',
																			'class' => 'form-control',
																			//'placeholder' => 'Tanggal Lahir',
																			//'required' => 'true'
																			"data-inputmask" => "'alias': 'yyyy-mm-dd",
																			"data-mask" => "true",
																			'required' => 'true'
																		));
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="tgl_akhir">Sampai Tanggal</label>
									<?= form_input('tgl_akhir',null,array(
																			'id' => 'tgl_akhir',
																			'class' => 'form-control',
																			//'placeholder' => 'Tanggal Kunjungan',
																			'required' => 'true'
																		));
									?>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" id="filter" class="btn btn-block btn-primary">Filter</button>
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
	</section>
	<script src="<?= base_url('assets/jquery/jquery.inputmask.js') ?>"></script>
	<script src="<?= base_url('assets/jquery/jquery.inputmask.date.extensions.js') ?>"></script>
	<script src="<?= base_url('assets/jquery/jquery.inputmask.extensions.js') ?>"></script>
	<script>
		$(document).ready(function(){
			fetch_data();
			function fetch_data(is_date_search, tgl_awal='', tgl_akhir='') {
				var dtPasien = $('#dtPasien').DataTable({
					"processing": true,
					"ajax": {
						"url": "<?= base_url('pasien/filter_laporan') ?>",
						"type": "POST",
						"data" : {is_date_search:is_date_search, tgl_awal:tgl_awal, tgl_akhir:tgl_akhir}
					},
					"autoWidth": false,
					"info": true,
					"ordering": true,
					"paging": true,
					"pageLength": 5,
					"lengthChange": false,
					"searching": true,
					"dom": "Bfrtip",
					"buttons": [
        				'copy', 'excel', 'pdf', 'print'
    				]
				});
			}
			$('#filter').click(function(){
				var tgl_awal = $('#tgl_awal').val();
				var tgl_akhir = $('#tgl_akhir').val();
				if(tgl_awal != '' && tgl_akhir !='') {
					$('#dtPasien').DataTable().destroy();
					$('#dtPasien tbody').empty();
					fetch_data('yes', tgl_awal, tgl_akhir);
				} else {
					alert("Both Date is Required");
				}
			});
		});
		$('#tgl_awal').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
	    $('#tgl_akhir').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
	</script>
<?php endif ?>