<?php
  
  require __DIR__.'/vendor/autoload.php';
  $routes = require __DIR__.'/App/Routes.php';
  $resolver = require __DIR__.'/resolver.php';

  $class = $routes->handler();

  $resolver->handler($class['controller'], $class['method']);