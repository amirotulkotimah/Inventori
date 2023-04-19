<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Kategori_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Kategori_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('kategori_c');
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');

        $data['user'] = $this->Kategori_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/kategori', $data);
        $this->load->view('footer');
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
        $this->load->view('pages/tambah_kategori');
        $this->load->view('footer');
    }

    public function input_data() { //function input untuk memasukkan proses inputan data ke database
        $save_sukses = 'Berhasil menambah data';

        $nama_kategori = $this->input->post('nama_kategori');
        
        $data = array( //array data untuk menampung inputan data
            'nama_kategori' => $nama_kategori,
            
        );
        $this->Kategori_m->input_data($data, 'tb_kategori'); 
        $this->session->set_flashdata('save', $save_sukses);
        helper_log("tambah", "Tambah data kategori");
        redirect('kategori_c');
    }

    public function edit_data($id_kategori) {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $where = array('id_kategori' => $id_kategori);
        $data['user'] = $this->Kategori_m->edit_data($where, 'tb_kategori')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/edit_kategori', $data);
        $this->load->view('footer');
    }
    public function update() {
        $update_sukses = 'Data berhasil di update';

        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
       
        $data = array( //array data untuk menampung inputan data
            'nama_kategori' => $nama_kategori,
        );

        $where = array(
            'id_kategori' => $id_kategori
        );
        $this->Kategori_m->update_data($where,$data, 'tb_kategori');
        $this->session->set_flashdata('update', $update_sukses);
        helper_log("edit", "Edit data kategori id : $id_kategori");
        redirect('kategori_c');
    }

    public function hapus_data($id_kategori) {
        $del_sukses = 'Berhasil menghapus data';

        $where = array('id_kategori' => $id_kategori);
        $this->Kategori_m->hapus_data($where, 'tb_kategori');
        $this->session->set_flashdata('sukses', $del_sukses);

        helper_log("hapus", "Hapus data kategori id : $id_kategori");
        redirect('kategori_c');
    }

    public function delete(){      
    $del_sukses = 'Berhasil menghapus data';

    $id_kategori = $_POST['id_kategori']; 
    $this->Kategori_m->delete($id_kategori);
    $this->session->set_flashdata('sukses', $del_sukses);
    
    helper_log("hapus", "Hapus data kategori");
                
    redirect('kategori_c');    
    }
    }
?>