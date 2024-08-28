<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    public $table = 'user';
    public $id = 'user.id_user';

    public function __construct()
    {
        parent::__construct();
        $this->table = 'user';
    }
    public function count_by_role($role) {
        $this->db->where('role', $role);
        return $this->db->count_all_results('user');
    }
    public function get_dokter_by_poli($nama_poli) {
        $this->db->select('id_user, nama');
        $this->db->from('user');
        $this->db->where('role', 'dokter');
        $this->db->where('id_poli', $nama_poli);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getUserById($id_user) {
     
        $this->db->select('id_user, nama, jenis_kelamin, no_hp, alamat, username, role');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get($keyword=null)
    {
        $this->db->select('*');
		$this->db->from('user');
		if(!empty($keyword)){
			$this->db->like('nama',$keyword);
            $this->db->or_like('role',$keyword);
		}
		return $this->db->get()->result_array();
    }
    public function getBy($where)
    {
        return $this->db->get_where('user', $where)->row_array();
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('user', $data);
    }

 
    public function get_dokter_list()
    {
        // Mendapatkan daftar dokter dari tabel user dengan role 'Dokter'
        $this->db->select('id_user, nama');
        $this->db->where('role', 'dokter');
        $query = $this->db->get('user');
        return $query->result_array();
    }
    

    public function getById($id) 
    {
        $this->db->from($this->table);
        $this->db->where('id_user',$id);
        $query = $this->db->get();
        $this->db->get_where($this->table, ["id_user" => $id])->row();
        return $query->row_array();
    }
    public function get_nama_dokter_by_id($id_user) {
        $this->db->select('nama');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');
        return $query->row(); 
    }
  
    public function insert($data)
    {
        if ($this->db->insert('user', $data)) {
            return true;
        } else {
            // Log the error message
            log_message('error', $this->db->error());
            return false;
        }
    }

    public function get_all_poli()
    {
        return $this->db->get('tbpoli')->result_array();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function get_tables_user($tables, $search, $where, $iswhere)
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
    public function hapusDokter($id)
{
    $this->db->where('id_user', $id);
    $this->db->delete('user');
}
public function get_tables_dokter($tables, $search, $where)
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

    // Join tabel user dengan tbpoli
    $sql = "SELECT user.id_user, user.nama, user.jenis_kelamin, tbpoli.nama_poli, user.no_hp 
            FROM {$tables} 
            LEFT JOIN tbpoli ON user.id_poli = tbpoli.id_poli 
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
public function updateDokter($data, $id)
{
    $this->db->where('id_user', $id);
    $this->db->update('user', $data);
}
    public function get_dokter() {
        $this->db->where('role', 'dokter');
        $query = $this->db->get('user');
        return $query->result_array();
    }

public function get_all_dokter() {
    $this->db->select('id_user, nama');
    $this->db->from('user');
    $this->db->where('role', 'dokter'); // Assuming role is used to identify doctors
    $query = $this->db->get();
    return $query->result_array();
}
public function get_apoteker()
{
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('role', 'apoteker');
    return $this->db->get()->result_array();
}

    public function dashboard()
	{
		$this->db->from($this->table);
		$query = $this->db->get();
		$query1 = $this->db->query("SELECT nama, gambar FROM user ORDER BY RAND() LIMIT 5");
        return $query->result_array();
	}
    public function getAllDoctors()
{
    $this->db->select('user.id_user, user.nama, user.jenis_kelamin, tbpoli.nama_poli, user.no_hp');
    $this->db->from('user');
    $this->db->join('tbpoli', 'user.id_poli = tbpoli.id_poli', 'left');
    $this->db->where('user.role', 'dokter');
    $query = $this->db->get();
    return $query->result_array();
}
public function get_doctor_name_by_id($id_user) {
    $this->db->where('id_user', $id_user);
    $query = $this->db->get('user');
    return $query->row()->nama;
}
}