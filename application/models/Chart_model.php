<?php


class Chart_model extends MY_Model
{
    public $table = 'charts';

    public function getChartsUser($user_id = null)
    {
        $this->db->select($this->table.'.*,products.name,products.price,products.photo');
        $this->db->from($this->table);
        $this->db->join('products', 'products.id = charts.product_id');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result();
    }

    public function deleteByUser($user_id = null)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete($this->table);
    }
}
