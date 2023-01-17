<?php

class Auth extends CI_Controller
{
    public function index()
    {
        show_404();
    }

    public function login()
    {
        $this->load->model('auth_model');
        $this->load->library('form_validation');

        $rules = $this->auth_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('login_form');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->auth_model->login($username, $password)) {
            $this->session->set_flashdata('pesan', '<div style="width:100%" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Berhasil Masuk, Selamat Datang Admin
        </div>');
            redirect('admin');
        } else {
            $this->session->set_flashdata('message_login_error', '<div style="height: 65px" class="alert alert-danger fade show" role="alert">
            <strong>Gagal!</strong> username atau password salah!
            </div>');
        }

        $this->load->view('login_form');
    }

    public function logout()
    {

        $this->load->model('auth_model');
        $this->auth_model->logout();
        $this->session->set_flashdata('pesan', '<div style="width:100%" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Berhasil Keluar
        </div>');
        redirect(site_url('auth/login'));
    }
}
