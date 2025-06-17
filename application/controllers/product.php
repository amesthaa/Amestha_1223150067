<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('form_validation');

        // Cek login (opsional)
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function data_produk(){
        $data['tbl_produk'] = $this->Product_model->get_all_produk();
        $this->load->view('templates/header');
        $this->load->view('produk/data_produk', $data); // daftar produk
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[tbl_produk.kode_produk]');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required|numeric');
        $this->form_validation->set_rules('stok_produk', 'Stok Produk', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('produk/form_product'); // form tambah produk
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id'            => $this->session->userdata('user_id'), // id user yg login
                'kode_produk'   => $this->input->post('kode_produk'),
                'nama_produk'   => $this->input->post('nama_produk'),
                'harga_produk'  => $this->input->post('harga_produk'),
                'stok_produk'   => $this->input->post('stok_produk'),
                'create_at'     => date('Y-m-d H:i:s')
            ];
            $this->Product_model->insert_produk($data);
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
            redirect('product/data_produk');
        }
    }

    public function edit($id){
        $data['produk'] = $this->Product_model->get_produk_by_id($id);

        if (!$data['produk']) {
            show_404();
        }

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required|numeric');
        $this->form_validation->set_rules('stok_produk', 'Stok Produk', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('produk/edit_produk', $data); // form edit produk
            $this->load->view('templates/footer');
        } else {
            $updateData = [
                'nama_produk'   => $this->input->post('nama_produk'),
                'harga_produk'  => $this->input->post('harga_produk'),
                'stok_produk'   => $this->input->post('stok_produk')
            ];
            $this->Product_model->update_produk($id, $updateData);
            $this->session->set_flashdata('success', 'Produk berhasil diupdate!');
            redirect('product/data_produk');
        }
    }

    public function delete($id){
        $this->Product_model->delete_produk($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        redirect('product/data_produk');
    }

    // public function laporan(){
    //     $data = [];

    //     if ($this->input->post('filter')) {
    //         $dari = $this->input->post('dari');
    //         $sampai = $this->input->post('sampai');
    //         $data['laporan'] = $this->Product_model->get_laporan_produk($dari, $sampai);
    //         $data['dari'] = $dari;
    //         $data['sampai'] = $sampai;
    //     }

    //     $this->load->view('templates/header');
    //     $this->load->view('produk/laporan_produk', $data); // view laporan produk
    //     $this->load->view('templates/footer');
    // }
}
