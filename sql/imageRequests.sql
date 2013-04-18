delimiter $$

CREATE TABLE `imageRequests` (
  `image` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`type`,`image`,`referer`),
  UNIQUE KEY `referer_UNIQUE` (`referer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

