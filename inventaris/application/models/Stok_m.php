<?php
/**
 * 
 */
class Stok_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_stok');
		//$this->db->where('tb_stok.user_id', $this->session->userdata('session_id_user'));
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
		$this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_stok.lokasi', 'LEFT');
		//$this->db->join('tb_sublokasi', 'tb_sublokasi.id_sublokasi = tb_stok.sublokasi', 'LEFT');
		$this->db->order_by('kode_barang','ASC');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}
	function lihat_stok($id_kategori){ //membuat function lihat_data_anak
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_stok'); //dari tabel data_penimbangan;
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
		$this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_stok.lokasi', 'LEFT');
		$this->db->where('id_kategori',$id_kategori); //berdasarkan id_anakk
		$this->db->order_by('kode_barang','ASC');
		$query = $this->db->get();
		return $query;
	}

	function input_data($data, $table) { //membuat function input_data
		$this->db->insert($table,$data);
		//untuk proses tambah data ke database
	}

	 function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

	function simpan_upload($kode_barang, $nama_barang, $nama_kategori, $jumlah_barang, $lokasi, $sublokasi, $foto, $autor, $user_id){
		$hasil=$this->db->query("INSERT INTO tb_stok(kode_barang, nama_barang, nama_kategori, jumlah_barang, lokasi, sublokasi, foto, autor, user_id) VALUES ('$kode_barang','$nama_barang', '$nama_kategori', '$jumlah_barang', '$lokasi', '$sublokasi', '$foto', '$autor', '$user_id') ");
		return $hasil;
	}

	function detail_data($where,$table) { //membuat fuction edit_data
    $this->db->select('*'); //memilih semua
    $this->db->from('tb_stok'); 
    $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
		$this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_stok.lokasi', 'LEFT');
		//$this->db->join('tb_sublokasi', 'tb_sublokasi.id_sublokasi = tb_stok.sublokasi', 'LEFT');
		$this->db->where('kode_barang', $where);
        $query = $this->db->get();
        return $query;
    }

    function edit_data($where,$table) { //membuat function edit_data
    	$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
    	$this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_stok.lokasi', 'LEFT');
		//$this->db->join('tb_sublokasi', 'tb_sublokasi.id_sublokasi = tb_stok.sublokasi', 'LEFT');
		return $this->db->get_where($table, $where); //memanggil tabel data anak
	}

	public function update_data($kode_barang,$data)
  {
    $this->db->where('kode_barang',$kode_barang);
    return $this->db->update('tb_stok',$data);
  }

	function get_lokasi(){
		$hasil=$this->db->query("SELECT * FROM tb_lokasi");
		return $hasil;
	}
	
	function get_sublokasi($id_lokasi){
		$hasil=$this->db->query("SELECT * FROM tb_sublokasi WHERE sublokasi_lokasi_id='$id_lokasi'");
		return $hasil->result();
	}

	function get_merk($id_kategori){
		$hasil=$this->db->query("SELECT * FROM tb_brand WHERE sub_merk='$id_kategori'");
		return $hasil->result();
	}

	function get_kategori(){
		$hasil=$this->db->query("SELECT * FROM tb_kategori");
		return $hasil;
	}

	function stok_perid ($where){
		$this->db->where($where);
		return $this->db->get('tb_stok')->result();
	}

	function cari($kode_barang){ //membuat function cari data penimbangan
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_stok'); // dari tabel data_penimbangan
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
		$this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_stok.lokasi', 'LEFT');
		$where = "kode_barang ='".$kode_barang."'"; //berdasarkan id_anakk
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}

	public function get_id($kode_barang)
    {
    	$this->db->where('kode_barang',$kode_barang);
    	return $this->db->get('tb_stok');
    }
    public function hapus_data($kode_barang, $where, $table)
  	{
    $this->db->where('kode_barang',$kode_barang);
    $this->db->where($where);
    return $this->db->delete($table);
  }

  public function delete($kode_barang){        
		$this->db->where_in('kode_barang', $kode_barang);  
		$this->db->delete('tb_stok');  
	}
	public function get_foto($kode_barang)
	{
    	$this->db->where_in('kode_barang',$kode_barang);
    	return $this->db->get('tb_stok');
  }

  function count_all_stok() 
  {
      return $this->db->get('tb_stok')->num_rows(); 
  }

  public function data_terbaru() //membuat function data_terbaru
	{
    	$this->db->select('*'); //memilih semua data
    	$this->db->from('tb_stok'); 
    	$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
    	$this->db->order_by('kode_barang','DESC'); //untuk menampilkan data anak dari urutan terbawah
    	$this->db->limit(3); //untuk menampilkan 3 data anak
    	$query = $this->db->get();
    	return $query;
    }

}
?>