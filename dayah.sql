-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 03:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dayah`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `price` decimal(10,2) DEFAULT 0.00,
  `expiration_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `type`, `description`, `stock`, `price`, `expiration_date`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Tablet', 'Obat untuk meredakan demam dan nyeri ringan hingga sedang.', 150, 2000.00, '2026-12-31', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(2, 'Amoxicillin', 'Kapsul', 'Antibiotik untuk infeksi bakteri.', 100, 5000.00, '2025-10-15', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(3, 'OBH Combi', 'Sirup', 'Obat batuk dengan kandungan ekspektoran.', 75, 12000.00, '2025-08-01', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(4, 'Promag', 'Tablet', 'Antasida untuk mengatasi maag dan asam lambung.', 200, 1500.00, '2026-01-01', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(5, 'Bodrex', 'Tablet', 'Obat sakit kepala dan demam.', 180, 2500.00, '2026-03-20', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(6, 'Woods Peppermint', 'Sirup', 'Obat batuk dengan rasa peppermint.', 90, 13500.00, '2025-09-15', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(7, 'Loratadine', 'Tablet', 'Antihistamin untuk alergi.', 120, 3500.00, '2026-06-30', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(8, 'Sanmol', 'Drops', 'Obat penurun demam untuk anak-anak.', 60, 8500.00, '2025-12-31', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(9, 'Betadine', 'Cairan', 'Antiseptik untuk luka luar.', 40, 17500.00, '2027-01-10', '2025-04-16 12:43:57', '2025-04-16 12:43:57'),
(10, 'Vitamin C 1000mg', 'Tablet Effervescent', 'Suplemen vitamin C untuk daya tahan tubuh.', 130, 6000.00, '2026-11-11', '2025-04-16 12:43:57', '2025-04-16 12:43:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
