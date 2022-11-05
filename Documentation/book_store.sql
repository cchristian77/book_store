-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table book_store.authors
CREATE TABLE IF NOT EXISTS `authors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture_url` text COLLATE utf8mb4_unicode_ci,
  `about` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `authors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.authors: ~10 rows (approximately)
INSERT INTO `authors` (`id`, `name`, `email`, `gender`, `address`, `place_of_birth`, `date_of_birth`, `nationality`, `profile_picture_url`, `about`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Guy Davis', 'esperanza95@hotmail.com', 'M', '3408 Raquel Via Apt. 891', 'Coleville', '1925-01-24', 'Saint Barthelemy', NULL, 'I am the famous writer and the name is Mr. Matt Armstrong', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(2, 'Anabelle Maggio PhD', 'elisa88@yahoo.com', 'F', '68006 Lucius Cliff Apt. 406', 'Dellafurt', '1926-10-22', 'Algeria', NULL, 'I am the famous writer and the name is Araceli Thompson', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(3, 'Claire Sporer', 'macejkovic.kelli@rippin.biz', 'M', '4871 Rolfson Loaf Suite 631', 'South Margret', '1975-05-21', 'Bhutan', NULL, 'I am the famous writer and the name is Jonathan Hilpert', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(4, 'Tanya Block DDS', 'marianna46@gmail.com', 'F', '10332 Lakin Freeway Apt. 263', 'East Gildaland', '1970-09-09', 'Monaco', NULL, 'I am the famous writer and the name is Gianni Bednar', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(5, 'Prof. Einar Thompson V', 'ritchie.anderson@pollich.com', 'M', '6318 Larkin Brook', 'East Ozella', '1949-06-12', 'Uruguay', NULL, 'I am the famous writer and the name is Arielle Goldner II', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(6, 'Erika Osinski', 'rrunolfsdottir@hotmail.com', 'F', '280 Johnpaul Drives Apt. 938', 'Lake Brad', '1986-02-01', 'Germany', NULL, 'I am the famous writer and the name is Leatha Roob', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(7, 'Sydnie Hessel', 'cvandervort@lind.info', 'M', '579 Kamille Crossing', 'East Colten', '1936-12-13', 'Germany', NULL, 'I am the famous writer and the name is Merl Muller Sr.', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(8, 'Lucinda Koepp Jr.', 'iking@hotmail.com', 'F', '453 Littel Parks Suite 830', 'Lake Beaulahport', '2021-03-18', 'Korea', NULL, 'I am the famous writer and the name is Daron Kuhn', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(9, 'Mrs. Bridie Weimann', 'schinner.orie@thiel.info', 'M', '301 Schiller Garden', 'Goyettebury', '1931-05-13', 'Central African Republic', NULL, 'I am the famous writer and the name is Prof. Akeem Hane IV', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(10, 'Randi McLaughlin', 'bfisher@gmail.com', 'F', '134 Eichmann Ferry Apt. 578', 'Port Jada', '1998-06-23', 'Angola', NULL, 'I am the famous writer and the name is Ms. Georgianna Huel I', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL);

-- Dumping structure for table book_store.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(21,5) unsigned NOT NULL DEFAULT '0.00000',
  `release_date` date DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `page` int NOT NULL,
  `synopsis` longtext COLLATE utf8mb4_unicode_ci,
  `cover_url` text COLLATE utf8mb4_unicode_ci,
  `publisher_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_publisher_id_foreign` (`publisher_id`),
  CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.books: ~10 rows (approximately)
INSERT INTO `books` (`id`, `title`, `price`, `release_date`, `is_published`, `page`, `synopsis`, `cover_url`, `publisher_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Open-source Multimedia Structure', 94063.00000, '1988-02-12', 0, 566, 'Cum numquam ipsam neque quo suscipit fugit ipsum. Natus eveniet libero repellat qui sit. Dolor accusantium numquam qui ut praesentium neque.', NULL, 1, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(2, 'Total Solution-oriented Workforce', 78640.00000, '2000-06-09', 1, 146, 'Modi consectetur nesciunt eos consequatur explicabo eum enim veritatis. Rem nihil iusto optio consequatur voluptatem dolorem.', NULL, 1, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(3, 'Phased Fault-tolerant Structure', 14569.00000, '1984-01-23', 1, 137, 'Et consequatur accusamus sint qui veritatis quos. Eos eum alias delectus doloremque qui dolor.', NULL, 4, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(4, 'User-friendly Systemic Emulation', 43280.00000, '1961-04-11', 1, 161, 'Est perspiciatis unde libero voluptatem perspiciatis dolor. Mollitia dolor quis fuga ab eaque. Provident tempore temporibus quibusdam sit.', NULL, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(5, 'Vision-oriented Motivating Framework', 49534.00000, '1970-04-16', 0, 435, 'Itaque rerum ea aut quas. Et dolor hic alias dolore quam aut.', NULL, 4, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(6, 'Customer-focused Directional Knowledgeuser', 20892.00000, '1989-02-17', 0, 417, 'Non et totam voluptate voluptatem ut reprehenderit quis. Totam ut a dicta quis quis culpa. Sit sapiente qui quisquam assumenda tempora quas magni.', NULL, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(7, 'Centralized Discrete Adapter', 26627.00000, '2020-09-05', 0, 538, 'Et quos voluptatem nam earum animi laboriosam laudantium. Aut provident natus sequi corrupti quas. Delectus culpa iure aut doloremque qui veritatis quia.', NULL, 1, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(8, 'Exclusive Full-range Concept', 26434.00000, '1930-02-08', 1, 733, 'Cum ratione nisi repellendus qui. Iste hic aut iusto. Rerum quia perferendis tempora et.', NULL, 4, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(9, 'Realigned Fresh-thinking Opensystem', 31200.00000, '1976-01-07', 0, 613, 'Ut quis exercitationem illum illum excepturi voluptas. Quaerat vel dolore maxime nam et cum.', NULL, 3, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(10, 'Profit-focused Tertiary Alliance', 23685.00000, '1970-03-11', 1, 894, 'Quos molestias architecto et quod aut ipsa officiis. Deleniti qui laboriosam nihil voluptas quos libero.', NULL, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL);

