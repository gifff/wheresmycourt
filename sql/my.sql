-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2017 at 11:00 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wheresmycourt`
--

-- --------------------------------------------------------

--
-- Table structure for table `arena`
--

CREATE TABLE `arena` (
  `id` int(11) NOT NULL,
  `lapangan_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `harga_per_jam` int(11) NOT NULL,
  `link_foto` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arena`
--

INSERT INTO `arena` (`id`, `lapangan_id`, `nama`, `harga_per_jam`, `link_foto`) VALUES
(1, 1, 'Viva Futsal 1', 150000, NULL),
(2, 1, 'Viva Futsal 2', 125000, NULL),
(3, 1, 'Viva Futsal 3', 100000, NULL),
(4, 3, 'CT 1', 110000, NULL),
(5, 3, 'CT 2', 110000, NULL),
(6, 3, 'CT 3', 110000, NULL),
(7, 2, 'SMF One', 80000, NULL),
(8, 2, 'SMF Two', 80000, NULL),
(9, 2, 'SMF Three', 80000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `arena_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_booking` varchar(8) NOT NULL,
  `jam_tanggal` datetime NOT NULL,
  `durasi` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `arena_id`, `user_id`, `kode_booking`, `jam_tanggal`, `durasi`) VALUES
(1, 8, 1, 'MBGCHHLI', '2017-03-18 11:00:00', 2),
(2, 1, 1, 'MNAVQYED', '2017-03-18 12:00:00', 2),
(3, 1, 1, 'UCADQEOV', '2017-03-18 07:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `expire_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `link_foto` varchar(64) DEFAULT NULL,
  `telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama`, `alamat`, `id_pemilik`, `type`, `link_foto`, `telp`) VALUES
(1, 'Viva Futsal', 'Jl. Bunga Andong, Soekarno-Hatta, Kota Malang', 11, 1, '43236fa13186b88d486e729b002a82a661df450d.png', '0341-5445577'),
(2, 'SM Futsal', 'Jl. Sudimoro Kota Malang', 9, 1, 'b2db6db4380df3d22154eec974904babd71253e9.png', '0341-5445578'),
(3, 'Champion Tidar', 'Jl. Puncak Mandala 42 Kota Malang', 10, 1, 'ce39ca77252894fe2ff680206d7c08d7acc9ce03.jpg', '0341-563451');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `link_bukti` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `access_level` tinyint(4) NOT NULL DEFAULT '1',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `created` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `access_level`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'gifarydhimas', '$2a$10$a2ZDBIeG3r7GbQKMHtTvjesT5XNQ/5B47L6AFyBQ2nqztqOKw6mZy', 'gifarydhimas@test.com', 10, 1, 0, NULL, NULL, NULL, NULL, '8dffa36cac0158010fee7f169009483d', '127.0.0.1', '2017-03-18 10:17:06', '2016-01-30 08:55:01', '2017-03-18 03:17:06'),
(4, 'testuser', '$2a$10$1WoIqZURMbRicSW/Iu.GOOIKUq5V9M.o67wZ8lvgiYI6L/Gxx5Nsm', 'tu@test.com', 1, 1, 0, NULL, NULL, NULL, 'dhimas98@gmail.com', '7ff435eab60db83fc2264b608cb73ad1', '115.178.216.46', '2016-04-26 23:26:42', '2016-04-26 22:39:12', '2017-03-16 10:19:49'),
(8, 'nyoman', '$2a$10$7w/YV1OyfI7GAj.W/Z95BuWvkibDUeZRLXg4KROykuY9wAAKv24w6', 'ny@test.com', 1, 1, 0, NULL, NULL, NULL, NULL, '8f8741e7dc9278f9b24c82492ecc0c9d', '127.0.0.1', '2017-03-15 08:05:54', '2017-03-14 22:27:25', '2017-03-16 10:19:46'),
(9, 'providerOne', '$2a$10$2/jNQgSs.VYDbquUkEMJUuQlsq3oRJqhEb0cH/8olNUIs6LD5LKHe', 'providerone@mail.local', 5, 1, 0, NULL, NULL, NULL, NULL, '40868039116b3a06e52f0d359e2670b5', '127.0.0.1', '1970-01-01 00:00:00', '2017-03-16 17:17:35', '2017-03-16 10:20:46'),
(10, 'providerTwo', '$2a$10$UWII2UOFlH.Ck0YRPZ4BCukvy4GREUlvVuWDn7tEQZO55x37XECS.', 'providertwo@mail.local', 5, 1, 0, NULL, NULL, NULL, NULL, 'b4708be228b873337f3a67b4432f7faa', '127.0.0.1', '1970-01-01 00:00:00', '2017-03-16 17:18:44', '2017-03-16 10:20:46'),
(11, 'provider3', '$2a$10$ILTo5luuaLx28kysSiNKaOo1O5knr44sHvpxSGLppnJV8YXMx/ul6', 'provider3@mail.local', 5, 1, 0, NULL, NULL, NULL, NULL, '9805a0a35d8106669d09dd84d287ca0b', '127.0.0.1', '1970-01-01 00:00:00', '2017-03-16 17:19:30', '2017-03-16 10:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `name`, `phone`) VALUES
(2, 4, 'test user', NULL),
(6, 8, 'Nyoman Satria', '081213887771'),
(7, 9, 'Ahmad', '14045'),
(8, 10, 'Budi', '14046'),
(9, 11, 'Cinta', '14047');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arena`
--
ALTER TABLE `arena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arena`
--
ALTER TABLE `arena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `referential_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
