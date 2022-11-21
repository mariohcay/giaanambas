<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_admin');
	}

	public function index()
	{
		$data['title'] = 'Selamat Datang - GKI Kebonagung';
               
        $this->load->view('Templates/vHeader', $data);
        $this->load->view('Auth/vLogin');
		$this->load->view('Templates/vFooter');
		
		$user = $this->input->post('username');
        if($user){
            $this->_login();
        }
	}

	private function _login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $admin = $this->m_admin->ambilAdmin($user);

        if($admin){
            if(password_verify($pass, $admin['password'])){
                $data = [
                    'id' => $admin['id'],
                    'username' => $admin['username'],
                    'nama' => $admin['nama'],
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('welcome', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert"><h4>Hai, <strong>'.$data['nama'].'</strong></h4><br>
                Selamat datang di GKI Kebonagung Web Services<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Admin');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Username atau password salah</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Username tidak terdaftar</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            redirect('Auth');
        }
        return false;
    }

    public function register()
    {
        $data['title'] = 'Selamat Datang - GKI Kebonagung';
        $this->load->view('Templates/vHeader', $data);
        $this->load->view('Auth/vRegister');
        $this->load->view('Templates/vFooter');
        
        $user = $this->input->post('username');
        if($user){
            $this->_register();
        }
    }

    private function _register()
    {
        $user = $this->input->post('username');
        $nama = ucwords(strtolower($this->input->post('nama')));
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $pass1 = $this->input->post('pass1');
        $pass2 = $this->input->post('pass2');

        $jemaat = $this->m_jemaat->daftarJemaat();

        $id = "JM".strval(count($jemaat)+100001);
        $session = [
            'id' => $id,
            'username' => $user,
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($pass1, PASSWORD_BCRYPT),
            'telepon' => $telepon
        ];
        foreach($jemaat as $data){
            if($data['username'] === $user){
                $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Username telah terpakai</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
                $this->session->set_flashdata($session);
                redirect('Auth/register');
            }
        }
        if($pass1 !== $pass2){
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Konfirmasi Password tidak cocok</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            $this->session->set_flashdata($session);
            redirect('Auth/register');
        }else{
            $this->m_jemaat->tambahJemaat($session);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> Berhasil membuat akun<i class="fa fa-check my-auto"></i></div>');
            redirect('Auth');
        }
    }

    public function checkUsername(){
        $user = $this->input->post('username');
        $check = $this->m_jemaat->ambilJemaat($user);
        $result = "0";
        if(!empty($check)){
            $result = "1";
        }

        echo json_encode($result);
    }
}

