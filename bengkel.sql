-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 07:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `no_wa` varchar(14) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`id`, `role_id`, `username`, `email`, `password`, `image`, `is_active`, `date_created`, `no_wa`, `alamat`) VALUES
(1, 2, 'Cipto Ahirru', 'cipto.ahirru0912@gmail.com', '$2y$10$PPt23XUdQwDZu3WGH8OKJuJksyyzY/8dZy7iyfCBT/y/NsgKm9IOi', 'default.png', '1', '1664381446', '081293265065', 'Jl. Kincir Raya No.53, RT.16/RW.6, Cengkareng Timur., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730'),
(2, 1, 'Garuda', 'garudaseram75@gmail.com', '$2y$10$b/6h957wtBe2JO5ynJT.Lu1Ja2uXvLZnyZ.sTS2migd9yQ0iId5h.', 'default.png', '1', '1664859027', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `serviceid` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `invoice` int(10) DEFAULT NULL,
  `is_paid` int(11) DEFAULT 0,
  `tgl` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_wa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `serviceid`, `nama`, `invoice`, `is_paid`, `tgl`, `alamat`, `no_wa`) VALUES
(1, 2, 'Cipto Ahirru', 1, 1, '2022-09-30', 'Jl. Kincir Raya No.53, RT.16/RW.6,', '081293265065'),
(8, 57, 'Cipto Ahirru', 2, 2, '2022-10-01', 'Jl. Kincir Raya No.53, RT.16/RW.6,', '081293265065'),
(13, 10, 'Cipto Ahirru', 3, 2, '2022-11-05', 'Jl. Kincir Raya No.53, RT.16/RW.6, ', '081293265065'),
(15, 8, 'Cipto Ahirru', 5, 1, '0000-00-00', 'Jl. Kincir Raya No.53, RT.16/RW.6, ', '081293265065'),
(20, 9, 'Cipto Ahirru', 6, 1, '0000-00-00', 'Jl. Kincir Raya No.53, RT.16/RW.6, ', '081293265065');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) NOT NULL,
  `service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `service`) VALUES
(1, 'Service Berat'),
(2, 'Service Ringan'),
(3, 'Spare Part');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kategori_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `kategori_id`) VALUES
(1, 'Turun Mesin', 1),
(2, 'Pengecatan Ulang', 1),
(3, 'Service 10000 KM', 2),
(4, 'Service 15000 KM', 2),
(5, 'Service 20000 KM', 2),
(6, 'Service 25000 KM', 2),
(7, 'Velg', 3),
(8, 'Ban', 3),
(9, 'Kaca', 3),
(10, 'Jok', 3),
(57, 'Kode 12', 1),
(58, 'Lampu motor', 3),
(59, 'Stiker', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(28, 'FISIMUTA@GMAIL.COM', 'P1q0E5ug3yAp6rWYXeJy9bNbGF1FBGdoTRfoQBDtYBw=', 1664354926),
(29, 'aja098708@gmail.com', 'A4CaJdBRpHRxKt0dowpjOS38g+yC8hX+E7b8cJ1txHA=', 1664355034),
(33, 'garudaseram75@gmail.com', '4fmby2F51NPLYrB6Pk2kW5FkM0A99yOTSEnxfOzp4S0=', 1664859027);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKactor603221` (`role_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKbooking660087` (`serviceid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKservice124858` (`kategori_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `FKactor603221` FOREIGN KEY (`role_id`) REFERENCES `role_user` (`id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FKbooking660087` FOREIGN KEY (`serviceid`) REFERENCES `service` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FKservice124858` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
