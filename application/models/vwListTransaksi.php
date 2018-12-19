<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vwNeraca extends CI_Model{
  public function getSearchListTransaksi($like, $tgl_awal, $tgl_selesai){
    if($like != NULL && $tgl_awal != NULL && $tgl_selesai != NULL) {
      $this->db->like('NomorRekening', $like, 'after');
      $this->db->where('tgl_transaksi >=', $tgl_awal);
      $this->db->where('tgl_transaksi <=', $tgl_selesai);
      return $this->db->get('list_transaksi')->result();
    }else if($like != NULL && $tgl_awal != NULL && $tgl_selesai == NULL){
      $this->db->like('NomorRekening', $like, 'after');
      $this->db->where('tgl_transaksi >=', $tgl_awal);
      return $this->db->get('list_transaksi')->result();
    }else if($like != NULL && $tgl_awal == NULL && $tgl_selesai != NULL){
      $this->db->like('NomorRekening', $like, 'after');
      $this->db->where('tgl_transaksi <=', $tgl_selesai);
      return $this->db->get('list_transaksi')->result();
    }else if($like == NULL && $tgl_awal != NULL && $tgl_selesai != NULL){
      $this->db->where('tgl_transaksi >=', $tgl_awal);
      $this->db->where('tgl_transaksi <=', $tgl_selesai);
      return $this->db->get('list_transaksi')->result();
    }else if($like != NULL && $tgl_awal == NULL && $tgl_selesai == NULL){
      $this->db->like('NomorRekening', $like, 'after');
      return $this->db->get('list_transaksi')->result();
    }else if($like == NULL && $tgl_awal != NULL && $tgl_selesai == NULL){
      $this->db->where('tgl_transaksi >=', $tgl_awal);
      return $this->db->get('list_transaksi')->result();
    }else if($like == NULL && $tgl_awal == NULL && $tgl_selesai != NULL){
      $this->db->where('tgl_transaksi <=', $tgl_selesai);
      return $this->db->get('list_transaksi')->result();
    }else{
      return $this->db->get('list_transaksi')->result();
    }
  }

    public function GetListBukuBesar($where,$like) {
        if($like != NULL) {
            $this->db->like('NomorRekening', $like, 'after');
        }
        $result = $this->db->get_where('vwlist_tr', $where);

        return $result->result();
    }
}
?>
