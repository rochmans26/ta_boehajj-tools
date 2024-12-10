<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        $this->db->where('role', 'user');
        return $this->db->get('users')->result();
    }

    public function getUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('users')->row();
    }

    public function blockUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->set('active', 'xxx');
        return $this->db->update('users');
    }


}
