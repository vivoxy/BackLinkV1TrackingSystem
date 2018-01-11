DROP TABLE IF EXISTS `Ayarlar`;
CREATE TABLE `Ayarlar` (
  `SiteBaslik` varchar(200) NOT NULL,
  `SiteAdres` varchar(400) NOT NULL,
  `Keywords` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `EPosta` varchar(200) NOT NULL,
  `GSMHesap` varchar(200) NOT NULL,
  `GSMSifre` varchar(200) NOT NULL,
  `GSMBaslik` varchar(200) NOT NULL,
  `SiteDurum` varchar(200) NOT NULL,
  PRIMARY KEY (`SiteBaslik`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `Ayarlar` (`SiteBaslik`, `SiteAdres`, `Keywords`, `Description`, `EPosta`, `GSMHesap`, `GSMSifre`, `GSMBaslik`, `SiteDurum`) VALUES ('Gokmen Backlink', 'http://localhost/gback/', 'gokmen,backlink,gback', 'Gokmen Backlink Script v1', 'mail@gokmendc.com', '#', '#', '#', 'ACIK');

DROP TABLE IF EXISTS `IP_Ban`;
CREATE TABLE `IP_Ban` (
  `IpAdresi` varchar(200) NOT NULL,
  `Durum` varchar(200) NOT NULL,
  `Tarih` varchar(200) NOT NULL,
  PRIMARY KEY (`IpAdresi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `IslemGecmisi`;
CREATE TABLE `IslemGecmisi` (
  `Numara` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Yapan` varchar(200) NOT NULL,
  `Olay` varchar(200) NOT NULL,
  `Tarih` varchar(200) NOT NULL,
  `Tip` varchar(200) NOT NULL,
  PRIMARY KEY (`Numara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Kullanici`;
CREATE TABLE `Kullanici` (
  `Numara` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `HesapAdi` varchar(200) NOT NULL,
  `Sifre` varchar(200) NOT NULL,
  `AdSoyad` varchar(200) NOT NULL,
  `EPosta` varchar(200) NOT NULL,
  `Resim` varchar(200) NOT NULL,
  PRIMARY KEY (`Numara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `Kullanici` (`Numara`, `HesapAdi`, `Sifre`, `AdSoyad`, `EPosta`, `Resim`) VALUES ('1', 'admin', '123123', 'Oğuzcan GÖKMEN', 'mail@gokmendc.com', 'tema/images/avatar.png');

DROP TABLE IF EXISTS `Kategoriler`;
CREATE TABLE `Kategoriler` (
  `Numara` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Kategori` varchar(200) NOT NULL,
  PRIMARY KEY (`Numara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Siteler`;
CREATE TABLE `Siteler` (
  `Numara` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SiteAdi` varchar(200) NOT NULL,
  `SiteURL` varchar(200) NOT NULL,
  `Backlink` varchar(200) NOT NULL,
  `Kategori` varchar(200) NOT NULL,
  `Tarih` varchar(200) NOT NULL,
  PRIMARY KEY (`Numara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Backlink`;
CREATE TABLE `Backlink` (
  `Numara` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `BackAdi` varchar(200) NOT NULL,
  `BackURL` varchar(200) NOT NULL,
  PRIMARY KEY (`Numara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;