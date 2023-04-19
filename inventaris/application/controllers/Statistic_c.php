<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Statistic_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Home_m');
        $this->load->model('Barang_masuk_m');
        $this->load->model('Barang_keluar_m');
         $this->load->model('Statistik_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function baju($nama_kategori){ //function untuk menampilkan halaman awal yang ditampilka
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');

        $data['nama_kategori'] = $nama_kategori;
        $data['total_data_bm_perhari'] = $this->Statistik_m->bm_baju_perhari($data['nama_kategori']);
        $data['total_data_bk_perhari'] = $this->Statistik_m->bk_baju_perhari($data['nama_kategori']);
        $data['total_stok_baju'] = $this->Statistik_m->total_stok_baju();
        $data['total_bm'] = $this->Statistik_m->total_bm_kat_baju($data['nama_kategori']);
        $data['total_bk'] = $this->Statistik_m->total_bk_kat_baju($data['nama_kategori']);
        $data['total_bm_baju_1minggu'] = $this->Statistik_m->bm_baju_satu_minggu($data['nama_kategori']);
        $data['total_bm_baju_2minggu'] = $this->Statistik_m->bm_baju_dua_minggu($data['nama_kategori']);
        $data['total_bm_baju_1bulan'] = $this->Statistik_m->bm_baju_satu_bulan($data['nama_kategori']);
        $data['total_bm_baju_2bulan'] = $this->Statistik_m->bm_baju_dua_bulan($data['nama_kategori']);
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        
        $this->load->view('header', $data);
        $this->load->view('pages/statistik_baju', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function skincare($nama_kategori){ //function untuk menampilkan halaman awal yang ditampilka
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');

        $data['nama_kategori'] = $nama_kategori;
        $data['total_data_bm_perhari'] = $this->Statistik_m->bm_skincare_perhari($data['nama_kategori']);
        $data['total_data_bk_perhari'] = $this->Statistik_m->bk_baju_perhari($data['nama_kategori']);
        $data['total_stok_skincare'] = $this->Statistik_m->total_stok_skincare();
        $data['total_bm'] = $this->Statistik_m->total_bm_kat_skincare($data['nama_kategori']);
        $data['total_bk'] = $this->Statistik_m->total_bk_kat_skincare($data['nama_kategori']);
        $data['total_bm_skincare_1minggu'] = $this->Statistik_m->bm_skincare_satu_minggu($data['nama_kategori']);
        $data['total_bm_skincare_2minggu'] = $this->Statistik_m->bm_skincare_dua_minggu($data['nama_kategori']);
        $data['total_bm_skincare_1bulan'] = $this->Statistik_m->bm_skincare_satu_bulan($data['nama_kategori']);
        $data['total_bm_skincare_2bulan'] = $this->Statistik_m->bm_skincare_dua_bulan($data['nama_kategori']);
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/statistik_skincare', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function minuman($nama_kategori){ //function untuk menampilkan halaman awal yang ditampilka
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');

        $data['nama_kategori'] = $nama_kategori;
        $data['total_data_bm_perhari'] = $this->Statistik_m->bm_minuman_perhari($data['nama_kategori']);
        $data['total_data_bk_perhari'] = $this->Statistik_m->bk_baju_perhari($data['nama_kategori']);
        $data['total_stok_minuman'] = $this->Statistik_m->total_stok_minuman();
        $data['total_bm'] = $this->Statistik_m->total_bm_kat_minuman($data['nama_kategori']);
        $data['total_bk'] = $this->Statistik_m->total_bk_kat_minuman($data['nama_kategori']);
        $data['total_bm_minuman_1minggu'] = $this->Statistik_m->bm_minuman_satu_minggu($data['nama_kategori']);
        $data['total_bm_minuman_2minggu'] = $this->Statistik_m->bm_minuman_dua_minggu($data['nama_kategori']);
        $data['total_bm_minuman_1bulan'] = $this->Statistik_m->bm_minuman_satu_bulan($data['nama_kategori']);
        $data['total_bm_minuman_2bulan'] = $this->Statistik_m->bm_minuman_dua_bulan($data['nama_kategori']);
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        
        $this->load->view('header', $data);
        $this->load->view('pages/statistik_minuman', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }
    }
?>