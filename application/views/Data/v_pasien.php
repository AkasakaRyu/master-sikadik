<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-lg-12">
					<h3 class="box-title"><?= $Title ?> Lists</h3>
				</div>
			</div>
			<?= form_open("",array('id' => 'FrmPasien')) ?>
				<div class="box-body">
					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#data-umum">Data Umum</a></li>
					  <li><a data-toggle="tab" href="#detail-pasien">Detail Pasien</a></li>
					</ul>
					<div class="tab-content">
					  <div id="data-umum" class="tab-pane fade in active">
					    <h3>Data Pasien</h3>
							<div class="col-lg-4">
								<div class="form-group">
									<label>No. Pasien</label>
									<?php
										$data = array(
											'id' => 'pasien_id',
											'name' => 'pasien_id',
											'class' => 'form-control',
											'readonly' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="form-group">
									<label>Nama Pasien</label>
									<?php
										$data = array(
											'id' => 'pasien_nama',
											'name' => 'pasien_nama',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="form-group">
									<label>Nama Lain ( Alias )</label>
									<?php
										$data = array(
											'id' => 'pasien_alias',
											'name' => 'pasien_alias',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Usia</label>
									<?php
										$data = array(
											'id' => 'pasien_usia',
											'name' => 'pasien_usia',
											'class' => 'form-control',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Tempat Lahir</label>
									<?php
										$data = array(
											'id' => 'pasien_tempat_lahir',
											'name' => 'pasien_tempat_lahir',
											'class' => 'form-control',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<?php
										$data = array(
											'id' => 'pasien_tanggal_lahir',
											'name' => 'pasien_tanggal_lahir',
											'class' => 'form-control',
											'type' => 'date',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<?php
										$data = array(
											'id' => 'pasien_jenis_kelamin',
											'name' => 'pasien_jenis_kelamin',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										$options = array(
											'' => '',
											'Pria' => 'Pria',
											'Wanita' => 'Wanita'
										);
										echo form_dropdown($data,$options);
									?>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="form-group">
									<label>Alamat</label>
									<?php
										$data = array(
											'id' => 'pasien_alamat',
											'name' => 'pasien_alamat',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off',
											'rows' => 3
										);
										echo form_textarea($data);
									?>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Tanggal Kunjungan</label>
									<?php
										$data = array(
											'id' => 'kunjungan_tanggal',
											'name' => 'kunjungan_tanggal',
											'class' => 'form-control',
											'type' => 'date',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
					  </div>
					  <div id="detail-pasien" class="tab-pane fade">
					    <h3>Detail Pasien</h3>
							<div class="col-lg-6">
								<div class="form-group">
									<label>No. KTP</label>
									<?php
										$data = array(
											'id' => 'no_ktp',
											'name' => 'no_ktp',
											'class' => 'form-control',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>No. BPJS</label>
									<?php
										$data = array(
											'id' => 'no_bpjs',
											'name' => 'no_bpjs',
											'class' => 'form-control',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>No. Telepon</label>
									<?php
										$data = array(
											'id' => 'no_telepon',
											'name' => 'no_telepon',
											'class' => 'form-control',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>No. HP</label>
									<?php
										$data = array(
											'id' => 'no_hp',
											'name' => 'no_hp',
											'class' => 'form-control',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Status BPJS</label>
									<?php
										$data = array(
											'id' => 'bpjs',
											'name' => 'bpjs',
											'class' => 'form-control',
											'autocomplete' => 'off'
										);
										$options = array(
											'' => '',
											'BPJS' => 'BPJS',
											'UMUM' => 'UMUM'
										);
										echo form_dropdown($data,$options);
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Status Terapi</label>
									<?php
										$data = array(
											'id' => 'terapi',
											'name' => 'terapi',
											'class' => 'form-control',
											'autocomplete' => 'off'
										);
										$options = array(
											'' => '',
											'Terapi' => 'Terapi',
											'Tidak Terapi' => 'Tidak Terapi'
										);
										echo form_dropdown($data,$options);
									?>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label>Alergi Obat</label>
									<?php
										$data = array(
											'id' => 'alergi_obat',
											'name' => 'alergi_obat',
											'class' => 'form-control',
											'autocomplete' => 'off',
											'rows' => 3
										);
										echo form_textarea($data);
									?>
								</div>
							</div>
					  </div>
					</div>
				</div>
				<div class="box-footer">
					<div class="col-lg-12">
						<button type="submit" class="btn btn-success">Save</button>
					</div>
				</div>
			<?= form_close() ?>
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
							<th>Kode</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Usia</th>
							<th>Tanggal Lahir</th>
							<th>Alamat</th>
							<th>Status</th>
							<th>Kunjungan</th>
							<th></th>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('data/js/js_page_pasien') ?>
