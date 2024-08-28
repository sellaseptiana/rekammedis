<?php
defined('BASEPATH') or exit('No direct script access allowed');
class rekammedis_model extends CI_Model
{
    public $table = 'tbrekammedis';
    public $id = 'tbrekammedis.id_rekam_medis';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBy()
    {
        $this->db->from($this->table);
        $this->db->where('id_rekammedis', $this->session->userdata('id_rekammedis'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_rekam_medis', $id);
        $query = $this->db->get();
        $this->db->get_where($this->table, ["id_rekam_medis" => $id])->row();
        return $query->row_array();
    }
    public function insert($data)
    {
        $this->db->insert('tbrekammedis', $data);
        return $this->db->insert_id(); // atau return $this->db->affected_rows();
    }
    public function update($id_rekam_medis, $data)
    {
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $this->db->update('tbrekammedis', $data);
    }
    public function get_all_unit_pelayanan()
    {
        return $this->db->get('tbpoli')->result_array();
    }

    public function get_rekammedis_by_id_pasien($id_pasien)
    {
        $this->db->where('id_pasien', $id_pasien);
        $query = $this->db->get('tbrekammedis');
        return $query->row_array();
    }

    public function get_all_rekammedis()
    {
        $query = $this->db->get('tbrekammedis');
        return $query->result();
    }
    public function get_rekam_medis_by_unit($unit)
    {
        $this->db->select('
        trm.*,
        trm.id_rekam_medis as id_rekam, 
        u.nama,
       tbk.*,
        p.nama_pasien,
     tbu.*, tbkb.*
    ');
    $this->db->from('tbrekammedis as trm');
    $this->db->join('user as u', 'trm.id_user = u.id_user', 'left');
    $this->db->join('tbkunjungan as tbk', 'tbk.id_kunjungan = trm.id_kunjungan', 'left');
    $this->db->join('tbpoli as tbp', 'tbp.id_poli = tbk.id_poli', 'left');
    $this->db->join('pasien as p', 'p.id_pasien = tbk.id_pasien', 'left');
    $this->db->join('tbbumil as tbu', 'tbu.id_rekam_medis = trm.id_rekam_medis', 'left');
    $this->db->join('tbkb as tbkb', 'tbkb.id_rekam_medis = trm.id_rekam_medis', 'left');
        $this->db->where('nama_pelayanan', $unit); 
        $query = $this->db->get(); 

        return $query->result_array(); // Mengembalikan hasil sebagai array
    }
    public function get_pasien_by_id_kunjungan($id_kunjungan)
    {
        $this->db->select('*');
        $this->db->from('tbpasien');
        $this->db->join('tbkunjungan', 'tbkunjungan.id_pasien = tbpasien.id_pasien');
        $this->db->where('tbkunjungan.id_kunjungan', $id_kunjungan);
        $query = $this->db->get();

        // Periksa apakah query mengembalikan hasil
        if ($query) {
            // Jika ada hasil, kembalikan hasilnya
            return $query->result_array();
        } else {
            // Jika tidak ada hasil, kembalikan array kosong atau tindakan sesuai kebutuhan
            return [];
        }
    }
    public function get_dokter($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    // Optional: Function to get rekam medis by ID
    public function get_rekammedis_by_id($id)
    {
        $this->db->where('id_rekam_medis', $id);
        $query = $this->db->get('tbrekammedis');
        return $query->row();
    }
    public function getKunjungan($id)
    {
        $this->db->select('id_kunjungan');
        $this->db->from('tbkunjungan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapus_rekam_medis($id_rekam_medis)
    {
        // Hapus data rekam medis dari tbrekammedis
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $this->db->delete('tbrekammedis');

        // Hapus data resep terkait dari tbresep
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $this->db->delete('tbresep');

        // Return jumlah baris yang terpengaruh
        return $this->db->affected_rows();
    }
    public function getKunjunganpasien($no_rekam_medis)
    {
        $this->db->select('id_kunjungan');
        $this->db->where('no_rekam_medis', $no_rekam_medis);
        $query = $this->db->get('tbkunjungan');

        if ($query === false) {
            // Handle the error appropriately
            return false;
        }

        return $query->row_array();
    }
    public function getdokter($id)
    {
        $this->db->select('nama');
        $this->db->from('tbkunjungan');
        $this->db->where('no_rekam_medis', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    // Optional: Function to delete rekam medis
    public function delete($id)
    {
        $this->db->where('id_rekam_medis', $id);
        return $this->db->delete('tbrekammedis');
    }

    public function get_all_rekammedis_by_pasien($id_kunjungan)
    {
        $this->db->select('tbrekammedis.id_rekam_medis as id_rekam, tbrekammedis.*, tbkunjungan.no_rekam_medis,tbkunjungan.tanggal_kunjungan, tbkunjungan.nama_pelayanan, pasien.*, user.nama,  tbpoli.nama_poli');
        $this->db->from('tbrekammedis');
        $this->db->join('tbkunjungan', 'tbkunjungan.id_kunjungan = tbrekammedis.id_kunjungan');
        $this->db->join('pasien', 'pasien.id_pasien = tbkunjungan.id_pasien');
        $this->db->join('tbpoli', 'tbkunjungan.id_poli = tbpoli.id_poli');
        $this->db->join('user', 'tbrekammedis.id_user = user.id_user');
       
        $this->db->where('tbrekammedis.id_kunjungan', $id_kunjungan);
        return $this->db->get()->result_array();
    }

    // public function insert($data)
    // {
    //     $this->db->insert($this->table, $data);
    //     return $this->db->insert_id();
    // }

    // public function delete($id)
    // {
    //     $this->db->where($this->id, $id);
    //     $this->db->delete($this->table);
    //     return $this->db->affected_rows();
    // }

    public function save_scores($data)
    {
        // Insert the scores into the tbrekammedis table
        return $this->db->insert('tbrekammedis', $data);
    }
    public function tampildata($id)
    {

        $this->db->select('tbrekammedis.*, pasien.no_rekam_medis, pasien.nama_pasien, tbpoli.nama_unit_pelayanan as nama_unit_pelayanan');
        $this->db->from('tbrekammedis');
        $this->db->join('pasien', 'tbrekammedis.id_pasien = pasien.id_pasien');
        $this->db->join('user', 'tbrekammedis.id_user = user.id_user');
        $this->db->where('tbrekammedis.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_rekam_medis($where = '')
    {
        $this->db->select('
            trm.*,
            trm.id_rekam_medis as id_rekam, 
            u.nama,
           tbk.*,
            p.nama_pasien,
         tg.odontogram,
         tbg.occlusi,
         tbg.torus_palatines,
         tbg.torus_mandibularis,
         tbg.palatum,
         tbg.diasterna,
         tbg.gigi_anomaly,
         tbg.radiology,
            GROUP_CONCAT(DISTINCT tg.odontogram SEPARATOR ",") as odontogram,
            GROUP_CONCAT(DISTINCT tbg.id_gigi SEPARATOR ",") as id_gigi,
            GROUP_CONCAT(DISTINCT tg.id_odontogram SEPARATOR ",") as id_odontogram,
            tba.*, tbu.*, tbkb.*
        ');
        $this->db->from('tbrekammedis as trm');
        $this->db->join('user as u', 'trm.id_user = u.id_user', 'left');
        $this->db->join('tbkunjungan as tbk', 'tbk.id_kunjungan = trm.id_kunjungan', 'left');
        $this->db->join('tbpoli as tbp', 'tbp.id_poli = tbk.id_poli', 'left');
        $this->db->join('pasien as p', 'p.id_pasien = tbk.id_pasien', 'left');
        $this->db->join('tbgigi as tbg', 'tbg.id_rekam_medis = trm.id_rekam_medis', 'left');
        $this->db->join('tbodontogram as tg', 'tbg.id_odontogram = tg.id_odontogram', 'left');
        $this->db->join('tbanak as tba', 'tba.id_rekam_medis = trm.id_rekam_medis', 'left');
        $this->db->join('tbbumil as tbu', 'tbu.id_rekam_medis = trm.id_rekam_medis', 'left');
        $this->db->join('tbkb as tbkb', 'tbkb.id_rekam_medis = trm.id_rekam_medis', 'left');
        if ($where) {
            $this->db->where('tbp.nama_poli', $where);
        }
        $this->db->group_by('trm.id_rekam_medis'); // Group by medical record to avoid duplicate rows
        return $this->db->get()->result_array();
    }

    public function getRekamMedisPoliUmum($nama_poli)
    {
        $this->db->select('rm.*, u.nama,  rm.id_rekam_medis as id_rekam,  p.nama_poli, pas.nama_pasien, k.*, tg.*,tbg.*, tba.*');
        $this->db->from('tbrekammedis rm');
        $this->db->join('user u', 'rm.id_user = u.id_user', 'left');
        $this->db->join('tbkunjungan k', 'rm.id_kunjungan = k.id_kunjungan');
        $this->db->join('tbpoli p', 'k.id_poli = p.id_poli');
        $this->db->join('pasien pas', 'pas.id_pasien = k.id_pasien', 'left');
        $this->db->join('tbgigi tbg', 'tbg.id_rekam_medis = rm.id_rekam_medis', 'left');
        $this->db->join('tbodontogram tg', 'tbg.id_odontogram = tg.id_odontogram', 'left');
        $this->db->join('tbanak tba', 'tba.id_rekam_medis = rm.id_rekam_medis', 'left');
        $this->db->where('p.nama_poli', $nama_poli);
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil query dalam bentuk array objek
    }
    public function getRekamMedisByPoli($nama_poli)
    {
        $this->db->select('rm.*,  rm.id_rekam_medis as id_rekam,  u.nama, p.nama_poli, pas.nama_pasien, k.*,
         tg.odontogram,
         tbg.occlusi,
         tbg.torus_palatines,
         tbg.torus_mandibularis,
         tbg.palatum,
         tbg.diasterna,
         tbg.gigi_anomaly,
         tbg.radiology,
            GROUP_CONCAT(DISTINCT tg.odontogram SEPARATOR ",") as odontogram,
            GROUP_CONCAT(DISTINCT tbg.id_gigi SEPARATOR ",") as id_gigi,
            GROUP_CONCAT(DISTINCT tg.id_odontogram SEPARATOR ",") as id_odontogram, tba.*, tbu.*,tbkb.*');
        $this->db->from('tbrekammedis rm');
        $this->db->join('user u', 'rm.id_user = u.id_user', 'left');
        $this->db->join('tbkunjungan k', 'rm.id_kunjungan = k.id_kunjungan');
        $this->db->join('tbpoli p', 'k.id_poli = p.id_poli');
        $this->db->join('pasien pas', 'pas.id_pasien = k.id_pasien', 'left');
        $this->db->join('tbgigi tbg', 'tbg.id_rekam_medis = rm.id_rekam_medis', 'left');
        $this->db->join('tbodontogram tg', 'tbg.id_odontogram = tg.id_odontogram', 'left');
        $this->db->join('tbanak tba', 'tba.id_rekam_medis = rm.id_rekam_medis', 'left');
        $this->db->join('tbbumil tbu', 'tbu.id_rekam_medis = rm.id_rekam_medis', 'left');
        $this->db->join('tbkb tbkb', 'tbkb.id_rekam_medis = rm.id_rekam_medis', 'left');
        $this->db->where('p.nama_poli', $nama_poli);
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil query dalam bentuk array objek
    }

    public function get_rekammedis()
    {
        $this->db->select('trm.*,u.nama,tbk.no_rekam_medis,p.nama_pasien,tbk.tanggal_kunjungan,tbk.nama_pelayanan');
        $this->db->from('tbrekammedis as trm');
        $this->db->join('user as u', 'trm.id_user = u.id_user', 'left');
        $this->db->join('tbkunjungan as tbk', 'tbk.id_kunjungan = trm.id_kunjungan', 'left');
        $this->db->join('pasien as p', 'p.id_pasien = tbk.id_pasien', 'left');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_all_patients()
    {
        $this->db->select('pasien.no_rekam_medis, pasien.nama_pasien');
        $query = $this->db->get('pasien');
        return $query->result();
    }

    public function get_patient_details_by_no_rm($no_rekam_medis)
    {
        $this->db->select('pasien.id_pasien, pasien.nama_pasien');
        $this->db->from('tbrekammedis');
        $this->db->join('pasien', 'tbrekammedis.id_pasien = pasien.id_pasien');
        $this->db->where('tbrekammedis.no_rekam_medis', $no_rekam_medis);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_unit_pelayanan_by_name($nama_unit_pelayanan)
    {
        $this->db->select('id_unit_pelayanan');
        $this->db->from('tbpoli');
        $this->db->where('nama_unit_pelayanan', $nama_unit_pelayanan);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_unit_pelayanan($id_pasien, $no_rekam_medis, $id_unit_pelayanan)
    {
        $this->db->set('id_unit_pelayanan', $id_unit_pelayanan);
        $this->db->where('id_pasien', $id_pasien);
        $this->db->where('no_rekam_medis', $no_rekam_medis);
        return $this->db->update('tbrekammedis');
    }

    public function get_data()
    {
        $searchValue = htmlspecialchars($_POST['search']['value']);
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', $_POST['length']);
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', $_POST['start']);

        $whereSql = "";
        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $whereSql .= " AND {$key} = '{$value}'";
            }
        }

        $isWhereSql = "";
        if (!empty($iswhere)) {
            $isWhereSql = " AND {$iswhere}";
        }

        $cari = implode(" LIKE '%{$searchValue}%' OR ", $search) . " LIKE '%{$searchValue}%'";
        $orderField = $_POST['order'][0]['column'];
        $orderAscDesc = $_POST['order'][0]['dir'];
        $order = " ORDER BY " . $_POST['columns'][$orderField]['data'] . " " . $orderAscDesc;

        // Query to join tables and fetch data
        $sqlCount = $this->db->query("SELECT tbrekammedis.*, pasien.nama_pasien, tbpoli.nama_unit_pelayanan 
                                      FROM {$tables} 
                                      JOIN pasien ON tbrekammedis.id_pasien = pasien.id_pasien 
                                      JOIN tbpoli ON tbrekammedis.id_unit_pelayanan = tbpoli.id_unit_pelayanan 
                                      WHERE 1=1 {$whereSql} {$isWhereSql}");
        $totalRecords = $sqlCount->num_rows();

        $sqlData = $this->db->query("SELECT tbrekammedis.*, pasien.nama_pasien, tbpoli.nama_unit_pelayanan 
                                     FROM {$tables} 
                                     JOIN pasien ON tbrekammedis.id_pasien = pasien.id_pasien 
                                     JOIN tbpoli ON tbrekammedis.id_unit_pelayanan = tbpoli.id_unit_pelayanan 
                                     WHERE 1=1 {$whereSql} {$isWhereSql} AND ({$cari}) {$order} LIMIT {$limit} OFFSET {$start}");
        $data = $sqlData->result_array();

        $sqlFilter = $this->db->query("SELECT tbrekammedis.*, pasien.nama_pasien, tbpoli.nama_unit_pelayanan 
                                       FROM {$tables} 
                                       JOIN pasien ON tbrekammedis.id_pasien = pasien.id_pasien 
                                       JOIN tbpoli ON tbrekammedis.id_unit_pelayanan = tbpoli.id_unit_pelayanan 
                                       WHERE 1=1 {$whereSql} {$isWhereSql} AND ({$cari})");
        $totalFilteredRecords = $sqlFilter->num_rows();

        $callback = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalFilteredRecords,
            'data' => $data,
        );

        return json_encode($callback);
    }
    public function insert_unit_pelayanan()
    {
        $no_rekam_medis = $this->input->post('no_rekam_medis');
        $nama_unit_pelayanan = $this->input->post('nama_unit_pelayanan');

        $data['patients'] = $this->pasien_model->get_pasien_by_no_rm($no_rekam_medis);
        $this->load->view('petugas/vw_tambah_data_unitpelayanan', $data);
    }
    public function get_unit_pelayanan_by_id($id_unit_pelayanan)
    {
        $this->db->select('nama_unit_pelayanan');
        $this->db->from('tbpoli');
        $this->db->where('id_unit_pelayanan', $id_unit_pelayanan);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['nama_unit_pelayanan'];
    }
    public function get_new_patients_umum()
    {
        $this->db->select('*');
        $this->db->from('tbrekammedis');
        $this->db->where('id_unit_pelayanan', 1); // Unit pelayanan umum
        $this->db->where('tanggal_periksa', date('Y-m-d')); // Tanggal periksa hari ini
        $this->db->where('id_unit_pelayanan', $id_unit_pelayanan); // Filter unit pelayanan tertentu
        $query = $this->db->get('tbrekammedis');

        $num_new_patients = $query->num_rows();
        if ($num_new_patients > 0) {
            // Ada pasien baru untuk unit pelayanan ini
            $this->session->set_flashdata('message', 'Anda memiliki ' . $num_new_patients . ' pasien baru.');
        } else {
            // Tidak ada pasien baru untuk unit pelayanan ini
            $this->session->set_flashdata('message', 'Tidak ada pasien baru.');
        }

        // Redirect ke halaman yang sesuai untuk menampilkan notifikasi
        redirect('dokter/notifikasi');
    }
    public function get_kunjungan_data()
    {
        $this->db->select('tbrekammedis.id_rekam_medis, tbrekammedis.no_rekam_medis, pasien.nama as nama_pasien, tbkunjungan.nama_pelayanan, tbrekammedis.diagnosa_medis, tbrekammedis.diagnosa_keperawatan, user.nama as nama_dokter');
        $this->db->from('tbrekammedis');
        $this->db->join('tbkunjungan', 'tbkunjungan.no_rekam_medis = tbrekammedis.no_rekam_medis');
        $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien');
        $this->db->join('user', 'tbrekammedis.id_user = user.id_user');
        $query = $this->db->get();

        if ($query === false) {
            log_message('error', 'Error in query: ' . $this->db->last_query());
            return array(); // Pastikan mengembalikan array kosong jika query gagal
        }

        return $query->result_array();
    }
    public function get_rekammedis_by_idrekammedis($id_rekam_medis)
    {
        $this->db->select('tbrekammedis.*, tbkunjungan.no_rekam_medis, tbkunjungan.nama_pelayanan, pasien.nama_pasien, user.nama');
        $this->db->from('tbrekammedis');
        $this->db->join('tbkunjungan', 'tbrekammedis.id_kunjungan = tbkunjungan.id_kunjungan');
        $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien');
        $this->db->join('user', 'tbkunjungan.id_user = user.id_user');
        $this->db->where('tbrekammedis.id_rekam_medis', $id_rekam_medis);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or handle the case where no record is found
        }
    }
    public function get_rekam_medis_by_nama_pelayanan($nama_pelayanan)
    {
        $this->db->select('trm.*, u.nama, tbk.no_rekam_medis, p.nama_pasien, tbk.nama_pelayanan');
        $this->db->from('tbrekammedis as trm');
        $this->db->join('user as u', 'trm.id_user = u.id_user', 'left');
        $this->db->join('tbkunjungan as tbk', 'tbk.id_kunjungan = trm.id_kunjungan', 'left');
        $this->db->join('pasien as p', 'p.id_pasien = tbk.id_pasien', 'left');
        $this->db->where('tbk.nama_pelayanan', $nama_pelayanan);
        $this->db->distinct();
        return $this->db->get()->result_array();
    }

    public function get_rekammedisByid($id)
    {
        $this->db->select('
        trm.*, 
        trm.id_rekam_medis as id_rekam, 
        u.nama,
        tbk.no_rekam_medis, 
        p.nama_pasien, 
         tbk.id_kunjungan, 
        tbk.tanggal_kunjungan, 
        tbk.nama_pelayanan, 
        p.umur, 
        p.jenis_kelamin, 
        tbk.id_kunjungan, 
        tbg.*, 
        tbk.nama_ayah, 
        tbk.nama_ibu, 
        tbk.berat_lahir, 
        tbk.umur_ayah, 
        tbk.umur_ibu, 
          tbk.nama_suami, 
        tbk.umur_suami, 
        tg.odontogram, 
        tba.*, tbu.*
    ');
        $this->db->from('tbrekammedis as trm');
        $this->db->join('user as u', 'trm.id_user = u.id_user', 'left');
        $this->db->join('tbkunjungan as tbk', 'tbk.id_kunjungan = trm.id_kunjungan', 'left');
        $this->db->join('pasien as p', 'p.id_pasien = tbk.id_pasien', 'left');
        $this->db->join('tbgigi as tbg', 'tbg.id_rekam_medis = trm.id_rekam_medis', 'left');
        $this->db->join('tbodontogram as tg', 'tbg.id_odontogram = tg.id_odontogram', 'left');
        $this->db->join('tbanak as tba', 'tba.id_rekam_medis = trm.id_rekam_medis', 'left');
        $this->db->join('tbbumil as tbu', 'tbu.id_rekam_medis = trm.id_rekam_medis', 'left');
        $this->db->where('trm.id_rekam_medis', $id);

        $query = $this->db->get();
        return $query->row_array();
    }


    public function getDiagnosaMedis($id_user, $id_poli = '')
   {
        $this->db->select('tbrekammedis.diagnosa_medis, COUNT(tbrekammedis.diagnosa_medis) as jumlah');
        $this->db->from('tbrekammedis');
        $this->db->join('user', 'user.id_user = tbrekammedis.id_user');
    
        // Jika $id_poli diisi, filter berdasarkan id_poli
        if (!empty($id_poli)) {
            $this->db->where('user.id_poli', $id_poli);
        }
    
        $this->db->where('user.id_user', $id_user);
        $this->db->group_by('tbrekammedis.diagnosa_medis');
        $this->db->order_by('jumlah', 'DESC');
        $this->db->limit(5); // Batas hasil menjadi 5 teratas
        $query = $this->db->get();
        return $query->result();
    }
    

    public function getUsiaPasienPerPoliForChart($id_user, $id_poli = '')
    {
        $this->db->select('FLOOR(DATEDIFF(CURDATE(), p.tanggal_lahir)/365) as umur, p.jenis_kelamin, COUNT(*) as jumlah_pasien');
        $this->db->from('tbkunjungan k');
        $this->db->join('pasien p', 'k.id_pasien = p.id_pasien');
        // $this->db->where('k.id_poli', $id_poli);
        $this->db->group_by('umur, p.jenis_kelamin');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJumlahPasienPoliById($id_poli)
    {
        $this->db->select('COUNT(*) as jumlah_pasien');
        $this->db->from('tbkunjungan k');
        $this->db->join('tbpoli tp', 'tp.id_poli = k.id_poli');
        $this->db->where('tp.id_poli', $id_poli);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_pasien;
        } else {
            return 0; // Return 0 if no rows
        }
    }
    public function getJumlahRekamMedisPerPoliDokter($id_user, $id_poli = '')
    {
        $this->db->select('COUNT(rm.id_rekam_medis) as jumlah_rekam_medis');
        $this->db->from('tbrekammedis rm');
        $this->db->join('tbkunjungan k', 'rm.id_kunjungan = k.id_kunjungan');
        $this->db->join('user u', 'u.id_user = rm.id_user');
        $this->db->where('u.role', 'Dokter'); // Ensure we're dealing with doctors
        $this->db->where('rm.id_user', $id_user); // Filter berdasarkan user
        $query = $this->db->get();
        return $query->row()->jumlah_rekam_medis ?? 0; // Return 0 if no rows
    }
    public function getDailyVisits($id_user, $id_poli = '')
    {
        $this->db->select('DATE(k.tanggal_kunjungan) AS visit_date, COUNT(*) AS visit_count');
        $this->db->from('tbkunjungan k');
        $this->db->join('tbrekammedis r', 'k.id_kunjungan = r.id_kunjungan');
        // $this->db->where('k.id_poli', $id_poli);
        $this->db->where('r.id_user', $id_user);
        $this->db->group_by('DATE(k.tanggal_kunjungan)');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan jumlah kunjungan per minggu
    public function getWeeklyVisits($id_user, $id_poli = '')
    {
        $this->db->select('YEAR(k.tanggal_kunjungan) AS year, WEEK(k.tanggal_kunjungan, 1) AS week, COUNT(*) AS visit_count');
        $this->db->from('tbkunjungan k');
        $this->db->join('tbrekammedis r', 'k.id_kunjungan = r.id_kunjungan');
        // $this->db->where('k.id_poli', $id_poli);
        $this->db->where('r.id_user', $id_user);
        $this->db->group_by('YEAR(k.tanggal_kunjungan), WEEK(k.tanggal_kunjungan, 1)');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan jumlah kunjungan per bulan
    public function getMonthlyVisits($id_user, $id_poli = '')
    {
        $this->db->select('YEAR(k.tanggal_kunjungan) AS year, MONTH(k.tanggal_kunjungan) AS month, COUNT(*) AS visit_count');
        $this->db->from('tbkunjungan k');
        $this->db->join('tbrekammedis r', 'k.id_kunjungan = r.id_kunjungan');
        // $this->db->where('k.id_poli', $id_poli);
        $this->db->where('r.id_user', $id_user);
        $this->db->group_by('YEAR(k.tanggal_kunjungan), MONTH(k.tanggal_kunjungan)');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan jumlah kunjungan per tahun
    public function getYearlyVisits($id_user, $id_poli = '')
    {
        $this->db->select('YEAR(k.tanggal_kunjungan) AS year, COUNT(*) AS visit_count');
        $this->db->from('tbkunjungan k');
        $this->db->join('tbrekammedis r', 'k.id_kunjungan = r.id_kunjungan');
        // $this->db->where('k.id_poli', $id_poli);
        $this->db->where('r.id_user', $id_user);
        $this->db->group_by('YEAR(k.tanggal_kunjungan)');
        $query = $this->db->get();
        return $query->result_array();
    }
}
