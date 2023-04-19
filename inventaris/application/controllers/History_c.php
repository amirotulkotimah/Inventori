<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class History_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Home_m');
        $this->load->model('Barang_masuk_m');
        $this->load->model('Barang_keluar_m');
        $this->load->model('Data_kategori_m');
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

        $data['user'] = $this->Home_m->getAll()->result();
        //$data['total_data_bm'] = $this->Barang_masuk_m-> count_all_bm();
        //$data['total_data_bk'] = $this->Barang_keluar_m->count_all_bk();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/history', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function delete(){        
    $id_history = $_POST['id_history']; 
    $this->Home_m->delete($id_history);
                
    redirect('history_c');    
    }
    
    }
?>