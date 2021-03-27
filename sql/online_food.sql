-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 08:39 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'John', 'John@Admin.lk', '2020-07-24 16:21:18', '2020-07-24 18:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Breakfast_Recipes', 'Morning_Foods', '2020-07-24 16:21:18', '22-03-2021 04:29:21 PM'),
(2, 'Lunch_Recipes', 'Lunch_Foods', '2020-07-24 16:21:18', '2020-07-24 18:21:18'),
(3, 'Dinner_Recipes', 'Dinner_Foods', '2020-07-24 16:21:18', '2020-07-24 18:21:18'),
(4, 'Dessert_Recipes', 'Taste_Foods', '2020-07-24 16:21:18', '2020-07-24 18:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `bill_no` int(10) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT 'Pending',
  `delivery_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`, `delivery_time`) VALUES
(14, 1, 2, '1', 1, '2020-11-17 09:33:26', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(15, 2, 2, '1', 1, '2020-11-17 09:34:23', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(16, 2, 2, '13', 1, '2020-11-17 09:34:23', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(17, 2, 2, '25', 1, '2020-11-17 09:34:23', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(18, 3, 1, '17', 2, '2020-11-21 03:52:47', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(19, 4, 2, '13', 5, '2020-11-21 04:00:23', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(20, 5, 1, '10', 1, '2020-11-21 04:49:14', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(21, 6, 1, '25', 4, '2021-03-16 13:59:04', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(22, 7, 2, '1', 10, '2021-03-16 14:05:21', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(23, 8, 1, '9', 3, '2021-03-22 13:55:41', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(24, 8, 1, '13', 1, '2021-03-22 13:55:41', 'COD', 'Delivered', '2021-03-22 14:54:40'),
(25, 9, 1, '29', 10, '2021-03-22 14:03:36', 'COD', 'Delivered', '2021-03-22 03:21:04'),
(26, 10, 1, '19', 4, '2021-03-22 14:20:24', 'COD', 'Delivered', '2021-03-22 03:21:04'),
(27, 11, 1, '20', 2, '2021-03-22 14:49:58', 'COD', 'Delivered', '2021-03-22 03:21:04'),
(28, 12, 1, '25', 1, '2021-03-22 14:59:11', 'COD', 'Delivered', '2021-03-22 03:21:04'),
(29, 13, 1, '1', 1, '2021-03-22 15:11:15', 'COD', 'Delivered', '2021-03-22 03:21:04'),
(30, 14, 1, '5', 3, '2021-03-23 12:13:53', 'COD', 'Delivered', '2021-03-23 01:09:24'),
(31, 14, 1, '7', 3, '2021-03-23 12:13:53', 'COD', 'Delivered', '2021-03-23 01:09:24'),
(32, 15, 1, '19', 5, '2021-03-23 13:15:29', 'COD', 'Delivered', '2021-03-23 01:26:06'),
(33, 15, 1, '25', 5, '2021-03-23 13:15:29', 'COD', 'Delivered', '2021-03-23 01:26:06'),
(34, 16, 1, '1', 3, '2021-03-24 06:57:46', 'COD', 'Pending', '2021-03-24 06:57:46'),
(35, 16, 1, '5', 5, '2021-03-24 06:57:46', 'COD', 'Pending', '2021-03-24 06:57:46'),
(38, 17, 1, '1', 3, '2021-03-25 06:32:23', 'COD', 'Pending', '2021-03-25 06:32:23'),
(39, 17, 1, '5', 5, '2021-03-25 06:32:23', 'COD', 'Pending', '2021-03-25 06:32:23'),
(40, 18, 1, '9', 2, '2021-03-27 01:51:19', 'COD', 'Pending', '2021-03-27 01:51:19'),
(41, 19, 1, '3', 5, '2021-03-27 03:49:33', 'COD', 'Pending', '2021-03-27 03:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'in Process', 'Order has been Shipped.', '2020-07-24 16:21:18'),
(2, 14, 'Delivered', 'Done', '2020-11-19 13:44:50'),
(3, 15, 'Delivered', 'Done', '2020-11-19 13:45:09'),
(4, 16, 'Delivered', 'Done', '2020-11-19 13:45:19'),
(5, 17, 'Delivered', 'Done', '2020-11-19 13:45:28'),
(6, 18, 'Delivered', 'Done', '2020-11-21 04:13:05'),
(7, 19, 'Delivered', 'Done', '2020-11-21 04:13:17'),
(8, 21, 'Delivered', 'Done', '2021-03-16 14:06:47'),
(9, 20, 'Delivered', 'Done', '2021-03-16 14:07:40'),
(10, 22, 'Delivered', 'Done', '2021-03-16 14:08:06'),
(11, 23, 'Delivered', 'Done', '2021-03-22 14:01:05'),
(12, 24, 'Delivered', 'Done', '2021-03-22 14:01:19'),
(13, 26, 'in Process', 'Will Be Delivered Within 30 Hours', '2021-03-22 14:22:22'),
(14, 26, 'Delivered', 'Job Done', '2021-03-22 14:38:32'),
(15, 26, 'Delivered', 'Job Done', '2021-03-22 14:45:39'),
(16, 25, 'Delivered', 'Job Done', '2021-03-22 14:46:49'),
(17, 25, 'Delivered', 'Job Done', '2021-03-22 14:48:07'),
(18, 25, 'Delivered', 'Job Done', '2021-03-22 14:48:50'),
(19, 27, 'in Process', 'Will Be Delivered Within 30 Minutes!!!', '2021-03-22 14:51:27'),
(20, 27, 'Delivered', 'Job Done !!', '2021-03-22 14:55:08'),
(21, 28, 'Delivered', 'Job Done By Kamal !!!', '2021-03-22 14:59:55'),
(22, 29, 'in Process', 'Will Be Delivered Within 15 Minutes !!!', '2021-03-22 15:17:43'),
(23, 29, 'Delivered', 'Done !!', '2021-03-22 15:21:04'),
(24, 14, 'Delivered', 'Delivered By Nimal !!!', '2021-03-23 13:09:24'),
(25, 15, 'Delivered', 'Delivered By Shajee !!!', '2021-03-23 13:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(1, 3, 2, 5, 5, 'Shajanthan', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT WITH AFFORDABLE PRICE', '2020-07-24 16:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `deliveryCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `deliveryCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 1, 1, 'Banana-Pancakes', 'Food Mafia', 150, 180, 'Banana Flavour Pancakes', 'Banana-Pancakes.jpg', 'Banana-Pancakes.jpg', 'Banana-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(2, 1, 2, 'ButterMilk-Pancakes', 'Food Mafia', 200, 250, 'ButterMilk Flavour Pancakes', 'ButterMilk-Pancakes.jpg', 'ButterMilk-Pancakes.jpg', 'ButterMilk-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(3, 1, 3, 'Chocolate-Cake', 'Food Mafia', 180, 200, 'Chocolate-Cake', 'Chocolate-Cake.jpg', 'Chocolate-Cake.jpg', 'Chocolate-Cake.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(4, 1, 4, 'Fluffy-Pancakes', 'Food Mafia', 220, 250, 'Fluffy Flavour Pancakes', 'Fluffy-Pancakes.jpg', 'Fluffy-Pancakes.jpg', 'Fluffy-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(5, 1, 5, 'Hot-Chocolate-Pancakes', 'Food Mafia', 200, 250, 'Hot-Chocolate Flavour Pancakes', 'Hot-Chocolate-Pancakes.jpg', 'Hot-Chocolate-Pancakes.jpg', 'Hot-Chocolate-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(6, 1, 6, 'Ihop-Pancakes', 'Food Mafia', 300, 330, 'Strawberry Flavour Pancakes', 'Strawberry-Pancakes.jpg', 'Strawberry-Pancakes.jpg', 'Strawberry-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(7, 1, 7, 'Nutella-Pancakes', 'Food Mafia', 170, 200, 'Nutella Flavour Pancakes', 'Nutella-Pancakes.jpg', 'Nutella-Pancakes.jpg', 'Nutella-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(8, 1, 8, 'Strawberry-Pancakes', 'Food Mafia', 160, 200, 'Strawberry Flavour Pancakes', 'Strawberry-Pancakes.jpg', 'Strawberry-Pancakes.jpg', 'Strawberry-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(9, 2, 1, 'BeefRice', 'Food Mafia', 350, 400, 'BeefRice', 'BeefRice.jpg', 'BeefRice.jpg', 'BeefRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(10, 2, 2, 'ChickenRice', 'Food Mafia', 300, 350, 'ChickenRice', 'ChickenRice.jpg', 'ChickenRice.jpg', 'ChickenRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(11, 2, 3, 'ChineseRice', 'Food Mafia', 650, 750, 'ChineseRice', 'ChineseRice.jpg', 'ChineseRice.jpg', 'ChineseRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(12, 2, 4, 'FishRice', 'Food Mafia', 250, 300, 'FishRice', 'FishRice.jpg', 'FishRice.jpg', 'FishRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(13, 2, 5, 'SpiccyRice', 'Food Mafia', 330, 350, 'SpiccyRice', 'SpiccyRice.jpg', 'SpiccyRice.jpg', 'SpiccyRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(14, 2, 6, 'ThaiRice', 'Food Mafia', 600, 650, 'ThaiRice', 'ThaiRice.jpg', 'ThaiRice.jpg', 'ThaiRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(15, 2, 7, 'VegetableRice', 'Food Mafia', 200, 250, 'VegetableRice', 'VegetableRice.jpg', 'VegetableRice.jpg', 'VegetableRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(16, 2, 8, 'YellowRice', 'Food Mafia', 180, 200, 'YellowRice', 'YellowRice.jpg', 'YellowRice.jpg', 'YellowRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(17, 3, 1, 'Beef-Kottu', 'Food Mafia', 320, 350, 'Beef-Kottu', 'Beef-Kottu.jpg', 'Beef-Kottu.jpg', 'Beef-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(18, 3, 2, 'Chicken-Kottu', 'Food Mafia', 400, 450, 'Chicken-Kottu', 'Chicken-Kottu.jpg', 'Chicken-Kottu.jpg', 'Chicken-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(19, 3, 3, 'Dolphin-Kottu', 'Food Mafia', 280, 330, 'Dolphin-Kottu', 'Dolphin-Kottu.jpg', 'Dolphin-Kottu.jpg', 'Dolphin-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(20, 3, 4, 'Egg-Kottu', 'Food Mafia', 160, 200, 'Egg-Kottu', 'Egg-Kottu.jpg', 'Egg-Kottu.jpg', 'Egg-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(21, 3, 5, 'Kothu-Parotta', 'Food Mafia', 220, 250, 'Kothu-Parotta', 'Kothu-Parotta.jpg', 'Kothu-Parotta.jpg', 'Kothu-Parotta.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(22, 3, 6, 'Mixed-Kottu', 'Food Mafia', 650, 700, 'Mixed-Kottu', 'Mixed-Kottu.jpg', 'Mixed-Kottu.jpg', 'Mixed-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(23, 3, 7, 'Mutton-Kottu', 'Food Mafia', 500, 550, 'Mutton-Kottu', 'Mutton-Kottu.jpg', 'Mutton-Kottu.jpg', 'Mutton-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(24, 3, 8, 'Veg-Kottu', 'Food Mafia', 150, 180, 'Veg-Kottu', 'Veg-Kottu.jpg', 'Veg-Kottu.jpg', 'Veg-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(25, 4, 1, 'Chocolate-Dessert', 'Food Mafia', 250, 300, 'Chocolate-Dessert', 'Chocolate-Dessert.jpg', 'Chocolate-Dessert.jpg', 'Chocolate-Dessert.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(26, 4, 2, 'Fruit-Cream-Cheese', 'Food Mafia', 300, 330, 'Fruit-Cream-Cheese', 'Fruit-Cream-Cheese.jpg', 'Fruit-Cream-Cheese.jpg', 'Fruit-Cream-Cheese.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(27, 4, 3, 'Fruit-Custard', 'Food Mafia', 280, 300, 'Fruit-Custard', 'Fruit-Custard.jpg', 'Fruit-Custard.jpg', 'Fruit-Custard.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(28, 4, 4, 'Fruit-Pizza', 'Food Mafia', 550, 600, 'Fruit-Pizza', 'Fruit-Pizza.jpg', 'Fruit-Pizza.jpg', 'Fruit-Pizza.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(29, 4, 5, 'Ice-Cream-Waffle', 'Food Mafia', 400, 450, 'Ice-Cream-Waffle', 'Ice-Cream-Waffle.jpg', 'Ice-Cream-Waffle.jpg', 'Ice-Cream-Waffle.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(30, 4, 6, 'Kitkat-Ice-Cream-Pie', 'Food Mafia', 650, 750, 'Kitkat-Ice-Cream-Pie', 'Kitkat-Ice-Cream-Pie.jpg', 'Kitkat-Ice-Cream-Pie.jpg', 'Kitkat-Ice-Cream-Pie.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(31, 4, 7, 'Strawberry-Cake', 'Food Mafia', 200, 250, 'Strawberry-Cake', 'Strawberry-Cake.jpg', 'Strawberry-Cake.jpg', 'Strawberry-Cake.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(32, 4, 8, 'Strawberry-Short-Cake', 'Food Mafia', 150, 200, 'Strawberry-Short-Cake', 'Strawberry-Short-Cake.jpg', 'Strawberry-Short-Cake.jpg', 'Strawberry-Short-Cake.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Vanilla Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(2, 1, 'Butter Milk Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(3, 1, 'Banana Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(4, 1, 'Nutella Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(5, 1, 'Strawberry Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(6, 1, 'Nutella Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(7, 1, 'Bacon Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(8, 1, 'Ihop Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(9, 2, 'Chicken Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(10, 2, 'Beef Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(11, 2, 'Chinese Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(12, 2, 'Fish Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(13, 2, 'Vegetable Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(14, 2, 'Yellow Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(15, 2, 'Thai Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(16, 2, 'Spicy Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(17, 3, 'Mixed Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(18, 3, 'Beef Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(19, 3, 'Chicken Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(20, 3, 'Chinese Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(21, 3, 'Vegetable Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(22, 3, 'Egg Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(23, 3, 'Mutton Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(24, 3, 'Chili Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(25, 4, 'Chocolate Dessert', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(26, 4, 'KitKat Icecream Pie', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(27, 4, 'Chocolate Cake', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(28, 4, 'Strawberry Cake', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(29, 4, 'Fruit Pizza', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(30, 4, 'Ice Cream Waffle', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(31, 4, 'Fruit Custard', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(32, 4, 'Fruit Cream Cheese', '2020-07-24 17:21:18', '2020-07-24 17:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-24 17:28:38', '', 1),
(2, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-13 15:04:09', NULL, 0),
(3, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-13 15:06:26', '13-11-2020 08:47:57 PM', 1),
(4, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-13 16:34:27', '13-11-2020 10:04:30 PM', 1),
(5, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-16 10:40:34', NULL, 1),
(6, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-16 11:19:26', NULL, 1),
(7, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-17 07:20:51', NULL, 1),
(8, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-17 09:30:30', '17-11-2020 03:59:36 PM', 1),
(9, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-19 12:35:25', '19-11-2020 06:18:41 PM', 1),
(10, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-21 03:52:37', NULL, 1),
(11, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-21 03:52:42', '21-11-2020 09:23:54 AM', 1),
(12, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-21 03:55:33', NULL, 1),
(13, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-21 04:35:44', '21-11-2020 10:17:54 AM', 1),
(14, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-21 04:49:11', NULL, 1),
(15, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-16 13:56:07', '16-03-2021 07:27:10 PM', 1),
(16, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-16 13:58:26', '16-03-2021 07:34:22 PM', 1),
(17, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-16 14:05:03', NULL, 0),
(18, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-16 14:05:18', '16-03-2021 07:36:00 PM', 1),
(19, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-22 09:58:36', NULL, 1),
(20, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-22 11:24:19', '22-03-2021 04:58:34 PM', 1),
(21, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-22 13:55:35', NULL, 1),
(22, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-22 14:03:33', '22-03-2021 07:47:01 PM', 1),
(23, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-22 14:20:21', '22-03-2021 07:50:39 PM', 1),
(24, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-22 14:49:56', NULL, 1),
(25, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-22 14:59:08', '22-03-2021 08:29:29 PM', 1),
(26, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-22 15:11:13', NULL, 1),
(27, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-23 02:37:45', NULL, 1),
(28, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-23 12:13:49', '23-03-2021 05:46:54 PM', 1),
(29, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-23 13:15:23', NULL, 1),
(30, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 06:36:07', '24-03-2021 12:08:38 PM', 1),
(31, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 06:39:45', '24-03-2021 12:11:08 PM', 1),
(32, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 06:44:41', '24-03-2021 12:22:24 PM', 1),
(33, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 06:55:12', NULL, 1),
(34, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 06:56:22', '24-03-2021 12:27:02 PM', 1),
(35, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 06:57:43', '24-03-2021 12:36:30 PM', 1),
(36, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 07:06:45', '24-03-2021 12:48:43 PM', 1),
(37, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 07:19:07', '24-03-2021 01:05:56 PM', 1),
(38, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-24 07:39:15', '25-03-2021 09:31:14 AM', 1),
(39, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-25 04:01:22', '25-03-2021 11:37:44 AM', 1),
(40, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-25 06:23:08', '25-03-2021 11:58:40 AM', 1),
(41, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-25 06:28:52', '25-03-2021 12:02:35 PM', 1),
(42, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-25 09:04:09', NULL, 1),
(43, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-27 01:51:05', NULL, 1),
(44, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-27 02:01:32', '27-03-2021 08:06:35 AM', 1),
(45, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-27 02:50:41', '27-03-2021 09:21:51 AM', 1),
(46, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2021-03-27 05:31:20', '27-03-2021 11:39:11 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'John Shajanthan', 'johnshajanthan@gmail.com', 761514888, 'Abcd@0149', 'Kondavil', 'Northern', 'Jaffna', 40000, 'Kondavil', 'Northern', 'Jaffna', 40000, '2020-07-24 17:28:38', ''),
(2, 'Kirupan', 'ikirupan@gmail.com', 770221046, 'Master_1006', 'Karaveddy East , Karaveddy', 'Jaffna', 'Nelliady', 40000, 'Karaveddy east , karaveddy', 'Jaffna', 'Nelliady', 40000, '2020-11-13 15:06:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
