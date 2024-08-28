<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Dompdf\Dompdf;
use Dompdf\Options;

class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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

        require_once 'vendor/autoload.php'; // Pastikan path ke autoload.php dari Composer
    }

    public function anak()
    {
        $nama_poli = $this->session->userdata('nama_poli');
        $rekam_medis = $this->rekammedis_model->get_rekam_medis($nama_poli);

        // Buat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $headers = [
            'A1' => 'No',
            'B1' => 'Resep',
            'C1' => 'No Rekam Medis',
            'D1' => 'Nama',
            'E1' => 'Tanggal',
            'F1' => 'Unit Pelayanan',
            'G1' => 'Jam Periksa',
            'H1' => 'Status Imunisasi',
            'I1' => 'Pemberian Vit A',
            'J1' => 'Deteksi Perkembangan Anak',
            'K1' => 'Anamnesa',
            'L1' => 'Riwayat Penyakit',
            'M1' => 'Objektif',
            'N1' => 'Pemeriksaan Fisik',
            'O1' => 'Status Gizi',
            'P1' => 'Assesment',
            'Q1' => 'Planning',
            'R1' => 'Detail Lainnya',
            'S1' => 'Dokter'
        ];
        foreach ($headers as $cell => $header) {
            $sheet->setCellValue($cell, $header);
        }

        // Tambahkan data
        $rowNumber = 2;
        foreach ($rekam_medis as $key => $rm) {
            $pdfUrl = base_url('Export/generate_pdf_anak/' . $rm['id_rekam_medis']);
            $sheet->setCellValue('A' . $rowNumber, $key + 1)
                ->setCellValue('B' . $rowNumber, 'Detail Resep') // Static text, we will add hyperlink
                ->setCellValue('C' . $rowNumber, $rm['no_rekam_medis'])
                ->setCellValue('D' . $rowNumber, $rm['nama_pasien'])
                ->setCellValue('E' . $rowNumber, $rm['tanggal_kunjungan'])
                ->setCellValue('F' . $rowNumber, $rm['nama_pelayanan'])
                ->setCellValue('G' . $rowNumber, $rm['jam_periksa'])
                ->setCellValue('H' . $rowNumber, implode("\n", [
                    'Imunisasi: ' . $rm['jenis_imunisasi'],
                    'Tanggal: ' . $rm['tgl_imunisasi']
                ]))
                ->setCellValue('I' . $rowNumber, $rm['tgl_vit_A'])
                ->setCellValue('J' . $rowNumber, implode("\n", [
                    'Motorik Kasar: ' . $rm['motoric_kasar'],
                    'Motorik Halus: ' . $rm['motoric_halus'],
                    'Gangguan Bicara: ' . $rm['gangguan_bicara'],
                    'Gangguan Sosialisasi: ' . $rm['gangguan_sosialisasi'],
                    'Pendengaran: ' . $rm['pendengaran'],
                    'Penglihatan: ' . $rm['penglihatan']
                ]))
                ->setCellValue('K' . $rowNumber, implode("\n", [
                    'Keluhan Utama: ' . $rm['keluhan_utama'],
                    'Keluhan Tambahan: ' . $rm['keluhan_tambahan']
                ]))
                ->setCellValue('L' . $rowNumber, implode("\n", [
                    'Riwayat Penyakit Sekarang: ' . $rm['riwayat_penyakit_sekarang'],
                    'Riwayat Penyakit Dahulu: ' . $rm['riwayat_penyakit_dahulu'],
                    'Riwayat Penyakit Keluarga: ' . $rm['riwayat_penyakit_keluarga'],
                    'Riwayat Alergi: ' . $rm['riwayat_alergi']
                ]))
                ->setCellValue('M' . $rowNumber, implode("\n", [
                    'Keadaan Umum: ' . $rm['keadaan_umum'],
                    'Tekanan Darah: ' . $rm['tekanan_darah'],
                    'Nadi: ' . $rm['nadi'],
                    'Suhu: ' . $rm['suhu'],
                    'RR: ' . $rm['rr'],
                    'Frekuensi Napas: ' . $rm['frekuensi_napas']
                ]))
                ->setCellValue('N' . $rowNumber, implode("\n", [
                    'Tinggi Badan: ' . $rm['tinggi_badan'],
                    'Berat Badan: ' . $rm['berat_badan'],
                    'LP: ' . $rm['lp'],
                    'IMT: ' . $rm['imt']
                ]))
                ->setCellValue('O' . $rowNumber, implode("\n", [
                    'Kepala Leher: ' . $rm['kepala_leher'],
                    'Thorax: ' . $rm['thorax'],
                    'Abdomen: ' . $rm['abdomen'],
                    'Ekstremitas: ' . $rm['ekstremitas']
                ]))
                ->setCellValue('P' . $rowNumber, implode("\n", [
                    'Diagnosa Medis: ' . $rm['diagnosa_medis'],
                    'Diagnosa Keperawatan: ' . $rm['diagnosa_keperawatan']
                ]))
                ->setCellValue('Q' . $rowNumber, implode("\n", [
                    'Rencana Pengobatan: ' . $rm['rencana_pengobatan'],
                    'Rencana Edukasi: ' . $rm['rencana_edukasi'],
                    'Rencana Diagnostik: ' . $rm['rencana_diagnostik'],
                    'Rencana Monitoring Tanggal: ' . $rm['rencana_mon_tgl'],
                    'Rencana Asuhan Keperawatan: ' . $rm['rencana_asuhan_keperawatan'],
                    'Rujuk RS: ' . $rm['rujuk_rs']
                ]))
                ->setCellValue('R' . $rowNumber, implode("\n", [
                    'Lainnya: ' . $rm['lainnya'],
                    $rm['lainnya1']
                ]))
                ->setCellValue('S' . $rowNumber, $rm['nama']);

            // Tambahkan hyperlink untuk Detail Resep
            $sheet->getCell('B' . $rowNumber)->getHyperlink()->setUrl($pdfUrl);
            $rowNumber++;
        }

        // Menambahkan border ke seluruh tabel
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'wrapText' => true
            ],
        ];
        $sheet->getStyle('A1:S' . ($rowNumber - 1))->applyFromArray($styleArray);

        // Mengatur lebar kolom secara otomatis
        foreach (range('A', 'S') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Rename worksheet
        $sheet->setTitle('Rekam Medis Poli Anak');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client's web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="RekamMedis_PoliAnak.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function generate_pdf_anak($id_rekam)
    {
        $rekam_medis = $this->rekammedis_model->get_rekammedisByid($id_rekam);

        
        $html = $this->load->view('dokter/pdf_view_anak', ['rekam_medis' => $rekam_medis], true);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Untuk mendukung PHP di dalam HTML
        $dompdf = new Dompdf($options);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Atur ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output file PDF
        $dompdf->stream('Detail_Resep_' . $id_rekam . '.pdf', array('Attachment' => 0));
        exit;
    }
    public function umum()
    {
        $nama_poli = $this->session->userdata('nama_poli');
        $rekam_medis = $this->rekammedis_model->get_rekam_medis($nama_poli);

        // Buat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $headers = [
                'A1' => 'No',
                'B1' => 'Resep',
                'C1' => 'No Rekam Medis',
                'D1' => 'Nama',
                'E1' => 'Tanggal',
                'F1' => 'Unit Pelayanan',
                'G1' => 'Jam Periksa',
                'H1' => 'Keluhan',
                'I1' => 'Riwayat Penyakit',
                'J1' => 'Pemeriksaan Fisik',
                'K1' => 'Antropometri',
                'L1' => 'Status Gizi',
                'M1' => 'Status Generalis',
                'N1' => 'Status Psikologi',
                'O1' => 'Pemeriksaan Penunjang',
                'P1' => 'Assesment',
                'Q1' => 'Planning',
                'R1' => 'Detail Lainnya',
                'S1' => 'Dokter'
            
        ];
        foreach ($headers as $cell => $header) {
            $sheet->setCellValue($cell, $header);
        }

        // Tambahkan data
        $rowNumber = 2;
        foreach ($rekam_medis as $key => $rm) {
            $pdfUrl = base_url('Export/generate_pdf_umum/' . $rm['id_rekam_medis']);
            $sheet->setCellValue('A' . $rowNumber, $key + 1)
                ->setCellValue('B' . $rowNumber, 'Detail Resep') // Static text, we will add hyperlink
                ->setCellValue('C' . $rowNumber, $rm['no_rekam_medis'])
                ->setCellValue('D' . $rowNumber, $rm['nama_pasien'])
                ->setCellValue('E' . $rowNumber, $rm['tanggal_kunjungan'])
                ->setCellValue('F' . $rowNumber, $rm['nama_pelayanan'])
                ->setCellValue('G' . $rowNumber, $rm['jam_periksa'])
                ->setCellValue('H' . $rowNumber, implode("\n", [
                    'Keluhan Utama: ' . htmlspecialchars($rm['keluhan_utama'], ENT_QUOTES, 'UTF-8'),
                    'Keluhan Tambahan: ' . htmlspecialchars($rm['keluhan_tambahan'], ENT_QUOTES, 'UTF-8'),
                    'Obat Sering Digunakan: ' . htmlspecialchars($rm['obat_sering_digunakan'], ENT_QUOTES, 'UTF-8'),
                    'Obat Sering Konsumsi: ' . htmlspecialchars($rm['obat_sering_konsumsi'], ENT_QUOTES, 'UTF-8'),
                    'Tindakan Terapi: ' . htmlspecialchars($rm['tindakan_terapi'], ENT_QUOTES, 'UTF-8')
                ]))
               ->setCellValue('I' . $rowNumber, implode("\n", [
                    'Riwayat Penyakit Sekarang: ' . htmlspecialchars($rm['riwayat_penyakit_sekarang'], ENT_QUOTES, 'UTF-8'),
                    'Riwayat Penyakit Dahulu: ' . htmlspecialchars($rm['riwayat_penyakit_dahulu'], ENT_QUOTES, 'UTF-8'),
                    'Riwayat Penyakit Keluarga: ' . htmlspecialchars($rm['riwayat_penyakit_keluarga'], ENT_QUOTES, 'UTF-8'),
                    'Riwayat Alergi: ' . htmlspecialchars($rm['riwayat_alergi'], ENT_QUOTES, 'UTF-8')
                ]))
                ->setCellValue('J' . $rowNumber, implode("\n", [
                    'Keadaan Umum: ' . htmlspecialchars($rm['keadaan_umum'], ENT_QUOTES, 'UTF-8'),
                    'Kesadaran: ' . htmlspecialchars($rm['kesadaran'], ENT_QUOTES, 'UTF-8'),
                    'Tekanan Darah: ' . htmlspecialchars($rm['tekanan_darah'], ENT_QUOTES, 'UTF-8'),
                    'Nadi: ' . htmlspecialchars($rm['nadi'], ENT_QUOTES, 'UTF-8'),
                    'Suhu: ' . htmlspecialchars($rm['suhu'], ENT_QUOTES, 'UTF-8'),
                    'Frekuensi Napas: ' . htmlspecialchars($rm['frekuensi_napas'], ENT_QUOTES, 'UTF-8')
                ]))
             
->setCellValue('K' . $rowNumber, implode("\n", [
    'Tinggi Badan: ' . htmlspecialchars($rm['tinggi_badan'], ENT_QUOTES, 'UTF-8'),
    'Berat Badan: ' . htmlspecialchars($rm['berat_badan'], ENT_QUOTES, 'UTF-8'),
    'IMT: ' . htmlspecialchars($rm['imt'], ENT_QUOTES, 'UTF-8')
]))

->setCellValue('L' . $rowNumber, $rm['total_skor'] > 2 ? 
    'Butuh penangan lebih lanjut oleh ahli gizi' : 'Gizi baik')

->setCellValue('M' . $rowNumber, implode("\n", [
    'Kepala Leher: ' . htmlspecialchars($rm['kepala_leher'], ENT_QUOTES, 'UTF-8'),
    'Thorax: ' . htmlspecialchars($rm['thorax'], ENT_QUOTES, 'UTF-8'),
    'Abdomen: ' . htmlspecialchars($rm['abdomen'], ENT_QUOTES, 'UTF-8'),
    'Ekstremitas: ' . htmlspecialchars($rm['ekstremitas'], ENT_QUOTES, 'UTF-8')
]))

->setCellValue('N' . $rowNumber, implode("\n", [
    'Status Mental: ' . htmlspecialchars($rm['status_mental'], ENT_QUOTES, 'UTF-8'),
    'Respons Emosi: ' . htmlspecialchars($rm['respons_emosi'], ENT_QUOTES, 'UTF-8'),
    'Hubungan Pasien dan Keluarga: ' . htmlspecialchars($rm['hub_pasien_keluarga'], ENT_QUOTES, 'UTF-8'),
    'Taat Ibadah: ' . htmlspecialchars($rm['taat_ibadah'], ENT_QUOTES, 'UTF-8'),
    'Bahasa: ' . htmlspecialchars($rm['bahasa'], ENT_QUOTES, 'UTF-8')
]))

->setCellValue('O' . $rowNumber, implode("\n", [
    'Lab: ' . htmlspecialchars($rm['lab'], ENT_QUOTES, 'UTF-8'),
    'Pemeriksaan Lain: ' . htmlspecialchars($rm['pemeriksaan_lain'], ENT_QUOTES, 'UTF-8')
]))

->setCellValue('P' . $rowNumber, implode("\n", [
    'Diagnosa Medis: ' . htmlspecialchars($rm['diagnosa_medis'], ENT_QUOTES, 'UTF-8'),
    'Diagnosa Keperawatan: ' . htmlspecialchars($rm['diagnosa_keperawatan'], ENT_QUOTES, 'UTF-8')
]))

->setCellValue('Q' . $rowNumber, implode("\n", [
    'Rencana Pengobatan: ' . htmlspecialchars($rm['rencana_pengobatan'], ENT_QUOTES, 'UTF-8'),
    'Rencana Edukasi: ' . htmlspecialchars($rm['rencana_edukasi'], ENT_QUOTES, 'UTF-8'),
    'Rencana Diagnostik: ' . htmlspecialchars($rm['rencana_diagnostik'], ENT_QUOTES, 'UTF-8'),
    'Rencana Monitoring Tanggal: ' . htmlspecialchars($rm['rencana_mon_tgl'], ENT_QUOTES, 'UTF-8'),
    'Rujuk RS: ' . htmlspecialchars($rm['rujuk_rs'], ENT_QUOTES, 'UTF-8')
]))

->setCellValue('R' . $rowNumber, implode("\n", [
    'Lainnya: ' . htmlspecialchars($rm['lainnya'], ENT_QUOTES, 'UTF-8'),
    htmlspecialchars($rm['lainnya1'], ENT_QUOTES, 'UTF-8')
]))
             ->setCellValue('S' . $rowNumber, $rm['nama']);

            // Tambahkan hyperlink untuk Detail Resep
            $sheet->getCell('B' . $rowNumber)->getHyperlink()->setUrl($pdfUrl);
            $rowNumber++;
        }

        // Menambahkan border ke seluruh tabel
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'wrapText' => true
            ],
        ];
        $sheet->getStyle('A1:S' . ($rowNumber - 1))->applyFromArray($styleArray);

        // Mengatur lebar kolom secara otomatis
        foreach (range('A', 'S') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Rename worksheet
        $sheet->setTitle('Rekam Medis Poli Umum');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client's web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="RekamMedis_PoliUmum.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
    public function generate_pdf_umum($id_rekam_medis)
    {
        $rekam_medis = $this->rekammedis_model->get_rekammedisByid($id_rekam_medis);

        // Load view dan ambil outputnya
        $html = $this->load->view('dokter/pdf_view_umum', ['rekam_medis' => $rekam_medis], true);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Untuk mendukung PHP di dalam HTML
        $dompdf = new Dompdf($options);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Atur ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output file PDF
        $dompdf->stream('Detail_Resep_' . $id_rekam_medis . '.pdf', array('Attachment' => 0));
        exit;
    }


public function gigi()
{
    $nama_poli = $this->session->userdata('nama_poli');
    $rekam_medis = $this->rekammedis_model->get_rekam_medis($nama_poli);

    // Buat objek Spreadsheet baru
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set header
    $headers = [
            'A1' => 'No',
            'B1' => 'Resep',
            'C1' => 'No Rekam Medis',
            'D1' => 'Nama',
            'E1' => 'Tanggal',
            'F1' => 'Unit Pelayanan',
            'G1' => 'Jam Periksa',
            'H1' => 'Anamnesa',
            'I1' => 'Riwayat Penyakit',
            'J1' => 'Tanda-Tanda Vital',
            'K1' => 'Jenis Gigi',
            'L1' => 'Detail',
            'M1' => 'Odontogram',
            'N1' => 'Pemeriksaan Penunjang',
            'O1' => 'Assesment',
            'P1' => 'Planning',
            'Q1' => 'Lainnya',
            'R1' => 'Dokter'
        
    ];
    foreach ($headers as $cell => $header) {
        $sheet->setCellValue($cell, $header);
    }

    // Tambahkan data
    $rowNumber = 2;
    foreach ($rekam_medis as $key => $rm) {
        $pdfUrl = base_url('Export/generate_pdf_gigi/' . $rm['id_rekam_medis']);
        $sheet->setCellValue('A' . $rowNumber, $key + 1)
            ->setCellValue('B' . $rowNumber, 'Detail Resep') // Static text, we will add hyperlink
            ->setCellValue('C' . $rowNumber, $rm['no_rekam_medis'])
            ->setCellValue('D' . $rowNumber, $rm['nama_pasien'])
            ->setCellValue('E' . $rowNumber, $rm['tanggal_kunjungan'])
            ->setCellValue('F' . $rowNumber, $rm['nama_pelayanan'])
            ->setCellValue('G' . $rowNumber, $rm['jam_periksa'])
            ->setCellValue('H' . $rowNumber, implode("\n", [
                'Keluhan Utama: ' . htmlspecialchars($rm['keluhan_utama'], ENT_QUOTES, 'UTF-8'),
                'Keluhan Tambahan: ' . htmlspecialchars($rm['keluhan_tambahan'], ENT_QUOTES, 'UTF-8'),
                'Obat Sering Digunakan: ' . htmlspecialchars($rm['obat_sering_digunakan'], ENT_QUOTES, 'UTF-8'),
                'Obat Sering Konsumsi: ' . htmlspecialchars($rm['obat_sering_konsumsi'], ENT_QUOTES, 'UTF-8'),
                'Tindakan Terapi: ' . htmlspecialchars($rm['tindakan_terapi'], ENT_QUOTES, 'UTF-8')
            ]))
           ->setCellValue('I' . $rowNumber, implode("\n", [
                'Riwayat Penyakit Sekarang: ' . htmlspecialchars($rm['riwayat_penyakit_sekarang'], ENT_QUOTES, 'UTF-8'),
                'Riwayat Penyakit Dahulu: ' . htmlspecialchars($rm['riwayat_penyakit_dahulu'], ENT_QUOTES, 'UTF-8'),
                'Riwayat Penyakit Keluarga: ' . htmlspecialchars($rm['riwayat_penyakit_keluarga'], ENT_QUOTES, 'UTF-8'),
                'Riwayat Alergi: ' . htmlspecialchars($rm['riwayat_alergi'], ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('J' . $rowNumber, implode("\n", [
                'Tekanan Darah: ' . htmlspecialchars($rm['tekanan_darah'], ENT_QUOTES, 'UTF-8'),
                'Nadi: ' . htmlspecialchars($rm['nadi'], ENT_QUOTES, 'UTF-8'),
                'Suhu: ' . htmlspecialchars($rm['suhu'], ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('K' . $rowNumber, htmlspecialchars($rm['odontogram'], ENT_QUOTES, 'UTF-8'))
            ->setCellValue('L' . $rowNumber, htmlspecialchars($rm['lainnya'], ENT_QUOTES, 'UTF-8'))
            ->setCellValue('M' . $rowNumber, implode("\n", [
                'Occlusi: ' . htmlspecialchars($rm['occlusi'], ENT_QUOTES, 'UTF-8'),
                'Torus Palatines: ' . htmlspecialchars($rm['torus_palatines'], ENT_QUOTES, 'UTF-8'),
                'Torus Mandibularis: ' . htmlspecialchars($rm['torus_mandibularis'], ENT_QUOTES, 'UTF-8'),
                'Palatum: ' . htmlspecialchars($rm['palatum'], ENT_QUOTES, 'UTF-8'),
                'Diasterna: ' . htmlspecialchars($rm['diasterna'], ENT_QUOTES, 'UTF-8'),
                'Gigi Anomaly: ' . htmlspecialchars($rm['gigi_anomaly'], ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('N' . $rowNumber, implode("\n", [
                'Lab: ' . htmlspecialchars($rm['lab'], ENT_QUOTES, 'UTF-8'),
                'Radiology: ' . htmlspecialchars($rm['radiology'], ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('O' . $rowNumber, htmlspecialchars($rm['diagnosa_medis'], ENT_QUOTES, 'UTF-8'))
            ->setCellValue('P' . $rowNumber, implode("\n", [
                'Rencana Pengobatan: ' . htmlspecialchars($rm['rencana_pengobatan'], ENT_QUOTES, 'UTF-8'),
                'Rencana Edukasi: ' . htmlspecialchars($rm['rencana_edukasi'], ENT_QUOTES, 'UTF-8'),
                'Rencana Diagnostik: ' . htmlspecialchars($rm['rencana_diagnostik'], ENT_QUOTES, 'UTF-8'),
                'Rencana Monitoring Tanggal: ' . htmlspecialchars($rm['rencana_mon_tgl'], ENT_QUOTES, 'UTF-8'),
                'Rujuk RS: ' . htmlspecialchars($rm['rujuk_rs'], ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('Q' . $rowNumber, htmlspecialchars($rm['lainnya1'], ENT_QUOTES, 'UTF-8'))
            ->setCellValue('R' . $rowNumber, htmlspecialchars($rm['nama'], ENT_QUOTES, 'UTF-8'));

        // Tambahkan hyperlink untuk Detail Resep
        $sheet->getCell('B' . $rowNumber)->getHyperlink()->setUrl($pdfUrl);
        $rowNumber++;
    }

    // Menambahkan border ke seluruh tabel
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_LEFT,
            'wrapText' => true
        ],
    ];
    $sheet->getStyle('A1:R' . ($rowNumber - 1))->applyFromArray($styleArray);

    // Mengatur lebar kolom secara otomatis
    foreach (range('A', 'R') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Rename worksheet
    $sheet->setTitle('Rekam Medis Poli Gigi');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client's web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="RekamMedis_PoliGigi.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
public function generate_pdf_gigi($id_rekam_medis)
{
    $rekam_medis = $this->rekammedis_model->get_rekammedisByid($id_rekam_medis);

    // Load view dan ambil outputnya
    $html = $this->load->view('dokter/pdf_view_gigi', ['rekam_medis' => $rekam_medis], true);

    // Inisialisasi Dompdf
    $options = new Options();
    $options->set('defaultFont', 'Arial');
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true); // Untuk mendukung PHP di dalam HTML
    $dompdf = new Dompdf($options);

    // Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // (Optional) Atur ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF
    $dompdf->render();

    // Output file PDF
    $dompdf->stream('Detail_Resep_' . $id_rekam_medis . '.pdf', array('Attachment' => 0));
    exit;
}
public function kiakb()
{
    // Get the current user's unit and selected service unit
    $nama_poli = $this->session->userdata('nama_poli');
    $unit_pelayanan = $this->input->post('nama_pelayanan');

    // Fetch the data from the model
    $data['rekam_medis_bumil'] = $this->rekammedis_model->get_rekam_medis_by_unit('Bumil');
    $data['rekam_medis_kb'] = $this->rekammedis_model->get_rekam_medis_by_unit('KB');

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // Worksheet KB
    $sheetKB = $spreadsheet->createSheet(0);
    $sheetKB->setTitle('KB');

    // Header for KB worksheet
    $headersKB = [
        'No',
        'Detail Resep',
        'No Rekam Medis',
        'Nama Pasien',
        'Tanggal Kunjungan',
        'Nama Pelayanan',
        'Jam Periksa',
        'Riwayat Kehamilan',
        'Anamnesa',
        'Pemeriksaan',
        'Tambahan',
        'Jenis Kontrasepsi',
        'Pelayanan',
        'Dokter'
    ];

    // Write headers to KB worksheet
    $column = 'A';
    foreach ($headersKB as $header) {
        $sheetKB->setCellValue($column . '1', $header);
        $column++;
    }

    // Add data to KB worksheet
    $rowNumberKB = 2;
    foreach ($data['rekam_medis_kb'] as $key => $rm) {
        $sheetKB->setCellValue('A' . $rowNumberKB, $key + 1)
        ->setCellValue('B' . $rowNumberKB, 'Detail Resep') // Static text, we will add hyperlink
        ->setCellValue('C' . $rowNumberKB, $rm['no_rekam_medis'])
        ->setCellValue('D' . $rowNumberKB, $rm['nama_pasien'])
        ->setCellValue('E' . $rowNumberKB, $rm['tanggal_kunjungan'])
        ->setCellValue('F' . $rowNumberKB, $rm['nama_pelayanan'])
        ->setCellValue('G' . $rowNumberKB, $rm['jam_periksa'])
        ->setCellValue('H' . $rowNumberKB, implode("\n", [
            'Jumlah Anak: ' . htmlspecialchars($rm['jumlah_anak'], ENT_QUOTES, 'UTF-8'),
            'Jumlah Anak Laki: ' . htmlspecialchars($rm['jumlah_anak_laki'], ENT_QUOTES, 'UTF-8'),
            'Jumlah Anak Perempuan: ' . htmlspecialchars($rm['jumlah_anak_perempuan'], ENT_QUOTES, 'UTF-8'),
            'Umur Anak Terkecil: ' . htmlspecialchars($rm['umur_anak_terkecil'], ENT_QUOTES, 'UTF-8'),
            'Status KB: ' . htmlspecialchars($rm['status_kb'], ENT_QUOTES, 'UTF-8'),
            'Cara KB Terakhir: ' . htmlspecialchars($rm['cara_kb_terakhir'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('I' . $rowNumberKB, implode("\n", [
            'Haid Terakhir: ' . htmlspecialchars($rm['haid_terakhir'], ENT_QUOTES, 'UTF-8'),
            'Kehamilan: ' . htmlspecialchars($rm['kehamilan'], ENT_QUOTES, 'UTF-8'),
            'Gravida: ' . htmlspecialchars($rm['gravida'], ENT_QUOTES, 'UTF-8'),
            'Partus: ' . htmlspecialchars($rm['partus'], ENT_QUOTES, 'UTF-8'),
            'Abotus: ' . htmlspecialchars($rm['abotus'], ENT_QUOTES, 'UTF-8'),
            'Menyusui: ' . htmlspecialchars($rm['menyusui'], ENT_QUOTES, 'UTF-8'),
            'Riwayat Penyakit: ' . htmlspecialchars($rm['riwayat_penyakit'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('J' . $rowNumberKB, implode("\n", [
            'Keadaan Umum: ' . htmlspecialchars($rm['keadaan_umum'], ENT_QUOTES, 'UTF-8'),
            'BB: ' . htmlspecialchars($rm['bb'], ENT_QUOTES, 'UTF-8'),
            'Tekanan Darah: ' . htmlspecialchars($rm['tekanan_darah'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('K' . $rowNumberKB, implode("\n", [
            'Dalma: ' . htmlspecialchars($rm['dalma'], ENT_QUOTES, 'UTF-8'),
            'Posisi Rahim: ' . htmlspecialchars($rm['posisi_rahim'], ENT_QUOTES, 'UTF-8'),
            'Tambahan: ' . htmlspecialchars($rm['tambahan'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('L' . $rowNumberKB, $rm['jenis_kontrasepsi'])
        ->setCellValue('M' . $rowNumberKB, implode("\n", [
            'Tgl Dilayani: ' . htmlspecialchars($rm['tgl_dilayani'], ENT_QUOTES, 'UTF-8'),
            'Tgl Pesan Kembali: ' . htmlspecialchars($rm['tgl_pesan_kembali'], ENT_QUOTES, 'UTF-8'),
            'Tgl Cabut: ' . htmlspecialchars($rm['tgl_cabut'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('N' . $rowNumberKB, $rm['nama']);
    $rowNumberKB++;
    }

    // Format KB worksheet as table
    $sheetKB->getStyle('A1:N' . ($rowNumberKB - 1))
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ]
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                ]
            ]);

    // Worksheet Bumil
    $sheetBumil = $spreadsheet->createSheet(1);
    $sheetBumil->setTitle('Bumil');

    // Header for Bumil worksheet
    $headersBumil = [
        'No',
        'Detail Resep',
        'No Rekam Medis',
        'Nama Pasien',
        'Tanggal Kunjungan',
        'Nama Pelayanan',
        'Jam Periksa',
        'Riwayat Kontrasepsi Terakhir',
        'Anamnesa',
        'Riwayat Perkawinan',
        'Riwayat Menstruasi',
        'Status Imunisasi',
        'Pemeriksaan',
        'Keluhan',
        'Status Kebidanan',
        'Status Gizi',
        'Pemeriksaan Tambahan',
        'Dokter'
    ];

    // Write headers to Bumil worksheet
    $column = 'A';
    foreach ($headersBumil as $header) {
        $sheetBumil->setCellValue($column . '1', $header);
        $column++;
    }

    // Add data to Bumil worksheet
    $rowNumberBumil = 2;
    foreach ($data['rekam_medis_bumil'] as $key => $rm) {
    $sheetBumil->setCellValue('A' . $rowNumberBumil, $key + 1)
    ->setCellValue('B' . $rowNumberBumil, 'Detail Resep') // Static text, we will add hyperlink
    ->setCellValue('C' . $rowNumberBumil, $rm['no_rekam_medis'])
    ->setCellValue('D' . $rowNumberBumil, $rm['nama_pasien'])
    ->setCellValue('E' . $rowNumberBumil, $rm['tanggal_kunjungan'])
    ->setCellValue('F' . $rowNumberBumil, $rm['nama_pelayanan'])
    ->setCellValue('G' . $rowNumberBumil, $rm['jam_periksa'])
    ->setCellValue('H' . $rowNumberBumil, implode("\n", [
        'Riwayat Kontrasepsi Terakhir: ' . htmlspecialchars($rm['riwayat_kontrasepsi_trk'], ENT_QUOTES, 'UTF-8'),
        'Hamil Ke: ' . htmlspecialchars($rm['hamilke'], ENT_QUOTES, 'UTF-8'),
        'Penolong Persalinan: ' . htmlspecialchars($rm['penolong_persalinan'], ENT_QUOTES, 'UTF-8'),
        'Cara Persalinan: ' . htmlspecialchars($rm['cara_persalinan'], ENT_QUOTES, 'UTF-8')
    ]))
    ->setCellValue('I' . $rowNumberBumil, implode("\n", [
        'Bersuami: ' . htmlspecialchars($rm['bersuami'], ENT_QUOTES, 'UTF-8'),
        'Usia Pertama Kali Kawin: ' . htmlspecialchars($rm['usia_pertama_kali_kawin'], ENT_QUOTES, 'UTF-8')
    ]))
    ->setCellValue('J' . $rowNumberBumil, implode("\n", [
        'HPHT: ' . htmlspecialchars($rm['hpht'], ENT_QUOTES, 'UTF-8'),
        'Siklus Menstruasi: ' . htmlspecialchars($rm['siklus_mens'], ENT_QUOTES, 'UTF-8'),
        'Fluor: ' . htmlspecialchars($rm['fluor'], ENT_QUOTES, 'UTF-8')
    ]))
    ->setCellValue('K' . $rowNumberBumil, $rm['imunisasi'])
    ->setCellValue('L' . $rowNumberBumil, implode("\n", [
        'Keadaan Umum: ' . htmlspecialchars($rm['keadaan_umum'], ENT_QUOTES, 'UTF-8'),
        'Tekanan Darah: ' . htmlspecialchars($rm['tekanan_darah'], ENT_QUOTES, 'UTF-8'),
        'Nadi: ' . htmlspecialchars($rm['nadi'], ENT_QUOTES, 'UTF-8'),
        'Suhu: ' . htmlspecialchars($rm['suhu'], ENT_QUOTES, 'UTF-8'),
        'Payudara: ' . htmlspecialchars($rm['payudara'], ENT_QUOTES, 'UTF-8'),
        'Frekuensi Napas: ' . htmlspecialchars($rm['frekuensi_napas'], ENT_QUOTES, 'UTF-8')
    ]))
    ->setCellValue('M' . $rowNumberBumil, implode("\n", [
        'Keluhan Utama: ' . htmlspecialchars($rm['keluhan_utama'], ENT_QUOTES, 'UTF-8'),
        'Keluhan Tambahan: ' . htmlspecialchars($rm['keluhan_lain'], ENT_QUOTES, 'UTF-8')
    ]))
    ->setCellValue('N' . $rowNumberBumil, implode("\n", [
        'Tinggi Fundus Uteri: ' . htmlspecialchars($rm['tinggi_fundus_uteri'], ENT_QUOTES, 'UTF-8'),
        'Bentuk Uterus: ' . htmlspecialchars($rm['bentuk_uterus'], ENT_QUOTES, 'UTF-8'),
        'Letak Janin: ' . htmlspecialchars($rm['letak_janin'], ENT_QUOTES, 'UTF-8'),
        'Gerak Janin: ' . htmlspecialchars($rm['gerak_janin'], ENT_QUOTES, 'UTF-8'),
        'Inspekulo: ' . htmlspecialchars($rm['inspekulo'], ENT_QUOTES, 'UTF-8'),
        'Indikasi: ' . htmlspecialchars($rm['indikasi'], ENT_QUOTES, 'UTF-8')
    ]))
    ->setCellValue('O' . $rowNumberBumil, implode("\n", [
        'Tinggi Badan: ' . htmlspecialchars($rm['tinggi_badan'], ENT_QUOTES, 'UTF-8'),
        'Berat Badan: ' . htmlspecialchars($rm['berat_badan'], ENT_QUOTES, 'UTF-8'),
        'Lingkar Lengan: ' . htmlspecialchars($rm['lingkar_lengan'], ENT_QUOTES, 'UTF-8'),
        'IMT: ' . htmlspecialchars($rm['imt'], ENT_QUOTES, 'UTF-8')
    ]))
    ->setCellValue('P' . $rowNumberBumil, implode("\n", [
        'Hb: ' . $rm['pemeriksaan_hb'],
                       'Urine: ' . $rm['pemeriksaan_urine'],
                       'Albumin: ' . $rm['pemeriksaan_albumin'],
                       'HIV: ' . $rm['pemeriksaan_hiv'],
                       'HbsAg: ' . $rm['pemeriksaan_hbsag']
    ]))
    ->setCellValue('Q' . $rowNumberBumil, $rm['nama']);
$rowNumberBumil++;
}

    // Format Bumil worksheet as table
    $sheetBumil->getStyle('A1:Q' . ($rowNumberBumil - 1))
        ->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ]);

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client's web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="RekamMedis_PoliKIA&B.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

  
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
public function generate_pdf_kiakb($id_rekam_medis)
{
    $rekam_medis = $this->rekammedis_model->get_rekammedisByid($id_rekam_medis);

    // Load view dan ambil outputnya
    $html = $this->load->view('dokter/pdf_view_kiakb', ['rekam_medis' => $rekam_medis], true);

    // Inisialisasi Dompdf
    $options = new Options();
    $options->set('defaultFont', 'Arial');
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true); // Untuk mendukung PHP di dalam HTML
    $dompdf = new Dompdf($options);

    // Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // (Optional) Atur ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF
    $dompdf->render();

    // Output file PDF
    $dompdf->stream('Detail_Resep_' . $id_rekam_medis . '.pdf', array('Attachment' => 0));
    exit;
}

public function gigirm()
{
    $nama_poli = $this->session->userdata('nama_poli');
    $rekam_medis = $this->rekammedis_model->getRekamMedisByPoli('Gigi');

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set header
    $headers = [
        'A1' => 'No',
        'B1' => 'Resep',
        'C1' => 'No Rekam Medis',
        'D1' => 'Nama',
        'E1' => 'Tanggal',
        'F1' => 'Unit Pelayanan',
        'G1' => 'Jam Periksa',
        'H1' => 'Anamnesa',
        'I1' => 'Riwayat Penyakit',
        'J1' => 'Tanda-Tanda Vital',
        'K1' => 'Jenis Gigi',
        'L1' => 'Detail',
        'M1' => 'Odontogram',
        'N1' => 'Pemeriksaan Penunjang',
        'O1' => 'Assesment',
        'P1' => 'Planning',
        'Q1' => 'Lainnya',
        'R1' => 'Dokter'
    ];
    foreach ($headers as $cell => $header) {
        $sheet->setCellValue($cell, $header);
    }

    // Tambahkan data
    $rowNumber = 2;
    foreach ($rekam_medis as $key => $rm) {
        $pdfUrl = base_url('Export/generate_pdf_gigi/' . $rm->id_rekam_medis);
        $sheet->setCellValue('A' . $rowNumber, $key + 1)
            ->setCellValue('B' . $rowNumber, 'Detail Resep') // Static text, we will add hyperlink
            ->setCellValue('C' . $rowNumber, $rm->no_rekam_medis)
            ->setCellValue('D' . $rowNumber, $rm->nama_pasien)
            ->setCellValue('E' . $rowNumber, $rm->tanggal_kunjungan)
            ->setCellValue('F' . $rowNumber, $rm->nama_pelayanan)
            ->setCellValue('G' . $rowNumber, $rm->jam_periksa)
            ->setCellValue('H' . $rowNumber, implode("\n", [
                'Keluhan Utama: ' . htmlspecialchars($rm->keluhan_utama, ENT_QUOTES, 'UTF-8'),
                'Keluhan Tambahan: ' . htmlspecialchars($rm->keluhan_tambahan, ENT_QUOTES, 'UTF-8'),
                'Obat Sering Digunakan: ' . htmlspecialchars($rm->obat_sering_digunakan, ENT_QUOTES, 'UTF-8'),
                'Obat Sering Konsumsi: ' . htmlspecialchars($rm->obat_sering_konsumsi, ENT_QUOTES, 'UTF-8'),
                'Tindakan Terapi: ' . htmlspecialchars($rm->tindakan_terapi, ENT_QUOTES, 'UTF-8')
            ]))
           ->setCellValue('I' . $rowNumber, implode("\n", [
                'Riwayat Penyakit Sekarang: ' . htmlspecialchars($rm->riwayat_penyakit_sekarang, ENT_QUOTES, 'UTF-8'),
                'Riwayat Penyakit Dahulu: ' . htmlspecialchars($rm->riwayat_penyakit_dahulu, ENT_QUOTES, 'UTF-8'),
                'Riwayat Penyakit Keluarga: ' . htmlspecialchars($rm->riwayat_penyakit_keluarga, ENT_QUOTES, 'UTF-8'),
                'Riwayat Alergi: ' . htmlspecialchars($rm->riwayat_alergi, ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('J' . $rowNumber, implode("\n", [
                'Tekanan Darah: ' . htmlspecialchars($rm->tekanan_darah, ENT_QUOTES, 'UTF-8'),
                'Nadi: ' . htmlspecialchars($rm->nadi, ENT_QUOTES, 'UTF-8'),
                'Suhu: ' . htmlspecialchars($rm->suhu, ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('K' . $rowNumber, htmlspecialchars($rm->odontogram, ENT_QUOTES, 'UTF-8'))
            ->setCellValue('L' . $rowNumber, htmlspecialchars($rm->lainnya, ENT_QUOTES, 'UTF-8'))
            ->setCellValue('M' . $rowNumber, implode("\n", [
                'Occlusi: ' . htmlspecialchars($rm->occlusi, ENT_QUOTES, 'UTF-8'),
                'Torus Palatines: ' . htmlspecialchars($rm->torus_palatines, ENT_QUOTES, 'UTF-8'),
                'Torus Mandibularis: ' . htmlspecialchars($rm->torus_mandibularis, ENT_QUOTES, 'UTF-8'),
                'Palatum: ' . htmlspecialchars($rm->palatum, ENT_QUOTES, 'UTF-8'),
                'Diasterna: ' . htmlspecialchars($rm->diasterna, ENT_QUOTES, 'UTF-8'),
                'Gigi Anomaly: ' . htmlspecialchars($rm->gigi_anomaly, ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('N' . $rowNumber, implode("\n", [
                'Lab: ' . htmlspecialchars($rm->lab, ENT_QUOTES, 'UTF-8'),
                'Radiology: ' . htmlspecialchars($rm->radiology, ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('O' . $rowNumber, htmlspecialchars($rm->diagnosa_medis, ENT_QUOTES, 'UTF-8'))
            ->setCellValue('P' . $rowNumber, implode("\n", [
                'Rencana Pengobatan: ' . htmlspecialchars($rm->rencana_pengobatan, ENT_QUOTES, 'UTF-8'),
                'Rencana Edukasi: ' . htmlspecialchars($rm->rencana_edukasi, ENT_QUOTES, 'UTF-8'),
                'Rencana Diagnostik: ' . htmlspecialchars($rm->rencana_diagnostik, ENT_QUOTES, 'UTF-8'),
                'Rencana Monitoring Tanggal: ' . htmlspecialchars($rm->rencana_mon_tgl, ENT_QUOTES, 'UTF-8'),
                'Rujuk RS: ' . htmlspecialchars($rm->rujuk_rs, ENT_QUOTES, 'UTF-8')
            ]))
            ->setCellValue('Q' . $rowNumber, htmlspecialchars($rm->lainnya1, ENT_QUOTES, 'UTF-8'))
            ->setCellValue('R' . $rowNumber, htmlspecialchars($rm->nama, ENT_QUOTES, 'UTF-8'));

        // Tambahkan hyperlink untuk Detail Resep
        $sheet->getCell('B' . $rowNumber)->getHyperlink()->setUrl($pdfUrl);
        $rowNumber++;
    }
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_LEFT,
            'wrapText' => true
        ],
    ];
    $sheet->getStyle('A1:R' . ($rowNumber - 1))->applyFromArray($styleArray);

    // Mengatur lebar kolom secara otomatis
    foreach (range('A', 'R') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Renam
    // Set the content type and filename for the download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="rekam_medis_gigi.xlsx"');
    header('Cache-Control: max-age=0');
    
    // Write the spreadsheet to the output
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
public function anakrm()
{
    $nama_poli = $this->session->userdata('nama_poli');
    $rekam_medis = $this->rekammedis_model->getRekamMedisByPoli('Anak');

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set header
    $headers = [
        'A1' => 'No',
        'B1' => 'Resep',
        'C1' => 'No Rekam Medis',
        'D1' => 'Nama',
        'E1' => 'Tanggal',
        'F1' => 'Unit Pelayanan',
        'G1' => 'Jam Periksa',
        'H1' => 'Anamnesa',
        'I1' => 'Riwayat Penyakit',
        'J1' => 'Tanda-Tanda Vital',
        'K1' => 'Jenis Gigi',
        'L1' => 'Detail',
        'M1' => 'Odontogram',
        'N1' => 'Pemeriksaan Penunjang',
        'O1' => 'Assesment',
        'P1' => 'Planning',
        'Q1' => 'Lainnya',
        'R1' => 'Dokter'
    ];
    foreach ($headers as $cell => $header) {
        $sheet->setCellValue($cell, $header);
    }

    // Tambahkan data
    $rowNumber = 2;
    foreach ($rekam_medis as $key => $rm) {
        $pdfUrl = base_url('Export/generate_pdf_anak/' . $rm->id_rekam_medis);
        $sheet->setCellValue('A' . $rowNumber, $key + 1)
            ->setCellValue('B' . $rowNumber, 'Detail Resep') // Static text, we will add hyperlink
            ->setCellValue('C' . $rowNumber, $rm->no_rekam_medis)
            ->setCellValue('D' . $rowNumber, $rm->nama_pasien)
            ->setCellValue('E' . $rowNumber, $rm->tanggal_kunjungan)
            ->setCellValue('F' . $rowNumber, $rm->nama_pelayanan)
            ->setCellValue('G' . $rowNumber, $rm->jam_periksa)
            ->setCellValue('H' . $rowNumber, implode("\n", [
                'Imunisasi: ' . $rm->jenis_imunisasi,
                'Tanggal: ' . $rm->tgl_imunisasi
            ]))
            ->setCellValue('I' . $rowNumber, $rm->tgl_vit_A)
            ->setCellValue('J' . $rowNumber, implode("\n", [
                'Motorik Kasar: ' . $rm->motoric_kasar,
                'Motorik Halus: ' . $rm->motoric_halus,
                'Gangguan Bicara: ' . $rm->gangguan_bicara,
                'Gangguan Sosialisasi: ' . $rm->gangguan_sosialisasi,
                'Pendengaran: ' . $rm->pendengaran,
                'Penglihatan: ' . $rm->penglihatan
            ]))
            ->setCellValue('K' . $rowNumber, implode("\n", [
                'Keluhan Utama: ' . $rm->keluhan_utama,
                'Keluhan Tambahan: ' . $rm->keluhan_tambahan
            ]))
            ->setCellValue('L' . $rowNumber, implode("\n", [
                'Riwayat Penyakit Sekarang: ' . $rm->riwayat_penyakit_sekarang,
                'Riwayat Penyakit Dahulu: ' . $rm->riwayat_penyakit_dahulu,
                'Riwayat Penyakit Keluarga: ' . $rm->riwayat_penyakit_keluarga,
                'Riwayat Alergi: ' . $rm->riwayat_alergi
            ]))
            ->setCellValue('M' . $rowNumber, implode("\n", [
                'Keadaan Umum: ' . $rm->keadaan_umum,
                'Tekanan Darah: ' . $rm->tekanan_darah,
                'Nadi: ' . $rm->nadi,
                'Suhu: ' . $rm->suhu,
                'RR: ' . $rm->rr,
                'Frekuensi Napas: ' . $rm->frekuensi_napas
            ]))
            ->setCellValue('N' . $rowNumber, implode("\n", [
                'Tinggi Badan: ' . $rm->tinggi_badan,
                'Berat Badan: ' . $rm->berat_badan,
                'LP: ' . $rm->lp,
                'IMT: ' . $rm->imt
            ]))
            ->setCellValue('O' . $rowNumber, implode("\n", [
                'Kepala Leher: ' . $rm->kepala_leher,
                'Thorax: ' . $rm->thorax,
                'Abdomen: ' . $rm->abdomen,
                'Ekstremitas: ' . $rm->ekstremitas
            ]))
            ->setCellValue('P' . $rowNumber, implode("\n", [
                'Diagnosa Medis: ' . $rm->diagnosa_medis,
                'Diagnosa Keperawatan: ' . $rm->diagnosa_keperawatan
            ]))
            ->setCellValue('Q' . $rowNumber, implode("\n", [
                'Rencana Pengobatan: ' . $rm->rencana_pengobatan,
                'Rencana Edukasi: ' . $rm->rencana_edukasi,
                'Rencana Diagnostik: ' . $rm->rencana_diagnostik,
                'Rencana Monitoring Tanggal: ' . $rm->rencana_mon_tgl,
                'Rencana Asuhan Keperawatan: ' . $rm->rencana_asuhan_keperawatan,
                'Rujuk RS: ' . $rm->rujuk_rs
            ]))
            ->setCellValue('R' . $rowNumber, implode("\n", [
                'Lainnya: ' . $rm->lainnya,
                $rm->lainnya1
            ]))
            ->setCellValue('S' . $rowNumber, $rm->nama);

        // Tambahkan hyperlink untuk Detail Resep
        $sheet->getCell('B' . $rowNumber)->getHyperlink()->setUrl($pdfUrl);
        $rowNumber++;
    }
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_LEFT,
            'wrapText' => true
        ],
    ];
    $sheet->getStyle('A1:S' . ($rowNumber - 1))->applyFromArray($styleArray);

    // Mengatur lebar kolom secara otomatis
    foreach (range('A', 'S') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Renam
    // Set the content type and filename for the download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="rekam_medis_Anak.xlsx"');
    header('Cache-Control: max-age=0');
    
    // Write the spreadsheet to the output
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
public function umumrm()
{
    $nama_poli = $this->session->userdata('nama_poli');
    $data['rekam_medis'] = $this->rekammedis_model->getRekamMedisPoliUmum('Umum'); 

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set header
    $headers = [
        'A1' => 'No',
        'B1' => 'Resep',
        'C1' => 'No Rekam Medis',
        'D1' => 'Nama',
        'E1' => 'Tanggal',
        'F1' => 'Unit Pelayanan',
        'G1' => 'Jam Periksa',
        'H1' => 'Keluhan',
        'I1' => 'Riwayat Penyakit',
        'J1' => 'Pemeriksaan Fisik',
        'K1' => 'Antropometri',
        'L1' => 'Status Gizi',
        'M1' => 'Status Generalis',
        'N1' => 'Status Psikologi',
        'O1' => 'Pemeriksaan Penunjang',
        'P1' => 'Assesment',
        'Q1' => 'Planning',
        'R1' => 'Detail Lainnya',
        'S1' => 'Dokter'
    
];
foreach ($headers as $cell => $header) {
    $sheet->setCellValue($cell, $header);
}

// Tambahkan data
$rowNumber = 2;
foreach ($rekam_medis as $key => $rm) {
    $pdfUrl = base_url('Export/generate_pdf_umum/' . $rm['id_rekam_medis']);
    $rowIndex = $rowNumber;

    // Set cell values
    $sheet->setCellValue('A' . $rowIndex, $key + 1)
        ->setCellValue('B' . $rowIndex, 'Detail Resep') // Static text, we will add hyperlink
        ->setCellValue('C' . $rowIndex, $rm['no_rekam_medis'])
        ->setCellValue('D' . $rowIndex, $rm['nama_pasien'])
        ->setCellValue('E' . $rowIndex, $rm['tanggal_kunjungan'])
        ->setCellValue('F' . $rowIndex, $rm['nama_pelayanan'])
        ->setCellValue('G' . $rowIndex, $rm['jam_periksa'])
        ->setCellValue('H' . $rowIndex, implode("\n", [
            'Keluhan Utama: ' . htmlspecialchars($rm['keluhan_utama'], ENT_QUOTES, 'UTF-8'),
            'Keluhan Tambahan: ' . htmlspecialchars($rm['keluhan_tambahan'], ENT_QUOTES, 'UTF-8'),
            'Obat Sering Digunakan: ' . htmlspecialchars($rm['obat_sering_digunakan'], ENT_QUOTES, 'UTF-8'),
            'Obat Sering Konsumsi: ' . htmlspecialchars($rm['obat_sering_konsumsi'], ENT_QUOTES, 'UTF-8'),
            'Tindakan Terapi: ' . htmlspecialchars($rm['tindakan_terapi'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('I' . $rowIndex, implode("\n", [
            'Riwayat Penyakit Sekarang: ' . htmlspecialchars($rm['riwayat_penyakit_sekarang'], ENT_QUOTES, 'UTF-8'),
            'Riwayat Penyakit Dahulu: ' . htmlspecialchars($rm['riwayat_penyakit_dahulu'], ENT_QUOTES, 'UTF-8'),
            'Riwayat Penyakit Keluarga: ' . htmlspecialchars($rm['riwayat_penyakit_keluarga'], ENT_QUOTES, 'UTF-8'),
            'Riwayat Alergi: ' . htmlspecialchars($rm['riwayat_alergi'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('J' . $rowIndex, implode("\n", [
            'Keadaan Umum: ' . htmlspecialchars($rm['keadaan_umum'], ENT_QUOTES, 'UTF-8'),
            'Kesadaran: ' . htmlspecialchars($rm['kesadaran'], ENT_QUOTES, 'UTF-8'),
            'Tekanan Darah: ' . htmlspecialchars($rm['tekanan_darah'], ENT_QUOTES, 'UTF-8'),
            'Nadi: ' . htmlspecialchars($rm['nadi'], ENT_QUOTES, 'UTF-8'),
            'Suhu: ' . htmlspecialchars($rm['suhu'], ENT_QUOTES, 'UTF-8'),
            'Frekuensi Napas: ' . htmlspecialchars($rm['frekuensi_napas'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('K' . $rowIndex, implode("\n", [
            'Tinggi Badan: ' . htmlspecialchars($rm['tinggi_badan'], ENT_QUOTES, 'UTF-8'),
            'Berat Badan: ' . htmlspecialchars($rm['berat_badan'], ENT_QUOTES, 'UTF-8'),
            'IMT: ' . htmlspecialchars($rm['imt'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('L' . $rowIndex, $rm['total_skor'] > 2 ? 'Butuh penangan lebih lanjut oleh ahli gizi' : 'Gizi baik')
        ->setCellValue('M' . $rowIndex, implode("\n", [
            'Kepala Leher: ' . htmlspecialchars($rm['kepala_leher'], ENT_QUOTES, 'UTF-8'),
            'Thorax: ' . htmlspecialchars($rm['thorax'], ENT_QUOTES, 'UTF-8'),
            'Abdomen: ' . htmlspecialchars($rm['abdomen'], ENT_QUOTES, 'UTF-8'),
            'Ekstremitas: ' . htmlspecialchars($rm['ekstremitas'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('N' . $rowIndex, implode("\n", [
            'Status Mental: ' . htmlspecialchars($rm['status_mental'], ENT_QUOTES, 'UTF-8'),
            'Respons Emosi: ' . htmlspecialchars($rm['respons_emosi'], ENT_QUOTES, 'UTF-8'),
            'Hubungan Pasien dan Keluarga: ' . htmlspecialchars($rm['hub_pasien_keluarga'], ENT_QUOTES, 'UTF-8'),
            'Taat Ibadah: ' . htmlspecialchars($rm['taat_ibadah'], ENT_QUOTES, 'UTF-8'),
            'Bahasa: ' . htmlspecialchars($rm['bahasa'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('O' . $rowIndex, implode("\n", [
            'Lab: ' . htmlspecialchars($rm['lab'], ENT_QUOTES, 'UTF-8'),
            'Pemeriksaan Lain: ' . htmlspecialchars($rm['pemeriksaan_lain'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('P' . $rowIndex, implode("\n", [
            'Diagnosa Medis: ' . htmlspecialchars($rm['diagnosa_medis'], ENT_QUOTES, 'UTF-8'),
            'Diagnosa Keperawatan: ' . htmlspecialchars($rm['diagnosa_keperawatan'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('Q' . $rowIndex, implode("\n", [
            'Rencana Pengobatan: ' . htmlspecialchars($rm['rencana_pengobatan'], ENT_QUOTES, 'UTF-8'),
            'Rencana Edukasi: ' . htmlspecialchars($rm['rencana_edukasi'], ENT_QUOTES, 'UTF-8'),
            'Rencana Diagnostik: ' . htmlspecialchars($rm['rencana_diagnostik'], ENT_QUOTES, 'UTF-8'),
            'Rencana Monitoring Tanggal: ' . htmlspecialchars($rm['rencana_mon_tgl'], ENT_QUOTES, 'UTF-8'),
            'Rujuk RS: ' . htmlspecialchars($rm['rujuk_rs'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('R' . $rowIndex, implode("\n", [
            'Lainnya: ' . htmlspecialchars($rm['lainnya'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($rm['lainnya1'], ENT_QUOTES, 'UTF-8')
        ]))
        ->setCellValue('S' . $rowIndex, $rm['nama']);

    // Add hyperlink for "Detail Resep"
    $sheet->getCell('B' . $rowIndex)->getHyperlink()->setUrl($pdfUrl);
    $rowNumber++;
}
    // Set the content type and filename for the download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="rekam_medis_Umum.xlsx"');
    header('Cache-Control: max-age=0');
    
    // Write the spreadsheet to the output
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
public function kunjungan() {
    $this->load->model('kunjungan_model');
    $kunjungan = $this->kunjungan_model->get_all_kunjungan();

    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // Worksheet 1: Kunjungan
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Kunjungan');

    // Set headers for worksheet 1
    $headers = ['No Rekam Medis', 'Nama', 'Tanggal', 'Status', 'No BPJS', 'Nama Pelayanan', 'Detail Tambahan'];
    $sheet->fromArray($headers, null, 'A1');

    // Populate data for worksheet 1
    $rowNumber = 2;
    foreach ($kunjungan as $k) {
        $sheet->setCellValue('A' . $rowNumber, $k['no_rekam_medis']);
        $sheet->setCellValue('B' . $rowNumber, $k['nama_pasien']);
        $sheet->setCellValue('C' . $rowNumber, $k['tanggal_kunjungan']);
        $sheet->setCellValue('D' . $rowNumber, $k['status']);
        $sheet->setCellValue('E' . $rowNumber, $k['no_bpjs']);
        $sheet->setCellValue('F' . $rowNumber, $k['nama_pelayanan']);

        $detailTambahan = '';
        if ($k['nama_pelayanan'] == 'Bumil') {
            $detailTambahan = "Nama Suami: {$k['nama_suami']}\nTanggal Lahir Suami: {$k['tanggal_lahir_suami']}\nPendidikan Suami: {$k['pendidikan_suami']}\nPekerjaan Suami: {$k['pekerjaan_suami']}\nUmur Suami: {$k['umur_suami']}";
        } elseif ($k['nama_pelayanan'] == 'Pemeriksaan Anak') {
            $detailTambahan = "Nama Ayah: {$k['nama_ayah']}\nNama Ibu: {$k['nama_ibu']}\nBerat Lahir: {$k['berat_lahir']}\nUmur Ayah: {$k['umur_ayah']}\nUmur Ibu: {$k['umur_ibu']}";
        } elseif ($k['nama_pelayanan'] == 'KB' || $k['nama_pelayanan'] == 'Kunjungan KB') {
            $detailTambahan = "Nama: {$k['nama_suami']}\nTanggal Lahir: {$k['tanggal_lahir_suami']}\nPendidikan: {$k['pendidikan_suami']}\nPekerjaan: {$k['pekerjaan_suami']}\nUmur: {$k['umur_suami']}";
        }
        $sheet->setCellValue('G' . $rowNumber, $detailTambahan);

        $rowNumber++;
    }
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_LEFT,
            'wrapText' => true
        ],
    ];
    $sheet->getStyle('A1:G' . ($rowNumber - 1))->applyFromArray($styleArray);

    // Mengatur lebar kolom secara otomatis
    foreach (range('A', 'G') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Renam
    // Create other worksheets
    $sheets = ['Umum', 'Gigi', 'KIA & KB', 'Anak'];
    foreach ($sheets as $sheetName) {
        // Fetch data for the specific poli
        $kunjungan_by_poli = $this->kunjungan_model->get_kunjungan_by_allpoli($sheetName);

        // Create new sheet
        $newSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $sheetName);
        $spreadsheet->addSheet($newSheet);

        // Set the active sheet to the newly created sheet
        $spreadsheet->setActiveSheetIndexByName($sheetName);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Kunjungan ' . $sheetName);

        // Set headers for other worksheets
        $headers = ['No', 'No Rekam Medis', 'Nama', 'Tanggal', 'Status', 'No BPJS', 'Nama Pelayanan', 'Detail Tambahan'];
        $sheet->fromArray($headers, null, 'A1');

        // Populate data for other worksheets
        $rowNumber = 2;
        $counter = 1;
        foreach ($kunjungan_by_poli as $k) {
            $sheet->setCellValue('A' . $rowNumber, $counter);
            $sheet->setCellValue('B' . $rowNumber, $k['no_rekam_medis']);
            $sheet->setCellValue('C' . $rowNumber, $k['nama_pasien']);
            $sheet->setCellValue('D' . $rowNumber, $k['tanggal_kunjungan']);
            $sheet->setCellValue('E' . $rowNumber, $k['status']);
            $sheet->setCellValue('F' . $rowNumber, $k['no_bpjs']);
            $sheet->setCellValue('G' . $rowNumber, $k['nama_pelayanan']);

            $detailTambahan = '';
            if ($k['nama_pelayanan'] == 'Bumil') {
                $detailTambahan = "Nama Suami: {$k['nama_suami']}\nTanggal Lahir Suami: {$k['tanggal_lahir_suami']}\nPendidikan Suami: {$k['pendidikan_suami']}\nPekerjaan Suami: {$k['pekerjaan_suami']}\nUmur Suami: {$k['umur_suami']}";
            } elseif ($k['nama_pelayanan'] == 'Pemeriksaan Anak') {
                $detailTambahan = "Nama Ayah: {$k['nama_ayah']}\nNama Ibu: {$k['nama_ibu']}\nBerat Lahir: {$k['berat_lahir']}\nUmur Ayah: {$k['umur_ayah']}\nUmur Ibu: {$k['umur_ibu']}";
            } elseif ($k['nama_pelayanan'] == 'KB' || $k['nama_pelayanan'] == 'Kunjungan KB') {
                $detailTambahan = "Nama: {$k['nama_suami']}\nTanggal Lahir: {$k['tanggal_lahir_suami']}\nPendidikan: {$k['pendidikan_suami']}\nPekerjaan: {$k['pekerjaan_suami']}\nUmur: {$k['umur_suami']}";
            }
            $sheet->setCellValue('H' . $rowNumber, $detailTambahan);

            $rowNumber++;
            $counter++;
        }
    }
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_LEFT,
            'wrapText' => true
        ],
    ];
    $sheet->getStyle('A1:H' . ($rowNumber - 1))->applyFromArray($styleArray);

    // Mengatur lebar kolom secara otomatis
    foreach (range('A', 'H') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Renam
    // Set the first sheet as active
    $spreadsheet->setActiveSheetIndex(0);

    // Write to file
    $writer = new Xlsx($spreadsheet);
    $filename = 'kunjungan.xlsx';
    $writer->save($filename);

    // Redirect output to a client's web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="KunjunganPuskesmas.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
public function obat()
{
    $data['obat_data'] = $this->obat_model->get();

    // Buat objek Spreadsheet baru
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set header
    $headers = [
        'A1' => 'No',
        'B1' => 'Nama Obat',
        'C1' => 'Jenis Obat',
        'D1' => 'Stok',
        'E1' => 'Expire',
    ];
    foreach ($headers as $cell => $header) {
        $sheet->setCellValue($cell, $header);
    }

    // Tambahkan data
    $rowNumber = 2; // Baris data dimulai dari baris ke-2
    foreach ($data['obat_data'] as $key => $obat) {
        $sheet->setCellValue('A' . $rowNumber, $key + 1)
            ->setCellValue('B' . $rowNumber, $obat['nama_obat'])
            ->setCellValue('C' . $rowNumber, $obat['jenis_obat'])
            ->setCellValue('D' . $rowNumber, $obat['stok'])
            ->setCellValue('E' . $rowNumber, $obat['expire']);
        $rowNumber++;
    }

    // Menambahkan border ke seluruh tabel
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_LEFT,
            'wrapText' => true
        ],
    ];
    $sheet->getStyle('A1:E' . ($rowNumber - 1))->applyFromArray($styleArray);

    // Mengatur lebar kolom secara otomatis
    foreach (range('A', 'E') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Rename worksheet
    $sheet->setTitle('Data Obat');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client's web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Data Obat.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
public function resep()
{
    $data['rekammedis'] = $this->Resep_model->ambil_data_resep();

    // Buat objek Spreadsheet baru
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set header
    $headers = [
        'A1' => 'No',
        'B1' => 'No Rekam Medis',
        'C1' => 'Nama',
        'D1' => 'Tanggal',
        'E1' => 'Umur',
        'F1' => 'Unit Pelayanan',
        'G1' => 'Nama Obat',
        'H1' => 'Jenis Obat',
        'I1' => 'Jumlah',
        'J1' => 'Keterangan Resep',
        'K1' => 'Dokter',
    ];
    foreach ($headers as $cell => $header) {
        $sheet->setCellValue($cell, $header);
    }

    // Tambahkan data
    $rowNumber = 2;
    foreach ($rekammedis as $key => $rm) {
        $sheet->setCellValue('A' . $rowNumber, $key + 1)
            ->setCellValue('B' . $rowNumber, $rm['no_rekam_medis'])
            ->setCellValue('C' . $rowNumber, $rm['nama_pasien'])
            ->setCellValue('D' . $rowNumber, $rm['tanggal_kunjungan'])
            ->setCellValue('E' . $rowNumber, $rm['umur'])
            ->setCellValue('F' . $rowNumber, $rm['nama_pelayanan'])
            ->setCellValue('G' . $rowNumber, $rm['nama_obat'])
            ->setCellValue('I' . $rowNumber,  $rm['jenis_obat'])
            ->setCellValue('J' . $rowNumber,  $rm['jumlah'])
            ->setCellValue('K' . $rowNumber, $rm['keterangan_resep'])
            ->setCellValue('L' . $rowNumber, $rm['nama']);

        // Tambahkan hyperlink untuk Detail Resep
        $rowNumber++;
    }

    // Menambahkan border ke seluruh tabel
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_LEFT,
            'wrapText' => true
        ],
    ];
    $sheet->getStyle('A1:L' . ($rowNumber - 1))->applyFromArray($styleArray);

    // Mengatur lebar kolom secara otomatis
    foreach (range('A', 'L') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Rename worksheet
    $sheet->setTitle('Resep Rekam Medis');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client's web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="RekamMedis_Resep.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}

}
