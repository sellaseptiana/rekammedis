<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }
 
	public function index()
	{
		
            $this->form_validation->set_rules('username', 'username', 'required',[
            'required' => 'username tidak boleh kosong'
        ]);
            $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Kata sandi tidak boleh kosong'
        ]);
            if ($this->form_validation->run() == false) {
           
            $this->load->view("login");
            } else {
            $this->cek_login();
        }
	}
    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user_query = $this->db->get_where('user', ['username' => $username]);
        if ($user_query === false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Database query error!</div>');
            redirect('Login');
        }
    
        $user = $user_query->row_array();
        if ($user) {
            // if (password_verify($password, $user['password'])) {
            if ($password == $user['password']) {
                $data = [
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'id_user' => $user['id_user']
                ];  
                if ($user['role'] == 'Dokter') {
                    $poli_query = $this->db->get_where('tbpoli', ['id_poli' => $user['id_poli']]);
                    if ($poli_query === false) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Database query error!</div>');
                        redirect('Login');
                    }
    
                    $poli = $poli_query->row_array();
                    if ($poli) {
                        $data['nama_poli'] = $poli['nama_poli'];
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Poli tidak ditemukan!</div>');
                        redirect('Login');
                    }
                }
                $this->session->set_userdata($data);
                switch ($user['role']) {
                    case 'Petugas':
                        redirect('Petugas');
                        break;
                    case 'Dokter':
                        redirect('Dokter');
                        break;
                    case 'Apoteker':
                        redirect('Apoteker');
                        break;
                    default:
                        redirect('Login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Belum terdaftar!</div>');
            redirect('Login');
        }
    }
    
    
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Successfully Logout!</div>');
        redirect('login');
    }


}

