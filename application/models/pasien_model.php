<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pasien_model extends CI_Model
    {
        public $table = 'pasien';
	public $id = 'pasien.id_pasien';

	public function __construct()
	{
		parent::__construct();
	}
    public function get_patient_gender_by_age() {
        $this->db->select("
        CASE 
            WHEN umur BETWEEN 0 AND 15 THEN '0-15'
            WHEN umur BETWEEN 16 AND 30 THEN '16-30'
            WHEN umur BETWEEN 31 AND 45 THEN '31-45'
            WHEN umur BETWEEN 46 AND 60 THEN '46-60'
            WHEN umur > 60 THEN '>60'
            ELSE 'Unknown'
        END AS age_range,
        jenis_kelamin,
        COUNT(*) AS count
    ");
    $this->db->from('pasien');
    $this->db->group_by(['age_range', 'jenis_kelamin']);
    $this->db->order_by("FIELD(age_range, '0-15', '16-30', '31-45', '46-60', '>60'), jenis_kelamin");
    $query = $this->db->get();
    return $query->result();
    }
    
    
    public function count_by_status() {
        $this->db->select('status, COUNT(*) as count');
        $this->db->group_by('status');
        $query = $this->db->get('tbkunjungan');
        
        if ($query === false) {
            // Print the last query and any error message
            log_message('error', 'Query failed: ' . $this->db->last_query());
            log_message('error', 'Error message: ' . $this->db->error()['message']);
            return [];
        }
    
        return $query->result();
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
        $this->db->where('id_pasien', $this->session->userdata('id_pasien'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->from($this->table);
        $this->db->where('id_pasien',$id);
        $query = $this->db->get();
        $this->db->get_where($this->table, ["id_pasien" => $id])->row();
        return $query->row_array();
    }
    public function get_by_id($id_pasien) {
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->get('pasien')->row();
    }
    public function get_pasien_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->where('id_pasien', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getPasienById($id_pasien)
    {
        return $this->db->get_where('pasien', ['id_pasien' => $id_pasien])->row_array();
    }
    public function get_pasien_by_idpasien($id_pasien)
    {
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->get('pasien')->row_array();
    }
    public function update_pasien($id, $data)
    {
        $this->db->where('id_pasien', $id);
        return $this->db->update('pasien', $data);
    }

    
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    public function delete_pasien($id)
    {
            $this->db->where('id_pasien', $id);
            $this->db->delete($this->table);
            return $this->db->affected_rows();
    }
    
    // public function get_all_pasien() {
    //     $this->db->select('pasien.*, tbpoli.nama_unit_pelayanan');
    //     $this->db->from('pasien');
    //     $this->db->join('tbrekammedis', 'pasien.id_pasien = tbrekammedis.id_pasien', 'left');
    //     $this->db->join('tbpoli', 'tbrekammedis.id_poli = tbpoli.id_poli', 'left');
    //     return $this->db->get()->result_array();
    // }

    public function get_tables_pasien($tables, $search, $where, $iswhere)
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
    
        // Fetch total count of records
        $sqlCount = $this->db->query("SELECT * FROM {$tables} WHERE 1=1 {$whereSql} {$isWhereSql}");
        $totalRecords = $sqlCount->num_rows();
    
        // Fetch filtered data
        $sqlData = $this->db->query("SELECT * FROM {$tables} WHERE 1=1 {$whereSql} {$isWhereSql} AND ({$cari}) {$order} LIMIT {$limit} OFFSET {$start}");
        $data = $sqlData->result_array();
    
        // Fetch total number of filtered records
        $sqlFilter = $this->db->query("SELECT * FROM {$tables} WHERE 1=1 {$whereSql} {$isWhereSql} AND ({$cari})");
        $totalFilteredRecords = $sqlFilter->num_rows();
    
        $callback = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalFilteredRecords,
            'data' => $data,
        );
    
        return json_encode($callback);
    }
  
//     public function cek_nomor_rm($no_rm)
//     {
//         $this->db->select('pasien.nama_pasien');
//     $this->db->from('tbkunjungan');
//     $this->db->join('pasien', 'pasien.id_pasien = tbkunjungan.id_pasien');
//     $this->db->where('tbkunjungan.no_rekam_medis', $no_rm);
//     $query = $this->db->get();
//     return $query->row();
// }
public function cek_nomor_rm_db($no_rekam_medis) {
    $this->db->select('tbrekammedis.*, pasien.nama_pasien, pasien.umur,tbkunjungan.id_kunjungan, tbkunjungan.no_rekam_medis');
    $this->db->from('tbkunjungan');
    $this->db->join('tbrekammedis', 'tbkunjungan.id_kunjungan = tbrekammedis.id_kunjungan', 'left');
    $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien');
    $this->db->where('tbkunjungan.no_rekam_medis', $no_rekam_medis);
    return $this->db->get()->result_array();
}
public function get_patient_data($patient_id) {
    $query = $this->db->get_where('pasien', array('id_pasien' => $patient_id));
    return $query->row();
}

    public function get_pasien_by_no_rm($no_rekam_medis) {
        $this->db->select('pasien.no_rekam_medis, pasien.nama_pasien, tbpoli.nama_unit_pelayanan');
        $this->db->from('pasien');
        $this->db->join('tbrekammedis', 'pasien.id_pasien = tbrekammedis.id_pasien', 'left');
        $this->db->join('tbpoli', 'tbrekammedis.id_poli = tbpoli.id_poli', 'left');
        $this->db->where('pasien.no_rekam_medis', $no_rekam_medis);
        $query = $this->db->get();
        return $query->row();
    }
 
    public function get_by_no_rekam_medis($no_rekam_medis) {
        $this->db->where('no_rekam_medis', $no_rekam_medis);
        $query = $this->db->get('pasien');
        return $query->row();
    }
    public function getUmurByIdPasien($id_pasien) {
        // Query to get patient's age from the database
        $query = $this->db->get_where('pasien', array('id_pasien' => $id_pasien));

        if ($query->num_rows() > 0) {
            $row = $query->row();
            // Assuming that 'umur' is the column in the 'pasien' table that stores the patient's age
            return $row->umur;
        }

        return 0; // Default age if not found
    }
    public function get_umur_pasien($id_pasien)
    {
      
    $this->db->select('umur');
    $this->db->from('pasien');
    $this->db->where('id_pasien', $id_pasien);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->umur;
    }

    return 0; // Default, jika tidak ditemukan umur pasien
}
    }
