<?php
if($_POST){
$hesapne = EkGuvenlikGokmen($_POST["oguzcan"]);
$sifrene = EkGuvenlikGokmen($_POST["gokmen"]);
giris($hesapne,$sifrene);
}
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="author" content="Oğuzcan GÖKMEN">
        <title><?php echo BASLIK;?> Giriş Sistemi</title>
        <link href="tema/css/style.default.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="tema/js/html5shiv.js"></script>
        <script src="tema/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="signin">
        <section>
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="tema/images/logo-primary.png" alt="Oğuzcan GÖKMEN" >
                    </div>
                    <br />
                    <h4 class="text-center mb5">Yönetici Girişi</h4>
                    <div class="mb30"></div>
                    <form action="" method="post">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="oguzcan" class="form-control" placeholder="Hesap Adı">
                        </div>
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input name="gokmen" type="password" class="form-control" placeholder="Şifre">
                        </div>
                        
                        <div class="clearfix">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">Giriş Yap <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>
                    
                </div>
            </div>
        </section>
        <script src="tema/js/jquery-1.11.1.min.js"></script>
        <script src="tema/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="tema/js/bootstrap.min.js"></script>
        <script src="tema/js/modernizr.min.js"></script>
        <script src="tema/js/pace.min.js"></script>
        <script src="tema/js/retina.min.js"></script>
        <script src="tema/js/jquery.cookies.js"></script>
        <script src="tema/js/custom.js"></script>
    </body>
</html>
