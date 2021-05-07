<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chart_model');
    }
    
    public function index()
    {
        $data['content'] = 'user/home';
        if ($this->input->get('category')) {
            $products = $this->Product_model->allWithCategory($this->input->get('category'));
        } else {
            $products = $this->Product_model->all();
        }
        $data['products'] = $products;
        $this->load->view('v_user', $data);
    }

    public function detail($id = null)
    {
        if ($this->input->post('submit')) {
            $object = [
                'user_id' => $this->input->post('user_id'),
                'product_id' => $this->input->post('product_id'),
                'amount' => $this->input->post('amount'),
                'total_price' => $this->input->post('total_price'),
            ];
            $this->Chart_model->create($object);
            redirect('keranjang', 'refresh');
        } else {
            $data['data'] = $this->Product_model->getId($id);
            $data['content'] = 'user/detail';
            $this->load->view('v_user', $data);
        }
    }
}
