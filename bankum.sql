-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Nov 2020 pada 20.03
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bankum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_perkara`
--

CREATE TABLE IF NOT EXISTS `dokumen_perkara` (
  `nomor_perkara` varchar(100) NOT NULL,
  `tahapan_perkara` int(11) NOT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `acara_sidang` text NOT NULL,
  `isi_ringkas` text NOT NULL,
  `dokumen_intervensi` varchar(100) DEFAULT NULL,
  `surat_kuasa` varchar(100) DEFAULT NULL,
  `surat_perintah` varchar(100) DEFAULT NULL,
  `surat_ijin_insidentil` varchar(100) DEFAULT NULL,
  `saksi_saksi` text,
  `tanggal_putusan` date DEFAULT NULL,
  `tanggal_pemberitahuan` date DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `amar_putusan` text,
  `inkracht` tinyint(4) DEFAULT NULL,
  `file_scan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen_perkara`
--

INSERT INTO `dokumen_perkara` (`nomor_perkara`, `tahapan_perkara`, `tanggal_sidang`, `acara_sidang`, `isi_ringkas`, `dokumen_intervensi`, `surat_kuasa`, `surat_perintah`, `surat_ijin_insidentil`, `saksi_saksi`, `tanggal_putusan`, `tanggal_pemberitahuan`, `tanggal_diterima`, `amar_putusan`, `inkracht`, `file_scan`) VALUES
('152/G/2018/PTUNJKT', 2, '2020-11-11', 'x', 'x', 'bc864fedc361bedff6979c4fbe4592b6.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '897dd31cdf47fb19e3e8dff3ccda4d85.pdf'),
('152/G/2018/PTUNJKT', 3, '2020-11-18', 'xx', 'xx', NULL, '348c99022bb77759af1d22c66d981d8e.pdf', '26e18934ec04b31ca93c891adf49811c.pdf', '7d8f9bfab48486a3099d906082ec11a3.pdf', NULL, NULL, NULL, NULL, NULL, NULL, '3c98291aa3d7a0ee49eb133425efb664.pdf'),
('152/G/2018/PTUNJKT', 4, '2020-11-10', 'xxx', 'xxx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9bd92e648d7547a5246183af217240a0.pdf'),
('152/G/2018/PTUNJKT', 5, '2020-11-24', 'yxy', 'yxy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01f775f2c6201873a4a20bb174bc6111.pdf'),
('152/G/2018/PTUNJKT', 6, '2020-11-21', 'acxa', 'axac', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cdb6822ebf63abb2a22de0664abdc33d.pdf'),
('152/G/2018/PTUNJKT', 7, '2020-11-05', 'xx', 'xx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '96f800c15a87463a9b3b17ba3f302630.pdf'),
('152/G/2018/PTUNJKT', 8, '2020-11-27', 'xxxx', 'xxxx', NULL, NULL, NULL, NULL, 'saksi', NULL, NULL, NULL, NULL, NULL, '859119f8b1dd01fa9403bc361dae03f2.pdf'),
('152/G/2018/PTUNJKT', 9, '2020-11-17', 'zx', 'zx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9886c597f627a3c0828397d236337873.pdf'),
('152/G/2018/PTUNJKT', 10, NULL, 'xxxyyy', '', NULL, NULL, NULL, NULL, NULL, '2020-11-13', '2020-11-13', '2020-11-13', 'xxxyyy', 1, 'b75bd367cd5c2f3bd4ef102ee0cda4d9.pdf'),
('153/G/2018/PTUNJKT', 2, '2020-11-07', 'x', 'x', '1e94ad0d0fd109072a6206214e6020f6.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3d80b01c8463481fefc1315a90b2007d.pdf'),
('153/G/2018/PTUNJKT', 3, '2020-11-07', 'x', 'x', NULL, 'c0e3641e49d06c8479f12687b22b823e.pdf', NULL, 'e230e71ce1c0909754137d66f1b63c5b.pdf', NULL, NULL, NULL, NULL, NULL, NULL, '8298ababc14e397c31bd7ee7c19df7e6.pdf'),
('153/G/2018/PTUNJKT', 4, '2020-11-21', 'xy', 'xy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '795b4c5e1d708aa23271711b5a187e47.pdf'),
('153/G/2018/PTUNJKT', 5, '2020-11-27', 'xyx', 'xyx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8fda83fe8e043a9dcc869b120659bce9.pdf'),
('153/G/2018/PTUNJKT', 6, '2020-11-20', 'asx', 'asx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4f3cde74f054ca6e7b6c85f310e873cd.pdf'),
('153/G/2018/PTUNJKT', 7, '2020-11-27', 'xx', 'xx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '23b852adf455b450f4a580bf00b83003.pdf'),
('153/G/2018/PTUNJKT', 8, '2020-11-27', 'acara', 'isi', NULL, NULL, NULL, NULL, 'saksi', NULL, NULL, NULL, NULL, NULL, 'aa17dd4aa3a3ffc1f3d919e6d02663a4.pdf'),
('153/G/2018/PTUNJKT', 9, '2020-11-27', 'ax', 'is', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4f7fba78d22e5115493e8ededc5ebe24.pdf'),
('153/G/2018/PTUNJKT', 10, NULL, 'acara', '', NULL, NULL, NULL, NULL, NULL, '2020-11-03', '2020-11-03', '2020-11-03', 'amar', 1, '8e30a54985352c4963f9b468b878bf21.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
  `kode` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`kode`, `nama`) VALUES
('1010', 'Kementerian Koordinator Bidang Politik, Hukum dan Keamanan'),
('1020', 'Kementerian Koordinator Bidang Perekonomian'),
('1030', 'Kementerian Koordinator Bidang Pembangunan Manusia dan Kebudayaan'),
('1040', 'Kementerian Koordinator Bidang Kemaritiman'),
('2000', 'Kementerian Riset, Teknologi, dan Pendidikan Tinggi'),
('2010', 'Kementerian Koperasi dan Usaha Kecil dan Menengah'),
('2020', 'Kementerian Lingkungan Hidup'),
('2040', 'Kementerian Badan Usaha Milik Negara'),
('2050', 'Kementerian Pemberdayaan Perempuan dan Perlindungan Anak'),
('2060', 'Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi'),
('2100', 'Kementerian Pemuda dan Olahraga'),
('2110', 'Kementerian Perumahan Rakyat'),
('2120', 'Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi'),
('3001', 'Kementerian Dalam Negeri'),
('3002', 'Kementerian Luar Negeri'),
('3003', 'Kementerian Pertahanan'),
('3004', 'Kementerian Hukum dan Hak Asasi Manusia'),
('3005', 'Kementerian Keuangan'),
('3006', 'Kementerian Pertanian'),
('3008', 'Kementerian Energi dan Sumber Daya Mineral'),
('3009', 'Kementerian Perhubungan'),
('3010', 'Kementerian Pendidikan dan Kebudayaan'),
('3011', 'Kementerian Kesehatan'),
('3012', 'Kementerian Agama'),
('3013', 'Kementerian Ketenagakerjaan'),
('3014', 'Kementerian Sosial'),
('3015', 'Kementerian Lingkungan Hidup dan Kehutanan'),
('3016', 'Kementerian Kelautan dan Perikanan'),
('3018', 'Kementerian Komunikasi dan Informatika'),
('3019', 'Kementerian Perdagangan'),
('3020', 'Kementerian Perindustrian'),
('3021', 'Kementerian Pekerjaan Umum dan Perumahan Rakyat'),
('3022', 'Kementerian Pariwisata'),
('4001', 'Kementerian Sekretariat Negara'),
('4002', 'Kejaksaan Agung'),
('4003', 'Badan Intelijen Negara'),
('4004', 'Sekretariat Jenderal MPR'),
('4005', 'Setjen DPA'),
('4006', 'Sekretariat Jenderal DPR RI'),
('4007', 'Mahkamah Agung RI'),
('4008', 'Badan Pemeriksa Keuangan '),
('4009', 'Setjen WANTANNAS'),
('4010', 'Lembaga Sandi Negara'),
('4011', 'Badan Kepegawaian Negara'),
('4012', 'Lembaga Administrasi Negara '),
('4013', 'Lembaga Penerbangan dan Antariksa Nasional'),
('4014', 'Lembaga Ilmu Pengetahuan Indonesia'),
('4015', 'Badan Tenaga Nuklir Nasional '),
('4016', 'Badan Pusat Statistik '),
('4017', 'Kementerian Perencanaan Pembangunan Nasional/Bappenas'),
('4018', 'Arsip Nasional Republik Indonesia '),
('4019', 'Badan Informasi Geospasial'),
('4020', 'Badan Kependudukan dan Keluarga Berencana Nasional'),
('4021', 'Badan Koordinasi Penanaman Modal'),
('4022', 'Badan Pengkajian dan Penerapan Teknologi'),
('4023', 'Badan Pengawasan Keuangan dan Pembangunan'),
('4024', 'Kementerian Agraria dan Tata Ruang/Badan Pertanahan Nasional'),
('4025', 'Perpustakaan Nasional RI'),
('4027', 'Badan Standardisasi Nasional '),
('4028', 'Badan Pengawas Tenaga Nuklir '),
('4031', 'Badan Pengawas Obat dan Makanan '),
('4032', 'Lembaga Ketahanan Nasional RI'),
('4033', 'Kepolisian Negara'),
('4034', 'MABES TNI'),
('4035', 'Badan Meteorologi, Klimatologi dan Geofisika'),
('4036', 'Sekretariat Kabinet '),
('4037', 'Sekretariat Presiden'),
('4038', 'Sekretariat Wakil Presiden'),
('4039', 'Sekretariat Militer'),
('4040', 'Badan Narkotika Nasional'),
('4041', 'Setjen Komisi Pemilihan Umum'),
('4043', 'Badan Nasional Penanggulangan Bencana'),
('4044', 'Setjen KOMNAS HAM'),
('4045', 'Badan Pengusahaan Kawasan Perdagangan Bebas dan Pelabuhan Bebas Batam'),
('4046', 'Kepaniteraan dan Sekretariat Jenderal Mahkamah Konstitusi RI'),
('4047', 'Setjen Komisi Pemberantasan Korupsi'),
('4048', 'Setjen KORPRI'),
('4049', 'Sekretariat Jenderal Komisi Yudisial'),
('4050', 'Setjen Dewan Perwakilan Daerah'),
('4051', 'Badan Nasional Penempatan Perlindungan TKI'),
('4052', 'Badan Keamanan Laut RI'),
('4053', 'Badan SAR Nasional'),
('4054', 'Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah'),
('4055', 'Pusat Pelaporan dan Analisis Transaksi Keuangan'),
('4056', 'Ombudsman Republik Indonesia'),
('4057', 'TELEVISI REPUBLIK INDONESIA'),
('4058', 'RADIO REPUBLIK INDONESIA'),
('4059', 'Badan Nasional Pengelola Perbatasan'),
('4060', 'Badan Nasional Penanggulangan Terorisme'),
('4061', 'Setjen Komisi Pengawas Persaingan Usaha'),
('4062', 'Badan Pengawas Pemilihan Umum'),
('4063', 'Komisi Aparatur Sipil Negara'),
('4064', 'Badan Ekonomi Kreatif'),
('5100', 'Pemerintah Aceh'),
('5101', 'Pemerintah Kab. Aceh Besar'),
('5102', 'Pemerintah Kab. Pidie'),
('5103', 'Pemerintah Kab. Aceh Utara'),
('5104', 'Pemerintah Kab. Aceh Timur'),
('5105', 'Pemerintah Kab. Aceh Selatan'),
('5106', 'Pemerintah Kab. Aceh Barat'),
('5107', 'Pemerintah Kab. Aceh Tengah'),
('5108', 'Pemerintah Kab. Aceh Tenggara'),
('5109', 'Pemerintah Kab. Simeulue'),
('5110', 'Pemerintah Kab. Bireuen'),
('5111', 'Pemerintah Kab. Aceh Singkil'),
('5112', 'Pemerintah Kab. Aceh Barat Daya'),
('5113', 'Pemerintah Kab. Gayo Lues'),
('5114', 'Pemerintah Kab. Aceh Tamiang'),
('5115', 'Pemerintah Kab. Nagan Raya'),
('5116', 'Pemerintah Kab. Aceh Jaya'),
('5117', 'Pemerintah Kab. Bener Meriah'),
('5118', 'Pemerintah Kab. Pidie Jaya'),
('5171', 'Pemerintah Kota Sabang'),
('5172', 'Pemerintah Kota Banda Aceh'),
('5173', 'Pemerintah Kota Langsa'),
('5174', 'Pemerintah Kota Lhokseumawe'),
('5175', 'Pemerintah Kota Subulussalam'),
('5200', 'Pemerintah Provinsi Sumatera Utara'),
('5201', 'Pemerintah Kab. Deli Serdang'),
('5202', 'Pemerintah Kab. Karo'),
('5203', 'Pemerintah Kab. Langkat'),
('5204', 'Pemerintah Kab. Tapanuli Tengah'),
('5205', 'Pemerintah Kab. Simalungun'),
('5206', 'Pemerintah Kab. Labuhanbatu'),
('5207', 'Pemerintah Kab. Dairi'),
('5208', 'Pemerintah Kab. Tapanuli Utara'),
('5209', 'Pemerintah Kab. Tapanuli Selatan'),
('5210', 'Pemerintah Kab. Asahan'),
('5211', 'Pemerintah Kab. Nias'),
('5212', 'Pemerintah Kab. Toba Samosir'),
('5213', 'Pemerintah Kab. Mandailing Natal'),
('5214', 'Pemerintah Kab. Nias Selatan'),
('5215', 'Pemerintah Kab. Humbang Hasundutan'),
('5216', 'Pemerintah Kab. Pakpak Bharat'),
('5217', 'Pemerintah Kab. Samosir'),
('5218', 'Pemerintah Kab. Serdang Bedagai'),
('5219', 'Pemerintah Kab. Padang Lawas'),
('5220', 'Pemerintah Kab. Padang Lawas Utara'),
('5221', 'Pemerintah Kab. Batubara'),
('5222', 'Pemerintah Kab. Labuhanbatu Selatan'),
('5223', 'Pemerintah Kab. Labuhanbatu Utara'),
('5224', 'Pemerintah Kab. Nias Barat'),
('5225', 'Pemerintah Kab. Nias Utara'),
('5271', 'Pemerintah Kota Medan'),
('5272', 'Pemerintah Kota Tebing Tinggi'),
('5273', 'Pemerintah Kota Binjai'),
('5274', 'Pemerintah Kota Pematangsiantar'),
('5275', 'Pemerintah Kota Tanjungbalai'),
('5276', 'Pemerintah Kota Sibolga'),
('5277', 'Pemerintah Kota Padangsidimpuan'),
('5278', 'Pemerintah Kota Gunung Sitoli'),
('5300', 'Pemerintah Provinsi Riau'),
('5301', 'Pemerintah Kab. Kampar'),
('5302', 'Pemerintah Kab. Bengkalis'),
('5304', 'Pemerintah Kab. Indragiri Hulu'),
('5305', 'Pemerintah Kab. Indragiri Hilir'),
('5306', 'Pemerintah Kab. Pelalawan'),
('5307', 'Pemerintah Kab. Rokan Hulu'),
('5308', 'Pemerintah Kab. Rokan Hilir'),
('5309', 'Pemerintah Kab. Siak'),
('5312', 'Pemerintah Kab. Kuantan Singingi'),
('5313', 'Pemerintah Kab. Kepulauan Meranti'),
('5371', 'Pemerintah Kota Pekanbaru'),
('5373', 'Pemerintah Kota Dumai'),
('5400', 'Pemerintah Provinsi Sumatera Barat'),
('5401', 'Pemerintah Kab. Agam'),
('5402', 'Pemerintah Kab. Pasaman'),
('5403', 'Pemerintah Kab. Limapuluh Kota'),
('5404', 'Pemerintah Kab. Solok'),
('5405', 'Pemerintah Kab. Padang Pariaman'),
('5406', 'Pemerintah Kab. Pesisir Selatan'),
('5407', 'Pemerintah Kab. Tanah Datar'),
('5408', 'Pemerintah Kab. Sijunjung'),
('5409', 'Pemerintah Kab. Kep. Mentawai'),
('5410', 'Pemerintah Kab. Solok Selatan'),
('5411', 'Pemerintah Kab. Dharmasraya'),
('5412', 'Pemerintah Kab. Pasaman Barat'),
('5471', 'Pemerintah Kota Bukittinggi'),
('5472', 'Pemerintah Kota Padang Panjang'),
('5473', 'Pemerintah Kota Sawahlunto'),
('5474', 'Pemerintah Kota Solok'),
('5475', 'Pemerintah Kota Padang'),
('5476', 'Pemerintah Kota Payakumbuh'),
('5477', 'Pemerintah Kota Pariaman'),
('5500', 'Pemerintah Provinsi Jambi'),
('5501', 'Pemerintah Kab. Batang Hari'),
('5502', 'Pemerintah Kab. Tanjung Jabung Barat'),
('5503', 'Pemerintah Kab. Bungo'),
('5504', 'Pemerintah Kab. Merangin'),
('5505', 'Pemerintah Kab. Kerinci'),
('5506', 'Pemerintah Kab. Sarolangun'),
('5507', 'Pemerintah Kab. Tebo'),
('5508', 'Pemerintah Kab. Muaro Jambi'),
('5509', 'Pemerintah Kab. Tanjung Jabung Timur'),
('5571', 'Pemerintah Kota Jambi'),
('5572', 'Pemerintah Kota Sungai Penuh'),
('5600', 'Pemerintah Provinsi Sumatera Selatan'),
('5601', 'Pemerintah Kab. Musi Banyuasin'),
('5602', 'Pemerintah Kab. Ogan Komering Ulu'),
('5603', 'Pemerintah Kab. Muara Enim'),
('5604', 'Pemerintah Kab. Lahat'),
('5605', 'Pemerintah Kab. Musi Rawas'),
('5606', 'Pemerintah Kab. Ogan Komering Ilir'),
('5607', 'Pemerintah Kab. Banyuasin'),
('5608', 'Pemerintah Kab. Ogan Komering Ulu Timur'),
('5609', 'Pemerintah Kab. Ogan Komering Ulu Sel.'),
('5610', 'Pemerintah Kab. Ogan Ilir'),
('5611', 'Pemerintah Kab. Empat Lawang'),
('5612', 'Pemerintah Kab. Musi Rawas Utara'),
('5671', 'Pemerintah Kota Palembang'),
('5672', 'Pemerintah Kota Pagar Alam'),
('5673', 'Pemerintah Kota Lubuk Linggau'),
('5674', 'Pemerintah Kota Prabumulih'),
('5675', 'Pemerintah Kab. Penukal Abab Lematang Ilir'),
('5700', 'Pemerintah Provinsi Kep. Bangka Belitung'),
('5701', 'Pemerintah Kab. Bangka'),
('5702', 'Pemerintah Kab. Belitung'),
('5703', 'Pemerintah Kab. Bangka Barat'),
('5704', 'Pemerintah Kab. Bangka Tengah'),
('5705', 'Pemerintah Kab. Bangka Selatan'),
('5706', 'Pemerintah Kab. Belitung Timur'),
('5771', 'Pemerintah Kota Pangkal Pinang'),
('5800', 'Pemerintah Provinsi Bengkulu'),
('5801', 'Pemerintah Kab. Bengkulu Utara'),
('5802', 'Pemerintah Kab. Bengkulu Selatan'),
('5803', 'Pemerintah Kab. Rejang Lebong'),
('5804', 'Pemerintah Kab. Kaur'),
('5805', 'Pemerintah Kab. Seluma'),
('5806', 'Pemerintah Kab. Mukomuko'),
('5807', 'Pemerintah Kab. Kepahiang'),
('5808', 'Pemerintah Kab. Lebong'),
('5809', 'Pemerintah Kab. Bengkulu Tengah'),
('5871', 'Pemerintah Kota Bengkulu'),
('5900', 'Pemerintah Provinsi Lampung'),
('5901', 'Pemerintah Kab. Lampung Selatan'),
('5902', 'Pemerintah Kab. Lampung Tengah'),
('5903', 'Pemerintah Kab. Lampung Utara'),
('5904', 'Pemerintah Kab. Lampung Barat'),
('5905', 'Pemerintah Kab. Tulang Bawang'),
('5906', 'Pemerintah Kab. Tanggamus'),
('5907', 'Pemerintah Kab. Way Kanan'),
('5908', 'Pemerintah Kab. Lampung Timur'),
('5909', 'Pemerintah Kab. Pesawaran'),
('5910', 'Pemerintah Kab. Tulang Bawang Barat'),
('5911', 'Pemerintah Kab. Pringsewu'),
('5912', 'Pemerintah Kab. Mesuji'),
('5913', 'Pemerintah Kab. Pesisir Barat'),
('5971', 'Pemerintah Kota Metro'),
('5972', 'Pemerintah Kota Bandar Lampung'),
('6000', 'Pemerintah Provinsi Daerah Khusus Ibukota Jakarta'),
('6001', 'Kab. Kepulauan Seribu'),
('6100', 'Pemerintah Provinsi Jawa Barat'),
('6101', 'Pemerintah Kab. Bogor'),
('6102', 'Pemerintah Kab. Sukabumi'),
('6103', 'Pemerintah Kab. Cianjur'),
('6104', 'Pemerintah Kab. Bekasi'),
('6105', 'Pemerintah Kab. Karawang'),
('6106', 'Pemerintah Kab. Purwakarta'),
('6107', 'Pemerintah Kab. Subang'),
('6108', 'Pemerintah Kab. Bandung'),
('6109', 'Pemerintah Kab. Sumedang'),
('6110', 'Pemerintah Kab. Garut'),
('6111', 'Pemerintah Kab. Tasikmalaya'),
('6112', 'Pemerintah Kab. Ciamis'),
('6113', 'Pemerintah Kab. Cirebon'),
('6114', 'Pemerintah Kab. Kuningan'),
('6115', 'Pemerintah Kab. Indramayu'),
('6116', 'Pemerintah Kab. Majalengka'),
('6117', 'Pemerintah Kab. Bandung Barat'),
('6118', 'Pemerintah Kab. Pangandaran'),
('6171', 'Pemerintah Kota Bandung'),
('6172', 'Pemerintah Kota Bogor'),
('6173', 'Pemerintah Kota Sukabumi'),
('6174', 'Pemerintah Kota Cirebon'),
('6175', 'Pemerintah Kota Bekasi'),
('6176', 'Pemerintah Kota Depok'),
('6177', 'Pemerintah Kota Cimahi'),
('6178', 'Pemerintah Kota Tasikmalaya'),
('6179', 'Pemerintah Kota Banjar'),
('6200', 'Pemerintah Provinsi Banten'),
('6201', 'Pemerintah Kab. Serang'),
('6202', 'Pemerintah Kab. Pandeglang'),
('6203', 'Pemerintah Kab. Lebak'),
('6204', 'Pemerintah Kab. Tangerang'),
('6271', 'Pemerintah Kota Tangerang'),
('6272', 'Pemerintah Kota Cilegon'),
('6273', 'Pemerintah Kota Serang'),
('6274', 'Pemerintah Kota Tangerang Selatan'),
('6300', 'Pemerintah Daerah D I Yogyakarta'),
('6301', 'Pemerintah Kab. Bantul'),
('6302', 'Pemerintah Kab. Sleman'),
('6303', 'Pemerintah Kab. Gunung Kidul'),
('6304', 'Pemerintah Kab. Kulon Progo'),
('6371', 'Pemerintah Kota Yogyakarta'),
('6400', 'Pemerintah Provinsi Jawa Tengah'),
('6401', 'Pemerintah Kab. Semarang'),
('6402', 'Pemerintah Kab. Kendal'),
('6403', 'Pemerintah Kab. Demak'),
('6404', 'Pemerintah Kab. Grobogan'),
('6405', 'Pemerintah Kab. Pekalongan'),
('6406', 'Pemerintah Kab. Batang'),
('6407', 'Pemerintah Kab. Tegal'),
('6408', 'Pemerintah Kab. Brebes'),
('6409', 'Pemerintah Kab. Pati'),
('6410', 'Pemerintah Kab. Kudus'),
('6411', 'Pemerintah Kab. Pemalang'),
('6412', 'Pemerintah Kab. Jepara'),
('6413', 'Pemerintah Kab. Rembang'),
('6414', 'Pemerintah Kab. Blora'),
('6415', 'Pemerintah Kab. Banyumas'),
('6416', 'Pemerintah Kab. Cilacap'),
('6417', 'Pemerintah Kab. Purbalingga'),
('6418', 'Pemerintah Kab. Banjarnegara'),
('6419', 'Pemerintah Kab. Magelang'),
('6420', 'Pemerintah Kab. Temanggung'),
('6421', 'Pemerintah Kab. Wonosobo'),
('6422', 'Pemerintah Kab. Purworejo'),
('6423', 'Pemerintah Kab. Kebumen'),
('6424', 'Pemerintah Kab. Klaten'),
('6425', 'Pemerintah Kab. Boyolali'),
('6426', 'Pemerintah Kab. Sragen'),
('6427', 'Pemerintah Kab. Sukoharjo'),
('6428', 'Pemerintah Kab. Karanganyar'),
('6429', 'Pemerintah Kab. Wonogiri'),
('6471', 'Pemerintah Kota Semarang'),
('6472', 'Pemerintah Kota Salatiga'),
('6473', 'Pemerintah Kota Pekalongan'),
('6474', 'Pemerintah Kota Tegal'),
('6475', 'Pemerintah Kota Magelang'),
('6476', 'Pemerintah Kota Surakarta'),
('6500', 'Pemerintah Provinsi Jawa Timur'),
('6501', 'Pemerintah Kab. Gresik'),
('6502', 'Pemerintah Kab. Mojokerto'),
('6503', 'Pemerintah Kab. Sidoarjo'),
('6504', 'Pemerintah Kab. Jombang'),
('6505', 'Pemerintah Kab. Sampang'),
('6506', 'Pemerintah Kab. Pamekasan'),
('6507', 'Pemerintah Kab. Sumenep'),
('6508', 'Pemerintah Kab. Bangkalan'),
('6509', 'Pemerintah Kab. Bondowoso'),
('6510', 'Pemerintah Kab. Situbondo'),
('6511', 'Pemerintah Kab. Banyuwangi'),
('6512', 'Pemerintah Kab. Jember'),
('6513', 'Pemerintah Kab. Malang'),
('6514', 'Pemerintah Kab. Pasuruan'),
('6515', 'Pemerintah Kab. Probolinggo'),
('6516', 'Pemerintah Kab. Lumajang'),
('6517', 'Pemerintah Kab. Kediri'),
('6518', 'Pemerintah Kab. Tulungagung'),
('6519', 'Pemerintah Kab. Nganjuk'),
('6520', 'Pemerintah Kab. Trenggalek'),
('6521', 'Pemerintah Kab. Blitar'),
('6522', 'Pemerintah Kab. Madiun'),
('6523', 'Pemerintah Kab. Ngawi'),
('6524', 'Pemerintah Kab. Magetan'),
('6525', 'Pemerintah Kab. Ponorogo'),
('6526', 'Pemerintah Kab. Pacitan'),
('6527', 'Pemerintah Kab. Bojonegoro'),
('6528', 'Pemerintah Kab. Tuban'),
('6529', 'Pemerintah Kab. Lamongan'),
('6571', 'Pemerintah Kota Surabaya'),
('6572', 'Pemerintah Kota Mojokerto'),
('6573', 'Pemerintah Kota Malang'),
('6574', 'Pemerintah Kota Pasuruan'),
('6575', 'Pemerintah Kota Probolinggo'),
('6576', 'Pemerintah Kota Blitar'),
('6577', 'Pemerintah Kota Kediri'),
('6578', 'Pemerintah Kota Madiun'),
('6579', 'Pemerintah Kota Batu'),
('6600', 'Pemerintah Provinsi Kalimantan Barat'),
('6601', 'Pemerintah Kab. Sambas'),
('6602', 'Pemerintah Kab. Sanggau'),
('6603', 'Pemerintah Kab. Sintang'),
('6604', 'Pemerintah Kab. Mempawah'),
('6605', 'Pemerintah Kab. Kapuas Hulu'),
('6606', 'Pemerintah Kab. Ketapang'),
('6607', 'Pemerintah Kab. Bengkayang'),
('6608', 'Pemerintah Kab. Landak'),
('6609', 'Pemerintah Kab. Melawi'),
('6610', 'Pemerintah Kab. Sekadau'),
('6611', 'Pemerintah Kab. Kubu Raya'),
('6612', 'Pemerintah Kab. Kayong Utara'),
('6671', 'Pemerintah Kota Pontianak'),
('6672', 'Pemerintah Kota Singkawang'),
('6700', 'Pemerintah Provinsi Kalimantan Tengah'),
('6701', 'Pemerintah Kab. Kapuas'),
('6702', 'Pemerintah Kab. Barito Utara'),
('6703', 'Pemerintah Kab. Barito Selatan'),
('6704', 'Pemerintah Kab. Kotawaringin Timur'),
('6705', 'Pemerintah Kab. Kotawaringin Barat'),
('6706', 'Pemerintah Kab. Pulang Pisau'),
('6707', 'Pemerintah Kab. Gunung Mas'),
('6708', 'Pemerintah Kab. Lamandau'),
('6709', 'Pemerintah Kab. Sukamara'),
('6710', 'Pemerintah Kab. Murung Raya'),
('6711', 'Pemerintah Kab. Katingan'),
('6712', 'Pemerintah Kab. Seruyan'),
('6713', 'Pemerintah Kab. Barito Timur'),
('6771', 'Pemerintah Kota Palangka Raya'),
('6800', 'Pemerintah Provinsi Kalimantan Selatan'),
('6801', 'Pemerintah Kab. Banjar'),
('6802', 'Pemerintah Kab. Tanah Laut'),
('6803', 'Pemerintah Kab. Tapin'),
('6804', 'Pemerintah Kab. Hulu Sungai Selatan'),
('6805', 'Pemerintah Kab. Hulu Sungai Tengah'),
('6806', 'Pemerintah Kab. Barito Kuala'),
('6807', 'Pemerintah Kab. Tabalong'),
('6808', 'Pemerintah Kab. Kotabaru'),
('6809', 'Pemerintah Kab. Hulu Sungai Utara'),
('6810', 'Pemerintah Kab. Tanah Bumbu'),
('6811', 'Pemerintah Kab. Balangan'),
('6871', 'Pemerintah Kota Banjarmasin'),
('6872', 'Pemerintah Kota Banjarbaru'),
('6900', 'Pemerintah Provinsi Kalimantan Timur'),
('6901', 'Pemerintah Kab. Kutai Kartanegara'),
('6902', 'Pemerintah Kab. Paser'),
('6904', 'Pemerintah Kab. Berau'),
('6907', 'Pemerintah Kab. Kutai Barat'),
('6908', 'Pemerintah Kab. Kutai Timur'),
('6910', 'Pemerintah Kab. Penajam Paser Utara'),
('6912', 'Pemerintah Kab. Mahakam Ulu'),
('6971', 'Pemerintah Kota Samarinda'),
('6972', 'Pemerintah Kota Balikpapan'),
('6973', 'Pemerintah Kota Bontang'),
('7000', 'Pemerintah Provinsi Sulawesi Utara'),
('7001', 'Pemerintah Kab. Minahasa'),
('7002', 'Pemerintah Kab. Bolaang Mongondow'),
('7003', 'Pemerintah Kab. Kepulauan Sangihe'),
('7004', 'Pemerintah Kab. Minahasa Selatan'),
('7005', 'Pemerintah Kab. Kepulauan Talaud'),
('7006', 'Pemerintah Kab. Minahasa Utara'),
('7007', 'Pemerintah Kab. Bolaang Mongondow Utara'),
('7008', 'Pemerintah Kab. Siau Tagulandang Biaro'),
('7009', 'Pemerintah Kab. Minahasa Tenggara'),
('7012', 'Pemerintah Kab. Bolaang Mongondow Selatan'),
('7013', 'Pemerintah Kab. Bolaang Mongondow Timur'),
('7071', 'Pemerintah Kota Manado'),
('7072', 'Pemerintah Kota Bitung'),
('7073', 'Pemerintah Kota Tomohon'),
('7074', 'Pemerintah Kota KotaMobagu'),
('7100', 'Pemerintah Provinsi Gorontalo'),
('7101', 'Pemerintah Kab. Gorontalo'),
('7102', 'Pemerintah Kab. Boalemo'),
('7103', 'Pemerintah Kab. Pohuwato'),
('7104', 'Pemerintah Kab. Bone Bolango'),
('7105', 'Pemerintah Kab. Gorontalo Utara'),
('7171', 'Pemerintah Kota Gorontalo'),
('7200', 'Pemerintah Provinsi Sulawesi Tengah'),
('7201', 'Pemerintah Kab. Poso'),
('7202', 'Pemerintah Kab. Donggala'),
('7203', 'Pemerintah Kab. Tolitoli'),
('7204', 'Pemerintah Kab. Banggai'),
('7205', 'Pemerintah Kab. Buol'),
('7206', 'Pemerintah Kab. Morowali'),
('7207', 'Pemerintah Kab. Banggai Kepulauan'),
('7208', 'Pemerintah Kab. Parigi Moutong'),
('7209', 'Pemerintah Kab. Tojo Una Una'),
('7210', 'Pemerintah Kab. Sigi'),
('7211', 'Pemerintah Kab. Banggai Laut'),
('7212', 'Pemerintah Kab. Morowali Utara'),
('7271', 'Pemerintah Kota Palu'),
('7300', 'Pemerintah Provinsi Sulawesi Selatan'),
('7301', 'Pemerintah Kab. Pinrang'),
('7302', 'Pemerintah Kab. Gowa'),
('7303', 'Pemerintah Kab. Wajo'),
('7305', 'Pemerintah Kab. Bone'),
('7306', 'Pemerintah Kab. Tana Toraja'),
('7307', 'Pemerintah Kab. Maros'),
('7309', 'Pemerintah Kab. Luwu'),
('7310', 'Pemerintah Kab. Sinjai'),
('7311', 'Pemerintah Kab. Bulukumba'),
('7312', 'Pemerintah Kab. Bantaeng'),
('7313', 'Pemerintah Kab. Jeneponto'),
('7314', 'Pemerintah Kab. Kepulauan Selayar'),
('7315', 'Pemerintah Kab. Takalar'),
('7316', 'Pemerintah Kab. Barru'),
('7317', 'Pemerintah Kab. Sidenreng Rappang'),
('7318', 'Pemerintah Kab. Pangkajene dan Kepulauan'),
('7319', 'Pemerintah Kab. Soppeng'),
('7321', 'Pemerintah Kab. Enrekang'),
('7322', 'Pemerintah Kab. Luwu Utara'),
('7325', 'Pemerintah Kab. Luwu Timur'),
('7326', 'Pemerintah Kab. Toraja Utara'),
('7371', 'Pemerintah Kota Makassar'),
('7372', 'Pemerintah Kota Parepare'),
('7373', 'Pemerintah Kota Palopo'),
('7400', 'Pemerintah Provinsi Sulawesi Tenggara'),
('7401', 'Pemerintah Kab. Konawe'),
('7402', 'Pemerintah Kab. Buton'),
('7403', 'Pemerintah Kab. Muna'),
('7404', 'Pemerintah Kab. Kolaka'),
('7405', 'Pemerintah Kab. Konawe Selatan'),
('7406', 'Pemerintah Kab. Kolaka Utara'),
('7407', 'Pemerintah Kab. Bombana'),
('7408', 'Pemerintah Kab. Wakatobi'),
('7410', 'Pemerintah Kab. Buton Utara'),
('7411', 'Pemerintah Kab. Konawe Utara'),
('7412', 'Pemerintah Kab. Kolaka Timur'),
('7413', 'Pemerintah Kab. Konawe Kepulauan'),
('7414', 'Pemerintah Kab. Buton Selatan'),
('7415', 'Pemerintah Kab. Buton Tengah'),
('7416', 'Pemerintah Kab. Muna Barat'),
('7471', 'Pemerintah Kota Kendari'),
('7472', 'Pemerintah Kota Baubau'),
('7500', 'Pemerintah Provinsi Bali'),
('7501', 'Pemerintah Kab. Buleleng'),
('7502', 'Pemerintah Kab. Jembrana'),
('7503', 'Pemerintah Kab. Klungkung'),
('7504', 'Pemerintah Kab. Gianyar'),
('7505', 'Pemerintah Kab. Karangasem'),
('7506', 'Pemerintah Kab. Bangli'),
('7507', 'Pemerintah Kab. Badung'),
('7508', 'Pemerintah Kab. Tabanan'),
('7571', 'Pemerintah Kota Denpasar'),
('7600', 'Pemerintah Provinsi NTB'),
('7601', 'Pemerintah Kab. Lombok Barat'),
('7602', 'Pemerintah Kab. Lombok Tengah'),
('7603', 'Pemerintah Kab. Lombok Timur'),
('7604', 'Pemerintah Kab. Bima'),
('7605', 'Pemerintah Kab. Sumbawa'),
('7606', 'Pemerintah Kab. Dompu'),
('7607', 'Pemerintah Kab. Sumbawa Barat'),
('7608', 'Pemerintah Kab. Lombok Utara'),
('7671', 'Pemerintah Kota Mataram'),
('7672', 'Pemerintah Kota Bima'),
('7700', 'Pemerintah Provinsi NTT'),
('7701', 'Pemerintah Kab. Kupang'),
('7702', 'Pemerintah Kab. Belu'),
('7703', 'Pemerintah Kab. Timor Tengah Utara'),
('7704', 'Pemerintah Kab. Timor Tengah Selatan'),
('7705', 'Pemerintah Kab. Alor'),
('7706', 'Pemerintah Kab. Sikka'),
('7707', 'Pemerintah Kab. Flores Timur'),
('7708', 'Pemerintah Kab. Ende'),
('7709', 'Pemerintah Kab. Ngada'),
('7710', 'Pemerintah Kab. Manggarai'),
('7711', 'Pemerintah Kab. Sumba Timur'),
('7712', 'Pemerintah Kab. Sumba Barat'),
('7713', 'Pemerintah Kab. Lembata'),
('7714', 'Pemerintah Kab. Rote Ndao'),
('7715', 'Pemerintah Kab. Manggarai Barat'),
('7716', 'Pemerintah Kab. Manggarai Timur'),
('7717', 'Pemerintah Kab. Sumba Barat Daya'),
('7718', 'Pemerintah Kab. Nagekeo'),
('7719', 'Pemerintah Kab. Sumba Tengah'),
('7720', 'Pemerintah Kab. Sabu Raijua'),
('7721', 'Pemerintah Kab. Malaka'),
('7771', 'Pemerintah Kota Kupang'),
('7800', 'Pemerintah Provinsi Maluku'),
('7801', 'Pemerintah Kab. Maluku Tengah'),
('7802', 'Pemerintah Kab. Maluku Tenggara'),
('7803', 'Pemerintah Kab. Buru'),
('7804', 'Pemerintah Kab. Maluku Tenggara Barat'),
('7805', 'Pemerintah Kab. Kepulauan Aru'),
('7806', 'Pemerintah Kab. Seram Bagian Barat'),
('7807', 'Pemerintah Kab. Seram Bagian Timur'),
('7808', 'Pemerintah Kab. Buru Selatan'),
('7809', 'Pemerintah Kab. Maluku Barat Daya'),
('7871', 'Pemerintah Kota Ambon'),
('7872', 'Pemerintah Kota Tual'),
('7900', 'Pemerintah Provinsi Maluku Utara'),
('7901', 'Pemerintah Kab. Halmahera Barat'),
('7902', 'Pemerintah Kab. Halmahera Tengah'),
('7903', 'Pemerintah Kab. Kepulauan Sula'),
('7904', 'Pemerintah Kab. Halmahera Selatan'),
('7905', 'Pemerintah Kab. Halmahera Utara'),
('7906', 'Pemerintah Kab. Halmahera Timur'),
('7907', 'Pemerintah Kab. Pulau Morotai'),
('7908', 'Pemerintah Kab. Pulau Taliabu'),
('7971', 'Pemerintah Kota Ternate'),
('7972', 'Pemerintah Kota Tidore Kepulauan'),
('8000', 'Pemerintah Provinsi Papua'),
('8001', 'Pemerintah Kab. Jayapura'),
('8002', 'Pemerintah Kab. Biak Numfor'),
('8004', 'Pemerintah Kab. Kepulauan Yapen '),
('8007', 'Pemerintah Kab. Merauke'),
('8008', 'Pemerintah Kab. Jayawijaya'),
('8009', 'Pemerintah Kab. Nabire'),
('8010', 'Pemerintah Kab. Puncak Jaya'),
('8011', 'Pemerintah Kab. Paniai'),
('8012', 'Pemerintah Kab. Mimika'),
('8013', 'Pemerintah Kab. Boven Digoel'),
('8014', 'Pemerintah Kab. Mappi'),
('8015', 'Pemerintah Kab. Asmat'),
('8016', 'Pemerintah Kab. Yahukimo'),
('8017', 'Pemerintah Kab. Pegunungan Bintang'),
('8018', 'Pemerintah Kab. Tolikara'),
('8019', 'Pemerintah Kab. Sarmi'),
('8020', 'Pemerintah Kab. Keerom'),
('8026', 'Pemerintah Kab. Waropen'),
('8027', 'Pemerintah Kab. Supiori'),
('8028', 'Pemerintah Kab. Mamberamo Raya'),
('8029', 'Pemerintah Kab. Mamberamo Tengah'),
('8030', 'Pemerintah Kab. Lanny Jaya'),
('8031', 'Pemerintah Kab. Yalimo'),
('8032', 'Pemerintah Kab. Nduga'),
('8033', 'Pemerintah Kab. Dogiyai'),
('8035', 'Pemerintah Kab. Puncak'),
('8036', 'Pemerintah Kab. Deiyai'),
('8037', 'Pemerintah Kab. Intan Jaya'),
('8072', 'Pemerintah Kota Jayapura'),
('8100', 'Pemerintah Provinsi Kepulauan Riau'),
('8101', 'Pemerintah Kab. Bintan'),
('8102', 'Pemerintah Kab. Karimun'),
('8103', 'Pemerintah Kab. Natuna'),
('8104', 'Pemerintah Kab. Lingga'),
('8105', 'Pemerintah Kab. Kepulauan Anambas'),
('8171', 'Pemerintah Kota Batam'),
('8172', 'Pemerintah Kota Tanjungpinang'),
('8200', 'Pemerintah Provinsi Papua Barat'),
('8201', 'Pemerintah Kab. Sorong'),
('8202', 'Pemerintah Kab. Sorong Selatan'),
('8203', 'Pemerintah Kab. Raja Ampat'),
('8204', 'Pemerintah Kab. Manokwari'),
('8205', 'Pemerintah Kab. Teluk Bintuni'),
('8206', 'Pemerintah Kab. Teluk Wondama'),
('8207', 'Pemerintah Kab. Fak-Fak'),
('8208', 'Pemerintah Kab. Kaimana'),
('8210', 'Pemerintah Kab. Tambrauw'),
('8211', 'Pemerintah Kab. Maybrat'),
('8212', 'Pemerintah Kab. Pegunungan Arfak'),
('8213', 'Pemerintah Kab. Manokwari Selatan'),
('8271', 'Pemerintah Kota Sorong'),
('8300', 'Pemerintah Provinsi Sulawesi Barat'),
('8301', 'Pemerintah Kab. Mamuju Utara'),
('8302', 'Pemerintah Kab. Mamuju'),
('8303', 'Pemerintah Kab. Mamasa'),
('8304', 'Pemerintah Kab. Polewali Mandar'),
('8305', 'Pemerintah Kab. Majene'),
('8306', 'Pemerintah Kab. Mamuju Tengah'),
('8400', 'Pemerintah Provinsi Kalimantan Utara'),
('8401', 'Pemerintah Kab. Bulungan'),
('8402', 'Pemerintah Kab. Malinau'),
('8403', 'Pemerintah Kab. Nunukan'),
('8404', 'Pemerintah Kab. Tana Tidung'),
('8471', 'Pemerintah Kota Tarakan'),
('8810', 'BUMN'),
('8820', 'BUMD'),
('8830', 'SWASTA'),
('9910', 'Luar Negeri'),
('9999', 'Lain-Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengadilan`
--

