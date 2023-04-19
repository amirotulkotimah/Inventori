<?php
/**
 * 
 */
class Role_jenis_bk_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_jenis_bk');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

	function tampil_nama($jenis_bk){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_jenis_bk');// dari tabel tm_user
		//$where = "id_anak".$id_anakk;
		$this->db->where("id_jenis_bk", $jenis_bk);
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

	function tambah($jenis_bk){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_jenis_bk');// dari tabel tm_user
		//$where = "id_anak".$id_anakk;
		$this->db->where("id_jenis_bk", $jenis_bk);
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

}
?>