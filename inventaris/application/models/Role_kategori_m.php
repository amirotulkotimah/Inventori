<?php
/**
 * 
 */
class Role_kategori_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_kategori');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}
}
?>