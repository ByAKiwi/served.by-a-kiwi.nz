delimiter $$

CREATE TABLE `imageRequests` (
  `image` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `referer` varchar(255) NOT NULL,
  PRIMARY KEY (`type`,`image`,`referer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

