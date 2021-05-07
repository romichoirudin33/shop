<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function index()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

            if ($this->form_validation->run() == false) {
                $this->load->view('auth/v_register');
            } else {
                $object = [
                  'name' => $this->input->post('name'),
                  'username' => $this->input->post('username'),
                  'email' => $this->input->post('email'),
                  'password' => $this->input->post('password'),
                  'photo' => 'customer.png',
                  'is_admin' => 'N'
                ];
                
                if ($this->User_model->create($object)) {
                    $array = array(
                        'id' => $this->db->insert_id(),
                        'name' => $this->input->post('name'),
                        'is_admin' => false
                    );
                    $this->session->set_userdata($array);
                    redirect('/', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Login gagal username dan password tidak cocok');
                    redirect('login', 'refresh');
                }
            }
        } else {
            $this->load->view('auth/v_register');
        }
    }
}

/* End of file Register.php */
