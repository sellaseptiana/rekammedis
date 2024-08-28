<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Resep_model extends CI_Model
{
    public $table = 'tbresep';
    public $id = 'tbresep.id_resep';

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
        $this->db->where('id_resep', $this->session->userdata('id_resep'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_resep', $id);
        $query = $this->db->get();
        $this->db->get_where($this->table, ["id_resep" => $id])->row();
        return $query->row_array();
    }
    public function get_obat_list()
    {
        // Mendapatkan daftar obat dari tabel tbobat
        $this->db->select('id_obat, nama_obat');
        $query = $this->db->get('tbobat');
        return $query->result_array();
    }

    public function get_all_unit_pelayanan()
    {
        return $this->db->get('tbpoli')->result_array();
    }
    public function insert($data)
    {

        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        $this->db->set('stok', 'stok - ' . (int) $data['jumlah'], FALSE);
        $this->db->where('id_obat', $data['id_obat']);
        $this->db->update('tbobat');

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        }
        return $insert_id;
    }

    public function getByRekamMedisId($id_rekam_medis)
    {
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        return $this->db->get('tbresep')->result();
    }
    public function get_all_resep()
    {
        $query = $this->db->get('tbresep');
        return $query->result();
    }
    public function getPatientsWithResep()
    {
        // Contoh implementasi untuk mendapatkan data pasien dengan resep
        $this->db->select('rm.id_rekam_medis, rm.no_rekam_medis, p.nama_pasien, up.nama_pelayanan, r.id_resep, r.id_obat, r.jumlah, r.keterangan_resep, rm.tanggal_periksa, u.nama AS nama_dokter');
        $this->db->from('tbrekammedis rm');
        $this->db->join('tbkunjungan k', 'rm.id_kunjungan = k.id_kunjungan');
        $this->db->join('tbunitpelayanan up', 'k.id_unit_pelayanan = up.id_unit_pelayanan');
        $this->db->join('user u', 'rm.id_user = u.id_user');
        $this->db->join('tbresep r', 'rm.id_rekam_medis = r.id_rekam_medis');
        $this->db->join('tbobat o', 'r.id_obat = o.id_obat');
        $this->db->join('pasien p', 'k.id_pasien = p.id_pasien');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function ambil_data_resep()
    {
        $this->db->select('
            tbkunjungan.no_rekam_medis, 
            pasien.nama_pasien,
             pasien.umur,
            tbkunjungan.nama_pelayanan,  
            tbkunjungan.tanggal_kunjungan as tanggal_periksa, 
            user.nama AS nama_dokter, 
           tbresep.*, tbresep.id_resep, tbobat.*
        ');
        $this->db->from('tbresep');
        $this->db->join('tbobat', 'tbresep.id_obat = tbobat.id_obat');
        $this->db->join('tbrekammedis', 'tbresep.id_rekam_medis = tbrekammedis.id_rekam_medis');
        $this->db->join('tbkunjungan', 'tbrekammedis.id_kunjungan = tbkunjungan.id_kunjungan');
        $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien');
        $this->db->join('user', 'tbrekammedis.id_user = user.id_user');

        $query = $this->db->get();
        return $query->result_array();
    }
   public function ambil_detail_resep($id_resep) {
        $this->db->select('
            tbkunjungan.no_rekam_medis, 
            pasien.nama_pasien, 
            tbkunjungan.nama_pelayanan, 
            tbobat.nama_obat, 
            tbobat.jenis_obat, 
            tbresep.jumlah, 
            tbresep.keterangan_resep, 
            tbkunjungan.tanggal_kunjungan as tanggal_periksa, 
            user.nama, 
            tbresep.id_resep
        ');
        $this->db->from('tbresep');
        $this->db->join('tbobat', 'tbresep.id_obat = tbobat.id_obat');
        $this->db->join('tbrekammedis', 'tbresep.id_rekam_medis = tbrekammedis.id_rekam_medis');
        $this->db->join('tbkunjungan', 'tbrekammedis.id_kunjungan = tbkunjungan.id_kunjungan');
        $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien');
        $this->db->join('user', 'tbrekammedis.id_user = user.id_user');
        $this->db->where('tbresep.id_resep', $id_resep);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return array();
        }
    }


    // Optional: Function to get resep by ID
    public function get_resep_by_id($id)
    {
        $this->db->where('id_resep', $id);
        $query = $this->db->get('tbresep');
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_resep', $id);
        $this->db->update('tbresep', $data);
    }
    // Optional: Function to delete resep
    public function delete($id)
    {
        $this->db->where('id_resep', $id);
        return $this->db->delete('tbresep');
    }
    public function ambil_data_resepByidRekamMedis($id)
    {
        $this->db->select('
        tbkunjungan.no_rekam_medis, 
        pasien.nama_pasien, 
        tbkunjungan.nama_pelayanan, 
        tbobat.nama_obat, 
        tbobat.jenis_obat, 
        tbresep.jumlah, 
        tbresep.keterangan_resep, 
        tbkunjungan.tanggal_kunjungan as tanggal_periksa, 
        user.nama, 
        tbresep.id_resep
    ');
        $this->db->from('tbresep');
        $this->db->join('tbobat', 'tbresep.id_obat = tbobat.id_obat', 'left');
        $this->db->join('tbrekammedis', 'tbresep.id_rekam_medis = tbrekammedis.id_rekam_medis', 'left');
        $this->db->join('tbkunjungan', 'tbrekammedis.id_kunjungan = tbkunjungan.id_kunjungan', 'left');
        $this->db->join('pasien', 'tbkunjungan.id_pasien = pasien.id_pasien', 'left');
        $this->db->join('user', 'tbrekammedis.id_user = user.id_user', 'left');
        $this->db->where('tbresep.id_rekam_medis', $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_prescriptions()
    {
        $this->db->select('COUNT(*) as total');
        $query = $this->db->get('tbresep');
        return $query->row()->total;
    }
    public function get_top_5_obat()
    {
        $this->db->select('tbobat.nama_obat, COUNT(tbresep.id_obat) as jumlah');
        $this->db->from('tbresep');
        $this->db->join('tbobat', 'tbresep.id_obat = tbobat.id_obat');
        $this->db->group_by('tbresep.id_obat');
        $this->db->order_by('jumlah', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_low_stock_obat()
    {
        $this->db->select('*');
        $this->db->from('tbobat');
        $this->db->where('stok <', 20);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_expiring_obat()
    {
        $this->db->select('*');
        $this->db->from('tbobat');
        $this->db->where('expire <', date('Y-m-d', strtotime('+2 months')));
        $query = $this->db->get();
        return $query->result();
    }
}
