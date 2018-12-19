<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vwList extends CI_Model{
  public function getSearchListTransaksi($like, $tgl_awal, $tgl_selesai){
    if($like != NULL) {
      $this->db->like('NomorRekening', $like, 'after');
    }
    $this->db->where('TanggalTransaksi >=', $tgl_awal);
    if($tgl_selesai != NULL){
      $this->db->where('TanggalTransaksi <=', $tgl_selesai);
    }
    $data = $this->db->get('vwlisttransaksi')->result();
    return $data;
    }

  public function GetListBukuBesar($where,$like) {
      if($like != NULL) {
          $this->db->like('NomorRekening', $like, 'after');
      }
      $result = $this->db->get_where('vwlisttransaksi', $where);

      return $result->result();
  }
}
?>
