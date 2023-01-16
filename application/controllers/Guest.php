<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('auth_model');
    //     if (!$this->auth_model->current_user()) {
    //         redirect('auth/login');
    //     }
    // }
    public function halamanhome()
    {
        $data['judul']  = 'XKereta | Home';
        $data['stasiun'] = $this->M_Guest->getDataStasiun()->result();
        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/halamanhome');
        $this->load->view('guest/template/footer');
    }

    public function halamankonfirmasi()
    {
        $data['judul']  = 'XKereta | Konfirmasi';
        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/halamankonfirmasi');
        $this->load->view('guest/template/footer');
    }

    public function cari_tiket()
    {
        $data = array(
            'asal' => $this->input->post('asal'),
            'tujuan' => $this->input->post('tujuan'),
        );

        $data['tiket'] = $this->M_Guest->cari_tiket($data)->result();
        $data['penumpang'] = $this->input->post('jumlah');

        $data['judul']  = 'XKereta | Cari Tiket';
        $data['stasiun'] = $this->M_Guest->getDataStasiun()->result();
        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/halamanhome');
        $this->load->view('guest/template/footer');
    }

    public function pesan($id)
    {
        $data['judul']  = 'XKereta | Form Data Penumpang';
        $data['info'] = $this->M_Guest->getDataInfoPesan($id)->row();

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/data_diri');
        $this->load->view('guest/template/footer');
    }

    public function pesanTiket()
    {
        $penumpang  = $this->input->post('penumpang');
    }
}
