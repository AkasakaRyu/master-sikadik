<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pasien extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('Data/M_Pasien','m');
			$this->load->model('Data/M_Kunjungan','n');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Pasien";
		$data["Breadcrumb"] = array("Dashboard","Pasien");
		$data["Nav"] = "Pasien";
		$data["Konten"] = "data/v_pasien";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $data->pasien_id;
			$row[] = $data->pasien_nama;
			$row[] = $data->pasien_jenis_kelamin;
			$row[] = $data->pasien_usia;
			$row[] = $data->pasien_tanggal_lahir;
			$row[] = $data->pasien_alamat;
			$row[] = $data->pasien_status;
			$row[] = $data->total_kunjungan_pasien;
			$row[] = "<a id='edit' data='".$data->pasien_id."'>Edit</a> | <a id='hapus' data='".$data->pasien_id."'>Hapus</a>";
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function autocomplete_nama(){
		if (isset($_GET['term'])) {
			$result = $this->m->cari_nama($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
				$arr_result[] = $row->pasien_nama;
				echo json_encode($arr_result);
			}
		}
	}

	public function autocomplete_alamat(){
		if (isset($_GET['term'])) {
			$result = $this->m->cari_alamat($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
				$arr_result[] = $row->pasien_alamat;
				echo json_encode($arr_result);
			}
		}
	}

	public function simpan() {
		$pasien_id = $this->input->post('pasien_id');
		$cek_nama_pasien = $this->m->cek_nama_pasien();
		$cek_alamat_pasien = $this->m->cek_alamat_pasien();
		$total_kunjungan = $this->m->hitung_kunjungan();

		if($this->input->post('pasien_tanggal_lahir')=="") {
			$usia = $this->input->post('pasien_usia');
		} else {
			$usia = $this->m->hitung_usia();
		}

		if($cek_nama_pasien==TRUE AND $cek_alamat_pasien==TRUE) {
			$status = "Lama";
		} else {
			$status = "Baru";
		}

		if($pasien_id=="" AND $status=="Baru") {
			$id = $this->m->get_id();
			$pasien = array(
				'pasien_id' => $id,
				'pasien_nama' => $this->input->post('pasien_nama'),
				'pasien_jenis_kelamin' => $this->input->post('pasien_jenis_kelamin'),
				'pasien_usia' => $usia,
				'pasien_tanggal_lahir' => $this->input->post('pasien_tanggal_lahir'),
				'pasien_alamat' => $this->input->post('pasien_alamat'),
				'pasien_status' => $status,
				'total_kunjungan_pasien' => $total_kunjungan,
			);
			$this->m->simpan($pasien);
			$kunjungan = array(
				'pasien_id' => $id,
				'kunjungan_tanggal' => $this->input->post('kunjungan_tanggal')
			);
			$this->n->simpan($kunjungan);
			$pesan = "Data Pasien Baru Berhasil di Simpan";
		} elseif($pasien_id=="" AND $status=="Lama") {
			$pasien = array(
				'pasien_status' => $status,
				'total_kunjungan_pasien' => $total_kunjungan,
			);
			$this->m->simpan_pasien_lama($pasien);
			$kunjungan = array(
				'pasien_id' => $this->m->get_pasien_id(),
				'kunjungan_tanggal' => $this->input->post('kunjungan_tanggal')
			);
			$this->n->simpan($kunjungan);
			$pesan = "Data Pasien Lama Berhasil di Simpan";
		} else {
			$data = array(
				'pasien_nama' => $this->input->post('pasien_nama'),
				'pasien_jenis_kelamin' => $this->input->post('pasien_jenis_kelamin'),
				'pasien_usia' => $usia,
				'pasien_tanggal_lahir' => $this->input->post('pasien_tanggal_lahir'),
				'pasien_alamat' => $this->input->post('pasien_alamat')
			);
			$this->m->edit($data);
			$pesan = "Data Berhasil di Perbaharui";
		}
		echo json_encode($pesan);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'pasien_id' => $res->pasien_id,
			'pasien_nama' => $res->pasien_nama,
			'pasien_jenis_kelamin' => $res->pasien_jenis_kelamin,
			'pasien_usia' => $res->pasien_usia,
			'pasien_tanggal_lahir' => $res->pasien_tanggal_lahir,
			'kunjungan_tanggal' => $res->kunjungan_tanggal,
			'pasien_alamat' => $res->pasien_alamat
		);
		echo json_encode($data);
	}

	public function options() {
		$q = $this->input->get('q');
		$res = $this->m->options($q);
		echo json_encode($res);
	}

}