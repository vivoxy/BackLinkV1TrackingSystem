<?php
	$DomainNedir	=	str_replace('www.', '', $_SERVER['HTTP_HOST']);
	$SunucuIP		=	"localhost";
	$Kullanici		=	"root";
	$Sifre			=	"123123123";
	$Depo			=	"backlink";
	
	mysql_connect($SunucuIP, $Kullanici, $Sifre);
	mysql_select_db($Depo);
	mysql_query("SET NAMES utf8");
	mysql_query("SET COLLACTION utf8_turkish_ci");
?>
