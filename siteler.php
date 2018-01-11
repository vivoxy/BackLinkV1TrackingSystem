<div class="mainpanel">
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-th-list"></i>
</div>
<div class="media-body">
<h4>Siteler</h4>
</div>
</div><!-- media -->
</div><!-- pageheader -->
<div class="contentpanel">
<div class="row">
<div class="col-md-12">
<?php if(EkGuvenlikGokmen($_GET["oguzcangokmen"]) == null){  ?>
<div class="table-responsive">
<table id="shTable" class="table table-striped table-bordered responsive">
<thead class="">
<tr>
<th>Site</th>
<th>Kategori</th>
<th>Alexa Rank</th>
<th>Backlink</th>
<th>Tarih</th>
<th>İşlem</th>
</tr>
</thead>
<tbody>
<?php SitelerListele();?>
</tbody>
</table>
</div>
<?php }elseif(EkGuvenlikGokmen($_GET["oguzcangokmen"]) == "duzenle"){
$sql = mysql_query("SELECT * FROM Siteler WHERE Numara='".$_GET["gokmendizayn"]."'");
$ck = mysql_fetch_array($sql);
SiteDuzenle($ck["Numara"]);?>
<div class="panel-body nopadding">
<form class="form-bordered" method="POST" action="">
<div class="form-group has-success">
<label class="col-sm-1 control-label">Site Adı</label>
<div class="col-sm-6">
<input type="text" name="SiteAdi" value="<?=$ck["SiteAdi"];?>" class="form-control">
</div>
</div>
<div class="form-group has-success">
<label class="col-sm-1 control-label">Site URL</label>
<div class="col-sm-6">
<input type="text" name="SiteURL" value="<?=$ck["SiteURL"];?>" class="form-control">
</div>
</div>
<div class="form-group has-success">
<label class="col-sm-1 control-label">Kategori</label>
<div class="col-sm-6">
<select id="Kategori" name="Kategori" class="form-control js-states select2">
<?php 
KategorimSelect($ck["Kategori"]);
KategoriListeSelect($ck["Kategori"]);?>
</select>
</div>
</div>
<div class="form-group has-success">
<label class="col-sm-1 control-label">Backlink</label>
<div class="col-sm-6">
<select id="Backlink" name="Backlink" class="form-control js-states select2">
<?php 
BaclinkimSelect($ck["Backlink"]);
BacklinkListeSelect($ck["Backlink"]);?>
</select>
</div>
</div>
<div class="panel-footer">
<div class="row">
<div class="col-sm-9 col-sm-offset-3">
<input type="submit" name="submit" class="btn btn-primary mr5" value="Kaydet">
</div>
</div>
</form>
</div>
</div>
<?php }elseif(EkGuvenlikGokmen($_GET["oguzcangokmen"]) == "ekle"){SiteEkle();?>
<div class="panel-body nopadding">
<form class="form-bordered" method="POST" action="">
<div class="form-group has-success">
<label class="col-sm-1 control-label">Site Adı</label>
<div class="col-sm-6">
<input type="text" name="SiteAdi" class="form-control">
</div>
</div>
<div class="form-group has-success">
<label class="col-sm-1 control-label">Site URL</label>
<div class="col-sm-6">
<input type="text" name="SiteURL" class="form-control">
</div>
</div>
<div class="form-group has-success">
<label class="col-sm-1 control-label">Kategori</label>
<div class="col-sm-6">
<select id="Kategori" name="Kategori" class="form-control js-states select2">
<?php KategoriListeSelect();?>
</select>
</div>
</div>
<div class="form-group has-success">
<label class="col-sm-1 control-label">Backlink</label>
<div class="col-sm-6">
<select id="Backlink" name="Backlink" class="form-control js-states select2">
<?php BacklinkListeSelect();?>
</select>
</div>
</div>
<div class="panel-footer">
<div class="row">
<div class="col-sm-9 col-sm-offset-3">
<input type="submit" name="submit" class="btn btn-primary mr5" value="Kaydet">
</div>
</div>
</form>
</div>
</div>
<div class="panel-body nopadding">
<?php }elseif(EkGuvenlikGokmen($_GET["oguzcangokmen"]) == "sil"){SilBeniOguz("Siteler",EkGuvenlikGokmen($_GET["gokmendizayn"]));}?>
</div>
</div><!-- row -->
</div><!-- contentpanel -->
</div><!-- mainpanel -->