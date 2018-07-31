-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table student_profile.student_info
CREATE TABLE IF NOT EXISTS `student_info` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table student_profile.student_info: ~6 rows (approximately)
DELETE FROM `student_info`;
/*!40000 ALTER TABLE `student_info` DISABLE KEYS */;
INSERT INTO `student_info` (`student_id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
	(7, 'samimb', 'masudb.affb@mail.com', '$2y$10$1wo3PuZqF0AnvkKsHKUlJemaA82vI2/xOI884qsnleB4A3ZelbG.G', '180731054817-306-7.jpg', '2018-07-31 06:38:14', '2018-07-31 10:48:17'),
	(11, 'samim', 'masud.affb@gmail.com', '$2y$10$Es5c8qZJ.yxMs7GZw.H66OjPoRTl.q08hlSP8gFsQ3BwIdWIG4uUa', '180731022904-540-11.jpg', '2018-07-31 07:29:04', '2018-07-31 07:29:04'),
	(12, 'prince2', 'prince2@mail.com', '$2y$10$gSnpwW6c7ebiHfnndfTlLOuEVq2odVF/ythLEakEcL4biym24mwQq', '180731033701-363-12.jpg', '2018-07-31 08:07:24', '2018-07-31 08:37:01'),
	(14, 'parbhez', 'hello.affb@gmail.com', '$2y$10$.IpPpwQ.7Zx95daB2MIK5OVwKTaaFNp9hp0ADudWJTWVLEmEeWKZW', '180731063643-720-14.jpg', '2018-07-31 11:23:37', '2018-07-31 11:36:43'),
	(15, 'samim', 'masud.affb@gmail.com', '$2y$10$FJkpuLGQfUJkfu4SDGtNxe8EsLldbyc1TkC3rChERbtysV2rsRj.e', '180731062423-415-15.jpg', '2018-07-31 11:24:23', '2018-07-31 11:24:23'),
	(16, 'Farabi', 'faravi@gmail.com', '$2y$10$rqYHwewilyLT2D/OlX13cuYaFR8qnG1wskMaitV/zrUamONTilmyC', '180731063550-288-16.jpg', '2018-07-31 11:33:08', '2018-07-31 11:35:50');
/*!40000 ALTER TABLE `student_info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
