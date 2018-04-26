<?php defined('BASEPATH') OR edatait('No direct script access allowed');
class MPasien extends CI_Model {

	private $data_pasien = "ak_data_pasien";
	private $data_kunjungan_pasien = "ak_data_kunjungan_pasien";

	public function GetAll() {
		$res = $this->db->where($this->data_pasien.'.deleted',FALSE)
						->join($this->data_kunjungan_pasien,
								$this->data_pasien.'.id_pasien='.
								$this->data_kunjungan_pasien.'.id_pasien'
							)
						->get($this->data_pasien);
		return $res->result();
	}

	public function GetKunjungan($id_pasien) {
		$res = $this->db->where('id_pasien',$id_pasien)->get($this->data_kunjungan_pasien);
		return $res->result();
	}

	public function GetSingle() {
		$id_pasien = $this->input->post('id_pasien');
		$res = $this->db->where('id_pasien',$id_pasien)->get($this->data_pasien);
		return $res->row();
	}

	public function GetTotalData() {
		$res = $this->db->where('deleted',FALSE)
						->get($this->data_pasien);
		return $res->num_rows();
	}

	public function FilterLaporan() {
		if($this->input->post('is_date_search')!="yes") {
			$res = $this->GetAll();
		} else {
			$res = $this->db->where($this->data_pasien.'.deleted',FALSE)
							->where('tanggal_kunjungan_pasien>=',$this->input->post('tgl_awal'))
							->where('tanggal_kunjungan_pasien<=',$this->input->post('tgl_akhir'))
							->join($this->data_kunjungan_pasien,
									$this->data_pasien.'.id_pasien='.
									$this->data_kunjungan_pasien.'.id_pasien'
								)
							->get($this->data_pasien)->result();
		}
		return $res;
	}

	public function SaveData() {
		if($this->input->post('id_pasien')=="") {
			$first_alphabet = substr($this->input->post('nm_pasien'),0,1);
			$hitung_data = $this->db->like('id_pasien',$first_alphabet)->get($this->data_pasien)->num_rows();
			if($hitung_data==1) {
				$id = str_pad($hitung_data+1, 4, "0", STR_PAD_LEFT);
			} elseif($hitung_data>1) {
				$id = str_pad($hitung_data+1, 4, "0", STR_PAD_LEFT);
			} else {
				$id = str_pad(1, 4, "0", STR_PAD_LEFT);
			}
			$id_pasien = $first_alphabet.$id;
			if($this->input->post('usia_pasien')=="") {
				$usia = NULL;
			} else {
				$usia = $this->input->post('usia_pasien');
			}
			if($this->input->post('tgl_lahir_pasien')=="") {
				$tgl_lahir_pasien = NULL;
			} else {
				$tgl_lahir_pasien = $this->input->post('tgl_lahir_pasien');
			}
			$find_nama = $this->db->where('nm_pasien',$this->input->post('nm_pasien'))->get($this->data_pasien);
			$find_alamat = $this->db->where('alamat_pasien',$this->input->post('alamat_pasien'))->get($this->data_pasien);
			if($find_nama->num_rows()==0 AND $find_alamat->num_rows()==0) {
				$data = array(
								'id_pasien' => $id_pasien,
								'nm_pasien' => $this->input->post('nm_pasien'),
								'usia_pasien' => $usia,
								'tgl_lahir_pasien' => $tgl_lahir_pasien,
								'alamat_pasien' => $this->input->post('alamat_pasien'),
								'jenis_kelamin_pasien' => $this->input->post('jenis_kelamin_pasien'),
								'status_pasien' => "BARU"
							);
				$this->db->insert($this->data_pasien,$data);
				$this->db->insert(
									$this->data_kunjungan_pasien,
									array(
											'id_pasien' => $id_pasien,
											'tanggal_kunjungan_pasien' => $this->input->post('tanggal_kunjungan_pasien')
										)
								);
			} else {
				$kunjungan = $this->db->where('id_pasien',$find_nama->row('id_pasien'))->get($this->data_kunjungan_pasien)->num_rows();
				$data = array(
								'nm_pasien' => $this->input->post('nm_pasien'),
								'usia_pasien' => $this->input->post('usia_pasien'),
								'tgl_lahir_pasien' => $this->input->post('tgl_lahir_pasien'),
								'alamat_pasien' => $this->input->post('alamat_pasien'),
								'jenis_kelamin_pasien' => $this->input->post('jenis_kelamin_pasien'),
								'status_pasien' => "LAMA",
								'total_kunjungan_pasien' => $kunjungan+1
							);
				$this->db->where('nm_pasien',$this->input->post('nm_pasien'))->update($this->data_pasien,$data);
				$this->db->insert(
									$this->data_kunjungan_pasien,
									array(
											'id_pasien' => $find_nama->row('id_pasien'),
											'tanggal_kunjungan_pasien' => $this->input->post('tanggal_kunjungan_pasien')
										)
								);
			}
			return TRUE;
		} else {
			$find_nama = $this->db->where('nm_pasien',$this->input->post('nm_pasien'))->get($this->data_pasien);
			$first_alphabet = substr($this->input->post('nm_pasien'),0,1);
			$hitung_data = $this->db->like('id_pasien',$first_alphabet)->get($this->data_pasien)->num_rows();
			if($hitung_data==1) {
				$id = str_pad($hitung_data+1, 4, "0", STR_PAD_LEFT);
			} elseif($hitung_data>1) {
				$id = str_pad($hitung_data+1, 4, "0", STR_PAD_LEFT);
			} else {
				$id = str_pad(1, 4, "0", STR_PAD_LEFT);
			}
			if($this->input->post('nm_pasien')!=$find_nama->row('nm_pasien')) {
				$id_pasien = $first_alphabet.$id;
			} else {
				$id_pasien = $this->input->post('id_pasien');
			}
			if($this->input->post('usia_pasien')=="") {
				$usia = NULL;
			} else {
				$usia = $this->input->post('usia_pasien');
			}
			if($this->input->post('tgl_lahir_pasien')=="") {
				$tgl_lahir_pasien = NULL;
			} else {
				$tgl_lahir_pasien = $this->input->post('tgl_lahir_pasien');
			}
			$data = array(
							'id_pasien' => $id_pasien,
							'nm_pasien' => $this->input->post('nm_pasien'),
							'usia_pasien' => $this->input->post('usia_pasien'),
							'tgl_lahir_pasien' => $this->input->post('tgl_lahir_pasien'),
							'alamat_pasien' => $this->input->post('alamat_pasien'),
							'jenis_kelamin_pasien' => $this->input->post('jenis_kelamin_pasien')
						);
			$this->db->where('id_pasien',$this->input->post('id_pasien'))->update($this->data_pasien,$data);
		}
	}

	public function DelData() {
		$id_pasien = $this->input->post('id_pasien');
		$res = $this->db->where('id_pasien',$id_pasien)
						->update($this->data_pasien,array('deleted' => TRUE));
		return TRUE;
	}

}