-- Dumping structure for table book_store.book_authors
CREATE TABLE IF NOT EXISTS `book_authors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` bigint unsigned NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_authors_book_id_foreign` (`book_id`),
  KEY `book_authors_author_id_foreign` (`author_id`),
  CONSTRAINT `book_authors_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  CONSTRAINT `book_authors_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.book_authors: ~15 rows (approximately)
INSERT INTO `book_authors` (`id`, `book_id`, `author_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 7, 10, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(2, 4, 4, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(3, 4, 8, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(4, 1, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(5, 7, 6, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(6, 9, 1, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(7, 1, 8, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(8, 8, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(9, 10, 7, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(10, 5, 7, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(11, 4, 7, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(12, 5, 3, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(13, 5, 10, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(14, 1, 9, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(15, 10, 6, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL);

-- Dumping structure for table book_store.book_genres
CREATE TABLE IF NOT EXISTS `book_genres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` bigint unsigned NOT NULL,
  `genre_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_genres_book_id_foreign` (`book_id`),
  KEY `book_genres_genre_id_foreign` (`genre_id`),
  CONSTRAINT `book_genres_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `book_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.book_genres: ~15 rows (approximately)
INSERT INTO `book_genres` (`id`, `book_id`, `genre_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 6, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(2, 7, 7, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(3, 4, 8, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(4, 5, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(5, 2, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(6, 1, 1, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(7, 5, 6, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(8, 6, 1, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(9, 5, 3, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(10, 4, 1, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(11, 4, 2, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(12, 10, 4, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(13, 1, 6, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(14, 5, 1, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(15, 7, 8, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL);

-- Dumping structure for table book_store.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table book_store.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.genres: ~8 rows (approximately)
INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Comedy', NULL, NULL, NULL),
	(2, 'Romantic', NULL, NULL, NULL),
	(3, 'Action', NULL, NULL, NULL),
	(4, 'Mystery', NULL, NULL, NULL),
	(5, 'Thriller', NULL, NULL, NULL),
	(6, 'Fantasy', NULL, NULL, NULL),
	(7, 'Sci-Fi', NULL, NULL, NULL),
	(8, 'Horror', NULL, NULL, NULL);

-- Dumping structure for table book_store.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(6, '2016_06_01_000004_create_oauth_clients_table', 1),
	(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(10, '2022_11_04_135959_create_publishers_table', 1),
	(11, '2022_11_04_140206_create_authors_table', 1),
	(12, '2022_11_04_140754_create_books_table', 1),
	(13, '2022_11_04_142040_create_book_authors_table', 1),
	(14, '2022_11_04_142236_create_genres_table', 1),
	(15, '2022_11_04_142309_create_book_genres_table', 1);

-- Dumping structure for table book_store.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.oauth_access_tokens: ~0 rows (approximately)

-- Dumping structure for table book_store.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.oauth_auth_codes: ~0 rows (approximately)

-- Dumping structure for table book_store.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.oauth_clients: ~0 rows (approximately)

-- Dumping structure for table book_store.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.oauth_personal_access_clients: ~0 rows (approximately)

-- Dumping structure for table book_store.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.oauth_refresh_tokens: ~0 rows (approximately)

-- Dumping structure for table book_store.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.password_resets: ~0 rows (approximately)

-- Dumping structure for table book_store.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table book_store.publishers
CREATE TABLE IF NOT EXISTS `publishers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.publishers: ~4 rows (approximately)
INSERT INTO `publishers` (`id`, `company_name`, `address`, `phone_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Gramedia', '8834 Forest Roads Apt. 557', '541-852-7727', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(2, 'McLaughlin and Sons', '104 Garnett Station Apt. 009', '1-947-518-6127', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(3, 'Bogisich-Kulas', '55014 Broderick Canyon', '+1-531-943-1689', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL),
	(4, 'Grimes LLC', '6923 Columbus Lodge', '1-346-259-4806', '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL);

-- Dumping structure for table book_store.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0' COMMENT '0:User, 1:Admin',
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture_url` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_first_name_index` (`first_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table book_store.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `username`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `address`, `place_of_birth`, `date_of_birth`, `phone_number`, `role`, `gender`, `profile_picture_url`) VALUES
	(1, NULL, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL, 'admin', 'admin@example.com', '$2y$10$4Alf/9bhnBsalOnzuDJOBe5iytqpdleH1348fs1rmp700Rbeswba6', 'Admin', 'Kayden', 'Parker', '1542 Odessa Light', 'Aylinview', '1935-05-14', '815.274.7970', 1, 'M', NULL),
	(2, NULL, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL, 'user_1', 'user1@example.com', '$2y$10$FqBFr.8RVc9URvjoeXPXjOePeaCRdONhXtqK9EYr7sLhhj/6ph7ie', 'User1', 'Lucy', 'Powlowski', '373 Walker Run Apt. 689', 'Lorenzachester', '1948-06-20', '+1 (586) 314-3200', 0, 'F', NULL),
	(3, NULL, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL, 'user_2', 'user2@example.com', '$2y$10$Pk8rv55D3GoWaF94Velmk.9D84ySghmXP4JMkMcSBJU6XFOTj6/xa', 'User2', 'Moshe', 'Sanford', '945 Gulgowski Trail Apt. 014', 'South Trentburgh', '1989-08-19', '361-941-6147', 0, 'M', NULL),
	(4, NULL, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL, 'user_3', 'user3@example.com', '$2y$10$sy2WXqoSpH9/SlTepKlqjO11NLYGMqWsuiwTk3JH9BsWGl1KtWLZS', 'User3', 'Price', 'Wolff', '11902 Janiya Walk Apt. 476', 'Johnathanborough', '1936-07-23', '862.946.5880', 0, 'F', NULL),
	(5, NULL, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL, 'user_4', 'user4@example.com', '$2y$10$E6l5bHP6kZjfl5dPMDDZVOkJoBm/u6m1ZygihScbKmZjQL.L2dP72', 'User4', 'Elsie', 'Donnelly', '219 Paris Mountain Suite 718', 'West Pearline', '1958-05-31', '1-951-467-9391', 0, 'M', NULL),
	(6, NULL, '2022-11-05 02:52:03', '2022-11-05 02:52:03', NULL, 'user_5', 'user5@example.com', '$2y$10$N9IawnSYMjOazoU3mRqFueDTWTERyeFJky8fyuNryydKuZSMQeDjS', 'User5', 'Cordia', 'Smitham', '6501 Monserrate Village', 'East Josefina', '1981-11-12', '1-850-584-2356', 0, 'F', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
