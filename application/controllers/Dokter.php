<?php
use Dompdf\Dompdf;
use Dompdf\Options;
use Pusher\Pusher;
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
		$this->load->model('pasien_model'); 
        $this->load->model('User_model');
        $this->load->model('rekammedis_model');
        $this->load->model('jadwaldokter_model');
		$this->load->model('Unitpelayanan_model');
		$this->load->model('Kunjungan_model');
		$this->load->model('Resep_model');
		$this->load->model('obat_model');
		$this->load->model('odontogram_model');
		$this->load->model('gigi_model');
        $this->load->model('anak_model');
        $this->load->model('bumil_model');
        $this->load->model('kb_model');
        $this->load->model('kunjungankb_model');
    }
    public function index() {
        $id_user = $this->session->userdata('id_user');
        
        // Pastikan id_user valid sebelum digunakan
        if ($id_user) {
            $nama_poli = $this->session->userdata('nama_poli');
            $poli= $this->Unitpelayanan_model->getByNamaPoli($nama_poli);
            $id_poli =$poli['id_poli'];
            // var_dump($id_poli['id_poli']);
            // die;
            $data['jumlah_rekam_medis_per_poli'] = $this->rekammedis_model->getJumlahRekamMedisPerPoliDokter($id_user,$id_poli);
            $data['usia_pasien_per_poli'] = $this->rekammedis_model->getUsiaPasienPerPoliForChart($id_user,$id_poli);
            $data['jumlah_pasien_per_poli'] = $this->rekammedis_model->getJumlahPasienPoliById($id_poli);
            $data['diagnosa_medis'] = $this->rekammedis_model->getDiagnosaMedis($id_user, $id_poli);

            // Ambil data kunjungan harian, mingguan, bulanan, dan tahunan
            $data['dailyVisits'] = $this->rekammedis_model->getDailyVisits($id_user,$id_poli);
            $data['weeklyVisits'] = $this->rekammedis_model->getWeeklyVisits($id_user,$id_poli);
            $data['monthlyVisits'] = $this->rekammedis_model->getMonthlyVisits($id_user,$id_poli);
            $data['yearlyVisits'] = $this->rekammedis_model->getYearlyVisits($id_user,$id_poli);

            // Load view dengan data yang telah diambil
            $this->load->view('layout/header', $data);
            $this->load->view('dokter/dashboard', $data);
            $this->load->view('layout/footer');
        } else {
			// Handle jika id_user tidak tersedia
			redirect('login'); // Sesuaikan dengan route login Anda jika diperlukan
		}
	}
	public function pasien()
	{
		// Ambil nama_poli dari session
		$nama_poli = $this->session->userdata('nama_poli');

		// Panggil model untuk mendapatkan data kunjungan sesuai nama_poli
		$data['kunjungan'] = $this->Kunjungan_model->get_data_kunjungan($nama_poli);
		if ($data['kunjungan'] === false) {
			$this->session->set_flashdata('error', 'Gagal mengambil data pasien.');
			$data['kunjungan'] = []; // Assign an empty array to prevent further errors
		}
		$this->load->view('layout/header', $data);
		$this->load->view('Dokter/vw_datapasien', $data);
	}
	
public function rekammedisdokter()
{
	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('email')])->row_array();
	$id = $data['user']['id_user'];
    $nama_poli = $this->session->userdata('nama_poli');
    $unit_pelayanan = $this->input->post('nama_pelayanan');
	$data['rekam_medis'] = $this->rekammedis_model->get_rekam_medis($nama_poli);
    $data['rekam_medis_bumil'] = $this->rekammedis_model->get_rekam_medis_by_unit('Bumil');
    $data['rekam_medis_kb'] = $this->rekammedis_model->get_rekam_medis_by_unit('KB');
    switch ($nama_poli) {
        case 'Umum':
            $this->load->view('layout/header', $data);
            $this->load->view("dokter/vw_datarekammedis", $data);
            break;
        case 'Gigi':
            $this->load->view('layout/header', $data);
            $this->load->view("dokter/vw_datagigi", $data);
            break;
            case 'KIA & KB':
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_datakiakb", $data);
                break;
        case 'Anak':
            $this->load->view('layout/header', $data);
            $this->load->view("dokter/vw_dataanak", $data);
            break;
        default:
            // Handle unknown poli
            $this->session->set_flashdata('error', 'Poli tidak dikenali');
            redirect('Dokter');
            break;
    }
}

// public function tambah_data_rekammedis()
// {
//     $this->load->helper('date');
//     $data['judul'] = "Halaman Tambah Data Rekam Medis";
    
//     $data['rekammedis'] = $this->rekammedis_model->get();
//     $data['obat'] = $this->obat_model->get();

//     $this->form_validation->set_rules('keluhan_utama', 'keluhan_utama', 'required', [
//         'required' => 'Field keluhan utama harus diisi'
//     ]);
//     $this->form_validation->set_rules('keluhan_tambahan', 'keluhan_tambahan', 'required', [
//         'required' => 'Field keluhan tambahan harus diisi'
//     ]);
//     $this->form_validation->set_rules('riwayat_penyakit_sekarang', 'riwayat_penyakit_sekarang', 'required', [
//         'required' => 'Field riwayat penyakit sekarang harus diisi'
//     ]);
//     $this->form_validation->set_rules('riwayat_penyakit_dahulu', 'riwayat_penyakit_dahulu', 'required', [
//         'required' => 'Field riwayat penyakit dahulu harus diisi'
//     ]);
//     $this->form_validation->set_rules('riwayat_penyakit_keluarga', 'riwayat_penyakit_keluarga', 'required', [
//         'required' => 'Field riwayat penyakit keluarga harus diisi'
//     ]);
//     $this->form_validation->set_rules('riwayat_alergi', 'riwayat_alergi', 'required', [
//         'required' => 'Field riwayat alergi harus diisi'
//     ]);
//     $this->form_validation->set_rules('tindakan_terapi', 'tindakan_terapi', 'required', [
//         'required' => 'Field tindakan terapi harus diisi'
//     ]);
//     $this->form_validation->set_rules('obat_sering_digunakan', 'obat_sering_digunakan', 'required', [
//         'required' => 'Field obat sering digunakan harus diisi'
//     ]);
//     $this->form_validation->set_rules('obat_sering_konsumsi', 'obat_sering_konsumsi', 'required', [
//         'required' => 'Field obat sering konsumsi harus diisi'
//     ]);
//     $this->form_validation->set_rules('keadaan_umum', 'keadaan_umum', 'required', [
//         'required' => 'Field keadaan umum harus diisi'
//     ]);

//     if ($this->form_validation->run() == false) {
//         $this->load->view('layout/header', $data);
//         $this->load->view("dokter/vw_tambah_data_rekammedis");
//     } else {
//         // Jika form telah divalidasi, lanjutkan ke proses penyimpanan data
//         $this->simpanrm();
//     }
// }

