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
		$this->load->model('mstRekening');
		$id = array('id' => $this->uri->segment(3));
		$data['data'] = $this->mstRekening->GetSingleRekening($id);
		$this->load->view('v_rekening/editRekening', $data);
	}

	public function tambahRekening(){
		$this->load->view('v_rekening/tambahRekening');
	}

	public function Create(){
		$this->load->model('mstRekening');

		$formData = json_decode($this->input->post('data'), true);

		$data = array (
			'kode_rekening' => $formData['kode'],
			'nama_kode' =>  $formData['nama'],
			'status' =>  $formData['status'],
			'created_date' => date('y-m-d'),
			'created_by' => "siapa yang buat"
		);

		$data = $this->mstRekening->Create($data);

		echo json_encode($formData);
	}

	public function Update(){
		//ilham kurang id + name di form viewnya masih ga jelas
		$formData = json_decode($this->input->post('data'), true);

		$data = array(
			'kode_rekening' => $formData['kode'],
			'nama_kode' =>  $formData['nama'],
			'status' =>  $formData['status'],
			'updated_date' => date('y-m-d'),
			'updated_by' => "siapa yang edit"
		);

		$where = array(
			'id' => $formData['id']
		);

		$this->load->model('mstRekening');
		$result = $this->mstRekening->Update($data, $where);

		echo json_encode($formData);
	}

	public function Delete(){
		$id = array('id' => $this->uri->segment(3));
		$this->load->model('mstRekening');
		$this->mstRekening->Delete($id);
		redirect(base_url("Rekening"), 'refresh');
	}

	public function ListRekening(){
		$this->load->model('mstRekening');
		$data = $this->mstRekening->GetRekening();
		$data = array('data' => $data);

		echo json_encode($data);
	}
}
