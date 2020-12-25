SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS  `wxzdy_share`;
CREATE TABLE `wxzdy_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(32) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `description` varchar(32) DEFAULT NULL,
  `img` text,
  `redirect_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;

