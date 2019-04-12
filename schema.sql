CREATE TABLE `cas` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `encryption_salt` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `global` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `ccid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ccid`),
  UNIQUE KEY `global` (`global`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18244 DEFAULT CHARSET=latin1;
