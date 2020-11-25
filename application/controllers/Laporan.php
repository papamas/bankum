<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
    {
        parent::__construct();	
		$this->load->library(array('Auth','form_validation','Myencrypt'));
		$this->load->model('mLaporan');
    }
	
	public function index()
	{
		if($_POST)
		{	
			$this->form_validation->set_rules('startDate', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('endDate', 'Tanggal Akhir', 'required');
				
			$this->form_validation->set_message('required', '{field} tidak boleh kosong');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
						
			if($this->form_validation->run() == FALSE)
			{
				$data['response']		= FALSE;
				$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
				$this->load->view('vLaporanPenunjukan',$data);
			}
			else
			{
				$data['response']		= TRUE;
				$data['pesan']			= '<div class="alert alert-success">Laporan Berhasil dicetak</div>'; 
					
				$dataPenunjukan['startDate']			= $this->input->post('startDate');
				$dataPenunjukan['endDate']			    = $this->input->post('endDate');
				
				$q    = $this->mLaporan->getLaporanPenunjukan($dataPenunjukan);
		
				// creating xls file
				$now              = date('dmYHis');
				$filename         = "LAPORAN PENUNJUKAN ".$now.".xls";
				
				header('Pragma:public');
				header('Cache-Control:no-store, no-cache, must-revalidate');
				header('Content-type:application/vnd.ms-excel');
				header('Content-Disposition:attachment; filename='.$filename);                      
				header('Expires:0'); 
				
				$html  = 'LAPORAN PENUNJUKAN SAKSI/AHLI '.$this->input->post('startDate').' s/d '. $this->input->post('endDate');
				
				$html .= '<style> .str{mso-number-format:\@;}.dt{width:450;}</style>';
				$html .= '<table border="1">';					
				$html .='<tr>
							<th>NO</th>
							<th>NOMOR</th>
							<th>DASAR</th>
							<th>DASAR</th>
							<th>KEPADA</th>
							<th>UNTUK</th>
							<th>DIKELUARKAN</th>
							<th>TERTANDA</th>
							<th>TANGGAL SURAT</th>
							'; 
				$html 	.= '</tr>';
				if($q->num_rows() > 0){
					$i = 1;		        
					foreach ($q->result() as $r) {
						
						$html .= "<tr><td>$i</td>";				
						$html .= "<td>{$r->nomor}</td>";
						$html .= "<td>{$r->dasar_satu}</td>";
						$html .= "<td>{$r->dasar_dua}</td>";				
						$html .= "<td>{$r->kepada}</td>";	
						$html .= "<td>{$r->untuk}</td>";
						$html .= "<td>{$r->di_keluarkan}</td>";
						$html .= "<td>{$r->tertanda}</td>";	
						$html .= "<td>{$r->tanggal_surat}</td>";	
						$html .= "</tr>";
						$i++;
					}
					$html .="</table>";
					echo $html;
				}else{
					$html .="<tr><td  colspan=6 >There is no data found</td></tr></table>";
					echo $html;
				} 	  
		
			}		
        }
		else
		{
			$data['pesan']			= '';
			$this->load->view('vLaporanPenunjukan',$data);
		}
	}
	
	public function pendampingan()
	{
		if($_POST)
		{	
			$this->form_validation->set_rules('startDate', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('endDate', 'Tanggal Akhir', 'required');
				
			$this->form_validation->set_message('required', '{field} tidak boleh kosong');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
						
			if($this->form_validation->run() == FALSE)
			{
				$data['response']		= FALSE;
				$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
				$this->load->view('vLaporanPendampingan',$data);
			}
			else
			{
				$data['response']		= TRUE;
				$data['pesan']			= '<div class="alert alert-success">Laporan Berhasil dicetak</div>'; 
					
				$dataPenunjukan['startDate']			= $this->input->post('startDate');
				$dataPenunjukan['endDate']			    = $this->input->post('endDate');
				
				$q    = $this->mLaporan->getLaporanPendampingan($dataPenunjukan);
		
				// creating xls file
				$now              = date('dmYHis');
				$filename         = "LAPORAN PENDAMPINGAN ".$now.".xls";
				
				header('Pragma:public');
				header('Cache-Control:no-store, no-cache, must-revalidate');
				header('Content-type:application/vnd.ms-excel');
				header('Content-Disposition:attachment; filename='.$filename);                      
				header('Expires:0'); 
				
				$html  = 'LAPORAN PENDAMPINGAN SAKSI/AHLI '.$this->input->post('startDate').' s/d '. $this->input->post('endDate');
				
				$html .= '<style> .str{mso-number-format:\@;}.dt{width:450;}</style>';
				$html .= '<table border="1">';					
				$html .='<tr>
							<th>NO</th>
							<th>NOMOR</th>
							<th>DASAR</th>
							<th>DASAR</th>
							<th>KEPADA</th>
							<th>UNTUK</th>
							<th>DIKELUARKAN</th>
							<th>TERTANDA</th>
							<th>TANGGAL SURAT</th>
							'; 
				$html 	.= '</tr>';
				if($q->num_rows() > 0){
					$i = 1;		        
					foreach ($q->result() as $r) {
						
						$html .= "<tr><td>$i</td>";				
						$html .= "<td>{$r->nomor}</td>";
						$html .= "<td>{$r->dasar_satu}</td>";
						$html .= "<td>{$r->dasar_dua}</td>";				
						$html .= "<td>{$r->kepada}</td>";	
						$html .= "<td>{$r->untuk}</td>";
						$html .= "<td>{$r->di_keluarkan}</td>";
						$html .= "<td>{$r->tertanda}</td>";	
						$html .= "<td>{$r->tanggal_surat}</td>";	
						$html .= "</tr>";
						$i++;
					}
					$html .="</table>";
					echo $html;
				}else{
					$html .="<tr><td  colspan=6 >There is no data found</td></tr></table>";
					echo $html;
				} 	  
		
			}		
        }
		else
		{
			$data['pesan']			= '';
			$this->load->view('vLaporanPendampingan',$data);
		}			
		
		
		
	}
	
	public function perkara()
	{
		$data['tingkatPengadilan']  		= $this->mLaporan->getTingkatPengadilan();
		$data['jenisPengadilan']  			= $this->mLaporan->getJenisPengadilan();
		$data['provinsi']	  	  			= $this->mLaporan->getProvinsi();
		$data['kabKota']	  	  			= $this->mLaporan->getKabKota();
		
		if($_POST)
		{	
			$this->form_validation->set_rules('startDate', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('endDate', 'Tanggal Akhir', 'required');
				
			$this->form_validation->set_message('required', '{field} tidak boleh kosong');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
						
			if($this->form_validation->run() == FALSE)
			{
				$data['response']		= FALSE;
				$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
				$this->load->view('vLaporanPerkara',$data);
			}
			else
			{
				$data['response']		= TRUE;
				$data['pesan']			= '<div class="alert alert-success">Laporan Berhasil dicetak</div>'; 
					
				$dataPenunjukan['startDate']			= $this->input->post('startDate');
				$dataPenunjukan['endDate']			    = $this->input->post('endDate');
				
				$q    = $this->mLaporan->getLaporanPerkara($dataPenunjukan);
		
				// creating xls file
				$now              = date('dmYHis');
				$filename         = "LAPORAN PERKARA ".$now.".xls";
				
				header('Pragma:public');
				header('Cache-Control:no-store, no-cache, must-revalidate');
				header('Content-type:application/vnd.ms-excel');
				header('Content-Disposition:attachment; filename='.$filename);                      
				header('Expires:0'); 
				
				$html  = 'LAPORAN DATA PERKARA '.$this->input->post('startDate').' s/d '. $this->input->post('endDate');
				
				$html .= '<style> .str{mso-number-format:\@;}.dt{width:450;}</style>';
				$html .= '<table border="1">';					
				$html .='<tr>
							<th>NO</th>
							<th>NOMOR</th>
							<th>TINGKAT PENGADILAN</th>
							<th>TAHAPAN SIDANG</th>
							<th>PROVISNI</th>
							<th>KAB/KOTA</th>
							<th>INSTANSI</th>
							<th>PENGGUGAT</th>
							<th>MATERI GUGATAN</th>
							'; 
				$html 	.= '</tr>';
				if($q->num_rows() > 0){
					$i = 1;		        
					foreach ($q->result() as $r) {
						
						$html .= "<tr><td>$i</td>";				
						$html .= "<td>{$r->nomor_perkara}</td>";
						$html .= "<td>{$r->nama_tingkat}</td>";
						$html .= "<td>{$r->nama_jenis}</td>";				
						$html .= "<td>{$r->nama_provinsi}</td>";	
						$html .= "<td>{$r->nama_kab_kota}</td>";
						$html .= "<td>{$r->nama_instansi}</td>";
						$html .= "<td>{$r->penggugat}</td>";	
						$html .= "<td>{$r->materi_gugatan}</td>";	
						$html .= "</tr>";
						$i++;
					}
					$html .="</table>";
					echo $html;
				}else{
					$html .="<tr><td  colspan=6 >There is no data found</td></tr></table>";
					echo $html;
				} 	  
		
			}		
        }
		else
		{
			$data['pesan']			= '';
			$this->load->view('vLaporanPerkara',$data);
		}			
		
		
		
	}
}
