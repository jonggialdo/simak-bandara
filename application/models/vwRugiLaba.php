<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vwRugiLaba extends CI_Model{
    public function GetListRugiLaba($where) {
        $result = $this->db->get_where('vwrugilaba', $where);

        return $result->result();
    }
}
?>
