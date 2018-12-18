<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vwLaporanRugiLaba extends CI_Model{
    public function GetLaporanRugiLaba($where) {
        $result = $this->db->get_where('vwlaporanrugilaba', $where);

        return $result->result();
    }
}
?>
