<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Pasien extends CI_Model {
	
	protected $kunjungan = "ak_data_pasien_kunjungan";
	protected $pasien = "ak_data_pasien";

	public function get_list_data() {
		return $this->db->where(
			'deleted',FALSE
		)->get($this->pasien)->result();
	}

	public function cari_nama($term) {
		return $this->db->where(
			'deleted',FALSE
		)->like(
			'pasien_nama',$term
		)->limit(5)->get($this->pasien)->result();
	}

	public function cari_alamat($term) {
		return $this->db->where(
			'deleted',FALSE
		)->like(
			'pasien_alamat',$term
		)->limit(5)->get($this->pasien)->result();
	}

	public function cek_nama_pasien() {
		$ikeh = $this->db->where(
			'deleted',FALSE
		)->where(
			'pasien_nama',$this->input->post('pasien_nama')
		)->get($this->pasien)->num_rows();
		if($ikeh>0) { return TRUE; } else { return FALSE; }
	}

	public function cek_alamat_pasien() {
		$kimochi = $this->db->where(
			'deleted',FALSE
		)->where(
			'pasien_alamat',$this->input->post('pasien_alamat')
		)->get($this->pasien)->num_rows();
		if($kimochi>0) { return TRUE; } else { return FALSE; }
	}

	public function hitung_kunjungan() {
		$pasien_id = $this->db->where(
			'pasien_nama',$this->input->post('pasien_nama')
		)->where(
			'pasien_alamat',$this->input->post('pasien_alamat')
		)->get($this->pasien)->row('pasien_id');
		return $this->db->where(
			'pasien_id',$pasien_id
		)->get($this->kunjungan)->num_rows()+1;
	}

	public function hitung_usia($usia=NULL) {
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

	public function get_id() {
		$first_alphabet = substr($this->input->post('pasien_nama'),0,1);
		$hitung_data = $this->db->like(
			'pasien_id',$first_alphabet
		)->get($this->pasien)->num_rows();
		return $first_alphabet.date('y')."-".str_pad($hitung_data+1, 3, "0", STR_PAD_LEFT);
	}

	public function simpan($data) {
		return $this->db->insert($this->pasien,$data);
	}

	public function simpan_pasien_lama($data) {
		return $this->db->where(
			'pasien_id',$this->get_pasien_id()
		)->update($this->pasien,$data);
	}

	public function get_pasien_id() {
		return $this->db->where(
			'pasien_nama',$this->input->post('pasien_nama')
		)->get($this->pasien)->row('pasien_id');
	}

	public function get_data() {
		return $this->db->where(
			$this->pasien.'.pasien_id',$this->input->post('pasien_id')
		)->join(
			$this->kunjungan,
			$this->kunjungan.'.pasien_id='.
			$this->pasien.'.pasien_id'
		)->get($this->pasien)->row();
	}

	public function edit($data) {
		return $this->db->where(
			'pasien_id', $this->input->post('pasien_id')
		)->update($this->pasien,$data);
	}

	public function options($src) {
		$res = $this->db->select(
			"pasien_id as id,pasien_id as value,pasien_nama as text"
		)->like(
			'pasien_nama',$src
		)->get(
			$this->pasien
		)->result();
		return $res;
	}

}