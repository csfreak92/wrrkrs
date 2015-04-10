-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2014 at 12:16 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ccd`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `account_level` int(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bahay_atenista`
--

CREATE TABLE IF NOT EXISTS `bahay_atenista` (
  `program_id` int(9) NOT NULL,
  `resident_name` varchar(50) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coastal_cleenup`
--

CREATE TABLE IF NOT EXISTS `coastal_cleenup` (
  `program_id` int(9) NOT NULL,
  `bags_used` int(9) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id_number` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  PRIMARY KEY (`id_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `envi_ad`
--

CREATE TABLE IF NOT EXISTS `envi_ad` (
  `program_id` int(9) NOT NULL,
  `envi_ad_type` varchar(30) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_envi_ad`
--

CREATE TABLE IF NOT EXISTS `other_envi_ad` (
  `program_id` int(9) NOT NULL,
  `no_planted` int(9) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_sop`
--

CREATE TABLE IF NOT EXISTS `other_sop` (
  `program_id` int(9) NOT NULL,
  `resident_participants` int(9) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id_number` varchar(10) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `participant_type` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id_number`, `last_name`, `first_name`, `middle_name`, `contact_number`, `participant_type`) VALUES
('201010018', 'Jung  ', 'Min Sung ', 'Sang', '09291481577', 'student'),
('2010245881', 'Sarol', 'John Paul', 'F.', '09941758721', 'student'),
('2011124859', 'Realosa', 'Norbert', 'P.', '09858127784', 'student'),
('2011451814', 'Toral', 'John Kevin ', 'A.', '09991478751', 'student'),
('2011984198', 'Ramirez', 'Jasmine Carol', 'S.', '09248755177', 'student'),
('2012100415', 'Reola', 'John Arvin', 'R.', '09163478114', 'student'),
('2012o41751', 'Regondola', 'Ray Duovani', 'T.', '09455915512', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` int(9) NOT NULL,
  `barangay` varchar(30) NOT NULL,
  `town` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `program_type` varchar(30) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sop`
--

CREATE TABLE IF NOT EXISTS `sop` (
  `program_id` int(9) NOT NULL,
  `sop_type` varchar(30) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id_number` varchar(10) NOT NULL,
  `year` int(1) NOT NULL,
  `course` varchar(50) NOT NULL,
  `organization` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_number`, `year`, `course`, `organization`) VALUES
('201010018', 4, 'BS PSYCH', 'APSA'),
('2010245881', 3, 'BS ED', 'SSG'),
('2011124859', 4, 'BS IT', 'TACTICS'),
('2011451814', 3, 'BS ECE', 'ACE'),
('2011984198', 3, 'BS A', 'GABAY'),
('2012100415', 3, 'BS Entrep', 'Entrep'),
('2012o41751', 2, 'BS BIO', 'ALA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahay_atenista`
--
ALTER TABLE `bahay_atenista`
  ADD CONSTRAINT `bahay_atenista_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `sop` (`program_id`);

--
-- Constraints for table `coastal_cleenup`
--
ALTER TABLE `coastal_cleenup`
  ADD CONSTRAINT `coastal_cleenup_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `envi_ad` (`program_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `participants` (`id_number`);

--
-- Constraints for table `envi_ad`
--
ALTER TABLE `envi_ad`
  ADD CONSTRAINT `envi_ad_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`);

--
-- Constraints for table `other_envi_ad`
--
ALTER TABLE `other_envi_ad`
  ADD CONSTRAINT `other_envi_ad_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `envi_ad` (`program_id`);

--
-- Constraints for table `other_sop`
--
ALTER TABLE `other_sop`
  ADD CONSTRAINT `other_sop_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `sop` (`program_id`);

--
-- Constraints for table `sop`
--
ALTER TABLE `sop`
  ADD CONSTRAINT `sop_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `participants` (`id_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
