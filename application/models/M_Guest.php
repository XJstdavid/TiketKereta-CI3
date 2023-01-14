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
}
