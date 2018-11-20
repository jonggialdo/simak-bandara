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
		$id = $this->uri->segment(3);
		$this->load->view('v_rekening/editRekening', ['id' => $id]);
	}

	public function tambahRekening(){
		$this->load->view('v_rekening/tambahRekening');
	}

	public function Create(){
		$this->load->model('mstRekening');
		$data = array (
			'kode_rekening' => $this->input->post('tbxKodeRekening'),
			'nama_kode' => $this->input->post('tbxNamaKode'),
			'status' => $this->input->post('slsStatusRekening'),
			'created_date' => date('y-m-d'),
			'created_by' => "siapa yang buat"
			);
		$data = $this->mstRekening->Create($data);

	}

	public function Update(){
		//ilham kurang id + name di form viewnya masih ga jelas
		$id = $this->input->post('id');
		$kode_rekening = $this->input->post('tbxKodeRekening');
		$nama_kode = $this->input->post('tbxNamaKode');
		$status = $this->input->post('slsStatusRekening');
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

	public function Delete(){
		$id = array('id' => $this->uri->segment(3));
		$this->load->model('mstRekening');
		$this->mstRekening->Delete($id);
		redirect(base_url(), 'refresh');
	}

	public function ListRekening(){
		$this->load->model('mstRekening');
		$data = $this->mstRekening->GetRekening();
		$data = array('data' => $data);

		echo json_encode($data);
	}
}

