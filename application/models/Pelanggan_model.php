<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    public function get_all() {
        return $this->db->get('tbl_pelanggan')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('tbl_pelanggan', $data);
    }

    public function delete($id_pelanggan) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->delete('tbl_pelanggan');
    }

    public function get_by_id($id_pelanggan) {
        return $this->db->get_where('tbl_pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
    }

    public function update($id_pelanggan, $data) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->update('tbl_pelanggan', $data);
    }
}
