<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function get_all_produk() {
        return $this->db->get('tbl_produk')->result_array();
    }

    public function insert_produk($data) {
        return $this->db->insert('tbl_produk', $data);
    }

    public function delete_produk($id_produk) {
        return $this->db->delete('tbl_produk', ['id_produk' => $id_produk]);
    }

    public function update_stok($id_produk, $stok_baru) {
    $this->db->set('stok_produk', $stok_baru);
    $this->db->where('id_produk', $id_produk);
    return $this->db->update('tbl_produk');
}



    public function get_produk_by_id($id_produk) {
        return $this->db->get_where('tbl_produk', ['id_produk' => $id_produk])->row_array();
    }

    public function update_produk($id_produk, $data) {
        $this->db->where('id_produk', $id_produk);
        return $this->db->update('tbl_produk', $data);
    }

    public function get_laporan_produk($dari, $sampai) {
        $this->db->where('create_at >=', $dari);
        $this->db->where('create_at <=', $sampai);
        return $this->db->get('tbl_produk')->result();
    }
}
