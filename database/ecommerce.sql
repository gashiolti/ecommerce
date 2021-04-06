-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 12:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`) VALUES
('Accessories'),
('Computer'),
('Console'),
('Gaming'),
('Laptop'),
('Monitor'),
('SmartPhone'),
('SmartWatch'),
('TV');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatID` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `time_delivered` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatID`, `from_user_id`, `to_user_id`, `message`, `time_delivered`) VALUES
(1, 5, 11, 'hello sir', '04:53:34'),
(2, 5, 11, 'how you doing?', '04:53:45'),
(3, 5, 11, 'Hello sir?', '02:30:51'),
(4, 5, 11, 'haaaaaaaaaai men', '07:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `name` varchar(60) NOT NULL,
  `fname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`name`, `fname`) VALUES
('Acer', NULL),
('Apple', 'images/icons/companyIcons/Apple_logo_black.svg'),
('Asus', NULL),
('Dell', NULL),
('Google', 'images/icons/companyIcons/google-icon.svg'),
('HP', NULL),
('Huawei', 'images/icons/companyIcons/huawei.png'),
('LogiTech', NULL),
('Microsoft', NULL),
('OnePlus', 'images/icons/companyIcons/oneplus.png'),
('PlayStation', NULL),
('Samsung', 'images/icons/companyIcons/samsung.png'),
('Xbox', 'images/icons/companyIcons/xbox.png'),
('Xiaomi', 'images/icons/companyIcons/xiaomi.png');

-- --------------------------------------------------------

--
-- Table structure for table `favouritelist`
--

