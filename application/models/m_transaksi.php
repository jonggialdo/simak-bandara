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

  public function tambahParentTransaksi($data_parent){
    $this->db->insert('transaksi', $data_parent);
  }

  public function getIDTransaksi(){
    // $user = $this->session->userdata('username');
    $this->db->order_by('id', 'DESC');
    // $this->db->get_where('username', $user);
    $q = $this->db->get('transaksi')->row();
    return $q;

  }

  public function tambahTransaksi($data){
    $this->db->insert('transaksi',$data);
  }

  public function editTransaksi($data,$id){
    $this->db->where('id',$id);
    $this->db->update('transaksi',$data);
  }

}

 ?>
