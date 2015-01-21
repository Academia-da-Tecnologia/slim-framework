<?php 
require 'config.php'; 
require ROOT.'app/routes/home.php';
require ROOT.'app/routes/contato.php';
require ROOT.'app/routes/sobre.php';
require ROOT.'app/routes/post.php';
require ROOT.'app/routes/admin/login.php';
require ROOT.'app/routes/admin/admin.php';

$app->run();