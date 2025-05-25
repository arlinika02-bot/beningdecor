<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('role_id') == '1') {
            redirect('admin/dashboard');
        } elseif ($this->session->userdata('role_id') == '2') {
            redirect('pelanggan/dashboard');
        } else {
            redirect('Home/dashboard');
        }
    }

    public function dashboard() 
    {
        $data['dekorasi'] = $this->db->order_by('id_dekorasi', 'DESC')->limit(12)->get('dekorasi')->result();

        $this->load->view('templates_pelanggan/header_home');
        $this->load->view('home', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function about() 
    {
        $this->load->view('templates_pelanggan/header_home');
        $this->load->view('pelanggan/about'); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function detail_dekorasi($id)
    {
        $data['detail'] = $this->booking_model->ambil_id_dekorasi($id);
        $this->load->view('templates_pelanggan/header_home');
        $this->load->view('pelanggan/detail_dekorasi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function data_dekorasi() {
        $data['dekorasi'] = $this->booking_model->get_data_by_kategori()->result();

        $this->load->view('templates_pelanggan/header_home');
        $this->load->view('pelanggan/data_dekorasi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function package() {
        $data['dekorasi'] = $this->booking_model->get_data_by_kategori('PKG')->result();

        $this->load->view('templates_pelanggan/header_home');
        $this->load->view('pelanggan/data_dekorasi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function onlydecoration() {
        $data['dekorasi'] = $this->booking_model->get_data_by_kategori('DKR')->result();

        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/data_dekorasi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }
}