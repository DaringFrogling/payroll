/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `test_payroll` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test_payroll`;

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_surname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `name_surname`) VALUES
	(1, 'Lysiakin Dmytro'),
	(2, 'Illya Muromec'),
	(3, 'Dobrunya Mukutuch'),
	(4, 'Ivan Mazepa'),
	(5, 'Ihor Neigorek'),
	(6, 'Vladimir Grozniy'),
	(7, 'Dmytro Zagirniy'),
	(8, 'Illya Kantor'),
	(9, 'Kantor Jedi'),
	(10, 'Bogdanov Romanovic'),
	(11, 'Kyrylo Kozhemyaka'),
	(12, 'Kyrylo Zabiyaka');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `produced_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `product_id` int(1) DEFAULT NULL,
  `amount` int(2) DEFAULT NULL,
  `salary` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_fk_idx` (`employee_id`),
  KEY `products_fk_idx` (`product_id`),
  CONSTRAINT `employees_fk` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `produced_products` DISABLE KEYS */;
INSERT INTO `produced_products` (`id`, `employee_id`, `product_id`, `amount`, `salary`) VALUES
	(1, 1, 1, 1, 75),
	(2, 2, 2, 2, 300),
	(3, 3, 1, 3, 225),
	(4, 4, 1, 9, 675),
	(5, 5, 1, 6, 450),
	(6, 6, 1, 12, 900),
	(7, 7, 1, 0, 0),
	(8, 8, 1, 15, 1125),
	(9, 9, 1, 5, 375),
	(10, 10, 1, 7, 525),
	(11, 11, 1, 19, 1425),
	(12, 12, 1, 19, 1425);
/*!40000 ALTER TABLE `produced_products` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(45) DEFAULT NULL,
  `value` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `item`, `value`) VALUES
	(1, 'Mobile phones', 500),
	(2, 'TV Sets', 1000),
	(3, 'Computers', 1500);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
