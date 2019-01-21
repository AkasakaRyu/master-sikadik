<?php $level = $this->session->userdata('level') ?>
<ul class="sidebar-menu" data-widget="tree">
	<li class="header">GENERAL</li>
	<li class="<?php if($Nav=="Dashboard") : echo "active"; endif; ?>">
		<a href="<?= base_url('user/dashboard') ?>">
			<i class="fa fa-home"></i> <span>Dashboard</span>
		</a>
	</li>
	<?php if($level=="Master" OR $level=="CEO" OR $level=="Manager") : ?>
		<li class="header">GENERAL DATA</li>
		<li class="<?php if($Nav=="General") : echo "active"; endif; ?>">
			<a href="<?= base_url('data/pasien') ?>">
				<i class="fa fa-file-medical"></i> <span>Data Pasien</span>
			</a>
		</li>
		<li class="<?php if($Nav=="General") : echo "active"; endif; ?>">
			<a href="<?= base_url('data/kelas') ?>">
				<i class="fa fa-cube"></i> <span>Data Kelas</span>
			</a>
		</li>
		<li class="<?php if($Nav=="General") : echo "active"; endif; ?>">
			<a href="<?= base_url('data/mapel') ?>">
				<i class="fa fa-book"></i> <span>Data Mata Pelajaran</span>
			</a>
		</li>
		<li class="header">USERS</li>
		<li class="treeview <?php if($Nav=="Settings") : echo "active"; endif; ?>">
			<a href="#">
				<i class="fa fa-users"></i>
				<span>Users Settings</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?= base_url('user/guru') ?>"><i class="fa fa-circle-o"></i> Guru</a></li>
				<li><a href="<?= base_url('user/siswa') ?>"><i class="fa fa-circle-o"></i> Siswa</a></li>
			</ul>
		</li>
		<li class="header">RAPORT</li>
		<li class="<?php if($Nav=="Raport") : echo "active"; endif; ?>">
			<a href="<?= base_url('raport/kehadiran') ?>">
				<i class="fa fa-clock"></i> <span>Data Kehadiran Siswa</span>
			</a>
		</li>
		<li class="<?php if($Nav=="Raport") : echo "active"; endif; ?>">
			<a href="<?= base_url('raport/nilai') ?>">
				<i class="fa fa-clipboard-list"></i> <span>Data Nilai Siswa</span>
			</a>
		</li>
	<?php endif; ?>
</ul>