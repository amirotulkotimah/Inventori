<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Brand_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Brand_m');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('brand_c');
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');

        $data['user'] = $this->Brand_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/brand', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function tambah_data() { //function untuk tambah data
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Brand_m');
        $this->load->model('Role_kategori_m');
        $this->load->model('Data_kategori_m');

        $data['role'] = $this->Role_kategori_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_brand', $data);
        $this->load->view('footer');
    }

    public function input_data() { //function input untuk memasukkan proses inputan data ke database
        $save_sukses = 'Berhasil menambah data';

        $merk_barang = $this->input->post('merk_barang');
        $sub_merk = $this->input->post('id_kategori');
        
        $data = array( //array data untuk menampung inputan data
            'merk_barang' => $merk_barang,
            'sub_merk' => $sub_merk
            
        );
        $this->Brand_m->input_data($data, 'tb_brand');
        $this->session->set_flashdata('save', $save_sukses);  
        helper_log("tambah", "Tambah data brand");
        redirect('brand_c');
    }

    public function edit_data($id_merk) {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Role_kategori_m');
        $this->load->model('Data_kategori_m');

        $where = array('id_merk' => $id_merk);

        $data['role'] = $this->Role_kategori_m->getAll()->result();
        $data['user'] = $this->Brand_m->edit_data($where, 'tb_brand')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/edit_brand', $data);
        $this->load->view('footer');
    }
    public function update() {
        $update_sukses = 'Data berhasil di update';
        $id_merk = $this->input->post('id_merk');
        $merk_barang = $this->input->post('merk_barang');
        $sub_merk = $this->input->post('id_kategori');
       
        $data = array( //array data untuk menampung inputan data
            'merk_barang' => $merk_barang,
            'sub_merk' => $sub_merk
        );

        $where = array(
            'id_merk' => $id_merk
        );
        $this->Brand_m->update_data($where,$data, 'tb_brand');
        $this->session->set_flashdata('update', $update_sukses);
        helper_log("edit", "Edit data brand id : $id_merk");
        redirect('brand_c');
    }

    public function hapus_data($id_merk) {
        $del_sukses = 'Berhasil menghapus data';
        $where = array('id_merk' => $id_merk);
        $this->Brand_m->hapus_data($where, 'tb_brand');
        $this->session->set_flashdata('sukses', $del_sukses);
        helper_log("hapus", "Hapus data brand id : $id_merk");
        redirect('brand_c');
    }

    public function delete(){    
    $del_sukses = 'Berhasil menghapus data';    
    $id_merk = $_POST['id_merk']; 
    $this->Brand_m->delete($id_merk);
    $this->session->set_flashdata('sukses', $del_sukses);
    helper_log("hapus", "Hapus data brand");
                
    redirect('brand_c');    
    }
    }
?>