<?php

class Booking_model extends CI_Model {

    public function get_data_by_kategori($kategori = NULL) {
        if ($kategori) {
            $this->db->where('kode_kategori', $kategori);  
        }
        return $this->db->get('dekorasi');  }

    public function get_data($table) {
        
        return $this->db->get($table);
    }

    public function get_where($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where) {
        $this->db->update($table, $data, $where);
    }

    public function ambil_id_dekorasi($id) {
        $hasil = $this->db->where('id_dekorasi', $id)->get('dekorasi');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return [];
        }
    }

    public function delete_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function cek_login($username, $password)
    {
        $query = $this->db->get_where('user', [
            'username' => $username,
            'password' => $password
        ], 1);

        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }



    public function update_password($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }


    public function downloadPembayaran($id) 
    {
        return $this->db->get_where('transaksi', ['id_booking' => $id])->row_array();
    }


    public function get_admin_pelanggan()
    {
        return $this->db->get_where('user', ['role_id' => 1])->row_array();
    }

    public function get_by_id_role($id, $role_id)
    {
        return $this->db->get_where('user', [
            'id_user' => $id,
            'role_id' => $role_id
        ])->row_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('user', array('id_user' => $id))->row_array();
    }
    public function get_pelanggan_by_id($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row();
    }

    public function get_all_kabupaten()
    {
        return $this->db->get('kabupaten')->result();
    }

    public function get_all_kecamatan()
    {
        return $this->db->get('kecamatan')->result();
    }

    public function get_all_rekening()
    {
        return $this->db->get('rekening')->result();
    }


    public function get_laporan($mulai, $sampai) {
        $this->db->select('transaksi.*, 
            user.nama, 
            user.alamat, 
            dekorasi.nama_dekorasi, 
            rekening.nama_bank, 
            rekening.no_rekening, 
            rekening.nama_pemilik');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');
        $this->db->join('dekorasi', 'transaksi.id_dekorasi = dekorasi.id_dekorasi');
        $this->db->join('rekening', 'transaksi.id_rekening = rekening.id_rekening');
        $this->db->where('transaksi.status_booking', '3'); // 3 = Selesai

        $this->db->where('DATE(transaksi.tanggal_booking) >=', $mulai);
        $this->db->where('DATE(transaksi.tanggal_booking) <=', $sampai);

        $this->db->order_by('transaksi.tanggal_booking', 'DESC');
        return $this->db->get()->result();
    }


    public function count_by_status($status_booking, $status_pembayaran) {
            $this->db->where('status_booking', $status_booking);
            $this->db->where('status_pembayaran', $status_pembayaran);
            return $this->db->get('transaksi')->num_rows();
        }



    public function getBookingsByStatusAndPayment($status_booking, $status_pembayaran)
    {
        $this->db->select('transaksi.*, 
            user.nama, 
            user.alamat, 
            dekorasi.nama_dekorasi, 
            rekening.nama_bank, 
            rekening.no_rekening, 
            rekening.nama_pemilik');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');
        $this->db->join('dekorasi', 'transaksi.id_dekorasi = dekorasi.id_dekorasi');
        $this->db->join('rekening', 'transaksi.id_rekening = rekening.id_rekening');

        $this->db->where('transaksi.status_booking', $status_booking);
        $this->db->where('transaksi.status_pembayaran', $status_pembayaran);

        $this->db->order_by('transaksi.tanggal_booking', 'DESC');
        return $this->db->get()->result();
    }

}
?>