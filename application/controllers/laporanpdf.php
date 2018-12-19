<?php
    class Laporanpdf extends CI_Controller {
        function __construct() {
            parent::__construct();
            if($this->session->userdata('status') != 'login') {
                redirect(Login);
            }
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

        function ExportLaporan() {
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

            $pdf = new FPDF('l', 'mm', 'A5');
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(190,7,'CV JONGGI GANDO SULITAIR',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'LAPORAN LABA RUGI',0,1,'C');
            
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(105,6,'PENDAPATAN',1);
            // $pdf->Cell(80,6,'','T');
            $pdf->Cell(27,6,$total_pendapatan,1,1);
            $pdf->SetFont('Arial','',9);
            if($arrPendapatan == NULL) {
                $pdf->Cell(15,6,'','L');
                $pdf->Cell(27,6,'','T');
                $pdf->Cell(90,6,'','R');
            }
            foreach($arrPendapatan as $row) {
                $rekening = $row->NomorRekening;
                $rekening .= '-';
                $rekening .= $row->nama_kode;
                $pdf->Cell(15,6,'','L');
                $pdf->Cell(27,6,$rekening,'T');
                $pdf->Cell(90,6,'','R');
                // $pdf->Cell(27,6,$row->Total);
            }
            
            //$pdf->Cell(10,9,'',0,0);
            $pdf->Cell(149,6,'','R',1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(105,6,'HARGA POKOK',1);
            // $pdf->Cell(80,6,'','T');
            $pdf->Cell(27,6,$total_harga_pokok,1,1);
            $pdf->SetFont('Arial','',9);
            if($arrHargaPokok == NULL) {
                $pdf->Cell(15,6,'','L');
                $pdf->Cell(27,6,'','T');
                $pdf->Cell(90,6,'','R');
            }
            foreach($arrHargaPokok as $row) {
                $rekening = $row->NomorRekening;
                $rekening .= '-';
                $rekening .= $row->nama_kode;
                $pdf->Cell(15,6,'','L');
                $pdf->Cell(27,6,$rekening,'T');
                $pdf->Cell(90,6,'','R');
                // $pdf->Cell(27,6,$row->Total);
            }
            
            // $pdf->Cell(10,9,'',0,1);
            $pdf->Cell(149,6,'','R',1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(105,6,'LABA KOTOR',1,0,'C');
            // $pdf->Cell(80,6,'');
            $pdf->Cell(27,6,$laba_kotor,1);
            
            // $pdf->Cell(10,9,'',0,1);
            $pdf->Cell(149,6,'','R',1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(105,6,'BIAYA-BIAYA ADMINISTRASI',1);
            // $pdf->Cell(80,6,'','T');
            $pdf->Cell(27,6,$total_biaya_administrasi,1,1);
            $pdf->SetFont('Arial','',9);
            foreach($arrBiayaAdmin as $row) {
                $rekening = $row->NomorRekening;
                $rekening .= '-';
                $rekening .= $row->nama_kode;
                $pdf->Cell(15,6,'','L');
                $pdf->Cell(27,6,$rekening,'T');
                $pdf->Cell(90,6,'','R');
                // $pdf->Cell(27,6,$row->Total);
            }

            // $pdf->Cell(10,9,'',0,1);
            $pdf->Cell(149,6,'','R',1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(105,6,'LABA SEBELUM PAJAK',1,0,'C');
            // $pdf->Cell(80,6,'');
            $pdf->Cell(27,6,0,1);

            // $pdf->Cell(10,9,'',0,1);
            $pdf->Cell(149,6,'','R',1);
            $pdf->SetFont('Arial','B',10);
            // $pdf->Cell(20,6,'',1);
            $pdf->Cell(105,6,'LABA BERSIH',1,0,'C');
            // $pdf->Cell(80,6,'');
            $pdf->Cell(27,6,0,1,1);

            $pdf->Output();
        }
    }
?>