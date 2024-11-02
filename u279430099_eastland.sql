-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2024 at 12:07 PM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u279430099_eastland`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(350) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(350) NOT NULL,
  `randomId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`id`, `title`, `description`, `image`, `randomId`) VALUES
(2, 'Our Story', '		<p>\r\n					Eastland Wellness was founded in 2010 with the belief that there is a better alternative to long-term health than prescription drugs. we are the  Pharmacist Recommended Halal Vitamin and Supplement brand in nine product segments.\r\n				</p>\r\n				<p>\r\n					We specialize in Halal-certified formulas that meet rigorous standards. Our commitment is to fit your lifestyle needs at every stage with quality products.\r\n				</p>\r\n				<p>\r\n					Eastland Wellness was founded in 2010 with the belief that there is a better alternative to long-term health than prescription drugs. we are the  Pharmacist Recommended Halal Vitamin and Supplement brand in nine product segments. We specialize in Halal-certified formulas that meet rigorous standards.\r\n				</p>', '../assets/images/654894437bimageabout1.png', '654894437b'),
(3, 'Our Quality Procedures', '<p style=\"text-align: justify; font-size: 16px; line-height: 30px;\" class=\"mt-4\">\r\n					From start to finish all  raw materials and products go through a robust quality process. We work closely with suppliers to select and test ingredients. Our manufacturing procedures follow dietary supplement  and each product is produced adhering to US FDA guidelines. Active ingredients are assayed properly, and finished goods are subjected to rigorous analytical testing.\r\n					<br>\r\n					We work closely with suppliers to select and test ingredients. Our manufacturing procedures follow dietary supplement  and each product is produced adhering to US FDA guidelines.\r\n					<br>\r\n					Mason undergoes thorough regular Local, State and FDA inspections and is consistently being audited and certified by a leading independent company.\r\n				</p>', '../assets/images/6548947fcbimageabout2.png', '6548947fcb'),
(4, 'Our Facilities, Research & Customer Service', '<p style=\"text-align: justify; font-size: 16px; line-height: 30px;\" class=\"mt-4\">\r\n					With over 140,000 square feet of warehousing space in Miami Lakes, Florida, we can service the entire country through our distributor and retail network. Our advanced technological system allows for fast order tracking and provides accurate freight information. We pride ourselves of our research and development approach. We create exclusive and unique formulas that address specific health concerns. and courteous attention given to all consumers. Our philosophy is simple – we are committed to providing a superior customer service experience.\r\n					<br>\r\n					Our advanced technological system allows for fast order tracking and provides accurate freight information. We pride ourselves of our research and development approach.\r\n				</p>', '../assets/images/654894a980imageabout3.png', '654894a980'),
(5, 'Vitamins and Supplements from USA is Halal-certified', '	<div class=\"col-md-6\">\r\n				<p style=\"font-size: 16px; text-align: justify; line-height: 30px;\" class=\"poppins\">\r\n					To determine if a supplement is Halal-certified, you should look for the Halal-certification logo on the product’s packaging. This logo indicates that the product has met rigorous standards and has been certified by a recognized Halal certification body, such as the Islamic Services of America (ISA) or the Islamic Food and Nutrition Council of America (IFANCA).\r\n				</p>\r\n				<h6 class=\"poppins\">Halal-certified supplements must meet certain requirements, including:</h6>\r\n				<ul>\r\n					<li>Ingredients must come from halal sources.</li>\r\n				</ul>\r\n			</div>\r\n			<div class=\"col-md-6\">\r\n				<ul>\r\n					<li>Food sourced from animals must be slaughtered according to Islamic methods.</li>\r\n					<li>All other ingredients must be free from non-halal elements, such as pork or alcohol.</li>\r\n					<li>The product must be processed in a facility that maintains the integrity of the halal status.</li>\r\n					<li>If a supplement does not have a Halal-certification label, you can assume it is not Halal. Always check the packaging for the Halal-certification logo to ensure the product meets these standards.</li>\r\n				</ul>\r\n			</div>', '../assets/images/654894f6b2imagehalal.png', '654894f6b2');

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip_code` varchar(250) NOT NULL,
  `ph_number` varchar(20) NOT NULL,
  `shipping_type` varchar(100) NOT NULL,
  `randomId` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`id`, `email`, `first_name`, `last_name`, `address`, `city`, `state`, `zip_code`, `ph_number`, `shipping_type`, `randomId`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', 'Test', 'Tester', 'test', 'test', 'test', 'test', '1234567890', 'standard', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(2, 'test@gmail.com', 'Test', 'Tester', 'test', 'test', 'test', 'test', '1234567890', 'standard', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(3, 'test@gmail.com', 'Test', 'Tester', 'test', 'test', 'test', 'test', '1234567890', 'express', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(4, 'test@gmail.com', 'Test', 'Tester', 'test', 'test', 'test', 'test', '1234567890', 'express', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(5, 'abhishekvalluri1806@gmail.com', 'Abhishek', 'Valluri', 'test1', 'test1', 'test1', 'test1', '7997675300', 'standard', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(6, 'abhishekvalluri1806@gmail.com', 'Abhishek', 'Valluri', 'test1', 'test1', 'test1', 'test1', '7997675300', 'standard', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(7, 'abhishekvalluri1806@gmail.com', 'Abhishek', 'Valluri', 'test1', 'test1', 'test1', 'test1', '7997675300', 'express', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(8, 'abhishekvalluri1806@gmail.com', 'Abhishek', 'Valluri', 'test1', 'test1', 'test1', 'test1', '7997675300', 'express', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(9, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'test', 'test', 'test', 'test', '123456', 'standard', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(10, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'test', 'test', 'test', 'test', '121212121', 'express', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(11, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'test', 'test', 'test', 'test', '12121212', 'standard', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(12, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'test', 'test', 'test', 'test', '1212121', 'express', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(13, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'test', 'test', 'test', 'test', '1212121', 'express', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(14, 'motamarribharathi@gmail.com', 'Bharathi', 'M', '1129 wetlands court,', 'Lawrenceville', 'GA', '30044', '678567567', 'standard', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(15, 'motamarribharathi@gmail.com', 'Bharathi', 'M', '1129 wetlands court,', 'Lawrenceville', 'GA', '30044', '975412451', 'express', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(16, 'motamarribharathi@gmail.com', 'Bharathi', 'M', '1129 wetlands court', 'Lawrenceville', 'GA', '30044', '97541245', 'standard', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(17, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', '1129 wetlands court', 'Lawrenceville', 'GA', '30044', '123456789', 'express', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(18, 'abhishekvalluri1806@gmail.com', 'Abhishek', 'Valluri', 'my adress', 'Kakinada', 'Andhra Pradesh', '53303', '7997675300', 'express', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(19, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'kakinada', 'kakinada', 'Ap', '533002', '1234567999', 'standard', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(20, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'Kakinada', 'Kakinada', 'ap', '533002', '1234567890', 'standard', '66d6b8bef4016', '2024-09-03 07:20:30', '2024-09-03 07:20:30'),
(21, 'kamadibhavani16@gmail.com', 'Bhavani', 'kamadi', 'kakinada', 'kakinada', 'Ap', '533002', '7896541234', 'standard', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(22, 'kamadibhavani16@gmail.com', 'bhavani', 'kamadi', 'kakinada', 'kakinada', 'ap', '533002', '7896541237', 'standard', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(23, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'kakinada', 'kakinada', 'ap', '533002', '1234567890', 'standard', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(24, 'abhishekvalluri1806@gmail.com', 'Abhishek', 'Valluri', 'kkd', 'kkd', 'ap', '53302', '7997675300', 'standard', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(25, 'kamadibhavani16@gmail.com', 'bhavani', 'kamadi', 'kkd', 'kkd', 'ap', '533002', '789654123', 'standard', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(26, 'kamadibhavani16@gmail.com', 'Bhavani', 'Kamadi', 'Kakinada', 'Kakinada', 'Andhara Pradesh', '533002', '7945432486', 'standard', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(27, 'kamadibhavani16@gmail.com', 'Bhanu', 'Kamadi', 'Kakinada', 'Kakinada', 'AndhraPradesh', '533002', '7896541235', 'standard', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(28, 'durgakamadi999@gmail.com', 'Durga', 'Kamadi', 'Kakinada', 'kkd', 'ap', '533002', '7896548512', 'express', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `cart_id` int(100) NOT NULL,
  `prod_code` varchar(250) NOT NULL,
  `item_id` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `randomId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `cart_id`, `prod_code`, `item_id`, `quantity`, `status`, `randomId`) VALUES
(1, '4', 1, '105798', '6', '2', 0, '656abc92147aa'),
(2, '4', 1, '14562', '17', '2', 0, '656abd07307ca'),
(3, '4', 1, '106965', '8', '1', 0, '656abd1248228'),
(4, '4', 1, '104229', '9', '2', 0, '656abd7268d3f'),
(5, '4', 1, '104', '30', '2', 0, '656abdaae73ed'),
(6, '4', 1, '106570', '14', '1', 0, '656abdb6160a3'),
(7, '0', 2, '106965', '8', '2', 0, '656abeb2aa858'),
(8, '0', 3, '19619', '1', '2', 0, '656ac12618067'),
(9, '0', 3, '94', '5', '1', 0, '656ac1376c16a'),
(10, '0', 4, '14574', '15', '2', 0, '656ac169eeec2'),
(11, '0', 5, '104', '30', '1', 0, '656ac19b4ed9c'),
(12, '0', 5, '105462', '12', '2', 0, '656ac1a91dec3'),
(13, '1', 6, '14107', '7', '6', 0, '656ac1e07cf65'),
(14, '1', 6, '94', '5', '2', 0, '656ac22e3dc62'),
(15, '1', 6, '104', '30', '1', 0, '656ac261a5c9c'),
(16, '1', 6, '106570', '14', '2', 0, '656ac26d9ef05'),
(17, '1', 6, '14562', '17', '1', 0, '656ac2bde01f0'),
(18, '1', 6, '19619', '1', '3', 0, '656ac3229dafa'),
(21, '1', 6, '108885', '11', '1', 0, '656b05ebcbc82'),
(23, '0', 7, '14107', '7', '2', 0, '656b070a1bcef'),
(25, '0', 7, '19619', '1', '1', 0, '656b075483fec'),
(26, '5', 8, '107070', '3', '2', 0, '656b094de0b89'),
(27, '5', 8, '104229', '9', '1', 1, '656b1004312cb'),
(28, '1', 6, '104229', '9', '4', 0, '656b10c63a4b4'),
(30, '0', 9, '107070', '3', '1', 1, '657172ca055ce'),
(31, '0', 9, '108885', '11', '2', 1, '6571743618ea2'),
(32, '0', 10, '14107', '7', '1', 0, '66d6b68a05bb0'),
(33, '1', 6, '105798', '6', '2', 0, '66d6b89dd06a9'),
(34, '2', 11, '14107', '7', '1', 0, '66d6bb0adca00'),
(35, '0', 10, '106965', '8', '1', 0, '66d6cea621edc'),
(36, '0', 12, '106965', '8', '1', 1, '66d7e49163971'),
(37, '0', 13, '19619', '1', '4', 1, '66d7fa67b89ff'),
(38, '0', 14, '106965', '8', '', 1, '66d7facf2894d'),
(39, '0', 13, '14107', '7', '4', 1, '66d7fd35d1f69'),
(40, '0', 15, '14107', '7', '', 1, '66d7feaaab644'),
(41, '0', 36, '14107', '7', '5', 1, '66d829b46b115'),
(43, '0', 37, '14107', '7', '1', 1, '66d8523302819'),
(44, '0', 37, '106965', '8', '3', 1, '66d8558e97033'),
(45, '0', 38, '14107', '7', '1', 0, '66d934594cdc0'),
(46, '0', 39, '19619', '1', '1', 0, '66d9377034483'),
(47, '1', 6, '105462', '12', '3', 1, '66d93b4be2b6f'),
(48, '0', 40, '105798', '6', '2', 1, '66d93d3db9130'),
(49, '7', 41, '2551', '16', '2', 0, '66d93d92bca24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_name` varchar(50) NOT NULL,
  `randomId` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catg_name`, `randomId`, `created_at`, `updated_at`) VALUES
(1, 'Vitamins', '653b457967ff9', '2023-10-27 05:07:05', '2023-10-27 05:07:05'),
(2, 'Beauty', '653b459f13b8e', '2023-10-27 05:07:43', '2023-10-27 05:07:43'),
(3, 'Supplements', '653b4629f2494', '2023-10-27 05:10:01', '2023-10-27 05:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `enq_type` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `randomId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `email`, `phone`, `enq_type`, `message`, `created_at`, `updated_at`, `randomId`) VALUES
(1, 'test', 'mfjkxh', 'kalyan@gmail.com', '7546866543', 'on', '5646445', '2023-10-14 06:30:17', '2023-10-14 06:30:17', '652a354b043bb'),
(2, 'bhavani', 'bhavani', 'bhavani@gmail.com', '784579489', 'on', 'fmsndfahsdfm', '2023-10-14 06:31:12', '2023-10-14 06:31:12', '652a35b0cebef'),
(3, 'test', 'test', 'test@gmail.com', '121212', 'Shipping Issues', 'Testing Message', '2023-11-08 11:36:09', '2023-11-08 11:36:09', '654b72a994db8'),
(4, 'test', 'test', 'test@gmail.com', '7465566786', 'General Enquiry', 'testing', '2023-11-18 06:48:43', '2023-11-18 06:48:43', '65585e4b77d00'),
(5, 'Bhavani', 'Kamadi', 'Kamadibhavani16@gmail.com', '7896547859', 'General Enquiry', 'testing', '2023-11-23 05:43:52', '2023-11-23 05:43:52', '655ee6983d19f'),
(6, 'Bhavani', 'Kamadi', 'kamadibhavani16@gmail.com', '7896544156', 'General Enquiry', 'Hai  for testing purpose', '2024-09-05 04:35:32', '2024-09-05 04:35:32', '66d93514960e0'),
(7, 'bhavani', 'kamadi', 'kamadibhavani16@gmail.com', '1234566879', 'General Enquiry', 'tetsuif', '2024-09-05 04:44:43', '2024-09-05 04:44:43', '66d9373b67463');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_type` varchar(50) NOT NULL,
  `first_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `randomId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_type`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `randomId`, `created_at`, `updated_at`) VALUES
