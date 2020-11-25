<?php


class mApproval extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
	}
	
    
			
	function getApprovalSuratPenunjukan()
	{
		$filter 			= $this->input->post('filter');
		$find				= $this->input->post('find');
		
		$sql_filter  = " ";
		
		if(!empty($filter))
		{
			if($filter == 1)
			{	
				$sql_filter  = " AND a.nomor LIKE '$find%' ";
			}
			
			if($filter == 2)
			{
				$sql_filter  = " AND a.kepada LIKE '$find%' ";
			}

			if($filter == 3)
			{
				$sql_filter  = " AND a.untuk LIKE '%$find%' ";
			}	
		
		}
	
		
		$sql =" SELECT a.*, b.nama nama_tahapan FROM surat_penunjukan a
		LEFT JOIN tahapan_surat b ON a.tahapan = b.kode
		WHERE 1=1  
		AND a.tahapan='2' 
		AND a.jenis_surat='penunjukan' 
		$sql_filter ";
		return $this->db->query($sql);
	}		
	
	function getApprovalSuratPendampingan()
	{
		$filter 			= $this->input->post('filter');
		$find				= $this->input->post('find');
		$sql_filter 		= " ";
		
		if(!empty($filter))
		{
			if($filter == 1)
			{	
				$sql_filter  = " AND a.nomor LIKE '$find%' ";
			}
			
			if($filter == 2)
			{
				$sql_filter  = " AND a.kepada LIKE '$find%' ";
			}

			if($filter == 3)
			{
				$sql_filter  = " AND a.untuk LIKE '%$find%' ";
			}			
		}
		
		$sql =" SELECT a.*, b.nama nama_tahapan FROM surat_penunjukan a
		LEFT JOIN tahapan_surat b ON a.tahapan = b.kode
		WHERE 1=1  
		AND a.tahapan='2' 
		AND a.jenis_surat='pendampingan' 
		$sql_filter ";
		return $this->db->query($sql);
	}		
	
		
	function updateTahapanSuratPenunjukan($nomor)
	{
		
		$this->db->where('nomor',$nomor);
		$this->db->set('tahapan','3');
		return $this->db->update('surat_penunjukan');

	}
	
	function getApprovalPerkara()
	{
		$filter 			= $this->input->post('filter');
		$find				= $this->input->post('find');
		
		if(!empty($filter))
		{
			if($filter == 1)
			{	
				$sql_filter  = " AND a.nomor_perkara LIKE '$find%' ";
			}
			
			if($filter == 2)
			{
				$sql_filter  = " AND a.penggugat LIKE '$find%' ";
			}

			if($filter == 3)
			{
				$sql_filter  = " AND a.materi_gugatan LIKE '%$find%' ";
			}	
			
			
		}
		else
		{
			$sql_filter  = " ";
		}
		
		$sql =" SELECT a.*, b.nama nama_tahapan FROM perkara a 
		LEFT JOIN tahapan b ON a.tahapan = b.kode 
		WHERE 1=1  $sql_filter ";
		return $this->db->query($sql);
	}		
	
	
	function updateApprovalPerkara($nomor)
	{
		
		$this->db->where('nomor_perkara',$nomor);
		$this->db->set('approval','1');
		return $this->db->update('perkara');

	}
	
	function updateCaseClose($nomor)
	{
		
		$this->db->where('nomor_perkara',$nomor);
		$this->db->set('status','close');
		return $this->db->update('perkara');

	}
	
			

}

?>
