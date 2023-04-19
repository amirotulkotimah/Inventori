<?php
class Lokasi_sublokasi_c extends CI_Controller{
	function __construct(){
	parent::__construct();
	$this->load->model('Lokasi_sublokasi_m');
	}

	function index(){
		$getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
	$this->load->model('Data_kategori_m');

	$x['data']=$this->Lokasi_sublokasi_m->get_lokasi();
	$data['role_kategori'] = $this->Data_kategori_m->getAll()->result();

	$this->load->view('header', $data);
    $this->load->view('pages/stok_lokasi_sublokasi', $x);
    $this->load->view('footer');
	}

	function get_sublokasi(){
	$id_lokasi=$this->input->post('id_lokasi');
	$data=$this->Lokasi_sublokasi_m->get_sublokasi($id_lokasi);
	echo json_encode($data);
}
}