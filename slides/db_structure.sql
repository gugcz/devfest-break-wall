CREATE TABLE IF NOT EXISTS `sessions` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) COLLATE utf8_czech_ci NOT NULL,
  `speaker` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `time` varchar(5) COLLATE utf8_czech_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ;
