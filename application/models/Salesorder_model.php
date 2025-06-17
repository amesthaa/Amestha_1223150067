<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesorder_model extends CI_Model {

    public function get_all() {
        $this->db->select('tbl_so.*, p.nama as nama_pelanggan, pr.nama_produk, pr.harga_produk');
        $this->db->from('tbl_so');
        $this->db->join('tbl_pelanggan p', 'tbl_so.id_pelanggan = p.id_pelanggan');
        $this->db->join('tbl_produk pr', 'tbl_so.id_produk = pr.id_produk');
        return $this->db->get()->result_array();
    }

    public function insert($data) {
        return $this->db->insert('tbl_so', $data);
    }

    public function delete($id_so) {
        $this->db->where('id_so', $id_so);
        return $this->db->delete('tbl_so');
    }

    public function get_by_id($id_so) {
        return $this->db->get_where('tbl_so', ['id_so' => $id_so])->row_array();
    }

    public function update($id_so, $data) {
        $this->db->where('id_so', $id_so);
        return $this->db->update('tbl_so', $data);
    }
    public function get_by_sales($id_sales) {
    $this->db->select('tbl_so.*, p.nama AS nama_pelanggan, pr.nama_produk, pr.harga_produk');
    $this->db->from('tbl_so');
    $this->db->join('tbl_pelanggan p', 'tbl_so.id_pelanggan = p.id_pelanggan');
    $this->db->join('tbl_produk pr', 'tbl_so.id_produk = pr.id_produk');
    $this->db->where('tbl_so.id_sales', $id_sales);
    return $this->db->get()->result_array();
}
 public function get_sales_by_user_id($user_id) {
        return $this->db->get_where('sales', ['id' => $user_id])->row_array();
    }
    public function laporan_penjualan_per_sales() {
    $this->db->select('s.nama_sales, SUM(tbl_so.total_harga) as total_penjualan, COUNT(tbl_so.id_so) as jumlah_so');
    $this->db->from('tbl_so');
    $this->db->join('sales s', 'tbl_so.id_sales = s.id_sales');
    $this->db->group_by('tbl_so.id_sales');
    return $this->db->get()->result_array();
}
public function laporan_penjualan_per_produk() {
    $this->db->select('pr.nama_produk, COUNT(tbl_so.id_so) as jumlah_terjual, SUM(tbl_so.total_harga) as total_penjualan');
    $this->db->from('tbl_so');
    $this->db->join('tbl_produk pr', 'tbl_so.id_produk = pr.id_produk');
    $this->db->where('tbl_so.status !=', 'dibatalkan'); // Tambahkan ini
    $this->db->group_by('tbl_so.id_produk');
    return $this->db->get()->result_array();
}


public function laporan_periode($tanggal_mulai, $tanggal_selesai) {
    $this->db->select('tbl_so.*, p.nama AS nama_pelanggan, pr.nama_produk');
    $this->db->from('tbl_so');
    $this->db->join('tbl_pelanggan p', 'tbl_so.id_pelanggan = p.id_pelanggan');
    $this->db->join('tbl_produk pr', 'tbl_so.id_produk = pr.id_produk');
    $this->db->where('tbl_so.created_at >=', $tanggal_mulai);
    $this->db->where('tbl_so.created_at <=', $tanggal_selesai);
    return $this->db->get()->result_array();
}





}
