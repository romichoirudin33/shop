<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin')) {
            redirect('login?redirect=profil', 'refresh');
        }
        $this->load->model('User_model');
        $this->load->model('Chart_model');
    }
  
    public function index()
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
                    'address' => $this->input->post('address'),
                    'photo' => $photo,
                ];
            } else {
                $object = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                ];
            }

            $id = $this->input->post('id');
            
        
            if ($this->User_model->update($id, $object)) {
                $this->session->set_flashdata('info', 'Data Berhasil Di Edit');
                redirect('profil');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal Di Edit');
                redirect('profil');
            }
        } else {
            $data['content'] = 'user/profil';
            $user_id = $this->session->userdata('id');
      
            $data['data'] = $this->User_model->getId($user_id);
            $this->load->view('v_user', $data);
        }
    }
}

/* End of file Profil.php */
