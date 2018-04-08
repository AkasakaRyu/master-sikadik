<?php defined('BASEPATH') OR edatait('No direct script access allowed');
class Pasien extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MPasien');
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

	public function list_data_pasien() {
		$list = $this->MPasien->GetAll();
		$datatb= array();
		$nomor = 1;
		foreach ($list as $data) {
			if($data->status_pasien=="Baru") {
				$status = 'class="label label-primary"';
			} else {
				$status = 'class="label label-danger"';
			};
			$row = array();
			$row[] = $nomor++;
			$row[] = '<a id="getdata" pasien="'.$data->id_pasien.'" style="cursor:pointer">'.$data->id_pasien.'</a>';
			$row[] = $data->nm_pasien;
			$row[] = $data->usia_pasien;
			$row[] = $data->tgl_lahir_pasien;
			$row[] = $data->alamat_pasien;
			$row[] = $data->jenis_kelamin_pasien;
			$row[] = '<label id="data" data-toggle="modal" data-target="#myModal" pasien="'.$data->id_pasien.'" '.$status.' style="cursor:pointer">'.$data->status_pasien.'</label>';

			$datatb[] = $row;
		}

		$output = array(
						"draw" => $this->input->post('draw'),
						"data" => $datatb
					);
		echo json_encode($output);
	}

	public function list_data_kunjungan_pasien($id_pasien) {
		$list = $this->MPasien->GetKunjungan($id_pasien);
		$datatb= array();
		$nomor = 1;
		foreach ($list as $data) {
			$row = array();
			$row[] = $nomor++;
			$row[] = $data->tanggal_kunjungan_pasien;

			$datatb[] = $row;
		}

		$output = array(
						"draw" => $this->input->post('draw'),
						"data" => $datatb
					);
		echo json_encode($output);
	}

	public function filter_laporan() {
		$list = $this->MPasien->FilterLaporan();
		$datatb= array();
		$nomor = 1;
		foreach ($list as $data) {
			if($data->status_pasien=="Baru") {
				$status = 'class="label label-primary"';
			} else {
				$status = 'class="label label-danger"';
			};
			$row = array();
			$row[] = $nomor++;
			$row[] = $data->id_pasien;
			$row[] = $data->nm_pasien;
			$row[] = $data->usia_pasien;
			$row[] = $data->tgl_lahir_pasien;
			$row[] = $data->alamat_pasien;
			$row[] = $data->jenis_kelamin_pasien;
			$row[] = $data->tanggal_kunjungan_pasien;
			$row[] = '<label '.$status.'>'.$data->status_pasien.'</label>';

			$datatb[] = $row;
		}

		$output = array(
						"draw" => $this->input->post('draw'),
						"data" => $datatb
					);
		echo json_encode($output);
	}

	public function get_data_pasien() {
		$res = $this->MPasien->GetSingle();
		$data = array(
						'id_pasien' => $res->id_pasien,
						'nm_pasien' => $res->nm_pasien,
						'alamat_pasien' => $res->alamat_pasien,
						'usia_pasien' => $res->usia_pasien,
						'tgl_lahir_pasien' => $res->tgl_lahir_pasien,
						'jenis_kelamin_pasien' => $res->jenis_kelamin_pasien,
					);
		echo json_encode($data);
	}

	public function tambah_pasien() {
		$res = $this->MPasien->SaveData();
		$data = array(
						'status' => $res
					);
		echo json_encode($data);
	}

	public function hapus_data_pasien() {
		$res = $this->MPasien->DelData();
		$data = array(
						'status' => $res
					);
		echo json_encode($data);
	}

}