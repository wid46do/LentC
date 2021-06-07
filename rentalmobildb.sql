-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2021 pada 01.54
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobildb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `mobil_id` int(20) NOT NULL,
  `Nama` text NOT NULL,
  `seats` varchar(5) NOT NULL,
  `suitcase` varchar(5) NOT NULL,
  `warna` text NOT NULL,
  `harga_sewa` int(20) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`mobil_id`, `Nama`, `seats`, `suitcase`, `warna`, `harga_sewa`, `gambar`) VALUES
(1, 'Tesla ', '4', '2', 'Hitam', 500000, 'Tesla.jpg'),
(2, 'Kijang Inova ', '7', '2', 'Hitam', 500000, 'mobil.jpg'),
(15, 'Daihatsu Xenia', '7', '3', 'Biru', 400000, 'xenia.jfif'),
(20, 'Fortuner', '5', '2', 'Putih', 500000, '608f6c53afdd9.png'),
(21, 'Toyota Alphard', '7', '4', 'Putih', 600000, '608f6e2497ec4.jpg'),
(22, 'Toyota Cayla', '5', '2', 'Merah', 380000, '608f700522b6f.jpg'),
(23, 'Toyota Agya', '5', '2', 'Abu-abu', 380000, '608fe46994330.png'),
(24, 'Toyota All New Avanza', '7', '2', 'Hitam', 400000, '608fe3cfb4380.jpg'),
(25, 'Suzuki Ertiga', '7', '2', 'Putih', 400000, '608f7222d097d.jpg'),
(26, 'Mitsubishi Xpander', '7', '2', 'Silver', 405000, '608f72fbd47de.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_mobil`, `id_user`, `date1`, `date2`, `total`) VALUES
(33, 1, 18, '2021-05-28', '2021-05-31', 1500000),
(34, 23, 20, '2021-05-28', '2021-05-31', 1140000),
(35, 26, 21, '2021-06-04', '2021-06-05', 405000),
(36, 22, 18, '2021-06-06', '2021-06-10', 1520000),
(37, 2, 23, '2021-06-06', '2021-06-10', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_lengkap`, `password`) VALUES
(18, 'Ruben', 'Ruben Widagdo', '$2y$10$uqKgp3aNVzi5BLfIsPqk2u4o0WNQYj63W2bAbqFtLfm5gUMpeHGom'),
(19, 'admin', 'admin', '$2y$10$3g5fXPKEMhQrYqKsAIujfO/OzW5atGFgxmZlmpdIApFHE6F7STtO.'),
(20, 'randi', 'randi lutfia', '$2y$10$gCWzxShitq8EqMRW96ZeX.VVMV/4h20E1auoLQFipupDBdwZUmiZO'),
(21, '123', '123', '$2y$10$ZWJPaWdkHkE0JslQxeUT4OcrFEJbkfcYSuAWX55kVIWLJN4uWvyfS'),
(22, 'zayid', 'zayid', '$2y$10$IZ70EhnAfKAl0GLK7DGLNeb9T.xtDu05qxnYXGRJHppkzlKvr6IpS'),
(23, 'ellen', 'ellen', '$2y$10$cGBV/1Y6VZLaJfu0w1aL/.me5WCGj/qoReqNeWw7FmGYMPrFQAhbO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`mobil_id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `fk2` (`id_mobil`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `mobil_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`mobil_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
