-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2020 pada 11.09
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran-ujikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanans`
--

CREATE TABLE `detail_pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('keranjang','dipesan','diterima','dibayar','dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kat`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', NULL, NULL),
(2, 'Minuman', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `id_pelanggan`, `id_menu`, `created_at`, `updated_at`) VALUES
(3, 7, 1, '2020-01-29 19:02:22', '2020-01-29 19:02:22'),
(4, 7, 4, '2020-01-29 21:33:54', '2020-01-29 21:33:54'),
(5, 7, 4, '2020-01-29 22:00:35', '2020-01-29 22:00:35'),
(6, 7, 4, '2020-01-29 22:03:26', '2020-01-29 22:03:26'),
(7, 7, 1, '2020-01-29 22:05:06', '2020-01-29 22:05:06'),
(8, 7, 1, '2020-01-29 22:05:47', '2020-01-29 22:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mejas`
--

CREATE TABLE `mejas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_meja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('kosong','terisi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mejas`
--

INSERT INTO `mejas` (`id`, `no_meja`, `status`, `password`, `created_at`, `updated_at`) VALUES
(1, '1', 'terisi', '0101', NULL, '2020-01-29 17:51:04'),
(2, '2', 'terisi', '0202', NULL, '2020-01-28 17:16:52'),
(3, '3', 'terisi', '0303', NULL, '2020-01-29 18:08:50'),
(4, '4', 'terisi', '0404', NULL, '2020-01-29 18:18:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `status` enum('tersedia','habis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `harga`, `id_kategori`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Sate Uhuy', 18000, 1, 'tersedia', '/img/IMG-20200117-WA0048.jpg', '2020-01-24 20:36:42', '2020-01-24 20:36:42'),
(2, 'Nasi Suka Kamu', 18000, 1, 'habis', '/img/IMG-20200117-WA0046.jpg', '2020-01-24 20:39:02', '2020-01-24 23:29:06'),
(3, 'Boba Kotak', 25000, 2, 'tersedia', '/img/boba.jpg', '2020-01-24 20:41:51', '2020-01-24 20:41:51'),
(4, 'Bakso Edun', 30000, 1, 'tersedia', '/img/IMG-20200117-WA0045.jpg', '2020-01-24 20:45:02', '2020-01-24 20:45:02'),
(5, 'Mie Ayam Nuklir', 28000, 1, 'habis', '/img/IMG-20200117-WA0047.jpg', '2020-01-24 20:50:11', '2020-01-24 20:50:11'),
(6, 'Thai Tea Euy', 14000, 2, 'tersedia', '/img/unnamed.png', '2020-01-24 22:48:01', '2020-01-24 22:48:01'),
(7, 'Mojito Mojitoan', 20000, 2, 'tersedia', '/img/tweaked-mojito.jpeg', '2020-01-24 23:18:09', '2020-01-24 23:18:09'),
(8, 'Ayam Geprek HAH', 28000, 1, 'tersedia', '/img/ayamgerek.jpg', '2020-01-24 23:24:59', '2020-01-24 23:24:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2020_01_15_124014_create_pelanggans_table', 1),
(22, '2020_01_15_124335_create_menus_table', 1),
(23, '2020_01_15_124545_create_pesanans_table', 1),
(24, '2020_01_15_124751_create_mejas_table', 1),
(25, '2020_01_15_130958_create_kategoris_table', 1),
(26, '2020_01_15_133920_create_detail_pesanans_table', 1),
(27, '2020_01_25_073950_create_keranjangs_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_meja` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `id_meja`, `created_at`, `updated_at`) VALUES
(1, 'Coyyy', 1, '2020-01-24 20:43:27', '2020-01-24 20:43:27'),
(2, 'Attar', 3, '2020-01-27 00:14:50', '2020-01-27 00:14:50'),
(3, 'Aditya Fakhri', 4, '2020-01-27 02:28:37', '2020-01-27 02:28:37'),
(4, 'wawey', 2, '2020-01-28 17:16:52', '2020-01-28 17:16:52'),
(5, 'attar', 1, '2020-01-29 17:51:04', '2020-01-29 17:51:04'),
(6, 'Adit', 3, '2020-01-29 18:08:50', '2020-01-29 18:08:50'),
(7, 'Aditya Fakhri', 4, '2020-01-29 18:18:15', '2020-01-29 18:18:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','waiter','kasir','owner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `foto`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@email.com', NULL, 'admin', NULL, '$2y$10$GsH8731O7c8PoHh23ioZ5.t4/YlUvtxEsAoUSTIiZs8MOhK4e9zuS', NULL, '2020-01-24 20:28:41', '2020-01-24 20:28:41'),
(2, 'waiter1', 'Aditya Fakhri', 'waiter1@email.com', '/img/Aditya Fakhri Riansyah.JPG', 'waiter', NULL, '$2y$10$gD9GVgCgC6Jfsi1ZbfcOPOQudGsQjEauo4i6UgZghvc.nvFfDXgQe', NULL, '2020-01-24 20:32:01', '2020-01-24 20:32:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mejas`
--
ALTER TABLE `mejas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mejas`
--
ALTER TABLE `mejas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD CONSTRAINT `detail_pesanans_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanans_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD CONSTRAINT `pelanggans_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `mejas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanans_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
