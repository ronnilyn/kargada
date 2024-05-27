-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 08:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freightsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_consumptions_reports`
--

CREATE TABLE `fms_g17_consumptions_reports` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_consumptions_reports`
--

INSERT INTO `fms_g17_consumptions_reports` (`id`, `title`, `description`) VALUES
(5, 'Panel', '<h2>1 Inspirational designs, illustrations, and graphic elements from the world&rsquo;s best designers.<br />\r\nWant more inspiration? Browse our&nbsp;<a href=\"https://dribbble.com/search/notification%20panel\">search results</a>...</h2>\r\n'),
(6, 'test', '<p><u><em><strong>report consumpotion 34</strong></em></u></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_items`
--

CREATE TABLE `fms_g17_items` (
  `id` int(11) NOT NULL,
  `reference_code` text NOT NULL,
  `itemname` text NOT NULL,
  `description` text NOT NULL,
  `length` text NOT NULL,
  `width` text NOT NULL,
  `height` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_items`
--

INSERT INTO `fms_g17_items` (`id`, `reference_code`, `itemname`, `description`, `length`, `width`, `height`) VALUES
(84, 'REF001', 'Device', 'A small widget with gears', '5', '3.5', '2'),
(85, 'REF001', 'Electronics', 'An electronic gadget with a touchscreen', '8', '4.5', '1.5'),
(86, 'REF001', 'Tool Set', 'A set of essential tools for DIY projects', '12', '6', '3'),
(87, 'REF002', 'Bookshelf', 'A wooden bookshelf with multiple shelves', '36', '24', '72'),
(88, 'REF003', 'Laptop', 'A high-performance laptop for gaming', '14', '10', '1'),
(89, 'REF003', 'Candle Set', 'A set of scented candles in various fragrances', '3', '3', '4'),
(90, 'REF004', 'Fitness Tracker', 'A wearable device to monitor fitness activities', '2.5', '0.8', '0.5'),
(91, 'REF005', 'Kitchen Blender', 'A powerful blender for smoothies and shakes', '10', '8', '12'),
(92, 'REF005', 'Artificial Plant', 'A realistic artificial plant for home decor', '6', '6', '4.6'),
(93, 'REF005', 'Wireless Headphones', 'High-quality wireless headphones with noise cancellation', '7', '6', '3'),
(94, 'REF006', 'Wireless Phone', 'High-quality wireless headphones with noise cancellation', '7', '6', '3');

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_notification`
--

CREATE TABLE `fms_g17_notification` (
  `id` int(11) NOT NULL,
  `all_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_notification`
--

INSERT INTO `fms_g17_notification` (`id`, `all_id`, `description`, `date_created`) VALUES
(2, 5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2024-03-22'),
(3, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_shipment`
--

CREATE TABLE `fms_g17_shipment` (
  `id` int(11) NOT NULL,
  `reference_code` text NOT NULL,
  `shipmentfrom` text NOT NULL,
  `shipmentto` text NOT NULL,
  `vehicle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_shipment`
--

INSERT INTO `fms_g17_shipment` (`id`, `reference_code`, `shipmentfrom`, `shipmentto`, `vehicle_id`) VALUES
(4, 'REF003', 'Central Storage Hub', 'Metro Logistics Center', 0),
(5, 'REF004', 'Coastal Distribution Warehouse', 'Inland Express Depot', 0),
(6, 'REF003', 'Inland Express Depot', 'Valley Storage Solutions', 0),
(7, 'REF002', 'Central Storage Hub', 'Metro Logistics Center', 0),
(8, 'REF002', 'Metro Logistics Center', 'Coastal Distribution Warehouse', 0),
(10, 'REF005', 'Central Storage Hub', 'Metro Logistics Center', 0),
(11, 'REF001', 'Central Storage Hub', 'Summit Logistics Facility', 0),
(12, 'REF002', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse M - 14 Lavilles Street, Mj Cuenco Avenue. P.C. 6000, Cebu City, Cebu.', 4),
(13, 'REF002', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse P - Door No. 2, Luzviminda Building, Km. 9 Old Arpt Rd, Sasa, Davao City, 8000 Davao del Sur', 4),
(14, 'REF002', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse Y - 5 Daisy Panacal Vill. P.C. 3500, Tuguegarao City, Cagayan', 4),
(15, 'REF004', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse P - Door No. 2, Luzviminda Building, Km. 9 Old Arpt Rd, Sasa, Davao City, 8000 Davao del Sur', 4),
(16, 'REF005', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse Q - Kasanyangan Rd, Zamboanga, 7000 Zamboanga del Su', 8),
(17, 'REF004', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse Q - Kasanyangan Rd, Zamboanga, 7000 Zamboanga del Su', 4),
(18, 'REF005', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse P - Door No. 2, Luzviminda Building, Km. 9 Old Arpt Rd, Sasa, Davao City, 8000 Davao del Sur', 4);

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_shipment_details`
--

CREATE TABLE `fms_g17_shipment_details` (
  `id` int(11) NOT NULL,
  `reference_code` text NOT NULL,
  `receiver_fullname` text NOT NULL,
  `receiver_contact` text NOT NULL,
  `receiver_address` text NOT NULL,
  `sender_fullname` text NOT NULL,
  `sender_contact` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_tin` text NOT NULL,
  `shipmentfrom` text NOT NULL,
  `shipmentto` text NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_shipment_details`
--

INSERT INTO `fms_g17_shipment_details` (`id`, `reference_code`, `receiver_fullname`, `receiver_contact`, `receiver_address`, `sender_fullname`, `sender_contact`, `sender_address`, `sender_tin`, `shipmentfrom`, `shipmentto`, `vehicle_id`, `status`) VALUES
(51, 'REF001', 'Alice Johnson', '111-222-3333', '123 Elm St, Cityville', 'Bob Anderson', '444-555-6666', '789 Oak St, Townsville', 'TIN123456', '', '', 0, ''),
(52, 'REF002', 'Charlie Brown', '777-888-9999', '456 Maple St, Villagetown', 'Diana Smith', '999-000-1111', '321 Pine St, Hamletville', 'TIN789012', '', '', 4, '4'),
(53, 'REF003', 'Eva Miller', '123-456-7890', '987 Birch St, Countryside', 'Frank Johnson', '222-333-4444', '654 Cedar St, Riverside', 'TIN345678', '', '', 0, '5'),
(54, 'REF004', 'George Williams', '555-666-7777', '789 Pine St, Lakeside', 'Helen Davis', '111-222-3333', '432 Oak St, Mountainside', 'TIN901234', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse Q - Kasanyangan Rd, Zamboanga, 7000 Zamboanga del Su', 4, '5'),
(55, 'REF005', 'Ivy Martinez', '888-999-0000', '567 Maple St, Hillside', 'Jack Smith', '333-444-5555', '876 Elm St, Seaside', 'TIN567890', 'Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila', 'Warehouse P - Door No. 2, Luzviminda Building, Km. 9 Old Arpt Rd, Sasa, Davao City, 8000 Davao del Sur', 4, '3'),
(56, 'REF006', 'Ivy Martinez', '888-999-0000', '567 Maple St, Hillside', 'Jack Smith', '333-444-5555', '876 Elm St, Seaside', 'TIN567890', '', '', 0, '5');

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_status`
--

CREATE TABLE `fms_g17_status` (
  `id` int(11) NOT NULL,
  `reference_code` text NOT NULL,
  `status` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_status`
--

INSERT INTO `fms_g17_status` (`id`, `reference_code`, `status`, `datetime`) VALUES
(2, 'REF004', '1', '2024-02-27 12:42:45'),
(3, 'REF004', '2', '2024-02-27 12:43:03'),
(4, 'REF004', '3', '2024-02-27 12:52:27'),
(5, 'REF002', '1', '2024-02-29 11:18:55'),
(6, 'REF002', '2', '2024-02-29 11:19:09'),
(7, 'REF002', '4', '2024-02-29 12:06:25'),
(8, '<br />\r\n<b>Notice</b>:  Undefined index: location in <b>C:\\xampp\\htdocs\\freightsystem\\dashboard\\shipment_details.php</b> on line <b>168</b><br />\r\n', '2', '2024-03-19 12:30:36'),
(9, '<br />\r\n<b>Notice</b>:  Undefined index: location in <b>C:\\xampp\\htdocs\\freightsystem\\dashboard\\shipment_details.php</b> on line <b>168</b><br />\r\n', '3', '2024-03-19 12:30:49'),
(10, 'REF005', '2', '2024-03-19 12:31:44'),
(11, 'REF006', '2', '2024-03-22 11:15:52'),
(12, 'REF006', '5', '2024-03-22 11:18:36'),
(13, 'REF003', '1', '2024-03-25 12:19:39'),
(14, 'REF003', '2', '2024-03-25 12:19:46'),
(15, 'REF003', '3', '2024-03-25 12:19:51'),
(16, 'REF003', '4', '2024-03-25 12:19:55'),
(17, 'REF003', '5', '2024-03-25 12:20:00'),
(18, 'REF004', '1', '2024-03-26 14:12:34'),
(19, 'REF004', '2', '2024-03-26 14:12:42'),
(20, 'REF005', '3', '2024-04-04 13:50:05'),
(21, 'REF004', '3', '2024-04-04 13:53:04'),
(22, 'REF004', '4', '2024-04-04 13:53:09'),
(23, 'REF004', '5', '2024-04-04 13:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_users`
--

CREATE TABLE `fms_g17_users` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `user_first_name` varchar(100) NOT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_email_address` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `passwordtxt` varchar(50) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_address` text NOT NULL,
  `code` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_users`
--

INSERT INTO `fms_g17_users` (`id`, `img`, `user_first_name`, `user_last_name`, `user_email_address`, `password`, `passwordtxt`, `user_contact`, `user_address`, `code`, `type`, `status`) VALUES
(1, 'curly-hairstyles-for-men-1200x900.jpg', 'Admin1', '', 'admin@admin.com', '$2y$10$M6NFb7FklQzv.YcNUrD5u.uPHq0CLpvjsMqix1CJzxI.1EH12Xc92', 'admin', '0', '', 22198, 0, 1),
(42, '', 'Driver', '', 'driver@kargada.com', '$2y$10$p8X29YgoCoY07iEcHoVk0Os/VG3cCG4UH0qLp4yBwDNsBk1GTAw4S', '123', '', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_vehicle`
--

CREATE TABLE `fms_g17_vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `make` text NOT NULL,
  `model` text NOT NULL,
  `year` int(11) NOT NULL,
  `registration` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `fuel_type` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `destination` text NOT NULL,
  `fuel_consumption` text NOT NULL,
  `added_fuel` text NOT NULL,
  `maintenance` text NOT NULL,
  `vehicle_status` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_vehicle`
--

INSERT INTO `fms_g17_vehicle` (`vehicle_id`, `driver_id`, `name`, `make`, `model`, `year`, `registration`, `capacity`, `fuel_type`, `created_at`, `updated_at`, `destination`, `fuel_consumption`, `added_fuel`, `maintenance`, `vehicle_status`, `latitude`, `longitude`) VALUES
(4, 0, 'asdasd132', 'asdas23', 'das33', 2342, 'sdfsd', 435, 'dfgdfg', '2024-03-25 15:17:48', '2024-03-25 15:17:48', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fms_g17_vehicle_availability`
--

CREATE TABLE `fms_g17_vehicle_availability` (
  `availability_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL DEFAULT current_timestamp(),
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fms_g17_vehicle_availability`
--

INSERT INTO `fms_g17_vehicle_availability` (`availability_id`, `vehicle_id`, `start_date`, `end_date`, `is_available`) VALUES
(2, 4, '2024-03-25', '2024-03-30', 1),
(3, 4, '2024-04-03', '2024-04-07', 0),
(4, 4, '2024-03-28', '2024-03-31', 1),
(5, 7, '2024-03-13', '2024-03-30', 1),
(6, 8, '2024-03-27', '2024-03-30', 1),
(7, 9, '2024-04-04', '2024-04-06', 0),
(8, 9, '2024-04-18', '2024-04-19', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fms_g17_consumptions_reports`
--
ALTER TABLE `fms_g17_consumptions_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fms_g17_items`
--
ALTER TABLE `fms_g17_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fms_g17_notification`
--
ALTER TABLE `fms_g17_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fms_g17_shipment`
--
ALTER TABLE `fms_g17_shipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fms_g17_shipment_details`
--
ALTER TABLE `fms_g17_shipment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fms_g17_status`
--
ALTER TABLE `fms_g17_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fms_g17_users`
--
ALTER TABLE `fms_g17_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fms_g17_vehicle`
--
ALTER TABLE `fms_g17_vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `fms_g17_vehicle_availability`
--
ALTER TABLE `fms_g17_vehicle_availability`
  ADD PRIMARY KEY (`availability_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fms_g17_consumptions_reports`
--
ALTER TABLE `fms_g17_consumptions_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fms_g17_items`
--
ALTER TABLE `fms_g17_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `fms_g17_notification`
--
ALTER TABLE `fms_g17_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fms_g17_shipment`
--
ALTER TABLE `fms_g17_shipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fms_g17_shipment_details`
--
ALTER TABLE `fms_g17_shipment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `fms_g17_status`
--
ALTER TABLE `fms_g17_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `fms_g17_users`
--
ALTER TABLE `fms_g17_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `fms_g17_vehicle`
--
ALTER TABLE `fms_g17_vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fms_g17_vehicle_availability`
--
ALTER TABLE `fms_g17_vehicle_availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
