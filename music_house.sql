-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 07 2023 г., 18:39
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- База данных: `music_house`
--
-- --------------------------------------------------------
--
-- Структура таблицы `orders`
--
CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` json NOT NULL,
  `created_at` date NOT NULL,
  `type` int NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Структура таблицы `products`
--
CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `cost` int NOT NULL,
  `count` int NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Структура таблицы `users`
--
CREATE TABLE `users` (
  `id` int NOT NULL,
  `surname` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `patronymic` varchar(128) DEFAULT NULL,
  `login` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `basket` varchar(1024) NOT NULL,
  `role` int NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--
--
-- Индексы таблицы `orders`
--
ALTER TABLE
  `orders`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `customer` (`customer`, `type`);

--
-- Индексы таблицы `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE
  `orders`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE
  `users`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;