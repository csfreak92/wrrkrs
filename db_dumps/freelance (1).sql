-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2015 at 12:15 PM
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
  `user_type` varchar(20) NOT NULL,
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

INSERT INTO `employers` (`emp_id`, `emp_username`, `emp_password`, `user_type`, `emp_first_name`, `emp_middle_initial`, `emp_last_name`, `emp_sex`, `emp_address`, `emp_city`, `emp_state_province_region`, `emp_country`, `emp_zipcode`, `emp_contact_number`, `emp_email_add`) VALUES
(1, 'nisha', 'nisha', 'employer', 'nisha', 'e', 'zein', 'male', 'alberta', 'alberta', 'alberta', 'canada', '343', '938581245', 'nisha.zein@gmail,com');

-- --------------------------------------------------------

--
-- Table structure for table `employer_job`
--

CREATE TABLE IF NOT EXISTS `employer_job` (
  `emp_job_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `emp_city` varchar(50) NOT NULL,
  `emp_state_province_region` varchar(50) NOT NULL,
  `emp_country` varchar(50) NOT NULL,
  `emp_zipcode` varchar(10) NOT NULL,
  PRIMARY KEY (`emp_job_id`),
  KEY `emp_id` (`emp_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employer_job`
--

INSERT INTO `employer_job` (`emp_job_id`, `emp_id`, `job_id`, `emp_city`, `emp_state_province_region`, `emp_country`, `emp_zipcode`) VALUES
(1, 1, 4, 'naga', 'cam sur', 'philippines', '4400');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE IF NOT EXISTS `freelancers` (
  `freelancer_id` int(10) NOT NULL AUTO_INCREMENT,
  `freelancer_username` varchar(50) NOT NULL,
  `freelancer_password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL,
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

INSERT INTO `freelancers` (`freelancer_id`, `freelancer_username`, `freelancer_password`, `user_type`, `freelancer_first_name`, `freelancer_middle_initial`, `freelancer_last_name`, `freelancer_sex`, `freelancer_address`, `freelancer_city`, `freelancer_state_province_region`, `freelancer_country`, `freelancer_zipcode`, `freelancer_contact_number`, `freelancer_email_add`) VALUES
(1, 'warfreak92', 'kulasperu92', 'freelancer', 'Ralph Nicole', 'N.', 'Andalis', 'male', 'concepcion', 'naga', 'cam sur', 'philippines', '4400', '09997887536', 'ralph.andalis92@gmail.com');

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
-- Table structure for table `freelancer_profile`
--

CREATE TABLE IF NOT EXISTS `freelancer_profile` (
  `freelancer_profile_id` int(10) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(10) NOT NULL,
  `freelancer_rating` float NOT NULL,
  `freelancer_title` varchar(100) NOT NULL,
  `freelancer_skills` varchar(500) NOT NULL,
  `freelancer_summary` varchar(500) NOT NULL,
  `freelancer_availability` varchar(50) NOT NULL,
  `freelancer_education` varchar(100) NOT NULL,
  `freelancer_portfolio_pics` varchar(500) NOT NULL,
  PRIMARY KEY (`freelancer_profile_id`),
  KEY `freelancer_id` (`freelancer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `freelancer_profile`
--

INSERT INTO `freelancer_profile` (`freelancer_profile_id`, `freelancer_id`, `freelancer_rating`, `freelancer_title`, `freelancer_skills`, `freelancer_summary`, `freelancer_availability`, `freelancer_education`, `freelancer_portfolio_pics`) VALUES
(1, 1, 0, 'Software Security Engineer', 'security, owasp, pentest, threat handling, c/c++, java, assembly, lowlevel, web programming, ssh, http, networking', '* Interested in Pen testing and Cyber Security.\n* Interested in researching about Artificial Intelligence, Machine Learning, Data Science and Image Processing\n* Knowledgeable programming skills using C, C++, Java, GNU Assembly Language\n* Possesses wide knowledge with RDBMS like MySQL/MariaDB, Oracle\n* Possesses wide knowledge in web development & programming skills such as..', 'fulltime', 'Ateneo de Naga University', 'image1.png, image2.png, image3.png, image4.png');

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
  `job_keywords` varchar(500) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_code`, `job_name`, `job_description`, `job_type`, `job_duration`, `job_level`, `job_category`, `job_requirements`, `job_keywords`) VALUES
(1, 'XA13RG', 'Java Software Engineer - Full Time', 'Needs Java Full time Software Engineer for Web and Mobile Projects', 'fulltime', 'over 6 months', 'mid to senior level', 'software development', '* must be proficient in Java programming\r\n* knows XML, SOAP, REST and other web services\r\n* programming in Android is a plus\r\n* certification is a plus', 'java, web, database, xml, web services, software engineer, software'),
(2, 'PH1245', 'Wanted PL/SQL Developer - Fresh Graduates', 'candidate will be responsible for PL/SQL development of a PostgreSQL database for the core functionalities of Banco de Oro''s systems internally and externally', 'fulltime', '2 years', 'entry level', 'software development', '* fresh graduate of Computer Science or Information Technology and equivalent\r\n* strong PL/SQL skills are a must\r\n* willing to work in Makati\r\n* must be flexible with deadlines and a team player', 'database, PL/SQL, postgres, fresh graduate, developer'),
(3, 'IR214511', 'Immediate Hiring --- Java Enterprise Developer', 'iRipple needs a java enterprise developer for immediate hiring to create a ground up project with millions of transactions running on its background.', 'fulltime', 'more than 6 months', 'entry to senior level', 'software development', '* applicant must possess strong OOP skills and proficiency in Java Enterprise Software Development\r\n* applicant must be willing to work longer hours to finish projects on time\r\n* must have strong analytical problem solving skills', 'java, j2ee, java enterprise, developer, software developer, software engineer, web, database, cloud'),
(4, 'NG00291', 'Hiring Immediately --- Ruby on Rails Developer', 'Nueva Caceres Technology Solutions Inc., (Nueca) needs to grow its size twice in terms of its developers core group. We are looking for someone who is keen on Ruby on Rails that will be able to showcase his/her skills in web development.', 'fulltime', 'more than 6 months', 'entry to mid', 'software development', '* no diplomas/degrees/transcripts needed as long as you are good with backend development\r\n* must know web services such as REST, XML, SOAP, JSON\r\n* must be really good with Ruby on Rails', 'rails, ruby, web, software, developer, api, rest, xml, soap, json');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE IF NOT EXISTS `job_applications` (
  `job_application_id` int(10) NOT NULL AUTO_INCREMENT,
  `job_id` int(10) NOT NULL,
  `job_application_status` varchar(50) NOT NULL,
  PRIMARY KEY (`job_application_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`job_application_id`, `job_id`, `job_application_status`) VALUES
(1, 4, 'pending'),
(2, 3, 'pending'),
(3, 4, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `job_application_record`
--

CREATE TABLE IF NOT EXISTS `job_application_record` (
  `application_record_id` int(10) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `application_date` varchar(100) NOT NULL,
  PRIMARY KEY (`application_record_id`),
  KEY `job_id` (`job_id`),
  KEY `freelancer_id` (`freelancer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `job_application_record`
--

INSERT INTO `job_application_record` (`application_record_id`, `freelancer_id`, `job_id`, `status`, `application_date`) VALUES
(2, 1, 4, 'pending', 'Apr/19/2015'),
(3, 1, 3, 'pending', 'Apr/19/2015'),
(4, 1, 4, 'pending', 'Apr/19/2015');

-- --------------------------------------------------------

--
-- Table structure for table `job_application_responses`
--

CREATE TABLE IF NOT EXISTS `job_application_responses` (
  `job_response_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `response` varchar(100) NOT NULL,
  `response_date` varchar(100) NOT NULL,
  PRIMARY KEY (`job_response_id`),
  KEY `job_id` (`job_id`),
  KEY `emp_id` (`emp_id`)
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

--
-- Constraints for table `freelancer_profile`
--
ALTER TABLE `freelancer_profile`
  ADD CONSTRAINT `freelancer_profile_ibfk_1` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`freelancer_id`);

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `job_application_record`
--
ALTER TABLE `job_application_record`
  ADD CONSTRAINT `job_application_record_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `job_application_record_ibfk_2` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`freelancer_id`);

--
-- Constraints for table `job_application_responses`
--
ALTER TABLE `job_application_responses`
  ADD CONSTRAINT `job_application_responses_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `job_application_responses_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employers` (`emp_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
