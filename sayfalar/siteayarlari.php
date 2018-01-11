<div class="mainpanel">
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-th-list"></i>
</div>
<div class="media-body">
<h4>Site Ayarları</h4>
</div>
</div><!-- media -->
</div><!-- pageheader -->
<div class="contentpanel">
<div class="row">
<div class="col-md-12">
<?php SiteAyarlariOguz(); $acikmikapalimi = array('ACIK'=>'Açık (Görünür)','KAPALI'=>'Kapalı (Görünmez)');?>
<div class="panel-body nopadding">
<form id="basicForm2" method="POST" action="">
<div class="panel panel-default">
<div class="panel-body">
<div class="errorForm"></div>
<div class="row">
<div class="form-group">
<label class="col-sm-3 control-label">Site Durumu <span class="asterisk">*</span></label>
<div class="col-sm-9">
<select name="Durum" class="width300">
<?php foreach ($acikmikapalimi as $key => $value) {?>
<option value="<?php echo $key; ?>" <?php if($key==AyarlarNedirOguzDongu("Durum")){echo "selected";}?>><?php echo $value;?></option>
<?php }?>
</select>
</div>
</div><!-- form-group -->

<div class="form-group">
<label class="col-sm-3 control-label">Site Başlığı (Title) <span class="asterisk">*</span></label>
<div class="col-sm-9">
<input type="text" name="SiteBaslik" class="form-control" value="<?php AyarlarNedirOguz("SiteBaslik");?>" required />
</div>
</div><!-- form-group -->

<div class="form-group">
<label class="col-sm-3 control-label">Oyun Adresi</label>
<div class="col-sm-9">
<input type="url" name="SiteAdres" value="<?php AyarlarNedirOguz("SiteAdres");?>" class="form-control" required />
</div>
</div><!-- form-group -->

<div class="form-group">
<label class="col-sm-3 control-label">Sayfa Etiketleri (Keywords)</label>
<div class="col-sm-9">
<input name="Keywords" id="tags" class="form-control" value="<?php AyarlarNedirOguz("Keywords");?>" required />
</div>
</div><!-- form-group -->

<div class="form-group">
<label class="col-sm-3 control-label">Sayfa Hakkında (Description) <span class="asterisk">*</span></label>
<div class="col-sm-9">
<textarea rows="5" class="form-control" name="Description" required><?php AyarlarNedirOguz("Description");?></textarea>
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