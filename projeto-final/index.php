<?php
require 'config.php';

require ROOT.'app/routes/home.php';
require ROOT.'app/routes/subcategoria.php';
require ROOT.'app/routes/detalhes.php';
require ROOT.'app/routes/admin/admin.php';
require ROOT.'app/routes/admin/login.php';
require ROOT.'app/routes/admin/painel.php';
require ROOT.'app/routes/admin/produto.php';
require ROOT.'app/routes/admin/categoria.php';
require ROOT.'app/routes/admin/subcategoria.php';

$app->run();