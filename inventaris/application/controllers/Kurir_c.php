<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Kurir_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Kurir_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('kurir_c');
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');

        $data['user'] = $this->Kurir_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/kurir', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function tambah_data() { //function untuk tambah data
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Kurir_m');
        $this->load->model('Data_kategori_m');

        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_kurir');
        $this->load->view('footer');
    }

    public function input_data() { //function input untuk memasukkan proses inputan data ke database
        $save_sukses = 'Berhasil menambah data';
        $kurir = $this->input->post('kurir');
        
        $data = array( //array data untuk menampung inputan data
            'kurir' => $kurir,
            
        );
        $this->Kurir_m->input_data($data, 'tb_kurir');
        $this->session->set_flashdata('save', $save_sukses);  
        helper_log("tambah", "Tambah data kurir");
        redirect('kurir_c');
    }

    public function edit_data($id_kurir) {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $where = array('id_kurir' => $id_kurir);

        $data['user'] = $this->Kurir_m->edit_data($where, 'tb_kurir')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/edit_kurir', $data);
        $this->load->view('footer');
    }
    public function update() {
        $update_sukses = 'Data berhasil di update';
        $id_kurir = $this->input->post('id_kurir');
        $kurir = $this->input->post('kurir');
       
        $data = array( //array data untuk menampung inputan data
            'kurir' => $kurir,
        );

        $where = array(
            'id_kurir' => $id_kurir
        );
        $this->Kurir_m->update_data($where,$data, 'tb_kurir');
        $this->session->set_flashdata('update', $update_sukses);
        helper_log("edit", "Edit data kurir id : $id_kurir");
        redirect('kurir_c');
    }

    public function hapus_data($id_kurir) {
        $del_sukses = 'Berhasil menghapus data';
        $where = array('id_kurir' => $id_kurir);
        $this->Kurir_m->hapus_data($where, 'tb_kurir');
        $this->session->set_flashdata('sukses', $del_sukses);
        helper_log("hapus", "Hapus data kurir id : $id_kurir");
        redirect('kurir_c');
    }

    public function delete(){      
    $del_sukses = 'Berhasil menghapus data';  
    $id_kurir = $_POST['id_kurir']; 
    $this->Kurir_m->delete($id_kurir);
    $this->session->set_flashdata('sukses', $del_sukses);
    helper_log("hapus", "Hapus data kurir");
                
    redirect('kurir_c');    
    }
    }
?>