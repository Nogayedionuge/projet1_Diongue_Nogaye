-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2023 at 07:36 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_commerce_nogaye_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `street_name` varchar(255) NOT NULL,
  `street_nb` int(11) NOT NULL,
  `city` varchar(40) NOT NULL,
  `province` varchar(40) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
  `country` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_has_product`
--

DROP TABLE IF EXISTS `order_has_product`;
CREATE TABLE IF NOT EXISTS `order_has_product` (
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  PRIMARY KEY (`product_id`,`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `price`, `img_url`, `description`) VALUES
(1, 'Canon', 10, '120.00', 'p1.png', 'Canon 600D Rebel T3i Dslr Camera with 18-55mm Lens'),
(2, 'Mobile Game', 15, '499.99', 'p2.png', 'Bluetooth game controller, no driver needed, compatible with Android 3.2 IOS 4.3 Bluetooth 3.0 Above smartphones tablet PC win7 win8 computer. Built-in wireless Bluetooth 3.0, can support 6~8 meters wide range of control from the operation'),
(3, 'Canon', 10, '120.00', 'p1.png', 'Canon 600D Rebel T3i Dslr Camera with 18-55mm Lens'),
(4, 'Mobile Game', 15, '499.99', 'p2.png', 'Bluetooth game controller, no driver needed, compatible with Android 3.2 IOS 4.3 Bluetooth 3.0 Above smartphones tablet PC win7 win8 computer. Built-in wireless Bluetooth 3.0, can support 6~8 meters wide range of control from the operation'),
(5, 'Drone', 25, '245.00', 'p3.png', 'DJI Tello Drone Boost Combo quadricoptère avec caméra HD et VR, livré avec 3 piles, cage de protection, 8 hélices, alimenté par la technologie DJI et processeur Intel 14 cœurs, éducation du codage, Throw and Go'),
(7, 'ProPhoto Editor Pro', 30, '100.00', 'p4.png', 'Photo Effect Editor ProPhoto Effect Editor Pro'),
(8, 'Yamaha HS5', 19, '349.99', 'p5.png', 'Depuis les années 1970, le woofer blanc emblématique et le son signature des moniteurs de référence Yamaha sont devenus un véritable standard de l industrie pour une raison - leur précision. Contrairement aux moniteurs de studio avec des fréquences de basses ou de aigus supplémentaires qui peuvent sembler plus flatteuses au début, les haut-parleurs de la série HS ont été conçus pour vous donner la référence la plus honnête et précise possible, offrant ainsi une plate-forme sonore idéale pour construire tout au long du processus de mixage.'),
(9, 'Manette', 11, '600.00', 'p6.png', 'Manette de jeu USB sans fil pour PC/ordinateur portable (Windows XP/7/8/10) et PS3, Android et Steam (noir)'),
(10, 'Drone blanc', 21, '145.00', 'p7.png', 'Gimbal Clamp for Phantom 4 Advance 4Pro + Parts 35 Accessories Gimbal Lock Camera Lens for Protection Drop Shipping'),
(11, 'Canon EOS ', 35, '650.00', 'p8.png', 'Realistic photo camera. Professional photo studio concept'),
(12, 'Web Camera', 27, '150.00', 'p9.png', 'Webcam 1080p avec microphone, OtooKing Webcam USB, Plug and Play, ordinateur HD Streaming Webcam vidéo pour PC, Mac, ordinateur portable, YouTube, Skype, Twitch, vidéoconférence, enregistrement, streaming, cours en ligne, jeux');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `billing_address_id` bigint(20) NOT NULL,
  `shipping_address_id` bigint(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

DROP TABLE IF EXISTS `user_order`;
CREATE TABLE IF NOT EXISTS `user_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ref` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_has_product`
--
ALTER TABLE `order_has_product`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
