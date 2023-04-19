<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Stok_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Stok_m');
        //$this->load->library('imageuploader');
        //$this->load->helper('Log');
        $this->load->library('upload');

    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
    }

    public function stok($id_kategori){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['update_sukses'] = $this->session->flashdata('update');
        $data['update_gagal'] = $this->session->flashdata('update_ggl');

        $this->load->model('Data_kategori_m');
        $id_kategori = $this->uri->segment('3');
        $data['user'] = $this->Stok_m->lihat_stok($id_kategori)->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['id_kategori'] = $id_kategori;

        $this->load->view('header', $data);
        $this->load->view('pages/stok', $data);
        $this->load->view('footer');
    }

    public function tambah_data() { //function untuk tambah data
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
       
        $this->load->model('Stok_m'); //untuk mengakses file model 'Anak_model'
        $this->load->model('Role_kategori_m');
        $this->load->model('Data_kategori_m');

        $data['err_save'] = $this->session->flashdata('error_save');

        $data['id_kategori'] = $this->input->get('id_kategori');
        $id_kategori = $this->input->get('id_kategori');

        $data['data']=$this->Stok_m->get_lokasi();
        $data['brand']=$this->Stok_m->get_kategori();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['user'] = $this->db->get_where('tb_user',['id_user'=>$this->session->userdata('session_id_user')])->row_array();

        $data['role1'] = $this->Role_kategori_m->getAll()->result();
        //$data['role2'] = $this->role_lokasi_m->getAll()->result();
        //$data['role3'] = $this->role_sublokasi_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_stok', $data);
        $this->load->view('footer');
    }

    public function get_sublokasi(){
    $id_lokasi=$this->input->post('id_lokasi');
    $data=$this->Stok_m->get_sublokasi($id_lokasi);
    echo json_encode($data);
    }

    public function get_brand(){
    $id_kategori=$this->input->post('id_kategori');
    $data=$this->Stok_m->get_merk($id_kategori);
    echo json_encode($data);
    }

    public function insert($id_kategori){
        $this->load->model('Barang_masuk_m');
        $this->load->model('Upload_m');
        $this->load->library('upload', 'session');
        $id_kategori = $this->input->post('id_kategori');

        $save_sukses = 'Berhasil menambah data';
        $err_save = 'Gagal upload gambar';

        //$nmfile = "file_".time(); //nama file + fungsi time
        $nmfile = time().'-'.$_FILES["filefoto"]['name'];
        $config['upload_path'] = './assets/upload/gambar_stok/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '0'; //maksimum besar file 3M
        $config['max_width']  = '0'; //lebar maksimum 5000 px
        $config['max_height']  = '0'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'foto' =>$gbr['file_name'],
                  'kode_barang' =>$this->input->post('kode_barang'),
                  'nama_barang' =>$this->input->post('nama_barang'),
                  'nama_kategori' =>$this->input->post('id_kategori'),
                  'merk_barang' =>$this->input->post('merk_barang'),
                  'jumlah_barang' =>$this->input->post('jumlah'),
                  'lokasi' =>$this->input->post('lokasi'),
                  'sublokasi' =>$this->input->post('sublokasi'),
                  'tanggal_stok' =>$this->input->post('tanggal_stok'),
                  'autor' =>$this->input->post('autor'),
                  'user_id' =>$this->input->post('id_user'),
                  
                );

                $this->Stok_m->input_data($data, 'tb_stok'); //akses model untuk menyimpan ke database

                $data = array(
                  'foto' =>$gbr['file_name'],
                  'kode_bm' =>$this->input->post('kode_barang'),
                  'nama_bm' =>$this->input->post('nama_barang'),
                  'nama_kategori' =>$this->input->post('id_kategori'),
                  'merk_barang' =>$this->input->post('merk_barang'),
                  'jumlah_bm' =>$this->input->post('jumlah_barang'),
                  'lokasi' =>$this->input->post('lokasi'),
                  'sublokasi' =>$this->input->post('sublokasi'),
                  'tanggal_bm' =>$this->input->post('tanggal_stok'),
                  'autor' =>$this->input->post('autor'),
                  'user_id' =>$this->input->post('id_user'),
                  
                );

                $this->Barang_masuk_m->input_data($data, 'tb_barang_masuk'); 
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/gambar_stok/'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                    $this->session->set_flashdata('error_save', $err_save);
                //$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
                
                $this->session->set_flashdata('save', $save_sukses);
                helper_log("tambah", "Tambah data stok");
                redirect('stok_c/stok/'.$id_kategori); //jika berhasil maka akan ditampilkan view upload
            }else{
                $this->session->set_flashdata('error_save', $err_save);
                redirect('stok_c/tambah_data'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }
    

   
    public function detail_data($kode_barang) { //function detail_data untuk melihat detail data anak
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $kode_barang = $kode_barang; //berdasarkan id_anak
        $data['user'] = $this->Stok_m->detail_data($kode_barang, 'tb_stok')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['id_kategori'] = $this->input->get('id_kategori');
        $this->load->view('header', $data);
        $this->load->view('pages/lihat_stok', $data);
        $this->load->view('footer');

    }

    public function edit_data($kode_barang) { 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $this->load->model('Stok_m');
        $this->load->model('Role_kategori_m');

        $data['role1'] = $this->Role_kategori_m->getAll()->result();
        $data['data']=$this->Stok_m->get_lokasi();
        $data['brand']=$this->Stok_m->get_kategori();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['id_kategori'] = $this->input->get('id_kategori');
 
        $where = array('kode_barang' => $kode_barang); 
        $data['user'] = $this->Stok_m->edit_data($where, 'tb_stok')->row_array();
        //$data['user1'] = $this->db->get_where('tb_user',['nama'=>$this->session->userdata('session_nama')])->row_array(); 

        $this->load->view('header', $data);
        $this->load->view('pages/edit_stok', $data);
        $this->load->view('footer');
    }

    public function update($id_kategori)
    {
        $this->load->library('upload', 'session');

        $update_sukses = 'Data berhasil di update';
        $update_gagal = 'Gagal update data';

        $id_kategori = $this->input->post('id_kategori');

        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $nama_kategori = $this->input->post('id_kategori');
        $merk_barang = $this->input->post('merk_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $lokasi = $this->input->post('lokasi');
        $sublokasi = $this->input->post('sublokasi');
    // tampung data gambar dari id
        $idFile = $this->Stok_m->get_id($kode_barang)->row();
        $data = './assets/upload/gambar_stok/'. $idFile->foto;

        if(is_readable($data)){
            $nmfile = time().'-'.$_FILES["filefoto"]['name'];
            $config['upload_path'] = './assets/upload/gambar_stok/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '0'; //maksimum besar file 3M
            $config['max_width']  = '0'; //lebar maksimum 5000 px
            $config['max_height']  = '0'; //tinggi maksimu 5000 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($config);

            if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'foto' =>$gbr['file_name'],
                  'kode_barang' =>$this->input->post('kode_barang'),
                  'nama_barang' =>$this->input->post('nama_barang'),
                  'merk_barang' =>$this->input->post('merk_barang'),
                  'nama_kategori' =>$this->input->post('id_kategori'),
                  'jumlah_barang' =>$this->input->post('jumlah_barang'),
                  'lokasi' =>$this->input->post('lokasi'),
                  'sublokasi' =>$this->input->post('sublokasi'),
                  
                );
                unlink('./assets/upload/gambar_stok/'.$this->input->post('fotolama',true));

                //$this->stok_m->update_data($kode_barang, $data); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/gambar_stok/'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 

                $update = $this->Stok_m->update_data($kode_barang,$data);
                if ($update) {
                    $this->session->set_flashdata('update', $update_sukses);

                    helper_log("edit", "Edit data stok : $kode_barang");
                    redirect('stok_c/stok/' .$id_kategori);
                } else {
                    $this->session->set_flashdata('update_ggl', $update_gagal);
                    redirect('stok_c/stok/' .$id_kategori);
                }        
            }
        }else{

                $data = [
                    'nama_barang' => $this->input->post('nama_barang'),
                    'merk_barang' => $merk_barang,
                    'nama_kategori' => $nama_kategori,
                    'jumlah_barang' => $jumlah_barang,
                    'lokasi' => $lokasi,
                    'sublokasi' => $sublokasi,
                ];

        // update file di database
                $update = $this->Stok_m->update_data($kode_barang,$data);
                if ($update) {
                    $this->session->set_flashdata('update', $update_sukses);
                    helper_log("edit", "Edit data stok : $kode_barang");
                    redirect('stok_c/stok/' .$id_kategori);
                } else {
                    $this->session->set_flashdata('update_ggl', $update_gagal);
                    redirect('stok_c/stok/' .$id_kategori);
                }        
            }    
        }else{
            $this->session->set_flashdata('update_ggl', $update_gagal);
            redirect('stok_c/stok/' .$id_kategori);
        }

    }

    public function hapus_data($kode_barang) { //function untuk hapus data anak
        $this->load->library('session');

        $del_sukses = 'Berhasil menghapus data';

        $where = array('kode_barang' => $kode_barang); 
        $idFile = $this->Stok_m->get_id($kode_barang)->row();
        $data = './assets/upload/gambar_stok/'. $idFile->foto;
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
        if(is_readable($data) && unlink($data)){
           // hapus file di database
          //$hapus_data = $this->Stok_m->hapus_data($kode_barang, $where, 'tb_stok');
          helper_log("hapus", "Hapus stok kode barang : $kode_barang");
          //redirect('stok_c/stok/'. $this->input->get('id_kategori'));
        }//else{
            //$this->session->set_flashdata('error', $pesan_error);
            //redirect('stok_c/stok/'. $this->input->get('id_kategori'));
        //}
        $del = $this->Stok_m->delete($kode_barang);
         if ($del) {
            redirect('stok_c/stok/'. $this->input->get('id_kategori'));
        } else {
            $this->session->set_flashdata('sukses', $del_sukses);
            redirect('stok_c/stok/'. $this->input->get('id_kategori'));
        } 
        
    }

    public function cari_data($id_kategori){ //function untuk menampilkan halaman data bersarkan nama
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');

        $data = [
            'kode_barang'=>$this->input->get('kode_barang')
        ];
        $data['user'] = $this->Stok_m->cari($data['kode_barang'])->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['id_kategori'] = $id_kategori;
        $this->load->view('header', $data);
        $this->load->view('pages/cari_stok', $data);
        $this->load->view('footer');
    }

    public function import_file(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $this->load->model('Role_kategori_m');
        $this->load->model('Data_kategori_m');
        $data['id_kategori'] = $this->input->get('id_kategori');
        $data['data']=$this->Stok_m->get_lokasi();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['user'] = $this->db->get_where('tb_user',['id_user'=>$this->session->userdata('session_id_user')])->row_array();

        $data['role1'] = $this->Role_kategori_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/import_stok', $data);
        $this->load->view('footer');
    }

    public function importExcel($id_kategori){
        $this->load->library('excel');

        $id_kategori = $this->input->post('id_kategori');
        $user_id = $this->input->post('id_user');
        $autor = $this->input->post('autor');
        $nama_kategori = $this->input->post('id_kategori');
        $lokasi = $this->input->post('lokasi');
        $sublokasi = $this->input->post('sublokasi');

        $fileName = $_FILES['file']['name'];
          
        $config['upload_path'] = './assets/upload/file_excel/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
          
        if(! $this->upload->do_upload('file') ){
            echo $this->upload->display_errors();exit();
        }
              
        $inputFileName = './assets/upload/file_excel/'.$fileName;
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);   
                 // Sesuaikan key array dengan nama kolom di database                                                         
                 $data = array(
                    "kode_barang"=> $rowData[0][1],
                    "nama_barang"=> $rowData[0][2],
                    "nama_kategori"=> $nama_kategori,
                    "jumlah_barang"=> $rowData[0][4],
                    "lokasi"=> $lokasi,
                    "sublokasi"=> $sublokasi,
                    'user_id' => $user_id,
                    'autor' => $autor
                );
                $insert = $this->db->insert("tb_stok",$data);
                      
            }
            helper_log("tambah", "Tambah data stok");
            redirect('stok_c/stok/'.$id_kategori);
    }

    public function delete(){
        $this->load->library('session');        
        $kode_barang = $_POST['kode_barang'];

        $del_sukses = 'Berhasil menghapus data';

        //print_r($kode_barang);
        //$where = array('kode_barang' => $kode_barang);
         foreach ($kode_barang as $kb)
         {
            $idFile = $this->Stok_m->get_foto($kb)->row();
            //print_r($idFile);
            $data = './assets/upload/gambar_stok/'. $idFile->foto;
            if(file_exists($data)){
                // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
                if(is_readable($data) && unlink($data)){
                   // hapus file di database
                  //$hapus_data = $this->Stok_m->delete($kb);
                  helper_log("hapus", "Hapus stok kode barang : $kb");
                  
                }
            }
            
         } 
         //redirect('stok_c/stok/'. $this->input->get('id_kategori')); 
         $del = $this->Stok_m->delete($kode_barang);
         if ($del) {
            redirect('stok_c/stok/'. $this->input->get('id_kategori'));
        } else {
            $this->session->set_flashdata('sukses', $del_sukses);
            redirect('stok_c/stok/'. $this->input->get('id_kategori'));
        } 


         
          
    }
}
  
?>
