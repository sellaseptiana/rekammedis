<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'vendor/autoload.php';
use Pusher\Pusher;
class Petugas extends CI_Controller 
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
		$this->load->library('form_validation');
    }
    
    public function index()
    {   $data['judul'] = "Halaman Petugas Rekam Medis ";
        $data['dokter_count'] = $this->User_model->count_by_role('dokter');
        $data['apoteker_count'] = $this->User_model->count_by_role('apoteker');
        $data['petugas_count'] = $this->User_model->count_by_role('petugas');
        $data['total_visits'] = $this->Kunjungan_model->get_total_visits(); 

        $data['patient_gender_by_age'] = $this->pasien_model->get_patient_gender_by_age();
        $data['visits_by_poli'] = $this->Kunjungan_model->get_visits_by_poli();
        $data['patients_by_status'] = $this->pasien_model->count_by_status();
  
          // Get visit counts by date (daily, weekly, yearly)
          $data['dailyVisits'] = $this->Kunjungan_model->getDailyVisits();
        $data['weeklyVisits'] = $this->Kunjungan_model->getWeeklyVisits();
        $data['monthlyVisits'] = $this->Kunjungan_model->getMonthlyVisits();
        $data['yearlyVisits'] = $this->Kunjungan_model->getYearlyVisits();
  
          $this->load->view('layout/headerpetugas', $data);
          $this->load->view('dashboard', $data);
          $this->load->view('layout/footer');
    }
	public function view_data_pasien()
{
    $this->load->model('pasien_model');
    $tables = "pasien";
    $search = array('no_ktp','nama_pasien', 'umur', 'tanggal_lahir', 'alamat', 'jenis_kelamin', 'pekerjaan','pendidikan');
    $where = null;
    $isWhere = null;

    header('Content-Type: application/json');
    echo $this->pasien_model->get_tables_pasien($tables, $search, $where, $isWhere);
}

public function pasien()
{
    $this->load->model('pasien_model');
	$data['pasien'] = $this->pasien_model->get();

    if (empty($data['pasien'])) {
        $this->session->set_flashdata('error', 'Gagal mengambil data pasien.');
    }

    $this->load->view('layout/headerpetugas');
    $this->load->view('Petugas/vw_datapasien', $data);
}

public function dokter()
{
	$data['title'] = 'Data Dokter';
    $data['user'] = $this->User_model->getAllDoctors();
	$this->load->view('layout/headerpetugas',$data);
    $this->load->view('petugas/vw_datadokter',$data);
}
public function apoteker()
{
	$data['user'] = $this->User_model->get_apoteker();
	$this->load->view('layout/headerpetugas',$data);
    $this->load->view('petugas/vw_dataapoteker',$data);
}
public function unitpelayanan()
{
	$data['unit_pelayanan'] = $this->Unitpelayanan_model->get_all_unit_pelayanan();
        
	// Ambil data dokter untuk dropdown di form tambah
	$data['dokter'] = $this->User_model->get_dokter();
    $this->load->view('layout/headerpetugas');
    $this->load->view('Petugas/vw_dataunitpelayanan', $data);
}

public function rekammedis()
{
	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('email')])->row_array();
	$id = $data['user']['id_user'];
	$data['rekam_medis'] = $this->rekammedis_model->get_rekam_medis();
	$this->load->view('layout/headerpetugas',$data);
    $this->load->view('petugas/vw_datarekammedis',$data);

}
public function jadwaldokter() {
    $data['judul'] = "Data Jadwal Dokter";
    $data['jadwaldokter'] = $this->jadwaldokter_model->get_all_jadwal();

    $this->load->view('layout/headerpetugas', $data);
    $this->load->view('petugas/vw_datajadwaldokter', $data);
    $this->load->view('layout/footer');
}
public function view_data_jadwaldokter()
{
    $tables = "tbjadwaldokter";
    $search = array('user.nama','tbpoli.nama_poli', 'status', 'jam');
    $where = null;
    header('Content-Type: application/json');
    echo $this->jadwaldokter_model->get_tables_jadwaldokter($tables, $search, $where);
}


// public function view_data_jadwaldokter() {
// 	$list = $this->jadwaldokter_model->get_datatables();
// 	$data = array();
// 	$no = $_POST['start'];
// 	foreach ($list as $jadwal) {
// 		$no++;
// 		$row = array();
// 		$row[] = $no;
// 		$row[] = $jadwal->nama_dokter;
// 		$row[] = $jadwal->status;
// 		$row[] = $jadwal->jam;
// 		$row[] = '<a href="'.base_url('Petugas/detail_jadwaldokter/'.$jadwal->id_jadwal_dokter).'" class="badge badge-warning">Detail</a> 
// 				  <a href="'.base_url('Petugas/update_jadwaldokter/'.$jadwal->id_jadwal_dokter).'" class="badge badge-primary">Update</a>
// 				  <a href="'.base_url('Petugas/hapus_jadwaldokter/'.$jadwal->id_jadwal_dokter).'" class="badge badge-danger" onclick="return confirm(\'Yakin untuk menghapus Data ini?\');">Hapus</a>';
// 		$data[] = $row;
// 	}

