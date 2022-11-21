<?php

class M_kehadiran extends CI_Model
{
    public function tambahKehadiran($data)
    {
        $this->db->insert('tb_kehadiran', $data);
    }

    public function totalKehadiran()
    {
        $query = $this->db->query("SELECT COUNT(id) as jumlah, tb_ibadah.tanggalIbadah as tanggal FROM tb_kehadiran INNER JOIN tb_ibadah ON tb_kehadiran.kodeIbadah = tb_ibadah.kodeIbadah WHERE tb_ibadah.status = 'SELESAI' AND tb_kehadiran.status = 'HADIR' GROUP BY tb_kehadiran.kodeIbadah ORDER BY tb_ibadah.tanggalIbadah ASC");
        return $query->result();
    }

    public function totalKehadiranByJK($jenisKelamin)
    {
        $query = $this->db->query("SELECT COUNT(id) as jumlah, tb_ibadah.tanggalIbadah as tanggal FROM tb_kehadiran INNER JOIN tb_ibadah ON tb_kehadiran.kodeIbadah = tb_ibadah.kodeIbadah WHERE tb_ibadah.status = 'SELESAI' AND tb_kehadiran.status = 'HADIR' AND tb_kehadiran.jenisKelamin = '$jenisKelamin' GROUP BY tb_kehadiran.kodeIbadah ORDER BY tb_ibadah.tanggalIbadah ASC");
        return $query->result();
    }

    public function ambilJemaatHadir($kodeIbadah)
    {
        return $this->db->get_where('tb_kehadiran', ['kode' => $kodeIbadah])->result_array();
    }

    public function ambilJemaatBelumHadir($hadir)
    {
        $query = $this->db->query("SELECT * FROM tb_jemaat WHERE id NOT IN " . $hadir);
        return $query->result_array();
    }

    public function jemaatHadir($kodeIbadah)
    {
        return $this->db->get_where('tb_kehadiran', ['status' => "HADIR", 'kodeIbadah' => $kodeIbadah])->result_array();
    }

    public function cekStatusKehadiran($id, $kodeIbadah)
    {
        return $this->db->get_where('tb_kehadiran', ['id' => $id, 'kode' => $kodeIbadah])->row_array();
    }

    public function cekKuota($kodeIbadah)
    {
        return count($this->db->get_where('tb_kehadiran', ['kodeIbadah' => $kodeIbadah])->result_array());
    }

    // public function cekJemaatTerdaftar($kodeIbadah, $name, $tanggalLahir, $lingkungan)
    // {
    //     $nama = explode(" ", $name);
    //     $result = 0;
    //     foreach ($nama as $nm){
    //         $cek = $this->db->query("SELECT * FROM tb_kehadiran WHERE kodeIbadah = '".$kodeIbadah."' AND nama LIKE '%".$nm."%' AND tanggalLahir = '".$tanggalLahir."' AND lingkungan = '".$lingkungan."'")->row_array();
    //         if(!empty($cek)){
    //             $result += 1;
    //         }
    //     } 
    //     return $result;
    // }

    public function updateKehadiran($id, $kodeIbadah)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date('H:i:s');
        return $this->db->query("UPDATE tb_kehadiran SET timeHadir = '" . $time . "', status = 'HADIR' WHERE id = '" . $id . "' AND kodeIbadah = '" . $kodeIbadah . "'");
    }

    public function hapusKehadiran($id, $kodeIbadah)
    {
        $this->db->delete('tb_kehadiran', ['kode' => $kodeIbadah, 'id' => $id]);
    }

    public function setTidakHadir()
    {
        $this->db->set('status', "TIDAK HADIR")->where('status', 'TERDAFTAR')->update('tb_kehadiran');
    }
}
