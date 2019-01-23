<?php $level = $this->session->userdata('level') ?>
<ul class="sidebar-menu" data-widget="tree">
	<li class="header">GENERAL</li>
	<li class="<?php if($Nav=="Dashboard") : echo "active"; endif; ?>">
		<a href="<?= base_url('user/dashboard') ?>">
			<i class="fa fa-home"></i> <span>Dashboard</span>
		</a>
	</li>
	<?php if($level=="Master") : ?>
		<li class="header">SETTINGS</li>
		<li class="treeview <?php if($Nav=="User") : echo "active"; endif; ?>">
			<a href="#">
				<i class="fa fa-users"></i>
				<span>Users Settings</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?= base_url('user/level') ?>"><i class="fa fa-list"></i> Level</a></li>
				<li><a href="<?= base_url('user/officer') ?>"><i class="fa fa-list"></i> Officer</a></li>
			</ul>
		</li>
		<li class="header">PASIEN</li>
		<li class="<?php if($Nav=="Pasien") : echo "active"; endif; ?>">
			<a href="<?= base_url('data/pasien') ?>">
				<i class="fa fa-notes-medical"></i> <span>Data Pasien</span>
			</a>
		</li>
		<li class="header">LAPORAN</li>
		<li class="<?php if($Nav=="Kunjungan") : echo "active"; endif; ?>">
			<a href="<?= base_url('report/kunjungan') ?>">
				<i class="fa fa-clock"></i> <span>Kunjungan Pasien</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if($level=="Users") : ?>
		<li class="header">PASIEN</li>
		<li class="<?php if($Nav=="Pasien") : echo "active"; endif; ?>">
			<a href="<?= base_url('data/pasien') ?>">
				<i class="fa fa-notes-medical"></i> <span>Data Pasien</span>
			</a>
		</li>
		<li class="header">LAPORAN</li>
		<li class="<?php if($Nav=="Kunjungan") : echo "active"; endif; ?>">
			<a href="<?= base_url('report/kunjungan') ?>">
				<i class="fa fa-clock"></i> <span>Kunjungan Pasien</span>
			</a>
		</li>
	<?php endif; ?>
</ul>