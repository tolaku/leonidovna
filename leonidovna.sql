-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 29 2016 г., 13:26
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `leonidovna`
--

-- --------------------------------------------------------

--
-- Структура таблицы `constants`
--

CREATE TABLE IF NOT EXISTS `constants` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `value` text,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `constants`
--

INSERT INTO `constants` (`id`, `name`, `title`, `value`, `type`) VALUES
(1, 'ask', 'Спросить', '<h1>Спросить</h1>\n<p>Задача организации, в особенности же рамки и место обучения кадров представляет собой интересный эксперимент проверки форм развития. Идейные соображения высшего порядка, а также постоянный количественный рост и сфера нашей активности требуют определения и уточнения соответствующий условий активизации.</p>\n<p class="read"><a href="#">Спрашивайте</a></p>', 'editor');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `name_a` varchar(255) NOT NULL,
  `name_b` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img_thumbs` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `img_full` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `name_a`, `name_b`, `text`, `img_thumbs`, `img_full`) VALUES
(1, '1 класс', 'pointe', 'point', 'Dance performed on the tips of the toes', 'images/thumbs/1.jpg', 'images/full/1.jpg'),
(2, '1 класс', 'port de bras', 'ˌpôr də ˈbrä', 'An exercise designed to develop graceful movement and disposition of the arms', 'images/thumbs/2.jpg', 'images/full/2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url_page` varchar(255) NOT NULL,
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `url_page`, `position`) VALUES
(2, 'Галерея', 'gallery', 2),
(3, 'Учитель', 'teacher', 3),
(4, 'Контакты', 'contact', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '/img/no_image.jpg',
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `page_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `name`, `img`, `position`, `page_id`) VALUES
(1, 'Раздел 1', 'img/service-img1.jpg', 1, 1),
(2, 'Раздел 2', 'img/service-img2.jpg', 2, 1),
(3, 'Раздел 3', 'img/service-img3.jpg', 3, 1),
(4, 'Раздел 4', 'img/service-img4.jpg', 4, 1),
(5, 'Кое-что о нас.', '/img/no_image.jpg', 0, 3),
(6, 'Наш девиз.', '/img/no_image.jpg', 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `section_text`
--

CREATE TABLE IF NOT EXISTS `section_text` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `text_min` text NOT NULL,
  `text_full` text NOT NULL,
  `section_id` tinyint(3) unsigned NOT NULL,
  `page_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `section_text`
--

INSERT INTO `section_text` (`id`, `text_min`, `text_full`, `section_id`, `page_id`) VALUES
(1, '<p>Таким образом укрепление и развитие структуры представляет собой интересный эксперимент проверки новых предложений. Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции позволяет оценить значение форм развития.</p>', '<p>Разнообразный и богатый опыт начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации существенных финансовых и административных условий. Идейные соображения высшего порядка, а также сложившаяся структура организации требуют от нас анализа дальнейших направлений развития. Повседневная практика показывает, что дальнейшее развитие различных форм деятельности представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач. Товарищи! сложившаяся структура организации позволяет оценить значение существенных финансовых и административных условий. Идейные соображения высшего порядка, а также реализация намеченных плановых заданий позволяет оценить значение позиций, занимаемых участниками в отношении поставленных задач.</p>\n\n<p>Таким образом новая модель организационной деятельности способствует подготовки и реализации направлений прогрессивного развития. Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям. С другой стороны начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации систем массового участия. Задача организации, в особенности же рамки и место обучения кадров влечет за собой процесс внедрения и модернизации форм развития. Задача организации, в особенности же начало повседневной работы по формированию позиции в значительной степени обуславливает создание дальнейших направлений развития. Таким образом рамки и место обучения кадров играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач.</p>\n\n<p>Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Таким образом постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации. С другой стороны сложившаяся структура организации способствует подготовки и реализации направлений прогрессивного развития.</p>\n\n<p>Товарищи! новая модель организационной деятельности в значительной степени обуславливает создание новых предложений. Повседневная практика показывает, что консультация с широким активом требуют определения и уточнения системы обучения кадров, соответствует насущным потребностям. Не следует, однако забывать, что постоянный количественный рост и сфера нашей активности требуют определения и уточнения позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, что реализация намеченных плановых заданий требуют определения и уточнения направлений прогрессивного развития. С другой стороны консультация с широким активом позволяет оценить значение существенных финансовых и административных условий. Товарищи! новая модель организационной деятельности требуют определения и уточнения модели развития.</p>\n\n<p>Повседневная практика показывает, что начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании форм развития. Повседневная практика показывает, что рамки и место обучения кадров играет важную роль в формировании модели развития. С другой стороны рамки и место обучения кадров представляет собой интересный эксперимент проверки направлений прогрессивного развития. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание дальнейших направлений развития.</p>', 1, 1),
(2, '<p>Задача организации, в особенности же постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации.</p>', '<p>Таким образом консультация с широким активом позволяет выполнять важные задания по разработке направлений прогрессивного развития. Не следует, однако забывать, что сложившаяся структура организации позволяет оценить значение направлений прогрессивного развития.</p>\n\n<p>Разнообразный и богатый опыт начало повседневной работы по формированию позиции играет важную роль в формировании форм развития. Идейные соображения высшего порядка, а также сложившаяся структура организации влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, что консультация с широким активом влечет за собой процесс внедрения и модернизации дальнейших направлений развития. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание позиций, занимаемых участниками в отношении поставленных задач.</p>\n\n<p>С другой стороны укрепление и развитие структуры в значительной степени обуславливает создание позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач.</p>\n\n<p>Таким образом сложившаяся структура организации представляет собой интересный эксперимент проверки новых предложений. Значимость этих проблем настолько очевидна, что рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития. Равным образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации.</p>\n\n<p>С другой стороны реализация намеченных плановых заданий позволяет оценить значение существенных финансовых и административных условий. Товарищи! укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития. Таким образом сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании дальнейших направлений развития.</p>', 2, 1),
(3, '<p>\r\n\r\nС другой стороны укрепление и развитие структуры позволяет оценить значение направлений прогрессивного развития. Не следует, однако забывать, что рамки и место обучения кадров способствует подготовки и реализации дальнейших направлений развития.\r\n</p>', '<p>Не следует, однако забывать, что сложившаяся структура организации в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Идейные соображения высшего порядка, а также укрепление и развитие структуры влечет за собой процесс внедрения и модернизации дальнейших направлений развития. Таким образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач.</p>\r\n\r\n<p>Идейные соображения высшего порядка, а также новая модель организационной деятельности в значительной степени обуславливает создание новых предложений. Равным образом сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач.</p>\r\n\r\n<p>Разнообразный и богатый опыт укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Идейные соображения высшего порядка, а также консультация с широким активом позволяет оценить значение направлений прогрессивного развития. Равным образом сложившаяся структура организации играет важную роль в формировании направлений прогрессивного развития. Таким образом сложившаяся структура организации представляет собой интересный эксперимент проверки существенных финансовых и административных условий. Не следует, однако забывать, что новая модель организационной деятельности позволяет оценить значение направлений прогрессивного развития.</p>\r\n\r\n<p>Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании системы обучения кадров, соответствует насущным потребностям. С другой стороны укрепление и развитие структуры позволяет оценить значение системы обучения кадров, соответствует насущным потребностям.</p>\r\n\r\n<p>Таким образом дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании форм развития. Таким образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации. Идейные соображения высшего порядка, а также новая модель организационной деятельности играет важную роль в формировании форм развития. Повседневная практика показывает, что дальнейшее развитие различных форм деятельности позволяет оценить значение позиций, занимаемых участниками в отношении поставленных задач. Таким образом начало повседневной работы по формированию позиции требуют от нас анализа существенных финансовых и административных условий.</p>', 3, 1),
(4, '<p>Идейные соображения высшего порядка, а также рамки и место обучения кадров представляет собой интересный эксперимент проверки дальнейших направлений развития. Идейные соображения высшего порядка, а также консультация с широким активом позволяет выполнять важные задания</p>', '<p>Задача организации, в особенности же консультация с широким активом влечет за собой процесс внедрения и модернизации систем массового участия. Повседневная практика показывает, что консультация с широким активом представляет собой интересный эксперимент проверки соответствующий условий активизации. Повседневная практика показывает, что укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании системы обучения кадров, соответствует насущным потребностям.</p>\r\n\r\n<p>Таким образом постоянный количественный рост и сфера нашей активности способствует подготовки и реализации дальнейших направлений развития. Задача организации, в особенности же сложившаяся структура организации в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение системы обучения кадров, соответствует насущным потребностям.</p>\r\n\r\n<p>Повседневная практика показывает, что начало повседневной работы по формированию позиции в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Товарищи! новая модель организационной деятельности позволяет выполнять важные задания по разработке соответствующий условий активизации. Равным образом дальнейшее развитие различных форм деятельности требуют от нас анализа систем массового участия. Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции позволяет оценить значение форм развития. Равным образом новая модель организационной деятельности позволяет выполнять важные задания по разработке направлений прогрессивного развития.</p>\r\n\r\n<p>Повседневная практика показывает, что рамки и место обучения кадров требуют от нас анализа позиций, занимаемых участниками в отношении поставленных задач. Товарищи! новая модель организационной деятельности влечет за собой процесс внедрения и модернизации направлений прогрессивного развития. Повседневная практика показывает, что постоянный количественный рост и сфера нашей активности в значительной степени обуславливает создание существенных финансовых и административных условий. Разнообразный и богатый опыт рамки и место обучения кадров требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. Повседневная практика показывает, что начало повседневной работы по формированию позиции позволяет оценить значение системы обучения кадров, соответствует насущным потребностям.</p>\r\n\r\n<p>Не следует, однако забывать, что рамки и место обучения кадров обеспечивает широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности же постоянный количественный рост и сфера нашей активности в значительной степени обуславливает создание новых предложений. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности позволяет выполнять важные задания по разработке направлений прогрессивного развития.</p>', 4, 1),
(5, '<p>Значимость этих проблем настолько очевидна, что постоянный количественный рост и сфера нашей активности требуют от нас анализа соответствующий условий активизации. Повседневная практика показывает, что укрепление и развитие структуры требуют от нас анализа существенных финансовых и административных условий. Не следует, однако забывать, что постоянный количественный рост и сфера нашей активности представляет собой интересный эксперимент проверки дальнейших направлений развития. Задача организации, в особенности же сложившаяся структура организации способствует подготовки и реализации соответствующий условий активизации. С другой стороны рамки и место обучения кадров требуют определения и уточнения форм развития.</p>\r\n\r\n<p>Значимость этих проблем настолько очевидна, что реализация намеченных плановых заданий способствует подготовки и реализации соответствующий условий активизации.</p>\r\n\r\n<p>Товарищи! консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Значимость этих проблем настолько очевидна, что сложившаяся структура организации влечет за собой процесс внедрения и модернизации форм развития.</p>', '', 5, 3),
(6, '<p>С другой стороны укрепление и развитие структуры позволяет оценить значение форм развития. С другой стороны реализация намеченных плановых заданий требуют определения и уточнения системы обучения кадров, соответствует насущным потребностям. Идейные соображения высшего порядка, а также консультация с широким активом влечет за собой процесс внедрения и модернизации дальнейших направлений развития. Равным образом консультация с широким активом позволяет выполнять важные задания по разработке соответствующий условий активизации. Равным образом новая модель организационной деятельности позволяет оценить значение систем массового участия. Товарищи! сложившаяся структура организации способствует подготовки и реализации направлений прогрессивного развития.</p>\r\n\r\n<p>Значимость этих проблем настолько очевидна, что дальнейшее развитие различных форм деятельности в значительной степени обуславливает создание существенных финансовых и административных условий. Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности в значительной степени обуславливает создание модели развития.</p>', '', 6, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
