<?php
/**
 * 
 */
class Data_pengguna_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_user');
		$this->db->join('tb_master_user', 'tb_master_user.id_master_user = tb_user.autor', 'LEFT');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

	function input_data($data, $table) { //membuat function input_data
		$this->db->insert($table,$data);
		//untuk proses tambah data ke database
	}

	function detail_data($where,$table) { //membuat fuction edit_data
    $this->db->select('*'); //memilih semua
    $this->db->from('tb_user'); 
    $this->db->join('tb_master_user', 'tb_master_user.id_master_user = tb_user.autor', 'LEFT');
		$this->db->where('id_user', $where);
    $query = $this->db->get();
    return $query;
    }

  function edit_data($where,$table) { //membuat function edit_data
    	$this->db->join('tb_master_user', 'tb_master_user.id_master_user = tb_user.autor', 'LEFT');
		return $this->db->get_where($table, $where); //memanggil tabel data anak
	}

	public function update_data($id_user,$data)
  {
    $this->db->where('id_user',$id_user);
    return $this->db->update('tb_user',$data);
  }
   
   public function hapus_data($id_user, $where, $table)
  	{
    $this->db->where('id_user',$id_user);
    $this->db->where($where);
    return $this->db->delete($table);
  }

	function login($user, $pass, $table){
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get();
		return $query;
	}

	public function get_id($id_user)
  {
    	$this->db->where('id_user',$id_user);
    	return $this->db->get('tb_user');
  }

  public function delete($id_user){        
		$this->db->where_in('id_user', $id_user);  
		$this->db->delete('tb_user');  
	}
	public function get_foto($id_user)
    {
    	$this->db->where_in('id_user',$id_user);
    	return $this->db->get('tb_user');
    }
}
?>