<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_stok_m extends CI_Model {

	public function insert($data){
		$insert = $this->db->insert_batch('tb_stok', $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		$this->db->select('*');
		return $this->db->get('tb_stok')->result_array();
	}

}
