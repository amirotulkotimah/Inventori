<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Lokasi_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Lokasi_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('lokasi_c');
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');

        $data['user'] = $this->Lokasi_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/lokasi', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function tambah_data() { //function untuk tambah data
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Lokasi_m');
        $this->load->model('Data_kategori_m');

        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_lokasi');
        $this->load->view('footer');
    }

    public function input_data() { //function input untuk memasukkan proses inputan data ke database
        $save_sukses = 'Berhasil menambah data';
        $lokasi = $this->input->post('lokasi');
        
        $data = array( //array data untuk menampung inputan data
            'lokasi' => $lokasi,
            
        );
        $this->Lokasi_m->input_data($data, 'tb_lokasi');
        $this->session->set_flashdata('save', $save_sukses); 
        helper_log("tambah", "Tambah data lokasi");
        redirect('lokasi_c');
    }

    public function edit_data($id_lokasi) {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $where = array('id_lokasi' => $id_lokasi);

        $data['user'] = $this->Lokasi_m->edit_data($where, 'tb_lokasi')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/edit_lokasi', $data);
        $this->load->view('footer');
    }
    public function update() {
        $update_sukses = 'Data berhasil di update';
        $id_lokasi = $this->input->post('id_lokasi');
        $lokasi = $this->input->post('lokasi');
       
        $data = array( //array data untuk menampung inputan data
            'lokasi' => $lokasi,
        );

        $where = array(
            'id_lokasi' => $id_lokasi
        );
        $this->Lokasi_m->update_data($where,$data, 'tb_lokasi');
        $this->session->set_flashdata('update', $update_sukses);
        helper_log("edit", "Edit data lokasi id : $id_lokasi");
        redirect('lokasi_c');
    }

    public function hapus_data($id_lokasi) {
        $del_sukses = 'Berhasil menghapus data';
        $where = array('id_lokasi' => $id_lokasi);
        $this->Lokasi_m->hapus_data($where, 'tb_lokasi');
        $this->session->set_flashdata('sukses', $del_sukses);
        helper_log("hapus", "Hapus data lokasi id : $id_lokasi");
        redirect('lokasi_c');
    }

    public function delete(){ 
    $del_sukses = 'Berhasil menghapus data';       
    $id_lokasi = $_POST['id_lokasi']; 
    $this->Lokasi_m->delete($id_lokasi);
    $this->session->set_flashdata('sukses', $del_sukses);
    helper_log("hapus", "Hapus data lokasi");
                
    redirect('lokasi_c');    
    }
    }
?>