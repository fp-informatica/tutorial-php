CREATE TABLE IF NOT EXISTS `users` (
`id` int unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(40) NOT NULL,
`password` varchar(40) NOT NULL,
`email` varchar(100) NOT NULL,
`regdate` int unsigned NOT NULL,
`ip` varchar(40) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
