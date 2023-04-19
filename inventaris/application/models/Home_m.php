<?php
/**
 * 
 */
class Home_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_history');
		$this->db->order_by('id_history','DESC');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

	public function delete($id_history){        
		$this->db->where_in('id_history', $id_history);    
		$this->db->delete('tb_history');  
	}

	function getdata($id_history){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_history');
		$this->db->where('id_history');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}
}
?>