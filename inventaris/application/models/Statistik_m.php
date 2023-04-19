<?php

/**
 * 
 */
class Statistik_m extends CI_Model
{

    function bm_baju_perhari($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_masuk'); 
		$this->db->where('day(tanggal_bm)=',date('d')); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function bm_skincare_perhari($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_masuk'); 
		$this->db->where('day(tanggal_bm)=',date('d')); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	} 

	function bm_minuman_perhari($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_masuk'); 
		$this->db->where('day(tanggal_bm)=',date('d')); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function bk_baju_perhari($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_keluar'); 
		$this->db->where('day(tanggal_bk)=',date('d')); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function bk_skincare_perhari($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_keluar'); 
		$this->db->where('day(tanggal_bk)=',date('d')); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function bk_minuman_perhari($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_keluar'); 
		$this->db->where('day(tanggal_bk)=',date('d')); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	} 

	function total_stok_baju(){
		$this->db->select('*'); 
		$this->db->from('tb_stok'); 
		$this->db->where('nama_kategori', '1'); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_stok_skincare(){
		$this->db->select('*'); 
		$this->db->from('tb_stok'); 
		$this->db->where('nama_kategori', '2'); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_stok_minuman(){
		$this->db->select('*'); 
		$this->db->from('tb_stok'); 
		$this->db->where('nama_kategori', '3'); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}    

	function total_bm_kat_baju($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_masuk');  
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_bm_kat_skincare($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_masuk');  
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_bm_kat_minuman($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_masuk');  
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_bk_kat_baju($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_keluar'); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}

	function total_bk_kat_skincare($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_keluar'); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	} 

	function total_bk_kat_minuman($nama_kategori){
		$this->db->select('*'); 
		$this->db->from('tb_barang_keluar'); 
		$this->db->where('nama_kategori', $nama_kategori); 
		$query = $this->db->get(); 
		return $query->num_rows();
	}   

	function bm_baju_satu_minggu($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 WEEK ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_baju_dua_minggu($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 2 WEEK ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_baju_satu_bulan($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 month ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_baju_dua_bulan($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 2 month ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_skincare_satu_minggu($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 WEEK ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_skincare_dua_minggu($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 2 WEEK ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_skincare_satu_bulan($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 month ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_skincare_dua_bulan($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 2 month ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_minuman_satu_minggu($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 WEEK ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_minuman_dua_minggu($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 2 WEEK ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_minuman_satu_bulan($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 1 month ) AND CURDATE( )");
		return $hasil->num_rows();
	}

	function bm_minuman_dua_bulan($nama_kategori){
		$hasil = $this->db->query("select * from tb_barang_masuk where nama_kategori ='$nama_kategori' AND tanggal_bm BETWEEN DATE_SUB( CURDATE( ) ,INTERVAL 2 month ) AND CURDATE( )");
		return $hasil->num_rows();
	}
}
?>