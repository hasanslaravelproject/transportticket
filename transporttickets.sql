-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 04:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busschedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bus_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bus_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `seat_class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `image`, `bus_number`, `company_id`, `bus_category_id`, `seat_class_id`, `created_at`, `updated_at`) VALUES
(1, 'Miss Aletha Cruickshank V', NULL, 'Labore id dolorem porro aut minima dolor vel. Nostrum placeat veritatis quia sequi numquam dolores. Labore labore omnis magni ut. Sunt sint non tempora enim reiciendis alias odio. Libero veniam sed voluptatem et. Et voluptatibus et quibusdam sequi.', 7, 1, 1, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(2, 'Lacy Brakus DVM', NULL, 'Voluptas similique assumenda sapiente et blanditiis magni nam ea. Sequi molestiae sed doloremque velit tempore aut ea. Ratione sed et velit molestiae.', 8, 2, 2, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(3, 'Nestor Ernser', NULL, 'Totam consequatur quia error ipsa impedit unde dolores. Aut tenetur eius pariatur dolorem odit molestiae placeat. Fuga quis blanditiis illum sint officiis. Repellat voluptas aliquam est ipsa voluptate qui maxime.', 9, 3, 3, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(4, 'Jules Cummings', NULL, 'Aut excepturi neque nihil repellendus nam. Ducimus dignissimos non enim et consequatur vel quis. At ipsa suscipit nihil.', 10, 4, 4, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(5, 'Brielle Medhurst', NULL, 'Voluptatum nemo voluptates enim rerum. Mollitia quas sint ut excepturi et natus. Ea dolorum aliquam magnam iure voluptates. Enim error et praesentium deleniti deserunt ea labore et.', 11, 5, 5, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(6, 'Mr. Reagan Shanahan', NULL, 'Vitae officia eaque neque distinctio aut assumenda quidem neque. Ducimus perferendis commodi quibusdam illum alias natus ab. Ea id mollitia dolores omnis quia. Labore adipisci consequatur facilis debitis doloribus.', 17, 6, 11, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(7, 'Ms. Delia Durgan', NULL, 'Ut temporibus rerum tempore. Et molestiae autem laboriosam. Culpa neque voluptate et quam blanditiis dolores praesentium. Dolore sit voluptatem accusantium voluptas necessitatibus beatae.', 18, 7, 12, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(8, 'Dr. Ressie Moen', NULL, 'Earum vitae aspernatur delectus odio eius et voluptas. Iste voluptatum mollitia ad praesentium cum et cum sint. Nihil architecto excepturi rerum harum accusantium. Ab facere voluptate magni aut sit dolores qui deserunt.', 19, 8, 13, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(9, 'Winston Trantow V', NULL, 'Perspiciatis alias sed aliquam adipisci facilis. Aspernatur quaerat tempora quo enim. Fugit expedita dolore qui autem minima assumenda. Qui est reprehenderit dolores.', 20, 9, 14, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(10, 'Arielle Ryan', NULL, 'Quod fuga eum velit esse et. Fuga vel omnis a ut. Sint itaque nihil omnis. Vel quia velit quis impedit suscipit porro.', 21, 10, 15, '2021-03-06 07:49:17', '2021-03-06 07:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `bus_categories`
--

CREATE TABLE `bus_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total seat` int(11) NOT NULL,
  `seatnumbers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_categories`
--

INSERT INTO `bus_categories` (`id`, `name`, `total seat`, `seatnumbers`, `created_at`, `updated_at`) VALUES
(1, 'Jordi Schulist III', 0, 'Modi et saepe ut eos non. Vero minima et eligendi voluptate. Sit vel maiores at est illo ut voluptas.', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(2, 'Janis Hartmann', 0, 'Animi dolorem earum ratione rem maxime eos dolorem. Perferendis est dicta numquam fuga rerum libero. Ipsum beatae mollitia corporis saepe. Rerum minima nemo molestias minima magnam repellendus.', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(3, 'Franco Beier', 0, 'Et ut ut voluptatem repudiandae voluptas. A qui voluptatibus voluptas facere. Dolores aperiam numquam perferendis beatae tempora pariatur. At voluptates harum autem molestiae expedita suscipit. Aut et temporibus dicta nemo at.', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(4, 'Israel Kuhic', 0, 'Sequi minus similique ipsum rem mollitia officiis. Ut nulla qui omnis necessitatibus in. Aspernatur perferendis repudiandae deserunt ut alias in. Perferendis exercitationem sint saepe enim ex nulla temporibus. Dicta consequuntur ut sint ex voluptas hic.', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(5, 'Miss Demetris Witting', 0, 'Rerum voluptatem animi aut temporibus rerum. Repellendus dolorum quia voluptates voluptatem perferendis doloribus et. Qui saepe quos facere placeat rem quae velit. Aperiam consectetur occaecati itaque. Ad sit consequatur ea et.', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(6, 'Mr. Osbaldo Hagenes', 0, 'Quisquam quaerat enim possimus deleniti voluptatibus dolor at qui. Quia non minima blanditiis enim et unde consectetur veniam. Doloribus facere sit natus aut pariatur. Voluptas tempora labore praesentium architecto occaecati repellat odio.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(7, 'Chelsie Spinka', 0, 'Repellat aspernatur quia aliquam dolorem iste. Voluptate distinctio reiciendis sit. Reprehenderit at neque expedita temporibus voluptatem. Assumenda placeat tempore quibusdam voluptatem nihil aut.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(8, 'Prof. Davin Carter', 0, 'Dignissimos fugiat aut iste quos aliquam facilis. Maiores corporis atque dicta omnis eaque laudantium. Illum labore vero quia quasi. Aspernatur mollitia consequuntur et aut sit autem.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(9, 'Raoul Weimann', 0, 'Voluptas debitis occaecati sint quae et corrupti. Ab non itaque fugit error ut incidunt alias consequuntur. Ut quo aut quas non explicabo.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(10, 'Bette Parker', 0, 'Ut recusandae quae molestias quia aut est consequatur. Sit nemo nihil asperiores aliquam consequuntur. Cumque magnam enim provident perspiciatis.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(11, 'Prof. Buster Graham III', 0, 'Corporis blanditiis enim consequuntur. Provident voluptatem placeat sit perferendis. Mollitia aut cumque saepe quia. Sit corrupti pariatur quo ullam voluptas.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(12, 'Ms. Ora Kunde', 0, 'Molestiae eum quia architecto voluptatibus qui nihil error. Eius necessitatibus quasi fugiat voluptas sit doloremque.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(13, 'Genevieve Price III', 0, 'Sed non alias qui. Expedita sequi tenetur cupiditate ab laboriosam repellat nesciunt. Quo et qui voluptatem corrupti ut accusamus. Repellat incidunt aperiam cupiditate.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(14, 'Junior Jones II', 0, 'Molestias et et et enim beatae qui. Alias sunt rerum beatae ut quo occaecati possimus. Reiciendis nihil non voluptatem placeat tenetur. Voluptas possimus suscipit aut voluptatum tempore debitis dolore. Nobis adipisci quaerat voluptates.', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(15, 'Fidel Beer', 0, 'Qui explicabo mollitia consequatur consequuntur facilis explicabo nemo ipsum. Dolorem temporibus cupiditate commodi voluptas voluptatibus blanditiis debitis repellat. Accusamus non voluptatum consequuntur et.', '2021-03-06 07:49:17', '2021-03-06 07:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Marta Buckridge', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(2, 'Ciara Kertzmann', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(3, 'Ahmad Steuber', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(4, 'Jayme Herman', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(5, 'Miss Marie Kemmer', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(6, 'Dr. Aurelia Heaney III', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(7, 'Brittany Farrell', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(8, 'Michele Ritchie', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(9, 'Flavie Hickle', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(10, 'Colleen Pacocha', '2021-03-06 07:49:16', '2021-03-06 07:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `bus_schedules`
--

CREATE TABLE `bus_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `bus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bus_route_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_schedules`
--

