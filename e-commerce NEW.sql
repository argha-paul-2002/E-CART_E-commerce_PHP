-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 07:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(100) NOT NULL,
  `u_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ph_no` bigint(10) NOT NULL,
  `pincode` int(10) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `full_address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `u_id`, `name`, `ph_no`, `pincode`, `locality`, `full_address`, `city`, `state`, `district`) VALUES
(2, 3, 'Suvo Saha', 8585859595, 700111, 'Kolkata', 'Madhyamgram    ', 'Kolkata', 'West Bengal', 'North 24 PGS'),
(4, 1, 'Argha Paul', 8777360207, 700110, 'Sodepur', 'Sodepur Kolkata ', 'Kolkata', 'West Bengal', 'North 24 PGS'),
(5, 1, 'Aritra Saha', 8420139111, 700129, 'Madhyamgram', 'Madhyamgram,Barasat ', 'Kolkata', 'West Bengal', 'North 24 PGS');

-- --------------------------------------------------------

--
-- Table structure for table `company_name`
--

CREATE TABLE `company_name` (
  `id` int(100) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_name`
--

INSERT INTO `company_name` (`id`, `company_name`) VALUES
(1, 'roadstar'),
(2, 'jamdani saree'),
(3, 'kids choice'),
(4, 'decor'),
(5, 'adidas'),
(6, 'killer'),
(7, 'rigo'),
(8, 'viranga'),
(9, 'zardeep'),
(10, 'libas'),
(11, 'puma'),
(12, 'zimbar'),
(13, 'allen solly'),
(14, 'v-mart'),
(15, 'ajanta'),
(16, 'timex'),
(17, 'art galary');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `email`) VALUES
(1, 'arghapaul002@gmail.com'),
(2, 'digantabiswas246@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ship_address` int(100) NOT NULL,
  `order_total` int(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_item` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `order_date`, `ship_address`, `order_total`, `payment_method`, `total_item`) VALUES
(1, 1, '2023-03-21 15:42:34', 4, 4000, 'COD', 0),
(2, 1, '2023-03-21 16:03:26', 4, 4000, 'COD', 0),
(3, 1, '2023-03-21 17:32:12', 4, 4000, 'COD', 3),
(4, 1, '2023-03-21 18:34:37', 4, 4000, 'COD', 3),
(5, 1, '2023-03-21 18:59:56', 5, 4000, 'COD', 3),
(6, 1, '2023-03-21 22:17:47', 4, 4000, 'COD', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(100) NOT NULL,
  `pro_item_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `qty` int(50) NOT NULL,
  `size` int(5) NOT NULL,
  `price` int(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `pro_item_id`, `order_id`, `qty`, `size`, `price`, `date`) VALUES
(1, 1, 3, 3, 1, 500, '2023-03-21 17:32:12'),
(2, 1, 3, 3, 2, 500, '2023-03-21 17:32:12'),
(3, 1, 3, 2, 6, 500, '2023-03-21 17:32:12'),
(4, 1, 4, 3, 1, 500, '2023-03-21 18:34:37'),
(5, 1, 4, 3, 2, 500, '2023-03-21 18:34:37'),
(6, 1, 4, 2, 6, 500, '2023-03-21 18:34:37'),
(7, 1, 5, 3, 1, 500, '2023-03-21 18:59:56'),
(8, 1, 5, 3, 2, 500, '2023-03-21 18:59:56'),
(9, 1, 5, 2, 6, 500, '2023-03-21 18:59:56'),
(10, 1, 6, 3, 1, 500, '2023-03-21 22:17:47'),
(11, 1, 6, 3, 2, 500, '2023-03-21 22:17:47'),
(12, 1, 6, 2, 6, 500, '2023-03-21 22:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `product_type` varchar(10) NOT NULL,
  `pro_type_img_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_type`, `pro_type_img_name`) VALUES
(1, 'men', 'men'),
(2, 'women', 'women'),
(3, 'kids', 'kids'),
(4, 'decoration', 'decoration');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `company_name` int(100) NOT NULL,
  `pro_category` varchar(100) NOT NULL,
  `category_img` varchar(50) NOT NULL,
  `offer` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `company_name`, `pro_category`, `category_img`, `offer`) VALUES
(1, 1, 1, 'shirt', 'shirt', 50),
(2, 2, 2, 'sarees', 'sarees', 40),
(3, 3, 3, 't-shirts', 't-shirts', 35),
(4, 4, 4, 'clocks', 'clocks', 50),
(5, 1, 1, 't-shirt', 't-shirt', 60),
(6, 1, 6, 'jeans', 'jeans', 40),
(7, 1, 7, 'sweat-shirt', 'sweat-shirt', 50),
(8, 2, 8, 'skirt', 'skirt', 30),
(9, 2, 9, 'gowns', 'gowns', 25),
(10, 2, 10, 'kurtis', 'kurtis', 35),
(11, 3, 12, 'ethnic', 'ethnic', 25),
(12, 3, 13, 'sweatshirts', 'sweatshirts', 30),
(13, 3, 14, 'shirt', 'shirt', 40),
(14, 4, 17, 'paintings', 'paintings', 45),
(15, 4, 4, 'carpet', 'carpet', 35),
(16, 4, 4, 'show-piece', 'show-piece', 25);

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `id` int(100) NOT NULL,
  `product_type_id` int(100) NOT NULL,
  `pro_category` int(100) NOT NULL,
  `qty_stock` int(20) NOT NULL,
  `product_img_name` varchar(50) NOT NULL,
  `product_img_name_2` varchar(100) NOT NULL,
  `mrp` int(10) NOT NULL,
  `sell_price` int(10) NOT NULL,
  `discount` int(100) NOT NULL,
  `company_name` int(100) NOT NULL,
  `size_fit` varchar(50) NOT NULL,
  `product_details` varchar(100) NOT NULL,
  `short_product_details` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`id`, `product_type_id`, `pro_category`, `qty_stock`, `product_img_name`, `product_img_name_2`, `mrp`, `sell_price`, `discount`, `company_name`, `size_fit`, `product_details`, `short_product_details`, `status`, `date`) VALUES
