<?php

require 'router.php';

$router = new router();

$router->get('/','homepage');
$router->post('/login','login');
$router->post('/search','searchSong');
$router->post('/uploadsong','uploadsong');
$router->post('/getPremium','getPremium');
$router->routerConnection($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);
