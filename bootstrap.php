<?php
  
  require __DIR__.'/vendor/autoload.php';
  $router = require __DIR__.'/router.php';
  $resolver = require __DIR__.'/resolver.php';

  $class = $router->handler();

  $resolver->handler($class['controller'], $class['method']);