<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perkara extends MY_Controller {

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
	 
	function __construct(){
		parent::__construct();
		$this->load->model("mPerkara");
		$this->load->library(array('Auth','form_validation','Myencrypt'));
		
	}
	
	public function index()
	{
		$data['tingkatPengadilan']  		= $this->mPerkara->getTingkatPengadilan();
		$data['jenisPengadilan']  			= $this->mPerkara->getJenisPengadilan();
		$data['provinsi']	  	  			= $this->mPerkara->getProvinsi();
		$data['kabKota']	  	  			= $this->mPerkara->getKabKota();
		$data['instansi']					= $this->mPerkara->getInstansi();
		$data['pesan']						= '';
		$this->load->view('vPerkara',$data);
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
		
		$data['perkara']					= $this->mPerkara->getPerkara();
		$data['tingkatPengadilan']  		= $this->mPerkara->getTingkatPengadilan();
		$data['jenisPengadilan']  			= $this->mPerkara->getJenisPengadilan();
		$data['provinsi']	  	  			= $this->mPerkara->getProvinsi();
		$data['kabKota']	  	  			= $this->mPerkara->getKabKota();
		$data['instansi']					= $this->mPerkara->getInstansi();
		$this->load->view('vDaftarPerkara',$data);
	}
	
	public function simpan()
	{
		$this->form_validation->set_rules('nomorPerkara', 'Nomor Perkara', 'trim|required');
		$this->form_validation->set_rules('tingkatPengadilan', 'Tingkat Pengadilan', 'required');
		$this->form_validation->set_rules('jenisPengadilan', 'Jenis Pengadilan', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kabKota', 'Kab Kota', 'required');
		$this->form_validation->set_rules('instansi', 'Instansi', 'required');
		$this->form_validation->set_rules('penggugat', 'Penggugat', 'required');
		$this->form_validation->set_rules('materiGugatan', 'Materi Gugatan', 'required');
		
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
				$dataPerkara['nomor_perkara']				= $this->input->post('nomorPerkara');
				$dataPerkara['tingkat_pengadilan']			= $this->input->post('tingkatPengadilan');
				$dataPerkara['jenis_pengadilan']			= $this->input->post('jenisPengadilan');
				$dataPerkara['provinsi']					= $this->input->post('provinsi');
				$dataPerkara['kab_kota']					= $this->input->post('kabKota');
				$dataPerkara['instansi']					= $this->input->post('instansi');
				$dataPerkara['penggugat']					= $this->input->post('penggugat');	
				$dataPerkara['materi_gugatan']				= $this->input->post('materiGugatan');
		
				$db_debug 			= $this->db->db_debug; 
				$this->db->db_debug = FALSE; 	
				if (!$this->mPerkara->simpan($dataPerkara)) 
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
					$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan data perkara</div>';    
									
				}	
						
				$this->db->db_debug = $db_debug; //restore
	
		}
		
		$data['tingkatPengadilan']  		= $this->mPerkara->getTingkatPengadilan();
		$data['jenisPengadilan']  			= $this->mPerkara->getJenisPengadilan();
		$data['provinsi']	  	  			= $this->mPerkara->getProvinsi();
		$data['kabKota']	  	  			= $this->mPerkara->getKabKota();
		$data['instansi']					= $this->mPerkara->getInstansi();
		$this->load->view('vPerkara',$data);
	}
	
	function getPerkaraByid()
	{
		$nomor  		= $this->myencrypt->decode($this->input->get('nomorPerkara'));
		$perkara		= $this->mPerkara->getPerkaraByidLite($nomor)->row();
		echo json_encode($perkara);
	}	
	
	public function update()
	{
		$this->form_validation->set_rules('nomorPerkara', 'Nomor Perkara', 'trim|required');
		$this->form_validation->set_rules('tingkatPengadilan', 'Tingkat Pengadilan', 'required');
		$this->form_validation->set_rules('jenisPengadilan', 'Jenis Pengadilan', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kabKota', 'Kab Kota', 'required');
		$this->form_validation->set_rules('instansi', 'Instansi', 'required');
		$this->form_validation->set_rules('penggugat', 'Penggugat', 'required');
		$this->form_validation->set_rules('materiGugatan', 'Materi Gugatan', 'required');
		
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
			$dataPerkara['nomor_perkara']				= $this->input->post('nomorPerkara');
			$dataPerkara['tingkat_pengadilan']			= $this->input->post('tingkatPengadilan');
			$dataPerkara['jenis_pengadilan']			= $this->input->post('jenisPengadilan');
			$dataPerkara['provinsi']					= $this->input->post('provinsi');
			$dataPerkara['kab_kota']					= $this->input->post('kabKota');
			$dataPerkara['instansi']					= $this->input->post('instansi');
			$dataPerkara['penggugat']					= $this->input->post('penggugat');	
			$dataPerkara['materi_gugatan']				= $this->input->post('materiGugatan');
				
			
			// update
			$db_debug 			= $this->db->db_debug; 
			$this->db->db_debug = FALSE; 	
				
			if (!$this->mPerkara->update($dataPerkara)) 
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
	
	public function getPerkara()
	{
		$perkara			= $this->mPerkara->getPerkara();
		$no 				= 1;
		
		$html = '';
		$html .='<table id="tbDaftar" class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nomor Perkara</th>
							<th scope="col">Status</th>
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
				<td>'.$value->nama_tahapan.'</td>
				<td>'.$value->penggugat.'</td>
				<td>'.$value->materi_gugatan.'</td>
				<td>
				<a href="#" style="color:blue;"   data-id="'.$this->myencrypt->encode($value->nomor_perkara).'" data-toggle="modal" data-target="#ePerkara" data-placement="top"  title="Edit"><i class="fa fa-pencil"></i></a>
				<a href="#" style="color:red;"  title="Delete"><i class="fa fa-close"></i></a>
				<a href="#" style="color:blue;" data-nomor="'.$this->myencrypt->encode($value->nomor_perkara).'"  data-toggle="modal" data-target="#caseModal" title="Case Close"><i class="fa fa-gavel"></i></a>
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
	
	
	public function caseClose()
	{
		$nomor      = $this->myencrypt->decode($this->input->post('nomor'));
		
		$db_debug 			= $this->db->db_debug; 
		$this->db->db_debug = FALSE; 	
		if (!$this->mPerkara->updateCaseClose($nomor)) 
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
	

	public function tingkatPertama()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,NULL)->row();	
		$this->load->view('vtingkatPertama',$data);	
	}		
	
	public function suratPanggilan()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,2);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
				
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,2)->row();
		$data['pesan']			=   '';
		$this->load->view('vsuratPanggilan',$data);	
	}
	
	public function suratPanggilanSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalSidang', 'tanggalSidang', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('isiRingkas', 'isiRingkas', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        
				if ( !$this->upload->do_upload('dokumenIntervensi'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';
				}
				else
				{
					$filedokumenIntervensi       				= $this->upload->data();
					$suratPanggilan['dokumen_intervensi']		= $filedokumenIntervensi['file_name'];	
					
					if(!$this->upload->do_upload('fileScan'))
					{
						$data['response']		= FALSE;
						$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
					}
					else
					{
						$filescan       					= $this->upload->data();
						$suratPanggilan['file_scan']		= $filescan['file_name'];	
						
						
						$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
						$suratPanggilan['nomor_perkara']	= $nomorPerkara;
						$suratPanggilan['tahapan_perkara']	= 2;
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE;
						
						$this->mPerkara->updatePerkara($nomorPerkara,2);
						
						if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
						}			
						$this->db->db_debug = $db_debug; 
						
					}
							
				}
			}
			else
			{
				// jika update		
				// ada file dokumenIntervensi
				
				if($_FILES['dokumenIntervensi']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('dokumenIntervensi'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$filedokumenIntervensi	        		= $this->upload->data();
						$suratPanggilan['dokumen_intervensi']   = $filedokumenIntervensi['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 2;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('dokumenIntervensiOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
						
						
						$this->mPerkara->updatePerkara($nomorPerkara,2);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,2)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}
						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 2;
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,2);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,2)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}	

				//  ada file scan
					
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan				        		= $this->upload->data();
						$suratPanggilan['file_scan']  			 = $fileScan['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 2;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						$this->mPerkara->updatePerkara($nomorPerkara,2);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,2)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}
						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 2;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,2);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,2)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}			

			}		
			
		}		
		
		$data['perkara']		    = 	$this->mPerkara->getPerkaraById($nomorPerkara,2)->row();		
		$this->load->view('vsuratPanggilan',$data);	
        			
	}	

	public function getInline()
	{
		$file      = $this->myencrypt->decode($this->input->get('f'));	

		$flok      = base_url().'uploads/perkara/'.$file;
						
		header('Pragma:public');
		header('Cache-Control:no-store, no-cache, must-revalidate');
		header('Content-type:application/pdf');
		header('Content-Disposition:inline; filename='.$file);                      
		header('Expires:0'); 
		ob_end_clean();
		readfile($flok); 
	}	
	
	
	public function pemeriksaanPersiapan()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,3);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,3)->row();	
		$this->load->view('vpemeriksaanPersiapan',$data);	
	}	
	
	
	public function pemeriksaanPersiapanSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalSidang', 'tanggalSidang', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('isiRingkas', 'isiRingkas', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        
				if ( !$this->upload->do_upload('suratKuasa'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';
				}
				else
				{
					$filesuratKuasa       				= $this->upload->data();
					$suratPanggilan['surat_kuasa']		= $filesuratKuasa['file_name'];	
					
					if(!$this->upload->do_upload('suratPerintah'))
					{
						$data['response']		= FALSE;
						$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
					}
					else
					{
						$filesuratPerintah       			= $this->upload->data();
						$suratPanggilan['surat_perintah']	= $filesuratPerintah['file_name'];	
					
						if(!$this->upload->do_upload('suratIjinInsidentil'))
						{
							$data['response']		= FALSE;
							$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
						}
						else
						{
							$filesuratIjinInsidentil       				= $this->upload->data();
							$suratPanggilan['surat_ijin_insidentil']	= $filesuratIjinInsidentil['file_name'];
						
							if(!$this->upload->do_upload('fileScan'))
							{
								$data['response']		= FALSE;
								$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
							}
							else
							{
								$filescan       					= $this->upload->data();
								$suratPanggilan['file_scan']		= $filescan['file_name'];	
								
								
								$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
								$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
								$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
								$suratPanggilan['nomor_perkara']	= $nomorPerkara;
								$suratPanggilan['tahapan_perkara']	= 3;
								
								$db_debug 			= $this->db->db_debug; 
								$this->db->db_debug = FALSE;
								
								$this->mPerkara->updatePerkara($nomorPerkara,3);
								
								if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
									$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
								}			
								$this->db->db_debug = $db_debug;							
							}	
						}	
					}										
				}
			}
			else
			{
				// jika update										
				if($_FILES['suratKuasa']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('suratKuasa'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$filesuratKuasa	        		        = $this->upload->data();
						$suratPanggilan['surat_kuasa']          = $filesuratKuasa['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 3;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('suratKuasaOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,3)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}
						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 3;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,3)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}	

				//  ada file suratPerintah					
				if($_FILES['suratPerintah']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('suratPerintah'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$filesuratPerintah				        = $this->upload->data();
						$suratPanggilan['surat_perintah']  		= $filesuratPerintah['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 3;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('suratPerintahOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,3)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}
						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 3;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,3)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}	

				// surat ijin insidentil
				if($_FILES['suratIjinInsidentil']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('suratIjinInsidentil'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$filesuratIjinInsidentil				= $this->upload->data();
						$suratPanggilan['surat_ijin_insidentil']= $filesuratIjinInsidentil['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 3;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('suratIjinInsidentilOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,3)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}
						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 3;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,3)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}					
					$this->db->db_debug = $db_debug; //restore setting
				}	
				
				// file scan
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan								= $this->upload->data();
						$suratPanggilan['file_scan']			= $fileScan['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 3;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,3)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}
						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 3;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,3)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}	

			}		
			
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,3)->row();			
		$this->load->view('vpemeriksaanPersiapan',$data);
        			
	}	

	
	
	public function gugatan()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,4);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,4)->row();	
		$this->load->view('vGugatan',$data);	
	}	
	
	public function gugatanSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalSidang', 'tanggalSidang', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('isiRingkas', 'isiRingkas', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        		if(!$this->upload->do_upload('fileScan'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
				}
				else
				{
					$filescan       					= $this->upload->data();
					$suratPanggilan['file_scan']		= $filescan['file_name'];					
					
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['nomor_perkara']	= $nomorPerkara;
					$suratPanggilan['tahapan_perkara']	= 4;
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE;
					
					$this->mPerkara->updatePerkara($nomorPerkara,4);					
					if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
					}			
					$this->db->db_debug = $db_debug;					
				}							
				
			}
			else
			{
				// jika update	
				// ada file scan					
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan				        		= $this->upload->data();
						$suratPanggilan['file_scan']  			 = $fileScan['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 4;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						$this->mPerkara->updatePerkara($nomorPerkara,4);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,4)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 4;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,4);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,4)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}			

			}		
			
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,4)->row();	
		$this->load->view('vGugatan',$data);
        			
	}	
	
	public function jawaban()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,5);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,5)->row();	
		$this->load->view('vJawaban',$data);	
	}	
	
	
	public function jawabanSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalSidang', 'tanggalSidang', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('isiRingkas', 'isiRingkas', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        		if(!$this->upload->do_upload('fileScan'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
				}
				else
				{
					$filescan       					= $this->upload->data();
					$suratPanggilan['file_scan']		= $filescan['file_name'];					
					
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['nomor_perkara']	= $nomorPerkara;
					$suratPanggilan['tahapan_perkara']	= 5;
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE;
					
					$this->mPerkara->updatePerkara($nomorPerkara,5);					
					if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
					}			
					$this->db->db_debug = $db_debug;					
				}							
				
			}
			else
			{
				// jika update	
				// ada file scan					
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan				        		= $this->upload->data();
						$suratPanggilan['file_scan']  			 = $fileScan['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 5;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						$this->mPerkara->updatePerkara($nomorPerkara,5);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,5)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 5;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,5);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,5)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}			

			}		
			
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,5)->row();	
		$this->load->view('vJawaban',$data);	
        			
	}	
	
	public function replik()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,6);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,6)->row();	
		$this->load->view('vReplik',$data);	
	}
	
	
	public function replikSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalSidang', 'tanggalSidang', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('isiRingkas', 'isiRingkas', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        		if(!$this->upload->do_upload('fileScan'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
				}
				else
				{
					$filescan       					= $this->upload->data();
					$suratPanggilan['file_scan']		= $filescan['file_name'];					
					
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['nomor_perkara']	= $nomorPerkara;
					$suratPanggilan['tahapan_perkara']	= 6;
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE;
					
					$this->mPerkara->updatePerkara($nomorPerkara,6);					
					if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
					}			
					$this->db->db_debug = $db_debug;					
				}							
				
			}
			else
			{
				// jika update	
				// ada file scan					
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan				        		= $this->upload->data();
						$suratPanggilan['file_scan']  			 = $fileScan['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 6;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						$this->mPerkara->updatePerkara($nomorPerkara,6);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,6)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 6;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,6);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,6)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}			

			}		
			
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,6)->row();	
		$this->load->view('vReplik',$data);	
        			
	}	

	public function duplik()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,7);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,7)->row();	
		$this->load->view('vDuplik',$data);	
	}
	
	public function duplikSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalSidang', 'tanggalSidang', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('isiRingkas', 'isiRingkas', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        		if(!$this->upload->do_upload('fileScan'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
				}
				else
				{
					$filescan       					= $this->upload->data();
					$suratPanggilan['file_scan']		= $filescan['file_name'];					
					
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['nomor_perkara']	= $nomorPerkara;
					$suratPanggilan['tahapan_perkara']	= 7;
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE;
					
					$this->mPerkara->updatePerkara($nomorPerkara,7);					
					if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
					}			
					$this->db->db_debug = $db_debug;					
				}							
				
			}
			else
			{
				// jika update	
				// ada file scan					
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan				        		= $this->upload->data();
						$suratPanggilan['file_scan']  			 = $fileScan['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 7;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						$this->mPerkara->updatePerkara($nomorPerkara,7);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,7)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 7;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,7);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,7)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}			

			}		
			
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,7)->row();	
		$this->load->view('vDuplik',$data);	
        			
	}

	public function pembuktian()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,8);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,8)->row();	
		$this->load->view('vPembuktian',$data);	
	}
	
	public function pembuktianSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalSidang', 'tanggalSidang', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('isiRingkas', 'isiRingkas', 'required');
		$this->form_validation->set_rules('saksi', 'saksi', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        		if(!$this->upload->do_upload('fileScan'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
				}
				else
				{
					$filescan       					= $this->upload->data();
					$suratPanggilan['file_scan']		= $filescan['file_name'];					
					
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['saksi_saksi']		= $this->input->post('saksi');
					$suratPanggilan['nomor_perkara']	= $nomorPerkara;
					$suratPanggilan['tahapan_perkara']	= 8;
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE;
					
					$this->mPerkara->updatePerkara($nomorPerkara,8);					
					if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
					}			
					$this->db->db_debug = $db_debug;					
				}							
				
			}
			else
			{
				// jika update	
				// ada file scan					
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan				        		= $this->upload->data();
						$suratPanggilan['file_scan']  			 = $fileScan['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['saksi_saksi']		= $this->input->post('saksi');
						$suratPanggilan['tahapan_perkara']		= 8;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						$this->mPerkara->updatePerkara($nomorPerkara,8);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,8)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['saksi_saksi']		= $this->input->post('saksi');
					$suratPanggilan['tahapan_perkara']	= 8;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,8);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,8)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}			

			}		
			
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,8)->row();	
		$this->load->view('vPembuktian',$data);	
        			
	}

	public function kesimpulan()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,9);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,9)->row();	
		$this->load->view('vKesimpulan',$data);	
	}
	
	public function kesimpulanSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalSidang', 'tanggalSidang', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('isiRingkas', 'isiRingkas', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        		if(!$this->upload->do_upload('fileScan'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
				}
				else
				{
					$filescan       					= $this->upload->data();
					$suratPanggilan['file_scan']		= $filescan['file_name'];					
					
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['nomor_perkara']	= $nomorPerkara;
					$suratPanggilan['tahapan_perkara']	= 9;
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE;
					
					$this->mPerkara->updatePerkara($nomorPerkara,9);					
					if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
					}			
					$this->db->db_debug = $db_debug;					
				}							
				
			}
			else
			{
				// jika update	
				// ada file scan					
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan				        		= $this->upload->data();
						$suratPanggilan['file_scan']  			 = $fileScan['file_name'];
						$suratPanggilan['tanggal_sidang']	    = date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
						$suratPanggilan['acara_sidang']	        = $this->input->post('acaraSidang');
						$suratPanggilan['isi_ringkas']		    = $this->input->post('isiRingkas');
						$suratPanggilan['tahapan_perkara']		= 9;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						$this->mPerkara->updatePerkara($nomorPerkara,9);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,9)) 
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
							$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
											
						}						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_sidang']	= date('Y-m-d',strtotime($this->input->post('tanggalSidang')));
					$suratPanggilan['acara_sidang']	    = $this->input->post('acaraSidang');
					$suratPanggilan['isi_ringkas']		= $this->input->post('isiRingkas');
					$suratPanggilan['tahapan_perkara']	= 9;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,9);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,9)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}			

			}		
			
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,9)->row();	
		$this->load->view('vKesimpulan',$data);	
        			
	}

	public function putusan()
	{
		$nomorPerkara      		= $this->myencrypt->decode($this->input->get('n'));		
		$data['pesan']			= '';
		
		$perkara				= $this->mPerkara->getPerkaraById($nomorPerkara,10);	
		
		if($perkara->num_rows() == 0)
		{
			redirect('perkara/daftar');	
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,10)->row();	
		$this->load->view('vPutusan',$data);	
	}	
	
	public function putusanSimpan()
	{
		$nomorPerkara			= $this->input->post('nomorPerkara');
		$tahapanPerkara			= $this->input->post('tahapanPerkara');
		
		$this->form_validation->set_rules('tanggalPutusan', 'tanggalPutusan', 'required');
		$this->form_validation->set_rules('tanggalPemberitahuan', 'tanggalPemberitahuan', 'required');
		$this->form_validation->set_rules('tanggalDiterima', 'tanggalDiterima', 'required');
		$this->form_validation->set_rules('acaraSidang', 'acaraSidang', 'required');
		$this->form_validation->set_rules('amarPutusan', 'amarPutusan', 'required');
		$this->form_validation->set_rules('inkracht', 'inkracht', 'required');
		
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
					
		if($this->form_validation->run() == FALSE)
		{
			$data['response']		= FALSE;
			$data['pesan']			= '<div class="alert alert-danger"> Lengkapi Form </div>';
		}
		else
		{
			$target_dir  				= './uploads/perkara/';
			// buat folde baru jika tidak ada
			if (!is_dir($target_dir))
			{
				mkdir($target_dir, 0777, TRUE);
			}

			// load upload lib
			$config['upload_path']          = $target_dir;
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 4096;
			$config['encrypt_name']			= TRUE;	
			$config['overwrite']			= TRUE;	
			
			// load upload lib
			$this->load->library('upload', $config);

			// jika new
			if($this->input->post('aksi') === 'new')
			{		
        		if(!$this->upload->do_upload('fileScan'))
				{
					$data['response']		= FALSE;
					$data['pesan']          = '<div class="alert alert-danger">'.strip_tags($this->upload->display_errors()).'</div>';		
				}
				else
				{
					$filescan       							= $this->upload->data();
					$suratPanggilan['file_scan']				= $filescan['file_name'];
					
					$suratPanggilan['tanggal_putusan']			= date('Y-m-d',strtotime($this->input->post('tanggalPutusan')));
					$suratPanggilan['tanggal_pemberitahuan']	= date('Y-m-d',strtotime($this->input->post('tanggalPemberitahuan')));	
					$suratPanggilan['tanggal_diterima']			= date('Y-m-d',strtotime($this->input->post('tanggalDiterima')));
					$suratPanggilan['acara_sidang']	    		= $this->input->post('acaraSidang');
					$suratPanggilan['amar_putusan']				= $this->input->post('amarPutusan');
					$suratPanggilan['inkracht']					= $this->input->post('inkracht');
					$suratPanggilan['nomor_perkara']			= $nomorPerkara;
					$suratPanggilan['tahapan_perkara']			= 10;
					
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE;
					
					$this->mPerkara->updatePerkara($nomorPerkara,10);					
					if (!$this->mPerkara->simpanSuratPanggilan($suratPanggilan)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan</div>'; 			
					}			
					$this->db->db_debug = $db_debug;					
				}							
				
			}
			else
			{
				// jika update	
				// ada file scan					
				if($_FILES['fileScan']['name'] != NULL)
				{
					$target_dir  				= './uploads/perkara/';
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
					if ( !$this->upload->do_upload('fileScan'))
					{
						$error = strip_tags($this->upload->display_errors());
						$data['response']			= FALSE;
						$data['pesan']				= $error;						
					}
					else
					{
						// update dengan file
						$fileScan				        		 = $this->upload->data();
						$suratPanggilan['file_scan']  			 = $fileScan['file_name'];
						
						$suratPanggilan['tanggal_putusan']		 = date('Y-m-d',strtotime($this->input->post('tanggalPutusan')));
						$suratPanggilan['tanggal_pemberitahuan'] = date('Y-m-d',strtotime($this->input->post('tanggalPemberitahuan')));	
						$suratPanggilan['tanggal_diterima']		 = date('Y-m-d',strtotime($this->input->post('tanggalDiterima')));
						$suratPanggilan['acara_sidang']	    	 = $this->input->post('acaraSidang');
						$suratPanggilan['amar_putusan']			 = $this->input->post('amarPutusan');
						$suratPanggilan['inkracht']				 = $this->input->post('inkracht');
						$suratPanggilan['tahapan_perkara']		 = 10;
						
						// remove old file
						@unlink("./uploads/perkara/".$this->input->post('fileScanOld'));
						
						$db_debug 			= $this->db->db_debug; 
						$this->db->db_debug = FALSE; 	
							
						$this->mPerkara->updatePerkara($nomorPerkara,10);	
						if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,10)) 
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
							$data['response']			= TRUE;
							$data['pesan']				= '<div class="alert alert-success">Berhasil update</div>';            
											
						}						
						$this->db->db_debug = $db_debug; //restore setting					

					}	
					
				}
				else
				{
					$suratPanggilan['tanggal_putusan']			= date('Y-m-d',strtotime($this->input->post('tanggalPutusan')));
					$suratPanggilan['tanggal_pemberitahuan']	= date('Y-m-d',strtotime($this->input->post('tanggalPemberitahuan')));	
					$suratPanggilan['tanggal_diterima']			= date('Y-m-d',strtotime($this->input->post('tanggalDiterima')));
					$suratPanggilan['acara_sidang']	    		= $this->input->post('acaraSidang');
					$suratPanggilan['amar_putusan']				= $this->input->post('amarPutusan');
					$suratPanggilan['inkracht']					= $this->input->post('inkracht');
					$suratPanggilan['tahapan_perkara']			= 10;
						
					$db_debug 			= $this->db->db_debug; 
					$this->db->db_debug = FALSE; 	
						
					$this->mPerkara->updatePerkara($nomorPerkara,10);	
					if (!$this->mPerkara->updateSuratPanggilan($suratPanggilan,$nomorPerkara,10)) 
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
						$data['pesan']			= '<div class="alert alert-success">Berhasil update</div>';            
										
					}
					
					$this->db->db_debug = $db_debug; //restore setting
				}			

			}		
			
		}		
		
		$data['perkara']		= 	$this->mPerkara->getPerkaraById($nomorPerkara,10)->row();	
		$this->load->view('vPutusan',$data);	
        			
	}
}
