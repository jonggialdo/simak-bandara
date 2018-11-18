<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
	function __construct(){
		parent::__construct();
	$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		// $this->load->model('mstRekening');
		// $data = $this->mstRekening->GetRekening();
		// $data = array('data' => $data);

		// echo json_encode($data)

		$this->load->view('v_rekening/index');
	}

	public function editRekening(){ //parameternya id rekening
		$this->load->view('v_rekening/editRekening');
	}

	public function tambahRekening(){
		$this->load->view('v_rekening/tambahRekening');
	}
<<<<<<< HEAD

	public function Create(){
		$this->load->model('mstRekening');
		$data = array (
			'kode_rekening' => $this->input->post('kode'),
			'nama_kode' => $this->input->post('nama'),
			'status' => $this->input->post('status'),
			'created_date' => date('y-m-d'),
			'created_by' => "siapa yang edit"
			);
		$data = $this->mstRekening->Create($data);

		redirect(base_url(), 'refresh');
	}

	public function Update(){
		//ilham kurang id + name di form viewnya masih ga jelas
		$id = 1;
		$kode_rekening = $this->input->post('kode');
		$nama_kode = $this->input->post('nama');
		$status = $this->input->post('status');
		$updated_date = date('y-m-d');
		$updated_by = "siapa yang edit";

		$data = array(
			'kode_rekening' => $kode_rekening,
			'nama_kode' => $nama_kode,
			'status' => $status,
			'updated_date' => $updated_date,
			'updated_by' => $updated_by 
		);

		$where = array(
			'id' => $id
		);

		$this->load->model('mstRekening');
		$result = $this->mstRekening->Update($data, $where);

		if($result>0){
			redirect('Rekening/index', 'refresh');
		}
	}

	public function Delete($id){
		$id = array('id' => $id);
		$this->load->model('mstRekening');
		$this->mstRekening->Delete($id);
		redirect(base_url(), 'refresh');
	}
}

