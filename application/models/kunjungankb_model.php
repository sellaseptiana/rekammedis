<?php
defined('BASEPATH') or exit('No direct script access allowed');
class kunjungankb_model extends CI_Model
    {
        public $table = 'tbkunjungankb';
	public $id = 'tbkunjungankb.id_kunjungan_kb';

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
        $this->db->where('id_kunjungan_kb', $this->session->userdata('id_kunjungan_kb'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getById($id) 
    {
        $this->db->from($this->table);
        $this->db->where('id_kunjungan_kb',$id);
        $query = $this->db->get();
        $this->db->get_where($this->table, ["id_kunjungan_kb" => $id])->row();
        return $query->row_array();
    }

    public function update_kunjungan($id, $data) {
        $this->db->where('id_kunjungan', $id);
        return $this->db->update('kunjungan', $data);
    }

    public function delete_kunjungan($id) {
        $this->db->where('id_kunjungan', $id);
        return $this->db->delete('kunjungan');
    }
    public function insert($data) {
        $this->db->insert('tbkunjungankb', $data);
        return $this->db->insert_id();
    }

	
    function get_tables($tables,$cari,$iswhere)
        {
            // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
            // Ambil data limit per page
       $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
            // Ambil data start
        $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 
        $query = $tables;    
        if(!empty($iswhere)){
            $sql = $this->db->query("SELECT * FROM ".$query." WHERE ".$iswhere);
        }else{                $sql = $this->db->query("SELECT * FROM ".$query);
            }
        $sql_count = $sql->num_rows();
        $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";    
            // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column']; 
        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir']; 
        $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;
             if(!empty($iswhere)){
            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
        }else{
                 $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
        }
           if(isset($search))
        {
            if(!empty($iswhere)){
                $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE $iswhere (".$cari.")");
            }else{
                $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")");
            }
            $sql_filter_count = $sql_cari->num_rows();
             }else{
           if(!empty($iswhere)){
                $sql_filter = $this->db->query("SELECT * FROM ".$query."WHERE ".$iswhere);
            }else{
                    $sql_filter = $this->db->query("SELECT * FROM ".$query);
                                }
            $sql_filter_count = $sql_filter->num_rows();
        }
        $data = $sql_data->result_array();
        $callback = array(    
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,                    
            'recordsFiltered'=>$sql_filter_count,    
            'data'=>$data
        );
            return json_encode($callback); // Convert array $callback ke json
    }
    }