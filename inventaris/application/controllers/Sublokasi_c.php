<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Sublokasi_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Sublokasi_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('sublokasi_c');
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');

        $data['user'] = $this->Sublokasi_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/sublokasi', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function tambah_data() { //function untuk tambah data
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Sublokasi_m');
        $this->load->model('Role_lokasi_m');
        $this->load->model('Data_kategori_m');

        $data['role'] = $this->Role_lokasi_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_sublokasi', $data);
        $this->load->view('footer');
    }

    public function input_data() { //function input untuk memasukkan proses inputan data ke database
        $save_sukses = 'Berhasil menambah data';
        $sublokasi = $this->input->post('sublokasi');
        $lokasi = $this->input->post('id_lokasi');
        
        $data = array( //array data untuk menampung inputan data
            'sublokasi' => $sublokasi,
            'sublokasi_lokasi_id' => $lokasi
            
        );
        $this->Sublokasi_m->input_data($data, 'tb_sublokasi'); 
        $this->session->set_flashdata('save', $save_sukses); 
        helper_log("tambah", "Tambah data sublokasi");
        redirect('sublokasi_c');
    }

    public function edit_data($id_sublokasi) {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Role_lokasi_m');
        $this->load->model('Data_kategori_m');

        $where = array('id_sublokasi' => $id_sublokasi);

        $data['role'] = $this->Role_lokasi_m->getAll()->result();
        $data['user'] = $this->Sublokasi_m->edit_data($where, 'tb_sublokasi')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/edit_sublokasi', $data);
        $this->load->view('footer');
    }
    public function update() {
        $update_sukses = 'Data berhasil di update';
        $id_sublokasi = $this->input->post('id_sublokasi');
        $sublokasi = $this->input->post('sublokasi');
        $lokasi = $this->input->post('id_lokasi');
       
        $data = array( //array data untuk menampung inputan data
            'sublokasi' => $sublokasi,
            'sublokasi_lokasi_id' => $lokasi
        );

        $where = array(
            'id_sublokasi' => $id_sublokasi
        );
        $this->Sublokasi_m->update_data($where,$data, 'tb_sublokasi');
        $this->session->set_flashdata('update', $update_sukses);
        helper_log("edit", "Edit data sublokasi id : $id_sublokasi");
        redirect('sublokasi_c');
    }

    public function hapus_data($id_sublokasi) {
        $del_sukses = 'Berhasil menghapus data';
        $where = array('id_sublokasi' => $id_sublokasi);
        $this->Sublokasi_m->hapus_data($where, 'tb_sublokasi');
        $this->session->set_flashdata('sukses', $del_sukses);
        helper_log("hapus", "Hapus data sublokasi id : $id_sublokasi");
        redirect('sublokasi_c');
    }

    public function delete(){
    $del_sukses = 'Berhasil menghapus data';        
    $id_sublokasi = $_POST['id_sublokasi']; 
    $this->Sublokasi_m->delete($id_sublokasi);
    $this->session->set_flashdata('sukses', $del_sukses);
    helper_log("hapus", "Hapus data sublokasi");
                
    redirect('sublokasi_c');    
    }
    }
?>