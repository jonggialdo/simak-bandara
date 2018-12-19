<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vwNeraca extends CI_Model{
    public function GetListPosisiKas($where,$like) {
        if($like != NULL) {
            $this->db->like('NomorRekening', $like, 'after');
        }
        $result = $this->db->get_where('vwposisikas', $where);

        return $result->result();
    }
}
?>
