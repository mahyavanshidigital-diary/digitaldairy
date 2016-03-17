-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2016 at 04:41 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `di_development`
--

-- --------------------------------------------------------

--
-- Table structure for table `di_districts`
--

CREATE TABLE IF NOT EXISTS `di_districts` (
  `districts_id` int(11) NOT NULL AUTO_INCREMENT,
  `districts_name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`districts_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `di_districts`
--

INSERT INTO `di_districts` (`districts_id`, `districts_name`, `state_id`) VALUES
(1, 'Banas Kantha', 1),
(2, 'Lakhpat', 1),
(3, 'Patan', 1),
(4, 'Mahesana', 1),
(5, 'Sabar Kantha ', 1),
(6, 'Gandhinagar', 1),
(7, 'Ahmadabad', 1),
(8, 'Surendranagar', 1),
(9, 'Rajkot', 1),
(10, 'Jamnagar', 1),
(11, 'Porbandar', 1),
(12, 'Junagadh', 1),
(13, 'Amreli', 1),
(14, 'Bhavnagar', 1),
(15, 'Anand', 1),
(16, 'Kheda', 1),
(17, 'Panch Mahals', 1),
(18, 'Dohad', 1),
(19, 'Vadodara', 1),
(20, 'Narmada', 1),
(21, 'Bharuch', 1),
(22, 'Surat', 1),
(23, 'Dang', 1),
(24, 'Navsari', 1),
(25, 'Valsad', 1),
(26, 'Tapi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `di_family_memberinfo`
--

CREATE TABLE IF NOT EXISTS `di_family_memberinfo` (
  `umid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middelname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `dob` date NOT NULL,
  `relation` varchar(250) DEFAULT NULL,
  `maratial_status` varchar(250) NOT NULL,
  `education` varchar(250) NOT NULL,
  `occupation` varchar(250) NOT NULL,
  `annunal_income` varchar(250) NOT NULL,
  `whose_home` varchar(250) NOT NULL,
  `aggr_land` varchar(250) NOT NULL,
  `perment_address` varchar(250) NOT NULL,
  `current_address` varchar(250) NOT NULL,
  `society` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `city` varchar(150) NOT NULL,
  `taluka` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `native_place` varchar(150) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `blood_group` varchar(150) NOT NULL,
  `pin_code` int(6) NOT NULL,
  PRIMARY KEY (`umid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `di_memberinfo`
--

CREATE TABLE IF NOT EXISTS `di_memberinfo` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) NOT NULL,
  `middelname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `maratial_status` varchar(250) NOT NULL,
  `education` varchar(250) NOT NULL,
  `occupation` varchar(250) NOT NULL,
  `annunal_income` varchar(250) NOT NULL,
  `whose_home` varchar(250) NOT NULL,
  `aggr_land` varchar(250) NOT NULL,
  `perment_address` varchar(250) NOT NULL,
  `current_address` varchar(250) NOT NULL,
  `society` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `city` varchar(150) NOT NULL,
  `taluka` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `native_place` varchar(150) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `blood_group` varchar(150) NOT NULL,
  `pin_code` int(6) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `mother_name` varchar(250) NOT NULL,
  `birth_place` varchar(250) NOT NULL,
  `birth_time` varchar(250) NOT NULL,
  `zodiac_sign` varchar(250) NOT NULL,
  `color` varchar(250) NOT NULL,
  `height` varchar(250) NOT NULL,
  `weight` varchar(250) NOT NULL,
  `job_position` varchar(250) NOT NULL,
  `private_company_name` varchar(250) NOT NULL,
  `gov_department_name` varchar(250) NOT NULL,
  `job_status` varchar(250) DEFAULT NULL,
  `since_when` int(11) NOT NULL,
  `mama_info` text NOT NULL,
  `hobbies` text NOT NULL,
  `other_info` text NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `di_state`
--

CREATE TABLE IF NOT EXISTS `di_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  `state_abbr` varchar(50) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `di_state`
--

INSERT INTO `di_state` (`state_id`, `state_name`, `state_abbr`) VALUES
(1, 'Gujarat', 'GUJ');

-- --------------------------------------------------------

--
-- Table structure for table `di_taluka`
--

CREATE TABLE IF NOT EXISTS `di_taluka` (
  `taluka_id` int(11) NOT NULL AUTO_INCREMENT,
  `taluka_name` varchar(50) NOT NULL,
  `districts_id` int(11) NOT NULL,
  PRIMARY KEY (`taluka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=229 ;

--
-- Dumping data for table `di_taluka`
--

INSERT INTO `di_taluka` (`taluka_id`, `taluka_name`, `districts_id`) VALUES
(1, 'Lakhpat', 1),
(2, 'Rapar', 1),
(3, 'Bhachau', 1),
(4, 'Anjar', 1),
(5, 'Bhuj', 1),
(6, 'Nakhatrana', 1),
(7, 'Abdasa', 1),
(8, 'Mandvi', 1),
(9, 'Mundra', 1),
(10, 'Gandhidham', 1),
(11, 'Vav', 2),
(12, 'Tharad', 2),
(13, 'Dhanera', 2),
(14, 'Dantiwada', 2),
(15, 'Amirgadh', 2),
(16, 'Danta', 2),
(17, 'Vadgam', 2),
(18, 'Palanpur', 2),
(19, 'Deesa', 2),
(20, 'Deodar', 2),
(21, 'Bhabhar', 2),
(22, 'Kankrej', 2),
(23, 'Santalpur', 3),
(24, 'Radhanpur', 3),
(25, 'Vagdod', 3),
(26, 'Sidhpur', 3),
(27, 'Patan', 3),
(28, 'Harij', 3),
(29, 'Sami', 3),
(30, 'Chanasma', 3),
(33, 'Satlasana', 4),
(34, 'Kheralu', 4),
(35, 'Unjha', 4),
(36, 'Visnagar', 4),
(37, 'Vadnagar', 4),
(38, 'Vijapur', 4),
(39, 'Mahesana', 4),
(40, 'Becharaji', 4),
(41, 'Kadi', 4),
(42, 'Khedbrahma', 5),
(43, 'Vijaynagar', 5),
(44, 'Vadali', 5),
(45, 'Idar', 5),
(46, 'Bhiloda', 5),
(47, 'Meghraj', 5),
(48, 'Himatnagar', 5),
(49, 'Prantij', 5),
(50, 'Talod', 5),
(51, 'Modasa', 5),
(52, 'Dhansura', 5),
(53, 'Malpur', 5),
(54, 'Bayad', 5),
(55, 'Kalol', 6),
(56, 'Mansa', 6),
(57, 'Gandhinagar', 6),
(58, 'Dehgam', 6),
(59, 'Mandal', 7),
(60, 'DetrojRampura', 7),
(61, 'Viramgam', 7),
(62, 'Sanand', 7),
(63, 'Ahmadabad City', 7),
(64, 'Daskroi', 7),
(65, 'Dholka', 7),
(66, 'Bavla', 7),
(67, 'Ranpur', 7),
(68, 'Barwala', 7),
(69, 'Dhandhuka', 7),
(70, 'Halvad', 8),
(71, 'Dhrangadhra', 8),
(72, 'Dasada(patadi)', 8),
(73, 'Lakhtar', 8),
(74, 'Wadhwan', 8),
(75, 'Muli', 8),
(76, 'Chotila', 8),
(77, 'Sayla', 8),
(78, 'Chuda', 8),
(79, 'Limbdi', 8),
(80, 'Maliya', 9),
(81, 'Morvi', 9),
(82, 'Tankara', 9),
(83, 'Wankaner', 9),
(84, 'Paddhari', 9),
(85, 'Rajkot', 9),
(86, 'Lodhika', 9),
(87, 'Kotda Sangani ', 9),
(88, 'Jasdan', 9),
(89, 'Gondal', 9),
(90, 'Jamkandorna', 9),
(91, 'Upleta', 9),
(92, 'Dhoraji', 9),
(93, 'Jetpur', 9),
(94, 'Okhamandal', 10),
(95, 'Khambhalia', 10),
(96, 'Jamnagar', 10),
(97, 'Jodiya', 10),
(98, 'Dhrol', 10),
(99, 'Kalavad', 10),
(100, 'Lalpur', 10),
(101, 'Kalyanpur', 10),
(102, 'Bhanvad', 10),
(103, 'Jamjodhpur', 10),
(104, 'Porbandar', 11),
(105, 'Ranavav', 11),
(106, 'Kutiyana', 11),
(107, 'Manavadar', 12),
(108, 'Vanthali', 12),
(109, 'Junagadh', 12),
(110, 'Bhesan', 12),
(111, 'Visavadar', 12),
(112, 'Mendarda', 12),
(113, 'Keshod', 12),
(114, 'Mangrol', 12),
(115, 'Malia', 12),
(116, 'Talala', 12),
(117, 'PatanVeraval', 12),
(118, 'Sutrapada', 12),
(119, 'Kodinar', 12),
(120, 'Una', 12),
(121, 'Kunkavav Vadia', 13),
(122, 'Babra', 13),
(123, 'Lathi', 13),
(124, 'Lilia', 13),
(125, 'Amreli', 13),
(126, 'Bagasara', 13),
(127, 'Dhari', 13),
(128, 'Savar Kundla', 13),
(129, 'Khambha', 13),
(130, 'Jafrabad', 13),
(131, 'Rajula', 13),
(132, 'Botad', 14),
(133, 'Vallabhipur', 14),
(134, 'Gadhada', 14),
(135, 'Umrala', 14),
(136, 'Bhavnagar', 14),
(137, 'Ghogha', 14),
(138, 'Sihor', 14),
(139, 'Gariadhar', 14),
(140, 'Palitana', 14),
(141, 'Talaja', 14),
(142, 'Mahuva', 14),
(143, 'Tarapur', 15),
(144, 'Sojitra', 15),
(145, 'Umreth', 15),
(146, 'Anand', 15),
(147, 'Petlad', 15),
(148, 'Khambhat', 15),
(149, 'Borsad', 15),
(150, 'Anklav', 15),
(151, 'Kapadvanj', 16),
(152, 'Virpur', 16),
(153, 'Balasinor', 16),
(154, 'Kathlal', 16),
(155, 'Mehmedabad', 16),
(156, 'Kheda', 16),
(157, 'Matar', 16),
(158, 'Nadiad', 16),
(159, 'Mahudha', 16),
(160, 'Thasra', 16),
(161, 'Khanpur', 17),
(162, 'Kadana', 17),
(163, 'Santrampur', 17),
(164, 'Lunawada', 17),
(165, 'Shehera', 17),
(166, 'Morwa (Hadaf) ', 17),
(167, 'Godhra', 17),
(168, 'Kalol', 17),
(169, 'Ghoghamba', 17),
(170, 'Halol', 17),
(171, 'Jambughoda', 17),
(172, 'Fatepura', 18),
(173, 'Jhalod', 18),
(174, 'Limkheda', 18),
(175, 'Dohad', 18),
(176, 'Garbada', 18),
(177, 'Devgadbaria', 18),
(178, 'Dhanpur', 18),
(179, 'Savli', 19),
(180, 'Vadodara', 19),
(181, 'Vaghodia', 19),
(182, 'Jetpur Pavi ', 19),
(183, 'Chhota Udaipur ', 19),
(184, 'Kavant', 19),
(185, 'Nasvadi', 19),
(186, 'Sankheda', 19),
(187, 'Dabhoi', 19),
(188, 'Padra', 19),
(189, 'Karjan', 19),
(190, 'Sinor', 19),
(191, 'Tilakwada', 20),
(192, 'Nandod', 20),
(193, 'Dediapada', 20),
(194, 'Sagbara', 20),
(195, 'Jambusar', 21),
(196, 'Amod', 21),
(197, 'Vagra', 21),
(198, 'Bharuch', 21),
(199, 'Jhagadia', 21),
(200, 'Anklesvar', 21),
(201, 'Hansot', 21),
(202, 'Valia', 21),
(203, 'Olpad', 22),
(204, 'Mangrol', 22),
(205, 'Umarpada', 22),
(206, 'Mandvi', 22),
(207, 'Kamrej', 22),
(208, 'Surat City ', 22),
(209, 'Chorasi', 22),
(210, 'Palsana', 22),
(211, 'Bardoli', 22),
(212, 'Mahuva', 22),
(213, 'The Dangs', 23),
(214, 'Navsari', 24),
(215, 'Jalalpore', 24),
(216, 'Gandevi', 24),
(217, 'Chikhli', 24),
(218, 'Bansda', 24),
(219, 'Valsad', 25),
(220, 'Dharampur', 25),
(221, 'Pardi', 25),
(222, 'Kaprada', 25),
(223, 'Umbergaon', 25),
(224, 'Nizar', 26),
(225, 'Uchchhal', 26),
(226, 'Songadh', 26),
(227, 'Vyara', 26),
(228, 'Valod', 26);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
