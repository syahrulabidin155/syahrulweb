-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: 01 Feb 2024 pada 03.44
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simbps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `kd_tamu` varchar(11) NOT NULL,
  `tujuan_tamu` varchar(255) NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `nomor_tamu` varchar(20) NOT NULL,
  `identitas_tamu` varchar(255) NOT NULL,
  `noident_tamu` varchar(255) NOT NULL,
  `asal_tamu` varchar(255) NOT NULL,
  `petugas_tamu` varchar(255) NOT NULL,
  `catatan_tamu` text NOT NULL,
  `tgl_tamu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`kd_tamu`, `tujuan_tamu`, `nama_tamu`, `jenis_kelamin`, `nomor_tamu`, `identitas_tamu`, `noident_tamu`, `asal_tamu`, `petugas_tamu`, `catatan_tamu`, `tgl_tamu`) VALUES
('KT0001', 'magang', 'Syahrul Abidin', 'laki-laki', '089484767486', 'ss', 'hss', 'sss', 's', 's', '2024-01-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `kd_kegiatan` varchar(50) NOT NULL,
  `nipbps` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `file_kegiatan` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_kegiatan`
--

INSERT INTO `laporan_kegiatan` (`kd_kegiatan`, `nipbps`, `tanggal`, `file_kegiatan`) VALUES
('KL0001', 340015800, '0000-00-00', 0x61646d696e2f75706c6f75642f4a616477616c204d6167616e67204b502e786c7378),
('KL0002', 340015800, '0000-00-00', 0x61646d696e2f75706c6f75642f5375726174205065726e79617461616e2050656e7369756e2e706466),
('KL0003', 340015800, '0000-00-00', 0x61646d696e2f75706c6f75642f4b6173204b6f6e7472616b616e2e786c7378),
('KL0004', 340015800, '0000-00-00', 0x61646d696e2f75706c6f75642f4b6173204b6f6e7472616b616e2e786c7378),
('KL0005', 340015800, '0000-00-00', 0x61646d696e2f75706c6f75642f4a616477616c204d6167616e67204b502e786c7378);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nipbps` int(20) NOT NULL,
  `nip` bigint(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kd_org` int(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `gol_akhir` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nipbps`, `nip`, `nama`, `kd_org`, `jabatan`, `wilayah`, `gol_akhir`, `status`) VALUES
(340015800, 197707131999011001, 'Mohamad Ismail, S. Si, M.Ec.Dev', 92800, 'Kepala BPS Kabupaten/Kota', 'Kab. Sidoarjo', 'IV/b', 'PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` varchar(6) NOT NULL,
  `n_pelapor` varchar(30) NOT NULL,
  `j_pelapor` varchar(30) NOT NULL,
  `d_pelapor` varchar(30) NOT NULL,
  `n_barang` varchar(30) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `ket_petugas` varchar(100) NOT NULL,
  `tgl_lapor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `n_pelapor`, `j_pelapor`, `d_pelapor`, `n_barang`, `ket`, `status`, `ket_petugas`, `tgl_lapor`) VALUES
('NP0001', 'Doni', 'Staff', 'Media Informasi', 'Printer', 'Cartridge rusak', 'Selesai diproses', 'Cartridge telah diperbaiki dan dapat digunakan', '2020-12-22'),
('NP0003', 'Johan', 'Staff', 'Media Informasi', 'Proyektor', 'Tampilan buram', 'Sedang diproses', 'Proyektor sedang diperiksa oleh petugas', '2021-01-18'),
('NP0005', 'syahrul', 'psg', 'it', 'laptop', 'rusak', 'Selesai diproses', '-', '2024-01-13'),
('NP0006', 'saya', 'anggota', 'it', 'hp', 'rusak\r\n', 'Selesai diproses', 'selesai', '2024-01-13'),
('NP0007', 'saya', 's', 'ss', 'ss', 's\r\n', 'Sedang diajukan', '-', '2024-01-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `kd_surat` varchar(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `img`, `status`) VALUES
(13, '1', '$2y$10$5RQkhvQHy/zU/2BvEBknBuJbF5ZzHjCBa6tKxii5h5jzbe4d93jqO', 'Syahrul Abidin', 'default.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`kd_tamu`);

--
-- Indexes for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`kd_kegiatan`),
  ADD KEY `nipbps` (`nipbps`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nipbps`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`kd_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `nipbps` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340015801;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD CONSTRAINT `laporan_kegiatan_ibfk_1` FOREIGN KEY (`nipbps`) REFERENCES `pegawai` (`nipbps`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
