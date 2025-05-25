<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '1') {
            redirect('auth/block');
        }

        $this->load->model('booking_model');
    }

    public function dashboard()
    {
        $this->db->where('role_id', 2);
        $this->db->select('COUNT(*) as total_user');
        $total_user = $this->db->get('user')->row()->total_user;
        
        $this->db->select('COUNT(*) as total_dekorasi');
        $total_dekorasi = $this->db->get('dekorasi')->row()->total_dekorasi;

        $this->db->select('COUNT(*) as total_transaksi');
        $total_transaksi = $this->db->get('transaksi')->row()->total_transaksi;

        $this->db->select('COUNT(*) as total_kategori');
        $total_kategori = $this->db->get('kategori')->row()->total_kategori;

        $data = [
            'total_user' => $total_user,
            'total_dekorasi' => $total_dekorasi,
            'total_transaksi' => $total_transaksi,
            'total_kategori' => $total_kategori
        ];


        $data['belum_diterima'] = $this->booking_model->count_by_status(0, 0);
        $data['diterima_belum_bayar'] = $this->booking_model->count_by_status(1, 0);
        $data['diterima_sudah_bayar'] = $this->booking_model->count_by_status(1, 1);
        $data['dikerjakan'] = $this->booking_model->count_by_status(2,1);


        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data); 
        $this->load->view('templates_admin/footer');
    }


    public function bookingByStatusAndPayment($status_booking, $status_pembayaran)
    {
        $this->load->model('booking_model');

        $data['transaksi'] = $this->booking_model->getBookingsByStatusAndPayment($status_booking, $status_pembayaran);

        $data['status_booking'] = $status_booking;
        $data['status_pembayaran'] = $status_pembayaran;

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/booking_list', $data);
        $this->load->view('templates_admin/footer');
    }



    public function dekorasi() 
    {
        $this->load->model('booking_model');

        $this->db->order_by('id_dekorasi', 'DESC');
        $data['dekorasi'] = $this->booking_model->get_data('dekorasi')->result();
        $data['kategori'] = $this->booking_model->get_data('kategori')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dekorasi', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function tambah_dekorasi() 
    {
        $data['kategori'] = $this->booking_model->get_data('kategori')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_dekorasi', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function tambahdekorasi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->tambah_dekorasi();
        }else{
            $kode_kategori          = $this->input->post('kode_kategori');
            $nama_dekorasi          = $this->input->post('nama_dekorasi');
            $keterangan             = $this->input->post('keterangan');
            $status                 = $this->input->post('status');
            $harga                  = $this->input->post('harga');
            $gambar                 = $_FILES['gambar']['name'];
            if($gambar=''){}else{
                $config ['upload_path']     = './assets/dekorasi';
                $config ['allowed_types']   = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo"Gambar dekorasi gagal di upload!";
                }else{
                    $gambar=$this->upload->data('file_name');
                }
            }

            $data = array(
                'kode_kategori'         => $kode_kategori,
                'nama_dekorasi'         => $nama_dekorasi,
                'keterangan'            => $keterangan,
                'status'                => $status,
                'harga'                 => $harga,
                'gambar'                => $gambar

            );
            $this->booking_model->insert_data($data, 'dekorasi');
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Data Dekorasi Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/dekorasi');
        }
    }

    public function update_dekorasi($id){
        $where = array('id_dekorasi' => $id);
        $data['dekorasi'] = $this->db->query("SELECT * FROM dekorasi dkr, kategori ktg WHERE dkr.kode_kategori
        =ktg.kode_kategori AND dkr.id_dekorasi='$id'")->result();
        $data['kategori'] = $this->booking_model->get_data('kategori')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_dekorasi', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function edit_dekorasi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->update_dekorasi();
        }else{
            $id                     = $this->input->post('id_dekorasi');
            $kode_kategori          = $this->input->post('kode_kategori');
            $nama_dekorasi          = $this->input->post('nama_dekorasi');
            $keterangan             = $this->input->post('keterangan');
            $status                 = $this->input->post('status');
            $harga                  = $this->input->post('harga');
            $gambar                 = $_FILES['gambar']['name'];
            if($gambar){
                $config ['upload_path']     = './assets/dekorasi';
                $config ['allowed_types']   = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo"Gambar mobil gagal di upload!";
                }else{
                    $gambar=$this->upload->data('file_name');

                    if ($this->upload->do_upload('gambar')){
                        $gambar=$this->upload->data('file_name');
                        $this->db->set('gambar', $gambar);
                    }else{
                        echo $this->upload->display_errors();
                    
                }
            }}

            $data = array(
                'kode_kategori'         => $kode_kategori,
                'nama_dekorasi'         => $nama_dekorasi,
                'keterangan'            => $keterangan,
                'status'                => $status,
                'harga'                 => $harga

            );
            $where = array(
                'id_dekorasi' => $id
            );
            $this->booking_model->update_data('dekorasi', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            Data Dekorasi Berhasil Diupdate!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/dekorasi');
        }

            
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_kategori', 'Kode Kategori', 'required');
        $this->form_validation->set_rules('nama_dekorasi', 'Nama Dekorasi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
    }

    public function detail_dekorasi($id)
    {
        $data['detail'] = $this->booking_model->ambil_id_dekorasi($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_dekorasi', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function delete_dekorasi($id)
    {
        $where = array('id_dekorasi' => $id);
        $this->booking_model->delete_data($where, 'dekorasi');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Dekorasi Berhasil Dihapus!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/dekorasi');
    }

    public function kategori() 
    {
        $this->load->model('booking_model');
        $data['kategori'] = $this->booking_model->get_data('kategori')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kategori', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function tambah_kategori() 
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_kategori'); 
        $this->load->view('templates_admin/footer');
    }

    public function tambahkategori() 
    {
        $this->_ruleskategori();

        if($this->form_validation->run() == FALSE) {
            $this->tambah_kategori();
        }else{
            $kode_kategori          = $this->input->post('kode_kategori');
            $nama_kategori         = $this->input->post('nama_kategori');
           
            $data = array(
                'kode_kategori'         => $kode_kategori,
                'nama_kategori'         => $nama_kategori

            );
            $this->booking_model->insert_data($data, 'kategori');
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Data Kategori Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/kategori');
        }
    }

    public function update_kategori($id)
    {
        $where = array('id_kategori' => $id);
        $data['kategori'] = $this->db->get_where('kategori', $where)->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_kategori', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function edit_kategori()
    {
        $this->_ruleskategori();

        if ($this->form_validation->run() == FALSE) {
            $this->update_kategori($this->input->post('id_kategori'));
        } else {
            $id             = $this->input->post('id_kategori');
            $kode_kategori  = $this->input->post('kode_kategori');
            $nama_kategori  = $this->input->post('nama_kategori');

            $data = array(
                'id_kategori'   => $id,
                'kode_kategori' => $kode_kategori,
                'nama_kategori' => $nama_kategori
            );

            $where = array('id_kategori' => $id);

            $this->booking_model->update_data('kategori', $data, $where);

            $this->session->set_flashdata('pesan', 
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                Data Kategori Berhasil Diupdate!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/kategori');
        }
    }

    public function _ruleskategori()
    {
        $this->form_validation->set_rules('kode_kategori', 'Kode Kategori', 'required');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    }


    public function delete_kategori($id)
    {
        $where = array('id_kategori' => $id);
        $this->booking_model->delete_data($where, 'kategori');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Kategori Berhasil Dihapus!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/kategori');
    }

    public function rekening() 
    {
        $this->load->model('booking_model');
        $data['rekening'] = $this->booking_model->get_data('rekening')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/rekening', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function tambah_rekening() 
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_rekening'); 
        $this->load->view('templates_admin/footer');
    }

    public function tambahrekening() 
    {
        $this->_rulesrekening();

        if($this->form_validation->run() == FALSE) {
            $this->tambah_rekening();
        }else{
            $no_rekening            = $this->input->post('no_rekening');
            $nama_bank              = $this->input->post('nama_bank');
            $nama_pemilik           = $this->input->post('nama_pemilik');
           
            $data = array(
                'no_rekening'           => $no_rekening,
                'nama_bank'             => $nama_bank,
                'nama_pemilik'          => $nama_pemilik

            );
            $this->booking_model->insert_data($data, 'rekening');
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Data rekening Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/rekening');
        }
    }

    public function update_rekening($id)
    {
        $where = array('id_rekening' => $id);
        $data['rekening'] = $this->db->get_where('rekening', $where)->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_rekening', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function edit_rekening()
    {
        $this->_rulesrekening();

        if ($this->form_validation->run() == FALSE) {
            $this->update_rekening($this->input->post('id_rekening'));
        } else {
            $id             = $this->input->post('id_rekening');
            $no_rekening  = $this->input->post('no_rekening');
            $nama_bank  = $this->input->post('nama_bank');
            $nama_pemilik  = $this->input->post('nama_pemilik');

            $data = array(
                'no_rekening' => $no_rekening,
                'nama_bank' => $nama_bank,
                'nama_pemilik' => $nama_pemilik
            );

            $where = array('id_rekening' => $id);

            $this->booking_model->update_data('rekening', $data, $where);

            $this->session->set_flashdata('pesan', 
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                Data rekening Berhasil Diupdate!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/rekening');
        }
    }


    public function _rulesrekening()
    {
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
    }


    public function delete_rekening($id)
    {
        $where = array('id_rekening' => $id);
        $this->booking_model->delete_data($where, 'rekening');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Rekening Berhasil Dihapus!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/rekening');
    }

    public function pelanggan() 
    {
        $data['user'] = $this->db->get_where('user', ['role_id' => 2])->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/pelanggan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_pelanggan() 
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_pelanggan'); 
        $this->load->view('templates_admin/footer');
    }

    public function tambahpelanggan() 
    {
        $this->_rulespelanggan();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_pelanggan();
        } else {
            $nama       = $this->input->post('nama');
            $alamat     = $this->input->post('alamat');
            $gender     = $this->input->post('gender');
            $no_telepon = $this->input->post('no_telepon');
            $email     = $this->input->post('email');

            $data = array(
                'nama'        => $nama,
                'alamat'      => $alamat,
                'gender'      => $gender,
                'no_telepon'  => $no_telepon,
                'email'    => $email
            );

            $this->booking_model->insert_data($data, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Data Pelanggan Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/pelanggan');
            
        }
    }

    public function _rulespelanggan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function delete_pelanggan($id)
    {
        $where = array('id_user' => $id);
        $this->booking_model->delete_data($where, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Pelanggan Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/pelanggan');
    }

    public function data_admin() 
    {
        $data['user'] = $this->db->get_where('user', ['role_id' => 1])->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_admin', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_admin()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_admin');  
        $this->load->view('templates_admin/footer');
    }

    public function tambahadmin()
    {
        $this->_rulesadmin();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_admin();
        } else {
            $data = [
                'nama'       => $this->input->post('nama'),
                'username'       => $this->input->post('username'),
                'alamat'     => $this->input->post('alamat'),
                'gender'     => $this->input->post('gender'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email'      => $this->input->post('email'),
                'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // hash password
                'role_id'    => 1 
            ];

            $this->booking_model->insert_data($data, 'user');

            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Data Admin Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

            redirect('admin/data_admin');
        }
    }

    public function update_admin($id)
    {
        $where = ['id_user' => $id, 'role_id' => 1];
        $user = $this->db->get_where('user', $where)->row();

        if (!$user) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data admin tidak ditemukan atau bukan admin.</div>');
            redirect('admin/data_admin');
        }

        $data['user'] = $user;

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_admin', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_admin()
    {
        $this->_rulesadmin();
        
        $id = $this->input->post('id_user');

        if ($this->form_validation->run() == FALSE) {
            $this->update_admin($id);
        } else {
            $data = [
                'nama'       => $this->input->post('nama'),
                'username'       => $this->input->post('username'),
                'alamat'     => $this->input->post('alamat'),
                'gender'     => $this->input->post('gender'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email'      => $this->input->post('email')
            ];

            $where = ['id_user' => $id, 'role_id' => 1];

            $this->booking_model->update_data('user', $data, $where);

            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    Data Admin Berhasil Diupdate!.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );

            redirect('admin/data_admin');
        }
    }

    public function delete_admin($id)
    {
        $where = array('id_user' => $id);
        $this->booking_model->delete_data($where, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Admin Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/data_admin');
    }



    public function _rulesadmin()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    }


    public function transaksi()
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, dekorasi dkr, user usr, rekening rek
            WHERE tr.id_dekorasi = dkr.id_dekorasi 
            AND tr.id_user = usr.id_user 
            AND tr.id_rekening = rek.id_rekening 
            ORDER BY tr.id_booking DESC")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi', $data); 
        $this->load->view('templates_admin/footer');
    }

    
    public function pembayaran($id) 
    {
        $where = array('id_booking' => $id);
        $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_booking='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/konfirmasi_pembayaran', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function cek_pembayaran()
    {
        $id = $this->input->post('id_booking');
        $status_pembayaran = $this->input->post('status_pembayaran');

        $data = array(
            'status_pembayaran' => $status_pembayaran,
        );

        $where = array(
            'id_booking' => $id
        );

        $this->booking_model->update_data('transaksi', $data, $where);
        redirect('admin/transaksi');
    }

    public function lihat_pembayaran($id)
    {
        $this->load->helper('url');
        
        $filePembayaran = $this->booking_model->downloadPembayaran($id);
        $file = "assets/bukti/" . $filePembayaran['bukti_pembayaran'];

        if (file_exists($file)) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                echo '<img src="' . base_url($file) . '" alt="Bukti Pembayaran" style="max-width: 100%; height: auto;">';
            }
            elseif ($ext === 'pdf') {
                // Tampilkan PDF menggunakan tag embed
                echo '<embed src="' . base_url($file) . '" type="application/pdf" width="100%" height="600px">';
            } else {
                echo "Jenis file tidak dapat ditampilkan.";
            }
        } else {
            echo "File tidak ditemukan.";
        }
    }


    public function detail_transaksi($id_booking)
    {
        $this->db->select('*');
        $this->db->from('transaksi tr');
        $this->db->join('dekorasi dkr', 'tr.id_dekorasi = dkr.id_dekorasi');
        $this->db->join('user usr', 'tr.id_user = usr.id_user');
        $this->db->join('rekening rek', 'tr.id_rekening = rek.id_rekening');
        $this->db->join('kabupaten kab', 'tr.id_kabupaten = kab.id_kabupaten');
        $this->db->join('kecamatan kec', 'tr.id_kecamatan = kec.id_kecamatan');
        $this->db->where('tr.id_booking', $id_booking);

        $query = $this->db->get();
        $data['transaksi'] = $query->row();

        if (!$data['transaksi']) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data transaksi tidak ditemukan!</div>');
            redirect('admin/transaksi');
        }

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_transaksi', $data); 
        $this->load->view('templates_admin/footer');
    }



    public function update_status_booking()
    {
        $id_booking = $this->input->post('id_booking');
        $status_booking = $this->input->post('status_booking');

        $this->db->where('id_booking', $id_booking);
        $this->db->update('transaksi', ['status_booking' => $status_booking]);


        if ($status_booking == 3) {
            $transaksi = $this->db->get_where('transaksi', ['id_booking' => $id_booking])->row();
            if ($transaksi) {
                $this->db->set('status', '1');
                $this->db->where('id_dekorasi', $transaksi->id_dekorasi);
                $this->db->update('dekorasi');
            }
        }

        echo "success";
    }



    public function laporan() {

        $mulai  = $this->input->post('mulai');
        $sampai = $this->input->post('sampai');

        $this->form_validation->set_rules('mulai', 'Mulai Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['mulai'] = $mulai;
            $data['sampai'] = $sampai;
            $data['transaksi'] = []; 
        } else {
            $data['mulai'] = $mulai;
            $data['sampai'] = $sampai;
            $data['transaksi'] = $this->booking_model->get_laporan($mulai, $sampai);
        }

   
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporan', $data); 
        $this->load->view('templates_admin/footer');
    }

    public function cetak_laporan()
    {
        $mulai = $this->input->get('mulai');
        $sampai = $this->input->get('sampai');

        $data['transaksi'] = $this->booking_model->get_laporan($mulai, $sampai);

        // Inisialisasi total
        $total_harga = 0;
        $total_transport = 0;
        $total_pemasukan = 0;

        foreach ($data['transaksi'] as $tr) {
            $total_harga    += $tr->harga;
            $total_transport += $tr->transport;
            $total_pemasukan   += $tr->total;
        }

        $data['total_harga'] = $total_harga;
        $data['total_transport'] = $total_transport;
        $data['total_pemasukan'] = $total_pemasukan;


        $this->load->view('templates_admin/header');
        $this->load->view('admin/cetak_laporan', $data);
    }

    public function _ruleslaporan()
    {
        $this->form_validation->set_rules('mulai', 'Mulai Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai', 'required');
    }

    public function profil()
    {
        $id_user = $this->session->userdata('id_user');

        $this->load->model('booking_model');
        $data['user'] = $this->booking_model->get_by_id_role($id_user, 1);

        
        $this->load->view('templates_admin/header');
                $this->load->view('templates_admin/sidebar');
                $this->load->view('admin/profil', $data); 
                $this->load->view('templates_admin/footer');
    }

   public function update_profil()
    {
        
        $id_user = $this->session->userdata('id_user');
        $this->load->model('booking_model');
        $data['user'] = $this->booking_model->get_by_id($id_user);

        if (empty($data['user'])) {
            redirect('admin/profil');
        }

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_profil', $data); 
        $this->load->view('templates_admin/footer');
    }


    public function edit_profil()
    {
        $this->_rulesprofil(); 

        if ($this->form_validation->run() == FALSE) {
            $id_user = $this->session->userdata('id_user');
            
            $this->load->model('booking_model');
            $data['user'] = $this->booking_model->get_by_id($id_user);

            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_profil', $data); 
            $this->load->view('templates_admin/footer');
        } else {
            $id_user   = $this->session->userdata('id_user');
            $nama           = $this->input->post('nama');
            $username       = $this->input->post('username');
            $alamat         = $this->input->post('alamat');
            $gender         = $this->input->post('gender');
            $no_telepon     = $this->input->post('no_telepon');

            $data = array(
                'nama'          => $nama,
                'username'      => $username,
                'alamat'        => $alamat,
                'gender'        => $gender,
                'no_telepon'    => $no_telepon
            );


            $this->load->model('booking_model');
            $this->booking_model->update_data('user', $data, array('id_user' => $id_user));

            $this->session->set_flashdata('pesan', 
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                Profil Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/profil');
        }
    }


    public function _rulesprofil()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|numeric');
    }


public function batal_transaksi($id)
    {
        $where = array('id_booking' => $id);
        $data = $this->booking_model->get_where($where, 'transaksi')->row();

        if (!$data) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data transaksi tidak ditemukan!</div>');
            redirect('admin/transaksi');
        }

        // Hanya boleh dibatalkan jika status 0 atau 1
        if ($data->status_booking == '0' || $data->status_booking == '1') {
            $where2 = array('id_dekorasi' => $data->id_dekorasi);
            $data2 = array('status' => '1'); 

            $this->booking_model->update_data('dekorasi', $data2, $where2);
            $this->booking_model->delete_data($where, 'transaksi');

            $this->session->set_flashdata('pesan', '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Transaksi Anda berhasil dibatalkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Transaksi tidak dapat dibatalkan!</div>');
        }

        redirect('admin/transaksi');
    }


}