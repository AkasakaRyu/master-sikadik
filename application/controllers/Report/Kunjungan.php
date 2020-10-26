<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kunjungan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('Data/M_Kunjungan','m');
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Report Kunjungan";
		$data["Breadcrumb"] = array("Dashboard","Report Kunjungan");
		$data["Nav"] = "Kunjungan";
		$data["Konten"] = "report/v_kunjungan";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			if($data->pasien_tanggal_lahir!="0000-00-00" OR $data->pasien_tanggal_lahir=="") 
			{
				$usia = $this->m->hitung_usia_detail($data->pasien_tanggal_lahir);
			} 
			else 
			{
				$usia = $data->pasien_usia;
			}
			$no++;
			$row = array();
			$row[] = $data->kunjungan_tanggal;
			$row[] = $data->pasien_id;
			$row[] = $data->pasien_nama;
			$row[] = $data->pasien_jenis_kelamin;
			$row[] = $usia;
			$row[] = $data->pasien_tanggal_lahir;
			$row[] = $data->pasien_alamat;
			$row[] = $data->pasien_status;
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function options() {
		$q = $this->input->get('q');
		$res = $this->m->options($q);
		echo json_encode($res);
	}

}