<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model {

	protected $bug = "ak_data_bug";

	public function get_list_data() {
		return $this->db->where(
			'deleted',false
		)->get($this->bug)->result();
	}

	public function get_total_bug_reported() {
		return $this->db->where(
			'deleted',false
		)->get($this->bug)->num_rows();
	}

	public function get_total_bug_resolved() {
		return $this->db->where(
			'bug_status','resolved'
		)->where(
			'bug_status','close'
		)->where(
			'deleted',false
		)->get($this->bug)->num_rows();
	}

	public function get_total_bug_unresolved() {
		return $this->db->where(
			'bug_status','new'
		)->where(
			'bug_status','open'
		)->where(
			'deleted',false
		)->get($this->bug)->num_rows();
	}

	public function get_total_bug_percentage() {
		$total_bug = $this->db->where(
			'deleted',false
		)->get($this->bug)->num_rows();

		$total_unresolved = $this->db->where(
			'bug_status','new'
		)->where(
			'bug_status','open'
		)->where(
			'deleted',false
		)->get($this->bug)->num_rows();

		return round($total_bug/$total_unresolved);
	}
	
}