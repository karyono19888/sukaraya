-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2023 pada 11.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sukaraya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_dapuan`
--

CREATE TABLE `m_dapuan` (
  `dapuan_id` int(11) NOT NULL,
  `dapuan_nama` varchar(128) NOT NULL,
  `dapuan_status` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_dapuan`
--

INSERT INTO `m_dapuan` (`dapuan_id`, `dapuan_nama`, `dapuan_status`, `created_at`) VALUES
(1, 'Kurikulum', 'Aktif', 1671930379),
(2, 'Keputrian', 'Aktif', 1672011565);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kelas`
--

CREATE TABLE `m_kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(50) NOT NULL,
  `kelas_status` enum('Aktif','Tidak aktif') NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_kelas`
--

INSERT INTO `m_kelas` (`kelas_id`, `kelas_nama`, `kelas_status`, `created_at`) VALUES
(1, 'A', 'Aktif', 0),
(2, 'B', 'Aktif', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kelompok`
--

CREATE TABLE `m_kelompok` (
  `kel_id` int(11) NOT NULL,
  `kel_nama` varchar(50) NOT NULL,
  `kel_status` enum('Aktif','Tidak aktif') NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_murid`
--

CREATE TABLE `m_murid` (
  `murid_id` int(11) NOT NULL,
  `murid_nama` varchar(128) NOT NULL,
  `murid_jk` enum('Laki-laki','Perempuan') NOT NULL,
  `murid_image` varchar(50) NOT NULL,
  `murid_barcode` varchar(50) NOT NULL,
  `murid_kartu_id` varchar(12) NOT NULL,
  `murid_tgl_lahir` date NOT NULL,
  `murid_pendidikan` varchar(50) NOT NULL,
  `murid_kelompok` varchar(50) NOT NULL,
  `murid_wali` varchar(128) NOT NULL,
  `murid_no_wali` varchar(50) NOT NULL,
  `murid_kelas` varchar(50) NOT NULL,
  `murid_status` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_murid`
--

INSERT INTO `m_murid` (`murid_id`, `murid_nama`, `murid_jk`, `murid_image`, `murid_barcode`, `murid_kartu_id`, `murid_tgl_lahir`, `murid_pendidikan`, `murid_kelompok`, `murid_wali`, `murid_no_wali`, `murid_kelas`, `murid_status`, `created_at`) VALUES
(1, 'Aghnia Nataly Sabilla ', 'Laki-laki', '54330001_31122022.JPG', '54330001.png', '54330001', '2009-12-24', 'SMP ', 'Sukaraya 1', 'Purwanto ', '85692346373', 'B', 'Aktif', 0),
(2, 'Alfian', 'Laki-laki', '', '54330002.png', '54330002', '0000-00-00', '', 'Sukaraya 5', '', '', 'A', 'Aktif', 0),
(3, 'Ali Firdaus', 'Laki-laki', '54330003_31122022.JPG', '54330003.png', '54330003', '0000-00-00', '', 'Sukaraya 5', '', '', 'A', 'Aktif', 0),
(4, 'Alia Elviana Putri', 'Laki-laki', '', '54330004.png', '54330004', '2009-08-04', 'SMP', 'Sukaraya 4', 'Ali Muhtadi', '81293630172', 'B', 'Aktif', 0),
(5, 'Almira ', 'Laki-laki', '', '54330005.png', '54330005', '2009-11-07', 'SMP', 'Sukaraya 3', 'Bp Haryono', '81314281204', 'B', 'Aktif', 0),
(6, 'Ananda Raffi', 'Laki-laki', '', '54330006.png', '54330006', '0000-00-00', '', 'Sukaraya 2', '', '', 'B', 'Aktif', 0),
(7, 'Andre Widiatomo', 'Laki-laki', '', '54330007.png', '54330007', '0000-00-00', '', 'Sukaraya 5', '', '', 'B', 'Aktif', 0),
(8, 'Annisa Fajarina Ilma Rosyada', 'Laki-laki', '', '54330008.png', '54330008', '2010-03-03', 'SMP', 'Sukaraya 5', 'Agus mutholip', '', '', 'Aktif', 0),
(9, 'Ariadha pratama putra ', 'Laki-laki', '', '54330009.png', '54330009', '2006-01-10', 'SMA', 'Sukaraya 5', 'Uri mashuri', '+62 853-1942-3354', 'B', 'Aktif', 0),
(10, 'Arkha', 'Laki-laki', '', '54330010.png', '54330010', '0000-00-00', '', 'Sukaraya 5', '', '', 'B', 'Aktif', 0),
(11, 'Asa Puri Aulia dewi', 'Laki-laki', '', '54330011.png', '54330011', '2005-02-02', 'SMK', 'Sukaraya 6', 'Taufik ', '85212757379', 'A', 'Aktif', 0),
(12, 'Azka Ramadani', 'Laki-laki', '', '54330012.png', '54330012', '0000-00-00', '', 'Sukaraya 2', '', '', 'B', 'Aktif', 0),
(13, 'Bahrina Widia Astuti', 'Laki-laki', '', '54330013.png', '54330013', '0000-00-00', '', 'Sukaraya 1', '', '', 'B', 'Aktif', 0),
(14, 'Berliana Sifaul Jannah', 'Laki-laki', '', '54330014.png', '54330014', '0000-00-00', '', 'Sukaraya 1', '', '', 'A', 'Aktif', 0),
(15, 'Danu Aji Pangestu ', 'Laki-laki', '', '54330015.png', '54330015', '2005-02-21', 'SMA', 'Sukaraya 3', 'Bp Widodo ', '81284125045', 'B', 'Aktif', 0),
(16, 'Dasa Febriani ', 'Laki-laki', '', '54330016.png', '54330016', '2008-02-18', 'SMP', 'Sukaraya 3', 'Bp H Pitoyo ', '81280453839', 'A', 'Aktif', 0),
(17, 'Debo M Riski', 'Laki-laki', '', '54330017.png', '54330017', '0000-00-00', '', 'Sukaraya 2', '', '', 'B', 'Aktif', 0),
(18, 'Devan Leksi prima Abdillah ', 'Laki-laki', '', '54330018.png', '54330018', '2009-04-08', 'SMP', 'Sukaraya 6', 'Taufik ', '85212757379', 'B', 'Aktif', 0),
(19, 'Dinda Bustari ', 'Laki-laki', '', '54330019.png', '54330019', '2008-07-07', 'SMP', 'Sukaraya 3', 'Bp Widodo', '81284125045', 'A', 'Aktif', 0),
(20, 'Ericha nurmahya ', 'Laki-laki', '', '54330020.png', '54330020', '2008-05-14', 'SMP', 'Sukaraya 2', 'Eri Suparman ', '81213951086', '', 'Aktif', 0),
(21, 'Fadil Aditya Adzima', 'Laki-laki', '', '54330021.png', '54330021', '0000-00-00', '', 'Sukaraya 4', '', '', 'B', 'Aktif', 0),
(22, 'Fakhri Ahmad Muzakki ', 'Laki-laki', '', '54330022.png', '54330022', '2010-01-28', 'SMP', 'Sukaraya 4', 'Jihan Vidi Nurcahyo ', '81293645113', 'B', 'Aktif', 0),
(23, 'Faldi Ahmad', 'Laki-laki', '', '54330023.png', '54330023', '2007-06-03', 'SMP', 'Sukaraya 4', 'KODRAT', '89601713604', 'B', 'Aktif', 0),
(24, 'Fardhan fahryza dahlan', 'Laki-laki', '', '54330024.png', '54330024', '2009-01-25', 'SMP', 'Sukaraya 6', 'Maryanto', '8888413675', 'B', 'Aktif', 0),
(25, 'Farhan Addin Nur Wahid', 'Laki-laki', '', '54330025.png', '54330025', '2005-12-26', 'SMK', 'Sukaraya 6', 'Nur salim', '83153296022', 'B', 'Aktif', 0),
(26, 'febriani aulia fauziah', 'Laki-laki', '', '54330026.png', '54330026', '2006-02-07', 'pelajar', 'Sukaraya 1', 'RUSDIANTO', 'gapunya', 'B', 'Aktif', 0),
(27, 'Fricila Rahmadani', 'Laki-laki', '', '54330027.png', '54330027', '0000-00-00', '', 'Sukaraya 5', '', '', 'B', 'Aktif', 0),
(28, 'Hafiz Izzandi Pratama', 'Laki-laki', '', '54330028.png', '54330028', '2007-01-03', 'SMA', 'Sukaraya 4', 'Siti Nur khasanah', '0819-3751-1775', 'A', 'Aktif', 0),
(29, 'Hideyuki Pradana', 'Laki-laki', '', '54330029.png', '54330029', '2006-09-28', 'SMK', 'Sukaraya 6', 'ENDI HARYONO', '81389766264', 'B', 'Aktif', 0),
(30, 'Julyo Farrel Khafid KH', 'Laki-laki', '', '54330030.png', '54330030', '2009-07-08', 'SMP', 'Sukaraya 4', 'Kustian guntolo ', '81390634795', 'B', 'Aktif', 0),
(31, 'Jurdan ', 'Laki-laki', '', '54330031.png', '54330031', '2008-06-12', 'SMP', 'Sukaraya 3', 'Bp Tohir ', '85770630922', 'A', 'Aktif', 0),
(32, 'Kirey Putri Ramadani', 'Laki-laki', '', '54330032.png', '54330032', '0000-00-00', '', 'Sukaraya 5', '', '', 'A', 'Aktif', 0),
(33, 'Lidia maharani', 'Laki-laki', '', '54330033.png', '54330033', '2009-04-03', 'SMP', 'Sukaraya 5', 'Bpurwanto', '81315141389', '', 'Aktif', 0),
(34, 'M Lucky Hasan', 'Laki-laki', '', '54330034.png', '54330034', '0000-00-00', '', 'Sukaraya 2', '', '', 'B', 'Aktif', 0),
(35, 'M. Faris', 'Laki-laki', '', '54330035.png', '54330035', '0000-00-00', '', 'Sukaraya 5', '', '', 'B', 'Aktif', 0),
(36, 'M. Fatan', 'Laki-laki', '', '54330036.png', '54330036', '0000-00-00', '', 'Sukaraya 2', '', '', 'A', 'Aktif', 0),
(37, 'M. Firman Firdaus', 'Laki-laki', '', '54330037.png', '54330037', '0000-00-00', '', 'Sukaraya 1', '', '', 'B', 'Aktif', 0),
(38, 'M. Floravel alvinno ginurul', 'Laki-laki', '', '54330038.png', '54330038', '2008-09-21', 'SMP', 'Sukaraya 6', 'Yusuf ginurul', '81808320518', 'B', 'Aktif', 0),
(39, 'M. Rehan', 'Laki-laki', '', '54330039.png', '54330039', '0000-00-00', '', 'Sukaraya 5', '', '', 'B', 'Aktif', 0),
(40, 'M. Reno', 'Laki-laki', '', '54330040.png', '54330040', '0000-00-00', '', 'Sukaraya 5', '', '', 'B', 'Aktif', 0),
(41, 'Maulidya Saqina Putri', 'Laki-laki', '', '54330041.png', '54330041', '2008-03-15', 'SMP', 'Sukaraya 4', 'Purwanto (alm)', '82337716878', 'B', 'Aktif', 0),
(42, 'Moh Billal hambudi', 'Laki-laki', '', '54330042.png', '54330042', '2008-07-20', 'SMP', 'Sukaraya 1', 'Heri susanto', '81218602810', 'A', 'Aktif', 0),
(43, 'Mohamad Prio Wibowo', 'Laki-laki', '', '54330043.png', '54330043', '2006-08-23', 'SMA', 'Sukaraya 2', 'Saryono/Suparni', '82299758981', 'B', 'Aktif', 0),
(44, 'Muhamad Fahri Akbar ', 'Laki-laki', '', '54330044.png', '54330044', '2007-02-26', 'SMA', 'Sukaraya 5', 'Uri mashuri', '85319423354', 'B', 'Aktif', 0),
(45, 'Muhammad adam alkayis', 'Laki-laki', '', '54330045.png', '54330045', '2005-10-12', 'SMK', 'Sukaraya 2', 'H agus sarwono', '81380137189', 'B', 'Aktif', 0),
(46, 'Muhammad Alif Zamhariro ', 'Laki-laki', '', '54330046.png', '54330046', '2005-03-17', 'SMK', 'Sukaraya 2', 'Lilis Sudarti', '81287601616', 'B', 'Aktif', 0),
(47, 'Muhammad fadhlan aulia', 'Laki-laki', '', '54330047.png', '54330047', '2009-12-09', 'SMP', 'Sukaraya 6', 'Dinul kholis aulia', '83805986090', 'B', 'Aktif', 0),
(48, 'Muhammad Rakha Ghani', 'Laki-laki', '', '54330048.png', '54330048', '2006-01-08', 'SMK', 'Sukaraya 4', 'SIDAL', '0838-1579-6752', 'B', 'Aktif', 0),
(49, 'nazla haurotul ulya ', 'Laki-laki', '', '54330049.png', '54330049', '2009-01-07', 'SMP ', 'Sukaraya 5', 'Rukman Sumarna/maryam', '+62 815-8666-7478/+62 858-1415-3458', '', 'Aktif', 0),
(50, 'Olivia Fitriani ', 'Laki-laki', '', '54330050.png', '54330050', '2007-08-03', 'SMP', 'Sukaraya 3', 'Ibu Rini ', '85781904077', 'A', 'Aktif', 0),
(51, 'Salma sabiladina ', 'Laki-laki', '', '54330051.png', '54330051', '2008-06-15', 'SMP', 'Sukaraya 1', 'Trie setyono ', '81381295908', 'A', 'Aktif', 0),
(52, 'Saskia', 'Laki-laki', '', '54330052.png', '54330052', '2007-01-11', 'SMA', 'Sukaraya 3', 'Bp Sukarja ', '87877273218', 'A', 'Aktif', 0),
(53, 'Sifa', 'Laki-laki', '', '54330053.png', '54330053', '0000-00-00', '', 'Sukaraya 5', '', '', 'B', 'Aktif', 0),
(54, 'Sulton', 'Laki-laki', '', '54330054.png', '54330054', '0000-00-00', '', 'Sukaraya 3', '', '', 'B', 'Aktif', 0),
(55, 'Syifa Fauzia', 'Laki-laki', '', '54330055.png', '54330055', '2005-12-30', 'SMA', 'Sukaraya 3', 'Bp Paryono', '85210718363', 'A', 'Aktif', 0),
(56, 'Tri Lidia Yulianti', 'Laki-laki', '', '54330056.png', '54330056', '0000-00-00', '', 'Sukaraya 5', '', '', 'A', 'Aktif', 0),
(57, 'Ulya nissa fauziah', 'Laki-laki', '', '54330057.png', '54330057', '2006-07-11', 'SMK', 'Sukaraya 1', 'Trie setyono ', '81381295908', 'B', 'Aktif', 0),
(58, 'Utami Sri Rejeki', 'Laki-laki', '', '54330058.png', '54330058', '0000-00-00', '', 'Sukaraya 2', '', '', 'B', 'Aktif', 0),
(59, 'Wildan', 'Laki-laki', '', '54330059.png', '54330059', '0000-00-00', '', 'Sukaraya 2', '', '', 'B', 'Aktif', 0),
(60, 'Yuda', 'Laki-laki', '', '54330060.png', '54330060', '2009-06-27', 'SMP', 'Sukaraya 3', 'Bp Paryono', '85210718363', 'B', 'Aktif', 0),
(61, 'Yusron', 'Laki-laki', '', '54330061.png', '54330061', '0000-00-00', '', 'Sukaraya 5', '', '', 'B', 'Aktif', 0),
(62, 'Zuchrufa Nur Fauziah ', 'Laki-laki', '', '54330062.png', '54330062', '2005-12-01', 'SMK', 'Sukaraya 1', 'Mangun ', '82111606690', 'A', 'Aktif', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pendidikan`
--

CREATE TABLE `m_pendidikan` (
  `pend_id` int(11) NOT NULL,
  `pend_nama` varchar(128) NOT NULL,
  `pend_status` enum('Aktif','Tidak aktif') NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pendidikan`
--

INSERT INTO `m_pendidikan` (`pend_id`, `pend_nama`, `pend_status`, `created_at`) VALUES
(2, 'SMA', 'Aktif', 1672011456),
(3, 'SMK', 'Aktif', 1672011466),
(4, 'SMP', 'Aktif', 1672011475);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pengajar`
--

CREATE TABLE `m_pengajar` (
  `pengajar_id` int(11) NOT NULL,
  `pengajar_nama` varchar(128) NOT NULL,
  `pengajar_id_card` varchar(28) NOT NULL,
  `pengajar_kelompok` varchar(28) NOT NULL,
  `pengajar_no_tlpn` varchar(28) NOT NULL,
  `pengajar_image` varchar(50) NOT NULL,
  `pengajar_barcode` varchar(50) NOT NULL,
  `pengajar_status` enum('Aktif','Tidak Aktif') NOT NULL,
  `cretaed_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pengajar`
--

INSERT INTO `m_pengajar` (`pengajar_id`, `pengajar_nama`, `pengajar_id_card`, `pengajar_kelompok`, `pengajar_no_tlpn`, `pengajar_image`, `pengajar_barcode`, `pengajar_status`, `cretaed_at`) VALUES
(1, 'Mulki', '54340001', 'Sukaraya 1', '+62 812-9329-4598', '54340001_Mulki.JPG', '54340001.png', 'Aktif', 0),
(2, 'Indra', '54340002', 'Sukaraya 2', '+62 812-9329-4598', '', '54340002.png', 'Aktif', 0),
(3, 'Putra', '54340003', 'Sukaraya 2', '+62 813-3465-9280', '', '', 'Aktif', 0),
(4, 'Aan', '54340004', 'Sukaraya 3', '+62 857-7228-9375', '', '', 'Aktif', 0),
(5, 'Adam', '54340005', 'Sukaraya 5', '+62 831-0913-1354', '', '', 'Aktif', 0),
(6, 'Pandu', '54340006', 'Sukaraya 5', '+62 812-1037-7750', '', '', 'Aktif', 0),
(7, 'Rohman', '54340007', 'Sukaraya 6', '+62 812-1037-7750', '', '', 'Aktif', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pengurus`
--

CREATE TABLE `m_pengurus` (
  `pengurus_id` int(11) NOT NULL,
  `pengurus_nama` varchar(128) NOT NULL,
  `pengurus_id_card` varchar(12) NOT NULL,
  `pengurus_kelompok` varchar(50) NOT NULL,
  `pengurus_dapuan` varchar(50) NOT NULL,
  `pengurus_no_tlpn` varchar(28) NOT NULL,
  `pengurus_status` enum('Aktif','Tidak Akitf') NOT NULL,
  `pengurus_image` varchar(128) NOT NULL,
  `pengurus_barcode` varchar(50) NOT NULL,
  `cretaed_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pengurus`
--

INSERT INTO `m_pengurus` (`pengurus_id`, `pengurus_nama`, `pengurus_id_card`, `pengurus_kelompok`, `pengurus_dapuan`, `pengurus_no_tlpn`, `pengurus_status`, `pengurus_image`, `pengurus_barcode`, `cretaed_at`) VALUES
(1, 'Ady Moeslim', '54350010', 'Sukaraya 4', 'Wakil', '+62 817-6904-313', 'Aktif', '', '', 0),
(2, 'Ali Mustofa', '54350021', 'Sukaraya 1', 'Kurikulum', '+62 838-0806-7388', 'Aktif', '', '', 0),
(3, 'Ana Sobriana', '54350016', 'Sukaraya 5', 'Keputrian', '+62 856-9727-6217', 'Aktif', '', '', 0),
(4, 'Bella', '54350019', 'Sukaraya 1', 'Keputrian', '+62 812-1283-0115', 'Aktif', '', '', 0),
(5, 'Candra', '54350014', 'Sukaraya 2', 'Keputrian', '+62 895-3727-75142', 'Aktif', '', '', 0),
(6, 'Dimas', '54350022', 'Sukaraya 3', 'Kurikulum', '+62 812-8412-5045', 'Aktif', '', '', 0),
(7, 'Driyono', '54350001', 'Sukaraya 1', 'Dewan GP', '', 'Aktif', '54350001_Driyono.JPG', '54350001.png', 0),
(8, 'Ely', '54350032', 'Sukaraya 1', 'Bimbingan', '', 'Aktif', '', '', 0),
(9, 'Fajar', '54350006', 'Sukaraya 4', 'Ketua GP', '+62 813-8904-5313', 'Aktif', '', '', 0),
(10, 'Ferdy', '54350030', 'Sukaraya 6', 'Perlengkapan', '', 'Aktif', '', '', 0),
(11, 'Ferry', '54350005', 'Sukaraya 2', 'Ko\'ordinator GP', '+62 857-1811-3439', 'Aktif', '', '', 0),
(12, 'Fina Anjani', '54350020', 'Sukaraya 5', 'Keputrian', '+62 857-7814-0515', 'Aktif', '', '', 0),
(13, 'Gilang', '54350024', 'Sukaraya 1', 'Penerobos', '+62 812-2403-5517', 'Aktif', '', '', 0),
(14, 'H. Pitoyo', '54350004', 'Sukaraya 3', 'Pembina GP', '', 'Aktif', '', '', 0),
(15, 'H. Sugeng', '54350002', 'Sukaraya 2', 'Dewan GP', '', 'Aktif', '', '', 0),
(16, 'Hendy', '54350034', 'Sukaraya 6', 'Wakil PJP', '+62 813-8461-2076', 'Aktif', '', '', 0),
(17, 'Indri', '54350015', 'Sukaraya 1', 'Keputrian', '+62 895-3314-95746', 'Aktif', '', '', 0),
(18, 'Jerry', '54350029', 'Sukaraya 2', 'Perlengkapan', '', 'Aktif', '', '', 0),
(19, 'Khomsiana', '54350018', 'Sukaraya 3', 'Keputrian', '+62 896-8112-3527', 'Aktif', '', '', 0),
(20, 'Maryani', '54350033', '', 'Bimbingan', '', 'Aktif', '', '', 0),
(21, 'Miftah', '54350008', 'Sukaraya 6', 'Sekretaris', '+62 813-1996-3754', 'Aktif', '', '', 0),
(22, 'Nita', '54350017', 'Sukaraya 3', 'Keputrian', '+62 813-8814-2028', 'Aktif', '', '', 0),
(23, 'Nurdin', '54350031', '', 'Bimbingan', '', 'Aktif', '', '', 0),
(24, 'Prima Fauzi', '54350007', 'Sukaraya 1', 'Bendahara', '+62 815-4621-9910', 'Aktif', '', '', 0),
(25, 'Pur', '54350003', 'Sukaraya 5', 'Dewan GP', '', 'Aktif', '', '', 0),
(26, 'Reza Renaldi', '54350012', 'Sukaraya 3', 'Wakil', '+62 813-3242-1226', 'Aktif', '', '', 0),
(27, 'Rezki', '54350023', '', 'Kurikulum', '', 'Aktif', '', '', 0),
(28, 'Riyan', '54350025', 'Sukaraya 3', 'Penerobos', '', 'Aktif', '', '', 0),
(29, 'Rizqina', '54350009', 'Sukaraya 4', 'Sekretaris', '+62 882-2586-4618', 'Aktif', '', '', 0),
(30, 'Rohim', '54350027', 'Sukaraya 5', 'Konsumsi', '+62 858-9229-6354', 'Aktif', '', '', 0),
(31, 'Ropi', '54350013', 'Sukaraya 1', 'Wakil', '+62 831-5323-8427', 'Aktif', '', '', 0),
(32, 'Senja', '54350028', 'Sukaraya 1', 'Perlengkapan', '', 'Aktif', '', '', 0),
(33, 'Sulton Fadillah', '54350011', 'Sukaraya 5', 'Wakil', '+62 852-1563-3354', 'Aktif', '', '', 0),
(34, 'Yusuf', '54350026', 'Sukaraya 3', 'Penerobos', '', 'Aktif', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_absensi`
--

CREATE TABLE `t_absensi` (
  `absen_id` int(11) NOT NULL,
  `absen_nik` varchar(10) NOT NULL,
  `absen_masuk` varchar(10) NOT NULL,
  `absen_keluar` varchar(10) NOT NULL,
  `absen_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_log`
--

CREATE TABLE `t_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user` varchar(255) DEFAULT NULL,
  `log_tipe` varchar(50) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(1) NOT NULL,
  `user_role` int(1) UNSIGNED NOT NULL,
  `user_username` varchar(58) NOT NULL,
  `user_nama` varchar(128) NOT NULL,
  `user_email` varchar(28) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_image` varchar(128) NOT NULL,
  `user_status` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_role`, `user_username`, `user_nama`, `user_email`, `user_password`, `user_image`, `user_status`, `created_at`) VALUES
(2, 1, 'admin', 'Administrator', '', '$2y$10$ZxMKR2ZMOzFwFcmWpUE56e6l6bkDidSPCFl0/t.9kq0LjfEDHmhy2', 'https://ui-avatars.com/api/?name=Administrator', 'Aktif', 0),
(3, 2, 'miftah', 'Miftah', 'test@gmail.com', '$2y$10$y8sErAv2sdGBf/y1WlrrEe9AgedajN4y0hc0lhMFT1EIdQ.Pm898i', 'https://ui-avatars.com/api/?name=Miftah', 'Aktif', 1671443171);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `role_id` int(11) NOT NULL,
  `role_nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`role_id`, `role_nama`) VALUES
(1, 'Administrator'),
(2, 'Pengajar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_dapuan`
--
ALTER TABLE `m_dapuan`
  ADD PRIMARY KEY (`dapuan_id`);

--
-- Indeks untuk tabel `m_kelas`
--
ALTER TABLE `m_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indeks untuk tabel `m_kelompok`
--
ALTER TABLE `m_kelompok`
  ADD PRIMARY KEY (`kel_id`);

--
-- Indeks untuk tabel `m_murid`
--
ALTER TABLE `m_murid`
  ADD PRIMARY KEY (`murid_id`);

--
-- Indeks untuk tabel `m_pendidikan`
--
ALTER TABLE `m_pendidikan`
  ADD PRIMARY KEY (`pend_id`);

--
-- Indeks untuk tabel `m_pengajar`
--
ALTER TABLE `m_pengajar`
  ADD PRIMARY KEY (`pengajar_id`);

--
-- Indeks untuk tabel `m_pengurus`
--
ALTER TABLE `m_pengurus`
  ADD PRIMARY KEY (`pengurus_id`);

--
-- Indeks untuk tabel `t_absensi`
--
ALTER TABLE `t_absensi`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indeks untuk tabel `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_dapuan`
--
ALTER TABLE `m_dapuan`
  MODIFY `dapuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `m_kelas`
--
ALTER TABLE `m_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_kelompok`
--
ALTER TABLE `m_kelompok`
  MODIFY `kel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_murid`
--
ALTER TABLE `m_murid`
  MODIFY `murid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `m_pendidikan`
--
ALTER TABLE `m_pendidikan`
  MODIFY `pend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `m_pengajar`
--
ALTER TABLE `m_pengajar`
  MODIFY `pengajar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `m_pengurus`
--
ALTER TABLE `m_pengurus`
  MODIFY `pengurus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `t_absensi`
--
ALTER TABLE `t_absensi`
  MODIFY `absen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_log`
--
ALTER TABLE `t_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