(1, 'Credited', 'Bhavani', 'Kamadi', 'kamadibhavani16@gmail.com', '123456789012', '123123', '6569dd9b12a3d', '2023-12-01 13:20:27', '2023-12-01 13:20:27'),
(2, 'Normal', 'Abhishek', 'Valluri', 'abhishekvalluri1806@gmail.com', '07997675300', '1234567890', '6569ed7b67f9f', '2023-12-01 14:28:11', '2023-12-01 14:28:11'),
(3, 'Normal', 'test', 'test', 'test@gmail.com', '7896541236', '1456', '6569f49e25042', '2023-12-01 14:58:38', '2023-12-01 14:58:38'),
(4, 'Normal', 'Test', 'Tester', 'test@gmail.com', '1234567890', '121212', '656ab6bd55e5f', '2023-12-02 04:46:53', '2023-12-02 04:46:53'),
(5, 'Normal', 'Bharathi', 'M', 'motamarribharathi@gmail.com', '975412454154', '12345', '656b09046d513', '2023-12-02 10:37:56', '2023-12-02 10:37:56'),
(6, 'Credited', 'Bharathi', 'M', 'motamarribharathi@gmail.com', '786876787', '12345', '656b0fe5731e4', '2023-12-02 11:07:17', '2023-12-02 11:07:17'),
(7, 'Normal', 'Durga', 'Kamadi', 'durgakamadi999@gmail.com', '12345677899', '12345', '66d93d6f5d9e9', '2024-09-05 05:11:11', '2024-09-05 05:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `randomId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `email`, `created_at`, `updated_at`, `randomId`) VALUES
(1, 'kalyan@gmail.com', '2023-10-13 13:44:57', '2023-10-13 13:44:57', '652949d9365a8'),
(2, 'kalyan@gmail.com', '2023-10-13 13:45:21', '2023-10-13 13:45:21', '652949f191a74'),
(3, 'bhavani@gmail.com', '2023-10-13 13:45:56', '2023-10-13 13:45:56', '65294a148f547'),
(4, 'bhavani@gmail.com', '2023-10-13 13:53:00', '2023-10-13 13:53:00', '65294bbcec457'),
(5, 'bhavani@gmail.com', '2023-10-13 13:56:46', '2023-10-13 13:56:46', '65294c9e2e128'),
(6, 'bhavani@gmail.com', '2023-10-13 13:58:00', '2023-10-13 13:58:00', '65294ce811181'),
(7, 'abhishek@gmail.com', '2023-10-14 04:01:40', '2023-10-14 04:01:40', '652a12a4dfe50'),
(8, 'bhavani@gmail.com', '2023-10-14 04:20:34', '2023-10-14 04:20:34', '652a171286a29'),
(9, 'bhavani@gmail.com', '2023-10-14 04:20:34', '2023-10-14 04:20:34', '652a17128af31'),
(13, 'abhishekvalluri1806@gmail.com', '2023-10-26 06:23:18', '2023-10-26 06:23:18', '653a05d67a418'),
(14, 'kalyan@gmail.com', '2023-11-08 07:37:16', '2023-11-08 07:37:16', '654b3aac3c61b');

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE `home_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(350) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(350) NOT NULL,
  `randomId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_content`
--

INSERT INTO `home_content` (`id`, `title`, `description`, `image`, `randomId`) VALUES
(2, 'Commitment & Quality', '<p>Welcome to Eastland Wellness, your trusted source for Halal-certified supplements. We are committed to providing you with the highest quality products that align with your lifestyle and beliefs. We are committed to our products and your well-being. As part of our task, we strive to provide the best products for sustaining a healthy lifestyle by using the highest quality ingredients that meet regulatory requirements.</p>\r\n\r\n<p>Your health is our passion, and we&rsquo;re all in. We are committed to finding new ways to empower you to live a healthier, richer life&mdash; from innovative formulas to finding responsibly sustainable partners to supply our ingredients. Our experts routinely track emerging nutrition science to continually source science-backed solutions all of which are Halal-certified.</p>', '../assets/images/655c5041df307imageGroup 1000001770 (1) copy.png', '654893bca7447'),
(3, 'Personalize Your Wellness Regimen', '<p>Begin an entirely customizable plan today with our on-the-go daily packs from Nourish by Nature Made&reg; featuring science-backed recommendations designed to meet your individual needs. We go the extra step to ensure our vitamins and supplements are USP verified when possible, meaning they&rsquo;ve been tested for purity and potency by the U.S. Pharmacopeia. We work closely with suppliers to select and test ingredients, and our manufacturing procedures follow dietary supplement cGMPs (current Good Manufacturing Practices).</p>', '../assets/images/65658020d4215imageportrait-young-caucasian-woman-her-beauty-day-skin-care-routine-removebg-preview 1.png', '6548940df04ef');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `title`, `created_at`) VALUES
(1, 'twitter', '2023-11-29 06:05:16'),
(2, 'facebook', '2023-11-29 06:05:31'),
(3, 'instagram', '2023-11-29 06:05:42'),
(4, 'skype', '2023-11-29 06:05:52'),
(5, 'linkedin', '2023-11-29 06:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `encpassword` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `randomId` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `username`, `email`, `password`, `encpassword`, `image`, `randomId`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'omfa@gmail.com', 'omfa@9425', 'd0add4ec12384a7ed07788e88c685e50', '../assets/images/656827a082822imageinstagram.png', 'c4ca4238a0', '2024-09-04 09:58:35', '2023-11-25 12:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `orderitemmeta`
--

CREATE TABLE `orderitemmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` int(20) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` longtext DEFAULT NULL,
  `randomId` varchar(20) NOT NULL,
  `insertdate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `orderitemmeta`
--

INSERT INTO `orderitemmeta` (`meta_id`, `order_item_id`, `meta_key`, `meta_value`, `randomId`, `insertdate`, `updatedate`) VALUES
(1, 1, 'ProductID', '1', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(2, 1, 'ProductName', 'Choles Control  Special Formulation', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(3, 1, 'ProductImage', '../assets/images/product_image_6566fcbb7b4c4.jpg', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(4, 1, 'ProductCode', '105798', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(5, 1, 'Quantity', '2', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(6, 1, 'ShippingType', 'standard', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(7, 1, 'ShippingAmount', '0', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(8, 1, 'VAT Rate', '20', '656abcc2128cd', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(9, 2, 'ProductID', '3', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(10, 2, 'ProductName', 'Prenatal Multivitamin  Gummy with fish oil', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(11, 2, 'ProductImage', '../assets/images/product_image_6564824dbb421.jpg', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(12, 2, 'ProductCode', '106965', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(13, 2, 'Quantity', '1', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(14, 2, 'ShippingType', 'standard', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(15, 2, 'ShippingAmount', '0', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(16, 2, 'VAT Rate', '20', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(17, 3, 'ProductID', '2', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(18, 3, 'ProductName', 'Heart Formula', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(19, 3, 'ProductImage', '../assets/images/product_image_656779725c83c.jpg', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(20, 3, 'ProductCode', '14562', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(21, 3, 'Quantity', '2', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(22, 3, 'ShippingType', 'standard', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(23, 3, 'ShippingAmount', '0', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(24, 3, 'VAT Rate', '20', '656abd39109a0', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(25, 4, 'ProductID', '4', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(26, 4, 'ProductName', 'Sleep Formula', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(27, 4, 'ProductImage', '../assets/images/product_image_6564851349a5f.jpg', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(28, 4, 'ProductCode', '104229', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(29, 4, 'Quantity', '2', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(30, 4, 'ShippingType', 'express', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(31, 4, 'ShippingAmount', '12.99', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(32, 4, 'VAT Rate', '20', '656abd8046e30', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(33, 5, 'ProductID', '6', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(34, 5, 'ProductName', 'Calcium Complex With A & D', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(35, 5, 'ProductImage', '../assets/images/product_image_65662b1083ba3.jpg', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(36, 5, 'ProductCode', '106570', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(37, 5, 'Quantity', '1', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(38, 5, 'ShippingType', 'express', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(39, 5, 'ShippingAmount', '0', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(40, 5, 'VAT Rate', '20', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(41, 6, 'ProductID', '5', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(42, 6, 'ProductName', 'DHEA 50mg', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(43, 6, 'ProductImage', '../assets/images/product_image_65657682b2e78.jpg', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(44, 6, 'ProductCode', '104', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(45, 6, 'Quantity', '2', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(46, 6, 'ShippingType', 'express', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(47, 6, 'ShippingAmount', '0', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(48, 6, 'VAT Rate', '20', '656abdd1cd7ea', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(49, 7, 'ProductID', '7', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(50, 7, 'ProductName', 'Prenatal Multivitamin  Gummy with fish oil', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(51, 7, 'ProductImage', '../assets/images/product_image_6564824dbb421.jpg', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(52, 7, 'ProductCode', '106965', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(53, 7, 'Quantity', '2', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(54, 7, 'ShippingType', 'standard', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(55, 7, 'ShippingAmount', '0', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(56, 7, 'VAT Rate', '20', '656abecb7f49a', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(57, 8, 'ProductID', '9', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(58, 8, 'ProductName', 'Blood Sugar Support', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(59, 8, 'ProductImage', '../assets/images/product_image_6565ca7170336.jpg', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(60, 8, 'ProductCode', '94', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(61, 8, 'Quantity', '1', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(62, 8, 'ShippingType', 'standard', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(63, 8, 'ShippingAmount', '0', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(64, 8, 'VAT Rate', '20', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(65, 9, 'ProductID', '8', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(66, 9, 'ProductName', 'Hair, Skin & Nails Special Formulation', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(67, 9, 'ProductImage', '../assets/images/product_image_656485b498dd9.jpg', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(68, 9, 'ProductCode', '19619', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(69, 9, 'Quantity', '2', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(70, 9, 'ShippingType', 'standard', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(71, 9, 'ShippingAmount', '0', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(72, 9, 'VAT Rate', '20', '656ac148bf5f1', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(73, 10, 'ProductID', '10', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(74, 10, 'ProductName', 'Kids Gummy Multi  Just for Kids', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(75, 10, 'ProductImage', '../assets/images/product_image_656482a90cb9b.jpg', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(76, 10, 'ProductCode', '14574', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(77, 10, 'Quantity', '2', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(78, 10, 'ShippingType', 'express', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(79, 10, 'ShippingAmount', '12.99', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(80, 10, 'VAT Rate', '20', '656ac17326445', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(81, 11, 'ProductID', '12', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(82, 11, 'ProductName', 'Horny Goat Weed Just For Men', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(83, 11, 'ProductImage', '../assets/images/product_image_65670ae630dcb.jpg', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(84, 11, 'ProductCode', '105462', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(85, 11, 'Quantity', '2', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(86, 11, 'ShippingType', 'express', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(87, 11, 'ShippingAmount', '0', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(88, 11, 'VAT Rate', '20', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(89, 12, 'ProductID', '11', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(90, 12, 'ProductName', 'DHEA 50mg', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(91, 12, 'ProductImage', '../assets/images/product_image_65657682b2e78.jpg', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(92, 12, 'ProductCode', '104', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(93, 12, 'Quantity', '1', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(94, 12, 'ShippingType', 'express', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(95, 12, 'ShippingAmount', '0', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(96, 12, 'VAT Rate', '20', '656ac1b3bd2df', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(97, 13, 'ProductID', '13', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(98, 13, 'ProductName', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(99, 13, 'ProductImage', '../assets/images/product_image_656484c651304.jpg', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(100, 13, 'ProductCode', '14107', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(101, 13, 'Quantity', '1', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(102, 13, 'ShippingType', 'standard', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(103, 13, 'ShippingAmount', '0', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(104, 13, 'VAT Rate', '20', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(105, 14, 'ProductID', '14', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(106, 14, 'ProductName', 'Blood Sugar Support', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(107, 14, 'ProductImage', '../assets/images/product_image_6565ca7170336.jpg', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(108, 14, 'ProductCode', '94', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(109, 14, 'Quantity', '2', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(110, 14, 'ShippingType', 'express', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(111, 14, 'ShippingAmount', '12.99', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(112, 14, 'VAT Rate', '20', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(113, 15, 'ProductID', '16', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(114, 15, 'ProductName', 'Calcium Complex With A & D', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(115, 15, 'ProductImage', '../assets/images/product_image_65662b1083ba3.jpg', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(116, 15, 'ProductCode', '106570', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(117, 15, 'Quantity', '2', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(118, 15, 'ShippingType', 'standard', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(119, 15, 'ShippingAmount', '0', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(120, 15, 'VAT Rate', '20', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(121, 16, 'ProductID', '15', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(122, 16, 'ProductName', 'DHEA 50mg', '656ac285f38bf', '2023-12-02 05:37:10', '2023-12-02 05:37:10'),
(123, 16, 'ProductImage', '../assets/images/product_image_65657682b2e78.jpg', '656ac285f38bf', '2023-12-02 05:37:10', '2023-12-02 05:37:10'),
(124, 16, 'ProductCode', '104', '656ac285f38bf', '2023-12-02 05:37:10', '2023-12-02 05:37:10'),
(125, 16, 'Quantity', '1', '656ac285f38bf', '2023-12-02 05:37:10', '2023-12-02 05:37:10'),
(126, 16, 'ShippingType', 'standard', '656ac285f38bf', '2023-12-02 05:37:10', '2023-12-02 05:37:10'),
(127, 16, 'ShippingAmount', '0', '656ac285f38bf', '2023-12-02 05:37:10', '2023-12-02 05:37:10'),
(128, 16, 'VAT Rate', '20', '656ac285f38bf', '2023-12-02 05:37:10', '2023-12-02 05:37:10'),
(129, 17, 'ProductID', '17', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(130, 17, 'ProductName', 'Heart Formula', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(131, 17, 'ProductImage', '../assets/images/product_image_656779725c83c.jpg', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(132, 17, 'ProductCode', '14562', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(133, 17, 'Quantity', '1', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(134, 17, 'ShippingType', 'express', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(135, 17, 'ShippingAmount', '12.99', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(136, 17, 'VAT Rate', '20', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(137, 18, 'ProductID', '18', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(138, 18, 'ProductName', 'Hair, Skin & Nails Special Formulation', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(139, 18, 'ProductImage', '../assets/images/product_image_656485b498dd9.jpg', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(140, 18, 'ProductCode', '19619', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(141, 18, 'Quantity', '1', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(142, 18, 'ShippingType', 'express', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(143, 18, 'ShippingAmount', '12.99', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(144, 18, 'VAT Rate', '20', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(145, 19, 'ProductID', '17', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(146, 19, 'ProductName', 'Heart Formula', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(147, 19, 'ProductImage', '../assets/images/product_image_656779725c83c.jpg', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(148, 19, 'ProductCode', '14562', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(149, 19, 'Quantity', '1', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(150, 19, 'ShippingType', 'express', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(151, 19, 'ShippingAmount', '12.99', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(152, 19, 'VAT Rate', '20', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(153, 20, 'ProductID', '25', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(154, 20, 'ProductName', 'Hair, Skin & Nails Special Formulation', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(155, 20, 'ProductImage', '../assets/images/product_image_656485b498dd9.jpg', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(156, 20, 'ProductCode', '19619', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(157, 20, 'Quantity', '1', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(158, 20, 'ShippingType', 'standard', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(159, 20, 'ShippingAmount', '0', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(160, 20, 'VAT Rate', '20', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(161, 21, 'ProductID', '23', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(162, 21, 'ProductName', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(163, 21, 'ProductImage', '../assets/images/product_image_656484c651304.jpg', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(164, 21, 'ProductCode', '14107', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(165, 21, 'Quantity', '2', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(166, 21, 'ShippingType', 'standard', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(167, 21, 'ShippingAmount', '0', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(168, 21, 'VAT Rate', '20', '656b084a1a31d', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(169, 22, 'ProductID', '26', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(170, 22, 'ProductName', 'Digest + Pre-/ Pro-/Post Biotics', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(171, 22, 'ProductImage', '../assets/images/product_image_6565ea38846aa.jpg', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(172, 22, 'ProductCode', '107070', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(173, 22, 'Quantity', '2', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(174, 22, 'ShippingType', 'express', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(175, 22, 'ShippingAmount', '12.99', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(176, 22, 'VAT Rate', '20', '656b09b14cbe5', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(177, 23, 'ProductID', '27', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(178, 23, 'ProductName', 'Sleep Formula', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(179, 23, 'ProductImage', '../assets/images/product_image_6564851349a5f.jpg', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(180, 23, 'ProductCode', '104229', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(181, 23, 'Quantity', '1', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(182, 23, 'ShippingType', 'standard', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(183, 23, 'ShippingAmount', '0', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(184, 23, 'VAT Rate', '20', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(185, 24, 'ProductID', '28', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(186, 24, 'ProductName', 'Sleep Formula', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(187, 24, 'ProductImage', '../assets/images/product_image_6564851349a5f.jpg', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(188, 24, 'ProductCode', '104229', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(189, 24, 'Quantity', '2', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(190, 24, 'ShippingType', 'express', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(191, 24, 'ShippingAmount', '0', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(192, 24, 'VAT Rate', '20', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(193, 25, 'ProductID', '21', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(194, 25, 'ProductName', 'Super Fat Burner', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(195, 25, 'ProductImage', '../assets/images/product_image_65673fdce344a.jpg', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(196, 25, 'ProductCode', '108885', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(197, 25, 'Quantity', '1', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(198, 25, 'ShippingType', 'express', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(199, 25, 'ShippingAmount', '0', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(200, 25, 'VAT Rate', '20', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(201, 26, 'ProductID', '31', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(202, 26, 'ProductName', 'Super Fat Burner', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(203, 26, 'ProductImage', '../assets/images/product_image_65673fdce344a.jpg', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(204, 26, 'ProductCode', '108885', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(205, 26, 'Quantity', '2', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(206, 26, 'ShippingType', 'express', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(207, 26, 'ShippingAmount', '12.99', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(208, 26, 'VAT Rate', '20', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(209, 27, 'ProductID', '30', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(210, 27, 'ProductName', 'Digest + Pre-/ Pro-/Post Biotics', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(211, 27, 'ProductImage', '../assets/images/product_image_6565ea38846aa.jpg', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(212, 27, 'ProductCode', '107070', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(213, 27, 'Quantity', '1', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(214, 27, 'ShippingType', 'express', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(215, 27, 'ShippingAmount', '12.99', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(216, 27, 'VAT Rate', '20', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(217, 28, 'ProductID', '32', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(218, 28, 'ProductName', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(219, 28, 'ProductImage', '../assets/images/product_image_656484c651304.jpg', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(220, 28, 'ProductCode', '14107', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(221, 28, 'Quantity', '1', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(222, 28, 'ShippingType', 'standard', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(223, 28, 'ShippingAmount', '0', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(224, 28, 'VAT Rate', '20', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(225, 29, 'ProductID', '33', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(226, 29, 'ProductName', 'Choles Control  Special Formulation', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(227, 29, 'ProductImage', '../assets/images/product_image_6566fcbb7b4c4.jpg', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(228, 29, 'ProductCode', '105798', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(229, 29, 'Quantity', '1', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(230, 29, 'ShippingType', 'standard', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(231, 29, 'ShippingAmount', '0', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(232, 29, 'VAT Rate', '20', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(233, 30, 'ProductID', '32', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(234, 30, 'ProductName', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(235, 30, 'ProductImage', '../assets/images/product_image_656484c651304.jpg', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(236, 30, 'ProductCode', '14107', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(237, 30, 'Quantity', '1', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(238, 30, 'ShippingType', 'standard', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(239, 30, 'ShippingAmount', '0', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(240, 30, 'VAT Rate', '20', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(241, 31, 'ProductID', '32', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(242, 31, 'ProductName', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(243, 31, 'ProductImage', '../assets/images/product_image_656484c651304.jpg', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(244, 31, 'ProductCode', '14107', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(245, 31, 'Quantity', '1', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(246, 31, 'ShippingType', 'standard', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(247, 31, 'ShippingAmount', '0', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(248, 31, 'VAT Rate', '20', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(249, 32, 'ProductID', '33', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(250, 32, 'ProductName', 'Choles Control  Special Formulation', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(251, 32, 'ProductImage', '../assets/images/product_image_6566fcbb7b4c4.jpg', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(252, 32, 'ProductCode', '105798', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(253, 32, 'Quantity', '1', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(254, 32, 'ShippingType', 'standard', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(255, 32, 'ShippingAmount', '0', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(256, 32, 'VAT Rate', '20', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(257, 33, 'ProductID', '34', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(258, 33, 'ProductName', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(259, 33, 'ProductImage', '../assets/images/product_image_656484c651304.jpg', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(260, 33, 'ProductCode', '14107', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(261, 33, 'Quantity', '1', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(262, 33, 'ShippingType', 'standard', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(263, 33, 'ShippingAmount', '0', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(264, 33, 'VAT Rate', '20', '66d6bb28c147b', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(265, 34, 'ProductID', '35', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(266, 34, 'ProductName', 'Prenatal Multivitamin  Gummy with fish oil', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(267, 34, 'ProductImage', '../assets/images/product_image_6564824dbb421.jpg', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(268, 34, 'ProductCode', '106965', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(269, 34, 'Quantity', '1', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(270, 34, 'ShippingType', 'standard', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(271, 34, 'ShippingAmount', '0', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(272, 34, 'VAT Rate', '20', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(273, 35, 'ProductID', '32', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(274, 35, 'ProductName', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(275, 35, 'ProductImage', '../assets/images/product_image_656484c651304.jpg', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(276, 35, 'ProductCode', '14107', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(277, 35, 'Quantity', '1', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(278, 35, 'ShippingType', 'standard', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(279, 35, 'ShippingAmount', '0', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(280, 35, 'VAT Rate', '20', '66d6cedeb71d7', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(281, 36, 'ProductID', '45', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(282, 36, 'ProductName', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(283, 36, 'ProductImage', '../assets/images/product_image_656484c651304.jpg', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(284, 36, 'ProductCode', '14107', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(285, 36, 'Quantity', '1', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(286, 36, 'ShippingType', 'standard', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(287, 36, 'ShippingAmount', '0', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(288, 36, 'VAT Rate', '20', '66d93488c7d8e', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(289, 37, 'ProductID', '46', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(290, 37, 'ProductName', 'Hair, Skin & Nails Special Formulation', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(291, 37, 'ProductImage', '../assets/images/product_image_656485b498dd9.jpg', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(292, 37, 'ProductCode', '19619', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(293, 37, 'Quantity', '1', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(294, 37, 'ShippingType', 'standard', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(295, 37, 'ShippingAmount', '0', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(296, 37, 'VAT Rate', '20', '66d9379b23d97', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(297, 38, 'ProductID', '49', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50'),
(298, 38, 'ProductName', 'Immune Support Special Formulation', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50'),
(299, 38, 'ProductImage', '../assets/images/product_image_65671ac2e16f0.jpg', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50'),
(300, 38, 'ProductCode', '2551', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50'),
(301, 38, 'Quantity', '2', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50'),
(302, 38, 'ShippingType', 'express', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50'),
(303, 38, 'ShippingAmount', '12.99', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50'),
(304, 38, 'VAT Rate', '20', '66d93e0ebd9ae', '2024-09-05 05:13:50', '2024-09-05 05:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(20) NOT NULL DEFAULT 0,
  `order_item_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '\'\'',
  `cart_id` int(20) NOT NULL,
  `randomId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `insertdate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`order_item_id`, `order_id`, `order_item_name`, `cart_id`, `randomId`, `insertdate`, `updatedate`) VALUES
