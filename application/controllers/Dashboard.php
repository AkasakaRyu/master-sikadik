<?php defined('BASEPATH') OR edatait('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('isLogin');
		if(!$isLogin) {
			redirect('portal','refresh');
		}
	}

	public function index() {
		$data['Title'] = "Dashboard";
		$data['Nav'] = "Dashboard";
		$data['Nama'] = $this->session->userdata('nama');
		$data['Level'] = $this->session->userdata('level');
		$data['Konten'] = "Dashboard/V_Admin";
		$this->load->view('Master',$data);
	}

}