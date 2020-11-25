<?php


class mPermintaan extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
	}
	
    function simpan($data)
	{
		return $this->db->insert('surat_permintaan',$data);
	}	
			
	function getSuratPermintaan()
	{
		$filter 			= $this->input->post('filter');
		$find				= $this->input->post('find');
		$sql_filter			= '';
		
		if(!empty($filter))
		{
			if($filter == 1)
			{	
				$sql_filter  = " AND nomor_surat LIKE '$find%' ";
			}
			
			if($filter == 2)
			{
				$sql_filter  = " AND asal_surat LIKE '$find%' ";
			}

			if($filter == 3)
			{
				$sql_filter  = " AND perihal_surat LIKE '$find%' ";
			}	
			
			if($filter == 4)
			{
				$sql_filter  = " AND nomor_agenda LIKE '$find%' ";
			}	
			
		}
		
		$sql =" SELECT * FROM surat_permintaan WHERE 1=1 $sql_filter ";
		return $this->db->query($sql);
	}		
	
	function getPermintaanByid($nomor)
	{
		$sql = " SELECT *, DATE_FORMAT(tanggal_agenda,'%d-%m-%Y') tanggal_agenda,
		DATE_FORMAT(tanggal_surat,'%d-%m-%Y') tanggal_surat
		FROM surat_permintaan WHERE nomor_agenda='$nomor' ";
		return $this->db->query($sql);	
	}		
	
	function update($data)
	{
		$nomor 	= $this->input->post('nomorAgendaOld');
		$this->db->where('nomor_agenda',$nomor);
		return $this->db->update('surat_permintaan',$data);
	}

}

?>
