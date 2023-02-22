-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: mysqldb
-- Время создания: Фев 22 2023 г., 15:52
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `koppee_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `manager`
--

CREATE TABLE `manager` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `img_id` int DEFAULT NULL,
  `isikukood` bigint DEFAULT NULL,
  `date_add` datetime NOT NULL,
  `date_delete` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `manager`
--

INSERT INTO `manager` (`id`, `name`, `email`, `phone`, `img_id`, `isikukood`, `date_add`, `date_delete`) VALUES
(1, 'Maksim larjuhhin', 'maksim@larjuhhin.name', '51419023', NULL, NULL, '2023-02-14 16:37:04', NULL),
(2, 'Test jhguyg', 'test@email.co', '99999999', NULL, NULL, '2023-02-15 16:37:04', NULL),
(3, 'Maksim big Boss', 'maksim@gmail.name', '5555555', NULL, NULL, '2023-02-16 16:37:04', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
