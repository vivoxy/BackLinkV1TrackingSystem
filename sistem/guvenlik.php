<?php
#### Yönetici Girişi ####
function giris($u,$p){
include "baglan.php";
if(($u) || ($p)){
$sql = mysql_query("SELECT * FROM Kullanici WHERE HesapAdi = '$u' AND Sifre = '$p'");
$result = mysql_num_rows($sql);
if($result > 0){
$yazgiris = mysql_fetch_array($sql);
$_SESSION["oturum"] = true;
$_SESSION['hesapnumaram'] = $yazgiris['Numara'];
$_SESSION['gercekisim'] = $yazgiris['AdSoyad'];
$_SESSION['email'] = $yazgiris['EPosta'];
$_SESSION['avatar'] = $yazgiris['Resim'];
$_SESSION['hesapadi'] = $yazgiris['HesapAdi'];
header("Location: anasayfa.html");}
else {header("Location: giris.html");}}
else {header("Location: giris.html");}
}
#### IP Okuma Modülü ####
function GercekIP()
{
if ( getenv( "HTTP_CLIENT_IP" ) )
{$ip = getenv( "HTTP_CLIENT_IP" );}
else if ( getenv( "HTTP_X_FORWARDED_FOR" ) ){
$ip = getenv( "HTTP_X_FORWARDED_FOR" );
if ( strstr( $ip, "," ) ){
$tmp = explode( ",", $ip );
$ip = trim( $tmp[0] );}}
else
{$ip = getenv( "REMOTE_ADDR" );}
return $ip;
}
#### İnject Kontrol ####
if (!function_exists('sql_inject_chec')) {
function sql_inject_chec(){
$badwords = array(";","' "," ' "," '",'"',"DROP", "SELECT", "UPDATE", "DELETE", "%", "drop", "select", "update", "delete", "WHERE", "where","exec","EXEC","procedure","PROCEDURE");
foreach($_REQUEST as $value)  {
foreach($badwords as $word)
if(substr_count($value, $word) > 0) {
include "baglan.php";
$ipadresitanioguz = GercekIP();
$sqlgonderoguz = @mysql_query( "SELECT * FROM IP_Ban WHERE IpAdresi = '{$ipadresitanioguz}'" );
$sqlsorgulaoguz = @mysql_fetch_array( $sqlgonderoguz );
$ipadresigetiroguz = $sqlsorgulaoguz['IpAdresi'];
if ( $ipadresitanioguz != $ipadresigetiroguz ){
$tarihkontrologuz = date( "d.m.Y H:i" );
$ipbanlahadioguz = mysql_query( "INSERT INTO IP_Ban (IpAdresi, Durum, Tarih) VALUES ('{$ipadresitanioguz}', '1', '{$tarihkontrologuz}')" );
header( "Location: anasayfa.html" );
exit( );}}}}
}
sql_inject_chec();
#### Ek Güvenlik Mekanızması ####
function EkGuvenlikGokmen($Korunuyor){
if(is_array($Korunuyor)){
foreach($Korunuyor as $BaslatOquz => $SonucOquz){
if(!is_array($SonucOquz)){
$Korunuyor[$BaslatOquz] = htmlspecialchars(strip_tags(urldecode(addslashes(stripslashes(stripslashes(trim(htmlspecialchars_decode($SonucOquz))))))));}
else{
$Korunuyor[$BaslatOquz] = EkGuvenlikGokmen($SonucOquz);
}}}
else{$Korunuyor = htmlspecialchars(strip_tags(urldecode(addslashes(stripslashes(stripslashes(trim(htmlspecialchars_decode($Korunuyor))))))));}
return $Korunuyor;
}
### CURL İşlemler ###
function curl($url,$header = true) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HEADER,$header);
	return curl_exec($curl);
}
function curl_get_contents($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_COOKIESESSION, true);
	curl_setopt($ch, CURLOPT_COOKIE, "cookie.txt");
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	$data = curl_exec($ch);
	curl_close($ch);

	return $data;
}
### Backlink İşlemler ###
function TemizDomain($url){
	$url = str_replace('http://','',$url);
	$url = explode('/',$url);
	return $url[0];
}
function StrToNum($Str, $Check, $Magic)
{
    $Int32Unit = 4294967296;  // 2^32

    $length = strlen($Str);
    for ($i = 0; $i < $length; $i++) {
        $Check *= $Magic;
        //If the float is beyond the boundaries of integer (usually +/- 2.15e+9 = 2^31),
        //  the result of converting to integer is undefined
        //  refer to http://www.php.net/manual/en/language.types.integer.php
        if ($Check >= $Int32Unit) {
            $Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
            //if the check less than -2^31
            $Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
        }
        $Check += ord($Str{$i});
    }
    return $Check;
}
function HashURL($String)
{
    $Check1 = StrToNum($String, 0x1505, 0x21);
    $Check2 = StrToNum($String, 0, 0x1003F);

    $Check1 >>= 2;
    $Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
    $Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
    $Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);

    $T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
    $T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );

    return ($T1 | $T2);
}
function CheckHash($Hashnum)
{
    $CheckByte = 0;
    $Flag = 0;

    $HashStr = sprintf('%u', $Hashnum) ;
    $length = strlen($HashStr);

    for ($i = $length - 1;  $i >= 0;  $i --) {
        $Re = $HashStr{$i};
        if (1 === ($Flag % 2)) {
            $Re += $Re;
            $Re = (int)($Re / 10) + ($Re % 10);
        }
        $CheckByte += $Re;
        $Flag ++;
    }

    $CheckByte %= 10;
    if (0 !== $CheckByte) {
        $CheckByte = 10 - $CheckByte;
        if (1 === ($Flag % 2) ) {
            if (1 === ($CheckByte % 2)) {
                $CheckByte += 9;
            }
            $CheckByte >>= 1;
        }
    }

    return '7'.$CheckByte.$HashStr;
}
function alexa_cek($url){
	$file = curl('http://anonymouse.org/cgi-bin/anon-www.cgi/http://data.alexa.com/data?cli=10&dat=s&url='.$url,false);
	preg_match('#POPULARITY.*?TEXT="(.*?)"#',$file,$pr);
	return number_format($pr[1]);
}
### Yönetim Modülü ###
function AyarlarNedirOguz($Bilgi){
$sql = mysql_query("SELECT * FROM Ayarlar");
$ck = mysql_fetch_array($sql);
echo $ck["$Bilgi"];
}
function AyarlarNedirOguzDongu($Bilgi){
$sql = mysql_query("SELECT * FROM Ayarlar");
$ck = mysql_fetch_array($sql);
return $ck["$Bilgi"];
}
function TabloVeriCekGoster($Tablo,$Bolge,$Deger,$Bilgi){
$sql = mysql_query("SELECT * FROM $Tablo where $Bolge = '$Deger'");
$ck = mysql_fetch_array($sql);
echo $ck["$Bilgi"];
}
function TabloVeriCekDondur($Tablo,$Bolge,$Deger,$Bilgi){
$sql = mysql_query("SELECT * FROM $Tablo where $Bolge = '$Deger'");
$ck = mysql_fetch_array($sql);
return $ck["$Bilgi"];
}
function GizleGosterOguz($Tablo,$Deger,$Bilgi){
mysql_query("UPDATE $Tablo SET Durum = '$Bilgi' WHERE Numara = '$Deger'");
UyariVerOguz("Destek Talebi Başarıyla $Bilgi Durumuna Alınmıştır");YonlendirOguz($_SERVER['HTTP_REFERER']);
}
function SilBeniOguz($Tablo,$Deger){
mysql_query("DELETE FROM $Tablo WHERE Numara = '$Deger'");
UyariVerOguz("Kayıt Başarıyla Kaldırıldı.");YonlendirOguz($_SERVER['HTTP_REFERER']);
}
#### Saydırma Mekanizması ####
function SayOguzSay($n){
include "baglan.php";
$sql = mysql_query("SELECT * FROM ".$n."");
$nekadan = mysql_num_rows($sql);
echo $nekadan;
}
#### Site Ayarları Mekanizması ####
function SiteAyarlariOguz(){
$SiteBaslik = EkGuvenlikGokmen($_POST["SiteBaslik"]);
$SiteAdres = EkGuvenlikGokmen($_POST["SiteAdres"]);
$Keywords = EkGuvenlikGokmen($_POST["Keywords"]);
$Description = EkGuvenlikGokmen($_POST["Description"]);
$SiteDurum = EkGuvenlikGokmen($_POST["SiteDurum"]);
if($_POST){
$sql = "UPDATE Ayarlar SET SiteBaslik = '$SiteBaslik', SiteAdres = '$SiteAdres', Keywords = '$Keywords', Description = '$Description', SiteDurum = '$SiteDurum'";
$res = mysql_query($sql);
if($res)
{UyariVerOguz("Site ayarları başarıyla düzenlenmiştir.");}}
}
function HesapAyarlariOguz($hesabim){
$HesapAdi = EkGuvenlikGokmen($_POST["HesapAdi"]);
$Sifre = EkGuvenlikGokmen($_POST["Sifre"]);
$AdSoyad = EkGuvenlikGokmen($_POST["AdSoyad"]);
$EPosta = EkGuvenlikGokmen($_POST["EPosta"]);
$Resim = EkGuvenlikGokmen($_POST["Resim"]);
if($_POST){
$sql = "UPDATE Kullanici SET HesapAdi = '$HesapAdi', Sifre = '$Sifre', AdSoyad = '$AdSoyad', EPosta = '$EPosta', Resim = '$Resim' WHERE Numara = '$hesabim'";
$res = mysql_query($sql);
if($res)
{UyariVerOguz("Hesap ayarları başarıyla düzenlenmiştir.");}}
}
### Select Döngüleri ###
function KategoriListeSelect($numara){
$sorayim = "SELECT * FROM Kategoriler where Numara NOT LIKE '$numara'";
$arayayim = mysql_query($sorayim);
while ($cekeyim = mysql_fetch_array($arayayim))
{echo'<option value="'.$cekeyim['Numara'].'"">'.$cekeyim["Kategori"].'</option>';}
}
function KategorimSelect($numara){
$sorayim = "SELECT * FROM Kategoriler where Numara ='$numara'";
$arayayim = mysql_query($sorayim);
while ($cekeyim = mysql_fetch_array($arayayim))
{echo'<option value="'.$cekeyim['Numara'].'"">'.$cekeyim["Kategori"].'</option>';}
}
function BacklinkListeSelect($numara){
$sorayim = "SELECT * FROM Backlink where BackURL NOT LIKE '$numara'";
$arayayim = mysql_query($sorayim);
while ($cekeyim = mysql_fetch_array($arayayim))
{echo'<option value="'.$cekeyim['BackURL'].'"">'.$cekeyim["BackAdi"].' ('.$cekeyim["BackURL"].')</option>';}
}
function BaclinkimSelect($numara){
$sorayim = "SELECT * FROM Backlink where BackURL ='$numara'";
$arayayim = mysql_query($sorayim);
while ($cekeyim = mysql_fetch_array($arayayim))
{echo'<option value="'.$cekeyim['BackURL'].'"">'.$cekeyim["BackAdi"].' ('.$cekeyim["BackURL"].')</option>';}
}
#### Liste Oluşturma Algoritması ####
function SiteBackSorgula($hangiurl, $backlinkim) {
$aramayap = preg_quote(rtrim($backlinkim, "/"), "/");
$sonuc = false;
if($baslangic = @fopen($hangiurl, "r")){
while(!feof($baslangic)){
$siraver = fread($baslangic, 1024);
if(preg_match("/<a(.*)href=[\"']".$aramayap."(\/?)[\"'](.*)>(.*)<\/a>/", $siraver)){
$sonuc = true;
break;}}
fclose($baslangic);}
return $sonuc;
}
function SitelerListele(){
$sql = mysql_query("SELECT * FROM Siteler ORDER by Kategori ASC");
while($ck = mysql_fetch_array($sql)){
$sql2 = mysql_query("SELECT * FROM Kategoriler WHERE Numara='".$ck["Kategori"]."'");
$konu = mysql_fetch_array($sql2);
echo '
<tr>
<td><a href="'.$ck["SiteURL"].'" target="_blank">'.$ck["SiteAdi"].'</a></td>
<td>'.$konu["Kategori"].'</td>
<td><font color="blue">'.alexa_cek(TemizDomain($ck["SiteURL"])).'</font></td>';
if(SiteBackSorgula($ck["SiteURL"],$ck["Backlink"])){
echo '<td><font color="green">Var (<small>'.$ck["Backlink"].'</small>)</font></td>';}
else{echo '<td><font color="red">Yok (<small>'.$ck["Backlink"].'</small>)</font></td>';};
echo '
<td>'.$ck["Tarih"].'</td>
<td>
<a class="btn btn-primary" href="site-duzenle/'.$ck["Numara"].'">
<i class="fa fa-fw fa-edit"></i> Düzenle
</a> -
<a class="btn btn-primary" href="site-sil/'.$ck["Numara"].'">
<i class="fa fa-fw fa-edit"></i> Kaldır
</a>
</td></tr>';}
}
function SiteDuzenle($numara){
if($_POST){
$HesapNedir = $_SESSION["HesapAdi"];
$SiteAdi= EkGuvenlikGokmen($_POST['SiteAdi']);
$SiteURL = EkGuvenlikGokmen($_POST['SiteURL']);
$Kategori = EkGuvenlikGokmen($_POST['Kategori']);
$Backlink = EkGuvenlikGokmen($_POST['Backlink']);
$Tarih = date("d.m.Y H:i:s");
$OlayNedir = "<b>$SiteAdi</b> Adlı Site Ayarları Başarıyla Güncellemiştir";
$sql = "UPDATE Siteler Set SiteAdi = '$SiteAdi' , SiteURL = '$SiteURL' , Kategori = '$Kategori' , Backlink = '$Backlink' , Tarih = '$Tarih' WHERE Numara = '$numara'";
$sql2 = "INSERT INTO IslemGecmisi Set Olay = '$OlayNedir', Tarih = '$Tarih', Yapan = '$HesapNedir', Tip = 'BackSiteler'";
$result = mysql_query($sql);
$result = mysql_query($sql2);
if($result)
{
UyariVerOguz("Backlink Site Ayarları Başarıyla Güncellendi");
YonlendirOguz("siteler.html");
}}
}
function SiteEkle(){
if($_POST){
$HesapNedir = $_SESSION["HesapAdi"];
$SiteAdi= EkGuvenlikGokmen($_POST['SiteAdi']);
$SiteURL = EkGuvenlikGokmen($_POST['SiteURL']);
$Kategori = EkGuvenlikGokmen($_POST['Kategori']);
$Backlink = EkGuvenlikGokmen($_POST['Backlink']);
$Tarih = date("d.m.Y H:i:s");
$OlayNedir = "<b>$SiteAdi</b> Adlı Site Başarıyla Eklendi";
$yollaSql = mysql_query("INSERT INTO Siteler SET SiteAdi = '$SiteAdi' , SiteURL = '$SiteURL' , Kategori = '$Kategori' , Backlink = '$Backlink' , Tarih = '$Tarih'");
$yollaSql = mysql_query("INSERT INTO IslemGecmisi Set Olay = '$OlayNedir', Tarih = '$Tarih', Yapan = '$HesapNedir', Tip = 'BackSiteler'");
if($yollaSql){
UyariVerOguz("Site Başarıyla Eklendi");
YonlendirOguz("siteler.html");}}
}
#### Kategori Algoritması ####
function KategoriListele(){
$sql = mysql_query("SELECT * FROM Kategoriler ORDER by Kategori ASC");
while($ck = mysql_fetch_array($sql)){
echo '
<tr>
<td>'.$ck["Kategori"].'</td>
<td>
<a class="btn btn-primary" href="kategori-duzenle/'.$ck["Numara"].'">
<i class="fa fa-fw fa-edit"></i> Düzenle
</a> -
<a class="btn btn-primary" href="kategori-sil/'.$ck["Numara"].'">
<i class="fa fa-fw fa-edit"></i> Kaldır
</a>
</td></tr>';}
}
function KategoriDuzenle($numara){
if($_POST){
$HesapNedir = $_SESSION["HesapAdi"];
$Kategori = EkGuvenlikGokmen($_POST['Kategori']);
$Tarih = date("d.m.Y H:i:s");
$OlayNedir = "<b>$Kategori</b> Adlı Kategori Ayarları Başarıyla Güncellemiştir";
$sql = "UPDATE Kategoriler Set Kategori = '$Kategori' WHERE Numara = '$numara'";
$sql2 = "INSERT INTO IslemGecmisi Set Olay = '$OlayNedir', Tarih = '$Tarih', Yapan = '$HesapNedir', Tip = 'BackSiteler'";
$result = mysql_query($sql);
$result = mysql_query($sql2);
if($result)
{
UyariVerOguz("Backlink Kategorisi Başarıyla Güncellendi");
YonlendirOguz("kategoriler.html");
}}
}
function KategoriEkle(){
if($_POST){
$HesapNedir = $_SESSION["HesapAdi"];
$Kategori= EkGuvenlikGokmen($_POST['Kategori']);
$Tarih = date("d.m.Y H:i:s");
$OlayNedir = "<b>$Kategori</b> Adlı Kategori Başarıyla Eklendi";
$yollaSql = mysql_query("INSERT INTO Kategoriler SET Kategori = '$Kategori'");
$yollaSql = mysql_query("INSERT INTO IslemGecmisi Set Olay = '$OlayNedir', Tarih = '$Tarih', Yapan = '$HesapNedir', Tip = 'BackKategori'");
if($yollaSql){
UyariVerOguz("Kategori Başarıyla Eklendi");
YonlendirOguz("kategoriler.html");}}
}
#### Backlink Algoritması ####
function BacklinkListele(){
$sql = mysql_query("SELECT * FROM Backlink ORDER by BackAdi ASC");
while($ck = mysql_fetch_array($sql)){
echo '
<tr>
<td>'.$ck["BackAdi"].'</td>
<td>'.$ck["BackURL"].'</td>
<td>
<a class="btn btn-primary" href="backlink-duzenle/'.$ck["Numara"].'">
<i class="fa fa-fw fa-edit"></i> Düzenle
</a> -
<a class="btn btn-primary" href="backlink-sil/'.$ck["Numara"].'">
<i class="fa fa-fw fa-edit"></i> Kaldır
</a>
</td></tr>';}
}
function BacklinkDuzenle($numara){
if($_POST){
$HesapNedir = $_SESSION["HesapAdi"];
$BackAdi = EkGuvenlikGokmen($_POST['BackAdi']);
$BackURL = EkGuvenlikGokmen($_POST['BackURL']);
$Tarih = date("d.m.Y H:i:s");
$OlayNedir = "<b>$BackAdi</b> Adlı Backlink Ayarları Başarıyla Güncellemiştir";
$sql = "UPDATE Backlink Set BackAdi = '$BackAdi', BackURL = '$BackURL' WHERE Numara = '$numara'";
$sql2 = "INSERT INTO IslemGecmisi Set Olay = '$OlayNedir', Tarih = '$Tarih', Yapan = '$HesapNedir', Tip = 'BackSiteler'";
$result = mysql_query($sql);
$result = mysql_query($sql2);
if($result)
{
UyariVerOguz("Backlink Başarıyla Güncellendi");
YonlendirOguz("backlink.html");
}}
}
function BacklinkEkle(){
if($_POST){
$HesapNedir = $_SESSION["HesapAdi"];
$BackAdi = EkGuvenlikGokmen($_POST['BackAdi']);
$BackURL = EkGuvenlikGokmen($_POST['BackURL']);
$Tarih = date("d.m.Y H:i:s");
$OlayNedir = "<b>$BackAdi</b> Adlı Backlink Başarıyla Eklendi";
$yollaSql = mysql_query("INSERT INTO Backlink SET BackAdi = '$BackAdi', BackURL = '$BackURL'");
$yollaSql = mysql_query("INSERT INTO IslemGecmisi Set Olay = '$OlayNedir', Tarih = '$Tarih', Yapan = '$HesapNedir', Tip = 'BackKategori'");
if($yollaSql){
UyariVerOguz("Backlink Başarıyla Eklendi");
YonlendirOguz("backlink.html");}}
}
### Kısa İşlem Fonksiyonları ###
function YonlendirOguz($a){
echo '<meta http-equiv="refresh" content="0;URL='.$a.'">';
}
function UyariVerOguz($a){
echo '<script type="text/javascript">alert("'.$a.'");</script>';
}
?>