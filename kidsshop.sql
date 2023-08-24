-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 12 2023 г., 00:39
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kidsshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `name`, `price`, `description`, `image_path`, `size`, `total`, `total_amount`, `quantity`) VALUES
(167, 'COSMOS қыз балалар киімі', '37000.00', 'COSMOS қыз балалар киімі', 'img/product2.png', '5-6 жас', NULL, NULL, 2),
(168, 'LASTAD қыз балалар киімі', '50000.00', 'LASTAD - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы.', 'img/product3.png', '3-4 жас', NULL, NULL, 2),
(169, 'Chic Floral', '6000.00', 'Chic Floral', 'img/product14.png', '3-4 жас', NULL, NULL, 2),
(170, 'Chic Floral', '6000.00', 'Chic Floral', 'img/product14.png', '7-8 жас', NULL, NULL, 2),
(171, 'Bereke көйлегі', '12000.00', 'Бұл талғампаз зығыр көйлек стильді ер адамдар үшін тамаша таңдау болып табылады. Ол күні бойы барынша жайлылық үшін жоғары сапалы зығыр матадан жасалған. Жейде фигураға ерекше назар аударатын және кескінге талғампаздық қосатын бекітілген кесіндіге ие. Ол сіздің стиліңізге тамаша реңкті табуға мүмкіндік беретін әртүрлі түс нұсқаларында қол жетімді. Жоғары сапалы материалдар мен керемет шеберлік бұл жейдені заманауи джентльмендердің гардеробына қажет етеді. Оны іскерлік кездесулерге, кездесулерге немесе басқа да ерекше жағдайларда таң қалдыратын ерекше көрініс үшін киіңіз.', 'img/product12.png', '5-6 жас', NULL, NULL, 1),
(172, 'GOLDEN қыз балалар көйлегі', '10000.00', 'Golden - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы. Бұл топтаманың ерекшелігі - оның алтын палитрасы, ол әрбір киімге сәнділік пен жарқырауды қосады.', 'img/product5.png', '7-8 жас', NULL, NULL, 1),
(173, 'Fashionable Monochrome көйлегі', '7000.00', 'Бұл винтаждық Чарльстон көйлегі сіздің гардеробыңызға ескі Голливуд әсерін береді.', 'img/product11.png', '5-6 жас', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`id`, `product_id`, `created_at`, `name`, `price`, `description`, `image_path`) VALUES
(46, 8, '2023-06-10 19:26:49', 'ZARINA қыз балалар көйлегі', '40000.00', 'ZARINA - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы. Бұл топтаманың ерекшелігі - оның алтын палитрасы, ол әрбір киімге сәнділік пен жарқырауды қосады.', 'img/product8.png'),
(47, 2, '2023-06-11 13:40:11', 'COSMOS қыз балалар киімі', '37000.00', 'COSMOS қыз балалар киімі', 'img/product2.png'),
(48, 3, '2023-06-11 13:40:12', 'LASTAD қыз балалар киімі', '50000.00', 'LASTAD - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы.', 'img/product3.png'),
(49, 4, '2023-06-11 13:40:12', 'ZARINA қыз балалар киімі', '100000.00', 'Zarina қыз балалар киімі', 'img/product4.png');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `children` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category`, `image_path`, `created_at`, `children`) VALUES
(1, 'GOLDEN қыз балалар киімі', 34000, 'GOLDEN қыз балалар киімі', 'Комбинация', 'img/product1.png', '2023-06-01 21:26:39', 'қыз бала'),
(2, 'COSMOS қыз балалар киімі', 37000, 'COSMOS қыз балалар киімі', 'Комбинация', 'img/product2.png', '2023-06-01 21:26:39', 'қыз бала'),
(3, 'LASTAD қыз балалар киімі', 50000, 'LASTAD - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы.', 'Комбинация', 'img/product3.png', '2023-06-01 21:26:39', 'қыз бала'),
(4, 'ZARINA қыз балалар киімі', 100000, 'Zarina қыз балалар киімі', 'Комбинация', 'img/product4.png', '2023-06-01 21:26:39', 'қыз бала'),
(5, 'GOLDEN қыз балалар көйлегі', 10000, 'Golden - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы. Бұл топтаманың ерекшелігі - оның алтын палитрасы, ол әрбір киімге сәнділік пен жарқырауды қосады.', 'Көйлек', 'img/product5.png', '2023-06-02 00:19:25', 'қыз бала'),
(6, 'COSMOS қыз балалар көйлегі', 20000, 'COSMOS - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы. Бұл топтаманың ерекшелігі - оның алтын палитрасы, ол әрбір киімге сәнділік пен жарқырауды қосады', 'Көйлек', 'img/product6.png', '2023-06-02 00:19:25', 'қыз бала'),
(7, 'LASTAD қыз балалар көйлегі', 30000, 'LASTAD - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы. Бұл топтаманың ерекшелігі - оның алтын палитрасы, ол әрбір киімге сәнділік пен жарқырауды қосады.', 'Көйлек', 'img/product7.png', '2023-06-02 00:19:25', 'қыз бала'),
(8, 'ZARINA қыз балалар көйлегі', 40000, 'ZARINA - бұл кішкентай ханшайымдар үшін арнайы жасалған талғампаз және сәнді киімдер жинағы. Бұл топтаманың ерекшелігі - оның алтын палитрасы, ол әрбір киімге сәнділік пен жарқырауды қосады.', 'Көйлек', 'img/product8.png', '2023-06-02 00:19:25', 'қыз бала'),
(9, 'Elegant Pattern көйлегі', 4000, 'Ер балаларға арналған Diamond көйлек - әдетте гауһар таспен немесе гауһар пішініне ұқсайтын геометриялық өрнекпен жасалған киім. ', 'Көйлек', 'img/product9.png', '2023-06-05 18:44:50', 'ер бала'),
(10, 'Vintage Charleston көйлегі', 9000, 'Бұл винтаждық Чарльстон көйлегі сіздің гардеробыңызға ескі Голливуд әсерін береді. Ол винтаждық сүйкімділікті заманауи стильмен үйлестіре отырып, Чарльстон дәуірінің талғампаздығы мен сүйкімділігін бейнелейді.', 'Көйлек', 'img/product10.png', '2023-06-05 19:24:36', 'ер бала'),
(11, 'Fashionable Monochrome көйлегі', 7000, 'Бұл винтаждық Чарльстон көйлегі сіздің гардеробыңызға ескі Голливуд әсерін береді.', 'Көйлек', 'img/product11.png', '2023-06-05 19:29:54', 'ер бала'),
(12, 'Bereke көйлегі', 12000, 'Бұл талғампаз зығыр көйлек стильді ер адамдар үшін тамаша таңдау болып табылады. Ол күні бойы барынша жайлылық үшін жоғары сапалы зығыр матадан жасалған. Жейде фигураға ерекше назар аударатын және кескінге талғампаздық қосатын бекітілген кесіндіге ие.', 'Көйлек', 'img/product12.png', '2023-06-05 19:33:47', 'ер бала'),
(13, 'Кроссовка BUTS', 50000, 'Кроссовка BUTS - әлемдегі ең әдемі кроссовкалардың бірі', 'Кроссовка', 'img/product15.png', '2023-06-05 19:52:28', 'ер бала'),
(14, 'FAST STEPS', 13000, 'Fast Steps', 'Кроссовка', 'img/product16.png', '2023-06-05 19:58:35', 'ер бала'),
(15, 'VelocityBoost', 40000, 'VelocityBoost', 'Кроссовка', 'img/product17.png', '2023-06-05 20:00:28', 'ер бала'),
(16, 'FlexFitPro', 10000, 'FlexFitPro', 'Кроссовка', 'img/product18.png', '2023-06-05 20:01:08', 'ер бала'),
(17, 'AeroStride', 15000, 'AeroStride', 'Кроссовка', 'img/product19.png', '2023-06-05 20:02:15', 'қыз бала'),
(18, 'UltraRunElite', 50000, 'UltraRunElite', 'Кроссовка', 'img/product20.png', '2023-06-05 20:03:49', 'қыз бала'),
(19, 'HARUKA', 55000, 'Haruka', 'Худи', 'img/product22.png', '2023-06-05 20:07:15', 'ер бала'),
(20, 'Sakura', 12000, 'Sakura', 'Худи', 'img/product23.png', '2023-06-05 20:07:55', 'қыз бала'),
(21, 'Chic Floral', 6000, 'Chic Floral', 'Көйлек', 'img/product14.png', '2023-06-05 20:08:59', 'ер бала');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT для таблицы `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
