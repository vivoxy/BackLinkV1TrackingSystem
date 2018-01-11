<?php
	set_time_limit(0);
	error_reporting(0);	
	date_default_timezone_set('Asia/Istanbul');
	setlocale(LC_ALL,'tr_TR');
	session_start();
	ob_start();
	include "sistem/baglan.php";
	include "sistem/ayar.php";
	include "sistem/guvenlik.php";
	include "sistem/js.php";
	include "sistem/css.php";
	if($_GET["sayfa"]){$CekOguzDosyayi = $_GET["sayfa"];} else {$CekOguzDosyayi = "anasayfa";}
?>