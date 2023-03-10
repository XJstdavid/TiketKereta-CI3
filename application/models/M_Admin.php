<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

    public function getDataStasiun()
    {
        return $this->db->get('stasiun');
    }

    public function tambah_stasiun($nama)
    {

        return $this->db->insert('stasiun', $nama);
    }

    public function delete_stasiun($id)
    {

        $row = $this->db->where('id', $id);

        return $this->db->delete('stasiun');
    }

    public function getDataEditStasiun($id)
    {
        $data = array(
            'id' => $id
        );
        return $this->db->get_where('stasiun', $data);
    }

    public function update_stasiun($data, $id)
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('stasiun', $data);
    }

    public function tambah_jadwal($data)
    {
        return $this->db->insert('jadwal', $data);
    }

    public function getJadwal()
    {
        $this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun AS TUJUAN');
        $this->db->from('jadwal');
        $this->db->join('stasiun as Asal', 'jadwal.asal = Asal.id', 'left');
        $this->db->join('stasiun as Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');
        return $this->db->get();
    }

    public function hapusJadwal($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('jadwal');
    }

    public function getDataEditJadwal($id)
    {
        $data = array(
            'jadwal.id' => $id
        );
        $this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun AS TUJUAN');
        $this->db->from('jadwal');
        $this->db->where($data);
        $this->db->join('stasiun as Asal', 'jadwal.asal = Asal.id', 'left');
        $this->db->join('stasiun as Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');
        return $this->db->get();
    }

    public function edit_jadwal($data)
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('jadwal', $data);
    }

    public function getKonfirmasiPembayaran()
    {
        $where = array(
            'status' => 1,
        );
        return $this->db->get_where('pembayaran', $where);
    }

    public function updatePembayaran($id)
    {
        $data = array(
            'status' => 2,
        );
        $this->db->where('id', $id);
        return $this->db->update('pembayaran', $data);
    }

    public function prosesBerangkat($id)
    {
        $data = array(
            'status' => 1
        );
        $this->db->where('id', $id);
        return $this->db->update('jadwal', $data);
    }

    public function getPenumpamg()
    {
        $this->db->join('tiket', 'tiket.nomor_tiket = penumpang.nomor_tiket');
        return $this->db->get('penumpang');
    }

    public function getTiket()
    {
        // $this->db->join('tiket', 'tiket.nomor_tiket = tiket.nomor_tiket');
        return $this->db->get('tiket');
    }

    public function hitungTotalStasiun()
    {
        $query = $this->db->get('stasiun');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
