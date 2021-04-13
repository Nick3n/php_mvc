<?php

  $router = new MVC\Router();
  $router['/'] = [
    'controller' => App\Controllers\UsersController::class,
    'method' => 'index'
  ];

  $router['/create'] = [
    'controller' => App\Controllers\UsersController::class,
    'method' => 'create'
  ];

  $router['/header'] = [
    'controller' => App\Controllers\UsersController::class,
    'method' => 'header'
  ];

  return $router;