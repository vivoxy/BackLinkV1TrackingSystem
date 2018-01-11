<div class="mainpanel">
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-th-list"></i>
</div>
<div class="media-body">
<h4>Hesap Yönetimi</h4>
</div>
</div><!-- media -->
</div><!-- pageheader -->
<div class="contentpanel">
<div class="row">
<div class="col-md-12">
<?php 
$sql = mysql_query("SELECT * FROM Kullanici WHERE Numara='".$_SESSION["hesapnumaram"]."'");
$ck = mysql_fetch_array($sql);
HesapAyarlariOguz($_SESSION["hesapnumaram"]);
?>
<div class="panel-body nopadding">
<form id="basicForm2" method="POST" action="">
<div class="panel panel-default">
<div class="panel-body">
<div class="errorForm"></div>
<div class="row">
<div class="form-group">
<div class="col-md-12 text-center">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail">
<img src="<?=$ck["Resim"]?>" alt="profil resmi" class="img-responsive">
</div>
<div>
<span class="btn btn-primary btn-file">
<span class="fileinput-new">Avatar URL</span>
<input type="text" value="<?=$ck["Resim"]?>" class="form-control" id="Resim" name="Resim" required>
</span>
</div>
</div>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Hesap Adı <span class="asterisk">*</span></label>
<div class="col-sm-9">
<input type="text" name="HesapAdi" class="form-control" value="<?=$ck["HesapAdi"];?>" required />
</div>
</div><!-- form-group -->

<div class="form-group">
<label class="col-sm-3 control-label">Hesap Şifresi <span class="asterisk">*</span></label>
<div class="col-sm-9">
<input type="text" name="Sifre" class="form-control" value="<?=$ck["Sifre"];?>" required />
</div>
</div><!-- form-group -->

<div class="form-group">
<label class="col-sm-3 control-label">Ad Soyad <span class="asterisk">*</span></label>
<div class="col-sm-9">
<input type="text" name="AdSoyad" class="form-control" value="<?=$ck["AdSoyad"];?>" required />
</div>
</div><!-- form-group -->

<div class="form-group">
<label class="col-sm-3 control-label">E-Mail <span class="asterisk">*</span></label>
<div class="col-sm-9">
<input type="text" name="EPosta" class="form-control" value="<?=$ck["EPosta"];?>" required />
</div>
</div><!-- form-group -->


</div><!-- row -->
</div><!-- panel-body -->
<div class="panel-footer">
<div class="row">
<div class="col-sm-9 col-sm-offset-3">
<input type="submit" name="submit" class="btn btn-primary mr5" value="Kaydet">
</div>
</div>
</div><!-- panel-footer -->
</div><!-- panel -->
</form>
</div>
</div>
</div><!-- row -->
</div><!-- contentpanel -->
</div><!-- mainpanel -->