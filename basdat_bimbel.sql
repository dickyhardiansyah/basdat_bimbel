-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Jul 2018 pada 10.59
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basdat_bimbel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `id_pengajar_pelajaran` int(10) UNSIGNED NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_kelas`
--

INSERT INTO `jadwal_kelas` (`id`, `id_kelas`, `id_pengajar_pelajaran`, `hari`, `jam_mulai`, `jam_berakhir`) VALUES
(1, 1, 12, 'Kamis', '12:00:00', '15:00:00'),
(2, 1, 12, 'Rabu', '23:00:00', '02:00:00'),
(3, 2, 20, 'Rabu', '12:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Djuanda - I'),
(2, 'Djuanda - II'),
(3, 'Djuanda - III'),
(4, 'Soeharto - I'),
(5, 'Kalkulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(6) NOT NULL,
  `nama_pelajaran` varchar(30) NOT NULL,
  `tingkat_pendidikan` enum('SMA','SMP','SD') NOT NULL,
  `jurusan` enum('IPA','IPS','Bahasa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_pelajaran`, `tingkat_pendidikan`, `jurusan`) VALUES
('SMA101', 'Matematika', 'SMA', 'IPA'),
('SMA102', 'Bahasa Indonesia', 'SMA', 'IPA'),
('SMP101', 'Bahasa Indonesia', 'SMP', NULL),
('SMP102', 'Kimia', 'SMP', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nis` char(10) NOT NULL,
  `id_pengajar_pelajaran` int(11) UNSIGNED NOT NULL,
  `nilai` int(3) UNSIGNED NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `nip` char(18) NOT NULL,
  `nama_pengajar` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`nip`, `nama_pengajar`, `jenis_kelamin`, `tanggal_lahir`, `no_telepon`) VALUES
('10116150', 'Dicky Hardiansyah', 'Laki-laki', '1997-12-12', '089712347654'),
('10116167', 'Satria Adi Putra', 'Laki-laki', '1998-09-14', '085770431325');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar_pelajaran`
--

CREATE TABLE `pengajar_pelajaran` (
  `id_pengajar_pelajaran` int(10) UNSIGNED NOT NULL,
  `nip` char(18) NOT NULL,
  `kode_mapel` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajar_pelajaran`
--

INSERT INTO `pengajar_pelajaran` (`id_pengajar_pelajaran`, `nip`, `kode_mapel`) VALUES
(12, '10116167', 'SMA102'),
(13, '10116167', 'SMP101'),
(19, '10116150', 'SMA101'),
(20, '10116150', 'SMP101');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tingkat_pendidikan` enum('SMA','SMP','SD') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `asal_sekolah`, `tanggal_lahir`, `tingkat_pendidikan`, `jenis_kelamin`, `no_telepon`, `id_kelas`) VALUES
('10116148', 'Dicky Hardiansyah', 'SMAN 1 Majalengka', '1997-12-12', 'SMP', 'Laki-laki', '089767652887', 2),
('10116150', 'Rahmad', 'SMA 1 Sumedang', '2018-07-02', 'SMA', 'Laki-laki', '097867656667', 2),
('10116156', 'Dzaki Fakhruddin', 'SMP 1 Cirebon', '1998-10-10', 'SMP', 'Laki-laki', '085770431325', 4),
('10116159', 'Ricky Fahmi Nugraha', 'SMAN 1 Majalengka', '1997-11-10', 'SMA', 'Laki-laki', '089712347654', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_kelas_id_kelas_idx` (`id_kelas`),
  ADD KEY `fk_jadwal_kelas_id_pengajar_pelajaran_idx` (`id_pengajar_pelajaran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_siswa_nisn_idx` (`nis`),
  ADD KEY `fk_nilai_siswa_id_pengajar_pelajaran_idx` (`id_pengajar_pelajaran`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pengajar_pelajaran`
--
ALTER TABLE `pengajar_pelajaran`
  ADD PRIMARY KEY (`id_pengajar_pelajaran`),
  ADD KEY `fk_pengajar_pelajaran_nip_idx` (`nip`),
  ADD KEY `fk_pengajar_pelajaran_kode_mp_idx` (`kode_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_siswa_id_kelas_idx` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengajar_pelajaran`
--
ALTER TABLE `pengajar_pelajaran`
  MODIFY `id_pengajar_pelajaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD CONSTRAINT `fk_jadwal_kelas_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_jadwal_kelas_id_pengajar_pelajaran` FOREIGN KEY (`id_pengajar_pelajaran`) REFERENCES `pengajar_pelajaran` (`id_pengajar_pelajaran`);

--
-- Ketidakleluasaan untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `fk_nilai_siswa_id_pengajar_pelajaran` FOREIGN KEY (`id_pengajar_pelajaran`) REFERENCES `pengajar_pelajaran` (`id_pengajar_pelajaran`),
  ADD CONSTRAINT `fk_nilai_siswa_nisn` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Ketidakleluasaan untuk tabel `pengajar_pelajaran`
--
ALTER TABLE `pengajar_pelajaran`
  ADD CONSTRAINT `fk_pengajar_pelajaran_kode_mp` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`),
  ADD CONSTRAINT `fk_pengajar_pelajaran_nip` FOREIGN KEY (`nip`) REFERENCES `pengajar` (`nip`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
