<?php defined('BASEPATH') OR edatait('No direct script access allowed');
class Konfigurasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MUser');
		$isLogin = $this->session->userdata('isLogin');
		if(!$isLogin) {
			redirect('portal','refresh');
		}
	}

	public function index() {
		$data['Title'] = "Konfigurasi";
		$data['Nav'] = "Konfigurasi";
		$data['Nama'] = $this->session->userdata('nama');
		$data['Level'] = $this->session->userdata('level');
		$data['Konten'] = "Konfigurasi/V_Konfigurasi";
		$this->load->view('Master',$data);
	}

	public function get_data() {
		$res = $this->MUser->get_single();
		$data = array(
						'id_user' => $res->id_user,
						'nm_user' => $res->nm_user,
						'login_user' => $res->login_user,
						'pass_user' => $res->pass_user,
						'level_user' => $res->level_user,
					);
		echo json_encode($data);
	}

	public function verif_user() {
		$res = $this->MUser->verif_user();
		$data = array(
						'status' => $res
					);
		echo json_encode($data);
	}

	public function tambah_user() {
		$res = $this->MUser->SaveData();
		$data = array(
						'status' => $res
					);
		echo json_encode($data);
	}

	public function edit_user() {
		$res = $this->MUser->EditData();
		$data = array(
						'status' => $res
					);
		echo json_encode($data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('portal','refresh');
	}

	public function backupdb() {
		$this->load->dbutil();
		$prefs = array(
						'tables'        => array('ak_data_kunjungan_pasien','ak_data_pasien'),
						'ignore'        => array(),
						'format'        => 'txt',
						'filename'      => date('Y-m-d H:i')."_simkes_sikadik.sql",
						'add_drop'      => TRUE,
						'add_insert'    => TRUE,
						'newline'       => "\n"
					  );
		$backup = $this->dbutil->backup($prefs);
		$this->load->helper('download');
		force_download(date('Y-m-d')."_simkes_sikadik.sql", $backup);
	}

	public function restoredb() {
		// upload dulu
		$this->load->library('upload');
		$config['upload_path'] = './database/';
		$config['remove_spaces'] = TRUE;
		$config['file_name'] = date('Y-m-d')."_simkes_sikadik.sql";
		$config['allowed_types'] = '*';
		$config['max_size'] = '40960';
		$this->upload->initialize($config);
		if($this->upload->do_upload('file')) {
			// baru eksekusi
			$data = $this->upload->data();
			$isi_file = file_get_contents('./database/'.$data["file_name"]);
			$string_query = rtrim( $isi_file, "\n;" );
			$array_query = explode(";", $string_query);
			foreach($array_query as $query) {
				$this->db->query($query);
			}
			redirect("dashboard","refresh");
		} else {
			echo $this->upload->display_errors().'<a href="'.base_url().'">Kembali</a>';
		}
	}

}