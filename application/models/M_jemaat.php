<?php

class M_jemaat extends CI_Model
{
    public function convertTanggal()
    {
        return $this->db->get('tb_tanggal')->result_array();
    }

    public function daftarJemaat()
    {
        return $this->db->get('tb_jemaat')->result_array();
    }

    public function daftarJemaatByJK($jenisKelamin)
    {
        return $this->db->get_where('tb_jemaat', ['jenisKelamin' => $jenisKelamin])->result_array();
    }

    public function ambilJemaat($user)
    {
        return $this->db->query("SELECT * FROM tb_jemaat WHERE username = '" . $user . "' OR telepon = '" . $user . "'")->row_array();
    }

    public function tambahJemaat($data)
    {
        $this->db->insert('tb_jemaat', $data);
    }

    public function ubahJemaat($id, $data)
    {
        $this->db->where('id', $id)->update('tb_jemaat', $data);
    }

    public function ambilJemaatbyId($id)
    {
        return $this->db->get_where('tb_jemaat', ['id' => $id])->row_array();
    }

    public function ambilJmlKehadiran($id)
    {
        return $this->db->query('SELECT tb_ibadah.jenis, COUNT(tb_kehadiran.id) as jml FROM tb_kehadiran INNER JOIN tb_ibadah On tb_kehadiran.kode = tb_ibadah.kode WHERE tb_kehadiran.id = "' . $id . '" GROUP BY tb_ibadah.jenis;')->result_array();
    }
}
