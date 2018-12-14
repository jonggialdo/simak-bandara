<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function cek_login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $this->db->where('email', $email);
    $this->db->order_by('jabatan', 'ASC');
    $myquery = $this->db->get('v_login');
    $row = $myquery->row();


    $where = array('email'=>$email);

    if(isset($row)){
      $hashed =$row->password;

      if(password_verify($password, $hashed)){

        $this->db->order_by('jabatan','ASC');
        $data = $this->db->get_where('v_login',$where);

        if($data->num_rows()>0)
          return TRUE;
        else
          return FALSE;
        }
      }
  }

  public function set_login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // $where = array('email'=>$email);

     $this->db->where('email',$email);
     $data = $this->db->get('v_login')->result_array();

     // $result = [];

     // foreach($data as $array){
     //   $nama_divisi = $array['nama_divisi'];
     //   array_push($result,$nama_divisi);
     // }

     // foreach($data as $array){
     //   $idkaryawan = $array['idkaryawan'];
     //   $nama = $array['nama'];
     //   $nik = $array['nik'];
     //   $nama_departmen = $array['nama_departmen'];
     //   $jabatan = $array['jabatan'];
     // }

      // $data_session = array(
      //   'idkaryawan' =>$idkaryawan,
      //   'nama'=>$nama,
      //   'nik'=>$nik,
      //   'nama_departmen'=>$nama_departmen,
      //   'nama_divisi'=>$result,
      //   'jabatan'=>$jabatan,
      //   'is_login'=>TRUE
      // );

      foreach($data as $array)
        $data_session = array(
          'idkaryawan' =>$array['idkaryawan'],
          'nama'=>$array['nama'],
          'nik'=>$array['nik'],
          'nama_departmen'=>$array['nama_departmen'],
          'nama_divisi'=>$array['nama_divisi'],
          'jabatan'=>$array['jabatan'],
          'is_login'=>TRUE
        );

    $this->session->set_userdata($data_session);
  }

}
