-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2023 pada 03.00
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
-- Database: `db_fruitstore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(203, '2014_10_12_000000_create_users_table', 1),
(204, '2014_10_12_100000_create_password_resets_table', 1),
(205, '2019_08_19_000000_create_failed_jobs_table', 1),
(206, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(207, '2023_11_13_143352_create_table_product', 1),
(208, '2023_11_13_143422_create_table_cart', 1),
(209, '2023_11_16_131512_create_table_order', 1),
(210, '2023_11_16_131519_create_table_orderitems', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('unpaid','paid','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orderitems`
--

CREATE TABLE `tb_orderitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('aktif','non-aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id`, `product_name`, `img`, `price`, `stok`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Stroberi', 'stroberi.jpg', '24000', 24, 'aktif', '2023-11-17 01:59:59', '2023-11-17 01:59:59'),
(2, 'Anggur', 'anggur.jpg', '49000', 20, 'aktif', '2023-11-17 01:59:59', '2023-11-17 01:59:59'),
(3, 'Lemon', 'lemon.jpg', '45000', 10, 'aktif', '2023-11-17 01:59:59', '2023-11-17 01:59:59'),
(4, 'Kiwi', 'kiwi.jpg', '90000', 2, 'non-aktif', '2023-11-17 01:59:59', '2023-11-17 01:59:59'),
(5, 'Apel Hijau', 'apelhijau.jpg', '40000', 30, 'aktif', '2023-11-17 01:59:59', '2023-11-17 01:59:59'),
(6, 'Raspberry', 'raspberry.jpg', '160000', 0, 'aktif', '2023-11-17 01:59:59', '2023-11-17 01:59:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$A849BRNG2VwgKpCuTDaxsOOAI1Uhy0WZeTrOpANIDoqF4tf5JkxWG', 'admin', 'admin', '2023-11-17 01:59:59', '2023-11-17 01:59:59'),
(2, 'user@gmail.com', '$2y$10$AGfBYCwlPsECfb.2.MGEbOYdBhdtBGVncAAyeEgyMijXrmCg.yoCC', 'user', 'user', '2023-11-17 01:59:59', '2023-11-17 01:59:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cart_user_id_foreign` (`user_id`),
  ADD KEY `tb_cart_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_order_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tb_orderitems`
--
ALTER TABLE `tb_orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_orderitems_order_id_foreign` (`order_id`),
  ADD KEY `tb_orderitems_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_orderitems`
--
ALTER TABLE `tb_orderitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `tb_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_orderitems`
--
ALTER TABLE `tb_orderitems`
  ADD CONSTRAINT `tb_orderitems_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`id`),
  ADD CONSTRAINT `tb_orderitems_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
