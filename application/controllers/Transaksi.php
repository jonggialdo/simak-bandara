<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();
	$this->load->helper(array('form', 'url'));
	}

	public function index(){
		$this->load->model('m_transaksi');

    $data['trx'] = $this->m_transaksi->getTransaksi();

    $this->load->view('v_listTransaksi', $data);
	}

  public function viewTambahTransaksi(){
    $this->load->view('v_addTransaksi');
  }

  public function tambahTransaksi(){
    $this->load->model('m_transaksi');

		$data = array(

		);


  }

}
