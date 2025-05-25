<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index() 
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header');
            $this->load->view('register');  
            $this->load->view('templates_admin/footer');
        } else {
            $nama       = $this->input->post('nama');
            $username   = $this->input->post('username');
            $alamat     = $this->input->post('alamat');
            $gender     = $this->input->post('gender');
            $no_telepon = $this->input->post('no_telepon');
            $email      = $this->input->post('email');
            $password   = md5($this->input->post('password'));  
            $role_id    = '2'; 

            $data = array(
                'nama'        => $nama,
                'username'    => $username,
                'alamat'      => $alamat,
                'gender'      => $gender,
                'no_telepon'  => $no_telepon,
                'email'       => $email,  
                'password'    => $password,
                'role_id'     => $role_id
            );

            $this->booking_model->insert_data($data, 'user');
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
             Berhasil Register, Silahkan Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|callback_password_check');  
    }

  
    public function password_check($password)
    {
        if (!preg_match('/[A-Z]/', $password)) {
            $this->form_validation->set_message('password_check', 'Password harus mengandung huruf besar.');
            return FALSE;
        }
        if (!preg_match('/[0-9]/', $password)) {
            $this->form_validation->set_message('password_check', 'Password harus mengandung angka.');
            return FALSE;
        }
        return TRUE;
    }
}