<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_jemaat');
        $this->load->model('m_ibadah');
        $this->load->model('m_kehadiran');
    }

    public function index()
    {
        if (_checkUser()) {
            $data['title'] = 'Admin Dashboard - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Dashboard';
            $data['jemaat'] = $this->m_jemaat->daftarJemaat();
            $data['lakiLaki'] = $this->m_jemaat->daftarJemaatByJK("Laki-laki");
            $data['perempuan'] = $this->m_jemaat->daftarJemaatByJK("Perempuan");

            // // $data['ibadahMingguIni'] = $this->m_ibadah->daftarIbadahMingguIni();
            // $tanggal = $this->m_jemaat->convertTanggal();
            // // var_dump($tanggal); die;

            // foreach ($tanggal as $tgl){
            //     echo convert_tgl($tgl['tanggal'])."</br>";
            // }
            // die;
            $ibadahBuka = $this->m_ibadah->ibadahBuka();
            if (!empty($ibadahBuka)) {
                foreach ($ibadahBuka as $data) {
                    $this->m_ibadah->tutupDaftarOnsite($data['kode']);
                }
                redirect('Admin');
            }

            $kehadiranTotalUmum1 = $this->m_kehadiran->totalKehadiran("Umum 1");
            $totalUmum1 = 0;
            $data['kehadiranUmum1'] = "";
            $data['cekKehadiranUmum1'] = "";
            if (count($kehadiranTotalUmum1) > 0) {
                $chartUmum1 = [];
                foreach ($kehadiranTotalUmum1 as $row) {
                    $chartUmum1['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartUmum1['data'][] = 0;
                    } else {
                        $chartUmum1['data'][] = (int) $row->jumlah;
                    }
                    $totalUmum1 += (int) $row->jumlah;
                }
                $data['avgKehadiranUmum1'] = $totalUmum1 / count($kehadiranTotalUmum1);
                $data['kehadiranUmum1'] = json_encode($chartUmum1);
            } else {
                $data['cekKehadiranUmum1'] = "empty";
            }

            $kehadiranTotalUmum2 = $this->m_kehadiran->totalKehadiran("Umum 2");
            $totalUmum2 = 0;
            $data['kehadiranUmum2'] = "";
            $data['cekKehadiranUmum2'] = "";
            if (count($kehadiranTotalUmum2) > 0) {
                $chartUmum2 = [];
                foreach ($kehadiranTotalUmum2 as $row) {
                    $chartUmum2['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartUmum2['data'][] = 0;
                    } else {
                        $chartUmum2['data'][] = (int) $row->jumlah;
                    }
                    $totalUmum2 += (int) $row->jumlah;
                }
                $data['avgKehadiranUmum2'] = $totalUmum2 / count($kehadiranTotalUmum2);
                $data['kehadiranUmum2'] = json_encode($chartUmum2);
            } else {
                $data['cekKehadiranUmum2'] = "empty";
            }

            $kehadiranTotalKamis = $this->m_kehadiran->totalKehadiran("Kamis");
            $totalKamis = 0;
            $data['kehadiranKamis'] = "";
            $data['cekKehadiranKamis'] = "";
            if (count($kehadiranTotalKamis) > 0) {
                $chartKamis = [];
                foreach ($kehadiranTotalKamis as $row) {
                    $chartKamis['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartKamis['data'][] = 0;
                    } else {
                        $chartKamis['data'][] = (int) $row->jumlah;
                    }
                    $totalKamis += (int) $row->jumlah;
                }
                $data['avgKehadiranKamis'] = $totalKamis / count($kehadiranTotalKamis);
                $data['kehadiranKamis'] = json_encode($chartKamis);
            } else {
                $data['cekKehadiranKamis'] = "empty";
            }

            $kehadiranTotalAbakrisBethlehem = $this->m_kehadiran->totalKehadiran("Abakris - Bethlehem");
            $totalAbakrisBethlehem = 0;
            $data['kehadiranAbakrisBethlehem'] = "";
            $data['cekKehadiranAbakrisBethlehem'] = "";
            if (count($kehadiranTotalAbakrisBethlehem) > 0) {
                $chartAbakrisBethlehem = [];
                foreach ($kehadiranTotalAbakrisBethlehem as $row) {
                    $chartAbakrisBethlehem['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartAbakrisBethlehem['data'][] = 0;
                    } else {
                        $chartAbakrisBethlehem['data'][] = (int) $row->jumlah;
                    }
                    $totalAbakrisBethlehem += (int) $row->jumlah;
                }
                $data['avgKehadiranAbakrisBethlehem'] = $totalAbakrisBethlehem / count($kehadiranTotalAbakrisBethlehem);
                $data['kehadiranAbakrisBethlehem'] = json_encode($chartAbakrisBethlehem);
            } else {
                $data['cekKehadiranAbakrisBethlehem'] = "empty";
            }

            $kehadiranTotalAbakrisBethel = $this->m_kehadiran->totalKehadiran("Abakris - Bethel");
            $totalAbakrisBethel = 0;
            $data['kehadiranAbakrisBethel'] = "";
            $data['cekKehadiranAbakrisBethel'] = "";
            if (count($kehadiranTotalAbakrisBethel) > 0) {
                $chartAbakrisBethel = [];
                foreach ($kehadiranTotalAbakrisBethel as $row) {
                    $chartAbakrisBethel['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartAbakrisBethel['data'][] = 0;
                    } else {
                        $chartAbakrisBethel['data'][] = (int) $row->jumlah;
                    }
                    $totalAbakrisBethel += (int) $row->jumlah;
                }
                $data['avgKehadiranAbakrisBethel'] = $totalAbakrisBethel / count($kehadiranTotalAbakrisBethel);
                $data['kehadiranAbakrisBethel'] = json_encode($chartAbakrisBethel);
            } else {
                $data['cekKehadiranAbakrisBethel'] = "empty";
            }

            $kehadiranTotalAbakrisPniel = $this->m_kehadiran->totalKehadiran("Abakris - Pniel");
            $totalAbakrisPniel = 0;
            $data['kehadiranAbakrisPniel'] = "";
            $data['cekKehadiranAbakrisPniel'] = "";
            if (count($kehadiranTotalAbakrisPniel) > 0) {
                $chartAbakrisPniel = [];
                foreach ($kehadiranTotalAbakrisPniel as $row) {
                    $chartAbakrisPniel['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartAbakrisPniel['data'][] = 0;
                    } else {
                        $chartAbakrisPniel['data'][] = (int) $row->jumlah;
                    }
                    $totalAbakrisPniel += (int) $row->jumlah;
                }
                $data['avgKehadiranAbakrisPniel'] = $totalAbakrisPniel / count($kehadiranTotalAbakrisPniel);
                $data['kehadiranAbakrisPniel'] = json_encode($chartAbakrisPniel);
            } else {
                $data['cekKehadiranAbakrisPniel'] = "empty";
            }

            $kehadiranTotalAbakrisSion = $this->m_kehadiran->totalKehadiran("Abakris - Sion");
            $totalAbakrisSion = 0;
            $data['kehadiranAbakrisSion'] = "";
            $data['cekKehadiranAbakrisSion'] = "";
            if (count($kehadiranTotalAbakrisSion) > 0) {
                $chartAbakrisSion = [];
                foreach ($kehadiranTotalAbakrisSion as $row) {
                    $chartAbakrisSion['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartAbakrisSion['data'][] = 0;
                    } else {
                        $chartAbakrisSion['data'][] = (int) $row->jumlah;
                    }
                    $totalAbakrisSion += (int) $row->jumlah;
                }
                $data['avgKehadiranAbakrisSion'] = $totalAbakrisSion / count($kehadiranTotalAbakrisSion);
                $data['kehadiranAbakrisSion'] = json_encode($chartAbakrisSion);
            } else {
                $data['cekKehadiranAbakrisSion'] = "empty";
            }

            $kehadiranTotalAbakrisTunasRemaja = $this->m_kehadiran->totalKehadiran("Abakris - TunasRemaja");
            $totalAbakrisTunasRemaja = 0;
            $data['kehadiranAbakrisTunasRemaja'] = "";
            $data['cekKehadiranAbakrisTunasRemaja'] = "";
            if (count($kehadiranTotalAbakrisTunasRemaja) > 0) {
                $chartAbakrisTunasRemaja = [];
                foreach ($kehadiranTotalAbakrisTunasRemaja as $row) {
                    $chartAbakrisTunasRemaja['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartAbakrisTunasRemaja['data'][] = 0;
                    } else {
                        $chartAbakrisTunasRemaja['data'][] = (int) $row->jumlah;
                    }
                    $totalAbakrisTunasRemaja += (int) $row->jumlah;
                }
                $data['avgKehadiranAbakrisTunasRemaja'] = $totalAbakrisTunasRemaja / count($kehadiranTotalAbakrisTunasRemaja);
                $data['kehadiranAbakrisTunasRemaja'] = json_encode($chartAbakrisTunasRemaja);
            } else {
                $data['cekKehadiranAbakrisTunasRemaja'] = "empty";
            }

            $kehadiranTotalPRBKremaja = $this->m_kehadiran->totalKehadiran("PRBK - Remaja");
            $totalPRBKremaja = 0;
            $data['kehadiranPRBKremaja'] = "";
            $data['cekKehadiranPRBKremaja'] = "";
            if (count($kehadiranTotalPRBKremaja) > 0) {
                $chartPRBKremaja = [];
                foreach ($kehadiranTotalPRBKremaja as $row) {
                    $chartPRBKremaja['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartPRBKremaja['data'][] = 0;
                    } else {
                        $chartPRBKremaja['data'][] = (int) $row->jumlah;
                    }
                    $totalPRBKremaja += (int) $row->jumlah;
                }
                $data['avgKehadiranPRBKremaja'] = $totalPRBKremaja / count($kehadiranTotalPRBKremaja);
                $data['kehadiranPRBKremaja'] = json_encode($chartPRBKremaja);
            } else {
                $data['cekKehadiranPRBKremaja'] = "empty";
            }

            $kehadiranTotalPRBKpemuda = $this->m_kehadiran->totalKehadiran("PRBK - Pemuda");
            $totalPRBKpemuda = 0;
            $data['kehadiranPRBKpemuda'] = "";
            $data['cekKehadiranPRBKpemuda'] = "";
            if (count($kehadiranTotalPRBKpemuda) > 0) {
                $chartPRBKpemuda = [];
                foreach ($kehadiranTotalPRBKpemuda as $row) {
                    $chartPRBKpemuda['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartPRBKpemuda['data'][] = 0;
                    } else {
                        $chartPRBKpemuda['data'][] = (int) $row->jumlah;
                    }
                    $totalPRBKpemuda += (int) $row->jumlah;
                }
                $data['avgKehadiranPRBKpemuda'] = $totalPRBKpemuda / count($kehadiranTotalPRBKpemuda);
                $data['kehadiranPRBKpemuda'] = json_encode($chartPRBKpemuda);
            } else {
                $data['cekKehadiranPRBKpemuda'] = "empty";
            }

            $kehadiranTotalPRBKdewasaMuda = $this->m_kehadiran->totalKehadiran("PRBK - Dewasa Muda");
            $totalPRBKdewasaMuda = 0;
            $data['kehadiranPRBKdewasaMuda'] = "";
            $data['cekKehadiranPRBKdewasaMuda'] = "";
            if (count($kehadiranTotalPRBKdewasaMuda) > 0) {
                $chartPRBKdewasaMuda = [];
                foreach ($kehadiranTotalPRBKdewasaMuda as $row) {
                    $chartPRBKdewasaMuda['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartPRBKdewasaMuda['data'][] = 0;
                    } else {
                        $chartPRBKdewasaMuda['data'][] = (int) $row->jumlah;
                    }
                    $totalPRBKdewasaMuda += (int) $row->jumlah;
                }
                $data['avgKehadiranPRBKdewasaMuda'] = $totalPRBKdewasaMuda / count($kehadiranTotalPRBKdewasaMuda);
                $data['kehadiranPRBKdewasaMuda'] = json_encode($chartPRBKdewasaMuda);
            } else {
                $data['cekKehadiranPRBKdewasaMuda'] = "empty";
            }

            $kehadiranTotalKaumPria = $this->m_kehadiran->totalKehadiran("Kaum Pria");
            $totalKaumPria = 0;
            $data['kehadiranKaumPria'] = "";
            $data['cekKehadiranKaumPria'] = "";
            if (count($kehadiranTotalKaumPria) > 0) {
                $chartKaumPria = [];
                foreach ($kehadiranTotalKaumPria as $row) {
                    $chartKaumPria['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartKaumPria['data'][] = 0;
                    } else {
                        $chartKaumPria['data'][] = (int) $row->jumlah;
                    }
                    $totalKaumPria += (int) $row->jumlah;
                }
                $data['avgKehadiranKaumPria'] = $totalKaumPria / count($kehadiranTotalKaumPria);
                $data['kehadiranKaumPria'] = json_encode($chartKaumPria);
            } else {
                $data['cekKehadiranKaumPria'] = "empty";
            }

            $kehadiranTotalKaumWanita = $this->m_kehadiran->totalKehadiran("Kaum Wanita");
            $totalKaumWanita = 0;
            $data['kehadiranKaumWanita'] = "";
            $data['cekKehadiranKaumWanita'] = "";
            if (count($kehadiranTotalKaumWanita) > 0) {
                $chartKaumWanita = [];
                foreach ($kehadiranTotalKaumWanita as $row) {
                    $chartKaumWanita['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartKaumWanita['data'][] = 0;
                    } else {
                        $chartKaumWanita['data'][] = (int) $row->jumlah;
                    }
                    $totalKaumWanita += (int) $row->jumlah;
                }
                $data['avgKehadiranKaumWanita'] = $totalKaumWanita / count($kehadiranTotalKaumWanita);
                $data['kehadiranKaumWanita'] = json_encode($chartKaumWanita);
            } else {
                $data['cekKehadiranKaumWanita'] = "empty";
            }

            $kehadiranTotalPSamaria = $this->m_kehadiran->totalKehadiran("Persekutuaan Samaria");
            $totalPSamaria = 0;
            $data['kehadiranPSamaria'] = "";
            $data['cekKehadiranPSamaria'] = "";
            if (count($kehadiranTotalPSamaria) > 0) {
                $chartPSamaria = [];
                foreach ($kehadiranTotalPSamaria as $row) {
                    $chartPSamaria['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartPSamaria['data'][] = 0;
                    } else {
                        $chartPSamaria['data'][] = (int) $row->jumlah;
                    }
                    $totalPSamaria += (int) $row->jumlah;
                }
                $data['avgKehadiranPSamaria'] = $totalPSamaria / count($kehadiranTotalPSamaria);
                $data['kehadiranPSamaria'] = json_encode($chartPSamaria);
            } else {
                $data['cekKehadiranPSamaria'] = "empty";
            }

            $kehadiranTotalPFilipi = $this->m_kehadiran->totalKehadiran("Persekutuaan Filipi");
            $totalPFilipi = 0;
            $data['kehadiranPFilipi'] = "";
            $data['cekKehadiranPFilipi'] = "";
            if (count($kehadiranTotalPFilipi) > 0) {
                $chartPFilipi = [];
                foreach ($kehadiranTotalPFilipi as $row) {
                    $chartPFilipi['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartPFilipi['data'][] = 0;
                    } else {
                        $chartPFilipi['data'][] = (int) $row->jumlah;
                    }
                    $totalPFilipi += (int) $row->jumlah;
                }
                $data['avgKehadiranPFilipi'] = $totalPFilipi / count($kehadiranTotalPFilipi);
                $data['kehadiranPFilipi'] = json_encode($chartPFilipi);
            } else {
                $data['cekKehadiranPFilipi'] = "empty";
            }

            $kehadiranTotalPFiladelfia = $this->m_kehadiran->totalKehadiran("Persekutuaan Filadelfia");
            $totalPFiladelfia = 0;
            $data['kehadiranPFiladelfia'] = "";
            $data['cekKehadiranPFiladelfia'] = "";
            if (count($kehadiranTotalPFiladelfia) > 0) {
                $chartPFiladelfia = [];
                foreach ($kehadiranTotalPFiladelfia as $row) {
                    $chartPFiladelfia['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartPFiladelfia['data'][] = 0;
                    } else {
                        $chartPFiladelfia['data'][] = (int) $row->jumlah;
                    }
                    $totalPFiladelfia += (int) $row->jumlah;
                }
                $data['avgKehadiranPFiladelfia'] = $totalPFiladelfia / count($kehadiranTotalPFiladelfia);
                $data['kehadiranPFiladelfia'] = json_encode($chartPFiladelfia);
            } else {
                $data['cekKehadiranPFiladelfia'] = "empty";
            }

            $kehadiranTotalPKana = $this->m_kehadiran->totalKehadiran("Persekutuaan Kana");
            $totalPKana = 0;
            $data['kehadiranPKana'] = "";
            $data['cekKehadiranPKana'] = "";
            if (count($kehadiranTotalPKana) > 0) {
                $chartPKana = [];
                foreach ($kehadiranTotalPKana as $row) {
                    $chartPKana['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartPKana['data'][] = 0;
                    } else {
                        $chartPKana['data'][] = (int) $row->jumlah;
                    }
                    $totalPKana += (int) $row->jumlah;
                }
                $data['avgKehadiranPKana'] = $totalPKana / count($kehadiranTotalPKana);
                $data['kehadiranPKana'] = json_encode($chartPKana);
            } else {
                $data['cekKehadiranPKana'] = "empty";
            }

            $kehadiranTotalPBethlehem = $this->m_kehadiran->totalKehadiran("Persekutuaan Bethlehem");
            $totalPBethlehem = 0;
            $data['kehadiranPBethlehem'] = "";
            $data['cekKehadiranPBethlehem'] = "";
            if (count($kehadiranTotalPBethlehem) > 0) {
                $chartPBethlehem = [];
                foreach ($kehadiranTotalPBethlehem as $row) {
                    $chartPBethlehem['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartPBethlehem['data'][] = 0;
                    } else {
                        $chartPBethlehem['data'][] = (int) $row->jumlah;
                    }
                    $totalPBethlehem += (int) $row->jumlah;
                }
                $data['avgKehadiranPBethlehem'] = $totalPBethlehem / count($kehadiranTotalPBethlehem);
                $data['kehadiranPBethlehem'] = json_encode($chartPBethlehem);
            } else {
                $data['cekKehadiranPBethlehem'] = "empty";
            }

            $kehadiranTotalTPI = $this->m_kehadiran->totalKehadiran("TPI");
            $totalTPI = 0;
            $data['kehadiranTPI'] = "";
            $data['cekKehadiranTPI'] = "";
            if (count($kehadiranTotalTPI) > 0) {
                $chartTPI = [];
                foreach ($kehadiranTotalTPI as $row) {
                    $chartTPI['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartTPI['data'][] = 0;
                    } else {
                        $chartTPI['data'][] = (int) $row->jumlah;
                    }
                    $totalTPI += (int) $row->jumlah;
                }
                $data['avgKehadiranTPI'] = $totalTPI / count($kehadiranTotalTPI);
                $data['kehadiranTPI'] = json_encode($chartTPI);
            } else {
                $data['cekKehadiranTPI'] = "empty";
            }

            $kehadiranTotalKhusus = $this->m_kehadiran->totalKehadiran("Khusus");
            $totalKhusus = 0;
            $data['kehadiranKhusus'] = "";
            $data['cekKehadiranKhusus'] = "";
            if (count($kehadiranTotalKhusus) > 0) {
                $chartKhusus = [];
                foreach ($kehadiranTotalKhusus as $row) {
                    $chartKhusus['label'][] = tgl_indo($row->tanggal);
                    if (empty($row->jumlah)) {
                        $chartKhusus['data'][] = 0;
                    } else {
                        $chartKhusus['data'][] = (int) $row->jumlah;
                    }
                    $totalKhusus += (int) $row->jumlah;
                }
                $data['avgKehadiranKhusus'] = $totalKhusus / count($kehadiranTotalKhusus);
                $data['kehadiranKhusus'] = json_encode($chartKhusus);
            } else {
                $data['cekKehadiranKhusus'] = "empty";
            }

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDashboard');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function daftarJemaat()
    {
        if (_checkUser()) {
            $data['title'] = 'Daftar Jemaat - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Daftar Jemaat';
            $data['jemaat'] = $this->m_jemaat->daftarJemaat();

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDaftarJemaat');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function tambahJemaat()
    {
        if (_checkUser()) {
            $data['title'] = 'Tambah Jemaat - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Tambah Jemaat';
            $data['id'] = "JM" . strval(count($this->m_jemaat->daftarJemaat()) + 1);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminTambahJemaat');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanTambahJemaat()
    {
        if (_checkUser()) {
            $data = [
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'jenisKelamin' => $this->input->post('jenisKelamin'),
                'tanggalLahir' => $this->input->post('tanggalLahir'),
                'statusPendidikan' => $this->input->post('statusPendidikan'),
                'statusBaptis' => $this->input->post('statusBaptis'),
                'tanggalAtestasiMasuk' => $this->input->post('tanggalAtestasiMasuk'),
                'tanggalAtestasiKeluar' => $this->input->post('tanggalAtestasiKeluar'),
                'tanggalMeninggal' => $this->input->post('tanggalMeninggal')
            ];
            $this->m_jemaat->tambahJemaat($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> Data jemaat berhasil ditambahkan<i class="fa fa-check my-auto"></i></div>');
            redirect('Admin/daftarJemaat');
        }
    }

    public function detailJemaat($id)
    {
        if (_checkUser()) {
            $data['title'] = 'Daftar Jemaat - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Daftar Jemaat';
            $data['jemaat'] = $this->m_jemaat->ambilJemaatbyId($id);
            $data['kehadiran'] = $this->m_jemaat->ambilJmlKehadiran($id);
            // $chartKehadiran = [];
            // $chartKehadiran['label'] = array("Umum 1", "Umum 2");
            // $data['kehadiran'] = json_encode($jmlKehadiran);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDetailJemaat');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanUbahJemaat()
    {
        $user = $this->session->userdata('username');
        if (!$user) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Anda masuk terlebih dahulu</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            redirect('Auth');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'jenisKelamin' => $this->input->post('jenisKelamin'),
                'tanggalLahir' => $this->input->post('tanggalLahir'),
                'statusPendidikan' => $this->input->post('statusPendidikan'),
                'statusBaptis' => $this->input->post('statusBaptis'),
                'tanggalAtestasiMasuk' => $this->input->post('tanggalAtestasiMasuk'),
                'tanggalAtestasiKeluar' => $this->input->post('tanggalAtestasiKeluar'),
                'tanggalMeninggal' => $this->input->post('tanggalMeninggal')
            ];

            $jemaat = $this->m_jemaat->ubahJemaat($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> Data jemaat berhasil diperbaharui<i class="fa fa-check my-auto"></i></div>');
            redirect('Admin/daftarJemaat');
        }
    }

    public function daftarIbadah($jenisIbadah)
    {
        if (_checkUser()) {
            $data['title'] = 'Daftar Ibadah - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Daftar Ibadah';
            $data['ibadahMingguIni'] = $this->m_ibadah->daftarIbadahMingguIni($jenisIbadah);
            $data['ibadah'] = $this->m_ibadah->daftarIbadahSelesai($jenisIbadah);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDaftarIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function tambahIbadah()
    {
        if (_checkUser()) {
            $data['title'] = 'Tambah Ibadah - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Tambah Ibadah';

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminTambahIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanTambahIbadah()
    {
        if (_checkUser()) {
            $jenisIbadah = $this->input->post('jenisIbadah');
            $tanggalIbadah = $this->input->post('tanggalIbadah');
            $jamIbadah = $this->input->post('jam') . ":" . $this->input->post('menit') . ":00";
            $pecahkan = explode('-', $tanggalIbadah);
            $admin = array("superadmin", "adminabakris", "adminprbk");
            $username = $this->session->userdata('username');
            $kodeIbadah = "";
            if (empty($jenisIbadah)) {
                if ($username === "admin1") {
                    $jenisIbadah = "Umum 1";
                } else if ($username === "admin2") {
                    $jenisIbadah = "Umum 2";
                } else if ($username === "adminkamis") {
                    $jenisIbadah = "Kamis";
                } else if ($username === "adminpria") {
                    $jenisIbadah = "Kaum Pria";
                } else if ($username === "adminwanita") {
                    $jenisIbadah = "Kaum Wanita";
                } else if ($username === "adminsamaria") {
                    $jenisIbadah = "Persekutuan Samaria";
                } else if ($username === "adminfilipi") {
                    $jenisIbadah = "Persekutuan Filipi";
                } else if ($username === "adminfiladelfia") {
                    $jenisIbadah = "Persekutuan Filadelfia";
                } else if ($username === "adminkana") {
                    $jenisIbadah = "Persekutuan Kana";
                } else if ($username === "adminbethelehem") {
                    $jenisIbadah = "Persekutuan Bethelehem";
                } else if ($username === "admintpi") {
                    $jenisIbadah = "TPI";
                }
            }

            if ($jenisIbadah === "Umum 1") {
                $kodeIbadah = "UM1-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Umum 2") {
                $kodeIbadah = "UM2-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Kamis") {
                $kodeIbadah = "KMS-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Abakris - Bethlehem") {
                $kodeIbadah = "ABK-BET-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Abakris - Bethel") {
                $kodeIbadah = "ABK-BTL-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Abakris - Pniel") {
                $kodeIbadah = "ABK-PNL-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Abakris - Sion") {
                $kodeIbadah = "ABK-SION-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Abakris - Tunas Remaja") {
                $kodeIbadah = "ABK-TR-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "PRBK - Remaja") {
                $kodeIbadah = "PRBK-RMJ-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "PRBK - Pemuda") {
                $kodeIbadah = "PRBK-PMD-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "PRBK - Dewasa Muda") {
                $kodeIbadah = "PRBK-DM-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Kaum Pria") {
                $kodeIbadah = "PRIA-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Kaum Wanita") {
                $kodeIbadah = "WNTA-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Persekutuan Samaria") {
                $kodeIbadah = "P-SMR-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Persekutuan Filipi") {
                $kodeIbadah = "P-FLP-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Persekutuan Fiadelfia") {
                $kodeIbadah = "P-FIA-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Persekutuan Kana") {
                $kodeIbadah = "P-KNA-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Persekutuan Bethlehem") {
                $kodeIbadah = "P-BET-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "TPI") {
                $kodeIbadah = "TPI-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            } else if ($jenisIbadah === "Khusus") {
                $kodeIbadah = "KHU-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
            }

            $ibadah = [
                'kode' => $kodeIbadah,
                'jenis' => $jenisIbadah,
                'nama' => $this->input->post('namaIbadah'),
                'tema' => $this->input->post('temaIbadah'),
                'tanggal' => $tanggalIbadah,
                'jam' => $jamIbadah,
                'link' => $this->input->post('link'),
            ];

            $this->m_ibadah->tambahIbadah($ibadah);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Berhasil menambahkan Ibadah baru</small><i class="fa fa-check my-auto"></i></div>');
            redirect('Admin/daftarIbadah/' . $jenisIbadah);

            // $config = [
            //     'upload_path' => './assets/img/thumbnail/',
            //     'allowed_types' => 'jpg|jpeg|png',
            //     'max_size' => 1024,
            //     'file_name' => 'Thumbnail-' . tgl_indo($tanggalIbadah)
            // ];

            // $this->load->library('upload', $config);
            // if (@$_FILES['image']['name'] != null) {
            //     if ($this->upload->do_upload('image')) {
            //         $ibadah['image'] = $this->upload->data('file_name');
            //         $this->m_ibadah->tambahIbadah($ibadah);
            //         $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Berhasil menambahkan Ibadah baru</small><i class="fa fa-check my-auto"></i></div>');
            //         $this->daftarIbadah();
            //     } else {
            //         $error = $this->upload->display_errors();
            //         $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>' . $error . '</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            //         $this->tambahIbadah();
            //     }
            // }
        }
    }

    public function detailIbadah($kodeIbadah)
    {
        if (_checkUser()) {
            $data['title'] = 'Detail Ibadah - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            if ($data['ibadah']['tanggal'] < date('Y-m-d') && $data['ibadah']['status'] === "BUKA") {
                $this->m_ibadah->tutupDaftarOnsite($kodeIbadah);
            }
            $data['jemaat'] = $this->m_kehadiran->ambilJemaatHadir($kodeIbadah);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDetailIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function jemaatTerdaftar($kodeIbadah)
    {
        if (_checkUser()) {
            $data['title'] = 'Scan QR Code Ibadah - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['jemaat'] = $this->m_kehadiran->ambilJemaatHadir($kodeIbadah);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminJemaatTerdaftar');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function ubahIbadah($kodeIbadah)
    {
        if (_checkUser()) {
            $data['title'] = 'Ubah Ibadah - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminUbahIbadah');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function simpanUbahIbadah($kodeIbadah)
    {
        if (_checkUser()) {
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam') . ":" . $this->input->post('menit') . ":00";
            $jenisIbadah = $this->input->post('jenisIbadah');
            $pecahkan = explode('-', $tanggal);
            $username = $this->session->userdata('username');
            $kodeIbadahBaru = $kodeIbadah;
            if ($jenisIbadah !== $this->input->post('jenis')) {
                if ($jenisIbadah === "Umum 1") {
                    $kodeIbadahBaru = "UM1-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Umum 2") {
                    $kodeIbadahBaru = "UM2-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Kamis") {
                    $kodeIbadahBaru = "KMS-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Abakris - Bethlehem") {
                    $kodeIbadahBaru = "ABK-BET-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Abakris - Bethel") {
                    $kodeIbadahBaru = "ABK-BTL-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Abakris - Pniel") {
                    $kodeIbadahBaru = "ABK-PNL-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Abakris - Sion") {
                    $kodeIbadahBaru = "ABK-SION-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Abakris - Tunas Remaja") {
                    $kodeIbadahBaru = "ABK-TR-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "PRBK - Remaja") {
                    $kodeIbadahBaru = "PRBK-RMJ-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "PRBK - Pemuda") {
                    $kodeIbadahBaru = "PRBK-PMD-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "PRBK - Dewasa Muda") {
                    $kodeIbadahBaru = "PRBK-DM-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Kaum Pria") {
                    $kodeIbadahBaru = "PRIA-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Kaum Wanita") {
                    $kodeIbadahBaru = "WNTA-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Persekutuan Samaria") {
                    $kodeIbadahBaru = "P-SMR-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Persekutuan Filipi") {
                    $kodeIbadahBaru = "P-FLP-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Persekutuan Fiadelfia") {
                    $kodeIbadahBaru = "P-FIA-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Persekutuan Kana") {
                    $kodeIbadahBaru = "P-KNA-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Persekutuan Bethlehem") {
                    $kodeIbadahBaru = "P-BET-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "TPI") {
                    $kodeIbadahBaru = "TPI-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                } else if ($jenisIbadah === "Khusus") {
                    $kodeIbadahBaru = "KHU-" . $pecahkan[2] . $pecahkan[1] . $pecahkan[0];
                }
            }

            if ($username === "superadmin" || $username === "adminabakris" || $username === "adminprbk") {
                $ibadah = [
                    'kode' => $kodeIbadahBaru,
                    'nama' => $this->input->post('nama'),
                    'jenis' => $jenisIbadah,
                    'tema' => $this->input->post('tema'),
                    'tanggal' => $tanggal,
                    'jam' => $jam,
                    'link' => $this->input->post('link')
                ];
            } else {
                $ibadah = [
                    'kode' => $kodeIbadahBaru,
                    'nama' => $this->input->post('nama'),
                    'jenis' => $this->input->post('jenis'),
                    'tema' => $this->input->post('tema'),
                    'tanggal' => $tanggal,
                    'jam' => $jam,
                    'link' => $this->input->post('link')
                ];
            }

            $this->m_ibadah->updateIbadah($kodeIbadah, $ibadah);
            $this->session->set_tempdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Berhasil mengubah data ibadah</small><i class="fa fa-check my-auto"></i></div>', 1);
            redirect('Admin/detailIbadah/' . $kodeIbadahBaru);
        }
    }

    public function submitTambahKehadiran($kodeIbadah, $id)
    {
        if (_checkUser()) {
            $jemaat = $this->m_jemaat->ambilJemaatbyId($id);
            $data = [
                'id' => $id,
                'kode' => $kodeIbadah,
                'nama' => $jemaat['nama'],
                'alamat' => $jemaat['alamat']
            ];
            $this->m_kehadiran->tambahKehadiran($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Terima kasih, selamat beribadah, Tuhan Yesus memberkati :)</small><i class="fa fa-check my-auto"></i></div>');
            $this->tambahKehadiran($kodeIbadah);

            // if ($id === "none") {
            //     $id = $this->input->post('qrcode');
            //     $cek = $this->m_kehadiran->cekStatusKehadiran($id, $kodeIbadah);

            //     if (empty($cek)) {
            //         $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Data tidak ditemukan, kemungkinan Anda belum melakukan pendaftaran</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            //         $this->scanQRCodeIbadah($kodeIbadah);
            //     } else {
            //         if ($cek['status'] === "HADIR") {
            //             $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Anda sudah melakukan scan QR Code sebelumnya</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
            //             $this->scanQRCodeIbadah($kodeIbadah);
            //         }
            //         $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Terima kasih, selamat beribadah, Tuhan Yesus memberkati :)</small><i class="fa fa-check my-auto"></i></div>');
            //         $this->m_kehadiran->updateKehadiran($id, $kodeIbadah);
            //         $this->scanQRCodeIbadah($kodeIbadah);
            //     }
            // } else {
            //     $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Terima kasih, selamat beribadah, Tuhan Yesus memberkati :)</small><i class="fa fa-check my-auto"></i></div>');
            //     $this->m_kehadiran->updateKehadiran($id, $kodeIbadah);
            //     $this->jemaatTerdaftar($kodeIbadah);
            // }
        }
    }

    public function submitTambahKehadiranByQrCode($kodeIbadah)
    {
        if (_checkUser()) {
            $id = strtoupper($this->input->post('qrCode'));
            $cek = $this->m_kehadiran->cekStatusKehadiran($id, $kodeIbadah);

            if (!empty($cek)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Anda sudah hadir, tidak dapat melakukan scan QR Code kembali</small><i class="fa fa-exclamation-circle my-auto"></i></div>');
                redirect('Admin/tambahKehadiran/' . $kodeIbadah);
            } else {
                $jemaat = $this->m_jemaat->ambilJemaatbyId($id);
                $data = [
                    'id' => $id,
                    'kode' => $kodeIbadah,
                    'nama' => $jemaat['nama'],
                    'alamat' => $jemaat['alamat']
                ];
                $this->m_kehadiran->tambahKehadiran($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Terima kasih, selamat beribadah, Tuhan Yesus memberkati :)</small><i class="fa fa-check my-auto"></i></div>');
                redirect('Admin/tambahKehadiran/' . $kodeIbadah);
            }
        }
    }

    public function tambahKehadiran($kodeIbadah)
    {
        if (_checkUser()) {
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['title'] = 'Jemaat Terdaftar di ' . $data['ibadah']['nama'] . ' - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $jemaatHadir = $this->m_kehadiran->ambilJemaatHadir($kodeIbadah);
            if (empty($jemaatHadir)) {
                $data['jemaat'] = $this->m_jemaat->daftarJemaat();
            }
            // echo var_dump($jemaatHadir); die;
            $result = array();
            foreach ($jemaatHadir as $hadir) {
                $result[] = $hadir['id'];
            }
            $hadir = "( '" . implode("', '", $result) . "' )";
            $data['jemaat'] = $this->m_kehadiran->ambilJemaatBelumHadir($hadir);
            // echo var_dump($data['jemaat']); die;

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminTambahKehadiran');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function hapusJemaatHadir($id, $kodeIbadah)
    {
        if (_checkUser()) {
            $nama = $this->m_kehadiran->cekStatusKehadiran($id, $kodeIbadah)['nama'];
            $this->m_kehadiran->hapusKehadiran($id, $kodeIbadah);
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small><b>' . $nama . '</b> berhasil dihapus dari jemaat terdaftar</small><i class="fa fa-check my-auto"></i></div>');
            $this->jemaatTerdaftar($kodeIbadah);
        }
    }

    public function tutupDaftarOnsite($kodeIbadah)
    {
        if (_checkUser()) {
            $this->m_ibadah->tutupDaftarOnsite($kodeIbadah);
            $namaIbadah = $this->m_ibadah->ambilIbadah($kodeIbadah)['nama'];
            $jenisIbadah = $this->m_ibadah->ambilIbadah($kodeIbadah)['jenis'];
            $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Pendaftaran <b>' . $namaIbadah . '</b> telah ditutup</small><i class="fa fa-check my-auto"></i></div>');
            redirect('Admin/daftarIbadah/' . $jenisIbadah);
        }
    }

    public function daftarKehadiranOnsite($kodeIbadah)
    {
        if (_checkUser()) {
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['title'] = 'Daftar Kehadiran Jemaat di ' . $data['ibadah']['namaIbadah'] . ' - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';
            $data['jemaat'] = $this->m_kehadiran->semuaKehadiran($kodeIbadah);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminDaftarKehadiranJemaat');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function tambahKehadiranOnsite($kodeIbadah)
    {
        if (_checkUser()) {
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['title'] = 'Daftar Kehadiran Jemaat di ' . $data['ibadah']['namaIbadah'] . ' - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminTambahKehadiranOnsite');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function tambahSimpatisan($kodeIbadah)
    {
        if (_checkUser()) {
            $data['category'] = 'Daftar Ibadah';
            $data['ibadah'] = $this->m_ibadah->ambilIbadah($kodeIbadah);
            $data['title'] = 'Daftar Kehadiran Jemaat di ' . $data['ibadah']['nama'] . ' - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG';

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Admin/vAdminMainHeader');
            $this->load->view('Admin/vAdminTambahSimpatisan');
            $this->load->view('Admin/vAdminMainFooter');
            $this->load->view('Templates/vFooter');
        }
    }

    public function submitTambahSimpatisan($kodeIbadah)
    {
        $nama = ucwords(strtolower($this->input->post('nama')));
        $jemaat = [
            'id' => "SIMPATISAN",
            'kode' => $kodeIbadah,
            'nama' => $nama,
            'alamat' => $this->input->post('alamat')
        ];
        $this->m_kehadiran->tambahKehadiran($jemaat);
        $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <small>Terima kasih, selamat beribadah, Tuhan Yesus memberkati :)</small><i class="fa fa-check my-auto"></i></div>');
        $this->tambahKehadiran($kodeIbadah);
    }

    public function exportExcel($kodeIbadah, $kodeIbadah2)
    {
        if (_checkUser()) {

            $kehadiran = $this->m_kehadiran->jemaatHadir($kodeIbadah);
            $kehadiran2 = $this->m_kehadiran->jemaatHadir($kodeIbadah2);
            $ketidakhadiran = $this->m_kehadiran->jemaatTidakHadir($kodeIbadah, $kodeIbadah2);
            $ibadah = $this->m_ibadah->ambilIbadah($kodeIbadah);
            // var_dump($kehadiran); die;

            require('./vendor/autoload.php');

            $reader = IOFactory::createReader('Xlsx');

            if ($kodeIbadah2 === "none") {
                $filename = "Daftar Kehadiran Jemaat di " . $ibadah['jenis'] . " - " . tgl_indo($ibadah['tanggal']);
                $spreadsheet = $reader->load('template.xlsx');
            } else {
                $filename = "Daftar Kehadiran Jemaat di Ibadah Umum " . tgl_indo($ibadah['tanggal']);
                $spreadsheet = $reader->load('templateUmum.xlsx');
            }


            $spreadsheet->getProperties()->setCreator('mariohcay')
                ->setTitle('Daftar Kehadiran Jemaat' . tgl_indo($ibadah['tanggal']));

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ];

            $spreadsheet->getActiveSheet()->getPageSetup()
                ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $spreadsheet->setActiveSheetIndex(0)->getHeaderFooter()->setOddHeader('&C&B' . $filename);
            $spreadsheet->setActiveSheetIndex(0)->getHeaderFooter()->setOddFooter('&LGIA Anambas &RHalaman &P dari &N');

            if ($kodeIbadah2 === "none") {
                $row = 3;
                foreach ($kehadiran as $data) {
                    $spreadsheet->setActiveSheetIndex(0);
                    $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 1, 1);
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $row, ($row - 2))
                        ->setCellValue('B' . $row, $data['id'])
                        ->setCellValue('C' . $row, $data['nama_jemaat'])
                        ->setCellValue('D' . $row, $data['alamat']);
                    $spreadsheet->setActiveSheetIndex(0)->getStyle('A' . $row . ':D' . $row)->applyFromArray($styleArray);
                    ++$row;
                }

                $hadir = $row - 2;
                foreach ($ketidakhadiran as $data) {
                    $spreadsheet->setActiveSheetIndex(0);
                    $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 5, 1);
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . ($row + 4), ($row - $hadir - 1))
                        ->setCellValue('B' . ($row + 4), $data['id'])
                        ->setCellValue('C' . ($row + 4), $data['nama'])
                        ->setCellValue('D' . ($row + 4), $data['alamat']);
                    $spreadsheet->setActiveSheetIndex(0)->getStyle('A' . ($row + 4) . ':D' . ($row + 4))->applyFromArray($styleArray);
                    ++$row;
                }

            } else {
                $row = 3;
                foreach ($kehadiran as $data) {
                    $spreadsheet->setActiveSheetIndex(0);
                    $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 1, 1);
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $row, ($row - 2))
                        ->setCellValue('B' . $row, $data['id'])
                        ->setCellValue('C' . $row, $data['nama_jemaat'])
                        ->setCellValue('D' . $row, $data['alamat']);
                    $spreadsheet->setActiveSheetIndex(0)->getStyle('A' . $row . ':D' . $row)->applyFromArray($styleArray);
                    ++$row;
                }

                $hadir = $row - 2;
                foreach ($kehadiran2 as $data) {
                    $spreadsheet->setActiveSheetIndex(0);
                    $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 5, 1);
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . ($row + 4), ($row - $hadir - 1))
                        ->setCellValue('B' . ($row + 4), $data['id'])
                        ->setCellValue('C' . ($row + 4), $data['nama_jemaat'])
                        ->setCellValue('D' . ($row + 4), $data['alamat']);
                    $spreadsheet->setActiveSheetIndex(0)->getStyle('A' . ($row + 4) . ':D' . ($row + 4))->applyFromArray($styleArray);
                    ++$row;
                }

                $hadir2 = $row - 2;
                foreach ($ketidakhadiran as $data) {
                    $spreadsheet->setActiveSheetIndex(0);
                    $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 9, 1);
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . ($row + 8), ($row - $hadir2 - 1))
                        ->setCellValue('B' . ($row + 8), $data['id'])
                        ->setCellValue('C' . ($row + 8), $data['nama'])
                        ->setCellValue('D' . ($row + 8), $data['alamat']);
                    $spreadsheet->setActiveSheetIndex(0)->getStyle('A' . ($row + 8) . ':D' . ($row + 8))->applyFromArray($styleArray);
                    ++$row;
                }
            }

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        }
    }
}
