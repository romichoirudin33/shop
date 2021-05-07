<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('auth/v_login');
            } else {
                $user = $this->input->post('username');
                $pass = $this->input->post('password');
                $data = $this->User_model->auth($user, $pass);
                if ($data->is_admin == 'Y') {
                    $this->session->set_flashdata('info', 'Akun anda bukan akun customer');
                    redirect('login', 'refresh');
                }

                if ($data) {
                    $array = array(
                        'id' => $data->id,
                        'name' => $data->name,
                        'photo' => $data->photo,
                        'is_admin' => false
                    );
                    $this->session->set_userdata($array);
                    if ($this->input->post('redirect') != '') {
                        redirect($this->input->post('redirect'), 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('info', 'Login gagal username dan password tidak cocok');
                    redirect('login', 'refresh');
                }
            }
        } else {
            $this->load->view('auth/v_login');
        }
    }

    public function admin()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('auth/v_login_admin');
            } else {
                $user = $this->input->post('username');
                $pass = $this->input->post('password');
                $data = $this->User_model->auth($user, $pass);

                if ($data->is_admin == 'N') {
                    $this->session->set_flashdata('info', 'Akun anda bukan akun admin');
                    redirect('login/admin', 'refresh');
                }
                if ($data) {
                    $array = array(
                        'id' => $data->id,
                        'name' => $data->name,
                        'photo' => $data->photo,
                        'is_admin' => true
                    );
                    $this->session->set_userdata($array);
                    if ($this->input->post('redirect') != '') {
                        redirect($this->input->post('redirect'), 'refresh');
                    } else {
                        redirect('/admin/home', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('info', 'Login gagal username dan password tidak cocok');
                    redirect('login/admin', 'refresh');
                }
            }
        } else {
            $this->load->view('auth/v_login_admin');
        }
    }

    public function destroy()
    {
        $this->session->sess_destroy();
        if ($this->input->get('role')=='admin') {
            redirect('login/admin', 'refresh');
        }
        redirect('/', 'refresh');
    }
}
