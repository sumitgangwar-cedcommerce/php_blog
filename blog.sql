-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Aug 17, 2022 at 05:46 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `POST`
--

CREATE TABLE `POST` (
  `post_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` enum('PUBLIC','PRIVATE') DEFAULT NULL,
  `content` text,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `blog_title` varchar(100) DEFAULT NULL,
  `status_by_admin` enum('Approved','Pending','Rejected') DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `POST`
--

INSERT INTO `POST` (`post_id`, `user_id`, `name`, `status`, `content`, `image`, `published_at`, `blog_title`, `status_by_admin`, `edited_at`) VALUES
(31, 18, NULL, 'PUBLIC', 'Love and Lemons has been created by Jeanine Donofrio and her husband, Jack Mathews (“#1 taste-tester”). The blog’s name comes from the fact that Jeanine loves seasonal food, often finished off with a squeeze of lemon.\r\n\r\nMost of the recipes on the site are vegetarian.\r\n\r\nThe blog was founded in 2011 and has been recognized by prestigious food magazines like Food & Wine, Food52, Refinery29, SELF Magazine, and Oprah Magazine. It was named Readers’ Choice Best Cooking Blog by Saveur Magazine in 2014 and won a Saveur Editor’s Choice award in 2016.\r\n\r\nIf you are looking for a recipe, you can filter your search by season, holiday, special diet, meal type, or ingredient. Surprisingly there are only six recipes under the ingredient, lemon.\r\n\r\n', 'upload/blog1.png', '2022-08-16 09:47:48', 'Love and Lemons', 'Approved', NULL),
(32, 18, NULL, 'PUBLIC', 'It is one of the most popular blogs among technology. Founded by Michael Arrington, it stands out for many reasons, but one of them is undoubtedly its ability to generate lots of updated content. TechCrunch publishes an average of 5 articles daily in each of its ten news categories. It follows the actuality to the second one and its publications are very dynamic.\r\n\r\nIt uses an extremely colloquial but very attractive language. So much that at the end of December he published a post titled WTF is Brexit?\r\n\r\nTechCrunch bets on two-way communication. He always encourages the collaboration of his followers and does not give him trouble to ask for help to improve the information it offers.\r\n\r\nThe team members show an image of young 30s, crazy and funny but who know what they are talking about ... And so this is how they congratulate the New Year.', 'upload/techcrunch-logo-1.png', '2022-08-16 09:53:29', 'TechCrunch ', 'Approved', NULL),
(33, 18, NULL, 'PUBLIC', 'The last few years have created a perfect storm of digitization and trust. Within the new Web3 partnership and ecosystem models coming to life now, powered by creator economy/token economy concepts, the full hope (promise) of the internet is on the horizon. Delivered in a digitally native experience (for or with a generation that won’t accept anything less), the future of enterprise blockchain has accelerated and evolved.\r\n\r\nThe blockchain market as we know it has matured to where we are seeing real adoption from enterprises, governments and financial institutions. Public chain technology has also become more resilient and scalable, and now with layer 2 solutions making them more useable, there is increasing experimentation and adoption in DeFi and for Web3 applications overall.\r\n\r\nA hybrid enterprise blockchain solution can help organizations realize new business outcomes such as:', 'upload/download.jpeg', '2022-08-16 09:55:12', 'BlockChain', 'Approved', NULL),
(34, 19, NULL, 'PUBLIC', 'React is one of the most wide-spread UI libraries for web app development. It is simple, efficient, and has an extensive structure of components and support libraries. It is precisely this complexity that makes learning React particularly daunting to learn. Because of this, finding the right educational materials will make all the difference.', 'upload/react-logo@3x.svg', '2022-08-16 10:08:09', 'React Js Library', 'Approved', NULL),
(35, 19, NULL, 'PUBLIC', '\r\nIf you know Copyblogger, you know that we believe in writers.\r\n\r\nWhich is why we always look forward to the results from the “Ten Best Blogs for Writers” each year — a contest currently being produced by the blog Write to Done.\r\n\r\nIf you want to become a better writer yourself, it’s smart to study writers with strong voices, to learn about the craft of writing, and to spend time with others who share your obsession.\r\n\r\nYou can do all of that and more by checking out this year’s winners.\r\n\r\nCongratulations to all the winners, but we’d like to give a special shout-out to our own Copyblogger guest writer Jeff Goins.', 'upload/Short-Story-Blogs.jpg', '2022-08-16 10:19:52', 'Terrific Creative Writing', 'Approved', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date_of_joining` datetime DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `name`, `email`, `contact`, `tagline`, `password`, `date_of_joining`, `image`, `user_name`, `role`) VALUES
(1, 'admin', 'admin@abc', '0000', '', '1234', NULL, '', '', 'admin'),
(18, 'Sumit Gangwar', 'sumit@abc', '6395379367', 'Demo tag line', '1234', '2022-08-16 09:45:39', 'upload/mupic.jpg', NULL, 'user'),
(19, 'Kushal Tiwari', 'kushal@abc', '1111111111', 'A person', '1234', '2022-08-16 10:05:46', 'upload/chess.jpg', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `POST`
--
ALTER TABLE `POST`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `POST`
--
ALTER TABLE `POST`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `POST`
--
ALTER TABLE `POST`
  ADD CONSTRAINT `POST_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
