-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2025 pada 03.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `gambar1` varchar(255) NOT NULL,
  `gambar2` varchar(255) NOT NULL,
  `gambar3` varchar(255) NOT NULL,
  `gambar4` varchar(255) NOT NULL,
  `ket1` varchar(1000) NOT NULL,
  `ket2` varchar(1000) NOT NULL,
  `pengalaman` int(3) NOT NULL,
  `booking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `ket1`, `ket2`, `pengalaman`, `booking`) VALUES
(3, 'about-1.jpg', 'about-2.jpg', 'about-3.jpg', 'about-4.jpg', 'Taman Kelapa didirikan pada tahun 2018 dengan visi membawa kembali kenangan hangat dan cita rasa otentik masakan rumahan. Pemilik restoran, yang berasal dari desa kecil, merindukan suasana makan bersama keluarga di bawah pohon kelapa. Kita Juga menerima Catering!.', 'Restoran didesain dengan interior bernuansa pedesaan yang nyaman, dilengkapi dengan perabot dari kayu dan hiasan dinding bertema alam. Menu makanan pun didominasi oleh hidangan tradisional Indonesia yang dimasak dengan resep turun-temurun.', 7, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah_tamu` enum('1-orang','2-orang','3-orang','4-orang','5-orang-lebih') NOT NULL,
  `status` enum('belum-konfirmasi','sudah-konfirmasi') NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `nama_customer`, `email`, `no_telp`, `waktu`, `jumlah_tamu`, `status`, `pesan`, `created_at`, `updated_at`) VALUES
(18, 'anakim', 'login123@gmail.com', '3435353', '2025-01-24 17:17:00', '2-orang', 'belum-konfirmasi', 'j', '2025-01-14 14:17:55', '2025-01-14 14:17:55'),
(19, 'anakim', 'mostwantednolimit66@gmail.com', '3435353', '2025-01-14 20:18:00', '2-orang', 'belum-konfirmasi', 'yes', '2025-01-14 14:18:29', '2025-01-14 14:18:29'),
(23, 'anakim', 'mostwantednolimit66@gmail.com', '2147483647', '2025-01-16 21:13:00', '2-orang', 'sudah-konfirmasi', 'nhab', '2025-01-16 09:13:29', '2025-01-16 11:01:40'),
(30, 'anakim', 'mostwantednolimit66@gmail.com', '08952345677', '2025-01-17 05:21:00', '4-orang', 'belum-konfirmasi', 'dfg', '2025-01-17 10:21:16', '2025-01-17 10:21:16'),
(33, 'dana', 'danaraja2006@gmail.com', '089526923741', '2025-01-18 11:40:00', '3-orang', 'belum-konfirmasi', 'halo', '2025-01-18 05:40:38', '2025-01-18 05:40:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `judul1` varchar(255) NOT NULL,
  `judul2` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `judul1`, `judul2`, `keterangan`) VALUES
