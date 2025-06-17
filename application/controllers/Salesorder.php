<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesorder extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Salesorder_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Product_model');
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

  
       public function data() {
    $user_id = $this->session->userdata('user_id');
    $sales = $this->Salesorder_model->get_sales_by_user_id($user_id);

    if (!$sales) {
        $this->session->set_flashdata('error', 'Data sales tidak ditemukan.');
        redirect('dashboard'); // atau redirect ke halaman lain yang sesuai
        return;
    }

    $data['salesorder'] = $this->Salesorder_model->get_by_sales($sales['id_sales']);
    $this->load->view('templates/header');
    $this->load->view('sales/data_salesorder', $data);
    $this->load->view('templates/footer');
}
public function laporan_penjualan() {
    $data['laporan'] = $this->Salesorder_model->laporan_penjualan_per_sales();
    $this->load->view('templates/header');
    $this->load->view('sales/laporan_penjualan', $data);
    $this->load->view('templates/footer');
}

public function laporan_produk() {
    $data['laporan'] = $this->Salesorder_model->laporan_penjualan_per_produk();
    $this->load->view('templates/header');
    $this->load->view('sales/laporan_produk', $data);
    $this->load->view('templates/footer');
}



public function laporan_periode() {
    $data = [];

    if ($this->input->method() === 'post') {
        $tanggal_mulai = $this->input->post('tanggal_mulai') . ' 00:00:00';
        $tanggal_selesai = $this->input->post('tanggal_selesai') . ' 23:59:59';

        $data['tanggal_mulai'] = $this->input->post('tanggal_mulai');
        $data['tanggal_selesai'] = $this->input->post('tanggal_selesai');
        $data['laporan'] = $this->Salesorder_model->laporan_periode($tanggal_mulai, $tanggal_selesai);
    }

    $this->load->view('templates/header');
    $this->load->view('sales/laporan_periode', $data);
    $this->load->view('templates/footer');
}




public function print_laporan_periode($start, $end) {
    $data['laporan'] = $this->Salesorder_model->laporan_periode($start, $end);
    $data['tanggal_mulai'] = $start;
    $data['tanggal_selesai'] = $end;
    $this->load->view('sales/print_laporan_periode', $data);
}


public function print_laporan_produk() {
    $data['laporan'] = $this->Salesorder_model->laporan_penjualan_per_produk();
    $this->load->view('sales/print_laporan_produk', $data);
}


public function data_penjualan() {
    $data['salesorder'] = $this->Salesorder_model->get_all();
    $this->load->view('templates/header');
    $this->load->view('sales/data_penjualan', $data);
    $this->load->view('templates/footer');
}


    public function tambah() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $data['produk'] = $this->Product_model->get_all_produk();
        $this->load->view('templates/header');
        $this->load->view('sales/form_so', $data);
        $this->load->view('templates/footer');
    }
    

    public function insert() {
    $id_produk = $this->input->post('id_produk');
    $jumlah = (int) $this->input->post('jumlah');

    // Ambil harga dari database
    $produk = $this->Product_model->get_produk_by_id($id_produk);
    $harga_produk = (int) $produk['harga_produk'];
    $total_harga = $harga_produk * $jumlah;

    // Ambil ID user yang login
    $user_id = $this->session->userdata('user_id');

    // Ambil ID sales berdasarkan user_id
    $sales = $this->Salesorder_model->get_sales_by_user_id($user_id);

    if (!$sales) {
        $this->session->set_flashdata('error', 'Sales tidak ditemukan untuk user ini.');
        redirect('salesorder/data');
        return;
    }

    // Cek stok
    if ($produk && $produk['stok_produk'] >= $jumlah) {
        $data = [
            'id_sales'     => $sales['id_sales'],
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_produk'    => $id_produk,
            'jumlah'       => $jumlah,
            'total_harga'  => $total_harga,
            'status'       => 'draft',
            'created_at'   => date('Y-m-d H:i:s')
        ];

        // INSERT KE DATABASE
        if ($this->Salesorder_model->insert($data)) {
            // Kurangi stok
            $new_stok = $produk['stok_produk'] - $jumlah;
            $this->Product_model->update_stok($id_produk, $new_stok);

            $this->session->set_flashdata('success', 'Sales order berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan sales order.');
        }

    } else {
        $this->session->set_flashdata('error', 'Stok produk tidak mencukupi.');
    }

    redirect('salesorder/data');
}


    public function delete($id_so) {
    // Ambil data SO sebelum dihapus
    $salesorder = $this->Salesorder_model->get_by_id($id_so);

    if ($salesorder) {
        $id_produk = $salesorder['id_produk'];
        $jumlah = $salesorder['jumlah'];

        // Ambil data produk
        $produk = $this->Product_model->get_produk_by_id($id_produk);

        if ($produk) {
            $stok_baru = $produk['stok_produk'] + $jumlah;
            // Update stok produk
            $this->Product_model->update_stok($id_produk, $stok_baru);
        }

        // Hapus sales order
        $this->Salesorder_model->delete($id_so);
        $this->session->set_flashdata('success', 'Sales order berhasil dihapus dan stok dikembalikan.');
    } else {
        $this->session->set_flashdata('error', 'Sales order tidak ditemukan.');
    }

    redirect('salesorder/data');
}
public function update_status($id_so) {
    $status = $this->input->post('status');

    // Ambil data SO
    $so = $this->Salesorder_model->get_by_id($id_so);

    if (!$so) {
        $this->session->set_flashdata('error', 'Sales order tidak ditemukan.');
        redirect('salesorder/data_penjualan');
        return;
    }

    if (in_array($status, ['draft', 'dikirim', 'selesai', 'dibatalkan'])) {

        // Jika status berubah ke "dibatalkan" dan sebelumnya bukan "dibatalkan"
        if ($status == 'dibatalkan' && $so['status'] != 'dibatalkan') {
            // Update status ke dibatalkan
            $this->Salesorder_model->update($id_so, ['status' => 'dibatalkan']);

            // Kembalikan stok ke tbl_produk
            $this->db->set('stok_produk', 'stok_produk + ' . (int)$so['jumlah'], FALSE);
            $this->db->where('id_produk', $so['id_produk']);
            $this->db->update('tbl_produk');

            $this->session->set_flashdata('success', 'Status dibatalkan dan stok dikembalikan.');
        } else {
            // Update biasa
            $this->Salesorder_model->update($id_so, ['status' => $status]);
            $this->session->set_flashdata('success', 'Status sales order berhasil diubah.');
        }

    } else {
        $this->session->set_flashdata('error', 'Status tidak valid.');
    }

    redirect('salesorder/data_penjualan');
}



    public function edit($id_so) {
        $data['salesorder'] = $this->Salesorder_model->get_by_id($id_so);
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $data['produk'] = $this->Product_model->get_all_produk();
        $this->load->view('templates/header');
        $this->load->view('sales/edit_salesorder', $data);
        $this->load->view('templates/footer');
    }

    public function update() {
        $id_so = $this->input->post('id_so');
        $id_produk = $this->input->post('id_produk');
        $jumlah = (int) $this->input->post('jumlah');
        $harga_produk = (int) $this->input->post('harga_produk');
        $total_harga = $harga_produk * $jumlah;

        $data = [
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_produk'    => $id_produk,
            'jumlah'       => $jumlah,
            'harga_produk' => $harga_produk,
            'total_harga'  => $total_harga
        ];

        $this->Salesorder_model->update($id_so, $data);
        $this->session->set_flashdata('success', 'Sales order berhasil diupdate.');
        redirect('salesorder/data');
    }
}
