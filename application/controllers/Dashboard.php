<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
	$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('dashboard/v_dashboard');
	}

	public function bukuBesar()
	{
		$this->load->view('dashboard/v_bukuBesar');
	}

	public function Transaksi()
	{
		$this->load->view('dashboard/v_listTransaksi');
	}

	public function GetListRekening(){
		$filter = $this->uri->segment(3);
	}
}

