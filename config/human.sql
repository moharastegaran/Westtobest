-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 04:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `human`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(6) UNSIGNED NOT NULL,
  `user` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `post_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `reply` varchar(255) CHARACTER SET latin1 DEFAULT '0',
  `date_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user`, `description`, `post_id`, `reply`, `date_time`) VALUES
(3, 'mammad', 'trhtrh', '8', '0', '2021-09-02 23:55:36'),
(4, 'mammad', 'thtr', '8', '0', '2021-09-02 23:58:20'),
(5, 'unique_roseee', 'hthtrh', '29', '0', '2021-09-05 00:11:25'),
(6, 'unique_roseee', 'bbbthr', '29', '0', '2021-09-05 00:18:58'),
(7, 'unique_roseee', 'bfnf', '29', '0', '2021-09-05 00:20:50'),
(8, 'unique_roseee', 'bsbtf', '29', '0', '2021-09-05 00:21:30'),
(9, 'unique_roseee', 'ما برای رقص و آواز خواندن کار می کنیم. این ماشین بسیار مناسب برای جوانان است. لطفا به این خودرو را رأی دهید', '29', '0', '2021-09-05 00:34:34'),
(10, 'unique_roseee', 'ما برای رقص و آواز خواندن کار می کنیم. این ماشین بسیار مناسب برای جوانان است. لطفا به این خودرو را رأی دهید\nما برای رقص و آواز خواندن کار می کنیم. این ماشین بسیار مناسب برای جوانان است. لطفا به این خودرو را رأی دهید', '29', '0', '2021-09-05 00:35:03'),
(11, 'unique_roseee', 'دافی جون یه تکون', '29', '0', '2021-09-05 00:35:24'),
(14, 'unique_roseee', 'لق4ثقث😍😍😍😍 لافقاقا ق🙈', '34', '0', '2021-09-05 11:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_1` varchar(255) NOT NULL,
  `user_2` varchar(255) NOT NULL,
  `acc` varchar(15) DEFAULT '0',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `user_1`, `user_2`, `acc`, `requested_at`, `updated_at`) VALUES
