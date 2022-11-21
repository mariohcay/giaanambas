<?php

class M_pesan extends CI_Model
{
    public function submitPesan($data){
        $this->db->insert('tb_pesan', $data);
    }
}