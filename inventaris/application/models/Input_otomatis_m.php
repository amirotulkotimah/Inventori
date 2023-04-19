<?php
class Input_otomatis_m extends CI_Model{
	function get_data_barang_bykode($kode_barang){
		$hsl=$this->db->query("SELECT * FROM tb_stok WHERE kode_barang='$kode_barang'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kode_barang' => $data->kode_barang,
					'nama_barang' => $data->nama_barang,
					'nama_kategori' => $data->nama_kategori,
					'lokasi' => $data->lokasi,
					'sublokasi' => $data->sublokasi,
					'autor' => $data->autor,
					'foto' => $data->foto,
				);
			}
		}
		return $hasil;
	}
}