<?php
  $resolver = new Core\Resolver();

  $resolver['PDO'] = function($r){
    return new PDO('mysql:host=localhost;dbname=mvc_php', 'root', null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  };

  return $resolver;
?>