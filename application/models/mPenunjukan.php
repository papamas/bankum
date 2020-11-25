<?php


class mPenunjukan extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
	}
	
    function simpan($data)
	{
		return $this->db->insert('surat_penunjukan',$data);
	}	
			
	function getSuratPenunjukan()
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
		WHERE 1=1  AND a.jenis_surat='penunjukan' $sql_filter ";
		return $this->db->query($sql);
	}		
	
	
	function updateSuratPenunjukan($data)
	{
		
		$nomor			= $this->input->post('nomor');
		
		$this->db->where('nomor',$nomor);
		return $this->db->update('surat_penunjukan',$data);

	}
	
	
	function updateTahapanSuratPenunjukan($nomor)
	{
		
		$this->db->where('nomor',$nomor);
		$this->db->set('tahapan','2');
		return $this->db->update('surat_penunjukan');

	}
			

	function getPenunjukanByid($nomor)
	{
		$sql = " SELECT *, 
		DATE_FORMAT(tanggal_surat,'%d-%m-%Y') tanggal_surat
		FROM surat_penunjukan WHERE nomor='$nomor' ";
		return $this->db->query($sql);	
	}		
	
	function update($data)
	{
		$nomor 	= $this->input->post('nomorOld');
		
		$this->db->where('nomor',$nomor);
		return $this->db->update('surat_penunjukan',$data);
	}
}

?>
