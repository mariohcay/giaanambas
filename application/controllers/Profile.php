<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jemaat');
    }

    public function index()
    {
        $user = $this->session->userdata('username');
        if(_checkUser()){
            $data['title'] = 'Ubah Pofile Jemaat - GKI Kebonagung Web Services';
            $jemaat = $this->m_jemaat->ambilJemaat($user);
            $data['jemaat'] = $jemaat;
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Profile/vProfileJemaat');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function ubahProfile()
    {
        $user = $this->session->userdata('username');
        if(_checkUser()){
            $data['title'] = 'Ubah Pofile Jemaat - GKI Kebonagung Web Services';
            $jemaat = $this->m_jemaat->ambilJemaat($user);
            $data['jemaat'] = $jemaat;
            
            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vMainHeader');
            $this->load->view('Profile/vUbahProfile');
            $this->load->view('Main/vMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanUbah()
    {
        $user = $this->session->userdata('username');
        if(!$user){
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Anda masuk terlebih dahulu</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            redirect('Auth');
        }else{
            $id = $this->session->userdata('id');
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'jenisKelamin' => $this->input->post('jenisKelamin'),
                'tempatLahir' => $this->input->post('tempatLahir'),
                'tanggalLahir' => $this->input->post('tanggalLahir'),
                'telepon' => $this->input->post('telepon'),
                'lingkungan' => $this->input->post('lingkungan'),
                'vaksin' => $this->input->post('vaksin')
            ];
            
            $jemaat = $this->m_jemaat->ubahJemaat($id, $data);
            $this->session->set_userdata([
                'username' => $this->input->post('username'),
                'nama' =>  $this->input->post('nama')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> Data jemaat berhasil diperbaharui<i class="fa fa-check my-auto"></i></div>');
            redirect('Dashboard');
        }
    }
}