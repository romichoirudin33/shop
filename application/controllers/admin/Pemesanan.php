<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login/admin?redirect=admin/pemesanan', 'refresh');
        }
        $this->load->model('Product_model');
        $this->load->model('Payment_model');
        $this->load->model('Detail_payment_model');
    }

    public function index()
    {
        $data['content'] = 'admin/pemesanan/index';
        $data['data'] = $this->Payment_model->all();
        $this->load->view('v_admin', $data);
    }

    public function finish($id = null)
    {
        if ($id == null) {
            redirect('admin/pemesanan', 'refresh');
        }
        $object = ['is_delivery' => 'Y'];
        if ($this->Payment_model->update($id, $object)) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Update');
            redirect('admin/pemesanan');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Di Update');
            redirect('admin/pemesanan');
        }
    }
}

/* End of file Pemesanan.php */
