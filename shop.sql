-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for shop
CREATE DATABASE IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `shop`;

-- Dumping structure for table shop.charts
CREATE TABLE IF NOT EXISTS `charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_charts_users` (`user_id`),
  KEY `FK_charts_products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table shop.charts: ~0 rows (approximately)
DELETE FROM `charts`;
/*!40000 ALTER TABLE `charts` DISABLE KEYS */;
/*!40000 ALTER TABLE `charts` ENABLE KEYS */;

-- Dumping structure for table shop.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `address` text,
  `description` text,
  `logo` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table shop.companies: ~1 rows (approximately)
DELETE FROM `companies`;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name`, `address`, `description`, `logo`, `photo`) VALUES
	(1, 'MAMAZI', '', 'Sedia Parfume Premium', 'logo.png', 'photo.png');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table shop.detail_payments
CREATE TABLE IF NOT EXISTS `detail_payments` (
  `id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_amount` int(11) DEFAULT NULL,
  KEY `FK_detail_payments_payments` (`payment_id`),
  KEY `FK_detail_payments_products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table shop.detail_payments: ~0 rows (approximately)
DELETE FROM `detail_payments`;
/*!40000 ALTER TABLE `detail_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_payments` ENABLE KEYS */;

-- Dumping structure for table shop.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `send_to` text,
  `is_pay` enum('Y','N') DEFAULT 'N',
  `is_delivery` enum('Y','N') DEFAULT 'N',
  `is_cancel` enum('Y','N') DEFAULT 'N',
  `invoice` varchar(200) DEFAULT NULL,
  `total_payment` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_payments_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table shop.payments: ~0 rows (approximately)
DELETE FROM `payments`;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `description` text,
  `photo` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table shop.products: ~10 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `price`, `category`, `description`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'Men Parfume 0', 300000, 'Men', 'description', 'product-0.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(2, 'Men Parfume 1', 300000, 'Men', 'description', 'product-1.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(3, 'Men Parfume 2', 100000, 'Men', 'description', 'product-2.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(4, 'Men Parfume 3', 100000, 'Men', 'description', 'product-3.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(5, 'Men Parfume 4', 700000, 'Men', 'description', 'product-4.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(6, 'Men Parfume 5', 600000, 'Men', 'description', 'product-5.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(7, 'Men Parfume 6', 500000, 'Men', 'description', 'product-6.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(8, 'Men Parfume 7', 800000, 'Men', 'description', 'product-7.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(9, 'Men Parfume 8', 300000, 'Men', 'description', 'product-8.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53'),
	(10, 'Men Parfume 9', 700000, 'Men', 'description', 'product-9.jpeg', '2021-05-07 11:41:53', '2021-05-07 11:41:53');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `is_admin` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table shop.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `address`, `photo`, `is_admin`) VALUES
	(1, 'administrator', 'admin@app.com', 'admin@app.com', 'password', '', 'customer.png', 'Y'),
	(2, 'customer', 'customer@app.com', 'customer@app.com', 'password', 'address', 'customer1.png', 'N');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
