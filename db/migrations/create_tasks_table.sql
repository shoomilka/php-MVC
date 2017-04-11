CREATE TABLE `tasks` (
  `id` INTEGER PRIMARY KEY,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0'
);