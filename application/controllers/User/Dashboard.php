<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$this->load->model('User/M_Dashboard','m');
		} else {
			redirect('portal','refresh');
		}
	}

	public function index() {
		redirect('data/pasien');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('portal','refresh');
	}

}