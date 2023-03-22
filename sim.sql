-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 22 2023 г., 07:04
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sim`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `surname` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `fileImg` varchar(25) DEFAULT NULL,
  `Radios` int(5) DEFAULT NULL,
  `CheckPrograming` int(15) DEFAULT NULL,
  `CheckBusiness` int(15) DEFAULT NULL,
  `CheckCook` int(15) DEFAULT NULL,
  `CheckSelect` varchar(25) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `fileImg`, `Radios`, `CheckPrograming`, `CheckBusiness`, `CheckCook`, `CheckSelect`, `message`) VALUES
(32, 'Иван', 'Петрович', 'Vanya@sim', '2023-03-15_07-49-00.png', 1, 1, 2, 3, 'Стандартный', 'Wassup'),
(33, 'Иван', 'Петрович', 'Vanya@sim', '2023-03-15_07-49-00.png', 1, 1, 2, 3, 'Стандартный', 'Wassup'),
(34, 'Иван', 'Петрович', 'Vanya@sim', '2023-03-15_07-49-00.png', 1, 1, 2, 3, 'Стандартный', 'Wassup'),
(35, 'God', 'Damn', 'Vanya@sim', 'ylR3sB7Nsmw.jpg', 1, 1, 2, 3, 'Повышенный', 'Me'),
(36, 'Me', '123', 'Vanya@sim', '881c3a1f9b2fabc8bfbc956ae', 1, 1, 2, 3, 'Стандартный', '?');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
