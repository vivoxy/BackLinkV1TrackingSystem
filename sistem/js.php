<?php
## JS Modüllerimiz ##
function GokmenJSAyir($sayfane){
if ($sayfane == "anasayfa" OR $sayfane == "hakkinda")
{echo '<script src="tema/js/jquery-1.11.1.min.js"></script>
        <script src="tema/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="tema/js/bootstrap.min.js"></script>
        <script src="tema/js/modernizr.min.js"></script>
        <script src="tema/js/pace.min.js"></script>
        <script src="tema/js/retina.min.js"></script>
        <script src="tema/js/jquery.cookies.js"></script>
        <script src="tema/js/flot/jquery.flot.min.js"></script>
        <script src="tema/js/flot/jquery.flot.resize.min.js"></script>
        <script src="tema/js/flot/jquery.flot.spline.min.js"></script>
        <script src="tema/js/jquery.sparkline.min.js"></script>
        <script src="tema/js/morris.min.js"></script>
        <script src="tema/js/raphael-2.1.0.min.js"></script>
        <script src="tema/js/bootstrap-wizard.min.js"></script>
        <script src="tema/js/select2.min.js"></script>
        <script src="tema/js/custom.js"></script>
        <script src="tema/js/dashboard.js"></script>
';}

if ($sayfane == "404"){echo '<script src="tema/js/jquery-1.11.1.min.js"></script>
        <script src="tema/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="tema/js/bootstrap.min.js"></script>
        <script src="tema/js/modernizr.min.js"></script>
        <script src="tema/js/pace.min.js"></script>
        <script src="tema/js/retina.min.js"></script>
        <script src="tema/js/jquery.cookies.js"></script>
        <script src="tema/js/custom.js"></script>
';}

if ($sayfane == "siteler" OR $sayfane == "kategoriler" OR $sayfane == "backlink" OR $sayfane == "siteayarlari" OR $sayfane == "hesabim")
{echo '<script src="tema/js/jquery-1.11.1.min.js"></script>
        <script src="tema/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="tema/js/bootstrap.min.js"></script>
        <script src="tema/js/modernizr.min.js"></script>
        <script src="tema/js/pace.min.js"></script>
        <script src="tema/js/retina.min.js"></script>
        <script src="tema/js/jquery.cookies.js"></script>
		<script src="tema/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script src="//cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
        <script src="tema/js/select2.min.js"></script>
		<script src="tema/js/custom.js"></script>
';}
}
?>