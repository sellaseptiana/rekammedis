<?php
defined('BASEPATH') or exit('No direct script access allowed');

class obat_model extends CI_Model
{
    public $table = 'tbobat';
    public $primary_key = 'id_obat';
    
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
    public function get_all_obat() {
        $query = $this->db->get('tbobat');
        return $query->result();
    }
    public function get_stok($id_obat) {
        // Ambil stok obat dari database
        $this->db->select('stok'); 
        $this->db->from('tbobat'); 
        $this->db->where('id_obat', $id_obat);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->stok; // Mengembalikan stok obat
        } else {
            return 0; // Jika obat tidak ditemukan, kembalikan 0
        }
    }
    public function update_stok($id_obat, $stok_baru) {
        $this->db->set('stok', $stok_baru); // Set nilai stok baru
        $this->db->where('id_obat', $id_obat);
        return $this->db->update('tbobat'); // Sesuaikan dengan nama tabel obat di database Anda
    }
    public function getById($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function insert_resep($data)
    {
        $this->db->insert('tbresep', $data);
        return $this->db->insert_id(); 
    }
    public function get_by_id($id_obat)
    {
        $this->db->where('id_obat', $id_obat);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
    public function update($id_obat, $data_obat)
    {
        $this->db->where('id_obat', $id_obat);
        $this->db->update($this->table, $data_obat);
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    public function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    
    public function get_tables_obat($tables, $search, $where, $iswhere)
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
    
    public function get_total_obat() {
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tbobat');
        return $query->row()->total;
    }
}