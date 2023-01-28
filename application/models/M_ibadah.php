<?php

class M_ibadah extends CI_Model
{
    public function daftarIbadah()
    {
        return $this->db->get('tb_ibadah')->result_array();
    }

    public function daftarIbadahMingguIni($jenisIbadah)
    {
        return $this->db->query('SELECT * FROM tb_ibadah WHERE jenis = "' . urldecode($jenisIbadah) . '" AND tanggal >= CURDATE() AND status = "BUKA" ORDER BY tanggal ASC')->result_array();
    }

    public function daftarIbadahSelesai($jenisIbadah)
    {
        return $this->db->query('SELECT * FROM tb_ibadah WHERE jenis = "' . urldecode($jenisIbadah) . '" AND status = "SELESAI" ORDER BY tanggal DESC')->result_array();
    }

    public function ambilIbadah($kodeIbadah)
    {
        return $this->db->get_where('tb_ibadah', ['kode' => $kodeIbadah])->row_array();
    }

    public function updateKuota($kodeIbadah)
    {
        $this->db->set('terisi', 'terisi+1', FALSE)->where('kodeIbadah', $kodeIbadah)->update('tb_ibadah');
    }

    public function tambahIbadah($data)
    {
        $this->db->insert('tb_ibadah', $data);
    }

    public function updateIbadah($kodeIbadah, $data)
    {
        $this->db->set($data)->where('kode', $kodeIbadah)->update('tb_ibadah');
    }

    public function tutupDaftarOnsite($kodeIbadah)
    {
        $this->db->set('status', "SELESAI")->where('kode', $kodeIbadah)->update('tb_ibadah');
    }

    public function ibadahBuka()
    {
        return $this->db->query('SELECT * FROM tb_ibadah WHERE tanggal < CURDATE() AND status = "BUKA" ORDER BY tanggal ASC')->result_array();
    }
}
