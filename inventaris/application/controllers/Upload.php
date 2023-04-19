<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

  var $limit=10;
  var $offset=10;

    public function __construct() {
        parent::__construct();
        $this->load->model('Stok_m'); //load model model_upldgbr yang berada di folder model
        $this->load->helper(array('url')); //load helper url 
    }

    public function index($page=NULL,$offset='',$key=NULL)
    {   
        $this->load->model('Data_kategori_m');

        $data['user'] = $this->Stok_m->getAll()->result();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/stok', $data);
        $this->load->view('footer');
    }

    public function tambah_data() { //function untuk tambah data
       
        $this->load->model('Stok_m'); //untuk mengakses file model 'Anak_model'
        $this->load->model('Role_kategori_m');
        $this->load->model('Data_kategori_m');
        //$this->load->model('role_lokasi_m');
        //$this->load->model('role_sublokasi_m');

        $data['data']=$this->Stok_m->get_lokasi();
        $data['role_kategori'] = $this->Data_kategori_m->getAll()->result();
        $data['user'] = $this->db->get_where('tb_user',['id_user'=>$this->session->userdata('session_id_user')])->row_array();

        $data['role1'] = $this->Role_kategori_m->getAll()->result();
        //$data['role2'] = $this->role_lokasi_m->getAll()->result();
        //$data['role3'] = $this->role_sublokasi_m->getAll()->result();

        $this->load->view('header', $data);
        $this->load->view('pages/tambah_stok', $data);
        $this->load->view('footer');
    }
    public function insert(){
        $this->load->model('Upload_m');
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file + fungsi time
        $config['upload_path'] = './assets/upload/gambar_stok'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
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
                  'jumlah_barang' =>$this->input->post('jumlah_barang'),
                  'lokasi' =>$this->input->post('lokasi'),
                  'sublokasi' =>$this->input->post('sublokasi'),
                  'autor' =>$this->input->post('autor'),
                  'user_id' =>$this->input->post('id_user'),
                  
                );

                $this->Upload_m->get_insert($data); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/upload/hasil_resize'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 100; //lebar setelah resize menjadi 100 px
                $config2['height'] = 100; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('Upload'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('Upload/tambah_data'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }
}