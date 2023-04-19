<?php
/**
 * 
 */
class Barang_masuk_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_barang_masuk');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_masuk.nama_kategori', 'LEFT');
		//$this->db->join('tb_sublokasi', 'tb_sublokasi.id_sublokasi = tb_barang_masuk.sublokasi', 'LEFT');
		$this->db->order_by('id_barang_masuk','DESC');
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
        $this->db->from('tb_barang_masuk'); 
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_masuk.nama_kategori', 'LEFT');
		//$this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_barang_masuk.lokasi', 'LEFT');
		//$this->db->join('tb_sublokasi', 'tb_sublokasi.id_sublokasi = tb_barang_masuk.sublokasi', 'LEFT');
		$this->db->where('id_barang_masuk', $where);
        $query = $this->db->get();
        return $query;
    }

    function edit_data($where,$table) { //membuat function edit_data
    	$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_masuk.nama_kategori', 'LEFT');
		//$this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_barang_masuk.lokasi', 'LEFT');
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

	function get_data_barang_bykode($kode_barang){
		
		//$hsl=$this->db->query("SELECT * FROM tb_stok WHERE kode_barang='$kode_barang'");
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_stok');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_stok.nama_kategori', 'LEFT');
		$this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_stok.lokasi', 'LEFT');
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
					'lokasi' => $data->lokasi,
					'sublokasi' => $data->sublokasi,
					//'autor' => $data->autor,
					'foto' => $data->foto,
				);
			}
		}
		return $hasil;
	}

	function count_all_bm() 
    {
        return $this->db->get('tb_barang_masuk')->num_rows(); 
    }

    function bm_perid ($where){
    	$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_masuk.nama_kategori', 'LEFT');
		$this->db->where($where);
		return $this->db->get('tb_barang_masuk')->result();
	}

	function cari($kode_bm){ //membuat function cari data penimbangan
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_barang_masuk'); // dari tabel data_penimbangan
		$where = "kode_bm='".$kode_bm."'"; //berdasarkan id_anakk
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
		}

	function cari_peruser($kode_bm, $user_id){ //membuat function cari data penimbangan
		$this->db->select('*'); //memilih semua data
		$this->db->from('tb_barang_masuk'); // dari tabel data_penimbangan
		$where = "kode_bm = '" . $kode_bm . "' AND user_id= '".$user_id."'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	public function delete($id_barang_masuk){        
		$this->db->where_in('id_barang_masuk', $id_barang_masuk);    
		$this->db->delete('tb_barang_masuk');  
	}

	public function data_terbaru() //membuat function data_terbaru
	{
    	$this->db->select('*'); //memilih semua data
    	$this->db->from('tb_barang_masuk'); 
    	$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang_masuk.nama_kategori', 'LEFT');
    	$this->db->order_by('id_barang_masuk','DESC'); //untuk menampilkan data anak dari urutan terbawah
    	$this->db->limit(3); //untuk menampilkan 3 data anak
    	$query = $this->db->get();
    	return $query;
    }

}
?>