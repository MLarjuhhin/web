-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: mysqldb
-- Время создания: Фев 22 2023 г., 15:49
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
-- Структура таблицы `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_id` int DEFAULT NULL,
  `manager_id` int NOT NULL,
  `date_add` datetime NOT NULL,
  `date_edit` datetime DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `profession`, `description`, `img_id`, `manager_id`, `date_add`, `date_edit`, `date_delete`) VALUES
(1, 'Maksim Larjuhhin', 'IT-juht', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae debitis enim facere fugiat fugit incidunt ipsum laudantium minima nesciunt, omnis perferendis quaerat ratione sequi ut voluptatum! Ex fuga quidem similique!', 1, 1, '2023-02-17 16:01:30', NULL, NULL),
(2, 'Rene', 'Junior', 'We really couldn\'t wait to get there and do what we\'re doing,\" Anderson said of his boys. \"We have a much smaller schedule than our older brothers so we weren\'t as nervous about the game as we were originally. We can wait a little bit more.', 1, 1, '2023-02-17 16:01:30', NULL, '2023-02-14 18:50:00'),
(3, 'Igor', 'Boss', 'car washing machines, and more than 30 of them will have to pay in order to continue using the same washing machine. This means that many of them will also need to work long hours at a time to earn the required payments. The total cost of this shift to the industry has ballooned from $9.4 billion in 2013 to much less than $23 billion this year.\r\n', 1, 1, '2023-02-17 16:01:30', NULL, '2023-02-06 18:50:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
