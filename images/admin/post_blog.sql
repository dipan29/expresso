-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2017 at 06:31 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i3649700_wp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_blog`
--

CREATE TABLE `post_blog` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `tagline` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` varchar(2) DEFAULT NULL COMMENT 'Y/N',
  `view` varchar(2) DEFAULT NULL COMMENT 'P/R'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_blog`
--

INSERT INTO `post_blog` (`id`, `name`, `email`, `subject`, `content`, `tagline`, `type`, `date`, `published`, `view`) VALUES
(1, 'Dipan Roy', 'dipanroy12@gmail.com', 'Random Post', 'Test Content', 'Content', 'story', '2017-06-22 04:14:58', 'Y', 'P'),
(2, 'Leoni Schueler', 'leoni_sch@sch.com', 'Time', 'Time knows no mercy\r\nOur life is like an antique hourglass,\r\nFilled with three handful of fine sand,\r\nOne for our youth, one for our adulthood, one for our old age,\r\nWe do not know, who filled in this sand,\r\nMaybe dwarf’s hands or giant’s hands,\r\nAll we know is, that the sand of our life will fall inexorable down,\r\nFrom life to death,\r\nAnd we hurry through our life, without knowing, when the last grain of sand will fall.', 'Time knows no mercy', 'story', '2017-06-22 05:02:54', 'Y', 'P'),
(3, 'Dipan Roy', 'dipanroy12@gmail.com', 'Timepass', 'Time passes faster and faster, but with every project I always want to find the next challenge and the next challenge is just as exciting as the previous one.\r\n\r\nThere&#039;s much to be said for feeling numb. Time passes more quickly. You eat less, and because numbness encourages laziness, you do fewer things, good or bad, and the world&#039;s probably a better place for it.', 'Time Pass', 'Quote', '2017-06-22 05:17:16', 'Y', 'P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_blog`
--
ALTER TABLE `post_blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_blog`
--
ALTER TABLE `post_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
