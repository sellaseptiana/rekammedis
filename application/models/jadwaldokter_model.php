<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwaldokter_model extends CI_Model {
    
    private $table = 'tbjadwaldokter';
    private $column_order = array(null, 'user.nama', 'tbpoli.nama_poli' ,'tbjadwaldokter.status', 'tbjadwaldokter.jam');
    private $column_search = array('user.nama','tbpoli.nama_poli', 'tbjadwaldokter.status', 'tbjadwaldokter.jam');
    private $order = array('tbjadwaldokter.id_jadwal_dokter' => 'asc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {
        $this->db->select('tbjadwaldokter.*, user.nama as nama_dokter');
        $this->db->from($this->table);
        $this->db->join('user', 'user.id_user = tbjadwaldokter.id_user');
        $this->db->where('user.role', 'dokter');

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function get_all_dokter() {
        $this->db->select('id_user, nama');
        $this->db->from('user');
        $this->db->where('role', 'dokter'); // Assuming role is used to identify doctors
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getJadwalDokter() {
        $this->db->select('tbjadwaldokter.id_jadwal_dokter, tbjadwaldokter.status, tbjadwaldokter.jam, user.nama AS nama_dokter, tbjadwaldokter.id_poli');
        $this->db->from('tbjadwaldokter');
        $this->db->join('user', 'user.id_user = tbjadwaldokter.id_user');
        $this->db->where('tbjadwaldokter.status', 'Ada');
        $query = $this->db->get();
        
        return $query->result();
    }

    public function get_all_jadwal() {
        $this->db->select('tbjadwaldokter.*, user.nama as nama_dokter, tbpoli.nama_poli as nama_poli');
        $this->db->from('tbjadwaldokter');
        $this->db->join('user', 'tbjadwaldokter.id_user = user.id_user', 'left');
        $this->db->join('tbpoli', 'tbjadwaldokter.id_poli = tbpoli.id_poli', 'left');
        $this->db->where('user.role', 'dokter');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_dokter_detail($id_jadwal_dokter) {
        $this->db->select('tbjadwaldokter.*, user.nama, tbpoli.nama_poli');
        $this->db->from('tbjadwaldokter');
        $this->db->join('user', 'tbjadwaldokter.id_user = user.id_user', 'left');
        $this->db->join('tbpoli', 'tbjadwaldokter.id_poli = tbpoli.id_poli', 'left');
        $this->db->where('tbjadwaldokter.id_jadwal_dokter', $id_jadwal_dokter);
        return $this->db->get()->row_array();
    }
    public function hapus_jadwal($id_jadwal_dokter) {
        return $this->db->delete('tbjadwaldokter', array('id_jadwal_dokter' => $id_jadwal_dokter));
    }

    public function insert_jadwal($data) {
        return $this->db->insert('tbjadwaldokter', $data);
    }
    public function get_jadwal_by_id($id_jadwal) {
        $this->db->from($this->table);
        $this->db->where('id_jadwal_dokter',$id_jadwal);
        $query = $this->db->get();
        $this->db->get_where($this->table, ["id_jadwal_dokter" => $id_jadwal])->row();
        return $query->row_array();
    }
    public function get_dokter_by_poli($nama_poli) {
        $this->db->where('nama_poli', $nama_poli);
        return $this->db->get('user')->result_array();
    }
    
    public function update_jadwal($id_jadwal, $data) {
        $this->db->where('id_jadwal_dokter', $id_jadwal);
        return $this->db->update('tbjadwaldokter', $data);
    }
    public function get_tables_jadwaldokter($tables, $search, $where)
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
    
        // Join tabel tbjadwaldokter dengan user dan filter berdasarkan role dokter
        $sql = "SELECT tbjadwaldokter.*, user.nama as nama_dokter, tbpoli.nama_poli as nama_poli
                FROM {$tables}
                LEFT JOIN user ON tbjadwaldokter.id_user = user.id_user 
                LEFT JOIN tbpoli ON tbjadwaldokter.id_poli = tbpoli.id_poli 
                WHERE user.role = 'dokter' {$whereSql}";
    
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
    public function get_available_jadwal_dokter() {
        $this->db->where('status', 'Ada');
        $query = $this->db->get('tbjadwaldokter');
        return $query->result_array();
    }
      public function get()
    {
        return $this->db->get('user')->result_array();
    }
}
?>
