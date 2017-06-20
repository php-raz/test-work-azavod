-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 20 2017 г., 17:21
-- Версия сервера: 5.7.18-15-beget-5.7.18-15-2-3-log
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `n988692e_azavod`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Июн 19 2017 г., 18:13
-- Последнее обновление: Июн 20 2017 г., 14:16
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `patronymic`, `birthday`, `gender`, `image`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', '1990-06-08', '1', '/assets/img/ava.jpg'),
(6, 'Пупкин', 'Вася', 'Василек', '2001-01-01', '1', '/assets/img/ava.jpg'),
(7, 'Васильева', 'Надежда', 'Снежановна', '1985-01-10', '0', '/assets/img/2.jpg'),
(8, 'Грозный', 'Иван', 'Васильевич', '1547-01-16', '1', '/assets/img/ava.jpg'),
(9, 'Ломоносов', 'Михаил', 'Васильевич', '1711-11-18', '1', '/assets/img/ava.jpg'),
(10, 'Афанасьева', 'Лиана', 'Геннадиевна', '1980-08-15', '0', '/assets/img/2.jpg'),
(11, 'Павлова', 'Эрика', 'Аркадьевна', '1965-06-10', '0', '/assets/img/2.jpg'),
(12, 'Быков', 'Бруно', 'Григорьевич', '1982-08-10', '1', '/assets/img/ava.jpg'),
(13, 'Степанова', 'Конкордия', 'Дмитриевна', '1969-10-05', '0', '/assets/img/2.jpg'),
(14, 'Шашков', 'Мечислав', 'Васильевич', '1986-09-28', '1', '/assets/img/ava.jpg'),
(15, 'Соколов', 'Савва', 'Петрович', '1975-06-23', '1', '/assets/img/ava.jpg'),
(19, 'Зайцев', 'Будимир', 'Петрович', '1965-06-02', '1', '/assets/img/20_1557_100_.jpg');

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
