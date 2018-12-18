<?php
defined('BASEPATH') or exit('No direct script access allowed');

class vwLaporanNeraca extends CI_Model{
    public function GetLaporanNeraca($where) {
        $result = $this->db->get_where('vwlaporanneraca', $where);

        return $result;
    }
}
?>
