<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->M_auth->cek_login();
		$this->load->model('Kartu/M_pengajar_kartu', 'record');
	}

	public function index()
	{
		$data['name'] 			= 'Kartu Pengajar';
		$data['data'] 			= $this->record->DataTableKartu();
		$data['total'] 		= $this->record->DataTableKartuTotal();
		$data['aktif'] 		= $this->record->DataTableKartuAktif();
		$data['tidakaktif'] 	= $this->record->DataTableKartuTidakAktif();
		$this->load->view('Template/v_header', $data);
		$this->load->view('Master/Kartu/v_kartu_pengajar', $data);
	}

	public function Generate()
	{
		echo $this->record->Generate();
	}

	public function ViewUpload()
	{
		echo $this->record->ViewUpload();
	}

	public function UploadFoto()
	{
		echo $this->record->UploadFoto();
	}

	public function DownloadKartu($a)
	{
		$data['card'] 		= $this->record->DataTablePengajar($a);
		$html = $this->load->view('Master/Kartu/v_download_kartu_pengajar', $data, true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' 		=> 'utf-8',
			'format' 	=> [115, 88]
		]);
		$b = $this->record->DataTablePengajar($a);
		$nama_depan = implode(" ", array_slice(explode(" ", $b['pengajar_nama']), 0, 1));
		$nama = $b['pengajar_id_card'] . " - " . $nama_depan;
		$mpdf->SetProtection(array('copy', 'print'), '', 'MyPassword');
		$mpdf->SetTitle("ID CARD - $nama");
		$mpdf->SetAuthor("SUKARAYA1.0 KARYONO");
		$mpdf->SetSubject('ID CARD');
		// $mpdf->SetWatermarkText("CLOSE");
		// $mpdf->watermark_font = 'DejaVuSansCondensed';
		// $mpdf->showWatermarkText = true;
		// $mpdf->watermarkTextAlpha = 0.1;
		$mpdf->WriteHTML($html);
		// $mpdf->Output();
		$mpdf->Output('' . $nama . '.pdf', 'D');
	}
}