<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login/admin?redirect=admin/produk', 'refresh');
        }
        $this->load->model('Product_model');
    }
    
    public function index()
    {
        $data['content'] = 'admin/produk/index';
        $data['data'] = $this->Product_model->all();
        $this->load->view('v_admin', $data);
    }

    public function create()
    {
        if ($this->input->post('submit')) {
            $config['upload_path']          = './assets/photo_product/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $photo = $this->upload->file_name;
            } else {
                $photo = 'empty.png';
            }
            $object = [
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'category' => $this->input->post('category'),
                'description' => $this->input->post('description'),
                'photo' => $photo,
            ];
            if ($this->Product_model->create($object)) {
                $this->session->set_flashdata('info', 'Data Berhasil Di Tambah');
                redirect('admin/produk');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal Di Tambah');
                redirect('admin/produk');
            }
        } else {
            $data['content'] = 'admin/produk/create';
            $this->load->view('v_admin', $data);
        }
    }

    public function edit($id = null)
    {
        if ($this->input->post('submit')) {
            $config['upload_path']          = './assets/photo_product/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $photo = $this->upload->file_name;
                $object = [
                    'name' => $this->input->post('name'),
                    'price' => $this->input->post('price'),
                    'category' => $this->input->post('category'),
                    'description' => $this->input->post('description'),
                    'photo' => $photo,
                ];
            } else {
                $object = [
                    'name' => $this->input->post('name'),
                    'price' => $this->input->post('price'),
                    'category' => $this->input->post('category'),
                    'description' => $this->input->post('description'),
                ];
            }
            
            if ($this->Product_model->update($id, $object)) {
                $this->session->set_flashdata('info', 'Data Berhasil Di Edit');
                redirect('admin/produk');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal Di Edit');
                redirect('admin/produk');
            }
        } else {
            if ($id == null) {
                redirect('admin/produk', 'refresh');
            }
            $data['content'] = 'admin/produk/edit';
            $data['data'] = $this->Product_model->getId($id);
            $this->load->view('v_admin', $data);
        }
    }

    public function destroy($id = null)
    {
        if ($id == null) {
            redirect('admin/produk', 'refresh');
        }

        if ($this->Product_model->delete($id)) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('admin/produk');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Di Hapus');
            redirect('admin/produk');
        }
    }
}

/* End of file Produk.php */
