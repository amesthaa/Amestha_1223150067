<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');

        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function data_pelanggan(){
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('pelanggan/data_pelanggan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->load->view('templates/header');
        $this->load->view('pelanggan/form_pelanggan');
        $this->load->view('templates/footer');
    }

    public function insert(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah(); // reload form
        } else {
            $data = [
                'id'        => $this->session->userdata('user_id'), // ID user yang login
                'nama'      => $this->input->post('nama'),
                'alamat'    => $this->input->post('alamat'),
                'no_hp'     => $this->input->post('no_hp')
            ];

            $this->Pelanggan_model->insert($data);
            $this->session->set_flashdata('success', 'Data pelanggan berhasil ditambahkan.');
            redirect('pelanggan/data_pelanggan');
        }
    }

    public function delete($id){
        $this->Pelanggan_model->delete($id);
        $this->session->set_flashdata('success', 'Data pelanggan berhasil dihapus.');
        redirect('pelanggan/data_pelanggan');
    }
    public function edit($id_pelanggan) {
    $data['pelanggan'] = $this->Pelanggan_model->get_by_id($id_pelanggan);

    if (empty($data['pelanggan'])) {
        show_404();
    }
    $this->load->view('templates/header');
    $this->load->view('pelanggan/edit_pelanggan', $data);
    $this->load->view('templates/footer');
}

public function update() {
    $id = $this->input->post('id_pelanggan');
    $data = [
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
    ];

    $this->Pelanggan_model->update($id, $data);
    redirect('pelanggan/data_pelanggan');
}


}
