-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2015 at 10:13 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freelance`
--

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_username` varchar(50) NOT NULL,
  `emp_password` varchar(50) NOT NULL,
  `emp_first_name` varchar(100) NOT NULL,
  `emp_middle_initial` varchar(5) NOT NULL,
  `emp_last_name` varchar(100) NOT NULL,
  `emp_sex` varchar(10) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_city` varchar(50) NOT NULL,
  `emp_state_province_region` varchar(50) NOT NULL,
  `emp_country` varchar(50) NOT NULL,
  `emp_zipcode` varchar(10) NOT NULL,
  `emp_contact_number` varchar(50) DEFAULT NULL,
  `emp_email_add` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`emp_id`, `emp_username`, `emp_password`, `emp_first_name`, `emp_middle_initial`, `emp_last_name`, `emp_sex`, `emp_address`, `emp_city`, `emp_state_province_region`, `emp_country`, `emp_zipcode`, `emp_contact_number`, `emp_email_add`) VALUES
(1, 'ralph', 'ralph92', 'ralph', 'n', 'andalis', 'male', 'blk 3 lot 13 villa grande homes', 'naga city', 'camarines sur', 'philippines', '4400', '09997887536', 'ralph.andalis92@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employer_job`
--

CREATE TABLE IF NOT EXISTS `employer_job` (
  `emp_job_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  PRIMARY KEY (`emp_job_id`),
  KEY `emp_id` (`emp_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE IF NOT EXISTS `freelancers` (
  `freelancer_id` int(10) NOT NULL AUTO_INCREMENT,
  `freelancer_username` varchar(50) NOT NULL,
  `freelancer_password` varchar(50) NOT NULL,
  `freelancer_first_name` varchar(100) NOT NULL,
  `freelancer_middle_initial` varchar(5) NOT NULL,
  `freelancer_last_name` varchar(100) NOT NULL,
  `freelancer_sex` varchar(10) NOT NULL,
  `freelancer_address` varchar(100) NOT NULL,
  `freelancer_city` varchar(50) NOT NULL,
  `freelancer_state_province_region` varchar(50) NOT NULL,
  `freelancer_country` varchar(50) NOT NULL,
  `freelancer_zipcode` varchar(10) NOT NULL,
  `freelancer_contact_number` varchar(50) DEFAULT NULL,
  `freelancer_email_add` varchar(50) NOT NULL,
  PRIMARY KEY (`freelancer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`freelancer_id`, `freelancer_username`, `freelancer_password`, `freelancer_first_name`, `freelancer_middle_initial`, `freelancer_last_name`, `freelancer_sex`, `freelancer_address`, `freelancer_city`, `freelancer_state_province_region`, `freelancer_country`, `freelancer_zipcode`, `freelancer_contact_number`, `freelancer_email_add`) VALUES
(1, 'maja', 'maja06', 'justine', 'm', 'andalis', 'female', '699 b marupit drive', 'camaligan', 'camarines sur', 'philippines', '4401', '09994571236451', 'magjy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_job`
--

CREATE TABLE IF NOT EXISTS `freelancer_job` (
  `freelancer_job_id` int(10) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  PRIMARY KEY (`freelancer_job_id`),
  KEY `job_id` (`job_id`),
  KEY `freelancer_id` (`freelancer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(10) NOT NULL AUTO_INCREMENT,
  `job_code` varchar(15) NOT NULL,
  `job_name` varchar(50) NOT NULL,
  `job_description` varchar(500) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `job_duration` varchar(100) NOT NULL,
  `job_level` varchar(50) NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `job_requirements` varchar(500) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employer_job`
--
ALTER TABLE `employer_job`
  ADD CONSTRAINT `employer_job_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employers` (`emp_id`),
  ADD CONSTRAINT `employer_job_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `freelancer_job`
--
ALTER TABLE `freelancer_job`
  ADD CONSTRAINT `freelancer_job_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `freelancer_job_ibfk_2` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`freelancer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
