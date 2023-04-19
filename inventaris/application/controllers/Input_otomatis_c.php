<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Input_otomatis_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Input_otomatis_m');
        //$this->load->library('imageuploader');
        //untuk mengakses file model 'Mahasiswa_model'
    }

	function index(){
		$getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
		
		$this->load->view('header');
        $this->load->view('pages/input_otomatis');
        $this->load->view('footer');
	}

	function get_barang(){
		$kode_barang=$this->input->post('kode_barang');
		$data=$this->Input_otomatis_m->get_data_barang_bykode($kode_barang);
		echo json_encode($data);
	}
}