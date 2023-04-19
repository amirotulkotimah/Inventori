<?php
/**
 * 
 */
class Barang_keluar_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_barang_keluar');
		$this->db->order_by('id_barang_keluar','DESC');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

	function lihat_data($jenis_bk){ //membuat function lihat_data_anak
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_barang_keluar'); //dari tabel data_penimbangan;
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_keluar.nama_kategori', 'LEFT');
		$this->db->join('tb_kurir', 'tb_kurir.id_kurir = tb_barang_keluar.kurir', 'LEFT');
		$this->db->where('jenis_bk',$jenis_bk); //berdasarkan id_anakk
		$this->db->order_by('id_barang_keluar','DESC');
		$query = $this->db->get();
		return $query;
	}

	function input($data, $table) { //membuat function tambah data
		$this->db->insert($table,$data);
		//untuk proses insert data ke database
	}
	function detail_data($where,$table) {

		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_keluar.nama_kategori', 'LEFT');
		$this->db->join('tb_kurir', 'tb_kurir.id_kurir = tb_barang_keluar.kurir', 'LEFT');
    	return $this->db->get_where($table, $where);
	
    }

    function edit_data($where,$table) { //membuat function edit_data
    	$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_keluar.nama_kategori', 'LEFT');
    	$this->db->join('tb_kurir', 'tb_kurir.id_kurir = tb_barang_keluar.kurir', 'LEFT');
		return $this->db->get_where($table, $where);
	}

	function update_data($where,$data,$table) { //membuat function update_data
		$this->db->where($where);
		$this->db->update($table, $data); //untuk mengubah data pada database
	}

	public function hapus($id_barang_keluar, $where, $table){
    $this->db->where('id_barang_keluar',$id_barang_keluar);
    $this->db->where($where);
    return $this->db->delete($table);
  }

  function cek($jenis_bk, $table){
		$this->db->select('*');
		$this->db->from('tb_barang_keluar');
		$this->db->where('jenis_bk', $jenis_bk);
		$query = $this->db->get();
		return $query;
	}

	function get_data_barang_bykode($kode_barang){
		
		//$hsl=$this->db->query("SELECT * FROM tb_stok WHERE kode_barang='$kode_barang'");
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_stok');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
		$this->db->where('kode_barang', $kode_barang);
		$hsl = $this->db->get();

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kode_barang' => $data->kode_barang,
					'nama_barang' => $data->nama_barang,
					'merk_barang' => $data->merk_barang,
					'id_kategori' => $data->id_kategori,
					'nama_kategori' => $data->nama_kategori,
					//'autor' => $data->autor,
					'foto' => $data->foto,
				);
			}
		}
		return $hasil;
	}

	function get_otomatis($kode_barang){
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_stok');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
		$this->db->where('kode_barang', $kode_barang);
		$hsl = $this->db->get();
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $obj) {
				$hasil=array(
					'kode_barang' => $obj->kode_barang,
					'nama_barang' => $obj->nama_barang,
					'merk_barang' => $obj->merk_barang,
					'id_kategori' => $obj->id_kategori,
					'nama_kategori' => $obj->nama_kategori,
					//'autor' => $data->autor,
					'foto' => $obj->foto,
				);
			}
		}
		return $hasil;
	}

	function count_all_bk_inter() 
    {
    	$this->db->where('jenis_bk', 1);
        return $this->db->get('tb_barang_keluar')->num_rows(); 
    }

    function count_all_bk_ekster() 
    {
    	$this->db->where('jenis_bk', 2);
        return $this->db->get('tb_barang_keluar')->num_rows(); 
    }

    function bk_perid ($where, $jenis_bk){
    	$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_keluar.nama_kategori', 'LEFT');
    	$this->db->join('tb_kurir', 'tb_kurir.id_kurir = tb_barang_keluar.kurir', 'LEFT');
		$this->db->where($where);
		$this->db->where('jenis_bk', $jenis_bk);
		$this->db->order_by('id_barang_keluar','DESC');
		return $this->db->get('tb_barang_keluar')->result();
	}
	function cari($jenis_bk, $kode_bk){ //membuat function cari data penimbangan
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_barang_keluar'); // dari tabel data_penimbangan
		//$where = "jenis_bk = '" . $jenis_bk . "' AND kode_bk= '".$kode_bk."'";
		$where = "jenis_bk = '" . $jenis_bk . "' AND kode_bk= '".$kode_bk."'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
		}

	function cari_peruser($jenis_bk, $kode_bk, $user_id){ //membuat function cari data penimbangan
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_barang_keluar'); // dari tabel data_penimbangan
		$where = "jenis_bk = '" . $jenis_bk . "' AND kode_bk= '".$kode_bk."' AND user_id= '".$user_id."'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}

	public function delete($id_barang_keluar){        
		$this->db->where_in('id_barang_keluar', $id_barang_keluar);    
		$this->db->delete('tb_barang_keluar');  
	}

	public function data_terbaru() //membuat function data_terbaru
	{
    	$this->db->select('*'); //memilih semua data
    	$this->db->from('tb_barang_keluar'); 
    	$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_keluar.nama_kategori', 'LEFT');
    	$this->db->join('tb_kurir', 'tb_kurir.id_kurir = tb_barang_keluar.kurir', 'LEFT');
    	$this->db->where('jenis_bk', 2);
    	$this->db->order_by('id_barang_keluar','DESC'); //untuk menampilkan data anak dari urutan terbawah
    	$this->db->limit(5); //untuk menampilkan 3 data anak
    	$query = $this->db->get();
    	return $query;
    }
}
?>