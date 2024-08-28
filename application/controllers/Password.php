<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('password');
    }

    public function reset_password()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('password');
        } else {
            $username = $this->input->post('username');
            $user = $this->userrole->getBy(['username' => $username]);

            if ($user) {
                $data['username'] = $username;
                $this->load->view('set_new_password', $data);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan!</div>');
                redirect('Password');
            }
        }
    }

    public function set_new_password()
    {
        $username = $this->input->post('username');

        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[4]|callback_valid_password', [
            'required' => 'New Password harus diisi',
            'min_length' => 'New Password terlalu pendek. Minimal 4 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|matches[password1]', [
            'required' => 'Confirm New Password harus diisi',
            'matches' => 'Confirm New Password tidak sama dengan New Password'
        ]);

        if ($this->form_validation->run() == false) {
            $data['username'] = $username;
            $this->load->view('set_new_password', $data);
        } else {
            $new_password = $this->input->post('password1');
            $data = [
                'password' => $new_password

                // 'password' => password_hash($new_password, PASSWORD_DEFAULT)
            ];

            if ($this->userrole->update(['username' => $username], $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Changed Password!</div>');
                redirect('Login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to Change Password. Please try again.</div>');
                redirect('Password');
            }
        }
    }

    public function valid_password($password)
    {
        if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/', $password)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_password', 'Password harus terdiri dari minimal 4 karakter, termasuk angka dan huruf.');
            return false;
        }
    }
}
