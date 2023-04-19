<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Barang_masuk_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Barang_masuk_m');
        $this->load->library('session');
        
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');

        $config['base_url'] = site_url('barang_masuk_c');
        $role= $this->session->userdata('session_grup');
        $user_id = $this->session->userdata('session_id_user');
       
        if ($role == "3") {
            $where = [
                'user_id' => $user_id
            ];
            $data['user'] = $this->Barang_masuk_m->bm_perid($where);
        } else if ($role == "1") {
            $data['user'] = $this->Barang_masuk_m->getAll()->result();
        } 
        else if ($role == "2") {
            $data['user'] = $this->Barang_masuk_m->getAll()->result();
        }        

        //$data['user'] = $this->barang_masuk_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/barang_masuk', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function tambah_data() { //function untuk tambah data
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Barang_masuk_m');
        $this->load->model('Role_kategori_m');
        $this->load->model('Role_lokasi_m');
        $this->load->model('Role_sublokasi_m');
        $this->load->model('Data_kategori_m');

        $this->load->model('Stok_m');

        $data['user'] = $this->Stok_m->getAll()->result();
        $data['user'] = $this->db->get_where('tb_user',['id_user'=>$this->session->userdata('session_id_user')])->row_array();

        $data['role1'] = $this->Role_kategori_m->getAll()->result();
        $data['role2'] = $this->Role_lokasi_m->getAll()->result();
        $data['role3'] = $this->Role_sublokasi_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_barang_masuk', $data);
        $this->load->view('footer');
    }

    public function input_data() { //function input untuk memasukkan data ke database
        $save_sukses = 'Berhasil menambah data';

        $kode_bm = $this->input->post('kode_barang');
        $nama_bm = $this->input->post('nama_barang');
        $merk_barang = $this->input->post('merk_barang');
        $nama_kategori = $this->input->post('id_kategori');
        $jumlah_bm = $this->input->post('jumlah_bm');
        $lokasi = $this->input->post('lokasi');
        $sublokasi = $this->input->post('sublokasi');
        $tanggal_bm = $this->input->post('tanggal_bm');
        $user_id = $this->input->post('id_user');
        $autor = $this->input->post('autor');
        $foto = $this->input->post('foto');

        $data = array( //array data untuk menampung inputan data
            'kode_bm' => $kode_bm,
            'nama_bm' => $nama_bm,
            'merk_barang' => $merk_barang,
            'nama_kategori' => $nama_kategori,
            'jumlah_bm' => $jumlah_bm,
            'lokasi' => $lokasi,
            'sublokasi' => $sublokasi,
            'tanggal_bm' => $tanggal_bm,
            'user_id' => $user_id,
            'autor' => $autor,
            'foto' => $foto
        );
        $this->Barang_masuk_m->input_data($data, 'tb_barang_masuk'); 
        $this->session->set_flashdata('save', $save_sukses);

        helper_log("tambah", "Tambah barang masuk");
        //untuk mengakses file model 'Data_Anak_model' dan data tersimpan pada tabel data_anak
        redirect('barang_masuk_c');
        //setelah data berhasil tersimpan, halaman web otomatis beralih ke halaman pada function index
    }

    public function detail_data($id_barang_masuk) { //function detail_data untuk melihat detail data anak
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $id_barang_masuk = $id_barang_masuk; //berdasarkan id_anak
        $data['user'] = $this->Barang_masuk_m->detail_data($id_barang_masuk, 'tb_barang_masuk')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/lihat_barang_masuk', $data);
        $this->load->view('footer');

    }

    public function edit_data($id_barang_masuk) { 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Barang_masuk_m');
        $this->load->model('Role_kategori_m');
        $this->load->model('Role_lokasi_m');
        $this->load->model('Role_sublokasi_m');
        $this->load->model('Data_kategori_m');

        $data['role1'] = $this->Role_kategori_m->getAll()->result();
        $data['role2'] = $this->Role_lokasi_m->getAll()->result();
        $data['role3'] = $this->Role_sublokasi_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
 
        $where = array('id_barang_masuk' => $id_barang_masuk); 
        $data['user'] = $this->Barang_masuk_m->edit_data($where, 'tb_barang_masuk')->row_array(); 

        $this->load->view('header', $data);
        $this->load->view('pages/edit_barang_masuk', $data);
        $this->load->view('footer');
    }

    public function update() { //function update untuk mengubah data anak
        $update_sukses = 'Data berhasil di update';

        $id_barang_masuk = $this->input->post('id_barang_masuk');
        $jumlah_bm = $this->input->post('jumlah_bm');
        $tanggal_bm = $this->input->post('tanggal_bm');

        $data = array( //array data untuk menampung inputan data
            'jumlah_bm' => $jumlah_bm,
            'tanggal_bm' => $tanggal_bm,
        );

        $where = array(
            'id_barang_masuk' => $id_barang_masuk
        );
        $this->Barang_masuk_m->update_data($where,$data, 'tb_barang_masuk');
        $this->session->set_flashdata('update', $update_sukses);
        helper_log("edit", "Edit barang masuk id : $id_barang_masuk");

        redirect('barang_masuk_c');
        //setelah data berhasil diubah, halaman web otomatis beralih ke halaman pada function index
    }

    public function hapus_data($id_barang_masuk) { //function untuk hapus data anak
        $del_sukses = 'Berhasil menghapus data';

        $where = array('id_barang_masuk' => $id_barang_masuk); //berdasarkan id_anak
        $this->Barang_masuk_m->hapus_data($where, 'tb_barang_masuk');
        $this->session->set_flashdata('sukses', $del_sukses);

        helper_log("hapus", "Hapus barang masuk id : $id_barang_masuk");
        redirect('barang_masuk_c'); 
    }

    function get_barang(){
        $kode_barang=$this->input->post('kode_barang');
        $data=$this->Barang_masuk_m->get_data_barang_bykode($kode_barang);
        echo json_encode($data);
    }

    public function cari_data(){ //function untuk menampilkan halaman data bersarkan nama
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $role= $this->session->userdata('session_grup');
        $user_id = $this->session->userdata('session_id_user');

        $data = [
            'user_id' => $this->input->get('user_id'),
            'kode_bm'=>$this->input->get('kode_bm')
        ];
        //$data['user'] = $this->barang_masuk_m->cari($data['kode_bm'])->result();
        if ($role == "3") {
            $where = [
                'user_id' => $user_id
            ];
            $data['user'] = $this->Barang_masuk_m->cari_peruser($data['kode_bm'], $user_id)->result();
        } else if ($role == "1") {
            $data['user'] = $this->Barang_masuk_m->cari($data['kode_bm'])->result();
        } 
        else if ($role == "2") {
            $data['user'] = $this->Barang_masuk_m->cari($data['kode_bm'])->result();
        } 
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/cari_bm', $data);
        $this->load->view('footer');
    }
    public function delete(){    
    $del_sukses = 'Berhasil menghapus data';
        
    $id_barang_masuk = $_POST['id_barang_masuk']; 
    $this->Barang_masuk_m->delete($id_barang_masuk);
    $this->session->set_flashdata('sukses', $del_sukses);
    helper_log("hapus", "Hapus data barang_masuk");
                
    redirect('barang_masuk_c');    
    }

    }
?>