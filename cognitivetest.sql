-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 01:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cognitivetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `expected_score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `details`, `expected_score`, `created_at`, `updated_at`) VALUES
(2, 'Software Development Engineer', 'Responsible for designing, coding, and testing software applications. \r\nCollaborates with cross-functional teams to ensure project requirements are met and provides technical support throughout the software development lifecycle. \r\nProficiency in programming languages such as Java, Python, and C++ is required.', 85, '2024-07-29 16:35:25', '2024-07-29 16:35:25'),
(3, 'Marketing Coordinator', 'Manages marketing campaigns, coordinates events, and assists with social media strategies to enhance brand visibility. \r\nWorks closely with the marketing team to create content, analyze campaign performance, and optimize marketing efforts. \r\nStrong communication and organizational skills are essential.', 78, '2024-07-29 16:37:39', '2024-07-29 16:37:39'),
(4, 'Data Analyst', 'Analyzes and interprets complex data sets to provide actionable insights. Develops reports, visualizations, and dashboards to support business decision-making. Proficiency in statistical tools and software like SQL, Excel, and Tableau is required.', 82, '2024-07-29 16:45:22', '2024-07-29 16:45:22'),
(6, 'Customer Support Specialist', 'Provides assistance to customers by addressing inquiries, resolving issues, and offering product information. Utilizes customer service tools and platforms to manage cases efficiently and ensure a high level of customer satisfaction.', 76, '2024-07-29 16:51:54', '2024-07-29 16:51:54'),
(7, 'Project Manager', 'Oversees project planning, execution, and delivery within scope, budget, and timeline. Coordinates with stakeholders, manages resources, and mitigates risks to ensure successful project completion. Experience with project management software is beneficial.', 88, '2024-07-29 17:00:04', '2024-07-29 17:00:04'),
(8, 'Human Resources Coordinator', 'Supports HR activities including recruitment, employee onboarding, and benefits administration. Assists with employee relations and compliance with labor laws. Strong interpersonal skills and knowledge of HR systems are necessary.', 80, '2024-07-29 17:01:34', '2024-07-29 17:01:34'),
(9, 'Graphic Designer', 'Creates visual content for marketing materials, websites, and social media platforms. Utilizes design software such as Adobe Creative Suite to develop high-quality graphics that align with brand guidelines.', 83, '2024-07-29 17:02:28', '2024-07-29 17:02:28'),
(10, 'Financial Analyst', 'Evaluates financial data to assist in budgeting, forecasting, and investment decisions. Prepares financial reports, performs risk assessments, and provides strategic recommendations to improve financial performance.', 87, '2024-07-29 17:02:48', '2024-07-29 17:02:48'),
(11, 'Sales Manager', 'Leads and motivates the sales team to achieve revenue targets. Develops sales strategies, manages client relationships, and analyzes market trends to drive business growth. Strong leadership and negotiation skills are required.', 84, '2024-07-29 17:03:09', '2024-07-29 17:03:09'),
(12, 'IT Support Specialist', 'Provides technical assistance and support for computer systems, software, and hardware. Troubleshoots issues, performs system maintenance, and ensures network security. Knowledge of IT systems and problem-solving skills are crucial.', 79, '2024-07-29 17:03:33', '2024-07-29 17:03:33'),
(13, 'Content Writer', 'Produces engaging and informative content for blogs, websites, and social media. Researches topics, writes and edits copy, and ensures content aligns with the company\'s voice and goals.', 55, '2024-07-29 17:03:54', '2024-07-29 17:03:54'),
(14, 'Operations Manager', 'Manages daily operations to ensure efficient and effective business processes. Oversees staff, coordinates logistics, and implements improvements to enhance productivity and operational performance.', 86, '2024-07-29 17:04:22', '2024-07-29 17:04:22'),
(15, 'Web Developer', 'Designs and develops websites and web applications. Works with HTML, CSS, JavaScript, and other web technologies to create responsive and user-friendly interfaces. Experience with backend development is a plus.', 84, '2024-07-29 17:04:47', '2024-07-29 17:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_07_29_000100_create_users_table', 1),
(4, '2024_07_29_000200_create_tests_table', 1),
(5, '2024_07_29_000300_create_questions_table', 1),
(6, '2024_07_29_000400_create_results_table', 1),
(7, '2024_07_29_000500_create_jobs_table', 1),
(8, '2024_07_29_000700_create_failed_jobs_table', 1),
(9, '2024_07_29_000800_create_password_reset_tokens_table', 1),
(10, '2024_07_29_000000_create_roles_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(2048) NOT NULL,
  `option_b` varchar(2048) NOT NULL,
  `option_c` varchar(2048) NOT NULL,
  `option_d` varchar(2048) NOT NULL,
  `option_e` varchar(2048) DEFAULT NULL,
  `correct_answer` varchar(2048) NOT NULL,
  `question_image` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `question_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'If two trains leave the station at the same time, one traveling north at 60 km/h and the other traveling east at 80 km/h, how far apart will they be after 2 hours?', '100 km', '140 km', '160 km', '200 km', '220 km', 'C', NULL, '2024-07-29 19:41:35', '2024-07-29 19:41:35'),
