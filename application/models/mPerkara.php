<?php


class mPerkara extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
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

	function getInstansi()
	{
		$this->db->order_by('kode','ASC');
		return $this->db->get('instansi');
	}

	
    function simpan($data)
	{
		return $this->db->insert('perkara',$data);
	}	
	
	function getPerkara()
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
	
			
	function getPerkaraById($id,$tahapan)
	{
		$sql =" SELECT a.*, b.nama nama_tingkat, c.nama nama_jenis,
		d.nama nama_provinsi, e.nama nama_kab_kota, f.nama nama_instansi,
		g.acara_sidang, g.isi_ringkas, g.dokumen_intervensi,
		g.surat_kuasa, g.surat_perintah, g.surat_ijin_insidentil, 
		g.saksi_saksi,g.amar_putusan,
		g.inkracht,g.file_scan,
		DATE_FORMAT(g.tanggal_sidang,'%d-%m-%Y')  tanggal_sidang,
		DATE_FORMAT(g.tanggal_putusan,'%d-%m-%Y') tanggal_putusan,
		DATE_FORMAT(g.tanggal_pemberitahuan,'%d-%m-%Y') tanggal_pemberitahuan,
		DATE_FORMAT(g.tanggal_diterima,'%d-%m-%Y') tanggal_diterima
		FROM perkara a
		LEFT JOIN tingkat_pengadilan b ON a.tingkat_pengadilan = b.kode
		LEFT JOIN jenis_pengadilan c ON a.jenis_pengadilan = c.kode
		LEFT JOIN provinsi d ON a.provinsi = d.kode
		LEFT JOIN kab_kota e ON a.kab_kota = e.kode
		LEFT JOIN instansi f ON a.instansi = f.kode
		LEFT JOIN dokumen_perkara g ON ( g.nomor_perkara = a.nomor_perkara AND g.tahapan_perkara = '$tahapan') 
		WHERE a.nomor_perkara='$id' ";
		return $this->db->query($sql);	
	}	
	
	function simpanSuratPanggilan($data)
	{
		return $this->db->insert('dokumen_perkara',$data);
	}	
	
	function updatePerkara($nomor,$tahapan)
	{
		$this->db->where('nomor_perkara',$nomor);
		$this->db->set('tahapan',$tahapan);
		return $this->db->update('perkara');
	}
	
	
	function updateSuratPanggilan($data,$nomor,$tahapan)
	{
		$this->db->where('nomor_perkara',$nomor);
		$this->db->where('tahapan_perkara',$tahapan);
		return $this->db->update('dokumen_perkara',$data);
	}
	
	function getPerkaraByidLite($nomor)
	{
		$sql = " SELECT *
		FROM perkara WHERE nomor_perkara='$nomor' ";
		return $this->db->query($sql);	
	}		
	
	function update($data)
	{
		$nomor 	= $this->input->post('nomorPerkaraOld');
		
		$this->db->where('nomor_perkara',$nomor);
		return $this->db->update('perkara',$data);
	}
	
	function updateCaseClose($nomor)
	{
		
		$this->db->where('nomor_perkara',$nomor);
		$this->db->set('status','close');
		return $this->db->update('perkara');

	}
}

?>
