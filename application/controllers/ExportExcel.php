<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Welcome extends CI_Controller {
    
    public function index()
    {       
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'name-of-the-generated-file.xlsx';
 
        $writer->save($filename); // will create and save the file in the root of the project
 
    }
 
    public function download()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'name-of-the-generated-file';
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
 
    }

    public function ExportExcel()
    {
        $this->load->model('vwLaporanRugiLaba');
		$where = array(
			'MONTH(TanggalTransaksi)' => $this->input->post('month'),
			'YEAR(TanggalTransaksi)' => $this->input->post('year')
		);
		$data = $this->vwLaporanRugiLaba->GetLaporanRugiLaba($where);
        $arrPendapatan = array();
        $arrHargaPokok = array();
        $arrBiayaAdmin = array();
        //$list_transaksi = $this->
		$total_pendapatan = 0;
		$total_harga_pokok = 0;
		$total_biaya_administrasi = 0;
		foreach ($data as $value) {
			if(substr($value->NomorRekening, 0, 1) == '4') {
                $total_pendapatan += $value->Total;
                $arrPendapatan[] = $value;
			}
			else {
				if(substr($value->NomorRekening, 0, 2) == '53') {
                    $total_harga_pokok += $value->Total;
                    $arrHargaPokok[] = $value;
				}
				else {
                    $total_biaya_administrasi += $value->Total;
                    $arrBiayaAdmin[] = $value;
				}
			}
		}
		$laba_kotor = $total_pendapatan - $total_harga_pokok;
		$laba_xxx = $laba_kotor - $total_biaya_administrasi;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->mergeCell('A1:D1');
        $sheet->setCellValue('A1', 'CV JONGGI GANDO SULITAIR');
        
        $sheet->mergeCell('A2:D2');
        $sheet->setCellValue('A2', 'LAPORAN LABA RUGI');

        $sheet->mergeCell('A3:D3');
        $sheet->setCellValue('A3', 'UNTUK TAHUN YANG BERAKHIR PADA 30 SEPTEMBER 2018');

        $sheet->setCellValue('A5', 'PENDAPATAN');
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'name-of-the-generated-file';
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
 
    }
}