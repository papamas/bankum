<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendampingan extends MY_Controller {

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
		
		$this->load->model('mPendampingan');
    }
	
	public function index()
	{
		$data['pesan']			= '';
		$this->load->view('vPendampingan',$data);
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
		
		$data['pendampingan']			= $this->mPendampingan->getSuratPendampingan();
		$this->load->view('vDaftarPendampingan',$data);
	}
	
	public function simpan()
	{
		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required');
		$this->form_validation->set_rules('dasarSatu', 'Dasar', 'required');
		$this->form_validation->set_rules('dasarDua', 'Dasar', 'required');
		$this->form_validation->set_rules('kepada', 'Kepada', 'required');
		$this->form_validation->set_rules('diKeluarkan', 'Di Keluarkan', 'required');
		$this->form_validation->set_rules('tanggalSurat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('tertanda', 'tertanda', 'required');

		
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
				$dataPendampingan['nomor']				= $this->input->post('nomor');
				$dataPendampingan['dasar_satu']			= $this->input->post('dasarSatu');
				$dataPendampingan['dasar_dua']			= $this->input->post('dasarDua');
				$dataPendampingan['kepada']				= $this->input->post('kepada');
				$dataPendampingan['untuk']				= $this->input->post('untuk');
				$dataPendampingan['di_keluarkan']		= $this->input->post('diKeluarkan');
				$dataPendampingan['tanggal_surat']		= date('Y-m-d',strtotime($this->input->post('tanggalSurat')));	
				$dataPendampingan['tertanda']			= $this->input->post('tertanda');
				$dataPendampingan['jenis_surat']		= 'pendampingan';
				$dataPendampingan['tahapan']			= '1';
		
				$db_debug 			= $this->db->db_debug; 
				$this->db->db_debug = FALSE; 	
				if (!$this->mPendampingan->simpan($dataPendampingan)) 
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
					$data['pesan']			= '<div class="alert alert-success">Berhasil menyimpan surat pendampingan</div>';    
									
				}	
						
				$this->db->db_debug = $db_debug; //restore
	
		}
		$this->load->view('vPendampingan',$data);
	}	
	
	public function pratinjau()
	{
	    $nomor 				= $this->input->get('nomor');
		$dasarSatu 			= $this->input->get('dasarSatu');
		$dasarDua 			= $this->input->get('dasarDua');
		$kepada				= $this->input->get('kepada');
		$untuk				= $this->input->get('untuk');
		$diKeluarkan		= $this->input->get('diKeluarkan');
		$tanggalSurat		= $this->input->get('tanggalSurat');
		$tertanda			= $this->input->get('tertanda');
		
		$this->load->library('PDF', array());
		
		
		$this->pdf->setPrintHeader(true);
		$this->pdf->setPrintFooter(true);	
		
		$this->pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);
		$this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
	
		$this->pdf->AddPage('P', 'A4');
		
		$this->pdf->SetFont('freeSerif', '', 12);
		$this->pdf->Text(5, 55,'SURAT PERINTAH', false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);
		$style1 = array(
			'width' => 0.29999999999999999,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => array(0, 0, 0)
			);
		$this->pdf->Line(72, 60, $this->pdf->getPageWidth() - 77, 60, $style1);
		$this->pdf->Text(5, 60,'Nomor : '.$nomor , false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);
		
		$this->pdf->Text(5, 70,'KEPALA BADAN KEPEGAWAIAN NEGARA', false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);

		$this->pdf->Text(5, 80, 'Dasar');
		$this->pdf->Text(25, 80, ':');
		$this->pdf->Text(27, 80, '1.');
		$text1='Peraturan Presiden Republik Indonesia Nomor 58 Tahun 2013  tentang Badan Kepegawaian Negara;';
		$this->pdf->writeHTMLCell(160,125,35,80,$text1,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 90, '2.');
		$text1='Peraturan Badan Kepegawaian Negara Nomor 02 Tahun 2020 tentang Organisasi dan Tata Kerja Badan Kepegawaian Negara;';
		$this->pdf->writeHTMLCell(160,125,35,90,$text1,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 100, '3.');
		$text1='Surat Kepala Kepolisian Resort Tangerang Selatan Nomor B/383/II/2019/Reskrim tanggal 7 Februari 2019 perihal  Bantuan menghadirkan saksi;';
		$this->pdf->writeHTMLCell(160,125,35,100,$dasarSatu,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 110, '4.');
		$text1='Disposisi Kepala Badan Kepegawaian Negara tanggal 15 Februari 2019 untuk ditindaklanjuti;';
		$this->pdf->writeHTMLCell(160,125,35,110,$dasarDua,0,0,false,true,'J',true);
		
		$this->pdf->Text(5, 120,'M E M E R I N T A H K A N :', false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);
		
		$this->pdf->Text(5, 130, 'Kepada');
		$this->pdf->Text(25, 130, ':');
		$text1='Yuyud Yuchi Susanta, S.H. NIP. 196410011991031001, Pangkat Pembina Tingkat I, golongan ruang IV/b, Jabatan Kepala Bidang Konsultasi Hukum Kepegawaian pada Badan Kepegawaian Negara';
		$this->pdf->writeHTMLCell(170,125,27,130,$kepada,0,0,false,true,'J',true);
		
		$this->pdf->Text(5, 150, 'Untuk');
		$this->pdf->Text(25, 150, ':');
		$this->pdf->Text(27, 150, '1.');
		$text1='Memberikan keterangan klarifikasi tentang Surat penetapan NIP kepada Penyidik Polres Tangerang Selatan terkait dengan adanya dugaan tindak pidana penipuan sebagaimana dimaksud dalam Pasal 378 KUHP dan menurut keterangan korban bahwa pelaku menjanjikan bisa menjadikan anak korban yang bernama ARIE CAHYANI EKA PUTRI untuk menjadi Pegawai di Dinas Kesehatan Pemkot tangerang Selatan dan kemudian pelaku memberikan kepada korban NIP dengan Nomor 1999501012017042003 an. ARIE CAHYANI EKA PUTRI, yang akan dilaksanakan pada hari Selasa tanggal 12 Maret 2019; ';
		$this->pdf->writeHTMLCell(160,125,35,150,$untuk,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 187, '2.');
		$text1='Melaksanakan perintah ini dengan seksama dan penuh rasa tanggung jawab; ';
		$this->pdf->writeHTMLCell(160,125,35,187,$text1,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 192, '3.');
		$text1='Melaporkan hasil pelaksanaan tugas kepada Kepala BKN atau pejabat lain yang ditunjuk. ';
		$this->pdf->writeHTMLCell(160,125,35,192,$text1,0,0,false,true,'J',true);
		
		
		// set style for barcode
		$style = array(
			'border' => false,
			'padding' => 0,
			'fgcolor' => array(0, 0, 0),
			'bgcolor' => false, //array(255,255,255)
			'module_width' => 1, // width of a single module in points
			'module_height' => 1 // height of a single module in points
		);
		
		$this->pdf->write2DBarcode('Surat Perintah', 'QRCODE,Q', 15, 210, 25, 25, $style, 'N');
		
		$this->pdf->Text(120, 210, 'Dikeluarkan');
		$this->pdf->Text(145, 210, ': '.$diKeluarkan);
		
		$this->pdf->Text(120, 215, 'pada tanggal');
		$this->pdf->Text(145, 215, ': '.$tanggalSurat);
		
		$style1 = array(
			'width' => 0.29999999999999999,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => array(0, 0, 0)
			);
		$this->pdf->Line(120, 225, $this->pdf->getPageWidth() - 5, 225, $style1);
		
		switch($tertanda){
			case 'Kepala' :
				$an        = '';
			    $jabatan   = 'Kepala Badan Kepegawaian Negara';
				$nama	   = 'Dr. Ir. Bima Haria Wibisana, MSIS';
				$nip       = 'NIP. 196107191989031001';
			break;
			case 'Waka' :
				$an        = '';
				$jabatan   = 'Wakil Kepala Badan Kepegawaian Negara';
				$nama	   = 'Supranawa Yusuf, S.H., M.P.A.';
				$nip       = 'NIP. 19630504 198901 1 001';
			break;
			case 'Sesma' : 
				$an        = 'an. Kepala Badan Kepegawaian Negara';
			    $jabatan   = 'Sekretaris Utama';
				$nama	   = 'Imas Sukmariah, S.Sos., M.A.P';
				$nip       = 'NIP. 196605091986032001';
			break;
			case 'Kapus' : 
				$an        = 'an. Kepala Badan Kepegawaian Negara';
			    $jabatan   = 'Kepala Pusat Bantuan Hukum';
				$nama	   = 'Sukamto, SH, MH';
				$nip       = 'NIP. 196212161991031001';
			break;	
		}	
		
		$text2= $an;
		$this->pdf->writeHTMLCell(100,125,120,230,$text2,0,0,false,true,'L',true);
		
		$text2= $jabatan;
		$this->pdf->writeHTMLCell(100,125,120,235,$text2,0,0,false,true,'L',true);
		
		$text2= $nama;
		$this->pdf->writeHTMLCell(100,125,120,255,$text2,0,0,false,true,'L',true);
		
		$text2= $nip;
		$this->pdf->writeHTMLCell(100,125,120,260,$text2,0,0,false,true,'L',true);
		
		$this->pdf->Output('SuratPerintah.pdf', 'I');
		 	
	}	
	
	public function doUpload()
	{
		
		$target_dir						='./uploads/pendampingan';
		// buat folde baru jika tidak ada
		if (!is_dir($target_dir))
		{
			mkdir($target_dir, 0777, TRUE);
		}		
		
		$config['upload_path']          = $target_dir;
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 3024;
		$config['encrypt_name']			= TRUE;	
		$config['overwrite']			= TRUE;	
		$config['detect_mime']			= TRUE;
		
		$this->load->library('upload', $config);
		
		if (! $this->upload->do_upload('file'))
		{
				$error = array('error' => strip_tags($this->upload->display_errors()));

				$this->output
						->set_status_header(406)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($error));
				
		}
		else
		{
				$fileupload 		          		= $this->upload->data();
				$dataPendampingan['file_surat']		= $fileupload['file_name'];
			
				$db_debug 			= $this->db->db_debug; 
				$this->db->db_debug = FALSE; 	
				if (!$this->mPendampingan->updateSuratPendampingan($dataPendampingan)) 
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
					$data['pesan']			= 'Berhasil menyimpan file surat';    
					$this->output
						->set_status_header(200)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($data)); 				
				}	
						
				$this->db->db_debug = $db_debug; //restore
				
				
				
		}
			
	}	
	
	public function showFile()
	{
		$file      = $this->myencrypt->decode($this->input->get('f'));		
		$flok      = base_url().'uploads/pendampingan/'.$file;
						
		header('Pragma:public');
		header('Cache-Control:no-store, no-cache, must-revalidate');
		header('Content-type:application/pdf');
		header('Content-Disposition:inline; filename='.$file);                      
		header('Expires:0'); 
		ob_end_clean();
		readfile($flok); 
	}	
	
	public function kirimApproval()
	{
		$nomor      = $this->myencrypt->decode($this->input->post('nomor'));
		
		$db_debug 			= $this->db->db_debug; 
		$this->db->db_debug = FALSE; 	
		if (!$this->mPendampingan->updateTahapanSuratPendampingan($nomor)) 
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
			$data['pesan']			= 'Berhasil kirim Proses Approval';    
			$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data)); 				
		}	
				
		$this->db->db_debug = $db_debug; //restore
	}	
	
	function getPendampinganByid()
	{
		$nomor  			= $this->myencrypt->decode($this->input->get('nomor'));
		$pendampingan		= $this->mPendampingan->getPendampinganByid($nomor)->row();
		echo json_encode($pendampingan);
	}	
	
	public function update()
	{
		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required');
		$this->form_validation->set_rules('dasarSatu', 'Dasar', 'required');
		$this->form_validation->set_rules('dasarDua', 'Dasar', 'required');
		$this->form_validation->set_rules('kepada', 'Kepada', 'required');
		$this->form_validation->set_rules('diKeluarkan', 'Di Keluarkan', 'required');
		$this->form_validation->set_rules('tanggalSurat', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('tertanda', 'tertanda', 'required');
		
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
			$dataPendampingan['nomor']				= $this->input->post('nomor');
			$dataPendampingan['dasar_satu']			= $this->input->post('dasarSatu');
			$dataPendampingan['dasar_dua']			= $this->input->post('dasarDua');
			$dataPendampingan['kepada']				= $this->input->post('kepada');
			$dataPendampingan['untuk']				= $this->input->post('untuk');
			$dataPendampingan['di_keluarkan']		= $this->input->post('diKeluarkan');
			$dataPendampingan['tanggal_surat']		= date('Y-m-d',strtotime($this->input->post('tanggalSurat')));	
			$dataPendampingan['tertanda']			= $this->input->post('tertanda');
			$dataPendampingan['jenis_surat']		= 'pendampingan';
			$dataPendampingan['tahapan']			= '1';	
				
			
			// update tanpa file 
			$db_debug 			= $this->db->db_debug; 
			$this->db->db_debug = FALSE; 	
				
			if (!$this->mPendampingan->update($dataPendampingan)) 
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
	
	public function getPendampingan()
	{
		$pendampingan 		= $this->mPendampingan->getSuratPendampingan();
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
		
		foreach($pendampingan->result() as $value)
		{
			$html .='<tr>
				<th scope="row">'.$no.'</th>
				<td>'.$value->nomor.'<br/>'.$value->tanggal_surat.'</td>
				<td>'.$value->nama_tahapan.'</td>
				<td>'.$value->kepada.'</td>
				<td>'.$value->untuk.'</td>
				<td>
				<a href="#" style="color:blue;"  data-id="'.$this->myencrypt->encode($value->nomor).'" data-toggle="modal" data-target="#ePendampingan" data-placement="top"  title="Edit"><i class="fa fa-pencil"></i></a>
				<a  style="color:brown;"  data-tooltip="tooltip" data-placement="top"  title="Pratinjau Surat" data-toggle="modal" data-target="#pratinjauSurat" data-id="?n='.$this->myencrypt->encode($value->nomor).'"><i class="fa fa-eye"></i></a>
				<a href="#" style="color:red;"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-close"></i></a>
				<a style="color:green;"  data-tooltip="tooltip"  title="Upload File" data-toggle="modal" data-target="#uploadModal" data-nomor="'.$value->nomor.'" data-placement="top"><i class="fa fa-upload"></i></a>
				<a style="color:red;"  data-toggle="modal"  data-tooltip="tooltip" data-placement="top" title="Lihat File Surat" data-target="#fileSurat" data-id="?f='.$this->myencrypt->encode($value->file_surat).'"><i class="fa fa-eye"></i></a>
				<a style="color:blue;"  data-nomor="'.$this->myencrypt->encode($value->nomor).'" data-tooltip="tooltip" data-placement="top"  data-toggle="modal" data-target="#kirimModal" title="Kirim untuk approval"><i class="fa fa-mail-forward"></i></a>																
				</td>
			</tr>	';
			$no++;	
		}
		
		$html .='</table>';		
        echo $html;		
		
	}
	
	public function pratinjauSurat()
	{
	    $nomor 				= $this->myencrypt->decode($this->input->get('n'));	
		$pendampingan	    = $this->mPendampingan->getPendampinganByid($nomor)->row();
		
		$this->load->library('PDF', array());
		
		
		$this->pdf->setPrintHeader(true);
		$this->pdf->setPrintFooter(true);	
		
		$this->pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);
		$this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
	
		$this->pdf->AddPage('P', 'A4');
		
		$this->pdf->SetFont('freeSerif', '', 12);
		$this->pdf->Text(5, 55,'SURAT PERINTAH', false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);
		$style1 = array(
			'width' => 0.29999999999999999,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => array(0, 0, 0)
			);
		$this->pdf->Line(72, 60, $this->pdf->getPageWidth() - 77, 60, $style1);
		$this->pdf->Text(5, 60,'Nomor : '.$pendampingan->nomor , false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);
		
		$this->pdf->Text(5, 70,'KEPALA BADAN KEPEGAWAIAN NEGARA', false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);

		$this->pdf->Text(5, 80, 'Dasar');
		$this->pdf->Text(25, 80, ':');
		$this->pdf->Text(27, 80, '1.');
		$text1='Peraturan Presiden Republik Indonesia Nomor 58 Tahun 2013  tentang Badan Kepegawaian Negara;';
		$this->pdf->writeHTMLCell(160,125,35,80,$text1,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 90, '2.');
		$text1='Peraturan Badan Kepegawaian Negara Nomor 02 Tahun 2020 tentang Organisasi dan Tata Kerja Badan Kepegawaian Negara;';
		$this->pdf->writeHTMLCell(160,125,35,90,$text1,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 100, '3.');
		$text1='Surat Kepala Kepolisian Resort Tangerang Selatan Nomor B/383/II/2019/Reskrim tanggal 7 Februari 2019 perihal  Bantuan menghadirkan saksi;';
		$this->pdf->writeHTMLCell(160,125,35,100,$pendampingan->dasar_satu,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 110, '4.');
		$text1='Disposisi Kepala Badan Kepegawaian Negara tanggal 15 Februari 2019 untuk ditindaklanjuti;';
		$this->pdf->writeHTMLCell(160,125,35,110,$pendampingan->dasar_dua,0,0,false,true,'J',true);
		
		$this->pdf->Text(5, 120,'M E M E R I N T A H K A N :', false, false, true, 0, 4, 'C', false, '', 0, false, 'T', 'M', false);
		
		$this->pdf->Text(5, 130, 'Kepada');
		$this->pdf->Text(25, 130, ':');
		$text1='Yuyud Yuchi Susanta, S.H. NIP. 196410011991031001, Pangkat Pembina Tingkat I, golongan ruang IV/b, Jabatan Kepala Bidang Konsultasi Hukum Kepegawaian pada Badan Kepegawaian Negara';
		$this->pdf->writeHTMLCell(170,125,27,130,$pendampingan->kepada,0,0,false,true,'J',true);
		
		$this->pdf->Text(5, 150, 'Untuk');
		$this->pdf->Text(25, 150, ':');
		$this->pdf->Text(27, 150, '1.');
		$text1='Memberikan keterangan klarifikasi tentang Surat penetapan NIP kepada Penyidik Polres Tangerang Selatan terkait dengan adanya dugaan tindak pidana penipuan sebagaimana dimaksud dalam Pasal 378 KUHP dan menurut keterangan korban bahwa pelaku menjanjikan bisa menjadikan anak korban yang bernama ARIE CAHYANI EKA PUTRI untuk menjadi Pegawai di Dinas Kesehatan Pemkot tangerang Selatan dan kemudian pelaku memberikan kepada korban NIP dengan Nomor 1999501012017042003 an. ARIE CAHYANI EKA PUTRI, yang akan dilaksanakan pada hari Selasa tanggal 12 Maret 2019; ';
		$this->pdf->writeHTMLCell(160,125,35,150,$pendampingan->untuk,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 187, '2.');
		$text1='Melaksanakan perintah ini dengan seksama dan penuh rasa tanggung jawab; ';
		$this->pdf->writeHTMLCell(160,125,35,187,$text1,0,0,false,true,'J',true);
		
		$this->pdf->Text(27, 192, '3.');
		$text1='Melaporkan hasil pelaksanaan tugas kepada Kepala BKN atau pejabat lain yang ditunjuk. ';
		$this->pdf->writeHTMLCell(160,125,35,192,$text1,0,0,false,true,'J',true);
		
		
		// set style for barcode
		$style = array(
			'border' => false,
			'padding' => 0,
			'fgcolor' => array(0, 0, 0),
			'bgcolor' => false, //array(255,255,255)
			'module_width' => 1, // width of a single module in points
			'module_height' => 1 // height of a single module in points
		);
		
		$this->pdf->write2DBarcode('Surat Perintah', 'QRCODE,Q', 15, 210, 25, 25, $style, 'N');
		
		$this->pdf->Text(120, 210, 'Dikeluarkan');
		$this->pdf->Text(145, 210, ': '.$pendampingan->di_keluarkan);
		
		$this->pdf->Text(120, 215, 'pada tanggal');
		$this->pdf->Text(145, 215, ': '.$this->tgl_indo($pendampingan->tanggal_surat));
		
		$style1 = array(
			'width' => 0.29999999999999999,
			'cap'   => 'butt',
			'join'  => 'miter',
			'dash'  => 0,
			'color' => array(0, 0, 0)
			);
		$this->pdf->Line(120, 225, $this->pdf->getPageWidth() - 5, 225, $style1);
		
		switch($pendampingan->tertanda){
			case 'Kepala' :
				$an        = '';
			    $jabatan   = 'Kepala Badan Kepegawaian Negara';
				$nama	   = 'Dr. Ir. Bima Haria Wibisana, MSIS';
				$nip       = 'NIP. 196107191989031001';
			break;
			case 'Waka' :
				$an        = '';
				$jabatan   = 'Wakil Kepala Badan Kepegawaian Negara';
				$nama	   = 'Supranawa Yusuf, S.H., M.P.A.';
				$nip       = 'NIP. 19630504 198901 1 001';
			break;
			case 'Sesma' : 
				$an        = 'an. Kepala Badan Kepegawaian Negara';
			    $jabatan   = 'Sekretaris Utama';
				$nama	   = 'Imas Sukmariah, S.Sos., M.A.P';
				$nip       = 'NIP. 196605091986032001';
			break;
			case 'Kapus' : 
				$an        = 'an. Kepala Badan Kepegawaian Negara';
			    $jabatan   = 'Kepala Pusat Bantuan Hukum';
				$nama	   = 'Sukamto, SH, MH';
				$nip       = 'NIP. 196212161991031001';
			break;	
		}	
		
		$text2= $an;
		$this->pdf->writeHTMLCell(100,125,120,230,$text2,0,0,false,true,'L',true);
		
		$text2= $jabatan;
		$this->pdf->writeHTMLCell(100,125,120,235,$text2,0,0,false,true,'L',true);
		
		$text2= $nama;
		$this->pdf->writeHTMLCell(100,125,120,255,$text2,0,0,false,true,'L',true);
		
		$text2= $nip;
		$this->pdf->writeHTMLCell(100,125,120,260,$text2,0,0,false,true,'L',true);
		
		$this->pdf->Output('SuratPerintah.pdf', 'I');
		 	
	}	
	

    function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun

		return $pecahkan[0]. ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' .$pecahkan[2]  ;
	}

}
