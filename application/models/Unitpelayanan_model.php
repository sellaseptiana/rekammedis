<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Unitpelayanan_model extends CI_Model
    {
        public $table = 'tbpoli';
	public $id = 'tbpoli.id_poli';

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

    public function getBy()
    {
        $this->db->from($this->table);
        $this->db->where('id_poli', $this->session->userdata('id_poli'));
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getByidpoli($id) 
    {
        $this->db->from($this->table);
        $this->db->where('id_poli',$id);
        $query = $this->db->get();
        $this->db->get_where($this->table, ["id_poli" => $id])->row();
        return $query->row_array();
    }
    public function getPoli()
    {
        return $this->db->get('tbpoli')->result_array();
    }
    public function getById($id) 
    {
        $this->db->select('user.id_user, user.nama, user.jenis_kelamin, tbpoli.nama_poli, user.no_hp');
        $this->db->from('user');
        $this->db->join('tbpoli', 'user.id_poli = tbpoli.id_poli', 'left');
        $this->db->where('user.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getprofile($id) 
    {
        $this->db->select('user.id_user, user.nama, user.jenis_kelamin, tbpoli.nama_poli, user.no_hp');
        $this->db->from('user');
        $this->db->join('tbpoli', 'user.id_poli = tbpoli.id_poli', 'left');
        $this->db->where('user.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getByNamaPoli($nama)
    {
        $this->db->where('nama_poli', $nama);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
  
    public function insert($data) {
        return $this->db->insert('tbpoli', $data);
    }

    public function get_all_unit_pelayanan_with_doctors() {
        $this->db->select('tbpoli.*, user.nama as nama_dokter');
        $this->db->from('tbpoli');
        $this->db->join('user', 'user.id_user = tbpoli.id_dokter', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_unitpelayanan($id)
    {
            $this->db->where('id_poli', $id);
            $this->db->delete($this->table);
            return $this->db->affected_rows();
    }
        public function get_patient_by_no_rekam_medis($no_rekam_medis) {
            $this->db->select('tbrekammedis.no_rekam_medis, pasien.nama_pasien, tbpoli.nama_poli');
            $this->db->from('tbrekammedis');
            $this->db->join('pasien', 'tbrekammedis.id_pasien = pasien.id_pasien');
            $this->db->join('tbpoli', 'tbrekammedis.id_poli = tbpoli.id_poli');
                       $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return [];
            }
        }
        public function get_by_name($nama_poli) {
            return $this->db->get_where('tbpoli', ['nama_poli' => $nama_poli])->row();
        }
        public function get_patient_details_by_no_rm($no_rekam_medis) {
            $this->db->select('pasien.no_rekam_medis, pasien.nama_pasien');
            $this->db->from('pasien');
            $this->db->where('pasien.no_rekam_medis', $no_rekam_medis);
            return $query->row_array();
        }
    
        public function get_tables($tables, $search, $where, $isWhere) {
            $searchValue = htmlspecialchars($_POST['search']['value']);
            $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
            $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");
    
            $cari = implode(" LIKE '%".$searchValue."%' OR ", $search)." LIKE '%".$searchValue."%'";
            $orderField = $_POST['order'][0]['column'];
            $orderAscDesc = $_POST['order'][0]['dir'];
            $order = " ORDER BY ".$_POST['columns'][$orderField]['data']." ".$orderAscDesc;
    
            if (!empty($isWhere)) {
                $sql = $this->db->query("SELECT * FROM ".$tables." WHERE ".$isWhere);
            } else {
                $sql = $this->db->query("SELECT * FROM ".$tables);
            }
    
            $sqlCount = $sql->num_rows();
    
            if (!empty($isWhere)) {
                $sqlData = $this->db->query("SELECT * FROM ".$tables." WHERE $isWhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            } else {
                $sqlData = $this->db->query("SELECT * FROM ".$tables." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            }
    
            if (!empty($searchValue)) {
                if (!empty($isWhere)) {
                    $sqlCari = $this->db->query("SELECT * FROM ".$tables." WHERE $isWhere AND (".$cari.")");
                } else {
                    $sqlCari = $this->db->query("SELECT * FROM ".$tables." WHERE (".$cari.")");
                }
                $sqlFilterCount = $sqlCari->num_rows();
            } else {
                if (!empty($isWhere)) {
                    $sqlFilter = $this->db->query("SELECT * FROM ".$tables."WHERE ".$isWhere);
                } else {
                    $sqlFilter = $this->db->query("SELECT * FROM ".$tables);
                }
                $sqlFilterCount = $sqlFilter->num_rows();
            }
    
            $data = $sqlData->result_array();
    
            $callback = array(
                'draw' => $_POST['draw'],
                'recordsTotal' => $sqlCount,
                'recordsFiltered' => $sqlFilterCount,
                'data' => $data
            );
    
            return json_encode($callback);
        }
        public function insert_unitpelayanan($data) {
            return $this->db->insert('tbpoli', $data);
        }
        public function update($where, $data)
        {
            $this->db->where($where);
            return $this->db->update('tbpoli', $data);
        }

    public function update_unit_pelayanan_pasien($id_pasien, $id_poli) {
        $this->db->set('id_poli', $id_poli);
        $this->db->where('id_pasien', $id_pasien);
        return $this->db->update('pasien');
    }
    public function delete_unit_pelayanan($id) {
        $this->db->where('id_poli', $id);
        return $this->db->delete('tbpoli');
    }
    public function getdata($no_rekam_medis) {
        $this->db->select('pasien.id_pasien, tbrekammedis.id_poli');
        $this->db->from('pasien');
        $this->db->join('tbrekammedis', 'pasien.id_pasien = tbrekammedis.id_pasien', 'left');
        $this->db->where('pasien.no_rekam_medis', $no_rekam_medis);
        $query = $this->db->get();
        return $query->row();
    }
    public function get_by_unitpelayanan($nama_poli) {
        $this->db->where('nama_poli', $nama_poli);
        $query = $this->db->get('tbpoli');
        return $query->row();
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
        'nama_poli' => $data['nama_poli']
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

    public function get_all_unit_pelayanan() {
        $this->db->select('tbpoli.*');
        $this->db->from('tbpoli');
        $query = $this->db->get();
        return $query->result_array();
}
    }
