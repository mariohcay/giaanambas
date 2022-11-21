<?php

class M_jemaat extends CI_Model
{
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
        return $this->db->query("SELECT * FROM tb_jemaat WHERE username = '".$user."' OR telepon = '".$user."'")->row_array();
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

    public function ambilDataTerakhir()
    {
        return $this->db->query('SELECT * FROM jemaat ORDER BY noinduk DESC')->row_array();
    }
}