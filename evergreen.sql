-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 27 2016 г., 20:15
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `evergreen`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_07_27_082851_create_products_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `processor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `screen_size` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `company`, `price`, `processor`, `screen_size`, `ram`, `created_at`, `updated_at`) VALUES
(1, 'Macbook Pro 15 (2013)', 'Great laptop for top people.', 'mac2013.jpg', 'apple', 1500, 'intel', 2, 1, '2016-07-27 08:39:10', '2016-07-27 08:39:22'),
(2, 'Macbook Pro 15 (2015)', 'Awesome laptop for modern people.', 'mac2015.jpg', 'apple', 2500, 'intel', 2, 1, '2016-07-27 08:40:45', '2016-07-27 08:40:50'),
(3, 'Dell XPS', 'Cool windows laptop for all people', 'dellxps.jpg', 'dell', 2000, 'athlon', 3, 3, '2016-07-27 08:43:13', '2016-07-27 08:43:18'),
(4, 'Samsung Galaxy Laptop', 'Cool windows laptop for all people', 'samsung-series-9-2013-laptop-review.jpg', 'samsung', 1000, 'intel', 2, 2, '2016-07-27 09:23:04', '2016-07-27 09:23:09'),
(6, 'Macbook Air 13 (2013)', 'Light and pretty laptop for srudents and travelers', 'macair13.jpg', 'apple', 800, 'intel', 3, 2, '2016-07-27 17:01:24', '2016-07-27 17:01:28'),
(7, 'Asus Protop 15', 'Affordable laptop for basic tasks', 'asus300194.jpg', 'asus', 500, 'athlon', 2, 4, '2016-07-27 17:04:02', '2016-07-27 17:04:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
