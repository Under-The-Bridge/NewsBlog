-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 02 2026 г., 13:21
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `NewsBlog-2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE `Categories` (
  `category_id` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`category_id`, `name`) VALUES
(1, 'Развлечение'),
(2, 'IT'),
(3, 'Аниме');

-- --------------------------------------------------------

--
-- Структура таблицы `Comments`
--

CREATE TABLE `Comments` (
  `comment_id` int NOT NULL,
  `news_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `comment_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `comment_date` datetime DEFAULT NULL,
  `comment_status` enum('Активен','Удален') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Comments`
--

INSERT INTO `Comments` (`comment_id`, `news_id`, `user_id`, `comment_text`, `comment_date`, `comment_status`) VALUES
(1, 21, 10, 'Это очень крутая игра!', '2026-02-28 20:41:08', 'Активен'),
(2, 21, 12, 'Коты самые крутык!', '2026-02-28 21:01:08', 'Активен'),
(3, 20, 10, 'Жаль, очень крутым ЯП был 😭😢😭', '2026-02-28 21:13:10', 'Активен'),
(6, 21, 10, '&lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;exampleInputEmail1&quot; aria-describedby=&quot;emailHelp&quot;&gt;', '2026-03-01 13:15:23', 'Удален');

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `news_id` int NOT NULL,
  `image` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`news_id`, `image`, `title`, `content`, `category_id`, `publish_date`) VALUES
(3, '', 'АНИМЕЕЕЕЕЕ', 'АНИМЕ ЭТО ОЧЕНЬ КРУТО!!1!111!!!!!1!1!!!!!1!!!!!!!1!!!!1!1', 3, '2026-02-27 16:37:54'),
(4, '', '12321323', '123213123', 1, '2026-02-27 16:41:12'),
(5, '', '12312312', '123121221213', 1, '2026-02-27 16:41:17'),
(6, '', '1231212213', '123131132123', 1, '2026-02-27 16:41:21'),
(7, '', '123', '13', 1, '2026-02-27 16:42:17'),
(8, '', '123123', '12312332133', 1, '2026-02-27 16:42:21'),
(10, '', 'qweqweweq', 'qweqwewqe', 1, '2026-02-27 16:42:30'),
(11, '', 'dfsdds', 'sdfdsfdf', 1, '2026-02-27 16:42:47'),
(12, '', 'rgrggegr', 'gregeer', 1, '2026-02-27 16:43:16'),
(13, '', 'egeggrg', 'dfdfdfdg', 1, '2026-02-27 16:43:20'),
(14, '', 'yukyukuyyu', 'yukuykuuk', 3, '2026-02-27 16:43:37'),
(15, '', 'ffdbgfb', 'gfngfgfnng', 1, '2026-02-27 16:44:01'),
(18, '', 'ewrewr', 'wqewqew', 1, '2026-02-27 16:52:34'),
(19, '', 'АРАРАОЛРЫДЛОАРЫВДЛАРЛВАВОАЫВЩПРДЩЫРВ', 'АЛЖДОЫВДЛПЖРВЫПЫВПРЖВПОППП', 3, '2026-02-27 17:02:43'),
(20, '', 'PHP - ВСЁ⚡⚡⚡⚡⚡УМЕР', 'PHP проживает свои последние дни! Теперь все веб сайты переходят на новый язык программирования \"ZXC\", он работает на 35% быстрее и безопасен, короче умер', 2, '2026-02-27 17:23:37'),
(21, '', 'ИГРА ГОДА????', 'MewGenics новая игра от создателя the bindig of isaac, рпг рогалик где нужно разводить котов', 1, '2026-02-27 17:24:43');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `user_id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `password`, `email`) VALUES
(7, '213', '123', 'dwd@efefef'),
(8, '123', '123', 'oleg@oleg'),
(9, 'wqe', '123', 'natalya@mail.ru'),
(10, 'ramz', '321', 'ramz@ramz'),
(12, 'qwe', '123', 'q@q');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `News` (`news_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `News`
--
ALTER TABLE `News`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
