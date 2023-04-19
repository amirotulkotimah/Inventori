<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Profil_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Profil_m');
        $this->load->library('upload');
       
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('profil_c');
        $this->load->model('Data_kategori_m');

        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $data['user'] = $this->db->get_where('tb_user',['email'=>$this->session->userdata('session_email')])->row_array();

        $data['userid'] = $this->db->get_where('tb_user',['id_user'=>$this->session->userdata('session_id_user')])->row_array();

        $this->load->view('header', $data);
        $this->load->view('pages/profil', $data);
        $this->load->view('footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function edit() {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $data['user'] = $this->db->get_where('tb_user',['id_user'=>$this->session->userdata('session_id_user')])->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/edit_profil', $data);
        $this->load->view('footer');
    }
    public function update() {
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');
       
        $data = array( //array data untuk menampung inputan data
            'password' => $password,
        );

        $where = array(
            'id_user' => $id_user
        );
        $this->Profil_m->update_pass($where,$data, 'tb_user');
        helper_log("edit", "Edit password id : $id_user");
        redirect('profil_c');
    }

    public function edit_foto(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $this->load->model('Data_kategori_m');
        $data['user'] = $this->db->get_where('tb_user',['id_user'=>$this->session->userdata('session_id_user')])->row_array();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/edit_foto', $data);
        $this->load->view('footer');
    }

    public function update_foto()
    {
        $this->load->library('upload');

        $id_user = $this->input->post('id_user');
        $idFile = $this->Profil_m->get_id($id_user)->row();
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


                $update = $this->Profil_m->update_data($id_user,$data);
                if ($update) {
                    $this->session->set_flashdata('pesan','Data berhasil di update');

                    helper_log("edit", "Edit profil : $id_user");
                    redirect('profil_c');
                } else {
                    echo "gagal";
                }        
            }
        }    
        }else{
            echo "gagal";
        }

    }

    }
?>
