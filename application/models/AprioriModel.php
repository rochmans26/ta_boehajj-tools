<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AprioriModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->get('tb_history_apriori')->result();
    }
    public function getAllByUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('tb_history_apriori')->result();
    }

    public function getLogById($id)
    {
        $this->db->where('id_history', $id);
        return $this->db->get('tb_history_apriori')->row();
    }

    public function delete($id_history)
    {
        $this->db->where('id_history', $id_history);
        return $this->db->delete('tb_history_apriori');
    }

    public function insertLog($data)
    {
        return $this->db->insert('tb_history_apriori', $data);
    }

    public function filterByDate($start_date, $end_date)
    {
        if (!$start_date || !$end_date) {
            return [];
        }

        $this->db->select('
        tb_det_transaksi.*, 
        tb_transaksi.*');

        $this->db->from('tb_det_transaksi');
        $this->db->join('tb_transaksi', 'tb_det_transaksi.kode_transaksi = tb_transaksi.kode_transaksi', 'inner');

        $this->db->where('tb_transaksi.tgl_transaksi >=', $start_date);
        $this->db->where('tb_transaksi.tgl_transaksi <=', $end_date);

        return $this->db->get()->result();
    }


}
