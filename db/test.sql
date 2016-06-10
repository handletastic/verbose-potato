-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2016 at 05:15 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `notes` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `notes`) VALUES
(1, 'fathere', ''),
(2, 'proclass', ''),
(3, 'probin', ''),
(4, 'belonger', ''),
(5, 'realin', ''),
(6, 'exister', ''),
(7, 'verdrawn', ''),
(8, 'noverage', ''),
(9, 'madas', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `description` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table to store categories' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'handbags', ''),
(2, 'briefcases', ''),
(3, 'suitcases', ''),
(4, 'backpacks', ''),
(5, 'sports', ''),
(6, 'overnighters', '');

-- --------------------------------------------------------

--
-- Table structure for table `colours`
--

CREATE TABLE IF NOT EXISTS `colours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `notes` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(22) DEFAULT NULL,
  `imagefile` varchar(64) DEFAULT NULL,
  `caption` varchar(256) DEFAULT NULL,
  `published` int(1) DEFAULT NULL,
  `productid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `productid` (`productid`),
  KEY `title` (`title`),
  KEY `file` (`imagefile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `imagefile`, `caption`, `published`, `productid`) VALUES
(1, 'Dolor sit amet', 'image01.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia', 1, 1),
(2, 'Pellentesque nibh', 'image02.jpg', 'Quisque volutpat condimentum velit', 1, 2),
(3, 'Proin quam', 'image03.jpg', 'Mauris massa. Vestibulum lacinia arcu eget nulla', 1, 3),
(4, 'Quisque cursus', 'image04.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 1, 4),
(5, 'Class aptent taciti', 'image05.jpg', 'Fusce nec tellus sed augue semper porta', 1, 5),
(6, 'Integer euismod lacus ', 'image06.jpg', 'Integer euismod lacus luctus magna', 1, 6),
(7, 'Dolor sit amet', 'image07.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia', 1, 7),
(8, 'Pellentesque nibh', 'image08.jpg', 'Quisque volutpat condimentum velit', 1, 8),
(9, 'Proin quam', 'image09.jpg', 'Mauris massa. Vestibulum lacinia arcu eget nulla', 1, 9),
(10, 'Quisque cursus', 'image10.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 1, 10),
(11, 'Class aptent taciti', 'image11.jpg', 'Fusce nec tellus sed augue semper porta', 1, 11),
(12, 'Integer euismod lacus ', 'image12.jpg', 'Integer euismod lacus luctus magna', 1, 12),
(13, 'Dolor sit amet', 'image13.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia', 1, 13),
(14, 'Pellentesque nibh', 'image14.jpg', 'Quisque volutpat condimentum velit', 1, 14),
(15, 'Proin quam', 'image15.jpg', 'Mauris massa. Vestibulum lacinia arcu eget nulla', 1, 15),
(16, 'Quisque cursus', 'image16.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 1, 16),
(17, 'Class aptent taciti', 'image17.jpg', 'Fusce nec tellus sed augue semper porta', 1, 17),
(18, 'Integer euismod lacus ', 'image18.jpg', 'Integer euismod lacus luctus magna', 1, 18),
(19, 'Dolor sit amet', 'image19.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia', 1, 19),
(20, 'Pellentesque nibh', 'image20.jpg', 'Quisque volutpat condimentum velit', 1, 20),
(21, 'Proin quam', 'image21.jpg', 'Mauris massa. Vestibulum lacinia arcu eget nulla', 1, 21),
(22, 'Quisque cursus', 'image22.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 1, 22),
(23, 'Class aptent taciti', 'image23.jpg', 'Fusce nec tellus sed augue semper porta', 1, 23),
(24, 'Integer euismod lacus ', 'image24.jpg', 'Integer euismod lacus luctus magna', 1, 24),
(25, 'Dolor sit amet', 'image25.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia', 1, 25),
(26, 'Pellentesque nibh', 'image26.jpg', 'Quisque volutpat condimentum velit', 1, 26),
(27, 'Proin quam', 'image27.jpg', 'Mauris massa. Vestibulum lacinia arcu eget nulla', 1, 27),
(28, 'Quisque cursus', 'image28.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 1, 28),
(29, 'Class aptent taciti', 'image29.jpg', 'Fusce nec tellus sed augue semper porta', 1, 29),
(30, 'Integer euismod lacus ', 'image30.jpg', 'Integer euismod lacus luctus magna', 1, 30),
(31, 'Quisque cursus', 'image041.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 1, 4),
(32, 'Quisque cursus', 'image042.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 1, 4),
(33, 'Proin quam', 'image211.jpg', 'Mauris massa. Vestibulum lacinia arcu eget nulla', 1, 21),
(34, 'Proin quam', 'image212.jpg', 'Mauris massa. Vestibulum lacinia arcu eget nulla', 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `userid` int(8) NOT NULL,
  `transactionid` int(8) NOT NULL,
  `itemid` int(8) NOT NULL,
  `itemquantity` mediumint(3) NOT NULL,
  `status` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `link` varchar(32) NOT NULL,
  `parentid` tinyint(2) NOT NULL DEFAULT '0',
  `level` tinyint(2) NOT NULL DEFAULT '0',
  `pagesgroup` int(4) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `icon_name` varchar(24) NOT NULL,
  `show_icon` tinyint(1) NOT NULL DEFAULT '0',
  `show_name` tinyint(1) NOT NULL DEFAULT '1',
  `pagetitle` varchar(32) NOT NULL,
  `showorder` tinyint(2) NOT NULL,
  `needlogin` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name_2` (`name`),
  KEY `name` (`name`),
  KEY `pagetitle` (`pagetitle`),
  KEY `group` (`pagesgroup`),
  KEY `pagesgroup` (`pagesgroup`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `link`, `parentid`, `level`, `pagesgroup`, `published`, `icon_name`, `show_icon`, `show_name`, `pagetitle`, `showorder`, `needlogin`, `admin`) VALUES
(1, 'home', 'index.php', 0, 0, 1, 1, 'fa fa-home', 0, 1, 'Home Page', 1, 0, 0),
(2, 'store', 'store.php', 0, 0, 1, 1, '', 0, 1, 'Welcome to Our Store', 2, 0, 0),
(3, 'about', 'about.php', 0, 0, 1, 1, '', 0, 1, 'About Us', 3, 0, 0),
(4, 'contact us', 'contact.php', 0, 0, 1, 1, '', 0, 1, 'Get In Touch', 4, 0, 0),
(9, 'Register', 'register.php', 0, 0, 2, 1, 'fa fa-user-plus', 1, 1, 'Register for a free account', 30, 0, 0),
(10, 'Login', 'login.php', 0, 0, 2, 1, 'fa fa-sign-in', 1, 1, 'Log In', 40, 0, 0),
(11, 'Logout', 'logout.php', 0, 0, 2, 1, 'fa fa-sign-out', 1, 1, 'Log out of your account', 50, 1, 0),
(12, 'Account', 'account.php', 0, 0, 2, 1, 'fa fa-profile', 0, 1, 'Manage your account', 15, 1, 0),
(13, 'Shopping Cart', 'shoppingcart.php', 0, 0, 2, 1, 'fa fa-shopping-cart', 1, 1, 'View shopping cart', 20, 0, 0),
(14, 'Admin', 'admin.php', 0, 0, 2, 1, 'fa fa-lock', 1, 1, 'Manage the site', 10, 1, 1),
(15, 'Password Reset', 'password-reset.php', 0, 0, 0, 1, '', 0, 0, 'Reset your password', 0, 0, 0),
(16, 'product detail', 'product-detail.php', 0, 0, 0, 1, '', 0, 0, 'Product Details', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pagesgroup`
--

CREATE TABLE IF NOT EXISTS `pagesgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(16) NOT NULL,
  `groupdescription` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groupname_2` (`groupname`),
  KEY `groupname` (`groupname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pagesgroup`
--

INSERT INTO `pagesgroup` (`id`, `groupname`, `groupdescription`) VALUES
(1, 'main', ''),
(2, 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL DEFAULT '0',
  `sku` int(11) DEFAULT NULL,
  `stocklevel` int(11) DEFAULT NULL,
  `name` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `material` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `netprice` decimal(5,2) DEFAULT NULL,
  `sellprice` decimal(5,2) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special` int(11) DEFAULT NULL,
  `saleprice` decimal(5,2) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  `notes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `stocklevel`, `name`, `description`, `published`, `material`, `width`, `height`, `depth`, `weight`, `netprice`, `sellprice`, `featured`, `special`, `saleprice`, `created`, `modified`, `notes`) VALUES
(1, 2147483647, 28, 'Lablex', 'Leberkas doner alcatra tongue cupim, tri-tip andouille kielbasa. Beef ribs pork pastrami sausage tail sirloin cow landjaeger. Strip steak shoulder porchetta landjaeger. Cow landjaeger flank ball tip, tenderloin pig hamburger andouille capicola drumstick tri-tip. Cupim short ribs alcatra hamburger picanha, sausage shank biltong pork chop strip steak t-bone spare ribs.', 1, 'leather', 887, 408, 681, 550, '144.97', '210.21', 1, 1, '178.68', NULL, NULL, NULL),
(2, 1332006793, 38, 'Damstrong', 'Spare ribs tail jowl, ham hock chicken t-bone turducken pork loin tenderloin capicola pork chop venison short ribs kevin ball tip. Short ribs shoulder fatback brisket, ribeye bacon turducken tenderloin beef tail filet mignon spare ribs doner. Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'vinyl', 570, 727, 59, 597, '193.27', '280.24', 1, 0, NULL, NULL, NULL, NULL),
(3, 2147483647, 46, 'Unanix', 'Leberkas doner alcatra tongue cupim, tri-tip andouille kielbasa. Beef ribs pork pastrami sausage tail sirloin cow landjaeger. Strip steak shoulder porchetta landjaeger. Cow landjaeger flank ball tip, tenderloin pig hamburger andouille capicola drumstick tri-tip. Cupim short ribs alcatra hamburger picanha, sausage shank biltong pork chop strip steak t-bone spare ribs.', 1, 'polycarbonate', 705, 637, 565, 223, '136.48', '197.90', 0, 0, NULL, NULL, NULL, NULL),
(4, 2147483647, 42, 'Lamin', 'Spare ribs tail jowl, ham hock chicken t-bone turducken pork loin tenderloin capicola pork chop venison short ribs kevin ball tip. Short ribs shoulder fatback brisket, ribeye bacon turducken tenderloin beef tail filet mignon spare ribs doner. Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'nylon', 147, 881, 740, 882, '152.58', '221.24', 1, 0, NULL, NULL, NULL, NULL),
(5, 2147483647, 17, 'Indigo Hotin', 'Cow short ribs swine ribeye. Tail prosciutto porchetta, chicken filet mignon picanha ham meatball strip steak kielbasa ribeye tri-tip corned beef pork chop turkey. Beef hamburger shank beef ribs tail. Jowl boudin frankfurter, picanha short ribs porchetta meatball pig biltong ham hock short loin shoulder turkey cow chicken. Bresaola picanha short loin, corned beef pig shoulder kevin boudin kielbasa strip steak prosciutto tenderloin.', 1, 'leather', 242, 827, 401, 900, '213.60', '309.72', 1, 0, '263.26', NULL, NULL, NULL),
(6, 2147483647, 31, 'Freshfind', 'Cow short ribs swine ribeye. Tail prosciutto porchetta, chicken filet mignon picanha ham meatball strip steak kielbasa ribeye tri-tip corned beef pork chop turkey. Beef hamburger shank beef ribs tail. Jowl boudin frankfurter, picanha short ribs porchetta meatball pig biltong ham hock short loin shoulder turkey cow chicken. Bresaola picanha short loin, corned beef pig shoulder kevin boudin kielbasa strip steak prosciutto tenderloin.', 1, 'vinyl', 419, 273, 510, 790, '465.93', '675.60', 1, 0, NULL, NULL, NULL, NULL),
(7, 2147483647, 49, 'Indigofix', 'Leberkas doner alcatra tongue cupim, tri-tip andouille kielbasa. Beef ribs pork pastrami sausage tail sirloin cow landjaeger. Strip steak shoulder porchetta landjaeger. Cow landjaeger flank ball tip, tenderloin pig hamburger andouille capicola drumstick tri-tip. Cupim short ribs alcatra hamburger picanha, sausage shank biltong pork chop strip steak t-bone spare ribs.', 1, 'polycarbonate', 782, 87, 262, 317, '275.31', '399.20', 0, 0, NULL, NULL, NULL, NULL),
(8, 2147483647, 50, 'Cofzap', 'Fatback spare ribs flank, capicola short ribs ham hock short loin filet mignon turducken pork chop. Meatloaf ham hock beef beef ribs swine drumstick shankle chuck cupim kevin. Kielbasa leberkas frankfurter pig shankle brisket. Ball tip meatball bacon, bresaola rump alcatra beef ribs hamburger shankle short ribs capicola doner tri-tip strip steak sausage.', 1, 'nylon', 622, 116, 254, 482, '239.48', '347.25', 1, 1, '295.16', NULL, NULL, NULL),
(9, 2147483647, 18, 'Stattop', 'Kielbasa pig fatback, t-bone sausage spare ribs rump biltong. Landjaeger beef ribs meatball shoulder venison jerky pig, prosciutto short ribs shankle filet mignon swine. Venison shank tenderloin pork belly meatloaf beef corned beef.', 1, 'leather', 960, 815, 594, 648, '91.46', '132.62', 0, 0, NULL, NULL, NULL, NULL),
(10, 1319184220, 14, 'Zathdom', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'vinyl', 915, 31, 682, 803, '356.04', '516.26', 1, 0, NULL, NULL, NULL, NULL),
(11, 2147483647, 38, 'Groove-Trax', 'Fatback spare ribs flank, capicola short ribs ham hock short loin filet mignon turducken pork chop. Meatloaf ham hock beef beef ribs swine drumstick shankle chuck cupim kevin. Kielbasa leberkas frankfurter pig shankle brisket. Ball tip meatball bacon, bresaola rump alcatra beef ribs hamburger shankle short ribs capicola doner tri-tip strip steak sausage.', 1, 'polycarbonate', 174, 856, 932, 593, '467.15', '677.37', 0, 1, '575.76', NULL, NULL, NULL),
(12, 2147483647, 47, 'Zerhold', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'nylon', 830, 24, 380, 455, '343.66', '498.31', 0, 0, NULL, NULL, NULL, NULL),
(13, 2147483647, 0, 'Triolux', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'leather', 52, 52, 842, 672, '390.62', '566.40', 1, 0, NULL, NULL, NULL, NULL),
(14, 2147483647, 4, 'Statstock', 'Fatback spare ribs flank, capicola short ribs ham hock short loin filet mignon turducken pork chop. Meatloaf ham hock beef beef ribs swine drumstick shankle chuck cupim kevin. Kielbasa leberkas frankfurter pig shankle brisket. Ball tip meatball bacon, bresaola rump alcatra beef ribs hamburger shankle short ribs capicola doner tri-tip strip steak sausage.', 1, 'vinyl', 207, 605, 424, 862, '175.26', '254.13', 1, 0, NULL, NULL, NULL, NULL),
(15, 2147483647, 48, 'Geoair', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'polycarbonate', 423, 751, 867, 321, '137.90', '199.96', 0, 0, NULL, NULL, NULL, NULL),
(16, 397023195, 35, 'Ventofix', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'nylon', 140, 681, 68, 636, '91.16', '132.18', 1, 0, NULL, NULL, NULL, NULL),
(17, 2147483647, 37, 'Physlax', 'Fatback spare ribs flank, capicola short ribs ham hock short loin filet mignon turducken pork chop. Meatloaf ham hock beef beef ribs swine drumstick shankle chuck cupim kevin. Kielbasa leberkas frankfurter pig shankle brisket. Ball tip meatball bacon, bresaola rump alcatra beef ribs hamburger shankle short ribs capicola doner tri-tip strip steak sausage.', 1, 'leather', 713, 824, 552, 316, '345.28', '500.66', 0, 0, NULL, NULL, NULL, NULL),
(18, 2147483647, 36, 'Ranstrong', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'vinyl', 501, 477, 851, 801, '352.23', '510.73', 0, 1, '434.12', NULL, NULL, NULL),
(19, 738628985, 49, 'Zonein', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'polycarbonate', 244, 178, 65, 534, '281.53', '408.22', 0, 0, NULL, NULL, NULL, NULL),
(20, 2147483647, 43, 'Sumdex', 'Fatback spare ribs flank, capicola short ribs ham hock short loin filet mignon turducken pork chop. Meatloaf ham hock beef beef ribs swine drumstick shankle chuck cupim kevin. Kielbasa leberkas frankfurter pig shankle brisket. Ball tip meatball bacon, bresaola rump alcatra beef ribs hamburger shankle short ribs capicola doner tri-tip strip steak sausage.', 1, 'nylon', 649, 664, 203, 252, '96.21', '139.50', 1, 1, '118.58', NULL, NULL, NULL),
(21, 677660980, 37, 'Stannix', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'leather', 398, 118, 460, 808, '477.38', '692.20', 0, 0, NULL, NULL, NULL, NULL),
(22, 2147483647, 27, 'Zerfind', 'Brisket cow ground round turducken tri-tip, jowl leberkas hamburger frankfurter tail pig. Sirloin chicken t-bone, ham andouille porchetta spare ribs landjaeger prosciutto shank leberkas rump venison pork loin hamburger. Hamburger sirloin turkey beef doner drumstick sausage brisket jerky capicola, kevin shankle cow. Beef ribs drumstick meatloaf short ribs, bacon rump tri-tip ball tip jerky short loin boudin cow kevin strip steak shankle.', 1, 'vinyl', 248, 386, 283, 546, '266.01', '385.71', 0, 1, '327.86', NULL, NULL, NULL),
(23, 2147483647, 21, 'Konstrong', 'Fatback spare ribs flank, capicola short ribs ham hock short loin filet mignon turducken pork chop. Meatloaf ham hock beef beef ribs swine drumstick shankle chuck cupim kevin. Kielbasa leberkas frankfurter pig shankle brisket. Ball tip meatball bacon, bresaola rump alcatra beef ribs hamburger shankle short ribs capicola doner tri-tip strip steak sausage.', 1, 'polycarbonate', 515, 62, 130, 903, '268.51', '389.34', 0, 0, NULL, NULL, NULL, NULL),
(24, 2147483647, 10, 'Mattom', 'Turkey spare ribs doner sausage flank corned beef pig shank cow. Turducken jerky doner landjaeger pastrami bacon. Short ribs ham hock ball tip corned beef frankfurter, pastrami salami filet mignon', 1, 'nylon', 697, 544, 567, 391, '114.85', '166.53', 0, 0, NULL, NULL, NULL, NULL),
(25, 1550209697, 13, 'Trusttouch', 'Kielbasa pig fatback, t-bone sausage spare ribs rump biltong. Landjaeger beef ribs meatball shoulder venison jerky pig, prosciutto short ribs shankle filet mignon swine. Venison shank tenderloin pork belly meatloaf beef corned beef.', 1, 'leather', 413, 709, 294, 814, '466.59', '676.56', 0, 1, '575.07', NULL, NULL, NULL),
(26, 838450117, 0, 'Biotex', 'Fatback spare ribs flank, capicola short ribs ham hock short loin filet mignon turducken pork chop. Meatloaf ham hock beef beef ribs swine drumstick shankle chuck cupim kevin. Kielbasa leberkas frankfurter pig shankle brisket. Ball tip meatball bacon, bresaola rump alcatra beef ribs hamburger shankle short ribs capicola doner tri-tip strip steak sausage.', 1, 'vinyl', 150, 83, 83, 770, '271.70', '393.97', 1, 0, NULL, NULL, NULL, NULL),
(27, 2147483647, 25, 'Damfine', 'Kielbasa bresaola bacon t-bone corned beef ham landjaeger. Fatback spare ribs flank, capicola short ribs ham hock short loin filet mignon turducken pork chop. Meatloaf ham hock beef beef ribs swine drumstick shankle chuck cupim kevin. Kielbasa leberkas frankfurter pig shankle brisket. Ball tip meatball bacon, bresaola rump alcatra beef ribs hamburger shankle short ribs capicola doner tri-tip strip steak sausage.', 1, 'polycarbonate', 608, 103, 300, 994, '313.39', '454.42', 0, 0, NULL, NULL, NULL, NULL),
(28, 2147483647, 31, 'Rankcore', 'Ham hock doner tri-tip, venison turducken frankfurter shankle chuck filet mignon pork loin sirloin hamburger capicola. Tenderloin jowl tri-tip landjaeger corned beef. Pork belly shank boudin, t-bone strip steak ham hock short loin swine frankfurter ball tip landjaeger andouille.', 1, 'nylon', 966, 869, 603, 315, '359.90', '521.86', 0, 1, '443.58', NULL, NULL, NULL),
(29, 306255114, 0, 'Singflex', 'Tri-tip jowl tenderloin drumstick shank beef ribs jerky. Brisket sausage doner, tongue capicola strip steak cow short ribs hamburger pork landjaeger spare ribs shoulder ham hock. Ball tip ham hock tail pastrami shoulder.', 1, 'vinyl', 980, 201, 984, 892, '65.02', '94.28', 1, 0, NULL, NULL, NULL, NULL),
(30, 2147483647, 22, 'Stat-Dax', 'Turkey spare ribs doner sausage flank corned beef pig shank cow. Turducken jerky doner landjaeger pastrami bacon. Short ribs ham hock ball tip corned beef frankfurter, pastrami salami filet mignon', 1, 'vinyl', 677, 650, 364, 497, '220.06', '319.09', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productsbrands`
--

CREATE TABLE IF NOT EXISTS `productsbrands` (
  `id` int(11) NOT NULL DEFAULT '0',
  `productid` int(11) DEFAULT NULL,
  `brandid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productid` (`productid`),
  KEY `brandid` (`brandid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productsbrands`
--

INSERT INTO `productsbrands` (`id`, `productid`, `brandid`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 1),
(6, 6, 8),
(7, 7, 6),
(8, 8, 5),
(9, 9, 4),
(10, 10, 4),
(11, 11, 9),
(12, 12, 8),
(13, 13, 3),
(14, 14, 2),
(15, 15, 1),
(16, 16, 2),
(17, 17, 8),
(18, 18, 10),
(19, 19, 5),
(20, 20, 10),
(21, 21, 7),
(22, 22, 7),
(23, 23, 2),
(24, 24, 10),
(25, 25, 3),
(26, 26, 2),
(27, 27, 6),
(28, 28, 7),
(29, 29, 1),
(30, 30, 9);

-- --------------------------------------------------------

--
-- Table structure for table `productscategories`
--

CREATE TABLE IF NOT EXISTS `productscategories` (
  `id` int(11) NOT NULL DEFAULT '0',
  `productid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productid` (`productid`),
  KEY `categoryid` (`categoryid`),
  KEY `productid_2` (`productid`),
  KEY `categoryid_2` (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='map products to categories';

--
-- Dumping data for table `productscategories`
--

INSERT INTO `productscategories` (`id`, `productid`, `categoryid`) VALUES
(1, 1, 2),
(2, 2, 5),
(3, 3, 2),
(4, 4, 5),
(5, 5, 3),
(6, 6, 3),
(7, 7, 4),
(8, 8, 4),
(9, 9, 6),
(10, 10, 6),
(11, 11, 1),
(12, 12, 1),
(13, 13, 3),
(14, 14, 3),
(15, 15, 4),
(16, 16, 4),
(17, 17, 5),
(18, 18, 3),
(19, 19, 6),
(20, 20, 1),
(21, 21, 3),
(22, 22, 4),
(23, 23, 5),
(24, 24, 1),
(25, 25, 2),
(26, 26, 2),
(27, 27, 3),
(28, 28, 5),
(29, 29, 6),
(30, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productscolours`
--

CREATE TABLE IF NOT EXISTS `productscolours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colourid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='products and colours relationship' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(64) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `checkedout` tinyint(1) NOT NULL DEFAULT '0',
  `checkoutdate` datetime NOT NULL,
  `datecreated` datetime NOT NULL,
  `dateupdated` datetime NOT NULL,
  `notes` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='shopping cart data' AUTO_INCREMENT=27 ;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `userid`, `productid`, `quantity`, `checkedout`, `checkoutdate`, `datecreated`, `dateupdated`, `notes`) VALUES
(12, 'a868bccb927a4a5eda0df991846b30d7', 27, 1, 0, '0000-00-00 00:00:00', '2016-06-09 23:32:12', '0000-00-00 00:00:00', ''),
(13, 'a868bccb927a4a5eda0df991846b30d7', 7, 1, 0, '0000-00-00 00:00:00', '2016-06-10 00:02:17', '0000-00-00 00:00:00', ''),
(14, 'temp_b4c1e7f1d1244a0491ece0b630962a79', 26, 1, 0, '0000-00-00 00:00:00', '2016-06-10 00:07:23', '0000-00-00 00:00:00', ''),
(15, 'a868bccb927a4a5eda0df991846b30d7', 1, 1, 0, '0000-00-00 00:00:00', '2016-06-10 09:57:41', '0000-00-00 00:00:00', ''),
(16, 'a868bccb927a4a5eda0df991846b30d7', 26, 1, 0, '0000-00-00 00:00:00', '2016-06-10 12:21:07', '0000-00-00 00:00:00', ''),
(17, 'temp_12add7ebbc44c850d1886fad0a07dae8', 26, 1, 0, '0000-00-00 00:00:00', '2016-06-10 12:22:57', '0000-00-00 00:00:00', ''),
(18, 'temp_12add7ebbc44c850d1886fad0a07dae8', 8, 1, 0, '0000-00-00 00:00:00', '2016-06-10 12:23:00', '0000-00-00 00:00:00', ''),
(19, 'temp_12add7ebbc44c850d1886fad0a07dae8', 27, 1, 0, '0000-00-00 00:00:00', '2016-06-10 12:23:07', '0000-00-00 00:00:00', ''),
(20, 'temp_12add7ebbc44c850d1886fad0a07dae8', 15, 1, 0, '0000-00-00 00:00:00', '2016-06-10 12:23:11', '0000-00-00 00:00:00', ''),
(21, 'temp_12add7ebbc44c850d1886fad0a07dae8', 6, 1, 0, '0000-00-00 00:00:00', '2016-06-10 12:23:12', '0000-00-00 00:00:00', ''),
(22, 'temp_12add7ebbc44c850d1886fad0a07dae8', 2, 1, 0, '0000-00-00 00:00:00', '2016-06-10 12:23:14', '0000-00-00 00:00:00', ''),
(23, '2d1c4659e97049c5d4442cc6396e39be', 27, 1, 0, '0000-00-00 00:00:00', '2016-06-10 14:22:14', '0000-00-00 00:00:00', ''),
(24, '2d1c4659e97049c5d4442cc6396e39be', 8, 1, 0, '0000-00-00 00:00:00', '2016-06-10 14:22:42', '0000-00-00 00:00:00', ''),
(25, '2d1c4659e97049c5d4442cc6396e39be', 15, 1, 0, '0000-00-00 00:00:00', '2016-06-10 14:24:09', '0000-00-00 00:00:00', ''),
(26, '2d1c4659e97049c5d4442cc6396e39be', 6, 1, 0, '0000-00-00 00:00:00', '2016-06-10 14:24:14', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sitecontent`
--

CREATE TABLE IF NOT EXISTS `sitecontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `excerpt` varchar(512) NOT NULL,
  `content` text NOT NULL,
  `pageid` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `pageid` (`pageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sitecontent`
--

INSERT INTO `sitecontent` (`id`, `title`, `excerpt`, `content`, `pageid`, `published`) VALUES
(1, 'Welcom to Our Store', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. ', 2, 1),
(2, 'Our Policy', '', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siteinfo`
--

CREATE TABLE IF NOT EXISTS `siteinfo` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `property` varchar(16) NOT NULL,
  `value` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `siteinfo`
--

INSERT INTO `siteinfo` (`id`, `property`, `value`) VALUES
(1, 'sitename', 'Scarlet'),
(2, 'siteurl', 'https://minimalist-store-php-johannesmu.c9users.io/'),
(3, 'sitelogo', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `userid` varchar(32) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `reset_string` varchar(256) NOT NULL,
  `reset_time` datetime NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `streetnumber` varchar(6) NOT NULL,
  `streetname` varchar(64) NOT NULL,
  `streettype` varchar(16) NOT NULL,
  `locality` varchar(64) NOT NULL,
  `postcode` varchar(12) NOT NULL,
  `country` varchar(64) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `lastaccess` datetime NOT NULL,
  `lastactivity` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='user data' AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `password`, `admin`, `reset_string`, `reset_time`, `firstname`, `lastname`, `phone`, `streetnumber`, `streetname`, `streettype`, `locality`, `postcode`, `country`, `active`, `created`, `lastaccess`, `lastactivity`) VALUES
(22, '2d1c4659e97049c5d4442cc6396e39be', '', 'johannes.muljana@ait.nsw.edu.au', '$2y$10$A7K5slna7ww4OvFgA3VK6uTm/041mZFZ9bAlCnpPjZ/MqOZXqfxqG', 1, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-05-12 13:39:23', '2016-06-10 04:25:49', '2016-06-10 15:06:33'),
(23, '4797413966cf61a7f5c439ed7d433a43', '', 'jmuljana@gmail.com', '$2y$10$veyS6OI7fNZcTKJ2olx57u12lO1b49VKChlb./NOIDfYlfbolU7na', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-05-18 02:18:51', '2016-06-07 02:14:38', '2016-06-07 12:15:21'),
(24, 'ba9a129e328392c59c2917fde5be238e', '', 'jo@gmail.com', '$2y$10$P40W/myb/jkzh7xdDUiiZ.vGD1JeUauq9PgdHqWhBTMjvzF7Gp0Z2', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-05-27 01:13:04', '2016-06-04 09:48:26', '2016-06-04 19:51:08'),
(25, '6af9895c793e070b4151b3db70cea12d', '', 'testing@test.com', '$2y$10$HR3EI2H6s69PxqCDPpZro.UNWWqfcFDXb1IRiTkLUTwP3jswHYTV.', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-05-31 23:46:55', '2016-06-04 09:51:34', '2016-06-04 19:52:09'),
(26, '9956e6b377315916394501d576b9769b', '', 'dick@cock.com', '$2y$10$k6bGJFs8/HoNNHUHb/JJneoLwQHCSEkjWUXONIzSuXlIrzuzPi.FC', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-06-04 09:54:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '3877c24bbb20f9ffaabc51f8a5eaeb74', '', 'testuser@test.com', '$2y$10$z9INWYxQMPEWAbCx2Thy9ul/wYbaLKcqB2tFlGp5v2xcOZiZFsG4i', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-06-06 05:01:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'a868bccb927a4a5eda0df991846b30d7', '', 'cat@fish.com', '$2y$10$SPDgpm.fH/YWUkCrtrql8.0ACO6ZcJJ821RrgCMRibZb1G21/E4v.', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-06-06 06:50:22', '2016-06-10 02:22:01', '2016-06-10 12:22:28'),
(31, 'eda4639eacfd3cb295c12c7b4b428ee1', '', 'fish@cat.com', '$2y$10$xKujfaFXG8SKZNMC37LOReVJ0uUJLS/ixlVp4AsUfAno2uWptA5jq', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-06-06 06:52:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '7a11cdbbfd59fe93b9299740c7cafdd2', '', 'admin@ait.nsw.edu.au', '$2y$10$fza3gMeyov8f.LuGGk7XSurwJeeAgja2su9d23/nKTAzOkaOqilnm', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 1, '2016-06-07 02:02:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
