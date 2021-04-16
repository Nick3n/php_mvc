<?php
  namespace Core;

  class View{
    public static function render(string $controllerName, array $data = [], string $view = null)
    {
      /* debug_backtrace()[1] -> Get the name of the last method called
        that corresponds with the name of the template archive
      */
      if(!$view) $view = $controllerName . '/' . debug_backtrace()[1]['function'];
      extract($data); // create variables with the name of keys from array
      require dirname(__DIR__).'/App/Views/'.$view.'.php';
    }
  }
?>