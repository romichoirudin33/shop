<?php


class User_model extends MY_Model
{
    public $table = 'users';

    public function auth($username = null, $password = null)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get($this->table)->row();
    }

    public function getAdmin()
    {
        $this->db->where('is_admin', 'Y');
        return $this->db->get($this->table)->result();
    }

    public function getCustomer()
    {
        $this->db->where('is_admin', 'N');
        return $this->db->get($this->table)->result();
    }
}
