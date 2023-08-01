-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2023 at 10:25 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_uploads`
--

DROP TABLE IF EXISTS `file_uploads`;
CREATE TABLE IF NOT EXISTS `file_uploads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `document_type_id` int DEFAULT NULL,
  `title` varchar(40) NOT NULL,
  `documents` varchar(60) NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `file_uploads`
--

INSERT INTO `file_uploads` (`id`, `project_id`, `category_id`, `document_type_id`, `title`, `documents`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 49, 1, 'qqqq', '559629309.sql', 0, NULL, '2023-08-01 10:10:35'),
(2, 1, 49, 1, '11111', '1483693986.sql', 0, NULL, '2023-08-01 10:12:13'),
(3, 1, 49, 1, '11111', '847349472.sql', 0, NULL, '2023-08-01 10:13:48'),
(4, 1, 49, 1, '11111', '399112043.sql', 1, NULL, '2023-08-01 10:14:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
