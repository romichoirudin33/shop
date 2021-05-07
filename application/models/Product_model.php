<?php


class Product_model extends MY_Model
{
    public $table = 'products';

    public function getCategories()
    {
        $this->db->distinct();
        $this->db->select('category');
        $this->db->where('category !=', null);
        return $this->db->get($this->table)->result();
    }

    public function allWithCategory($category = null)
    {
        $this->db->where('category', $category);
        return $this->db->get($this->table)->result();
    }
}
