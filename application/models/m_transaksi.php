<?php

class M_transaksi extends CI_Model{
  public function __construct(){
    $this->load->database();
    function __construct() {
    }
  }

  public function getTransaksi(){
    $this->db->order_by('id');
    $q = $this->db->get('transaksi');
    return $q->result();
  }

  public function getListTransaksiInput($id_transaksi){
    // $user = $this->session->userdata('username');
    $this->db->where('id_transaksi', $id_transaksi);
    // $this->db->where('username', $user);
    return $this->db->get('list_transaksi')->result_array();
  }

  public function tambahParentTransaksi($data_parent){
    $this->db->insert('transaksi', $data_parent);
  }

  public function getIDTransaksi(){
    // $user = $this->session->userdata('username');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    // $this->db->get_where('username', $user);
    $q = $this->db->get('transaksi')->result_array();
    return $q;
  }

  public function tambahTransaksi($data_listTransaksi){
    $this->db->insert('list_transaksi',$data_listTransaksi);
  }

  public function getEditTransaksi($id_listTransaksi){
    $this->db->where('id', $id_listTransaksi);
    return $this->db->get('list_transaksi')->row_array();
  }

  public function editParentTransaksi($data_parentTransaksi,$id_transaksi){
    $this->db->where('id',$id_transaksi);
    $this->db->update('transaksi',$data_parentTransaksi);
  }

  public function editListTransaksi($data_listTransaksi, $id_listTransaksi){
    $this->db->where('id',$id_listTransaksi);
    $this->db->update('transaksi',$data_listTransaksi);
  }

  public function hapusTransaksi($id_listTransaksi){
    return $this->db->delete('list_transaksi', array('id_ptp'=>$id_listTransaksi));
  }
}

 ?>
