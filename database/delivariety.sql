--
-- Database: `delivariety`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Snacks', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(2, 'Steaks', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(3, 'Noodles', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(4, 'Dumplings', '2017-01-14 00:04:58', '2017-01-14 00:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `item_name`, `img_path`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Pizza Roll', 'menu_snack1.png', '4.70', 1, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(2, 'Fries', 'menu_snack2.png', '2.80', 1, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(3, 'Bruschetta with Warm Tomatoes', 'menu_snack3.png', '6.30', 1, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(4, 'Beef & Potato Croquettes', 'menu_snack4.png', '5.90', 1, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(5, 'Brazilian Skirt Steak with Golden Garlic Butter', 'menu_steak1.png', '14.80', 2, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(6, 'Cola- Marinated Flank Steak', 'menu_steak2.png', '12.60', 2, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(7, 'Home-Cooked Meal of Steak and Potatoes', 'menu_steak3.png', '13.50', 2, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(8, 'Stewed Steak', 'menu_steak4.png', '9.80', 2, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(9, 'Beef Noodles', 'menu_noodle1.png', '7.80', 3, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(10, 'Cold Noodles', 'menu_noodle2.png', '5.60', 3, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(11, 'Wok Noodles', 'menu_noodle3.png', '6.90', 3, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(12, 'Hot Oil Noddles', 'menu_noodle4.png', '6.40', 3, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(13, 'Fried Dumplings', 'menu_dumpling1.png', '5.40', 4, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(14, 'Dumplings Regular', 'menu_dumpling2.png', '5.20', 4, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(15, 'Soup Dumplings', 'menu_dumpling3.png', '6.30', 4, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(16, 'Dumplings Vegeterian', 'menu_dumpling4.png', '4.80', 4, '2017-01-14 00:04:58', '2017-01-14 00:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `menu_order`
--

CREATE TABLE `menu_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_order`
--

INSERT INTO `menu_order` (`id`, `menu_id`, `order_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 335506, 1, NULL, NULL),
(2, 2, 335506, 1, NULL, NULL),
(3, 1, 335506, 1, NULL, NULL),
(4, 7, 335506, 1, NULL, NULL),
(5, 5, 335506, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(124, '2014_10_12_000000_create_users_table', 1),
(125, '2014_10_12_100000_create_password_resets_table', 1),
(126, '2017_01_02_155727_create_menus_table', 1),
(127, '2017_01_02_161205_create_customers_table', 1),
(128, '2017_01_02_173159_create_orders_table', 1),
(129, '2017_01_02_173428_create_categories_table', 1),
(130, '2017_01_02_174121_create_menus_orders_table', 1),
(131, '2017_01_02_190536_create_reservations_table', 1),
(132, '2017_01_08_235906_create_spots_table', 1),
(133, '2017_01_09_205854_create_time_spans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `discount`, `created_at`, `updated_at`) VALUES
(335506, '0', 0, '2017-01-14 12:38:23', '2017-01-14 12:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('laurastone@yahoo.com', '586d68a9d49deecfbc4f830f8db221d080cdd4da61e16765f0024e2ecb116aa0', '2017-01-15 19:57:31'),
('johndoe@yahoo.com', 'b16e8b21d1eff0ef7ef56e4dc8cf0783c09b66fb979993bab59affadd7f8620a', '2017-01-15 20:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_span` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spots`
--

CREATE TABLE `spots` (
  `id` int(10) UNSIGNED NOT NULL,
  `availability` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `available_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reserved_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spots`
--

INSERT INTO `spots` (`id`, `availability`, `available_path`, `reserved_path`, `created_at`, `updated_at`) VALUES
(1, 'Y', 'table_available.png', 'table_reserved.png', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(2, 'N', NULL, NULL, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(3, 'Y', 'table_available.png', 'table_reserved.png', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(4, 'Y', 'table_available.png', 'table_reserved.png', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(5, 'Y', 'table_available.png', 'table_reserved.png', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(6, 'N', NULL, NULL, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(7, 'N', NULL, NULL, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(8, 'Y', 'table_available.png', 'table_reserved.png', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(9, 'Y', 'table_available.png', 'table_reserved.png', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(10, 'Y', 'table_available.png', 'table_reserved.png', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(11, 'N', NULL, NULL, '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(12, 'Y', 'table_available.png', 'table_reserved.png', '2017-01-14 00:04:58', '2017-01-14 00:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `time_spans`
--

CREATE TABLE `time_spans` (
  `id` int(11) NOT NULL,
  `span` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time_spans`
--

INSERT INTO `time_spans` (`id`, `span`, `created_at`, `updated_at`) VALUES
(12, '12:00 -- 14:00', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(14, '14:00 -- 16:00', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(16, '16:00 -- 18:00', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(18, '18:00 -- 20:00', '2017-01-14 00:04:58', '2017-01-14 00:04:58'),
(20, '20:00 -- 22:00', '2017-01-14 00:04:58', '2017-01-14 00:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `address`, `email`, `birthday`, `gender`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
('3zGB7l', 'johndoe', '$2y$10$k1LS/ni2EtRJdzr54ymHmeNDGhw9LOTEXCj/Uy2dBBbmXnGPc7yo.', 'John', 'Doe', 'Kerkstraat 121, Eindhoven', 'johndoe@yahoo.com', '1987-02-10', 'M', '0632145678', 'AYsXtYhJmibadCIJ8TCj3Xr61dk9toss6xinldDqfS6qmP92GdgHfI7EWavw', '2017-01-14 00:04:59', '2017-01-15 18:24:49'),
('5YPAJ8', 'robsmith', '$2y$10$DW9nxsbBPHQjGg/IJMxm3e/ZSV6Kl2Q2cxd0hVt9148phs//m0p6O', 'Rob', 'Smith', 'Kerkstraat 131, Eindhoven', 'robsmith@yahoo.com', '1985-05-19', 'M', '0632156678', 'q0CDgV4EHYR6UFstW48hUdymb9CcXA1mqaAVMLccFffQ6WvYkXgvA3r8MKHs', '2017-01-14 00:04:59', '2017-01-15 20:03:21'),
('84bC7c', 'laurastone', '$2y$10$sawcMIJkJ.9weMcLn5aFMOoUAeRVy.62BArxrt7xqLZ2Mv7GwfBoa', 'Laura', 'Stone', 'Kerkstraat 191, Eindhoven', 'laurastone@yahoo.com', '1989-11-02', 'F', '0632144648', 'PkmcltZ5WAzktZCyLPuJ8mcCLG6aulmUalv28PugYOD0Q37oJZwaxwmqzbr5', '2017-01-14 00:04:59', '2017-01-15 20:48:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_order`
--
ALTER TABLE `menu_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `orders_order_id_unique` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_spans`
--
ALTER TABLE `time_spans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `menu_order`
--
ALTER TABLE `menu_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spots`
--
ALTER TABLE `spots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