CREATE TABLE IF NOT EXISTS `jenis_pengadilan` (
`kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `jenis_pengadilan`
--

INSERT INTO `jenis_pengadilan` (`kode`, `nama`) VALUES
(1, 'Pengadilan Negeri'),
(2, 'PTUN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kab_kota`
--

CREATE TABLE IF NOT EXISTS `kab_kota` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kab_kota`
--

INSERT INTO `kab_kota` (`kode`, `nama`) VALUES
('5101', 'Pemerintah Kab. Aceh Besar'),
('5102', 'Pemerintah Kab. Pidie'),
('5103', 'Pemerintah Kab. Aceh Utara'),
('5104', 'Pemerintah Kab. Aceh Timur'),
('5105', 'Pemerintah Kab. Aceh Selatan'),
('5106', 'Pemerintah Kab. Aceh Barat'),
('5107', 'Pemerintah Kab. Aceh Tengah'),
('5108', 'Pemerintah Kab. Aceh Tenggara'),
('5109', 'Pemerintah Kab. Simeulue'),
('5110', 'Pemerintah Kab. Bireuen'),
('5111', 'Pemerintah Kab. Aceh Singkil'),
('5112', 'Pemerintah Kab. Aceh Barat Daya'),
('5113', 'Pemerintah Kab. Gayo Lues'),
('5114', 'Pemerintah Kab. Aceh Tamiang'),
('5115', 'Pemerintah Kab. Nagan Raya'),
('5116', 'Pemerintah Kab. Aceh Jaya'),
('5117', 'Pemerintah Kab. Bener Meriah'),
('5118', 'Pemerintah Kab. Pidie Jaya'),
('5171', 'Pemerintah Kota Sabang'),
('5172', 'Pemerintah Kota Banda Aceh'),
('5173', 'Pemerintah Kota Langsa'),
('5174', 'Pemerintah Kota Lhokseumawe'),
('5175', 'Pemerintah Kota Subulussalam'),
('5201', 'Pemerintah Kab. Deli Serdang'),
('5202', 'Pemerintah Kab. Karo'),
('5203', 'Pemerintah Kab. Langkat'),
('5204', 'Pemerintah Kab. Tapanuli Tengah'),
('5205', 'Pemerintah Kab. Simalungun'),
('5206', 'Pemerintah Kab. Labuhanbatu'),
('5207', 'Pemerintah Kab. Dairi'),
('5208', 'Pemerintah Kab. Tapanuli Utara'),
('5209', 'Pemerintah Kab. Tapanuli Selatan'),
('5210', 'Pemerintah Kab. Asahan'),
('5211', 'Pemerintah Kab. Nias'),
('5212', 'Pemerintah Kab. Toba Samosir'),
('5213', 'Pemerintah Kab. Mandailing Natal'),
('5214', 'Pemerintah Kab. Nias Selatan'),
('5215', 'Pemerintah Kab. Humbang Hasundutan'),
('5216', 'Pemerintah Kab. Pakpak Bharat'),
('5217', 'Pemerintah Kab. Samosir'),
('5218', 'Pemerintah Kab. Serdang Bedagai'),
('5219', 'Pemerintah Kab. Padang Lawas'),
('5220', 'Pemerintah Kab. Padang Lawas Utara'),
('5221', 'Pemerintah Kab. Batubara'),
('5222', 'Pemerintah Kab. Labuhanbatu Selatan'),
('5223', 'Pemerintah Kab. Labuhanbatu Utara'),
('5224', 'Pemerintah Kab. Nias Barat'),
('5225', 'Pemerintah Kab. Nias Utara'),
('5271', 'Pemerintah Kota Medan'),
('5272', 'Pemerintah Kota Tebing Tinggi'),
('5273', 'Pemerintah Kota Binjai'),
('5274', 'Pemerintah Kota Pematangsiantar'),
('5275', 'Pemerintah Kota Tanjungbalai'),
('5276', 'Pemerintah Kota Sibolga'),
('5277', 'Pemerintah Kota Padangsidimpuan'),
('5278', 'Pemerintah Kota Gunung Sitoli'),
('5301', 'Pemerintah Kab. Kampar'),
('5302', 'Pemerintah Kab. Bengkalis'),
('5304', 'Pemerintah Kab. Indragiri Hulu'),
('5305', 'Pemerintah Kab. Indragiri Hilir'),
('5306', 'Pemerintah Kab. Pelalawan'),
('5307', 'Pemerintah Kab. Rokan Hulu'),
('5308', 'Pemerintah Kab. Rokan Hilir'),
('5309', 'Pemerintah Kab. Siak'),
('5312', 'Pemerintah Kab. Kuantan Singingi'),
('5313', 'Pemerintah Kab. Kepulauan Meranti'),
('5371', 'Pemerintah Kota Pekanbaru'),
('5373', 'Pemerintah Kota Dumai'),
('5401', 'Pemerintah Kab. Agam'),
('5402', 'Pemerintah Kab. Pasaman'),
('5403', 'Pemerintah Kab. Limapuluh Kota'),
('5404', 'Pemerintah Kab. Solok'),
('5405', 'Pemerintah Kab. Padang Pariaman'),
('5406', 'Pemerintah Kab. Pesisir Selatan'),
('5407', 'Pemerintah Kab. Tanah Datar'),
('5408', 'Pemerintah Kab. Sijunjung'),
('5409', 'Pemerintah Kab. Kep. Mentawai'),
('5410', 'Pemerintah Kab. Solok Selatan'),
('5411', 'Pemerintah Kab. Dharmasraya'),
('5412', 'Pemerintah Kab. Pasaman Barat'),
('5471', 'Pemerintah Kota Bukittinggi'),
('5472', 'Pemerintah Kota Padang Panjang'),
('5473', 'Pemerintah Kota Sawahlunto'),
('5474', 'Pemerintah Kota Solok'),
('5475', 'Pemerintah Kota Padang'),
('5476', 'Pemerintah Kota Payakumbuh'),
('5477', 'Pemerintah Kota Pariaman'),
('5501', 'Pemerintah Kab. Batang Hari'),
('5502', 'Pemerintah Kab. Tanjung Jabung Barat'),
('5503', 'Pemerintah Kab. Bungo'),
('5504', 'Pemerintah Kab. Merangin'),
('5505', 'Pemerintah Kab. Kerinci'),
('5506', 'Pemerintah Kab. Sarolangun'),
('5507', 'Pemerintah Kab. Tebo'),
('5508', 'Pemerintah Kab. Muaro Jambi'),
('5509', 'Pemerintah Kab. Tanjung Jabung Timur'),
('5571', 'Pemerintah Kota Jambi'),
('5572', 'Pemerintah Kota Sungai Penuh'),
('5601', 'Pemerintah Kab. Musi Banyuasin'),
('5602', 'Pemerintah Kab. Ogan Komering Ulu'),
('5603', 'Pemerintah Kab. Muara Enim'),
('5604', 'Pemerintah Kab. Lahat'),
('5605', 'Pemerintah Kab. Musi Rawas'),
('5606', 'Pemerintah Kab. Ogan Komering Ilir'),
('5607', 'Pemerintah Kab. Banyuasin'),
('5608', 'Pemerintah Kab. Ogan Komering Ulu Timur'),
('5609', 'Pemerintah Kab. Ogan Komering Ulu Sel.'),
('5610', 'Pemerintah Kab. Ogan Ilir'),
('5611', 'Pemerintah Kab. Empat Lawang'),
('5612', 'Pemerintah Kab. Musi Rawas Utara'),
('5671', 'Pemerintah Kota Palembang'),
('5672', 'Pemerintah Kota Pagar Alam'),
('5673', 'Pemerintah Kota Lubuk Linggau'),
('5674', 'Pemerintah Kota Prabumulih'),
('5675', 'Pemerintah Kab. Penukal Abab Lematang Ilir'),
('5701', 'Pemerintah Kab. Bangka'),
('5702', 'Pemerintah Kab. Belitung'),
('5703', 'Pemerintah Kab. Bangka Barat'),
('5704', 'Pemerintah Kab. Bangka Tengah'),
('5705', 'Pemerintah Kab. Bangka Selatan'),
('5706', 'Pemerintah Kab. Belitung Timur'),
('5771', 'Pemerintah Kota Pangkal Pinang'),
('5801', 'Pemerintah Kab. Bengkulu Utara'),
('5802', 'Pemerintah Kab. Bengkulu Selatan'),
('5803', 'Pemerintah Kab. Rejang Lebong'),
('5804', 'Pemerintah Kab. Kaur'),
('5805', 'Pemerintah Kab. Seluma'),
('5806', 'Pemerintah Kab. Mukomuko'),
('5807', 'Pemerintah Kab. Kepahiang'),
('5808', 'Pemerintah Kab. Lebong'),
('5809', 'Pemerintah Kab. Bengkulu Tengah'),
('5871', 'Pemerintah Kota Bengkulu'),
('5901', 'Pemerintah Kab. Lampung Selatan'),
('5902', 'Pemerintah Kab. Lampung Tengah'),
('5903', 'Pemerintah Kab. Lampung Utara'),
('5904', 'Pemerintah Kab. Lampung Barat'),
('5905', 'Pemerintah Kab. Tulang Bawang'),
('5906', 'Pemerintah Kab. Tanggamus'),
('5907', 'Pemerintah Kab. Way Kanan'),
('5908', 'Pemerintah Kab. Lampung Timur'),
('5909', 'Pemerintah Kab. Pesawaran'),
('5910', 'Pemerintah Kab. Tulang Bawang Barat'),
('5911', 'Pemerintah Kab. Pringsewu'),
('5912', 'Pemerintah Kab. Mesuji'),
('5913', 'Pemerintah Kab. Pesisir Barat'),
('5971', 'Pemerintah Kota Metro'),
('5972', 'Pemerintah Kota Bandar Lampung'),
('6001', 'Kab. Kepulauan Seribu'),
('6101', 'Pemerintah Kab. Bogor'),
('6102', 'Pemerintah Kab. Sukabumi'),
('6103', 'Pemerintah Kab. Cianjur'),
('6104', 'Pemerintah Kab. Bekasi'),
('6105', 'Pemerintah Kab. Karawang'),
('6106', 'Pemerintah Kab. Purwakarta'),
('6107', 'Pemerintah Kab. Subang'),
('6108', 'Pemerintah Kab. Bandung'),
('6109', 'Pemerintah Kab. Sumedang'),
('6110', 'Pemerintah Kab. Garut'),
('6111', 'Pemerintah Kab. Tasikmalaya'),
('6112', 'Pemerintah Kab. Ciamis'),
('6113', 'Pemerintah Kab. Cirebon'),
('6114', 'Pemerintah Kab. Kuningan'),
('6115', 'Pemerintah Kab. Indramayu'),
('6116', 'Pemerintah Kab. Majalengka'),
('6117', 'Pemerintah Kab. Bandung Barat'),
('6118', 'Pemerintah Kab. Pangandaran'),
('6171', 'Pemerintah Kota Bandung'),
('6172', 'Pemerintah Kota Bogor'),
('6173', 'Pemerintah Kota Sukabumi'),
('6174', 'Pemerintah Kota Cirebon'),
('6175', 'Pemerintah Kota Bekasi'),
('6176', 'Pemerintah Kota Depok'),
('6177', 'Pemerintah Kota Cimahi'),
('6178', 'Pemerintah Kota Tasikmalaya'),
('6179', 'Pemerintah Kota Banjar'),
('6201', 'Pemerintah Kab. Serang'),
('6202', 'Pemerintah Kab. Pandeglang'),
('6203', 'Pemerintah Kab. Lebak'),
('6204', 'Pemerintah Kab. Tangerang'),
('6271', 'Pemerintah Kota Tangerang'),
('6272', 'Pemerintah Kota Cilegon'),
('6273', 'Pemerintah Kota Serang'),
('6274', 'Pemerintah Kota Tangerang Selatan'),
('6301', 'Pemerintah Kab. Bantul'),
('6302', 'Pemerintah Kab. Sleman'),
('6303', 'Pemerintah Kab. Gunung Kidul'),
('6304', 'Pemerintah Kab. Kulon Progo'),
('6371', 'Pemerintah Kota Yogyakarta'),
('6401', 'Pemerintah Kab. Semarang'),
('6402', 'Pemerintah Kab. Kendal'),
('6403', 'Pemerintah Kab. Demak'),
('6404', 'Pemerintah Kab. Grobogan'),
('6405', 'Pemerintah Kab. Pekalongan'),
('6406', 'Pemerintah Kab. Batang'),
('6407', 'Pemerintah Kab. Tegal'),
('6408', 'Pemerintah Kab. Brebes'),
('6409', 'Pemerintah Kab. Pati'),
('6410', 'Pemerintah Kab. Kudus'),
('6411', 'Pemerintah Kab. Pemalang'),
('6412', 'Pemerintah Kab. Jepara'),
('6413', 'Pemerintah Kab. Rembang'),
('6414', 'Pemerintah Kab. Blora'),
('6415', 'Pemerintah Kab. Banyumas'),
('6416', 'Pemerintah Kab. Cilacap'),
('6417', 'Pemerintah Kab. Purbalingga'),
('6418', 'Pemerintah Kab. Banjarnegara'),
('6419', 'Pemerintah Kab. Magelang'),
('6420', 'Pemerintah Kab. Temanggung'),
('6421', 'Pemerintah Kab. Wonosobo'),
('6422', 'Pemerintah Kab. Purworejo'),
('6423', 'Pemerintah Kab. Kebumen'),
('6424', 'Pemerintah Kab. Klaten'),
('6425', 'Pemerintah Kab. Boyolali'),
('6426', 'Pemerintah Kab. Sragen'),
('6427', 'Pemerintah Kab. Sukoharjo'),
('6428', 'Pemerintah Kab. Karanganyar'),
('6429', 'Pemerintah Kab. Wonogiri'),
('6471', 'Pemerintah Kota Semarang'),
('6472', 'Pemerintah Kota Salatiga'),
('6473', 'Pemerintah Kota Pekalongan'),
('6474', 'Pemerintah Kota Tegal'),
('6475', 'Pemerintah Kota Magelang'),
('6476', 'Pemerintah Kota Surakarta'),
('6501', 'Pemerintah Kab. Gresik'),
('6502', 'Pemerintah Kab. Mojokerto'),
('6503', 'Pemerintah Kab. Sidoarjo'),
('6504', 'Pemerintah Kab. Jombang'),
('6505', 'Pemerintah Kab. Sampang'),
('6506', 'Pemerintah Kab. Pamekasan'),
('6507', 'Pemerintah Kab. Sumenep'),
('6508', 'Pemerintah Kab. Bangkalan'),
('6509', 'Pemerintah Kab. Bondowoso'),
('6510', 'Pemerintah Kab. Situbondo'),
('6511', 'Pemerintah Kab. Banyuwangi'),
('6512', 'Pemerintah Kab. Jember'),
('6513', 'Pemerintah Kab. Malang'),
('6514', 'Pemerintah Kab. Pasuruan'),
('6515', 'Pemerintah Kab. Probolinggo'),
('6516', 'Pemerintah Kab. Lumajang'),
('6517', 'Pemerintah Kab. Kediri'),
('6518', 'Pemerintah Kab. Tulungagung'),
('6519', 'Pemerintah Kab. Nganjuk'),
('6520', 'Pemerintah Kab. Trenggalek'),
('6521', 'Pemerintah Kab. Blitar'),
('6522', 'Pemerintah Kab. Madiun'),
('6523', 'Pemerintah Kab. Ngawi'),
('6524', 'Pemerintah Kab. Magetan'),
('6525', 'Pemerintah Kab. Ponorogo'),
('6526', 'Pemerintah Kab. Pacitan'),
('6527', 'Pemerintah Kab. Bojonegoro'),
('6528', 'Pemerintah Kab. Tuban'),
('6529', 'Pemerintah Kab. Lamongan'),
('6571', 'Pemerintah Kota Surabaya'),
('6572', 'Pemerintah Kota Mojokerto'),
('6573', 'Pemerintah Kota Malang'),
('6574', 'Pemerintah Kota Pasuruan'),
('6575', 'Pemerintah Kota Probolinggo'),
('6576', 'Pemerintah Kota Blitar'),
('6577', 'Pemerintah Kota Kediri'),
('6578', 'Pemerintah Kota Madiun'),
('6579', 'Pemerintah Kota Batu'),
('6601', 'Pemerintah Kab. Sambas'),
('6602', 'Pemerintah Kab. Sanggau'),
('6603', 'Pemerintah Kab. Sintang'),
('6604', 'Pemerintah Kab. Mempawah'),
('6605', 'Pemerintah Kab. Kapuas Hulu'),
('6606', 'Pemerintah Kab. Ketapang'),
('6607', 'Pemerintah Kab. Bengkayang'),
('6608', 'Pemerintah Kab. Landak'),
('6609', 'Pemerintah Kab. Melawi'),
('6610', 'Pemerintah Kab. Sekadau'),
('6611', 'Pemerintah Kab. Kubu Raya'),
('6612', 'Pemerintah Kab. Kayong Utara'),
('6671', 'Pemerintah Kota Pontianak'),
('6672', 'Pemerintah Kota Singkawang'),
('6701', 'Pemerintah Kab. Kapuas'),
('6702', 'Pemerintah Kab. Barito Utara'),
('6703', 'Pemerintah Kab. Barito Selatan'),
('6704', 'Pemerintah Kab. Kotawaringin Timur'),
('6705', 'Pemerintah Kab. Kotawaringin Barat'),
('6706', 'Pemerintah Kab. Pulang Pisau'),
('6707', 'Pemerintah Kab. Gunung Mas'),
('6708', 'Pemerintah Kab. Lamandau'),
('6709', 'Pemerintah Kab. Sukamara'),
('6710', 'Pemerintah Kab. Murung Raya'),
('6711', 'Pemerintah Kab. Katingan'),
('6712', 'Pemerintah Kab. Seruyan'),
('6713', 'Pemerintah Kab. Barito Timur'),
('6771', 'Pemerintah Kota Palangka Raya'),
('6801', 'Pemerintah Kab. Banjar'),
('6802', 'Pemerintah Kab. Tanah Laut'),
('6803', 'Pemerintah Kab. Tapin'),
('6804', 'Pemerintah Kab. Hulu Sungai Selatan'),
('6805', 'Pemerintah Kab. Hulu Sungai Tengah'),
('6806', 'Pemerintah Kab. Barito Kuala'),
('6807', 'Pemerintah Kab. Tabalong'),
('6808', 'Pemerintah Kab. Kotabaru'),
('6809', 'Pemerintah Kab. Hulu Sungai Utara'),
('6810', 'Pemerintah Kab. Tanah Bumbu'),
('6811', 'Pemerintah Kab. Balangan'),
('6871', 'Pemerintah Kota Banjarmasin'),
('6872', 'Pemerintah Kota Banjarbaru'),
('6901', 'Pemerintah Kab. Kutai Kartanegara'),
('6902', 'Pemerintah Kab. Paser'),
('6904', 'Pemerintah Kab. Berau'),
('6907', 'Pemerintah Kab. Kutai Barat'),
('6908', 'Pemerintah Kab. Kutai Timur'),
('6910', 'Pemerintah Kab. Penajam Paser Utara'),
('6912', 'Pemerintah Kab. Mahakam Ulu'),
('6971', 'Pemerintah Kota Samarinda'),
('6972', 'Pemerintah Kota Balikpapan'),
('6973', 'Pemerintah Kota Bontang'),
('7001', 'Pemerintah Kab. Minahasa'),
('7002', 'Pemerintah Kab. Bolaang Mongondow'),
('7003', 'Pemerintah Kab. Kepulauan Sangihe'),
('7004', 'Pemerintah Kab. Minahasa Selatan'),
('7005', 'Pemerintah Kab. Kepulauan Talaud'),
('7006', 'Pemerintah Kab. Minahasa Utara'),
('7007', 'Pemerintah Kab. Bolaang Mongondow Utara'),
('7008', 'Pemerintah Kab. Siau Tagulandang Biaro'),
('7009', 'Pemerintah Kab. Minahasa Tenggara'),
('7012', 'Pemerintah Kab. Bolaang Mongondow Selatan'),
('7013', 'Pemerintah Kab. Bolaang Mongondow Timur'),
('7071', 'Pemerintah Kota Manado'),
('7072', 'Pemerintah Kota Bitung'),
('7073', 'Pemerintah Kota Tomohon'),
('7074', 'Pemerintah Kota KotaMobagu'),
('7101', 'Pemerintah Kab. Gorontalo'),
('7102', 'Pemerintah Kab. Boalemo'),
('7103', 'Pemerintah Kab. Pohuwato'),
('7104', 'Pemerintah Kab. Bone Bolango'),
('7105', 'Pemerintah Kab. Gorontalo Utara'),
('7171', 'Pemerintah Kota Gorontalo'),
('7201', 'Pemerintah Kab. Poso'),
('7202', 'Pemerintah Kab. Donggala'),
('7203', 'Pemerintah Kab. Tolitoli'),
('7204', 'Pemerintah Kab. Banggai'),
('7205', 'Pemerintah Kab. Buol'),
('7206', 'Pemerintah Kab. Morowali'),
('7207', 'Pemerintah Kab. Banggai Kepulauan'),
('7208', 'Pemerintah Kab. Parigi Moutong'),
('7209', 'Pemerintah Kab. Tojo Una Una'),
('7210', 'Pemerintah Kab. Sigi'),
('7211', 'Pemerintah Kab. Banggai Laut'),
('7212', 'Pemerintah Kab. Morowali Utara'),
('7271', 'Pemerintah Kota Palu'),
('7301', 'Pemerintah Kab. Pinrang'),
('7302', 'Pemerintah Kab. Gowa'),
('7303', 'Pemerintah Kab. Wajo'),
('7305', 'Pemerintah Kab. Bone'),
('7306', 'Pemerintah Kab. Tana Toraja'),
('7307', 'Pemerintah Kab. Maros'),
('7309', 'Pemerintah Kab. Luwu'),
('7310', 'Pemerintah Kab. Sinjai'),
('7311', 'Pemerintah Kab. Bulukumba'),
('7312', 'Pemerintah Kab. Bantaeng'),
('7313', 'Pemerintah Kab. Jeneponto'),
('7314', 'Pemerintah Kab. Kepulauan Selayar'),
('7315', 'Pemerintah Kab. Takalar'),
('7316', 'Pemerintah Kab. Barru'),
('7317', 'Pemerintah Kab. Sidenreng Rappang'),
('7318', 'Pemerintah Kab. Pangkajene dan Kepulauan'),
('7319', 'Pemerintah Kab. Soppeng'),
('7321', 'Pemerintah Kab. Enrekang'),
('7322', 'Pemerintah Kab. Luwu Utara'),
('7325', 'Pemerintah Kab. Luwu Timur'),
('7326', 'Pemerintah Kab. Toraja Utara'),
('7371', 'Pemerintah Kota Makassar'),
('7372', 'Pemerintah Kota Parepare'),
('7373', 'Pemerintah Kota Palopo'),
('7401', 'Pemerintah Kab. Konawe'),
('7402', 'Pemerintah Kab. Buton'),
('7403', 'Pemerintah Kab. Muna'),
('7404', 'Pemerintah Kab. Kolaka'),
('7405', 'Pemerintah Kab. Konawe Selatan'),
('7406', 'Pemerintah Kab. Kolaka Utara'),
('7407', 'Pemerintah Kab. Bombana'),
('7408', 'Pemerintah Kab. Wakatobi'),
('7410', 'Pemerintah Kab. Buton Utara'),
('7411', 'Pemerintah Kab. Konawe Utara'),
('7412', 'Pemerintah Kab. Kolaka Timur'),
('7413', 'Pemerintah Kab. Konawe Kepulauan'),
('7414', 'Pemerintah Kab. Buton Selatan'),
('7415', 'Pemerintah Kab. Buton Tengah'),
('7416', 'Pemerintah Kab. Muna Barat'),
('7471', 'Pemerintah Kota Kendari'),
('7472', 'Pemerintah Kota Baubau'),
('7501', 'Pemerintah Kab. Buleleng'),
('7502', 'Pemerintah Kab. Jembrana'),
('7503', 'Pemerintah Kab. Klungkung'),
('7504', 'Pemerintah Kab. Gianyar'),
('7505', 'Pemerintah Kab. Karangasem'),
('7506', 'Pemerintah Kab. Bangli'),
('7507', 'Pemerintah Kab. Badung'),
('7508', 'Pemerintah Kab. Tabanan'),
('7571', 'Pemerintah Kota Denpasar'),
('7601', 'Pemerintah Kab. Lombok Barat'),
('7602', 'Pemerintah Kab. Lombok Tengah'),
('7603', 'Pemerintah Kab. Lombok Timur'),
('7604', 'Pemerintah Kab. Bima'),
('7605', 'Pemerintah Kab. Sumbawa'),
('7606', 'Pemerintah Kab. Dompu'),
('7607', 'Pemerintah Kab. Sumbawa Barat'),
('7608', 'Pemerintah Kab. Lombok Utara'),
('7671', 'Pemerintah Kota Mataram'),
('7672', 'Pemerintah Kota Bima'),
('7701', 'Pemerintah Kab. Kupang'),
('7702', 'Pemerintah Kab. Belu'),
('7703', 'Pemerintah Kab. Timor Tengah Utara'),
('7704', 'Pemerintah Kab. Timor Tengah Selatan'),
('7705', 'Pemerintah Kab. Alor'),
('7706', 'Pemerintah Kab. Sikka'),
('7707', 'Pemerintah Kab. Flores Timur'),
('7708', 'Pemerintah Kab. Ende'),
('7709', 'Pemerintah Kab. Ngada'),
('7710', 'Pemerintah Kab. Manggarai'),
('7711', 'Pemerintah Kab. Sumba Timur'),
('7712', 'Pemerintah Kab. Sumba Barat'),
('7713', 'Pemerintah Kab. Lembata'),
('7714', 'Pemerintah Kab. Rote Ndao'),
('7715', 'Pemerintah Kab. Manggarai Barat'),
('7716', 'Pemerintah Kab. Manggarai Timur'),
('7717', 'Pemerintah Kab. Sumba Barat Daya'),
('7718', 'Pemerintah Kab. Nagekeo'),
('7719', 'Pemerintah Kab. Sumba Tengah'),
('7720', 'Pemerintah Kab. Sabu Raijua'),
('7721', 'Pemerintah Kab. Malaka'),
('7771', 'Pemerintah Kota Kupang'),
('7801', 'Pemerintah Kab. Maluku Tengah'),
('7802', 'Pemerintah Kab. Maluku Tenggara'),
('7803', 'Pemerintah Kab. Buru'),
('7804', 'Pemerintah Kab. Maluku Tenggara Barat'),
('7805', 'Pemerintah Kab. Kepulauan Aru'),
('7806', 'Pemerintah Kab. Seram Bagian Barat'),
('7807', 'Pemerintah Kab. Seram Bagian Timur'),
('7808', 'Pemerintah Kab. Buru Selatan'),
('7809', 'Pemerintah Kab. Maluku Barat Daya'),
('7871', 'Pemerintah Kota Ambon'),
('7872', 'Pemerintah Kota Tual'),
('7901', 'Pemerintah Kab. Halmahera Barat'),
('7902', 'Pemerintah Kab. Halmahera Tengah'),
('7903', 'Pemerintah Kab. Kepulauan Sula'),
('7904', 'Pemerintah Kab. Halmahera Selatan'),
('7905', 'Pemerintah Kab. Halmahera Utara'),
('7906', 'Pemerintah Kab. Halmahera Timur'),
('7907', 'Pemerintah Kab. Pulau Morotai'),
('7908', 'Pemerintah Kab. Pulau Taliabu'),
('7971', 'Pemerintah Kota Ternate'),
('7972', 'Pemerintah Kota Tidore Kepulauan'),
('8001', 'Pemerintah Kab. Jayapura'),
('8002', 'Pemerintah Kab. Biak Numfor'),
('8004', 'Pemerintah Kab. Kepulauan Yapen '),
('8007', 'Pemerintah Kab. Merauke'),
('8008', 'Pemerintah Kab. Jayawijaya'),
('8009', 'Pemerintah Kab. Nabire'),
('8010', 'Pemerintah Kab. Puncak Jaya'),
('8011', 'Pemerintah Kab. Paniai'),
('8012', 'Pemerintah Kab. Mimika'),
('8013', 'Pemerintah Kab. Boven Digoel'),
('8014', 'Pemerintah Kab. Mappi'),
('8015', 'Pemerintah Kab. Asmat'),
('8016', 'Pemerintah Kab. Yahukimo'),
('8017', 'Pemerintah Kab. Pegunungan Bintang'),
('8018', 'Pemerintah Kab. Tolikara'),
('8019', 'Pemerintah Kab. Sarmi'),
('8020', 'Pemerintah Kab. Keerom'),
('8026', 'Pemerintah Kab. Waropen'),
('8027', 'Pemerintah Kab. Supiori'),
('8028', 'Pemerintah Kab. Mamberamo Raya'),
('8029', 'Pemerintah Kab. Mamberamo Tengah'),
('8030', 'Pemerintah Kab. Lanny Jaya'),
('8031', 'Pemerintah Kab. Yalimo'),
('8032', 'Pemerintah Kab. Nduga'),
('8033', 'Pemerintah Kab. Dogiyai'),
('8035', 'Pemerintah Kab. Puncak'),
('8036', 'Pemerintah Kab. Deiyai'),
('8037', 'Pemerintah Kab. Intan Jaya'),
('8072', 'Pemerintah Kota Jayapura'),
('8101', 'Pemerintah Kab. Bintan'),
('8102', 'Pemerintah Kab. Karimun'),
('8103', 'Pemerintah Kab. Natuna'),
('8104', 'Pemerintah Kab. Lingga'),
('8105', 'Pemerintah Kab. Kepulauan Anambas'),
('8171', 'Pemerintah Kota Batam'),
('8172', 'Pemerintah Kota Tanjungpinang'),
('8201', 'Pemerintah Kab. Sorong'),
('8202', 'Pemerintah Kab. Sorong Selatan'),
('8203', 'Pemerintah Kab. Raja Ampat'),
('8204', 'Pemerintah Kab. Manokwari'),
('8205', 'Pemerintah Kab. Teluk Bintuni'),
('8206', 'Pemerintah Kab. Teluk Wondama'),
('8207', 'Pemerintah Kab. Fak-Fak'),
('8208', 'Pemerintah Kab. Kaimana'),
('8210', 'Pemerintah Kab. Tambrauw'),
('8211', 'Pemerintah Kab. Maybrat'),
('8212', 'Pemerintah Kab. Pegunungan Arfak'),
('8213', 'Pemerintah Kab. Manokwari Selatan'),
('8271', 'Pemerintah Kota Sorong'),
('8301', 'Pemerintah Kab. Mamuju Utara'),
('8302', 'Pemerintah Kab. Mamuju'),
('8303', 'Pemerintah Kab. Mamasa'),
('8304', 'Pemerintah Kab. Polewali Mandar'),
('8305', 'Pemerintah Kab. Majene'),
('8306', 'Pemerintah Kab. Mamuju Tengah'),
('8401', 'Pemerintah Kab. Bulungan'),
('8402', 'Pemerintah Kab. Malinau'),
('8403', 'Pemerintah Kab. Nunukan'),
('8404', 'Pemerintah Kab. Tana Tidung'),
('8471', 'Pemerintah Kota Tarakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkara`
--

CREATE TABLE IF NOT EXISTS `perkara` (
  `nomor_perkara` varchar(100) NOT NULL,
  `tingkat_pengadilan` varchar(100) NOT NULL,
  `jenis_pengadilan` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kab_kota` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `penggugat` varchar(100) NOT NULL,
  `materi_gugatan` text NOT NULL,
  `tahapan` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `approval` tinyint(4) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkara`
--

INSERT INTO `perkara` (`nomor_perkara`, `tingkat_pengadilan`, `jenis_pengadilan`, `provinsi`, `kab_kota`, `instansi`, `penggugat`, `materi_gugatan`, `tahapan`, `status`, `approval`, `created_date`) VALUES
('152/G/2018/PTUNJKT', '1', '1', '5300', '5101', '1010', 'Tenaga Honorer Provinsi Jambi', 'Surat  Deputi Pengawasan dan Pengaendalian F-126/s-26-5/43 tertanggal 21 Maret 2018 Perihal Permohonan Penetapan NIP', 10, 'close', 1, '2020-11-05 02:57:52'),
('153/G/2018/PTUNJKT', '1', '1', '5300', '5101', '1010', 'Tenaga Honorer Provinsi DKI Jakarta', 'Surat Deputi Pengawasan dan Pengaendalian F-126/s-26-5/43 tertanggal 21 Maret 2018 Perihal Permohonan Penetapan NIP	', 10, 'open', NULL, '2020-11-05 02:57:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`kode`, `nama`) VALUES
('5200', 'Pemerintah Provinsi Sumatera Utara'),
('5300', 'Pemerintah Provinsi Riau'),
('5400', 'Pemerintah Provinsi Sumatera Barat'),
('5500', 'Pemerintah Provinsi Jambi'),
('5600', 'Pemerintah Provinsi Sumatera Selatan'),
('5700', 'Pemerintah Provinsi Kep. Bangka Belitung'),
('5800', 'Pemerintah Provinsi Bengkulu'),
('5900', 'Pemerintah Provinsi Lampung'),
('6000', 'Pemerintah Provinsi Daerah Khusus Ibukota Jakarta'),
('6100', 'Pemerintah Provinsi Jawa Barat'),
('6200', 'Pemerintah Provinsi Banten'),
('6400', 'Pemerintah Provinsi Jawa Tengah'),
('6500', 'Pemerintah Provinsi Jawa Timur'),
('6600', 'Pemerintah Provinsi Kalimantan Barat'),
('6700', 'Pemerintah Provinsi Kalimantan Tengah'),
('6800', 'Pemerintah Provinsi Kalimantan Selatan'),
('6900', 'Pemerintah Provinsi Kalimantan Timur'),
('7000', 'Pemerintah Provinsi Sulawesi Utara'),
('7100', 'Pemerintah Provinsi Gorontalo'),
('7200', 'Pemerintah Provinsi Sulawesi Tengah'),
('7300', 'Pemerintah Provinsi Sulawesi Selatan'),
('7400', 'Pemerintah Provinsi Sulawesi Tenggara'),
('7500', 'Pemerintah Provinsi Bali'),
('7600', 'Pemerintah Provinsi NTB'),
('7700', 'Pemerintah Provinsi NTT'),
('7800', 'Pemerintah Provinsi Maluku'),
('7900', 'Pemerintah Provinsi Maluku Utara'),
('8000', 'Pemerintah Provinsi Papua'),
('8100', 'Pemerintah Provinsi Kepulauan Riau'),
('8200', 'Pemerintah Provinsi Papua Barat'),
('8300', 'Pemerintah Provinsi Sulawesi Barat'),
('8400', 'Pemerintah Provinsi Kalimantan Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_penunjukan`
--

CREATE TABLE IF NOT EXISTS `surat_penunjukan` (
  `nomor` varchar(100) NOT NULL,
  `dasar_satu` text NOT NULL,
  `dasar_dua` text NOT NULL,
  `kepada` text NOT NULL,
  `untuk` text NOT NULL,
  `di_keluarkan` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tertanda` varchar(100) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahapan` int(11) NOT NULL,
  `approve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_penunjukan`
--

INSERT INTO `surat_penunjukan` (`nomor`, `dasar_satu`, `dasar_dua`, `kepada`, `untuk`, `di_keluarkan`, `tanggal_surat`, `tertanda`, `jenis_surat`, `file_surat`, `created_date`, `tahapan`, `approve`) VALUES
('1913/PUSBANKUM/SP/VIII/2020', 'Surat Kepala Kepolisian Resort Tangerang Selatan Nomor B/383/II/2019/Reskrim tanggal 7 Februari 2019 perihal  Bantuan menghadirkan saksi;', 'Disposisi Kepala Badan Kepegawaian Negara tanggal 15 Februari 2019 untuk ditindaklanjuti;', 'Vino. 196410011991031001, Pangkat Pembina Tingkat I, golongan ruang IV/b, Jabatan Kepala Bidang Konsultasi Hukum Kepegawaian pada Badan Kepegawaian Negara', 'Memberikan keterangan klarifikasi tentang Surat penetapan NIP kepada Penyidik Polres Bekasi terkait dengan adanya dugaan tindak pidana penipuan sebagaimana dimaksud dalam Pasal 378 KUHP dan menurut keterangan korban bahwa pelaku menjanjikan bisa menjadikan anak korban yang bernama ARIE CAHYANI EKA PUTRI untuk menjadi Pegawai di Dinas Kesehatan Pemkot tangerang Selatan dan kemudian pelaku memberikan kepada korban NIP dengan Nomor 19995010 1201704 2 003 an. ARIE CAHYANI EKA PUTRI, yang akan dilaksanakan pada hari Selasa tanggal 12 Maret 2019;', 'di Jakarta', '2020-10-19', 'Kapus', 'penunjukan', '07150fe597bf5f681d1d984d23075e30.pdf', '2020-11-05 00:45:39', 3, NULL),
('1913/Sesma/SP/VIII/2020', 'Surat Kepala Kepolisian Resort Tangerang Selatan Nomor B/383/II/2019/Reskrim tanggal 7 Februari 2019 perihal  Bantuan menghadirkan saksi;', 'Disposisi Kepala Badan Kepegawaian Negara tanggal 15 Februari 2019 untuk ditindaklanjuti;', 'Yuyud Yuchi Susanta, S.H. NIP. 196410011991031001, Pangkat Pembina Tingkat I, golongan ruang IV/b, Jabatan Kepala Bidang Konsultasi Hukum Kepegawaian pada Badan Kepegawaian Negara', 'Memberikan keterangan klarifikasi tentang Surat penetapan NIP kepada Penyidik Polres Tangerang Selatan terkait dengan adanya dugaan tindak pidana penipuan sebagaimana dimaksud dalam Pasal 378 KUHP dan menurut keterangan korban bahwa pelaku menjanjikan bisa menjadikan anak korban yang bernama ARIE CAHYANI EKA PUTRI untuk menjadi Pegawai di Dinas Kesehatan Pemkot tangerang Selatan dan kemudian pelaku memberikan kepada korban NIP dengan Nomor 19995010 1201704 2 003 an. ARIE CAHYANI EKA PUTRI, yang akan dilaksanakan pada hari Selasa tanggal 12 Maret 2019;', 'di Jakarta', '2020-11-02', 'Sesma', 'penunjukan', 'b2d19567ef34876cae5088535daf5a3d.pdf', '2020-11-05 00:45:39', 3, NULL),
('1914/PUSBANKUM/SP/VIII/2020', 'Surat Kepala Kepolisian Resort Tangerang Selatan Nomor B/383/II/2019/Reskrim tanggal 7 Februari 2019 perihal  Bantuan menghadirkan saksi;', 'Disposisi Kepala Badan Kepegawaian Negara tanggal 15 Februari 2019 untuk ditindaklanjuti;', 'Yuyud Yuchi Susanta, S.H. NIP. 196410011991031001, Pangkat Pembina Tingkat I, golongan ruang IV/b, Jabatan Kepala Bidang Konsultasi Hukum Kepegawaian pada Badan Kepegawaian Negara', 'Memberikan keterangan klarifikasi tentang Surat penetapan NIP kepada Penyidik Polres Tangerang Selatan terkait dengan adanya dugaan tindak pidana penipuan sebagaimana dimaksud dalam Pasal 378 KUHP dan menurut keterangan korban bahwa pelaku menjanjikan bisa menjadikan anak korban yang bernama ARIE CAHYANI EKA PUTRI untuk menjadi Pegawai di Dinas Kesehatan Pemkot tangerang Selatan dan kemudian pelaku memberikan kepada korban NIP dengan Nomor 19995010 1201704 2 003 an. ARIE CAHYANI EKA PUTRI, yang akan dilaksanakan pada hari Selasa tanggal 12 Maret 2019;', 'di Jakarta', '2020-11-04', 'Kapus', 'pendampingan', 'b51788c9212ac2cc62f0e94bb564d836.pdf', '2020-11-05 00:45:39', 3, NULL),
('1915/Waka/SP/VIII/2020', 'Surat Kepala Kepolisian Resort Tangerang Selatan Nomor B/383/II/2019/Reskrim tanggal 7 Februari 2019 perihal  Bantuan menghadirkan saksi;', 'Disposisi Kepala Badan Kepegawaian Negara tanggal 15 Februari 2019 untuk ditindaklanjuti;', 'Yuyud Yuchi Susanta, S.H. NIP. 196410011991031001, Pangkat Pembina Tingkat I, golongan ruang IV/b, Jabatan Kepala Bidang Konsultasi Hukum Kepegawaian pada Badan Kepegawaian Negara', 'Memberikan keterangan klarifikasi tentang Surat penetapan NIP kepada Penyidik Polres Tangerang Selatan terkait dengan adanya dugaan tindak pidana penipuan sebagaimana dimaksud dalam Pasal 378 KUHP dan menurut keterangan korban bahwa pelaku menjanjikan bisa menjadikan anak korban yang bernama ARIE CAHYANI EKA PUTRI untuk menjadi Pegawai di Dinas Kesehatan Pemkot tangerang Selatan dan kemudian pelaku memberikan kepada korban NIP dengan Nomor 19995010 1201704 2 003 an. ARIE CAHYANI EKA PUTRI, yang akan dilaksanakan pada hari Selasa tanggal 12 Maret 2019;', 'di Jakarta', '2020-11-05', 'Waka', 'penunjukan', 'becaf0569f76bff6f64437cd7ea79251.pdf', '2020-11-05 06:22:04', 3, NULL),
('1916/Sesma/SP/VIII/2020', 'Surat Kepala Kepolisian Resort Tangerang Selatan Nomor B/383/II/2019/Reskrim tanggal 7 Februari 2019 perihal  Bantuan menghadirkan saksi;', 'Disposisi Kepala Badan Kepegawaian Negara tanggal 15 Februari 2019 untuk ditindaklanjuti;', 'Yuyud Yuchi Susanta, S.H. NIP. 196410011991031001, Pangkat Pembina Tingkat I, golongan ruang IV/b, Jabatan Kepala Bidang Konsultasi Hukum Kepegawaian pada Badan Kepegawaian Negara', 'Memberikan keterangan klarifikasi tentang Surat penetapan NIP kepada Penyidik Polres Tangerang Selatan terkait dengan adanya dugaan tindak pidana penipuan sebagaimana dimaksud dalam Pasal 378 KUHP dan menurut keterangan korban bahwa pelaku menjanjikan bisa menjadikan anak korban yang bernama ARIE CAHYANI EKA PUTRI untuk menjadi Pegawai di Dinas Kesehatan Pemkot tangerang Selatan dan kemudian pelaku memberikan kepada korban NIP dengan Nomor 19995010 1201704 2 003 an. ARIE CAHYANI EKA PUTRI, yang akan dilaksanakan pada hari Selasa tanggal 12 Maret 2019;', 'di Jakarta', '2020-11-05', 'Sesma', 'pendampingan', 'fc6ff98a42724e6c94d2e3650f13c940.pdf', '2020-11-05 07:55:21', 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_permintaan`
--

CREATE TABLE IF NOT EXISTS `surat_permintaan` (
  `nomor_agenda` varchar(100) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal_surat` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_permintaan`
--

INSERT INTO `surat_permintaan` (`nomor_agenda`, `tanggal_agenda`, `asal_surat`, `nomor_surat`, `tanggal_surat`, `perihal_surat`, `file_surat`) VALUES
('14/KPS/PUSKONBANKUMPEG/IX/2020', '2020-11-02', 'Kepolisian RI Daerah Metro Jaya Resor Metro Bekasi Kota', 'B/4051/VIII/2020/Restro Bks Kota', '2020-09-04', 'Permintaan Penunjukan Saksi', '74425be9639476bd0d0dde4cc912aaff.pdf'),
('15/KPS/PUSKONBANKUMPEG/IX/2020', '2020-11-11', 'Kepolisian RI Daerah Metro Jaya Resor Metro Jakarta Pusat 	', 'B/4051/VIII/2020/Restro Jkt Pusat', '2020-09-10', 'Permintaan Penunjukan Saksi', '2e6065edd1aa110a2c14982f56fd6d24.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahapan`
--

CREATE TABLE IF NOT EXISTS `tahapan` (
`kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tahapan`
--

INSERT INTO `tahapan` (`kode`, `nama`) VALUES
(1, 'Tingkat Pertama'),
(2, 'Surat Panggilan'),
(3, 'Pemeriksaan Persiapan'),
(4, 'Gugatan'),
(5, 'Jawaban'),
(6, 'Replik'),
(7, 'Duplik'),
(8, 'Pembuktian'),
(9, 'Kesimpulan'),
(10, 'Putusan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahapan_surat`
--

CREATE TABLE IF NOT EXISTS `tahapan_surat` (
`kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tahapan_surat`
--

INSERT INTO `tahapan_surat` (`kode`, `nama`) VALUES
(1, 'Draft Surat'),
(2, 'Proses Approve'),
(3, 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat_pengadilan`
--

CREATE TABLE IF NOT EXISTS `tingkat_pengadilan` (
`kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tingkat_pengadilan`
--

INSERT INTO `tingkat_pengadilan` (`kode`, `nama`) VALUES
(1, 'Pengadilan Pertama'),
(2, 'Pengadilan Banding'),
(3, 'Pengadilan Kasasi'),
(4, 'Peninjauan Kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('vj57k2l44hl4qcc27e445vkenu5g7lhq', '127.0.0.1', 1604784814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738343539383b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('d5p9iqggueg248e6kcvh4vpe9uu3qf6c', '127.0.0.1', 1604785203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738353031303b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('1j68t8fe9nk9lghej7vovo733ra6b86f', '127.0.0.1', 1604785734, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738353437333b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('5mefndi6749ldkffh9jii5vjq0j8d0qo', '127.0.0.1', 1604786226, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738353933393b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('ra919o3o9rre04lonqsj709pthdi4onm', '127.0.0.1', 1604786342, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738363236353b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('n8gfvmnak0p353skomsemi6h28ktb5bu', '127.0.0.1', 1604786927, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738363632393b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('o41pj8paiueuogfqpu6e408lujb6e98l', '127.0.0.1', 1604787201, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738363933363b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('459ruthsscisli3v4iovd1mp8p72d0jj', '127.0.0.1', 1604787462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738373234353b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('98ho2he8b2tk7b1hlqv3sgd82bu8coir', '127.0.0.1', 1604788005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738373732313b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('hn36ad632uj69r741ker7of2v5lcrmqa', '127.0.0.1', 1604788047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738383034313b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('4loqd9k5olsm1bm97rb40cfg8chb2p99', '127.0.0.1', 1604788748, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738383533373b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('jf06mjvns83qm6al7cp8ga31b3m5mo06', '127.0.0.1', 1604789218, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738383931383b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('gf799ff63pt61pbu42d430jqvbbem12h', '127.0.0.1', 1604789514, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738393232313b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('kjo308gthr8si8t14saku2lb7a5qtnrs', '127.0.0.1', 1604789888, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738393539373b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('nivvef9nsira298cjddv43f2748g6jjo', '127.0.0.1', 1604790205, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343738393930383b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('r43j59dv15mu70in72f94laqdrh80t17', '127.0.0.1', 1604790493, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739303231343b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('f8cerbo57vgih3cp1ifjdm31j6p96lcq', '127.0.0.1', 1604791332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739313138313b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('lgo50gskocinugfaarqc9dsa68rsuuff', '127.0.0.1', 1604792275, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739323035353b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('7q716qicuthqqsu7nn719kuuinrsb685', '127.0.0.1', 1604793691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739333434393b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('s5fm9alh2q5qtnlvt6m0gj15ivjd1jsn', '127.0.0.1', 1604794216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739333932323b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('79ava288ivf724ef6454qr9l8n799asr', '127.0.0.1', 1604794675, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739343337383b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('golhkabe8eugg8r8prbf2fdq3fnc6q57', '127.0.0.1', 1604795042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739343737373b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('r1d9gmrq7qudm107m2oopfvlltr7689k', '127.0.0.1', 1604795367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739353038333b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('5of9n1licq9e0ttmccfsfmvg02aphnq5', '127.0.0.1', 1604795744, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739353434363b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('tnk0m6v53v4f63ffkph42oenqu7kb7um', '127.0.0.1', 1604796278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739363036383b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('5gk84qoudvq0i34il5l0h8tksdsdsq93', '127.0.0.1', 1604796582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739363338313b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('vgk035psq9q1hq83pht796p128f90plt', '127.0.0.1', 1604797143, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739363834373b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('pqgosgtqtg9ufvh7f34pii8e97ir2klr', '127.0.0.1', 1604797263, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739373138373b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('2hpt2htkc66a1evbhjgcbvsvl9gh6omp', '127.0.0.1', 1604797791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739373439333b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('sgf821i51qdultbub5d8figq6nr3kkbl', '127.0.0.1', 1604797863, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739373830373b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('5hf9nttq4e2cinks4e00o88fpj243tsk', '127.0.0.1', 1604798838, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739383636313b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b),
('9kufc6ljhg8q4f1m02t4nbjk3rk8efir', '127.0.0.1', 1604799190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630343739383936343b757365725f69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a31303a22526f6c655f41646d696e223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Role_Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen_perkara`
--
ALTER TABLE `dokumen_perkara`
 ADD PRIMARY KEY (`nomor_perkara`,`tahapan_perkara`);

--
-- Indexes for table `jenis_pengadilan`
--
ALTER TABLE `jenis_pengadilan`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kab_kota`
--
ALTER TABLE `kab_kota`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `perkara`
--
ALTER TABLE `perkara`
 ADD PRIMARY KEY (`nomor_perkara`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `surat_penunjukan`
--
ALTER TABLE `surat_penunjukan`
 ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `surat_permintaan`
--
ALTER TABLE `surat_permintaan`
 ADD PRIMARY KEY (`nomor_agenda`);

--
-- Indexes for table `tahapan`
--
ALTER TABLE `tahapan`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tahapan_surat`
--
ALTER TABLE `tahapan_surat`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tingkat_pengadilan`
--
ALTER TABLE `tingkat_pengadilan`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
 ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_pengadilan`
--
ALTER TABLE `jenis_pengadilan`
MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tahapan`
--
ALTER TABLE `tahapan`
MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tahapan_surat`
--
ALTER TABLE `tahapan_surat`
MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tingkat_pengadilan`
--
ALTER TABLE `tingkat_pengadilan`
MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