(6, 'mammad', 'unique_rose', '1', '2021-09-02 16:49:35', '2021-09-02 16:49:35'),
(7, 'unique_rose', 'mammad', '1', '2021-09-02 16:49:54', '2021-09-02 16:49:54'),
(8, 'unique_rosee', 'unique_rose', '0', '2021-09-04 23:05:11', '2021-09-04 23:05:11'),
(9, 'unique_rosee', 'unique_roseee', '0', '2021-09-04 23:05:38', '2021-09-04 23:05:38'),
(10, 'unique_roseee', 'unique_rose', '1', '2021-09-05 13:26:55', '2021-09-05 13:28:54'),
(11, 'unique_rose', 'unique_roseee', '1', '2021-09-05 13:28:54', '2021-09-05 13:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `id` int(6) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_post`
--

INSERT INTO `like_post` (`id`, `user`, `post_id`) VALUES
(1, 'mammad', '8');

-- --------------------------------------------------------

--
-- Table structure for table `notfic`
--

CREATE TABLE `notfic` (
  `id` int(6) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `for_user` varchar(255) NOT NULL,
  `acc` varchar(255) NOT NULL DEFAULT '1',
  `notfic` varchar(255) NOT NULL,
  `pro` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notfic`
--

INSERT INTO `notfic` (`id`, `user`, `for_user`, `acc`, `notfic`, `pro`, `created_at`) VALUES
(3, 'unique_rose', 'admin', '0', '1', '', '2021-09-02 16:43:25'),
(4, 'unique_rose', 'admin', '1', '3', '6', '2021-09-02 16:43:25'),
(5, 'unique_rose', 'admin', '1', '2', '6', '2021-09-02 16:43:25'),
(12, 'mammad', 'unique_rose', '0', '2', '8', '2021-09-02 21:55:36'),
(13, 'mammad', 'unique_rose', '0', '3', '8', '2021-09-02 21:58:15'),
(14, 'mammad', 'unique_rose', '0', '2', '8', '2021-09-02 21:58:20'),
(15, 'unique_rosee', 'unique_rose', '0', '1', '', '2021-09-04 20:35:11'),
(16, 'unique_rosee', 'unique_roseee', '0', '1', '', '2021-09-04 20:35:38'),
(17, 'unique_roseee', 'unique_rose', '0', '1', '', '2021-09-05 10:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `pm_chat`
--

CREATE TABLE `pm_chat` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_2` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pm` varchar(1500) CHARACTER SET utf8 NOT NULL,
  `voice` varchar(255) CHARACTER SET latin1 NOT NULL,
  `imag` varchar(255) CHARACTER SET latin1 NOT NULL,
  `video` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pm_chat`
--

INSERT INTO `pm_chat` (`id`, `user_1`, `user_2`, `pm`, `voice`, `imag`, `video`) VALUES
(1, 'admin', 'unique_rose', 'سلام وقت بخیر خوبین ؟\n', '', '', ''),
(2, 'unique_rose', 'admin', 'مچکر شما خوبین ؟', '', '', ''),
(3, 'admin', 'unique_rose', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد', '', '', ''),
(4, 'admin', 'unique_rose', 'gfnnnnnnnn', '', '', ''),
(5, 'unique_rose', 'admin', 'بله مچکر خوبم', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(6) UNSIGNED NOT NULL,
  `user` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cover` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` varchar(1500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `access` varchar(25) CHARACTER SET latin1 DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user`, `cover`, `description`, `access`, `created_at`, `updated_at`) VALUES
(6, 'admin', '6453Capture1.PNG', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذش', '0', '2021-09-01 09:57:35', '2021-09-01 09:57:35'),
(7, 'unique_rose', '9230Capture1.PNG', 'میخوام ببینم مممد لایک میکنه ؟!', '0', '2021-09-02 21:20:28', '2021-09-02 21:20:28'),
(8, 'unique_rose', '289320210101_133926.jpg', 'چهه لاک خوشگلی دالم مبالکم باد', '0', '2021-09-03 01:32:45', '2021-09-03 01:32:45'),
(31, 'unique_roseee', '7246IMG_20200926_205922.jpg', 'ماشاالله ماشالله ابرو ها رو ببین\r\nلنگه نداره\r\nچشمارو ببین که اوووه\r\nآرایش نکردش عالیه ولی وقتی ی خط چشم میکشم چی میشممم\r\nدماغمم که نچرال خوشگل لنگه نداره\r\nجووون چه هیکلی دارم \r\nهزار ماشالله هر چی میپوشم بهم میاد\r\nاون ساق پا رو که میریزم بیرون\r\nاون پابندوکه میبندم خودم کیف میکنم\r\nتیپ اسپرت که میزنم تو دل برویی میشم\r\nلباس شب که میپوشم با کفشای نقره ای پاشنه بلندم همینطوری میدرخشم\r\nچیشد دلت خواست؟! 😍😍😍', '0', '2021-09-05 00:42:44', '2021-09-05 03:12:44'),
(32, 'unique_roseee', '', '😂😂😂😂test mikonam ', '0', '2021-09-05 08:40:40', '2021-09-05 11:10:40'),
(33, 'unique_roseee', '', '😂😂😂😂test mikonam ', '0', '2021-09-05 08:41:37', '2021-09-05 11:11:37'),
(34, 'unique_roseee', '', '😂😂😂😂test mikonam ', '0', '2021-09-05 08:42:00', '2021-09-05 11:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `birthday` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `mail` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sickness` varchar(255) CHARACTER SET latin1 NOT NULL,
  `bio` varchar(255) CHARACTER SET latin1 NOT NULL,
  `header_img` varchar(255) CHARACTER SET latin1 NOT NULL,
  `avatar` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `gender` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 NOT NULL,
  `lng` varchar(255) COLLATE utf8_bin NOT NULL,
  `lat` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `birthday`, `username`, `mail`, `password`, `sickness`, `bio`, `header_img`, `avatar`, `gender`, `country`, `city`, `lng`, `lat`, `created_at`) VALUES
(1, 'Mohammad reza Rastegaran', '1998-07-29', 'admin', 'moha@g.com', '$2y$10$4f0LVAR72CLQH5LIkRnyruECr5Z.oMC2VXc1HsBPC7qlMlRkka0VO', 'Deaf', '', '63137jeremy-bishop-G9i_plbfDgk-unsplash.jpg', '47604photo_2021-08-14_09-32-371.jpg', 'male', 'Portugal', 'Ourém', ' -8.58307', '39.65434', '2021-09-03 10:43:46'),
(2, 'Kimia Afshari', '1998-07-20', 'unique_rose', 'kimia.af1998@gmail.com', '$2y$10$07En6obdpmpQNUBLpXHHzOcYnOP8Tv6DvvuwPgA5CXlHn6XHkm0A6', '', '', '', '40729185849800_206661751094767_3278220431082618484_n.jpg', 'female', 'Iran', 'Tehran', '', '', '2021-09-03 10:43:46'),
(3, 'ممد', '2012-03-02', 'mammad', 'moha@g1.com', '$2y$10$kQhEN45ZdF2sCu6Np.8i8.oS1LZSgFjg8RWUSQb.pLaCkCT5MTxUC', '', '', '', NULL, NULL, '', '', '', '', '2021-09-03 10:43:46'),
(4, 'Mohammad reza', '2017-03-01', 'kajal', 'moha1212@g.com', '$2y$10$SPGocZPa2ZBlaIrmdBEROO5YndRLc6EPml/v4jXqpq7avW7O2K9ju', '', '', '', NULL, '', 'Iran', 'Tehran', '', '', '2021-09-03 10:43:46'),
(5, 'Miss Alta Spinka IV', '1995-01-23', 'Rita85', 'jSpinka@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(6, 'Cristopher Ruecker', '2006-02-17', 'Elisha33', 'eBergnaum@Ritchie.biz', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo3.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(7, 'Dr. Robb McKenzie DVM', '2001-03-01', 'Anika.Strosin', 'Deangelo.Huels@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(8, 'Mrs. Mafalda Wolf III', '2020-03-10', 'Evert84', 'Parisian.Tillman@Bartell.org', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(9, 'Mckenna Halvorson', '2005-05-08', 'Marvin.Rosetta', 'rMaggio@Labadie.net', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(10, 'Prof. Gunner Moore DVM', '2012-02-20', 'nBartell', 'Cornell.Huel@Thiel.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo4.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(11, 'Clifford Dickinson', '2000-12-22', 'Dorothy.Lakin', 'Dakota.Willms@Corwin.net', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo4.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(12, 'Rudy Greenfelder', '1976-10-03', 'Bernhard24', 'Neal14@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(13, 'Marilie Zulauf', '1991-04-09', 'Orion.Quitzon', 'Weissnat.Alta@Kunze.org', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(14, 'Mr. Jaden Jacobson', '1980-09-06', 'dSchumm', 'vRodriguez@Swaniawski.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo6.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(15, 'Bulah Oberbrunner II', '1979-09-24', 'bParker', 'Ferry.Matteo@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(16, 'Prof. Muhammad Pacocha', '2006-03-25', 'sSchmeler', 'zKovacek@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(17, 'Evert Collier', '2007-12-29', 'Queenie.Cruickshank', 'jKuhn@Hayes.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo4.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(18, 'Cathryn Stark', '2012-05-10', 'Isaiah80', 'Cruz.Hansen@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(19, 'Margret Romaguera', '1981-03-21', 'yWhite', 'gBins@Wilkinson.net', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(20, 'Humberto Stanton', '1977-12-04', 'Auer.Emmet', 'Schmitt.Dedric@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo7.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(21, 'Heath Barrows DVM', '2011-06-27', 'Larson.Ulises', 'Skyla.Jaskolski@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(22, 'Harrison Corwin', '1974-02-28', 'Patience.Anderson', 'Helmer.Cruickshank@Weimann.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo7.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(23, 'Mrs. Albertha Heidenreich DVM', '2009-08-16', 'Therese.Yost', 'Aiyana18@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(24, 'Rosella Mann', '1989-01-17', 'Collins.Ed', 'Torrance54@Abernathy.net', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(25, 'Newell Harris', '1973-06-12', 'lDAmore', 'zSchuster@Blanda.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(26, 'Quinten Watsica', '1988-03-10', 'Cristian06', 'zTerry@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(27, 'Nayeli Mertz', '2010-08-17', 'qFunk', 'Karina81@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(28, 'Mr. Micah Sipes V', '1988-10-11', 'Zack.Hoppe', 'Antwon42@Kub.org', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo10.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(29, 'Lynn Gerhold', '1975-10-06', 'Jayda70', 'Gibson.Deron@Mills.net', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(30, 'Anderson Hauck DVM', '1994-05-07', 'Viva73', 'Adam86@Ankunding.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(31, 'Randal Muller', '2003-07-07', 'Joanie.Hills', 'rFriesen@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(32, 'Logan Osinski Jr.', '1986-04-26', 'Callie26', 'Cleveland.Langosh@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(33, 'Prof. Modesto Christiansen I', '1998-06-14', 'Tillman.Mabelle', 'Jessica50@Gorczany.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(34, 'Sammy Sporer', '2000-01-11', 'Quigley.Matilda', 'Theodore.Breitenberg@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(35, 'Kylee Swaniawski', '1972-04-02', 'Abigail.Kerluke', 'Mosciski.Retha@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(36, 'Prof. Bennie Rolfson', '2018-02-04', 'Bogisich.Salvatore', 'Charlene41@Quitzon.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(37, 'Dr. Ella Lynch IV', '2012-09-29', 'nPredovic', 'Jaylan06@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(38, 'Hailie Schimmel', '1977-01-14', 'pTremblay', 'cFriesen@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(39, 'Mr. Jamison Bogisich III', '1988-11-27', 'Orin.Daniel', 'Leanna14@Kshlerin.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(40, 'Dr. Ruth Botsford', '1991-10-27', 'Natasha97', 'Hans46@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo7.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(41, 'Kathryn Cronin', '2000-04-30', 'Gerhold.Elmore', 'dPfannerstill@Haag.org', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(42, 'Dariana Lemke', '2010-09-25', 'oOlson', 'Lorenzo81@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(43, 'Destini O\'Reilly DVM', '1994-02-07', 'nSchmitt', 'gLowe@Murphy.net', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(44, 'Wava Bradtke', '2006-09-29', 'Kenyatta.Leuschke', 'Paucek.Robin@Hermiston.biz', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo3.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(45, 'Chanel Willms', '1979-06-18', 'Monserrat96', 'Stone18@Okuneva.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo7.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(46, 'Alysa Schmitt', '1972-06-27', 'rLind', 'Karine07@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(47, 'Prof. Zion Lehner', '2018-01-04', 'Doyle.Wolf', 'Yoshiko97@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(48, 'Lennie Kassulke', '1982-06-11', 'Daphney54', 'Sandy.Wolf@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo6.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(49, 'Elvis Mitchell', '2008-01-17', 'Sean82', 'Douglas.Bergstrom@Johnston.info', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(50, 'Dr. Austen Emard', '2000-04-12', 'Corkery.Eloy', 'fMills@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(51, 'Mrs. Ally Quigley', '1974-08-21', 'Jennie68', 'Naomi.Lubowitz@Eichmann.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(52, 'Andreanne Rempel', '1984-02-02', 'Flatley.Enrique', 'Katelynn05@Schultz.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(53, 'Godfrey Reynolds', '2012-06-11', 'Eliezer.Ortiz', 'Auer.Johanna@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(54, 'Michaela Roob', '1991-10-04', 'OReilly.Jarvis', 'aKeebler@Macejkovic.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo10.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(55, 'Justine Kuvalis', '1974-05-14', 'Glover.Brielle', 'Kariane.Streich@Davis.info', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo4.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(56, 'Wendy Crooks', '2009-06-06', 'Mckenzie.Williamson', 'Emerson.Graham@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(57, 'Mr. Dean Stehr', '2018-09-17', 'xAbshire', 'fWitting@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(58, 'Margarete Mohr', '2004-05-01', 'uHintz', 'Misty.Tromp@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo6.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(59, 'Lenore Mitchell', '2014-08-06', 'Hershel92', 'Lang.Annabel@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo6.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(60, 'Kimberly Mertz', '2004-04-13', 'Karlee14', 'Doyle.Muhammad@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(61, 'Prof. Elton Kertzmann', '2014-02-25', 'xHalvorson', 'Lenny.Hackett@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(62, 'Prof. Cassandre Kulas', '2009-08-25', 'Elva09', 'Buck27@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(63, 'Hank Veum', '2014-12-05', 'Daisy.Lockman', 'Kassulke.Andrew@Baumbach.info', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(64, 'Dr. Jamar Monahan IV', '2000-01-09', 'Malachi28', 'aGrant@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(65, 'Cooper Rodriguez', '2021-05-24', 'Janie.Pfeffer', 'Pacocha.Zion@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(66, 'Marcelina Huels', '1979-01-06', 'Rolfson.Kolby', 'Bartell.Zella@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo4.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(67, 'Darlene Osinski', '2020-02-19', 'Rahul26', 'Felix.Purdy@Kirlin.biz', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo7.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(68, 'Nellie Ondricka', '1975-02-17', 'Rowe.Carissa', 'Schuster.Tamia@Hills.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(69, 'Bradford Williamson', '1991-02-02', 'Janiya33', 'Griffin.Shields@Gaylord.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(70, 'German McClure', '1973-08-08', 'Harvey.Clemens', 'xJacobson@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(71, 'Dorothy Miller', '2013-05-19', 'Zboncak.Myra', 'Grady.Raoul@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(72, 'Gilda Feil', '1994-04-20', 'Hanna.Mraz', 'Brad.DAmore@Abernathy.org', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(73, 'Tyrese Zulauf', '1975-01-04', 'tBatz', 'Josefina.Blanda@Rippin.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(74, 'Colby Cummerata', '2005-11-01', 'Kuphal.Charity', 'Gaston28@Lakin.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(75, 'Alexandra Russel', '1998-05-20', 'oStehr', 'dPredovic@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(76, 'Nasir Bergnaum', '2015-09-18', 'Tess67', 'tCrona@Gutkowski.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo10.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(77, 'Johanna Kuhn', '1979-06-25', 'Jefferey12', 'Blanda.Chelsey@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo6.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(78, 'Agnes Kassulke', '1985-05-31', 'Kristopher.Maggio', 'Virginie42@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(79, 'Nellie Batz', '1972-10-23', 'qOKeefe', 'Antone.VonRueden@Hartmann.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(80, 'Lucile O\'Reilly', '2001-09-06', 'bDoyle', 'tFay@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo10.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(81, 'Clarissa Gislason Jr.', '1994-07-21', 'Gregg18', 'Charley.Skiles@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo5.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(82, 'Alena Stracke DDS', '2002-12-06', 'Fahey.Coralie', 'zSchoen@Graham.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(83, 'Ada Corkery', '1977-06-08', 'lJohns', 'OKon.Camryn@Kassulke.org', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo4.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(84, 'Ms. Heidi Hoppe IV', '1996-05-18', 'Maryse71', 'oReinger@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(85, 'Tavares Wiza', '1992-11-03', 'Alda57', 'Tillman.Theresa@Dibbert.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo7.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(86, 'Mr. Sheldon Hane Jr.', '1980-04-09', 'Xzavier.Gusikowski', 'Marta98@Green.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(87, 'Stevie Wunsch', '2000-01-04', 'Hazel90', 'Brian19@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(88, 'Miss Twila Pollich Sr.', '1994-11-10', 'Keaton17', 'wRyan@DAmore.info', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(89, 'Jamar Spinka', '1976-08-02', 'Marlene03', 'Marjorie.Konopelski@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo6.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(90, 'Valerie Lind', '1978-07-25', 'Jaycee.Russel', 'xEffertz@Miller.info', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(91, 'Mrs. Maybelle Fay', '2020-11-22', 'cMcLaughlin', 'Andre22@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(92, 'Coby Beier', '1973-05-27', 'Danyka.Hirthe', 'Orn.Rocio@Kuhn.net', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Cancer', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(93, 'Iva Prohaska', '1980-02-05', 'kThompson', 'Sebastian89@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'short', 'this is my bio', '', 'photo1.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(94, 'Astrid Marvin', '2009-10-08', 'Laurel33', 'Hodkiewicz.Ramona@Beatty.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo4.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(95, 'Katherine Beahan', '1991-12-21', 'Libby.Parker', 'Larue11@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo6.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(96, 'Larry Gottlieb', '1995-01-30', 'Hamill.Lucio', 'Bernice54@Schumm.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo9.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(97, 'Everardo Bergstrom', '1992-05-09', 'Gideon36', 'Macejkovic.Gerardo@Considine.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo6.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(98, 'Darryl Blick', '1992-01-10', 'iDoyle', 'Luis33@yahoo.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo8.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(99, 'Rick Morar', '2010-08-22', 'bKoepp', 'Roxanne62@Armstrong.org', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo7.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(100, 'Rosa Moore', '1978-09-20', 'Karen71', 'Janis67@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(101, 'Prof. Claudie Marks', '1992-05-07', 'Daugherty.Stanford', 'Kulas.Santina@Hirthe.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo10.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(102, 'Prof. Elvis Bartell II', '1972-02-07', 'jBecker', 'Schumm.Asia@Hauck.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Deaf', 'this is my bio', '', 'photo0.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(103, 'Marley Boyer', '2004-06-24', 'Margaretta17', 'Torp.Marilie@hotmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'physical_disability', 'this is my bio', '', 'photo4.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(104, 'Jordan Terry', '2011-07-29', 'Agustina98', 'Alta.Price@Raynor.info', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'Trans', 'this is my bio', '', 'photo2.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(105, 'Silas Harber', '1973-07-11', 'Judson.Kovacek', 'Moriah.Muller@gmail.com', '$2a$12$fL1RGfcU6IWOlRlDE1eoVOUci8YmnUca8UQZ5Vks/I2pDFiC1pFja', 'AIDS', 'this is my bio', '', 'photo3.jpg', NULL, '', '', '', '', '2021-09-03 14:02:00'),
(106, 'greg', '2016-02-03', 'unique_rosee', 'moha@gaa.com', '$2y$10$MNfcKATEYqvW684DbsareuxrYJPxRemBx8Dkg282.CR5I5tf7aAay', '', '', '', NULL, NULL, '', '', '', '', '2021-09-04 19:36:49'),
(107, 'grtg4gh', '2017-03-01', 'unique_roseee', 'moha@gaaaa.com', '$2y$10$aZQg.DjeqR5xxSXj4OGkOOSPr8M07dYxy4pEh4pkJRL5i0BYY4HGy', '', '', '', NULL, NULL, '', '', '', '', '2021-09-04 19:39:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notfic`
--
ALTER TABLE `notfic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm_chat`
--
ALTER TABLE `pm_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `like_post`
--
ALTER TABLE `like_post`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notfic`
--
ALTER TABLE `notfic`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pm_chat`
--
ALTER TABLE `pm_chat`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
