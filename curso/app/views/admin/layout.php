<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <title>Curso de Slim framework</title>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/vendor/twitter/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>/public/css/style_admin.css">
    </head>
    <body>
    <div id="container">
    Bem vindo <?php echo $nome; ?>
        <div id="conteudo">
        <form action="/admin/post/buscar" method="GET">
            <input type="text" name="busca" />
            <input type="submit" value="buscar" />
        </form>
            <?php require $pagina.'.php'; ?>
        </div>
    </div>
    </body>
     <script src="<?php echo site_url(); ?>/public/js/jquery.js"></script>
     <script src="<?php echo site_url(); ?>/public/js/posts.js"></script>
</html>