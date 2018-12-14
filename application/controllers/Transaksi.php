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
		$query = $this->m_transaksi->getIDTransaksi();

		// var_dump($query);die();

		foreach($query as $key){
			$id = $key->id;
		}
		var_dump($id);die();

    $this->load->view('v_transaksi/tambahTransaksi');
  }

  public function Create(){
		$this->load->model('m_transaksi');

		$kd_debet = $formData['kodeDeb'];
		$kd_kredit = $formData['kodeKre'];
		$tgl_transaksi =  date('d-M-y');
		$uraian_debet = $formData['uraianDeb'];
		$uraian_kredit = $formData['uraianKre'];
		$nominal_debet = $formData['nominalDeb'];
		$nominal_kredit = $formData['nominalKre'];

		$total_debet = '1';
		$total_kredit = '1';


		$data_listTransaksi = array(
			'kd_debet' => $kd_debet,
			'kd_kredit' => $kd_kredit,
			'tgl_transaksi' => $tgl_transaksi,
			'uraian_debet' => $uraian_debet,
			'uraian_kredit' => $uraian_kredit,
			'nominal_debet' => $nominal_debet,
			'nominal_kredit' => $nominal_kredit,
			'id_transaksi' => $id_transaksi,
		);

		$this->m_transaksi->tambahTransaksi($data_transaksi);
		$this->m_transaksi->tambahListTransaksi($data_listTransaksi);
		echo json_encode($formData);
  }

	public function editTransaksi(){
		$this->load->model('m_transaksi');
		$id  = $this->uri->segment(3);

		$data = array(
			'kd_debet' => $this->input->post('kd_debet'),
			'kd_kredit' => $this->input->post('kd_kredit'),
			'tgl_transaksi' =>  date('d-M-y'),//$formData['tglTrans'],
			'uraian_debet' => $formData['uraianDeb'],
			'uraian_kredit' => $formData['uraianKre'],
			'nominal_debet' => $this->input->post('nominal_debet'),
			'nominal_kredit' => $this->input->post('nominal_kredit'),
			'tgl_edit' => date('d-M-y')
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

	public function detailTransaksi(){
		$this->load->view('v_transaksi/detailTransaksi');
	}

	public function tambahDetailTransaksi(){
	  $this->load->view('v_transaksi/tambahDetailTransaksi');
	}

}