// 	$output = array(
// 		"draw" => $_POST['draw'],
// 		"recordsTotal" => $this->jadwaldokter_model->count_all(),
// 		"recordsFiltered" => $this->jadwaldokter_model->count_filtered(),
// 		"data" => $data,
// 	);
// 	echo json_encode($output);
// }
// public function view_data_pasien()
// {
//     $tables = "pasien";
//     $search = array('no_rekam_medis','nama_pasien','umur','tanggal_lahir', 'alamat','jenis_kelamin','status','no_bpjs', 'nama_unit_pelayanan','tanggal_periksa');
//     $where  = null;
//     $isWhere = null;
    
//     header('Content-Type: application/json');
//     echo $this->pasien_model->get_tables_user($tables, $search, $where, $isWhere);
// }


public function view_data_dokter()
{
    $tables = "user";
    $search = array('user.nama', 'user.jenis_kelamin', 'tbpoli.nama_poli', 'user.no_hp');
    $where = array('user.role' => 'dokter'); 
    header('Content-Type: application/json');
    echo $this->User_model->get_tables_dokter($tables, $search, $where);
}
public function view_data_kunjungan()
{
	$tables = "tbkunjungan";
    $search = array('no_rekam_medis','pasien.nama_pasien', 'tanggal_kunjungan','status','no_bpjs' ,'tbpoli.nama_poli', 'nama_pelayanan');
    $where = null;
    header('Content-Type: application/json');
    echo $this->Kunjungan_model->get_tables_kunjungan($tables, $search, $where);
}

function view_data_apoteker()
{
    $tables = "user";
    $search = array('nama', 'jenis_kelamin', 'alamat', 'no_hp');
	$where = array('role' => 'apoteker'); 
    $isWhere = null; // 

    header('Content-Type: application/json');
    echo $this->User_model->get_tables_user($tables, $search, $where, $isWhere);
}
public function view_data_rekammedis()
{
    $tables = "tbrekammedis";
    $search = array('no_rekam_medis', 'nama_pasien');
	$where = null; 
    $isWhere = null; // 

    header('Content-Type: application/json');
    echo $this->rekammedis_model->get_tables_rk($tables, $search, $where, $isWhere);
}

