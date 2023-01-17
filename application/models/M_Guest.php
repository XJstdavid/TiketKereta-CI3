<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Guest extends CI_Model
{
    public function getDataStasiun()
    {
        return $this->db->get('stasiun');
    }

    public function cari_tiket($data)
    {
        $this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun AS TUJUAN');
        $this->db->where($data);
        $this->db->like('tgl_berangkat', $this->input->post('tanggal'));
        $this->db->from('jadwal');
        $this->db->join('stasiun as Asal', 'jadwal.asal = Asal.id', 'left');
        $this->db->join('stasiun as Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');
        return $this->db->get();
    }

    public function getDataInfoPesan($id)
    {
        $this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun AS TUJUAN');
        $this->db->where('jadwal.id', $id);
        $this->db->join('stasiun as Asal', 'jadwal.asal = Asal.id', 'left');
        $this->db->join('stasiun as Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');
        return $this->db->get('jadwal');
    }

    public function getTiket()
    {
        return $this->db->get('tiket');
    }

    public function insertPenumpang($data)
    {
        return $this->db->insert('penumpang', $data);
    }

    public function insertPemesan($data)
    {
        return $this->db->insert('tiket', $data);
    }

    public function getPembayaran()
    {
        return $this->db->get('pembayaran');
    }

    public function insertPembayaran($data)
    {
        return $this->db->insert('pembayaran', $data);
    }
}
