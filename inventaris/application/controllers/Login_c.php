<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Login_c extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Data_pengguna_m');
    	$this->load->library('session'); # add this
	}

	public function index() {
		$config['base_url'] = site_url('login_c');
        $this->load->view('auth/login');
        
	}

	public function cek_log() {
		$username = $this->input->post('txt_user');
		$password = $this->input->post('txt_pass');
		$cek = $this->Data_pengguna_m->login($username, $password,'tb_user')->result();
		if($cek != FALSE) {
			foreach ($cek as $row) {
				$user = $row->username;
				$grup = $row->autor;
				$foto = $row->foto;
				$nama = $row->nama;
				$email = $row->email;
				$password = $row->password;
				$autor = $row->autor;
				$id_user = $row->id_user;
			}
			$this->session->set_userdata('session_user', $user);
			$this->session->set_userdata('session_grup', $grup);
			$this->session->set_userdata('session_foto', $foto);
			$this->session->set_userdata('session_nama', $nama);
			$this->session->set_userdata('session_email', $email);
			$this->session->set_userdata('session_password', $password);
			$this->session->set_userdata('session_autor', $autor);
			$this->session->set_userdata('session_id_user', $id_user);


					redirect('home_c');
				} else {
					$this->load->view('auth/login');
				}
			}

	function logout(){
	    $this->session->sess_destroy();
	    redirect('login_c');
				
			}
		}

?>