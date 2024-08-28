<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
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
}
