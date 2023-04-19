<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Master_user_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Master_user_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('master_user_c');
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');

        $data['user'] = $this->Master_user_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/master_user', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function tambah_data() { //function untuk tambah data
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Kategori_m');
        $this->load->model('Data_kategori_m');

        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_master_user');
        $this->load->view('footer');
    }

    public function input_data() { //function input untuk memasukkan proses inputan data ke database
        $save_sukses = 'Berhasil menambah data';
        $autor = $this->input->post('autor');
        
        $data = array( //array data untuk menampung inputan data
            'autor' => $autor,
            
        );
        $this->Master_user_m->input_data($data, 'tb_master_user');
        $this->session->set_flashdata('save', $save_sukses);  
        redirect('master_user_c');
    }

    public function edit_data($id_master_user) {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');

        $where = array('id_master_user' => $id_master_user);
        $data['user'] = $this->Master_user_m->edit_data($where, 'tb_master_user')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/edit_master_user', $data);
        $this->load->view('footer');
    }
    public function update() {
        $update_sukses = 'Data berhasil di update';
        $id_master_user = $this->input->post('id_master_user');
        $autor = $this->input->post('autor');
       
        $data = array( //array data untuk menampung inputan data
            'autor' => $autor,
        );

        $where = array(
            'id_master_user' => $id_master_user
        );
        $this->Master_user_m->update_data($where,$data, 'tb_master_user');
        $this->session->set_flashdata('update', $update_sukses);
        redirect('master_user_c');
    }

    public function hapus_data($id_master_user) {
        $del_sukses = 'Berhasil menghapus data';
        $where = array('id_master_user' => $id_master_user);
        $this->Master_user_m->hapus_data($where, 'tb_master_user');
        $this->session->set_flashdata('sukses', $del_sukses);
        redirect('master_user_c');
    }
    }
?>