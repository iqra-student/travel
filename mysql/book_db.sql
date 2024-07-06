-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 07:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_db`
--

-- --------------------------------------------------------

-- Table structure for table `user_bookings`
--

CREATE TABLE `user_bookings` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `guests` int(255) NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL,
  `costperson` double NOT NULL,
  `totalcost` double NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_bookings`
--

INSERT INTO `user_bookings` (`id`, `user_id`, `package_id`, `guests`, `arrivals`,`leaving`,`costperson`,`totalcost`,`date_created`) VALUES
(1, 1, 8, 3, '2024-06-27','2024-06-28',500000,15000000,'2024-06-19 08:37:59');

ALTER TABLE `user_bookings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_bookings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phonenumber`,`password`) VALUES
(1, 'Iqra Yasmeen', 'iqrayasmeen@gmail.com','03314567892' ,'$2y$10$Jmf9Xk2y8m.fo3c/ZgKmzOrdIRkU05KSGLI0picKLEtr68ll7hjB.');

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

CREATE TABLE `packages` (
  `id` int(30) NOT NULL,
  `title` text DEFAULT NULL,
  `tour_location` text DEFAULT NULL,
  `cost` double NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `tour_location`, `cost`, `description`, `image_path`, `date_created`) VALUES
(1, 'Dubai Tour Package', 'Dubai', 250000, 'Enjoy the Emirates with unforgettable fun with our Dubai top selling packages!', 'images/img-1.jpg', '2024-05-18 10:31:03'),
(2, 'Bali Tour Package', 'Bali, Maldives', 500000, 'Enjoy the Emirates with unforgettable fun with our Bali top selling packages!', 'images/img-2.jpg', '2024-05-18 11:17:11'),
(3, 'Abu Dhabi Tour Package', 'Abu Dhabi', 300000, 'Enjoy the Emirates with unforgettable fun with our Abu Dhabi top selling packages!', 'images/img-3.jpg',  '2024-05-18 13:34:08'),
(4, 'Australia Tour Package', 'Australia', 300000, 'Enjoy the Emirates with unforgettable fun with our Australia top selling packages!', 'images/img-4.jpg',  '2024-05-18 13:34:08'),
(5, 'China Tour Package', 'China', 300000, 'Enjoy the Emirates with unforgettable fun with our China top selling packages!', 'images/img-5.jpg', '2024-05-18 13:34:08'),
(6, 'Singapur Tour Package', 'Singapur', 300000, 'Enjoy the Emirates with unforgettable fun with our Singapur top selling packages!', 'images/img-6.jpg',  '2024-05-18 13:34:08'),
(7, 'Spain Tour Package', 'Spain', 300000, 'Enjoy the Emirates with unforgettable fun with our Spain top selling packages!', 'images/img-7.jpg', '2024-05-18 13:34:08'),
(8, 'Canada Tour Package', 'Canada', 300000, 'Enjoy the Emirates with unforgettable fun with our Canada top selling packages!', 'images/img-8.jpg', '2024-05-18 13:34:08'),
(9, 'Nepal Tour Package', 'Nepal', 300000, 'Enjoy the Emirates with unforgettable fun with our Nepal top selling packages!', 'images/img-9.jpg', '2024-05-18 13:34:08'),
(10, 'Japan Tour Package', 'Japan', 300000, 'Enjoy the Emirates with unforgettable fun with our Japan top selling packages!', 'images/img-10.jpg', '2024-05-18 13:34:08');


ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