CREATE TABLE `favouritelist` (
  `flID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favouritelist`
--

INSERT INTO `favouritelist` (`flID`, `userID`, `productID`) VALUES
(1, 5, 64),
(2, 5, 76),
(3, 5, 78);

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

CREATE TABLE `order_` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_`
--

INSERT INTO `order_` (`orderID`, `userID`, `paid`) VALUES
(22, 5, 1),
(23, 5, 1),
(24, 14, 1),
(25, 14, 1),
(26, 5, 1),
(27, 5, 1),
(28, 5, 1),
(29, 5, 1),
(30, 5, 1),
(31, 5, 1),
(32, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` smallint(6) DEFAULT NULL,
  `date_ordered` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderID`, `productID`, `quantity`, `date_ordered`) VALUES
(22, 68, 1, '2021-03-17 18:04:16'),
(22, 75, 1, '2021-03-17 18:04:16'),
(23, 89, 1, '2021-03-19 17:24:28'),
(23, 77, 1, '2021-03-19 17:24:28'),
(23, 74, 1, '2021-03-19 17:24:28'),
(24, 83, 1, '2021-03-21 16:08:52'),
(25, 65, 1, '2021-03-21 16:16:09'),
(26, 66, 1, '2021-03-30 17:06:27'),
(27, 65, 3, '2021-04-04 11:22:00'),
(28, 65, 3, '2021-04-04 11:24:25'),
(29, 76, 5, '2021-04-04 11:30:42'),
(30, 76, 3, '2021-04-04 11:41:09'),
(31, 64, 1, '2021-04-04 11:42:29'),
(31, 65, 1, '2021-04-04 11:42:29'),
(31, 66, 1, '2021-04-04 11:42:29'),
(32, 80, 8, '2021-04-05 11:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `cart_type` varchar(50) DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `date_` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_ID`, `orderID`, `userID`, `cart_type`, `total_price`, `date_`) VALUES
(12, 22, 5, 'Visa', '1029.98', '2021-03-17 18:04:16'),
(13, 23, 5, 'Westernunion', '1879.97', '2021-03-19 17:24:28'),
(14, 24, 14, 'Mastercard', '99.99', '2021-03-21 16:08:52'),
(15, 25, 14, 'Mastercard', '699.99', '2021-03-21 16:16:09'),
(16, 26, 5, 'Mastercard', '1899.99', '2021-03-30 17:06:27'),
(17, 27, 5, 'Mastercard', '2099.97', '2021-04-04 11:22:00'),
(18, 28, 5, 'Mastercard', '2099.97', '2021-04-04 11:24:25'),
(19, 29, 5, 'Visa', '5999.95', '2021-04-04 11:30:42'),
(20, 30, 5, 'Mastercard', '3599.97', '2021-04-04 11:41:09'),
(21, 31, 5, 'Mastercard', '3699.97', '2021-04-04 11:42:29'),
(22, 32, 13, 'Visa', '4799.92', '2021-04-05 11:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `userID` int(11) NOT NULL,
  `age` smallint(6) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `adress` varchar(150) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `postal_code` varchar(35) DEFAULT NULL,
  `phone_nr` varchar(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`userID`, `age`, `gender`, `adress`, `city`, `country`, `postal_code`, `phone_nr`) VALUES
(5, 30, 'male', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '49531532'),
(1, 30, 'Female', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '+38349567543'),
(9, 30, 'Female', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '49853124'),
(10, 30, 'Female', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '49752153'),
(11, 30, 'male', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '195338132'),
(13, 25, 'Female', '70 Grange Road London NW35 7QJ', 'London', 'United Kingdom', 'N5V', '447989023612'),
(5, 30, 'male', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '49531532'),
(1, 30, 'Female', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '+38349567543'),
(9, 30, 'Female', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '49853124'),
(10, 30, 'Female', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '49752153'),
(11, 30, 'male', '70 Grange Road London NW35 7QJ', 'London', 'UK', 'N5V 1A6', '195338132'),
(13, 25, 'Female', '70 Grange Road London NW35 7QJ', 'London', 'United Kingdom', 'N5V', '447989023612'),
(14, 23, 'male', '681 Glen Creek Drive\r\nBrooklyn, NY 11221', 'New York', 'USA', '11221', '1354648646'),
(15, 29, 'male', 'blablablablabla', 'Ferizaj', 'Kosovo', '70000', '049475523');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `quantity` smallint(6) DEFAULT NULL,
  `category_name` varchar(40) DEFAULT NULL,
  `company_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `product_name`, `price`, `quantity`, `category_name`, `company_name`) VALUES
(64, 'Samsung Galaxy Note 20 Ultra 5G', '1099.99', 0, 'SmartPhone', 'Samsung'),
(65, 'PlayStation 5', '699.99', 6, 'Console', 'PlayStation'),
(66, 'Laptop HP i9, 16GB Ram, RTX 3070 ', '1899.99', 2, 'Laptop', 'HP'),
(67, 'Samsung Galaxy S20 FE 5G 256GB ', '499.99', 4, 'SmartPhone', 'Samsung'),
(68, 'Samsung TV Ultra HD 49\"', '699.99', 3, 'TV', 'Samsung'),
(74, 'Monitor DELL 24\'\' 144Ghz', '279.99', 5, 'Monitor', 'Dell'),
(75, 'Xbox Series S 500 GB Black', '329.99', 5, 'Console', 'Xbox'),
(76, 'Iphone 11 PRO Max 256 GB', '1199.99', 6, 'SmartPhone', 'Apple'),
(77, 'Huawei P40 PRO 256 GB', '899.99', 5, 'SmartPhone', 'Huawei'),
(78, 'PlayStation 4 Slim 500 GB ', '349.99', 4, 'Console', 'PlayStation'),
(79, 'SAMSUNG Gaming Monitor 244 GHZ 49\"', '599.99', 4, 'Monitor', 'Samsung'),
(80, 'Iphone SE 2 64GB', '599.99', 0, 'SmartPhone', 'Apple'),
(81, 'Laptop ASUS ZenBook Duo , 14 \", Intel Core i7, 8GB ', '1599.99', 6, 'Laptop', 'Asus'),
(82, 'Storm AMD Unbelievable (Ryzen 9 5950X, 32GB 4x8GB 4000MHz ', '3499.99', 3, 'Computer', 'Asus'),
(83, 'Logitech MX Anywhere 2S Graphite, Wireless Mouse', '99.99', 6, 'Accessories', 'LogiTech'),
(84, 'Monitor ASUS VG32VQ1B - 32\'\' LED', '489.99', 6, 'Monitor', 'Asus'),
(85, 'Apple Watch Nike Series 6 40mm (Space Gray), Smart Watch', '579.50', 9, 'SmartWatch', 'Apple'),
(87, 'GOOGLE Pixel 4a, 6GB/128GB Black', '589.99', 8, 'SmartPhone', 'Google'),
(88, 'Google Speaker Nest Mini, Second Generation', '49.99', 6, 'Accessories', 'Google'),
(89, 'Xiaomi Mi 10T Pro, 6.67\" FHD+, 8GB RAM, 128GB', '699.99', 3, 'SmartPhone', 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `fname`) VALUES
(44, 64, 'uploads/5fd9379ec051a1.53690808.jpg'),
(45, 65, 'uploads/5fd937b39b61e5.81865272.png'),
(46, 66, 'uploads/5fd93af897aab6.33703592.png'),
(47, 67, 'uploads/5fd93b5830f2d1.88153952.jpg'),
(48, 68, 'uploads/5fd93be73426e6.10460758.jpg'),
(54, 74, 'uploads/5ff34eded0eb12.35021686.jpg'),
(55, 75, 'uploads/5ff34f19a25b77.52523037.jpg'),
(56, 76, 'uploads/5ff34f69a9b8b6.05013197.jpg'),
(57, 77, 'uploads/5ff34fb1a57aa7.01377439.jpg'),
(58, 78, 'uploads/5ff3502c84d028.23281362.jpg'),
(59, 79, 'uploads/5ff350a99e5060.44156645.jpg'),
(60, 80, 'uploads/5ff350d56fde08.62201806.jpg'),
(61, 81, 'uploads/5ff3522c394e13.01189649.jpeg'),
(62, 82, 'uploads/5ff352be37b449.91040420.jpeg'),
(63, 83, 'uploads/5ff3557834c581.69594629.jpeg'),
(64, 84, 'uploads/5ff355c5e830c9.95984113.jpeg'),
(65, 85, 'uploads/5ff356f95ff907.32842418.jpeg'),
(67, 87, 'uploads/5ff4fc8d719be4.92106763.jpeg'),
(68, 88, 'uploads/5ff4fd2762f896.98847917.jpeg'),
(69, 89, 'uploads/5ff4fdc1d07685.43710716.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `role_`
--

CREATE TABLE `role_` (
  `id` int(11) NOT NULL,
  `description_` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_`
--

INSERT INTO `role_` (`id`, `description_`) VALUES
(1, 'Administrator'),
(2, 'HelpAgent'),
(3, 'Consumator'),
(8, 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `shcID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `quantity` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`shcID`, `userID`, `productID`, `quantity`) VALUES
(14, NULL, 68, 1),
(27, 5, 80, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`time_stamp`, `orderID`, `userID`, `status`) VALUES
('2021-03-30 12:48:04', 22, 5, 3),
('2021-03-21 13:11:19', 23, 5, 3),
('2021-03-21 16:18:28', 25, 14, 3),
('2021-03-30 17:06:27', 26, 5, 1),
('2021-04-04 11:22:00', 27, 5, 1),
('2021-04-04 11:24:25', 28, 5, 1),
('2021-04-04 11:30:42', 29, 5, 1),
('2021-04-04 11:41:09', 30, 5, 1),
('2021-04-04 11:42:29', 31, 5, 1),
('2021-04-05 11:36:24', 32, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_`
--

CREATE TABLE `user_` (
  `userID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_` varchar(100) NOT NULL,
  `fname` varchar(35) DEFAULT NULL,
  `last_name` varchar(35) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_`
--

INSERT INTO `user_` (`userID`, `email`, `password_`, `fname`, `last_name`, `roleID`) VALUES
(1, 'gencgashi@gmail.com', '$2y$10$/O2.qQZK60C1Y1wjFd7GquCVHDNwHz5vSRk7FtK3Bo1U9g5W41OAK', 'Genc', 'Gashi', 1),
(5, 'olti.g@hotmail.com', '$2y$10$HAQ/iSryPHEsgX9vtsvN2eR./tq3nAQuNu/JIOqnIlLesMolnCUjO', 'Oltion', 'Gashi', 3),
(9, 'blerimdestani@gmail.com', '$2y$10$HHvM37aNMe55..7r6ongHu8FgCq6EPmqSg.fG7goA6CJ.20OToaPa', 'Blerim', 'Destani', 3),
(10, 'destanbytyqi@gmail.com', '$2y$10$yDUtxJyUOeAcfitOqZjhpuA2vowtInsDevpe5CY6Ldvwm/3dvhvR2', 'Blerim', 'Destani', 3),
(11, 'adriankrasniqi@hotmail.com', '$2y$10$1gdWif7T8vOkQDcjEOPhWOARs9UL/PqFI8kG83PCWgKa7tKpNnOA6', 'Adrian', 'Krasniqi', 2),
(13, 'oliviajones@gmail.com', '$2y$10$P3fm.iPhNwhETX7l4QFJoeYC/l4V0QSVIT6dL7F4gQqrpAhvRh2k2', 'Olivia', 'Jones', 3),
(14, 'filan@gmail.com', '$2y$10$RjoB3m1JkT5/82PxDYT.2OC4H6n0onypTts5NDr.XWb60.vnKmzwO', 'Filan', 'Fisteku', 3),
(15, 'agonkurtaj@gmail.com', '$2y$10$MfqQ3RqZUXTSdNNqjfbMR.4GrY3lshGrYpLRBsPorCiS5.4.2U2kK', 'Agon', 'Kurtaj', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatID`),
  ADD KEY `userID` (`from_user_id`),
  ADD KEY `userID_2` (`to_user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `favouritelist`
--
ALTER TABLE `favouritelist`
  ADD PRIMARY KEY (`flID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `company_name` (`company_name`),
  ADD KEY `category_name` (`category_name`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `role_`
--
ALTER TABLE `role_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`shcID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`orderID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favouritelist`
--
ALTER TABLE `favouritelist`
  MODIFY `flID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_`
--
ALTER TABLE `order_`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `role_`
--
ALTER TABLE `role_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `shcID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_`
--
ALTER TABLE `user_`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user_` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user_` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favouritelist`
--
ALTER TABLE `favouritelist`
  ADD CONSTRAINT `favouritelist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favouritelist_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_`
--
ALTER TABLE `order_`
  ADD CONSTRAINT `order__ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order_` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `order_` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order_` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user_` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD CONSTRAINT `personal_info_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`company_name`) REFERENCES `company` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order_` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracking_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user_` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_`
--
ALTER TABLE `user_`
  ADD CONSTRAINT `user__ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role_` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
