<?php


class mPendampingan extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
	}
	
    function simpan($data)
	{
		return $this->db->insert('surat_penunjukan',$data);
	}	
			
	function getSuratPendampingan()
	{
		$filter 			= $this->input->post('filter');
		$find				= $this->input->post('find');
		
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
		else
		{
			$sql_filter  = " ";
		}
		
		$sql =" SELECT a.*, b.nama nama_tahapan FROM surat_penunjukan a
		LEFT JOIN tahapan_surat b ON a.tahapan = b.kode
		WHERE 1=1 AND jenis_surat='pendampingan' $sql_filter ";
		return $this->db->query($sql);
	}		
	
	
	function updateSuratPendampingan($data)
	{
		
		$nomor			= $this->input->post('nomor');
		
		$this->db->where('nomor',$nomor);
		return $this->db->update('surat_penunjukan',$data);

	}
	
	function updateTahapanSuratPendampingan($nomor)
	{
		
		$this->db->where('nomor',$nomor);
		$this->db->set('tahapan','2');
		return $this->db->update('surat_penunjukan');

	}
			

	function getPendampinganByid($nomor)
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
