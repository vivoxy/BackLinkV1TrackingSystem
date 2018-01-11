<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<base href="<?php echo URL;?>">
        <meta name="author" content="Oğuzcan GÖKMEN">
        <title><?php echo BASLIK;?></title>
        <?php GokmenCSSAyir($_GET["sayfa"]);?>
        <!--[if lt IE 9]>
        <script src="tema/js/html5shiv.js"></script>
        <script src="tema/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="anasayfa.html" class="logo">
                        <img src="tema/images/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>