public function tambah_data_pasien() {
	$this->load->helper('date');
	$data['judul'] = "Halaman Tambah Data Pasien";
	$data['pasien'] = $this->pasien_model->get();

	// Set form validation rules
	$this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
	$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
	$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
	$this->form_validation->set_rules('umur', 'Umur', 'required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
	$this->form_validation->set_rules('no_hp', 'No HP', 'required');
	$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');

	if ($this->form_validation->run() == false) {
		$this->load->view('layout/headerpetugas', $data);
		$this->load->view('petugas/vw_tambah_data_pasien', $data);
	} else {
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$umur = $this->hitungUmur($tanggal_lahir);

		$pasien_data = array(
			'no_ktp' => $this->input->post('no_ktp'),
			'nama_pasien' => $this->input->post('nama_pasien'),
			'tanggal_lahir' => $tanggal_lahir,
			'umur' => $umur,
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'no_hp' => $this->input->post('no_hp'),
			'pendidikan' => $this->input->post('pendidikan'),
			'pekerjaan' => $this->input->post('pekerjaan')
		);

		$id_pasien = $this->pasien_model->insert($pasien_data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Added!</div>');
		redirect('Petugas/pasien');
	}
}
Public function hitungUmur($tanggal_lahir)
{
    $dob = new DateTime($tanggal_lahir);
    $now = new DateTime();
    $difference = $now->diff($dob);
    return $difference->y;
}

	public function tambah_data_dokter()
	{
		$data['poli'] = $this->db->get('tbpoli')->result_array();
	
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_poli', 'Poliklinik', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required');
	
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/headerpetugas');
			$this->load->view('petugas/vw_tambah_data_dokter', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'id_poli' => $this->input->post('id_poli'),
				'no_hp' => $this->input->post('no_hp'),
				'role' => 'dokter',
				'password' => $this->input->post('password')
			];
	
			$this->db->insert('user', $user_data);
			$id_user = $this->db->insert_id();
	
			$dokter_data = [
				'id_user' => $id_user,
				'id_poli' => $this->input->post('id_poli')
			];
	
			$this->db->insert('dokter', $dokter_data);
	
			redirect('Petugas/dokter');
		}
	}
		public function edit_data_dokter($id_user) {
			$data['user'] = $this->User_model->getById($id_user);
			$data['poli'] = $this->Unitpelayanan_model->getpoli(); 
	
			$this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('id_poli', 'Poliklinik', 'required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'required');
	
			if ($this->form_validation->run() == false) {
				$this->load->view('layout/headerpetugas');
				$this->load->view('petugas/vw_edit_data_dokter', $data);
			} else {
				$user_data = [
					'nama' => $this->input->post('nama'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'id_poli' => $this->input->post('id_poli'),
					'no_hp' => $this->input->post('no_hp')
				];
	
				$this->User_model->updateDokter($user_data, $id_user);
				redirect('Petugas/dokter');
			}
		}
		public function tambah_poli()
		{
			// Aturan validasi form
			$this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required');
		
			if ($this->form_validation->run() == false) {
				// Memuat view jika validasi gagal
				$this->load->view('layout/headerpetugas');
				$this->load->view('petugas/vw_tambah_data_unitpelayanan');
			} else {
				// Data yang akan diinput
				$data_input = [
					'nama_poli' => $this->input->post('nama_poli')
				];
		
				// Melakukan insert data
				$this->Unitpelayanan_model->insert_unitpelayanan($data_input);
		
				// Redirect ke halaman unit pelayanan setelah insert
				redirect('Petugas/unitpelayanan');
			}
		}
		public function edit_poli($id)
		{
			// Mengambil data unit pelayanan berdasarkan ID
			$data['poli'] = $this->Unitpelayanan_model->getByidpoli($id);
		
			// Aturan validasi form
			$this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required');
		
			if ($this->form_validation->run() == false) {
				// Memuat view jika validasi gagal
				$this->load->view('layout/headerpetugas');
				$this->load->view('petugas/vw_edit_data_poli', $data);
			} else {
				// Data yang akan diupdate
				$update_data = [
					'nama_poli' => $this->input->post('nama_poli')
				];
		
				// ID poli untuk kondisi WHERE
				$where = ['id_poli' => $id];
		
				// Melakukan update data
				$this->Unitpelayanan_model->update($where, $update_data);
		
				// Redirect ke halaman unit pelayanan setelah update
				redirect('Petugas/unitpelayanan');
			}
		}
		
	public function tambah_data_apoteker()
{
    $this->load->helper('date');
	$data['judul'] = "Halaman Tambah Data Apoteker";
	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
	$data['user1'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
	$this->load->model('User_model');
// Get specific data for editing, assuming you have a function in pasien_model to get data by id
$id_user = $this->input->post('id_user'); // Assuming id_pasien is passed as a POST parameter


	$this->form_validation->set_rules('nama', 'nama', 'required', [
		'required' => 'Required'
	]);
	$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
		'required' => 'Required'
	]);
	$this->form_validation->set_rules('alamat', 'alamat', 'required', [
		'required' => 'Required'
	]);
    $this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
		'required' => 'Required'
	]);
	if ($this->form_validation->run() == false) {
		$this->load->view('layout/headerpetugas',$data);
		$this->load->view("petugas/vw_tambah_data_apoteker");
	} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'password' => $this->input->post('password')
			);
			$this->User_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Added!</div>');
			redirect('petugas/view_data_apoteker');
		}
	}
	public function tambah_jadwal() {
		$data['judul'] = "Tambah Data Jadwal Dokter";
		$data['dokter'] = $this->jadwaldokter_model->get_all_dokter();
		$data['poli'] = $this->Unitpelayanan_model->getpoli(); 
	
		$this->form_validation->set_rules('id_user', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('id_poli', 'Nama Poli', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'callback_check_jam');
	
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/headerpetugas', $data);
			$this->load->view('petugas/vw_tambah_data_jadwaldokter', $data);
		} else {
			$jadwal_data = array(
				'id_user' => $this->input->post('id_user'),
				'id_poli' => $this->input->post('id_poli'),
				'status' => $this->input->post('status'),
				'jam' => $this->input->post('jam')
			);
	
			$this->jadwaldokter_model->insert_jadwal($jadwal_data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Dokter berhasil ditambahkan!</div>');
			redirect('Petugas/jadwaldokter');
		}
	}
	public function edit_jadwaldokter($id_jadwal) {
		$data['judul'] = "Edit Data Jadwal Dokter";
		$data['jadwal'] = $this->jadwaldokter_model->get_jadwal_by_id($id_jadwal);
		$data['dokter'] = $this->jadwaldokter_model->get_all_dokter();
		$data['poli'] = $this->Unitpelayanan_model->getpoli(); 
	
		$this->form_validation->set_rules('id_user', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('id_poli', 'Nama Poli', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'callback_check_jam');
	
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/headerpetugas', $data);
			$this->load->view('petugas/vw_edit_jadwaldokter', $data);
		} else {
			$jadwal_data = array(
				'id_user' => $this->input->post('id_user'),
				'id_poli' => $this->input->post('id_poli'),
				'status' => $this->input->post('status'),
				'jam' => $this->input->post('jam')
			);
	
			$this->jadwaldokter_model->update_jadwal($id_jadwal, $jadwal_data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Dokter berhasil diperbarui!</div>');
			redirect('Petugas/jadwaldokter');
		}
	}
	
	public function check_jam($jam) {
		$status = $this->input->post('status');
		if ($status === 'Tidak Ada' && !empty($jam)) {
			$this->form_validation->set_message('check_jam', 'Jam tidak boleh diisi jika status adalah "Tidak Ada".');
			return false;
		}
		return true;
	}
	public function detail_jadwaldokter($id_jadwal_dokter) {
        $data['dokter'] = $this->jadwaldokter_model->get_dokter_detail($id_jadwal_dokter);
		$data['poli'] = $this->db->get('tbpoli')->result_array();

		$this->load->view('layout/headerpetugas', $data);
			$this->load->view('petugas/vw_detailjadwaldokter', $data);
	}
	public function hapus_jadwaldokter($id_jadwal_dokter) {
		$this->jadwaldokter_model->hapus_jadwal($id_jadwal_dokter);
		redirect('Petugas/jadwaldokter');
	}
	public function edit_pasien($id) {
		$data['judul'] = "Halaman Edit Data Pasien";
		$data['pasien'] = $this->pasien_model->get_pasien_by_id($id);
		$this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required');
	
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/headerpetugas', $data);
			$this->load->view('petugas/vw_edit_data_pasien', $data);
		} else {
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$umur = $this->hitungUmurr($tanggal_lahir);
			$pasien_data = array(
				'no_ktp' => $this->input->post('no_ktp'),
				'nama_pasien' => $this->input->post('nama_pasien'),
				'tanggal_lahir' => $tanggal_lahir,
				'umur' => $umur,
				'alamat' => $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_hp' => $this->input->post('no_hp'),
				'pendidikan' => $this->input->post('pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan')
			);
	
			$this->pasien_model->update_pasien($id, $pasien_data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
			redirect('Petugas/pasien');
		}
	}
	


	private function hitungUmurr($tanggal_lahir)
    {
        $today = new DateTime();
        $birthDate = new DateTime($tanggal_lahir);
        $age = $today->diff($birthDate)->y;
        return $age;
    }
	
	public function edit_apoteker($id)
	{
		// Load required models
		$this->load->helper('date');
		// Get the data for the view
		$data['judul'] = "Halaman Edit Data Apoteker";
		$data['user'] = $this->User_model->getById($id);
		
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'Required'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
			'required' => 'Required'
		]);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', [
			'required' => 'Required'
		]);
			$this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
			'required' => 'Required'
		]);
		  
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/headerpetugas',$data);
			$this->load->view("petugas/vw_edit_data_apoteker", $data); // Pass $data to the view
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_hp' => $this->input->post('no_hp'),
				'alamat' => $this->input->post('alamat'),
				
			);
				$id_user = $this->input->post('id_user');
				$this->User_model->update(['id_user' => $id_user], $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
				redirect('Petugas/apoteker');
			}
	
	}
	
		public function hapus_pasien($id)
		{
			$this->pasien_model->delete_pasien($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('Petugas/pasien');
		}
		public function hapus_user($id)
		{
			$this->User_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('Petugas');
		}
		
		public function hapus_unitpelayanan($id)
		{
			$this->Unitpelayanan_model->delete_unitpelayanan($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('Petugas/unitpelayanan');
		}
		public function hapus_dokter($id)
{
    $this->User_model->hapusDokter($id);
    redirect('Petugas/dokter'); // Redirect ke halaman daftar dokter setelah menghapus
}
		public function detail_pasien($id)
    { 
        $data['pasien'] = $this->pasien_model->getById($id);
        $data['user1'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/headerpetugas',$data);
        $this->load->view('petugas/vw_detail_data_pasien',$data);
    }
	
	public function detail_dokter($id)
    { 
		// $data['user'] = $this->User_model->getById($id);
		$data['unit_pelayanan'] = $this->Unitpelayanan_model->getById($id);
		$data['session_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('layout/headerpetugas', $data);
		$this->load->view('petugas/vw_detail_data_dokter', $data);
    }

public function detail_apoteker($id)
    { 
        $data['user'] = $this->User_model->getById($id);
        $data['user1'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/headerpetugas',$data);
        $this->load->view('petugas/vw_detail_data_apoteker',$data);
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
		$this->load->view('layout/headerpetugas',$data);
		$this->load->view('petugas/vw_detail_data_rekammedis', $data);
	}
	
	public function detailrekammedis($id) {
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
			$this->load->view('layout/headerpetugas', $data);
			$this->load->view('petugas/vw_detailrekammedis', $data);
			$this->load->view('layout/footer');
	 
	}	
    // Method untuk menyimpan data unit pelayanan
    // public function simpan_unit_pelayanan()
    // {
    //     $no_rm = $this->input->post('no_rekam_medis');
    //     $id_user = $this->session->userdata('id_user');
        
    //     $pasien = $this->pasien_model->get_pasien_by_no_rm($no_rm);

    //     if ($pasien) {
    //         $data = array(
    //             'no_rekam_medis' => $no_rm,
    //             'nama_unit_pelayanan' => $this->input->post('nama_unit_pelayanan'),
    //         );

    //         if ($this->Unitpelayanan_model->insert($data)) {
    //             $this->session->set_flashdata('success', 'Data Poli berhasil disimpan.');
    //             redirect('Petugas/unitpelayanan');
    //         } else {
    //             $this->session->set_flashdata('error', 'Gagal menyimpan data poli.');
    //             redirect('Petugas/tambah_data_unitpelayanan');
    //         }
    //     } else {
    //         $this->session->set_flashdata('error', 'Nomor rekam medis tidak ditemukan.');
    //         redirect('Petugas/tambah_data_unitpelayanan');
    //     }
    // }
	public function tambah_unit_pelayanan() {
        $data['judul'] = "Tambah Data Unit Pelayanan";
        $data['dokter'] = $this->User_model->get_all_dokter(); 

        $this->form_validation->set_rules('nama_unit_pelayanan', 'Nama Unit Pelayanan', 'required');
        $this->form_validation->set_rules('id_dokter', 'Nama Dokter', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('petugas/vw_tambah_unit_pelayanan', $data);
            $this->load->view('layout/footer');
        } else {
            $unit_pelayanan_data = array(
                'nama_unit_pelayanan' => $this->input->post('nama_unit_pelayanan'),
                'id_dokter' => $this->input->post('id_dokter')
            );

            $this->Unitpelayanan_model->insert($unit_pelayanan_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Added!</div>');
            redirect('Petugas/unitpelayanan');
        }
    }

	public function cek_pasien()
	{
		$metode_cek = $this->input->post('metode_cek');
	
		if ($metode_cek === 'no_ktp') {
			$no_ktp = $this->input->post('no_ktp');
			
			// Check if it's an AJAX request to check for `no_rekam_medis`
			if ($this->input->is_ajax_request()) {
				$this->load->model('pasien_model');
				$exists = $this->pasien_model->check_no_rekam_medis($no_ktp);
				echo json_encode(['exists' => $exists]);
				return;
			}
	
			$data['pasien'] = $this->Kunjungan_model->cek_pasien_by_ktp($no_ktp);
		} else {
			$no_rekam_medis = $this->input->post('no_rekam_medis');
			$data['pasien'] = $this->Kunjungan_model->cek_pasien_by_rekam_medis($no_rekam_medis);
		}
	
		$data['poli'] = $this->db->get('tbpoli')->result_array();
	
		$this->load->view('layout/headerpetugas', $data);
		$this->load->view('petugas/vw_tambah_data_kunjungan', $data);
	}
	public function check_no_rekam_medis()
	{
		$no_ktp = $this->input->post('no_ktp');
		$this->load->model('Kunjungan_model');
		$exists = $this->Kunjungan_model->check_no_rekam_medis_by_ktp($no_ktp);
		echo json_encode(['exists' => $exists ? true : false, 'no_rekam_medis' => $exists]);
	}
	Public function hitungUmursuami($tanggal_lahir_suami)
{
    $dob = new DateTime($tanggal_lahir_suami);
    $now = new DateTime();
    $difference = $now->diff($dob);
    return $difference->y;
}
public function tambah_kunjungan() {
	// Ambil nama_poli dari session

	$nama_poli = $this->session->userdata('nama_poli');
	$this->load->helper('date');

	$this->form_validation->set_rules('id_pasien', 'ID Pasien', 'required');
	$this->form_validation->set_rules('id_poli', 'ID Poli', 'required');
	$this->form_validation->set_rules('no_rekam_medis', 'No Rekam Medis', 'required');
	$this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
	$this->form_validation->set_rules('nama_pelayanan', 'Nama Pelayanan', 'required');
	$this->form_validation->set_rules('id_user', 'Nama Dokter', 'required');

if ($this->form_validation->run() == false) {
	$data['judul'] = "Tambah Data Kunjungan Pasien";
	$data['poli'] = $this->db->get('tbpoli')->result_array();
	$dokter = $this->User_model->get_dokter_by_poli($nama_poli);

	// Format data dokter
	$data['dokter_options'] = [];
	foreach ($dokter as $d) {
		$data['dokter_options'][$d['id_user']] = $d['nama'];
	}
	$this->load->view('layout/headerpetugas', $data);
	$this->load->view('petugas/vw_tambah_data_kunjungan', $data);
	$this->load->view('layout/footer');
} else {
		$id_pasien = $this->input->post('id_pasien');
		$id_poli = $this->input->post('id_poli');
		$no_rekam_medis = $this->input->post('no_rekam_medis');
		$tanggal_kunjungan = $this->input->post('tanggal_kunjungan');

		// Cek apakah ada kunjungan dengan no_rekam_medis, tanggal_kunjungan, dan id_poli yang sama
		$existing_visit = $this->Kunjungan_model->check_existing_visit($no_rekam_medis, $tanggal_kunjungan, $id_poli);

		if ($existing_visit) {
			
$this->session->set_flashdata('error', 'Kunjungan dengan No Rekam Medis yang sama, tanggal yang sama, dan poli yang sama sudah ada.');
redirect('Petugas/tambah_kunjungan');
	
		} else {
			// Jika tidak ada, tambahkan data kunjungan
			$data = [
				'id_pasien' => $id_pasien,
				'id_poli' => $id_poli,
				'id_user' => $this->input->post('id_user'),
				'no_rekam_medis' => $no_rekam_medis,
				'tanggal_kunjungan' => $tanggal_kunjungan,
				'status' => $this->input->post('status'),
				'no_bpjs' => $this->input->post('no_bpjs'),
				'nama_pelayanan' => $this->input->post('nama_pelayanan'),
				'kode_faskes' => $this->input->post('kode_faskes'),
				'tahapan_ks' => $this->input->post('tahapan_ks'),
				'status_jkn' => $this->input->post('status_jkn'),
				'nama_suami' => $this->input->post('nama_suami'),
				'tanggal_lahir_suami' => $this->input->post('tanggal_lahir_suami'),
				'pendidikan_suami' => $this->input->post('pendidikan_suami'),
				'pekerjaan_suami' => $this->input->post('pekerjaan_suami'),
				'umur_suami' => $this->input->post('umur_suami'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'berat_lahir' => $this->input->post('berat_lahir'),
				'umur_ayah' => $this->input->post('umur_ayah'),
				'umur_ibu' => $this->input->post('umur_ibu'),
				'tanggal_lahir_suami_istri' => $this->input->post('tanggal_lahir_suami_istri'),
				'umur_suami_istri' => $this->input->post('umur_suami_istri')
			];

			// Debug log
			log_message('debug', 'Data kunjungan: ' . print_r($data, true));

			$this->Kunjungan_model->tambah_kunjungan($data);

		// Konfigurasi Pusher
		$options = [
			'cluster' => 'ap1',
			'useTLS' => true
		];

		$pusher = new Pusher(
			'54c239527fc7b5132a57',
			'496ff9c2da865b4bc251',
			'1833145',
			$options
		);

		// Data untuk dikirim ke Pusher
		$message = 'Ada kunjungan baru oleh pasien ' . $this->input->post('nama_pasien') . ' Dengan No rekam Medis ' . $this->input->post('no_rekam_medis');
$pusher->trigger('rekam-medis', 'kunjungan-event', ['message' => $message]);
		// Set flash data untuk notifikasi berhasil
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kunjungan berhasil ditambahkan!</div>');

		// Redirect kembali ke halaman kunjungan
		redirect('Petugas/kunjungan');
	}
}
}
   
	public function detail($id_kunjungan) {
		$data['judul'] = "Detail Data Kunjungan";
		$data['poli'] = $this->db->get('tbpoli')->result_array();
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_id($id_kunjungan);
		$data['pasien'] = $this->pasien_model->get_pasien_by_id($data['kunjungan']['id_pasien']);
	
		$this->load->view('layout/headerpetugas', $data);
		$this->load->view('petugas/vw_detailkunjungan', $data);
		$this->load->view('layout/footer');
	}
	
	public function detail_kunjungan($id_kunjungan) {
		$data['judul'] = "Detail Data Kunjungan";
		$data['poli'] = $this->db->get('tbpoli')->result_array();
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_id($id_kunjungan);
		$data['pasien'] = $this->pasien_model->get_pasien_by_id($data['kunjungan']['id_pasien']);
		$data['kunjungan1'] = $this->Kunjungan_model->get_all_visits_by_pasien($data['kunjungan']['id_pasien']);
		
		$this->load->view('layout/headerpetugas', $data);
		$this->load->view('petugas/vw_detail_data_kunjungan', $data);
		$this->load->view('layout/footer');
	}
	
	public function load_all_visits($id_pasien) {
		// Panggil model untuk mendapatkan semua kunjungan pasien
		$data['kunjungan'] = $this->Kunjungan_model->get_all_visits_by_pasien($id_pasien);
	
		// Load view untuk menampilkan semua kunjungan pasien
		$this->load->view('layout/headerpetugas');
		$this->load->view('petugas/vw_semua_kunjungan_pasien', $data);
		// $this->load->view('layout/footer');
	}
	public function detail_kunjungan_modal($id_kunjungan) {
		
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan($id_kunjungan);
		$this->load->view('layout/headerpetugas', $data);
		$this->load->view('petugas/detail_kunjungan_modal', $data);
	}
	public function load_detail_kunjungan() {
		$idKunjungan = $this->input->post('id_kunjungan');
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_id($idKunjungan);
		$data['pasien'] = $this->pasien_model->get_pasien_by_id($data['kunjungan']['id_pasien']);
		$this->load->view('layout/headerpetugas', $data);
		$this->load->view('petugas/detail_kunjungan_modal', $data);
	}
	public function edit_kunjungan($id_kunjungan) {
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_id($id_kunjungan);
		$data['pasien'] = $this->pasien_model->get_pasien_by_id($data['kunjungan']['id_pasien']);
		$data['poli'] = $this->db->get('tbpoli')->result_array();
	
		$this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('id_poli', 'Poli', 'required');
		$this->form_validation->set_rules('nama_pelayanan', 'Nama Pelayanan', 'required');
	
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/headerpetugas');
			$this->load->view('petugas/vw_edit_data_kunjungan', $data);
		} else {
			$update_data = [
				'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
				'status' => $this->input->post('status'),
				'no_bpjs' => $this->input->post('no_bpjs'),
				'id_poli' => $this->input->post('id_poli'),
				'nama_pelayanan' => $this->input->post('nama_pelayanan'),
				'nama_suami' => $this->input->post('nama_suami'),
            	'tanggal_lahir_suami' => $this->input->post('tanggal_lahir_suami'),
				'umur_suami' => $this->input->post('umur_suami'),
            	'pendidikan_suami' => $this->input->post('pendidikan_suami'),
            	'pekerjaan_suami' => $this->input->post('pekerjaan_suami'),
            	'nama_ayah' => $this->input->post('nama_ayah'),
            	'nama_ibu' => $this->input->post('nama_ibu'),
            	'berat_lahir' => $this->input->post('berat_lahir'),
            	'umur_ayah' => $this->input->post('umur_ayah'),
            	'umur_suami_istri' => $this->input->post('umur_suami_istri'),
				'tanggal_lahir_suami_istri' => $this->input->post('tanggal_lahir_suami_istri'),
            	'umur_ibu' => $this->input->post('umur_ibu')
			];
	
			$this->Kunjungan_model->update_kunjungan($id_kunjungan, $update_data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
			redirect('Petugas/kunjungan');
		}
	}
	
	public function update_kunjungan($id_kunjungan) {
		$update_data = [
			'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
			'status' => $this->input->post('status'),
			'no_bpjs' => $this->input->post('no_bpjs'),
			'id_poli' => $this->input->post('id_poli'),
			'nama_pelayanan' => $this->input->post('nama_pelayanan'),
			'nama_suami' => $this->input->post('nama_suami'),
            	'tanggal_lahir_suami' => $this->input->post('tanggal_lahir_suami'),
            	'pendidikan_suami' => $this->input->post('pendidikan_suami'),
            	'pekerjaan_suami' => $this->input->post('pekerjaan_suami'),
            	'umur_suami' => $this->input->post('umur_suami'),
            	'nama_ayah' => $this->input->post('nama_ayah'),
            	'nama_ibu' => $this->input->post('nama_ibu'),
            	'berat_lahir' => $this->input->post('berat_lahir'),
            	'umur_ayah' => $this->input->post('umur_ayah'),
            	'umur_ibu' => $this->input->post('umur_ibu')
		];
	
		$this->Kunjungan_model->update_kunjungan($id_kunjungan, $update_data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
		redirect('Petugas/kunjungan');
	}
	public function delete_kunjungan($id_kunjungan) {
		$this->Kunjungan_model->delete_kunjungan($id_kunjungan);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		redirect('Petugas/kunjungan');
	}
    public function kunjungan()
    {
        $data['kunjungan'] = $this->Kunjungan_model->get_all_kunjungan();
        $this->load->view('layout/headerpetugas');
        $this->load->view('petugas/vw_datakunjungan', $data);
        // $this->load->view('layout/footer');
    }
	public function kunjungan_umum() {
		$this->load->model('Kunjungan_model'); // Memuat model Kunjungan_model
		$data['title'] = 'Data Kunjungan Poli Umum';
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_poli('Umum'); // Memanggil model untuk mendapatkan data kunjungan Umum
		$this->load->view('layout/headerpetugas', $data); // Memuat header view
		$this->load->view('petugas/kunjungan/umum', $data); // Memuat view kunjungan umum dengan data yang sudah diambil dari model
		$this->load->view('layout/footer'); // Memuat footer view
	}
	
	public function kunjungan_gigi() {
		$this->load->model('Kunjungan_model'); // Memuat model Kunjungan_model
		$data['title'] = 'Data Kunjungan Poli Gigi';
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_poli('Gigi'); 
		$this->load->view('layout/headerpetugas', $data);
		$this->load->view('petugas/kunjungan/gigi', $data); 
		$this->load->view('layout/footer'); 
	}
	
	public function kunjungan_kia_kb() {
		$this->load->model('Kunjungan_model'); 
		$data['title'] = 'Data Kunjungan Poli KIA & KB';
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_poli('KIA & KB'); 
		$this->load->view('layout/headerpetugas', $data); 
		$this->load->view('petugas/kunjungan/kia_kb', $data); 
		$this->load->view('layout/footer'); 
	}
	
	public function kunjungan_anak() {
		$this->load->model('Kunjungan_model'); 
		$data['title'] = 'Data Kunjungan Poli Anak';
		$data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_poli('Anak'); 
		$this->load->view('layout/headerpetugas', $data); 
		$this->load->view('petugas/kunjungan/anak', $data); 
		$this->load->view('layout/footer'); 
	}
	
	public function rekammedis_umum() {
		$data['title'] = 'Data Rekam Medis Poli Umum';
		$data['rekam_medis'] = $this->rekammedis_model->getRekamMedisPoliUmum('Umum'); 
		$this->load->view('layout/headerpetugas', $data); 
		$this->load->view('petugas/rekammedis/umum', $data); 
		$this->load->view('layout/footer'); 
	}
	public function rekammedis_gigi() {
		$data['title'] = 'Data Rekam Medis Poli Gigi';
		$data['rekam_medis'] = $this->rekammedis_model->get_rekam_medis('Gigi');
		// $data['rekam_medis'] = $this->rekammedis_model->getRekamMedisByPoli('Gigi'); 
		$this->load->view('layout/headerpetugas', $data); 
		$this->load->view('petugas/rekammedis/gigi', $data); 
		$this->load->view('layout/footer'); 
	}
	public function rekammedis_anak() {
		$data['title'] = 'Data Rekam Medis Poli Anak';
		$data['rekam_medis'] = $this->rekammedis_model->get_rekam_medis('Anak');
		// $data['rekam_medis'] = $this->rekammedis_model->getRekamMedisByPoli('Anak'); 
		$this->load->view('layout/headerpetugas', $data); 
		$this->load->view('petugas/rekammedis/anak', $data); 
		$this->load->view('layout/footer'); 
	}
	public function rekammedis_kia_kb() {
		$data['title'] = 'Data Rekam Medis Poli KIA & KB';
		$data['rekam_medis_bumil'] = $this->rekammedis_model->get_rekam_medis_by_unit('Bumil');
		$data['rekam_medis_kb'] = $this->rekammedis_model->get_rekam_medis_by_unit('KB');
		$this->load->view('layout/headerpetugas', $data); 
		$this->load->view('petugas/rekammedis/kiakb', $data); 
		$this->load->view('layout/footer'); 
	}
    public function view_data_unitpelayanan() {
        $tables = "tbrekammedis";
        $search = array('no_rekam_medis', 'pasien.nama_pasien', 'tbpoli.nama_unit_pelayanan');
        $where = null; 
		$isWhere = array('tbrekammedis.id_pasien = pasien.id_pasien', 'tbrekammedis.id_poli = tbpoli.id_poli');

        header('Content-Type: application/json');
        echo $this->Unitpelayanan_model->get_tables($tables, $search, $where, $isWhere);
    }
	
	// public function tambah_unitpelayanan() {
	// 	$data['judul'] = "Halaman Tambah Data Unit Pelayanan";
	// 	$data['rekam_medis'] = $this->rekammedis_model->get_all_rekam_medis();
    //     $data['unit_pelayanan'] = $this->Unitpelayanan_model->get_all_unit_pelayanan();
        
    //     // Set validation rules
    //     $this->form_validation->set_rules('no_rekam_medis', 'no_rekam_medis', 'required', [
    //         'required' => 'Required'
    //     ]);
    //     $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required', [
    //         'required' => 'Required'
    //     ]);

    //     if ($this->form_validation->run() == FALSE) {
    //         // Load the form view again with validation errors
    //         $this->load->view('petugas/vw_tambah_data_unitpelayanan', $data);
    //     } else {
	// 		$no_rekam_medis = $this->input->post('no_rekam_medis');
	// 		$id_poli = $this->input->post('id_poli');
	
	// 		$data_insert = array(
	// 			'no_rekam_medis' => $no_rekam_medis,
	// 			'id_poli' => $id_poli
	// 		);
	
	// 		// Insert data into the database
	// 		if ($this->pasien_model->insert_data($data_insert)) {
	// 			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully Added!</div>');
	// 		} else {
	// 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to add data!</div>');
	// 		}
	
	// 		// Redirect to the Petugas page
	// 		redirect('Petugas/unitpelayanan');
	// 	}
    // }
	
	public function cek_no_rekam_medis() {
        $no_rekam_medis = $this->input->post('no_rekam_medis');
        $data = $this->pasien_model->get_pasien_by_no_rm($no_rekam_medis);

        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(array('error' => true));
        }
    }
	
	public function save($data) {
		// Periksa role dari tabel user
		$this->db->select('role');
		$this->db->where('id_user', $data['id_user']);
		$query = $this->db->get('user');
		$user = $query->row();
	
		// Siapkan data untuk dimasukkan ke dalam tbpoli
		$unit_pelayanan_data = array(
			'nama_poli' => $data['nama_poli'],
		);
	
		// Jika role adalah 'dokter', tambahkan id_user ke data yang akan disimpan
		if ($user && $user->role == 'dokter') {
			$unit_pelayanan_data['id_user'] = $data['id_user'];
		}
	
		// Masukkan data ke dalam tbpoli
		if (isset($data['id_poli'])) {
			// Update data jika id_poli ada
			$this->db->where('id_poli', $data['id_poli']);
			return $this->db->update('tbpoli', $unit_pelayanan_data);
		} else {
			// Insert data baru
			return $this->db->insert('tbpoli', $unit_pelayanan_data);
		}
	}

	public function profile($param='')
	{ 
		$this->load->model('User_model');
		$data['user'] = $this->User_model->getById($param);
		$data['user1'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('layout/headerpetugas',$data);
		$this->load->view('petugas/vw_profile',$data);
	}
	}
