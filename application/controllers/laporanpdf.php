<?php
    class Laporanpdf extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->library('pdf');
        }

        function index($menu = 'ringkasan') {
            $pdf = new FPDF('l', 'mm', 'A5');
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(190,7,'AKU CUMA MAU TEST AJA',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'DAFTAR KODE REKENING',0,1,'C');
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            if($menu == 'transaksi') {
                $pdf->Cell(15,6,'NO',1,0, 'C');
                $pdf->Cell(25,6,'TANGGAL',1,0, 'C');
                $pdf->Cell(50,6,'URAIAN',1,0, 'C');
                $pdf->Cell(35,6,'KODE REKENING',1,0, 'C');
                $pdf->Cell(25,6,'DEBET',1,0, 'C');
                $pdf->Cell(25,6,'KREDIT',1,1, 'C');
                $pdf->SetFont('Arial','',10);
                // $transaksi = $this->db->get('kode_rekening')->result();
                // foreach ($transaksi as $row) {
                //     $pdf->Cell(35,6,$row->kode_rekening,1,0);
                //     $pdf->Cell(85,6,$row->nama_kode,1,0);
                //     $pdf->Cell(27,6,$row->status,1,1);
                // }
            }
            else if($menu == 'ringkasan') {
                $pdf->Cell(15,6,'NO',1,0, 'C');
                $pdf->Cell(25,6,'TANGGAL',1,0, 'C');
                $pdf->Cell(50,6,'URAIAN',1,0, 'C');
                $pdf->Cell(25,6,'DEBET',1,0, 'C');
                $pdf->Cell(25,6,'KREDIT',1,1, 'C');
                $pdf->SetFont('Arial','',10);
            }
            else if($menu == 'rugilaba') {
                $pdf->Cell(15,6,'NO',1,0, 'C');
                $pdf->Cell(25,6,'TANGGAL',1,0, 'C');
                $pdf->Cell(50,6,'URAIAN',1,0, 'C');
                $pdf->Cell(35,6,'KODE REKENING',1,0, 'C');
                $pdf->Cell(25,6,'DEBET',1,0, 'C');
                $pdf->Cell(25,6,'KREDIT',1,1, 'C');
                $pdf->SetFont('Arial','',10);
                
            }
            else if($menu == 'neraca') {
                $pdf->Cell(15,6,'NO',1,0, 'C');
                $pdf->Cell(25,6,'TANGGAL',1,0, 'C');
                $pdf->Cell(50,6,'URAIAN',1,0, 'C');
                $pdf->Cell(35,6,'KODE REKENING',1,0, 'C');
                $pdf->Cell(25,6,'DEBET',1,0, 'C');
                $pdf->Cell(25,6,'KREDIT',1,1, 'C');
                $pdf->SetFont('Arial','',10);
                
            }
            else if($menu == 'kas') {
                $pdf->Cell(15,6,'NO',1,0, 'C');
                $pdf->Cell(25,6,'TANGGAL',1,0, 'C');
                $pdf->Cell(50,6,'URAIAN',1,0, 'C');
                $pdf->Cell(35,6,'KODE REKENING',1,0, 'C');
                $pdf->Cell(25,6,'DEBET',1,0, 'C');
                $pdf->Cell(25,6,'KREDIT',1,1, 'C');
                $pdf->SetFont('Arial','',10);
                
            }
            $pdf->Output();
        }
    }
?>