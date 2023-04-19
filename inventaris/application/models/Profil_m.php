<?php
/**
 * 
 */
class Profil_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_user');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}
	function edit_data($where,$table) { //membuat function edit_data
		return $this->db->get_where($table, $where); //memanggil tabel data anak
	}
	function update_pass($where,$data,$table) { //membuat fuction update_data
		$this->db->where($where);
		$this->db->update($table, $data); //untuk mengubah data pada database
	}

	public function update_data($id_user,$data)
  {
    $this->db->where('id_user',$id_user);
    return $this->db->update('tb_user',$data);
  }
  public function get_id($id_user)
    {
    	$this->db->where('id_user',$id_user);
    	return $this->db->get('tb_user');
    }
}
?>