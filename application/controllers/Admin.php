<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }
    public function halamanDashboard()
    {
        $data['judul']  = 'XKereta - Admin';
        $data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

        $this->load->view('admin/dashboard', $data);
    }

    public function tambah_stasiun()
    {
        $nama = $this->input->post('stasiun');
        $image = $_FILES['image']['tmp_name'];

        $path = "upload/";
        $imagePath = $path . $mama . time() . ".png";
        move_uploaded_file($image, $imagePath);

        $data = array(
            'nama_stasiun' => $nama,
            'image' => base_url() . $imagePath,
        );

        if (isset($_POST['submit'])) {
            $this->M_Admin->tambah_stasiun($data);
            $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
            <strong>Berhasil!</strong> Data berhasil ditambahkan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }

        redirect(base_url('admin/dashboard'));
    }

    public function hapus_stasiun($id)
    {
        $remove = $this->M_Admin->delete_stasiun($id);

        $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
            <strong>Berhasil!</strong> Data telah di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect(base_url('admin/dashboard'));
    }

    public function edit_stasiun($id)
    {
        $data['judul']  = 'XKereta - Admin';
        $data['data_stasiun'] = $this->M_Admin->getDataEditStasiun($id)->row();

        $this->load->view('admin/edit_stasiun', $data);
    }

    public function update_stasiun()
    {
        $config_logo_image = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => 'upload/', //root path for image
            'max_size' => 2000,
        );


        $this->load->library('upload', $config_logo_image);
        if ($this->upload->do_upload('image')) {
            $nama = $this->input->post('nama_stasiun');
            $image = $_FILES["image"]["tmp_name"];
            $path = "upload/";
            $imagePath =  $path . $name . time() . ".png";
            move_uploaded_file($image, $imagePath);

            $data = [
                'nama_stasiun' => $nama,
                'image' => base_url() . $imagePath,
            ];
        } else {
            $nama = $this->input->post('nama_stasiun');
            $data = [
                'nama_stasiun' => $nama,
            ];
        }

        $update = $this->M_Admin->update_stasiun($data, $id);
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
            <strong>Berhasil!</strong> Data telah di update
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

        redirect(base_url('admin/dashboard'));
    }

    public function kelolajadwal()
    {
        $data['judul']  = 'XKereta - Admin';
        $data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

        $data['jadwal'] = $this->M_Admin->getJadwal()->result();

        $this->load->view('admin/kelola_jadwal', $data);
    }

    public function tambah_jadwal()
    {
        $data = array(
            'nama_kereta' => $this->input->post('nama_kereta'),
            'asal' => $this->input->post('asal'),
            'tujuan' => $this->input->post('tujuan'),
            'tgl_berangkat' => $this->input->post('tgl_berangkat'),
            'tgl_sampai' => $this->input->post('tgl_sampai'),
            'kelas' => $this->input->post('kelas'),
            'harga' => $this->input->post('harga'),
        );

        if (isset($_POST['submit'])) {
            $this->M_Admin->tambah_jadwal($data);
            $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
        <strong>Berhasil!</strong> Data berhasil di tambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        }

        redirect(base_url('admin/dashboard/kelola-jadwal'));
    }

    public function hapusJadwal($id)
    {
        $remove = $this->M_Admin->hapusJadwal($id);
        $this->session->set_flashdata('berhasil', '<div class="alert alert-succes alert-dismissible fade show" role="alert" style="width: 100%">
            <strong>Berhasil!</strong> Data telah di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect(base_url('admin/dashboard/kelola-jadwal'));
    }

    public function editJadwal($id)
    {
        $data['judul']  = 'XKereta - Admin';
        $data['data_edit'] = $this->M_Admin->getDataEditJadwal($id)->row();
        $data['stasiun'] = $this->M_Admin->getDataStasiun()->result();
        $this->load->view('admin/edit_jadwal', $data);
    }

    public function update_jadwal()
    {
        $data = array(
            'nama_kereta' => $this->input->post('nama_kereta'),
            'asal' => $this->input->post('asal'),
            'tujuan' => $this->input->post('tujuan'),
            'tgl_berangkat' => $this->input->post('tgl_berangkat'),
            'tgl_sampai' => $this->input->post('tgl_sampai'),
            'kelas' => $this->input->post('kelas'),
            'harga' => $this->input->post('harga'),
        );

        $this->M_Admin->edit_jadwal($data);
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
            <strong>Berhasil!</strong> Data telah di update
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect(base_url('admin/dashboard/kelola-jadwal'));
    }

    public function halamanKonfirmasi()
    {
        $data['judul']  = 'XKereta - Admin';
        $data['list']   = $this->M_Admin->getKonfirmasiPembayaran()->result();

        $this->load->view('admin/konfirmasi_pembayaran', $data);
    }

    public function verifikasiPembayaran($id)
    {
        $update = $this->M_Admin->updatePembayaran($id);

        if ($update) {
            $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
            <strong>Berhasil!</strong> Data Pembayaran Telah Di Verikasi
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/konfirmasi-pembayaran');
        } else {
            echo "Gagal";
        }
    }

    public function halamanProfile()
    {
        $data = [
            "current_user" => $this->auth_model->current_user(),
        ];

        $this->load->view('admin/profile', $data);
    }
}
