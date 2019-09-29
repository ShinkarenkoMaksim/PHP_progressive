-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 29 2019 г., 19:58
-- Версия сервера: 8.0.15
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `user_id`, `product_id`) VALUES
(1, '', NULL, 2),
(2, '', NULL, 3),
(3, 'dttavkp4q9o5igel323h36legmv08bl0', NULL, 1),
(4, 'dttavkp4q9o5igel323h36legmv08bl0', NULL, 2),
(5, 'dttavkp4q9o5igel323h36legmv08bl0', NULL, 4),
(6, 'dttavkp4q9o5igel323h36legmv08bl0', NULL, 3),
(7, 'dttavkp4q9o5igel323h36legmv08bl0', NULL, 1),
(8, 'dttavkp4q9o5igel323h36legmv08bl0', NULL, 2),
(9, 'dttavkp4q9o5igel323h36legmv08bl0', NULL, 1),
(10, 'dttavkp4q9o5igel323h36legmv08bl0', NULL, 2),
(13, 'vltdbnldsptoni6502urtca1l3cubu2m', NULL, 2),
(16, 'k6lr3pco8rmqial3gnk1fj0toe8bqqd1', 1, 1),
(17, 'k6lr3pco8rmqial3gnk1fj0toe8bqqd1', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Пицца', 'С сыром, круглая.', 22),
(2, 'Пончик', 'Сладкий, с шоколадом.', 12),
(3, 'Шоколад', 'Белый', 12),
(4, 'Сникерс', 'Заморский', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$SA9jLv7rQmDclYf/61jqOOIczn1ADVssgvsMuPcjpSFEEM6a0hP8C', '16261822905d90ddd75080a6.39548732'),
(2, 'user', '$2y$10$9H8Rk3d65RMPQDjdMSfhveUjdqf7JhbrHJ3lA60d2O38c/dz5ghEW', '15491599595d90d3fde839e8.29909314');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
