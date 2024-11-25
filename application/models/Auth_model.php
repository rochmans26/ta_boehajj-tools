<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    // get all data
    public function getUserData($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get()->row();
    }

    public function getuser($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        return $this->db->get()->row();
    }

    public function insDataUser($data)
    {
        return $this->db->insert('users', $data);
    }

    public function regist()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 'user',
            'alamat' => $this->input->post('alamat'),
            'notelp' => $this->input->post('notelp'),
            'email' => $this->input->post('email')
        ];
        return $this->db->insert('users', $data);

    }
}
