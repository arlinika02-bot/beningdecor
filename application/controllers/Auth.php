<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('booking_model');
        $this->load->library(['form_validation', 'session', 'email']);
    }

    public function login()
{
    // Cek apakah sudah login
    if ($this->session->userdata('role_id') == '1') {
        redirect('admin/dashboard');
    } elseif ($this->session->userdata('role_id') == '2') {
        redirect('pelanggan/dashboard');
    }

    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates_admin/header');
        $this->load->view('login'); 
        $this->load->view('templates_admin/footer');
    } else {
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE)); 

        $cek = $this->booking_model->cek_login($username, $password);

        if (!$cek) {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('auth/login');
        } else {
            $this->session->set_userdata([
                'id_user' => $cek->id_user,
                'username' => $cek->username,
                'role_id'  => $cek->role_id,
                'nama'     => $cek->nama,
                'alamat'   => $cek->alamat,
                'cek_login'=> TRUE  
            ]);

            if ($cek->role_id == '1') {
                redirect('admin/dashboard');
            } elseif ($cek->role_id == '2') {
                redirect('pelanggan/dashboard');
            } else {
                $this->session->sess_destroy();
                redirect('auth/login');
            }
        }
    }
}


    public function _rules()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('pelanggan/dashboard');  
    }

    public function change_password()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('change_password'); 
        $this->load->view('templates_admin/footer');
    }

    public function ganti_password_aksi()
    {
        $this->form_validation->set_rules(
            'password_baru', 'Password Baru',
            'required|matches[ulangi_password]',
            [
                'required' => '%s wajib diisi.',
                'matches'  => 'Password baru dan ulangi password tidak sama.'
            ]
        );
        $this->form_validation->set_rules(
            'ulangi_password', 'Ulangi Password',
            'required',
            ['required' => '%s wajib diisi.']
        );

        if ($this->form_validation->run() === FALSE) {
            $this->change_password();
            return;
        }

        $password_baru = $this->input->post('password_baru', TRUE);

        $data  = ['password' => md5($password_baru)]; 
        $where = ['id_user' => $this->session->userdata('id_user')];

        $updated = $this->booking_model->update_password('user', $data, $where);

        if ($updated) {
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Password berhasil diubah. Silakan <strong>login</strong> kembali!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('auth/login');
        } else {
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Gagal mengubah password. Silakan coba lagi.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            $this->change_password();
        }
    }
}
?>