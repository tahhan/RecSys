-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2011 at 07:56 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `seeker_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: contacted, 1: 1st interview, 2: 2nd interview, 3: sent offer to him, 4: sent contract to him',
  PRIMARY KEY (`seeker_id`,`vacancy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `candidate`
--


-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `city`
--


-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE IF NOT EXISTS `company_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `industry_id` int(11) NOT NULL,
  `no_employees` int(11) NOT NULL,
  `city_id` int(11) NOT NULL COMMENT 'we can find country from city',
  `contact_person` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hear_from` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `company_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=245 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'Algeria'),
(2, 'Bahrain'),
(3, 'Djibouti'),
(4, 'Egypt'),
(5, 'Iraq'),
(6, 'Jordan'),
(7, 'Kuwait'),
(8, 'Lebanon'),
(9, 'Libya'),
(10, 'Mauritania'),
(11, 'Morocco'),
(12, 'Oman'),
(13, 'Palestine'),
(14, 'Qatar'),
(15, 'Saudi Arabia'),
(16, 'Somalia'),
(17, 'Sudan'),
(18, 'Syria'),
(19, 'Tunisia'),
(20, 'UAE'),
(21, 'Yemen'),
(22, 'Afghanistan'),
(23, 'Aland Islands'),
(24, 'Albania'),
(25, 'American Samoa'),
(26, 'Andorra'),
(27, 'Angola'),
(28, 'Anguilla'),
(29, 'Antarctica'),
(30, 'Antigua and Barbuda'),
(31, 'Argentina'),
(32, 'Armenia'),
(33, 'Aruba'),
(34, 'Australia'),
(35, 'Austria'),
(36, 'Azerbaijan'),
(37, 'Bangladesh'),
(38, 'Barbados'),
(39, 'Belarus'),
(40, 'Belgium'),
(41, 'Belize'),
(42, 'Benin'),
(43, 'Bermuda'),
(44, 'Bhutan'),
(45, 'Bolivia'),
(46, 'Bosnia and Herzegovina'),
(47, 'Botswana'),
(48, 'Bouvet Island'),
(49, 'Brazil'),
(50, 'British Indian Ocean Territory'),
(51, 'British Virgin Islands'),
(52, 'Brunei Darussalam'),
(53, 'Bulgaria'),
(54, 'Burkina Faso'),
(55, 'Burundi'),
(56, 'Cambodia'),
(57, 'Cameroon'),
(58, 'Canada'),
(59, 'Cape Verde'),
(60, 'Cayman Islands'),
(61, 'Central African Republic'),
(62, 'Chad'),
(63, 'Chile'),
(64, 'China'),
(65, 'Christmas Island'),
(66, 'Cocos (Keeling) Islands'),
(67, 'Colombia'),
(68, 'Comoros'),
(69, 'Congo'),
(70, 'Congo, the Democratic Republic of the'),
(71, 'Cook Islands'),
(72, 'Costa Rica'),
(73, 'Cote d''Ivoire'),
(74, 'Croatia'),
(75, 'Cuba'),
(76, 'Cyprus'),
(77, 'Czech Republic'),
(78, 'Denmark'),
(79, 'Dominica'),
(80, 'Dominican Republic'),
(81, 'Ecuador'),
(82, 'El Salvador'),
(83, 'Equatorial Guinea'),
(84, 'Eritrea'),
(85, 'Estonia'),
(86, 'Ethiopia'),
(87, 'Falkland Islands (Malvinas)'),
(88, 'Faroe Islands'),
(89, 'Fiji'),
(90, 'Finland'),
(91, 'France'),
(92, 'French Guiana'),
(93, 'French Polynesia'),
(94, 'French Southern Territories'),
(95, 'Gabon'),
(96, 'Gambia'),
(97, 'Georgia'),
(98, 'Germany'),
(99, 'Ghana'),
(100, 'Gibraltar'),
(101, 'Greece'),
(102, 'Greenland'),
(103, 'Grenada'),
(104, 'Guadeloupe'),
(105, 'Guam'),
(106, 'Guatemala'),
(107, 'Guernsey'),
(108, 'Guinea'),
(109, 'Guinea Bissau'),
(110, 'Guyana'),
(111, 'Haiti'),
(112, 'Heard and McDonald Islands'),
(113, 'Holy See (Vatican City)'),
(114, 'Honduras'),
(115, 'Hong Kong (SAR)'),
(116, 'Hungary'),
(117, 'Iceland'),
(118, 'India'),
(119, 'Indonesia'),
(120, 'Iran'),
(121, 'Ireland'),
(122, 'Isle of Man'),
(123, 'Italy'),
(124, 'Jamaica'),
(125, 'Japan'),
(126, 'Jersey'),
(127, 'Kazakhstan'),
(128, 'Kenya'),
(129, 'Kiribati'),
(130, 'Korea, Democratic People''s Republic of'),
(131, 'Korea, Republic of'),
(132, 'Kyrgyzstan'),
(133, 'Lao People''s Democratic Republic'),
(134, 'Latvia'),
(135, 'Lesotho'),
(136, 'Liberia'),
(137, 'Liechtenstein'),
(138, 'Lithuania'),
(139, 'Luxembourg'),
(140, 'Macao'),
(141, 'Macedonia'),
(142, 'Madagascar'),
(143, 'Malawi'),
(144, 'Malaysia'),
(145, 'Maldives'),
(146, 'Mali'),
(147, 'Malta'),
(148, 'Marshall Islands'),
(149, 'Martinique'),
(150, 'Mauritius'),
(151, 'Mayotte'),
(152, 'Mexico'),
(153, 'Micronesia, Federated States of'),
(154, 'Moldova'),
(155, 'Monaco'),
(156, 'Mongolia'),
(157, 'Montenegro'),
(158, 'Montserrat'),
(159, 'Mozambique'),
(160, 'Myanmar'),
(161, 'Namibia'),
(162, 'Nauru'),
(163, 'Nepal'),
(164, 'Netherlands'),
(165, 'Netherlands Antilles'),
(166, 'New Caledonia'),
(167, 'New Zealand'),
(168, 'Nicaragua'),
(169, 'Niger'),
(170, 'Nigeria'),
(171, 'Niue'),
(172, 'Norfolk Island'),
(173, 'Northern Mariana Islands'),
(174, 'Norway'),
(175, 'Pakistan'),
(176, 'Palau'),
(177, 'Panama'),
(178, 'Papua New Guinea'),
(179, 'Paraguay'),
(180, 'Peru'),
(181, 'Philippines'),
(182, 'Pitcairn'),
(183, 'Poland'),
(184, 'Portugal'),
(185, 'Puerto Rico'),
(186, 'Romania'),
(187, 'Russia'),
(188, 'Rwanda'),
(189, 'Réunion'),
(190, 'Saint Barthelemy'),
(191, 'Saint Helena'),
(192, 'Saint Kitts and Nevis'),
(193, 'Saint Lucia'),
(194, 'Saint Pierre and Miquelon'),
(195, 'Saint Vincent and the Grenadines'),
(196, 'Samoa'),
(197, 'San Marino'),
(198, 'Senegal'),
(199, 'Serbia'),
(200, 'Seychelles'),
(201, 'Sierra Leone'),
(202, 'Singapore'),
(203, 'Slovakia'),
(204, 'Slovenia'),
(205, 'Solomon Islands'),
(206, 'South Africa'),
(207, 'South Georgia and the South Sandwich Islands'),
(208, 'Spain'),
(209, 'Sri Lanka'),
(210, 'Suriname'),
(211, 'Svalbard and Jan Mayen'),
(212, 'Swaziland'),
(213, 'Sweden'),
(214, 'Switzerland'),
(215, 'São Tomé and Príncipe'),
(216, 'Taiwan'),
(217, 'Tajikistan'),
(218, 'Tanzania'),
(219, 'Thailand'),
(220, 'The Bahamas'),
(221, 'Timor Leste'),
(222, 'Togo'),
(223, 'Tokelau'),
(224, 'Tonga'),
(225, 'Trinidad and Tobago'),
(226, 'Turkey'),
(227, 'Turkmenistan'),
(228, 'Turks and Caicos Islands'),
(229, 'Tuvalu'),
(230, 'USA'),
(231, 'Uganda'),
(232, 'Ukraine'),
(233, 'United Kingdom'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Vietnam'),
(240, 'Virgin Islands'),
(241, 'Wallis and Futuna'),
(242, 'Western Sahara'),
(243, 'Zambia'),
(244, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Dept id',
  `company_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Dept name',
  `contact_person` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `department`
