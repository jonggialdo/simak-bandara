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

    $this->load->view('v_transaksi/index', $data);
	}

  public function tambahTransaksi(){
		$this->load->model('m_transaksi');

		$data_parent = array(
			'tgl_entry' => date('d-m-y'),
			'created_by' => 'orang',
			'status' => 0,
		);

		$this->m_transaksi->tambahParentTransaksi($data_parent);

		$data['id'] = $this->m_transaksi->getIDTransaksi();

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

		$data_listTransaksi = array(
			'kodeRek' => $kodeRek,
			'tgl_transaksi' => $tgl_transaksi,
			'status' => $status,
			'keterangan' => $keterangan,
			'nominal' => $nominal,
			'id_transaksi' => $id_transaksi,
		);

		$this->ListTransaksiInput($id_transaksi);
		$this->m_transaksi->tambahTransaksi($data_listTransaksi);
		echo json_encode($formData);
  }

	public function editTransaksi(){
		$this->load->model('m_transaksi');
		$id  = $this->uri->segment(3);

		$id_transaksi = $formData['id'];
		$kodeRek= $formData['kodeRek'];
		$tgl_transaksi =  date('d-M-y');//tgl_transaksi
		$status = $formData['status'];
		$keterangan = $formData['keterangan'];
		$nominal = $formData['nominal'];

		$data_listTransaksi = array(
			'kodeRek' => $kodeRek,
			'tgl_transaksi' => $tgl_transaksi,
			'status' => $status,
			'keterangan' => $keterangan,
			'nominal' => $nominal,
			'id_transaksi' => $id_transaksi,
		);

		$this->m_transaksi->editTransaksi($data,$id);

	}

	public function hapusTransaksi(){
		$id = $this->uri->segment(3);
		$this->load->model('m_transaksi');

		$this->m_transaksi->hapusTransaksi($id);
		redirect('index');
	}

	public function ListTransaksi(){
		$this->load->model('m_transaksi');
		$data = $this->m_transaksi->getTransaksi();
		$data = array('data' => $data);

		echo json_encode($data);
	}

	public function ListTransaksiInput($id_transaksi){
		$this->load->model('m_transaksi');

		$data = $this->m_transaksi->getListTransaksiInput($id_transaksi);
		$data = array('data' => $data);

		echo json_encode($data);
	}

	public function detailTransaksi(){
		$this->load->view('v_transaksi/detailTransaksi');
	}

	public function tambahDetailTransaksi(){
	  $this->load->view('v_transaksi/tambahDetailTransaksi');
	}

}
