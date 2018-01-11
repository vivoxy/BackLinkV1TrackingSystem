<?php
	include "sistem/sistem.php";
	if($_SESSION["oturum"]==true){ 
	include "sayfalar/ust.php";
	include "sayfalar/sol.php";
	include "sayfalar/$CekOguzDosyayi.php";
	include "sayfalar/alt.php";
	}if($_SESSION['hesapadi']=="" OR $_SESSION["oturum"]==false){ 
	include "sayfalar/giris.php";}
?>