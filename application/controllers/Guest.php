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

        if (isset($_GET['kode'])) :

            $kode = $_GET['kode'];
            $data['no_tiket'] = $this->M_Guest->getPembayaranWhere($kode)->row();
            $data['detail'] = $this->M_Guest->cekKonfirmasi($data['no_tiket']->no_tiket)->result();

        endif;

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
        $data['id_jadwal'] = $id;

        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/data_diri');
        $this->load->view('guest/template/footer');
    }

    public function pesanTiket()
    {
        $penumpang  = $this->input->post('penumpang');

        // Generate No Pembayaran
        $cek = $this->M_Guest->getPembayaran()->num_rows() + 1;

        $no_pembayaran = 'AC246' . $cek;

        $harga = $this->input->post('harga');
        $total_pembayaran = $penumpang * $harga;


        // Input Pembayaran

        $no_tiket = 'T00' . $cek;

        $data = array(
            'no_pembayaran' => $no_pembayaran,
            'no_tiket' => $no_tiket,
            'total_pembayaran' => $total_pembayaran,
            'status' => 0,
        );

        $this->M_Guest->insertPembayaran($data);

        // Generate No Tiket Auto
        $cek = $this->M_Guest->getTiket()->num_rows() + 1;

        // inpuut data penumpang
        for ($i = 1; $i <= $penumpang; $i++) {
            $data = array(
                'nomor_tiket' => $no_tiket,
                'nama' => $this->input->post('nama' . $i),
                'no_identitas' => $this->input->post('identitas' . $i),
            );

            $this->M_Guest->insertPenumpang($data);
        }
        // input data pemesan
        $data = array(
            'nomor_tiket' => $no_tiket,
            'id_jadwal' => $this->input->post('id_jadwal'),
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'email' => $this->input->post('email'),
            'no_telepon' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
        );

        $this->M_Guest->insertPemesan($data);

        $this->session->set_flashdata('nomor', $no_pembayaran);
        $this->session->set_flashdata('total', $total_pembayaran);
        redirect('pembayaran', $total_pembayaran);
    }

    public function halamanPembayaran()
    {

        $data['judul']  = 'XKereta | Pembayaran';
        $this->load->view('guest/template/header', $data);
        $this->load->view('guest/pembayaran');
        $this->load->view('guest/template/footer');
    }

    public function cekKonfirmasi()
    {
        $kode = $this->input->post('kode');


        redirect('konfirmasi?kode=' . $kode);
    }

    public function kirimKonfirmasi()
    {
        $config['upload_path']          = './assets/bukti/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 5020;

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());

            redirect('konfirmasi', $error);
        } else {
            $data = $this->upload->data();
            $filename = $data['file_name'];

            $no = $this->input->post('no_pembayaran');

            $this->M_Guest->insertBukti($filename, $no);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
            <strong>Berhasil!</strong> Data Bukti Telah Terkirim Ke Sistem, Silakan Cek Kembali Dalam 12 Jam Kemudian Untuk Mengecek Pembayaran Anda
            </div>');
            redirect('konfirmasi');
        }
    }
}
