-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2016 at 12:43 AM
-- Server version: 10.1.17-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ryada_lara`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `created_at`, `updated_at`, `name`, `slug`) VALUES
(2, NULL, '2016-06-23 09:08:32', 'أخبار الشركة', 'cate'),
(6, '2016-06-23 09:09:18', '2016-06-23 09:09:18', 'مقالات تقنية', 'mk-l-t-tkny'),
(7, '2016-06-23 09:09:38', '2016-06-23 09:09:38', 'مقالات تعليمية', 'mk-l-t-taalymy'),
(8, '2016-06-25 00:17:55', '2016-06-25 00:17:55', 'bnm', 'bnm');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `on_post` int(10) unsigned NOT NULL DEFAULT '0',
  `from_user` int(10) unsigned NOT NULL DEFAULT '0',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_on_post_foreign` (`on_post`),
  KEY `comments_from_user_foreign` (`from_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `content` text NOT NULL,
  `photo` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `content`, `photo`) VALUES
(1, 'icdl', 'dsd', '1466667344_music-player.png'),
(2, 'ic3', '', '1466672193_olxeg_4639846_2_94x72.jpg'),
(4, 'فتوشوب', 'ثثثثققق', '1466672456_1069988_472202322975212_8644669546066337252_n.jpg'),
(5, 'تسويق الكترونى', '', '1466672619_1069988_472202322975212_8644669546066337252_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_profile`
--

CREATE TABLE IF NOT EXISTS `course_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `course_profile`
--

INSERT INTO `course_profile` (`id`, `profile_id`, `course_id`) VALUES
(2, 2, 2),
(4, 3, 1),
(5, 3, 2),
(6, 2, 1),
(7, 1, 1),
(8, 1, 2),
(9, 4, 1),
(10, 4, 2),
(11, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `title`, `url`, `order`, `created_at`, `updated_at`) VALUES
(11, 0, 'الرئيسية', '/', 1, '2016-06-22 04:00:52', '0000-00-00 00:00:00'),
(18, 0, 'عن الشركة', 'http://ryada4it.com/page/aan-lshrk', 3, '2016-06-22 04:00:34', '0000-00-00 00:00:00'),
(23, 0, 'آخر الأخبار', 'http://ryada4it.com/cat/cate', 3, '2016-06-23 09:06:56', '0000-00-00 00:00:00'),
(25, 0, 'أتصل بنا', 'http://ryada4it.com/contact', 6, '2016-06-23 09:34:55', '0000-00-00 00:00:00'),
(26, 0, 'مقالات', 'external', 4, '2016-06-23 09:11:33', '0000-00-00 00:00:00'),
(27, 26, 'مقالات تعليمية', 'http://ryada4it.com/cat/mk-l-t-taalymy', 0, '2016-06-23 09:10:58', '0000-00-00 00:00:00'),
(28, 26, 'مقالات تقنية', 'http://ryada4it.com/cat/mk-l-t-tkny', 0, '2016-06-23 09:11:19', '0000-00-00 00:00:00'),
(29, 0, 'منتجاتنا', 'http://ryada4it.com/page/aan-lshrk', 0, '2016-07-30 14:42:15', '0000-00-00 00:00:00'),
(30, 29, 'برنامج الصيدلية', 'http://ryada4it.com/page/sfh', 0, '2016-07-30 14:42:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_10_131919_create_products_table', 2),
('2016_04_16_183519_posts', 3),
('2016_04_16_183537_comments', 3),
('2016_04_16_184425_add_role_to_users', 4),
('2016_04_18_105301_create_sessions_table', 5),
('2016_04_21_023643_create_courses_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE IF NOT EXISTS `msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(160) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`id`, `name`, `email`, `phone`, `content`) VALUES
(1, 'sdfsd', 'sfgdfg@sdfsd.v', '123123', 'xvlkspdvs'),
(2, 'hjhjk', 'dhgh@fgh.cc', '234234', 'vbcvnvbnvc\r\n'),
(3, 'نهاد', 'nihad.abdalrady@gmail.com', '01008326695', 'تاتن');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `content` longtext,
  `slug` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `sidebar` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `slug`, `active`, `sidebar`, `created_at`, `updated_at`) VALUES
