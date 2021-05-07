<?php
class Payment_model extends MY_Model
{
    public $table = 'payments';

    public function all()
    {
        $this->db->select($this->table.'.*,users.name,users.address');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = payments.user_id');
        $this->db->where('is_cancel', 'N');
        $this->db->order_by('updated_at', 'desc');
        return $this->db->get()->result();
    }

    public function allByUser($user_id = null)
    {
        $this->db->select($this->table.'.*,users.name,users.address');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = payments.user_id');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('updated_at', 'desc');
        return $this->db->get()->result();
    }
}
