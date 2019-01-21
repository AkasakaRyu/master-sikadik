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
		$data["Title"] = "Dashboard";
		$data["Breadcrumb"] = array('Dashboard');
		$data["Nav"] = "Dashboard";

		$level = $this->session->userdata('level');
		if($level=='Master') {
			$data["Konten"] = "user/v_dashboard";
		}

		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			// $row[] = $no;
			$row[] = $data->bug_id;
			$row[] = $data->bug_reported_date;
			$row[] = $data->bug_category;
			$row[] = $data->bug_type;
			$row[] = $data->bug_description;
			$row[] = $data->bug_status;
			
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function get_total_bug_reported() {
		echo $this->m->get_total_bug_reported();
	}

	public function get_total_bug_resolved() {
		echo $this->m->get_total_bug_resolved();
	}

	public function get_total_bug_unresolved() {
		echo $this->m->get_total_bug_unresolved();
	}

	public function get_total_bug_percentage() {
		echo $this->m->get_total_bug_percentage();
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('portal','refresh');
	}

}