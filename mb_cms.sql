-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 03:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mb_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_increment_sequence`
--

CREATE TABLE `auto_increment_sequence` (
  `next_not_cached_value` bigint(21) NOT NULL,
  `minimum_value` bigint(21) NOT NULL,
  `maximum_value` bigint(21) NOT NULL,
  `start_value` bigint(21) NOT NULL COMMENT 'start value when sequences is created or value if RESTART is used',
  `increment` bigint(21) NOT NULL COMMENT 'increment value',
  `cache_size` bigint(21) UNSIGNED NOT NULL,
  `cycle_option` tinyint(1) UNSIGNED NOT NULL COMMENT '0 if no cycles are allowed, 1 if the sequence should begin a new cycle when maximum_value is passed',
  `cycle_count` bigint(21) NOT NULL COMMENT 'How many cycles have been done'
) ENGINE=InnoDB;

--
-- Dumping data for table `auto_increment_sequence`
--

INSERT INTO `auto_increment_sequence` (`next_not_cached_value`, `minimum_value`, `maximum_value`, `start_value`, `increment`, `cache_size`, `cycle_option`, `cycle_count`) VALUES
(1, 1, 9223372036854775806, 1, 1, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_slug` varchar(255) DEFAULT NULL,
  `blog_file` varchar(255) DEFAULT NULL,
  `blog_must` int(11) DEFAULT NULL,
  `blog_content` text NOT NULL,
  `blog_status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `blog_file`, `blog_must`, `blog_content`, `blog_status`, `created_at`, `updated_at`) VALUES
(1, 'Blog Title 01', 'blog-slug-01', '6537d6d30127d_.png', 0, '<p>Blog_01 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '1', '2023-10-24 07:40:42', '2023-10-26 11:24:26'),
(2, 'Blog Title 02', 'blog-slug-02', '6537d6d30127d_.png', 1, '<p>Blog_02 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '0', '2023-10-24 07:40:42', '2023-10-26 11:24:33'),
(3, 'Blog Title 03', 'blog-slug-03', '6537d6d30127d_.png', 2, '<p>Blog_03 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '0', '2023-10-24 07:40:42', '2023-10-26 11:24:46'),
(4, 'Blog Title 04', 'blog-slug-04', '6537d6d30127d_.png', 3, '<p>Blog_04 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '1', '2023-10-24 07:40:42', '2023-10-26 11:24:55'),
(5, 'Blog Title 05', 'blog-slug-05', '6537d6d30127d_.png', 4, '<p>Blog_05 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '0', '2023-10-24 07:40:42', '2023-10-26 11:25:01'),
(6, 'Blog Title 06', 'blog-slug-06', '6537d6d30127d_.png', 5, '<p>Blog_06 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '1', '2023-10-24 07:40:42', '2023-10-26 11:25:06');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL DEFAULT 'admin.tester@gmail.com',
  `from` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Readed/Not Readed Yet',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `full_name`, `to`, `from`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lacy Williamson', 'admin.tester@gmail.com', 'jabufyxy@mailinator.com', '+1 (684) 275-1704', 'Commodi commodi expe', 'Doloribus fugit dolor est qui in qui dolor ipsum et necessitatibus error minima cupidatat sed dolore ea ut unde consequatur', 0, '2023-10-30 07:31:44', '2023-10-30 08:35:38'),
(2, 'Judah Morin', 'admin.tester@gmail.com', 'miqaro@mailinator.com', '+1 (166) 578-5321', 'Sequi eum ad vel nob', 'Cupiditate possimus sunt sed distinctio Dolor similique consequat Dolore quas eos facere qui culpa at porro ea', 0, '2023-10-30 07:32:04', '2023-10-30 07:32:04'),
(3, 'Carolyn Holcomb', 'admin.tester@gmail.com', 'wiwihahida@mailinator.com', '+1 (352) 793-9174', 'Amet distinctio Lo', 'Dolor culpa sit sint mollit', 0, '2023-10-30 07:34:25', '2023-10-30 07:34:25'),
(4, 'Nevada Mccarty', 'admin.tester@gmail.com', 'lezefypyg@mailinator.com', '+1 (496) 373-6238', 'Elit cumque velit', 'Consequuntur provident culpa sit voluptas quo dicta laborum Dignissimos ut', 0, '2023-10-30 07:34:53', '2023-10-30 10:52:19'),
(5, 'Guy Ramsey', 'admin.tester@gmail.com', 'mykiligeqy@mailinator.com', '+1 (101) 227-1862', 'Magnam recusandae C', 'Magni maiores illum aut voluptas est libero exercitation temporibus doloremque exercitationem omnis iusto soluta dicta ut necessitatibus', 0, '2023-10-30 07:35:04', '2023-10-31 10:44:44'),
(6, 'Ariel Kim', 'admin.tester@gmail.com', 'pulebelizi@mailinator.com', '+1 (294) 967-6661', 'Et sit sint nostrud', 'Atque ex nihil molestiae laborum rem in autem aliquid eius pariatur Exercitation fugiat magnam exercitationem velit asperiores incidunt accusantium et', 1, '2023-10-30 07:35:12', '2023-10-30 10:52:15'),
(7, 'Zorita Ross', 'admin.tester@gmail.com', 'jybokuxete@mailinator.com', '+1 (942) 694-4341', 'Ut quaerat cillum se', 'Odit aut dolor est dicta consequatur accusamus suscipit aliquip lorem', 1, '2023-10-30 07:35:20', '2023-10-30 10:52:13'),
(15, 'Lucas Conrad', 'admin.tester@gmail.com', 'xumixyku@mailinator.com', '+1 (315) 639-1931', 'Amet recusandae In', 'Error laudantium quidem modi incididunt cum', 1, '2023-10-30 13:45:13', '2023-10-30 13:45:13'),
(16, 'Sybil Petersen', 'admin.tester@gmail.com', 'qysun@mailinator.com', '+1 (114) 785-2477', 'Qui quis fugit sit', 'Dignissimos ad fugiat vel ratione in ut laboris aut doloremque laborum ullam quam ipsum nulla sint ad', 1, '2023-10-30 13:48:42', '2023-10-30 13:48:42'),
(17, 'India West', 'admin.tester@gmail.com', 'mixalytybo@mailinator.com', '+1 (581) 943-2476', 'Laudantium eum et s', 'Aliquid consequatur Hic ipsa aliqua Rem consequuntur adipisicing sed totam velit voluptatem', 1, '2023-10-31 13:23:13', '2023-10-31 13:23:13');

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
(44, '2014_10_12_000000_create_users_table', 1),
(45, '2014_10_12_100000_create_password_resets_table', 1),
(46, '2019_08_19_000000_create_failed_jobs_table', 1),
(47, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(48, '2023_10_19_145235_create_settings_table', 1),
(49, '2023_10_23_145057_create_blogs_table', 2),
(50, '2023_10_25_070010_create_pages_table', 3),
(51, '2023_10_25_090211_create_sliders_table', 4),
(54, '2023_10_30_064345_create_messages_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_file` varchar(255) DEFAULT NULL,
  `page_must` int(11) NOT NULL DEFAULT 8,
  `page_content` text NOT NULL,
  `page_status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_file`, `page_must`, `page_content`, `page_status`, `created_at`, `updated_at`) VALUES
