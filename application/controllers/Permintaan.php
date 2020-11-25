<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends MY_Controller {

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
		
		$this->load->model('mPermintaan');
    }
	
	public function index()
	{
		$data['pesan']			= '';
		$this->load->view('vPermintaan',$data);
	}
	
	
	public function simpan()
	{
		$this->form_validation->set_rules('nomorAgenda', 'Nomor', 'trim|required');
		$this->form_validation->set_rules('tanggalAgenda', 'Tanggal', 'required');
		$this->form_validation->set_rules('asalSurat', 'Asal Surat', 'required');
		$this->form_validation->set_rules('nomorSurat', 'Nomor', 'required');
		$this->form_validation->set_rules('tanggalSurat', 'Tanggal', 'required');
		$this->form_validation->set_rules('perihalSurat', 'Perihal Surat', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_message('is_natural', '{field} harus angka');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{	
			$target_dir  				= './uploads/permintaan/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 5120;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);
						
        
			if ( !$this->upload->do_upload('fileSurat'))
			{
				$data['response']		= FALSE;
				$data['pesan'] = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';
			}
			else
			{
				
				$fileupload       					= $this->upload->data();
				
				$dataPermintaan['nomor_agenda']		= $this->input->post('nomorAgenda');
				$dataPermintaan['tanggal_agenda']	= date('Y-m-d',strtotime($this->input->post('tanggalAgenda')));
				$dataPermintaan['asal_surat']		= $this->input->post('asalSurat');
				$dataPermintaan['nomor_surat']		= $this->input->post('nomorSurat');
				$dataPermintaan['tanggal_surat']	= date('Y-m-d',strtotime($this->input->post('tanggalSurat')));
				$dataPermintaan['perihal_surat']	= $this->input->post('perihalSurat');
				$dataPermintaan['file_surat']		= $fileupload['file_name'];	
		
				$db_debug 			= $this->db->db_debug; 
				$this->db->db_debug = FALSE; 	
				if (!$this->mPermintaan->simpan($dataPermintaan)) 
				{
					$error = $this->db->error();			
					if(!empty($error))
					{
						$data['response']		= FALSE;
						$data['pesan']			= '<div class="alert alert-danger">'.$error['message'].'</div>';					
							
					}						
				}
				else
				{
					$data['response']		= TRUE;
					$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan surat permintaan</div>';    
									
				}	
						
				$this->db->db_debug = $db_debug; //restore
							
			}		 
		}	

		$this->load->view('vPermintaan',$data);
	}
	
	public function daftar()
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
		
		$data['permintaan']			= $this->mPermintaan->getSuratPermintaan();
		$this->load->view('vDaftarPermintaan',$data);
	}
	
	
	public function getInline()
	{
		$file      = $this->myencrypt->decode($this->input->get('f'));		
		$flok      = base_url().'uploads/permintaan/'.$file;
						
		header('Pragma:public');
		header('Cache-Control:no-store, no-cache, must-revalidate');
		header('Content-type:application/pdf');
		header('Content-Disposition:inline; filename='.$file);                      
		header('Expires:0'); 
		ob_end_clean();
		readfile($flok); 
	}	
	
	function getPermintaanByid()
	{
		$nomor  		= $this->myencrypt->decode($this->input->get('nomorAgenda'));
		$permintaan		= $this->mPermintaan->getPermintaanByid($nomor)->row();
		echo json_encode($permintaan);
	}	
	
	public function update()
	{
		$this->form_validation->set_rules('nomorAgenda', 'Nomor', 'trim|required');
		$this->form_validation->set_rules('tanggalAgenda', 'Tanggal', 'required');
		$this->form_validation->set_rules('asalSurat', 'Asal Surat', 'required');
		$this->form_validation->set_rules('nomorSurat', 'Nomor', 'required');
		$this->form_validation->set_rules('tanggalSurat', 'Tanggal', 'required');
		$this->form_validation->set_rules('perihalSurat', 'Perihal Surat', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_message('is_natural', '{field} harus angka');
		$this->form_validation->set_error_delimiters('', '');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['response']			= FALSE;
			$data['pesan']				= 'Lengkapi Form';
				
			
			$this->output
				->set_status_header(400)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data));
		}
		else
		{			    		
			$dataPermintaan['nomor_agenda']		= $this->input->post('nomorAgenda');
			$dataPermintaan['tanggal_agenda']	= date('Y-m-d',strtotime($this->input->post('tanggalAgenda')));
			$dataPermintaan['asal_surat']		= $this->input->post('asalSurat');
			$dataPermintaan['nomor_surat']		= $this->input->post('nomorSurat');
			$dataPermintaan['tanggal_surat']	= date('Y-m-d',strtotime($this->input->post('tanggalSurat')));
			$dataPermintaan['perihal_surat']	= $this->input->post('perihalSurat');
				
			// jika file diupload
			if($_FILES['fileSurat']['name'] != NULL)
			{
				$target_dir  				= './uploads/permintaan/';
				// buat folde baru jika tidak ada
				if (!is_dir($target_dir))
				{
					mkdir($target_dir, 0777, TRUE);
				}	
					
				$config['upload_path'] 	    = $target_dir;
				$config['allowed_types']    = 'pdf';
				$config['max_size'] 		= '5120';
				$config['encrypt_name']		= TRUE;	
		
				// load upload lib
				$this->load->library('upload', $config);
				
				// coba upload
				if ( !$this->upload->do_upload('fileSurat'))
				{
					$error = strip_tags($this->upload->display_errors());
					$data['response']			= FALSE;
					$data['pesan']				= $error;
					
					$this->output
							->set_status_header(400)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($data));
				}
				else
				{
					// update dengan file
					$fileupload       				= $this->upload->data();
					$dataPermintaan['file_surat']   = $fileupload['file_name'];
					
					// remove old file
                    @unlink("./agenda/permintaan/".$this->input->post('fileOld'));
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					if (!$this->mPermintaan->update($dataPermintaan)) 
					{
						$error = $this->db->error();			
						if(!empty($error))
						{
							$data['response']		= FALSE;
							$data['pesan']			= $error['message'];					
							
							$this->output
							->set_status_header(400)
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode($data));	
						}						
					}
					else
					{
						$data['response']		= TRUE;
						$data['pesan']			= 'Berhasil update';            
											
						$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($data));				
					}					
					$this->db->db_debug = $db_debug; //restore setting
					

				}	
				
			}
			else
			{	
				// update tanpa file 
				$db_debug 			= $this->db->db_debug; 
				$this->db->db_debug = FALSE; 	
					
				if (!$this->mPermintaan->update($dataPermintaan)) 
				{
					$error = $this->db->error();			
					if(!empty($error))
					{
						$data['response']		= FALSE;
						$data['pesan']			= $error['message'];					
						
						$this->output
						->set_status_header(400)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($data));	
					}						
				}
				else
				{
					$data['response']		= TRUE;
					$data['pesan']			= 'Berhasil update';            
										
					$this->output
					->set_status_header(200)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($data));				
				}	
				
				$this->db->db_debug = $db_debug; //restore setting
			}	
				
		}
	}
	
	public function getPermintaan()
	{
		$permintaan 		= $this->mPermintaan->getSuratPermintaan();
		$no 				= 1;
		
		$html = '';
		$html .='<table id="tbDaftar" class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Agenda</th>
							<th scope="col">Asal</th>
							<th scope="col">Surat</th>
							<th scope="col">Perihal</th>
							<th scope="col">Aksi</th>								
						</tr>
					</thead>';
		
		foreach($permintaan->result() as $value)
		{
			$html .='<tr>
				<th scope="row">'.$no.'</th>
				<td>'.$value->nomor_agenda.'<br/>'.$value->tanggal_agenda.'</td>
				<td>'.$value->asal_surat.'</td>
				<td>'.$value->nomor_surat.'<br/>'.$value->tanggal_surat.'</td>
				<td>'.$value->perihal_surat.'</td>
				<td>									
				<a href="#" style="color:blue;"   data-id="'.$this->myencrypt->encode($value->nomor_agenda).'" data-toggle="modal" data-target="#ePermintaan" data-placement="top"  title="Edit"><i class="fa fa-pencil"></i></a>
				<a href="#" style="color:red;"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-close"></i></a>
				<a style="color:green;"  data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Lihat Surat" data-target="#fileSurat" data-id="?f='.$this->myencrypt->encode($value->file_surat).'"><i class="fa fa-eye"></i></a>
				</td>
			</tr>';	
			$no++;
		}
		
		$html .='</table>';		
        echo $html;		
		
	}

}



