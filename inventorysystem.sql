-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 09:57 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodmenus`
--

CREATE TABLE `foodmenus` (
  `id` int(10) UNSIGNED NOT NULL,
  `share_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `group_uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foodmenus`
--

INSERT INTO `foodmenus` (`id`, `share_name`, `price`, `group_uid`, `created_at`, `updated_at`) VALUES
(1, 'Fried Mee', 6, 'RestaurantA', '2019-11-06 16:00:00', '2019-11-07 16:00:00'),
(2, 'Fried Rice', 11, 'RestaurantB', '2019-11-06 16:00:00', '2019-11-26 08:30:08'),
(3, 'Nasi Kerabu', 7, 'RestaurantA', '2019-11-14 16:00:00', '2019-11-08 16:00:00'),
(4, 'Fried Rice', 12, 'RestaurantA', NULL, '2019-11-26 21:32:10'),
(5, 'Nasi Briyani', 10, 'RestaurantB', '2019-11-26 17:53:35', '2019-11-26 17:53:35'),
(6, 'Mee Kari', 6, 'RestaurantA', '2019-11-26 21:16:56', '2019-11-26 21:16:56'),
(7, 'Nasi Lemak Ayam', 7, 'RestaurantA', '2019-11-26 21:46:20', '2019-11-26 21:46:20'),
(8, 'Lasagna', 20, 'RestaurantB', '2019-11-26 23:59:40', '2019-11-26 23:59:40');

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
(3, '2019_10_29_123306_create_products_table', 1),
(4, '2019_11_24_063309_create_shares_table', 2),
(5, '2019_11_24_063623_create_foodmenus_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(10) NOT NULL,
  `Quantity` int(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_fooduid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `price`, `Quantity`, `created_at`, `updated_at`, `group_uid`, `menu_fooduid`) VALUES
(2, 'Kerepek', 'Kerepek for side dishes', 1, 4, '2019-10-29 15:06:43', '2019-11-26 22:24:25', 'RestaurantB', 2),
(3, 'Soy Sauce', 'Soy Sauce Adabi', 12, 32, '2019-11-05 16:00:00', '2019-11-23 21:00:43', 'RestaurantA', 1),
(4, 'Onion', 'Big onion from india', 123, 12, '2019-11-23 02:32:25', '2019-11-23 21:56:51', 'RestaurantA', 1),
(5, 'Anchovies', 'Big Anchovies', 12, 3, '2019-11-07 16:00:00', '2019-11-13 16:00:00', 'RestaurantA', 1),
(6, 'Chili Sauce', 'Red chili sauce ', 5, 12, '2019-11-06 16:00:00', '2019-11-13 16:00:00', 'RestaurantA', 1),
(7, 'Curry Powder', 'Curry powder from BABA`s', 6, 20, '2019-11-26 21:27:41', '2019-11-26 21:27:41', 'RestaurantA', 6),
(8, 'Beras', 'Regular rice', 7, 3, '2019-11-26 22:25:03', '2019-11-26 23:55:17', 'RestaurantB', 2),
(9, 'Eggs', 'Eggs Grade A', 1, 30, '2019-11-26 22:25:28', '2019-11-26 22:25:28', 'RestaurantB', 2),
(10, 'Pineapple', 'Pineapple from thailand', 12, 12, '2019-11-26 23:29:19', '2019-11-26 23:29:19', 'RestaurantA', 1),
(11, 'Garlic', 'Garlic from india', 8, 7, '2019-11-26 23:30:06', '2019-11-26 23:30:06', 'RestaurantA', 7),
(12, 'Beras Faizah', 'Long rice suitable for briyani', 25, 10, '2019-11-26 23:58:53', '2019-11-26 23:58:53', 'RestaurantB', 5),
(13, 'Meatball', 'Meatball from italy', 15, 3, '2019-11-27 00:00:08', '2019-11-27 00:00:08', 'RestaurantB', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_permission` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `is_permission`, `created_at`, `updated_at`, `group_uid`) VALUES
(1, 'irfan', 'irfansoftwaredeveloper@gmail.com', '$2y$10$Mwz7SZAiG9EzgIv3IV92hubs6Ch2W6zAW7LrgJVFdTn3uTdYniO0u', 'mtilHmXSCJFnc2FKmBMmAntLG3QDxZ8RDELVcEBloZX5Gylyy9Szs2Y7IbEV', 1, '2019-10-29 06:15:17', '2019-10-29 06:15:17', 'RestaurantA'),
(2, 'hazim', 'hazim@gmail.com', '$2y$10$yZvkbL/Lygh4fvkxEqGLWes86TbFXLnnlXxRnvejZIqbxszVXbNA6', 'f6PD2iLKutlFbDyQIxAuVNALPRMNw4cGrkxXKxfL4a1aJ7mz5boRjCYZnl1C', 0, '2019-11-26 01:36:46', '2019-11-26 01:36:46', 'RestaurantB'),
(3, 'alan', 'alan@gmail.com', '$2y$10$7MgcUoTJ2LnB0w2iy5c0luNASiXMEMWlmzfIS8i3tSIkJgDUIY5/e', 'bqizDg0uxKep0i5YySqtQJ0ZLO82zRk6K85Nj2qGfLmql0WDwjZysBoXdQuI', 0, '2019-11-26 21:15:41', '2019-11-26 21:15:41', 'RestaurantA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodmenus`
--
ALTER TABLE `foodmenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodmenus_id_index` (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `foodmenus`
--
ALTER TABLE `foodmenus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
