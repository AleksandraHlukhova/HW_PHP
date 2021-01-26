-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 26 2021 г., 20:23
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `post_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Ботаніка'),
(2, 'Комедія'),
(3, 'Комп\'ютери'),
(4, 'Кухня');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `user_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `post_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `description` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `description`, `date`) VALUES
(1, 1, 1, 'Not Bad , Not Bad, now you!', '2020-11-11 18:02:55'),
(2, 2, 1, 'Nooooooooooo', '2020-11-07 18:09:58'),
(3, 2, 1, 'Ill find you', '2020-11-07 18:11:15'),
(4, 3, 2, 'Google.com', '2020-12-16 08:26:30'),
(5, 4, 3, 'Bad', '2020-11-07 18:11:38'),
(9, 7, 2, 'ooooops, it looks so bad :((', '2020-12-23 00:08:33'),
(21, 6, 1, 'eachhhhh, it`s also me', '2020-12-23 16:01:02'),
(30, 8, 1, 'xdvvddvzvzvdzvzdv', '2020-12-28 19:39:56'),
(39, 8, 4, 'This is awesome!!))', '2021-01-11 21:17:25');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `user_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `category_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('saved','posted','inprocess','rejected','approved') NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `description`, `status`, `date`) VALUES
(1, 1, 1, 'Зелені рослини', 'Зеле́ні росли́ни — царство живих організмів. Назва була запропонована у 1981[1] році, щоб відрізнити представників царства від попереднього визначення рослин, які до того не утворювали монофілетичну групу. Також царство відоме під назвою Chlorobionta[2] або група Chlorophyta/Embryophyta.[3] Більшість членів царства були включені до царства Рослини (Plantae) в 1866 Ернстом Геккелем. Представники царства — автотрофні організми, для яких є характерною здатність до фотосинтезу та наявність щільної клітинної оболонки, яка утворена здебільшого целюлозою. Запасною речовиною у рослин є, як правило, крохмаль. Рослини є першою ланкою всіх харчових ланцюжків, так що від них залежить життя тварин. Вони є джерелом більш як десяти тисяч біологічно активних речовин, які діють на організм людини та тварин, зокрема при вживанні у їжу.\r\n\r\nВивченням рослин займається ботаніка.', 'posted', '2020-11-17 12:00:01'),
(2, 2, 2, 'Назад в майбутнє', '«Назад у майбутнє» (англ. Back to the Future) — культовий американський фантастичний пригодницький фільм режисера Роберта Земекіса та виконавчих продюсерів Стівена Спілберга, Френка Маршалла та Кетлін Кеннеді. Прем\'єра відбулася 3 липня 1985 року в США і Канаді. Дістав рейтинг PG від організації Motion Picture Association of America (MPAA) — «Дітям рекомендується перегляд спільно з батьками».\r\n\r\nНа 1 серпня 2020 року фільм займав 35-у позицію у списку «250 найрейтинговіших фільмів IMDb».\r\n\r\nСценаристами фільму стали Боб Ґейл і Роберт Земекіс. У фільмі знімались Майкл Джей Фокс у ролі Марті МакФлая, а також Крістофер Ллойд, Леа Томпсон, Криспін Гловер і Томас Ф. Вілсон.\r\n\r\n«Назад у майбутнє» — це історія про підлітка, що випадково потрапив із 1985 в 1955 рік. Він натрапляє на своїх батьків, учнів середньої школи, й випадково пробуджує романтичний інтерес з боку своєї матері. Марті мусить компенсувати завдану шкоду історії, примусивши своїх батьків покохати одне одного, а також він має знайти спосіб повернутися назад у 1985 рік.\r\n\r\nЧисленні студії відхиляли сценарій, проте кінокомпанія Universal Pictures не відмовила молодим авторам. Продюсером фільму став Стівен Спілберг.\r\n\r\nФільм став найуспішнішим фільмом року, зібравши понад 380 млн доларів США по всьому світу, а також діставши численні позитивні відгуки критиків. Він здобув премію Г\'юго за найкращу постановку і Saturn Award за найкращий фантастичний фільм, а також «Оскар»[2], «Золотий глобус» і BAFTA — найпрестижніші кінонагороди США і Великої Британії. Президент США Рональд Рейган навіть уживав цитати з фільму. 2006 року Бібліотека Конгресу США обрала цей фільм для збереження в Національний реєстр фільмів, а в липні 2008 року Американський інститут кіномистецтва визнав фільм найкращим у жанрі наукової фантастики.\r\n\r\nФільм започаткував франшизу «Назад у майбутнє 2» (1989) і «Назад у майбутнє 3» (1990), а також серію мультфільмів і коміксів.', 'posted', '2020-11-24 07:00:01'),
(3, 3, 3, 'Процесор', 'Проце́сор (англ. processor, нім. Prozessor) — основний компонент комп\'ютера, призначений для керування всіма його пристроями та виконання арифметичних і логічних операцій над даними.\r\n\r\nЦентральний процесор — частина комп\'ютера, що реалізує процес переробки інформації і координує роботу периферійних пристроїв. У комп\'ютері може бути декілька процесорів, що працюють паралельно — такі комп\'ютери називають багатопроцесорними.\r\nСкладна логічна програма, що є частиною системи програмування; підсистема обробки даних, що перетворює кодовану інформацію отриману від системи введення. Приклад: текстовий процесор.\r\nПоширені види цифрових процесорів:\r\n\r\nЦентральний процесор (CPU). Якщо процесор виготовлений у вигляді інтегральної схеми — мікропроцесор.\r\nГрафічний процесор (GPU)\r\nПрискорений процесор (APU): центральний і графічний процесори, поєднані у одній мікросхемі\r\nПроцесор цифрових сигналів (DSP)', 'posted', '2020-11-09 15:00:05'),
(4, 4, 4, 'Приготування пиріжків', 'Інгредієнти\r\n1 стакан кефіру\r\n0.5 склянки олії\r\n1 пакетик (11 грамів) сухих дріжджів\r\n1 ч. ложка солі\r\n1 ст. ложка цукру\r\n3 стакана борошна\r\nПриготування: Кефір змішати олією й трохи підігріти, додати сіль і цукор, борошно просіяти і змішати з дріжджами, влити поступово кефірну суміш і замісити тісто, накрити і поставити в тепло на 30 хвилин. Поки тісто буде підходити, можна приготувати начинку. Деко застелити промасленим папером, сформувати пиріжки, укладати на деко швом вгору. Поки нагрівається духовка. дати їм трохи постояти (хвилин 10), потім змастити пиріжки яйцем. Випікати за температури 180-200 градусів до золотистого кольору.\r\n\r\nДо слова, з цього тіста можна пекти абсолютно все: піцу, пиріжки, булочки (в тісто можна додати ваніль, трохи більше цукру і трохи розтопленого маргарину). Тісто завжди виходить. Якщо вам здасться, що за 30 хвилин воно підійшло не надто сильно, не турбуйтеся, так і повинно бути, це тісто піднімається при випічці.\r\n', 'posted', '2020-11-01 03:00:10'),
(24, 6, 1, 'Nature', 'Турция традиционно в наших умах занимает место летнего направления — пляжи, море, курорты и т.п. Но, путешествовать по Турции можно круглый год. Весенние путешествия, к тому же, имеют ряд преимуществ в виде мягкой теплой погоды, отсутствия нереальных толп туристов в знаковых местах и низких цен.\r\n\r\nПланируя путешествие в Турцию на весну сразу следует определиться с ожиданиями. Традиционного пляжного отдыха весной не получится — вода в море будет холодной, погода может быть переменчивой, а большая часть курортных городов будет находится в состоянии дрёмы. Так что, если вы хотите пляжного отдыха — отложите поездку на лето.', 'posted', '2020-12-23 13:15:11'),
(26, 6, 1, 'Music', 'Весной же в Турцию нужно ехать за длинными прогулками, знакомством с удивительными историческими достопримечательностями, треккингами и купанием в термальных водах, местными СПА и вкуснейшей едой. Будьте морально готовы к любой погоде. Пакуйте купальники, майки-футболки на случай жаркой погоды и флисовые кофты и тепленькие куртки на случай холодной. Обязательно включайте в маршрут направления с термальными источниками и/или бронируйте СПА-отели хотя бы на пару дней в финальной релаксной части путешествия.\r\n\r\nНиже — лучшие направления для путешествия по Турции весной.', 'posted', '2020-12-23 16:37:05'),
(27, 8, 1, 'Oдна из звёзд нашей Галактики', 'Со́лнце (астр. ☉) — одна из звёзд нашей Галактики (Млечный Путь) и единственная звезда Солнечной системы. Вокруг Солнца обращаются другие объекты этой системы: планеты и их спутники, карликовые планеты и их спутники, астероиды, метеороиды, кометы и космическая пыль.\r\n\r\nПо спектральной классификации Солнце относится к типу G2V (жёлтый карлик). Средняя плотность Солнца составляет 1,4 г/см³ (в 1,4 раза больше, чем у воды). Эффективная температура поверхности Солнца — 5780 кельвин[7]. Поэтому Солнце светит почти белым светом, но прямой свет Солнца у поверхности нашей планеты приобретает некоторый жёлтый оттенок из-за более сильного рассеяния и поглощения коротковолновой части спектра атмосферой Земли (при ясном небе, вместе с голубым рассеянным светом от неба, солнечный свет вновь даёт белое освещение).\r\n\r\nСолнечное излучение поддерживает жизнь на Земле (свет необходим для начальных стадий фотосинтеза), определяет климат.', 'posted', '2020-12-23 16:46:16'),
(32, 8, 1, 'Nature', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'posted', '2020-12-28 17:49:09'),
(34, 8, 1, 'sdvsvdvsdvsv', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'posted', '2020-12-28 17:50:02');

