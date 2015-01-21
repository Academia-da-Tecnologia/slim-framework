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
    <form action="/logar/" method="post" accept-charset="utf-8">
        <label>Login</label>
        <input type="text" name="user" />
        <label>Senha</label>
        <input type="text" name="pass" />
        <label></label>
        <input type="submit" name="logar" value="logar" class="btn btn-primary" />
    </form>
    <?php echo isset($erro) ? $erro : ''; ?>
    </div>
    </body>
</html>