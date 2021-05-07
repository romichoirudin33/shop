<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login/admin?redirect=admin/pelanggan', 'refresh');
        }
    }
  
    public function index()
    {
        $data['content'] = 'admin/pelanggan/index';
        $data['data'] = $this->User_model->getCustomer();
        $this->load->view('v_admin', $data);
    }

    public function edit($id = null)
    {
        if ($this->input->post('submit')) {
            $config['upload_path']          = './assets/photo_user/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $photo = $this->upload->file_name;
                $object = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'address' => $this->input->post('address'),
                    'photo' => $photo,
                ];
            } else {
                $object = [
                  'name' => $this->input->post('name'),
                  'email' => $this->input->post('email'),
                  'username' => $this->input->post('username'),
                  'password' => $this->input->post('password'),
                  'address' => $this->input->post('address'),
                ];
            }
            
            if ($this->User_model->update($id, $object)) {
                $this->session->set_flashdata('info', 'Data Berhasil Di Edit');
                redirect('admin/pelanggan');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal Di Edit');
                redirect('admin/pelanggan');
            }
        } else {
            if ($id == null) {
                redirect('admin/pelanggan', 'refresh');
            }
            $data['content'] = 'admin/pelanggan/edit';
            $data['data'] = $this->User_model->getId($id);
            $this->load->view('v_admin', $data);
        }
    }

    public function destroy($id = null)
    {
        if ($id == null) {
            redirect('admin/pelanggan', 'refresh');
        }

        if ($this->User_model->delete($id)) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('admin/pelanggan');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Di Hapus');
            redirect('admin/pelanggan');
        }
    }
}

/* End of file Pelanggan.php */