--


-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `industry_name`) VALUES
(1, 'Accounting and Auditing'),
(2, 'Marketing and Public Relations'),
(3, 'Agriculture'),
(4, 'Airlines and Aviation'),
(5, 'Architecture'),
(6, 'Automotive'),
(7, 'Business Support Services'),
(8, 'Biotechnology'),
(9, 'Catering, Food Services and Restaurants'),
(10, 'Social Services and Non-Profit'),
(11, 'Hardware and Maintenance'),
(12, 'Software'),
(13, 'Construction'),
(14, 'Consulting Services'),
(15, 'Distribution and Logistics'),
(16, 'Education and Training'),
(17, 'Entertainment, Sports and Recreation'),
(18, 'Clothing and Fashion'),
(19, 'Financial Services'),
(20, 'Public Sector'),
(21, 'Healthcare and Medicine'),
(22, 'Hospitality, Travel and Tourism'),
(23, 'Insurance'),
(24, 'Internet and E-Commerce'),
(25, 'Law Enforcement and Security'),
(26, 'Legal'),
(27, 'Manufacturing and Production'),
(28, 'Maritime'),
(29, 'Communications and Media'),
(30, 'Art and Design'),
(31, 'Employment Placement Agencies and HR'),
(32, 'Electro-Mechanical Products'),
(33, 'Other'),
(34, 'Energy Production and Distribution'),
(35, 'Pharmaceuticals'),
(36, 'Publishing'),
(37, 'Petrochemicals and Mining'),
(38, 'Real Estate'),
(39, 'Retail and Wholesale'),
(40, 'Shipping and Transportation'),
(41, 'Fast Moving Consumer Goods (FMCG)'),
(42, 'Telecommunications'),
(43, 'Call Center'),
(44, 'Furniture'),
(45, 'Diversified Group');

