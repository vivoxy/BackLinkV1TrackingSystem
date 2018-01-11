<?php
## CSS Modüllerimiz ##
function GokmenCSSAyir($sayfane){
if ($sayfane == "anasayfa" OR $sayfane == "hakkinda")
{echo '<link href="tema/css/style.default.css" rel="stylesheet">
        <link href="tema/css/morris.css" rel="stylesheet">
        <link href="tema/css/select2.css" rel="stylesheet" />
';}

if ($sayfane == "404"){echo '<link href="tema/css/style.default.css" rel="stylesheet">
';}

if ($sayfane == "siteler" OR $sayfane == "kategoriler" OR $sayfane == "backlink" OR $sayfane == "siteayarlari" OR $sayfane == "hesabim")
{echo '<link href="tema/css/style.default.css" rel="stylesheet">
		<link href="tema/css/select2.css" rel="stylesheet" />
        <link href="tema/css/style.datatables.css" rel="stylesheet">
        <link href="//cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">
';}

}
?>