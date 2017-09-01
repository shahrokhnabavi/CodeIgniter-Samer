-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 02:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `impact`
--
CREATE DATABASE IF NOT EXISTS `impact` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `impact`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Shahrokh', '37dbb6ac19dcd69f9e1b6c4540fcd416', 'shahrokh@yahoo.com', '2017-08-29 10:36:03', '2017-08-29 10:36:03'),
(3, 'Milad Rostampoor s', 'b86ea911d632363c1bb812a6a9827702', 'milad@yahoo.com', '2017-08-29 17:14:09', '2017-09-01 03:23:30'),
(4, 'Mayam Sedighi', '73ed82a1d4fbe54ebab41b3448bddeaa', 'maram@yahoo.com', '2017-08-29 17:17:05', '2017-08-29 17:17:05'),
(5, 'Naomi Mater', '23d1b44aec271368f25169e5f789d463', 'naome@milan.it', '2017-08-29 17:54:03', '2017-08-29 23:16:26'),
(6, 'Dummy NameO', '23d1b44aec271368f25169e5f789d463', 'shahrokh@yahoo.co', '2017-08-29 17:54:25', '2017-08-29 23:14:37'),
(7, 'shakhibazooka', '23d1b44aec271368f25169e5f789d463', 'shahrokh@yahoo.com2', '2017-08-29 17:54:46', '2017-08-29 17:54:46'),
(8, 'shakhibazooka', '23d1b44aec271368f25169e5f789d463', 'shahrokh@yahoo.com3', '2017-08-29 17:55:06', '2017-08-29 17:55:06'),
(12, 'Mark', '23d1b44aec271368f25169e5f789d463', 'shahrokh@yahoo.com7', '2017-08-29 17:56:28', '2017-08-29 17:56:28'),
(13, 'Monika', '23d1b44aec271368f25169e5f789d463', 'shahrokh@yahoo.com8', '2017-08-29 17:56:52', '2017-08-29 17:56:52'),
(14, 'Ivan In the class', '23d1b44aec271368f25169e5f789d463', 'ivas@restartnetwork.com', '2017-08-29 18:37:09', '2017-09-01 03:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `slug`, `description`, `created_at`, `updated_at`, `admin_id`) VALUES
(6, 'Test me now com', 'and there assets/ assets/ assets/ assets/assets/ assets/ assets/ assets/vassets/ assets/ assets/ assets/', 'slug-d', 'me here assets/ assets/ assets/ assets/ assets/ assets/ assets/ assets/', NULL, '2017-09-01 13:53:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `content`, `slug`, `description`, `created_at`, `updated_at`, `admin_id`) VALUES
(3, 'The Night Way', 'This is the content of my content for this perpose jhgfd', 'the-night-way', 'This is a short description about how this content will work hg', '2017-08-31 15:09:19', '2017-08-31 15:09:19', 1),
(4, 'Ring A10 West bij Amsterdam zaterdag al open', 'Rijkswaterstaat laat weten dat bij het plannen van de werkzaamheden extra tijd was uitgetrokken voor eventuele tegenvallers. Maar die zijn er nauwelijks geweest. "Het werk verliep soepel en het weer zat mee'''', aldus een woordvoerder. \r\n\r\nDe afgelopen zes weken is asfalt weggefreesd en opnieuw aangebracht en is nieuwe belijning getrokken. Verder zijn de bestrating in de bermen en de matrixborden vervangen en is de regenwaterafvoer verbeterd.', 'Ring-A10', 'Het verkeer kan vanaf zaterdagmorgen vroeg weer in beide richtingen gebruikmaken van de A10 West bij Amsterdam. Dat is twee dagen eerder dan gepland.', '2017-08-31 14:16:31', '2017-08-31 14:16:31', 1),
(5, 'Transportbedrijf Brinkman krijgt deurwaarder over de vloer', 'De drie medewerkers, allen chauffeur en FNV-lid, zijn volgens FNV meerdere keren onterecht ontslagen bij het bedrijf. De rechter heeft dit besluit teruggefloten. Twee chauffeurs werken volgens de FNV nog bij het bedrijf en de ander heeft een ontbonden contract.\r\n\r\nDoor het ontslag zouden de medewerkers volgens de vakbond inkomsten zijn misgelopen. De rechtbank bepaalde eerder dit jaar al dat het vervoersbedrijf met terugwerkende kracht loon moet betalen.\r\n\r\nFacebook\r\nDe redenen voor de ontslagen lopen uiteen. Zo zou een medewerker volgens de vakbond zijn ontslagen nadat deze het op Facebook had opgenomen voor de vakbond. Ook stelt de FNV dat een medewerker ontslagen is omdat deze verdacht werd van geweld, wat volgens FNV-medewerker Edwin Atema berust op een "fabel".\r\n\r\nEen ander ontslag zou volgens Atema zijn veroorzaakt doordat een medewerker zich niet zou hebben gehouden aan de rijrusttijden, terwijl dit bedrijfsbeleid is.\r\n\r\nEerdere pogingen\r\nDe FNV stelt dat de afgelopen maanden meerdere malen is gepoogd beslag te leggen op rekeningen van de Drentse onderneming. Dit zou echter te weinig hebben opgeleverd. "Het kan zijn dat het bedrijf klanten heeft gevraagd transacties op een andere rekening over te maken."\r\n\r\nDe deurwaarder begint volgens FNV om 14:00 uur ''s middags met de beslaglegging in Emmen. Sinds 13:30 uur deze middag zouden sympathisanten zich verzamelen voor het bedrijfsgebouw. Atema: "Wij hebben geadviseerd om te zoeken naar auto’s, heftrucks en computers. Maar hierover beslist de deurwaarder."\r\n\r\nDe FNV won eerder dit jaar ook een zaak tegen Brinkman Trans Holland over cao-lonen en arbeidsomstandigheden van Poolse en Moldavische chauffeurs. De vakbond dwong toen af dat het vervoersbedrijf deze medewerkers Nederlandse cao-lonen moest betalen en dat het bedrijf deze chauffeurs niet in hun truck moest laten overnachten.\r\n\r\nBrinkman Trans Holland wil geen commentaar geven over deze kwestie.', 'trans-parent', 'IKEA-transporteur Brinkman Trans Holland krijgt vanmiddag een deurwaarder met politiebegeleiding over de vloer. Deze zou volgens vakbond FNV voor 100.000 euro aan natura beslag moeten leggen.', '2017-08-31 14:34:03', '2017-08-31 14:34:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file_name` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `file_name`, `created_at`, `updated_at`, `admin_id`) VALUES
(90, 'Delk en Boot', 'WczFCqMJ', '2017-08-31 01:57:01', '2017-09-01 06:04:36', 1),
(91, 'Family', 'BUGO2qxn', '2017-08-31 01:57:57', '2017-09-01 05:37:28', 1),
(109, 'Fantastic', 'Mt92bqRY', '2017-09-01 05:30:37', '2017-09-01 05:32:35', 1),
(110, 'Backgrond', 'iE3528XQ', '2017-09-01 05:31:43', '2017-09-01 05:31:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
`id` bigint(20) NOT NULL,
  `key` varchar(64) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'The Middle East', '2017-08-31 08:34:47', '2017-09-01 07:02:18'),
(2, 'welcome_msg', 'We are here to help you that build your future.<br>\r\nBut you know that', '2017-08-31 09:00:22', '2017-09-01 07:02:18'),
(4, 'meta_desc', 'meta description me', '2017-08-31 09:00:22', '2017-09-01 07:02:18'),
(6, 'meta_key', 'caltural,name,me,best,ou', '2017-08-31 10:08:40', '2017-09-01 07:02:18'),
(12, 'site_icon', 'icon.gif', '2017-08-31 10:40:06', '2017-09-01 02:49:16'),
(13, 'site_logo', 'logo.png', '2017-08-31 10:59:38', '2017-09-01 02:56:29'),
(14, 'site_subtitle', 'Sub text, This place some text can take place', '2017-08-31 19:41:52', '2017-09-01 07:02:18'),
(15, 'contact_email', 'shahrokhnabavi@gmail.com', '2017-09-01 03:10:45', '2017-09-01 07:02:18'),
(16, 'contact_text', '<b>Our Office:</b><br>\r\nCiC Rotterdam, Stationsplein 45 Rotterdam, Netherlands, 3013AK<br>', '2017-09-01 07:02:18', '2017-09-01 07:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
`id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'shahrokh@yahoo.com', '2017-08-31 11:34:41', '2017-08-31 11:34:41'),
(3, 'mina@ymail.com', '2017-08-31 11:34:41', '2017-08-31 11:34:41'),
(4, 'nazanin@gmail.com', '2017-08-31 11:34:41', '2017-08-31 11:34:41'),
(7, 'sima@yahoo.com', '2017-09-01 09:13:27', '2017-09-01 09:13:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_content_admin_idx` (`admin_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_content_admin_idx` (`admin_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_gallery_admins_idx` (`admin_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
ADD CONSTRAINT `fk_content_id_admin` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
ADD CONSTRAINT `fk_gallery_admins` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
