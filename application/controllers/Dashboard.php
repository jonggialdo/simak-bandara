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

	public function searchDashboard(){
		$this->load->model('vwRugiLaba');
		$this->load->model('vwNeraca');
		$this->load->model('vwPosisiKas');
		$this->load->model('vwList');

		$formData = json_decode($this->input->post('data'), true);
		$tipeDashboard = $formData['tipeDashboard'];
		$like = $formData['keyword'];
		$where = array(
			'MONTH(TanggalTransaksi)' => $formData['month'],
			'YEAR(TanggalTransaksi)' => $formData['year']
		);

		if($tipeDashboard == 'rugiLaba'){
			$data = $this->vwRugiLaba->GetListRugiLaba($where, $like);
		}else if($tipeDashboard == 'posisiKas'){
			$data = $this->vwPosisiKas->GetListPosisiKas($where, $like);
		}else if($tipeDashboard == 'neraca'){
			$data = $this->vwNeraca->GetListNeraca($where,$like);
		}else if($tipeDashboard == 'bukuBesar'){
			$data = $this->vwList->GetListBukuBesar($where, $like);
		}

		$data = array('data' => $data);
		echo json_encode($data);
	}

	public function searchListTransaksi(){
		$this->load->model('vwList');

		$formData = json_decode($this->input->post('data'), true);

		$like = $formData['keyword'];
		$tgl_awal = $formData['startDate'];
		$tgl_selesai = $formData['endDate'];

		if($tgl_awal == ""){
			$tgl_awal = ('1980-01-01');
		}
		if($tgl_selesai != ""){
			$tgl_selesai = strtotime($tgl_selesai);
			$tgl_selesai = date("y-m-d", $tgl_selesai);
		}

		$tgl_awal = strtotime($tgl_awal);
		$tgl_awal = date("y-m-d", $tgl_awal);

		$data = $this->vwList->getSearchListTransaksi($like, $tgl_awal, $tgl_selesai);
		$data = array('data' => $data);
		echo json_encode($data);
	}
}
