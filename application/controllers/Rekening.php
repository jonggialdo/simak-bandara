<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
	function __construct(){
		parent::__construct();
	$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('v_rekening/index');
	}

	public function editRekening(){ //parameternya id rekening
		$this->load->view('v_rekening/editRekening');
	}

	public function tambahRekening(){
		$this->load->view('v_rekening/tambahRekening');
	}
}