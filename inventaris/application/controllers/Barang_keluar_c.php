<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Barang_keluar_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Barang_keluar_m');
        $this->load->library('session');
        
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('barang_keluar_c');
        $this->load->model('Data_kategori_m');
        $this->load->model('Role_jenis_bk_m');

        $data['role1'] = $this->Role_jenis_bk_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/barang_keluar', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function data_barang_keluar($jenis_bk) { //function untuk menampilkan data per anak
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Role_jenis_bk_m'); 
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');
        $data['save_status'] = $this->session->flashdata('status');

        $role= $this->session->userdata('session_grup');
        $user_id = $this->session->userdata('session_id_user');
       
        if ($role == "3") {
            $where = [
                'user_id' => $user_id
            ];
            $data['user'] = $this->Barang_keluar_m->bk_perid($where, $jenis_bk);
        } else if ($role == "1") {
            $data['user'] = $this->Barang_keluar_m->lihat_data($jenis_bk)->result();
        } 
        else if ($role == "2") {
            $data['user'] = $this->Barang_keluar_m->lihat_data($jenis_bk)->result();
        }
        
        $data['jenis_bk'] = $jenis_bk;
        $data['lihat'] = $this->Role_jenis_bk_m->tampil_nama($data['jenis_bk'])->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        //$data['user'] = $this->barang_keluar_m->lihat_data($jenis_bk)->result();


        //$jenis_bk = $this->input->post('id_jenis_bk');
        //$cek = $this->Barang_keluar_m->cek($jenis_bk, 'tb_barang_keluar')->result();
        //if($cek != FALSE) {
            //foreach ($cek as $row) {
                //$jenis_bk = $row->jenis_bk;

            //}
            //$this->session->set_userdata('session_jenis_bk', $jenis_bk);

            $this->load->view('header', $data);
            $this->load->view('pages/data_bk', $data);
            $this->load->view('footer');
        //} //else {
            //$this->load->view('header', $data);
            //$this->load->view('pages/barang_keluar', $data);
            //$this->load->view('footer');
        //}
    }

    public function tambah_data() {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Role_jenis_bk_m');
        $this->load->model('Role_kategori_m');
        $this->load->model('Data_kategori_m');
        $this->load->model('Kurir_m');
        $this->load->model('Lokasi_m');

        $data['role'] = $this->Role_kategori_m->getAll()->result();
        $data['jenis_bk'] = $this->input->get('id_jenis_bk');
        $data['jenis'] = $this->Role_jenis_bk_m->tambah($data['jenis_bk'])->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['role_kurir'] = $this->Kurir_m->getAll()->result();
        $data['role_lokasi'] = $this->Lokasi_m->getAll()->result();
        $data['user'] = $this->db->get_where('tb_user',['id_user'=>$this->session->userdata('session_id_user')])->row_array();

        //$jenis_bk = $this->input->get('id_jenis_bk');
        //$cek = $this->Barang_keluar_m->cek($jenis_bk, 'tb_barang_keluar')->result();
        //if($cek != FALSE) {
            //foreach ($cek as $row) {
                //$jenis_bk = $row->jenis_bk;

            //}
            //$this->session->set_userdata('session_jenis_bk', $jenis_bk);

            $this->load->view('header', $data);
            $this->load->view('pages/tambah_barang_keluar', $data);
            $this->load->view('footer');
        //} //else {
            //$this->load->view('header', $data);
            //$this->load->view('pages/barang_keluar', $data);
            //$this->load->view('footer');
        //}
    }


    public function input_data($jenis_bk) { //function input untuk memasukkan data ke database
        $save_sukses = 'Berhasil menambah data';

        $jenis_bk = $this->input->post('jenis_bk');
        $kode_bk = $this->input->post('kode_barang');
        $nama_bk = $this->input->post('nama_barang');
        $merk_barang = $this->input->post('merk_barang');
        $nama_kategori = $this->input->post('id_kategori');
        $jumlah_bk = $this->input->post('jumlah_bk');
        $lokasi = $this->input->post('lokasi');
        $tujuan = $this->input->post('tujuan');
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $lokasi_tujuan = $this->input->post('lokasi2');
        $ket_keluar = $this->input->post('ket_keluar');
        $kurir = $this->input->post('id_kurir');
        $no_resi = $this->input->post('no_resi');
        $tanggal_bk = $this->input->post('tanggal_bk');
        $autor = $this->input->post('autor');
        $user_id = $this->input->post('id_user');
        $foto = $this->input->post('foto');

        $data = array( //array data untuk menampung inputan data
            'jenis_bk' => $jenis_bk,
            'kode_bk' => $kode_bk,
            'nama_bk' => $nama_bk,
            'merk_barang' => $merk_barang,
            'nama_kategori' => $nama_kategori,
            'jumlah_bk' => $jumlah_bk,
            'lokasi' => $lokasi,
            'tujuan' => $tujuan,
            'hp' => $hp,
            'alamat' =>$alamat,
            'lokasi_tujuan' => $lokasi_tujuan,
            'ket_keluar' => $ket_keluar,
            'kurir' => $kurir,
            'no_resi' => $no_resi,
            'tanggal_bk' => $tanggal_bk,
            'autor' => $autor,
            'user_id' => $user_id,
            'foto' => $foto
        );
        $this->Barang_keluar_m->input($data, 'tb_barang_keluar'); 
        $this->session->set_flashdata('save', $save_sukses);
        helper_log("tambah", "Tambah barang keluar");
        //untuk mengakses file model 'Data_Anak_model' dan data tersimpan pada tabel data_anak
        redirect('barang_keluar_c/data_barang_keluar/' . $jenis_bk);
        
    }

    public function detail_data($id_barang_keluar){ 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $where = array('id_barang_keluar' => $id_barang_keluar);
        $data['user'] = $this->Barang_keluar_m->detail_data($where, 'tb_barang_keluar')->result();
        $data['jenis_bk'] = $this->input->get('id_jenis_bk');
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        
        //$jenis_bk = $this->input->get('id_jenis_bk');
        //$cek = $this->Barang_keluar_m->cek($jenis_bk, 'tb_barang_keluar')->result();
        //if($cek != FALSE) {
            //foreach ($cek as $row) {
                //$jenis_bk = $row->jenis_bk;

            //}
            //$this->session->set_userdata('session_jenis_bk', $jenis_bk);

            $this->load->view('header', $data);
            $this->load->view('pages/lihat_barang_keluar', $data);
            $this->load->view('footer');
        //} else {
            //$this->load->view('header', $data);
            //$this->load->view('pages/barang_keluar', $data);
            //$this->load->view('footer');
        //}
    }

    public function edit_data($id_barang_keluar){ 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Role_kategori_m');
        $this->load->model('Data_kategori_m');
        $this->load->model('Kurir_m');
        $this->load->model('Lokasi_m');

        $where = array('id_barang_keluar' => $id_barang_keluar);
        $data['role'] = $this->Role_kategori_m->getAll()->result();
        $data['user'] = $this->Barang_keluar_m->edit_data($where, 'tb_barang_keluar')->result();
        $data['jenis_bk'] = $this->input->get('id_jenis_bk');
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['role_kurir'] = $this->Kurir_m->getAll()->result();
        $data['role_lokasi'] = $this->Lokasi_m->getAll()->result();

        //$jenis_bk = $this->input->get('id_jenis_bk');
        //$cek = $this->Barang_keluar_m->cek($jenis_bk, 'tb_barang_keluar')->result();
        //if($cek != FALSE) {
            //foreach ($cek as $row) {
                //$jenis_bk = $row->jenis_bk;

            //}
            //$this->session->set_userdata('session_jenis_bk', $jenis_bk);

            $this->load->view('header', $data);
            $this->load->view('pages/edit_barang_keluar', $data);
            $this->load->view('footer');
        //} //else {
            //$this->load->view('header', $data);
            //$this->load->view('pages/barang_keluar', $data);
            //$this->load->view('footer');
        //}

    }

    public function update($jenis_bk) { //function update untuk mengubah data anak
        $update_sukses = 'Data berhasil di update';

        $id_barang_keluar = $this->input->post('id_barang_keluar');
        $jumlah_bk = $this->input->post('jumlah_bk');
        $lokasi = $this->input->post('lokasi');
        $tujuan = $this->input->post('tujuan');
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $lokasi_tujuan = $this->input->post('lokasi2');
        $tanggal_bk = $this->input->post('tanggal_bk');
        $ket_keluar = $this->input->post('ket_keluar');
        $kurir = $this->input->post('id_kurir');
        $no_resi = $this->input->post('no_resi');

        $data = array( //array data untuk menampung inputan data
            'jumlah_bk' => $jumlah_bk,
            'lokasi' => $lokasi,
            'tujuan' => $tujuan,
            'hp' => $hp,
            'alamat' =>$alamat,
            'lokasi_tujuan' => $lokasi_tujuan,
            'tanggal_bk' => $tanggal_bk,
            'ket_keluar' => $ket_keluar,
            'kurir' => $kurir,
            'no_resi' => $no_resi
        );

        $where = array(
            'id_barang_keluar' => $id_barang_keluar
        );
        $this->Barang_keluar_m->update_data($where,$data, 'tb_barang_keluar');
        $this->session->set_flashdata('update', $update_sukses);

        helper_log("edit", "Edit barang keluar id : $id_barang_keluar");
         
        redirect('barang_keluar_c/data_barang_keluar/' . $jenis_bk);
        //setelah data berhasil diubah, halaman web otomatis beralih ke halaman pada function index
    }

    function hapus_data($id_barang_keluar)
      {
        $del_sukses = 'Berhasil menghapus data';

        $where = array('id_barang_keluar' => $id_barang_keluar);
        // tampung data gambar dari id
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
       
           // hapus file di database
          $hapus_data = $this->Barang_keluar_m->hapus($id_barang_keluar, $where, 'tb_barang_keluar');
          $this->session->set_flashdata('sukses', $del_sukses);

          helper_log("hapus", "Hapus barang keluar id : $id_barang_keluar");

          redirect('barang_keluar_c/data_barang_keluar/'. $this->input->get('jenis_bk'));
       
        
      }

    function get_barang(){
        $kode_barang=$this->input->get('kode_barang');
        $data=$this->Barang_keluar_m->get_data_barang_bykode($kode_barang);
        echo json_encode($data);
    }

    function otomatis(){
        $kode_barang = $this->input->get('kode_barang');
        $data=$this->Barang_keluar_m->get_otomatis($kode_barang);
        //tampil data
        echo json_encode($data);
    }

    public function cari_data($jenis_bk){ //function untuk menampilkan halaman data bersarkan nama
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $role= $this->session->userdata('session_grup');
        $user_id = $this->session->userdata('session_id_user');

        $this->load->model('Role_jenis_bk_m');
        $this->load->model('Data_kategori_m');
        $data = [
            'user_id' => $this->input->get('user_id'),
            'jenis_bk' => $this->input->get('jenis_bk'),
            'kode_bk'=>$this->input->get('kode_bk')
        ];

        if ($role == "3") {
            $where = [
                'user_id' => $user_id
            ];
            $data['user'] = $this->Barang_keluar_m->cari_peruser($jenis_bk, $data['kode_bk'], $user_id)->result();
        } else if ($role == "1") {
            $data['user'] = $this->Barang_keluar_m->cari($jenis_bk, $data['kode_bk'])->result();
        } 
        else if ($role == "2") {
            $data['user'] = $this->Barang_keluar_m->cari($jenis_bk, $data['kode_bk'])->result();
        } 

        $data['jenis_bk'] = $jenis_bk;
        //$data['user'] = $this->barang_keluar_m->cari($jenis_bk, $data['kode_bk'])->result();
        $data['lihat'] = $this->Role_jenis_bk_m->tampil_nama($data['jenis_bk'])->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/cari_bk', $data);
        $this->load->view('footer');
    }

    public function input_status() {
        $save_status = 'Berhasil menambah status resi';

        $id_barang_keluar = $this->input->post('id_barang_keluar');
        $jenis_bk = $this->input->post('jenis_bk');
        $status = $this->input->post('status');       
        $data = array( //array data untuk menampung inputan data
            'status' => $status);

        $where = array(
            'id_barang_keluar' => $id_barang_keluar
        );
        $this->Barang_keluar_m->update_data($where,$data, 'tb_barang_keluar');
        $this->session->set_flashdata('status', $save_status);
        helper_log("tambah", "Tambah status pengiriman : $id_barang_keluar");
        redirect('barang_keluar_c/data_barang_keluar/' . $jenis_bk);
    }

    public function delete(){       
    $del_sukses = 'Berhasil menghapus data';

    $id_barang_keluar = $_POST['id_barang_keluar']; 
    $this->Barang_keluar_m->delete($id_barang_keluar);
    $this->session->set_flashdata('sukses', $del_sukses);

    helper_log("hapus", "Hapus data barang keluar");
                
    redirect('barang_keluar_c/data_barang_keluar/'. $this->input->get('jenis_bk'));   
    }
    }

?>