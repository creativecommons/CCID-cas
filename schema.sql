/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=39346 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casserver_lt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `consumed` datetime DEFAULT NULL,
  `client_hostname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_casserver_lt_on_ticket` (`ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=17634078 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casserver_pgt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `client_hostname` varchar(255) NOT NULL,
  `iou` varchar(255) NOT NULL,
  `service_ticket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_casserver_pgt_on_ticket` (`ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casserver_st` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(255) NOT NULL,
  `service` text NOT NULL,
  `created_on` datetime NOT NULL,
  `consumed` datetime DEFAULT NULL,
  `client_hostname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `granted_by_pgt_id` int(11) DEFAULT NULL,
  `granted_by_tgt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_casserver_st_on_ticket` (`ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=375607 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casserver_tgt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `client_hostname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `extra_attributes` text,
  PRIMARY KEY (`id`),
  KEY `index_casserver_tgt_on_ticket` (`ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=42244 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schema_migrations` (
  `version` varchar(255) NOT NULL,
  UNIQUE KEY `unique_schema_migrations` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
