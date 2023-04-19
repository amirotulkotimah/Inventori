<?php

/**
 * 
 */
class Statis_m extends CI_Model
{

    function bm_baju_perhari($id_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_masuk'); 
		$this->db->where('day(tanggal_bm)=',date('d')); 
		$this->db->where('nama_kategori', $id_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function bk_baju_perhari($id_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_keluar'); 
		$this->db->where('day(tanggal_bk)=',date('d')); 
		$this->db->where('nama_kategori', $id_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_stok_baju($id_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_stok'); 
		$this->db->where('nama_kategori', $id_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_bm_kat_baju($id_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_masuk');  
		$this->db->where('nama_kategori', $id_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_bk_kat_baju($id_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_keluar'); 
		$this->db->where('nama_kategori', $id_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function bm_baju_satu_minggu($id_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$id_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 WEEK ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_baju_dua_minggu($id_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$id_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 2 WEEK ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_baju_satu_bulan($id_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$id_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 month ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_baju_dua_bulan($id_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$id_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 2 month ) AND CURDATE( )");
		return $hasil->num_rows();
	}

}
?>