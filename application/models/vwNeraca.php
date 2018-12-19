<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vwNeraca extends CI_Model{
    public function GetListNeraca($where, $like) {
        if($like != NULL) {
            $this->db->like('NomorRekening', $like, 'after');
        }
        $result = $this->db->get_where('vwneraca', $where);

        return $result->result();
    }
}
?>
