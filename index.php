<?php

// This require is used to call the get and post functions with passing Arguments in the router class of the router.php file.
require 'router.php';

// Here $router variable is used to make the object of the router class in router.php file.
$router = new router();

// This Function call the get Function and send the arguments one is url and another one is  action.
$router->get('/','homepage');

// This Function call the Post Function and send the arguments one is url and another one is action.
$router->post('/login','login');

// This Function call the Post Function and send the arguments one is url and another one is action.
$router->post('/search','searchSong');

// This Function call the Post Function and send the arguments one is url and another one is action.
$router->post('/uploadsong','uploadsong');

// This Function call the Post Function and send the arguments one is url and another one is action.
$router->post('/getPremium','getPremium');

// This Function call the routerConnection Function and send the arguments one is url and another one is action. THe first argument was url by getting $_SERVER['REQUEST_URI'] and the another argument was method of the web page by $_SERVER['REQUEST_METHOD'].
$router->routerConnection($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);
