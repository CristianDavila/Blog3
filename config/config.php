<?php
$config = Config::singleton();

$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');

$config->set('dbhost', 'localhost');
$config->set('dbname', 'blog');
$config->set('dbuser', 'root');
$config->set('dbpass', '');
$config->set('fondo','./public-images/fondo.jpg');
$config->set('logo','./public-images/logo.jpg');
$config->set('logo2','./public-images/logo.png');
$config->set('cabecera','./public-images/amanecer.jpg');


?>
