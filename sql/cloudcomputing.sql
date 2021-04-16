-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 05:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudcomputing`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Art Trivia'),
(2, 'Space Trivia'),
(3, 'Geographical Trivia'),
(4, 'Historical Trivia');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_name`, `user_email`, `subject`, `message`) VALUES
(37, 'sonam', 'sonam@gmail.com', 'Regardinggettinginformationoflatestposts.', 'Regardinggettinginformationoflatestposts.');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` int(4) NOT NULL,
  `category_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `category_id`) VALUES
(1, 'The day on which the Sun’s direct rays cross the celestial equator is called:', 'The Ecliptic', 'The Aphelion', 'The Equinox', 'The Solstice', 3, 2),
(2, 'Which planet do the moons Oberon and Titania belong to?', 'Jupiter', 'Uranus', 'Venus', 'Earth', 2, 2),
(3, 'Who invented the telescope?', 'Hans Lippershey', 'Hypatia', 'Galileo', 'Johannes Kepler', 1, 2),
(4, 'Which of these objects is the farthest from the Sun?', 'Kuiper Belt', 'Neptune', 'Saturn', '90377 Sedna', 4, 2),
(5, 'What term describes the alignment of three celestial bodies?', 'suzeranity', 'syzgy', 'symbology', 'sizzle', 2, 2),
(6, 'What is the smallest planet in the solar system by mass?', 'Mars', 'Jupiter', 'Mercury', 'Earth', 3, 2),
(7, 'What is the visible part of the Sun called?', 'The Lithosphere', 'The Photosphere', 'The Atmosphere', 'The Stratosphere', 2, 2),
(8, 'What makes a planet a dwarf planet?', 'Size and shape', 'distance from the Sun', 'Color', 'Smell', 1, 2),
(9, 'How many times larger is the radius of the Sun than that of the Earth?', '4.8', '1,025', '10', '109', 4, 2),
(10, 'What two motions do all planets have?', 'Rock and Roll', 'Wiggle and Wobble', 'Twist and Shout', 'Orbit and Spin\r\n', 4, 2),
(11, 'The famous painter Vincent van Gogh belonged to which country?', 'Spain', 'The Netherlands', 'Italy', 'France', 2, 1),
(12, '‘Madhubani’ a style of folk paintings, is popular in which of the following states in India?', 'Bihar', 'Madhya Pradesh', 'West Bengal', 'Rajasthan', 1, 1),
(13, 'Pablo Picasso belonged to which country?', 'France', 'Germany', 'Spain\r\n', 'Italy', 3, 1),
(14, ' Ikebana is Japanese art of :\r\n\r\n', 'Paper craft\r\n', 'Dress designing\r\n', 'Miniature tree farming\r\n', 'Flower arrangement', 4, 1),
(15, 'Who is the voice behind the audio book \"Wings of Fire\" written by former President APJ Abdul Kalam?', 'Om Puri', 'Amitabh Bachchan\r\n', 'Girish Karnad\r\n', 'Harish Bhimani', 3, 1),
(16, 'The technique of mural painting executed upon freshly laid lime plaster is known as -', 'Fresco', 'Gouache\r\n', 'Tempera\r\n', 'Cubism', 1, 1),
(17, 'The song Ekla Chalo Re (Walk alone) was written by ?', 'Subhash Chandra Bose\r\n', 'Ishwar Chandra Vidyasagar\r\n', 'Rabindra Nath Tagore\r\n', 'Aurobindo Ghosh\r\n', 3, 1),
(18, 'Who is credited as the designer of the many statues which decorated the Parthenon?', 'Hesiod', 'Praxiteles', 'Phidias', 'Scopas', 3, 1),
(19, 'What artist was struck in the face with a mallet by an envious rival, disfiguring him for life?', 'Titian', 'Rembrandt', 'Michelangelo', 'Raphael', 3, 1),
(20, 'How many paintings did Vincent Van Gogh sell during his lifetime?', '842', '27', '1', '193', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `email`) VALUES
(31, 'madhu', '$2y$10$XigMPdEyaQMWPj2vAIJWNeleG.EACK1UewpaqXUW6LdP8pZAqu1L6', 'madhu@gmail.com'),
(32, 'sonam', '$2y$10$q8toOmdiIg0HY7WqM9SgJeZVWt7UbwCQiQma6atKA8YZK66XzRCaG', 'sonam@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
