<?php
/**
 * 
 */
class Pencarian_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tm_user');// dari tabel tm_user
		$this->db->join('tm_grup', 'tm_user.grup = tm_grup.id_grup');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}
}
?>