(8, 'عن الشركة', '<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.<br class="line-break" />إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.<br class="line-break" />ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.<br class="line-break" />هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>', 'aan-lshrk', NULL, 0, '2016-06-10 17:49:49', '2016-07-30 21:23:56'),
(9, 'fdfdf', '<p>sdfsdf</p>', 'fdfdf', NULL, 0, '2016-06-22 04:02:12', '2016-06-22 04:02:12'),
(10, 'صفحة', '<p style="text-align: center;">لاىةلاىةلا</p>', 'sfh', NULL, 1, '2016-07-30 20:41:37', '2016-07-30 20:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `cat_id` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_author_id_foreign` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `body`, `slug`, `active`, `cat_id`, `created_at`, `updated_at`, `photo`) VALUES
(18, 1, 'الخميس القادم بيت التكنولوجيا يقيم احتفالية بعنوان “اليوم العالمى للفتيات فى تكنولوجيا المعلومات”', '<p><strong>يشارك بيت التكنولوجيا الاتحاد الدولى فى الاحتفال باليوم العالمى للفتيات فى تكنولوجيا المعلومات ويتم الاحتفال بهذا اليوم لتمكين المرأة من أدوات التكنولوجيا التى تساعدها على المشاركة فى المجتمع بصورة أكثر فاعلية.</strong><br /><strong>من خلال هذا الاحتفال سيتم تعليم الفتيات المشاركات كيفية إنشاء تطبيقات تعمل على بيئة الاندرويد .</strong></p>\r\n<p><strong>المشاركة فى الاحتفال للفتيات فقط وسيقام الاحتفال بمقر بيت التكنولوجيا بنجع خميس يوم الخميس الموافق&nbsp;23/04/2015</strong><br /><strong>العنوان: الأقصر &ndash; مركز الطود &ndash; العديسات قبلى &ndash; نجع خميس &ndash; جمعية تنمية المجتمع &ndash; الدور الثانىf</strong></p>', 'lkhmys-lkdm-byt-ltknology-ykym-htfly-baanon-lyom-laalm-llftyt-f-tknology-lmaalomt', 1, '2', '2016-06-23 09:20:26', '2016-06-23 09:26:07', '1466673943_2842cd8d581048b99f071f280decedca.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `photo`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dd', '1466666680_3.jpg', '<h1><strong>asdd</strong></h1>', '2016-04-14 17:34:21', '2016-06-23 07:24:40', NULL),
(2, 's', '1461039103-WIN_20160403_01_11_58_Pro.jpg', 'sss', '2016-04-19 05:59:31', '2016-04-19 06:11:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL,
  `trainer_id` varchar(50) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `bd` date DEFAULT NULL,
  `adress` varchar(150) DEFAULT NULL,
  `idcard` int(14) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `graduate` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trainer_id` (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `trainer_id`, `name`, `email`, `phone`, `photo`, `bd`, `adress`, `idcard`, `gender`, `graduate`, `updated_at`, `created_at`) VALUES
(4, 'data-000000', 'محمود خليل', 'me@m5lil.me', 1023023336, '1465674519_Profile.jpg', '1988-12-07', 'الأقصر - العديسات', 2147483647, 1, 'بكالريوس تربية نوعيه', '2016-06-11 19:48:41', '2016-04-24 05:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `set_slug` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `set_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `set_slug`, `set_name`, `value`, `type`) VALUES
(1, 'إسم الموقع', 'sitename', 'الريادة لتكنولوجيا المعلومات', 1),
(2, 'المحمول', 'phone', '010', 1),
(3, 'الفاكس', 'fax', '000', 1),
(4, 'البريد الإلكترونى', 'email', 'info@website.com', 1),
(5, 'صفحة الفيس بوك', 'facebook', 'fb.me', 1),
(6, 'صفحة تويتر', 'twitter', 'tw.er', 1),
(7, 'صفحة يوتيوب', 'youtube', 'yt.be', 1),
(8, 'صفحة جوجل بلس', 'google', 'goo.gl', 1),
(9, 'الكلمات المفتاحية', 'metak', 'dasd,fghdfhg,hfgh,dfgh,ghdfj,لاتن,لانت,fghfgh,fgh,fdsdf', 3),
(10, 'وصف الموقع', 'metad', 'Description for site', 2),
(11, 'رسالة ترحيبية', 'welcome', 'رسالة ترحيبية', 2),
(12, 'اللوجو', 'logo', '1469891218_Untitled-1.png', 4),
(13, 'الرؤية والهدف', 'target', 'شركة تعمل فى مجال صناعة تكنولوجيا المعلومات على مستوى الأفراد والمؤسسات .\r\nتأسست فى نوفمبر 2015 ومقرها جمعية التنمية والتكنولوجيا بنجع خميس "داتا نجع خميس" حيث قامت الجمعية برعايتها كشركة ناشئة فى مجال تكنولوجيا المعلومات ضمن حاضنة الشركات بالجمعية .\r\n', 2),
(14, 'الرسالة', 'message', 'شركة تعمل فى مجال صناعة تكنولوجيا المعلومات على مستوى الأفراد والمؤسسات .\r\nتأسست فى نوفمبر 2015 ومقرها جمعية التنمية والتكنولوجيا بنجع خميس "داتا نجع خميس" حيث قامت الجمعية برعايتها كشركة ناشئة فى مجال تكنولوجيا المعلومات ضمن حاضنة الشركات بالجمعية .\r\n', 2),
(15, 'من نحن', 'aboutus', 'شركة تعمل فى مجال صناعة تكنولوجيا المعلومات على مستوى الأفراد والمؤسسات .\r\nتأسست فى نوفمبر 2015 ومقرها جمعية التنمية والتكنولوجيا بنجع خميس "داتا نجع خميس" حيث قامت الجمعية برعايتها كشركة ناشئة فى مجال تكنولوجيا المعلومات ضمن حاضنة الشركات بالجمعية .\r\n', 2),
(16, 'العنوان', 'adress', 'adress', 1),
(17, 'لينكد إن', 'linkedin', 'linkedin.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(150) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `caption`, `name`, `photo`, `order`, `created_at`, `updated_at`) VALUES
(4, '2', 'dsad', '1465559135_E-commerce-menu-slider.jpg', 2, '2016-06-10 11:45:35', '2016-06-23 09:22:19'),
(5, '123', '1', '1465677924_Imajayne-Slider-71.jpg', 3, '2016-06-11 20:45:24', '2016-06-11 20:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_id` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` enum('admin','author','subscriber') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'author',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`, `avatar`, `social_id`, `role`) VALUES
(1, 'admin', 'm5lil@live.com', '$2y$10$FiDkQ/r4TIGwB9HHcV.39OQnRBG43WhrY7Q8GQPtHtoEAn.7g5rDq', 'aJJjP350FOeEVKF8lGX6hCSog5rVfvTJEsnTiWi4r1kR5Owef9eS6yxgAEBP', '2016-04-14 03:48:21', '2016-07-24 17:30:21', 1, NULL, NULL, 'author'),
(5, 'User', 'codzin@live.com', '$2y$10$rtDO11NXnDLp1fc5IF6vQuBB9jrcAVg0m2CMZ3x5NbnNUlq2gLQfW', 'BejthPX5HdUouaMFRcrqLLP8atrN4Z19PzE1a6PBuePDMuwydwMYUoIO76yb', '2016-04-16 17:18:17', '2016-04-17 00:53:02', NULL, NULL, NULL, 'author'),
(6, 'Nihad', 'nihad@ryada4it.com', '$2y$10$iy6aQ5YQyRWN.OPQqoz6KuSKC58zULS/Zmc.6z/wsH0OXmrvHHw5.', NULL, '2016-06-25 00:23:45', '2016-07-24 17:28:12', 1, NULL, NULL, 'author');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_from_user_foreign` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_on_post_foreign` FOREIGN KEY (`on_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