(1, 1, 1, 50, 'shirt-1', 'shirt-1-2', 1000, 500, 50, 1, 'Slim fit', 'Lavender Tshirt for men\r\nSolid\r\nRegular length\r\nRound neck\r\nLong, regular sleeves', 'Men Lavender Raw Edge T-shirt', 1, '2023-03-15 00:00:00'),
(2, 1, 1, 50, 'shirt-2', 'shirt-2-2', 2000, 1000, 50, 13, 'Slim fit', 'Men Slim Fit Solid Spread Collar Formal Shirt', 'Men Slim Fit Solid Spread Collar Formal Shirt', 1, '2023-03-24 00:00:00'),
(3, 1, 5, 50, 't-shirt-1', 't-shirt-1-2', 700, 350, 50, 1, 'Slim Fit', 'OWN THE RUN TEE Men Solid Round Neck', 'OWN THE RUN TEE Men Solid Round Neck', 1, '2023-03-24 00:00:00'),
(4, 1, 5, 50, 't-shirt-2', 't-shirt-2-2', 1000, 600, 40, 5, 'Slim Fit', 'OWN THE RUN TEE Men Solid Round Neck Black T-Shirt', 'Men Solid Round Neck Black T-Shirt', 1, '2023-03-24 00:00:00'),
(5, 1, 5, 50, 't-shirt-3', 't-shirt-3-2', 700, 350, 50, 11, 'Slim Fit', 'Men Color Block Polo Neck Pink T-Shirt', 'Men Color Block Polo Neck Pink T-Shirt', 1, '2023-03-24 00:00:00'),
(6, 1, 5, 50, 't-shirt-4', 't-shirt-4-2', 1000, 500, 50, 11, 'Slim Fit', 'Men Solid Crew Neck Green T-Shirt', 'Men Solid Crew Neck Green T-Shirt', 1, '2023-03-24 00:00:00'),
(7, 1, 6, 50, 'jeans-1', 'jeans-1-2', 3000, 1500, 50, 6, 'Slim Fit', 'Men Tapered Fit Mid Rise Grey Jeans', 'Men Tapered Fit Mid Rise Grey Jeans', 1, '2023-03-24 00:00:00'),
(8, 1, 6, 50, 'jeans-2', 'jeans-2-2', 3000, 1500, 50, 6, 'Slim Fit', 'Men Slim Mid Rise Blue Jeans', 'Men Slim Mid Rise Blue Jeans', 1, '2023-03-24 00:00:00'),
(9, 1, 6, 50, 'jeans-3', 'jeans-3-3', 4000, 2000, 50, 1, 'Slim Fit', 'Men Regular Mid Rise Black Jeans', 'Men Regular Mid Rise Black Jeans', 1, '2023-03-24 00:00:00'),
(10, 1, 7, 50, 'sweat-shirt-2', 'sweat-shirt-2-2', 2000, 1000, 50, 7, 'Slim Fit', 'Men Full Sleeve Solid Hooded Sweatshirt', 'Men Full Sleeve Solid Hooded Sweatshirt', 1, '2023-03-24 00:00:00'),
(11, 1, 7, 50, 'sweat-shirt-1', 'sweat-shirt-1-2', 1500, 750, 50, 5, 'Slim Fit', 'Men Full Sleeve Solid Sweatshirt', 'Men Full Sleeve Solid Sweatshirt', 1, '2023-03-24 00:00:00'),
(12, 2, 2, 50, 'saree-1', 'saree-1-2', 1500, 750, 50, 2, 'Natural', 'Woven Kanjivaram Pure Silk Saree  (Red)', 'Woven Kanjivaram Pure Silk Saree  (Red)', 1, '2023-03-24 00:00:00'),
(13, 2, 2, 50, 'saree-2', 'saree-2-2', 2000, 1000, 50, 2, 'Natural', 'Woven Banarasi Silk Blend Saree  (Red)', 'Woven Banarasi Silk Blend Saree  (Red)', 1, '2023-03-24 00:00:00'),
(14, 2, 8, 50, 'skirt-1', 'skirt-1-2', 1200, 600, 50, 8, 'Slim Fit Natural', 'Women Embroidered Regular Black Skirt', 'Women Embroidered Regular Black Skirt', 1, '2023-03-24 00:00:00'),
(15, 2, 8, 50, 'skirt-2', 'skirt-2-2', 1500, 750, 50, 9, 'Natural', 'Women Printed Tiered Multicolor Skirt', 'Women Printed Tiered Multicolor Skirt', 1, '2023-03-24 00:00:00'),
(16, 2, 9, 50, 'gowns-1', 'gowns-1-2', 2000, 1000, 50, 9, 'Natural Fit', 'Solid Georgette Stitched Flared/A-line Gown  (Purple)', 'Solid Georgette Stitched Flared/A-line Gown  (Purp', 1, '2023-03-24 00:00:00'),
(17, 2, 9, 50, 'gowns-2', 'gowns-2-2', 3000, 1500, 50, 9, 'Natural Fit', 'Printed, Solid, Self Design Rayon Blend Stitched Anarkali Gown  (Black)', 'Printed, Solid, Self Design Rayon Blend Stitched A', 1, '2023-03-24 00:00:00'),
(18, 2, 10, 50, 'kurtis-1', 'kurtis-1-2', 1000, 500, 50, 10, 'Slim Fit', 'Women Printed Viscose Rayon Straight Kurta  (Dark Blue, Light Blue, Beige)', 'Women Printed Viscose Rayon Straight Kurta', 1, '2023-03-24 00:00:00'),
(19, 2, 10, 50, 'kurtis-2', 'kurtis-2-2', 700, 350, 50, 10, 'Slim Fit', 'Women Printed Viscose Rayon Flared Kurta  (Blue)', 'Women Printed Viscose Rayon Flared Kurta  (Blue)', 1, '2023-03-24 00:00:00'),
(20, 3, 11, 50, 'ethnic-1', 'ethnic-1-2', 600, 300, 50, 12, 'Slim Fit', 'Boys Casual Kurta and Patiala Set  (Pink Pack of 1)', 'Boys Casual Kurta and Patiala Set', 1, '2023-03-24 00:00:00'),
(21, 3, 13, 50, 'shirt-1', 'shirt-1-2', 800, 400, 50, 14, 'Natural', 'Boys Slim Fit Solid Casual Shirt (Pink)', 'Boys Slim Fit Solid Casual Shirt', 1, '2023-03-24 00:00:00'),
(22, 3, 13, 50, 'shirt-2', 'shirt-2-2', 600, 300, 50, 14, 'Natural Fit', 'Boys Regular Fit Color Block Casual Shirt', 'Boys Regular Fit Color Block Casual Shirt', 1, '2023-03-24 00:00:00'),
(23, 3, 3, 50, 't-shirt-1', 't-shirt-1-2', 800, 400, 50, 3, 'Slim Fit', 'Baby Boys Solid Cotton Blend T Shirt  (Dark Blue, Pack of 1)', 'Boys Solid Cotton Blend T Shirt', 1, '2023-03-24 00:00:00'),
(24, 3, 3, 50, 't-shirt-2', 't-shirt-2-2', 900, 450, 50, 3, 'Natural Fit', 'Boys Typography, Printed Cotton Blend T Shirt  (Multicolor, Pack of 1)', 'Boys Typography, Printed Cotton Blend T Shirt', 1, '2023-03-24 00:00:00'),
(25, 3, 12, 50, 'sweatshirts-1', 'sweatshirts-1-2', 1500, 750, 50, 13, 'Natural Fit', 'Boys Full Sleeve Solid Hooded Sweatshirt', 'Boys Full Sleeve Solid Hooded Sweatshirt', 1, '2023-03-24 00:00:00'),
(26, 4, 4, 50, 'clock-1', 'clock-1-2', 800, 400, 50, 16, 'Normal', 'Timex Analog 30.5 cm X 30.5 cm Wall Clock  (Beige, With Glass, Standard)', 'Timex Analog 30.5 cm X 30.5 cm Wall Clock', 1, '2023-03-24 00:00:00'),
(27, 4, 4, 50, 'clock-2', 'clock-2-2', 700, 350, 50, 15, 'Natural', 'AJANTA Analog 29 cm X 29 cm Wall Clock  (White, With Glass, Standard)', 'AJANTA Analog 29 cm X 29 cm Wall Clock  (White)', 1, '2023-03-24 00:00:00'),
(28, 4, 14, 50, 'paintings-1', 'paintings-1-2', 500, 250, 50, 17, 'Natural', 'Buddha set of 5 Panel Painting Digital Reprint 18 inch x 30 inch Painting  (Without Frame, Pack of 5', 'Buddha set of 5 Panel Painting Digital Reprint 18 ', 1, '2023-03-24 00:00:00'),
(29, 4, 14, 50, 'paintings-2', 'paintings-2-2', 600, 300, 50, 17, 'Natural', 'Digital Reprint 18 inch x 12 inch Painting  (With Frame, Pack of 3)', 'Digital Reprint 18 inch x 12 inch Painting', 1, '2023-03-24 00:00:00'),
(30, 4, 15, 50, 'carpet-1', 'carpet-1-2', 400, 200, 50, 7, 'Normal', 'Home Style Multicolor Cotton Carpet  (121 cm, X 183 cm, Rectangle)', 'Home Style Multicolor Cotton Carpet  (121 cm, X 183 cm, Rectangle)', 1, '2023-03-24 00:00:00'),
(31, 4, 16, 50, 'show-piece-1', 'show-piece-1-2', 800, 400, 50, 7, 'Normal', 'Chocozone Decorative Showpiece - 7.4 cm  (Plastic, Multicolor)', 'Chocozone Decorative Showpiece - 7.4 cm  (Plastic, Multicolor)', 1, '2023-03-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(100) NOT NULL,
  `pro_item_id` int(100) NOT NULL,
  `seller_address` varchar(100) NOT NULL,
  `seller_join_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_item`
--

CREATE TABLE `shopping_cart_item` (
  `id` int(100) NOT NULL,
  `cart_id` int(100) NOT NULL,
  `pro_item_id` int(100) NOT NULL,
  `qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_cart`
--

CREATE TABLE `shop_cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `pro_size` int(5) NOT NULL,
  `pro_qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_cart`
--

INSERT INTO `shop_cart` (`id`, `user_id`, `pro_id`, `pro_size`, `pro_qty`) VALUES
(3, 1, 1, 1, 3),
(5, 1, 1, 2, 3),
(13, 3, 1, 1, 1),
(15, 3, 1, 3, 1),
(21, 3, 1, 2, 1),
(22, 3, 1, 6, 2),
(23, 1, 1, 6, 2),
(24, 3, 30, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(100) NOT NULL,
  `size_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_name`) VALUES
(1, 's'),
(2, 'm'),
(3, 'l'),
(4, 'xl'),
(5, 'xxl'),
(6, 'free ');

-- --------------------------------------------------------

--
-- Table structure for table `size-qty`
--

CREATE TABLE `size-qty` (
  `id` int(100) NOT NULL,
  `pro_item_id` int(100) NOT NULL,
  `size` int(10) NOT NULL,
  `qty_available` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size-qty`
--

INSERT INTO `size-qty` (`id`, `pro_item_id`, `size`, `qty_available`) VALUES
(1, 1, 1, 10),
(3, 1, 2, 20),
(4, 1, 3, 15),
(5, 1, 6, 20),
(6, 30, 6, 50),
(7, 26, 6, 50),
(8, 27, 6, 50),
(9, 20, 1, 20),
(10, 20, 2, 20),
(11, 20, 3, 10),
(12, 16, 3, 30),
(13, 16, 6, 20),
(14, 17, 6, 50),
(15, 7, 1, 20),
(16, 7, 2, 20),
(18, 7, 4, 20),
(19, 8, 1, 15),
(20, 8, 3, 25),
(21, 9, 2, 30),
(22, 9, 3, 20),
(23, 18, 2, 15),
(24, 18, 3, 20),
(25, 19, 1, 10),
(26, 19, 2, 15),
(27, 19, 3, 15),
(28, 28, 6, 50),
(29, 29, 6, 50),
(30, 12, 6, 50),
(31, 13, 6, 50),
(32, 21, 1, 20),
(33, 21, 2, 20),
(34, 21, 3, 10),
(36, 2, 1, 15),
(37, 2, 2, 20),
(38, 2, 3, 20),
(39, 22, 1, 20),
(40, 22, 2, 20),
(41, 22, 4, 20),
(42, 31, 6, 50),
(43, 14, 2, 20),
(45, 14, 3, 20),
(46, 21, 6, 20),
(47, 15, 1, 20),
(48, 15, 2, 20),
(49, 15, 4, 20),
(50, 11, 2, 20),
(51, 11, 3, 20),
(52, 11, 4, 10),
(53, 10, 1, 15),
(54, 10, 2, 15),
(55, 25, 2, 15),
(57, 25, 3, 15),
(58, 23, 1, 15),
(59, 23, 2, 15),
(60, 23, 3, 15),
(61, 3, 1, 15),
(62, 3, 2, 15),
(63, 3, 4, 15),
(64, 4, 1, 15),
(65, 4, 2, 15),
(67, 4, 3, 15),
(68, 4, 5, 15),
(69, 24, 1, 15),
(70, 24, 2, 15),
(71, 24, 4, 15),
(72, 5, 1, 15),
(73, 5, 2, 15),
(74, 5, 3, 15),
(75, 5, 4, 15),
(76, 6, 1, 15),
(77, 6, 2, 15),
(78, 6, 3, 15),
(79, 6, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_no`, `gender`, `date_created`) VALUES
(1, 'Argha', 'Paul', 'arghapaul002@gmail.com', '123', 8777360207, '', '2023-03-07 07:30:49'),
(2, 'Diganta', 'Biswas', 'digantabiswas246@gmail.com', '123', 9883686295, '', '2023-03-07 08:13:53'),
(3, 'Jamuna', 'Paul', 'jamuna@gmail.com', '123', 8420139111, '', '2023-03-07 08:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pro_id`) VALUES
(30, 1, 1),
(38, 1, 2),
(43, 2, 13),
(34, 3, 1),
(36, 3, 2),
(37, 3, 31);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_item`
--

CREATE TABLE `wishlist_item` (
  `id` int(100) NOT NULL,
  `wishlist_id` int(100) NOT NULL,
  `pro_item_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `company_name`
--
ALTER TABLE `company_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ship_address` (`ship_address`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `company_name` (`company_name`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_type_id`),
  ADD KEY `product_id_2` (`product_type_id`),
  ADD KEY `pro_category_id` (`pro_category`),
  ADD KEY `company_name` (`company_name`),
  ADD KEY `product_type` (`product_type_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_item_id` (`pro_item_id`);

--
-- Indexes for table `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `pro_item_id` (`pro_item_id`);

--
-- Indexes for table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`pro_id`,`pro_size`),
  ADD KEY `shop_cart_ibfk_2` (`pro_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size-qty`
--
ALTER TABLE `size-qty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pro_item_id_2` (`pro_item_id`,`size`),
  ADD KEY `pro_item_id` (`pro_item_id`),
  ADD KEY `size` (`size`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`pro_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_id` (`wishlist_id`),
  ADD KEY `pro_item_id` (`pro_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_name`
--
ALTER TABLE `company_name`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_cart`
--
ALTER TABLE `shop_cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `size-qty`
--
ALTER TABLE `size-qty`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`ship_address`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`company_name`) REFERENCES `company_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_item`
--
ALTER TABLE `product_item`
  ADD CONSTRAINT `product_item_ibfk_1` FOREIGN KEY (`company_name`) REFERENCES `company_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_item_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_item_ibfk_3` FOREIGN KEY (`pro_category`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`pro_item_id`) REFERENCES `product_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  ADD CONSTRAINT `shopping_cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `shop_cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart_item_ibfk_2` FOREIGN KEY (`pro_item_id`) REFERENCES `product_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD CONSTRAINT `shop_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_cart_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `size-qty`
--
ALTER TABLE `size-qty`
  ADD CONSTRAINT `size-qty_ibfk_1` FOREIGN KEY (`pro_item_id`) REFERENCES `product_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `size-qty_ibfk_2` FOREIGN KEY (`size`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD CONSTRAINT `wishlist_item_ibfk_1` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_item_ibfk_2` FOREIGN KEY (`pro_item_id`) REFERENCES `product_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
