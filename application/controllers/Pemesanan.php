<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin')) {
            redirect('login?redirect=pemesanan', 'refresh');
        }
        $this->load->model('Chart_model');
        $this->load->model('Payment_model');
        $this->load->model('Detail_payment_model');
    }

    public function index()
    {
        $data['content'] = 'user/pemesanan';
        $data['data'] = $this->Payment_model->allByUser(
            $this->session->userdata('id')
        );
        $this->load->view('v_user', $data);
    }
}

/* End of file Pemesanan.php */
