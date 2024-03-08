-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 07:14 PM
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
-- Database: `decom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', '2024-02-26 09:32:50', '2024-02-26 09:32:50'),
(2, 'Pants', '2024-02-26 09:39:39', '2024-02-26 09:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'bla', 'Bello', '1', '2024-03-01 14:03:33', '2024-03-01 14:03:33'),
(2, 'bla', 'dsagasdfsdf', '1', '2024-03-01 15:28:18', '2024-03-01 15:28:18'),
(3, 'bla', 'dfgasdfadsfsa', '1', '2024-03-01 16:04:47', '2024-03-01 16:04:47'),
(4, 'bla', 'qwertyhuj', '1', '2024-03-01 16:08:51', '2024-03-01 16:08:51'),
(5, 'bla', 'awxrdtcfyvgubhinjmokl,', '1', '2024-03-01 16:09:00', '2024-03-01 16:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_25_181344_create_sessions_table', 1),
(7, '2024_02_26_150817_create_categories_table', 2),
(8, '2024_02_26_182556_create_products_table', 3),
(9, '2024_02_28_101911_create_carts_table', 4),
(10, '2024_02_28_143946_create_orders_table', 5),
(11, '2024_03_01_092350_create_notifications_table', 6),
(12, '2024_03_01_193017_create_comments_table', 7),
(13, '2024_03_01_193034_create_replies_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@ecom.com', '11223344', 'somewhere', 'User', 'jeans pant', '1', '12000', '1708981757.webp', '2', 'Paid In Cash', 'Delivered', '2024-02-28 09:32:35', '2024-02-28 14:27:35'),
(2, 'User', 'user@ecom.com', '11223344', 'somewhere', 'User', 'blue shirt', '3', '1500', '1708977586.jpg', '1', 'Paid In Cash', 'Delivered', '2024-02-28 09:32:35', '2024-02-28 14:32:05'),
(3, 'User', 'user@ecom.com', '11223344', 'somewhere', '5', 'jeans pant', '5', '60000', '1708981757.webp', '2', 'Paid In Cash', 'Delivered', '2024-02-28 09:33:52', '2024-02-29 08:20:59'),
(4, 'User', 'user@ecom.com', '11223344', 'somewhere', '5', 'blue shirt', '2', '1000', '1708977586.jpg', '1', 'Cash On Delivery', 'Processing', '2024-02-28 09:33:52', '2024-02-28 09:33:52'),
(5, 'User', 'user@ecom.com', '11223344', 'somewhere', '5', 'jeans pant', '10', '120000', '1708981757.webp', '2', 'Paid Using Card', 'Delivered', '2024-02-28 11:46:56', '2024-02-29 08:20:45'),
(6, 'User', 'user@ecom.com', '11223344', 'somewhere', '5', 'jeans pant', '1', '12000', '1708981757.webp', '2', 'Paid Using Card', 'Delivered', '2024-02-28 12:16:01', '2024-02-28 14:32:11'),
(7, 'bla', 'bla@blabla.com', '225588', 'random', '1', 'jeans pant', '1', '12000', '1708981757.webp', '2', 'Paid Using Card', 'Order Cancelled', '2024-02-28 13:28:40', '2024-03-01 09:38:39'),
(8, 'bla', 'bla@blabla.com', '225588', 'random', '1', 'jeans pant', '1', '12000', '1708981757.webp', '2', 'Paid Using Card', 'Delivered', '2024-02-28 13:28:40', '2024-03-01 09:36:12'),
(9, 'bla', 'bla@blabla.com', '225588', 'random', '1', 'jeans pant', '3', '36000', '1708981757.webp', '2', 'Paid Using Card', 'Processing', '2024-02-28 13:28:40', '2024-02-28 13:28:40'),
(10, 'bla', 'bla@blabla.com', '225588', 'random', '1', 'jeans pant', '5', '60000', '1708981757.webp', '2', 'Paid Using Card', 'Processing', '2024-02-28 13:28:40', '2024-02-28 13:28:40'),
(11, 'bla', 'bla@blabla.com', '225588', 'random', '1', 'blue shirt', '5', '2500', '1708977586.jpg', '1', 'Paid Using Card', 'Processing', '2024-02-28 13:28:40', '2024-02-28 13:28:40'),
(12, 'bla', 'bla@blabla.com', '225588', 'random', '1', 'jeans pant', '3', '36000', '1708981757.webp', '2', 'Paid Using Card', 'Delivered', '2024-02-29 08:17:10', '2024-03-01 09:36:17'),
(13, 'Dipendra Ranjitkar', 'regalranjitkar7342@gmail.com', '9898989898', 'kalanki', '6', 'jeans pant', '5', '60000', '1708981757.webp', '2', 'Paid Using Card', 'Processing', '2024-03-01 01:19:05', '2024-03-01 01:19:05'),
(14, 'bla', 'bla@blabla.com', '225588', 'random', '1', 'jeans pant', '1', '12000', '1708981757.webp', '2', 'Cash On Delivery', 'Processing', '2024-03-05 05:08:28', '2024-03-05 05:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(1, 'blue shirt', 'blue color shirt', '1708977586.jpg', 'Shirt', '2', '500', NULL, '2024-02-26 14:14:46', '2024-02-26 14:14:46'),
(2, 'jeans pant', 'pant made up of jeans', '1708981757.webp', 'Shirt', '25', '15000', '12000', '2024-02-26 15:24:17', '2024-02-27 03:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment_id` varchar(255) DEFAULT NULL,
  `reply` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `name`, `comment_id`, `reply`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'bla', '3', 'asdfasdfsadf', '1', '2024-03-01 16:04:51', '2024-03-01 16:04:51'),
