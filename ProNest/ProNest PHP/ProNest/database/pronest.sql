-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 03:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pronest`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(256) NOT NULL,
  `contact` int(12) NOT NULL,
  `image` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `product_id`, `title`, `description`, `author`, `contact`, `image`, `created_at`) VALUES
(19, 15, 'Blog Title Goes Here', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula, nunc vel dignissim commodo, metus sem porttitor enim, ac euismod magna ipsum id neque. Fusce nec lectus sed risus accumsan ultricies. Nam ultricies molestie ante a aliquet. Integer volutpat risus a sapien tincidunt, nec faucibus sem iaculis. Suspendisse potenti.\r\n\r\nQuisque sit amet ornare urna. Duis congue auctor nisi. Praesent euismod, lorem vel eleifend bibendum, dolor purus pharetra lectus, non blandit velit urna at justo. Integer scelerisque mollis purus, eget aliquam elit fringilla non. Nulla feugiat eros id elit sagittis, a tempus tortor aliquet. Curabitur quis nunc ligula.\r\n\r\nPhasellus at facilisis mauris. Donec vitae nisi nec justo facilisis congue. In vitae sem consequat, fermentum nisl nec, ultricies erat. Suspendisse potenti. Donec faucibus vestibulum magna, in accumsan velit ultricies nec. Duis et accumsan nibh, ut facilisis felis.', 'testing', 1234567890, 'Energy Efficient Doors _pro.jpg', '2025-01-24 07:18:39'),
(20, 15, 'Blog Title Goes Here One', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula, nunc vel dignissim commodo, metus sem porttitor enim, ac euismod magna ipsum id neque. Fusce nec lectus sed risus accumsan ultricies. Nam ultricies molestie ante a aliquet. Integer volutpat risus a sapien tincidunt, nec faucibus sem iaculis. Suspendisse potenti.\r\n\r\nQuisque sit amet ornare urna. Duis congue auctor nisi. Praesent euismod, lorem vel eleifend bibendum, dolor purus pharetra lectus, non blandit velit urna at justo. Integer scelerisque mollis purus, eget aliquam elit fringilla non. Nulla feugiat eros id elit sagittis, a tempus tortor aliquet. Curabitur quis nunc ligula.\r\n\r\nPhasellus at facilisis mauris. Donec vitae nisi nec justo facilisis congue. In vitae sem consequat, fermentum nisl nec, ultricies erat. Suspendisse potenti. Donec faucibus vestibulum magna, in accumsan velit ultricies nec. Duis et accumsan nibh, ut facilisis felis.', 'testing', 1234567890, 'Energy Efficient Doors _pro.jpg', '2025-01-24 07:18:39'),
(21, 15, 'Blog Title Goes Here Two', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula, nunc vel dignissim commodo, metus sem porttitor enim, ac euismod magna ipsum id neque. Fusce nec lectus sed risus accumsan ultricies. Nam ultricies molestie ante a aliquet. Integer volutpat risus a sapien tincidunt, nec faucibus sem iaculis. Suspendisse potenti.\r\n\r\nQuisque sit amet ornare urna. Duis congue auctor nisi. Praesent euismod, lorem vel eleifend bibendum, dolor purus pharetra lectus, non blandit velit urna at justo. Integer scelerisque mollis purus, eget aliquam elit fringilla non. Nulla feugiat eros id elit sagittis, a tempus tortor aliquet. Curabitur quis nunc ligula.\r\n\r\nPhasellus at facilisis mauris. Donec vitae nisi nec justo facilisis congue. In vitae sem consequat, fermentum nisl nec, ultricies erat. Suspendisse potenti. Donec faucibus vestibulum magna, in accumsan velit ultricies nec. Duis et accumsan nibh, ut facilisis felis.', 'testing', 1234567890, 'Energy Efficient Doors _pro.jpg', '2025-01-24 07:18:39'),
(22, 15, 'Blog Title Goes Here Three', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula, nunc vel dignissim commodo, metus sem porttitor enim, ac euismod magna ipsum id neque. Fusce nec lectus sed risus accumsan ultricies. Nam ultricies molestie ante a aliquet. Integer volutpat risus a sapien tincidunt, nec faucibus sem iaculis. Suspendisse potenti.\r\n\r\nQuisque sit amet ornare urna. Duis congue auctor nisi. Praesent euismod, lorem vel eleifend bibendum, dolor purus pharetra lectus, non blandit velit urna at justo. Integer scelerisque mollis purus, eget aliquam elit fringilla non. Nulla feugiat eros id elit sagittis, a tempus tortor aliquet. Curabitur quis nunc ligula.\r\n\r\nPhasellus at facilisis mauris. Donec vitae nisi nec justo facilisis congue. In vitae sem consequat, fermentum nisl nec, ultricies erat. Suspendisse potenti. Donec faucibus vestibulum magna, in accumsan velit ultricies nec. Duis et accumsan nibh, ut facilisis felis.', 'testing', 1234567890, 'Energy Efficient Doors _pro.jpg', '2025-01-24 07:18:39'),
(23, 15, 'Blog Title Goes Here Four', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula, nunc vel dignissim commodo, metus sem porttitor enim, ac euismod magna ipsum id neque. Fusce nec lectus sed risus accumsan ultricies. Nam ultricies molestie ante a aliquet. Integer volutpat risus a sapien tincidunt, nec faucibus sem iaculis. Suspendisse potenti.\r\n\r\nQuisque sit amet ornare urna. Duis congue auctor nisi. Praesent euismod, lorem vel eleifend bibendum, dolor purus pharetra lectus, non blandit velit urna at justo. Integer scelerisque mollis purus, eget aliquam elit fringilla non. Nulla feugiat eros id elit sagittis, a tempus tortor aliquet. Curabitur quis nunc ligula.\r\n\r\nPhasellus at facilisis mauris. Donec vitae nisi nec justo facilisis congue. In vitae sem consequat, fermentum nisl nec, ultricies erat. Suspendisse potenti. Donec faucibus vestibulum magna, in accumsan velit ultricies nec. Duis et accumsan nibh, ut facilisis felis.', 'testing', 1234567890, 'Energy Efficient Doors _pro.jpg', '2025-01-24 07:18:39'),
(24, 15, 'Blog Title Goes Here Five', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula, nunc vel dignissim commodo, metus sem porttitor enim, ac euismod magna ipsum id neque. Fusce nec lectus sed risus accumsan ultricies. Nam ultricies molestie ante a aliquet. Integer volutpat risus a sapien tincidunt, nec faucibus sem iaculis. Suspendisse potenti.\r\n\r\nQuisque sit amet ornare urna. Duis congue auctor nisi. Praesent euismod, lorem vel eleifend bibendum, dolor purus pharetra lectus, non blandit velit urna at justo. Integer scelerisque mollis purus, eget aliquam elit fringilla non. Nulla feugiat eros id elit sagittis, a tempus tortor aliquet. Curabitur quis nunc ligula.\r\n\r\nPhasellus at facilisis mauris. Donec vitae nisi nec justo facilisis congue. In vitae sem consequat, fermentum nisl nec, ultricies erat. Suspendisse potenti. Donec faucibus vestibulum magna, in accumsan velit ultricies nec. Duis et accumsan nibh, ut facilisis felis.', 'testing', 1234567890, 'Energy Efficient Doors _pro.jpg', '2025-01-24 07:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `post_code` varchar(256) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ID`, `first_name`, `last_name`, `contact_number`, `email`, `post_code`, `product_id`, `created_at`) VALUES
(22, 'Virat', 'Kohli', '1234567890', 'virat@gmail.com', '7', 30, '2025-01-23 09:08:05'),
(23, 'Ajit', 'Agarkar', '1234567890', 'ajit@yahoo.com', '4582', 30, '2025-01-24 14:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `our_products`
--

CREATE TABLE `our_products` (
  `ID` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_products`
--

INSERT INTO `our_products` (`ID`, `product_name`) VALUES
(15, 'Solar Panel'),
(16, 'Energy Efficient Doors'),
(17, 'Stylish Doors'),
(19, 'Bathroom Renovations'),
(20, 'Outdoor Living Spaces'),
(21, 'Innovative Lighting Solutions'),
(22, 'Basement Renovations'),
(23, 'Green Remodeling'),
(24, 'Home Restoration'),
(25, 'Spray foam insulation'),
(26, 'Fiberglass insulation'),
(27, 'Rockwool insulation'),
(28, 'Mineral Wool insulation'),
(29, 'Insulated Doors'),
(30, 'Sheep Wool insulation'),
(31, 'Lambs Wool insulation'),
(32, 'Cellulose insulation'),
(33, 'Silver Foil  insulation'),
(34, 'Recycled Plastic insulation'),
(35, 'Granular insulation'),
(36, 'Doors'),
(37, 'Windows'),
(38, 'Conservatories'),
(39, 'Porches'),
(40, 'Patio'),
(41, 'Roofline'),
(42, 'Garden Rooms'),
(43, 'Orangeries');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `feature_img` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `feature_img`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$G41R38RQYFTeS280yxp.Zu.dQnyaZRJSKVwz1/2nUvd4YCoOPXzEC', 'admin', '2025-01-20 07:57:01'),
(3, 'MS Dhoni', 'dhoni@yahoo.com', 'Capture.PNG', '$2y$10$dTipzKLT5UkraSa8rYTofe/CL93sY88srj/gPmCNJfyqX9mUPgyX.', 'user', '2025-01-21 08:15:51'),
(8, 'Sourav', 'sourav@gmail.com', 'Bathroom Renovations_overview.png', '$2y$10$5xPQStoHancfIfta1m1ZP.S1Tc6/wj8ZXuMm4dG7w5SObCIKtmLZa', 'user', '2025-01-24 12:26:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `our_products`
--
ALTER TABLE `our_products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `our_products`
--
ALTER TABLE `our_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
