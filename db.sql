-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `caritrip`;
CREATE DATABASE `caritrip` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `caritrip`;

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `boat_images`;
CREATE TABLE `boat_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `boat_id` int DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description` text COLLATE utf8mb4_unicode_ci,
  `key_visual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `boat_travel_packages`;
CREATE TABLE `boat_travel_packages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat_id` int DEFAULT NULL,
  `package_key_visual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_short_description` text COLLATE utf8mb4_unicode_ci,
  `package_description` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_itenary` tinyint(1) DEFAULT NULL,
  `itenary_list` text COLLATE utf8mb4_unicode_ci,
  `include_list` text COLLATE utf8mb4_unicode_ci,
  `exclude_list` text COLLATE utf8mb4_unicode_ci,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci,
  `seo_meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `highlight_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `boat_travel_trip_images`;
CREATE TABLE `boat_travel_trip_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_id` int DEFAULT NULL,
  `trip_id` int DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `boat_travel_trips`;
CREATE TABLE `boat_travel_trips` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_id` int DEFAULT NULL,
  `trip_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trip_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trip_price` int DEFAULT NULL,
  `trip_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `boats`;
CREATE TABLE `boats` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `boat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat_length` double(8,2) DEFAULT NULL,
  `boat_width` double(8,2) DEFAULT NULL,
  `boat_depth` double(8,2) DEFAULT NULL,
  `boat_speed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat_year_built` int DEFAULT NULL,
  `boat_fuel_capacity` int DEFAULT NULL,
  `boat_water_capacity` int DEFAULT NULL,
  `boat_origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat_material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat_main_engine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat_dingy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat_safety_equipment` text COLLATE utf8mb4_unicode_ci,
  `boat_facility` text COLLATE utf8mb4_unicode_ci,
  `boat_capacity` int DEFAULT NULL,
  `boat_entertainment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat_featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci,
  `seo_meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `language_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `languages` (`id`, `created_at`, `updated_at`, `language_name`, `language_code`, `is_default`, `is_active`) VALUES
(1,	'2024-05-14 02:23:10',	'2024-05-14 02:23:10',	'English',	'en',	1,	1);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2024_05_14_075337_create_pages_table',	1),
(3,	'2024_05_14_075350_create_boats_table',	1),
(4,	'2024_05_14_075412_create_boat_images_table',	1),
(5,	'2024_05_14_075426_create_boat_travel_packages_table',	1),
(6,	'2024_05_14_075440_create_boat_travel_trips_table',	1),
(7,	'2024_05_14_075450_create_boat_travel_trip_images_table',	1),
(8,	'2024_05_14_075500_create_languages_table',	1),
(9,	'2024_05_14_075510_create_blogs_table',	1),
(10,	'2024_05_14_075534_create_blog_categories_table',	1);

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_breadcrumbs_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `page_friendly_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `page_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'admin@admin.com',	'admin',	'$2y$10$zP4b.l15B.97nBV.to4n.eSFjADFI0GjYsKGCsdK8gtgOmwolTscW',	NULL,	NULL);

-- 2024-05-14 09:26:42