INSERT INTO `bus_schedules` (`id`, `date`, `bus_id`, `bus_route_id`, `created_at`, `updated_at`) VALUES
(1, '1974-02-18 17:38:20', 1, 6, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(2, '2009-03-22 19:35:22', 2, 7, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(3, '1976-06-27 20:02:38', 3, 8, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(4, '1970-02-28 19:24:27', 4, 9, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(5, '1983-01-19 19:18:20', 5, 10, '2021-03-06 07:49:16', '2021-03-06 07:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_numeber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `contact_numeber`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'kamrul', 'test@test.com', 'Aut porro eos saepe id facere. Nesciunt laboriosam voluptatem voluptates vel eveniet veniam. Accusamus dolor natus amet aut. Eaque impedit molestiae consequatur blanditiis.', 1, '2021-03-29 21:24:00', '2021-04-04 21:24:00'),
(2, 'Carlotta Cole Jr.', 'Necessitatibus aut id aliquid nihil sit vel. Fugiat nesciunt nihil veritatis eaque. Iure sunt a aperiam inventore similique.', 'Modi voluptatem tempora quia natus. Delectus et facere excepturi optio laudantium autem. Repellendus quo rem molestias quisquam dolores fugit.', 7, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(3, 'Martina Runte', 'Provident facilis est perferendis sunt. Est sint sequi ipsa at eum. Enim culpa quis sint. Placeat quo accusamus tenetur aut.', 'Sint illum nihil nam iure nostrum. Minima ipsum dolorem vitae et.', 8, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(4, 'Lillian Zieme V', 'Nam quaerat placeat id ut molestiae. Provident facere mollitia quia et voluptatem rerum provident. Esse dolor voluptas magni corrupti et et.', 'Mollitia est ducimus qui mollitia eum. Et ut ipsum nesciunt. Dolorem fugit deserunt ab ducimus sed officiis alias ab.', 9, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(5, 'Marge Sporer', 'Odit libero dignissimos in est. Pariatur qui ut eos maiores dolor laborum. Dolores voluptatibus illo eum. Cumque optio labore adipisci modi. Aliquam cupiditate ex non sed ad aliquid.', 'Expedita explicabo perspiciatis consequuntur sed sapiente. Dolores vitae itaque rerum et vero. Laborum tempora ullam voluptas vero sed molestias animi repellat. Est ut qui sed eligendi unde.', 10, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(6, 'Miss Summer Schmidt II', 'Ea ut et quia quos. Quae cupiditate voluptates nesciunt esse sit. Impedit est sed nobis quibusdam. Suscipit quam odio velit fugit qui ducimus non. Tempora tempore alias consequatur tenetur quas quas. Voluptate adipisci sapiente quo dignissimos est.', 'Est totam et occaecati iste qui fugiat. Fugit et numquam maiores maxime. Delectus reprehenderit commodi laborum id. Est ea laboriosam velit possimus. A dolorem quod eius possimus.', 11, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(7, 'Marlene Torp', 'Nulla earum accusamus quas eaque a unde. Error consequatur quia soluta repellendus. Eos atque doloremque harum omnis similique non est. Et et architecto ipsum assumenda blanditiis minus. Iure nostrum voluptatem ad est dicta dolores qui magni.', 'Quidem porro fugit eos non adipisci dicta assumenda. Vel quo soluta molestiae modi et. Est quis qui facere.', 12, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(8, 'Macy Johnson', 'Ea ea quis quasi voluptatem odit eos quod exercitationem. Fugit dolorem in earum ut a veniam. Similique quo ab autem non magnam sapiente sint.', 'Saepe velit iusto sint voluptates. Vel quod aspernatur mollitia quo laborum dolor distinctio. Dicta at nihil sed voluptas.', 13, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(9, 'Rowena Lesch', 'Ipsum rerum ad aut at. Consequuntur blanditiis temporibus non et eum porro laudantium.', 'Perferendis ad pariatur tempore explicabo ut molestias in. Soluta beatae voluptas mollitia voluptatum quam id. Ex dolorum magni consequatur iste veritatis ducimus.', 14, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(10, 'Caterina Koepp DVM', 'Consequatur quia iste sapiente facere. Et assumenda consequatur aut ipsa magnam excepturi impedit. Rerum aperiam et quas nobis aliquam ut est quisquam.', 'Ratione odit laboriosam qui vel ullam. Aut esse cupiditate et animi ea. Quibusdam optio impedit sit iusto deserunt.', 15, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(11, 'Vella Terry', 'Sit sunt minima blanditiis et incidunt qui consequuntur. Aut dicta ut ut omnis. Veritatis fugit rerum voluptatem nemo modi veritatis nobis. Quisquam nobis magni in quod enim et.', 'Quod mollitia quo veniam enim. Eos optio facilis ipsa ut consequatur aliquam est. At dolorem velit doloremque possimus.', 16, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(12, 'Kennith Barton', 'Et esse quidem perferendis veniam. Ut laboriosam totam numquam iure. Ut rem non eos illum sint reiciendis distinctio. Totam velit fugiat et eveniet.', 'Praesentium unde repellendus natus dolorem ut voluptas voluptas. Quas tempore non inventore. Nam qui eos atque. Quod aut molestiae provident pariatur.', 17, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(13, 'Dean Klein', 'Ducimus provident dolor dolor est voluptatem eligendi. Similique delectus quam ut voluptatem ipsam quibusdam sit.', 'Voluptatibus aut distinctio in qui esse. Ex expedita qui sapiente ipsam. Ut quia sunt sequi voluptate.', 18, '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(14, 'Nathen Wuckert', 'Deleniti molestiae et pariatur eos laboriosam. Error laboriosam quae numquam assumenda qui et ullam. Ab non ut ea voluptatem praesentium. Natus aut neque optio ut temporibus quo.', 'Tenetur dolorum dolorem quis esse rerum. Et tempore omnis quisquam est ratione id aliquid. Aut nemo necessitatibus non dolores voluptatem et. Voluptatem sint praesentium et quas. Quas omnis culpa ab consequatur maiores.', 19, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(15, 'Dejuan Hayes DDS', 'Optio quia alias labore. Rerum voluptas quia laborum corporis maxime quas voluptatibus vitae. Iste illo commodi sed. Est dicta vel optio sed dolor.', 'Suscipit quidem in occaecati est sint. Nemo nihil facilis iste repellendus nemo. Aut temporibus ullam iure ab fugit placeat ea.', 20, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(16, 'Emil Kulas', 'Est accusamus porro sit modi. Distinctio ut eos qui suscipit nihil rem labore. Vel voluptates laborum nihil voluptatem et ex. Eaque occaecati id nam nihil qui. Illo quo quisquam nemo et quis qui illo. Qui quia qui consequatur nobis et culpa.', 'Distinctio ipsa facilis velit ducimus quod libero ullam. Quaerat eveniet iste adipisci ducimus unde inventore ratione. Quibusdam pariatur reprehenderit et iste est id qui repellendus. Voluptas consequatur quisquam nobis.', 21, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(17, 'Prof. Maybelle Watsica III', 'Praesentium cupiditate qui voluptatem. Veritatis laboriosam minima magnam aliquid deserunt dolores. Libero et ut inventore laudantium nostrum. Esse facere tenetur voluptatibus quam et maxime. Molestiae molestiae et repellendus maxime porro quas dolor.', 'Eum qui itaque ut expedita quo. Vero esse consequuntur qui veritatis aliquid. Rem sit voluptas expedita ad. Quas expedita placeat reprehenderit et. A ad autem est. Sint eos unde eos voluptates. Cumque in vel similique velit dolores eveniet.', 22, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(18, 'Miss April Romaguera', 'Consectetur dolorum incidunt tenetur temporibus. Qui tenetur quo dolor autem consequuntur repellat atque beatae. Magni enim et at iste amet necessitatibus.', 'Id enim consectetur est. Perspiciatis in non corrupti cumque dignissimos facilis. Quisquam blanditiis id officia. Maxime perspiciatis modi sunt autem vero nihil est.', 23, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(19, 'Brice Kris', 'Excepturi pariatur minus qui. Nam autem nulla officia totam sit et.', 'Iure facere necessitatibus et veritatis natus quam quisquam. Aut dolorem est iste neque quia vero voluptatem. Ut corrupti deserunt atque. Veniam omnis et repellat cupiditate perferendis quo est dicta.', 24, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(20, 'Prof. Randal Yundt II', 'Quia natus voluptas voluptate illo eius possimus asperiores rerum. Et ut et ut facilis dolorem. Ipsum qui iusto eius tempore et iste possimus et. Neque inventore mollitia consectetur voluptatum illo quibusdam et.', 'Consequuntur nulla provident dolorum rerum aspernatur eum. Consectetur omnis veritatis voluptatum voluptatum architecto error. Possimus soluta id sunt quis fuga recusandae.', 25, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(21, 'Prof. Trisha Bayer DDS', 'Nobis maiores et iure soluta soluta ut inventore laborum. Quia et nisi saepe non sunt quisquam. Ut itaque nisi voluptate delectus est. Eum fugiat non non necessitatibus molestias.', 'Fugit libero quis vel in illo modi. Exercitationem inventore voluptatem omnis iste ut necessitatibus. Eos ut aut temporibus nisi omnis ad. Ut expedita minus consequuntur nobis repellendus assumenda repellendus.', 26, '2021-03-06 07:49:17', '2021-03-06 07:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_03_02_194158_create_permission_tables', 1),
(5, '2021_03_06_000000_create_services_table', 1),
(6, '2021_03_06_000001_create_bus_routes_table', 1),
(7, '2021_03_06_000002_create_companies_table', 1),
(8, '2021_03_06_000003_create_bus_schedules_table', 1),
(9, '2021_03_06_000004_create_seat_classes_table', 1),
(10, '2021_03_06_000005_create_users_table', 1),
(11, '2021_03_06_000006_create_buses_table', 1),
(12, '2021_03_06_000007_create_bus_categories_table', 1),
(13, '2021_03_06_000008_add_foreigns_to_companies_table', 1),
(14, '2021_03_06_000009_add_foreigns_to_bus_schedules_table', 1),
(15, '2021_03_06_000010_add_foreigns_to_users_table', 1),
(16, '2021_03_06_000011_add_foreigns_to_buses_table', 1),
(17, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(18, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(19, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(20, '2016_06_01_000004_create_oauth_clients_table', 2),
(21, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'busschedule Personal Access Client', 'd2b2IObQpbvjWeSljnbmnZj90KQSaQ2h1YS5SfYI', NULL, 'http://localhost', 1, 0, 0, '2021-03-08 15:53:12', '2021-03-08 15:53:12'),
(2, NULL, 'busschedule Password Grant Client', 'qLOIrFxhLjBslMOFblhFjXQADwgDgj1zmWvPzAGj', 'users', 'http://localhost', 0, 1, 0, '2021-03-08 15:53:12', '2021-03-08 15:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-08 15:53:12', '2021-03-08 15:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list services', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(2, 'view services', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(3, 'create services', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(4, 'update services', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(5, 'delete services', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(6, 'list busroutes', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(7, 'view busroutes', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(8, 'create busroutes', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(9, 'update busroutes', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(10, 'delete busroutes', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(11, 'list companies', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(12, 'view companies', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(13, 'create companies', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(14, 'update companies', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(15, 'delete companies', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(16, 'list busschedules', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(17, 'view busschedules', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(18, 'create busschedules', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(19, 'update busschedules', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(20, 'delete busschedules', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(21, 'list seatclasses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(22, 'view seatclasses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(23, 'create seatclasses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(24, 'update seatclasses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(25, 'delete seatclasses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(26, 'list buses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(27, 'view buses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(28, 'create buses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(29, 'update buses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(30, 'delete buses', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(31, 'list buscategories', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(32, 'view buscategories', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(33, 'create buscategories', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(34, 'update buscategories', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(35, 'delete buscategories', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(36, 'list roles', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(37, 'view roles', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(38, 'create roles', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(39, 'update roles', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(40, 'delete roles', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(41, 'list permissions', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(42, 'view permissions', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(43, 'create permissions', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(44, 'update permissions', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(45, 'delete permissions', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(46, 'list users', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(47, 'view users', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(48, 'create users', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(49, 'update users', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(50, 'delete users', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(53, 'Transport', 'web', '2021-05-15 16:50:24', '2021-05-15 16:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `re_booked_seats`
--

CREATE TABLE `re_booked_seats` (
  `generate_seat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_booked_seats`
--

INSERT INTO `re_booked_seats` (`generate_seat_id`, `user_id`) VALUES
(344, 1),
(345, 1),
(347, 1),
(348, 1),
(339, 1),
(340, 1),
(341, 1);

-- --------------------------------------------------------

--
-- Table structure for table `re_booked_seat_status`
--

CREATE TABLE `re_booked_seat_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_start` int(11) NOT NULL,
  `route_end` int(11) NOT NULL,
  `journey_date` varchar(255) NOT NULL,
  `journey_time` varchar(255) NOT NULL,
  `compartment_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `s_price` varchar(255) DEFAULT NULL,
  `booking_status` int(3) NOT NULL COMMENT '1=booked, 2=purchased',
  `payment_status` int(3) NOT NULL COMMENT '1= paid, 1=pending',
  `payment_gateway` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_booked_seat_status`
--

INSERT INTO `re_booked_seat_status` (`id`, `user_id`, `route_start`, `route_end`, `journey_date`, `journey_time`, `compartment_id`, `price`, `s_price`, `booking_status`, `payment_status`, `payment_gateway`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 6, '2021-05-16', '03:19', 17, '480', '0', 1, 2, 'online', '2021-05-16 08:00:48', '2021-05-16 08:00:48'),
(2, 1, 5, 6, '2021-05-16', '03:19', 17, '3000', '0', 1, 2, 'cash', '2021-05-16 08:21:39', '2021-05-16 08:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `re_booking_user_info`
--

CREATE TABLE `re_booking_user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_booking_user_info`
--

INSERT INTO `re_booking_user_info` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'Reyajul', 'Islam', '123456', 'Address', '2021-05-16 14:21:38', '2021-05-16 08:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `re_classes`
--

CREATE TABLE `re_classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `seat_price` varchar(255) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_classes`
--

INSERT INTO `re_classes` (`id`, `name`, `color`, `seat_price`, `transport_id`, `created_at`, `updated_at`) VALUES
(6, 'Business Class', '#3700ff', '500', 7, '2021-05-16 07:16:14', '2021-05-14 10:47:38'),
(7, 'Economy Class', '#e90194', '1800', 7, '2021-05-16 07:16:16', '2021-05-14 10:48:03'),
(8, 'First Class', '#03b300', '2300', 7, '2021-05-16 07:16:19', '2021-05-14 10:48:36'),
(9, 'General Class', '#1db1b4', '1000', 11, '2021-05-16 07:24:58', '2021-05-14 10:50:07'),
(12, 'Reyajul Islam Cl', '#e60000', '120', 11, '2021-05-16 08:28:00', '2021-05-16 02:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `re_class_in_compartment`
--

CREATE TABLE `re_class_in_compartment` (
  `class_id` int(19) NOT NULL,
  `compartment_id` int(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_class_in_compartment`
--

INSERT INTO `re_class_in_compartment` (`class_id`, `compartment_id`) VALUES
(9, 17),
(12, 17),
(6, 12),
(7, 12),
(8, 12),
(9, 12),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `re_compartments`
--

CREATE TABLE `re_compartments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_seat` int(11) NOT NULL,
  `total_class` int(255) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_compartments`
--

INSERT INTO `re_compartments` (`id`, `name`, `total_seat`, `total_class`, `transport_id`, `created_at`, `updated_at`) VALUES
(12, 'Admin Compartment', 12, 5, 8, '2021-05-16 10:20:27', '2021-05-16 04:20:27'),
(17, 'Reyajul Islam', 15, 2, 11, '2021-05-16 09:16:02', '2021-05-16 03:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `re_compartment_schedules`
--

CREATE TABLE `re_compartment_schedules` (
  `id` int(11) NOT NULL,
  `route_start` int(11) NOT NULL,
  `route_end` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `compartment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_compartment_schedules`
--

INSERT INTO `re_compartment_schedules` (`id`, `route_start`, `route_end`, `start_date`, `end_date`, `start_time`, `end_time`, `compartment_id`, `created_at`, `updated_at`) VALUES
(65, 5, 6, '2021-04-16', '2021-04-16', '03:19', '16:25', 17, '2021-05-16 04:19:33', '2021-05-16 04:19:33'),
(68, 5, 6, '2021-05-17', '2021-05-17', '01:52', '02:53', 12, '2021-05-16 04:28:03', '2021-05-16 04:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `re_generate_seat`
--

CREATE TABLE `re_generate_seat` (
  `id` int(11) NOT NULL,
  `seat_id` int(19) NOT NULL,
  `class_id` int(19) NOT NULL,
  `compartment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_generate_seat`
--

INSERT INTO `re_generate_seat` (`id`, `seat_id`, `class_id`, `compartment_id`, `created_at`, `updated_at`) VALUES
(339, 1, 9, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(340, 2, 9, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(341, 3, 9, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(342, 4, 9, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(343, 5, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(344, 6, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(345, 7, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(346, 8, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(347, 9, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(348, 10, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(349, 11, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(350, 12, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(351, 13, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(352, 14, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02'),
(353, 15, 12, 17, '2021-05-16 04:56:02', '2021-05-16 04:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `re_routes`
--

CREATE TABLE `re_routes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_routes`
--

INSERT INTO `re_routes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Bangladesh', '2021-05-14 10:50:32', '2021-05-14 10:50:32'),
(6, 'Denmark', '2021-05-14 10:50:42', '2021-05-14 10:50:42'),
(7, 'Keneya', '2021-05-14 10:50:49', '2021-05-14 10:50:49'),
(8, 'Germany', '2021-05-14 10:53:04', '2021-05-14 10:53:04'),
(9, 'Australia', '2021-05-14 10:53:14', '2021-05-14 10:53:14'),
(10, 'Europe', '2021-05-14 10:53:23', '2021-05-14 10:53:23'),
(11, 'America', '2021-05-14 10:53:34', '2021-05-14 10:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `re_seats`
--

CREATE TABLE `re_seats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_seats`
--

INSERT INTO `re_seats` (`id`, `title`) VALUES
(1, 'seats'),
(2, 'seats'),
(3, 'seats'),
(4, 'seats'),
(5, 'seats'),
(6, 'seats'),
(7, 'seats'),
(8, 'seats'),
(9, 'seats'),
(10, 'seats'),
(11, 'seats'),
(12, 'seats'),
(13, 'seats'),
(14, 'seats'),
(15, 'seats'),
(16, 'seats'),
(17, 'seats'),
(18, 'seats'),
(19, 'seats'),
(20, 'seats'),
(21, 'seats'),
(22, 'seats'),
(23, 'seats'),
(24, 'seats'),
(25, 'seats'),
(26, 'seats'),
(27, 'seats'),
(28, 'seats'),
(29, 'seats'),
(30, 'seats'),
(31, 'seats'),
(32, 'seats'),
(33, 'seats'),
(34, 'seats'),
(35, 'seats'),
(36, 'seats');

-- --------------------------------------------------------

--
-- Table structure for table `re_special_price`
--

CREATE TABLE `re_special_price` (
  `id` int(11) NOT NULL,
  `price` int(19) NOT NULL,
  `start_date` varchar(191) NOT NULL,
  `end_date` varchar(191) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_special_price`
--

INSERT INTO `re_special_price` (`id`, `price`, `start_date`, `end_date`, `class_id`, `created_at`, `updated_at`) VALUES
(20, 1200, '2021-05-20', '2021-05-25', 6, '2021-05-14 10:47:38', '2021-05-14 10:47:38'),
(21, 1500, '2021-05-26', '2021-05-30', 6, '2021-05-14 10:47:38', '2021-05-14 10:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `re_transport`
--

CREATE TABLE `re_transport` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_transport`
--

INSERT INTO `re_transport` (`id`, `name`, `author_id`, `created_at`, `updated_at`) VALUES
(7, 'Transport 2021', 1, '2021-05-16 06:48:58', '2021-05-16 00:48:58'),
(8, 'New Transport', 1, '2021-05-16 05:38:53', '2021-05-15 23:38:53'),
(9, 'Test Transport', 1, '2021-05-16 06:06:31', '2021-05-16 00:06:31'),
(11, 'Reyajul Islam', 22, '2021-05-16 00:49:37', '2021-05-16 00:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(2, 'super-admin', 'web', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(3, 'transport-user', 'web', '2021-05-15 16:50:59', '2021-05-15 16:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(53, 3);

-- --------------------------------------------------------

--
-- Table structure for table `seat_classes`
--

CREATE TABLE `seat_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_seat_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_classes`
--

INSERT INTO `seat_classes` (`id`, `name`, `unit_seat_price`, `created_at`, `updated_at`) VALUES
(1, 'Glennie Stehr', '98.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(2, 'Lisette Wuckert', '98.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(3, 'Dr. Mariah Runte II', '48.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(4, 'Prof. Dejon Casper Sr.', '96.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(5, 'Briana Kunze', '37.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(6, 'Prof. Mya Gleason', '50.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(7, 'Georgiana Beatty III', '61.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(8, 'Braden Dickinson', '40.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(9, 'Prof. Dallin Kihn Sr.', '59.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(10, 'Sophie Gerhold Jr.', '54.00', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(11, 'Esta Fritsch', '52.00', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(12, 'Nathanial Hackett', '23.00', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(13, 'Prof. Kaleb Zboncak III', '24.00', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(14, 'Antoinette Sporer', '57.00', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(15, 'Corene Lockman', '71.00', '2021-03-06 07:49:17', '2021-03-06 07:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Minnie Armstrong', '2021-03-06 07:49:15', '2021-03-06 07:49:15'),
(2, 'Norwood Mayer', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(3, 'Prof. Filiberto Thompson DVM', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(4, 'Mr. Geovanni Wolff IV', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(5, 'Pascale Abernathy', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(6, 'Prof. Guiseppe Rau V', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(7, 'Paolo Armstrong', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(8, 'Andreane Stracke', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(9, 'Arne Heathcote', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(10, 'Constance Runolfsson', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(11, 'Lucienne Wintheiser', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(12, 'Mr. Chris Kiehn', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(13, 'Cortez Hoppe', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(14, 'Evelyn Turcotte', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(15, 'Aglae Rice', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(16, 'Ashley McGlynn', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(17, 'Prof. Forest Kub DVM', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(18, 'Prof. Davin Yost IV', '2021-03-06 07:49:16', '2021-03-06 07:49:16'),
(19, 'Pink Herzog DVM', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(20, 'Percival Veum', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(21, 'Prof. Claud Botsford', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(22, 'Paige Jast', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(23, 'Prof. Berry Pollich', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(24, 'Ms. Loyce Okuneva II', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(25, 'Jace Kemmer', '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(26, 'Ali Mohr', '2021-03-06 07:49:17', '2021-03-06 07:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'pp', 'admin@admin.com', '2021-03-06 07:49:15', '$2y$10$LCIZX1Qn3WYjgRijLBJEFu1Kh.ErBiuIiAJ1vK9KKoevTklTWJgKa', '94OCXHMW2CXTMxPrU6ilmuvLrfggQpNw6tppaNTRvqH9LBo6JZMKMymMEhuc', NULL, 1, '2021-03-06 07:49:15', '2021-05-16 08:21:38'),
(2, 'Kristopher Green', 'stracke.angie@kohler.com', '2021-03-06 07:49:16', '$2y$10$BKU.NjEpWUYmw4q65BHL/.Nd8xL93d5uEttaZJmR3M9AFYYdFFqxa', 'dBP2xGqxoF', NULL, 12, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(3, 'Dr. Leopoldo Turcotte PhD', 'rosinski@hotmail.com', '2021-03-06 07:49:16', '$2y$10$hCYUSP8HYyvY0ET73J6F5eeI7acb4ZFYnWJ1X4wKcgz/lnAMsZ1H.', 'moXtrlpUHg', NULL, 13, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(4, 'Adela Friesen', 'alexandrine71@nienow.com', '2021-03-06 07:49:16', '$2y$10$KQNSwJ.5uJR4vRZPwHIiCO4geR01ripGarz0JK1hat8VuZYOeWy6y', '9P7ihAkAtj', NULL, 14, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(5, 'Griffin Leffler', 'rhowe@rempel.com', '2021-03-06 07:49:17', '$2y$10$FUPU8.0UL5tzkeJiWPhkpefgLs1oOfRX456AkzSFJAaqoK4/cND1m', 'C1KldwNgwn', NULL, 15, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(6, 'Tanner Breitenberg', 'wyman.dallas@mcglynn.com', '2021-03-06 07:49:17', '$2y$10$RRO7Wltzada.XBCFLHZJperJKQLDapNhlvcY3/yKc4lvkW2SQOk3u', '1OL94oMzJt', NULL, 16, '2021-03-06 07:49:17', '2021-03-06 07:49:17'),
(7, 'test', 'test@test.com', NULL, '$2y$10$cDxPtduFXu3LicxgURj3E.WO4VhYbA9fTy5CHR7MoBaa3zyESRI1m', NULL, NULL, NULL, '2021-03-06 07:50:36', '2021-03-06 07:50:36'),
(8, 'hasan', 'hasan@test.com', '2021-03-11 20:12:21', '$2y$10$wx0f4CDo/uk8ScU/n9QkS.Vem8SHiCOmDE5c.9O6NKgNX8S8WNPKi', 'abcd', 'test.jpg', 1, '2021-03-11 20:12:21', '2021-03-11 20:12:21'),
(9, 'testingpurpose', 'testingpurpose@test.com', '2021-03-11 20:12:21', '$2y$10$kAC4WctRug4u9WWRDxq/ku5PPHmxHBWsIGFOjrLKGXa96MH4DFvSW', 'abcd', 'test.jpg', 1, '2021-03-11 20:12:21', '2021-03-11 20:12:21'),
(10, 'testingpurpose', 'kamrul@test.com', '2021-03-11 20:12:21', '$2y$10$H0hExAI07Y0ugQ2YVC8yLeAp9l0In0InRvpTlWJWNh0SB.M9XA/QW', 'abcd', 'test.jpg', 1, '2021-03-11 20:12:21', '2021-03-11 20:12:21'),
(11, 'testingpurpose', 'pp@test.com', NULL, '$2y$10$nCo/hXupfe/N9rKD4.CYfuB/x8z8ln/rJtEBcvBUmwFGfIXKZC7Rm', 'abcd', NULL, 1, NULL, NULL),
(12, 'testingpurpose', 'ppp@test.com', NULL, '$2y$10$Qd.vnaZjyN0MaFutR5ndROEsjwITwlOzEqaAgygrrUJ/AMkyCXMq.', NULL, NULL, 1, NULL, NULL),
(13, 'test', 'test@admin.com', NULL, '$2y$10$LCIZX1Qn3WYjgRijLBJEFu1Kh.ErBiuIiAJ1vK9KKoevTklTWJgKa', NULL, NULL, NULL, '2021-05-11 12:25:03', '2021-05-11 12:25:03'),
(22, 'Reyajul Islam', 'reyajul255@gmail.com', NULL, '$2y$10$usSHECPxpE86PPn21DZ4V..3uSP4V/MU/QeCuDKH63l62XaNjMIaW', NULL, NULL, NULL, '2021-05-15 10:12:39', '2021-05-15 10:12:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buses_company_id_foreign` (`company_id`),
  ADD KEY `buses_bus_category_id_foreign` (`bus_category_id`),
  ADD KEY `buses_seat_class_id_foreign` (`seat_class_id`);

--
-- Indexes for table `bus_categories`
--
ALTER TABLE `bus_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_schedules`
--
ALTER TABLE `bus_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_schedules_bus_id_foreign` (`bus_id`),
  ADD KEY `bus_schedules_bus_route_id_foreign` (`bus_route_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_service_id_foreign` (`service_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `re_booked_seat_status`
--
ALTER TABLE `re_booked_seat_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_start` (`route_start`),
  ADD KEY `route_end` (`route_end`),
  ADD KEY `compartment_id` (`compartment_id`);

--
-- Indexes for table `re_booking_user_info`
--
ALTER TABLE `re_booking_user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_classes`
--
ALTER TABLE `re_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Indexes for table `re_class_in_compartment`
--
ALTER TABLE `re_class_in_compartment`
  ADD KEY `class_id` (`class_id`),
  ADD KEY `compartment_id` (`compartment_id`);

--
-- Indexes for table `re_compartments`
--
ALTER TABLE `re_compartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Indexes for table `re_compartment_schedules`
--
ALTER TABLE `re_compartment_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_start` (`route_start`),
  ADD KEY `route_end` (`route_end`),
  ADD KEY `compartment_id` (`compartment_id`);

--
-- Indexes for table `re_generate_seat`
--
ALTER TABLE `re_generate_seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compartment_id` (`compartment_id`),
  ADD KEY `seat_id` (`seat_id`),
  ADD KEY `re_generate_seat_ibfk_3` (`class_id`);

--
-- Indexes for table `re_routes`
--
ALTER TABLE `re_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_seats`
--
ALTER TABLE `re_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_special_price`
--
ALTER TABLE `re_special_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `re_transport`
--
ALTER TABLE `re_transport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seat_classes`
--
ALTER TABLE `seat_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_company_id_foreign` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus_categories`
--
ALTER TABLE `bus_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus_schedules`
--
ALTER TABLE `bus_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `re_booked_seat_status`
--
ALTER TABLE `re_booked_seat_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `re_booking_user_info`
--
ALTER TABLE `re_booking_user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `re_classes`
--
ALTER TABLE `re_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `re_compartments`
--
ALTER TABLE `re_compartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `re_compartment_schedules`
--
ALTER TABLE `re_compartment_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `re_generate_seat`
--
ALTER TABLE `re_generate_seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `re_routes`
--
ALTER TABLE `re_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `re_seats`
--
ALTER TABLE `re_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `re_special_price`
--
ALTER TABLE `re_special_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `re_transport`
--
ALTER TABLE `re_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seat_classes`
--
ALTER TABLE `seat_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_bus_category_id_foreign` FOREIGN KEY (`bus_category_id`) REFERENCES `bus_categories` (`id`),
  ADD CONSTRAINT `buses_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `buses_seat_class_id_foreign` FOREIGN KEY (`seat_class_id`) REFERENCES `seat_classes` (`id`);

--
-- Constraints for table `bus_schedules`
--
ALTER TABLE `bus_schedules`
  ADD CONSTRAINT `bus_schedules_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`),
  ADD CONSTRAINT `bus_schedules_bus_route_id_foreign` FOREIGN KEY (`bus_route_id`) REFERENCES `bus_routes` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `re_classes`
--
ALTER TABLE `re_classes`
  ADD CONSTRAINT `re_classes_ibfk_1` FOREIGN KEY (`transport_id`) REFERENCES `re_transport` (`id`);

--
-- Constraints for table `re_class_in_compartment`
--
ALTER TABLE `re_class_in_compartment`
  ADD CONSTRAINT `re_class_in_compartment_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `re_classes` (`id`),
  ADD CONSTRAINT `re_class_in_compartment_ibfk_2` FOREIGN KEY (`compartment_id`) REFERENCES `re_compartments` (`id`);

--
-- Constraints for table `re_compartments`
--
ALTER TABLE `re_compartments`
  ADD CONSTRAINT `re_compartments_ibfk_1` FOREIGN KEY (`transport_id`) REFERENCES `re_transport` (`id`);

--
-- Constraints for table `re_compartment_schedules`
--
ALTER TABLE `re_compartment_schedules`
  ADD CONSTRAINT `re_compartment_schedules_ibfk_2` FOREIGN KEY (`route_start`) REFERENCES `re_routes` (`id`),
  ADD CONSTRAINT `re_compartment_schedules_ibfk_3` FOREIGN KEY (`route_end`) REFERENCES `re_routes` (`id`),
  ADD CONSTRAINT `re_compartment_schedules_ibfk_4` FOREIGN KEY (`compartment_id`) REFERENCES `re_compartments` (`id`);

--
-- Constraints for table `re_generate_seat`
--
ALTER TABLE `re_generate_seat`
  ADD CONSTRAINT `re_generate_seat_ibfk_1` FOREIGN KEY (`compartment_id`) REFERENCES `re_compartments` (`id`),
  ADD CONSTRAINT `re_generate_seat_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `re_seats` (`id`),
  ADD CONSTRAINT `re_generate_seat_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `re_classes` (`id`);

--
-- Constraints for table `re_special_price`
--
ALTER TABLE `re_special_price`
  ADD CONSTRAINT `re_special_price_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `re_classes` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
