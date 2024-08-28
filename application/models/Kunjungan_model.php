<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kunjungan_model extends CI_Model
    {
        public $table = 'tbkunjungan';
	public $id = 'tbkunjungan.id_kunjungan';

	public function __construct()
	{
		parent::__construct();
	}

	public function get($keyword=null)
    {
		$this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function cekRekamMedis($id_kunjungan)
    {
        $this->db->select('id_rekam_medis');
        $this->db->from('tbrekammedis');
        $this->db->where('id_kunjungan', $id_kunjungan);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true; // Rekam medis sudah ada
        } else {
            return false; // Rekam medis belum ada
        }
    }
    public function get_total_visits() {
        // Assuming you have a table `visits` to count total visits
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tbkunjungan');
        return $query->row()->total;
    }
    public function count_by_status() {
        $this->db->select('status, COUNT(*) as count');
        $this->db->group_by('status');
        $query = $this->db->get('tbkunjungan');
        return $query->result();
    }
    
    public function count_visits_by_poli() {
        $this->db->select('tbpoli.nama_poli, COUNT(*) as count');
        $this->db->join('tbpoli', 'tbpoli.id_poli = tbkunjungan.id_poli');
        $this->db->group_by('tbpoli.nama_poli');
        $query = $this->db->get('tbkunjungan');
        return $query->result();
    }
    
    public function count_visits_by_age() {
        $this->db->select('pasien.umur, COUNT(*) as count');
        $this->db->join('pasien', 'pasien.id_pasien = tbkunjungan.id_pasien');
        $this->db->group_by('pasien.umur');
        $query = $this->db->get('tbkunjungan');
        return $query->result();
    }
    
    public function count_visits_by_date($type) {
        if ($type == 'daily') {
            $this->db->select('DATE(tanggal_kunjungan) as date, COUNT(*) as count');
            $this->db->group_by('DATE(tanggal_kunjungan)');
        } elseif ($type == 'weekly') {
            $this->db->select('YEARWEEK(tanggal_kunjungan) as week, COUNT(*) as count');
            $this->db->group_by('YEARWEEK(tanggal_kunjungan)');
        } elseif ($type == 'monthly') {
            $this->db->select('YEAR(tanggal_kunjungan) as year, MONTH(tanggal_kunjungan) as month, COUNT(*) as count');
            $this->db->group_by(array('YEAR(tanggal_kunjungan)', 'MONTH(tanggal_kunjungan)'));
        } elseif ($type == 'yearly') {
            $this->db->select('YEAR(tanggal_kunjungan) as year, COUNT(*) as count');
            $this->db->group_by('YEAR(tanggal_kunjungan)');
        }
        $query = $this->db->get('tbkunjungan');
        return $query->result();
    }
    
    public function get_visits_by_poli() {
        $this->db->select('tbpoli.nama_poli, COUNT(*) as count');
        $this->db->join('tbpoli', 'tbpoli.id_poli = tbkunjungan.id_poli');
        $this->db->group_by('tbpoli.nama_poli');
        $query = $this->db->get('tbkunjungan');
        return $query->result();
    }
    public function getDailyVisits() {
        $query = $this->db->query("SELECT DATE(tanggal_kunjungan) AS visit_date, COUNT(*) AS visit_count
                                   FROM tbkunjungan
                                   WHERE DATE(tanggal_kunjungan) = CURDATE()
                                   GROUP BY DATE(tanggal_kunjungan)");
        return $query->result_array();
    }

    public function getWeeklyVisits() {
        $query = $this->db->query("SELECT YEAR(tanggal_kunjungan) AS year, WEEK(tanggal_kunjungan, 1) AS week, COUNT(*) AS visit_count
                                   FROM tbkunjungan
                                   WHERE YEARWEEK(tanggal_kunjungan, 1) = YEARWEEK(CURDATE(), 1)
                                   GROUP BY YEAR(tanggal_kunjungan), WEEK(tanggal_kunjungan, 1)");
        return $query->result_array();
    }

    public function getMonthlyVisits() {
        $query = $this->db->query("SELECT YEAR(tanggal_kunjungan) AS year, MONTH(tanggal_kunjungan) AS month, COUNT(*) AS visit_count
                                   FROM tbkunjungan
                                   WHERE YEAR(tanggal_kunjungan) = YEAR(CURDATE())
                                   GROUP BY YEAR(tanggal_kunjungan), MONTH(tanggal_kunjungan)");
        return $query->result_array();
    }

    public function getYearlyVisits() {
        $query = $this->db->query("SELECT YEAR(tanggal_kunjungan) AS year, COUNT(*) AS visit_count
                                   FROM tbkunjungan
                                   GROUP BY YEAR(tanggal_kunjungan)");
        return $query->result_array();
    
}
    public function getBy()
    {
        $this->db->from($this->table);
        $this->db->where('id_bumil', $this->session->userdata('id_bumil'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->from($this->table);
        $this->db->where('id_kunjungan',$id);
        $query = $this->db->get();
        $this->db->get_where($this->table, ["id_kunjungan" => $id])->row();
        return $query->row_array();
    }
    public function check_existing_visit($no_rekam_medis, $tanggal_kunjungan, $id_poli) {
        $this->db->where('no_rekam_medis', $no_rekam_medis);
        $this->db->where('tanggal_kunjungan', $tanggal_kunjungan);
        $this->db->where('id_poli', $id_poli);
        $query = $this->db->get('tbkunjungan');

        if ($query->num_rows() > 0) {
            // Jika ada data yang ditemukan
            return true;
        } else {
            // Jika tidak ada data yang ditemukan
            return false;
        }
    }
    public function get_all_kunjungan()
{
    $this->db->select('
        tbkunjungan.*, 
        pasien.nama_pasien as nama_pasien, 
        tbpoli.nama_poli as nama_poli, 
        user.nama as nama_dokter
    ');
    $this->db->from('tbkunjungan');
    $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien', 'left');
    $this->db->join('tbpoli', 'tbkunjungan.id_poli = tbpoli.id_poli', 'left');
    $this->db->join('user', 'tbkunjungan.id_user = user.id_user', 'left');

    $query = $this->db->get();
    return $query->result_array();
}

    public function get_kunjungan_by_allpoli($nama_poli) {
        $this->db->select('k.*, pasien.*');
        $this->db->from('tbkunjungan k');
        $this->db->join('tbpoli p', 'k.id_poli = p.id_poli');
        $this->db->join('pasien', 'k.id_pasien = pasien.id_pasien');
        $this->db->where('p.nama_poli', $nama_poli);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
	
    public function get_tables_kunjungan($tables, $search, $where)
{
    $searchValue = isset($_POST['search']['value']) ? htmlspecialchars($_POST['search']['value']) : '';
    $limit = isset($_POST['length']) ? intval($_POST['length']) : 10;
    $start = isset($_POST['start']) ? intval($_POST['start']) : 0;

    $whereSql = "";
    if (!empty($where)) {
        foreach ($where as $key => $value) {
            $whereSql .= " AND {$key} = '{$value}'";
        }
    }

    $cari = implode(" LIKE '%{$searchValue}%' OR ", $search) . " LIKE '%{$searchValue}%'";
    $orderField = 0; // Default order field
    $orderAscDesc = 'asc'; // Default order direction
    if (isset($_POST['columns']) && is_array($_POST['columns']) && isset($_POST['order'][0]['column'])) {
        $orderField = intval($_POST['order'][0]['column']);
        if (isset($_POST['columns'][$orderField]['data'])) {
            $orderAscDesc = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc';
        }
    }

    $order = " ORDER BY " . $_POST['columns'][$orderField]['data'] . " " . $orderAscDesc;

    // Join tabel tbkunjungan dengan pasien dan tbpoli
    $sql = "SELECT tbkunjungan.*, pasien.nama_pasien, tbpoli.nama_poli 
            FROM {$tables} 
            LEFT JOIN pasien ON tbkunjungan.id_pasien = pasien.id_pasien 
            LEFT JOIN tbpoli ON tbkunjungan.id_poli = tbpoli.id_poli 
            WHERE 1=1 {$whereSql}";

    // Fetch total count of records
    $sqlCount = $this->db->query($sql);
    $totalRecords = $sqlCount->num_rows();

    // Fetch filtered data
    $sqlData = $this->db->query("$sql AND ({$cari}) {$order} LIMIT {$limit} OFFSET {$start}");
    $data = $sqlData->result_array();

    // Fetch total number of filtered records
    $sqlFilter = $this->db->query("$sql AND ({$cari})");
    $totalFilteredRecords = $sqlFilter->num_rows();

    $callback = array(
        'draw' => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $totalFilteredRecords,
        'data' => $data,
    );

    return json_encode($callback);
}
public function get_tables_rekammedis($tables, $search, $where) {
    $searchValue = isset($_POST['search']['value']) ? htmlspecialchars($_POST['search']['value']) : '';
    $limit = isset($_POST['length']) ? intval($_POST['length']) : 10;
    $start = isset($_POST['start']) ? intval($_POST['start']) : 0;

    $whereSql = "";
    if (!empty($where)) {
        foreach ($where as $key => $value) {
            $whereSql .= " AND {$key} = '{$value}'";
        }
    }

    $cari = implode(" LIKE '%{$searchValue}%' OR ", $search) . " LIKE '%{$searchValue}%'";
    $orderField = isset($_POST['order'][0]['column']) ? intval($_POST['order'][0]['column']) : 0;
    $orderAscDesc = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc';
    $order = " ORDER BY " . $_POST['columns'][$orderField]['data'] . " " . $orderAscDesc;

    $sql = "SELECT tbrekammedis.id_rekam_medis, tbrekammedis.no_rekam_medis, pasien.nama as nama_pasien, tbkunjungan.nama_pelayanan, tbrekammedis.diagnosa_medis, tbrekammedis.diagnosa_keperawatan, user.nama as nama_dokter 
            FROM {$tables} 
            LEFT JOIN tbkunjungan ON tbkunjungan.no_rekam_medis = tbrekammedis.no_rekam_medis 
            LEFT JOIN pasien ON tbkunjungan.id_pasien = pasien.id_pasien 
            LEFT JOIN user ON tbrekammedis.id_user = user.id_user 
            WHERE 1=1 {$whereSql}";

    $sqlCount = $this->db->query($sql);
    $totalRecords = $sqlCount->num_rows();

    $sqlData = $this->db->query("$sql AND ({$cari}) {$order} LIMIT {$limit} OFFSET {$start}");
    if ($sqlData === false) {
        log_message('error', 'Error in query: ' . $this->db->last_query());
        return json_encode(array(
            'draw' => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'data' => []
        ));
    }

    $data = $sqlData->result_array();

    $sqlFilter = $this->db->query("$sql AND ({$cari})");
    $totalFilteredRecords = $sqlFilter->num_rows();

    $callback = array(
        'draw' => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $totalFilteredRecords,
        'data' => $data,
    );

    return json_encode($callback);
}

public function cek_pasien_by_ktp($no_ktp) {
    $this->db->where('no_ktp', $no_ktp);
    return $this->db->get('pasien')->row_array();
}

public function check_no_rekam_medis_by_ktp($no_ktp)
{
    $this->db->select('tbkunjungan.*, pasien.nama_pasien');
    $this->db->from('tbkunjungan');
    $this->db->join('pasien', 'pasien.id_pasien = tbkunjungan.id_pasien');
    $this->db->where('pasien.no_ktp', $no_ktp);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row()->no_rekam_medis;
    } else {
        return false;
    }
}

public function cek_pasien_by_rekam_medis($no_rekam_medis) {
    $this->db->select('tbkunjungan.*, pasien.nama_pasien');
    $this->db->from('tbkunjungan');
    $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien');
    $this->db->where('tbkunjungan.no_rekam_medis', $no_rekam_medis);
    return $this->db->get()->row_array();
}
public function get_pasien_by_id($id_pasien) {
    return $this->db->get_where('pasien', ['id_pasien' => $id_pasien])->row_array();
}
public function tambah_kunjungan($data)
{
    return $this->db->insert('tbkunjungan', $data);
}
public function get_kunjungan_by_id($id_kunjungan) {
    $this->db->select('tbkunjungan.*, tbpoli.nama_poli, ');
    $this->db->from('tbkunjungan');
    $this->db->join('tbpoli', 'tbkunjungan.id_poli = tbpoli.id_poli');
    $this->db->where('tbkunjungan.id_kunjungan', $id_kunjungan);
    return $this->db->get()->row_array();
}
public function get_kunjungan_by_no_rekam_medis($no_rekam_medis)
{
    $this->db->select('pasien.*, tbkunjungan.no_rekam_medis');
    $this->db->from('tbkunjungan');
    $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien');
    $this->db->where('tbkunjungan.no_rekam_medis', $no_rekam_medis);
    return $this->db->get()->row_array();
}


public function get_visit_by_rekam_medis($no_rekam_medis) {
    $this->db->where('no_rekam_medis', $no_rekam_medis);
    return $this->db->get('tbkunjungan')->result_array();
}

public function get_all_visits_by_pasien($id_pasien) {
    $this->db->select('tbkunjungan.*, tbpoli.nama_poli, pasien.nama_pasien');
    $this->db->from('tbkunjungan');
    $this->db->join('tbpoli', 'tbpoli.id_poli = tbkunjungan.id_poli');
    $this->db->join('pasien', 'pasien.id_pasien = tbkunjungan.id_pasien');
    $this->db->where('tbkunjungan.id_pasien', $id_pasien);
    return $this->db->get()->result_array();
}


public function update_kunjungan($id_kunjungan, $data) {
    $this->db->where('id_kunjungan', $id_kunjungan);
    $this->db->update('tbkunjungan', $data);
}

public function delete_kunjungan($id_kunjungan) {
    $this->db->where('id_kunjungan', $id_kunjungan);
    $this->db->delete('tbkunjungan');
}
public function get_data_kunjungan($nama_poli)
{
    $this->db->select('tbkunjungan.*, pasien.nama_pasien, pasien.tanggal_lahir, pasien.umur, pasien.alamat, pasien.jenis_kelamin,pasien.pendidikan, pasien.pekerjaan, pasien.no_hp, tbpoli.nama_poli');
    $this->db->from('tbkunjungan');
    $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien');
    $this->db->join('tbpoli', 'tbpoli.id_poli = tbkunjungan.id_poli');
    $this->db->where('tbpoli.nama_poli', $nama_poli);
    $query = $this->db->get();
    return $query->result_array();
}
public function getKunjunganById($id_kunjungan)
{
    return $this->db->get_where('tbkunjungan', ['id_kunjungan' => $id_kunjungan])->row_array();
}

public function get_kunjungan_rekammedis($id_kunjungan) {
    $this->db->where('id_kunjungan', $id_kunjungan);
    $query = $this->db->get('tbkunjungan');
    return $query->row();
}
public function getByIdkunjunganpasien($id) {
    $this->db->select('*');
    $this->db->from('tbkunjungan');
    $this->db->where('id_kunjungan', $id);
    $query = $this->db->get();
    return $query->row_array();
}
public function getByIdkunjungan($id)
{
    $this->db->select('
        tbkunjungan.id_kunjungan,
        tbkunjungan.no_rekam_medis,
        pasien.nama_pasien,
        pasien.tanggal_lahir,
        pasien.umur,
        pasien.alamat,
        pasien.jenis_kelamin,
        pasien.pendidikan,
        pasien.pekerjaan,
        pasien.no_hp,
        tbkunjungan.tanggal_kunjungan,
        tbkunjungan.status,
        tbkunjungan.no_bpjs,
        tbpoli.nama_poli,
        tbkunjungan.nama_pelayanan,
        tbkunjungan.nama_ibu,
        tbkunjungan.nama_ayah,
        tbkunjungan.berat_lahir,
        tbkunjungan.umur_ibu,
        tbkunjungan.umur_ayah,
        tbkunjungan.nama_suami,
        tbkunjungan.umur_suami,
        tbkunjungan.pekerjaan_suami,
        tbkunjungan.pendidikan_suami,
        tbkunjungan.tanggal_lahir_suami
    ');
    $this->db->from('pasien');
    $this->db->join('tbkunjungan', 'tbkunjungan.id_pasien = pasien.id_pasien');
    $this->db->join('tbpoli', 'tbpoli.id_poli = tbkunjungan.id_poli');
    $this->db->where('tbkunjungan.id_kunjungan', $id);
    $query = $this->db->get();
    
    return $query->row_array();
}
public function get_kunjungan_by_poli($nama_poli) {
    $this->db->select('k.*, pasien.nama_pasien, user.nama');
    $this->db->from('tbkunjungan k');
    $this->db->join('tbpoli p', 'k.id_poli = p.id_poli');
    $this->db->join('pasien', 'k.id_pasien = pasien.id_pasien');
    $this->db->join('user', 'k.id_user = user.id_user');
    $this->db->where('p.nama_poli', $nama_poli);
    $query = $this->db->get();
    return $query->result_array();
}
    }
    