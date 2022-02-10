-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Feb 2022 pada 10.59
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_pelatihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `id_pendaftar` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_pelatihan` varchar(100) NOT NULL,
  `bidang_pelatihan` varchar(100) NOT NULL,
  `pusat_penyelenggara` varchar(100) NOT NULL,
  `lokasi_pelatihan` varchar(100) NOT NULL,
  `mulai_pelatihan` date NOT NULL,
  `akhir_pelatihan` date NOT NULL,
  `tanggal_lulus` date NOT NULL,
  `penilaian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`id`, `id_pendaftar`, `nik`, `nama`, `nama_pelatihan`, `bidang_pelatihan`, `pusat_penyelenggara`, `lokasi_pelatihan`, `mulai_pelatihan`, `akhir_pelatihan`, `tanggal_lulus`, `penilaian`) VALUES
(5, '00005', '082255555555', 'Mulkani', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', '2022-11-04', 'Selesai'),
(6, '00006', '082266666666', 'Fauzar Asyauri, S.Kom.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', '2022-11-04', 'Selesai'),
(7, '00007', '082277777777', 'Heryanda Ade Saputra', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', '2022-11-04', 'Selesai'),
(8, '00008', '082288888888', 'Muhammad Azis, S.H.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', '2022-11-04', 'Selesai'),
(9, '00009', '082299999999', 'Rahmina, S.Pd.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', '2021-11-04', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_pelatihan`
--

CREATE TABLE `bidang_pelatihan` (
  `id` int(11) NOT NULL,
  `id_pelatihan` varchar(100) NOT NULL,
  `bidang_pelatihan` varchar(100) NOT NULL,
  `pusat_penyelenggara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang_pelatihan`
--

INSERT INTO `bidang_pelatihan` (`id`, `id_pelatihan`, `bidang_pelatihan`, `pusat_penyelenggara`) VALUES
(9, 'BDG-009', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman'),
(10, 'BDG-010', 'Permukiman', 'Pusat Pengembangan Kompetensi SDA dan Permukiman'),
(11, 'BDG-011', 'Jalan dan Jembatan', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW'),
(12, 'BDG-012', 'Perumahan', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW'),
(13, 'BDG-013', 'Pengembangan Infrastruktur Wilayah', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW'),
(14, 'BDG-014', 'Manajemen Umum', 'Pusat Pengembangan Kompetensi Manajemen'),
(15, 'BDG-015', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen'),
(16, 'BDG-016', 'Manajemen Fungsional', 'Pusat Pengembangan Kompetensi Manajemen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pelatihan`
--

CREATE TABLE `jenis_pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `nama_pelatihan` varchar(200) NOT NULL,
  `lokasi_pelatihan` varchar(100) NOT NULL,
  `bidang_pelatihan` varchar(100) NOT NULL,
  `pusat_penyelenggara` varchar(100) NOT NULL,
  `mulai_pelatihan` date NOT NULL,
  `akhir_pelatihan` date NOT NULL,
  `target_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pelatihan`
--

INSERT INTO `jenis_pelatihan` (`id_pelatihan`, `nama_pelatihan`, `lokasi_pelatihan`, `bidang_pelatihan`, `pusat_penyelenggara`, `mulai_pelatihan`, `akhir_pelatihan`, `target_peserta`) VALUES
(9, 'Perencanaan Teknis Rawa', 'Banjarmasin', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', '2022-01-17', '2022-01-31', 30),
(10, 'Perencanaan Teknis Irigasi', 'Banjarmasin', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', '2022-02-14', '2022-03-02', 30),
(11, 'Fungsional Pertama Teknik Tata Bangunan Perumahan Ahli', 'Banjarmasin', 'Manajemen Fungsional', 'Pusat Pengembangan Kompetensi Manajemen', '2022-03-14', '2022-03-31', 30),
(12, 'Pengawasan dan Pengendalian Pembangunan Rumah Susun', 'Banjarmasin', 'Perumahan', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW', '2022-06-06', '2022-06-17', 30),
(13, 'Sistem Manajemen Operasi dan Pemeliharaan Irigasi (SMOPI)', 'Banjarmasin', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', '2022-07-04', '2022-07-12', 30),
(14, 'Teknik Fungsional Berjenjang Bidang Teknik Jalan dan Jembatan Jenjang Pertama', 'Banjarmasin', 'Jalan dan Jembatan', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW', '2022-07-12', '2022-07-27', 30),
(15, 'Pelaksanaan dan Pengawasan Konstruksi TPA dan IPLT', 'Banjarmasin', 'Permukiman', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', '2022-08-01', '2022-08-18', 30),
(16, 'Hukum Kontrak Kerja Konstruksi', 'Banjarmasin', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', '2022-08-22', '2022-08-31', 30),
(17, 'Pengadaan Barang/Jasa Pemerintah Tingkat Dasar (Level 1)', 'Banjarmasin', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', '2022-09-12', '2022-09-26', 30),
(18, 'Penyusunan Rencana Anggaran Biaya Pekerjaan Jalan dan Jembatan', 'Banjarmasin', 'Jalan dan Jembatan', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW', '2022-09-19', '2022-09-27', 30),
(19, 'KPBU untuk Proyek Perumahan', 'Banjarmasin', 'Pengembangan Infrastruktur Wilayah', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW', '2022-09-29', '2022-09-29', 90),
(20, 'Pengelolaan Pinjaman dan Hibah Luar Negeri (PHLN)', 'Banjarmasin', 'Manajemen Umum', 'Pusat Pengembangan Kompetensi Manajemen', '2022-11-07', '2022-11-11', 30),
(21, 'Kelayakan Proyek Penyediaan Infrastruktur', 'Banjarmasin', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', '2021-10-27', '2021-11-04', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_pendaftar` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_pelatihan` varchar(100) NOT NULL,
  `bidang_pelatihan` varchar(100) NOT NULL,
  `pusat_penyelenggara` varchar(100) NOT NULL,
  `predikat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `id_pendaftar`, `nama`, `nama_pelatihan`, `bidang_pelatihan`, `pusat_penyelenggara`, `predikat`) VALUES
(8, '00005', 'Mulkani', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Memuaskan'),
(9, '00006', 'Fauzar Asyauri, S.Kom.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Baik Sekali'),
(10, '00007', 'Heryanda Ade Saputra', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Baik'),
(11, '00008', 'Muhammad Azis, S.H.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Tidak Lulus'),
(12, '00009', 'Rahmina, S.Pd.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Sangat Memuaskan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `id_pendaftar` varchar(100) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `pas_foto` varchar(100) NOT NULL,
  `status_daftar` varchar(100) NOT NULL,
  `keterangan_ditolak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `id_pendaftar`, `tanggal_daftar`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon`, `email`, `alamat`, `foto_ktp`, `pas_foto`, `status_daftar`, `keterangan_ditolak`) VALUES
(5, '00005', '2022-01-13', '6371010811890010', 'Mulkani', 'Amuntai', '1989-11-08', 'Laki-Laki', '082255555555', 'kanie.ahmad@gmail.com', 'Jalan Nakula V', '85401-vb_rakor-pbj-2020.jpg', '7ff38-pas-foto-kani.jpeg', 'Diterima', ''),
(6, '00006', '2022-01-14', '6371010501900011', 'Fauzar Asyauri, S.Kom.', 'Kapar', '1996-06-16', 'Laki-Laki', '082266666666', 'kanie.ahmad@gmail.com', 'Jalan Nakula VI', '473df-lawzmwu4zpkk7y86zmcs.jpg', '38b2f-lawzmwu4zpkk7y86zmcs.jpg', 'Diterima', ''),
(7, '00007', '2022-01-14', '6301022210950003', 'Heryanda Ade Saputra', 'Banjarmasin', '1989-12-07', 'Laki-Laki', '082277777777', 'kanie.ahmad@gmail.com', 'Jalan Yos Sudarso', '424e0-laut.jpg', '2549f-laut.jpg', 'Diterima', ''),
(8, '00008', '2022-01-14', '1207281606960005', 'Muhammad Azis, S.H.', 'Anjir Pasar', '1997-03-23', 'Laki-Laki', '082288888888', 'kanie.ahmad@gmail.com', 'Anjir Pasar', '7e6d8-ari.jpg', '12220-ari.jpg', 'Diterima', ''),
(9, '00009', '2022-02-01', '199205182019122001', 'Rahmina, S.Pd.', 'Banjarmasin', '1992-05-18', 'Perempuan', '082299999999', 'kanie.ahmad@gmail.com', 'Jalan Nakula V', 'a9eec-screenshot-6-.png', '6e75c-screenshot-6-.png', 'Diterima', ''),
(10, '00010', '2022-02-01', '199209032017122001', 'Adawiyah, A.Mk.', 'Banjarmasin', '1992-09-03', 'Perempuan', '082210101010', 'kanie.ahmad01@gmail.com', 'Jalan Beruntung Jaya', '0a2d8-screenshot-47-.png', '45aae-screenshot-47-.png', 'Baru', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_pendaftar` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_pelatihan` varchar(100) NOT NULL,
  `bidang_pelatihan` varchar(100) NOT NULL,
  `pusat_penyelenggara` varchar(100) NOT NULL,
  `lokasi_pelatihan` varchar(100) NOT NULL,
  `mulai_pelatihan` date NOT NULL,
  `akhir_pelatihan` date NOT NULL,
  `status_pelatihan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `tanggal_daftar`, `id_pendaftar`, `nik`, `nama`, `nama_pelatihan`, `bidang_pelatihan`, `pusat_penyelenggara`, `lokasi_pelatihan`, `mulai_pelatihan`, `akhir_pelatihan`, `status_pelatihan`, `keterangan`) VALUES
(31, '2022-01-14', '00005', '082255555555', 'Mulkani', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', 'Alumni', ''),
(32, '2022-01-14', '00005', '082255555555', 'Mulkani', 'Perencanaan Teknis Rawa', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', 'Banjarmasin', '2022-01-17', '2022-01-31', 'Diterima', ''),
(33, '2022-01-14', '00005', '082255555555', 'Mulkani', 'Pengawasan dan Pengendalian Pembangunan Rumah Susun', 'Perumahan', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW', 'Banjarmasin', '2022-06-06', '2022-06-17', 'Belum Diverifikasi', ''),
(34, '2022-01-14', '00005', '082255555555', 'Mulkani', 'Pengadaan Barang/Jasa Pemerintah Tingkat Dasar (Level 1)', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2022-09-12', '2022-09-26', 'Belum Diverifikasi', ''),
(35, '2022-01-14', '00006', '082266666666', 'Fauzar Asyauri, S.Kom.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', 'Alumni', ''),
(36, '2022-01-14', '00006', '082266666666', 'Fauzar Asyauri, S.Kom.', 'Perencanaan Teknis Rawa', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', 'Banjarmasin', '2022-01-17', '2022-01-31', 'Diterima', ''),
(37, '2022-01-14', '00006', '082266666666', 'Fauzar Asyauri, S.Kom.', 'Perencanaan Teknis Irigasi', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', 'Banjarmasin', '2022-02-14', '2022-03-02', 'Belum Diverifikasi', ''),
(38, '2022-01-14', '00006', '082266666666', 'Fauzar Asyauri, S.Kom.', 'Penyusunan Rencana Anggaran Biaya Pekerjaan Jalan dan Jembatan', 'Jalan dan Jembatan', 'Pusat Pengembangan Kompetensi Jalan, Perumahan dan PIW', 'Banjarmasin', '2022-09-19', '2022-09-27', 'Belum Diverifikasi', ''),
(39, '2022-01-14', '00007', '082277777777', 'Heryanda Ade Saputra', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', 'Alumni', ''),
(40, '2022-01-14', '00007', '082277777777', 'Heryanda Ade Saputra', 'Perencanaan Teknis Rawa', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', 'Banjarmasin', '2022-01-17', '2022-01-31', 'Ditolak (Persyaratan Peserta Tidak Sesuai)', 'Minimal Pendidikan S1- Teknik Sipil'),
(41, '2022-01-14', '00007', '082277777777', 'Heryanda Ade Saputra', 'Sistem Manajemen Operasi dan Pemeliharaan Irigasi (SMOPI)', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', 'Banjarmasin', '2022-07-04', '2022-07-12', 'Belum Diverifikasi', ''),
(42, '2022-01-14', '00008', '082288888888', 'Muhammad Azis, S.H.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', 'Alumni', ''),
(43, '2022-01-14', '00008', '082288888888', 'Muhammad Azis, S.H.', 'Perencanaan Teknis Rawa', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', 'Banjarmasin', '2022-01-17', '2022-01-31', 'Ditolak (Kuota Sudah Terpenuhi)', 'Peserta sudah mencapai 30 orang'),
(44, '2022-01-14', '00008', '082288888888', 'Muhammad Azis, S.H.', 'Pengelolaan Pinjaman dan Hibah Luar Negeri (PHLN)', 'Manajemen Umum', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2022-11-07', '2022-11-11', 'Belum Diverifikasi', ''),
(45, '2022-02-01', '00009', '082299999999', 'Rahmina, S.Pd.', 'Kelayakan Proyek Penyediaan Infrastruktur', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2021-10-27', '2021-11-04', 'Alumni', ''),
(46, '2022-02-01', '00009', '082299999999', 'Rahmina, S.Pd.', 'Perencanaan Teknis Rawa', 'Sumber Daya Air', 'Pusat Pengembangan Kompetensi SDA dan Permukiman', 'Banjarmasin', '2022-01-17', '2022-01-31', 'Belum Diverifikasi', ''),
(47, '2022-02-01', '00009', '082299999999', 'Rahmina, S.Pd.', 'Pengadaan Barang/Jasa Pemerintah Tingkat Dasar (Level 1)', 'Manajemen Konstruksi', 'Pusat Pengembangan Kompetensi Manajemen', 'Banjarmasin', '2022-09-12', '2022-09-26', 'Belum Diverifikasi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd`
--

CREATE TABLE `ttd` (
  `id` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_kepala_balai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ttd`
--

INSERT INTO `ttd` (`id`, `nip`, `nama_kepala_balai`) VALUES
(1, '197904182005021001', 'Diki Zulkarnaen, S.T., M.Sc.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','peserta') NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `role`, `status`, `foto`) VALUES
(5, '00005', '082255555555', 'Mulkani', 'peserta', 'Diterima', '7ff38-pas-foto-kani.jpeg'),
(6, '00006', '082266666666', 'Fauzar Asyauri, S.Kom.', 'peserta', 'Diterima', '38b2f-lawzmwu4zpkk7y86zmcs.jpg'),
(7, '00007', '082277777777', 'Heryanda Ade Saputra', 'peserta', 'Diterima', '2549f-laut.jpg'),
(8, '00008', '082288888888', 'Muhammad Azis, S.H.', 'peserta', 'Diterima', '12220-ari.jpg'),
(9, '00009', '082299999999', 'Rahmina, S.Pd.', 'peserta', 'Diterima', '6e75c-screenshot-6-.png'),
(9999, 'admin', 'admin', 'Administrator', 'admin', 'Diterima', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang_pelatihan`
--
ALTER TABLE `bidang_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pelatihan`
--
ALTER TABLE `jenis_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttd`
--
ALTER TABLE `ttd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bidang_pelatihan`
--
ALTER TABLE `bidang_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `jenis_pelatihan`
--
ALTER TABLE `jenis_pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `ttd`
--
ALTER TABLE `ttd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
