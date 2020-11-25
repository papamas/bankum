<?php 
if (!defined('BASEPATH')) {	exit('No direct script access allowed');}

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class pdf extends TCPDF
{
	public $title_header = 'KARTU PESERTA UJIAN';
	public $subject = 'Cetak Prestasi KErja';
	public $title = 'Cetak';

	public function __construct()
	{
		parent::__construct();
		$this->top_margin = 20;
	}

	public function setTitle_Header($title_header)
	{
		$this->title_header = $title_header;
	}

	public function setSubject($subject)
	{
		$this->title_subject = $subject;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle_Header()
	{
		return $this->title_header;
	}

	public function getSubject()
	{
		return $this->title_subject;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 10, 'Dokumen ini dicetak pada tanggal :' . date('d-m-Y H:i'), 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}

	public function Header()
	{
		$this->SetCreator(PDF_CREATOR);
		$this->SetAuthor('Nur Muhamad Holik');
				
		$garuda = base_url() . 'src/images/garuda.png';
		$this->Image($garuda, 5, 8, 23, '', 'PNG', '', 'T', false, 145, 'C', false, false, 0, false, false, false);
		
		$this->SetFont('helvetica', 'B', 15);
		$this->Text(5, 35,'BADAN KEPEGAWAIAN NEGARA', false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);
		
		$style = array(
			'width' => 0.29999999999999999,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => array(0, 0, 0)
			);
		$this->Line(5, 46, $this->getPageWidth() - 5, 46, $style);
		$style1 = array(
			'width' => 1,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => array(0, 0, 0)
			);
		$this->Line(5, 47, $this->getPageWidth() - 5, 47, $style1);
	}

	public function Header2()
	{
		//$garuda = base_url() . 'assets/img/logo-garuda.png';
		//$this->Image($garuda, 10, 145, 20, '', 'PNG', '', 'T', false, 145, '', false, false, 0, false, false, false);
		$this->SetFont('helvetica', 'B', 12);
		$this->Text(5, 150, $this->title_subject,false, false, true, 0, 4, 'C', false, '', 0, 'T', 'M', false);
		$this->Text(5, 155, $this->title_header, false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);
		$style = array(
			'width' => 0.29999999999999999,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => array(0, 0, 0)
			);
		$this->Line(10, 170, $this->getPageWidth() - 10, 170, $style);
		$style1 = array(
			'width' => 1,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => array(0, 0, 0)
			);
		$this->Line(10, 171, $this->getPageWidth() - 10, 171, $style1);
	}
}



?>