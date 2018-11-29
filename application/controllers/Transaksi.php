<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();
	$this->load->helper(array('form', 'url'));
	}

	public function index(){
		$this->load->model('m_transaksi');
<<<<<<< HEAD
    $this->load->view('v_transaksi/index', $data);
	}


  public function viewTambahTransaksi(){
    $this->load->view('v_transaksi/v_addTransaksi');
=======

    $data['trx'] = $this->m_transaksi->getTransaksi();

    $this->load->view('v_transaksi/index', $data);
	}

  public function tambahTransaksi(){
    $this->load->view('v_transaksi/tambahTransaksi');
>>>>>>> 18035758e6caf74a88cc974df0082d08dcbc882d
  }

  public function Create(){
		$this->load->model('m_transaksi');
		
		$formData = json_decode($this->input->post('data'), true);

		$formData = json_decode($this->input->post('data'), true);

		$data = array(
			'kd_debet' => $formData['kodeDeb'],
			'kd_kredit' => $formData['kodeKre'],
			'tgl_transaksi' =>  date('d-M-y'),//$formData['tglTrans'],
			'uraian_debet' => $formData['uraianDeb'],
			'uraian_kredit' => $formData['uraianKre'],
			'nominal_debet' => $formData['nominalDeb'],
			'nominal_kredit' => $formData['nominalKre']
		);

<<<<<<< HEAD
		$this->m_dokumen->insertTransaksi($data);

=======
		$this->m_transaksi->tambahTransaksi($data);
>>>>>>> 18035758e6caf74a88cc974df0082d08dcbc882d
		echo json_encode($formData);
  }

	public function editTransaksi(){
		$this->load->model('m_transaksi');
		$id  = $this->uri->segment(3);

		$data = array(
			'kd_debet' => $this->input->post('kd_debet'),
			'kd_kredit' => $this->input->post('kd_kredit'),
			'tgl_transaksi' => date('d-M-y'),
			'uraian_debet' => $formData['uraianDeb'],
			'uraian_kredit' => $formData['uraianKre'],
			'nominal_debet' => $this->input->post('nominal_debet'),
			'nominal_kredit' => $this->input->post('nominal_kredit')
		);

		$this->m_transaksi->editTransaksi($data,$id);

	}

	public function hapusTransaksi(){
		$id = $this->uri->segment(3);
		$this->load->model('m_transaksi');
<<<<<<< HEAD
		$this->m_dokumen->delete_dok($id);
		redirect(base_url(), 'refresh');
=======
		$this->m_transaksi->hapusTransaksi($id);
		redirect('index');
>>>>>>> 18035758e6caf74a88cc974df0082d08dcbc882d
	}

	public function ListTransaksi(){
		$this->load->model('m_transaksi');
		$data = $this->m_transaksi->getTransaksi();
		$data = array('data' => $data);

		echo json_encode($data);
	}

}