-- --------------------------------------------------------

--
-- Table structure for table `rrf`
--

CREATE TABLE IF NOT EXISTS `rrf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'RRF iD',
  `department_id` int(11) NOT NULL,
  `job_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'CEO, mngr, team leader, employer',
  `job_description` text COLLATE utf8_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `no_employees_required` int(11) NOT NULL,
  `type_employment` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'permanent, limited',
  `reason_employment` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'new position, replacement',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'if not accepted (pending)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rrf`
--


-- --------------------------------------------------------

--
-- Table structure for table `saved_searches_company_cvs`
--

CREATE TABLE IF NOT EXISTS `saved_searches_company_cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `list_of_applicants_id` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `saved_searches_company_cvs`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE IF NOT EXISTS `seeker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT '0',
  `marital_status` tinyint(4) DEFAULT '0',
  `nationalities` text COLLATE utf8_unicode_ci COMMENT 'this colum should be used as json array with each nationalities but there is a table for nationality\nlike [1,2,3] ',
  `living_in` int(11) DEFAULT NULL COMMENT 'the city id of where he lives',
  `residency_status` tinyint(4) DEFAULT NULL COMMENT 'type by number :\n0 - Citizen\n1 - Residency Visa (Non-transferable)\n2 - Residency Visa (Transferable)\n3 - Student Visa\n4 - Transit Visa\n5 - Visit Visa\n6 - No Visa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seeker`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker_apply_vacancy`
--

CREATE TABLE IF NOT EXISTS `seeker_apply_vacancy` (
  `seeker_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  PRIMARY KEY (`seeker_id`,`vacancy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seeker_apply_vacancy`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker_edu`
--

CREATE TABLE IF NOT EXISTS `seeker_edu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seeker_id` int(11) NOT NULL,
  `edu_level` enum('elementary','high_school','diploma','uni_bachelors','masters','phd') COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uni_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `graduation_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seeker_edu`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker_edu_degree`
--

CREATE TABLE IF NOT EXISTS `seeker_edu_degree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seeker_id` int(11) NOT NULL,
  `degree_level` enum('uni_bachelors','masters','phd') COLLATE utf8_unicode_ci NOT NULL,
  `uni_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seeker_edu_degree`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker_edu_info`
--

CREATE TABLE IF NOT EXISTS `seeker_edu_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seeker_id` int(11) NOT NULL,
  `have_degree` tinyint(4) NOT NULL DEFAULT '0',
  `highest_level` enum('elementary','high_school','diploma','uni') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seeker_edu_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker_other_info`
--

CREATE TABLE IF NOT EXISTS `seeker_other_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seeker_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seeker_other_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker_professional_info`
--

CREATE TABLE IF NOT EXISTS `seeker_professional_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seeker_id` int(11) NOT NULL,
  `have_exp` tinyint(4) NOT NULL DEFAULT '0',
  `exp_years` int(11) DEFAULT NULL,
  `last_job_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primary_comm` int(11) NOT NULL COMMENT 'comm id',
  `second_comm` int(11) DEFAULT NULL COMMENT 'comm id',
  `third_comm` int(11) DEFAULT NULL COMMENT 'comm id',
  `lang_list` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'json array of objects like [{''arabic'':''begginer''},{''english'':}]',
  `skills` text COLLATE utf8_unicode_ci COMMENT 'free text',
  `preferd_place` int(11) DEFAULT NULL COMMENT 'country id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seeker_professional_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker_work_exp`
--

CREATE TABLE IF NOT EXISTS `seeker_work_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seeker_id` int(11) NOT NULL,
  `job_title` int(11) NOT NULL,
  `company_name` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `still_working` tinyint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seeker_work_exp`
--


-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `job_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'CEO, mngr, team leader, employer',
  `job_description` text COLLATE utf8_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `no_employees_required` int(11) NOT NULL,
  `type_employment` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'permanent, limited',
  `reason_employment` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'new position, replacement',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'empty, need more, accepted, removed',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vacancy`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
