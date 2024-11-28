-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 09:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkatan3_medsos`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `status_id`, `user_id`, `comment_text`, `created_at`) VALUES
(1, 2, 1, 'hai', '2024-11-05 06:50:53'),
(2, 2, 1, 'hai', '2024-11-05 06:50:58'),
(3, 2, 1, 'haloo', '2024-11-05 06:53:18'),
(4, 2, 1, 'pengen jadi monkey azaa', '2024-11-05 06:56:57'),
(5, 4, 1, 'iyalah,makanya udah 25 mikir dikit, punya otak kan???', '2024-11-05 07:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `status_id`, `created_at`) VALUES
(2, 1, 3, '2024-11-06 01:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `konten` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`id`, `id_user`, `konten`, `foto`, `created_at`, `updated_at`) VALUES
(2, 1, '<p>tolong</p>', '', '2024-11-04 08:38:35', '2024-11-04 08:38:35'),
(3, 1, 'asdfgg', '', '2024-11-04 08:38:42', '2024-11-04 08:38:42'),
(4, 1, '<p>kok gabisa</p>', '', '2024-11-04 08:38:49', '2024-11-04 08:38:49'),
(5, 1, '<p>tesbro</p>', '', '2024-11-04 08:49:45', '2024-11-04 08:49:45'),
(6, 1, '<p>nyangkut masa didatabase lkeluar tapi di index ga keluar babik</p>', '', '2024-11-04 08:50:31', '2024-11-04 08:50:31'),
(7, 1, '<p>mana mata udah hilang fokus ya</p>', '', '2024-11-04 08:50:57', '2024-11-04 08:50:57'),
(8, 1, '<p>siap siap jadi kunyuk aing</p>', '', '2024-11-04 08:51:16', '2024-11-04 08:51:16'),
(9, 1, '<p>haduh pagi pagi udah ngoding</p>', '', '2024-11-05 00:29:21', '2024-11-05 00:29:21'),
(10, 1, '<p>hai maniez</p>', '', '2024-11-05 00:36:12', '2024-11-05 00:36:12'),
(11, 1, '<p>lagi</p>', '', '2024-11-05 00:39:14', '2024-11-05 00:39:14'),
(12, 1, '<p>ff</p>', '', '2024-11-05 00:40:10', '2024-11-05 00:40:10'),
(13, 1, '<p>asd</p>', '', '2024-11-05 00:41:50', '2024-11-05 00:41:50'),
(14, 1, '', 'pngtree-illustration-of-an-astronaut-fishing-star-in-the-moon-png-image_15831679.png', '2024-11-05 00:42:21', '2024-11-05 00:42:21'),
(15, 1, '<p>hello</p>', '', '2024-11-05 00:44:48', '2024-11-05 00:44:48'),
(16, 1, '<p>apasi</p>', '', '2024-11-05 03:25:46', '2024-11-05 03:25:46'),
(17, 1, '<p>hai rangga maiinnnn yuukk...</p><p><br></p>', 'naturelandscapetree.jpg', '2024-11-05 04:39:44', '2024-11-05 04:39:44'),
(18, 1, '<p><b>hai</b></p>', '', '2024-11-05 04:40:58', '2024-11-05 04:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `nama_pengguna`, `email`, `password`, `foto`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'riooo', 'ozi', 'admin@gmail.com', '12345678', 'pngtree-illustration-of-an-astronaut-fishing-star-in-the-moon-png-image_15831679.png', 'istockphoto-592031250-612x612.jpg', '2024-10-31 08:08:44', '2024-11-04 08:17:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
