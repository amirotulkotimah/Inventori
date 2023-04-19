<?php
/**
 * 
 */
class Master_user_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_master_user');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

	function input_data($data, $table) { //membuat function input_data
		$this->db->insert($table,$data);
		//untuk proses tambah data ke database
	}

	function edit_data($where,$table) { //membuat function edit_data
		return $this->db->get_where($table, $where); //memanggil tabel data anak
	}

	function update_data($where,$data,$table) { //membuat fuction update_data
		$this->db->where($where);
		$this->db->update($table, $data); //untuk mengubah data pada database
	}

	function hapus_data($where, $table) { //membuat function hapus_data
	    $this->db->where($where);
	    $this->db->delete($table); //untuk menghapus data pada database
	}
}
?>