(1, 'Page Title 01', 'Page Slug 01', '6537d6d30127d_.png', 0, '<p>Page_01 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '1', '2023-10-25 07:09:22', '2023-10-28 03:33:54'),
(2, 'Page Title 02', 'Page Slug 02', '6537d6d30127d_.png', 1, '<p>Page_02 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '0', '2023-10-25 07:09:22', '2023-10-28 03:33:54'),
(3, 'Page Title 03', 'Page Slug 03', '6537d6d30127d_.png', 2, '<p>Page_03 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '0', '2023-10-25 07:09:22', '2023-10-28 03:33:54'),
(4, 'Page Title 04', 'Page Slug 04', '6537d6d30127d_.png', 3, '<p>Page_04 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '1', '2023-10-25 07:09:22', '2023-10-28 03:33:54'),
(5, 'Page Title 05', 'Page Slug 05', '6537d6d30127d_.png', 4, '<p>Page_05 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '0', '2023-10-25 07:09:22', '2023-10-28 03:33:54'),
(6, 'Page Title 06', 'Page Slug 06', '6537d6d30127d_.png', 5, '<p>Page_06 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '1', '2023-10-25 07:09:22', '2023-10-28 03:33:54'),
(7, 'Page Title 07', 'Page Slug 07', '6537d6d30127d_.png', 6, '<p>Page_07 A Content Management System (CMS) is a tool for easily managing the content of a website, allowing users to create and update articles, images, and other online elements. On the other hand, a Customer Relationship Management (CRM) system is focused on managing customer relationships, helping businesses track sales, customer support, and improve interaction with clients. These two systems can collaborate to enhance the customer experience by using website content to generate leads and manage customer relationships efficiently.</p>', '1', '2023-10-25 07:09:22', '2023-10-28 03:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `settings_description` varchar(255) NOT NULL,
  `settings_key` varchar(255) NOT NULL,
  `settings_value` text NOT NULL,
  `settings_type` varchar(255) NOT NULL,
  `settings_must` int(11) NOT NULL,
  `settings_delete` enum('0','1') NOT NULL,
  `settings_status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `settings_description`, `settings_key`, `settings_value`, `settings_type`, `settings_must`, `settings_delete`, `settings_status`, `created_at`, `updated_at`) VALUES
(1, 'Title', 'title', 'Laravel CMS Learning', 'text', 1, '1', '1', '2023-10-23 08:36:43', '2023-10-24 05:01:34'),
(2, 'Description', 'description', 'Laravel Learning Description', 'textarea', 0, '1', '1', '2023-10-23 08:36:43', '2023-10-24 05:01:34'),
(3, 'Logo', 'logo', '653916d4eb478_3.png', 'file', 2, '1', '1', '2023-10-23 08:36:43', '2023-10-25 10:23:33'),
(4, 'Icon', 'icon', '653916e09f675_4.png', 'file', 3, '1', '1', '2023-10-23 08:36:43', '2023-10-25 10:23:44'),
(5, 'Keywords', 'keywords', 'laravel,cms,crm,mb', 'text', 4, '1', '1', '2023-10-23 08:36:43', '2023-10-23 08:36:43'),
(6, 'Fix Phone', 'fix_phone', '0566 000 000 0223', 'text', 5, '1', '1', '2023-10-23 08:36:43', '2023-10-23 08:36:43'),
(7, 'Phone GSM', 'phone_gsm', '0544 000 000 0223', 'text', 6, '1', '1', '2023-10-23 08:36:43', '2023-10-23 08:36:43'),
(8, 'Mail', 'mail', 'bane.moussa@mbcms.com', 'text', 7, '1', '1', '2023-10-23 08:36:43', '2023-10-23 08:36:43'),
(9, 'Neighborhood', 'neighborhood', 'Kadikoy-Hasapasa', 'text', 8, '1', '1', '2023-10-23 08:36:43', '2023-10-23 07:08:54'),
(10, 'City', 'city', 'Istanbul', 'text', 9, '1', '1', '2023-10-23 08:36:43', '2023-10-23 07:15:15'),
(11, 'Adress', 'address', '<p>Kadikoy Hasanpasa Cad:2 Mah:3 Istanbul/Turkiye</p>', 'ckeditor', 10, '1', '1', '2023-10-23 08:36:43', '2023-10-23 07:17:11'),
(12, 'Footer', 'footer', 'The Best Way To Manage Your Application Content', 'text', 11, '1', '1', '2023-10-23 08:36:43', '2023-10-23 07:17:11'),
(13, 'Home Title', 'home_title', 'Modern Business Features', 'text', 12, '1', '1', '2023-10-23 08:36:43', '2023-10-23 07:17:11'),
(14, 'Home Detail', 'home_detail', '<p><p>The Modern Business template by Start Bootstrap includes:</p>\r\n                <ul>\r\n                    <li>\r\n                        <strong>Bootstrap v4</strong>\r\n                    </li>\r\n                    <li>jQuery</li>\r\n                    <li>Font Awesome</li>\r\n                    <li>Working contact form with validation</li>\r\n                    <li>Unstyled page elements for easy customization</li>\r\n                </ul>\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id\r\n                    reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia\r\n                    dolorum ducimus unde.</p></p>', 'ckeditor', 13, '1', '1', '2023-10-23 08:36:43', '2023-10-23 07:17:11'),
(15, 'Home Image', 'home_image', '653cb5fc921e9_15.png', 'file', 14, '1', '1', '2023-10-23 08:36:43', '2023-10-28 04:19:24'),
(16, 'Home Slogan', 'home_slogan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum\r\n                    deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.', 'textarea', 15, '1', '1', '2023-10-23 08:36:43', '2023-10-24 05:01:34'),
(17, 'Work Times', 'work_times', 'Monday - Friday: 9:00 AM to 5:00 PM', 'text', 16, '1', '1', '2023-10-23 08:36:43', '2023-10-23 08:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_slug` varchar(255) DEFAULT NULL,
  `slider_url` varchar(255) NOT NULL DEFAULT 'https://www/mb_cms_training_project.com',
  `slider_file` varchar(255) DEFAULT NULL,
  `slider_must` int(11) NOT NULL,
  `slider_content` text NOT NULL,
  `slider_status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_slug`, `slider_url`, `slider_file`, `slider_must`, `slider_content`, `slider_status`, `created_at`, `updated_at`) VALUES
(1, 'slider Title 01', 'slider Slug 01', 'https://www/mb_cms_training_project.com', '1900x1080.png', 0, 'slider Content 01', '1', '2023-10-25 09:21:20', '2023-10-25 06:49:18'),
(2, 'slider Title 02', 'slider Slug 02', 'https://www/mb_cms_training_project.com', '1900x1081.png', 1, 'slider Content 02', '0', '2023-10-25 09:21:20', '2023-10-25 06:49:18'),
(3, 'slider Title 03', 'slider Slug 03', 'https://www/mb_cms_training_project.com', '1900x1082.png', 2, 'slider Content 03', '0', '2023-10-25 09:21:20', '2023-10-25 06:49:01'),
(4, 'slider Title 04', 'slider Slug 04', 'https://www/mb_cms_training_project.com', '1900x1083.png', 3, 'slider Content 04', '1', '2023-10-25 09:21:20', '2023-10-25 06:49:01'),
(5, 'slider Title 05', 'slider Slug 05', 'https://www/mb_cms_training_project.com', '1900x1084.png', 4, 'slider Content 05', '0', '2023-10-25 09:21:20', '2023-10-25 06:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `user_file` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `user_must` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_file`, `role`, `user_must`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Tester', 'admin.tester@gmail.com', '2023-10-25 09:57:42', '$2y$10$JLeZAbOmnFGTKCX..q8mQuB4nBy67igoCtpUEkxA6F7C7p09qdVdC', '653a4f016b8b1_.jpeg', 'admin', 0, 'UbCrcur2pQlhUuEIIBPEJ0u9FxhDOycX2GgKBJdxMOavmq6QtJqVlzh7hp8w', '2023-10-25 09:57:42', '2023-10-26 08:35:29'),
(2, 'Noelani New', 'jeka@mailinator.com', '2023-10-25 09:57:42', '$2y$10$YPEGDXMUs6Qo.4L/p4lhtuVmyhaQc6Y3.QBNPXaTScbZuBGX2NYpa', '653a4f016b8b1_.jpeg', 'user', 1, '', '2023-10-25 09:57:42', '2023-10-25 09:56:57'),
(4, 'Leandra Patrice', 'sutebyrem@mailinator.com', '2023-10-25 10:02:48', '$2y$10$Rz5D58efVgW3jjGJ3L1YtOfCDI.w59Qu65BiVCFNltSyIXmElPzXu', '653a4f016b8b1_.jpeg', 'user', 2, NULL, '2023-10-25 10:02:48', '2023-10-25 10:03:28'),
(5, 'BIRAMA BANE', 'birama.bane@gmail.com', '2023-10-25 11:25:41', '$2y$10$1PoFCtzGO7ppGw/PbG5MWuV6rLp.MnQ7s0Bm5Su/iNtjOXaJpKxaW', '653a4f016b8b1_.jpeg', 'user', 3, NULL, '2023-10-25 11:25:41', NULL),
(6, 'Mufutau Cain', 'tuvit@mailinator.com', '2023-10-25 11:28:49', '$2y$10$fMx9lcZBQblJIE45Z2E1FOCPCbuh6ZJ.l9moFOu2WcjZYmdFNTVAy', '653a4f016b8b1_.jpeg', 'user', 4, NULL, '2023-10-25 11:28:49', NULL),
(7, 'Bert Lloyd', 'redusotiw@mailinator.com', NULL, '$2y$10$BI9.TpvzW5pL6b8gVfsXHOTiQ6Xjs7IkOH0vfWWjqycpzXn.merMq', '653a4f016b8b1_.jpeg', 'user', 5, NULL, '2023-10-25 11:32:48', '2023-10-25 11:32:48'),
(8, 'User Tester', 'user.test@gmail.com', '2023-10-26 10:09:42', '$2y$10$uaQV4KssaSp0ROgu2GuvX.Qyg7wJOdh4/XQO0Jwp6Vq6s6GRVY5Om', '653a4f016b8b1_.jpeg', 'user', 6, 'nuG1zPvAs7agA66qRHPwxjLAetOJs4QbDhbxUpeQPnrIMBRkmVYiMLEF3vVH', '2023-10-26 07:09:42', '2023-10-26 07:09:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
