<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin')) {
            redirect('login?redirect=keranjang', 'refresh');
        }

        $this->load->model('Chart_model');
        $this->load->model('Payment_model');
        $this->load->model('Detail_payment_model');
    }

    public function index()
    {
        $data['content'] = 'user/keranjang';
        $this->load->view('v_user', $data);
    }

    public function destroy($id = null)
    {
        if ($id == null) {
            redirect('keranjang', 'refresh');
        }
        $this->Chart_model->delete($id);
        redirect('keranjang');
    }

    public function checkout()
    {
        $data['content'] = 'user/checkout';
        $data['user'] = $this->User_model->getId($this->session->userdata('id'));
        $this->load->view('v_user', $data);
    }

    public function continue_payment()
    {
        $user_id = $this->input->post('user_id');
        $chart = $this->Chart_model->getChartsUser($user_id);
        $total_price = 0;
        foreach ($chart as $i) {
            $total_price += $i->total_price;
        }

        $config['upload_path']          = './assets/photo_invoice/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('invoice')) {
            $photo = $this->upload->file_name;
        } else {
            $photo = null;
        }

        $data = [
            'user_id' => $user_id,
            'send_to' => $this->input->post('send_to'),
            'is_pay' => 'Y',
            'is_delivery' => 'N',
            'is_cancel' => 'N',
            'invoice' => $photo,
            'total_payment' => $total_price,
        ];
        $this->Payment_model->create($data);
        $payment_id = $this->db->insert_id();

        foreach ($chart as $i) {
            $product = $this->Product_model->getId($i->product_id);
            $data = [
                'payment_id' => $payment_id,
                'product_id' => $i->product_id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_amount' => $i->amount,
            ];
            $this->Detail_payment_model->create($data);
        }
        $this->Chart_model->deleteByUser($user_id);
        redirect('pemesanan', 'refresh');
    }
}

/* End of file Keranjang.php */
