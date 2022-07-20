-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Jul 2022 pada 11.14
-- Versi server: 8.0.29
-- Versi PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sulfat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_07_03_140104_create_periodes_table', 1),
(4, '2022_07_03_140515_create_permintaans_table', 1),
(5, '2022_07_03_141233_create_peramalans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan`
--

CREATE TABLE `peramalan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_periode` bigint UNSIGNED NOT NULL,
  `id_permintaan` bigint UNSIGNED NOT NULL,
  `permintaan` double NOT NULL,
  `peramalan` double DEFAULT NULL,
  `error` double DEFAULT NULL,
  `mad` double DEFAULT NULL,
  `mse` double DEFAULT NULL,
  `mape` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peramalan`
--

INSERT INTO `peramalan` (`id`, `id_periode`, `id_permintaan`, `permintaan`, `peramalan`, `error`, `mad`, `mse`, `mape`) VALUES
(1, 1, 1, 151742, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, 190285, NULL, NULL, NULL, NULL, NULL),
(3, 3, 3, 132906, NULL, NULL, NULL, NULL, NULL),
(4, 4, 4, 125811, 158311, -32500, 32500, 1056250000, 26),
(5, 5, 5, 139020, 149667, -10647, 10647, 113358609, 8),
(6, 6, 6, 176317, 132579, 43738, 43738, 1913012644, 25),
(7, 7, 7, 153453, 147049, 6404, 6404, 41011216, 4),
(8, 8, 8, 125749, 156263, -30514, 30514, 931104196, 24),
(9, 9, 9, 125903, 151839, -25936, 25936, 672676096, 21),
(10, 10, 10, 128464, 135035, -6571, 6571, 43178041, 5),
(11, 11, 11, 78739, 126705, -47966, 47966, 2300737156, 61),
(12, 12, 12, 87731, 111035, -23304, 23304, 543076416, 27),
(13, 13, 13, 168763, 98311, 70452, 70452, 4963484304, 42),
(14, 14, 14, 139246, 111744, 27502, 27502, 756360004, 20),
(15, 15, 15, 162513, 131913, 30600, 30600, 936360000, 19),
(16, 16, 16, 142653, 156840, -14187, 14187, 201270969, 10),
(17, 17, 17, 134134, 148137, -14003, 14003, 196084009, 10),
(18, 18, 18, 127073, 146433, -19360, 19360, 374809600, 15),
(19, 19, 19, 163883, 134620, 29263, 29263, 856323169, 18),
(20, 20, 20, 157944, 141696, 16248, 16248, 263997504, 10),
(21, 21, 21, 162185, 149633, 12552, 12552, 157552704, 8),
(22, 22, 22, 185946, 161337, 24609, 24609, 605602881, 13),
(23, 23, 23, 173347, 168691, 4656, 4656, 21678336, 3),
(24, 24, 24, 173422, 173826, -404, 404, 163216, 0),
(25, 25, 25, 137072, 177571, -40499, 40499, 1640169001, 30),
(26, 26, 26, 97923, 161280, -63357, 63357, 4014109449, 65),
(27, 27, 27, 126132, 136139, -10007, 10007, 100140049, 8),
(28, 28, 28, 130854, 120375, 10479, 10479, 109809441, 8),
(29, 29, 29, 133743, 118303, 15440, 15440, 238393600, 12),
(30, 30, 30, 131966, 130243, 1723, 1723, 2968729, 1),
(31, 31, 31, 144794, 132187, 12607, 12607, 158936449, 9),
(32, 32, 32, 117055, 136834, -19779, 19779, 391208841, 17),
(33, 33, 33, 140980, 131271, 9709, 9709, 94264681, 7),
(34, 34, 34, 129438, 134276, -4838, 4838, 23406244, 4),
(35, 35, 35, 79945, 129157, -49212, 49212, 2421820944, 62),
(36, 36, 36, 111651, 116787, -5136, 5136, 26378496, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `nama_periode`) VALUES
(1, '2018-01-01'),
(2, '2018-02-01'),
(3, '2018-03-01'),
(4, '2018-04-01'),
(5, '2018-05-01'),
(6, '2018-06-01'),
(7, '2018-07-01'),
(8, '2018-08-01'),
(9, '2018-09-01'),
(10, '2018-10-01'),
(11, '2018-11-01'),
(12, '2018-12-01'),
(13, '2019-01-01'),
(14, '2019-02-01'),
(15, '2019-03-01'),
(16, '2019-04-01'),
(17, '2019-05-01'),
(18, '2019-06-01'),
(19, '2019-07-01'),
(20, '2019-08-01'),
(21, '2019-09-01'),
(22, '2019-10-01'),
(23, '2019-11-01'),
(24, '2019-12-01'),
(25, '2020-01-01'),
(26, '2020-02-01'),
(27, '2020-03-01'),
(28, '2020-04-01'),
(29, '2020-05-01'),
(30, '2020-06-01'),
(31, '2020-07-01'),
(32, '2020-08-01'),
(33, '2020-09-01'),
(34, '2020-10-01'),
(35, '2020-11-01'),
(36, '2020-12-01'),
(37, '2021-01-01'),
(38, '2021-02-01'),
(39, '2021-03-01'),
(40, '2021-04-01'),
(41, '2021-05-01'),
(42, '2021-06-01'),
(43, '2021-07-01'),
(44, '2021-08-01'),
(45, '2021-09-01'),
(46, '2021-10-01'),
(47, '2021-11-01'),
(48, '2021-12-01'),
(49, '2022-01-01'),
(50, '2022-02-01'),
(51, '2022-03-01'),
(52, '2022-04-01'),
(53, '2022-05-01'),
(54, '2022-06-01'),
(55, '2022-07-01'),
(56, '2022-08-01'),
(57, '2022-09-01'),
(58, '2022-10-01'),
(59, '2022-11-01'),
(60, '2022-12-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_periode` bigint UNSIGNED NOT NULL,
  `jumlah_produksi` int NOT NULL DEFAULT '0',
  `jumlah_impor` int NOT NULL DEFAULT '0',
  `jumlah_permintaan` int NOT NULL DEFAULT '0',
  `jumlah_sisa` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id`, `id_periode`, `jumlah_produksi`, `jumlah_impor`, `jumlah_permintaan`, `jumlah_sisa`) VALUES
(1, 1, 101478, 52866, 151742, 12629),
(2, 2, 100487, 87434, 190285, 10313),
(3, 3, 53969, 95194, 132906, 26402),
(4, 4, 38067, 62728, 125811, 14947),
(5, 5, 68650, 114862, 139020, 55966),
(6, 6, 1548, 138669, 176317, 24877),
(7, 7, 17698, 125294, 153453, 16281),
(8, 8, 26981, 105702, 125749, 23693),
(9, 9, 0, 125596, 125903, 15932),
(10, 10, 0, 126370, 128464, 15546),
(11, 11, 36235, 46772, 78739, 22090),
(12, 12, 62442, 32189, 87731, 18259),
(13, 13, 76088, 101349, 168763, 15439),
(14, 14, 44499, 137361, 139246, 46530),
(15, 15, 53651, 90228, 162513, 29559),
(16, 16, 50683, 77427, 142653, 7514),
(17, 17, 59991, 115903, 134134, 28385),
(18, 18, 56684, 87299, 127073, 33345),
(19, 19, 69975, 116158, 163883, 51688),
(20, 20, 21301, 88870, 157944, 52138),
(21, 21, 69373, 85318, 162185, 45866),
(22, 22, 101706, 109536, 185946, 55648),
(23, 23, 50299, 63844, 173347, 56796),
(24, 24, 97714, 72994, 173422, 54014),
(25, 25, 57805, 61276, 137072, 28283),
(26, 26, 82869, 66105, 97923, 46511),
(27, 27, 83131, 77590, 126132, 40229),
(28, 28, 37644, 140814, 130854, 51643),
(29, 29, 31285, 122234, 133743, 28964),
(30, 30, 68344, 69044, 131966, 11362),
(31, 31, 96289, 93043, 144794, 19926),
(32, 32, 67896, 86834, 117055, 49040),
(33, 33, 72912, 76767, 140980, 31982),
(34, 34, 75260, 79246, 129438, 26377),
(35, 35, 93512, 29409, 79945, 45485),
(36, 36, 84321, 58489, 111651, 41289);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peramalan_id_periode_foreign` (`id_periode`),
  ADD KEY `peramalan_id_permintaan_foreign` (`id_permintaan`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permintaan_id_periode_foreign` (`id_periode`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD CONSTRAINT `peramalan_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peramalan_id_permintaan_foreign` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
