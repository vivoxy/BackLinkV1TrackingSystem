<div class="mainpanel">
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-th-list"></i>
</div>
<div class="media-body">
<h4>Kategoriler</h4>
</div>
</div><!-- media -->
</div><!-- pageheader -->
<div class="contentpanel">
<div class="row">
<div class="col-md-12">
<?php if(EkGuvenlikGokmen($_GET["oguzcangokmen"]) == null){  ?>
<div class="table-responsive">
<table class="table table-dark mb30">
<thead>
<tr>
<th>Kategori</th>
<th>İşlem</th>
</tr>
</thead>
<tbody>
<?php KategoriListele();?>
</tbody>
</table>
</div>
<?php }elseif(EkGuvenlikGokmen($_GET["oguzcangokmen"]) == "duzenle"){
$sql = mysql_query("SELECT * FROM Kategoriler WHERE Numara='".$_GET["gokmendizayn"]."'");
$ck = mysql_fetch_array($sql);
KategoriDuzenle($ck["Numara"]);?>
<div class="panel-body nopadding">
<form class="form-bordered" method="POST" action="">
<div class="form-group has-success">
<label class="col-sm-1 control-label">Kategori Adı</label>
<div class="col-sm-6">
<input type="text" name="Kategori" value="<?=$ck["Kategori"];?>" class="form-control">
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
<?php }elseif(EkGuvenlikGokmen($_GET["oguzcangokmen"]) == "ekle"){KategoriEkle();?>
<div class="panel-body nopadding">
<form class="form-bordered" method="POST" action="">
<div class="form-group has-success">
<label class="col-sm-1 control-label">Kategori Adı</label>
<div class="col-sm-6">
<input type="text" name="Kategori" class="form-control">
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
<?php }elseif(EkGuvenlikGokmen($_GET["oguzcangokmen"]) == "sil"){SilBeniOguz("Kategoriler",EkGuvenlikGokmen($_GET["gokmendizayn"]));}?>
</div>
</div><!-- row -->
</div><!-- contentpanel -->
</div><!-- mainpanel -->