-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 28 2020 г., 08:50
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lokrdbcollege`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addedlokr`
--

CREATE TABLE `addedlokr` (
  `id_date` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  `id_worker` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `addedlokr`
--

INSERT INTO `addedlokr` (`id_date`, `date`, `id_worker`, `id_user`) VALUES
(1, '2020-06-23 23:44:57', 1, 1),
(2, '2020-06-23 23:45:01', 1, 1),
(3, '2020-06-23 23:45:03', 2, 1),
(4, '2020-06-23 23:45:07', 2, 1),
(5, '2020-06-23 23:45:09', 1, 1),
(6, '2020-06-24 00:53:15', 1, 1),
(7, '2020-06-24 01:24:27', 1, 1),
(8, '2020-06-24 02:59:23', 1, 1),
(9, '2020-06-24 06:07:16', 1, 1),
(10, '2020-06-24 15:07:03', 1, 1),
(11, '2020-06-24 15:07:06', 1, 1),
(12, '2020-06-24 17:53:24', 2, 1),
(13, '2020-06-24 17:54:39', 1, 1),
(14, '2020-06-24 18:47:06', 15, 1),
(15, '2020-06-24 22:54:24', 1, 1),
(16, '2020-06-24 22:54:30', 1, 1),
(17, '2020-06-24 22:55:09', 1, 1),
(18, '2020-06-24 22:56:13', 1, 1),
(19, '2020-06-24 22:59:35', 1, 1),
(20, '2020-06-24 23:08:15', 1, 1),
(21, '2020-06-24 23:09:05', 1, 1),
(22, '2020-06-24 23:13:00', 1, 1),
(23, '2020-06-24 23:20:17', 1, 1),
(24, '2020-06-24 23:20:30', 1, 1),
(25, '2020-06-24 23:26:02', 1, 1),
(26, '2020-06-24 23:48:05', 1, 1),
(27, '2020-06-24 23:48:35', 1, 1),
(28, '2020-06-25 00:49:32', 1, 1),
(29, '2020-06-25 00:58:07', 1, 1),
(30, '2020-06-25 01:58:57', 1, 1),
(31, '2020-06-25 02:06:48', 1, 1),
(32, '2020-06-25 02:58:22', 1, 1),
(33, '2020-06-25 03:03:28', 1, 1),
(34, '2020-06-25 03:04:13', 1, 1),
(35, '2020-06-25 03:04:54', 1, 1),
(36, '2020-06-25 03:05:36', 1, 1),
(37, '2020-06-25 03:27:28', 1, 1),
(38, '2020-06-25 03:47:12', 1, 1),
(39, '2020-06-25 03:47:55', 1, 1),
(40, '2020-06-25 03:48:25', 1, 1),
(41, '2020-06-25 03:48:57', 1, 1),
(42, '2020-06-25 03:49:50', 1, 1),
(43, '2020-06-25 03:50:37', 1, 1),
(44, '2020-06-25 03:52:40', 1, 1),
(45, '2020-06-25 03:57:57', 1, 1),
(46, '2020-06-25 10:04:37', 1, 1),
(47, '2020-06-25 10:52:53', 1, 1),
(48, '2020-06-25 10:54:26', 1, 1),
(49, '2020-06-25 11:32:29', 1, 1),
(50, '2020-06-25 11:34:18', 1, 1),
(51, '2020-06-25 11:35:46', 1, 1),
(52, '2020-06-25 11:36:20', 1, 1),
(53, '2020-06-25 11:37:12', 1, 1),
(54, '2020-06-25 11:37:38', 1, 1),
(55, '2020-06-25 11:38:35', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `criterias`
--

CREATE TABLE `criterias` (
  `id` int(11) NOT NULL,
  `criterion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `criterias`
--

INSERT INTO `criterias` (`id`, `criterion`) VALUES
(1, 'Качество работы. Количество, частота и системность ошибок и брака'),
(2, 'Выполнение планов, разовых поручений, соблюдение сроков'),
(3, 'Соблюдение технологии и порядка проведения работ, документооборота, трудовой дисциплины'),
(4, 'Организация внедрения своих в нововведений в работу предприятия'),
(5, 'Профессиональные знания и навыки, использование их в работе. Компетентность. Самообразование.'),
(6, 'Исполнительность работника Готовность выполнять задания.'),
(7, 'Выполнение требований должностной инструкции. Умение самостоятельно решать проблемы.'),
(8, 'Эффективная  организация рабочего места и времени, производительность труда (работоспособность)'),
(9, 'Уважение  в отношениях с другими сотрудниками предприятия'),
(10, 'Взаимное  доверие в отношениях с другими сотрудниками предприятия'),
(11, 'Инициативность и заинтересованность в улучшениях.');

-- --------------------------------------------------------

--
-- Структура таблицы `downtable`
--

CREATE TABLE `downtable` (
  `id_downtable` int(11) NOT NULL,
  `IncentivePaymentCategory` int(11) NOT NULL,
  `NumberOfPoints` varchar(20) NOT NULL,
  `coefficient` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `downtable`
--

INSERT INTO `downtable` (`id_downtable`, `IncentivePaymentCategory`, `NumberOfPoints`, `coefficient`) VALUES
(1, 0, '0-12', 0),
(2, 1, '13-25', 0.1),
(3, 2, '26-30', 0.2),
(4, 3, '31-34', 0.3),
(5, 4, '35-38', 0.4),
(6, 5, '39-42', 0.5),
(7, 6, '43-46', 0.6),
(8, 7, '47-50', 0.7),
(9, 8, '51-54', 0.8),
(10, 9, '55-61', 0.9),
(11, 10, '62-70', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `incidents`
--

CREATE TABLE `incidents` (
  `id_incident` int(11) NOT NULL,
  `date_incident` date NOT NULL,
  `incident` varchar(255) NOT NULL,
  `id_worker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `incidents`
--

INSERT INTO `incidents` (`id_incident`, `date_incident`, `incident`, `id_worker`) VALUES
(5, '2020-06-24', 'Здесь должен быть текст инцидента ссылка на пруф', 1),
(6, '2020-06-24', 'Здесь должен быть текст инцидента ссылка на пруф', 1),
(9, '2020-06-24', 'Здесь должен быть текст инцидента ссылка на пруф', 1),
(10, '2020-06-25', 'Инцидент (ссылка на пруф)', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `marks`
--

CREATE TABLE `marks` (
  `id_mark` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `marks`
--

INSERT INTO `marks` (`id_mark`, `mark`) VALUES
(1, 6),
(2, 8),
(3, 8),
(4, 3),
(5, 3),
(6, 5),
(7, 3),
(8, 5),
(9, 5),
(10, 3),
(11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id_worker` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id_worker`, `lastname`, `firstname`, `middlename`) VALUES
(1, 'Иванов', 'Иван', 'Иванович'),
(2, 'Фамилия', 'Имя', 'Отечествович'),
(15, 'asd', 'asd', 'asd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addedlokr`
--
ALTER TABLE `addedlokr`
  ADD PRIMARY KEY (`id_date`),
  ADD KEY `id_worker` (`id_worker`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `downtable`
--
ALTER TABLE `downtable`
  ADD PRIMARY KEY (`id_downtable`);

--
-- Индексы таблицы `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id_incident`),
  ADD KEY `id_worker` (`id_worker`);

--
-- Индексы таблицы `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id_mark`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id_worker`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addedlokr`
--
ALTER TABLE `addedlokr`
  MODIFY `id_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `downtable`
--
ALTER TABLE `downtable`
  MODIFY `id_downtable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id_incident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `marks`
--
ALTER TABLE `marks`
  MODIFY `id_mark` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `addedlokr`
--
ALTER TABLE `addedlokr`
  ADD CONSTRAINT `addedlokr_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `workers` (`id_worker`),
  ADD CONSTRAINT `addedlokr_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `incidents_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `workers` (`id_worker`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
