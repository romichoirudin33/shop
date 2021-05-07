<?php

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login/admin?redirect=admin/home', 'refresh');
        }
        $this->load->model('Product_model');
        $this->load->model('Payment_model');
    }
  
    public function index()
    {
        $data['content'] = 'admin/home';
        $data['products'] = $this->Product_model->all();
        $data['pemesanan'] = $this->Payment_model->all();
        $data['user_pelanggan'] = $this->User_model->getCustomer();
        $data['user_admin'] = $this->User_model->getAdmin();
        $this->load->view('v_admin', $data);
    }
}
