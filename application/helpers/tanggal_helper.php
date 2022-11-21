<?php
if(!function_exists('tgl_indo'))
{
    function tgl_indo($tanggal, $namaHari = false)
    {
        $hari = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
            
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        $tgl_indo = (string)((int)$pecahkan[2]) . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];

        if ($namaHari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }

        return $tgl_indo;
    }
    
}

if(!function_exists('time_indo'))
{
    function time_indo($time)
    {
        $pecahkan = explode(':', $time);
        return $pecahkan[0].'.'.$pecahkan['1'];
    }
}

if(!function_exists('_checkUser'))
{
    function _checkUser(){
        $ci = &get_instance();
        $ci->load->library('session');
        $user = $ci->session->userdata('username');
        if(!$user){
            $ci->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Anda harus Login terlebih dahulu</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            redirect('Auth');
        }else{
            return 1;
        }
    }
}
?>