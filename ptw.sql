-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 12:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `ptw`
--
-- --------------------------------------------------------
--
-- Table structure for table `carts`
--
CREATE TABLE `carts` (
  `cartId` bigint(20) NOT NULL,
  `author` bigint(20) NOT NULL,
  `product` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `carts`
--
INSERT INTO `carts` (
    `cartId`,
    `author`,
    `product`,
    `total`,
    `updated_at`,
    `created_at`
  )
VALUES (
    4,
    9,
    'a:2:{i:0;a:2:{s:8:\"quantity\";s:1:\"1\";s:6:\"postId\";s:1:\"1\";}i:1;a:2:{s:8:\"quantity\";s:1:\"1\";s:6:\"postId\";s:1:\"2\";}}',
    250000,
    '2021-06-03 10:27:10',
    '2021-06-03 10:27:10'
  ),
  (
    5,
    9,
    'a:2:{i:0;a:2:{s:8:\"quantity\";s:1:\"2\";s:6:\"postId\";s:1:\"1\";}i:1;a:2:{s:8:\"quantity\";s:1:\"4\";s:6:\"postId\";s:1:\"2\";}}',
    800000,
    '2021-06-03 10:59:21',
    '2021-06-03 10:59:21'
  );
-- --------------------------------------------------------
--
-- Table structure for table `categories`
--
CREATE TABLE `categories` (
  `catId` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Dumping data for table `categories`
--
INSERT INTO `categories` (`catId`, `name`, `updated_at`, `created_at`)
VALUES (
    0,
    'Thực tập',
    '2021-05-22 06:39:20',
    '2021-05-22 06:39:20'
  ),
  (
    2,
    'Việc làm',
    '2021-05-22 06:39:38',
    '2021-05-22 06:39:38'
  );
-- --------------------------------------------------------
--
-- Table structure for table `events`
--
CREATE TABLE `events` (
  `eventId` bigint(20) NOT NULL,
  `imgSrc` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Dumping data for table `events`
--
INSERT INTO `events` (
    `eventId`,
    `imgSrc`,
    `body`,
    `updated_at`,
    `created_at`
  )
VALUES (
    1,
    'product/2021/05/22/owncloud.png',
    '<p>This is some sample content.</p><p>This is some sample content.</p><p>This is some sample content.</p><p>This is some sample content.</p><p>This is some sample content.</p><p>This is some sample content.</p><p>This is some sample content.</p><p>This is some sample content.</p>',
    '2021-05-22 10:50:39',
    '2021-05-22 10:50:39'
  ),
  (
    2,
    'product/2021/05/23/linux.jpg',
    '<p>This is some sample content.</p>',
    '2021-05-23 15:09:54',
    '2021-05-23 15:09:54'
  );
-- --------------------------------------------------------
--
-- Table structure for table `jobs`
--
CREATE TABLE `jobs` (
  `jobId` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `deadline` text NOT NULL,
  `location` text NOT NULL,
  `salary` text NOT NULL,
  `body` text NOT NULL,
  `author` bigint(20) NOT NULL,
  `category` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Dumping data for table `jobs`
--
INSERT INTO `jobs` (
    `jobId`,
    `title`,
    `deadline`,
    `location`,
    `salary`,
    `body`,
    `author`,
    `category`,
    `updated_at`,
    `created_at`
  )
VALUES (
    1,
    'DevOps Engineer (AWS/Cloud)',
    '1 month',
    '402 Nguyễn Thị Minh Khai, District 3, Ho Chi Minh',
    '3000$',
    '<p>As a DevOps Software Engineer, you will be involved from conception to completion with projects that are technologically sound and aesthetically impressive.</p><p>As a DevOps Software Engineer, you should be comfortable with backend technologies, frontend technologies, open-source technologies, and cloud services. You should also be a team player.</p><p>An ideal candidate is someone who enjoys working in a fast paced, collaborative environment. Someone that values the “team” and leverages the opinions and expertise of their teammates to deliver quality.</p><p><strong>Main Responsibilites:</strong></p><ul><li>Analyze current technology utilized within the company and develop steps and processes to improve and expand upon them.</li><li>Establish milestones for necessary contributions from departments and develop processes to facilitate their collaboration.</li><li>Work with Software Engineers to ensure that development follows established processes and works as intended</li><li>Mentor and train other engineers throughout the company and seek to continually improve processes companywide.</li><li>Work alongside project management teams to successfully monitor progress and implementation of initiatives.</li><li>Understanding the needs of stakeholders and conveying this to developers</li><li>Working on ways to automate and improve development and release processes</li></ul><p>&nbsp;</p><h2>Your Skills and Experience</h2><p>&nbsp;</p><ul><li>Experience developing engineering applications for a medium/large corporation.</li><li>Understanding of best practices regarding system security measures.</li><li>Working knowledge of various tools, open-source technologies, and cloud services.</li><li>Experience working together with teams from several departments to facilitate the orderly execution of a proposed project plan.</li><li>Professional work experience in team building and project organization.</li><li>Awareness of critical concepts in DevOps and Agile principles.</li></ul><p><strong>Other Skills:</strong></p><ul><li>Knowledge of programming languages.</li><li>Strong problem-solving skills.</li><li>Excellent organisational and time management skills, and the ability to work on multiple projects at the same time.</li></ul><p>&nbsp;</p><h2>Why You\'ll Love Working Here</h2><p>&nbsp;</p><ul><li>Competitive packages</li><li>Room to grow professionally, sponsorship for learning &amp; development of related skills</li><li>Opportunity to work on a mission that can transform the lives of millions of Vietnamese</li><li>Annual Performance Bonuses (up to 2 salary months per year)</li><li>Salary review 2 times/year</li><li>Parking fee &amp; Lunch allowance</li><li>Annual Health Checkup, Premium Health Care (Manager level), Accident Insurance for all members</li><li>Enjoy a variety of corporate events, from sports competitions, monthly birthday parties, quarterly team building to New Year party, &nbsp; company trip etc</li><li>Flat, open and fast-paced environment where every ideas are welcome.</li></ul>',
    11,
    2,
    '2021-05-29 06:57:42',
    '2021-05-29 06:57:42'
  ),
  (
    3,
    'test',
    '06/10/2021',
    'test',
    'test',
    '<p>This is some sample content.</p>',
    11,
    0,
    '2021-06-01 15:52:59',
    '2021-06-01 15:52:59'
  ),
  (
    4,
    'test kaito',
    '06/10/2021',
    'test kaito',
    'test kaito',
    '<p>This is some sample content.</p>',
    9,
    0,
    '2021-06-02 13:30:18',
    '2021-06-02 13:30:18'
  );
-- --------------------------------------------------------
--
-- Table structure for table `messages`
--
CREATE TABLE `messages` (
  `msgId` bigint(20) NOT NULL,
  `body` text NOT NULL,
  `fromUser` bigint(20) NOT NULL,
  `toUser` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Dumping data for table `messages`
--
INSERT INTO `messages` (
    `msgId`,
    `body`,
    `fromUser`,
    `toUser`,
    `updated_at`,
    `created_at`
  )
VALUES (
    6,
    '',
    11,
    6,
    '2021-05-31 14:10:40',
    '2021-05-31 14:10:40'
  ),
  (
    7,
    'a',
    11,
    6,
    '2021-05-31 14:13:54',
    '2021-05-31 14:13:54'
  ),
  (
    8,
    '',
    11,
    9,
    '2021-05-31 14:16:27',
    '2021-05-31 14:16:27'
  ),
  (
    9,
    '2',
    11,
    9,
    '2021-05-31 14:18:03',
    '2021-05-31 14:18:03'
  ),
  (
    10,
    '123',
    11,
    6,
    '2021-05-31 14:26:56',
    '2021-05-31 14:26:56'
  ),
  (
    11,
    'check',
    11,
    6,
    '2021-05-31 14:27:30',
    '2021-05-31 14:27:30'
  ),
  (
    12,
    'as',
    11,
    6,
    '2021-05-31 14:27:59',
    '2021-05-31 14:27:59'
  ),
  (
    13,
    '1',
    11,
    6,
    '2021-05-31 14:28:03',
    '2021-05-31 14:28:03'
  ),
  (
    14,
    'a',
    9,
    11,
    '2021-06-02 09:56:44',
    '2021-06-02 09:56:44'
  ),
  (
    15,
    'check',
    11,
    9,
    '2021-06-02 10:08:43',
    '2021-06-02 10:08:43'
  ),
  (
    16,
    'test',
    9,
    11,
    '2021-06-02 10:09:04',
    '2021-06-02 10:09:04'
  ),
  (
    17,
    'a',
    11,
    9,
    '2021-06-02 10:10:08',
    '2021-06-02 10:10:08'
  ),
  (
    18,
    '12',
    11,
    9,
    '2021-06-02 10:10:14',
    '2021-06-02 10:10:14'
  ),
  (
    19,
    'e',
    9,
    11,
    '2021-06-02 10:10:16',
    '2021-06-02 10:10:16'
  ),
  (
    21,
    'hello',
    9,
    11,
    '2021-06-02 10:11:05',
    '2021-06-02 10:11:05'
  ),
  (
    48,
    '',
    6,
    9,
    '2021-06-03 00:32:11',
    '2021-06-03 00:32:11'
  ),
  (
    49,
    '123',
    6,
    9,
    '2021-06-03 00:32:16',
    '2021-06-03 00:32:16'
  ),
  (
    50,
    'hello',
    9,
    6,
    '2021-06-03 00:32:26',
    '2021-06-03 00:32:26'
  );
-- --------------------------------------------------------
--
-- Table structure for table `posts`
--
CREATE TABLE `posts` (
  `postId` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imgSrc` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `author` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Dumping data for table `posts`
--
INSERT INTO `posts` (
    `postId`,
    `title`,
    `imgSrc`,
    `body`,
    `author`,
    `price`,
    `quantity`,
    `updated_at`,
    `created_at`
  )
VALUES (
    1,
    'The DevOps Handbook',
    'product/2021/05/29/original.jpeg',
    '<p>More than ever, the effective management of technology is critical for business competitiveness. For decades, technology leaders have struggled to balance agility, reliability, and security. The consequences of failure have never been greater-whether it\'s the healthcare.gov debacle, the Target cardholder data breach, or missing the boat with Big Data in the cloud. And yet, high performers using DevOps principles, such as Google, Amazon, Facebook, Etsy, and Netflix, are routinely deploying code into production hundreds, or even thousands, of times per day, while providing world-class agility, reliability, and security. In contrast, most organizations struggle to do releases every nine months. By studying over 14,000 IT professionals worldwide, the authors have observed that high-performing organizations are 2.5 times more likely than their peers to exceed profitability, market share, and productivity goals. The DevOps Handbook shows leaders how to replicate these incredible outcomes, describing what is required from all parts of the technology organization. Product Management, Development, Test, IT Operations, and Information Security working together can create the cultural norms and the technical practices necessary to maximize organizational learning, increase employee satisfaction, and win in the marketplace.</p>',
    11,
    100000,
    10,
    '2021-05-29 07:22:02',
    '2021-05-29 07:22:02'
  ),
  (
    2,
    'Effective DevOps',
    'product/2021/05/29/9781491926307.jpg',
    '<p>Some companies think that adopting devops means bringing in specialists or a host of new tools. With this practical guide, you\'ll learn why devops is a professional and cultural movement that calls for change from inside your organization. Authors Ryn Daniels and Jennifer Davis provide several approaches for improving collaboration within teams, creating affinity among teams, promoting efficient tool usage in your company, and scaling up what works throughout your organization\'s inflection points.<br><br>Devops stresses iterative efforts to break down information silos, monitor relationships, and repair misunderstandings that arise between and within teams in your organization. By applying the actionable strategies in this book, you can make sustainable changes in your environment regardless of your level within your organization.</p>',
    11,
    150000,
    12,
    '2021-05-29 07:22:58',
    '2021-05-29 07:22:58'
  );
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `userId` bigint(20) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgSrc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `work` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `users`
--
INSERT INTO `users` (
    `userId`,
    `username`,
    `password`,
    `permission`,
    `sex`,
    `summary`,
    `email`,
    `experience`,
    `imgSrc`,
    `education`,
    `work`,
    `token`,
    `updated_at`,
    `created_at`
  )
VALUES (
    6,
    'test',
    '098f6bcd4621d373cade4e832627b4f6',
    'user',
    '',
    NULL,
    NULL,
    NULL,
    NULL,
    '',
    '',
    NULL,
    '2021-05-20 14:41:13',
    '2021-05-20 14:41:13'
  ),
  (
    9,
    'kaito',
    '202cb962ac59075b964b07152d234b70',
    'user',
    '',
    '2',
    'kaito1477800@gmail.com',
    '1',
    NULL,
    'college',
    '5',
    '63ea08eb9c5e0facffe7c7adfd2af0ff',
    '2021-06-05 03:37:44',
    '2021-05-20 14:58:16'
  ),
  (
    10,
    'dd',
    '1aabac6d068eef6a7bad3fdf50a05cc8',
    'user',
    '',
    NULL,
    NULL,
    NULL,
    NULL,
    '',
    '',
    NULL,
    '2021-05-20 15:13:37',
    '2021-05-20 15:13:37'
  ),
  (
    11,
    'admin',
    '0192023a7bbd73250516f069df18b500',
    'user',
    '',
    'test',
    'test',
    'test',
    'product/2021/06/02/Untitled.png',
    'test3',
    'test123',
    NULL,
    '2021-05-22 14:56:02',
    '2021-05-22 14:56:02'
  );
--
-- Indexes for dumped tables
--
--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
ADD PRIMARY KEY (`cartId`),
  ADD KEY `fk_carts_author` (`author`);
--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
ADD PRIMARY KEY (`catId`);
--
-- Indexes for table `events`
--
ALTER TABLE `events`
ADD PRIMARY KEY (`eventId`);
--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
ADD PRIMARY KEY (`jobId`),
  ADD KEY `fk_jobs_author` (`author`),
  ADD KEY `fk_jobs_category` (`category`);
--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
ADD PRIMARY KEY (`msgId`),
  ADD KEY `fk_messages_fromUser` (`fromUser`),
  ADD KEY `fk_messages_toUser` (`toUser`);
--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
ADD PRIMARY KEY (`postId`),
  ADD KEY `fk_posts_author` (`author`);
--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`userId`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
MODIFY `cartId` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `catId` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `eventId` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `jobId` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `msgId` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 51;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `postId` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userId` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
ADD CONSTRAINT `fk_carts_author` FOREIGN KEY (`author`) REFERENCES `users` (`userId`);
--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
ADD CONSTRAINT `fk_jobs_author` FOREIGN KEY (`author`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `fk_jobs_category` FOREIGN KEY (`category`) REFERENCES `categories` (`catId`);
--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `fk_messages_fromUser` FOREIGN KEY (`fromUser`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `fk_messages_toUser` FOREIGN KEY (`toUser`) REFERENCES `users` (`userId`);
--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `fk_posts_author` FOREIGN KEY (`author`) REFERENCES `users` (`userId`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;