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


    public function getPembayaranWhere($kode)
    {
        $this->db->where('no_pembayaran', $kode);
        return $this->db->get('pembayaran');
    }

    public function cekKonfirmasi($nomor)
    {
        $this->db->where('nomor_tiket', $nomor);
        return $this->db->get('penumpang');
    }

    public function insertBukti($nama, $no)
    {
        $data  = array(
            'bukti' => $nama,
        );
        $this->db->where('no_pembayaran', $no);
        return $this->db->update('pembayaran', $data);
    }

    public function PilihKursi($data, $no)
    {
        $this->db->where('no_pembayaran', $no);
        return $this->db->update('pembayaran', $data);
    }
}