(1, 'Resto NO.1', 'Di KUDUS', 'Silahkan Lihat berbagai Menu Dan Service Kami, Dijamin Enak Dan Banyak Rekomendasi dari Warga Luar Kota ataupun Warga Sekitar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(5) NOT NULL,
  `kategori` enum('makanan','minuman','catering') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama`, `gambar`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Iga Bakar', 'menu-1.png', 46, 'makanan', '2025-01-07 14:44:03', '2025-01-15 11:47:31'),
(2, 'Sup Iga', 'menu-2.png', 45, 'makanan', '2025-01-07 14:52:25', '2025-01-07 14:52:25'),
(3, 'Gurami Goreng/Bakar Per Ons', 'menu-3.png', 14, 'makanan', '2025-01-07 14:56:29', '2025-01-07 14:56:29'),
(4, 'Nila Goreng/Bakar', 'menu-4.png', 30, 'makanan', '2025-01-07 14:58:22', '2025-01-07 14:58:22'),
(5, 'Ayam Goreng/Bakar/Kremes', 'menu-5.png', 29, 'makanan', '2025-01-08 13:31:20', '2025-01-08 13:31:20'),
(6, 'Bebek Goreng/Bakar', 'menu-6.png', 38, 'makanan', '2025-01-08 13:32:33', '2025-01-08 13:32:33'),
(7, 'Nasi Goreng Spesial', 'menu-7.png', 29, 'makanan', '2025-01-08 13:33:12', '2025-01-08 13:33:12'),
(8, 'Bakmi Goreng/Kuah Spesial', 'menu-8.png', 30, 'makanan', '2025-01-08 13:33:58', '2025-01-08 13:33:58'),
(12, 'Teh Manis Hangat/Es', 'esteh.png', 6, 'minuman', '2025-01-10 15:05:02', '2025-01-10 15:05:02'),
(13, 'Es Taman Kelapa', 'esbuah.png', 25, 'minuman', '2025-01-10 15:05:40', '2025-01-10 15:05:40'),
(14, 'Avocado Float', 'avocado.png', 24, 'minuman', '2025-01-10 15:06:07', '2025-01-14 15:07:01'),
(15, 'Vanilla Coffe Float', 'vanilla.png', 27, 'minuman', '2025-01-10 15:06:39', '2025-01-14 15:07:09'),
(16, 'Orange Squash', 'orange.png', 18, 'minuman', '2025-01-10 15:07:34', '2025-01-10 15:07:34'),
(17, 'Es Soda Gembira', 'soda.png', 20, 'minuman', '2025-01-10 15:07:59', '2025-01-10 15:07:59'),
(18, 'Jahe Hangat', 'jahe.png', 15, 'minuman', '2025-01-10 15:08:29', '2025-01-10 15:08:29'),
(19, 'Excelso Arabica Hangat', 'arabika.png', 17, 'minuman', '2025-01-10 15:08:55', '2025-01-16 10:01:39'),
(20, 'catering-1', 'catering-index-1.1.png', 1, 'catering', '2025-01-14 15:10:03', '2025-01-14 15:10:03'),
(21, 'catering-2', 'catering-2.png', 1, 'catering', '2025-01-14 15:10:33', '2025-01-14 15:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_contacts`
--

CREATE TABLE `tb_contacts` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_contacts`
--

INSERT INTO `tb_contacts` (`id`, `nama_customer`, `email`, `subjek`, `pesan`, `created_at`) VALUES
(8, 'haa', 'danaraja2006@gmail.com', 'ddew', 'wdw', '2025-01-17 11:00:49'),
(9, 'farel', 'mostwantednolimit66@gmail.com', 'wdwd', 'qwd', '2025-01-17 11:02:11'),
(10, 'farel', 'danaraja2006@gmail.com', 'dcas', 'sdsa', '2025-01-18 05:08:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_service`
--

CREATE TABLE `tb_service` (
  `id` int(11) NOT NULL,
  `ket_chef` varchar(300) NOT NULL,
  `ket_makanan` varchar(300) NOT NULL,
  `ket_order` varchar(300) NOT NULL,
  `ket_layanan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_service`
--

INSERT INTO `tb_service` (`id`, `ket_chef`, `ket_makanan`, `ket_order`, `ket_layanan`) VALUES
(1, 'Chef Kami sudah memiliki banyak pengalaman di bidang F&B', 'Kami memilih bahan-bahan dasar terbaik dan fresh, sehingga menghasilkan makanan yang enak.', 'Untuk Order Online sementara kami menggunakan GrabFood, Gofood dan ShopeeFood.', 'Kami buka setiap hari dari pukul 10:00 - 21:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `via` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id`, `nama`, `via`, `keterangan`, `updated_at`) VALUES
(1, 'Andre Kuduz', 'Gmaps', 'Kelebihan,  tempat luas, banyak meja. Terdapat lesehan juga. Makanan dan minuman juga enak. Pelayanan juga cepat. Waktu itu pesan ayam bakar, maknyuss banget.', '2025-01-16 14:57:46'),
(2, 'Ucha Kuca', 'Gmaps', 'Tempatnya nyaman buat nongkrong,  dengan suasana baru,  ada toilet,  mushola,  karoke dan harga terjangkau.', '2025-01-16 11:41:05'),
(3, 'zuli zayla', 'Gmaps', 'Asik buat acara meet up sama kesayangan², tempatnya kece.. masakan nya enaks 😆', '2025-01-16 11:43:51'),
(4, 'Shalahuddin Abdullah', 'Gmaps', 'Makanannya lumayan enak, ayamnya bumbunya terasa sampai kedalam, supnya pun juga bumbunya pas, Tempatnya cukup bagus dan bersih hanya saja kurang begitu luas. Untuk fasilitas cukup memadahi ada ruang pertemuan sampai toilet juga ada, pelayanannya pun cukup bagus. Area parkir lumayan luas bisa untuk banyak kendaraan roda empat maupun roda dua.', '2025-01-16 14:58:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'dana', '$2y$10$z3nMxnHWniO2bi5KXEWH5OzZnL.bpQof3u/Cf.50afQ/1uDWYMtEa', 'admin', '2025-01-07 16:52:10', '2025-01-07 16:52:10'),
(2, 'dana1', '$2y$10$UvU.wa7kf6UaSxc.hDC6eubhhXKEY53Hp6lRGqHAxmI0NLhc7EFs.', 'admin', '2025-01-07 16:55:32', '2025-01-07 16:55:32'),
(3, 'staff', '$2y$10$Xp.3hEKJLMOiESmP7GrgHOAv2Frk6xGSCy8gJjvhxHnf6JsEr5X26', 'staff', '2025-01-08 12:30:35', '2025-01-18 12:50:20'),
(4, 'staff1', '$2y$10$6K2JbvI00FiX8y/ICVjnOuuhl41GONB6tzQd9lyA4hZIFe/.9YwOe', 'staff', '2025-01-08 12:50:34', '2025-01-16 14:13:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_contacts`
--
ALTER TABLE `tb_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