(2, 'bla', '3', 'asdfasfasdf', '1', '2024-03-01 16:04:56', '2024-03-01 16:04:56'),
(3, 'bla', '1', 'dasfasasdvasdf', '1', '2024-03-01 16:05:00', '2024-03-01 16:05:00'),
(4, 'bla', '2', 'satghgasd', '1', '2024-03-01 16:05:09', '2024-03-01 16:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5EGRpTRAReemHqYgdpssWX6WgKNz8QKYUDTYXr9I', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMTFObGN1M1FwaTZNTVJkUXBOVUR0NFF3M3lUOWswWFVlTzFnYlFHciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1709636216),
('eW7Fuzsx2mdvBSnQ7ERGF90r42SplwmWy91d0IoU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRDNKMHFvSkpMMWptUENhcWhvc0huMkhmMXhoa1FOand0cVlPSnFDNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93X2NhcnQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1709381850),
('q5nuPnRaR6UeWwPhNE1TLTS3Kmth1fw3M6E2BjaV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDRmNGtmUk02ZkZRaXlRaFdVeVlCZW5BSDNJeTZaRnFTaEVXWVJZYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1709636458);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'bla', 'bla@blabla.com', '0', '225588', 'random', '2024-03-01 07:06:20', '$2y$12$z1PBG3x0UMUeU.1Rl7IxS.jigqYGYqv98oqEalpEaPTsWEcxorx0m', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 01:12:33', '2024-02-26 01:12:33'),
(2, 'admin', 'admin@ecom.com', '1', '225566', 'random add', '2024-03-01 07:06:27', '$2y$12$EWKAa22bsvC9lI94viznRuSGUNzSXvfN7zzMx3y02jVR2iUiBq2xy', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-26 01:16:16', '2024-02-26 01:16:16'),
(5, 'User', 'user@ecom.com', '0', '11223344', 'somewhere', '2024-03-01 07:06:30', '$2y$12$x8HmlVONv5ibCKGS5gUIOOSZ55dstnmPZSA7MOtKi8kQSZI96JCh.', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 06:04:45', '2024-02-28 06:04:45'),
(6, 'Dipendra Ranjitkar', 'regalranjitkar7342@gmail.com', '0', '9898989898', 'kalanki', '2024-03-01 01:17:54', '$2y$12$jQqs0FpBb97LKz4vMqHCDeJfrlP8ov8fWlHpfNYO8GsJ36XtQju8q', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 01:10:32', '2024-03-01 01:17:54'),
(7, 'Gopal Tamang', 'wungcelama@gmail.com', '0', '9861478599', 'Satungal', NULL, '$2y$12$nklnIO5lhCtmQOgD2m0ohecLigaI2SjzQCBC5ngh7iLXovu1c/TgK', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-05 05:11:13', '2024-03-05 05:11:13'),
(8, 'Sudip Adhikari', 'adhikarisudip12@gmail.com', '0', '9862585593', 'Imadol', NULL, '$2y$12$SH18eNOGr2tslDkFyWXNJOSPOsEhfG30Q5xFOXsUGhZGZIJ7RfvFi', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-05 05:13:11', '2024-03-05 05:13:11');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
