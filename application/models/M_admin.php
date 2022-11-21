<?php

class M_admin extends CI_Model
{
    public function daftarAdmin()
    {
        return $this->db->get('tb_admin')->result_array();
    }

    public function daftarJemaatByJK($jenisKelamin)
    {
        return $this->db->get_where('tb_jemaat', ['jenisKelamin' => $jenisKelamin])->result_array();
    }

    public function ambilAdmin($user)
    {
        return $this->db->get_where('tb_admin', ['username' => $user])->row_array();
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