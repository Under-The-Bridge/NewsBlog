-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 06 2026 г., 15:07
-- Версия сервера: 5.7.39
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
  `category_id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
  `comment_id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text COLLATE utf8mb4_unicode_ci,
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
(6, 21, 10, '&lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;exampleInputEmail1&quot; aria-describedby=&quot;emailHelp&quot;&gt;', '2026-03-01 13:15:23', 'Удален'),
(7, 20, 10, 'Кку', '2026-03-02 15:00:05', 'Удален'),
(8, 20, 13, 'PHP говно полное!', '2026-03-02 15:00:43', 'Активен'),
(9, 21, 13, 'Собачки круче!', '2026-03-02 15:00:57', 'Активен'),
(10, 3, 13, 'АНиме не круто', '2026-03-02 16:12:35', 'Активен'),
(11, 25, 14, 'Аниме для тупых', '2026-03-02 16:49:20', 'Активен'),
(12, 25, 10, 'Samat сам ты тупой', '2026-03-02 16:51:06', 'Активен'),
(13, 25, 13, 'Манга лучше ваших аниме!', '2026-03-02 16:52:03', 'Активен'),
(14, 25, 16, 'незуко one love!', '2026-03-06 14:32:19', 'Активен');

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `news_id` int(11) NOT NULL,
  `image` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `status` enum('active','deleted') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`news_id`, `image`, `title`, `content`, `category_id`, `publish_date`, `status`) VALUES
(3, '5418111706904333262.jpg', 'АНИМЕЕЕЕЕЕ', 'АНИМЕ ЭТО ОЧЕНЬ КРУТО!!1!111!!!!!1!1!!!!!1!!!!!!!1!!!!1!1', 3, '2026-02-27 16:37:54', 'active'),
(4, '5418111706904333262.jpg', '12321323', '123213123', 1, '2026-02-27 16:41:12', 'active'),
(19, '5418111706904333262.jpg', 'АРАРАОЛРЫДЛОАРЫВДЛАРЛВАВОАЫВЩПРДЩЫРВ', 'АЛЖДОЫВДЛПЖРВЫПЫВПРЖВПОППП', 3, '2026-02-27 17:02:43', 'active'),
(20, 'maxresdefault (1).jpg', 'PHP - ВСЁ⚡⚡⚡⚡⚡УМЕР', 'PHP проживает свои последние дни! Теперь все веб сайты переходят на новый язык программирования \"ZXC\", он работает на 35% быстрее и безопасен, короче умер', 2, '2026-02-27 17:23:37', 'active'),
(21, '-wMuC7K.jpg', 'ИГРА ГОДА????', 'MewGenics новая игра от создателя the bindig of isaac, рпг рогалик где нужно разводить котов', 1, '2026-02-27 17:24:43', 'active'),
(25, 'maxresdefault.jpg', 'Аниме - В С Е⚡⚡⚡⚡⚡', 'Аниме становится все более популярным, но разговоры о его возможном запрете постоянно растут. Это может происходить по нескольким причинам, таким как цензура, конкуренция с другими медиа и давление общественных групп. Запрет аниме приведет к потере уникального культурного наследия и может вызвать рост пиратства, так как люди будут искать нелегальные источники. Кроме того, ограничения могут привести к социальному недовольству и протестам. Важно поддерживать легальные платформы, чтобы сохранить аниме для будущих поколений.', 3, '2026-03-02 16:48:02', 'active'),
(26, 'photo_5456276395450824013_x.jpg', 're', 'fghfjughj', 1, '2026-03-06 12:27:44', 'active'),
(28, 'maxresdefault.jpg', '123123', '123123', 3, '2026-03-06 13:45:32', 'active');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(7, '213', '123', 'dwd@efefef', 'user'),
(8, '123', '123', 'oleg@oleg', 'user'),
(9, 'wqe', '123', 'natalya@mail.ru', 'user'),
(10, 'ramz', '321', 'ramz@ramz', 'user'),
(12, 'qwe', '123', 'q@q', 'user'),
(13, 'ars', '123', 'ars@ars', 'user'),
(14, 'Samat', '123', 's@s', 'user'),
(15, 'ra', 'ra', 'ra@ra', 'user'),
(16, 'мотя', '123', 'motya@mail.ru', 'user'),
(17, 'admin', 'admin', 'admin@admin', 'admin');

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
