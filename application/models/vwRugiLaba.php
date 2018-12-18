<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vwRugiLaba extends CI_Model{
    public function GetListRugiLaba($where, $like) {
        if($like != NULL) {
            $this->db->like('NomorRekening', $like, 'after');
        }
        $result = $this->db->get_where('vwrugilaba', $where);

        return $result->result();
    }
}
?>
