<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="<?php echo site_url(); ?>/public/css/styles.css">
        <link rel="stylesheet" href="<?php echo site_url() ?>/vendor/twitter/bootstrap/dist/css/bootstrap.css">
    </head>
    <body>
        <div id="formulario-login">
			<form action="/logar" method="post" class="form-inline">
			<div class="alert alert-info" style="text-align: center;font-size: 18px;margin-top: 10px;">Faça o login abaixo</div>
				<div class="form-group">
				    <label class="sr-only" for="exampleInputEmail2">Email address</label>
				    <input type="email" name="email" class="form-control" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputPassword2">Password</label>
				    <input type="password" name="pass" class="form-control" placeholder="Password">
				  </div>
				 <button type="submit" class="btn btn-primary">Logar</button>
			</form>
			<br />
			<?php echo isset($erro) ? '<div class="alert alert-danger"><b>Os seguinte erros foram encontrados:</b><br />'.$erro.'</div>' : ''; ?>
        </div>
    </body>
</html>