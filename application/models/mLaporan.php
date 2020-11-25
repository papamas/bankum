<?php


class mLaporan extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
	}
	
    function getLaporanPenunjukan($data)
	{
		$startDate		= date('Y-m-d',strtotime($data['startDate']));
		$endDate		= date('Y-m-d',strtotime($data['endDate']));
		
		$sql="SELECT * FROM surat_penunjukan WHERE 1=1 
		AND jenis_surat='penunjukan'  
		AND date(tanggal_surat)
		BETWEEN date('$startDate') 
		AND date ('$endDate')";
		return $this->db->query($sql);	
	}	
	
	function getLaporanPendampingan($data)
	{
		$startDate		= date('Y-m-d',strtotime($data['startDate']));
		$endDate		= date('Y-m-d',strtotime($data['endDate']));
		
		$sql="SELECT * FROM surat_penunjukan WHERE 1=1 
		AND jenis_surat='pendampingan'  
		AND date(tanggal_surat)
		BETWEEN date('$startDate') 
		AND date ('$endDate')";
		return $this->db->query($sql);	
	}	
	
	 function getTingkatPengadilan()
	{
	    $this->db->order_by('kode','ASC');
		return $this->db->get('tingkat_pengadilan');
	}

	function getJenisPengadilan()
	{
		$this->db->order_by('kode','ASC');
		return $this->db->get('jenis_pengadilan');
	}

	function getProvinsi()
	{
		$this->db->order_by('kode','ASC');
		return $this->db->get('provinsi');
	}	
	
	function getKabKota()
	{
		$this->db->order_by('kode','ASC');
		return $this->db->get('kab_kota');
	}	
	
	function getLaporanPerkara($data)
	{
		$startDate		= date('Y-m-d',strtotime($data['startDate']));
		$endDate		= date('Y-m-d',strtotime($data['endDate']));
		
		$sql =" SELECT a.*, b.nama nama_tingkat, c.nama nama_jenis,
		d.nama nama_provinsi, e.nama nama_kab_kota, f.nama nama_instansi
		FROM perkara a
		LEFT JOIN tingkat_pengadilan b ON a.tingkat_pengadilan = b.kode
		LEFT JOIN jenis_pengadilan c ON a.jenis_pengadilan = c.kode
		LEFT JOIN provinsi d ON a.provinsi = d.kode
		LEFT JOIN kab_kota e ON a.kab_kota = e.kode
		LEFT JOIN instansi f ON a.instansi = f.kode
		WHERE date(created_date)
		BETWEEN date('$startDate') 
		AND date ('$endDate') ";
		return $this->db->query($sql);	
	}	

}

?>
