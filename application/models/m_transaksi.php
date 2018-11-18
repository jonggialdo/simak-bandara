<?php

class M_rekening extends CI_Model{
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
  
}

 ?>
