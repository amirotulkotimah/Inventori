<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Home_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Home_m');
        $this->load->model('Barang_masuk_m');
        $this->load->model('Barang_keluar_m');
        $this->load->model('Stok_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('home_c');
        $this->load->model('Data_kategori_m');

        $data['baru'] = $this->Stok_m->data_terbaru()->result();
        $data['bm_baru'] = $this->Barang_masuk_m->data_terbaru()->result();
        $data['bk_baru'] = $this->Barang_keluar_m->data_terbaru()->result();
        $data['total_data_bm'] = $this->Barang_masuk_m-> count_all_bm();
        $data['total_data_bk_inter'] = $this->Barang_keluar_m->count_all_bk_inter();
        $data['total_data_bk_ekter'] = $this->Barang_keluar_m->count_all_bk_ekster();
        $data['total_stok'] = $this->Stok_m->count_all_stok();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function delete(){        
    $id_history = $_POST['id_history']; 
    $this->Home_m->delete($id_history);
    helper_log("hapus", "Hapus data history log");
                
    redirect('home_c');    
    }
    
    }
?>