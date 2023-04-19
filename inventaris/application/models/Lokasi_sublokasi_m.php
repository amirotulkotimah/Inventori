<?php
/**
 * 
 */
class Lokasi_sublokasi_m extends CI_Model
{

	function get_lokasi(){
		$hasil=$this->db->query("SELECT * FROM tb_lokasi");
		return $hasil;
	}
	
	function get_sublokasi($id_lokasi){
		$hasil=$this->db->query("SELECT * FROM tb_sublokasi WHERE sublokasi_lokasi_id='$id_lokasi'");
		return $hasil->result();
	}
	}
?>