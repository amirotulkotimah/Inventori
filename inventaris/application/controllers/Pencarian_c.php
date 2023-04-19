<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Pencarian_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Pencarian_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan

        $config['base_url'] = site_url('pencarian_c');
        $this->load->model('Data_kategori_m');

        $data['user'] = $this->Pencarian_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }
    }
?>