<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regis extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("register");
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required', [
            'required' => 'No HP harus diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Password terlalu pendek. Minimal 4 karakter',
            'regex_match' => 'Password harus terdiri dari huruf dan angka'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role harus diisi'
        ]);
        $this->form_validation->set_rules('id_poli', 'Poli', 'required', [
            'required' => 'Poli harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['poli'] = $this->User_model->get_all_poli(); // Get all poli options
            $this->load->view("register", $data); // Pass poli options to the view
        } else {
            $role = $this->input->post('role');
            $id_poli = ($role == 'dokter') ? $this->input->post('id_poli') : NULL;

            $data = array(
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $role,
                'id_poli' => $id_poli
            );

            // Panggil model untuk menyimpan data
            if ($this->User_model->insert($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Added!</div>');
                redirect('Login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to add user. Please try again.</div>');
                redirect('Regis');
            }
        }
    }
}
