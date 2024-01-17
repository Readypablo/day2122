-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 12 2024 г., 10:03
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `day13`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `first_name` varchar(999) NOT NULL,
  `img` varchar(999) NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `first_name`, `img`, `cost`) VALUES
(1, 'калькулятор', '1.jpg', 557),
(2, 'клей', '22.png', 2),
(3, 'подставки бумаги', '3.jpg', 222),
(4, 'скрепки', '43.png', 333),
(5, 'листики', '5.png', 444),
(6, 'штампы', '6.png', 666);

-- --------------------------------------------------------

--
-- Структура таблицы `nots`
--

CREATE TABLE `nots` (
  `id` int NOT NULL,
  `first_namu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(50) NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Reviews`
--

CREATE TABLE `Reviews` (
  `id` int NOT NULL,
  `Content` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Reviews`
--

INSERT INTO `Reviews` (`id`, `Content`) VALUES
(1, '\"Большой выбор инструментов и отличное обслуживание! Я в восторге от моей новой гитары!\"'),
(2, '\"Этот магазин стал для меня находкой! Огромный выбор и профессиональный подход.\"'),
(3, '\"Удивительно, какой выбор струнных инструментов! Этот магазин - настоящая находка для музыкантов.\"'),
(4, '\"Спасибо за помощь в выборе! Мой новый саксофон - просто шедевр!\"'),
(6, '\"Очень доволен покупкой клавишного инструмента. Отличное качество и звучание!\"'),
(7, '\"Спасибо за ваше внимание к деталям. Моя новая скрипка - настоящее произведение искусства!\"'),
(8, '\"Моя новая электрогитара - просто космос! Спасибо за отличное обслуживание.\"'),
(9, '\"Очень удобный интерфейс сайта, легко находить и заказывать нужные инструменты.\"'),
(10, '\"Этот магазин стал для меня настоящим открытием. Я нашел здесь именно то, что искал!\"'),
(12, '\"Очень привлекательные цены и высокое качество инструментов. Буду рекомендовать вас всем музыкантам!\"');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `data`, `password`, `email`) VALUES
(1, 'admin', 'admin', '12345678', '2023-06-07', '123123', '11111'),
(21, '1', '1', '1', '2024-01-24', '1', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `workout`
--

CREATE TABLE `workout` (
  `id` int NOT NULL,
  `first_namee` varchar(50) NOT NULL,
  `lek_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `workoutnot`
--

CREATE TABLE `workoutnot` (
  `id` int NOT NULL,
  `first_nameee` varchar(50) NOT NULL,
  `not_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nots`
--
ALTER TABLE `nots`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_namee` (`first_namee`),
  ADD KEY `lek_id` (`lek_id`);

--
-- Индексы таблицы `workoutnot`
--
ALTER TABLE `workoutnot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `not_id` (`not_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `nots`
--
ALTER TABLE `nots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `workout`
--
ALTER TABLE `workout`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `workoutnot`
--
ALTER TABLE `workoutnot`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `workout`
--
ALTER TABLE `workout`
  ADD CONSTRAINT `workout_ibfk_1` FOREIGN KEY (`lek_id`) REFERENCES `books` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `workoutnot`
--
ALTER TABLE `workoutnot`
  ADD CONSTRAINT `workoutnot_ibfk_1` FOREIGN KEY (`not_id`) REFERENCES `nots` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