(2, 1, 'A company needs to distribute 120 units of a product equally among 5 stores. After distribution, each store finds that it has 10 more units than it was initially supposed to get. How many units were originally planned for each store?', '20', '22', '24', '26', '30', 'B', NULL, '2024-07-29 19:47:04', '2024-07-29 19:47:04'),
(3, 1, 'You have a 3-liter jug and a 5-liter jug. How can you measure exactly 4 liters of water using these two jugs?', 'Fill the 5-liter jug, pour water into the 3-liter jug until it is full, then empty the 3-liter jug and pour the remaining water from the 5-liter jug into it. Fill the 5-liter jug again and pour water into the 3-liter jug until it is full. The remaining water in the 5-liter jug will be 4 liters.', 'Fill the 3-liter jug and pour it into the 5-liter jug twice.', 'Fill the 5-liter jug and pour it into the 3-liter jug until the 3-liter jug is full, then empty the 3-liter jug and pour the remaining water from the 5-liter jug into it. Fill the 5-liter jug again and pour it into the 3-liter jug until the 3-liter jug is full.', 'Fill the 5-liter jug completely and pour out exactly 1 liter.', 'Use the 3-liter jug to measure out exactly 4 liters in one step.', 'A', NULL, '2024-07-29 19:51:30', '2024-07-29 19:51:30'),
(4, 1, 'You are given a list of numbers: 5, 7, 10, 12, 15, 17. If the first number is 5, and each subsequent number in the list is the sum of the previous two numbers, which number should come next in the sequence?', '19', '22', '24', '27', '30', 'D', NULL, '2024-07-29 19:53:40', '2024-07-29 19:53:40'),
(5, 1, 'A factory produces widgets at a rate of 100 widgets per hour. If the production rate is increased by 20% every hour, how many widgets will be produced in the first 3 hours?', '100 + 120 + 144', '100 + 120 + 144 + 172', '100 + 120 + 144 + 172 + 207', '100 + 120 + 144 + 172 + 206', '100 + 120 + 144 + 172 + 207 + 248', 'A', NULL, '2024-07-29 19:56:25', '2024-07-29 19:56:25'),
(6, 2, 'A group of 8 friends went out for dinner and the total bill was $256. If the bill is to be split equally among them, how much does each person need to pay?', '$32', '$30', '$28', '$25', '$20', 'A', NULL, '2024-07-29 20:10:38', '2024-07-29 20:10:38'),
(7, 2, 'If a train travels at a speed of 80 km/h, how long will it take to cover a distance of 200 km?', '2 hours', '2.5 hours', '3 hours', '4 hours', '5 hours', 'C', NULL, '2024-07-29 20:12:35', '2024-07-29 20:12:35'),
(8, 2, 'In a code, A=1, B=2, C=3, ..., Z=26. What is the code for the word \"HELP\"?', '8-5-12-16', '7-4-11-15', '8-12-12-16', '9-5-13-17', '7-12-14-15', 'A', NULL, '2024-07-29 20:14:34', '2024-07-29 20:14:34'),
(9, 2, 'A basket contains 5 red balls and 7 green balls. What is the probability of randomly drawing a red ball from the basket?', '5/12', '7/12', '5/7', '7/5', '1/2', 'A', NULL, '2024-07-29 20:15:26', '2024-07-29 20:15:26'),
(10, 2, 'A man is 4 times as old as his son. In 10 years, he will be twice as old as his son. How old is the son now?', '10 years', '15 years', '20 years', '25 years', '30 years', 'B', NULL, '2024-07-29 20:17:02', '2024-07-29 20:17:02'),
(11, 2, 'In a sequence where each number is twice the previous number, if the first number is 3, what is the 5th number in the sequence?', '24', '48', '96', '192', '384', 'B', NULL, '2024-07-29 20:17:47', '2024-07-29 20:17:47'),
(12, 2, 'If 3 pencils and 2 erasers cost $8, and 2 pencils and 3 erasers cost $7, what is the cost of one pencil and one eraser?', '$2', '$3', '$4', '$5', '$6', 'B', NULL, '2024-07-29 20:19:16', '2024-07-29 20:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `test_attempts` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `test_id`, `score`, `test_attempts`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 100, 2, '2024-07-30 10:05:55', '2024-07-30 10:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2024-07-29 15:56:56', '2024-07-29 15:56:56'),
(2, 'Candidate', '2024-07-29 15:56:56', '2024-07-29 15:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'TiAXCBeRXRjtlAaFJH7LD95ED', 2, '2024-07-29 17:51:07', '2024-07-29 20:04:06'),
(2, 'X9ed0CUSnj8QLtpcBxZiuy1ox', 3, '2024-07-29 17:59:18', '2024-07-29 20:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'techdozie', 'Administrator', 'psunday2000@gmail.com', NULL, '$2y$12$S50NNP1APQi.COQ6wtKPLOAHaWAnurhf/azz4l4DO6VUOI0XQypnm', 1, NULL, '2024-07-29 15:39:41', '2024-07-30 10:15:04'),
(2, 'nwachi', 'Praise Chiedozie Sunday', 'nwachienterprise@gmail.com', NULL, '$2y$12$l0Sk6XWkW/MpqF/QHwNjM..shtRl7Sjd4NZnd49cB2nyTw2545s/m', 2, NULL, '2024-07-29 20:41:32', '2024-07-29 20:41:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_test_id_foreign` (`test_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `results_user_id_unique` (`user_id`),
  ADD KEY `results_test_id_foreign` (`test_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
