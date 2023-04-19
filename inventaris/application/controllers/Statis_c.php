<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Statis_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Home_m');
        $this->load->model('Barang_masuk_m');
        $this->load->model('Barang_keluar_m');
         $this->load->model('Statis_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function lihat_grafik($id_kategori){ //function untuk menampilkan halaman awal yang ditampilka
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');

        $data['id_kategori'] = $id_kategori;

        $data['total_data_bm_perhari'] = $this->Statis_m->bm_baju_perhari($data['id_kategori']);
        $data['total_data_bk_perhari'] = $this->Statis_m->bk_baju_perhari($data['id_kategori']);
        $data['total_stok_baju'] = $this->Statis_m->total_stok_baju($data['id_kategori']);
        $data['total_bm'] = $this->Statis_m->total_bm_kat_baju($data['id_kategori']);
        $data['total_bk'] = $this->Statis_m->total_bk_kat_baju($data['id_kategori']);
        $data['total_bm_baju_1minggu'] = $this->Statis_m->bm_baju_satu_minggu($data['id_kategori']);
        $data['total_bm_baju_2minggu'] = $this->Statis_m->bm_baju_dua_minggu($data['id_kategori']);
        $data['total_bm_baju_1bulan'] = $this->Statis_m->bm_baju_satu_bulan($data['id_kategori']);
        $data['total_bm_baju_2bulan'] = $this->Statis_m->bm_baju_dua_bulan($data['id_kategori']);
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        
        $this->load->view('header', $data);
        $this->load->view('pages/statis', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }
}
?>
