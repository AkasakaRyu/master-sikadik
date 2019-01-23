<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-lg-12">
					<h3 class="box-title"><?= $Title ?> Lists</h3>
				</div>
			</div>
			<div class="box-body row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Dari Tanggal</label>
						<?php
							$data = array(
								'id' => 'tgl_awal',
								'name' => 'tgl_awal',
								'class' => 'form-control',
								'type' => 'date',
								'autocomplete' => 'off'
							);
							echo form_input($data);
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Sampai Tanggal</label>
						<?php
							$data = array(
								'id' => 'tgl_akhir',
								'name' => 'tgl_akhir',
								'class' => 'form-control',
								'type' => 'date',
								'autocomplete' => 'off'
							);
							echo form_input($data);
						?>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="button" id="filter" class="btn btn-block btn-primary">Filter</button>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?= $Title ?> Lists</h3>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table id="dtTable" class="table table-bordered table-striped">
						<thead>
							<th>Tanggal Kunjungan</th>
							<th>Kode</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Usia</th>
							<th>Tanggal Lahir</th>
							<th>Alamat</th>
							<th>Status</th>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('report/js/js_report_kunjungan') ?>