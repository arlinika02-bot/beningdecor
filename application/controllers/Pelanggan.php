<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
{
    parent::__construct();
    if ($this->session->userdata('role_id') != '2' || $this->session->userdata('cek_login') !== TRUE) {
        redirect('auth/login');
    }
    $this->load->model('booking_model');
}

    public function dashboard() 
    {
        $data['dekorasi'] = $this->db->order_by('id_dekorasi', 'DESC')->limit(12)->get('dekorasi')->result();

        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/dashboard', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function about() 
    {
        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/about'); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function detail_dekorasi($id)
    {
        $data['detail'] = $this->booking_model->ambil_id_dekorasi($id);
        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/detail_dekorasi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function data_dekorasi() {
        $data['dekorasi'] = $this->booking_model->get_data_by_kategori()->result();

        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/data_dekorasi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function package() {
        $data['dekorasi'] = $this->booking_model->get_data_by_kategori('PKG')->result();

        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/data_dekorasi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function onlydecoration() {
        $data['dekorasi'] = $this->booking_model->get_data_by_kategori('DKR')->result();

        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/data_dekorasi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }


    public function tambah_booking($id_dekorasi)
    {
        if (!$this->session->userdata('cek_login')) {
            redirect('auth/login');
        }

        $id_user = $this->session->userdata('id_user');

        $data['detail']      = $this->booking_model->ambil_id_dekorasi($id_dekorasi);
        $data['user']   = $this->booking_model->get_pelanggan_by_id($id_user);


        $data['kabupaten']   = $this->booking_model->get_all_kabupaten();   
        $data['kecamatan']   = $this->booking_model->get_all_kecamatan();   
        $data['rekening']    = $this->booking_model->get_all_rekening();   

        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/tambah_booking', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function get_kecamatan_by_kabupaten()
    {
        $id_kabupaten = $this->input->post('id_kabupaten');
        $this->db->where('id_kabupaten', $id_kabupaten);
        $kecamatan = $this->db->get('kecamatan')->result();

        echo json_encode($kecamatan);
    }


        public function booking_aksi()
    {
        $id_user     = $this->session->userdata('id_user');
        $id_dekorasi      = $this->input->post('id_dekorasi');
        $harga            = $this->input->post('harga');
        $tanggal_booking  = $this->input->post('tanggal_booking');
        $alamat           = $this->input->post('alamat'); 
        $nama_pasangan    = $this->input->post('nama_pasangan');
        $nama_ortu        = $this->input->post('nama_ortu');
        $nama_acara       = $this->input->post('nama_acara');
        $waktu_acara      = $this->input->post('waktu_acara');

        
        $id_kabupaten     = $this->input->post('id_kabupaten');
        $id_kecamatan     = $this->input->post('id_kecamatan');
        $id_rekening      = $this->input->post('id_rekening');
        $transport        = $this->input->post('transport');
        $total            = $this->input->post('total');

        $data = [
            'id_user'     => $id_user,
            'id_dekorasi'      => $id_dekorasi,
            'harga'            => $harga,
            'tanggal_booking'  => $tanggal_booking,
            'alamat'           => $alamat,
            'nama_pasangan'    => $nama_pasangan,
            'nama_ortu'        => $nama_ortu,
            'nama_acara'       => $nama_acara,
            'waktu_acara'      => $waktu_acara,
            'id_kabupaten'     => $id_kabupaten,
            'id_kecamatan'     => $id_kecamatan,
            'id_rekening'      => $id_rekening,
            'transport'        => $transport,
            'total'            => $total,
            'status_booking'   => '0',
            'status_pembayaran'=> '0',
        ];

        $this->booking_model->insert_data($data, 'transaksi');
        $this->booking_model->update_data('dekorasi', ['status' => '0'], ['id_dekorasi' => $id_dekorasi]);


        $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Booking Berhasil. Tunggu Konfirmasi Admin Yaa!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');

        redirect('pelanggan/transaksi');
    }


    public function detail_booking($id_booking)
    {
        $user = $this->session->userdata('id_user');

        $this->db->select('*');
        $this->db->from('transaksi tr');
        $this->db->join('dekorasi dkr', 'tr.id_dekorasi = dkr.id_dekorasi');
        $this->db->join('user usr', 'tr.id_user = usr.id_user');
        $this->db->join('rekening rek', 'tr.id_rekening = rek.id_rekening');
        $this->db->join('kabupaten kab', 'tr.id_kabupaten = kab.id_kabupaten');
        $this->db->join('kecamatan kec', 'tr.id_kecamatan = kec.id_kecamatan');

        $this->db->where('tr.id_booking', $id_booking); 
        $this->db->where('usr.id_user', $user);

        $query = $this->db->get();
        $data['transaksi'] = $query->row(); 


        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/detail_booking', $data); 
        $this->load->view('templates_pelanggan/footer');
    }


    public function transaksi() 
    {
        $user = $this->session->userdata('id_user');

        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, dekorasi dkr, user usr, rekening rek
        WHERE tr.id_dekorasi=dkr.id_dekorasi AND tr.id_user=usr.id_user AND usr.id_user='$user' 
        AND tr.id_rekening=rek.id_rekening  
        ORDER BY id_booking DESC")->result();
        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/transaksi', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function pembayaran($id) 
    {
        
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, dekorasi dkr, user usr, rekening rek
        WHERE tr.id_dekorasi=dkr.id_dekorasi AND tr.id_user=usr.id_user AND tr.id_rekening=rek.id_rekening AND
        tr.id_booking='$id' ORDER BY id_booking DESC")->result();
        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/pembayaran', $data); 
        $this->load->view('templates_pelanggan/footer');
    }

    public function pembayaran_aksi($id_booking) 
    {
        $id = $this->input->post('id_booking');

        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
        if ($bukti_pembayaran) {
            $config['upload_path']   = './assets/bukti';
            $config['allowed_types'] = 'jpg|jpeg|png|tiff|pdf';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti_pembayaran')) {
                // Tangkap nama file yang diupload
                $bukti_pembayaran = $this->upload->data('file_name');
                // Set field untuk update
                $this->db->set('bukti_pembayaran', $bukti_pembayaran);
            } else {
                echo $this->upload->display_errors();
                return; 
            }
        }

        $data = array(
            'bukti_pembayaran' => $bukti_pembayaran,  
        );
        $where = array(
            'id_booking' => $id
        );

        $this->booking_model->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Yey!</strong>Bukti pembayaran Anda berhasil diupload!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pelanggan/transaksi');
    }

    public function cetak_invoice($id)
    {
         
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, dekorasi dkr, user usr, rekening rek 
            WHERE tr.id_dekorasi = dkr.id_dekorasi 
            AND tr.id_user = usr.id_user AND tr.id_rekening = rek.id_rekening 
            AND tr.id_booking = '$id'")->result();

        $this->load->view('pelanggan/cetak_invoice', $data);
    }

    public function batal_transaksi($id)
    {
        $where = array('id_booking' => $id);
        $data = $this->booking_model->get_where($where, 'transaksi')->row();

        $where2 = array('id_dekorasi' => $data->id_dekorasi);

        $data2 = array('status' => '1');

        $this->booking_model->update_data('dekorasi',$data2, $where2);
        $this->booking_model->delete_data($where,'transaksi');
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Transaksi Anda berhasil dibatalkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('pelanggan/transaksi');
    }

    public function profil()
    {
        $id_user = $this->session->userdata('id_user');

        $this->load->model('booking_model');
        $data['user'] = $this->booking_model->get_by_id_role($id_user, 2);

        
        $this->load->view('templates_pelanggan/header');
                $this->load->view('pelanggan/profil', $data); 
                $this->load->view('templates_pelanggan/footer');
    }

   public function update_profil()
    {
        
        $id_user = $this->session->userdata('id_user');
        $this->load->model('booking_model');
        $data['user'] = $this->booking_model->get_by_id($id_user);

        if (empty($data['user'])) {
            redirect('pelanggan/profil');
        }

        $this->load->view('templates_pelanggan/header');
        $this->load->view('pelanggan/update_profil', $data); 
        $this->load->view('templates_pelanggan/footer');
    }


    public function edit_profil()
    {
        $this->_rulesprofil(); 

        if ($this->form_validation->run() == FALSE) {
            $id_user = $this->session->userdata('id_user');
            
            $this->load->model('booking_model');
            $data['user'] = $this->booking_model->get_by_id($id_user);

            $this->load->view('templates_pelanggan/header');
            $this->load->view('pelanggan/edit_profil', $data); 
            $this->load->view('templates_pelanggan/footer');
        } else {
            $id_user   = $this->session->userdata('id_user');
            $nama           = $this->input->post('nama');
            $username       = $this->input->post('username');
            $alamat         = $this->input->post('alamat');
            $gender         = $this->input->post('gender');
            $no_telepon     = $this->input->post('no_telepon');
            $email    = $this->input->post('email');

            $data = array(
                'nama'          => $nama,
                'username'      => $username,
                'alamat'        => $alamat,
                'gender'        => $gender,
                'no_telepon'    => $no_telepon,
                'email'         => $email
            );


            $this->load->model('booking_model');
            $this->booking_model->update_data('user', $data, array('id_user' => $id_user));

            $this->session->set_flashdata('pesan', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Profil Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('pelanggan/profil');
        }
    }


    public function _rulesprofil()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required');
    }


    
}