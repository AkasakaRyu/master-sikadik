<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Kunjungan extends CI_Model {
	
	protected $kunjungan = "ak_data_pasien_kunjungan";
	protected $pasien = "ak_data_pasien";

	public function get_list_data() {
		if($this->input->post('is_date_search')!="yes") {
			return $this->db->join(
			$this->kunjungan,
			$this->kunjungan.'.pasien_id='.
			$this->pasien.'.pasien_id'
		)->get($this->pasien)->result();
		} else {
			return $this->db->where(
				$this->pasien.'.deleted',FALSE
			)->where(
				'kunjungan_tanggal>=',$this->input->post('tgl_awal')
			)->where(
				'kunjungan_tanggal<=',$this->input->post('tgl_akhir')
			)->join(
				$this->kunjungan,
				$this->pasien.'.id_pasien='.
				$this->kunjungan.'.id_pasien'
			)->get($this->pasien)->result();
		}
	}

	public function simpan($data) {
		return $this->db->insert($this->kunjungan,$data);
	}

	public function hitung_usia_detail($usia=NULL) {
		if($usia==NULL)
		{
			$x = $this->input->post('pasien_tanggal_lahir');
		}
		else
		{
			$x = $usia;
		}
		$from = new DateTime($x);
		$to = new DateTime('today');
		return $from->diff($to)->y;
	}
	
}