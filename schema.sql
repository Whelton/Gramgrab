CREATE TABLE IF NOT EXISTS `gramgrab` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(100) default NULL,
  `user_id` varchar(100) NOT NULL default '',
  `access_token` varchar(100) default NULL,
  `time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=118 ;
