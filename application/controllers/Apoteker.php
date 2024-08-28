<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->model('obat_model');
        $this->load->model('pasien_model'); 
		$this->load->model('jadwaldokter_model');
		$this->load->model('Unitpelayanan_model');
		$this->load->model('rekammedis_model');
		$this->load->model('Kunjungan_model');
		$this->load->model('Resep_model');
		$this->load->model('obat_model');
		$this->load->library('session'); 
    }
    
    
    public function index()
    {   $data['judul'] = "Halaman Dashboard Apoteker ";
		$data['total_visits'] = $this->Kunjungan_model->get_total_visits(); 
		$data['total_prescriptions'] = $this->Resep_model->get_total_prescriptions();
		$data['total_obat'] = $this->obat_model->get_total_obat();
        $data['visits_by_poli'] = $this->Kunjungan_model->get_visits_by_poli();
		$data['top_5_obat'] = $this->Resep_model->get_top_5_obat();
        $data['low_stock_obat'] = $this->Resep_model->get_low_stock_obat();
        $data['expiring_obat'] = $this->Resep_model->get_expiring_obat();
        $this->load->view('layout/headerapoteker', $data);
        $this->load->view('apoteker/Dashboard', $data);
        $this->load->view('layout/footer');
    }
    public function obat()
{
	$data['obat_data'] = $this->obat_model->get();
	$this->load->view('layout/headerapoteker', $data);
    $this->load->view('apoteker/vw_dataobat',$data);
}
public function view_data_obat()
{
    $this->load->model('obat_model');
    $tables = "tbobat";
    $search = array('nama_obat','jenis_obat', 'stok', 'expire');
    $where = null;
    $isWhere = null;

    header('Content-Type: application/json');
    echo $this->obat_model->get_tables_obat($tables, $search, $where, $isWhere);
}
public function resep()
{
	$data['rekammedis'] = $this->Resep_model->ambil_data_resep();
		$this->load->view('layout/headerapoteker', $data);
        $this->load->view('apoteker/vw_dataresep', $data);
    }

	public function rekammedis()
{
	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('email')])->row_array();
	$id = $data['user']['id_user'];
	$data['rekam_medis'] = $this->rekammedis_model->get_rekam_medis();

	$this->load->view('layout/headerapoteker', $data);
    $this->load->view('apoteker/vw_datarekammedis',$data);
}
public function view_data_rekammedis()
{
	$tables = "tbrekammedis";
    $search = array('no_rekam_medis','pasien.nama_pasien', 'nama_pelayanan','diagnosa_medis','diagnosa_keperawatan','nama_dokter');
    $where = null;
    header('Content-Type: application/json');
    echo $this->Kunjungan_model->get_tables_rekammedis($tables, $search, $where);
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
    $this->load->view('layout/headerapoteker',$data);
    $this->load->view('apoteker/vw_detail_data_rekammedis', $data);
}

public function detail($id) {
    $data['judul'] = "Detail Data Rekam Medis";
    $data['rekammedis'] = $this->rekammedis_model->getById($id);
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
        $this->load->view('layout/headerapoteker', $data);
        $this->load->view('apoteker/vw_detailrekammedis', $data);
        $this->load->view('layout/footer');
 
}
public function tambah_obat()
{
		$data['judul'] = "Halaman Tambah Data Obat";
		$data['obat'] = $this->obat_model->get();
	
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required', [
			'required' => 'Nama Obat harus diisi'
		]);
		$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required', [
			'required' => 'Jenis Obat harus diisi'
		]);
		$this->form_validation->set_rules('stok', 'Stok', 'required', [
			'required' => 'Stok harus diisi'
		]);
		$this->form_validation->set_rules('expire', 'Expire', 'required', [
			'required' => 'Expire harus diisi'
		]);
		  
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/headerapoteker', $data);
			$this->load->view("apoteker/vw_tambah_data_obat", $data);
		} else {
			$data_obat = array(
				'nama_obat' => $this->input->post('nama_obat'),
				'jenis_obat' => $this->input->post('jenis_obat'),
				'stok' => $this->input->post('stok'),
				'expire' => $this->input->post('expire'),    
			);
			$this->obat_model->insert($data_obat);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Added!</div>');
			redirect('apoteker/obat');
		}
	}
	public function edit_obat($id)
	{
		$data['judul'] = "Halaman Edit Data Obat";
		$data['obat'] = $this->obat_model->get_by_id($id);
		
		// Set validation rules
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('expire', 'Expire', 'required');
	
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/headerapoteker', $data);
			$this->load->view('apoteker/vw_edit_data_obat', $data);
		} else {
			$obat_data = array(
				'nama_obat' => $this->input->post('nama_obat'),
				'jenis_obat' => $this->input->post('jenis_obat'),
				'stok' => $this->input->post('stok'),
				'expire' => $this->input->post('expire')
			);
	
			$this->obat_model->update($id, $obat_data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Obat berhasil diupdate!</div>');
			redirect('Apoteker/obat');
		}
	}
	
public function detail_obat($id_obat)
{
	$data['obat'] = $this->obat_model->get_by_id($id_obat);
	$this->load->view('layout/headerapoteker', $data);
	$this->load->view('apoteker/vw_detail_obat', $data);
}

    public function hapus_obat($id_obat)
    {
        $this->obat_model->delete($id_obat);
        redirect('Apoteker/index');
    }
	public function detail_resep($id_resep) {
        $data['obat'] = $this->Resep_model->ambil_detail_resep($id_resep);
		$this->load->view('layout/headerapoteker', $data);
        $this->load->view('apoteker/vw_detail_resep', $data);
    }
public function detailResep($param='')
{
	$data['rekam_medis'] = $this->rekammedis_model->get_rekammedisByid($param);
    $data['rekammedis'] = $this->Resep_model->ambil_data_resepByidRekamMedis($param);
    $this->load->view('layout/headerapoteker', $data);
    $this->load->view('apoteker/vw_detaildataresep', $data);
}
public function profile($param='')
{ 
	$this->load->model('User_model');
	$data['user'] = $this->User_model->getById($param);
	$data['user1'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
	$this->load->view('layout/headerapoteker',$data);
	$this->load->view('apoteker/vw_profile',$data);
}
}