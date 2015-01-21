<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <title>Curso de Slim framework</title>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/vendor/twitter/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>/public/css/style.css">
    </head>
    <body>
    <div id="container">
        <a href="<?php echo site_url(); ?>" class="btn btn-danger">Home</a>  
        <a href="<?php echo site_url(); ?>/sobre" class="btn btn-primary">Sobre</a>  
        <a href="<?php echo site_url(); ?>/contato" class="btn btn-primary">contato</a>
        <?php require $pagina.'.php'; ?>
    </div>
    </body>
    <script src="<?php echo site_url(); ?>/public/js/jquery.js"></script>
    <script src="<?php echo site_url(); ?>/public/js/posts.js"></script>
</html>