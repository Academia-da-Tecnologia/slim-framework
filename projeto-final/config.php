<?php
session_start();
ini_set('display_errors', 1);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('TEMPLATE_ADMIN', ROOT.'app/views/admin');

require ROOT. 'vendor/autoload.php';
require ROOT. 'connection.php';
require ROOT. 'config.slim.twig.php';
require ROOT. 'public/functions/functions.php';