(1, 1, 'Choles Control  Special Formulation', 1, '656abcc2128cd0', '2023-12-02 05:12:34', '2023-12-02 05:12:34'),
(2, 2, 'Prenatal Multivitamin  Gummy with fish oil', 1, '656abd39109a00', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(3, 2, 'Heart Formula', 1, '656abd39109a01', '2023-12-02 05:14:33', '2023-12-02 05:14:33'),
(4, 3, 'Sleep Formula', 1, '656abd8046e300', '2023-12-02 05:15:44', '2023-12-02 05:15:44'),
(5, 4, 'Calcium Complex With A & D', 1, '656abdd1cd7ea0', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(6, 4, 'DHEA 50mg', 1, '656abdd1cd7ea1', '2023-12-02 05:17:05', '2023-12-02 05:17:05'),
(7, 5, 'Prenatal Multivitamin  Gummy with fish oil', 2, '656abecb7f49a0', '2023-12-02 05:21:15', '2023-12-02 05:21:15'),
(8, 6, 'Blood Sugar Support', 3, '656ac148bf5f10', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(9, 6, 'Hair, Skin & Nails Special Formulation', 3, '656ac148bf5f11', '2023-12-02 05:31:52', '2023-12-02 05:31:52'),
(10, 7, 'Kids Gummy Multi  Just for Kids', 4, '656ac173264450', '2023-12-02 05:32:35', '2023-12-02 05:32:35'),
(11, 8, 'Horny Goat Weed Just For Men', 5, '656ac1b3bd2df0', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(12, 8, 'DHEA 50mg', 5, '656ac1b3bd2df1', '2023-12-02 05:33:39', '2023-12-02 05:33:39'),
(13, 9, 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', 6, '656ac20e35f1e0', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(14, 10, 'Blood Sugar Support', 6, '656ac24091f100', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(15, 11, 'Calcium Complex With A & D', 6, '656ac285f38bf0', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(16, 11, 'DHEA 50mg', 6, '656ac285f38bf1', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(17, 12, 'Heart Formula', 6, '656ac2d3c9f6d0', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(18, 13, 'Hair, Skin & Nails Special Formulation', 6, '656ac4111d0780', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(19, 13, 'Heart Formula', 6, '656ac4111d0781', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(20, 14, 'Hair, Skin & Nails Special Formulation', 7, '656b084a1a31d0', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(21, 14, 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', 7, '656b084a1a31d1', '2023-12-02 10:34:50', '2023-12-02 10:34:50'),
(22, 15, 'Digest + Pre-/ Pro-/Post Biotics', 8, '656b09b14cbe50', '2023-12-02 10:40:49', '2023-12-02 10:40:49'),
(23, 16, 'Sleep Formula', 8, '656b102d1b6820', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(24, 17, 'Sleep Formula', 6, '656b1118321460', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(25, 17, 'Super Fat Burner', 6, '656b1118321461', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(26, 18, 'Super Fat Burner', 9, '657174a67e3c80', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(27, 18, 'Digest + Pre-/ Pro-/Post Biotics', 9, '657174a67e3c81', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(28, 19, 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', 10, '66d6b75d3e03c0', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(29, 20, 'Choles Control  Special Formulation', 6, '66d6b8bef40160', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(30, 21, 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', 10, '66d6b9f0a5da70', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(31, 22, 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', 10, '66d6ba91bd00a0', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(32, 23, 'Choles Control  Special Formulation', 6, '66d6bad66a95b0', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(33, 24, 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', 11, '66d6bb28c147b0', '2024-09-03 07:30:48', '2024-09-03 07:30:48'),
(34, 25, 'Prenatal Multivitamin  Gummy with fish oil', 10, '66d6cedeb71d70', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(35, 25, 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', 10, '66d6cedeb71d71', '2024-09-03 08:54:54', '2024-09-03 08:54:54'),
(36, 26, 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', 38, '66d93488c7d8e0', '2024-09-05 04:33:12', '2024-09-05 04:33:12'),
(37, 27, 'Hair, Skin & Nails Special Formulation', 39, '66d9379b23d970', '2024-09-05 04:46:19', '2024-09-05 04:46:19'),
(38, 28, 'Immune Support Special Formulation', 41, '66d93e0ebd9ae0', '2024-09-05 05:13:50', '2024-09-05 05:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cart_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_amount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_amount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transactiondate` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `randomId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `billing_id`, `shipping_id`, `shipping_type`, `user_id`, `cart_id`, `transaction_id`, `payment_type`, `shipping_amount`, `total_amount`, `payment_status`, `transactiondate`, `randomId`, `created_at`, `updated_at`) VALUES
(1, 'EW1925867403', '1', '1', 'standard', '4', '1', '2L97062471637492M', 'paypal', '0', '37.42', 'COMPLETED', '2023-12-02', '656abcc2128cd', '2023-12-02 05:12:57', '2023-12-02 05:12:57'),
(2, 'EW4035917682', '2', '2', 'standard', '4', '1', '0UD818961H054472W', 'paypal', '0', '56.13', 'COMPLETED', '2023-12-02', '656abd39109a0', '2023-12-02 05:14:50', '2023-12-02 05:14:50'),
(3, 'EW4751208369', '3', '3', 'express', '4', '1', '11N290707G453843X', 'paypal', '12.99', '37.42', 'COMPLETED', '2023-12-02', '656abd8046e30', '2023-12-02 05:15:58', '2023-12-02 05:15:58'),
(4, 'EW8529413067', '4', '4', 'express', '4', '1', '25D42127TB986245F', 'Zelle', '0', '56.13', 'COMPLETED', '2023-12-02', '656abdd1cd7ea', '2023-12-02 05:17:31', '2023-12-02 05:17:31'),
(5, 'EW1927630548', '5', '5', 'standard', '0', '2', '9WE28789G39239354', 'paypal', '0', '37.42', 'COMPLETED', '2023-12-02', '656abecb7f49a', '2023-12-02 05:21:31', '2023-12-02 05:21:31'),
(6, 'EW6407218359', '6', '6', 'standard', '0', '3', '31P66897VC2138410', 'paypal', '0', '56.13', 'COMPLETED', '2023-12-02', '656ac148bf5f1', '2023-12-02 05:32:07', '2023-12-02 05:32:07'),
(7, 'EW6192354807', '7', '7', 'express', '0', '4', '45357309YG486604K', 'paypal', '12.99', '37.42', 'COMPLETED', '2023-12-02', '656ac17326445', '2023-12-02 05:32:48', '2023-12-02 05:32:48'),
(8, 'EW6914502387', '8', '8', 'express', '0', '5', '5VN988776V202531A', 'paypal', '0', '56.13', 'COMPLETED', '2023-12-02', '656ac1b3bd2df', '2023-12-02 05:33:55', '2023-12-02 05:33:55'),
(9, 'EW1362974580', '9', '9', 'standard', '1', '6', '', 'paypal', '0', '18.71', '', '', '656ac20e35f1e', '2023-12-02 05:35:10', '2023-12-02 05:35:10'),
(10, 'EW2539740861', '10', '10', 'express', '1', '6', '', 'paypal', '12.99', '37.42', '', '', '656ac24091f10', '2023-12-02 05:36:00', '2023-12-02 05:36:00'),
(11, 'EW2583907164', '11', '11', 'standard', '1', '6', '', 'paypal', '0', '56.13', '', '', '656ac285f38bf', '2023-12-02 05:37:09', '2023-12-02 05:37:09'),
(12, 'EW6024851937', '12', '12', 'express', '1', '6', '', 'paypal', '12.99', '18.71', '', '', '656ac2d3c9f6d', '2023-12-02 05:38:27', '2023-12-02 05:38:27'),
(13, 'EW7643098152', '13', '13', 'express', '1', '6', '', 'paypal', '12.99', '37.42', '', '', '656ac4111d078', '2023-12-02 05:43:45', '2023-12-02 05:43:45'),
(14, 'EW4350862917', '14', '14', 'standard', '0', '7', '7F147197BB537523S', 'paypal', '0', '56.13', 'COMPLETED', '2023-12-02', '656b084a1a31d', '2023-12-02 10:35:40', '2023-12-02 10:35:40'),
(15, 'EW3267145980', '15', '15', 'express', '5', '8', '54L45893XC937012E', 'paypal', '12.99', '37.42', 'COMPLETED', '2023-12-02', '656b09b14cbe5', '2023-12-02 10:41:30', '2023-12-02 10:41:30'),
(16, 'EW1639475028', '16', '16', 'standard', '5', '8', '', 'paypal', '0', '18.71', '', '', '656b102d1b682', '2023-12-02 11:08:29', '2023-12-02 11:08:29'),
(17, 'EW9481623750', '17', '17', 'express', '1', '6', '', 'paypal', '0', '56.13', '', '', '656b111832146', '2023-12-02 11:12:24', '2023-12-02 11:12:24'),
(18, 'EW4638951072', '18', '18', 'express', '0', '9', '', 'paypal', '12.99', '56.13', '', '', '657174a67e3c8', '2023-12-07 07:30:46', '2023-12-07 07:30:46'),
(19, 'EW1807452396', '19', '19', 'standard', '0', '10', '', 'paypal', '0', '18.71', '', '', '66d6b75d3e03c', '2024-09-03 07:14:37', '2024-09-03 07:14:37'),
(20, 'EW3917604285', '20', '20', 'standard', '1', '6', '', 'paypal', '0', '18.71', '', '', '66d6b8bef4016', '2024-09-03 07:20:31', '2024-09-03 07:20:31'),
(21, 'EW3469170528', '21', '21', 'standard', '0', '10', '', 'paypal', '0', '18.71', '', '', '66d6b9f0a5da7', '2024-09-03 07:25:36', '2024-09-03 07:25:36'),
(22, 'EW4309786215', '22', '22', 'standard', '0', '10', '', 'paypal', '0', '18.71', '', '', '66d6ba91bd00a', '2024-09-03 07:28:17', '2024-09-03 07:28:17'),
(23, 'EW6531704829', '23', '23', 'standard', '1', '6', '', 'paypal', '0', '18.71', '', '', '66d6bad66a95b', '2024-09-03 07:29:26', '2024-09-03 07:29:26'),
(24, 'EW2465187309', '24', '24', 'standard', '2', '11', '34G90486J44902303', 'paypal', '0', '18.71', 'COMPLETED', '2024-09-03', '66d6bb28c147b', '2024-09-03 07:31:21', '2024-09-03 07:31:21'),
(25, 'EW4752361809', '25', '25', 'standard', '0', '10', '4PH084897M2702426', 'paypal', '0', '37.42', 'COMPLETED', '2024-09-03', '66d6cedeb71d7', '2024-09-03 08:55:32', '2024-09-03 08:55:32'),
(26, 'EW2589647031', '26', '26', 'standard', '0', '38', '66H23212X4135125C', 'paypal', '0', '18.71', 'COMPLETED', '2024-09-05', '66d93488c7d8e', '2024-09-05 04:34:05', '2024-09-05 04:34:05'),
(27, 'EW8410632597', '27', '27', 'standard', '0', '39', '70B0515537721732H', 'paypal', '0', '18.71', 'COMPLETED', '2024-09-05', '66d9379b23d97', '2024-09-05 04:46:31', '2024-09-05 04:46:31'),
(28, 'EW0349765812', '28', '28', 'express', '7', '41', '39766410DT257373F', 'paypal', '12.99', '37.42', 'COMPLETED', '2024-09-05', '66d93e0ebd9ae', '2024-09-05 05:14:31', '2024-09-05 05:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_id` varchar(5) NOT NULL,
  `prod_code` varchar(250) NOT NULL,
  `prod_name` varchar(250) NOT NULL,
  `prod_description` text NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `price` varchar(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `vat_rate` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `randomId` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catg_id`, `prod_code`, `prod_name`, `prod_description`, `product_image`, `price`, `quantity`, `vat_rate`, `status`, `randomId`, `created_at`, `updated_at`) VALUES
(1, '2', '19619', 'Hair, Skin & Nails Special Formulation', '<h2>Hair, Skin &amp; Nails Special Formulation</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Biotin hair gummies are the new gummy trend in the market. Eastland Wellness Hair, Skin and Nails gummies are the one yummy solution for multiple problems associated with hair, skin, and nails. These are 100% vegetarian.</p>\r\n\r\n<p>These biotin gummies are rich in essential nutrients such as biotin, folate, B12, and others vital for healthy hair, skin, and nail.</p>\r\n\r\n<p>All the ingredients in the Eastland Wellness biotin hair gummies work towards improvising the overall health of your hair, skin and nails. The presence of vitamin C in the gummies for hair, skin and nails helps protect skin.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Hydrolyzed Keratin</li>\r\n	<li>Hydrolyzed Collagen Type 1 &amp; 3 (bovine)</li>\r\n	<li>Vegetable stearic acid</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Vitamin E</li>\r\n	<li>Vitamin B-6</li>\r\n	<li>Pantothenic Acid</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>Suggested usage - 2 Gummies daily preferably with meals or as directed by a healthcare professional.</li>\r\n	<li>CAUTION: Do not exceed the recommended dose. This product is not intended for pregnant or nursing mothers or children under the age of 18. Individuals currently using &quot;Statin&quot; drugs or those with a known medical condition should consult a physician prior to using this or any dietary supplement.</li>\r\n</ol>', '../assets/images/product_image_656485b498dd9.jpg', '15.59', '1', '20', 0, '65460acb91666', '2023-11-28 05:17:47', '2023-11-04 09:11:39'),
(3, '3', '107070', 'Digest + Pre-/ Pro-/Post Biotics', '<h2>Digest + Pre-/ Pro-/Post Biotics</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>pre-/ pro-/ post biotics assist in the proper functioning of the human gut which is a part of the gastrointestinal tract. Eastland Wellness is one amongst the best brand for quality pre-/ pro-/ post biotics capsules in USA.</p>\r\n\r\n<p>They are play an important role as they help in the food digestion process. Poor digestion can not only be a burden to the individuals but also can affect the whole healthcare system.</p>\r\n\r\n<p>Hence, it&rsquo;s essential to have the required pre-/ pro-/ post biotics for the body to function efficiently.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Glucoamylase</li>\r\n	<li>Protease Blend</li>\r\n	<li>Protease</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Cellulase</li>\r\n	<li>Alpha Galactosidase</li>\r\n	<li>Beta Glucanase</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 4 capsules taken daily preferably with meals or as directed by a healthcare professional. For best results, take 2 capsules with lunch and 2 capsules with dinner.</li>\r\n	<li>Warning/Contraindications: Consult your healthcare professional if you are pregnant, nursing, taking medication or have a medical condition, before using this product.</li>\r\n</ol>', '../assets/images/product_image_6565ea38846aa.jpg', '15.59', '1', '20', 0, '65460f9dc7e3a', '2023-11-28 13:25:12', '2023-11-04 09:32:13'),
(4, '3', '104992', 'Blood Pressure Support', '<h2>Blood Pressure Support</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Top quality natural ingredient mix that can be traditionally used to lower high blood pressure levels and provide organic heart health benefits.</p>\r\n\r\n<p>Effective for people facing symptoms like vision problems, tiredness, stress, anxiety, insomnia and much more due to high blood pressure levels. Suitable for all ages. Eastland Wellness is one amongst the best brand for quality Blood Pleasure capsules in USA.</p>\r\n\r\n<p>Blood Pleasure capsules are a pure blend of 16 natural ingredients that can be consumed easily, and without any harmful effects.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Vitamin C (as ascorbic acid)</li>\r\n	<li>Vitamin B-6</li>\r\n	<li>Garlic Bulb Powderr</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Hawthorn Extract</li>\r\n	<li>Olive Leaf</li>\r\n	<li>Vitamin B-12 (as cyanocobalamin)</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 1 capsule taken 1 to 3 times daily preferably with meals or as directed by a healthcare professional.</li>\r\n	<li>Warning/Contraindications: This product is not intended for pregnant or nursing mothers, children under 18, or individuals with a known medical condition including cardiovascular disorders or hypotension (low blood pressure).</li>\r\n</ol>', '../assets/images/product_image_66d6cab23d0e4.jpg', '15.59', '1', '20', 0, '654610893cf27', '2024-09-03 08:37:06', '2023-11-04 09:36:09'),
(5, '3', '94', 'Blood Sugar Support', '<h2>Blood Sugar Support</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Blood Sugar Control increases insulin sensitivity in cells, making them more responsive to insulin. This action increases glucose uptake by the cells, resulting in better blood sugar regulation. It contains minerals that allow the body to control the amount of sugar we take, helping in balancing blood glucose levels and reducing sugar cravings.</p>\r\n\r\n<p>it can help control the growth of harmful bacteria in the gut and, it can also promote the growth of healthy bacteria, increasing fat metabolism and decreasing hunger, hence allowing healthy weight loss and management.</p>\r\n\r\n<p>Eastland Wellness is one amongst the best brand for quality Blood Sugar capsules in USA.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Vitamin C (as ascorbic acid)</li>\r\n	<li>Vitamin E(as d-Alpha tocopheryl succinate)</li>\r\n	<li>Magnesium (as magnesium oxide)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Biotin</li>\r\n	<li>Magnesium (as magnesium oxide)</li>\r\n	<li>Zinc (as zinc oxide)</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 1 capsule taken 1 to 3 times daily preferably with meals or as directed by a healthcare professional.</li>\r\n	<li>Warning/Contraindications: Please consult with your healthcare provider before making any changes to your current healthcare regimen.</li>\r\n</ol>', '../assets/images/product_image_6565ca7170336.jpg', '15.59', '1', '20', 1, '65461160e3e2f', '2023-11-28 11:09:37', '2023-11-04 09:39:44'),
(6, '3', '105798', 'Choles Control  Special Formulation', '<h2>Choles Control Special Formulation</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Colestrol is a powerful and natural dietary supplement that supports healthy cholesterol levels and overall cardiovascular health. With 60 capsules per bottle, this supplement is made from natural ingredients and contains bergamot extract, which is known for its cholesterol-lowering properties.</p>\r\n\r\n<p>In addition to its potential benefits for cholesterol and cardiovascular health, Citrus bergamot supplement may also support digestive health, reduce inflammation, and provide natural antibacterial and antiviral properties.</p>\r\n\r\n<p>Eastland Wellness is one amongst the best brand for quality Blood Sugar capsules in USA.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Niacin</li>\r\n	<li>Policosanol (from sugar cane extract)</li>\r\n	<li>Plant Sterol Complex</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Cayenne Pepper Fruit Powder</li>\r\n	<li>Garlic Bulb Powder</li>\r\n	<li>Vegetable magnesium stearate</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 2 capsules daily preferably with meals or as directed by a healthcare professional.</li>\r\n	<li>CAUTION: This product is not intended for pregnant or nursing mothers or children under the age of 18. Individuals currently using &quot;Statin&quot; drugs or those with a known medical condition should consult a physician prior to using this or any dietary supplement.</li>\r\n</ol>', '../assets/images/product_image_6566fcbb7b4c4.jpg', '15.59', '1', '20', 0, '6546127f9207d', '2023-11-29 08:56:27', '2023-11-04 09:44:31'),
(7, '1', '14107', 'Adult Liquid Multi Caps - Multi-Vitamin Minerals', '<h2>Adult Liquid Multi Caps - Multi-Vitamin Minerals</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>The Multi Vitamin Blend that contains the essential vitamins, minerals, enzymes, and superfoods your body requires for peak performance.</p>\r\n\r\n<p>If you&rsquo;re looking to feel your stamina and drive kick up again so you can boost your metabolism, improve muscle tone, and experience total body well.</p>\r\n\r\n<p>Eastland Wellness Adult liquid Multi caps contain the highest quality ingredients that really work. This unique combination of over 71 ingredients will help you to achieve results you never thought were possible. A perfect womens one a day as well as a great mens one a day multivitamins supplement.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Vitamin A (as beta-carotene)</li>\r\n	<li>Vitamin C</li>\r\n	<li>Bioflavonoids</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Coenzyme Q10</li>\r\n	<li>Inositol</li>\r\n	<li>Panax ginseng Root Powder</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 2 gummies daily or as directed by a healthcare professional.</li>\r\n	<li>Warning: This product is not recommended for children under 2 years of age due to risk of choking. Product should be fully chewed under adult supervision.</li>\r\n</ol>', '../assets/images/product_image_656484c651304.jpg', '15.59', '1', '20', 1, '6546148fe1c17', '2023-11-28 05:17:47', '2023-11-04 09:53:19'),
(8, '1', '106965', 'Prenatal Multivitamin  Gummy with fish oil', '<h2>Prenatal Multivitamin Gummy with fish oil</h2>\n\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\n\n<p>Prenatal DHA &amp; Methylfolate in our multivitamin tablets for women help support healthy Brain, Eye &amp; Spinal Cord growth. Calcium &amp; Vitamin D help support Bone Health for moms and their babies.</p>\n\n<p>We use non-constipating, non-nauseating Chelated Iron in our Prenatal Multivitamin supplements for Women which is easily absorbed by you &amp; your baby. Chelated Iron which is the best form of Iron during pregnancy helps support natural energy throughout the day.</p>\n\n<p>Omega 3 DHA in our multivitamin tablets for women is obtained from Certified Mercury Free Source. Betacarotene (Natural Source of Vitamin A) used instead of Palmitate (Synthetic Source). Carefully researched Ingredients used to take care of you &amp; your baby.</p>\n\n<p>Ingredients Used</p>\n\n<ul>\n	<li>Vitamin A (as retinyl acetate)</li>\n	<li>Vitamin C (as ascorbic acid)</li>\n	<li>Vitamin D (as cholecalciferol)</li>\n</ul>\n\n<ul>\n	<li>Biotin</li>\n	<li>Niacin</li>\n	<li>Tuna Oil</li>\n</ul>\n\n<p>Note:</p>\n\n<ol>\n	<li>SUGGESTED USE: 2 gummies daily or as directed by a healthcare professional.</li>\n	<li>Warning: Pregnant or nursing mothers, children under 18 or individuals with a medical condition or taking medication should consult a physician before using this product.</li>\n</ol>', '../assets/images/product_image_6564824dbb421.jpg', '15.59', '1', '20', 1, '6546210cd933d', '2023-11-29 07:01:01', '2023-11-04 10:46:36'),
(9, '2', '104229', 'Sleep Formula', '<h2>Sleep Formula</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Sleep Formula consists of Theanine, Magnesium and Melatonin. It combines the relaxing effects of theanine with the essential mineral magnesium and the sleep-regulating hormone melatonin to support healthy sleep patterns.</p>\r\n\r\n<p>supplement may be particularly beneficial for individuals who have difficulty falling asleep or staying asleep, or who experience high levels of stress or anxiety that affect sleep quality.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Magnesium</li>\r\n	<li>L-Theanine</li>\r\n	<li>GABA (gamma-Aminobutyric acid)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Phellodendron Root Powder</li>\r\n	<li>Mucuna pruriens Seed</li>\r\n	<li>Melatonin</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE:1 to 2 capsules taken at bedtime or as directed by a healthcare professional.</li>\r\n	<li>Warning: Do not exceed the recommended dose. This product is not intended for pregnant or nursing mothers, children under the age of 18, or individuals taking any prescription medication including anti- depressants. Avoid driving or performing other potentially dangerous tasks while taking this formula. If you have questions about the advisability of taking this product, consult a physician prior to use.</li>\r\n</ol>', '../assets/images/product_image_6564851349a5f.jpg', '15.59', '1', '20', 0, '654623a697b28', '2023-11-28 05:17:47', '2023-11-04 10:57:42'),
(11, '3', '108885', 'Super Fat Burner', '<h2>Super Fat Burner</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Super Fat Burner combines Vitamin C, Vitamin B6, Choline, Chromium, L-Carnitine, and medium-chain triglycerides to deliver a healthy approach to fat burning and consequent weight loss.</p>\r\n\r\n<p>Burning fat is difficult for some individuals. Therefore, they must supplement with an effective fat burner with the correct ingredients to drive better results.</p>\r\n\r\n<p>Choline is an essential nutrient that promotes healthy liver and lessens the likelihood of developing fatty liver disease. Its appear to increase thermogenesis, or heat production in the body, which aids dieters in fat burning and weight loss.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Chromium</li>\r\n	<li>Inositol</li>\r\n	<li>Garcinia Cambogia Fruit Extract</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Bladderwrack</li>\r\n	<li>GLA (Gamma-Linolenic Acid)</li>\r\n	<li>Turmeric Root</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 4 capsules daily, preferably with meals or as directed by a healthcare professional. For best results, take 2 capsules with 8 ounces of water before breakfast and again before dinner.</li>\r\n	<li>Warning: This product is not intended for pregnant or nursing mothers or children under the age of 18. If you are diabetic or have a known medical condition, consult your physician before taking this or any dietary supplement.</li>\r\n</ol>', '../assets/images/product_image_65673fdce344a.jpg', '15.59', '1', '20', 0, '65462c842e38d', '2023-11-29 13:42:52', '2023-11-04 11:35:32'),
(12, '3', '105462', 'Horny Goat Weed Just For Men', '<h2>Horny Goat Weed Just For Men</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Horny goat weed for men improves muscle strength, stamina and endurance. It is also found helpful in reducing stress &amp; anxiety. It helps in getting more sleep time while not able to sleep at all. horny goat weed improves liver &amp; neural health.</p>\r\n\r\n<p>The blood flow improves the transportation of oxygen throughout the body, making your skin glow naturally. horny goat weed supplements also soothes the skin. horny goat weed for women may also help improve scalp health resulting in stronger hair.</p>\r\n\r\n<p>Horny goat weed with maca Icariin has mimicking properties, and this may helps athletic performance. The benefits athletes and bodybuilders can expect to gain from icariin include increased lean muscle mass, improved levels of stamina and endurance, reduction in muscle repair time and more intense muscle tissue pump post-workout.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Horny Goat Weed Extract</li>\r\n	<li>Maca Root Powder</li>\r\n	<li>Tribulus terrestris</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tongkat Ali Root Powder</li>\r\n	<li>Saw Palmetto Berry Powder</li>\r\n	<li>Muira Puama Root Powder L-Arginine</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 2 capsules daily preferably with food 1 to 2 hours prior to physical activity or as directed by a healthcare professional.</li>\r\n	<li>Warning: This product is not intended for pregnant or nursing mothers, children under the age of 18, or individuals with a known medical condition. If you are taking medication or have questions about the advisability of taking this product, consult your physician prior to use.</li>\r\n</ol>', '../assets/images/product_image_65670ae630dcb.jpg', '15.59', '1', '20', 1, '65462cfe8e210', '2023-11-29 09:56:54', '2023-11-04 11:37:34'),
(14, '3', '106570', 'Calcium Complex With A & D', '<h2>Calcium Complex With A &amp; D</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Calcium is important for bone and teeth formation, heartbeat regulation, nerve transmission, and neuromuscular activity.</p>\r\n\r\n<p>It also plays a role in blood clotting, cell membrane maintenance, and the activation of enzymes, including lipase.</p>\r\n\r\n<p>Calcium Complex is a combination of calcium citrate and microcrystalline hydroxyapatite, two well-utilized forms of this essential mineral.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Vitamin A</li>\r\n	<li>Vitamin D</li>\r\n	<li>Calcium</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Phosphorus</li>\r\n	<li>Magnesium</li>\r\n	<li>Microcrystalline cellulose</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 3 tablets daily preferably with meals or as directed by a healthcare professional.</li>\r\n	<li>Warning: Do not exceed recommended dose. Pregnant or nursing mothers, children under 18, and individuals with a known medical condition should consult a physician before using this or any dietary supplement.</li>\r\n</ol>', '../assets/images/product_image_65662b1083ba3.jpg', '15.59', '1', '20', 1, '6546308db14a4', '2023-11-28 18:01:52', '2023-11-04 11:52:45'),
(15, '1', '14574', 'Kids Gummy Multi  Just for Kids', '<h2>Kids Gummy Multi-Just for Kids</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings</p>\r\n\r\n<p>Eastland Wellness Kids Gummy Multi-Just for Kids Gummies Lemon &amp; Strawberry Gluten Free may help reduce nutritional deficiencies. It may help in the proper functioning of the body. It can help deal with weakness and fatigue. Moreover, it can elevate energy and stamina.</p>\r\n\r\n<p>Taken daily, our kids multivitamins gummies help fortify eye, brain, and cardiovascular development through critical nutrients and minerals that support your child&rsquo;s natural energy, focus, and mood.</p>\r\n\r\n<p>This Kid&rsquo;s multivitamin comes in tasty orange and strawberry flavours free from artificial colours, preservatives, or additives. They are also vegan and vegetarian friendly to support dietary needs!</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Vitamin A</li>\r\n	<li>Vitamin B3</li>\r\n	<li>Vitamin B6(Pyridoxine Hydrochloride)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Vitamin B12(Cyanocobalamin)</li>\r\n	<li>Calcium pantothenate</li>\r\n	<li>Iodine As Potassium Iodide</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 2 gummies daily or as directed by a healthcare professional.</li>\r\n	<li>CAUTION: This product is not intended for pregnant or nursing mothers or children under the age of 18. Individuals currently using Statin drugs or those with a known medical condition should consult a physician prior to using this or any dietary supplement.</li>\r\n</ol>', '../assets/images/product_image_656482a90cb9b.jpg', '15.59', '1', '20', 0, '654632c5b3c87', '2023-11-28 05:17:47', '2023-11-04 12:02:13'),
(16, '3', '2551', 'Immune Support Special Formulation', '<h2>Immune Support Special Formulation</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Antioxidants are molecules that fight the effect of free radicals in your body. Some of the best antioxidants are beta-carotene, vitamin C, vitamin E, and selenium.</p>\r\n\r\n<p>Immune Support Formula&dagger;&dagger; contains antioxidant ingredients to combat the effect of free radicals, strengthen your immune system and the proper functioning of your body&rsquo;s cells.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Vitamin C</li>\r\n	<li>Selenium</li>\r\n	<li>Green Tea Leaf</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Beta-glucans Powder</li>\r\n	<li>Panax ginseng Root Powder</li>\r\n	<li>Burdock Root Powder</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 2 capsules daily preferably with meals or as directed by a healthcare professional.</li>\r\n	<li>Warning: Do not exceed recommended dose. This product is not intended for pregnant or nursing mothers, children under the age of 18, or persons with a known medical condition including any cardiovascular disorder, hypotension (low blood pressure) and Parkinsons disease. If you have questions about the advisability of taking this product, consult your physician prior to use.</li>\r\n</ol>', '../assets/images/product_image_65671ac2e16f0.jpg', '15.59', '1', '20', 0, '6546341186e0c', '2023-11-29 11:04:34', '2023-11-04 12:07:45'),
(17, '3', '14562', 'Heart Formula', '<h2>Heart Formula</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>Heart Formula is a combination of different rejuvinating herbs that promotes the proper function of the heart and circulatory system. As a cardiac tonic, Heart Formula nourishes and strengthens the heart muscle, thereby supporting blood circulation and a healthy supply of oxygen to the system</p>\r\n\r\n<p>It contains ingredients such as hawthorn berry and guggulu which promote healthy cholesterol levels that are already in the normal range and aid in detoxifying and cleansing the circulatory system.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Niacin C</li>\r\n	<li>Folate</li>\r\n	<li>Calcium</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>L-Citrulline</li>\r\n	<li>L-Arginine HCI</li>\r\n	<li>Guggul Gum</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 6 capsules taken daily preferably with meals or as directed by a healthcare professional. For best results, take 2 capsules with each meal.</li>\r\n	<li>Warning: Pregnant or nursing mothers, children under 18, and individuals with a known medical condition including heartburn should consult a physician before using this or any dietary supplement.</li>\r\n</ol>', '../assets/images/product_image_656779725c83c.jpg', '15.59', '1', '20', 0, '6546385b7976d', '2023-11-29 17:48:34', '2023-11-04 12:26:03'),
(18, '3', '5040', 'G Enhancer Just for Women', '<h2>G Enhancer Just for Women</h2>\r\n\r\n<p>&ensp;&ensp;20 Ratings <!-- <h1 class=\"text-danger price\">$ 39.99</h1> --></p>\r\n\r\n<p>To enhance a woman&rsquo;s sex life, try G enhancer for greater sex drive, energy and more vitality. It may also help treat osteoporosis by strengthening bone, and aiding problems of memory loss, fatigue, and joint pain.</p>\r\n\r\n<p>Its anti-inflammatory quality may also help with asthma, chronic bronchitis, and migraine headaches.</p>\r\n\r\n<p>Ingredients Used</p>\r\n\r\n<ul>\r\n	<li>Horny Goat Weed Extract</li>\r\n	<li>Maca Root Powder</li>\r\n	<li>Polypodium vulgare Powder</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Palmetto Berry Powder</li>\r\n	<li>L-Arginine HCI</li>\r\n	<li>gelatin (bovine)</li>\r\n</ul>\r\n\r\n<p>Note:</p>\r\n\r\n<ol>\r\n	<li>SUGGESTED USE: 2 capsules daily preferably with food 1 to 2 hours prior to physical activity or as directed by a healthcare professional.</li>\r\n	<li>Warning:Do not exceed recommended dose. This product is not intended for pregnant or nursing mothers, children under the age of 18, or individuals with a known medical condition. If you are taking medication or have questions about the advisability of taking this product, consult your physician prior to use.</li>\r\n</ol>', '../assets/images/product_image_6566e21d8a5f8.jpg', '15.59', '1', '21', 1, '65463e3c64477', '2023-11-29 07:02:53', '2023-11-04 12:51:08'),
(30, '2', '104', 'DHEA 50mg', '<h2 class=\"mt-5 productName\">\r\n	DHEA 50mg \r\n</h2>\r\n	<i class=\"fa-solid fa-star\" style=\"color: #ffd814;\"></i>\r\n	<i class=\"fa-solid fa-star\" style=\"color: #ffd814;\"></i>\r\n	<i class=\"fa-solid fa-star\" style=\"color: #ffd814;\"></i>\r\n	<i class=\"fa-solid fa-star\" style=\"color: #ffd814;\"></i>\r\n	<i class=\"fa-solid fa-star\" style=\"color: #96948d;\"></i>\r\n	<span class=\"text-muted\">&ensp;&ensp;20 Ratings</span>\r\n	<!-- <h1 class=\"text-danger price\">$ 39.99</h1> -->\r\n<p>\r\n	Eastland Wellness DHEA 50mg Tablet is a nutraceutical supplement formulated with dehydroepiandrosterone that supports healthy DHEA levels. DHEA may also help manage depression and symptoms of menopause\r\n\r\n</p>\r\n<p>\r\n	It helps to improve physical performance and bone density and reduce abdominal fat and improve insulin resistance.\r\n\r\n</p>\r\n	<div class=\"ingredients\">\r\n		<h6>Ingredients Used</h6>\r\n	<div class=\"row\">\r\n	<div class=\"col-6\">\r\n		<ul>\r\n			<li>DHEA (Dehydroepiandrosterone)</li>\r\n			<li>gelatin (bovine)</li>\r\n			\r\n		</ul>\r\n	</div>\r\n	<div class=\"col-6\">\r\n		<ul>\r\n			<li>vegetable magnesium stearate</li>\r\n			<li>silicon dioxide</li>\r\n			\r\n		</ul>\r\n	</div>\r\n	<div class=\"col-12\">\r\n		<h6>Note:</h6>\r\n			<ol>\r\n				<li> SUGGESTED USE:  1 capsule daily preferably with a meal or as directed by a healthcare professional.\r\n</li>\r\n				<li> Warning: NOT FOR USE BY INDIVIDUALS UNDER THE AGE OF 18 YEARS. DO NOT USE IF PREGNANT OR NURSING. Consult a physician or licensed qualified healthcare professional before using this product if you have, or have a family history of, breast cancer, prostate cancer, prostate enlargement, heart disease, low \"good\" cholesterol (HDL), or if you are using any other dietary supplement, prescription drug, or over-the-counter drug.\r\n</li>\r\n			</ol>\r\n	</div>\r\n	</div>\r\n	</div>', '../assets/images/product_image_65657682b2e78.jpg', '15.59', '1', '20', 1, '65657682b2e78', '2023-11-30 13:43:28', '2023-11-28 05:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `prod_images`
--

CREATE TABLE `prod_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_code` varchar(30) NOT NULL,
  `image` varchar(250) NOT NULL,
  `randomId` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prod_images`
--

INSERT INTO `prod_images` (`id`, `prod_code`, `image`, `randomId`, `created_at`, `updated_at`) VALUES
(1, '106965', '../assets/images/image_6564824dbb4210.jpg', '6564824dbb4210', '2023-11-27 11:49:33', '2023-11-27 11:49:33'),
(2, '106965', '../assets/images/image_6564824dbb4211.jpg', '6564824dbb4211', '2023-11-27 11:49:33', '2023-11-27 11:49:33'),
(3, '106965', '../assets/images/image_6564824dbb4212.jpg', '6564824dbb4212', '2023-11-27 11:49:33', '2023-11-27 11:49:33'),
(4, '106965', '../assets/images/image_6564824dbb4213.jpg', '6564824dbb4213', '2023-11-27 11:49:33', '2023-11-27 11:49:33'),
(8, '14574', '../assets/images/image_656482a90cb9b0.jpg', '656482a90cb9b0', '2023-11-27 11:51:05', '2023-11-27 11:51:05'),
(9, '14574', '../assets/images/image_656482a90cb9b1.jpg', '656482a90cb9b1', '2023-11-27 11:51:05', '2023-11-27 11:51:05'),
(10, '14107', '../assets/images/image_656484c6513040.jpg', '656484c6513040', '2023-11-27 12:00:06', '2023-11-27 12:00:06'),
(11, '14107', '../assets/images/image_656484c6513041.jpg', '656484c6513041', '2023-11-27 12:00:06', '2023-11-27 12:00:06'),
(12, '14107', '../assets/images/image_656484c6513042.jpg', '656484c6513042', '2023-11-27 12:00:06', '2023-11-27 12:00:06'),
(13, '104229', '../assets/images/image_6564851349a5f0.jpg', '6564851349a5f0', '2023-11-27 12:01:23', '2023-11-27 12:01:23'),
(14, '104229', '../assets/images/image_6564851349a5f1.jpg', '6564851349a5f1', '2023-11-27 12:01:23', '2023-11-27 12:01:23'),
(15, '104229', '../assets/images/image_6564851349a5f2.jpg', '6564851349a5f2', '2023-11-27 12:01:23', '2023-11-27 12:01:23'),
(16, '104229', '../assets/images/image_6564851349a5f3.jpg', '6564851349a5f3', '2023-11-27 12:01:23', '2023-11-27 12:01:23'),
(17, '19619', '../assets/images/image_656485b498dd90.jpg', '656485b498dd90', '2023-11-27 12:04:04', '2023-11-27 12:04:04'),
(18, '19619', '../assets/images/image_656485b498dd91.jpg', '656485b498dd91', '2023-11-27 12:04:04', '2023-11-27 12:04:04'),
(19, '19619', '../assets/images/image_656485b498dd92.jpg', '656485b498dd92', '2023-11-27 12:04:04', '2023-11-27 12:04:04'),
(20, '19619', '../assets/images/image_656485b498dd93.jpg', '656485b498dd93', '2023-11-27 12:04:04', '2023-11-27 12:04:04'),
(21, '19619', '../assets/images/image_656485b498dd94.jpg', '656485b498dd94', '2023-11-27 12:04:04', '2023-11-27 12:04:04'),
(25, '104', '../assets/images/image_65657682b2e780.jpg', '656577955e2ae0', '2023-11-28 05:16:05', '2023-11-28 05:16:05'),
(26, '104', '../assets/images/image_65657682b2e781.jpg', '656577955e2ae1', '2023-11-28 05:16:05', '2023-11-28 05:16:05'),
(27, '104', '../assets/images/image_65657682b2e782.jpg', '656577955e2ae2', '2023-11-28 05:16:05', '2023-11-28 05:16:05'),
(31, '94', '../assets/images/image_6565ca71703360.jpg', '6565ca71703360', '2023-11-28 11:09:37', '2023-11-28 11:09:37'),
(32, '94', '../assets/images/image_6565ca71703361.jpg', '6565ca71703361', '2023-11-28 11:09:37', '2023-11-28 11:09:37'),
(33, '94', '../assets/images/image_6565ca71703362.jpg', '6565ca71703362', '2023-11-28 11:09:37', '2023-11-28 11:09:37'),
(34, '107070', '../assets/images/image_6565ea38846aa0.jpg', '6565ea38846aa0', '2023-11-28 13:25:12', '2023-11-28 13:25:12'),
(35, '107070', '../assets/images/image_6565ea38846aa1.jpg', '6565ea38846aa1', '2023-11-28 13:25:12', '2023-11-28 13:25:12'),
(36, '107070', '../assets/images/image_6565ea38846aa2.jpg', '6565ea38846aa2', '2023-11-28 13:25:12', '2023-11-28 13:25:12'),
(37, '106570', '../assets/images/image_65662b1083ba30.jpg', '65662b1083ba30', '2023-11-28 18:01:52', '2023-11-28 18:01:52'),
(38, '106570', '../assets/images/image_65662b1083ba31.jpg', '65662b1083ba31', '2023-11-28 18:01:52', '2023-11-28 18:01:52'),
(39, '106570', '../assets/images/image_65662b1083ba32.jpg', '65662b1083ba32', '2023-11-28 18:01:52', '2023-11-28 18:01:52'),
(43, '5040', '../assets/images/image_6566e21d8a5f80.jpg', '6566e21d8a5f80', '2023-11-29 07:02:53', '2023-11-29 07:02:53'),
(44, '5040', '../assets/images/image_6566e21d8a5f81.jpg', '6566e21d8a5f81', '2023-11-29 07:02:53', '2023-11-29 07:02:53'),
(45, '5040', '../assets/images/image_6566e21d8a5f82.jpg', '6566e21d8a5f82', '2023-11-29 07:02:53', '2023-11-29 07:02:53'),
(48, '105798', '../assets/images/image_6566fcbb7b4c40.jpg', '6566fcbb7b4c40', '2023-11-29 08:56:27', '2023-11-29 08:56:27'),
(49, '105798', '../assets/images/image_6566fcbb7b4c41.jpg', '6566fcbb7b4c41', '2023-11-29 08:56:27', '2023-11-29 08:56:27'),
(50, '105462', '../assets/images/image_65670ae630dcb0.jpg', '65670ae630dcb0', '2023-11-29 09:56:54', '2023-11-29 09:56:54'),
(51, '105462', '../assets/images/image_65670ae630dcb1.jpg', '65670ae630dcb1', '2023-11-29 09:56:54', '2023-11-29 09:56:54'),
(52, '2551', '../assets/images/image_65671ac2e16f00.jpg', '65671ac2e16f00', '2023-11-29 11:04:34', '2023-11-29 11:04:34'),
(53, '2551', '../assets/images/image_65671ac2e16f01.jpg', '65671ac2e16f01', '2023-11-29 11:04:34', '2023-11-29 11:04:34'),
(54, '108885', '../assets/images/image_65673fdce344a0.jpg', '65673fdce344a0', '2023-11-29 13:42:52', '2023-11-29 13:42:52'),
(55, '108885', '../assets/images/image_65673fdce344a1.jpg', '65673fdce344a1', '2023-11-29 13:42:52', '2023-11-29 13:42:52'),
(56, '108885', '../assets/images/image_65673fdce344a2.jpg', '65673fdce344a2', '2023-11-29 13:42:52', '2023-11-29 13:42:52'),
(57, '14562', '../assets/images/image_656779725c83c0.jpg', '656779725c83c0', '2023-11-29 17:48:34', '2023-11-29 17:48:34'),
(58, '14562', '../assets/images/image_656779725c83c1.jpg', '656779725c83c1', '2023-11-29 17:48:34', '2023-11-29 17:48:34'),
(59, '14562', '../assets/images/image_656779725c83c2.jpg', '656779725c83c2', '2023-11-29 17:48:34', '2023-11-29 17:48:34'),
(63, '104992', '../assets/images/image_66d6cab23d0e40.jpg', '66d6cab23d0e40', '2024-09-03 08:37:06', '2024-09-03 08:37:06'),
(64, '104992', '../assets/images/image_66d6cab23d0e41.jpg', '66d6cab23d0e41', '2024-09-03 08:37:06', '2024-09-03 08:37:06'),
(65, '104992', '../assets/images/image_66d6cab23d0e42.jpg', '66d6cab23d0e42', '2024-09-03 08:37:06', '2024-09-03 08:37:06'),
(66, '104992', '../assets/images/image_66d6cc4ae5d130.jpg', '66d6cc4ae5d130', '2024-09-03 08:43:54', '2024-09-03 08:43:54'),
(67, '104992', '../assets/images/image_66d6cc4ae5d131.jpg', '66d6cc4ae5d131', '2024-09-03 08:43:54', '2024-09-03 08:43:54'),
(68, '104992', '../assets/images/image_66d6cc4ae5d132.jpg', '66d6cc4ae5d132', '2024-09-03 08:43:54', '2024-09-03 08:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_type` varchar(350) NOT NULL,
  `shipping_amount` varchar(20) NOT NULL,
  `randomId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `shipping_type`, `shipping_amount`, `randomId`) VALUES
(1, 'standard', '0', '654cade012cd1'),
(3, 'Express', '12.99', '654caf2c247ce');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billing_id` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip_code` varchar(250) NOT NULL,
  `randomid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `billing_id`, `address`, `city`, `state`, `zip_code`, `randomid`) VALUES
(1, '1', 'test', 'test', 'test', 'test', '656abcc2128cd'),
(2, '2', 'test', 'test', 'test', 'test', '656abd39109a0'),
(3, '3', 'test', 'test', 'test', 'test', '656abd8046e30'),
(4, '4', 'test', 'test', 'test', 'test', '656abdd1cd7ea'),
(5, '5', 'test1', 'test1', 'test1', 'test1', '656abecb7f49a'),
(6, '6', 'test1', 'test1', 'test1', 'test1', '656ac148bf5f1'),
(7, '7', 'test1', 'test1', 'test1', 'test1', '656ac17326445'),
(8, '8', 'test1', 'test1', 'test1', 'test1', '656ac1b3bd2df'),
(9, '9', 'test', 'test', 'test', 'test', '656ac20e35f1e'),
(10, '10', 'test', 'test', 'test', 'test', '656ac24091f10'),
(11, '11', 'test', 'test', 'test', 'test', '656ac285f38bf'),
(12, '12', 'test', 'test', 'test', 'test', '656ac2d3c9f6d'),
(13, '13', 'test', 'test', 'test', 'test', '656ac4111d078'),
(14, '14', '1129 wetlands court,', 'Lawrenceville', 'GA', '30044', '656b084a1a31d'),
(15, '15', '1129 wetlands court,', 'Lawrenceville', 'GA', '30044', '656b09b14cbe5'),
(16, '16', '1129 wetlands court', 'Lawrenceville', 'GA', '30044', '656b102d1b682'),
(17, '17', '1129 wetlands court', 'Lawrenceville', 'GA', '30044', '656b111832146'),
(18, '18', 'my adress', 'Kakinada', 'Andhra Pradesh', '53303', '657174a67e3c8'),
(19, '19', 'kakinada', 'kakinada', 'Ap', '533002', '66d6b75d3e03c'),
(20, '20', 'Kakinada', 'Kakinada', 'ap', '533002', '66d6b8bef4016'),
(21, '21', 'kakinada', 'kakinada', 'Ap', '533002', '66d6b9f0a5da7'),
(22, '22', 'kakinada', 'kakinada', 'ap', '533002', '66d6ba91bd00a'),
(23, '23', 'kakinada', 'kakinada', 'ap', '533002', '66d6bad66a95b'),
(24, '24', 'kkd', 'kkd', 'ap', '53302', '66d6bb28c147b'),
(25, '25', 'kkd', 'kkd', 'ap', '533002', '66d6cedeb71d7'),
(26, '26', 'Kakinada', 'Kakinada', 'Andhara Pradesh', '533002', '66d93488c7d8e'),
(27, '27', 'Kakinada', 'Kakinada', 'AndhraPradesh', '533002', '66d9379b23d97'),
(28, '28', 'Kakinada', 'kkd', 'ap', '533002', '66d93e0ebd9ae');

-- --------------------------------------------------------

--
-- Table structure for table `shop_settings`
--

CREATE TABLE `shop_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(100) NOT NULL,
  `meta_value` varchar(100) NOT NULL,
  `randomId` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_settings`
--

INSERT INTO `shop_settings` (`id`, `meta_key`, `meta_value`, `randomId`, `created_at`, `updated_at`) VALUES
(1, 'free_shipping_charges', '50', 'c4ca4238a0', '2023-12-07 08:48:51', '2023-11-21 07:28:54'),
(2, 'sales_order_email', 'abhishekvalluri1806@gmail.com', 'c81e728d9d', '2023-12-02 11:52:28', '2023-11-21 07:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `site_logo`
--

CREATE TABLE `site_logo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(350) NOT NULL,
  `footer_logo` varchar(350) NOT NULL,
  `randomId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_logo`
--

INSERT INTO `site_logo` (`id`, `header_logo`, `footer_logo`, `randomId`) VALUES
(1, '../assets/images/654a03932a6c4imagelogo.png', '../assets/images/654a03932a6c4image1', '654a0036a16c9');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `randomId` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `description`, `image`, `randomId`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"flex__content\">\r\n        <h1>Redefining the Path to <span> A Healthy Lifestyle</span></h1>\r\n       	<p class=\"text--normal\">We believe that fresh natural organic products<br>should be accessible to all.</p>\r\n       	<form method=\"POST\" action=\"\">\r\n       	<div class=\"input-group\">\r\n			<input type=\"text\" class=\"form-control addonsSearch\" placeholder=\"Search for Product in our store\" aria-label=\"Recipients username\" aria-describedby=\"basic-addon2\" id=\"searchInput\">\r\n				<div class=\"input-group-append theme-bg\">\r\n				<button class=\"btn text-white\" type=\"button\" id=\"searchButton\">Find Product</button>\r\n				</div>\r\n		</div>\r\n		</form>\r\n      </div>', '../assets/images/65645dbceaimagegummies2.png', '65645dbcea', '0000-00-00 00:00:00', '2023-11-27 09:13:32'),
(2, '<div class=\"flex__content\">\r\n        <h1>Redefining the Path to <span> A Healthy Lifestyle</span></h1>\r\n       	<p class=\"text--normal\">We believe that fresh natural organic products<br>should be accessible to all.</p>\r\n       	<form method=\"POST\" action=\"\">\r\n       	<div class=\"input-group\">\r\n			<input type=\"text\" class=\"form-control addonsSearch\" placeholder=\"Search for Product in our store\" aria-label=\"Recipients username\" aria-describedby=\"basic-addon2\" id=\"searchInput\">\r\n				<div class=\"input-group-append theme-bg\">\r\n				<button class=\"btn text-white\" type=\"button\" id=\"searchButton\">Find Product</button>\r\n				</div>\r\n		</div>\r\n		</form>\r\n      </div>', '../assets/images/65645dcceaimageimmune_2.png', '65645dccea', '0000-00-00 00:00:00', '2023-11-27 09:13:48'),
(3, '<div class=\"flex__content\">\r\n        <h1>Redefining the Path to <span> A Healthy Lifestyle</span></h1>\r\n       	<p class=\"text--normal\">We believe that fresh natural organic products<br>should be accessible to all.</p>\r\n       	<form method=\"POST\" action=\"\">\r\n       	<div class=\"input-group\">\r\n			<input type=\"text\" class=\"form-control addonsSearch\" placeholder=\"Search for Product in our store\" aria-label=\"Recipients username\" aria-describedby=\"basic-addon2\" id=\"searchInput\">\r\n				<div class=\"input-group-append theme-bg\">\r\n				<button class=\"btn text-white\" type=\"button\" id=\"searchButton\">Find Product</button>\r\n				</div>\r\n		</div>\r\n		</form>\r\n      </div>', '../assets/images/65645ddca2imageLiquid_2.png', '65645ddca2', '0000-00-00 00:00:00', '2023-11-27 09:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `socialicons`
--

CREATE TABLE `socialicons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialicons`
--

INSERT INTO `socialicons` (`id`, `title`, `link`, `created_at`) VALUES
(6, 'twitter', 'https://www.twitter.com/yourusername', '2023-11-29 06:08:46'),
(7, 'instagram', 'https://www.instagram.com/YourUsername/', '2023-11-29 06:09:18'),
(8, 'facebook', 'https://www.facebook.com/SpondiasIndia', '2023-11-29 06:30:44'),
(9, 'skype', 'https://www.instagram.com/YourUsername/', '2023-11-29 06:09:25'),
(10, 'linkedin', 'https://www.linkedin.com/', '2023-11-29 06:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(20) NOT NULL,
  `encpassword` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `randomId` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `email`, `password`, `encpassword`, `user_type`, `randomId`, `created_at`, `updated_at`) VALUES
(1, 'kamadibhavani16@gmail.com', '123123', '4297f44b13955235245b2497399d7a', 'Credited', '6569dd9b12a3d', '2023-12-01 13:20:27', '2023-12-01 13:20:27'),
(2, 'abhishekvalluri1806@gmail.com', '1234567890', 'd41d8cd98f00b204e9800998ecf842', 'Normal', '6569ed7b67f9f', '2023-12-01 14:28:11', '2023-12-01 14:28:11'),
(3, 'test@gmail.com', '1456', 'd41d8cd98f00b204e9800998ecf842', 'Normal', '6569f49e25042', '2023-12-01 14:58:38', '2023-12-01 14:58:38'),
(4, 'test@gmail.com', '121212', 'd41d8cd98f00b204e9800998ecf842', 'Normal', '656ab6bd55e5f', '2023-12-02 04:46:53', '2023-12-02 04:46:53'),
(5, 'motamarribharathi@gmail.com', '12345', 'd41d8cd98f00b204e9800998ecf842', 'Normal', '656b09046d513', '2023-12-02 10:37:56', '2023-12-02 10:37:56'),
(6, 'motamarribharathi@gmail.com', '12345', '827ccb0eea8a706c4c34a16891f84e', 'Credited', '656b0fe5731e4', '2023-12-02 11:07:17', '2023-12-02 11:07:17'),
(7, 'durgakamadi999@gmail.com', '12345', 'd41d8cd98f00b204e9800998ecf842', 'Normal', '66d93d6f5d9e9', '2024-09-05 05:11:11', '2024-09-05 05:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `vat_rates`
--

CREATE TABLE `vat_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat_title` varchar(100) NOT NULL,
  `vat_rate` varchar(100) NOT NULL,
  `randomId` varchar(40) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vat_rates`
--

INSERT INTO `vat_rates` (`id`, `vat_title`, `vat_rate`, `randomId`, `status`, `created_at`, `updated_at`) VALUES
(2, '20', '20', '6556f939c3e52', 1, '2023-12-07 07:25:33', '2023-11-17 05:25:13'),
(3, '21', '21', '6556fe9a0e430', 0, '2023-12-07 07:25:33', '2023-11-17 05:48:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_content`
--
ALTER TABLE `about_content`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `home_content`
--
ALTER TABLE `home_content`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orderitemmeta`
--
ALTER TABLE `orderitemmeta`
  ADD UNIQUE KEY `meta_id` (`meta_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD UNIQUE KEY `order_item_id` (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_item_name` (`order_item_name`(255)),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `prod_images`
--
ALTER TABLE `prod_images`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `shop_settings`
--
ALTER TABLE `shop_settings`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `site_logo`
--
ALTER TABLE `site_logo`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `socialicons`
--
ALTER TABLE `socialicons`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `vat_rates`
--
ALTER TABLE `vat_rates`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_content`
--
ALTER TABLE `about_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `home_content`
--
ALTER TABLE `home_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderitemmeta`
--
ALTER TABLE `orderitemmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `prod_images`
--
ALTER TABLE `prod_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shop_settings`
--
ALTER TABLE `shop_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_logo`
--
ALTER TABLE `site_logo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socialicons`
--
ALTER TABLE `socialicons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vat_rates`
--
ALTER TABLE `vat_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
