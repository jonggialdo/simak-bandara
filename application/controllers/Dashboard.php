<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
	$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('dashboard/v_dashboard');
	}

	public function bukuBesar()
	{
		$this->load->view('dashboard/v_bukuBesar');
	}

	public function Transaksi()
	{
		$this->load->view('dashboard/v_listTransaksi');
	}

	public function GetListRekening(){
		$filter = $this->uri->segment(3);
	}

	public function LaporanNeraca() {
		$this->load->model('vwLaporanNeraca');
		$where = array(
			'MONTH(TanggalTransaksi)' => $this->input->post('month'),
			'YEAR(TanggalTransaksi)' => $this->input->post('year')
		);
		$data = $this->vwLaporanNeraca->GetLaporanNeraca($where);
		$data = array('data' => $data);

		echo json_encode($data);
	}

	public function GetNeraca() {
		$this->load->model('vwNeraca');
		$like = $this->input->post('keyword');
		$where = array(
			'MONTH(TanggalTransaksi)' => $this->input->post('month'),
			'YEAR(TanggalTransaksi)' => $this->input->post('year')
		);
		$data = $this->vwNeraca->GetListNeraca($where, $like);
		$data = array('data' => $data);

		echo json_encode($data);
	}

	public function GetRugiLaba() {
		$this->load->model('vwRugiLaba');
		$this->load->model('vwRugiLaba');
		$like = $this->input->post('keyword');
		$where = array(
			'MONTH(TanggalTransaksi)' => $this->input->post('month'),
			'YEAR(TanggalTransaksi)' => $this->input->post('year')
		);
		$data = $this->vwRugiLaba->GetListRugiLaba($where, $like);
		$data = array('data' => $data);

		echo json_encode($data);
	}

	public function LaporanRugiLaba() {
		$this->load->model('vwLaporanRugiLaba');
		$where = array(
			'MONTH(TanggalTransaksi)' => $this->input->post('month'),
			'YEAR(TanggalTransaksi)' => $this->input->post('year')
		);
		$data = $this->vwLaporanRugiLaba->GetLaporanRugiLaba($where);
		$list_transaksi = $this->
		$total_pendapatan = 0;
		$total_harga_pokok = 0;
		$total_biaya_administrasi = 0;
		foreach ($data as $value) {
			if(substr($value->NomorRekening, 0, 1) == '4') {
				$total_pendapatan += $value->Total;
			}
			else {
				if(substr($value->NomorRekening, 0, 2) == '53') {
					$total_harga_pokok += $value->Total;
				}
				else {
					$total_biaya_administrasi += $value->Total;
				}
			}
		}
		$laba_kotor = $total_pendapatan - $total_harga_pokok;
		$laba_xxx = $laba_kotor - $total_biaya_administrasi;
		$result = array(
			'data' => $data,
			'tp' => $total_pendapatan,
			'thp' => $total_harga_pokok,
			'lk' => $laba_kotor,
			'tba' => $total_biaya_administrasi,
			'lx' => $laba_xxx
		);

		echo json_encode($result);
	}
}
