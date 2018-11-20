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
			'kd_debet' => $this->input->post('kd_debet'),
			'kd_kredit' => $this->input->post('kd_kredit'),
			'tgl_transaksi' => $this->input->post('tgl_transaksi'),
			'uraian' => $this->input->post('uraian'),
			'nominal_debet' => $this->input->post('nominal_debet'),
			'nominal_kredit' => $this->input->post('nominal_kredit')
		);

		$this->m_dokumen->insertTransaksi($data);
		redirect('index');
  }

	public function editTransaksi(){
		$this->load->model('m_transaksi');
		$id  = $this->uri->segment(3);

		$data = array(
			'kd_debet' => $this->input->post('kd_debet'),
			'kd_kredit' => $this->input->post('kd_kredit'),
			'tgl_transaksi' => $this->input->post('tgl_transaksi'),
			'uraian' => $this->input->post('uraian'),
			'nominal_debet' => $this->input->post('nominal_debet'),
			'nominal_kredit' => $this->input->post('nominal_kredit')
		);

		$this->m_transaksi->editTransaksi($data,$id);
	}

	public function hapusTransaksi(){
		$id = $this->uri->segment(3);
		$this->load->model('m_transaksi');
		$this->m_dokumen->delete_dok($id);
		redirect('index');
	}

}