-- --------------------------------------------------------

--
-- Структура таблицы `post_bookmarks`
--

CREATE TABLE `post_bookmarks` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'Pk',
  `user_id` int(11) UNSIGNED NOT NULL COMMENT 'Fk',
  `post_id` int(11) UNSIGNED NOT NULL COMMENT 'Fk',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `post_bookmarks`
--

INSERT INTO `post_bookmarks` (`id`, `user_id`, `post_id`, `status`) VALUES
(16, 8, 2, 1),
(17, 8, 3, 1),
(19, 8, 34, 1),
(20, 8, 27, 1),
(21, 8, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `user_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `post_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `post_likes`
--

INSERT INTO `post_likes` (`id`, `user_id`, `post_id`, `status`) VALUES
(1, 1, 3, 1),
(2, 2, 1, 1),
(3, 2, 4, 1),
(4, 1, 4, 1),
(5, 1, 1, 1),
(162, 6, 24, 1),
(181, 8, 3, 1),
(183, 8, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post_photos`
--

CREATE TABLE `post_photos` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `post_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `photo_path` varchar(100) NOT NULL COMMENT 'Text(photo)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `post_photos`
--

INSERT INTO `post_photos` (`id`, `post_id`, `photo_path`) VALUES
(1, 1, 'storage/4b9334c52c9bdd0f34f4605f8760845ae1424f6ef4f8129f4903e9d4f1bbdf85.jpg'),
(2, 2, 'storage/4b9334c52c9bdd0f34f4605f8760845ae1424f6ef4f8129f4903e9d4f1bbdf85.jpg'),
(3, 3, 'storage/4b9334c52c9bdd0f34f4605f8760845ae1424f6ef4f8129f4903e9d4f1bbdf85.jpg'),
(4, 4, 'storage/4b9334c52c9bdd0f34f4605f8760845ae1424f6ef4f8129f4903e9d4f1bbdf85.jpg'),
(12, 24, 'storage/4b9334c52c9bdd0f34f4605f8760845ae1424f6ef4f8129f4903e9d4f1bbdf85.jpg'),
(13, 26, 'storage/c7194f8e59c8dac99478079d9158ecdf15bc01d69a1b044e2ab564852b2b2b48.jpg'),
(21, 34, 'storage/c7194f8e59c8dac99478079d9158ecdf15bc01d69a1b044e2ab564852b2b2b48.jpg'),
(23, 27, 'storage/4b9334c52c9bdd0f34f4605f8760845ae1424f6ef4f8129f4903e9d4f1bbdf85.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `login`, `pass`) VALUES
(1, 'Vasia', 'vasia@gmail.com', '+380681236958', 'VasiaLogin', 'ggfdGFD%^55'),
(2, 'Petya', 'petya@gmail.com', '+380695895863', 'PetyaLogin', 'gfdg51g65fd'),
(3, 'Alina', 'alina@gmail.com', '+380681234888', 'AlinaLogin', 'ggfQWEQWFD%^55'),
(4, 'Katya', 'katya@gmail.com', '+380681236958', 'KatyaLogin', 'ggfdsfD%^55'),
(6, 'sasha', 'alexa00121@rambler.ru', '0993715642', 'alexa', '$2y$10$6n9GE14Fls7eqJzNw5Cj5eTYxUrue64Zrp5ctj2Zb8G4ITExg17QO'),
(7, 'Alexandra', 'a@rambler.ru', '0993715642', 'alex1', '$2y$10$V.4oahB7xqgBkV6tD6MT/O3aruHlVKW1LQmdKC2EXhng/5vK8/5Ya'),
(8, 'Alexandra Glukhova', 'alexa001213@rambler.ru', '0993715642', 'alexa', '$2y$10$ineoONo70tltAa6KqcXuZuqdHjlTlJhmiVKhlJBRJfr9wzP2G4g6a'),
(9, 'sasha', 'alexa001214@rambler.ru', '0993715642', 'alexa', '$2y$10$Qh7FkP5df6b6mzFisKXqf.gJQirKcRnIAtDNxDqgXACZxOGNHGoHq');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`user_id`),
  ADD KEY `comments_ibfk_2` (`post_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Индексы таблицы `post_bookmarks`
--
ALTER TABLE `post_bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `post_photos`
--
ALTER TABLE `post_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `post_bookmarks`
--
ALTER TABLE `post_bookmarks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Pk', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT для таблицы `post_photos`
--
ALTER TABLE `post_photos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_bookmarks`
--
ALTER TABLE `post_bookmarks`
  ADD CONSTRAINT `post_bookmarks_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_bookmarks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_photos`
--
ALTER TABLE `post_photos`
  ADD CONSTRAINT `post_photos_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
