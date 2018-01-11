<?php
	## Genel Ayarlar ##
	include "baglan.php";
	$ayar = mysql_fetch_array(mysql_query("select * from Ayarlar"));
	## Sabitler ##
	define("URL", $ayar["SiteAdres"]);
	define("BASLIK", $ayar["SiteBaslik"]);
	define("EPOSTA", $ayar["EPosta"]);
	define("KEYWORDS", $ayar["Keywords"]);
	define("DESCRIPTION", $ayar["Description"]);
	define("GSMHESABIM", $ayar["GSMHesap"]);
	define("GSMSIFREM", $ayar["GSMSifre"]);
	define("GSMBASLIK", $ayar["GSMBaslik"]);
	define("SITEDURUM", $ayar["SiteDurum"]);
?>