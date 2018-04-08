<?php defined('BASEPATH') OR edatait('No direct script access allowed');
class Laporan extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['Title'] = "Laporan";
		$data['Nav'] = "Laporan";
		$data['Nama'] = $this->session->userdata('nama');
		$data['Level'] = $this->session->userdata('level');
		$data['Konten'] = "Laporan/V_Laporan";
		$this->load->view('Master',$data);
	}

}