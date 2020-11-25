<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends MY_Controller {

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
		
		$this->load->model('mApproval');
    }
	
	public function index()
	{
		if($_POST)
		{	
			$this->form_validation->set_rules('filter', 'Filter', 'trim|required');
			$this->form_validation->set_rules('find', 'Pencarian', 'required');
				
			$this->form_validation->set_message('required', '{field} tidak boleh kosong');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
						
			if($this->form_validation->run() == FALSE)
			{
				$data['response']		= FALSE;
				$data['pesan']			= '';
			}
			else
			{
				$data['pesan']			= '';
			}		
        }
		else
		{
			$data['pesan']			= '';
		}			
		
		$data['penunjukan']			= $this->mApproval->getApprovalSuratPenunjukan();
		$this->load->view('vApprovalPenunjukan',$data);
	}
	
	
	public function setuju()
	{
		$nomor      = $this->myencrypt->decode($this->input->post('nomor'));
		
		$db_debug 			= $this->db->db_debug; 
		$this->db->db_debug = FALSE; 	
		if (!$this->mApproval->updateTahapanSuratPenunjukan($nomor)) 
		{
			$error = $this->db->error();			
			if(!empty($error))
			{
				$data['response']		= FALSE;
				$data['pesan']			= $error['message'];					
				
				$this->output
				->set_status_header(406)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data));	
			}						
		}
		else
		{
			$data['response']		= TRUE;
			$data['pesan']			= 'Berhasil Approval';    
			$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data)); 				
		}	
				
		$this->db->db_debug = $db_debug; //restore
	}

    public function getPenunjukan()
	{
		$penunjukan 		= $this->mApproval->getApprovalSuratPenunjukan();
		$no 				= 1;		
		$html = '';
		$html .='<table id="tbDaftar" class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nomor</th>
							<th scope="col">Tahap</th>
							<th scope="col">Kepada</th>
							<th scope="col">Untuk</th>
							<th scope="col">Perintah</th>
						</tr>
					</thead>';
		
		foreach($penunjukan->result() as $value)
		{
			$html .='<tr>
						<th scope="row">'.$no.'</th>
						<td>'.$value->nomor.'<br/>'.$value->tanggal_surat.'</td>
						<td>'.$value->nama_tahapan.'</td>
						<td>'.$value->kepada.'</td>
						<td>'.$value->untuk.'</td>
						<td>
						<a style="color:red;"  data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Lihat Surat" data-target="#fileSurat" data-id="?n='.$this->myencrypt->encode($value->nomor).'"><i class="fa fa-eye"></i></a>
						<a style="color:blue;"  data-nomor="'.$this->myencrypt->encode($value->nomor).'" data-tooltip="tooltip" data-placement="top"  data-toggle="modal" data-target="#kirimModal" title="Berikan Approval"><i class="fa fa-check"></i></a>														
						</td>
					</tr>	';
			$no++;	
		}
		
		$html .='</table>';		
        echo $html;		
		
	}	
	
	
	
	public function pendampingan()
	{
		if($_POST)
		{	
			$this->form_validation->set_rules('filter', 'Filter', 'trim|required');
			$this->form_validation->set_rules('find', 'Pencarian', 'required');
				
			$this->form_validation->set_message('required', '{field} tidak boleh kosong');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
						
			if($this->form_validation->run() == FALSE)
			{
				$data['response']		= FALSE;
				$data['pesan']			= '';
			}
			else
			{
				$data['pesan']			= '';
			}		
        }
		else
		{
			$data['pesan']			= '';
		}			
		
		$data['penunjukan']			= $this->mApproval->getApprovalSuratPendampingan();
		$this->load->view('vApprovalPendampingan',$data);
	}
	
	
	public function getPendampingan()
	{
		$penunjukan 		= $this->mApproval->getApprovalSuratPendampingan();
		$no 				= 1;		
		$html = '';
		$html .='<table id="tbDaftar" class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nomor</th>
							<th scope="col">Tahap</th>
							<th scope="col">Kepada</th>
							<th scope="col">Untuk</th>
							<th scope="col">Perintah</th>
						</tr>
					</thead>';
		
		foreach($penunjukan->result() as $value)
		{
			$html .='<tr>
						<th scope="row">'.$no.'</th>
						<td>'.$value->nomor.'<br/>'.$value->tanggal_surat.'</td>
						<td>'.$value->nama_tahapan.'</td>
						<td>'.$value->kepada.'</td>
						<td>'.$value->untuk.'</td>
						<td>
						<a style="color:red;"  data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Pratinjau Surat" data-target="#fileSurat" data-id="?n='.$this->myencrypt->encode($value->nomor).'"><i class="fa fa-eye"></i></a>
						<a style="color:blue;"  data-nomor="'.$this->myencrypt->encode($value->nomor).'" data-tooltip="tooltip" data-placement="top"  data-toggle="modal" data-target="#kirimModal" title="Berikan Approval"><i class="fa fa-check"></i></a>														
						</td>
					</tr>	';
			$no++;	
		}
		
		$html .='</table>';		
        echo $html;		
		
	}	
	
	public function perkara()
	{
		if($_POST)
		{	
			$this->form_validation->set_rules('filter', 'Filter', 'trim|required');
			$this->form_validation->set_rules('find', 'Pencarian', 'required');
				
			$this->form_validation->set_message('required', '{field} tidak boleh kosong');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
						
			if($this->form_validation->run() == FALSE)
			{
				$data['response']		= FALSE;
				$data['pesan']			= '';
			}
			else
			{
				$data['pesan']			= '';
			}		
        }
		else
		{
			$data['pesan']			= '';
		}			
		
		$data['perkara']			= $this->mApproval->getApprovalPerkara();
		$this->load->view('vApprovalPerkara',$data);
	}
	
	public function okPerkara()
	{
		$nomor      = $this->myencrypt->decode($this->input->post('nomor'));
		
		$db_debug 			= $this->db->db_debug; 
		$this->db->db_debug = FALSE; 	
		if (!$this->mApproval->updateApprovalPerkara($nomor)) 
		{
			$error = $this->db->error();			
			if(!empty($error))
			{
				$data['response']		= FALSE;
				$data['pesan']			= $error['message'];					
				
				$this->output
				->set_status_header(406)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data));	
			}						
		}
		else
		{
			$data['response']		= TRUE;
			$data['pesan']			= 'Berhasil Approval';    
			$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data)); 				
		}	
				
		$this->db->db_debug = $db_debug; //restore
	}	
	
	
	public function caseClose()
	{
		$nomor      = $this->myencrypt->decode($this->input->post('nomor'));
		
		$db_debug 			= $this->db->db_debug; 
		$this->db->db_debug = FALSE; 	
		if (!$this->mApproval->updateCaseClose($nomor)) 
		{
			$error = $this->db->error();			
			if(!empty($error))
			{
				$data['response']		= FALSE;
				$data['pesan']			= $error['message'];					
				
				$this->output
				->set_status_header(406)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data));	
			}						
		}
		else
		{
			$data['response']		= TRUE;
			$data['pesan']			= 'Berhasil Case Close';    
			$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data)); 				
		}	
				
		$this->db->db_debug = $db_debug; //restore
	}	
	
	
	public function getPerkara()
	{
		$perkara 			= $this->mApproval->getApprovalPerkara();
		$no 				= 1;		
		$html = '';
		$html .='<table id="tbDaftar" class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nomor Perkara</th>
							<th scope="col">Status</th>
							<th scope="col">Approval</th>
							<th scope="col">Tahapan</th>
							<th scope="col">Penggugat</th>
							<th scope="col">Materi Gugatan</th>
							<th scope="col">Perintah</th>
						</tr>
					</thead>';
		
		foreach($perkara->result() as $value)
		{
			$html .='<tr>
				<th scope="row">'.$no.'</th>
				<td>'.$value->nomor_perkara.'</td>
				<td>'.$value->status.'</td>
				<td align="center">'.($value->approval == 1 ? '<i style="color:green" class="fa fa-check"></i>' : '<i style="color:red" class="fa fa-remove"></i>' ).'</td>				
				<td>'.$value->nama_tahapan.'</td>
				<td>'.$value->penggugat.'</td>
				<td>'.$value->materi_gugatan.'</td>
				<td>
				<a href="#" style="color:blue;" data-nomor="'.$this->myencrypt->encode($value->nomor_perkara).'"  data-toggle="modal" data-target="#caseModal" title="Case Close"><i class="fa fa-gavel"></i></a>&nbsp;
				<a style="color:red;"  data-nomor="'.$this->myencrypt->encode($value->nomor_perkara).'"  data-toggle="modal" data-target="#kirimModal" title="Berikan Approval"><i class="fa fa-check"></i></a>				
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a style="color:black;"  class="dropdown-toggle" href="#" title="Tahapan Perkara" role="button" data-toggle="dropdown">
							<i class="fa fa-balance-scale"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
							<a class="dropdown-item" href="'.site_url().'/perkara/tingkatPertama?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-user1"></i> Tingkat Pertama</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/suratPanggilan?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-settings2"></i> Surat Panggilan</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/pemeriksaanPersiapan?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-help"></i> Pemeriksaan Persiapan</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/gugatan?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-logout"></i>Gugatan</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/jawaban?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-user1"></i> Jawaban</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/replik?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-settings2"></i> Replik</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/duplik?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-help"></i> Duplik</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/pembuktian?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-logout"></i> Pembuktian</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/kesimpulan?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-settings2"></i> Kesimpulan</a>
							<a class="dropdown-item" href="'.site_url().'/perkara/putusan?n='.$this->myencrypt->encode($value->nomor_perkara).'"><i class="dw dw-help"></i> Putusan</a>
						</div>
					</div>
				</div>
																		
				</td>
			</tr>';
			$no++;	
		}
		
		$html .='</table>';		
        echo $html;		
		
	}	
	
	
	
	
}
