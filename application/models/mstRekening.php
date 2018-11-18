<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class mstRekening extends CI_Model{
    public function Create($mstRekening){
        $result = $this->db->insert('kode_rekening', $mstRekening);

        return $result;
    }

    public function Update($mstRekening, $where){
        $result = $this->db->update('kode_rekening', $mstRekening, $where);

        return $result;
    }

    public function Delete($where){
        $result = $this->db->delete('kode_rekening', $where);

        return $result;
    }

    public function GetRekening(){
        $result = $this->db->get('kode_rekening');

        return $result->result_array();
    }

    public function GetSingleRekening($data){
        $result = $this->db->get_where('kode_rekening', $data);

        return $result->result_array();
    }
}
?>