public function tambah_rekammedispasien($param='') {
    
    $this->load->library('form_validation');
    $this->load->model('obat_model');
    $this->load->model('rekammedis_model');
    $this->load->model('Resep_model');
    $this->load->model('jadwaldokter_model');
	$this->load->model('gigi_model');
    $this->load->model('odontogram_model');
    $this->load->model('anak_model');
    $this->load->model('bumil_model');
    $this->load->model('kb_model');
    $this->load->model('kunjungankb_model');
    
    // Set form validation rules
	// $this->form_validation->set_rules('id_kunjungan', 'id_kunjungan', 'required');
	// $this->form_validation->set_rules('id_user', 'id_user', 'required');
    // $this->form_validation->set_rules('tanggal_periksa', 'Tanggal Periksa', 'required');
    $this->form_validation->set_rules('jam_periksa', 'Jam Periksa', 'required');
    // $this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
    // $this->form_validation->set_rules('keluhan_tambahan', 'Keluhan Tambahan', 'required');
    // $this->form_validation->set_rules('riwayat_penyakit_sekarang', 'Riwayat Penyakit Sekarang', 'required');
    // // $this->form_validation->set_rules('riwayat_penyakit_dahulu', 'Riwayat Penyakit Dahulu', 'required');
    // $this->form_validation->set_rules('riwayat_penyakit_keluarga', 'Riwayat Penyakit Keluarga', 'required');
    // $this->form_validation->set_rules('riwayat_alergi', 'Riwayat Alergi', 'required');
    // $this->form_validation->set_rules('tindakan_terapi', 'Tindakan Terapi', 'required');
    // $this->form_validation->set_rules('obat_sering_digunakan', 'Obat Sering Digunakan', 'required');
    // $this->form_validation->set_rules('obat_sering_konsumsi', 'Obat Sering Konsumsi', 'required');
    // $this->form_validation->set_rules('keadaan_umum', 'Keadaan Umum', 'required');
    // $this->form_validation->set_rules('kesadaran', 'Kesadaran', 'required');
    // $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required|numeric');
    // $this->form_validation->set_rules('nadi', 'Nadi', 'required|numeric');
    // $this->form_validation->set_rules('suhu', 'Suhu', 'required|numeric');
    // $this->form_validation->set_rules('frekuensi_napas', 'Frekuensi Napas', 'required|numeric');
    // $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|numeric');
    // $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|numeric');
    // $this->form_validation->set_rules('imt', 'IMT', 'required|numeric');
    // $this->form_validation->set_rules('kepala_leher', 'Kepala dan Leher', 'required');
    // $this->form_validation->set_rules('thorax', 'Thorax', 'required');
    // $this->form_validation->set_rules('abdomen', 'Abdomen', 'required');
    // $this->form_validation->set_rules('ekstremitas', 'Ekstremitas', 'required');
    // $this->form_validation->set_rules('lainnya', 'Lainnya', 'required');
    // $this->form_validation->set_rules('status_mental', 'Status Mental', 'required');
    // $this->form_validation->set_rules('respons_emosi', 'Respons Emosi', 'required');
    // $this->form_validation->set_rules('hub_pasien_keluarga', 'Hubungan Pasien dan Keluarga', 'required');
    // $this->form_validation->set_rules('taat_ibadah', 'Taat Ibadah', 'required');
    // $this->form_validation->set_rules('bahasa', 'Bahasa', 'required');
    // $this->form_validation->set_rules('lab', 'Lab', 'required');
    // $this->form_validation->set_rules('pemeriksaan_lain', 'Pemeriksaan Lain', 'required');
    // $this->form_validation->set_rules('diagnosa_medis', 'Diagnosa Medis', 'required');
    // $this->form_validation->set_rules('diagnosa_keperawatan', 'Diagnosa Keperawatan', 'required');
    // $this->form_validation->set_rules('rencana_pengobatan', 'Rencana Pengobatan', 'required');
    // $this->form_validation->set_rules('rencana_edukasi', 'Rencana Edukasi', 'required');
    // $this->form_validation->set_rules('rencana_diagnostik', 'Rencana Diagnostik', 'required');
    // $this->form_validation->set_rules('lainnya1', 'Lainnya1', 'required');
    // $this->form_validation->set_rules('rujuk_rs', 'Rujuk RS', 'required');
    if ($this->form_validation->run() == false) {
        $data['title'] = 'Tambah Data Rekam Medis';
        $data['obat_list'] = $this->obat_model->get_all_obat();
        $data['dokter'] = $this->jadwaldokter_model->get_all_dokter();
        $data['odontograms'] = $this->odontogram_model->getall();
        $data['kunjungan'] = $this->Kunjungan_model->getByIdkunjungan($param);
        $nama_poli = $this->session->userdata('nama_poli');
       
        // Load view based on nama_poli
        switch ($nama_poli) {
            case 'Umum': 
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_tambah_data_umum", $data);
                break;
            case 'Gigi':
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_tambah_data_gigi", $data);
                break;
            case 'KIA & KB':
                    $nama_pelayanan = $data['kunjungan']['nama_pelayanan'];
                    if ($nama_pelayanan == 'Bumil') {
                        $this->load->view('layout/header', $data);
                        $this->load->view('dokter/vw_tambah_data_bumil', $data);
                    } elseif ($nama_pelayanan == 'KB') {
                        $data['rekammedis'] = $this->rekammedis_model->get_all_rekammedis_by_pasien($param);
                        $data['kb'] = $this->kb_model->get();
                        
                        $kb_view_exists = false;
                        
                        foreach ($data['rekammedis'] as $row) {
                            foreach ($data['kb'] as $value) {
                                if ($row['id_rekam_medis'] == $value['id_rekam_medis']) {
                                    $kb_view_exists = true;
                                    break 2; 
                                }
                            }
                        }
                        
                        $this->load->view('layout/header', $data);
                        if ($kb_view_exists) {
                            $this->load->view('dokter/vw_tambah_data_kunjungan_kb', $data);
                        } else {
                            $this->load->view('dokter/vw_tambah_data_kb', $data);
                        }
                    } elseif ($nama_pelayanan == 'Kunjungan KB') {
                        $this->load->view('layout/header', $data);
                        $this->load->view('dokter/vw_tambah_data_kunjungan_kb', $data);
                    }
                    break;
                case 'Anak':
                    $this->load->view('layout/header', $data);
                    $this->load->view("dokter/vw_tambah_data_anak", $data);
                    break;
            default:
                // Handle unknown poli
                $this->session->set_flashdata('error', 'Poli tidak dikenali');
                redirect('Dokter');
                break;
        }
    } else {
        // $id_kunjungan = $this->rekammedis_model->getKunjungan($id_kunjungan);
        $data_rekammedis = [
            'id_kunjungan' => $this->input->post('id_kunjungan'),
            'jam_periksa' => $this->input->post('jam_periksa'),
            'keluhan_utama' => $this->input->post('keluhan_utama'),
            'keluhan_tambahan' => $this->input->post('keluhan_tambahan'),
            'riwayat_penyakit_sekarang' => $this->input->post('riwayat_penyakit_sekarang'),
            // 'riwayat_penyakit_dahulu' => $this->input->post('riwayat_penyakit_dahulu'),
            'riwayat_penyakit_dahulu' => implode(", ", $this->input->post('riwayat_penyakit_dahulu')),
            'riwayat_penyakit_keluarga' => implode(", ", $this->input->post('riwayat_penyakit_keluarga')),
            // 'riwayat_penyakit_keluarga' => $this->input->post('riwayat_penyakit_keluarga'),
            'riwayat_alergi' => $this->input->post('riwayat_alergi'),
            'tindakan_terapi' => $this->input->post('tindakan_terapi'),
            'obat_sering_digunakan' => $this->input->post('obat_sering_digunakan'),
            'obat_sering_konsumsi' => $this->input->post('obat_sering_konsumsi'),
            'keadaan_umum' => $this->input->post('keadaan_umum'),
            'kesadaran' => $this->input->post('kesadaran'),
            'tekanan_darah' => $this->input->post('tekanan_darah'),
            'nadi' => $this->input->post('nadi'),
            'suhu' => $this->input->post('suhu'),
            'frekuensi_napas' => $this->input->post('frekuensi_napas'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'berat_badan' => $this->input->post('berat_badan'),
            'imt' => $this->input->post('imt'),
            'pertanyaan1' => $this->input->post('pertanyaan1'),
            'pertanyaan2' => $this->input->post('pertanyaan2'),
            'pertanyaan3' => $this->input->post('pertanyaan3'),
            'pertanyaan4' => $this->input->post('pertanyaan4'),
            'pertanyaan5' => $this->input->post('pertanyaan5'),
            'pertanyaan6' => $this->input->post('pertanyaan6'),
            'pertanyaan7' => $this->input->post('pertanyaan7'),
            'total_skor' => $this->input->post('total_skor'),
            'kepala_leher' => $this->input->post('kepala_leher'),
            'thorax' => $this->input->post('thorax'),
            'abdomen' => $this->input->post('abdomen'),
            'ekstremitas' => $this->input->post('ekstremitas'),
            'lainnya' => $this->input->post('lainnya'),
            'status_mental' => $this->input->post('status_mental'),
            'respons_emosi' => $this->input->post('respons_emosi'),
            'hub_pasien_keluarga' => $this->input->post('hub_pasien_keluarga'),
            'taat_ibadah' => $this->input->post('taat_ibadah'),
            'bahasa' => $this->input->post('bahasa'),
            'lab' => $this->input->post('lab'),
            'pemeriksaan_lain' => $this->input->post('pemeriksaan_lain'),
            'diagnosa_medis' => $this->input->post('diagnosa_medis'),
            'diagnosa_keperawatan' => $this->input->post('diagnosa_keperawatan'),
            'rencana_pengobatan' => $this->input->post('rencana_pengobatan'),
            'rencana_edukasi' => $this->input->post('rencana_edukasi'),
            'rencana_diagnostik' => $this->input->post('rencana_diagnostik'),
            'lainnya1' => $this->input->post('lainnya1'),
            'rujuk_rs' => $this->input->post('rujuk_rs'),
            'rencana_mon_tgl' => $this->input->post('rencana_mon_tgl'),
            'id_user' => $this->input->post('id_user')
        ];

        $id_rekam_medis = $this->rekammedis_model->insert($data_rekammedis);

        // Check for errors
        $db_error = $this->db->error();
        if ($db_error['code'] !== 0) {
            echo $db_error['message']; // Handle the database error
        }

        // Continue with inserting resep data
        $id_obat = $this->input->post('id_obat');
        $jumlah = $this->input->post('jumlah');
        $keterangan_resep = $this->input->post('keterangan_resep');
        
        if (!empty($id_obat)) {
            $count_id_obat = count($id_obat);
            for ($i = 0; $i < $count_id_obat; $i++) {
                // Ambil stok obat saat ini dari database
                $stok_obat = $this->obat_model->get_stok($id_obat[$i]); // asumsikan get_stok mengembalikan stok saat ini
        
                // Periksa apakah stok mencukupi
                if ($stok_obat >= $jumlah[$i]) {
                    // Jika stok mencukupi, kurangi stok dan simpan resep
                    $data_resep = [
                        'id_rekam_medis' => $id_rekam_medis,
                        'id_obat' => $id_obat[$i],
                        'jumlah' => $jumlah[$i],
                        'keterangan_resep' => $keterangan_resep[$i]
                    ];
                    $this->Resep_model->insert($data_resep);
        
                    // Kurangi stok obat di database
                    $stok_baru = $stok_obat - $jumlah[$i];
                    $this->obat_model->update_stok($id_obat[$i], $stok_baru);
                } else {
                    // Jika stok tidak mencukupi, tampilkan pesan alert
                    echo "<script>alert('Stok obat tidak mencukupi. Hanya tersisa " . $stok_obat . " unit.');</script>";
                    return; // Stop proses jika stok tidak cukup
                }
            }
        }
        if ($this->session->userdata('nama_poli') == 'Gigi') {
        
            $id_odontogram = $this->input->post('id_odontogram');
            if (!empty($id_odontogram)) {
                foreach ($id_odontogram as $odontogram_id) {
                    $data_gigi = [
                        'id_rekam_medis' => $id_rekam_medis, 
                        'id_odontogram' => $odontogram_id,
                        'occlusi' => $this->input->post('occlusi'), 
                        'torus_palatines' => $this->input->post('torus_palatines'),
                        'torus_mandibularis' => $this->input->post('torus_mandibularis'),
                        'palatum' => $this->input->post('palatum'),
                        'diasterna' => $this->input->post('diasterna'),
                        'gigi_anomaly' => $this->input->post('gigi_anomaly'),
                        'radiology' => $this->input->post('radiology')
                    ];
                    
                    $this->gigi_model->insert($data_gigi);
                }
            }
        }
        if ($this->session->userdata('nama_poli') == 'Anak') {
            $data_anak = [  
                'id_rekam_medis' => $id_rekam_medis,
                'rr' => $this->input->post('rr'),
                'lp' => $this->input->post('lp'),
                'tgl_vit_A' => $this->input->post('tgl_vit_A'),
                'tgl_imunisasi' => $this->input->post('tgl_imunisasi'),
                'jenis_imunisasi' => implode(", ", $this->input->post('jenis_imunisasi')),
                'motoric_kasar' => $this->input->post('motoric_kasar'),
                'motoric_halus' => $this->input->post('motoric_halus'),
                'gangguan_bicara' => $this->input->post('gangguan_bicara'),
                'gangguan_sosialisasi' => $this->input->post('gangguan_sosialisasi'),
                'pendengaran' => $this->input->post('pendengaran'),
                'penglihatan' => $this->input->post('penglihatan')
            ];
            $this->anak_model->insert($data_anak);
        }
        if ($this->session->userdata('nama_poli') == 'KIA & KB') {
            $nama_pelayanan=$this->input->post('nama_pelayanan');
            if($nama_pelayanan == 'Bumil'){
               
                $bumil = [  
                    'id_rekam_medis' => $id_rekam_medis,
                    'riwayat_kontrasepsi_trk' => $this->input->post('riwayat_kontrasepsi_trk'),
                    'hamilke' => $this->input->post('hamilke'),
                    'umur_anak' => $this->input->post('umur_anak'),
                    'berat_lahir' => $this->input->post('berat_lahir'),
                    'penolong_persalinan' => $this->input->post('penolong_persalinan'),
                    'cara_persalinan' => $this->input->post('cara_persalinan'),
                    'keadaan_bayi' => $this->input->post('keadaan_bayi'),
                    'komplikasi' => implode(", ", $this->input->post('komplikasi')),
                    'bersuami' => $this->input->post('bersuami'),
                    'berapa_lama' => $this->input->post('berapa_lama'),
                    'berapa_kali' => $this->input->post('berapa_kali'),
                    'usia_pertama_kali_kawin' => $this->input->post('usia_pertama_kali_kawin'),
                    'hpht' => $this->input->post('hpht'),
                    'siklus_mens' => $this->input->post('siklus_mens'),
                    'teratur' => $this->input->post('teratur'),
                    'banyak_haid' => $this->input->post('banyak_haid'),
                    'gumpalan' => $this->input->post('gumpalan'),
                    'merasa_sakit' => $this->input->post('merasa_sakit'),
                    'fluor' => $this->input->post('fluor'),
                    'imunisasi' => $this->input->post('imunisasi'),
                    'keluhan_lain' => implode(", ", $this->input->post('keluhan_lain')),
                    'kebiasaan' => implode(", ", $this->input->post('kebiasaan')),
                    'bentuk_tubuh' => $this->input->post('bentuk_tubuh'),
                    'kepala' => $this->input->post('kepala'),
                    'ekstrem' => $this->input->post('ekstrem'),
                    'tinggi_fundus_uteri' => $this->input->post('tinggi_fundus_uteri'),
                    'bentuk_uterus' => $this->input->post('bentuk_uterus'),
                    'letak_janin' => $this->input->post('letak_janin'),
                    'gerak_janin' => $this->input->post('gerak_janin'),
                    'detak_jantung_janin' => $this->input->post('detak_jantung_janin'),
                    'inspekulo' => $this->input->post('inspekulo'),
                    'pendarahan' => $this->input->post('pendarahan'),
                    'indikasi' => $this->input->post('indikasi'),
                    'lingkar_lengan' => $this->input->post('lingkar_lengan'),
                    'pemeriksaan_hb' => $this->input->post('pemeriksaan_hb'),
                    'pemeriksaan_urine' => $this->input->post('pemeriksaan_urine'),
                    'pemeriksaan_albumin' => $this->input->post('pemeriksaan_albumin'),
                    'pemeriksaan_hiv' => $this->input->post('pemeriksaan_hiv'),
                    'pemeriksaan_hbsag' => $this->input->post('pemeriksaan_hbsag'),
                    'pemeriksaan_gol_darah' => $this->input->post('pemeriksaan_gol_darah'),
                    'pemeriksaan_gula_darah' => $this->input->post('pemeriksaan_gula_darah'),
                    'jantung' => $this->input->post('jantung'),
                    'paru' => $this->input->post('paru'),
                    'payudara' => $this->input->post('payudara'),
                    'hepar' => $this->input->post('hepar'),
                    'bising_usus' => $this->input->post('bising_usus'),
                    'pembesaran' => $this->input->post('pembesaran'),
                    'superior' => $this->input->post('superior'),
                    'inferior' => $this->input->post('inferior')
                ];
                $this->bumil_model->insert($bumil);

            }elseif (empty($this->input->post('bb')) && $nama_pelayanan == 'KB') {
                //    var_dump($this->input->post('sini'));
                // die;
                $kb = [  
                    'id_rekam_medis' => $id_rekam_medis,
                    'jumlah_anak' => $this->input->post('jumlah_anak'),
                    'jumlah_anak_laki' => $this->input->post('jumlah_anak_laki'),
                    'jumlah_anak_perempuan' => $this->input->post('jumlah_anak_perempuan'),
                    'umur_anak_terkecil' => $this->input->post('umur_anak_terkecil'),
                    'status_kb' => $this->input->post('status_kb'),
                    'cara_kb_terakhir' => $this->input->post('cara_kb_terakhir'),
                    'haid_terakhir' => $this->input->post('haid_terakhir'),
                    'kehamilan' => $this->input->post('kehamilan'),
                    'gravida' => $this->input->post('gravida'),
                    'partus' => $this->input->post('partus'),
                    'abotus' => $this->input->post('abotus'),
                    'menyusui' => $this->input->post('menyusui'),
                    'riwayat_penyakit' => implode(", ", $this->input->post('riwayat_penyakit')),
                    'dalma' => implode(", ", $this->input->post('dalma')),
                    'posisi_rahim' => $this->input->post('posisi_rahim'),
                    'jenis_kontrasepsi' => $this->input->post('jenis_kontrasepsi'),
                    'tambahan' => implode(", ", $this->input->post('tambahan')),
                    'tgl_dilayani' => $this->input->post('tgl_dilayani'),
                    'tgl_pesan_kembali' => $this->input->post('tgl_pesan_kembali'),
                    'tgl_cabut' => $this->input->post('tgl_cabut')
                ];
                $this->kb_model->insert($kb);
        }   elseif ($this->input->post('bb')) {
            //    var_dump($this->input->post('id_kunjungan'));
            // die;
            $id_kunjungan=$this->input->post('id_kunjungan');
            $data['rekammedis'] = $this->rekammedis_model->get_all_rekammedis_by_pasien($id_kunjungan);
            $data['kb'] = $this->kb_model->get();
            
            $kb_view_exists = null;
            
            foreach ($data['rekammedis'] as $row) {
                foreach ($data['kb'] as $value) {
                    if ($row['id_rekam_medis'] == $value['id_rekam_medis']) {
                        $kb_view_exists= $this->kb_model->getKbBYRekamMedis($row['id_rekam_medis']);
                        break 2; 
                    }
                }
            }
            $kunjungankb = [  
                'id_kb' => $kb_view_exists['id_kb'],
                'bb' => $this->input->post('bb'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'komplikasi' => $this->input->post('komplikasi'),
                'kegagalan' => $this->input->post('kegagalan'),
                'pemeriksaan' => $this->input->post('pemeriksaan'),
                'tgl_dipesan_kembali' => $this->input->post('tgl_pesan_kembali')
            ];
            $this->kunjungankb_model->insert($kunjungankb);
    }
    }
    
			$options = [
				'cluster' => 'ap1',
				'useTLS' => true
			];
	
			$pusher = new Pusher(
				'49930d4ebde6972b527c',
				'8f4b8e768a5ce70e0e6b',
				'1833488',
				$options
			);
	
			// Data untuk dikirim ke Pusher
			$message = 'Ada Resep baru  ' . $this->input->post('id_pasien')+'Dengan No rekam Medis ' . $this->input->post('no_rekam_medis');
			$pusher->trigger('resep-obat', 'resep-event', ['message' => $message]);
	
        // Set success message and redirect
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data rekam medis berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Dokter/rekammedisdokter');
    }
}


public function tambah_rekammedis() {
    $this->load->library('form_validation');
    $this->load->model('obat_model');
    $this->load->model('rekammedis_model');
    $this->load->model('Resep_model');
    $this->load->model('jadwaldokter_model');
	$this->load->model('gigi_model');
    $this->load->model('odontogram_model');

    
    // Set form validation rules
	// $this->form_validation->set_rules('id_kunjungan', 'id_kunjungan', 'required');
	// $this->form_validation->set_rules('id_user', 'id_user', 'required');
    // $this->form_validation->set_rules('tanggal_periksa', 'Tanggal Periksa', 'required');
    // $this->form_validation->set_rules('jam_periksa', 'Jam Periksa', 'required');
    $this->form_validation->set_rules('keluhan_utama', 'Keluhan Utama', 'required');
    // $this->form_validation->set_rules('keluhan_tambahan', 'Keluhan Tambahan', 'required');
    // $this->form_validation->set_rules('riwayat_penyakit_sekarang', 'Riwayat Penyakit Sekarang', 'required');
    // $this->form_validation->set_rules('riwayat_penyakit_dahulu', 'Riwayat Penyakit Dahulu', 'required');
    // $this->form_validation->set_rules('riwayat_penyakit_keluarga', 'Riwayat Penyakit Keluarga', 'required');
    // $this->form_validation->set_rules('riwayat_alergi', 'Riwayat Alergi', 'required');
    // $this->form_validation->set_rules('tindakan_terapi', 'Tindakan Terapi', 'required');
    // $this->form_validation->set_rules('obat_sering_digunakan', 'Obat Sering Digunakan', 'required');
    // $this->form_validation->set_rules('obat_sering_konsumsi', 'Obat Sering Konsumsi', 'required');
    // $this->form_validation->set_rules('keadaan_umum', 'Keadaan Umum', 'required');
    // $this->form_validation->set_rules('kesadaran', 'Kesadaran', 'required');
    // $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'required|numeric');
    // $this->form_validation->set_rules('nadi', 'Nadi', 'required|numeric');
    // $this->form_validation->set_rules('suhu', 'Suhu', 'required|numeric');
    // $this->form_validation->set_rules('frekuensi_napas', 'Frekuensi Napas', 'required|numeric');
    // $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required|numeric');
    // $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|numeric');
    // $this->form_validation->set_rules('imt', 'IMT', 'required|numeric');
    // $this->form_validation->set_rules('kepala_leher', 'Kepala dan Leher', 'required');
    // $this->form_validation->set_rules('thorax', 'Thorax', 'required');
    // $this->form_validation->set_rules('abdomen', 'Abdomen', 'required');
    // $this->form_validation->set_rules('ekstremitas', 'Ekstremitas', 'required');
    // $this->form_validation->set_rules('lainnya', 'Lainnya', 'required');
    // $this->form_validation->set_rules('status_mental', 'Status Mental', 'required');
    // $this->form_validation->set_rules('respons_emosi', 'Respons Emosi', 'required');
    // $this->form_validation->set_rules('hub_pasien_keluarga', 'Hubungan Pasien dan Keluarga', 'required');
    // $this->form_validation->set_rules('taat_ibadah', 'Taat Ibadah', 'required');
    // $this->form_validation->set_rules('bahasa', 'Bahasa', 'required');
    // $this->form_validation->set_rules('lab', 'Lab', 'required');
    // $this->form_validation->set_rules('pemeriksaan_lain', 'Pemeriksaan Lain', 'required');
    // $this->form_validation->set_rules('diagnosa_medis', 'Diagnosa Medis', 'required');
    // $this->form_validation->set_rules('diagnosa_keperawatan', 'Diagnosa Keperawatan', 'required');
    // $this->form_validation->set_rules('rencana_pengobatan', 'Rencana Pengobatan', 'required');
    // $this->form_validation->set_rules('rencana_edukasi', 'Rencana Edukasi', 'required');
    // $this->form_validation->set_rules('rencana_diagnostik', 'Rencana Diagnostik', 'required');
    // $this->form_validation->set_rules('lainnya1', 'Lainnya1', 'required');
    // $this->form_validation->set_rules('rujuk_rs', 'Rujuk RS', 'required');

	if ($this->form_validation->run() == false) {
        $data['title'] = 'Tambah Data Rekam Medis';
        $data['obat_list'] = $this->obat_model->get_all_obat();
        $data['dokter'] = $this->jadwaldokter_model->get_all_dokter();
        $data['odontograms'] = $this->odontogram_model->getall();
        $nama_poli = $this->session->userdata('nama_poli');
        if (!isset($data['rekam_medis'])) {
            $data['rekam_medis'] = [
                'nama_pelayanan' => '', // Isi dengan nilai default atau sesuai kebutuhan
                // data lainnya jika ada...
            ];
        }
        
        // Load view sesuai dengan nama poli
        switch ($nama_poli) {
            case 'Umum':
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_tambah_data_rekammedis", $data);
                break;
            case 'Gigi':
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_tambah_data_gigi", $data);
                break;
            case 'KIA & KB':
                if ($data['rekam_medis']['nama_pelayanan'] == 'bumil') {
                    $this->load->view('layout/header', $data);
                    $this->load->view("dokter/vw_tambah_data_bumil", $data);
                } elseif ($data['rekam_medis']['nama_pelayanan'] == 'KB') {
                    $this->load->view('layout/header', $data);
                    $this->load->view("dokter/vw_tambah_data_kb", $data);
                } elseif ($data['rekam_medis']['nama_pelayanan'] == 'Kunjungan KB') {
                    $this->load->view('layout/header', $data);
                    $this->load->view("dokter/vw_tambah_data_kunjungankb", $data);
                }
                break;
            case 'Anak':
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_tambah_data_anak", $data);
                break;
            default:
                // Jika poli tidak dikenali, tampilkan pesan error
                $this->session->set_flashdata('error', 'Poli tidak dikenali');
                redirect('Dokter');
                break;
        }
    } else {
        $no_rekam_medis = $this->input->post('no_rekam_medis');
        $id_kunjungan = $this->rekammedis_model->getKunjungan($no_rekam_medis);

        $data_rekammedis = [
            'id_kunjungan' => isset($id_kunjungan) ? $id_kunjungan['id_kunjungan'] : null,
            'jam_periksa' => $this->input->post('jam_periksa'),
            'keluhan_utama' => $this->input->post('keluhan_utama'),
            'keluhan_tambahan' => $this->input->post('keluhan_tambahan'),
            'riwayat_penyakit_sekarang' => $this->input->post('riwayat_penyakit_sekarang'),
            'riwayat_penyakit_dahulu' => $this->input->post('riwayat_penyakit_dahulu'),
            'riwayat_penyakit_keluarga' => $this->input->post('riwayat_penyakit_keluarga'),
            'riwayat_alergi' => $this->input->post('riwayat_alergi'),
            'tindakan_terapi' => $this->input->post('tindakan_terapi'),
            'obat_sering_digunakan' => $this->input->post('obat_sering_digunakan'),
            'obat_sering_konsumsi' => $this->input->post('obat_sering_konsumsi'),
            'keadaan_umum' => $this->input->post('keadaan_umum'),
            'kesadaran' => $this->input->post('kesadaran'),
            'tekanan_darah' => $this->input->post('tekanan_darah'),
            'nadi' => $this->input->post('nadi'),
            'suhu' => $this->input->post('suhu'),
            'frekuensi_napas' => $this->input->post('frekuensi_napas'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'berat_badan' => $this->input->post('berat_badan'),
            'imt' => $this->input->post('imt'),
            'pertanyaan1' => $this->input->post('pertanyaan1'),
            'pertanyaan2' => $this->input->post('pertanyaan2'),
            'pertanyaan3' => $this->input->post('pertanyaan3'),
            'pertanyaan4' => $this->input->post('pertanyaan4'),
            'pertanyaan5' => $this->input->post('pertanyaan5'),
            'pertanyaan6' => $this->input->post('pertanyaan6'),
            'pertanyaan7' => $this->input->post('pertanyaan7'),
            'total_skor' => $this->input->post('total_skor'),
            'kepala_leher' => $this->input->post('kepala_leher'),
            'thorax' => $this->input->post('thorax'),
            'abdomen' => $this->input->post('abdomen'),
            'ekstremitas' => $this->input->post('ekstremitas'),
            'lainnya' => $this->input->post('lainnya'),
            'status_mental' => $this->input->post('status_mental'),
            'respons_emosi' => $this->input->post('respons_emosi'),
            'hub_pasien_keluarga' => $this->input->post('hub_pasien_keluarga'),
            'taat_ibadah' => $this->input->post('taat_ibadah'),
            'bahasa' => $this->input->post('bahasa'),
            'lab' => $this->input->post('lab'),
            'pemeriksaan_lain' => $this->input->post('pemeriksaan_lain'),
            'diagnosa_medis' => $this->input->post('diagnosa_medis'),
            'diagnosa_keperawatan' => $this->input->post('diagnosa_keperawatan'),
            'rencana_pengobatan' => $this->input->post('rencana_pengobatan'),
            'rencana_edukasi' => $this->input->post('rencana_edukasi'),
            'rencana_diagnostik' => $this->input->post('rencana_diagnostik'),
            'lainnya1' => $this->input->post('lainnya1'),
            'rujuk_rs' => $this->input->post('rujuk_rs'),
            'rencana_mon_tgl' => $this->input->post('rencana_mon_tgl'),
            'id_user' => $this->input->post('id_user')
        ];
       
        $id_rekam_medis = $this->rekammedis_model->insert($data_rekammedis);

        // Check for errors
        $db_error = $this->db->error();
        if ($db_error['code'] !== 0) {
            echo $db_error['message']; // Handle the database error
        }

        // Handle multiple odontogram selections if it's the Gigi section
        if ($this->session->userdata('nama_poli') == 'Gigi') {
            $id_odontograms = $this->input->post('id_odontogram');
            foreach ($id_odontograms as $id_odontogram) {
                $data_gigi = [
                    'id_rekam_medis' => $id_rekam_medis,
                    'id_odontogram' => $id_odontogram,
                    'occlusi' => $this->input->post('occlusi'),
                    'torus_palatines' => $this->input->post('torus_palatines'),
                    'torus_mandibularis' => $this->input->post('torus_mandibularis'),
                    'palatum' => $this->input->post('palatum'),
                    'diasterna' => $this->input->post('diasterna'),
                    'gigi_anomaly' => $this->input->post('gigi_anomaly'),
                    'radiology' => $this->input->post('radiology')
                ];
                $this->gigi_model->insert($data_gigi);
            }
        }
        
        // Continue with inserting resep data
        $id_obat = $this->input->post('id_obat');
        $jumlah = $this->input->post('jumlah');
        $keterangan_resep = $this->input->post('keterangan_resep');
        
        if (!empty($id_obat)) {
            $count_id_obat = count($id_obat);
            for ($i = 0; $i < $count_id_obat; $i++) {
                $data_resep = [
                    'id_rekam_medis' => $id_rekam_medis,
                    'id_obat' => $id_obat[$i],
                    'jumlah' => $jumlah[$i],
                    'keterangan_resep' => $keterangan_resep[$i]
                ];
                $insert_id = $this->Resep_model->insert($data_resep);
            }
        }
   
        // Set success message and redirect
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data rekam medis berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Dokter/rekammedisdokter');
    }
}
public function hapus_rekam_medis($id_rekam_medis) {
	// Panggil model rekammedis_model untuk menghapus data
	$this->load->model('rekammedis_model');
	$deleted_rows = $this->rekammedis_model->hapus_rekam_medis($id_rekam_medis);

	if ($deleted_rows > 0) {
		// Jika berhasil dihapus, set pesan sukses
		$this->session->set_flashdata('message', 'Data rekam medis dan resep berhasil dihapus');
	} else {
		// Jika gagal atau tidak ada data yang terhapus, set pesan error
		$this->session->set_flashdata('error', 'Gagal menghapus data rekam medis atau data tidak ditemukan');
	}

	// Redirect ke halaman rekammedisdokter atau halaman sesuai kebutuhan
	redirect('Dokter/rekammedisdokter');
}
public function hitung_skor() {
    $total_skor = 0;

    $umur = $this->input->post('umur');
    if ($umur > 17) {
        $jawaban_pertanyaan1 = $this->input->post('pertanyaan1');
        if ($jawaban_pertanyaan1 == '2') {
            $total_skor += 2; // Tidak yakin
        } elseif ($jawaban_pertanyaan1 == '1') {
            $weight_loss = $this->input->post('weight_loss');
            if ($weight_loss == '1') {
                $total_skor += 1; // 1 - 5 kg
            } elseif ($weight_loss == '2') {
                $total_skor += 2; // 6 - 10 kg
            } elseif ($weight_loss == '3') {
                $total_skor += 3; // 11 - 15 kg
            } elseif ($weight_loss == '4') {
                $total_skor += 4; // > 15 kg
            }
        }

        $jawaban_pertanyaan2 = $this->input->post('pertanyaan2');
        if ($jawaban_pertanyaan2 == '1') {
            $total_skor += 1; // Ya
        }

        // Pertanyaan 3 tidak mempengaruhi skor
        // $jawaban_pertanyaan3 = $this->input->post('pertanyaan3');
    } else {
        $jawaban_pertanyaan4 = $this->input->post('pertanyaan4');
        if ($jawaban_pertanyaan4 == '1') {
            $total_skor += 1; // Ya
        }

        $jawaban_pertanyaan5 = $this->input->post('pertanyaan5');
        if ($jawaban_pertanyaan5 == '1') {
            $total_skor += 1; // Ya
        }

        $jawaban_pertanyaan6 = $this->input->post('pertanyaan6');
        if ($jawaban_pertanyaan6 == '1') {
            $total_skor += 1; // Ya
        }

        // Pertanyaan 7 tidak mempengaruhi skor
        // $jawaban_pertanyaan7 = $this->input->post('pertanyaan7');
    }

    // Simpan total skor dalam variabel $total_skor
    echo $total_skor;
}


		public function simpanrm()
{
    $no_rm = $this->input->post('no_rekam_medis');
    $pasien = $this->pasien_model->get_pasien_by_no_rm($no_rm);
    $id_user = $this->session->userdata('id_user');

	if ($this->input->post('cek_umur')) {
        $umur = $this->input->post('umur');
        $data['umur'] = $this->Pasien_model->getpasien_umur($umur);
    }

    if ($pasien) {
        // Ambil id_poli dari data pasien
        $id_poli = $pasien->id_poli;
			
            $data = array(
				'id_pasien' => $pasien->id_pasien,
				'id_poli' => $id_poli,
				// 'no_rekam_medis' => $no_rm,
				'keluhan_utama' => $this->input->post('keluhan_utama'),
				'keluhan_tambahan' => $this->input->post('keluhan_tambahan'),
				'riwayat_penyakit_sekarang' => $this->input->post('riwayat_penyakit_sekarang'),
				'riwayat_penyakit_dahulu' => $this->input->post('riwayat_penyakit_dahulu'),
				'riwayat_penyakit_keluarga' => $this->input->post('riwayat_penyakit_keluarga'),
                'riwayat_alergi' => $this->input->post('riwayat_alergi'),
				'tindakan_terapi' => $this->input->post('tindakan_terapi'),
				'obat_sering_digunakan' => $this->input->post('obat_sering_digunakan'),
				'obat_sering_konsumsi' => $this->input->post('obat_sering_konsumsi'),
				'keadaan_umum' => $this->input->post('keadaan_umum'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'nadi' => $this->input->post('nadi'),
			    'suhu' => $this->input->post('suhu'),
				'frekuensi_napas' => $this->input->post('frekuensi_napas'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
				'berat_badan' => $this->input->post('berat_badan'),
				'imt' => $this->input->post('imt'),
				'pertanyaan1' => $this->input->post('pertanyaan1'),
				'pertanyaan2' => $this->input->post('pertanyaan2'),
				'pertanyaan3' => $this->input->post('pertanyaan3'),
				'pertanyaan4' => $this->input->post('pertanyaan4'),
				'pertanyaan5' => $this->input->post('pertanyaan5'),
                'pertanyaan6' => $this->input->post('pertanyaan6'),
				'pertanyaan7' => $this->input->post('pertanyaan7'),
                'total_skor' => $this->input->post('total_skor'),
				'kepala_leher' => $this->input->post('kepala_leher'),
				'thorax' => $this->input->post('thorax'),
				'abdomen' => $this->input->post('abdomen'),
				'ekstremitas' => $this->input->post('ekstremitas'),
				'lainnya' => $this->input->post('lainnya'),
				'status_mental' => $this->input->post('status_mental'),
				'respons_emosi' => $this->input->post('respons_emosi'),
                'hub_pasien_keluarga' => $this->input->post('hub_pasien_keluarga'),
				'taat_ibadah' => $this->input->post('taat_ibadah'),
				'bahasa' => $this->input->post('bahasa'),
				'lab' => $this->input->post('lab'),
				'pemeriksaan_lain' => $this->input->post('pemeriksaan_lain'),
				'diagnosa_medis' => $this->input->post('diagnosa_medis'),
				'diagnosa_keperawatan' => $this->input->post('diagnosa_keperawatan'),
				'rencana_pengobatan' => $this->input->post('rencana_pengobatan'),
                'rencana_edukasi' => $this->input->post('rencana_edukasi'),
				'rencana_diagnostik' => $this->input->post('rencana_diagnostik'),
				'rencana_mon_tgl' => $this->input->post('rencana_mon_tgl'),
				'lainnya1' => $this->input->post('lainnya1'),
				'rujuk_rs' => $this->input->post('rujuk_rs'),
		
			); 
		if ($this->rekammedis_model->insert($data)){
			$this->session->set_flashdata('success', 'Data rekam medis berhasil disimpan.');
			redirect('Dokter');
		}else{
			$this->session->set_flashdata('error', 'Gagal menyimpan data rekam medis.');
		} 
	
	} }



	public function detail_pasien($id)
    { 
        $data['kunjungan'] = $this->Kunjungan_model->getByIdkunjungan($id);
        $data['user1'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header',$data);
        $this->load->view('dokter/vw_detail_data_pasien',$data);
        $this->load->view('layout/footer',$data);
    }
	public function simpanrmgigi()
	{
		
		$no_rm = $this->input->post('no_rekam_medis');
        $pasien = $this->pasien_model->get_pasien_by_no_rm($no_rm);
		$id_user = $this->session->userdata('id_user');
		// $data['rekam_medis'] = $this->rekam_medis->get_all_rekam_medis();
		$nama = $this->input->post('nama');
		
		
		if ($pasien) {
           
            $data = array(
				'id_pasien' => $pasien->id_pasien,
				// 'no_rekam_medis' => $no_rm,
				'keluhan_utama' => $this->input->post('keluhan_utama'),
				'keluhan_tambahan' => $this->input->post('keluhan_tambahan'),
				'riwayat_penyakit_sekarang' => $this->input->post('riwayat_penyakit_sekarang'),
				'riwayat_penyakit_dahulu' => $this->input->post('riwayat_penyakit_dahulu'),
				'riwayat_penyakit_keluarga' => $this->input->post('riwayat_penyakit_keluarga'),
                'riwayat_alergi' => $this->input->post('riwayat_alergi'),
				'tindakan_terapi' => $this->input->post('tindakan_terapi'),
				'obat_sering_digunakan' => $this->input->post('obat_sering_digunakan'),
				'obat_sering_konsumsi' => $this->input->post('obat_sering_konsumsi'),
				'keadaan_umum' => $this->input->post('keadaan_umum'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				'nadi' => $this->input->post('nadi'),
			    'suhu' => $this->input->post('suhu'),
				'frekuensi_napas' => $this->input->post('frekuensi_napas'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
				'berat_badan' => $this->input->post('berat_badan'),
				'imt' => $this->input->post('imt'),
				'pertanyaan1' => $this->input->post('pertanyaan1'),
				'pertanyaan2' => $this->input->post('pertanyaan2'),
				'pertanyaan3' => $this->input->post('pertanyaan3'),
				'pertanyaan4' => $this->input->post('pertanyaan4'),
				'pertanyaan5' => $this->input->post('pertanyaan5'),
                'pertanyaan6' => $this->input->post('pertanyaan6'),
				'pertanyaan7' => $this->input->post('pertanyaan7'),
                'total_skor' => $this->input->post('total_skor'),
				'kepala_leher' => $this->input->post('kepala_leher'),
				'thorax' => $this->input->post('thorax'),
				'abdomen' => $this->input->post('abdomen'),
				'ekstremitas' => $this->input->post('ekstremitas'),
				'lainnya' => $this->input->post('lainnya'),
				'status_mental' => $this->input->post('status_mental'),
				'respons_emosi' => $this->input->post('respons_emosi'),
                'hub_pasien_keluarga' => $this->input->post('hub_pasien_keluarga'),
				'taat_ibadah' => $this->input->post('taat_ibadah'),
				'bahasa' => $this->input->post('bahasa'),
				'lab' => $this->input->post('lab'),
				'pemeriksaan_lain' => $this->input->post('pemeriksaan_lain'),
				'diagnosa_medis' => $this->input->post('diagnosa_medis'),
				'diagnosa_keperawatan' => $this->input->post('diagnosa_keperawatan'),
				'rencana_pengobatan' => $this->input->post('rencana_pengobatan'),
                'rencana_edukasi' => $this->input->post('rencana_edukasi'),
				'rencana_diagnostik' => $this->input->post('rencana_diagnostik'),
				'rencana_mon_tgl' => $this->input->post('rencana_mon_tgl'),
				'lainnya1' => $this->input->post('lainnya1'),
				'rujuk_rs' => $this->input->post('rujuk_rs'),
		
			);
		
				
            if ($this->rekammedis_model->insert($data))
				$this->session->set_flashdata('success', 'Data rekam medis berhasil disimpan.');
				redirect('Dokter');
			}else{
				$this->session->set_flashdata('error', 'Gagal menyimpan data rekam medis.');
			} 
	
		}
		// public function cek_nomor_rm() {
		// 	$no_rekam_medis = $this->input->post('no_rekam_medis');
		// 	$pasien = $this->pasien_model->cek_nomor_rm($no_rekam_medis);
		// 	if ($pasien) {
		// 		echo json_encode(['status' => 'success', 'nama_pasien' => $pasien->nama_pasien]);
		// 	} else {
		// 		echo json_encode(['status' => 'error']);
		// 	}
		// }
	// Cek nomor rekam medis
public function cek_nomor_rm() {
    $no_rekam_medis = $this->input->post('no_rekam_medis');
    $data['pasien'] = $this->pasien_model->cek_nomor_rm_db($no_rekam_medis);

    if (!empty($data['pasien'])) {
        $response = array(
            'status' => 'success',
            'nama_pasien' => $data['pasien'][0]['nama_pasien'],
            'umur' => $data['pasien'][0]['umur'],
			'id_kunjungan' => $data['pasien'][0]['id_kunjungan']
        );
    } else {
        $response = array('status' => 'failed');
    }

    echo json_encode($response);
}

	public function hitung_imt() {
		$tinggi_badan = $this->input->post('tinggi_badan');
		$berat_badan = $this->input->post('berat_badan');
	
		// Ensure all required fields are provided
		if (empty($tinggi_badan) || empty($berat_badan)) {
			echo json_encode(['error' => 'Semua bidang harus diisi.']);
			return;
		}
	
		// Convert height from centimeters to meters
		$tinggi_badan_m = $tinggi_badan / 100;
	
		// Calculate BMI
		if ($tinggi_badan_m > 0) {
			$imt = $berat_badan / ($tinggi_badan_m * $tinggi_badan_m);
			$imt = round($imt, 2); // Round to 2 decimal places
	
			echo json_encode(['imt' => $imt]);
		} else {
			echo json_encode(['error' => 'Nilai tinggi badan tidak valid']);
		}
	}	
	public function cek_umur_unitpelayanan() {
		$no_rekam_medis = $this->input->post('no_rekam_medis');
		
		if (empty($no_rekam_medis)) {
			echo json_encode(['error' => 'No rekam medis tidak boleh kosong']);
			return;
		}
		
		$this->load->model('Pasien_model');
		$pasien = $this->Pasien_model->get_pasien_by_no_rm($no_rekam_medis);
	
		if ($pasien) {
			$response = [
				'nama_pasien' => $pasien->nama_pasien,
				'umur' => $pasien->umur,
				'nama_unit_pelayanan' => $pasien->nama_unit_pelayanan
			];
			echo json_encode($response);
		} else {
			echo json_encode(['error' => 'No rekam medis tidak ditemukan']);
		}
	}
	public function cek_rekam_medis()
{
    $no_rm = $this->input->post('no_rekam_medis');
    if (empty($no_rm)) {
        echo json_encode(['error' => 'Nomor rekam medis tidak boleh kosong.']);
        return;
    }

    // Mengambil data pasien
    $pasien = $this->rekammedis_model->get_pasien_by_no_rm($no_rm);

    if ($pasien) {
        // Mengambil data unit pelayanan
        $unit_pelayanan = $this->rekammedis_model->get_unit_pelayanan_by_id($pasien->id_poli);

        // Jika unit pelayanan adalah 'Umum', tentukan tampilan form berdasarkan umur
        if ($unit_pelayanan && $unit_pelayanan->nama_unit_pelayanan == 'Umum') {
            if ($pasien->umur > 17) {
                $form = 'above-17-form';
            } else {
                $form = 'below-17-form';
            }
        } else {
            $form = 'no-form';
        }

        // Prepare the response data
        $response = [
            'nama_pasien' => $pasien->nama_pasien,
            'form' => $form
        ];
    } else {
        $response = null;
    }

    echo json_encode($response);
}

public function get_pasien_umur() {
	$no_rm = $this->input->post('no_rekam_medis');
	$pasien = $this->pasien_model->get_pasien_by_no_rm($no_rm);

	if ($pasien) {
		echo json_encode(array('umur' => $pasien['umur']));
	
	}
}
    public function detail_data_rekammedis($id)
    {
     	// Get the rekammedis data first to find the id_kunjungan
		$data['rekammedis'] = $this->rekammedis_model->getById($id);
		$data['rekam_medis1'] = $this->rekammedis_model->get_all_rekammedis_by_pasien($data['rekammedis']['id_kunjungan']);
		$data['dokter'] = $this->jadwaldokter_model->get_all_dokter();
		// Check if rekammedis data is found
		if ($data['rekammedis']) {
			// Get the kunjungan data using id_kunjungan from rekammedis
			$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_id($data['rekammedis']['id_kunjungan']);
	
			// Check if kunjungan data is found
			if ($data['kunjungan']) {
				// Get the pasien data using id_pasien from kunjungan
				$data['pasien'] = $this->pasien_model->get_pasien_by_id($data['kunjungan']['id_pasien']);
			} else {
				$data['pasien'] = null;
			}
		} else {
			$data['kunjungan'] = null;
			$data['pasien'] = null;
		}
	
		$data['dokter'] = $this->rekammedis_model->get_dokter($data['rekammedis']['id_user']);

        $this->load->view('layout/header', $data);
        $this->load->view('dokter/vw_detail_data_rekammedis', $data);
    }


    public function detail($id) {
    $data['judul'] = "Detail Data Rekam Medis";
    $data['rekammedis'] = $this->rekammedis_model->getById($id);
    $data['rekam_medis1'] = $this->rekammedis_model->get_all_rekammedis_by_pasien($data['rekammedis']['id_kunjungan']);
    $data['dokter'] = $this->jadwaldokter_model->get_all_dokter();
    // Check if rekammedis data is found
    if ($data['rekammedis']) {
        // Get the kunjungan data using id_kunjungan from rekammedis
        $data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_id($data['rekammedis']['id_kunjungan']);

        // Check if kunjungan data is found
        if ($data['kunjungan']) {
            // Get the pasien data using id_pasien from kunjungan
            $data['pasien'] = $this->pasien_model->get_pasien_by_id($data['kunjungan']['id_pasien']);
        } else {
            $data['pasien'] = null;
        }
    } else {
        $data['kunjungan'] = null;
        $data['pasien'] = null;
    }

    $data['dokter'] = $this->rekammedis_model->get_dokter($data['rekammedis']['id_user']);
  
        $this->load->view('layout/header', $data);
        $this->load->view('dokter/vw_detailrekammedis', $data);
        $this->load->view('layout/footer');
 
}

	public function update_rekam_medis($param)
{
    
    $this->form_validation->set_rules('jam_periksa', 'Jam Periksa', 'required');
    $id_rekam_medis = $param;
   
    if ($this->form_validation->run() == false) {
        $data['title'] = 'Edit Data Rekam Medis';
        $data['obat_list'] = $this->obat_model->get_all_obat();
        $data['dokter'] = $this->jadwaldokter_model->get_all_dokter();
        $data['odontograms'] = $this->odontogram_model->getall();
        $data['rekam_medis'] = $this->rekammedis_model->get_rekammedisByid($param);
        $data['resep_list'] = $this->Resep_model->getByRekamMedisId($param); 
        $nama_poli = $this->session->userdata('nama_poli');
        
        // Load view based on nama_poli
        switch ($nama_poli) {
            case 'Umum':
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_edit_data_rekammedis", $data);
                break;
            case 'Gigi':
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_edit_data_gigi", $data);
                break;
                case 'KIA & KB':
                    $nama_pelayanan = $data['rekam_medis']['nama_pelayanan'];
                    if ($nama_pelayanan == 'Bumil') {
                        $this->load->view('layout/header', $data);
                        $this->load->view('dokter/vw_edit_data_bumil', $data);
                    } elseif ($nama_pelayanan == 'KB') {
                        $data['rekammedis'] = $this->rekammedis_model->get_all_rekammedis_by_pasien($param);
                        $data['kb'] = $this->kb_model->get();
                        
                        $kb_view_exists = false;
                        
                        foreach ($data['rekammedis'] as $row) {
                            foreach ($data['kb'] as $value) {
                                if ($row['id_rekam_medis'] == $value['id_rekam_medis']) {
                                    $kb_view_exists = true;
                                    break 2; 
                                }
                            }
                        }
                        
                        $this->load->view('layout/header', $data);
                        if ($kb_view_exists) {
                            $this->load->view('dokter/vw_edit_data_kunjungan_kb', $data);
                        } else {
                            $this->load->view('dokter/vw_edit_data_kb', $data);
                        }
                    } elseif ($nama_pelayanan == 'Kunjungan KB') {
                        $this->load->view('layout/header', $data);
                        $this->load->view('dokter/vw_tambah_data_kunjungan_kb', $data);
                    }
                    break;
            case 'Anak':
                $this->load->view('layout/header', $data);
                $this->load->view("dokter/vw_edit_data_anak", $data);
                break;
            default:
                // Handle unknown poli
                $this->session->set_flashdata('error', 'Poli tidak dikenali');
                redirect('Dokter');
                break;
        }
    } else {
           
        $data_rekammedis = [
            'id_kunjungan' => $this->input->post('id_kunjungan'),
            'jam_periksa' => $this->input->post('jam_periksa'),
            'keluhan_utama' => $this->input->post('keluhan_utama'),
            'keluhan_tambahan' => $this->input->post('keluhan_tambahan'),
            'riwayat_penyakit_sekarang' => $this->input->post('riwayat_penyakit_sekarang'),
            'riwayat_penyakit_dahulu' => $this->input->post('riwayat_penyakit_dahulu'),
            'riwayat_penyakit_keluarga' => $this->input->post('riwayat_penyakit_keluarga'),
            'riwayat_alergi' => $this->input->post('riwayat_alergi'),
            'tindakan_terapi' => $this->input->post('tindakan_terapi'),
            'obat_sering_digunakan' => $this->input->post('obat_sering_digunakan'),
            'obat_sering_konsumsi' => $this->input->post('obat_sering_konsumsi'),
            'keadaan_umum' => $this->input->post('keadaan_umum'),
            'kesadaran' => $this->input->post('kesadaran'),
            'tekanan_darah' => $this->input->post('tekanan_darah'),
            'nadi' => $this->input->post('nadi'),
            'suhu' => $this->input->post('suhu'),
            'frekuensi_napas' => $this->input->post('frekuensi_napas'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'berat_badan' => $this->input->post('berat_badan'),
            'imt' => $this->input->post('imt'),
            'pertanyaan1' => $this->input->post('pertanyaan1'),
            'pertanyaan2' => $this->input->post('pertanyaan2'),
            'pertanyaan3' => $this->input->post('pertanyaan3'),
            'pertanyaan4' => $this->input->post('pertanyaan4'),
            'pertanyaan5' => $this->input->post('pertanyaan5'),
            'pertanyaan6' => $this->input->post('pertanyaan6'),
            'pertanyaan7' => $this->input->post('pertanyaan7'),
            'total_skor' => $this->input->post('total_skor'),
            'kepala_leher' => $this->input->post('kepala_leher'),
            'thorax' => $this->input->post('thorax'),
            'abdomen' => $this->input->post('abdomen'),
            'ekstremitas' => $this->input->post('ekstremitas'),
            'lainnya' => $this->input->post('lainnya'),
            'status_mental' => $this->input->post('status_mental'),
            'respons_emosi' => $this->input->post('respons_emosi'),
            'hub_pasien_keluarga' => $this->input->post('hub_pasien_keluarga'),
            'taat_ibadah' => $this->input->post('taat_ibadah'),
            'bahasa' => $this->input->post('bahasa'),
            'lab' => $this->input->post('lab'),
            'pemeriksaan_lain' => $this->input->post('pemeriksaan_lain'),
            'diagnosa_medis' => $this->input->post('diagnosa_medis'),
            'diagnosa_keperawatan' => $this->input->post('diagnosa_keperawatan'),
            'rencana_pengobatan' => $this->input->post('rencana_pengobatan'),
            'rencana_edukasi' => $this->input->post('rencana_edukasi'),
            'rencana_diagnostik' => $this->input->post('rencana_diagnostik'),
            'lainnya1' => $this->input->post('lainnya1'),
            'rujuk_rs' => $this->input->post('rujuk_rs'),
            'rencana_mon_tgl' => $this->input->post('rencana_mon_tgl'),
            'id_user' => $this->input->post('id_user')
        ];

        // Update data rekam medis
        $this->rekammedis_model->update($id_rekam_medis, $data_rekammedis);
        $db_error = $this->db->error();
        if ($db_error['code'] !== 0) {
            echo $db_error['message']; 
        }

        // Data resep obat
        $id_obat = $this->input->post('id_obat');
        $jumlah = $this->input->post('jumlah');
        $keterangan_resep = $this->input->post('keterangan_resep');
        $id_resep = $this->input->post('id_resep');

        if (!empty($id_obat)) {
            $count_id_obat = count($id_obat);
            for ($i = 0; $i < $count_id_obat; $i++) {
                $data_resep = [
                    'id_rekam_medis' => $id_rekam_medis,
                    'id_obat' => $id_obat[$i],
                    'jumlah' => $jumlah[$i],
                    'keterangan_resep' => $keterangan_resep[$i]
                ];

                if (isset($id_resep[$i]) && !empty($id_resep[$i])) {
                    // Update resep
                    $this->Resep_model->update($id_resep[$i], $data_resep);
                } else {
                    // Insert resep
                    $this->Resep_model->insert($data_resep);
                }
            }
        }
        if ($this->session->userdata('nama_poli') == 'Gigi') {
            $id_odontogram = $this->input->post('id_odontogram');
            if (!empty($id_odontogram)) {
                foreach ($id_odontogram as $id_odontogram_item) {
                    $data_gigi = [
                        'id_rekam_medis' => $id_rekam_medis,
                        'id_odontogram' => $id_odontogram_item,
                        'occlusi' => $this->input->post('occlusi'),
                        'torus_palatines' => $this->input->post('torus_palatines'),
                        'torus_mandibularis' => $this->input->post('torus_mandibularis'),
                        'palatum' => $this->input->post('palatum'),
                        'diasterna' => $this->input->post('diasterna'),
                        'gigi_anomaly' => $this->input->post('gigi_anomaly'),
                        'radiology' => $this->input->post('radiology')
                    ];
                   
                    $this->gigi_model->update($id_rekam_medis, $data_gigi); 
                }
            }
        }
        if ($this->session->userdata('nama_poli') == 'Anak') {
            $data_anak = [  
                'id_rekam_medis' => $id_rekam_medis,
                'rr' => $this->input->post('rr'),
                'lp' => $this->input->post('lp'),
                'tgl_vit_A' => $this->input->post('tgl_vit_A'),
                'tgl_imunisasi' => $this->input->post('tgl_imunisasi'),
                'jenis_imunisasi' => $this->input->post('jenis_imunisasi'),
                'motoric_kasar' => $this->input->post('motoric_kasar'),
                'motoric_halus' => $this->input->post('motoric_halus'),
                'gangguan_bicara' => $this->input->post('gangguan_bicara'),
                'gangguan_sosialisasi' => $this->input->post('gangguan_sosialisasi'),
                'pendengaran' => $this->input->post('pendengaran'),
                'penglihatan' => $this->input->post('penglihatan')
            ];
            $this->anak_model->update($id_rekam_medis, $data_anak);
        }
        if ($this->session->userdata('nama_poli') == 'KIA & KB') {
            $nama_pelayanan=$this->input->post('nama_pelayanan');
            if($nama_pelayanan == 'Bumil'){
                // var_dump($this->input->post('bentuk_tubuh'));
                // die;
                $bumil = [  
                    'id_rekam_medis' => $id_rekam_medis,
                    'riwayat_kontrasepsi_trk' => $this->input->post('riwayat_kontrasepsi_trk'),
                    'hamilke' => $this->input->post('hamilke'),
                    'umur_anak' => $this->input->post('umur_anak'),
                    'berat_lahir' => $this->input->post('berat_lahir'),
                    'penolong_persalinan' => $this->input->post('penolong_persalinan'),
                    'cara_persalinan' => $this->input->post('cara_persalinan'),
                    'keadaan_bayi' => $this->input->post('keadaan_bayi'),
                    'komplikasi' => implode(", ", $this->input->post('komplikasi')),
                    'bersuami' => $this->input->post('bersuami'),
                    'berapa_lama' => $this->input->post('berapa_lama'),
                    'berapa_kali' => $this->input->post('berapa_kali'),
                    'usia_pertama_kali_kawin' => $this->input->post('usia_pertama_kali_kawin'),
                    'hpht' => $this->input->post('hpht'),
                    'siklus_mens' => $this->input->post('siklus_mens'),
                    'teratur' => $this->input->post('teratur'),
                    'banyak_haid' => $this->input->post('banyak_haid'),
                    'gumpalan' => $this->input->post('gumpalan'),
                    'merasa_sakit' => $this->input->post('merasa_sakit'),
                    'fluor' => $this->input->post('fluor'),
                    'imunisasi' => $this->input->post('imunisasi'),
                    'keluhan_lain' => implode(", ", $this->input->post('keluhan_lain')),
                    'kebiasaan' => implode(", ", $this->input->post('kebiasaan')),
                    'bentuk_tubuh' => $this->input->post('bentuk_tubuh'),
                    'kepala' => implode(", ", $this->input->post('kepala')),
                    'kepala' => $this->input->post('kepala'),
                    'ekstrem' => $this->input->post('ekstrem'),
                    'tinggi_fundus_uteri' => $this->input->post('tinggi_fundus_uteri'),
                    'bentuk_uterus' => $this->input->post('bentuk_uterus'),
                    'letak_janin' => $this->input->post('letak_janin'),
                    'gerak_janin' => $this->input->post('gerak_janin'),
                    'detak_jantung_janin' => $this->input->post('detak_jantung_janin'),
                    'inspekulo' => $this->input->post('inspekulo'),
                    'pendarahan' => $this->input->post('pendarahan'),
                    'indikasi' => $this->input->post('indikasi'),
                    'lingkar_lengan' => $this->input->post('lingkar_lengan'),
                    'pemeriksaan_hb' => $this->input->post('pemeriksaan_hb'),
                    'pemeriksaan_urine' => $this->input->post('pemeriksaan_urine'),
                    'pemeriksaan_albumin' => $this->input->post('pemeriksaan_albumin'),
                    'pemeriksaan_hiv' => $this->input->post('pemeriksaan_hiv'),
                    'pemeriksaan_hbsag' => $this->input->post('pemeriksaan_hbsag'),
                    'pemeriksaan_gol_darah' => $this->input->post('pemeriksaan_gol_darah'),
                    'pemeriksaan_gula_darah' => $this->input->post('pemeriksaan_gula_darah'),
                    'jantung' => $this->input->post('jantung'),
                    'paru' => $this->input->post('paru'),
                    'payudara' => $this->input->post('payudara'),
                    'hepar' => $this->input->post('hepar'),
                    'bising_usus' => $this->input->post('bising_usus'),
                    'pembesaran' => $this->input->post('pembesaran'),
                    'superior' => $this->input->post('superior'),
                    'inferior' => $this->input->post('inferior')
                ];
                $this->bumil_model->update($id_rekam_medis, $bumil);

            }elseif (empty($this->input->post('bb')) && $nama_pelayanan == 'KB') {
                //    var_dump($this->input->post('sini'));
                // die;
                $kb = [  
                    'id_rekam_medis' => $id_rekam_medis,
                    'jumlah_anak' => $this->input->post('jumlah_anak'),
                    'jumlah_anak_laki' => $this->input->post('jumlah_anak_laki'),
                    'jumlah_anak_perempuan' => $this->input->post('jumlah_anak_perempuan'),
                    'umur_anak_terkecil' => $this->input->post('umur_anak_terkecil'),
                    'status_kb' => $this->input->post('status_kb'),
                    'cara_kb_terakhir' => $this->input->post('cara_kb_terakhir'),
                    'haid_terakhir' => $this->input->post('haid_terakhir'),
                    'kehamilan' => $this->input->post('kehamilan'),
                    'gravida' => $this->input->post('gravida'),
                    'partus' => $this->input->post('partus'),
                    'abotus' => $this->input->post('abotus'),
                    'menyusui' => $this->input->post('menyusui'),
                    'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
                    'dalma' => $this->input->post('dalma'),
                    'posisi_rahim' => $this->input->post('posisi_rahim'),
                    'jenis_kontrasepsi' => $this->input->post('jenis_kontrasepsi'),
                    'tambahan' => $this->input->post('tambahan'),
                  
                    
                    'tgl_pesan_kembali' => $this->input->post('tgl_pesan_kembali'),
                    'tgl_cabut' => $this->input->post('tgl_cabut')
                ];
                $this->kb_model->update($id_rekam_medis, $kb);
            }elseif ($this->input->post('bb')) {
                //    var_dump($this->input->post('id_kunjungan'));
                // die;
                $id_kunjungan=$this->input->post('id_kunjungan');
                $data['rekammedis'] = $this->rekammedis_model->get_all_rekammedis_by_pasien($id_kunjungan);
                $data['kb'] = $this->kb_model->get();
                
                $kb_view_exists = null;
                
                foreach ($data['rekammedis'] as $row) {
                    foreach ($data['kb'] as $value) {
                        if ($row['id_rekam_medis'] == $value['id_rekam_medis']) {
                            $kb_view_exists= $this->kb_model->getKbBYRekamMedis($row['id_rekam_medis']);
                            break 2; 
                        }
                    }
                }
                $kunjungankb = [  
                    'id_kb' => $kb_view_exists['id_kb'],
                    'bb' => $this->input->post('bb'),
                    'tekanan_darah' => $this->input->post('tekanan_darah'),
                    'komplikasi' => $this->input->post('komplikasi'),
                    'kegagalan' => $this->input->post('kegagalan'),
                    'pemeriksaan' => $this->input->post('pemeriksaan'),
                    'tgl_dipesan_kembali' => $this->input->post('tgl_pesan_kembali')
                ];
                $this->kunjungankb_model->update($id_rekam_medis,$kunjungankb);
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data rekam medis berhasil diperbarui!</div>');
        redirect('Dokter/rekammedisdokter');
    }
}
public function cetak_data_rekammedis($id_rekam_medis) {
    // Mendapatkan data rekam medis berdasarkan ID
    $data['rekammedis'] = $this->rekammedis_model->get_rekammedis($id_rekam_medis);
    
    // Memastikan data rekam medis ditemukan
    if (!$data['rekammedis']) {
        show_404();
    }

    // Konfigurasi untuk dompdf
    $dompdfOptions = new Options();
    $dompdfOptions->set('defaultFont', 'Arial');
    $dompdf = new Dompdf($dompdfOptions);

    // Memuat tampilan HTML
    $html = $this->load->view('dokter/vw_cetak_data_rekammedis', $data, true);

    // Memuat HTML ke dalam dompdf
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Output file PDF ke browser
    $dompdf->stream("rekam_medis_$id_rekam_medis.pdf", array("Attachment" => 0));
}
	function view_data_pasien()
        {
				 $tables = "pasien";
        $search = array('no_rekam_medis','nama_pasien','umur','tanggal_lahir', 'alamat','jenis_kelamin','pendidikan','pekerjaan','status','no_bpjs', 'unit_pelayanan','tanggal_periksa');
        $where  = null;
             $isWhere = null;
            
             header('Content-Type: application/json');
             echo $this->pasien_model->get_tables_pasien($tables,$search,$where,$isWhere);
           }


public function terima_rekam_medis($id_poli) {
    $data['judul'] = "Halaman Terima Rekam Medis";

    switch ($id_poli) {
		case 1: // umum
            $data['nama_unit_pelayanan'] = 'Umum';
            $this->load->view('dokter/vw_tambah_data_rekammedis', $data);
            break;
		case 2: // Gigi
            $data['nama_unit_pelayanan'] = 'Gigi';
            $this->load->view('dokter/vw_tambah_data_gigi', $data);
            break;
        case 3: // Bumil
            $data['nama_unit_pelayanan'] = 'Bumil';
            $this->load->view('dokter/vw_tambah_data_bumil', $data);
            break;
        case 5: // Anak
            $data['nama_unit_pelayanan'] = 'Anak';
            $this->load->view('dokter/vw_tambah_data_anak', $data);
            break;
        case 6: // KB atau Kunjungan KB
            $data['nama_unit_pelayanan'] = 'KB/Kunjungan KB';
            $this->load->view('dokter/vw_tambah_data_kb_kunjungankb', $data);
            break;
        default:
            // Handle other cases or display an error
            echo "Unit pelayanan tidak valid";
            break;
    }
}
	public function get_dokter_by_unit_pelayanan($unitPelayanan) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('role', 'dokter');
		$this->db->where('unit_pelayanan', $unitPelayanan);
		$query = $this->db->get();
		return $query->result_array();
	}


public function notifikasi_umum() {
    $data['judul'] = "Notifikasi Pasien Baru Unit Pelayanan Umum";
    $data['new_patients'] = $this->rekammedis_model->get_new_patients_umum();
    $this->load->view('dokter/vw_notifikasi_umum', $data);
}
    public function detailResep($param='')
    {
        
        $data['rekam_medis'] = $this->rekammedis_model->get_rekammedisByid($param);
        $data['rekammedis'] = $this->Resep_model->ambil_data_resepByidRekamMedis($param); 
        $this->load->view('layout/header', $data);
        $this->load->view('dokter/vw_detaildataresep', $data);
    }
  
   public function profile($param = '')
{
    // Ambil data unit pelayanan
    $data['profile'] = $this->Unitpelayanan_model->getprofile($param);

    // var_dump($data['profile']);
    // die;

    $this->load->view('layout/header', $data);
    $this->load->view('dokter/vw_profile', $data);
}
}
