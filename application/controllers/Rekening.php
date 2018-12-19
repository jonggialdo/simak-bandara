<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != 'login') {
			redirect(Login);
		}
	$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('v_rekening/index');
	}

	public function editRekening(){
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

		$this->db->where('kode_rekening', $data['kode_rekening']);
		$this->db->from('kode_rekening'); 
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result();

		if($result == null) {
			$data = $this->mstRekening->Create($data);
			$formData['message'] = "Berhasil Menambahkan Kode Rekening";
		}
		else {
			$formData['message'] = "Kode Rekening Sudah Pernah Digunakan";
		}	

		echo json_encode($formData);
	}

	public function Update(){
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

		$this->db->where('kode_rekening', $data['kode_rekening']);
		$this->db->from('kode_rekening'); 
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result();

		if($result == null) {
			$this->load->model('mstRekening');
			$result = $this->mstRekening->Update($data, $where);
			$formData['message'] = "Berhasil Merubah Kode Rekening";
		}
		else {
			$formData['message'] = "Kode Rekening Sudah Pernah Digunakan";
		}
		
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
		$where = array('status' => $this->uri->segment(3));
		$data = $this->mstRekening->GetRekening($where);
		$data = array('data' => $data);

		echo json_encode($data);
	}
}

