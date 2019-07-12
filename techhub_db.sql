-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 06:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techhub_db`
--
CREATE DATABASE IF NOT EXISTS `techhub_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `techhub_db`;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `products` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2019-07-01 08:50:09', '2019-07-08 06:18:51', 'Drones'),
(3, '2019-07-01 08:51:51', '2019-07-01 08:51:51', 'Microprocesadores'),
(4, '2019-07-01 08:52:47', '2019-07-01 08:52:47', 'Memorias'),
(5, '2019-07-08 01:04:25', '2019-07-08 01:04:25', 'Celulares'),
(8, '2019-07-08 08:05:52', '2019-07-08 08:05:52', 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_29_213603_create_products_table', 1),
(4, '2019_06_29_215800_create_carts_table', 1),
(5, '2019_06_29_215941_create_categories_table', 1),
(6, '2019_06_29_215954_create_photos_table', 1),
(7, '2019_06_29_220008_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `photos` longtext COLLATE utf8mb4_unicode_ci,
  `trending` tinyint(4) NOT NULL DEFAULT '1',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `category_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `title`, `description`, `price`, `photos`, `trending`, `active`, `category_id`) VALUES
(5, '2019-07-01 20:01:12', '2019-07-08 05:31:25', 'AMD Ryzen 7', 'Procesador 12nm\r\n4.3ghz', '1000.00', 'BKy6i1gSYQWNEKQckWa0UFCv0bRYmyK624Zhhj2o.jpeg', 0, 1, 3),
(6, '2019-07-01 20:01:40', '2019-07-01 20:01:40', 'DJI X3000', '4 horas de autonomia\r\n4k recording', '1200.00', 'lNlOzRpE1fn40E9UI9McTayslv4QEQBrqIZTcRYP.jpeg', 1, 1, 1),
(7, '2019-07-01 20:02:22', '2019-07-08 08:06:02', 'Asus Predator 3', 'Micro i7 8700k\r\n16gb ddr4 ram\r\ngtx1060', '1000.00', 'cduxAohn85nrE0EBtYGvQYQd3Z02ty9MYcmJu7TS.jpeg', 0, 1, 8),
(8, '2019-07-08 01:01:32', '2019-07-08 08:06:12', 'Laptop Lenovo Thinkpad X3', 'Intel Core i5 \r\n16gb RAM\r\n256GB SSD', '15000.00', 'eOVbZNG1ZTR7gzpXnEtBy3L0zxa9aNKkccMsX50K.jpeg', 0, 1, 8),
(9, '2019-07-08 01:02:58', '2019-07-08 08:06:39', 'Laptop Acer Aspire 4', 'AMD Ryzen 2700X\r\n8GB RAM DDR4\r\n512GB HD', '14000.00', 'j5BackFPLZh3CrJGW5pD4Ow7NBuy7rw5NHlfsnE4.jpeg', 0, 1, 8),
(10, '2019-07-08 01:04:15', '2019-07-08 01:04:15', 'Procesador Intel i3', '3.2 Ghz de velocidad\r\nQuadCore\r\n12nm Technology', '2000.00', 'ecK2XutAJ95XsKc4aagadbFFs4yDtX5PAZ9PfbKW.jpeg', 1, 1, 3),
(11, '2019-07-08 01:05:34', '2019-07-08 01:05:34', 'Huawei Mate 20 Pro', 'Quadcore\r\nPantalla IPS LED 4K\r\nAndroid 9.0\r\n8gb RAM', '3000.00', 'M8Dw3lvSpN7eJ9gwt76wODruutsNKORUMXqa36i6.jpeg', 1, 1, 5),
(12, '2019-07-08 01:08:26', '2019-07-08 01:08:26', 'Google Pïxel 3', 'Android 9.0\r\n16gb RAM\r\nPantalla UHD 4K OLED\r\nTriple Camara', '3500.00', 'Gkny8UfwAgQtzhs1skSiOcfe5bhHIGgBxut9WW2Z.jpeg', 0, 1, 5),
(13, '2019-07-08 01:09:21', '2019-07-08 01:09:21', 'Apple Iphone X Red', 'Not Made by Steve Jobs\r\nIOS 5.8\r\nWireless Charging', '4000.00', 'lJE6IseY3aqufGVApKs83qfKAcxz68F6axAgBGRt.png', 0, 1, 5),
(14, '2019-07-08 01:10:20', '2019-07-08 01:10:20', 'Procesador Intel i7 9700K', 'Hyperthreading 6 cores\r\n12nm technology', '5000.00', 'troUi5G1S5yiwL3f90IlhoGGlYWjCgwBktJBKgCQ.jpeg', 0, 1, 3),
(15, '2019-07-08 01:11:36', '2019-07-08 01:11:36', 'Drone Huawei T1000', 'Bateria de 2000 mAh\r\nCamara UHD 4k\r\nAlcance 1KM', '500.00', 'HPliZznCSu6eMGskwEMRVEjy7XmEgTOZKBlixaAA.jpeg', 0, 1, 1),
(16, '2019-07-08 01:12:10', '2019-07-08 01:12:10', 'Drone Yellowjacket Pro', 'Bateria de 2000 mAh\r\nCamara UHD 4k\r\nAlcance 1KM', '700.00', '4PBmL60mDYRW8SvTZ9iENjqZIgMziNdaC0iU914a.jpeg', 0, 1, 1),
(17, '2019-07-08 01:12:50', '2019-07-08 01:12:50', 'Drone IBM T800', 'Bateria de 2000 mAh\r\nCamara UHD 4k\r\nAlcance 1KM\r\nMade by AS', '400.00', 'ILCq6AcaluXqbFcJPk2BiO5nKCddkfW4OLRNE5NK.jpeg', 0, 1, 1),
(19, '2019-07-08 04:44:25', '2019-07-08 04:44:25', 'REDPHONE', 'Aloha', '12.00', 'lzGXbWjzVcdpXTo4YvjnjSuaO8cnlN9V9F35rtWp.png', 0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` longtext COLLATE utf8mb4_unicode_ci,
  `role` tinyint(4) NOT NULL DEFAULT '3',
  `provider` longtext COLLATE utf8mb4_unicode_ci,
  `provider_id` longtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `avatar`, `role`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Oscar', 'Lee', 'oscarlee@gmail.com', NULL, '$2y$10$xib6WHpzxsrJE3OOWx2VU.TLuLGR9ucOxxKfX/7sCIQke2SS3Ctxe', 'PlqmXJOFxxzykkSbbISEyODU5Wyz2jk4rOTC88r6.jpeg', 9, NULL, NULL, NULL, '2019-07-01 02:40:04', '2019-07-08 07:48:07'),
(5, 'Admin', 'Admin', 'adminadmin@gmail.com', NULL, '$2y$10$RKhBpitYkIH4kGAF4ONyAOLlvlnLHV3IoZRMi6lbREFBG8FZt6azu', 'XcAKk7H3lZvQtLUai0LEEdoYaVPJAZePEKM8mvNn.jpeg', 9, NULL, NULL, NULL, '2019-07-08 07:54:06', '2019-07-08 07:55:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
