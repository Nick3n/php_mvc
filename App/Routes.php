<?php

  namespace App;
  use Core\Router;

  $routes = new Router();
  $routes['/'] = [
    'controller' => Controllers\UsersController::class,
    'method' => 'index'
  ];

  return $routes;