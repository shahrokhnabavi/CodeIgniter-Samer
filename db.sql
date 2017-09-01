-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 03:19 PM
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
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `slug`, `description`, `created_at`, `updated_at`, `admin_id`) VALUES
(7, 'Taakstraf geëist tegen oud', 'Volgens de aanklager heeft Linschoten ''''op kosten van de samenleving" jarenlang boven zijn stand geleefd. ''''In plaats van belasting af te dragen, bedeelde hij zichzelf en zijn echtgenote van een royaal inkomen", zei ze. ''''Zijn portemonnee was belangrijker dan het meebetalen aan publieke voorzieningen."\r\n\r\nDe aanklager vond dat Linschoten ervan doordrongen had moeten zijn dat hij een voorbeeldfunctie had en heeft. ''''Waarom zou een ondernemer zich aan allerlei verplichtingen houden als een voormalig staatssecretaris dat niet doet?"\r\n\r\nLinschoten zou de staat tussen 2010 en eind 2012 voor ruim honderdduizend euro hebben benadeeld door te weinig omzetbelasting af te dragen.\r\n\r\nVolgens de aanklager kreeg de voormalige VVD-politicus over die jaren keer op keer signalen van zijn boekhoudkantoor dat hij stukken moest opsturen, maar negeerde hij die volkomen. ''''Hij vertrouwde op de professionaliteit van zijn boekhoudkantoor, zegt hij. Maar als het kantoor zo professioneel was, waarom nam hij het dan niet serieus?', 'asasfa', 'Voormalig VVD-politicus Robin Linschoten moet vanwege belastingfraude tweehonderd uur taakstraf en een voorwaardelijke gevangenisstraf krijgen van een half jaar.', '2017-09-01 14:29:51', '2017-09-01 14:29:51', 1),
(8, 'OM eist 25 jaar tegen verdachte', 'Dit is bekendgemaakt tijdens de inhoudelijke behandeling van de zaak op vrijdag. \r\n\r\nSurailie I. werd in 2015 opgepakt voor de liquidatie, die twee jaar eerder plaatsvond. Bij de schietpartij tijdens het dancefeest kwam de 26-jarige Souhail Laachir om het leven.\r\n\r\nLaachir, volgens Het Parool gezien als de financiële man van veroordeelde crimineel Benaouf A., zou volgens getuigen ten midden van feestvierende mensen ruzie hebben gekregen met de verdachte. I. wordt op zijn beurt gelieerd aan het gezelschap van de in 2014 geliquideerde crimineel Gwenette Martha, een rivaal van A.\r\n\r\nHiermee kan het doodschieten van Laachir worden gezien als onderdeel van de liquidatiegolf in de onderwereld van Amsterdam. \r\n\r\nStrafeis\r\nHet OM heeft in de strafeis meegenomen dat er sprake is van een afrekening in het criminele circuit. Ook het risico voor de feestgangers vond de Officier van Justitie motivering om 25 jaar te eisen. Ten tijde van de liquidatie waren bijna duizend mensen aanwezig. \r\n\r\nToen agenten na meldingen over meerdere schoten arriveerden bij het Scheepvaartmuseum, lag het slachtoffer bloedend op de grond. Later overleed hij aan zijn verwondingen.', 'slasla', 'Het Openbaar Ministerie (OM) heeft 25 jaar cel geëist tegen de verdachte van een liquidatie tijdens het Amsterdamse dancefeest Waterfront in het Scheepvaartmuseum.', '2017-09-01 14:31:31', '2017-09-01 14:31:31', 1),
(9, 'Acht jaar cel voor vrouw die partner', 'Ze heeft hem juni vorig jaar in bed in zijn hals gestoken. Daarna probeerde de moeder van vijf kinderen zichzelf te doden met dertig messteken. De kinderen waren op dat moment ook in het huis aanwezig.\r\n\r\nVan der Heijden liep negen steekwonden op. Hij strompelde zwaargewond naar zijn moeder, vier deuren verderop. Hij haalde dat net, maar reanimatie hielp niet meer. De twee hadden de avond voor de steekpartij ruzie met elkaar gehad.\r\n\r\nBinnen het gezin speelden al jaren problemen, mede veroorzaakt door de drugshandel van de man. N. was het hier niet mee eens, maar vond het ook wel ''makkelijk geld'', zei ze tijdens de behandeling van de zaak. Ze gaf aan zich weinig van de bewuste avond te herinneren.\r\n\r\nMoederrol\r\nHet Openbaar Ministerie had tien jaar cel tegen de vrouw geëist. Dat de straf lager uitvalt, heeft volgens de rechtbank te maken met de "lange periode van angst, vernedering en wanhoop bij de verdachte die aan het delict vooraf ging".\r\n\r\nOok houdt de rechtbank er rekening mee dat het wenselijk is dat de vrouw zo snel mogelijk haar moederrol weer inneemt. De kinderen, tussen tien en vijftien jaar oud, hopen dat hun moeder vrijkomt, zo schreven ze in brieven aan de rechter.', 'toli', 'De Bossche Sandra N. (39) is tot acht jaar cel veroordeeld door de rechtbank in Den Bosch voor het doodsteken van haar partner Selim van der Heijden (39).', '2017-09-01 14:33:02', '2017-09-01 14:33:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `startdate` varchar(255) DEFAULT NULL,
  `enddate` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `content`, `startdate`, `enddate`, `created_at`, `updated_at`, `admin_id`) VALUES
(3, 'The Night Way', 'This is the content of my content for this perpose jhgfd', '1/1/2000', '10/10/200', '2017-08-31 15:09:19', '2017-08-31 15:09:19', 1),
(4, 'perspiciatis', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi', '2017-01-31', '2015-10-29', '2017-09-01 11:31:18', '2017-09-01 11:31:18', 1),
(14, 'typography', 'orem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It''s also called placeholder (or filler) text. It''s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it''s not genuiorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It''s also called placeholder (or filler) text. It''s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it''s not genui', '2017-01-01', '2017-01-01', '2017-09-01 10:31:35', '2017-09-01 10:31:35', 1),
(15, 'Sheril', 'orem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It''s also called placeholder (or filler) text. It''s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it''s not genui', '2017-01-01', '2017-12-31', '2017-09-01 11:26:36', '2017-09-01 11:26:36', 1),
(16, 'validation', 'unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi', '2017-01-01', '2017-02-01', '2017-09-01 12:09:55', '2017-09-01 12:09:55', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'shahrokh@yahoo.com', '2017-08-31 11:34:41', '2017-08-31 11:34:41'),
(3, 'mina@ymail.com', '2017-08-31 11:34:41', '2017-08-31 11:34:41'),
(4, 'nazanin@gmail.com', '2017-08-31 11:34:41', '2017-08-31 11:34:41'),
(7, 'sima@yahoo.com', '2017-09-01 09:13:27', '2017-09-01 09:13:27'),
(8, 'sima@me.com', '2017-09-01 14:35:52', '2017-09-01 14:35:52');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
