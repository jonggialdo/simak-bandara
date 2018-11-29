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
    $this->load->view('v_transaksi/tambahTransaksi');
  }

  public function Create(){
		$this->load->model('m_transaksi');

		$formData = json_decode($this->input->post('data'), true);

		$data = array(
			'kd_debet' => $formData['kodeDeb'],
			'kd_kredit' => $formData['kodeKre'],
			'tgl_transaksi_debet' =>  date('d-M-y'),//$formData['tglTrans'],
			'tgl_transaksi_kredit' =>  date('d-M-y'),//$formData['tglTrans'],
			'uraian_debet' => $formData['uraianDeb'],
			'uraian_kredit' => $formData['uraianKre'],
			'nominal_debet' => $formData['nominalDeb'],
			'nominal_kredit' => $formData['nominalKre'],
			'tgl_entry' => date('d-M-y'),
			'created_by' => 'siapa yang buat',
		);
		$this->m_transaksi->tambahTransaksi($data);
		echo json_encode($formData);
  }

	public function editTransaksi(){
		$this->load->model('m_transaksi');
		$id  = $this->uri->segment(3);

		$data = array(
			'kd_debet' => $this->input->post('kd_debet'),
			'kd_kredit' => $this->input->post('kd_kredit'),
			'tgl_transaksi_debet' =>  date('d-M-y'),//$formData['tglTrans'],
			'tgl_transaksi_kredit' =>  date('d-M-y'),//$formData['tglTrans'],
			'uraian_debet' => $formData['uraianDeb'],
			'uraian_kredit' => $formData['uraianKre'],
			'nominal_debet' => $this->input->post('nominal_debet'),
			'nominal_kredit' => $this->input->post('nominal_kredit'),
			'tgl_edit' => date('d-m-y')
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

}
