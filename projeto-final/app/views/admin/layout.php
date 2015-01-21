<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <title>Produtos</title>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/vendor/twitter/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>/public/css/style_admin.css">
        <link href='http://fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'>
    </head>
    <body>
    <div id="container">
        <div id="conteudo">
            <h2>Bem Vindo <?php echo $nome; ?></h2>
            <?php require $pagina.'.php'; ?>
        </div>
    </div>
        <script src="<?php echo site_url(); ?>/public/js/jquery.js"></script>
        <script src="<?php echo site_url(); ?>/public/js/subcategoria.js"></script>
        <script src="<?php echo site_url(); ?>/public/js/produtos.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>/public/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url(); ?>/public/js/tinyMce.init.js"></script>
    </body>
</html>