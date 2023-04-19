<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Data_pengguna_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Data_pengguna_m');
        $this->load->library('upload', 'session');
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('data_pengguna_c');
        $this->load->model('Data_kategori_m');

        $data['del_sukses'] = $this->session->flashdata('sukses');
        $data['save_sukses'] = $this->session->flashdata('save');
        $data['err_save'] = $this->session->flashdata('error_save');
        $data['update_sukses'] = $this->session->flashdata('update');
        $data['update_gagal'] = $this->session->flashdata('update_ggl');

        $data['user'] = $this->Data_pengguna_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/data_pengguna', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function tambah_data() { //function untuk tambah data
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_pengguna_m');
        $this->load->model('Role_master_user_m');
        $this->load->model('Data_kategori_m');

        $data['role'] = $this->Role_master_user_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_data_pengguna', $data);
        $this->load->view('footer');
    }

    public function input_data(){
        $this->load->library('upload');

        $save_sukses = 'Berhasil menambah data';
        $err_save = 'Gagal menambah data';

        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $autor = $this->input->post('id_master_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //$nmfile = "file_".time(); //nama file + fungsi time
        $nmfile = time().'-'.$_FILES["filefoto"]['name'];
        $config['upload_path'] = './assets/upload/gambar_user/'; //Folder untuk menyimpan hasil upload
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
                  'nama' =>$this->input->post('nama'),
                  'hp' =>$this->input->post('hp'),
                  'email' =>$this->input->post('email'),
                  'autor' =>$this->input->post('id_master_user'),
                  'username' =>$this->input->post('username'),
                  'password' =>$this->input->post('password'),
                  
                );

                $this->Data_pengguna_m->input_data($data, 'tb_user'); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/gambar_user/'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('error_save', $err_save);   
              }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata('save', $save_sukses);
                helper_log("tambah", "Tambah data pengguna");
                redirect('data_pengguna_c'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata('error_save', $err_save);
                redirect('data_pengguna_c/tambah_data'); //jika gagal maka akan ditampilkan form upload
            }
        }
        else{

                $data = [
                      'nama' =>$nama,
                      'hp' =>$hp,
                      'email' =>$email,
                      'autor' =>$autor,
                      'username' =>$username,
                      'password' =>$password, 
                ];

                $input = $this->Data_pengguna_m->input_data($data, 'tb_user');
                if ($input) {
                    $this->session->set_flashdata('save', $save_sukses);
                    helper_log("tambah", "Tambah data pengguna");
                    redirect('data_pengguna_c');
                } else {
                    $this->session->set_flashdata('save', $save_sukses);
                    redirect('data_pengguna_c');
                }        
            }    
    }


    public function detail_data($id_user) { 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $id_user = $id_user; 
        $data['user'] = $this->Data_pengguna_m->detail_data($id_user, 'tb_user')->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $this->load->view('header', $data);
        $this->load->view('pages/lihat_data_pengguna', $data);
        $this->load->view('footer');

    }

    public function edit_data($id_user) { 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        //$this->load->model('Barang_masuk_m');
        $this->load->model('Role_master_user_m');
        $this->load->model('Data_kategori_m');

        $data['role'] = $this->Role_master_user_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
 
        $where = array('id_user' => $id_user); 
        $data['user'] = $this->Data_pengguna_m->edit_data($where, 'tb_user')->row_array(); 

        $this->load->view('header', $data);
        $this->load->view('pages/edit_data_pengguna', $data);
        $this->load->view('footer');
    }

    public function update()
    {
        $this->load->library('upload');

        $update_sukses = 'Data berhasil di update';
        $update_gagal = 'Gagal update data';

        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $autor = $this->input->post('id_master_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    // tampung data gambar dari id
        $idFile = $this->Data_pengguna_m->get_id($id_user)->row();
        $data = './assets/upload/gambar_user/'. $idFile->foto;

        if(is_readable($data)){
            $nmfile = time().'-'.$_FILES["filefoto"]['name'];
            $config['upload_path'] = './assets/upload/gambar_user/'; //Folder untuk menyimpan hasil upload
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
                  'nama' =>$this->input->post('nama'),
                  'hp' =>$this->input->post('hp'),
                  'email' =>$this->input->post('email'),
                  'autor' =>$this->input->post('id_master_user'),
                  'username' =>$this->input->post('username'),
                  'password' =>$this->input->post('password'),
                  
                );
                unlink('./assets/upload/gambar_user/'.$this->input->post('fotolama',true));

                //$this->stok_m->update_data($kode_barang, $data); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/gambar_user/'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 


                $update = $this->Data_pengguna_m->update_data($id_user,$data);
                if ($update) {
                    $this->session->set_flashdata('update', $update_sukses);

                    helper_log("edit", "Edit data pengguna : $id_user");
                    redirect('data_pengguna_c');
                } else {
                    $this->session->set_flashdata('update_ggl', $update_gagal);
                    redirect('stok_c/stok/' .$id_kategori);
                }        
            }
        }else{

                $data = [
                      'nama' =>$nama,
                      'hp' =>$hp,
                      'email' =>$email,
                      'autor' =>$autor,
                      'username' =>$username,
                      'password' =>$password,
                ];

        // update file di database
                $update = $this->Data_pengguna_m->update_data($id_user,$data);
                if ($update) {
                    $this->session->set_flashdata('update', $update_sukses);
                    helper_log("edit", "Edit data pengguna : $id_user");
                    redirect('data_pengguna_c');
                } else {
                    $this->session->set_flashdata('update_ggl', $update_gagal);
                    redirect('data_pengguna_c');
                }        
            }    
        }else{
            $this->session->set_flashdata('update_ggl', $update_gagal);
            redirect('data_pengguna_c');
        }

    }

    public function hapus_data($id_user) { //function untuk hapus data anak
        $this->load->library('session');

        $del_sukses = 'Berhasil menghapus data';

        $where = array('id_user' => $id_user); 
        $idFile = $this->Data_pengguna_m->get_id($id_user)->row();
        $data = './assets/upload/gambar_user/'. $idFile->foto;
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
        if(is_readable($data) && unlink($data)){
           // hapus file di database
          //$hapus_data = $this->Stok_m->hapus_data($kode_barang, $where, 'tb_stok');
          helper_log("hapus", "Hapus data pengguna : $id_user");
          //redirect('stok_c/stok/'. $this->input->get('id_kategori'));
        }//else{
            //$this->session->set_flashdata('error', $pesan_error);
            //redirect('stok_c/stok/'. $this->input->get('id_kategori'));
        //}
        $del = $this->Data_pengguna_m->delete($id_user);
         if ($del) {
            redirect('data_pengguna_c');
        } else {
            $this->session->set_flashdata('sukses', $del_sukses);
            redirect('data_pengguna_c');
        } 
        
    }

    public function delete(){
        $this->load->library('session');        
        $id_user = $_POST['id_user'];

        $del_sukses = 'Berhasil menghapus data';

        //print_r($kode_barang);
        //$where = array('kode_barang' => $kode_barang);
         foreach ($id_user as $us)
         {
            $idFile = $this->Data_pengguna_m->get_foto($us)->row();
            //print_r($idFile);
            $data = './assets/upload/gambar_user/'. $idFile->foto;
            if(file_exists($data)){
                // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
                if(is_readable($data) && unlink($data)){
                   // hapus file di database
                  //$hapus_data = $this->Stok_m->delete($kb);
                  helper_log("hapus", "Hapus data pengguna : $us");
                  
                }
            }
            
         } 
         //redirect('stok_c/stok/'. $this->input->get('id_kategori')); 
         $del = $this->Data_pengguna_m->delete($id_user);
         if ($del) {
            redirect('data_pengguna_c');
        } else {
            $this->session->set_flashdata('sukses', $del_sukses);
            redirect('data_pengguna_c');
        } 


         
          
    }

    }
?>