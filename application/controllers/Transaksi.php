<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();
	$this->load->helper(array('form', 'url'));
}

  public function tambahTransaksi(){
		$this->load->model('m_transaksi');

		$data_parent = array(
			'status' => 0,
		);

		$this->m_transaksi->tambahParentTransaksi($data_parent);

		$data['id'] = $this->m_transaksi->getIDTransaksi();
		$id_transaksi = $data['id']['0']['id'];

		// $this->ListTransaksiInput($id_transaksi);
    $this->load->view('v_transaksi/index', $data);
  }

  public function Create(){
		$this->load->model('m_transaksi');

		$formData = json_decode($this->input->post('data'), true);

		$id_transaksi = $formData['id'];
		$kodeRek= $formData['kodeRek'];
		$tgl_transaksi =  date('d-M-y');//tgl_transaksi
		$status = $formData['status'];
		$keterangan = $formData['keterangan'];
		$nominal = $formData['nominal'];
		// $created_by = $this->session->userdata('username');

		$data_listTransaksi = array(
			'kodeRek' => $kodeRek,
			'tgl_transaksi' => $tgl_transaksi,
			'status' => $status,
			'keterangan' => $keterangan,
			'nominal' => $nominal,
			'id_transaksi' => $id_transaksi,
			'created_by' => 'orang',
			'tgl_entry' => date('d-m-y'),
		);

		$this->m_transaksi->tambahTransaksi($data_listTransaksi);

		$formData['id'] = $id_transaksi;
		echo json_encode($formData);
  }

	public function konfirmasiTransaksi(){
		$this->load->model('m_transaksi');

		$formData = json_decode($this->input->post('data'), true);
		$id_transaksi = $formData['id'];

		$data_parentTransaksi = array(
			'status' => 'confirmed',
		);

		$this->m_transaksi->editParentTransaksi($data_parentTransaksi, $id_transaksi);
		redirect(base_url());
	}

	public function getEditTransaksi(){
		$this->load->model('m_transaksi');
		$id_listTransaksi  = $this->uri->segment(3);

		$query = $this->m_transaksi->getEditTransaksi($id_listTransaksi);
		echo json_encode($query);
	}

	public function editTransaksi(){
		$this->load->model('m_transaksi');
		$id_listTransaksi  = $this->uri->segment(3);
		$formData = json_decode($this->input->post('data'), true);

		$kodeRek= $formData['kodeRek'];
		$tgl_transaksi =  $formdata['tgl_transaksi'];
		$status = $formData['status'];
		$keterangan = $formData['keterangan'];
		$nominal = $formData['nominal'];
		//$edited_by = $this->session->userdata('username);

		$data_listTransaksi = array(
			'kodeRek' => $kodeRek,
			'tgl_transaksi' => $tgl_transaksi,
			'status' => $status,
			'keterangan' => $keterangan,
			'nominal' => $nominal,
			'edited_by' => 'orang',
			'tgl_edit' => date('d-M-y'),
		);

		$this->m_transaksi->editListTransaksi($data_listTransaksi,$id_listTransaksi);

	}

	public function ListTransaksi(){//tabel transaksi harian yang udah di konfirmasi, masih perlu di edit
		$this->load->model('m_transaksi');
		$data = $this->m_transaksi->getTransaksi();
		$data = array('data' => $data);

		echo json_encode($data);
	}

	public function ListTransaksiInput(){
		$this->load->model('m_transaksi');
		$id_transaksi = $this->uri->segment(3);

		$data = $this->m_transaksi->getListTransaksiInput($id_transaksi);
		$data = array('data' => $data);

		echo json_encode($data);
	}

	public function hapusTransaksi(){
		$id_listTransaksi = $this->uri->segment(3);
		$this->load->model('m_transaksi');

		$this->m_transaksi->hapusTransaksi($id_listTransaksi);
	}
}
