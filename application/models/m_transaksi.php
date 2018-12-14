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

  public function tambahTempTransaksi($data){
    $this->db->insert('temp_transaksi', $data);
  }

  public function getTempTransaksi($data){
    $this->db->order_by('id');
    $q = $this->db->get('temp_transaksi');
    return $q->result();
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
